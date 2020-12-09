<?php

namespace App\Http\Traits\Can;

use App\Models\Src\Follow;

/**
 * Trait CanBookmark.
 */
trait CanBookmark
{
    /**
     * Follow an item or items.
     *
     * @param int|array|\Illuminate\Database\Eloquent\Model $targets
     * @param string                                        $class
     *
     * @throws \Exception
     *
     * @return array
     */
    public function bookmark($targets, $class = __CLASS__)
    {
        return Follow::attachRelations($this, 'bookmarks', $targets, $class);
    }

    /**
     * Unbookmark an item or items.
     *
     * @param int|array|\Illuminate\Database\Eloquent\Model $targets
     * @param string                                        $class
     *
     * @return array
     */
    public function unbookmark($targets, $class = __CLASS__)
    {
        return Follow::detachRelations($this, 'bookmarks', $targets, $class);
    }

    /**
     * Toggle bookmark an item or items.
     *
     * @param int|array|\Illuminate\Database\Eloquent\Model $targets
     * @param string                                        $class
     *
     * @throws \Exception
     *
     * @return array
     */
    public function toggleBookmark($targets, $class = __CLASS__)
    {
        return Follow::toggleRelations($this, 'bookmarks', $targets, $class);
    }

    /**
     * Check if user is bookmarked given item.
     *
     * @param int|array|\Illuminate\Database\Eloquent\Model $target
     * @param string                                        $class
     *
     * @return bool
     */
    public function hasBookmarked($target, $class = __CLASS__)
    {
        return Follow::isRelationExists($this, 'bookmarks', $target, $class);
    }

    /**
     * Return item bookmarks.
     *
     * @param string $class
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function bookmarks($class = __CLASS__)
    {
        return $this->morphedByMany($class, config('follow.morph_prefix'), config('follow.followable_table'))
                    ->wherePivot('relation', '=', Follow::RELATION_BOOKMARK)
                    ->withPivot('followable_type', 'relation', 'created_at');
    }
}
