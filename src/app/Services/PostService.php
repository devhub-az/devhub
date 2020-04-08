<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;

class PostService
{
    /**
     * @param string $orderBy
     * @return Builder
     */
    public static function getPosts(string $orderBy = null): Builder
    {
        $q = Post::with('creator:id,username,avatar')
            ->withCount('upvoters', 'downvoters', 'voters', 'views', 'bookmarkers', 'comments');


        if ($orderBy !== null) {
            $q->orderBy($orderBy, 'DESC');
        }

        return $q;
    }
}
