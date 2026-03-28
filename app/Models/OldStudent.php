<?php

namespace App\Models;

use GuzzleHttp\Middleware;
use Illuminate\Database\Eloquent\Model;

class OldStudent extends Model
{
    public static function middleware(): array
    {
        return [new Middleware('permission:view-student-old', only: ['index', 'show']), new Middleware('permission:create-student-old', only: ['create', 'store']), new Middleware('permission:edit-student-old', only: ['edit', 'update']), new Middleware('permission:delete-student-old', only: ['destroy'])];
    }
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
