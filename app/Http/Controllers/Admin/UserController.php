<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request as BaseRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Request;
use App\Http\Requests\Back\UserRequest;
use File;

class UserController extends Controller
{

    protected $itemPerPage = 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('seen', 'asc')
                        ->orderBy('created_at', 'desc')
                        ->paginate($this->itemPerPage);

        $roles = Role::all();

        $counts['total'] = User::count();
        foreach ($roles as $role) {
            $slug = $role->slug;
            $counts[$slug] = User::whereHas('role', function($q) use($slug) {
                $q->whereSlug($slug);
            })->count();
        }

        return view('admin.users.index', compact('users', 'roles', 'counts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::lists('title', 'id');
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try{
            $inputs = $request->all();
            $inputs['password'] = bcrypt($inputs['password']);
            User::create($inputs);

            $message = "Tạo người dùng thành công";
            $alertClass = "alert-success";
            return redirect(route('admin.users.index'))->with(compact('message', 'alertClass'));
        } catch(Exception $e){
            $message = "Tạo người dùng lỗi";
            $alertClass = "alert-danger";
            return redirect()->back()->with(compact('message', 'alertClass'));
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $user = User::findOrFail($id);
            $roles = Role::lists('title', 'id');
            return view('admin.users.edit', compact('user', 'roles'));
        } catch (Exception $e){

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        try{
            $inputs = $request->all();
            if(isset($inputs['is_active']))
                $inputs['is_active'] = 1;
            else
                $inputs['is_active'] = 0;

            $user = User::findOrFail($id);
            $user->fill($inputs);
            $user->save();
            $message = "Cập nhật thành công.";
            $alertClass = "alert-success";
            return redirect(route('admin.users.index'))->with(compact('message', 'alertClass'));
        } catch(Exception $e) {
            $message = "Cập nhật không thành công.";
            $alertClass = "alert-danger";
            return redirect()->back()->with(compact('message', 'alertClass'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Request::ajax())
        {
            try{
                $result['error'] = false;
                $user = User::findOrFail($id);
                $oldImage = public_path().config('model.user_info.path_folder_photo_user').$user->photo;
                if(File::exists($oldImage))
                {
                    File::delete($oldImage);
                }
                $user->comments()->delete();
                $user->info()->delete();
                $user->delete();
            } catch(Exception $e){
                $result['error'] = true;
            }

            return response()->json($result);
        }
        
    }

    public function sortUser($slug)
    {
        $users = User::whereHas('role', function($q) use($slug) {
                            $q->where('slug', $slug);
                        })
                        ->orderBy('seen', 'asc')
                        ->orderBy('created_at', 'desc')
                        ->paginate($this->itemPerPage);
        $roles = Role::all();

        $counts['total'] = User::count();
        foreach ($roles as $role) {
            $slug = $role->slug;
            $counts[$slug] = User::whereHas('role', function($q) use($slug) {
                $q->whereSlug($slug);
            })->count();
        }

        return view('admin.users.index', compact('users', 'roles', 'counts'));
    }

    public function seenUser($id)
    {
        if(Request::ajax())
        {
            $result['error'] = false;

            try{
                $user = User::findOrFail($id);
                $user->seen = ($user->seen) ? 0 : 1;
                $user->save();
            } catch(Exception $e){
                $result['error'] = true;
            }

            return response()->json($result);
        }
    }
}
