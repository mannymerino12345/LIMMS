<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionHistory;
use Illuminate\Http\Request;

class AdminTransactionController extends Controller
{
    public function request()
    {
        // Eager load 'item' and 'user' relationships and filter only 'pending' status
        $transactions = Transaction::with(['item', 'user'])
                                ->where('status', 'pending')
                                ->get();

        return view('admin.admin_transaction_management.admin_transaction_request', compact('transactions'));
    }


    public function approve($transaction_id)
    {
        // Find the transaction
        $transaction = Transaction::findOrFail($transaction_id);

        // Update the status to 'approved'
        $transaction->status = 'approved';
        $transaction->save();

        // Get the user associated with the transaction
        $user = $transaction->user;

        // Insert into the transaction_history table
        $history = new TransactionHistory();
        $history->description = 'Transaction approved for item: ' . $transaction->item->item_name; // Add id_number to description
        $history->date = now(); // Current date and time
        $history->user_id = $user->id; 
        $history->save();

        // Redirect back with a success message
        return redirect()->route('admin.transaction.request')
                        ->with('success', 'Transaction approved successfully and history recorded.');
    }
    // app/Http/Controllers/TransactionController.php
    public function approveMultiple(Request $request)
    {
        // Validate that 'transactions' is an array and each transaction ID exists
        $validated = $request->validate([
            'transactions' => 'required|array',
            'transactions.*' => 'exists:transactions,transaction_id',  // Ensure each transaction ID exists
        ]);

        // Query the transactions using the correct primary key 'transaction_id'
        $transactions = Transaction::whereIn('transaction_id', $validated['transactions'])->get();

        // Get the authenticated user
        $user = auth()->user();  // Assuming the user is authenticated

        // Update the status of each transaction to 'approved' and insert into transaction_history
        foreach ($transactions as $transaction) {
            // Set the status to 'approved' and save the transaction
            $transaction->status = 'approved';
            $transaction->save();

            // Create a description including the item_name (assuming transaction has a related item)
            $description = 'Transaction Approved for item: ' . $transaction->item->item_name;

            // Insert a record into the transaction_history table
            TransactionHistory::create([
                'description' => $description,  // Description with the item name
                'date' => now(),  // Current timestamp
                'user_id' => $user->id,  // User who approved the transaction
            ]);
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Selected transactions have been approved successfully.');
    }


    public function returnMultiple(Request $request)
    {
        // Validate that 'transactions' is an array and each transaction ID exists
        $validated = $request->validate([
            'transactions' => 'required|array',
            'transactions.*' => 'exists:transactions,transaction_id',  // Ensure each transaction ID exists
        ]);

        // Query the transactions using the correct primary key 'transaction_id'
        $transactions = Transaction::whereIn('transaction_id', $validated['transactions'])->get();

        // Get the authenticated user
        $user = auth()->user();  // Assuming the user is authenticated

        // Update the status of each transaction to 'returned' and insert into transaction_history
        foreach ($transactions as $transaction) {
            // Set the status to 'returned', update return_date and return_time, then save the transaction
            $transaction->status = 'returned';
            $transaction->return_date = now()->toDateString(); // Current date (e.g., '2024-12-01')
            $transaction->return_time = now()->toTimeString(); // Current time (e.g., '14:30:00')
            $transaction->save();

            // Create a description including the item_name (assuming transaction has a related item)
            $description = 'Transaction Returned for item: ' . $transaction->item->item_name;

            // Insert a record into the transaction_history table
            TransactionHistory::create([
                'description' => $description,  // Description with the item name
                'date' => now(),  // Current timestamp for history record
                'user_id' => $user->id,  // User who is returning the transaction
            ]);
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Selected transactions have been returned successfully.');
    }





    public function return(){
        $transactions = Transaction::with(['item','user'])->where('status','approved')->get();

        return view('admin.admin_transaction_management.admin_transaction_return', compact('transactions'));
    }

    public function returned()
    {
        // Eager load 'item' and 'user' relationships and filter only 'pending' status
        $transactions = Transaction::with(['item', 'user'])
                                ->where('status', 'returned')
                                ->get();

        return view('admin.admin_transaction_management.admin_transaction_returned', compact('transactions'));
    }

    public function history(){
        $history = TransactionHistory::with([ 'user'])->get();

        return view('admin.admin_transaction_management.admin_transaction_history', compact('history'));
    }
}
