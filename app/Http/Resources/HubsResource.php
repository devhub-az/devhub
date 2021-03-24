<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class HubsResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => HubResource::collection($this->collection),
        ];
    }

    public function with($request)
    {
        return [
            'links' => [
                'self' => route('hubs.api.index'),
            ],
        ];
    }
}
