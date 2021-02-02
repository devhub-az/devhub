<?php

namespace App\Http\Resources;

use App\Models\Comment;
use App\Models\Hub;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class ArticlesResource extends ResourceCollection
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
            'data' => ArticleResource::collection($this->collection),
        ];
    }
}
