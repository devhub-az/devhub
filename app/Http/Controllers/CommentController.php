<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Auth;
use App\Http\Requests\CommentUpload;
use Illuminate\Http\Response;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['newComment']]);
    }

    protected function total_comments(Post $post)
    {
        return DB::table('comments')->where('post_id', $post->id)->count();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CommentUpload $request
     * @return Response
     */

    public function newComment(CommentUpload $request)
    {
        $comment = new Comment();
        $comment->author_id = Auth::User()->id;
        $comment->post_id = $request->post_id;
        $comment->body = $request->body;
        $comment->save();
        return back();
    }
}
