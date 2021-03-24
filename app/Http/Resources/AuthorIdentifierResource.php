<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorIdentifierResource extends JsonResource
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
            'type' => 'authors',
            'id' => (int) $this->id,
            'attributes' => [
                'name' => $this->name,
                'username' => $this->username,
                'avatar' => ($this->avatar !== 'default') ? $this->avatar : config('devhub.default_avatar'),
                'description' => $this->description,
            ],
            'links' => [
                'self' => route('authors.show', ['author' => $this->id]),
            ],
        ];
    }
}
