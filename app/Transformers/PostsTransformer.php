<?php

namespace App\Transformers;

use League\Fractal;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use App\Models\Post; 

class PostsTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [];

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [];

    /**
     * Transform object into a generic array
     *
     * @var \App\Models\Post $resource
     * @return array
     */
    public function transform(Post $resource)
    {
        return [

            'id' => (int) $resource->id,
			'name' => $resource->name,
			'body' => $resource->body,
			'author_id' => (int) $resource->author_id,
			'votes' => $resource->votes,
			'created_at' => $resource->created_at,
			'updated_at' => $resource->updated_at,
        ];
    }
}
