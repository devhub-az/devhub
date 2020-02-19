<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Hub extends Model
{
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

    public function hubFollowers()
    {
        return $this->belongsToMany(User::class, 'favorites', 'following_id', 'follower_id')->where('following_type', 'hubs');
    }

    public function hubIsFollowing(User $user):bool
    {
        return (bool)$this->favorites()->where('follower_id', $user->id)->where('following_type', 'hubs')->count();
    }

    /**
     * @return MorphMany
     */
    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'following');
    }
}
