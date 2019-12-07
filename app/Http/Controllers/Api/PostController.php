<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PostsCollection;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
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
        return new PostsCollection(Post::where(\DB::raw('DATE(created_at)'), '=', \DB::raw('DATE_SUB(CURDATE(), INTERVAL ' . $this->count . ' DAY)'))->orderBy('votes', 'DESC')->orderBy('created_at', 'DESC')
            ->with('creator:id,username')
            ->with('comments:body')
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
            ->paginate(5));
    }
}
