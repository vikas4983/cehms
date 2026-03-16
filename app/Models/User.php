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
        return $query->select('id', 'name', 'email', 'gender', 'dob', 'mobile', 'status', 'practitioner_registration')->where('id', '!=', $userId)->orderByDesc('updated_at')->orderByDesc('status')->latest();
    }

    public function dob(): Attribute
    {
        return Attribute::make(get: fn($value) => Carbon::parse($value)->format('d M Y'));
    }

    protected function scopeInactive($query)
    {
        return $query->where('status', 0);
    }
    protected function scopeActiveStudents($query)
    {
        return $query->where('status', 1)->latest();
    }
    protected function scopeExportActiveStudents($query)
    {
        return $query->select('name', 'email', 'dob', 'practitioner_registration', 'mobile', 'gender', 'qualification')->where('status', 1)->latest();
    }

    public function scopeTodayStudents($query)
    {
        return $query
            ->select('name', 'email', 'dob', 'practitioner_registration', 'mobile', 'gender', 'qualification')

            ->where('status', 1)
            ->whereDate('created_at', today())
            ->latest();
    }
    public function scopeWeeklyStudents($query)
    {
        return $query
            ->select('name', 'email', 'dob', 'practitioner_registration', 'mobile', 'gender', 'qualification')
            ->where('status', 1)
            ->where('created_at', '>=', now()->subDays(7))
            ->latest();
    }
    public function scopeMonthlyStudents($query)
    {
        return $query
            ->select('name', 'email', 'dob', 'practitioner_registration', 'mobile', 'gender', 'qualification')
            ->where('status', 1)
            ->where('created_at', '>=', now()->subDays(30))
            ->latest();
    }
    public function scopeYearlyStudents($query)
    {
        return $query->select('name', 'email', 'dob', 'practitioner_registration', 'mobile', 'gender', 'qualification')->where('status', 1)->whereYear('created_at', now()->year)->latest();
    }
    public function name(): Attribute
    {
        return Attribute::make(set: fn($value) => strtolower($value));
    }
}
