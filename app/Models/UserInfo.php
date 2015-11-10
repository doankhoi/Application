<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = "t_user_infos";

    protected $fillable = [
        'username',
        'firstname',
        'lastname',
        'city',
        'address',
        'photo',
        'gender',
        'tel',
        'online_status',
        'chat_status',
        'facebook_token'
    ];

    
}
