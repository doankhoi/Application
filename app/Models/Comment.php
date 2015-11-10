<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters;

class Comment extends Model
{
    protected $table = "comments";

    use DatePresenter;


    public function post()
    {
    	return $this->belongsTo('App\Models\Post');
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function post()
    {
    	return $this->belongsTo('App\Models\Post');
    }
}
