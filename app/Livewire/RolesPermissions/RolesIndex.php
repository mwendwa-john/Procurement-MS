<?php

namespace App\Livewire\RolesPermissions;

use Livewire\Attributes\Title;
use Livewire\Component;
use Spatie\Permission\Models\Role;

#[Title('Roles Index')]
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
