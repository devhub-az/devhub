<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Hubs;
use App\Http\Resources\PostsCollection;
use App\Http\Resources\HubsCollection;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
    	// $this->validate(request(), [
    	// 	'name'=>'required|max:40',
    	// ]);
    	$query = request()->search;

    	$hubs = collect();
    	$posts = collect();

    	if($query){
    		$hubs = new HubsCollection(Hubs::where('name', 'LIKE', "%{$query}%")->get());
    		$posts = new PostsCollection(Post::where('name', 'LIKE', "%{$query}%")->get());
    	}

    	return view('pages.search-result', ['hubs' => $hubs, 'posts' => $posts], compact('query'));
    }
}
