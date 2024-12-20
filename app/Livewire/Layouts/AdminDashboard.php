<?php

namespace App\Livewire\Layouts;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
class AdminDashboard extends Component
{
    public $activeLink = 'dashboard';

    public function setActiveLink($link)
    {
        $this->activeLink = $link;
    }
    
    public function render()
    {
        return view('livewire.layouts.admin-dashboard');
    }
}
