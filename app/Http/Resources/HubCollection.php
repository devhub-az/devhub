<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class HubCollection extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'logo' => $this->logo,
            'description' => $this->description,
            'raiting' => $this->raiting,
            'name' => $this->name,
            'hub_followers_count' => \Numeric::number_format_short(count($this->hubFollowers)),
            'follower_check' => $this->statusCheck('folowing'),
            'posts_count' => count($this->posts),
        ];
    }

    public function statusCheck($status)
    {
        if (Auth::check()){
            switch ($status) {
                case 'folowing':
                    return $this->hubIsFollowing(Auth::user()) == "folowing";
            }
        }
    }
}
