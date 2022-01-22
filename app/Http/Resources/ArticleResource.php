<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'type' => 'articles',
            'id' => $this->id,
            'attributes' => [
                'id' => $this->id,
                'title' => $this->title,
                'slug' => $this->slug,
                'body' => $this->body, //\Str::words($this->body, 87, ''),
                'votes' => $this->voters_count,
                'upvotes' => $this->up ?? $this->upvoters_count,
                'downvotes' => $this->down ?? $this->downvoters_count,
                'views' => $this->views_count,
                'created_at' => $this->created_at->diffForHumans(),
                'is_up_voted' => auth('sanctum')->id() ? $this->isUpvotedBy(auth('sanctum')->user()) : false,
                'is_down_voted' => auth('sanctum')->id() ? $this->isDownvotedBy(auth('sanctum')->user()) : false,
            ],
            'relationships' => new ArticleRelationshipResource($this),
        ];
    }
}
