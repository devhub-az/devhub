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
            'border'              => strtolower($this->logo) ? ColorThief::getColor('./' . strtolower($this->logo)) : ColorThief::getColor('.//images/empty/code.png'),
            'hub_followers_count' => \Numeric::number_format_short(count($this->hubFollowers)),
            'follower_check'      => $this->statusCheck('following'),
            'posts_count'         => $this->posts->count(),
        ];
    }

    public function statusCheck($status)
    {
        if (Auth::check()) {
            switch ($status) {
                case 'following':
                    return $this->hubIsFollowing(Auth::user()) === 'following';
            }
        }
    }
}
