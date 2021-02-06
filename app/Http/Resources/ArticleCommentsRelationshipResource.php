<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ArticleCommentsRelationshipResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        $article = $this->additional['article_json'];

        return [
            'data'  => CommentIdentifierResource::collection($this->collection),
            'links' => [
                'self'    => route('articles.relationships.comments', ['article_json' => $article->slug]),
                'related' => route('articles.comments', ['article_json' => $article->slug]),
            ],
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
