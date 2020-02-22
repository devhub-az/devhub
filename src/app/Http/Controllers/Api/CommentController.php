<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentsCollection;
use App\Models\Comment;

/**
 * Class CommentController
 *
 * @package \App\Http\Controllers\Api
 */
class CommentController extends Controller
{
    public function show(int $id)
    {
        return new CommentsCollection(Comment::where('post_id', $id)->get());
    }
}
