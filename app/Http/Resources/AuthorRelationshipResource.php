<?php

namespace App\Http\Resources;

use App\Models\Hub;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorRelationshipResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'followings' => [
                'data' => AuthorFollowersResource::collection($this->followings),
            ],
            'followers' => [
                'data' => AuthorFollowersResource::collection($this->followers),
            ],
            'hubs_following' => [
                'data' => AuthorHubsResource::collection($this->getFavoriteItems(Hub::class)->get()),
            ],
        ];
    }

    public function with($request)
    {
        return [
            'links' => [
                'self' => route('articles.index'),
            ],
        ];
    }
}
