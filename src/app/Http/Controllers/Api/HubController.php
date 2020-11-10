<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HubResource;
use App\Http\Resources\HubsResource;
use App\Models\Hub;

class HubController extends Controller
{

    public function index()
    {
        return new HubsResource(Hub::paginate());
    }

    public function show($id)
    {
        $hub = Hub::find($id);

        if (is_null($hub)) {
            return $this->sendError('Post not found.');
        }
        HubResource::withoutWrapping();

        return new HubResource($hub);
    }
}

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

