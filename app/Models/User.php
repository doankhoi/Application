<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'username',
        'photo',
        'number_login',
        'fails_login',
        'role_id',
        'seen',
        'is_active',
        'last_login',
        'register_token',
        'confirmed',
        'description'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'register_token'];

    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'user_id');
    }

    public function info()
    {
        return $this->hasOne('App\Models\UserInfo', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function isAdmin()
    {
        return $this->role->slug == "admin";
    }

    public function isNotUser()
    {
        return $this->role->slug != "user";
    }
}
