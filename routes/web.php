<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminItemsController;
use App\Http\Controllers\AdminLaboratoryController;
use App\Http\Controllers\AdminSettingsController;
use App\Http\Controllers\AdminTransactionController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffCategoryController;
use App\Http\Controllers\StaffItemsController;
use App\Http\Controllers\StaffLaboratoryController;
use App\Http\Controllers\StaffTransactionController;
use App\Http\Controllers\StaffUserController;
use App\Http\Controllers\UserBorrowController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserItemController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//// USER DASHBOARD
Route::middleware(['auth','roles:user'])->group(function(){
    Route::get('/dashboard',[UserController::class, 'index'])->name('dashboard');
    //USER PROFILE
    Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::post('/user/profile/update',[UserController::class, 'UserProfileUpdate'])->name('user.profile.update');
    Route::get('/user/logout',[UserController::class, 'UserLogout'])->name('user.logout');

    // USER CHOOSE CATEGORY
    // web.php
    Route::get('/user/choose/laboratory', [UserBorrowController::class, 'laboratory'])->name('user.choose.laboratory');
    Route::get('/laboratory/{id}/items', [UserBorrowController::class, 'showItems'])->name('laboratory.items');
    Route::get('view/items/{id}', [UserBorrowController::class, 'show'])->name('view.items.show');
    Route::post('/borrow-item/{item_id}', [UserBorrowController::class, 'borrowItem'])->name('borrow.item');
    // Route for filtering items based on selected categories

    //ITEMS VIEW
    Route::get('/user/item/view', [UserItemController::class, 'index'])->name('user.item.view');
    Route::get('/user/item/approved', [UserItemController::class, 'Approved'])->name('user.item.approved');
    Route::get('/user/item/returned', [UserItemController::class, 'Returned'])->name('user.item.returned');




});/// END USER GROUP MIDDLEWARE

