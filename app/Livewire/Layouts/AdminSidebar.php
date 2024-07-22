<?php

namespace App\Livewire\Layouts;

use Livewire\Component;

class AdminSidebar extends Component
{
    public $activeLink = 'dashboard';

    public function setActiveLink($link)
    {
        $this->activeLink = $link;
    }
    
    public function render()
    {
        return view('livewire.layouts.admin-sidebar');
    }
}
