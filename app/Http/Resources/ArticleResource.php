<?php

namespace App\Http\Resources;

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
                'votes'      => $this->countTotalVotes(),
                'votes_sum'  => $this->countVoters(),
                'upvotes'    => $this->countUpVoters(),
                'downvotes'  => $this->countDownVoters(),
                'views'      => $this->views_count,
                'created_at' => $this->created_at,
                'upvoted'    => auth()->guard('api')->id() ? auth()->guard('api')->user()->hasUpVoted($this) : false,
                'downvoted'  => auth()->guard('api')->id() ? auth()->guard('api')->user()->hasDownVoted($this) : false,
                //                'favorite'   => $this->statusCheck('favorites'),
                'read_time'  => $this->readTime($this->content),
                //                'favorites'  => $this->bookmarkers_count,
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
            $text = $match[0].(strlen($match[0]) < strlen($text) ? '...' : '');
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

        return $minutes.' dəqiqə';
    }
}
