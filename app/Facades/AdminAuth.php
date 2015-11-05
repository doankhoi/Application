<?php
namespace App\Facades;
use Illuminate\Support\Facades\Facade;

/**
* 
*/
class AdminAuth extends Facade
{
    /** 
    * Define function for valiadate user
    */
    protected static function getFacadeAccessor() { 
        return 'admin.driver_admin'; 
    }
}