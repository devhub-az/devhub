<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class ArticleHubsRelationshipResource.
 */
class ArticleHubsRelationshipResource extends ResourceCollection
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
            'data'  => HubsIdentifierResource::collection($this->collection),
            'links' => [
                'self'    => route('articles.relationships.hubs', ['article_json' => $article->id]),
                'related' => route('articles.hubs', ['article_json' => $article->id]),
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
