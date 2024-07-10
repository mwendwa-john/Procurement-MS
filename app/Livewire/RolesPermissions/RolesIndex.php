<?php

namespace App\Livewire\RolesPermissions;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RolesIndex extends Component
{
    public function render()
    {
        if(auth()->user()->hasRole('admin')){
            $roles = Role::get();
        } else{
            $roles = Role::where('name', '!=', 'admin')->get();
        }

        return view('livewire.roles-permissions.roles-index', compact('roles'));
    }

}
