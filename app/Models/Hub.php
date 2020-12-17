<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFavorite\Traits\Favoriteable;

/**
 * Class Hub.
 *
 * @mixin Eloquent
 */
class Hub extends Model
{
    use Favoriteable;

    protected $fillable = [
        'name',
    ];

    public function description()
    {
        return $this->belongsTo(Localization::class, 'id', 'idx');
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'post_hubs', 'hub_id', 'posts_id');
    }
}
