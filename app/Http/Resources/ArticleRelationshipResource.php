<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleRelationshipResource extends JsonResource
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
            'author'   => [
                'links' => [
                    'self'    => route('articles.relationships.author', ['article_json' => $this->id]),
                    'related' => route('articles.author', ['article_json' => $this->id]),
                ],
                'data'  => new AuthorResource($this->creator),
            ],
            'comments' => (new ArticleCommentsRelationshipResource($this->comments))->additional(['article_json' => $this]),
            'hubs'     => (new ArticleHubsRelationshipResource($this->hubs))->additional(['article_json' => $this]),
        ];
    }

    public function with($request)
    {
        return [
            'links' => [
                'self' => route('articles.index'),
            ],
        ];
    }
}
