<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostsCollection;
use App\Http\Resources\PostShowCollection;
use App\Models\Hub;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @var int
     */
    private static int $count;

    private int        $day = 1;

    private int        $week = 7;

    private int        $month = 30;

    /**
     * PostController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        switch ($request->segment(4)) {
            case 'day':
                self::$count = $this->day;
                break;
            case 'week':
                self::$count = $this->week;
                break;
            case 'month':
                self::$count = $this->month;
                break;
        }
    }

    /**
     * @return PostsCollection
     */
    public function posts(): PostsCollection
    {
        return new PostsCollection(PostService::getPosts()
            ->orderByRaw('(upvoters_count - downvoters_count) DESC')
            ->orderBy('created_at',
                'DESC')->where(
                'created_at',
                '>=',
                \Carbon\Carbon::now()->subDays(self::$count)->startOfDay()
            )->take(50)->paginate(5));
    }

    /**
     * @return PostsCollection
     */
    public function all(): PostsCollection
    {
//        return \Cache::remember(
//            'posts',
//            60,
//            static function () {
        return new PostsCollection(PostService::getPosts('created_at')->take(50)->paginate(5));
//            }
//        );
    }

    /**
     * @return PostsCollection
     */
    public function favorite(): PostsCollection
    {
        return new PostsCollection(
            Post::orderBy('created_at', 'DESC')
                ->followings(Hub::class)
                ->followings()
                ->take(50)
                ->paginate(5)
        );
    }

    /**
     * @param int $id
     * @return PostShowCollection
     */
    public function show(int $id): PostShowCollection
    {
        return new PostShowCollection(
            Post::with('creator:id,username')
                ->withCount('upvoters', 'downvoters', 'voters', 'views', 'bookmarkers', 'comments')->findorfail($id)

        );
    }
}
