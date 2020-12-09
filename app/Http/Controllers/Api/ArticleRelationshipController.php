<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentsResource;
use App\Http\Resources\AuthorResource;
use App\Http\Resources\HubsResource;
use App\Models\Article;

class ArticleRelationshipController extends Controller
{
    public function author($id): AuthorResource
    {
        $post = Article::findOrFail($id);

        return new AuthorResource($post->creator);
    }

    public function comments($id): CommentsResource
    {
        $post = Article::findOrFail($id);

        return new CommentsResource($post->comments);
    }

    public function hubs($id): HubsResource
    {
        $post = Article::findOrFail($id);

        return new HubsResource($post->hubs);
    }
}
