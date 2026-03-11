<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    use SoftDeletes;
    // use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'password', 'image', 'status', 'father_name', 'dob', 'gender', 'mobile', 'address', '10th_marksheet', '12th_marksheet', 'qualification', 'practitioner_registration', 'others'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token', 'two_factor_recovery_codes', 'two_factor_secret'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = ['profile_photo_url'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected function scopeIsAdmin($query)
    {
        $userId = auth()->user()->id;
        return $query->select('id', 'name', 'email', 'gender', 'dob', 'mobile', 'status','practitioner_registration')->where('id', '!=', $userId)->orderByDesc('updated_at')->orderByDesc('status')->latest();
    }
    protected function scopeInactive($query)
    {
        return $query->where('status', 0);
    }

    public function dob(): Attribute
    {
        return Attribute::make(get: fn($value) => Carbon::parse($value)->format('d M Y'));
    }
}
