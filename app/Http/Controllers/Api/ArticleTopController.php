<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticlesResource;
use App\Models\Article;
use App\Models\Hub;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleTopController extends Controller
{
    private static int $count;

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
        self::$count = match ($request->segment(4)) {
            'day' => $day,
            'week' => $week,
            'month' => $month,
        };
    }

    /**
     * @return ArticlesResource
     */
    public function articles(): ArticlesResource
    {
        $articles = Article::with('hubs')
            ->withcount('views')
            ->orderBy(
                'created_at',
                'DESC'
            )->where(
                'created_at',
                '>=',
                Carbon::now()->subDays(self::$count)->startOfDay()
            );
        $paginated = $articles->paginate(10);

        $sorted = $articles->get()->sortByDesc(
            function ($articles) {
                $articles->up = $articles->upVoters()->count();
                $articles->down = $articles->downVoters()->count();
                if ($articles->up === 0) {
                    return -$articles->down;
                }
                $n = $articles->up + $articles->down;
                $z = 1.64485; //1.0 = 85%, 1.6 = 95%
                $phat = $articles->up / $n;
                $articles->num =
                    ($phat + $z * $z / (2 * $n) - $z * SQRT(($phat * (1 - $phat) + $z * $z / (4 * $n)) / $n)) / (1
                        + $z * $z / $n);

                return $articles->num;
            }
        )->take(50);

        $articles = new LengthAwarePaginator($sorted, $paginated->total(), $paginated->perPage());

        return new ArticlesResource($articles);
    }

    /**
     * @param Request $request
     * @return ArticlesResource
     */
    public function favorite(Request $request): ArticlesResource
    {
        $author = User::findOrFail($request->user()->id);
        if ($author->followings->count() > 0) {
            $authorsIds = $author->followings->pluck('id');
            $articleAuthors = User::with('articles')->select('id')->whereIn('id', $authorsIds)->get();
            $articleAuthorsIds = $this->favoriteIds($articleAuthors);
        }
        if ($author->getFavoriteItems(Hub::class)->count() > 0) {
            $hubsIds = $author->getFavoriteItems(Hub::class)->pluck('id');
            $articleHubs =
                Hub::with('articles')->withCount('articles')->select('id')->whereIn('id', $hubsIds)->get();
            $articleHubsIds = $this->favoriteIds($articleHubs);
        }
        $articlesIds = array_merge($articleAuthorsIds ?? [], $articleHubsIds ?? []);

        $articles = Article::with('hubs')
            ->withCount(['views'])
            ->whereIn('id', $articlesIds)
            ->take(50)
            ->orderBy('created_at', 'DESC')
            ->paginate(5);

        return new ArticlesResource($articles);
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
            if ($item->articles) {
                foreach ($item->articles->pluck('id') as $article) {
                    $itemIds[] = $article;
                }
            }
        }

        return $itemIds;
    }
}
