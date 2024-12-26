<?php

namespace App\Http\Controllers;

use App\Models\Laboratory;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('user.index', compact('profileData'));
    }

    public function UserProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('user.user_profile', compact('profileData'));
    }

    public function UserProfileUpdate(Request $request){
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'id_number' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Get authenticated user
        $user = Auth::user();

        // Update the user's profile data
        $user->name = $request->name;
        $user->id_number = $request->id_number;
        $user->phone = $request->tel;
        $user->address = $request->address;
        $user->email = $request->email;

        // Handle the profile photo upload if a new image is uploaded
        if ($request->hasFile('photo')) {
            // Delete the old image if it exists
            if ($user->photo && File::exists(public_path('upload/user_images/'.$user->photo))) {
                File::delete(public_path('upload/user_images/'.$user->photo));
            }

            // Store the new photo
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('upload/user_images'), $filename);

            // Save the photo filename in the user's profile
            $user->photo = $filename;
        }

        // Save the updated user data
        $user->save();

        // Redirect back with a success message
        return redirect()->route('user.profile')->with('success', 'Profile updated successfully!');
    }

    public function UserLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

}
