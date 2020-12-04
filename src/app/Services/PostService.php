<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;

class PostService
{
    /**
     * @param string|null $orderBy
     * @return Builder
     */
    public static function getPosts(string $orderBy = null): Builder
    {
        $q = Article::with('creator:id,username,avatar')
            ->withcount('upvoters', 'downvoters', 'voters', 'views', 'bookmarkers', 'comments');


        if ($orderBy !== null) {
            $q->orderBy($orderBy, 'DESC');
        }

        return $q;
    }
}
