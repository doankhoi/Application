<?php
namespace App\Repositories;
use App\Repositories\BaseRepository;
use App\Http\Requests\Request;
use App\Models\Comment;


class CommentRepository extends BaseRepository
{
    
    function __construct(Comment $comment)
    {
        $this->model = $post;
    }

}