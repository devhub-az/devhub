<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentIdentifierResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type'       => 'comments',
            'id'         => (string) $this->id,
            'attributes' => [
                'id'   => $this->id,
                'body' => $this->body,
            ],
            'relationships' => new CommentRelationshipResource($this),
        ];
    }
}
