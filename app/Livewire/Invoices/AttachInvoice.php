<?php

namespace App\Livewire\Invoices;

use App\Models\Lpo;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class AttachInvoice extends Component
{
    public $lpo;
    public $lpoId;
    public $lpoItems;

    
    public $includeVat = false;
    public $editingIndex = null; // Track the index of the item being edited
    public $subtotal = 0, $vat_total = 0, $total_amount = 0;

    public function mount($id)
    {
        $this->lpoId = $id;
        $this->lpo = Lpo::findOrFail($id);

        // Check if the Lpo already has an Invoice linked
        // if ($this->lpo->invoice) {
        //     Alert::toast('This LPO is already linked to an Invoice. Edit if needed', 'info');
        //     return redirect()->route('lpos.approved');
        // }

        $this->loadLpoItems();
    }

    public function loadLpoItems()
    {
        $lpo = Lpo::find($this->lpoId);
        if ($lpo) {
            $this->lpoItems = $lpo->lpoItems->toArray();
        }
    }

    public function render()
    {
        return view('livewire.invoices.attach-invoice');
    }
}
