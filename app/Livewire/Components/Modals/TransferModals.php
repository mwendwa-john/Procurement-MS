<?php

namespace App\Livewire\Components\Modals;

use App\Models\User;
use App\Models\Hotel;
use Livewire\Component;
use App\Models\Location;
use Livewire\Attributes\On;
use App\Models\UserTransfer;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;

class TransferModals extends Component
{
    public $user;
    public $locations;
    public $roles;
    public $hotels = [];

    public $selectedLocation;
    public $selectedLocationName;
    public $selectedHotel;
    public $selectedHotelName;
    public $selectedRole;

    #[Validate()]
    public $user_slug;

    #[Validate()]
    public $to_location;

    #[Validate()]
    public $to_hotel;

    #[Validate()]
    public $transfer_date;

    #[Validate()]
    public $transfer_reason;

    #[Validate()]
    public $to_role;

    protected $rules = [
        'selectedLocation' => 'nullable|exists:locations,id',
        'selectedHotel'    => 'nullable|exists:hotels,id',
        'transfer_date'    => 'required|date',
        'transfer_reason'  => 'nullable|string|max:255',
        'selectedRole'     => 'required|string|max:255',
    ];



    #[On('pass-user-slug')]
    public function fetchUser($slug)
    {
        $this->user = User::where('slug', $slug)->firstOrFail();
    }

    public function mount()
    {
        $this->locations = Location::all();
        $this->roles = Role::all();
    }

    public function updatedSelectedLocation($id)
    {
        $location = Location::findOrFail($id);
        $this->selectedLocationName = $location->location_name;

        $this->hotels = Hotel::where('location_id', $location->id)->get();
    }

    public function updatedSelectedHotel($id)
    {
        $hotel = Hotel::findOrFail($id);
        $this->selectedHotelName = $hotel->hotel_name;
    }


    public function transferUser()
    {
        DB::beginTransaction(); // Begin the transaction

        try {
            // Validate input data
            $validatedData = $this->validate();

            $fromRole = $this->user->getRoleNames()->first();

            // Check if the 'to_role' exists
            $toRole = Role::findByName($this->selectedRole);
            if (!$toRole) {
                throw new ValidationException("The selected role does not exist.");
            }

            // Assign the new role to the user
            $this->user->syncRoles($toRole);

            // Record the transfer history
            UserTransfer::create([
                'user_slug'             => $this->user->slug,
                'from_location'         => $this->user->location->location_name,
                'to_location'           => $this->selectedLocationName,
                'from_hotel'            => $this->user->hotel->hotel_name,
                'to_hotel'              => $this->selectedHotelName,
                'transfer_date'         => $validatedData['transfer_date'],
                'transfer_reason'       => $validatedData['transfer_reason'],
                'from_role'             => $fromRole,
                'to_role'               => $toRole->name,  // Store role name, not the Role object
            ]);

            $this->user->update([
                'location_id' => $this->selectedLocation,
                'hotel_id'    => $this->selectedHotel,
            ]);

            // Commit the transaction since everything is successful
            DB::commit();

            Alert::toast('Transfer made successfully', 'success');
            return redirect()->route('transfers.show');
        } catch (ValidationException $e) {

            // Specific validation exception handling
            DB::rollBack(); // Rollback transaction if validation fails
            Alert::toast('Validation failed: ' . $e->getMessage(), 'error');
        } catch (\Exception $e) {

            // General exception handling
            DB::rollBack(); // Rollback transaction if other errors occur
            Alert::toast('Failed to make transfer: ' . $e->getMessage(), 'error');
        }

        // Redirect back to the transfers page in case of error
        return redirect()->route('transfers.show');
    }



    public function render()
    {
        return view('livewire.components.modals.transfer-modals');
    }
}
