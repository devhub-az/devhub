<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Jobs\CreateComment;

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
