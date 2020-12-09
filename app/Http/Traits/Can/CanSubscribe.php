<?php

namespace App\Http\Traits\Can;

use App\Models\Src\Follow;

/**
 * Trait CanSubscribe.
 */
trait CanSubscribe
{
    /**
     * Subscribe an item or items.
     *
     * @param int|array|\Illuminate\Database\Eloquent\Model $targets
     * @param string                                        $class
     *
     * @return bool
     *@throws \Exception
     *
     */
    public function subscribe($targets, $class = __CLASS__)
    {
        return Follow::attachRelations($this, 'subscriptions', $targets, $class);
    }

    /**
     * Unsubscribe an item or items.
     *
     * @param int|array|\Illuminate\Database\Eloquent\Model $targets
     * @param string                                        $class
     *
     * @return array
     */
    public function unsubscribe($targets, $class = __CLASS__)
    {
        return Follow::detachRelations($this, 'subscriptions', $targets, $class);
    }

    /**
     * Toggle subscribe an item or items.
     *
     * @param int|array|\Illuminate\Database\Eloquent\Model $targets
     * @param string                                        $class
     *
     * @throws \Exception
     *
     * @return array
     */
    public function toggleSubscribe($targets, $class = __CLASS__)
    {
        return Follow::toggleRelations($this, 'subscriptions', $targets, $class);
    }

    /**
     * Check if user is subscribed given item.
     *
     * @param int|array|\Illuminate\Database\Eloquent\Model $target
     * @param string                                        $class
     *
     * @return bool
     */
    public function hasSubscribed($target, $class = __CLASS__)
    {
        return Follow::isRelationExists($this, 'subscriptions', $target, $class);
    }

    /**
     * Return user subscriptions.
     *
     * @param string $class
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subscriptions($class = __CLASS__)
    {
        return $this->morphedByMany($class, config('follow.morph_prefix'), config('follow.followable_table'))
                    ->wherePivot('relation', '=', Follow::RELATION_SUBSCRIBE)
                    ->withPivot('followable_type', 'relation', 'created_at');
    }
}
