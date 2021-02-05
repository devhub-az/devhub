<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Overtrue\LaravelFavorite\Traits\Favoriteable;

/**
 * Class Hub.
 *
 * @mixin Eloquent
 */
final class Hub extends Model
{
    use HasFactory;
    use Favoriteable;

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    public function description()
    {
        return $this->belongsTo(Localization::class, 'id', 'idx');
    }

//    public function articles()
//    {
//        return $this->belongsToMany(Article::class, 'post_hubs', 'hub_id', 'posts_id');
//    }

    public function articles(): MorphToMany
    {
        return $this->morphedByMany(Article::class, 'taggable');
    }
}
