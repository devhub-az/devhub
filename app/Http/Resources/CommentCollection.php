<?php

namespace App\Http\Resources;

use ColorThief\ColorThief;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class CommentCollection extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'comment' => $this->body,
            'author_id' => $this->author_id,
            'post_name' => $this->post->name,
        ];
    }
}
