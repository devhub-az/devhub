<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class AuthorFollowersResource.
 */
class AuthorFollowersResource extends JsonResource
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
            'type'       => 'followers',
            'id'         => (int) $this->id,
            'attributes' => [
                'name'     => $this->name,
                'username' => $this->username,
                'avatar'   => $this->getMedia('avatars')->first()->getFullUrl(),
                'about'    => $this->description,
                'karma'    => $this->karma,
                'rating'   => $this->rating,
            ],
            'links'      => [
                'self' => route('authors.show', ['author' => $this->id]),
            ],
        ];
    }
}
