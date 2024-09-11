<?php

namespace App\Livewire\User;

use App\Models\User;
use App\Models\Hotel;
use Livewire\Component;
use App\Models\Location;
use Livewire\Attributes\On;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class AssignHotel extends Component
{
    public $user;
    public $userSlug;
    public $userName;

    public $locations;
    public $roles;
    public $hotels = [];

    public $selectedLocation;
    public $selectedHotel;
    public $selectedRole;

    public function mount()
    {
        $this->locations = Location::all();
        $this->roles = Role::all();
    }

    protected $rules = [
        'selectedRole' => 'required|string|exists:roles,name',
        'selectedLocation' => 'required|integer|exists:locations,id',
        'selectedHotel' => 'required|integer|exists:hotels,id',
    ];

    public function updatedSelectedLocation($location)
    {
        $this->hotels = Hotel::where('location_id', $location)->get();
    }

    #[On('assign-hotel')]
    public function findUser($slug)
    {
        $this->userSlug = $slug;
        $this->user = User::withInactive()->where('slug', $this->userSlug)->firstOrFail();

        $this->userName = trim("{$this->user->first_name} {$this->user->middle_name} {$this->user->last_name}");
    }

    public function assignHotel()
    {
        // Validate the input fields
        $this->validate();

        try {
            // Assign the selected role to the user
            if (!$this->user->hasRole($this->selectedRole)) {
                $this->user->syncRoles([$this->selectedRole]);
            }

            // Update user's location and hotel assignments
            $this->user->update([
                'location_id' => $this->selectedLocation,
                'hotel_id' => $this->selectedHotel,
            ]);

            // Show success toast notification
            Alert::toast("{$this->user->username} assigned to hotel successfully", 'success');

            // Redirect to the inactive users page
            return redirect()->route('users.inactive');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error("Error assigning hotel to user: " . $e->getMessage());

            // Show error toast notification
            Alert::toast('An error occurred while assigning the user to the hotel.', 'error');
        }
    }


    public function render()
    {
        return view('livewire.user.assign-hotel');
    }
}
