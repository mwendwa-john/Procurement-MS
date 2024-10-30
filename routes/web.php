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
use App\Livewire\Stations\Location\ShowLocations;
use App\Livewire\Stations\Location\LocationHotels;
use App\Livewire\RolesPermissions\AssignPermissions;
use App\Livewire\Stations\Location\TrashedLocations;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Livewire\Invoices\AttachChildInvoice;
use App\Livewire\Invoices\AttachInvoice;
use App\Livewire\Invoices\PaymentStatus\PaidInvoices;
use App\Livewire\Invoices\PaymentStatus\PartiallyPaidInvoices;
use App\Livewire\Invoices\PaymentStatus\UnpaidInvoices;
use App\Livewire\Invoices\ShowInvoices;
use App\Livewire\Invoices\ViewInvoice;
use App\Livewire\Lpos\CreateLpo;
use App\Livewire\Lpos\ShowLpos;
use App\Livewire\Lpos\States\CreatedLpos as StatesCreatedLpos;
use App\Livewire\Lpos\States\PostedLpos as StatesPostedLpos;
use App\Livewire\Lpos\States\DailyLpos as StatesDailyLpos;
use App\Livewire\Lpos\States\ApprovedLpos as StatesApprovedLpos;
use App\Livewire\Lpos\States\InvoiceAttachedLpos as StatesInvoiceAttachedLpos;
use App\Livewire\Lpos\TrashedLpos;
use App\Livewire\Lpos\ViewLpo;
use App\Livewire\Payments\ShowPayments;
use App\Livewire\Products\ShowProducts;
use App\Livewire\Products\TrashedProducts;
use App\Livewire\Settings\SettingsIndex;
use App\Livewire\Stations\Hotel\HotelProfile;
use App\Livewire\Suppliers\SupplierProfile;
use App\Livewire\User\ChangePassword;
use App\Livewire\User\InactiveUsers;
use App\Livewire\User\NewUsers;
use App\Livewire\User\TrashedUsers;

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
Route::middleware(['auth', 'isActive', 'verified'])->group(function () {
    Route::get('user/{slug}/profile', UserProfile::class)->name('user.profile');
    Route::get('user/{slug}/edit', EditUserProfile::class)->name('user.profile.edit');
    Route::get('password/{slug}/change', ChangePassword::class)->name('password.change');

    // products routes
    Route::get('/products', ShowProducts::class)->name('products.show');
    Route::get('/products/trashed', TrashedProducts::class)->name('products.trashed');
    
    // lpo routes
    Route::get('lpo/create', CreateLpo::class)->name('lpo.create');
    Route::get('lpo/created', StatesCreatedLpos::class)->name('lpos.created');
    Route::get('lpo/posted', StatesPostedLpos::class)->name('lpos.posted');
    Route::get('lpo/daily', StatesDailyLpos::class)->name('lpos.daily');
    Route::get('lpo/approved', StatesApprovedLpos::class)->name('lpos.approved');
    Route::get('lpo/invoice/attached', StatesInvoiceAttachedLpos::class)->name('lpos.invoice.attached');
    Route::get('lpos/show', ShowLpos::class)->name('lpos.show');
    Route::get('lpos/{id}/view', ViewLpo::class)->name('lpo.view');
    Route::get('lpos/trashed', TrashedLpos::class)->name('lpos.trashed');

    // Invoice Routes
    Route::get('invoices/show', ShowInvoices::class)->name('invoices.show');
    Route::get('invoice/{lpoOrderNumber}/attach', AttachInvoice::class)->name('invoice.attach');
    Route::get('child/invoice/{parentInvoiceNumber}/attach', AttachChildInvoice::class)->name('invoice.child.attach');
    Route::get('view/invoice/{invoiceNumber}', ViewInvoice::class)->name('invoice.view');
    Route::get('invoice/unpaid', UnpaidInvoices::class)->name('invoices.unpaid');
    Route::get('invoice/partially/paid', PartiallyPaidInvoices::class)->name('invoices.partially.paid');
    Route::get('invoice/paid', PaidInvoices::class)->name('invoices.paid');

    // Payment routes
    Route::get('/payments/show', ShowPayments::class)->name('payments.show');


    // Settings Routes
    Route::get('/settings', SettingsIndex::class)->name('settings.index');
});


// Admin
Route::middleware(['auth', 'isActive', 'verified', 'role:admin|director'])->group(function () {
    Route::get('dashboard/admin', AdminDashboard::class)->name('dashboard.admin');

    // stations routes
    Route::get('locations/show', ShowLocations::class)->name('locations.show');
    Route::get('location/{id}/hotels', LocationHotels::class)->name('location.hotels');
    Route::get('locations/trashed', TrashedLocations::class)->name('locations.trashed');

    Route::get('hotels/show', ShowHotels::class)->name('hotels.show');
    Route::get('hotel/{id}/profile', HotelProfile::class)->name('hotel.profile');
    Route::get('hotels/trashed', TrashedHotels::class)->name('hotels.trashed');

    // supplier routes
    Route::get('suppliers/show', ShowSuppliers::class)->name('suppliers.show');
    Route::get('supplier/{slug}/view', SupplierProfile::class)->name('suppliers.view');
    Route::get('suppliers/trashed', TrashedSuppliers::class)->name('suppliers.trashed');

    // roles and permissions
    Route::get('roles', RolesIndex::class)->name('roles.index');
    Route::get('trashed/roles', TrashedRoles::class)->name('roles.trashed');
    Route::get('permissions/assign/{roleId}', AssignPermissions::class)->name('permissions.assign');

    // user Roles
    Route::get('users', ShowUsers::class)->name('users.show');
    Route::get('users/new', NewUsers::class)->name('users.new');
    Route::get('users/inactive', InactiveUsers::class)->name('users.inactive');
    Route::get('users/trashed', TrashedUsers::class)->name('users.trashed');
});
// End Admin

// Director
Route::middleware(['auth', 'isActive', 'verified', 'role:director'])->group(function () {

});
// End Director