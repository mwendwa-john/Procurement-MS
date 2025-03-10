<?php

namespace App\Livewire\Components\Modals;

use Livewire\Component;
use App\Models\Location;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use RealRashid\SweetAlert\Facades\Alert;

class LocationModals extends Component
{
    #[Validate()]
    public $location_name;

    public $editId;
    public $locationToEdit;

    public $locationId;

    public function render()
    {
        return view('livewire.components.modals.location-modals');
    }

    protected $rules = [
        'location_name' => 'required|unique:locations,location_name|min:3',
    ];

    public function createLocation()
    {
        $validatedData = $this->validate();

        try {
            $locationSlug = Str::slug($validatedData['location_name'], '-');
            // Assuming $validatedData contains the validated data for creating a location
            Location::create([
                'location_name' => $validatedData['location_name'],
                'location_slug' => $locationSlug,
            ]);
            Alert::toast('Location created successfully', 'success');
        } catch (\Exception $e) {
            Alert::toast('Failed to create location: ' . $e->getMessage(), 'error');
        }

        return redirect()->route('locations.show');
    }

    #[On('edit-location')]
    public function findEditLocation($id)
    {
        $this->editId = $id;

        // Find the location
        $this->locationToEdit = Location::findOrFail($this->editId);

        // Fill location details fields
        $this->fill($this->locationToEdit->only(
            'location_name',
        ));
    }

    #[On('pass-location-id')]
    public function findLocation($id)
    {
        $this->locationId = $id;
    }

    public function editLocation()
    {
        try {
            // Validate the input data
            $validatedData = $this->validate();

            $locationSlug = Str::slug($validatedData['location_name'], '-');

            // Update the user record
            $this->locationToEdit->update([
                'location_name' => $validatedData['location_name'],
                'location_slug' => $locationSlug,
            ]);
            Alert::toast('Location updated successfully', 'success');

            return redirect()->route('locations.show');
        } catch (\Exception $e) {
            Alert::toast('Failed to edit location: ' . $e->getMessage(), 'error');
            return redirect()->route('locations.show');
        }
    }

    public function deleteLocation()
    {
        try {
            // Find the location
            $locationToDelete = Location::findOrFail($this->locationId);

            // Check if any hotels are assigned to this location
            if ($locationToDelete->hotels->isNotEmpty()) {
                Alert::toast('Cannot delete location. Hotels are assigned to it.', 'error');
                return redirect()->route('locations.show');
            }

            // Delete the location
            $locationToDelete->delete();

            Alert::toast('Location deleted successfully', 'success');
            return redirect()->route('locations.show');
        } catch (\Exception $e) {
            Alert::toast('Failed to delete location: ' . $e->getMessage(), 'error');
            return redirect()->route('locations.show');
        }
    }

    public function restoreLocation()
    {
        try {
            // Find the location
            $locationToRestore = Location::onlyTrashed()->findOrFail($this->locationId);

            // Restore the location
            $locationToRestore->restore();

            Alert::toast('Location restored successfully', 'success');
            return redirect()->route('locations.trashed');
        } catch (\Exception $e) {
            Alert::toast('Failed to restore location: ' . $e->getMessage(), 'error');
            return redirect()->route('locations.trashed');
        }
    }

    public function permanentlyDeleteLocation()
    {
        try {
            // Find the location
            $locationToDelete = Location::onlyTrashed()->findOrFail($this->locationId);

            // Permanently Delete the location
            $locationToDelete->forceDelete();

            Alert::toast('Location permanently deleted successfully', 'success');
            return redirect()->route('locations.trashed');
        } catch (\Exception $e) {
            Alert::toast('Failed to delete location: ' . $e->getMessage(), 'error');
            return redirect()->route('locations.trashed');
        }
    }
}
