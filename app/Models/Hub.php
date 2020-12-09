<?php

namespace App\Models;

use App\Http\Traits\Can\CanBeFollowed;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Hub.
 *
 * @mixin Eloquent
 */
class Hub extends Model
{
    use CanBeFollowed;

    protected $fillable = [
        'name',
    ];

    public function description()
    {
        return $this->belongsTo(Localization::class, 'id', 'idx');
    }

    public function posts()
    {
        return $this->belongsToMany(Article::class, 'post_hubs', 'hub_id', 'posts_id');
    }
}
