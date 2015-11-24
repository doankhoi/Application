<?php
namespace App\Services;

/**
* Get information authenticate  current user
*/
class Status
{
    
    public function setLoginStatus($user)
    {
        session()->put('status', $user->role->slug);
    }

    public function setVisitorStatus()
    {
        session()->put('status', 'visitor');
    }

    public function setStatus()
    {
        if(!session()->has('status'))
        {
            session()->put('status', auth()->check() ?  auth()->user()->role->slug : 'visitor');
        }
    }
}