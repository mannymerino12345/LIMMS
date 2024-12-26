<?php

namespace App\Http\Controllers;

use App\Models\Laboratory;
use Illuminate\Http\Request;

class AdminLaboratoryController extends Controller
{
    /**
     * Display the laboratory table.
     */
    public function index()
    {
        $laboratories = Laboratory::all(); // Fetch all laboratories
        return view('admin.admin_laboratory_management.admin_laboratory_table', compact('laboratories'));
    }

    /**
     * Store a new laboratory in the database.
     */
    public function create(Request $request)
    {
        $request->validate([
            'lab_name' => 'required|unique:laboratories|max:255',
            'lab_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = new Laboratory();
        $data->lab_name = $request->lab_name;

        // Handle the optional image upload
        if ($request->hasFile('lab_image')) {
            $file = $request->file('lab_image');
            $filename = date('YmdHi') . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/laboratory_images'), $filename);
            $data->lab_image = 'upload/laboratory_images/' . $filename; // Save relative path
        }

        $data->save();
        return redirect()->route('admin.laboratory.table')->with([
            'message' => 'Laboratory added successfully!',
            'alert-type' => 'success',
        ]);
    }

    /**
     * Show the form for editing the specified laboratory.
     */
    public function edit($lab_id)
    {
        $lab = Laboratory::findOrFail($lab_id);
        return view('admin.admin_laboratory_management.admin_laboratory_edit', compact('lab'));
    }

    /**
     * Update the specified laboratory in the database.
     */
    public function update(Request $request, $lab_id)
        {
            // Validate the request
            $request->validate([
                'lab_name' => 'required|max:255|unique:laboratories,lab_name,' . $lab_id . ',lab_id', // Use lab_id instead of id
                'lab_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);            

            // Find the laboratory to update
            $data = Laboratory::findOrFail($lab_id);
            
            // Check if the lab was found
            if (!$data) {
                return redirect()->route('admin.laboratory.table')->with([
                    'message' => 'Laboratory not found.',
                    'alert-type' => 'error',
                ]);
            }

            // Update the lab name
            $data->lab_name = $request->lab_name;

            // Handle the optional image upload
            if ($request->hasFile('lab_image')) {
                // If an old image exists, delete it
                if ($data->lab_image) {
                    $oldImagePath = public_path($data->lab_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);  // Delete the old image from public path
                    }
                }

                // Handle the new image upload
                $file = $request->file('lab_image');
                $filename = date('YmdHi') . '_' . $file->getClientOriginalName();
                $file->move(public_path('upload/laboratory_images'), $filename);

                // Save the relative path of the new image
                $data->lab_image = 'upload/laboratory_images/' . $filename;
            }

            // Save the updated laboratory data
            $data->save();

            // Redirect with success message
            return redirect()->route('admin.laboratory.table')->with([
                'message' => 'Laboratory updated successfully!',
                'alert-type' => 'success',
            ]);
        }



    public function destroy($id)
    {
        try {
            // Find the user
            $lab = Laboratory::findOrFail($id);

            // Delete the user
            $lab->delete();

            return redirect()->route('admin.laboratory.table')->with([
                'message' => 'User deleted successfully!',
                'alert-type' => 'success',
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'message' => 'Failed to delete user: ' . $e->getMessage(),
                'alert-type' => 'danger',
            ]);
        }
    } // END METHOD
}
