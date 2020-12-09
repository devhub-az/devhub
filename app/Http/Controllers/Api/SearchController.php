<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Search;
use App\Http\Resources\PostsCollection;
use App\Models\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * @param Search $search
     *
     * @return PostsCollection
     */
    public function results(Request $search): PostsCollection
    {
        return new PostsCollection(Article::whereraw("MATCH(name) AGAINST ('".$search->get('search')."')")
            ->take(50)
            ->orderBy('created_at', 'DESC')
            ->paginate(5));
    }
}
