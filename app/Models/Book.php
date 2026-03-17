<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'publisher', 'pdf', 'status'];

    public function name(): Attribute
    {
        return Attribute::make(get: fn($value) => ucwords($value), set: fn($value) => strtolower($value));
    }
    public function publisher(): Attribute
    {
        return Attribute::make(get: fn($value) => ucwords($value), set: fn($value) => strtolower($value));
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1)->latest()->orderBydesc('pdf');
    }
    public function scopeInactive($query)
    {
        return $query->where('status', 0);
    }
    public function scopeAllBook($query)
    {
        return $query->orderbyDesc('status')->latest();
    }
}
