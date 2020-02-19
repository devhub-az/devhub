<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostsCollection;
use App\Models\Post;


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
//        $commetnsIds = \Auth::user()->getCommentsIdsAttribute();
//        return new CommentsCollection(Comment::orderBy('created_at', 'DESC')
//            ->whereIn('post_id', $commetnsIds)
//            ->with('post')
//            ->paginate(6));
        $fav = Post::find(\Auth::user()->id)->favorites();
        return new PostsCollection(Post::find($fav));
//        dd($posts[1]);
//
//        return new CommentsCollection(Comment::orderBy('created_at', 'DESC')
//            ->with('post')
//            ->paginate(6));
    }
}
