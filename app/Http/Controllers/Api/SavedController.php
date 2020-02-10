<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostsCollection;
use App\Models\Post;
use Illuminate\Http\Request;


class SavedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function allPosts()
    {
        $postsIds = \Auth::user()->getPostsIdsAttribute();
//        var_dump($postsIds);
//        dd();
        return new PostsCollection(Post::orderBy('created_at', 'DESC')
            ->whereIn('id', $postsIds)
            ->with('creator:id,username')
            ->with('comments:body')
            ->take(50)
            ->paginate(5));
    }

    function allComments()
    {

    }
}
