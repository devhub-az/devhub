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
    public function store(CommentRequest $request)
    {
        $this->dispatchNow(CreateComment::fromRequest($request));
    }
}
