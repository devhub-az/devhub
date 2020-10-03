<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentsCollection;
use App\Models\Comment;
use App\Models\Post;

/**
 * Class CommentController
 *
 * @package \App\Http\Controllers\Api
 */
class CommentController extends Controller
{
    public function show(int $id)
    {
        dd(Comment::getBranch('1',$id));
        return new CommentsCollection(Post::with('comments')->where('id', $id)->get()->pluck('comments')->first());

//        return new CommentsCollection(Comment::where('post_id', $id)->withCount('bookmarkers')->get());
    }
}
