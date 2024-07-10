<?php

namespace App\Livewire\RolesPermissions;

use Livewire\Component;
use Livewire\Attributes\Title;
use Spatie\Permission\Models\Role;

#[Title('Trashed Roles')]
class TrashedRoles extends Component
{
    public function render()
    {
        $trashedRoles = Role::onlyTrashed()->get();

        return view('livewire.roles-permissions.trashed-roles', compact('trashedRoles'));
    }
    
}
