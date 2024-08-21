<?php

namespace App\Livewire\Settings;

use Livewire\Component;
use Spatie\Valuestore\Valuestore;
use RealRashid\SweetAlert\Facades\Alert;

class SystemSettings extends Component
{
    public $systemValues = [];
    public $originalValues = [];

    public function mount()
    {
        $valuestore = Valuestore::make(config_path('system_settings.json'));
        $this->systemValues = $valuestore->all();
        $this->originalValues = $this->systemValues; // Store original values
    }

    public function updateSystemSettings()
    {
        $valuestore = Valuestore::make(config_path('system_settings.json'));

        $hasChanges = false;
        
        foreach ($this->systemValues as $key => $value) {
            // Check if the value has changed
            if (!isset($this->originalValues[$key]) || $this->originalValues[$key] !== $value) {
                $hasChanges = true;
                $valuestore->put($key, $value);
            }
        }

        if ($hasChanges) {
            Alert::toast('System settings updated!', 'success');
        } else {
            Alert::toast('No changes detected.', 'info');
        }

        return redirect()->route('settings.index');
    }

    
    public function render()
    {
        return view('livewire.settings.system-settings');
    }
}
