<?php

namespace App\Jobs;

use App\Gamify\Points\PostCreated;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\User;

final class CreateArticle
{
    private string $title;

    private string $body;

    private User $author;

    private array $hubs;

    public function __construct(string $title, string $body, User $author, array $options = [])
    {
        $this->title = $title;
        $this->body = $body;
        $this->author = $author;
        $this->hubs = $options['hubs'] ?? [];
    }

    public static function fromRequest(ArticleRequest $request): self
    {
        return new self(
            $request->title,
            $request->body,
            $request->user(),
            [
                'hubs' => $request->hubs,
            ]
        );
    }

    public function handle(): Article
    {
        $article = new Article([
            'title' => $this->title,
            'body'  => $this->body,
        ]);
        $article->authoredBy($this->author);
        $article->syncHubs($this->hubs);
        givePoint(new PostCreated($article));
        return $article;
    }
}
