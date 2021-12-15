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
            'type' => 'hubs',
            'id' => (int) $this->id,
            'attributes' => [
                'name' => $this->name,
                'slug' => $this->slug,
                'logo' => ($this->logo) ? '/'.strtolower($this->logo) : '/images/empty/code.png',
                'rating' => $this->rating,
                //                'description'         => $this->description['az'],
                'hub_followers_count' => $this->favorites_count > 0 ?
                    Numeric::number_format_short($this->favorites_count) : '0',
                'follower_check' => auth('sanctum')->id() ? $this->isFavoritedBy(auth('sanctum')->user())
                    : false,
                'articles_count' => $this->articles_count,
            ],
        ];
    }
}
