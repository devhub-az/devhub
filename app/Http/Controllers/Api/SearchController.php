<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticlesResource;
use App\Http\Resources\AuthorsResource;
use App\Models\Article;
use App\Models\User;

class SearchController extends Controller
{
    /**
     * @param $search
     * @return ArticlesResource
     */
    public function articles($search): ArticlesResource
    {
        return new ArticlesResource(
            Article::where('title', 'LIKE', "%{$search}%")
                ->orderBy('created_at', 'DESC')
                ->take(50)->paginate(5)
        );
    }

    /**
     * @param $search
     * @return AuthorsResource
     */
    public function authors($search): AuthorsResource
    {
        return new AuthorsResource(
            User::where('username', 'LIKE', "%{$search}%")
                ->orderBy('created_at', 'DESC')
                ->take(50)->paginate(5)
        );
    }
}
