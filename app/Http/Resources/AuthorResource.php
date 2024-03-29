<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'company' => $this->company,
            'avatar' => $this->getMedia('avatars')->first() ? $this->getMedia('avatars')->first()->getFullUrl() : null,
            'description' => $this->description,
            'karma' => $this->karma,
            'rating' => $this->rating,
            'articles_count' => $this->articles_count,
            'follower' => auth('sanctum')->id() ? $this->isFollowedBy(auth('sanctum')->id()) : false,
            'website' => $this->website,
            'twitter' => $this->twitter,
            'github' => $this->github,
            'twitch' => $this->twitch,
            'telegram' => $this->telegram,
            'youtube' => $this->youtube,
            'user_followings_count' => $this->followings_count,
            'user_followers_count' => $this->followers_count,
            'created_at' => $this->created_at->toDateString(),
            'relationships' => new AuthorRelationshipResource($this),
        ];
    }
}
