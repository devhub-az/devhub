<?php

namespace App\Http\Resources;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Mews\Purifier\Facades\Purifier;
use Parsedown;

class CommentResource extends JsonResource
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
            'type'          => 'comments',
            'id'            => (string) $this->id,
            'attributes'    => [
                'body'  => $this->body,
                'created' => $this->created_at,
            ],
            'relationships' => new CommentRelationshipResource($this),
        ];
    }
}
