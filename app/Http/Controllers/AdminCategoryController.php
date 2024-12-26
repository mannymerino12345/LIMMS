<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all(); // Fetch all categories from item_category table
        return view('admin.admin_item_category_management.admin_category_table', compact('categories'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:item_category|max:255',
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();

        return redirect()->route('admin.category.table')->with([
            'message' => 'Category added successfully!',
            'alert-type' => 'success',
        ]);
    }

    public function edit($category_id){
        $category = Category::findOrFail($category_id);

        return view('admin.admin_item_category_management.admin_category_edit',compact('category'));
    }

    public function update(Request $request, $category_id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        //FIND THE CATEGORY BY ITS ID
        $category = Category::findOrFail($category_id);
        
        //UPDATE THE CATEGOR'S 
        $category->category_name = $request->name;

        $category->save();

        return redirect()->route('admin.category.table')->with([
            'message' => 'Category Update successfully!',
            'alert-type' => 'success',
        ]);
    }

    public function destroy($category_id){
        // FIND THE CATEGORY BY ITS ID
        $category = Category::findOrFail($category_id);
        //DELETE THE CATEGORY
        $category->delete();

        // REDIRECT BACK TO THE CATEGORY TABLE WITH A SUCCESS MESSAGE
        return redirect()->route('admin.category.table')->with([
            'message' => 'Category Deleted successfully!',
            'alert-type' => 'success',
        ]);
    }
}
