<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function showTransaction()
    {
        return view('transactions.show');
    }

    public function storeTransaction(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'month_year' => 'required|date_format:Y-m',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:pending,completed,failed',
            'transaction_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $transaction = \App\Models\Transaction::create($validatedData);

        return redirect()->back()->with('success', 'Transaction recorded successfully.');
    }
}
