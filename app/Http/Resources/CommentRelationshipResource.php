<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentRelationshipResource extends JsonResource
{
    /**
     * @param Request $request
     * @return AuthorIdentifierResource[]
     */
    public function toArray($request)
    {
        return [
            'author' => new AuthorIdentifierResource($this->creator),
        ];
    }

    public function with($request)
    {
        return [
            'links' => [
                'self' => route('comments.index'),
            ],
        ];
    }
}
