<?php

namespace App\Observers;

use App\Models\Article;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class ArticleObserver
{
    /**
     * Handle the Article "saving" event.
     *
     * @param Article $article
     * @return void
     */
    public function saving(Article $article)
    {
        $article->id = Uuid::uuid4();
        $article->slug = Str::slug($article->title);
    }
}
