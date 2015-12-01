<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = "admin";
    
    protected $fillable = [
    	'site_name',
    	'email',
    	'skype',
    	'facebook',
    	'site_des',
    	'admin_des',
    	'image_admin',
    	'logo_site'
    ];

    public $timestamps = false;
}
