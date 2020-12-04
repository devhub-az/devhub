<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentsResource;
use App\Http\Resources\HubsResource;
use App\Http\Resources\UserResource;
use App\Models\Article;

class ArticleRelationshipController extends Controller
{
    public function author($id): UserResource
    {
        $post = Article::find($id);

        if (is_null($post)) {
            return $this->sendError('Post not found.');
        }
        return new UserResource($post->author);
    }

    public function comments($id): CommentsResource
    {
        $post = Article::find($id);

        if (is_null($post)) {
            return $this->sendError('Post not found.');
        }
        return new CommentsResource($post->comments);
    }

    public function hubs($id): HubsResource
    {
        $post = Article::find($id);

        if (is_null($post)) {
            return $this->sendError('Post not found.');
        }
        return new HubsResource($post->hubs);
    }
}
