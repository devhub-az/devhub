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
            'type'       => 'authors',
            'id'         => (string) $this->id,
            'attributes' => [
                'name'     => $this->name,
                'username' => $this->username,
                'email'    => $this->email,
                'company'  => $this->company,
                'avatar'   => ($this->avatar !== 'default')
                    ? $this->getMedia('avatars')->first()->getFullUrl()
                    : config(
                        'devhub.default_avatar'
                    ),
                'description'    => $this->description,
                'karma'          => $this->karma,
                'rating'         => $this->rating,
                'articles_count' => $this->articles_count,
                'follower'       => auth()->guard('api')->id() || Auth::check() ? $this->isFollowedBy(
                    auth()->guard('api')->id() ?? Auth::user()->id
                ) : false,
                'website'               => $this->website,
                'twitter'               => $this->twitter,
                'github'                => $this->github,
                'twitch'                => $this->twitch,
                'telegram'              => $this->telegram,
                'youtube'               => $this->youtube,
                'user_followings_count' => $this->followings_count,
                'user_followers_count'  => $this->followers_count,
                'created_at'            => $this->created_at,
            ],
            'relationships' => new AuthorRelationshipResource($this),
            'links'         => [
                'self' => route('authors.show', ['author' => $this->id]),
            ],
        ];
    }
}
