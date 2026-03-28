<?php

namespace App\traits;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

trait AssignRoleOrPermission
{
    public function assignRole($user)
    {
        return $user->assignRole('user');
    }
    public function assignPermissionForRole() {}

    public function assignPermissionForUser($data)
    {
        if (is_object($data)) {
            // Default permission for student
            $user = $data;
            $requiredPermissions = ['create user', 'edit user', 'view user'];
            $requiredRoles = ['user'];
        } else {
            $requiredPermissions = $data['permissions'] ?? [];
            $requiredRoles = $data['roles'] ?? [];
            $user = User::findOrFail($data['studentId']);
        }
        $permissions = Permission::active()->whereIn('name', $requiredPermissions)->pluck('name')->toArray();
        $roles = Role::active()->whereIn('name', $requiredRoles)->pluck('name')->toArray();
        $user->syncPermissions($permissions);
        $user->syncRoles($roles);
        return;
    }
}
