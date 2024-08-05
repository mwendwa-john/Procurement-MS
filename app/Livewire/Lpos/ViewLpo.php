<?php

namespace App\Livewire\Lpos;

use App\Models\Lpo;
use App\Models\LpoItem;
use App\Models\User;
use Livewire\Component;

class ViewLpo extends Component
{
    public $lpo;
    public $lpoItems;


    public $generatedBy;

    public function mount($id)
    {
        $this->lpo = Lpo::with(['lpoItems', 'supplier', 'hotel'])->findOrFail($id);

        $this->lpoItems = LpoItem::findOrFail($id);

        $generatedByUser = User::findOrFail($this->lpo->generated_by);

        $firstName  = $generatedByUser->first_name;
        $middleName = $generatedByUser->middle_name;
        $lastName   = $generatedByUser->last_name;

        $this->generatedBy = trim("{$firstName} {$middleName} {$lastName}");

    }

    public function render()
    {
        return view('livewire.lpos.view-lpo');
    }
}
