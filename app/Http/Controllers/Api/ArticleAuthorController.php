<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ArticlesResource;
use App\Models\Article;

/**
 * Class ArticleHubController.
 */
class ArticleAuthorController
{
    /**
     * @param string $id
     * @return ArticlesResource
     */
    public function articles(string $id): ArticlesResource
    {
        return new ArticlesResource(
            Article::with('hubs', 'author', 'comments')
                ->withcount(
                    'views',
                    'comments'
                )
                ->orderBy(
                    'created_at',
                    'DESC'
                )->where('author_id', $id)
                ->take(50)->paginate(10)
        );
    }
}
