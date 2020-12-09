<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\ArticlesResource;
use Carbon\Carbon;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ArticlesResource
     */
    public function index(): ArticlesResource
    {
        return new ArticlesResource(Article::with(array(
            'creator' => function ($query) {
                $query->select('id', 'username', 'avatar', 'about', 'karma', 'rating')->withCount('articles', 'followers');
            }
        ))->withcount('upvoters', 'downvoters',
            'voters', 'views', 'bookmarkers')->orderBy('created_at',
            'DESC')->take(50)->paginate(5));
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return ArticleResource
     */
    public function show($id): ArticleResource
    {
        ArticleResource::withoutWrapping();
        return new ArticleResource(Article::findOrFail($id));
    }

    /**
     * @return ArticlesResource
     */
    public function posts(): ArticlesResource
    {
        return new ArticlesResource(Article::withcount([
            'upvoters',
            'downvoters',
            'voters',
            'views',
            'bookmarkers',
            'comments'
        ])
            ->orderByRaw('(upvoters_count - downvoters_count) DESC')
            ->orderBy('created_at',
                'DESC')->where(
                'created_at',
                '>=',
                Carbon::now()->subDays(self::$count)->startOfDay()
            )->take(50)->paginate(5));
    }
}
