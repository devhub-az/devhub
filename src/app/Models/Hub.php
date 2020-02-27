<?php

namespace App\Models;

use App\Http\Traits\Can\CanBeFollowed;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Hub extends Model
{
    use CanBeFollowed;

    protected $table = 'hubs';

    protected $fillable = [
        'name',
    ];

    public function description()
    {
        return $this->belongsTo(Localization::class, 'id', 'idx');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_hubs', 'hub_id', 'posts_id');
    }
}
