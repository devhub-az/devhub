<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Numeric;

/**
 * Class HubResource
 *
 * @package \App\Http\Resources
 */
class HubResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'type'       => 'hubs',
            'id'         => (int)$this->id,
            'attributes' => [
                'logo'                => ($this->logo) ? '/' . strtolower($this->logo) : '/images/empty/code.png',
                'rating'              => $this->rating,
                'description'         => $this->description['az'],
                'name'                => $this->name,
                'hub_followers_count' => $this->followers_count > 0 ?
                    Numeric::number_format_short($this->followers_count) : '0',
                'follower_check'      => $this->statusCheck(),
                'posts_count'         => $this->posts_count,
            ],
//            'relationships' => new ($this),
            'links'      => [
                'self' => route('hubs.show', ['hub' => $this->id]),
            ],
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
