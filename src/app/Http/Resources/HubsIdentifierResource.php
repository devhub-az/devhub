<?php

namespace App\Http\Resources;

use App\Helpers\Numeric;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

/**
 * Class HubsIdentifierResource
 *
 * @package \App\Http\Resources
 */
class HubsIdentifierResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'type'                => 'hubs',
            'id'                  => $this->id,
            'logo'                => strtolower($this->logo),
            'rating'              => $this->rating,
            'description'         => $this->description['az'],
            'name'                => $this->name,
            'hub_followers_count' => $this->followers_count > 0 ?
                Numeric::number_format_short($this->followers_count) : '0',
//            'follower_check'      => $this->statusCheck(),
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
