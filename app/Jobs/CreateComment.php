<?php

namespace App\Jobs;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\User;

final class CreateComment
{
    private string $comment;

    private string $article_id;

    private User   $author;

    public function __construct(string $comment, string $article_id, User $author)
    {
        $this->article_id = $article_id;
        $this->comment = $comment;
        $this->author = $author;
    }

    public static function fromRequest(CommentRequest $request): self
    {
        return new self(
            $request->comment,
            $request->article->id,
            $request->user(),
        );
    }

    public function handle(): Comment
    {
        $comment = new Comment(
            [
                'commentable_type' => 'posts',
                'commentable_id'   => $this->article_id,
                'body'             => $this->comment,
            ]
        );
        $comment->authoredBy($this->author);
        $comment->save();

        return $comment;
    }
}
