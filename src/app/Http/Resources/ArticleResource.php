<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Str;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
//        dd($request->user());

        return [
            'type'          => 'articles',
            'id'            => (string)$this->id,
            'attributes'    => [
                'id'         => $this->id,
                'title'      => $this->name,
                'body'       => Str::words($this->body, 150, ''),
                'votes'      => $this->upvoters_count - $this->downvoters_count,
                'votes_sum'  => $this->voters_count,
                'upvotes'    => $this->upvoters_count,
                'downvotes'  => $this->downvoters_count,
                'views'      => $this->views_count,
                'created_at' => $this->created_at,
                'upvoted'    => $this->statusCheck('upvote'),
                'downvoted'  => $this->statusCheck('downvote'),
                'favorite'   => $this->statusCheck('favorites'),
                'read_time'  => $this->readTime($this->body),
                'favorites'  => $this->bookmarkers_count,
            ],
            'relationships' => new ArticleRelationshipResource($this),
            'links'         => [
                'self' => route('articles.show', ['article' => $this->id]),
            ],
        ];
    }

    /**
     * @param $text
     * @return string
     */
    public function readTime(string $text): string
    {
        $word = str_word_count(strip_tags($text));
        $minutes = floor($word / 200);

        return $minutes . ' dəqiqə';
    }

    /**
     * @param $status
     * @return bool
     */
    public function statusCheck($status): bool
    {
//        if (Auth::check()) {
//            switch ($status) {
//                case 'upvote':
//                    return (bool)$this->isUpvotedBy(Auth::user()->id);
//                case 'downvote':
//                    return (bool)$this->isDownvotedBy(Auth::user()->id);
//                case 'favorites':
//                    return (bool)$this->isBookmarkedBy(Auth::user()->id);
//                default:
//                    return false;
//            }
//        }

        return false;
    }
}
