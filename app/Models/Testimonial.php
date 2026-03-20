<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ['name', 'image', 'content', 'status'];

    public function scopeAllTestimonials($query)
    {
        return $query->orderByDesc('status')->latest();
    }
    public function scopeActiveTetimonials($query)
    {
        return $query->where('status', 1)->latest();
    }
}
