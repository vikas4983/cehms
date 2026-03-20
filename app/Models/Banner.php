<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['banner', 'order', 'status'];

    public function scopeAllBanners($query)
    {
        return $query->orderByDesc('status');
    }

    public function scopeActiveBanner($query)
    {
        return $query->where('status', 1);
    }
}
