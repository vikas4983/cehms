<?php

namespace App\traits;

use App\Models\Permission;

trait AssignRoleOrPermission
{
    public function assignRole($user)
    {
        return $user->assignRole('user');
    }
    public function assignPermissionForRole() {}
    public function assignPermissionForUser($user)
    {
        $requiredPermissions = ['create user', 'edit user', 'view user'];
        $permissions = Permission::active()->whereIn('name', $requiredPermissions)->pluck('name')->toArray();
        return $user->syncPermissions($permissions);
    }
}
