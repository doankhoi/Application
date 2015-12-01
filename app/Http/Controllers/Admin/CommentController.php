<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request as BaseRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Request;

class CommentController extends Controller
{
    protected $itemPerPage = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::orderBy('seen', 'asc')
                            ->orderBy('created_at', 'desc')
                            ->paginate($this->itemPerPage);

        return view('admin.comments.index', compact('comments'));
    }

    public function seenComment($id)
    {
        if(Request::ajax())
        {
            $result['error'] = false;
            try{
                $comments = Comment::findOrFail($id);
                $comments->seen = ($comments->seen) ? 0 : 1;
                $comments->save();
            } catch(Exception $e){
                $result['error'] = true;
            }

            return response()->json($result);
        }
    }

    public function destroy($id)
    {
        if(Request::ajax())
        {
            $result['error'] = false;
            try{
                $comment = Comment::findOrFail($id);
                $comment->delete();
            } catch (Exception $e) {
                $result['error'] = true;
            }

            return response()->json($result);
        }
    }
}
