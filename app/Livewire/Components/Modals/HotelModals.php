<?php

namespace App\Livewire\Components\Modals;

use App\Models\Hotel;
use Livewire\Component;
use App\Models\Location;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class HotelModals extends Component
{
    use WithFileUploads;

    public $locations = [];
    public $belongsToHotels = [];
    public $editId;
    public $hotelToEdit;
    public $hotelLocation;
    public $parentHotel;
    public $oldImage;

    // Address
    #[Validate()]
    public $street;

    #[Validate()]
    public $city;

    #[Validate()]
    public $state;

    #[Validate()]
    public $postal_code;

    // Hotel
    #[Validate()]
    public $parent_id;

    #[Validate()]
    public $hotel_image_path;

    #[Validate()]
    public $hotel_name;

    #[Validate()]
    public $hotel_abbreviation;

    #[Validate()]
    public $hotel_kra_pin;

    #[Validate()]
    public $location_id;

    public $hotelId;
    public $childId;
    public $parentId;

    public function render()
    {
        return view('livewire.components.modals.hotel-modals');
    }

    protected function rules()
    {
        return [
            // Address validation
            'street'            => 'required|string|max:255',
            'city'              => 'required|string|max:255',
            'state'             => 'required|string|max:255',
            'postal_code'       => 'nullable|string|max:20',

            // Hotel validation
            'parent_id'         => 'nullable|integer',
            'hotel_image_path'  => 'nullable|image|max:4096',
            'hotel_name'        => 'required|string|min:3|unique:hotels,hotel_name,' . $this->hotelToEdit->id,
            'hotel_abbreviation' => 'required|string|unique:hotels,hotel_abbreviation,' . $this->hotelToEdit->id,
            'hotel_kra_pin'     => 'required|string|unique:hotels,hotel_kra_pin,' . $this->hotelToEdit->id,
            'location_id'       => 'required|exists:locations,id',
        ];
    }



    #[On('edit-hotel')]
    public function findEditHotel($id)
    {

        $this->locations = Location::all();
        $this->belongsToHotels = Hotel::all();

        $this->editId = $id;

        // Find the hotel
        $this->hotelToEdit = Hotel::findOrFail($this->editId);

        // Fill hotel details fields
        $this->hotelLocation = $this->hotelToEdit->location->location_name;
        $this->parentHotel = $this->hotelToEdit->parent ? $this->hotelToEdit->parent->hotel_name : 'No Parent';
        $this->oldImage = $this->hotelToEdit->hotel_image_path;

        $this->fill($this->hotelToEdit->address->only(
            'street',
            'city',
            'state',
            'postal_code',
        ));

        $this->fill($this->hotelToEdit->only(
            'parent_id',
            'hotel_name',
            'hotel_abbreviation',
            'hotel_kra_pin',
        ));

        $this->location_id = $this->hotelToEdit->location_id;
    }

    #[On('pass-hotel-id')]
    public function bindHotel($id)
    {
        $this->hotelId = $id;
    }

    public function editHotel()
    {
        // Validate the request inputs with custom error messages
        $validatedData = $this->validate($this->rules());

        try {
            $imageUpdated = false;
            $detailsUpdated = false;

            // Handle hotel image upload
            $hotelImagePath = $this->hotelToEdit->hotel_image_path;

            if ($this->hotel_image_path) {
                $hotelImageName = uniqid() . '-' . date('Ymd') . '-' . auth()->user()->first_name . '-' . auth()->user()->last_name . '.' . $this->hotel_image_path->getClientOriginalExtension();

                $hotelImagePath = $this->hotel_image_path->storeAs('public/images/hotel-images', $hotelImageName);
                $imageUpdated = true;
            }

            // Update the address record
            $addressUpdated = $this->hotelToEdit->address->update($validatedData);

            // generate hotel_slug
            $hotelSlug = Str::slug($validatedData['hotel_name'], '-');

            // Update the hotel record
            $hotelUpdated = $this->hotelToEdit->update([
                'parent_id'             => $validatedData['parent_id'],
                'hotel_image_path'      => $hotelImagePath,
                'hotel_name'            => $validatedData['hotel_name'],
                'hotel_slug'            => $hotelSlug,
                'hotel_abbreviation'    => $validatedData['hotel_abbreviation'],
                'hotel_kra_pin'         => $validatedData['hotel_kra_pin'],
                'location_id'           => $validatedData['location_id'],
            ]);

            if ($addressUpdated || $hotelUpdated) {
                $detailsUpdated = true;
            }


            if ($imageUpdated && $detailsUpdated) {
                Alert::toast($this->hotelToEdit->hotel_name . ' details and image updated successfully', 'success');
            } elseif ($imageUpdated) {
                Alert::toast('Hotel image updated successfully', 'success');
            } elseif ($detailsUpdated) {
                Alert::toast($this->hotelToEdit->hotel_name . ' details updated successfully', 'success');
            } else {
                Alert::toast('No changes made to the hotel.', 'info');
            }

            return redirect()->route('hotels.show');
        } catch (\Exception $e) {
            Alert::toast('Failed to edit ' . $this->hotelToEdit->hotel_name . ': ' . $e->getMessage(), 'error');
            return redirect()->route('hotels.show');
        }
    }


    public function deleteHotel()
    {
        try {
            // Find the hotel
            $hotelToDelete = Hotel::findOrFail($this->hotelId);

            // Check if any users are assigned to this hotel
            if ($hotelToDelete->users->isNotEmpty()) {
                Alert::toast('Cannot delete ' . $hotelToDelete->hotel_name . ' ' . ', users are assigned to it.', 'error');
                return redirect()->route('hotels.show');
            }

            // Delete the hotel
            $hotelToDelete->delete();

            Alert::toast($hotelToDelete->hotel_name . ' ' . 'deleted successfully', 'success');
            return redirect()->route('hotels.show');
        } catch (\Exception $e) {
            Alert::toast('Failed to delete hotel: ' . $e->getMessage(), 'error');
            return redirect()->route('hotels.show');
        }
    }

    public function restoreHotel()
    {
        try {
            // Find the hotel
            $hotelToRestore = Hotel::onlyTrashed()->findOrFail($this->hotelId);

            // Restore the hotel
            $hotelToRestore->restore();

            Alert::toast($hotelToRestore->hotel_name . ' ' . 'restored successfully', 'success');
            return redirect()->route('hotels.trashed');
        } catch (\Exception $e) {
            Alert::toast('Failed to restore hotel: ' . $e->getMessage(), 'error');
            return redirect()->route('hotels.trashed');
        }
    }

    public function permanentlyDeleteHotel()
    {
        try {
            // Find the hotel
            $hotelToDelete = Hotel::onlyTrashed()->findOrFail($this->hotelId);

            // Permanently Delete the hotel
            $hotelToDelete->forceDelete();

            Alert::toast($hotelToDelete->hotel_name . ' ' . 'permanently deleted.', 'success');
            return redirect()->route('hotels.trashed');
        } catch (\Exception $e) {
            Alert::toast('Failed to delete hotel: ' . $e->getMessage(), 'error');
            return redirect()->route('hotels.trashed');
        }
    }

    #[On('pass-child-parent-hotel-id')]
    public function bindChildParentId($childId, $parentId)
    {
        $this->childId = $childId;
        $this->parentId = $parentId;
    }

    public function removeChildHotel()
    {
        DB::beginTransaction();

        try {
            // Fetch the child hotel and remove its parent_id
            $childHotel = Hotel::findOrFail($this->childId);
            $childHotel->parent_id = null;
            $childHotel->save();

            DB::commit();

            // Provide user feedback
            Alert::toast('Removed hotel successfully', 'success');
            return redirect()->route('hotel.profile', ['id' => $this->parentId]);
        } catch (\Exception $e) {
            DB::rollBack();

            // Handle the exception, e.g., log the error or show a user-friendly message
            Alert::toast('Failed to remove the hotel. Please try again.', 'error');
            return redirect()->route('hotel.profile', ['id' => $this->parentId]);
        }
    }
}
