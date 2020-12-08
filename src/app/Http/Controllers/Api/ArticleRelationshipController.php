<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentsResource;
use App\Http\Resources\AuthorsResource;
use App\Http\Resources\AuthorResource;
use App\Models\Article;

class ArticleRelationshipController extends Controller
{
    public function author($id): AuthorResource
    {
        $post = Article::find($id);

        if (is_null($post)) {
            return $this->sendError('Post not found.');
        }
        return new AuthorResource($post->author);
    }

    public function comments($id): CommentsResource
    {
        $post = Article::find($id);

        if (is_null($post)) {
            return $this->sendError('Post not found.');
        }
        return new CommentsResource($post->comments);
    }

    public function hubs($id): AuthorsResource
    {
        $post = Article::find($id);

        if (is_null($post)) {
            return $this->sendError('Post not found.');
        }
        return new AuthorsResource($post->hubs);
    }
}
