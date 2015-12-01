<?php

namespace App\Http\Controllers\Redac;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RedacController extends Controller
{
    public function filemanager()
    {
        $url = config('media.url');
        
        return view('redac.filemanager', compact('url'));
    }
}
