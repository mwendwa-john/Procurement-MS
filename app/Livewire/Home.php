<?php

namespace App\Livewire;

use App\Models\Hotel;
use Livewire\Component;

class Home extends Component
{
    public $hotels;

    public function mount()
    {
        $this->hotels = Hotel::all();
    }

    public function render()
    {
        return view('livewire.home');
    }
}
