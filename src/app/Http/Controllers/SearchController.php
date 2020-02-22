<?php

namespace App\Http\Controllers;

use App\Http\Resources\HubsCollection;
use App\Http\Resources\PostsCollection;
use App\Models\Hub;
use App\Models\Post;

class SearchController extends Controller
{
    public function index()
    {
        $query = request()->search;

        $hubs = collect();
        $posts = collect();

        if ($query) {
            $hubs = new HubsCollection(Hub::where('name', 'LIKE', "%{$query}%")->get());
            $posts = new PostsCollection(Post::where('name', 'LIKE', "%{$query}%")->get());
        }

        return view('pages.search-result', ['hubs' => $hubs, 'posts' => $posts], compact('query'));
    }
}
