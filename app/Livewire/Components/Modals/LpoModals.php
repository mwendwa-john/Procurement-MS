<?php

namespace App\Livewire\Components\Modals;

use App\Models\Lpo;
use Illuminate\Support\Facades\Auth;
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

    // Changing LPO stage
    public function postLpo()
    {
        // Find the lpo
        $lpo = Lpo::findOrFail($this->lpoId);

        if ($lpo) {
            $lpo->stage    = 'posted';
            $lpo->posted_by = Auth::user()->id;
            $lpo->save();
        }

        Alert::toast('Lpo posted', 'success');
        return redirect()->route('lpos.posted');
    }

    public function forwardLpo()
    {
        // Find the lpo
        $lpo = Lpo::findOrFail($this->lpoId);

        if ($lpo) {
            $lpo->stage    = 'forwarded';
            $lpo->forwarded_by = Auth::user()->id;
            $lpo->save();
        }

        Alert::toast('Lpo forwarded', 'success');
        return redirect()->route('lpos.posted');
    }

    public function addToDailyLpo()
    {
        // Find the lpo
        $lpo = Lpo::findOrFail($this->lpoId);

        if ($lpo) {
            $lpo->stage                    = 'added_to_daily_lpos';
            $lpo->added_to_daily_lpos_by    = Auth::user()->id;
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
            $lpo->stage        = 'approved';
            $lpo->approved_by   = Auth::user()->id;
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
