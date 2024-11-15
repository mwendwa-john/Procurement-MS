<?php

namespace App\Livewire\Lpos;

use App\Models\Lpo;
use App\Models\LpoItem;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('View Lpo')]
class ViewLpo extends Component
{
    public $lpo;
    public $lpoItems;


    public function mount($id)
    {
        $this->lpo = Lpo::with(['lpoItems', 'supplier', 'hotel', 'addedToDailyLposBy', 'invoices.invoiceAttachedBy'])->findOrFail($id);

        // dd($this->lpo->status);

        $this->lpoItems = LpoItem::findOrFail($id);
    }

    public function formatUserName($userId)
    {
        $user = User::findOrFail($userId);
        return trim("{$user->first_name} {$user->middle_name} {$user->last_name}");
    }

    public function render()
    {
        return view('livewire.lpos.view-lpo');
    }
}
