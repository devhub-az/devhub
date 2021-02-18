<?php

namespace App\Jobs;

use App\Events\ArticleWasApproved;
use App\Models\Article;
use Carbon\Carbon;

final class ApproveArticle
{
    private $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function handle(): Article
    {
        $this->article->approved_at = Carbon::now();
        $this->article->save();

        event(new ArticleWasApproved($this->article));

        return $this->article;
    }
}
