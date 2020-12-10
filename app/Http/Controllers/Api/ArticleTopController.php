<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticlesResource;
use App\Models\Article;
use App\Models\Hub;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleTopController extends Controller
{
    private static $count;

    /**
     * PostController constructor.
     *
     * @param Request $request
     * @param int     $day
     * @param int     $week
     * @param int     $month
     */
    public function __construct(Request $request, int $day = 1, int $week = 7, int $month = 30)
    {
        switch ($request->segment(3)) {
            case 'day':
                self::$count = $day;
                break;
            case 'week':
                self::$count = $week;
                break;
            case 'month':
                self::$count = $month;
                break;
        }
    }

    /**
     * @return ArticlesResource
     */
    public function posts(): ArticlesResource
    {
        return new ArticlesResource(Article::withcount([
            'upvoters',
            'downvoters',
            'voters',
            'views',
            'bookmarkers',
            //            'comments'
        ])
            ->orderByRaw('(upvoters_count - downvoters_count) DESC')
            ->orderBy(
                'created_at',
                'DESC'
            )->where(
                'created_at',
                '>=',
                Carbon::now()->subDays(self::$count)->startOfDay()
            )->take(50)->paginate(5));
    }

    /**
     * @return ArticlesResource
     */
    public function favorite(): ArticlesResource
    {
        $hubs = Auth::user()->followings(Hub::class)->with('posts')->get();
        $users = Auth::user()->followings()->with('posts')->get();
        $hubPostIds = $this->favoriteIds($hubs);
        $userPostIds = $this->favoriteIds($users);
        $postIds = array_merge($hubPostIds, $userPostIds);

        return new ArticlesResource(
            Article::whereIn('id', $postIds)
                ->withCount(['upvoters', 'downvoters', 'voters', 'views', 'bookmarkers', 'comments'])
                ->take(50)
                ->orderBy('created_at', 'DESC')
                ->paginate(5)
        );
    }

    /**
     * @param object $items
     *
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
}
