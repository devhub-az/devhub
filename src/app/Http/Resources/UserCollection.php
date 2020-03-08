<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class UserCollection extends JsonResource
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
            'id'             => $this->id,
            'name'           => $this->name,
            'username'       => $this->username,
            'avatar'         => $this->avatar,
            'about'          => $this->about,
            'karma'          => $this->karma,
            'rating'         => $this->rating,
            'posts_count'    => $this->posts->count(),
            'follower_check' => $this->statusCheck(),
            //            'user_followers_count' => $this->followers->count(),
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
