<?php

namespace App\Models;

use App\Http\Traits\Can\CanBeFollowed;
use App\Http\Traits\Can\CanBookmark;
use App\Http\Traits\Can\CanFollow;
use App\Http\Traits\Can\CanVote;
use App\Http\Traits\PermissionManager;
use Eloquent;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Silber\Bouncer\Database\HasRolesAndAbilities;
use Laravel\Passport\HasApiTokens;

/**
 * Class User
 * @package App\Models
 * @mixin Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable, PermissionManager, CanFollow, CanBeFollowed, CanBookmark, CanVote, HasRolesAndAbilities;

    protected $visible = [
        'id',
        'username',
        'avatar',
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

    public function tokens () {
        return $this->hasMany(Token::class, 'user_id', 'id');
    }

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
     * Get posts ids where comments was wrote
     * @return array
     */
    public function getCommentsIdsAuthor(): array
    {
        return $this->comments()->pluck('post_id')->toArray();
    }

    //Trash

    public function messagesNotificationsCount(): int
    {
        return $this->hasMany(Message::class, 'to_id', 'id')->whereNull('read_at')->count();
    }

    //End trash
}
