<?php

namespace Overtrue\LaravelFollow\Traits;

use App\Models\Src\Follow;

/**
 * Trait CanBeLiked.
 */
trait CanBeLiked
{
    /**
     * Check if user is isLikedBy by given user.
     *
     * @param int $user
     *
     * @return bool
     */
    public function isLikedBy($user)
    {
        return Follow::isRelationExists($this, 'likers', $user);
    }

    /**
     * Return followers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function likers()
    {
        return $this->morphToMany(config('follow.user_model'), config('follow.morph_prefix'), config('follow.followable_table'))
                    ->wherePivot('relation', '=', Follow::RELATION_LIKE)
                    ->withPivot('followable_type', 'relation', 'created_at');
    }

    /**
     * Alias of likers.
     *
     * @return mixed
     */
    public function fans()
    {
        return $this->likers();
    }
}
