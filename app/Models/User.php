<?php

namespace App\Models;

use App\Http\Traits\PermissionManager;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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


    public function messagesNotificationsCount()
    {
        return $this->hasMany(Message::class, 'to_id', 'id')->whereNull('read_at')->count();
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_level', 'level');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'author_id')->with('hubs');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'author_id');
    }

    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'followers', 'leader_id', 'follower_id')->withTimestamps();
    }


    public function followings(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'followers', 'follower_id', 'leader_id')->withTimestamps();
    }

    public function userPostFolowing(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_favorites', 'follower_id', 'post_id');
    }

    public function userHubFollowing(): BelongsToMany
    {
        return $this->belongsToMany(Hub::class, 'hub_followers', 'follower_id', 'hub_id');
    }

    public function isFollowing(self $user) : bool
    {
        return (bool)$this->followers()->where('follower_id', $user->id)->count();
    }

    public function getUserIdsAttribute(): array
    {
        return $this->followers()->pluck('follower_id')->toArray();
    }

    public function getPostsIdsAttribute():array
    {
        return $this->userPostFolowing()->pluck('post_id')->toArray();
    }

    public function getHubsIdsAttribute(): array
    {
        return $this->userHubFollowing()->pluck('hub_id')->toArray();
    }

    public function getCommentsIdsAttribute(): array
    {
        return $this->comments()->pluck('post_id')->toArray();
    }

    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favoritable');
    }
}
