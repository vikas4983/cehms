<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'name',
        'email',
        'country',
        'state',
        'city',
        'favicon',
        'logo',
        'admission_form',
        'status',
        'landline',
        'primary_number',
        'secondary_number',
        'website',
        'zip',
        'instagram',
        'youtube',
        'google',
        'facebook',
        'map',
        'address',
    ];

   
}
