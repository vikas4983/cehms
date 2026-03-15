<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    protected $fillable = ['name', 'guard_name', 'status'];
    protected $casts = ['created_at' => 'datetime:d M Y'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    protected function name(): Attribute
    {
        return Attribute::make(set: fn($value) => strtolower($value));
    }
}
