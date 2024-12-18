<?php

namespace App\Livewire\Components\Modals;

use App\Models\User;
use Livewire\Component;
use App\Mail\WelcomeEmail;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class UserModals extends Component
{
    public $userSlug;

    #[Validate()]
    public $email;

    protected $rules = [
        'email' => 'required|email|unique:users,email'
    ];

    public function render()
    {
        return view('livewire.components.modals.user-modals');
    }

    #[On('pass-user-slug')]
    public function setUserSlug($slug)
    {
        $this->userSlug = $slug;
    }

    public function sendWelcomeMail()
    {
        // dd($this->email);
        // Send welcome email to the user using the email address provided
        Mail::to($this->email)->send(new WelcomeEmail());

        $this->dispatch('close-welcome-modal');
    }

    public function activateAccount()
    {
        try {
            // Find the user, including inactive users
            $userToActivate = User::withInactive()->where('slug', $this->userSlug)->firstOrFail();

            // Check if the user is linked to a hotel
            if (is_null($userToActivate->hotel)) {
                // User is not assigned to a hotel, show an error message
                Alert::toast('Cannot activate ' . $userToActivate->username . ', user does not have a hotel assigned.', 'info');
                return redirect()->route('users.inactive');
            } else {
                // User has a hotel, activate the account
                $userToActivate->is_active = true;
                $userToActivate->save();

                // Show a success message
                Alert::toast('Account for ' . $userToActivate->username . ' activated', 'success');
                return redirect()->route('users.inactive');
            }
        } catch (\Exception $e) {
            // Handle any exceptions
            Alert::toast('Failed to activate user: ' . $e->getMessage(), 'error');
            return redirect()->route('users.inactive');
        }
    }


    public function deactivateAccount()
    {
        try {
            // Find the user
            $userToDeactivate = User::where('slug', $this->userSlug)->firstOrFail();

            // Check if the user does not have the 'admin' role
            if (!$userToDeactivate->hasRole('admin')) {
                $userToDeactivate->is_active = false;
                $userToDeactivate->save();
            } else {
                Alert::toast('Cannot deactivate ' . $userToDeactivate->username . ' ' . ', user is an admin.', 'error');
                return redirect()->route('users.show');
            }

            Alert::toast($userToDeactivate->username . ' ' . 'account deactivated', 'success');
            return redirect()->route('users.show');
        } catch (\Exception $e) {
            Alert::toast('Failed to deactivate user: ' . $e->getMessage(), 'error');
            return redirect()->route('users.show');
        }
    }


    public function deleteAccount()
    {
        try {
            // Find the user
            $userToDelete = User::withInactive()->where('slug', $this->userSlug)->firstOrFail();

            // Delete user
            $userToDelete->delete();

            Alert::toast($userToDelete->username . ' ' . 'deleted successfully', 'success');
            return redirect()->route('users.show');
        } catch (\Exception $e) {
            Alert::toast('Failed to delete user: ' . $e->getMessage(), 'error');
            // return redirect()->route('users.show');
            return redirect()->back();
        }
    }


    public function restoreAccount()
    {
        try {
            // Find the user
            $userToRestore = User::onlyTrashed()->withInactive()->where('slug', $this->userSlug)->firstOrFail();

            // Restore user
            $userToRestore->restore();

            Alert::toast($userToRestore->username . ' ' . 'restored successfully', 'success');
            return redirect()->route('users.trashed');
        } catch (\Exception $e) {
            Alert::toast('Failed to restore user: ' . $e->getMessage(), 'error');
            return redirect()->route('users.trashed');
        }
    }

    
}
