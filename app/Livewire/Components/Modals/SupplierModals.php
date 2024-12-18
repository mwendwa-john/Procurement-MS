<?php

namespace App\Livewire\Components\Modals;

use Exception;
use Livewire\Component;
use App\Models\Supplier;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Illuminate\Database\QueryException;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SupplierModals extends Component
{
    public $supplierSlug;
    public $supplierToEdit;
    public $hotelId;

    // Edit Supplier
    public $supplierId;
    // Address
    #[Validate()]
    public $street;

    #[Validate()]
    public $city;

    #[Validate()]
    public $state;

    #[Validate()]
    public $postal_code;

    // Supplier
    #[Validate()]
    public $address_id;

    #[Validate()]
    public $supplier_name;

    #[Validate()]
    public $slug;

    #[Validate()]
    public $phone_number;

    #[Validate()]
    public $email;

    #[Validate()]
    public $category;

    public function render()
    {
        return view('livewire.components.modals.supplier-modals');
    }

    protected function rules()
    {
        return [
            // Address
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            // Supplier
            'supplier_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('suppliers', 'supplier_name')->ignore($this->supplierId),
            ],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('suppliers', 'slug')->ignore($this->supplierId),
            ],
            'phone_number' => 'nullable|string|max:20',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('suppliers', 'email')->ignore($this->supplierId),
            ],
            'category'          => 'required|in:credit,cash,other',
        ];
    }


    public function updatedSupplierName()
    {
        $this->slug = Str::slug($this->supplier_name);
    }

    #[On('pass-supplier-slug')]
    public function setDeleteSupplier($slug)
    {
        $this->supplierSlug = $slug;
    }


    #[On('edit-supplier')]
    public function findEditSupplier($slug)
    {
        $this->supplierSlug = $slug;

        $this->supplierToEdit = Supplier::where('slug', $this->supplierSlug)->firstOrFail();

        $this->supplierId = $this->supplierToEdit->id;

        // Fill supplier details fields

        $this->fill($this->supplierToEdit->address->only(
            'street',
            'city',
            'state',
            'postal_code',
        ));

        $this->fill($this->supplierToEdit->only(
            'supplier_name',
            'slug',
            'phone_number',
            'email',
            'category',
        ));
    }

    public function editSupplier()
    {
        try {
            // Validate the input data
            $validatedData = $this->validate();

            // update the address record
            $this->supplierToEdit->address->update($validatedData);
            // Update the supplier record
            $this->supplierToEdit->update($validatedData);

            Alert::toast('Supplier updated successfully', 'success');

            return redirect()->route('suppliers.show');
        } catch (\Exception $e) {
            Alert::toast('Failed to edit supplier: ' . $e->getMessage(), 'error');
            return redirect()->route('suppliers.show');
        }
    }

    public function deleteSupplier()
    {
        try {
            // Find the supplier
            $supplierToDelete = Supplier::where('slug', $this->supplierSlug)->firstOrFail();

            // Check if any hotels are assigned to this supplier
            if ($supplierToDelete->hotels()->exists()) {
                Alert::toast('Cannot delete ' . $supplierToDelete->supplier_name . ' ' . ', hotels are assigned to it.', 'error');
                return redirect()->route('suppliers.show');
            } else {
                // Supplier does not have linked hotels, safe to delete
                $supplierToDelete->delete();
            }

            Alert::toast($supplierToDelete->supplier_name . ' ' . 'deleted successfully', 'success');
            return redirect()->route('suppliers.show');
        } catch (\Exception $e) {
            Alert::toast('Failed to delete supplier: ' . $e->getMessage(), 'error');
            return redirect()->route('suppliers.show');
        }
    }

    public function restoreSupplier()
    {
        try {
            // Find the supplier
            $supplierToRestore = Supplier::onlyTrashed()->where('slug', $this->supplierSlug)->firstOrFail();

            // Restore the supplier
            $supplierToRestore->restore();

            Alert::toast($supplierToRestore->supplier_name . ' ' . 'restored successfully', 'success');
            return redirect()->route('suppliers.trashed');
        } catch (\Exception $e) {
            Alert::toast('Failed to restore supplier: ' . $e->getMessage(), 'error');
            return redirect()->route('suppliers.trashed');
        }
    }

    public function permanentlyDeleteSupplier()
    {
        try {
            // Find the supplier
            $supplierToDelete = Supplier::onlyTrashed()->where('slug', $this->supplierSlug)->firstOrFail();

            // Permanently Delete the supplier
            $supplierToDelete->forceDelete();

            Alert::toast($supplierToDelete->supplier_name . ' ' . 'permanently deleted.', 'success');
            return redirect()->route('suppliers.trashed');
        } catch (\Exception $e) {
            Alert::toast('Failed to delete supplier: ' . $e->getMessage(), 'error');
            return redirect()->route('suppliers.trashed');
        }
    }

    #[On('pass-hotel-id')]
    public function passHotelId($id, $slug)
    {
        $this->hotelId = $id;
        $this->supplierSlug = $slug;
    }

    public function removeHotel()
    {
        try {
            // Attempt to find the supplier by slug
            $supplier = Supplier::where('slug', $this->supplierSlug)->firstOrFail();

            // Attempt to detach the hotel from the supplier
            $supplier->hotels()->detach($this->hotelId);

            Alert::toast('Hotel removed', 'success');
        } catch (ModelNotFoundException $e) {
            // Handle the case where the supplier is not found
            Alert::toast('Supplier not found', 'error');
            return redirect()->route('suppliers.index');
        } catch (QueryException $e) {
            // Handle database errors
            Alert::toast('Database error: ' . $e->getMessage(), 'error');
        } catch (Exception $e) {
            // Handle any other unexpected errors
            Alert::toast('An unexpected error occurred: ' . $e->getMessage(), 'error');
        }

        return redirect()->route('suppliers.view', ['slug' => $this->supplierSlug]);
    }
}
