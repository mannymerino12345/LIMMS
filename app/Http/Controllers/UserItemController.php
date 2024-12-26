<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserItemController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        // Get the authenticated user's ID
        $id = auth()->id();

        // Retrieve transactions with related item and user data
        $transactions = Transaction::with(['item', 'user'])->where('user_id', $id)->get()->where('status','pending');

        // Pass the transactions and user ID to the view
        return view('user.item.item_view', compact('transactions', 'id','profileData'));
    }

    public function Approved()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        // Get the authenticated user's ID
        $id = auth()->id();

        // Retrieve transactions with related item and user data
        $transactions = Transaction::with(['item', 'user'])->where('user_id', $id)->get()->where('status','approved');

        // Pass the transactions and user ID to the view
        return view('user.item.item_view', compact('transactions', 'id','profileData'));
    }

    public function Returned()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        // Get the authenticated user's ID
        $id = auth()->id();

        // Retrieve transactions with related item and user data
        $transactions = Transaction::with(['item', 'user'])->where('user_id', $id)->get()->where('status','returned');

        // Pass the transactions and user ID to the view
        return view('user.item.item_view', compact('transactions', 'id','profileData'));
    }




}
