<?php

namespace App\Http\Resources;

use App\Models\Comment;
use App\Models\Hub;
use App\Models\User;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class ArticlesResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => ArticleResource::collection($this->collection),
        ];
    }

    public function with($request)
    {
        $comments = $this->collection->flatMap(
            function ($article) {
                return $article->comments;
            }
        );
        $authors  = $this->collection->map(
            function ($article) {
                return $article->creator;
            }
        );
        $hubs  = $this->collection->map(
            function ($article) {
                return $article->hubs;
            }
        );

        $included = $authors->merge($comments)->unique('id');

        return [
            'links'    => [
                'self' => route('articles.index'),
            ],
            'included' => $this->withIncluded($included),
        ];
    }

    private function withIncluded(Collection $included)
    {
        return $included->map(
            function ($include) {
                if ($include instanceof User) {
                    return new UserCollection($include);
                }
                if ($include instanceof Comment) {
                    return new CommentResource($include);
                }
                if ($include instanceof Hub) {
                    return new HubResource($include);
                }
            }
        );
    }
}
