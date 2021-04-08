<?php

namespace App\Models;

use App\Helpers\HasAuthor;
use App\Helpers\HasHubs;
use App\Helpers\HasSlug;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jcc\LaravelVote\Traits\Votable;
use Overtrue\LaravelFavorite\Traits\Favoriteable;
use Rennokki\QueryCache\Traits\QueryCacheable;

/**
 * Class User.
 *
 * @mixin Eloquent
 */
final class Article extends Model
{
    use SoftDeletes;
//    use QueryCacheable;
    use Votable;
    use HasSlug;
    use HasAuthor;
    use HasHubs;
    use HasFactory;
    use Favoriteable;

    protected $vote = User::class;

//    public $cacheFor = 3600;
//    public $cacheTags = ['articles'];
//    public $cachePrefix = 'articles_';
//    protected static $flushCacheOnUpdate = true;


    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['published_at', 'created_at', 'deleted_at'];

    protected $fillable = [
        'id',
        'title',
        'slug',
        'body',
        'author_id',
    ];

    /**
     * Get the views relationship.
     *
     * @return HasMany
     */
    public function views(): HasMany
    {
        return $this->hasMany(View::class);
    }

    /**
     * Relationship: comments.
     *
     * @return MorphMany
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable')->with('author')->orderBy('created_at');
    }

    /**
     * @return array
     */
    public function getHubsIdsAttribute(): array
    {
        return $this->hubs()->pluck('hub_id')->toArray();
    }

    public function countTotalVotes(): int
    {
        return $this->upVoters()->count() - $this->downVoters()->count();
    }
}
