<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OldStudent extends Model
{
    protected $casts = [
        'registration_date' => 'date',
    ];
    protected $fillable = ['registration_no', 'first_name', 'last_name', 'father_name', 'registration_date', 'address', 'valid_form', 'course', 'city'];

    public function scopeAllStudents($query)
    {
        return $query->orderByDesc('registration_no');
    }

    public function scopeLastRegistrationNo($query)
    {
        return ($query->orderByDesc('registration_no')->value('registration_no') ?? 0) + 1;
    }
}
