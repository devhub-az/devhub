<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class CommentsResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => CommentResource::collection($this->collection),
        ];
    }

    public function with($request)
    {
        $included  = $this->collection->map(
            function ($article) {
                return $article->author;
            }
        )->unique();

        return [
            'links'    => [
                'self' => route('comments.index'),
            ],
            'included' => $this->withIncluded($included),
        ];
    }

    private function withIncluded(Collection $included)
    {
        return $included->map(
            function ($include) {
                if ($include instanceof User) {
                    return new UserResource($include);
                }
            }
        );
    }
}
