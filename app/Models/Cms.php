<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'image', 'status', 'meta_title', 'meta_description'];

    public function scopeAllCms($query)
    {
        $query->latest();
    }
    public function scopeActiveCms($query)
    {
        $query->where('status', 1)->latest();
    }
}
