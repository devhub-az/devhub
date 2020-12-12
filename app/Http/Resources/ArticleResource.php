<?php

namespace App\Http\Resources;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type'          => 'articles',
            'id'            => (string) $this->id,
            'attributes'    => [
                'id'         => $this->id,
                'title'      => $this->name,
                'slug'       => $this->slug,
                'body'       => $this->content, //Str::words($this->body, 150, ''),
                'votes'      => $this->upvoters_count - $this->downvoters_count,
                'votes_sum'  => $this->voters_count,
                'upvotes'    => $this->upvoters_count,
                'downvotes'  => $this->downvoters_count,
                'views'      => $this->views_count,
                'created_at' => $this->created_at,
                'upvoted'    => $this->statusCheck('upvote'),
                'downvoted'  => $this->statusCheck('downvote'),
                'favorite'   => $this->statusCheck('favorites'),
                'read_time'  => $this->readTime($this->content),
                'favorites'  => $this->bookmarkers_count,
            ],
            'relationships' => new ArticleRelationshipResource($this),
            'links'         => [
                'self' => route('articles.show', ['article' => $this->id]),
            ],
        ];
    }

    public function text(string $text)
    {
        if (preg_match('/^.{1,512}\b/s', $text, $match)) {
            $text = $match[0] . (strlen($match[0]) < strlen($text) ? '...' : '');
        }

        return $text;
    }

    /**
     * @param $text
     *
     * @return string
     */
    public function readTime(string $text): string
    {
        $words = str_word_count(strip_tags($text));
        $minutes = ceil($words / 250);

        return $minutes . ' dəqiqə';
    }

    /**
     * @param $status
     *
     * @return bool
     */
    public function statusCheck($status): bool
    {
        if (Auth::check()) {
            switch ($status) {
                case 'upvote':
                    return (bool) $this->isUpvotedBy(Auth::user()->id);
                case 'downvote':
                    return (bool) $this->isDownvotedBy(Auth::user()->id);
                case 'favorites':
                    return (bool) $this->isBookmarkedBy(Auth::user()->id);
                default:
                    return false;
            }
        }

        return false;
    }
}
