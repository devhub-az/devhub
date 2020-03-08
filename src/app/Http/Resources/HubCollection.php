<?php

namespace App\Http\Resources;

use ColorThief\ColorThief;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class HubCollection extends JsonResource
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
            'id'                  => $this->id,
            'logo'                => strtolower($this->logo),
            'rating'              => $this->rating,
            'description'         => $this->description[\App::getLocale()],
            'name'                => $this->name,
            'hub_followers_count' => $this->followers->count() > 0 ?
                \Numeric::number_format_short($this->followers->count()) : '0',
            'follower_check'      => $this->statusCheck(),
            'posts_count'         => $this->posts_count,
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
