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
            'type' => 'articles',
            'id' => (string) $this->id,
            'attributes' => [
                'id' => (string) $this->id,
                'title' => $this->title,
                'slug' => $this->slug,
                'body' => $this->body, //\Str::words($this->body, 87, ''),
                'votes' => $this->voters()->count(),
                'upvotes' => $this->up ?? $this->upVoters()->count(),
                'downvotes' => $this->down ?? $this->downVoters()->count(),
                'views' => $this->views_count,
                'created_at' => $this->created_at,
                'is_up_voted' => auth()->guard('api')->id() ? auth()->guard('api')->user()->hasUpVoted($this->setAppends([])) : false,
                'is_down_voted' => auth()->guard('api')->id() ? auth()->guard('api')->user()->hasDownVoted($this->setAppends([]))
                    : false,
                'real' => $this->num,
            ],
            'relationships' => new ArticleRelationshipResource($this),
            'links' => [
                'self' => route('articles.show', ['article_json' => $this->id]),
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
}
