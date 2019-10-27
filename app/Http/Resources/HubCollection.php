<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use ColorThief\ColorThief;

class HubCollection extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'logo' => $this->logo,
            'description' => $this->description,
            'rating' => $this->rating,
            'name' => $this->name,
            'border' => $this->logo ? ColorThief::getColor('./' . $this->logo) :  ColorThief::getColor('.//images/empty/code.png'),
            'hub_followers_count' => \Numeric::number_format_short(count($this->hubFollowers)),
            'follower_check' => $this->statusCheck('following'),
            'posts_count' => count($this->posts),
        ];
    }

    public function statusCheck($status)
    {
        if (Auth::check()){
            switch ($status) {
                case 'following':
                    return $this->hubIsFollowing(Auth::user()) == "following";
            }
        }
    }
}
