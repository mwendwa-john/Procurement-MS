<?php

namespace App\Livewire\Components\Modals;

use App\Models\Supplier;
use Livewire\Component;
use Livewire\Attributes\On;
use RealRashid\SweetAlert\Facades\Alert;

class SupplierModals extends Component
{
    public $supplierSlug;

    public function render()
    {
        return view('livewire.components.modals.supplier-modals');
    }

    #[On('pass-slug')]
    public function setDeleteSupplier($slug)
    {
        $this->supplierSlug = $slug;
    }
    
    public function deleteSupplier()
    {
        try {
            // Find the supplier
            $supplierToDelete = Supplier::where('slug', $this->supplierSlug)->first();

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
            $supplierToRestore = Supplier::onlyTrashed()->where('slug', $this->supplierSlug)->first();

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
            $supplierToDelete = Supplier::onlyTrashed()->where('slug', $this->supplierSlug)->first();

            // Permanently Delete the supplier
            $supplierToDelete->forceDelete();

            Alert::toast($supplierToDelete->supplier_name . ' ' . 'permanently deleted.', 'success');
            return redirect()->route('suppliers.trashed');
        } catch (\Exception $e) {
            Alert::toast('Failed to delete supplier: ' . $e->getMessage(), 'error');
            return redirect()->route('suppliers.trashed');
        }
    }
}
