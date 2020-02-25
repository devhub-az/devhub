<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Post extends Model
{

    protected $table = 'posts';

    protected $fillable = [
        'id',
        'name',
        'body',
        'author_id',
    ];

    public static function getTextAttribute()
    {
        return new HtmlString(
            app(Parsedown::class)->setSafeMode(true)->text($text)
        );
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'author_id')->withDefault();
    }

    public function hubs()
    {
        return $this->belongsToMany(Hub::class, 'post_hubs', 'posts_id', 'hub_id');
    }

    public function views()
    {
        return $this->hasMany(PostView::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id')->with('author');
    }

    public function votes()
    {
        return $this->hasMany(PostVote::class);
    }

    public function postIsFollowing(User $user): bool
    {
        return $this->favorites()->where('follower_id', $user->id)->where('following_type', 'posts')->count();
    }

    /**
     * @param string $value
     * @param User $user
     * @return string
     */
    public function postIsVoted(string $value,User $user):string
    {
        switch ($value){
            case 'upvote':
                if ((bool)$this->votes()->where('user_id', $user->id)->where('status', '1')->count()) {
                    return 'upvoted';
                }

                return '';
            case 'downvoted':
                if ((bool)$this->votes()->where('user_id', $user->id)->where('status', '0')->count()) {
                    return 'downvoted';
                }

                return '';
            default:
                return '';
        }
    }

    /**
     * @return array
     */
    public function getHubsIdsAttribute(): array
    {
        return $this->hubs()->pluck('hub_id')->toArray();
    }

    /**
     * @return MorphMany
     */
    public function favorites(): MorphMany
    {
        return $this->morphMany(Favorite::class, 'following');
    }

}
