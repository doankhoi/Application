<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    protected $fillable = [
    	'name',
    	'is_active'
    ];
    
    public function posts()
    {
    	return $this->hasMany('App\Models\Post');
    }

}
