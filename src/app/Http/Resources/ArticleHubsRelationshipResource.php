<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class ArticleHubsRelationshipResource
 *
 * @package \App\Http\Resources
 */
class ArticleHubsRelationshipResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $article = $this->additional['article'];

        return [
            'data'  => HubsIdentifierResource::collection($this->collection),
            'links' => [
                'self'    => route('articles.relationships.hubs', ['article' => $article->id]),
                'related' => route('articles.hubs', ['article' => $article->id]),
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
