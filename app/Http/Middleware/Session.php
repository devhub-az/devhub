<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Date;

class Session
{
    /**
     * Handle the incoming request.
     *
     * @param $request
     * @param $next
     * @return Response
     */
    public function handle(Request $request, Closure $next)
    {
        $viewedPosts = $this->getViewedPostsInSession();

        if ($viewedPosts->isNotEmpty()) {
            $this->pruneExpiredViews($viewedPosts);
        }

        return $next($request);
    }

    /**
     * Get the viewed articles in session.
     *
     * @return Collection
     */
    protected function getViewedPostsInSession(): Collection
    {
        return collect(session()->get('viewed_articles'));
    }

    /**
     * Prune expired views from the session.
     *
     * @param Collection $articles
     * @return void
     */
    protected function pruneExpiredViews(Collection $articles)
    {
        foreach ($articles as $key => $value) {
            if ($value < now()->subSeconds(3600)->timestamp) {
                session()->forget('viewed_articles.'.$key);
            }
        }
    }

    /**
     * Prune expired visits from the session.
     *
     * @param Collection $articles
     * @return void
     */
    protected function pruneExpiredVisits(Collection $articles)
    {
        foreach ($articles as $key => $value) {
            if (! Date::createFromTimestamp($value['timestamp'])->isToday()) {
                session()->forget('visited_articles.'.$key);
            }
        }
    }
}
