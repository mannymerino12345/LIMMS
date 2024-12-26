<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Laboratory;
use App\Models\Transaction;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserBorrowController extends Controller
{
    public function laboratory(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        
        $laboratory = Laboratory::all();

        return view('user.borrow.choose_laboratory', compact('laboratory','profileData'));
    }


    // In UserBorrowController.php

    // UserBorrowController.php

    public function showItems($id)
    {
        // Get the currently authenticated user's data
        $profileData = User::find(Auth::user()->id); 

        // Fetch the laboratory and its related items using the provided ID
        // Paginate the items to show only a subset per page
        $laboratory = Laboratory::with('items')->findOrFail($id); 

        // Get all categories
        $category = Category::all();

        // Paginate the items (for example, 6 items per page)
        $items = $laboratory->items()->paginate(6);

        // Pass the laboratory, paginated items, profile data, and categories to the view
        return view('user.borrow.laboratory_items', compact('laboratory', 'profileData', 'category', 'items'));
    }


    public function show($id){
        $profileData = User::find(Auth::user()->id); 
        $item = Item::with(['category', 'laboratory'])->findOrFail($id);
        return view('user.borrow.items_show', compact('item','profileData'));
    }

    public function borrowItem(Request $request, $item_id)
    {
        // Validate the input quantity
        $request->validate([
            'bid_quantity' => 'required|integer|min:1|max:' . Item::find($item_id)->quantity,
        ]);

        // Get the item by item_id
        $item = Item::findOrFail($item_id);

        // Check if there is enough stock
        if ($item->quantity < $request->bid_quantity) {
            return redirect()->back()->with('error', 'Not enough stock available.');
        }

        // Calculate the due date based on the item's item_due_date
        // Assuming 'item_due_date' stores the number of days the item can be borrowed
        $dueDate = now()->addDays($item->days); // Add the number of days from 'item_due_date'

        // Create the transaction (borrow action)
        $transaction = Transaction::create([
            'item_id' => $item->item_id,
            'user_id' => Auth::id(), // authenticated user
            'quantity' => $request->bid_quantity,
            'borrow_date' => now()->toDateString(),
            'borrow_time' => now()->toTimeString(),
            'due_date' => $dueDate->toDateString(), // Use the dynamically calculated due date
            'status' => 'pending', // You can customize the status
        ]);

        // Reduce the item's quantity after borrowing
        $item->quantity -= $request->bid_quantity;
        $item->save();

        $notification = array(
            'message' => 'Item borrowed successfully!',
            'alert-type' =>  'success'
        );
            return redirect()->route('dashboard')->with($notification);
    }


}
