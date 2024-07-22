<?php

namespace App\Livewire\Lpos;

use App\Models\Lpo;
use Livewire\Component;

class ShowLpos extends Component
{
    public function render()
    {
        $lpos = Lpo::all();

        return view('livewire.lpos.show-lpos', compact('lpos'));
    }
}
