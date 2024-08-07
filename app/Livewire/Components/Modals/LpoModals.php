<?php

namespace App\Livewire\Components\Modals;

use App\Models\Lpo;
use Livewire\Component;
use Livewire\Attributes\On;
use RealRashid\SweetAlert\Facades\Alert;

class LpoModals extends Component
{
    public $lpoId;

    #[On('pass-lpo-id')]
    public function bindLpo($id)
    {
        $this->lpoId = $id;
    }

    public function deleteLpo()
    {
        try {
            // Find the lpo
            $lpoToDelete = Lpo::findOrFail($this->lpoId);

            // Check if any invoices are assigned to this lpo
            if ($lpoToDelete->invoice) {
                Alert::toast('Cannot delete lpo. An invoice is linked to it.', 'error');
                return redirect()->route('lpos.show');
            }

            // Delete the lpo
            $lpoToDelete->delete();

            Alert::toast('Lpo and its items deleted successfully', 'success');
            return redirect()->route('lpos.show');
        } catch (\Exception $e) {
            Alert::toast('Failed to delete lpo: ' . $e->getMessage(), 'error');
            return redirect()->route('lpos.show');
        }
    }

    public function restoreLpo()
    {
        try {
            // Find the lpo
            $lpoToRestore = Lpo::withTrashed()->findOrFail($this->lpoId);

            // Restore the lpo
            $lpoToRestore->restore();

            Alert::toast('Lpo restored successfully', 'success');
            return redirect()->route('lpos.trashed');
        } catch (\Exception $e) {
            Alert::toast('Failed to restore lpo: ' . $e->getMessage(), 'error');
            return redirect()->route('lpos.trashed');
        }
    }

    // Changing LPO statuses
    public function postLpo()
    {
        // Find the lpo
        $lpo = Lpo::findOrFail($this->lpoId);

        if ($lpo) {
            $lpo->status = 'posted';
            $lpo->save();
        }

        Alert::toast('Lpo posted', 'success');
        return redirect()->route('lpos.posted');
    }

    public function addToDailyLpo()
    {
        // Find the lpo
        $lpo = Lpo::findOrFail($this->lpoId);

        if ($lpo) {
            $lpo->status = 'added_to_daily_lpos';
            $lpo->save();
        }

        Alert::toast('Lpo added to daily lpos', 'success');
        return redirect()->route('lpos.daily');
    }

    public function approveLpo()
    {
        // Find the lpo
        $lpo = Lpo::findOrFail($this->lpoId);

        if ($lpo) {
            $lpo->status = 'approved';
            $lpo->save();
        }

        Alert::toast('Lpo approved', 'success');
        return redirect()->route('lpos.approved');
    }

    public function render()
    {
        return view('livewire.components.modals.lpo-modals');
    }
}
