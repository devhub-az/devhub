<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ArticlesResource;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class ArticleHubController.
 */
class ArticleHubController
{
    private static int $count = 1;

    /**
     * PostController constructor.
     *
     * @param Request $request
     * @param int $day
     * @param int $week
     * @param int $month
     */
    public function __construct(Request $request, int $day = 1, int $week = 7, int $month = 30)
    {
        switch ($request->segment(4)) {
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
     * @param int $id
     * @return ArticlesResource
     */
    public function articles(string $id): ArticlesResource
    {
        return new ArticlesResource(
            Article::with('hubs')
                ->whereHas('hubs',
                    function ($query) use ($id) {
                        $query->where('taggables.hub_id', '=', $id);
                    }
                )
                ->withcount('views',)
                ->orderBy('created_at', 'DESC')
                ->where('created_at', '>=', Carbon::now()->subDays(self::$count)->startOfDay())
                ->take(50)->paginate(10)
        );
    }

    /**
     * @param int $id
     * @return ArticlesResource
     */
    public function all(int $id): ArticlesResource
    {
        $articles = Article::with(
            [
                'creator' => function ($query) {
                    $query->select('id', 'username', 'avatar', 'description', 'karma', 'rating')->withCount(
                        'articles',
                        'followers'
                    );
                },
            ]
        )->withcount(
            'views',
        )->whereHas(
            'hubs',
            function ($query) use ($id) {
                $query->where('taggables.hub_id', $id);
            }
        )->orderBy(
            'created_at',
            'DESC'
        )->take(50);

        $paginated = $articles->paginate(10);

        $sorted = $articles->get()->sortBy(
            function ($articles) {
                return $articles->countTotalVotes();
            },
            null,
            true
        );

        $articles = new LengthAwarePaginator($sorted, $paginated->total(), $paginated->perPage());

        return new ArticlesResource($articles);
    }
}
