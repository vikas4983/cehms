<?php

namespace App\traits;

use App\Models\User;

trait RevokeRoleOrPermission
{
    public function revokeRoles($user) {
     
     return  $user->revokeRoles();
       
    }
    public function revokePermissions($user,$permissions) {
          return  $user->revokePermissions($permissions);
    }
}
