<?php

namespace App\Services;

use App\Models\Article;

class Canvas
{
    /**
     * Check if a given URL is valid.
     *
     * @param string|null $url
     * @return bool
     */
    public static function isValid(?string $url): bool
    {
        return filter_var($url, FILTER_VALIDATE_URL) ? true : false;
    }

    /**
     * Trim a given URL and return the base.
     *
     * @param string|null $url
     * @return mixed
     */
    public static function trim(?string $url)
    {
        return parse_url($url)['host'] ?? null;
    }

    public function viewer(Article $article)
    {
        if (! $this->wasRecentlyViewed($article)) {
            $referer = request()->header('referer');

            $data = [
                'article_id' => $article->id,
                'ip' => request()->getClientIp(),
                'agent' => request()->header('user_agent'),
                'referer' => self::isValid($referer) ? self::trim($referer) : false,
            ];

            $article->views()->create($data);

            $this->storeInSession($article);
        }
    }

    /**
     * Check if a given post exists in the session.
     *
     * @param Article $article
     * @return bool
     */
    protected function wasRecentlyViewed(Article $article): bool
    {
        $viewed = session()->get('viewed_posts', []);

        return array_key_exists($article->id, $viewed);
    }

    /**
     * Add a given post to the session.
     *
     * @param Article $article
     * @return void
     */
    protected function storeInSession(Article $article): void
    {
        session()->put("viewed_posts.{$article->id}", now()->timestamp);
    }
}
