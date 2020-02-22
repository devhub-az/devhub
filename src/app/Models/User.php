<?php

namespace App\Models;

use App\Http\Traits\PermissionManager;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, PermissionManager;

    protected $visible = [
        'username',
        'name',
        'surname',
        'email',
        'about'
    ];

    protected $fillable = [
        'username',
        'name',
        'surname',
        'email',
        'about',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get Posts where user is author with hubs(function in post model)
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'author_id')->with('hubs');
    }

    /**
     * Get Comments where user is author
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'author_id');
    }

    /**
     * Get saved posts
     * @return HasMany
     */
    public function postFollowings(): hasMany
    {
        return $this->hasMany(Favorite::class, 'follower_id')->where('following_type', 'posts');
    }

    /**
     * Get saved comments
     * @return HasMany
     */
    public function commentFollowings(): hasMany
    {
        return $this->hasMany(Favorite::class, 'follower_id')->where('following_type', 'comments');
    }

    /**
     * Get hubs ids where user follower
     * @return HasMany
     */
    public function userHubFollowing(): hasMany
    {
        return $this->hasMany(Favorite::class, 'follower_id')->where('following_type', 'hubs');
    }

    /**
     * Get posts ids which user saved
     * @return array
     */
    public function getPostsIds(): array
    {
        return $this->postFollowings()->pluck('following_id')->toArray();
    }

    /**
     *
     */
    public function getUserIds()
    {
        return [1];
    }

    /**
     * Get hubs ids which user saved
     * @return array
     */
    public function getHubsIds(): array
    {
        return $this->userHubFollowing()->pluck('following_id')->toArray();
    }

    /**
     * Get comments ids which user saved
     * @return array
     */
    public function getCommentsIdsFavorite()
    {
        return $this->commentFollowings()->pluck('following_id')->toArray();
    }

    /**
     * Get posts ids where comments was wrote
     * @return array
     */
    public function getCommentsIdsAuthor(): array
    {
        return $this->comments()->pluck('post_id')->toArray();
    }

    /**
     * @return MorphMany
     */
    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'following');
    }

    //Trash

    public function messagesNotificationsCount()
    {
        return $this->hasMany(Message::class, 'to_id', 'id')->whereNull('read_at')->count();
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_level', 'level');
    }

    //End trash
}
