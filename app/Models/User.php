<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password', 'gender', 'profile_image'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'gender' => 'boolean',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    // Check if user has a specific role
    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
    }

    // Check if user is a super admin
    public function isSuperAdmin()
    {
        return $this->hasRole('super_admin');
    }

    // Check if user is a sub admin
    public function isSubAdmin()
    {
        return $this->hasRole('sub_admin');
    }

    // Check if user is a writer
    public function isWriter()
    {
        return $this->hasRole('writer');
    }

    // Check if user is a reader
    public function isReader()
    {
        return $this->hasRole('reader');
    }
}
