<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Numeric;

/**
 * Class HubResource.
 */
class HubResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => (int)$this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'logo' => ($this->logo) ? '/' . strtolower($this->logo) : '/images/empty/code.png',
            'rating' => $this->rating,
            //                'description'         => $this->description['az'],
            'hub_followers_count' => Numeric::number_format_short($this->followers_count),
            'follower_check' => auth('sanctum')->id() ? $this->isFollowedBy(auth('sanctum')->user())
                : false,
            'articles_count' => $this->articles_count
        ];
    }
}
