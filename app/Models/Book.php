<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'publisher', 'pdf', 'image', 'status'];

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
        return $query->select('id', 'name', 'pdf', 'publisher', 'image', 'created_at', 'status')->where('status', 1)->latest();
    }
    public function scopeInactive($query)
    {
        return $query->select('id', 'name', 'pdf', 'publisher', 'image', 'created_at', 'status')->where('status', 0)->latest();
    }
    public function scopeAllBook($query)
    {
        return $query
            ->select('id', 'name', 'pdf', 'publisher', 'image', 'created_at', 'status')
            ->orderByDesc('pdf')
            ->orderByDesc('status')
            ->latest();
    }
}
