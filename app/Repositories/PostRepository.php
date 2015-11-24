<?php
namespace App\Repositories;
use App\Repositories\BaseRepository;
use App\Http\Requests\Request;
use App\Models\Post;


class PostRepository extends BaseRepository
{
    
    function __construct(Post $post)
    {
        $this->model = $post;
    }

}