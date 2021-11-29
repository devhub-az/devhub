<?php

namespace App\Models;

use App\Helpers\HasAuthor;
use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Rennokki\QueryCache\Traits\QueryCacheable;

/**
 * Class User.
 *
 * @mixin Eloquent
 */
final class Comment extends Model
{
    use HasAuthor;
    use QueryCacheable;

    public $cacheFor = 3600;

    public $cacheTags = ['comments'];

    public $cachePrefix = 'comments_';

    protected static $flushCacheOnUpdate = true;

    /**
     * {@inheritdoc}
     */
    protected $table = 'comments';

    /**
     * {@inheritdoc}
     */
    protected $guarded = ['id'];

    /**
     * {@inheritdoc}
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * {@inheritdoc}
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * Relationship: commentable models.
     *
     * @return MorphTo
     */
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function articles(): MorphToMany
    {
        return $this->morphedByMany(Article::class, 'commentable');
    }
}
