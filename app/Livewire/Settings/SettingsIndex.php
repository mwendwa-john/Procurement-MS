<?php

namespace App\Livewire\Settings;

use Livewire\Component;

class SettingsIndex extends Component
{
    public $activeTab = 'global'; // Default active tab

    public function showGlobalSettings()
    {
        $this->activeTab = 'global';
    }

    public function showSystemSettings()
    {
        $this->activeTab = 'system';
    }
    
    public function render()
    {
        return view('livewire.settings.settings-index');
    }
}
