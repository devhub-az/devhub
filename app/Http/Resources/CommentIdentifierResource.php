<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentIdentifierResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type'      => 'comments',
            'id'        => $this->id,
            'body'      => $this->content,
            'author'    => $this->author->username,
            'avatar'    => $this->author->avatar,
            'author_id' => $this->author->id,
            'pivot'     => $this->pivot,
        ];
    }
}
