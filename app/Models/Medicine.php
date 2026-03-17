<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = ['name', 'code', 'note', 'status'];

    public function scopeAllMedicine($query)
    {
        return $query->latest();
    }
    public function scopeActiveMedicine($query)
    {
        return $query->where('status', 1)->latest();
    }
    public function scopeInactiveMedicine($query)
    {
        return $query->where('status', 0)->latest();
    }
}
