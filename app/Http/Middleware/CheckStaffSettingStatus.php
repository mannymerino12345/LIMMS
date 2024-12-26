<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\StaffSetting;
use Illuminate\Support\Facades\Auth;

class CheckStaffSettingStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Ensure the user is logged in
        if (Auth::check()) {
            // Get the logged-in user's StaffSetting
            $staffSetting = StaffSetting::where('user_id', Auth::id())->first();

            // Check if the user has a setting
            if ($staffSetting) {
                // Check for 'S_item' status for 'items' routes
                if ($request->is('staff/items/*') && $staffSetting->s_item !== 'active') {
                    return redirect()->route('staff.dashboard');
                }
                
                if ($request->is('staff/category/*') && $staffSetting->s_item !== 'active') {
                    return redirect()->route('staff.dashboard');
                }

                // LBORATORY TABLE MIDDLEWARE ROUTE
                if ($request->is('staff/laboratory/*') && $staffSetting->s_item !== 'active') {
                    return redirect()->route('staff.dashboard');
                }
                // STAFF USERS TABLE MIDDLEWARE ROUTE
                if ($request->is('staff/user/*') && $staffSetting->s_accounts !== 'active') {
                    return redirect()->route('staff.dashboard');
                }


                // Check for 'S_transaction' status for 'transaction' routes
                if ($request->is('staff/transaction/*') && $staffSetting->s_transaction !== 'active') {
                    return redirect()->route('staff.dashboard');
                }

                // Check for 'S_transaction' status for 'transaction' routes
                if ($request->is('staff/Accounts/*') && $staffSetting->s_transaction !== 'active') {
                    return redirect()->route('staff.dashboard');
                }
            }
        }

        // Allow the request to proceed if conditions are met
        return $next($request);
    }
}
