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

    public function assignPermissionByAdmin($data)
    {
        if (!auth()->check() || !auth()->user()->can('permission-assign')) {
            abort(403);
        } else {
            if (is_object($data)) {
                $user = $data;
                $requiredPermissions = ['view-profile', 'edit-profile'];
                $requiredRoles = ['user'];
            } else {
                $requiredPermissions = !empty($data['permissions']) ? $data['permissions'] : ['view-profile', 'edit-profile'];
                $requiredRoles = !empty($data['roles']) ? $data['roles'] : ['user'];
                $user = User::findOrFail($data['studentId']);
            }

            $permissions = Permission::active()->whereIn('name', $requiredPermissions)->pluck('name')->toArray();
            $roles = Role::active()->whereIn('name', $requiredRoles)->pluck('name')->toArray();
            $user->syncPermissions($permissions);
            $user->syncRoles($roles);
            return;
        }
    }

    public function assignPermissionByRegistration($data)
    {
        if (is_object($data)) {
            // Default permission for student
            $user = $data;
            $requiredPermissions = ['view-profile', 'edit-profile','user-dashboard'];
            $requiredRoles = ['user'];
            $permissions = Permission::active()->whereIn('name', $requiredPermissions)->pluck('name')->toArray();
            $roles = Role::active()->whereIn('name', $requiredRoles)->pluck('name')->toArray();
            $user->syncPermissions($permissions);
            $user->syncRoles($roles);
            return;
        }
    }
}
