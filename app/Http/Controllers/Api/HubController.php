<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\HubCollection;
use App\Http\Resources\HubsCollection;
use App\Http\Resources\PostsCollection;
use App\Models\Hub;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class HubController extends Controller
{
    /**
     * API
     * @param int $id
     * @return PostsCollection
     */
    public function posts(int $id)
    {
        return new PostsCollection(Post::orderBy('created_at', 'DESC')
            ->whereHas('hubs', function ($query) use($id) {
                $query->where('hubs.id', '=', $id);
            })
            ->with('creator:id,username')
            ->with('hubs:name')
            ->with('comments:body')
            ->paginate(5));
    }

    /**
     * @return HubsCollection
     */
    public function hubs(){
        return new HubsCollection(Hub::orderBy('rating','DESC')->paginate(10));
    }

    /**
     * For find Hubs
     * @return mixed
     */
    public function search(){
        $hubs = new HubsCollection(Hub::get());
        return $hubs->all();
    }
}
