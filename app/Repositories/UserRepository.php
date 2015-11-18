<?php
namespace App\Repositories;
use App\Repositories\BaseRepositories;
use App\Models\User;
use App\Models\Role;
use File;

/**
*  
*/
class UserRepository extends BaseRepositories
{
    protected $role;
    
    function __construct(User $user, Role $role)
    {
        $this->model = $user;
        $this->role = $role;
    }

    public function save($user, $inputs)
    {
        if (isset($inputs['role_id'])) 
        {
            $user->role_id = $inputs['role_id'];
        }
    }

    public function saveUser($user, $inputs)
    {
        
    }
}