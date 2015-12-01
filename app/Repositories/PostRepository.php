<?php
namespace App\Repositories;
use App\Repositories\BaseRepository;
use App\Http\Requests\Request;
use App\Models\Post;
use App\Models\Tag;
use DB;
use File;

class PostRepository extends BaseRepository
{
    
    function __construct(Post $post)
    {
        $this->model = $post;
    }

    /**
     * Store new a Post
     * @param  Request $request
     * @return Post
     */
    public function storePost(Request $request)
    {
        DB::beginTransaction();
        try {
            $inputs = $request->all();
            $inputs['user_id'] = auth()->user()->id;
            if ($request->hasFile('images')) 
            {
                $imagesFile = $request->file('images');
                $inputs['images'] = $this->__storeImagePost($imagesFile);
            }

            if($inputs['type'] == 2)
            {
                $this->__changeStickyPost();
            }

            $post = Post::create($inputs);
            $this->__saveTags($post, $inputs['tags']);
        } 
        catch(Exception $e)
        {
            DB::rollback();
            throw new Exception("Error Processing Request", 1);
        }

        DB::commit();
        return $post;
    }

    /**
     * Update post
     * @param  Request $request 
     * @param  int  $id      
     * @return void
     */
    public function updatePost(Request $request, $id)
    {
        DB::beginTransaction();
        try
        {
            $post = Post::findOrFail($id);
            $oldImage = "";
            $inputs = $request->all();
            if($request->hasFile('images'))
            {
                $oldImage = public_path().config('model.posts.path_folder_photo_post').$post->images;
                $imageFile = $request->file('images');
                $inputs['images'] = $this->__storeImagePost($imageFile);
            }
            else
            {
                unset($inputs['images']);
            }

            if($inputs['type'] == 2)
            {
                $this->__changeStickyPost($id);
            }
            
            $post->fill($inputs);
            $post->save();

            if(strlen($oldImage) != 0)
            {
                if(File::exists($oldImage))
                {
                    File::delete($oldImage);
                }
            }
        }
        catch (Exception $e)
        {
            DB::rollback();
            throw new Exception("Error Processing Request", 1);
        }

        DB::commit();
    }

    public function destroyPost($id)
    {
        try{
            $post = Post::findOrFail($id);
            $post->tags()->detach();
            $oldImage = public_path().config('model.posts.path_folder_photo_post').$post->images;
            if(File::exists($oldImage)){
                File::delete($oldImage);
            }
            
            $post->delete();
        } catch(Exception $e){
            throw new Exception("Error Processing Request", 1);
        }
    }

    /**
     * Get post recent and popular
     * @return array
     */
    public function recentAndPopularPosts(){
        $postRecents = Post::where('is_active', 1)
                        ->where('seen', 1)
                        ->orderBy('created_at', 'desc')->limit(3);
        $postPopular = Post::where('is_active', 1)
                        ->where('seen', 1)
                        ->orderBy('nview', 'desc')->limit(3);

        $result['recents'] = $postRecents;
        $result['popular'] = $postPopular;
        return $result;
    }

    /**
     * Save tag
     */
    private function __saveTags($post, $tags)
    {
        if(strlen($tags) == 0)
            return;

        $tagsArray = [];
        $tagsArray = explode(',', $tags);
        foreach ($tagsArray as $tag)
        {
            $tagObj = Tag::where('tag', $tag)->first();
            if(is_null($tagObj))
            {
                $tagModel = new Tag();
                $tagModel->tag = $tag;
                $post->tags()->save($tagModel);
            } else {
                $post->tags()->attach($tagObj->id);
            }
        }
    }

    /**
     * Store image of post
     * @param  UploadFile $imagesFile
     * @return string  [new name image]
     */
    private function __storeImagePost($imagesFile)
    {
        $nameImage = $imagesFile->getClientOriginalName();
        $extensionImage = $imagesFile->getClientOriginalExtension();
        $newNameImage = sha1($nameImage).time().".".$extensionImage;
        $desPath = public_path().config('model.posts.path_folder_photo_post');
        $imagesFile->move($desPath, $newNameImage);
        return $newNameImage;
    }

    private function __changeStickyPost($id = null)
    {
        try{
            $post = "";
            if(!is_null($id))
            {
                $post = Post::where('id', '<>', $id)
                            ->where('type', 2)
                            ->first();
            }
            else
            {
                $post = Post::where('type', 2)
                            ->first();
            }
            
            if(!is_null($post))
            {
                $post->type = 1;
                $post->save();
            }
        } catch(Exception $e){
            throw new Exception("Error Processing Request", 1);
        }
    }
}