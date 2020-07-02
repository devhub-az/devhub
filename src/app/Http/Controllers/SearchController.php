<?php

namespace App\Http\Controllers;

use App\Http\Resources\HubsCollection;
use App\Http\Resources\PostsCollection;
use App\Models\Hub;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = request()->search;

        $hubs = [];
        $posts = collect();

        if ($query) {
            $posts = new PostsCollection(Post::whereraw("MATCH(name) AGAINST ('" . $query . "')")->get());
        }

        dd($posts->toResponse($request)->getData());
        return view('pages.search-result', ['hubs' => $hubs, 'posts' => $posts->toResponse($request)->getData()->data], compact('query'));
    }
}
