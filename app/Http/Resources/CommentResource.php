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
                'body'  => $this->content,
                'pivot' => $this->pivot,
            ],
            'relationships' => new CommentRelationshipResource($this),
            'links'         => [
                'self' => route('comments.show', ['comment' => $this->id]),
            ],
        ];
    }

    public function toArray2($request)
    {
        $parsedown = new Parsedown();
        $body = Purifier::clean($parsedown->text($this->body));

        return [
            'id'        => $this->id,
            'body'      => $body,
            'author'    => $this->author->username,
            'avatar'    => $this->author->avatar,
            'author_id' => $this->author_id,
            'pivot'     => $this->pivot,
            //            'favorite'  => $this->statusCheck('favorites'),
            //            'favorites' => $this->bookmarkers_count,
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
