<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Contact;
use App\Models\Comment;

use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\Front\ContactRequest;
use App\Http\Requests\Front\SearchRequest;
use App\Http\Requests\Front\CommentRequest;

class WebsiteController extends Controller
{
    protected $itemPerPage = 10;

    public function index()
    {
        $postSticky = Post::where('type', 2)->first();

        $posts = Post::where('is_active', 1)
                        ->where('seen', 1)
                        ->where('type', '!=', 2)
                        ->orderBy('created_at', 'desc')
                        ->paginate($this->itemPerPage);

        return view('website.index', compact('posts', 'postSticky'));
    }

    /**
     * Show a post
     * @param  integer $id id of a post
     * @return  Respos
     */
    public function show($id)
    {
        try
        {
            DB::beginTransaction();
            $post = Post::findOrFail($id);
            $nview = $post->nview;
            if(is_string($nview))
            {
                $nview = (int)$nview;
            }
            $nview++;
            $post->nview = $nview;
            $post->save();
            DB::commit();

            //Related post
            $relatedPost = Post::where('id', '!=', $id)
                                ->where('is_active', 1)
                                ->orderBy('created_at', 'desc')
                                ->take(5)
                                ->get();
            $url = config('media.url');
            return view('website.show', compact('post', 'relatedPost', 'url'));
        } 
        catch(ModelNotFoundException $e) 
        {
            DB::rollback();
            $message = "Không tồn tại bài viết hoặc bài viết chưa active.";
            $alertClass = "alert-danger";
            return redirect()->back()->with(compact('message', 'alertClass'));
        }
    }
    
    /**
     * Search posts for tag
     * @param  string $tag
     * @return Response
     */
    public function searchTag($tag)
    {
        try{
        
            $posts = Post::whereHas('tags', function($q) use ($tag){
                $q->where('tag', $tag);
            })->where('seen', 1)
            ->where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->paginate($this->itemPerPage);

            return view('website.index', compact('posts'));
        } catch(Exception $e){
            $message = "Không tồn tại bài viết nào cho tag";
            $alertClass = "alert-danger";
            return redirect(route('website.index'))->with(compact('message', 'alertClass'));
        }
    }

    public function searchCategory($id) 
    {
        try{
            $posts = Post::where('category_id', $id)
                            ->where('seen', 1)
                            ->where('is_active', 1)
                            ->orderBy('created_at', 'desc')
                            ->paginate($this->itemPerPage);
            return view('website.index', compact('posts'));
        } catch(Exception $e){
            $message = "Không tồn tại bài viết nào.";
            $alertClass = "alert-danger";
            return redirect(route('website.index'))->with(compact('message', 'alertClass'));
        }
    }

    public function search(SearchRequest $request)
    {
        try{
            $word = $request->input('search');
            $posts = Post::where('seen', 1)
                            ->where('is_active', 1)
                            ->orderBy('created_at', 'desc')
                            ->where('summary', 'like', '%'.$word.'%')
                            ->orWhere('content', 'like', '%'.$word.'%')
                            ->paginate($this->itemPerPage);
            return view('website.index', compact('posts'));
        } catch(Exception $e){
            $message = "Không tồn tại bài viết nào.";
            $alertClass = "alert-danger";
            return redirect(route('website.index'))->with(compact('message', 'alertClass'));
        }
    }

    public function comment(CommentRequest $request)
    {
        try{
            $inputs = $request->all();
            $inputs['user_id'] = auth()->user()->id;
            Comment::create($inputs);
            return redirect()->back();
        }catch(Exception $e){
            $message = "Tạo bình luận có lỗi.";
            $alertClass = "alert-danger";
            return redirect()->back()->with(compact('message', 'alertClass'));
        }
    }

    public function about()
    {
        return view('website.about');
    }

    public function contact()
    {
        return view('website.contact');
    }

    public function storeContact(ContactRequest $request)
    {
        try{
            $inputs = $request->all();
            Contact::create($inputs);
            $message = "Cảm ơn bạn đã đóng góp ý kiến. ChickenElectric sẽ nhanh chóng phản hồi lại.";
            $alertClass = "alert-success";
            return redirect(route('website.contact.index'))->with(compact('message', 'alertClass'));
        } catch(Exception $e){
            $message = "Tin nhắn không thể gửi đi";
            $alertClass = "alert-danger";
            return redirect(route('website.contact.index'))->with(compact('message', 'alertClass'))->withInput();
        }
    }

    /**
     * Confirm user when register
     * @param  string $register_token
     * @return Response
     */
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
