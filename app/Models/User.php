<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Http\UploadedFile;

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

    public function setImageAttribute(string $image)
    {
        \Storage::putFileAs('profile', new UploadedFile($image, $image), "{$this->uuid}.jpg");
    }

    public function posts()
    {
        return $this->hasMany(Posts::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'leader_id', 'follower_id');
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'leader_id');
    }

    public function userPostFolowing()
    {
        return $this->belongsToMany(Post::class, 'post_favorites', 'follower_id', 'post_id');
    }

    public function userHubFollowing()
    {
        return $this->belongsToMany(Hub::class, 'hub_followers', 'follower_id', 'hub_id');
    }

    public function getUserIdsAttribute()
    {
        return $this->followers()->pluck('follower_id')->toArray();
    }

    public function getHubsIdsAttribute()
    {
        return $this->userHubFollowing()->pluck('hub_id')->toArray();
    }

    public function isFollowing(User $user)
    {
        return !!$this->followers()->where('follower_id', $user->id)->count();
    }
}
