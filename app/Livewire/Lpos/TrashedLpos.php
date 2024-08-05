<?php

namespace App\Livewire\Lpos;

use App\Models\Lpo;
use Livewire\Component;
use Livewire\WithPagination;

class TrashedLpos extends Component
{
    use WithPagination;
    
    public function render()
    {
        $trashedLpos = Lpo::onlyTrashed()->latest()->paginate(15);

        return view('livewire.lpos.trashed-lpos', compact('trashedLpos'));
    }
}
