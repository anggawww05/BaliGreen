<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PickupController extends Controller
{
    public function showFormPickup()
    {
        return view('user.pickup_form');
    }

    public function storeFormPickup(Request $request)
    {
        $validatedData = $request->validate([
            'pickup_date' => 'required|date|after:today',
            'address' => 'required|string|max:500',
            'items' => 'required|array|min:1',
            'items.*.waste_category_id' => 'required|exists:waste_categories,id',
            'items.*.size' => 'required|string|in:S,M,L,XL',
            'items.*.estimated_weight' => 'required|numeric|min:0.1',
            'items.*.is_wet' => 'required|boolean',
            'items.*.has_smell' => 'required|boolean',
        ]);

        $pickupRequest = \App\Models\PickupRequest::create([
            'user_id' => auth()->id(),
            'pickup_date' => $validatedData['pickup_date'],
            'address' => $validatedData['address'],
            'status' => 'pending',
        ]);

        foreach ($validatedData['items'] as $itemData) {
            $pickupRequest->items()->create($itemData);
        }

        return redirect()->route('user.dashboard')->with('success', 'Pickup request submitted successfully.');
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
