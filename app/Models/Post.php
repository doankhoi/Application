<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters;
use App\Presenters\DatePresenter;

class Post extends Model
{
    protected $table = "posts";

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'content',
        'seen',
        'is_active',
        'user_id',
        'category_id',
        'type',
        'quote'
    ];

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
    	return $this->belongsToMany('App\Models\Tag');
    }

    public function category()
    {
        return belongsTo('App\Models\Category');
    }
}
