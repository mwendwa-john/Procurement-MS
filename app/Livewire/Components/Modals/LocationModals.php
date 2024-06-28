<?php

namespace App\Livewire\Components\Modals;

use Livewire\Component;
use App\Models\Location;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use RealRashid\SweetAlert\Facades\Alert;

class LocationModals extends Component
{
    #[Validate()]
    public $location_name;

    public $editId;
    public $locationToEdit;

    public $deleteId;
    public $restoreId;
    public $permanentDeleteId;

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
            // Assuming $validatedData contains the validated data for creating a location
            Location::create($validatedData);
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

    #[On('delete-location')]
    public function findLocation($id)
    {
        $this->deleteId = $id;
    }

    #[On('restore-location')]
    public function findLocationRestore($id)
    {
        $this->restoreId = $id;
    }

    #[On('permanent-delete-location')]
    public function findRoleDelete($id)
    {
        $this->permanentDeleteId = $id;
    }

    public function editLocation()
    {
        try {
            // Validate the input data
            $validatedData = $this->validate();

            // Update the user record
            $this->locationToEdit->update($validatedData);
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
            $locationToDelete = Location::findOrFail($this->deleteId);

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
            $locationToRestore = Location::onlyTrashed()->findOrFail($this->restoreId);

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
            $locationToDelete = Location::onlyTrashed()->findOrFail($this->permanentDeleteId);

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
