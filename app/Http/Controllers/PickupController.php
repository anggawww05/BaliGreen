<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PickupRequest;
use App\Models\WasteCategory;

class PickupController extends Controller
{
    // Mapping ukuran ke estimated weight (kg)
    private const SIZE_WEIGHT_MAP = [
        'S' => 1.5,   // Kecil
        'M' => 3.0,   // Sedang
        'L' => 5.0,   // Besar
        'XL' => 8.0,  // Jumbo
    ];

    public function showFormPickup()
    {
        $wasteCategories = WasteCategory::all();
        return view('user.schedule.schedule-form', compact('wasteCategories'));
    }

    public function storeFormPickup(Request $request)
    {
        $validatedData = $request->validate([
            'items' => 'required|array|min:1',
            'items.*.waste_category_id' => 'required|exists:waste_categories,id',
            'items.*.size' => 'required|string|in:S,M,L,XL',
            'items.*.is_wet' => 'nullable|boolean',
            'items.*.has_smell' => 'nullable|boolean',
            'sorting_photo_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            'notes' => 'nullable|string|max:1000',
        ]);

        // Handle photo upload
        $photoPath = null;
        if ($request->hasFile('sorting_photo_path')) {
            $photoPath = $request->file('sorting_photo_path')->store('sorting_photos', 'public');
        }

        // Create pickup request
        $pickupRequest = PickupRequest::create([
            'user_id' => auth()->id(),
            'status' => 'pending',
            'sorting_photo_path' => $photoPath,
            'notes' => $validatedData['notes'] ?? null,
            'is_sorted_confirmed' => true,
        ]);

        // Create pickup items with calculated weight
        $totalWeight = 0;
        $maxRiskLevel = 0;

        foreach ($validatedData['items'] as $itemData) {
            // Calculate estimated weight based on size
            $estimatedWeight = self::SIZE_WEIGHT_MAP[$itemData['size']];

            // Get waste category for risk level
            $wasteCategory = WasteCategory::find($itemData['waste_category_id']);
            if ($wasteCategory) {
                $maxRiskLevel = max($maxRiskLevel, $wasteCategory->risk_level);
            }

            $pickupRequest->items()->create([
                'waste_category_id' => $itemData['waste_category_id'],
                'size' => $itemData['size'],
                'estimated_weight' => $estimatedWeight,
                'is_wet' => $itemData['is_wet'] ?? false,
                'has_smell' => $itemData['has_smell'] ?? false,
            ]);

            $totalWeight += $estimatedWeight;
        }

        // Update total weight dan max risk level
        $pickupRequest->update([
            'total_weight_kg' => $totalWeight,
            'max_risk_level' => $maxRiskLevel,
        ]);

        return redirect()->route('schedule.index')->with('success', 'Penjadwalan sampah berhasil dibuat!');
    }

    public function showTablePriority()
    {
        $requests = \App\Models\PickupRequest::with(['user', 'items.wasteCategory'])
            ->where('status', 'pending')
            ->get();

        $sortedRequests = $requests->sortByDesc('current_priority_score');

        return view('desa.dashboard', [
            'pickupRequests' => $sortedRequests
        ]);
    }

    public function confirmPickupSorting(Request $request, $id)
    {
        $pickupRequest = \App\Models\PickupRequest::findOrFail($id);

        $validatedData = $request->validate([
            'is_sorted_confirmed' => 'required|boolean',
            'sorting_photo' => 'required|image|max:2048',
            'notes' => 'nullable|string|max:1000',
        ]);

        if ($request->hasFile('sorting_photo')) {
            $file = $request->file('sorting_photo');
            $filePath = $file->store('sorting_photos', 'public');
            $validatedData['sorting_photo_path'] = $filePath;
        }

        $pickupRequest->update([
            'is_sorted_confirmed' => $validatedData['is_sorted_confirmed'],
            'sorting_photo_path' => $validatedData['sorting_photo_path'],
            'notes' => $validatedData['notes'] ?? null,
            'status' => 'in_progress',
        ]);

        return redirect()->back()->with('success', 'Pickup sorting confirmed successfully.');
    }
}
