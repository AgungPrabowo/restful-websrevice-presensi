<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function employees()
    {
        return $this->belongsTo(Employee::class);
    }

    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) || abort(401, 'This action is unauthorized.');
        }

        return $this->hasRole($roles) || abort(401, 'This action is unauthorized.');
    }

    // check multiple roles
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('role_name', $roles)->first();
    }

    // check one role
    public function hasRole($role)
    {
        return null !== $this->roles()->where('role_name', $role)->first();
    }
}
