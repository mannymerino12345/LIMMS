<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Laboratory;
use Illuminate\Http\Request;

class AdminItemsController extends Controller
{
    public function index()
    {
        // Eager load 'category' and 'laboratory' relationships
        $items = Item::with(['category', 'laboratory'])->get();
        $categories = Category::all();
        $laboratories = Laboratory::all();

        return view('admin.admin_items_management.admin_items_table', compact('items', 'categories', 'laboratories'));
    }


    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'item_name' => 'required|string|max:255',
            'item_description' => 'required|string',
            'quantity' => 'required|integer',
            'category_id' => 'required|exists:item_category,category_id',
            'laboratory_id' => 'required|exists:laboratories,lab_id',
            'item_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'days' => 'required|integer',
        ]);

        // Create the new item
        $item = new Item();
        $item->item_name = $request->item_name;
        $item->item_description = $request->item_description;
        $item->quantity = $request->quantity;
        $item->category_id = $request->category_id;
        $item->laboratory_id = $request->laboratory_id;
        $item->days = $request->days;  // Use 'days' field

        // Handle image upload if present
        if ($request->hasFile('item_image')) {
            // Get the file and create a filename
            $file = $request->file('item_image');
            $filename = date('YmdHi') . '_' . $file->getClientOriginalName();
            
            // Move the file to public/upload/item_images
            $file->move(public_path('upload/item_images'), $filename);
            
            // Save the relative file path to the database
            $item->item_image = 'upload/item_images/' . $filename;
        }

        // Save the item
        $item->save();

        // Redirect or return success message
        return redirect()->route('admin.items.table')->with('success', 'Item added successfully');
    }


     public function edit($item_id)
    {
        // Fetch the item by its ID
        $item = Item::findOrFail($item_id);

        // Fetch all categories and laboratories for the dropdowns
        $categories = Category::all();
        $laboratories = Laboratory::all();

        // Pass the item, categories, and laboratories to the view
        return view('admin.admin_items_management.admin_items_edit', compact('item', 'categories', 'laboratories'));
    }


    public function update(Request $request, $item_id)
    {
        // Validate the request
        $request->validate([
            'item_name' => 'required|string|max:255',
            'item_description' => 'required|string',
            'quantity' => 'required|integer',
            'category_id' => 'required|exists:item_category,category_id',
            'laboratory_id' => 'required|exists:laboratories,lab_id',
            'item_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'days' => 'required|integer',
        ]);

        // Find the item to update
        $item = Item::findOrFail($item_id);

        // Update item properties
        $item->item_name = $request->input('item_name');
        $item->item_description = $request->input('item_description');
        $item->quantity = $request->input('quantity');
        $item->category_id = $request->input('category_id');
        $item->laboratory_id = $request->input('laboratory_id');
        $item->days = $request->input('days');

        // Handle optional image update
        if ($request->hasFile('item_image')) {
            // Delete the old image if it exists (only in the 'public' folder)
            if ($item->item_image) {
                $oldImagePath = public_path($item->item_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);  // Delete the old image from public path
                }
            }

            // Move the new image to the 'public/upload/item_images' directory
            $file = $request->file('item_image');
            $filename = date('YmdHi') . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/item_images'), $filename);  // Direct move to the public path
            
            // Save the relative path to the database
            $item->item_image = 'upload/item_images/' . $filename;
        }

        // Save the updated item
        $item->save();

        // Redirect back to the items table with a success message
        return redirect()->route('admin.items.table')->with([   
            'message' => 'Item updated successfully!',
            'alert-type' => 'success',
        ]);
    }



    public function destroy($item_id)
    {
        // Delete the item
        $item = Item::findOrFail($item_id);

        // Delete the image from 'upload/item_images' if it exists
        if ($item->item_image) {
            $imagePath = public_path($item->item_image);
            if (file_exists($imagePath)) {
                unlink($imagePath);  // Delete the image
            }
        }

        // Delete the item record
        $item->delete();

        // Redirect back with a success message
        return redirect()->route('admin.items.table')->with('success', 'Item deleted successfully');
    }

}
