<?php

namespace App\Http\Controllers\Redac;

use Illuminate\Http\Request as BaseRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Back\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Repositories\PostRepository;
use DB;
use Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostController extends Controller
{
    protected $itemPerPage = 10;

    protected $post_gestion;

    public function __construct(PostRepository $post_gestion)
    {
        $this->post_gestion = $post_gestion;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('seen', 'asc')->orderBy('created_at', 'desc')->paginate($this->itemPerPage);
        return view('redac.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = config('media.url');
        $categories = ['' => 'Chọn một nhóm'] + Category::where('is_active', 1)->lists('name', 'id')->toArray();
        return view('redac.posts.create', compact('url', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        try
        {
            $post = $this->post_gestion->storePost($request);
            $message = "Tạo bài viết thành công";
            $alertClass = "alert-success";
        } 
        catch(Exception $e)
        {
            $message = "Tạo bài viết lỗi";
            $alertClass = "alert-danger";
            return redirect(route('redac.posts.create'))->with(compact('message', 'alertClass'))->withInput();
        }

        return redirect(route('redac.posts.index'))->with(compact('message', 'alertClass'))->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            $post = Post::findOrFail($id);
            $tagsArr = [];

            foreach($post->tags as $tag) {
                array_push($tagsArr, $tag->tag);
            }

            $url = config('media.url');
            $categories = ['' => 'Chọn một nhóm'] + Category::where('is_active', 1)->lists('name', 'id')->toArray();
            return view('redac.posts.edit', compact('post', 'url', 'categories', 'tagsArr'));
        } 
        catch(ModelNotFoundException $e)
        {
            $message = "Bài viết không tồn tại.";
            $alertClass = "alert-danger";
            return redirect()->back()->with(compact('message', 'alertClass'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        try
        {
            $this->post_gestion->updatePost($request, $id);
            $message = "Bài viết đã cập nhật thành công";
            $alertClass = "alert-success";
            return redirect(route('redac.posts.index'))->with(compact('message', 'alertClass'));
        } catch(Exception $e) {
            $message = "Cập nhật bài viết lỗi.";
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
            $result['error'] = false;
            try{
                $this->post_gestion->destroyPost($id);
                $result['error'] = false;
            } catch(Exception $e){
                $result['error'] = true;
            }

            return response()->json($result);
        }
    }

    /**
    * Switch status published post of post
    * @param $idPost integer
    * @return void
    */
    public function publishedPost($idPost)
    {
        if(Request::ajax())
        {
            DB::beginTransaction();

            try{
                $post = Post::findOrFail($idPost);
                $post->is_active = ($post->is_active) ? 0 : 1;
                $post->save();
            } 
            catch(ModelNotFoundException $e)
            {
                DB::rollback();
                return response()->json(['error' => true]);
            }

            DB::commit();
        }
    }

    /**
    * Switch status seen of a post
    */
    public function seenPost($idPost)
    {
        if(Request::ajax())
        {
            DB::beginTransaction();

            try{
                $post = Post::findOrFail($idPost);
                $post->seen = ($post->seen) ? 0 : 1;
                $post->save();
            } 
            catch(ModelNotFoundException $e)
            {
                DB::rollback();
                return response()->json(['error' => true]);
            }

            DB::commit();
        }
    }

}
