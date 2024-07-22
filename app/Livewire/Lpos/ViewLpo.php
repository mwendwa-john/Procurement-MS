<?php

namespace App\Livewire\Lpos;

use App\Models\Lpo;
use App\Models\LpoItem;
use Livewire\Component;

class ViewLpo extends Component
{
    public $lpo;
    public $lpoItems;

    public function mount($id)
    {
        $this->lpo = Lpo::with(['lpoItems', 'supplier', 'hotel'])->findOrFail($id);

        $this->lpoItems = LpoItem::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.lpos.view-lpo');
    }
}
