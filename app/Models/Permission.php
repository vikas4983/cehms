<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    protected $fillable = ['name', 'guard_name', 'status'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopeAllPermissions($query)
    {
        return $query;
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => strtolower($value)
        );
    }
}