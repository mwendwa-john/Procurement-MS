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
use App\Livewire\RolesPermissions\RolesIndex;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\RolesPermissions\AssignPermissions;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Livewire\RolesPermissions\TrashedRoles;

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

    Route::get('roles', RolesIndex::class)->name('roles.index');
    Route::get('trashed/roles', TrashedRoles::class)->name('roles.trashed');
    Route::get('permissions/assign/{roleId}', AssignPermissions::class)->name('permissions.assign');

    Route::get('users', ShowUsers::class)->name('users.show');
});
// End Admin

// Director
Route::middleware(['auth', 'isActive', 'role:director'])->group(function () {

});
// End Director