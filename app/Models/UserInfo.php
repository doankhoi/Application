<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = "user_infos";

    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'city',
        'address',
        'gender',
        'tel',
        'online_status',
        'chat_status',
        'facebook_token',
        'gmail_token'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
