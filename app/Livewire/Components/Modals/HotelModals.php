<?php

namespace App\Livewire\Components\Modals;

use App\Models\Hotel;
use Livewire\Component;
use App\Models\Location;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
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

    #[Validate()]
    public $parent_id;

    #[Validate()]
    public $hotel_image_path;

    #[Validate()]
    public $hotel_name;

    #[Validate()]
    public $hotel_kra_pin;

    #[Validate()]
    public $location_id;

    public $deleteId;
    public $restoreId;
    public $permanentDeleteId;

    public function render()
    {
        return view('livewire.components.modals.hotel-modals');
    }

    protected $rules = [        
        'parent_id'        => 'nullable|exists:hotels,id',
        'hotel_image_path'  => 'nullable|image|max:4096',
        'hotel_name'       => 'required|string|max:255',
        'hotel_kra_pin'    => 'required|string|max:255',
        'location_id'      => 'required|exists:locations,id',
    ];

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

        $this->fill($this->hotelToEdit->only(
            'parent_id',
            'hotel_name',
            'hotel_kra_pin',
        ));

        $this->location_id = $this->hotelToEdit->location_id;
    }


    #[On('delete-hotel')]
    public function bindHotel($id)
    {
        $this->deleteId = $id;
    }

    #[On('restore-hotel')]
    public function bindHotelRestore($id)
    {
        $this->restoreId = $id;
    }

    #[On('permanent-delete-hotel')]
    public function bindHotelDelete($id)
    {
        $this->permanentDeleteId = $id;
    }

    public function editHotel()
    {
        // Validate the request inputs with custom error messages
        $validatedData = $this->validate();

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

            // Update the hotel record
            $this->hotelToEdit->update([
                'parent_id'        => $validatedData['parent_id'],
                'hotel_image_path' => $hotelImagePath,
                'hotel_name'       => $validatedData['hotel_name'],
                'hotel_kra_pin'    => $validatedData['hotel_kra_pin'],
                'location_id'      => $validatedData['location_id'],
            ]);

            $detailsUpdated = true;

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
            $hotelToDelete = Hotel::findOrFail($this->deleteId);

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
            $hotelToRestore = Hotel::onlyTrashed()->findOrFail($this->restoreId);

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
            $hotelToDelete = Hotel::onlyTrashed()->findOrFail($this->permanentDeleteId);

            // Permanently Delete the hotel
            $hotelToDelete->forceDelete();

            Alert::toast($hotelToDelete->hotel_name . ' ' . 'permanently deleted.', 'success');
            return redirect()->route('hotels.trashed');
        } catch (\Exception $e) {
            Alert::toast('Failed to delete hotel: ' . $e->getMessage(), 'error');
            return redirect()->route('hotels.trashed');
        }
    }
}
