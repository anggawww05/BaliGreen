<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

    public function indexSchedule()
    {
        $schedules = PickupRequest::where('user_id', auth()->id())->get();
        return view('user.schedule.schedule', compact('schedules'));
    }

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

    public function showUpdateFormPickup(PickupRequest $pickupRequest)
    {
        $pickupRequest->load('items');
        $wasteCategories = WasteCategory::all();
        return view('user.schedule.schedule-edit-form', compact('pickupRequest', 'wasteCategories'));
    }

    public function updateFormPickup(Request $request, PickupRequest $pickupRequest)
    {
        $validatedData = $request->validate([
            'items' => 'required|array|min:1',
            'items.*.waste_category_id' => 'required|exists:waste_categories,id',
            'items.*.size' => 'required|string|in:S,M,L,XL',
            'items.*.is_wet' => 'nullable|boolean',
            'items.*.has_smell' => 'nullable|boolean',
            'sorting_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'notes' => 'nullable|string|max:1000',
        ]);

        $photoPath = $pickupRequest->sorting_photo_path;

        if ($request->hasFile('sorting_photo_path')) {
            if ($photoPath && Storage::disk('public')->exists($photoPath)) {
                Storage::disk('public')->delete($photoPath);
            }

            $photoPath = $request->file('sorting_photo_path')->store('sorting_photos', 'public');
        }

        $pickupRequest->update([
            'sorting_photo_path' => $photoPath,
            'notes' => $validatedData['notes'] ?? null,
        ]);

        $pickupRequest->items()->delete();

        $totalWeight = 0;
        $maxRiskLevel = 0;

        foreach ($validatedData['items'] as $itemData) {
            $estimatedWeight = self::SIZE_WEIGHT_MAP[$itemData['size']];

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

        $pickupRequest->update([
            'total_weight_kg' => $totalWeight,
            'max_risk_level' => $maxRiskLevel,
        ]);

        return redirect()->route('schedule.index')->with('success', 'Data penjemputan berhasil diperbarui!');
    }

    public function indexRequestPickup()
    {
        $requests = \App\Models\PickupRequest::with(['user', 'items.wasteCategory'])
            // ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();

        $sortedRequests = $requests->sortByDesc('current_priority_score');

        return view('admin.request-pickup.table-request-pickup', [
            'pickupRequests' => $sortedRequests
        ]);
    }

    public function indexDetailPickup($id)
    {
        $pickupRequest = \App\Models\PickupRequest::with(['user', 'items.wasteCategory'])->findOrFail($id);
        $statuses = \App\Models\PickupRequest::STATUSES_ENUM;

        return view('admin.request-pickup.detail-pickup', [
            'pickupRequest' => $pickupRequest,
            'statuses' => $statuses
        ]);
    }

    public function verifySorted(Request $request, $id)
    {
        $pickup = \App\Models\PickupRequest::findOrFail($id);

        $pickup->status = 'completed';

        if ($request->verification == 'approved') {
            $pickup->is_sorted_confirmed = true;

            $pickup->user->increment('points', 2);
        } else {
            $pickup->is_sorted_confirmed = false;
        }

        $pickup->save();

        return redirect()->route('admin.request-pickup.index')->with('success', 'Data penjemputan berhasil diperbarui!');
    }
}
