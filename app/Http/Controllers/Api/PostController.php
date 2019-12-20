<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PostsCollection;
use App\Models\Post;
use App\Transformers\PostTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends ApiController
{
    private $count;
    private $day = 1;
    private $week = 7;
    private $month = 30;

    /**
     * PostController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        switch ($request->segment(4)) {
            case 'day':
                $this->count = $this->day;
                break;
            case 'week':
                $this->count = $this->week;
                break;
            case 'month':
                $this->count = $this->month;
                break;
        }
    }

    /**
     * @return PostsCollection
     */
    public function posts(): PostsCollection
    {
        return new PostsCollection(Post::where('created_at', '>=',
            DB::raw('DATE_SUB(NOW(), INTERVAL "' . $this->count . '" DAY)'))->orderBy('votes',
            'DESC')->orderBy('created_at', 'DESC')
            ->with('creator:id,username')
            ->with('comments:body')
            ->take(50)
            ->paginate(5));
    }

    /**
     * @return PostsCollection
     */
    public function all(): PostsCollection
    {
        return new PostsCollection(Post::orderBy('created_at', 'DESC')
            ->with('creator:id,username')
            ->with('comments:body')
            ->take(50)
            ->paginate(5));
    }

    /**
     * @return PostsCollection
     */
    public function favorite(): PostsCollection
    {
        return new PostsCollection(Post::orderBy('created_at', 'DESC')
            ->whereIn('author_id', \Auth::user()->getUserIdsAttribute())
            ->orWhereHas('hubs', function ($query) {
                $query->whereIn('hubs.id', \Auth::user()->getHubsIdsAttribute());
            })
            ->with('creator:id,username')
            ->with('comments:body')
            ->take(50)
            ->paginate(5));
    }

    public function show(Request $request)
    {
        return $this->respondWith(
            Post::orderBy('created_at', 'DESC')->paginate(10)->appends([ 'include' => $request->input('include')]),
            new PostTransformer
        );
    }
}
