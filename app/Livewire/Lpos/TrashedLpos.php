<?php

namespace App\Livewire\Lpos;

use App\Models\Lpo;
use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\GlobalHelpers;
use Livewire\Attributes\Title;

#[Title('Trashed Lpos')]
class TrashedLpos extends Component
{
    use WithPagination;
    
    public function render()
    {
        $perPage = GlobalHelpers::getPerPage();
        
        $trashedLpos = Lpo::onlyTrashed()->latest()->paginate($perPage ?? 15);

        return view('livewire.lpos.trashed-lpos', compact('trashedLpos'));
    }
}
