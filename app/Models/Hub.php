<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Multicaret\Acquaintances\Traits\CanBeFollowed;
use Multicaret\Acquaintances\Traits\CanBeVoted;

/**
 * Class Hub.
 *
 * @mixin Eloquent
 */
final class Hub extends Model
{
    use CanBeFollowed;
    use CanBeVoted;
    use HasFactory;

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