////ADMIN GROUP MIDDLEWARE
Route::middleware(['auth','roles:admin'])->group(function(){
    /// ADMIN ESSENTIALS

    // ADMIN DASHBOARD
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard', [AdminController::class, 'AdminDashboard'])->name('dashboard');
        // Admin Logout
        Route::get('logout', [AdminController::class, 'AdminLogout'])->name('logout');
        // Admin Profile
        Route::get('profile', [AdminController::class, 'AdminProfile'])->name('profile');
        Route::post('profile/store', [AdminController::class, 'AdminProfileStore'])->name('profile.store');
        // Admin Settings
        Route::get('settings', [AdminController::class, 'AdminSettings'])->name('settings');
        // Admin Change Password
        Route::get('change/password', [AdminController::class, 'AdminChangePassword'])->name('change.password');
        Route::post('password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('password.update');
    });    

    // USERS TABLE
    Route::prefix('admin/user')->name('admin.user.')->group(function () {
        Route::get('table', [AdminUserController::class, 'index'])->name('table');
        Route::post('create', [AdminUserController::class, 'create'])->name('create');
        Route::get('{id}', [AdminUserController::class, 'show'])->name('show');
        Route::get('{id}/edit', [AdminUserController::class, 'edit'])->name('edit');
        Route::put('{id}', [AdminUserController::class, 'update'])->name('update');
        Route::delete('{id}', [AdminUserController::class, 'destroy'])->name('destroy');
    });
    
    // LABORATORY TABLE
    Route::prefix('admin/laboratory')->name('admin.laboratory.')->group(function () {
        Route::get('table', [AdminLaboratoryController::class, 'index'])->name('table');
        Route::post('create', [AdminLaboratoryController::class, 'create'])->name('create');
        Route::get('{id}', [AdminLaboratoryController::class, 'show'])->name('show');
        Route::get('{lab_id}/edit', [AdminLaboratoryController::class, 'edit'])->name('edit');
        Route::put('{lab_id}/update', [AdminLaboratoryController::class, 'update'])->name('update');
        Route::delete('{id}', [AdminLaboratoryController::class, 'destroy'])->name('destroy');
    });
    

    // Items CATEGORY TABLE
        Route::prefix('admin/category')->name('admin.category.')->group(function () {
            Route::get('table', [AdminCategoryController::class, 'index'])->name('table');
            Route::post('create', [AdminCategoryController::class, 'create'])->name('create');
            Route::get('{category_id}/show', [AdminCategoryController::class, 'show'])->name('show');
            Route::get('{category_id}/edit', [AdminCategoryController::class, 'edit'])->name('edit');
            Route::put('{category_id}/update', [AdminCategoryController::class, 'update'])->name('update');
            Route::delete('{category_id}/destroy', [AdminCategoryController::class, 'destroy'])->name('destroy');
        });

     /// ITEMS TABLE
        Route::prefix('admin/items')->name('admin.items.')->group(function () {
            Route::get('table', [AdminItemsController::class, 'index'])->name('table');
            Route::post('store', [AdminItemsController::class, 'store'])->name('store');
            Route::get('{item_id}/edit', [AdminItemsController::class, 'edit'])->name('edit');
            Route::put('{item_id}/update', [AdminItemsController::class, 'update'])->name('update'); 
            Route::delete('{item_id}/destroy', [AdminItemsController::class, 'destroy'])->name('destroy');
        });

        /// TRANSACTIONS TABLE
        Route::prefix('admin/transaction')->name('admin.transaction.')->group(function() {
            // REQUEST TRANSACTION
            Route::get('request', [AdminTransactionController::class, 'request'])->name('request');

            // RETURN TRANSACTION
            Route::get('return', [AdminTransactionController::class, 'return'])->name('return');

            //RETURNED ITEMS TRANSACTION
            Route::get('returned',[AdminTransactionController::class, 'returned'])->name('returned');

            Route::get('history',[AdminTransactionController::class, 'history'])->name('history');
            // APPROVE MULTIPLE ITEMS
            Route::post('approvemultiple', [AdminTransactionController::class, 'approveMultiple'])->name('approveMultiple');
            // RETURN MULTIPLE ITEMS
            Route::post('returnmultiple', [AdminTransactionController::class, 'returnMultiple'])->name('returnMultiple');

        });

        Route::prefix('admin/staff/')->name('admin.transaction.')->group(function() {
            // Existing route for settings page
            Route::get('settings', [AdminSettingsController::class, 'settings'])->name('settings');
            //INACTIVE ROUTE
            Route::post('inactivateaccount', [AdminSettingsController::class, 'inactivateAccount'])->name('inactivateAccount');
            Route::post('inactivateitems', [AdminSettingsController::class, 'inactivateItems'])->name('inactivateItems');
            Route::post('inactivatetransaction', [AdminSettingsController::class, 'inactivateTransaction'])->name('inactivateTransaction');

            //ACTIVE ROUTE

            Route::post('activateaccount', [AdminSettingsController::class, 'activateAccount'])->name('activateAccount');
            Route::post('activateitems', [AdminSettingsController::class, 'activateItems'])->name('activateItems');
            Route::post('activatetransaction', [AdminSettingsController::class, 'activateTransaction'])->name('activateTransaction');


        });
        

        
        
});/// END ADMIN GROUP MIDDLEWARE



Route::get('admin/login',[AdminController::class,'AdminLogin'])->name('admin.login');






//// STAFF GROUP MIDDLEWARE



