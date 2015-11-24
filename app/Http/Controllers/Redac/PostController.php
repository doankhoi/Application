<?php

namespace App\Http\Controllers\Redac;

use Illuminate\Http\Request as BaseRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Back\PostRequest;
use App\Models\Category;
use App\Models\Post;
use DB;
use Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostController extends Controller
{
    protected $itemPerPage = 10;

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
        DB::beginTransaction();
        try
        {
            $inputs = $request->all();
            $inputs['user_id'] = auth()->user()->id;
            Post::create($inputs);
            $message = "Tạo bài viết thành công";
            $alertClass = "alert-success";
        } 
        catch(Exception $e)
        {
            $message = "Tạo bài viết lỗi";
            $alertClass = "alert-danger";
            DB::rollback();
            return redirect(route('redac.posts.create'))->with(compact('message', 'alertClass'))->withInput();
        }
        DB::commit();

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
