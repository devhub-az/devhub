<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

    protected $fillable = [
        'author_id',
        'body',
        'post_id',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id')->withDefault();
    }

    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'following');
    }

    public function isFavorite(User $user): bool
    {
        return $this->favorites()->where('follower_id', $user->id)->where('following_type', 'comments')->count();
    }

    public function favoritesIds():array
    {
        return $this->favorites()->pluck('follower_id')->toArray();
    }
}