Route::middleware(['auth','roles:staff'])->group(function(){
    /// DASHBOARD
    Route::get('staff/dashboard',[StaffController::class,'StaffDashboard'])->name('staff.dashboard');
    /// LOGOUT
    Route::get('staff/logout',[StaffController::class,'StaffLogout'])->name('staff.logout');
    /// PROFILE
    Route::get('staff/profile',[StaffController::class,'StaffProfile'])->name('staff.profile');
    /// UPDATE PROFILE
    Route::post('staff/profile/store',[StaffController::class,'StaffProfileStore'])->name('staff.profile.store');
    /// CHANGE PASSWORD CHANGE PASSWORD
    Route::get('staff/change/password',[StaffController::class,'StaffChangePassword'])->name('staff.change.password');
    Route::post('staff/password/update',[StaffController::class,'StaffPasswordUpdate'])->name('staff.password.update');
    
    // ITEMS TABLE MIDDLEWARE CHECK
    Route::prefix('staff/items')->name('staff.items.')->middleware('checkStaffSettingStatus')->group(function () {
        Route::get('table', [StaffItemsController::class, 'index'])->name('table');
        Route::post('store', [StaffItemsController::class, 'store'])->name('store');
        Route::get('{item_id}/edit', [StaffItemsController::class, 'edit'])->name('edit');
        Route::put('{item_id}/update', [StaffItemsController::class, 'update'])->name('update'); 
        Route::delete('{item_id}/destroy', [StaffItemsController::class, 'destroy'])->name('destroy');
    });

    // TRANSACTION TABLE with Middleware Check
    Route::prefix('staff/transaction')->name('staff.transaction.')->middleware('checkStaffSettingStatus')->group(function () {
        // REQUEST TRANSACTION
        Route::get('request', [StaffTransactionController::class, 'request'])->name('request');

        // RETURN TRANSACTION
        Route::get('return', [StaffTransactionController::class, 'return'])->name('return');

        //RETURNED ITEMS TRANSACTION
        Route::get('returned',[StaffTransactionController::class, 'returned'])->name('returned');

        Route::get('history',[StaffTransactionController::class, 'history'])->name('history');
        // APPROVE MULTIPLE ITEMS
        Route::post('approvemultiple', [StaffTransactionController::class, 'approveMultiple'])->name('approveMultiple');
        // RETURN MULTIPLE ITEMS
        Route::post('returnmultiple', [StaffTransactionController::class, 'returnMultiple'])->name('returnMultiple');
    });


    // USERS TABLE with Middleware Check
    Route::prefix('staff/user')->name('staff.user.')->middleware('checkStaffSettingStatus')->group(function () {
        Route::get('table', [StaffUserController::class, 'index'])->name('table');
        Route::post('create', [StaffUserController::class, 'create'])->name('create');
        Route::get('{id}', [StaffUserController::class, 'show'])->name('show');
        Route::get('{id}/edit', [StaffUserController::class, 'edit'])->name('edit');
        Route::put('{id}', [StaffUserController::class, 'update'])->name('update');
        Route::delete('{id}', [StaffUserController::class, 'destroy'])->name('destroy');
    });


    // LABORATORY TABLE
    Route::prefix('staff/laboratory')->name('staff.laboratory.')->middleware('checkStaffSettingStatus')->group(function () {
        Route::get('table', [StaffLaboratoryController::class, 'index'])->name('table');
        Route::post('create', [StaffLaboratoryController::class, 'create'])->name('create');
        Route::get('{id}', [StaffLaboratoryController::class, 'show'])->name('show');
        Route::get('{lab_id}/edit', [StaffLaboratoryController::class, 'edit'])->name('edit');
        Route::put('{lab_id}/update', [StaffLaboratoryController::class, 'update'])->name('update');
        Route::delete('{id}', [StaffLaboratoryController::class, 'destroy'])->name('destroy');
    });

    // ITEMS CATEGORY TABLE
    Route::prefix('staff/category')->name('staff.category.')->middleware('checkStaffSettingStatus')->group(function () {
        Route::get('table', [StaffCategoryController::class, 'index'])->name('table');
        Route::post('create', [StaffCategoryController::class, 'create'])->name('create');
        Route::get('{category_id}/show', [StaffCategoryController::class, 'show'])->name('show');
        Route::get('{category_id}/edit', [StaffCategoryController::class, 'edit'])->name('edit');
        Route::put('{category_id}/update', [StaffCategoryController::class, 'update'])->name('update');
        Route::delete('{category_id}/destroy', [StaffCategoryController::class, 'destroy'])->name('destroy');
    });


});

/// STAFF LOGIN

Route::get('staff/login',[StaffController::class,'StaffLogin'])->name('staff.login');

