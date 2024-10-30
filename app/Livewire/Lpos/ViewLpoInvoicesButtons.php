<?php

namespace App\Livewire\Lpos;

use App\Models\Lpo;
use Livewire\Component;

class ViewLpoInvoicesButtons extends Component
{
    public $lpo;

    public function mount($lpoNumber)
    {
        $this->lpo = Lpo::where('lpo_order_number', $lpoNumber)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.lpos.view-lpo-invoices-buttons');
    }
}
