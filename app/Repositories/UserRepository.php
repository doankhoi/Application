<?php
namespace App\Repositories;
use App\Repositories\BaseRepository;
use App\Http\Requests\Request;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\Role;
use File;
use DB;

/**
*  
*/
class UserRepository extends BaseRepository
{
    
    function __construct(User $user)
    {
        $this->model = $user;
    }

    
    public function storeUserRegister(Request $request)
    {
        DB::beginTransaction();
        try {
            $inputs = $request->all();
            if ($request->hasFile('photo')) 
            {
                $photoFile = $request->file('photo');
                $inputs['photo'] = $this->__storeImageUser($photoFile);
            }
            else
            {
                unset($inputs['photo']);
            }

            $role = Role::where('slug', 'user')->first();
            $inputs['role_id'] = $role->id;
            $inputs['register_token'] = str_random(30);
            $inputs['password'] = bcrypt($inputs['password']);
            $user = User::create($inputs);

            $inputs['user_id'] = $user->id;
            UserInfo::create($inputs);
        } 
        catch(Exception $e)
        {
            DB::rollback();
        }
        DB::commit();
        return $user;
    }

    private function __storeImageUser($uploadFile)
    {
        $nameImage = $uploadFile->getClientOriginalName();
        $extensionImage = $uploadFile->getClientOriginalExtension();
        $newNameImage = sha1($nameImage).time().".".$extensionImage;
        $desPath = public_path().config('model.user_info.path_folder_photo_user');
        $uploadFile->move($desPath, $newNameImage);
        return $newNameImage;
    }
}