<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $casts = [
        'insertOn' => 'datetime',
    ];
    protected $fillable = ['name', 'email', 'mobile'];

    public function scopeAllEnquiries($query)
    {
        return $query->latest();
    }
}
