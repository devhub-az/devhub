<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Overtrue\LaravelFavorite\Traits\Favoriteable;
use Rennokki\QueryCache\Traits\QueryCacheable;

/**
 * Class Hub.
 *
 * @mixin Eloquent
 */
final class Hub extends Model
{
    use HasFactory;
    use Favoriteable;
    use QueryCacheable;

    public $cacheFor = 3600;
    public $cacheTags = ['hubs'];
    public $cachePrefix = 'hubs_';
    protected static $flushCacheOnUpdate = true;

    public $timestamps = false;

    public function description(): BelongsTo
    {
        return $this->belongsTo(Localization::class, 'id', 'idx');
    }

//    public function articles()
//    {
//        return $this->belongsToMany(Article::class, 'post_hubs', 'hub_id', 'articles_id');
//    }

    public function articles(): MorphToMany
    {
        return $this->morphedByMany(Article::class, 'taggable');
    }
}
