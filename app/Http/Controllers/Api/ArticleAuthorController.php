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
class ArticleAuthorController
{
    private static int $count = 1;

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
     * @param string $id
     * @return ArticlesResource
     */
    public function articles(string $id): ArticlesResource
    {
        return new ArticlesResource(
            Article::with('hubs', 'author', 'comments')
                ->withcount(
                    'views',
                    'comments'
                )
                ->orderBy(
                    'created_at',
                    'DESC'
                )->where(
                    'created_at',
                    '>=',
                    Carbon::now()->subDays(self::$count)->startOfDay()
                )->where('author_id', $id)
                ->take(50)->paginate(10)
        );
    }
}
