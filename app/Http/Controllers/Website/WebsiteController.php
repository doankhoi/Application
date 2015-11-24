<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;

class WebsiteController extends Controller
{
    protected $itemPerPage = 10;

    public function index()
    {
        $posts = Post::where('is_active', 1)
                        ->where('seen', 1)
                        ->orderBy('created_at', 'desc')
                        ->paginate($this->itemPerPage);
                        
        return view('website.index', compact('posts'));
    }

    public function show($id)
    {

    }
    
    public function confirmUser($register_token)
    {
        $user = User::where('register_token', $register_token)->first();
        if(!is_null($user))
        {
        	$user->confirmed = true;
        	$user->save();
        }
        $message = "Tài khoản của bạn đã được kích hoạt. Hãy đăng nhập lại !";
        $alertClass = "alert-success";
        return redirect(route('website.index'))->with(compact('message', 'alertClass'));
    }
}
