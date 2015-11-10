<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters;

class Post extends Model
{
    protected $table = "posts";

    use DatePresenter;

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
    	return $this->hasMany('App\Models\Comment');
    }

    public function tags()
    {
    	return $this->hasMany('App\Models\Tag');
    }
}