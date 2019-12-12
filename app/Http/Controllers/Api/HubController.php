<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\HubCollection;
use App\Http\Resources\HubsCollection;
use App\Http\Resources\PostsCollection;
use App\Models\Hub;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class HubController extends Controller
{
    /**
     * @var Hub
     */
    protected $hubs;

    /**
     * HubController constructor.
     * @param Hub $hubs
     */
    public function __construct(Hub $hubs)
    {
        $this->hubs = $hubs;
    }

    /**
     * API
     * @param int $id
     * @return PostsCollection
     */
    public function posts(int $id)
    {
        return new PostsCollection(Post::orderBy('created_at', 'DESC')
            ->whereHas('hubs', function ($query) use ($id) {
                $query->where('hubs.id', '=', $id);
            })
            ->with('creator:id,username')
            ->with('hubs:name')
            ->with('comments:body')
            ->paginate(5));
    }

    /**
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function hubs(Request $request)
    {
        $query = $this->hubs->orderBy($request->column, $request->order);
        $hubs = $query->paginate($request->per_page);

        return HubCollection::collection($hubs);
    }

    /**
     * For find Hubs
     * @return mixed
     */
    public function search()
    {
        $hubs = new HubsCollection(Hub::get());
        return $hubs->all();
    }
}
