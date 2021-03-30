<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Numeric;

/**
 * Class HubsIdentifierResource.
 */
class HubsIdentifierResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'type'   => 'hubs',
            'id'     => $this->id,
            'logo'   => strtolower($this->logo),
            'slug'   => $this->slug,
            'rating' => $this->rating,
            //            'description'         => $this->description['az'],
            'name'                => $this->name,
            'hub_followers_count' => $this->favorites_count > 0 ?
                Numeric::number_format_short($this->favorites_count) : '0',
            //            'follower_check'      => $this->statusCheck(),
            'follower_check' => auth()->guard('api')->id() ? $this->isFavoritedBy(auth()->guard('api')->user())
                : false,
            'articles_count' => $this->articles_count,
        ];
    }
}
