<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticlesResource;
use App\Models\Article;
use App\Models\Hub;
use App\Models\User;
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
//        TODO: SORT BY BEST VOTED
        return new ArticlesResource(
            Article::with('hubs')
                ->withcount(
                    [
                        'views',
                        //            'bookmarkers',
                        //            'comments'
                    ]
                )
//                ->orderBy( 'countTotalVotes', 'DESC')
                ->orderBy(
                    'created_at',
                    'DESC'
                )->where(
                    'created_at',
                    '>=',
                    Carbon::now()->subDays(self::$count)->startOfDay()
                )->take(50)
                ->paginate(5)
        );
    }

    /**
     * @param Request $request
     * @return ArticlesResource
     */
    public function favorite(Request $request): ArticlesResource
    {
        $author = User::findOrFail($request->user()->id);
        if ($author->followings->count() > 0) {
            $authorsIds        = $author->followings->pluck('id');
            $articleAuthors    = User::with('articles')->select('id')->whereIn('id', $authorsIds)->get();
            $articleAuthorsIds = $this->favoriteIds($articleAuthors);
        }
        if ($author->getFavoriteItems(Hub::class)->count() > 0) {
            $hubsIds        = $author->getFavoriteItems(Hub::class)->pluck('id');
            $articleHubs    =
                Hub::with('articles')->withCount('articles')->select('id')->whereIn('id', $hubsIds)->get();
            $articleHubsIds = $this->favoriteIds($articleHubs);
        }
        $articlesIds = array_merge($articleAuthorsIds ?? [], $articleHubsIds ?? []);

        return new ArticlesResource(
            Article::with('hubs')
                ->withCount(['views'])
                ->whereIn('id', $articlesIds)
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
    public function favoriteIds(object $items)
    {
        $itemIds = [];

        foreach ($items as $i => $item) {
            if ($item->articles) {
                foreach ($item->articles->pluck('id') as $article) {
                    $itemIds[] = $article;
                }
            }
        }

        return $itemIds;
    }
}
