<?php

namespace App\Http\Controllers;

use App\Models\StaffSetting;
use Illuminate\Http\Request;

class AdminSettingsController extends Controller
{
    public function settings()
    {
        // Fetch all staff settings with the related user
        $staffSettings = StaffSetting::with('user')  // Assuming 'user' is the relationship defined in StaffSetting
            ->join('users', 'staff_setting.user_id', '=', 'users.id')
            ->where('users.role', 'staff') // Only get users with 'staff' role
            ->get();

        // Pass the staff settings to the view
        return view('admin.admin_staff_settings', compact('staffSettings'));
    }

    public function inactivateAccount(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'staff_id' => 'required|exists:users,id',
            's_accounts' => 'required|string',
        ]);

        // Find the staff setting
        $staffSetting = StaffSetting::where('user_id', $request->staff_id)->first();

        if ($staffSetting) {
            // Update the `s_accounts` column in the `staff_settings` table
            $staffSetting->s_accounts = $request->s_accounts;
            $staffSetting->save();

            return redirect()->back()->with('success', 'Account status updated successfully');
        }

        return redirect()->back()->with('error', 'Staff not found');
    }


    public function inactivateItems(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'staff_id' => 'required|exists:users,id',
            's_item' => 'required|string',
        ]);

        // Find the staff setting
        $staffSetting = StaffSetting::where('user_id', $request->staff_id)->first();

        if ($staffSetting) {
            // Update the `s_accounts` column in the `staff_settings` table
            $staffSetting->s_item = $request->s_item;
            $staffSetting->save();

            return redirect()->back()->with('success', 'Account status updated successfully');
        }

        return redirect()->back()->with('error', 'Staff not found');
    }

    
    public function inactivateTransaction(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'staff_id' => 'required|exists:users,id',
            's_transaction' => 'required|string',
        ]);

        // Find the staff setting
        $staffSetting = StaffSetting::where('user_id', $request->staff_id)->first();

        if ($staffSetting) {
            // Update the `s_accounts` column in the `staff_settings` table
            $staffSetting->s_transaction = $request->s_transaction;
            $staffSetting->save();

            return redirect()->back()->with('success', 'Account status updated successfully');
        }

        return redirect()->back()->with('error', 'Staff not found');
    }


    

    public function activateAccount(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'staff_id' => 'required|exists:users,id',
            's_accounts' => 'required|string',
        ]);

        // Find the staff setting
        $staffSetting = StaffSetting::where('user_id', $request->staff_id)->first();

        if ($staffSetting) {
            // Update the `s_accounts` column in the `staff_settings` table
            $staffSetting->s_accounts = $request->s_accounts;
            $staffSetting->save();

            return redirect()->back()->with('success', 'Account status updated successfully');
        }

        return redirect()->back()->with('error', 'Staff not found');
    }

    public function activateItems(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'staff_id' => 'required|exists:users,id',
            's_item' => 'required|string',
        ]);

        // Find the staff setting
        $staffSetting = StaffSetting::where('user_id', $request->staff_id)->first();

        if ($staffSetting) {
            // Update the `s_accounts` column in the `staff_settings` table
            $staffSetting->s_item = $request->s_item;
            $staffSetting->save();

            return redirect()->back()->with('success', 'Account status updated successfully');
        }

        return redirect()->back()->with('error', 'Staff not found');
    }

    
    public function activateTransaction(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'staff_id' => 'required|exists:users,id',
            's_transaction' => 'required|string',
        ]);

        // Find the staff setting
        $staffSetting = StaffSetting::where('user_id', $request->staff_id)->first();

        if ($staffSetting) {
            // Update the `s_accounts` column in the `staff_settings` table
            $staffSetting->s_transaction = $request->s_transaction;
            $staffSetting->save();

            return redirect()->back()->with('success', 'Account status updated successfully');
        }

        return redirect()->back()->with('error', 'Staff not found');
    }
}
