<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hub extends Model
{
    protected $table = 'hubs';

    protected $fillable = [
        'id',
        'name',
    ];

    public function description()
    {
        return $this->belongsTo(Localization::class, 'id', 'idx')->withDefault();
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_hubs', 'hub_id', 'posts_id');
    }

    public function hubFollowers()
    {
        return $this->belongsToMany(User::class, 'hub_followers', 'hub_id', 'follower_id');
    }

    public function hubFollowings()
    {
        return $this->belongsToMany(User::class, 'hub_followers', 'follower_id', 'hub_id');
    }

    public function hubIsFollowing(User $user)
    {
        return (bool) $this->hubFollowers()->where('follower_id', $user->id)->count();
    }
}
