<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class AuthorResource extends JsonResource
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
            'type'          => 'authors',
            'id'            => (int) $this->id,
            'attributes'    => [
                'name'                  => $this->name,
                'username'              => $this->username,
                'avatar'                => ($this->avatar !== 'default') ? '/upload/avatars/'
                    .$this->avatar : config('devhub.default_avatar'),
                'description'           => $this->description,
                'karma'                 => $this->karma,
                'rating'                => $this->rating,
                'articles_count'        => $this->articles_count,
                'follower'              => $this->statusCheck(),
                'github_url'            => $this->github_url,
                'user_followings_count' => $this->followings_count,
                'user_followers_count'  => $this->followers_count,
            ],
            'relationships' => new AuthorRelationshipResource($this),
            'links'         => [
                'self' => route('authors.show', ['author' => $this->id]),
            ],
        ];
    }

    public function statusCheck()
    {
        if (Auth::check()) {
            return $this->isFollowedBy(Auth::user()->id);
        }

        return false;
    }
}
