<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use Notifiable, HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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

    /**
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    /**
     * @return BelongsToMany
     */
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'followers', 'leader_id', 'follower_id');
    }

    /**
     * @return BelongsToMany
     */
    public function followings(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'followers', 'follower_id', 'leader_id');
    }

    /**
     * @return BelongsToMany
     */
    public function userPostFolowing(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_favorites', 'follower_id', 'post_id');
    }

    /**
     * @return BelongsToMany
     */
    public function userHubFollowing(): BelongsToMany
    {
        return $this->belongsToMany(Hub::class, 'hub_followers', 'follower_id', 'hub_id');
    }

    /**
     * @return array
     */
    public function getUserIdsAttribute(): array
    {
        return $this->followers()->pluck('follower_id')->toArray();
    }

    /**
     * @return array
     */
    public function getHubsIdsAttribute(): array
    {
        return $this->userHubFollowing()->pluck('hub_id')->toArray();
    }

    /**
     * @param User $user
     * @return bool
     */
    public function isFollowing(self $user): bool
    {
        return (bool) $this->followers()->where('follower_id', $user->id)->count();
    }
}
