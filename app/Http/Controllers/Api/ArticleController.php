<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\ArticlesResource;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ArticlesResource
     */
    public function index(): ArticlesResource
    {
        return new ArticlesResource(
            Article::with(
                [
                    'creator' => function ($query) {
                        $query->select('id', 'username', 'avatar', 'about', 'karma', 'rating')->withCount(
                            'articles',
                            'followers'
                        );
                    },
                ]
            )->withcount(
                'upvoters',
                'downvoters',
                'voters',
                'views',
                'bookmarkers'
            )->orderBy(
                'created_at',
                'DESC'
            )->take(50)->paginate(5)
        );
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *
     * @return ArticleResource
     */
    public function show($id): ArticleResource
    {
        ArticleResource::withoutWrapping();

        return new ArticleResource(
            Article::withcount(
                'upvoters',
                'downvoters',
                'voters',
                'views',
                'bookmarkers'
            )->findOrFail($id)
        );
    }
}
