<?php

namespace App\Http\Traits\Can;

use App\Models\Src\Follow;

/**
 * Trait CanBeVoted.
 */
trait CanBeVoted
{
    /**
     * Check if item is voted by given user.
     *
     * @param int $user
     *
     * @return bool
     */
    public function isVotedBy($user, $type = null)
    {
        return Follow::isRelationExists($this, 'voters', $user);
    }

    /**
     * Check if item is upvoted by given user.
     *
     * @param int $user
     *
     * @return bool
     */
    public function isUpvotedBy($user)
    {
        return Follow::isRelationExists($this, 'upvoters', $user);
    }

    /**
     * Check if item is downvoted by given user.
     *
     * @param int $user
     *
     * @return bool
     */
    public function isDownvotedBy($user)
    {
        return Follow::isRelationExists($this, 'downvoters', $user);
    }

    /**
     * Return voters.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function voters()
    {
        return $this->morphToMany(
            config('follow.user_model'),
            config('follow.morph_prefix'),
            config('follow.followable_table')
        )
            ->wherePivotIn('relation', [Follow::RELATION_UPVOTE, Follow::RELATION_DOWNVOTE])
            ->withPivot('followable_type', 'relation', 'created_at');
    }

    public function rating()
    {
        return $this->upvoters - $this->downvoters;
    }

    /**
     * Return upvoters.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function upvoters()
    {
        return $this->morphToMany(
            config('follow.user_model'),
            config('follow.morph_prefix'),
            config('follow.followable_table')
        )
            ->wherePivot('relation', '=', Follow::RELATION_UPVOTE)
            ->withPivot('followable_type', 'relation', 'created_at');
    }

    /**
     * Return downvoters.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function downvoters()
    {
        return $this->morphToMany(
            config('follow.user_model'),
            config('follow.morph_prefix'),
            config('follow.followable_table')
        )
            ->wherePivot('relation', '=', Follow::RELATION_DOWNVOTE)
            ->withPivot('followable_type', 'relation', 'created_at');
    }
}
