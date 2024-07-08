<?php

use App\Livewire\Home;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Verify;
use App\Livewire\Auth\Register;
use App\Livewire\User\ShowUsers;
use App\Livewire\User\UserProfile;
use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\Reset;
use App\Livewire\User\EditUserProfile;
use App\Livewire\Auth\Passwords\Confirm;
use App\Livewire\Layouts\AdminDashboard;
use App\Livewire\Suppliers\ShowSuppliers;
use App\Livewire\Stations\Hotel\ShowHotels;
use App\Livewire\Suppliers\TrashedSuppliers;
use App\Livewire\RolesPermissions\RolesIndex;
use App\Livewire\Stations\Hotel\TrashedHotels;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\RolesPermissions\TrashedRoles;
use App\Livewire\Stations\Location\LocationHotel;
use App\Livewire\Stations\Location\ShowLocations;
use App\Livewire\Stations\Location\LocationHotels;
use App\Livewire\RolesPermissions\AssignPermissions;
use App\Livewire\Stations\Location\TrashedLocations;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Livewire\Suppliers\ViewSupplier;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::view('/', 'welcome')->name('home');
Route::get('/', Home::class)->name('home');
Route::view('/dump', 'dump')->name('dump');


Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});


// ==================================================================================================================
Route::middleware(['auth', 'isActive'])->group(function () {
    Route::get('user/{slug}/profile', UserProfile::class)->name('user.profile');
    Route::get('user/{slug}/edit', EditUserProfile::class)->name('user.profile.edit');
});


// Admin
Route::middleware(['auth', 'isActive', 'role:admin|director'])->group(function () {
    Route::get('dashboard/admin', AdminDashboard::class)->name('dashboard.admin');

    // stations routes
    Route::get('locations/show', ShowLocations::class)->name('locations.show');
    Route::get('location/{id}/hotels', LocationHotels::class)->name('location.hotels');
    Route::get('locations/trashed', TrashedLocations::class)->name('locations.trashed');

    Route::get('hotels/show', ShowHotels::class)->name('hotels.show');
    Route::get('hotels/trashed', TrashedHotels::class)->name('hotels.trashed');

    // supplier routes
    Route::get('suppliers/show', ShowSuppliers::class)->name('suppliers.show');
    Route::get('supplier/{slug}/view', ViewSupplier::class)->name('suppliers.view');
    Route::get('suppliers/trashed', TrashedSuppliers::class)->name('suppliers.trashed');

    // roles and permissions
    Route::get('roles', RolesIndex::class)->name('roles.index');
    Route::get('trashed/roles', TrashedRoles::class)->name('roles.trashed');
    Route::get('permissions/assign/{roleId}', AssignPermissions::class)->name('permissions.assign');

    // users
    Route::get('users', ShowUsers::class)->name('users.show');
});
// End Admin

// Director
Route::middleware(['auth', 'isActive', 'role:director'])->group(function () {

});
// End Director