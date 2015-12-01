<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use App\Repositories\CommentRepository;
use App\Repositories\UserRepository;
use App\Repositories\ContactRepository;
use App\Http\Requests\Back\SiteRequest;
use App\Models\Admin;
use File;
use DB;

class AdminController extends Controller
{
	protected $post_gestion;
	protected $user_gestion;
	protected $comment_gestion;
	protected $contact_gestion;

 	public function __construct(PostRepository $post_gestion, UserRepository $user_gestion, CommentRepository $comment_gestion, ContactRepository $contact_gestion)   
 	{
 		$this->post_gestion = $post_gestion;
 		$this->user_gestion = $user_gestion;
 		$this->comment_gestion = $comment_gestion;
 		$this->contact_gestion = $contact_gestion;
 	}

    public function index()
    {
    	$nbrPosts = $this->post_gestion->getNumber();
    	$nbrUsers = $this->user_gestion->getNumber();
    	$nbrComments = $this->comment_gestion->getNumber();
    	$nbrMessages = $this->contact_gestion->getNumber();
        return view('admin.index', compact('nbrPosts', 'nbrComments', 'nbrUsers', 'nbrMessages'));
    }

    public function siteInfo()
    {
        $admin = Admin::first();
        return view('admin.site.info', compact('admin'));
    }

    public function siteEdit($id)
    {   
        $url = config('media.url');
        $admin = Admin::findOrFail($id);
        return view('admin.site.siteedit', compact('admin', 'url'));
    }

    public function siteUpdate(SiteRequest $request, $id)
    {
        DB::beginTransaction();
        try{
            $inputs = $request->all();
            $admin = Admin::findOrFail($id);
            $oldImageAdmin = "";
            $oldImageLogo = "";
            $dest_path = public_path().config('model.admin.path_folder_photo_website');

            if($request->hasFile('image_admin'))
            {
                $inputs['image_admin'] = $this->__storeImage($request->file('image_admin'));
                $oldImageAdmin = $dest_path.$admin->image_admin;
            }

            if($request->hasFile('logo_site'))
            {
                $inputs['logo_site'] = $this->__storeImage($request->file('logo_site'));
                $oldImageLogo = $dest_path.$admin->logo_site;
            }

            $admin->fill($inputs);
            $admin->save();

            if(File::exists($oldImageLogo))
            {
                File::delete($oldImageLogo);
            }

            if(File::exists($oldImageAdmin))
            {
                File::delete($oldImageAdmin);
            }
        } catch(Exception $e){
            $message = "Cập nhật thông tin lỗi";
            $alertClass = "alert-danger";
            DB::rollback();
            return redirect()->back()->with(compact('message', 'alertClass'))->withInput();
        }
        DB::commit();
        $message = "Cập nhật thông tin thành công.";
        $alertClass = "alert-success";
        return redirect(route('admin.site.index'))->with(compact('message', 'alertClass'));
    }

    private function __storeImage($file)
    {
        $nameImage = $file->getClientOriginalName();
        $extensionImage = $file->getClientOriginalExtension();
        $newNameImage = sha1($nameImage).time().".".$extensionImage;
        $desPath = public_path().config('model.admin.path_folder_photo_website');
        $file->move($desPath, $newNameImage);
        return $newNameImage;
    }
}
