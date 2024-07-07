<?php

namespace App\Livewire\Components;

use Livewire\Component;

class AdminHeader extends Component
{
    public $svgIcon;
    public $pageTitle;

    public function mount($svgIcon, $pageTitle)
    {
        $this->svgIcon = $svgIcon;
        $this->pageTitle = $pageTitle;
    }

    public function render()
    {
        return view('livewire.components.admin-header');
    }
}
