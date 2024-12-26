<?php

namespace App\Http\Controllers;

use App\Models\StaffSetting;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class StaffUserController extends Controller
{
    public function index()
    {
        // Fetch only users with the 'user' role
        $users = User::where('role', 'user')->get();

        return view('staff.staff_account_management.staff_user_table', compact('users'));
    }

    public function create(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'id_number' => 'required|string|max:50|unique:users,id_number',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:User',
            'password' => 'required|string|min:6|confirmed',
        ]);

        try {
            // Create a new user
            $user = User::create([
                'name' => $validated['name'],
                'id_number' => $validated['id_number'],
                'email' => $validated['email'],
                'role' => $validated['role'],
                'password' => Hash::make($validated['password']),
            ]);

            // Insert into staff_setting table
            StaffSetting::create([
                'user_id' => $user->id, // Use the created user's ID
                's_accounts' => 'active',
                's_item' => 'active',
                's_transaction' => 'active',
            ]);

            // Redirect back with a success message
            return redirect()->back()->with([
                'message' => 'User created successfully!',
                'alert-type' => 'success',
            ]);
        } catch (\Exception $e) {
            // Handle errors and redirect back with an error message
            return redirect()->back()->with([
                'message' => 'Failed to create user: ' . $e->getMessage(),
                'alert-type' => 'danger',
            ]);
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('staff.staff_account_management.staff_user_edit', compact('user'));
    } // END METHOD

    public function update(Request $request, $id)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'id_number' => 'required|string|max:50|unique:users,id_number,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:User',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        try {
            // Find the user
            $user = User::findOrFail($id);

            // Update the user's details
            $user->update([
                'name' => $validated['name'],
                'id_number' => $validated['id_number'],
                'email' => $validated['email'],
                'role' => $validated['role'],
                'password' => $validated['password'] ? Hash::make($validated['password']) : $user->password,
            ]);

            return redirect()->route('staff.user.table')->with([
                'message' => 'User updated successfully!',
                'alert-type' => 'success',
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'message' => 'Failed to update user: ' . $e->getMessage(),
                'alert-type' => 'danger',
            ]);
        }
    } // END METHOD

    public function destroy($id)
    {
        try {
            // Find the user
            $user = User::findOrFail($id);

            // Delete the user
            $user->delete();

            return redirect()->route('staff.user.table')->with([
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


    public function show($id)
    {
        try {
            // Find the user by ID
            $user = User::findOrFail($id);

            // Pass the user data to the view
            return view('staff.staff_account_management.staff_user_show', compact('user'));
        } catch (\Exception $e) {
            // Handle errors if the user is not found or other issues occur
            return redirect()->route('staff.user.table')->with([
                'message' => 'User not found!',
                'alert-type' => 'danger',
            ]);
        }
    }//// END METHOD

    
}
