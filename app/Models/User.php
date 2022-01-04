<?php

namespace App\Models;

use Eloquent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Laravel\Sanctum\HasApiTokens;
use Multicaret\Acquaintances\Traits\CanVote;
use QCod\Gamify\Gamify;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Multicaret\Acquaintances\Traits\CanFollow;
use Multicaret\Acquaintances\Traits\CanBeFollowed;

/**
 * Class User.
 *
 * @mixin Eloquent
 */
final class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use CanFollow, CanBeFollowed;
    use CanVote;
    use Notifiable;
    use InteractsWithMedia;
    use HasApiTokens;
    use Gamify;
    use SoftDeletes;
    use HasFactory;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public const DEFAULT = 1;
    public const MODERATOR = 2;
    public const ADMIN = 3;

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
    protected $dates = ['created_at', 'last_active', 'deleted_at'];

    protected $fillable = [
        'name',
        'email',
        'password',
        'confirm_code',
        'username',
        'email_verified_at',
        'email_notify_enabled',
        'remember_token',
        'type',
        'github_id',
        'github',
        'website',
        'description',
        'status',
        'activation_token'
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
        'created_at' => 'datetime:j M Y',
        'last_active' => 'datetime:j M Y',
        'email_verified_at' => 'datetime',
    ];

    public function id(): string
    {
        return $this->id;
    }

    public function types(): int
    {
        return (int)$this->type;
    }

    public function isModerator(): bool
    {
        return $this->types() === self::MODERATOR;
    }

    public function isAdmin(): bool
    {
        return $this->types() === self::ADMIN;
    }

    public function isBanned(): bool
    {
        return ! is_null($this->banned_at);
    }

    public function hasPassword(): bool
    {
        $password = $this->getAuthPassword();

        return $password !== '' && $password !== null;
    }

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
        return $this->hasMany(Comment::class, 'author_id')->with('articles');
    }

    /**
     * Get articles ids where comments was wrote.
     *
     * @return array
     */
    public function getCommentsIdsAuthor(): array
    {
        return $this->comments()->pluck('post_id')->toArray();
    }

    /**
     * @return mixed
     */
    public function isOnline()
    {
        return Cache::has('user-online-'.$this->id);
    }

    public static function findByUsername(string $username): self
    {
        return static::withCount(['followers', 'followings', 'articles'])->where('username', $username)->firstOrFail();
    }
}
