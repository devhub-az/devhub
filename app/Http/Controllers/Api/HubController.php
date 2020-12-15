<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HubResource;
use App\Http\Resources\HubsResource;
use App\Models\Hub;

class HubController extends Controller
{
    /**
     * @return HubsResource
     */
    public function index(): HubsResource
    {
        return new HubsResource(Hub::withCount('articles')->paginate());
    }

    /**
     * @param $id
     *
     * @return HubResource
     */
    public function show($id): HubResource
    {
        HubResource::withoutWrapping();

        return new HubResource(Hub::findorfail($id));
    }

    /**
     * @return HubsResource
     */
    public function search_hub_by_key(): HubsResource
    {
        $key = \Request::get('q');
        $hub = Hub::where('name', 'LIKE', "%{$key}%")->paginate();

        return new HubsResource($hub);
    }
}

//    TODO: Remove comments
//
//    /**
//     * @var Hub
//     */
//    protected $hubs;
//
//    /**
//     * HubController constructor.
//     * @param Hub $hubs
//     */
//    public function __construct(Hub $hubs)
//    {
//        $this->hubs = $hubs;
//    }
//
//    /**
//     * API.
//     * @param int $id
//     * @return PostsCollection
//     */
//    public function posts(int $id)
//    {
//        return new PostsCollection(Post::orderBy('created_at', 'DESC')
//            ->whereHas('hubs', function ($query) use ($id) {
//                $query->where('hubs.id', '=', $id);
//            })
//            ->with('creator:id,username')
//            ->with('hubs:name')
//            ->with('comments:body')
//            ->paginate(5));
//    }
//
//    /**
//     * @param Request $request
//     * @return AnonymousResourceCollection
//     */
//    public function hubs(Request $request)
//    {
//        $query = $this->hubs->orderBy($request->column, $request->order);
//        $hubs = $query->withCount('posts', 'followers')->with('description')->paginate($request->per_page);
//
//        return HubCollection::collection($hubs);
//    }
//
//    /**
//     * For find Hubs.
//     * @return mixed
//     */
//    public function search()
//    {
//        $hubs = new HubsCollection(Hub::get());
//        return $hubs->all();
//    }
