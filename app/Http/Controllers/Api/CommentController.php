<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Http\Resources\CommentsResource;
use App\Jobs\CreateComment;
use App\Models\Comment;

/**
 * Class CommentController.
 */
class CommentController extends Controller
{
    public function index()
    {
        return new CommentsResource(Comment::with(['author'])->paginate());
    }

    public function show($id)
    {
        $comment = Comment::find($id);

        if (is_null($comment)) {
            return $this->sendError('Post not found.');
        }
        CommentResource::withoutWrapping();

        return new CommentResource($comment);
    }

    public function store(CommentRequest $request)
    {
        $article = $this->dispatchNow(CreateComment::fromRequest($request));

        dd($article);
    }
}
