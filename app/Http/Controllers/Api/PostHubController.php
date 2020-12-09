<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostsCollection;
use App\Models\Article;
use App\Transformers\PostTransformer;
use Illuminate\Http\Request;

class PostHubController extends Controller
{
    private int $count;
    private int $day = 1;
    private int $week = 7;
    private int $month = 30;

    /**
     * PostController constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        switch ($request->segment(5)) {
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
     * @param int $id
     *
     * @return PostsCollection
     */
    public function posts(int $id): PostsCollection
    {
        return new PostsCollection(Article::where('created_at', '>=', \DB::raw('NOW() - INTERVAL '.$this->count.' DAY'))
            ->whereHas('hubs', function ($query) use ($id) {
                $query->where('hubs.id', '=', $id);
            })
            ->orderBy('created_at', 'DESC')
            ->with('creator:id,username')
            ->with('comments:body')
            ->take(50)
            ->paginate(5));
    }

    /**
     * @param int $id
     *
     * @return PostsCollection
     */
    public function all(int $id): PostsCollection
    {
        return new PostsCollection(Article::orderBy('created_at', 'DESC')
            ->whereHas('hubs', function ($query) use ($id) {
                $query->where('hubs.id', '=', $id);
            })
            ->with('creator:id,username')
            ->with('comments:body')
            ->take(50)
            ->paginate(5));
    }

    public function show(Request $request)
    {
        return $this->respondWith(
            Article::orderBy('created_at', 'DESC')->paginate(10)->appends(['include' => $request->input('include')]),
            new PostTransformer()
        );
    }
}
