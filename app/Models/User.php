<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

//    public function hasPermission($permissionId)
//    {
//        return UserPermission::
//            where('user_id', $this->user_id) // Check for the user's role ID
//            ->where('permission_id', $permissionId) // Check for the specific permission ID
//            ->exists();
//    }

    public function hasPermission($permissionId)
    {
        // Check if the user has the specific permission in the 'user_permissions' table
        return UserPermission::where('user_id', $this->id)
            ->where('permission_id', $permissionId)
            ->exists();
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
