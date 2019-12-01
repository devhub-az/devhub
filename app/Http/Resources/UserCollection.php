<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'id' => $this->id,
            'name' => $this->username,
            'about' => $this->about,
            'rating' => $this->rating,
            'posts_count' => $this->posts->count(),
            'user_followers_count' => $this->followers->count(),
        ];
    }
}
