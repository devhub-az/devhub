<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
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
            'id'         => (string)$this->id,
            'attributes' => [
                'logo'                => strtolower($this->logo),
                'rating'              => $this->rating,
                'description'         => $this->description['az'],
                'name'                => $this->name,
                'hub_followers_count' => $this->followers_count > 0 ?
                    Numeric::number_format_short($this->followers_count) : '0',
                'posts_count'         => $this->posts_count,
            ],
//            'relationships' => new ($this),
            'links'      => [
                'self' => route('hubs.show', ['hub' => $this->id]),
            ],
        ];
    }
}
