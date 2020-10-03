<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostsCollection;
use App\Http\Resources\PostShowCollection;
use App\Models\Hub;
use App\Models\Post;
use App\Services\PostService;
use Carbon\Carbon;
use Exception;
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
                Carbon::now()->subDays(self::$count)->startOfDay()
            )->take(50)->paginate(5));
    }

    /**
     * @return PostsCollection
     * @throws Exception
     */
    public function all(): PostsCollection
    {
        return new PostsCollection(PostService::getPosts('created_at')->take(50)->paginate(5));
    }

    /**
     * @return PostsCollection
     */
    public function favorite(): PostsCollection
    {
        $hubs = \Auth::user()->followings(Hub::class)->with('posts')->get();
        $users = \Auth::user()->followings()->with('posts')->get();
        $hubPostIds = $this->favoriteIds($hubs);
        $userPostIds = $this->favoriteIds($users);
        $postIds = array_merge($hubPostIds, $userPostIds);
        return new PostsCollection(
            Post::whereIn('id', $postIds)
                ->withCount('upvoters', 'downvoters', 'voters', 'views', 'bookmarkers', 'comments')
                ->take(50)
                ->orderBy('created_at', 'DESC')
                ->paginate(5)
        );
    }

    /**
     * @param object $items
     * @return array
     */
    public function favoriteIds(object $items): array
    {
        $itemIds = [];
        foreach ($items as $item) {
            foreach ($item->posts as $post) {
                $itemIds[] = $post->id;
            }
        }
        return $itemIds;
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

    public function upload_image(Request $request)
    {
        $user = \Auth::user();

        $post_image = $user->id . '_upload' . time() . '.' . request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('cache', $post_image);

        return back()->with('success', 'You have successfully upload image.');
    }
}
