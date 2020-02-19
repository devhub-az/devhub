<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostsCollection;
use App\Http\Resources\PostShowCollection;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private int $count;
    private int $day = 1;
    private int $week = 7;
    private int $month = 30;

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
            \DB::raw('NOW() - INTERVAL ' . $this->count . ' DAY'))
            ->orderBy('votes', 'DESC')
            ->orderBy('created_at', 'DESC')
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
            ->whereIn('author_id', \Auth::user()->getUserIds())
            ->orWhereHas('hubs', function ($query) {
                $query->whereIn('hubs.id', \Auth::user()->getHubsIds());
            })
            ->with('creator:id,username')
            ->with('comments:body')
            ->take(50)
            ->paginate(5));
    }

    public function show(Request $request, int $id)
    {
        return new PostShowCollection(Post::findorfail($id));
    }
}
