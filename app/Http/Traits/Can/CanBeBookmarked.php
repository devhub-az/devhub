<?php

namespace App\Http\Traits\Can;

use App\Models\Src\Follow;

/**
 * Trait CanBeBookmarked.
 */
trait CanBeBookmarked
{
    /**
     * Check if user is bookmarked by given user.
     *
     * @param int $user
     *
     * @return bool
     */
    public function isBookmarkedBy($user)
    {
        return Follow::isRelationExists($this, 'bookmarkers', $user);
    }

    /**
     * Return bookmarkers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function bookmarkers()
    {
        return $this->morphToMany(config('follow.user_model'), config('follow.morph_prefix'), config('follow.followable_table'))
                    ->wherePivot('relation', '=', Follow::RELATION_BOOKMARK)
                    ->withPivot('followable_type', 'relation', 'created_at');
    }
}
