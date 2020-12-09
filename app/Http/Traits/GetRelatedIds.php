<?php

namespace App\Http\Traits;

/**
 * Trait GetRelatedIds.
 */
trait GetRelatedIds
{
    public function HubsIdsAttribute(): array
    {
        return $this->hubs()->pluck('hub_id')->toArray();
    }

    public function CommentsIdsAuthor(): array
    {
        return $this->comments()->pluck('post_id')->toArray();
    }
}
