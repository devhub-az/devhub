<?php

namespace App\Models;

use App\Http\Traits\PermissionManager;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use Notifiable, HasMediaTrait, PermissionManager;

    public const ROLE_USER = 'User';
    public const ROLE_MANAGER = 'Manager';
    public const ROLE_ADMIN = 'Admin';

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


    public function role()
    {
        return $this->belongsTo(Role::class, 'role_level', 'level');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(200)
            ->height(200)
            ->sharpen(10);

        $this->addMediaConversion('square')
            ->width(412)
            ->height(412)
            ->sharpen(10);
    }


    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'author_id');
    }


    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'followers', 'leader_id', 'follower_id');
    }


    public function followings(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'followers', 'follower_id', 'leader_id');
    }

    public function userPostFolowing(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_favorites', 'follower_id', 'post_id');
    }

    public function userHubFollowing(): BelongsToMany
    {
        return $this->belongsToMany(Hub::class, 'hub_followers', 'follower_id', 'hub_id');
    }

    public function isFollowing(self $user): bool
    {
        return (bool)$this->followers()->where('follower_id', $user->id)->count();
    }

    public function getUserIdsAttribute(): array
    {
        return $this->followers()->pluck('follower_id')->toArray();
    }

    public function getHubsIdsAttribute(): array
    {
        return $this->userHubFollowing()->pluck('hub_id')->toArray();
    }
}
