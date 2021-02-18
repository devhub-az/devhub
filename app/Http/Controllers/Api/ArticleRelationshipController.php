<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorResource;
use App\Http\Resources\CommentsResource;
use App\Http\Resources\HubsResource;
use App\Models\Article;

class ArticleRelationshipController extends Controller
{
    public function author($id): AuthorResource
    {
        $article = Article::findOrFail($id);

        return new AuthorResource($article->creator);
    }

    public function comments($article): CommentsResource
    {
        return new CommentsResource($article->comments);
    }

    public function hubs($article): HubsResource
    {
        dd($article->hubs);

        return new HubsResource($article->hubs);
    }
}
