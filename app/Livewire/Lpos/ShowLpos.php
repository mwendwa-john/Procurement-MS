<?php

namespace App\Livewire\Lpos;

use App\Models\Lpo;
use Livewire\Component;
use Livewire\WithPagination;

class ShowLpos extends Component
{
    use WithPagination;
    
    public function render()
    {
        $lpos = Lpo::latest()->paginate(15);

        return view('livewire.lpos.show-lpos', compact('lpos'));
    }
}