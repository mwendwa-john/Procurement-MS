<?php

namespace App\Livewire\RolesPermissions;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class TrashedRoles extends Component
{
    public function render()
    {
        $trashedRoles = Role::onlyTrashed()->get();

        return view('livewire.roles-permissions.trashed-roles', compact('trashedRoles'));
    }
    
    public function bindRoleId($id)
    {
        $this->dispatch('restore-role', $id);
        
        $this->dispatch('permanent-delete-role', $id);
    }
}
