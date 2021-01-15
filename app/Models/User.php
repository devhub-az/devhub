<?php

namespace App\Models;

use Eloquent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Jcc\LaravelVote\CanBeVoted;
use Jcc\LaravelVote\Vote;
use Laravel\Passport\HasApiTokens;
use Overtrue\LaravelFavorite\Traits\Favoriter;
use Overtrue\LaravelFollow\Followable;
use Silber\Bouncer\Database\HasRolesAndAbilities;

/**
 * Class User.
 *
 * @mixin Eloquent
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use Followable;
    use HasApiTokens;
    use Vote;
    use Favoriter;
    use CanBeVoted;
    use SoftDeletes;
    use HasRolesAndAbilities;
    use HasFactory;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id',
        'name',
        'email',
        'is_admin',
        'avatar',
        'password',
        'confirm_code',
        'username',
        'email_notify_enabled',
        'github_id',
        'github_url',
        'website',
        'description',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'confirm_code',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get Posts where user is author with hubs(function in post model).
     *
     * @return HasMany
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class, 'author_id')->with('hubs');
    }

    /**
     * Get Comments where user is author.
     *
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'author_id');
    }

    /**
     * Get posts ids where comments was wrote.
     *
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
