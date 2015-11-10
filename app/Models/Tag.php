<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters;

class Tag extends Model
{
    protected $table = "tags";

    use DatePresenter;

    public function posts()
    {
    	return $this->hasMany('App\Models\Posts');
    }
}
