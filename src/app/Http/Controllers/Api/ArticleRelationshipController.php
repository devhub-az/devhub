<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentsResource;
use App\Http\Resources\HubsResource;
use App\Http\Resources\UserCollection;
use App\Models\Post;

class ArticleRelationshipController extends Controller
{
    public function author($id): UserCollection
    {
        $post = Post::find($id);

        if (is_null($post)) {
            return $this->sendError('Post not found.');
        }
        return new UserCollection($post->author);
    }

    public function comments($id): CommentsResource
    {
        $post = Post::find($id);

        if (is_null($post)) {
            return $this->sendError('Post not found.');
        }
        return new CommentsResource($post->comments);
    }

    public function hubs($id): HubsResource
    {
        $post = Post::find($id);

        if (is_null($post)) {
            return $this->sendError('Post not found.');
        }
        return new HubsResource($post->hubs);
    }
}
