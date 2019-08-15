<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use App\Models\Posts;

class User extends Authenticatable implements HasMedia
{
    use HasMediaTrait;
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['user_ids'];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('small')
            ->width(50)
            ->height(50);
        $this->addMediaConversion('big')
            ->width(120)
            ->height(120);
        $this->addMediaConversion('very-big')
            ->width(320)
            ->height(320);
    }

    public function posts(){
        return $this->hasMany(Posts::class);
    }

    public function followers(){
        return $this->belongsToMany(User::class, 'followers', 'leader_id', 'follower_id');
    }

    public function followings(){
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'leader_id');
    }

    public function userPostFolowing(){
        return $this->belongsToMany(Post::class, 'post_favorites', 'follower_id', 'post_id');
    }

    public function userHubFolowing(){
        return $this->belongsToMany(Hubs::class, 'hub_followers', 'follower_id', 'hub_id');
    }

    public function getUserIdsAttribute()
    {
        return $this->followers()->pluck('follower_id')->toArray();
    }

    public function getHubsIdsAttribute()
    {
        return $this->userHubFolowing()->pluck('hub_id')->toArray();
    }

    public function isFollowing(User $user){
        return !! $this->followers()->where('follower_id', $user->id)->count();
    }
}
