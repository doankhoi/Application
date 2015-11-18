<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters;

class Contact extends Model
{
    protected $table = "contacts";

    use DatePresenter; 

}
