<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Transaction;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AdminController extends Controller
{

    public function AdminDashboard(){
        // Get the current time
        $now = now();

        // Get the last reset time from cache (if available)
        $lastResetTime = Cache::get('last_reset_time');

        // If 24 hours have passed since the last reset, reset the counts
        if ($lastResetTime && $now->diffInHours($lastResetTime) >= 24) {
            // Reset counts to zero and update the last reset time in cache
            Cache::put('user_count', 0);
            Cache::put('item_count', 0);
            Cache::put('approved_count', 0);
            Cache::put('returned_count', 0);
            
            Cache::put('last_reset_time', $now);
        }

        // Fetch the counts (use cache if available, otherwise compute them)
        $userCount = Cache::get('user_count', User::count());
        $itemCount = Cache::get('item_count', Item::count());
        $approvedCount = Cache::get('approved_count', Transaction::where('status', 'approved')->count());
        $returnedCount = Cache::get('returned_count', Transaction::where('status', 'returned')->count());
        $transactionCount = Cache::get('transaction_count', Transaction::count());

        // Return the view with the data
        return view('admin.index', compact('userCount', 'itemCount', 'approvedCount', 'returnedCount', 'transactionCount'));
    }



    public function AdminLogout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('admin/login');
    }//END METHOD

    public function AdminLogin(){
        return view('admin.admin_login');
    }//END METHOD

    public function AdminProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.admin_profile',compact('profileData'));
        
    }//END METHOD

    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'id_number' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update user data
        $data->name = $request->name;
        $data->id_number = $request->id_number;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        // Handle file upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            
            // Move file to the public path
            $file->move(public_path('upload/admin_images'), $filename);

            // Delete old photo if exists
            if ($data->photo && file_exists(public_path('upload/admin_images/' . $data->photo))) {
                unlink(public_path('upload/admin_images/' . $data->photo));
            }

            // Save new photo
            $data->photo = $filename;
        }

        // Save data
        $data->save();

        $notification = array(
            'message' => 'Profile updated successfully!',
            'alert-type' =>  'success'
        );
            return redirect()->back()->with($notification);
        
        
    }

    public function AdminSettings(){
        return view('admin.admin_settings');
    }

    public function AdminChangePassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.admin_change_password',compact('profileData'));
    }

    public function AdminPasswordUpdate(Request $request)
    {
        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8', // Confirmed ensures 'new_password_confirmation' matches
        ]);

        // Check if the old password matches
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return back()->with([
                'message' => 'Old Password does not match!',
                'alert-type' => 'error',
            ]);
        }

        // Update the new password
        Auth::user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        // Redirect with success notification
        return back()->with([
            'message' => 'Password Changed Successfully!',
            'alert-type' => 'success',
        ]);
    }



}
