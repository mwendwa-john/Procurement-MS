<?php

namespace App\Livewire\Settings;

use Livewire\Component;
use Spatie\Valuestore\Valuestore;
use RealRashid\SweetAlert\Facades\Alert;

class GlobalSettings extends Component
{
    public $globalValues = [];
    public $originalValues = [];

    public function mount()
    {
        $valuestore = Valuestore::make(config_path('global_settings.json'));
        $this->globalValues = $valuestore->all();
        $this->originalValues = $this->globalValues; // Store original values
    }

    public function updateGlobalSettings()
    {
        $valuestore = Valuestore::make(config_path('global_settings.json'));

        $hasChanges = false;
        
        foreach ($this->globalValues as $key => $value) {
            // Check if the value has changed
            if (!isset($this->originalValues[$key]) || $this->originalValues[$key] !== $value) {
                $hasChanges = true;
                $valuestore->put($key, $value);
            }
        }

        if ($hasChanges) {
            Alert::toast('Global settings updated!', 'success');
        } else {
            Alert::toast('No changes detected.', 'info');
        }

        return redirect()->route('settings.index');
    }


    public function render()
    {
        return view('livewire.settings.global-settings');
    }
}
