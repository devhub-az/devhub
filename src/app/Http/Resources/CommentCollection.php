<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Auth;

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
            'id'        => $this->id,
            'body'      => $this->body,
            'author'    => $this->author->username,
            'author_id' => $this->author_id,
            'post_name' => $this->post->name,
            'favorite'  => $this->statusCheck('favorites'),
            'favorites' => $this->favorites->count(),
        ];
    }

    public function statusCheck($status): ?bool
    {
        if (Auth::check()) {
            switch ($status) {
                case 'upvote':
                    return $this->postIsVoted(Auth::user()) === 'upvoted';
                case 'downvote':
                    return $this->postIsVoted(Auth::user()) === 'downvoted';
                case 'favorites':
                    return $this->isFavorite(Auth::user()) === true;
            }
        }

        return null;
    }
}
