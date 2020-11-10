<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentsResource;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostsCollection;
use App\Models\Comment;
use App\Models\Post;


class SavedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function allPosts()
    {
        $fav = \Auth::user()->getPostsIds();
        return new PostsCollection(Post::whereIn('id',$fav)
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
        $fav = \Auth::user()->getCommentsIdsFavorite();
        return new CommentsResource(Comment::find($fav));
//        dd($posts[1]);
//
//        return new CommentsCollection(Comment::orderBy('created_at', 'DESC')
//            ->with('post')
//            ->paginate(6));
    }
}
