<?php

namespace App\Models;

use Auth;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jcc\LaravelVote\CanBeVoted;
use Overtrue\LaravelFavorite\Traits\Favoriteable;
use Str;

/**
 * Post.
 *
 * @mixin Eloquent
 */
class Article extends Model
{
    use SoftDeletes;
    use CanBeVoted;
    use HasFactory;
    use Favoriteable;

    protected $vote = User::class;

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
    protected $dates = ['published_at', 'created_at', 'deleted_at'];

    protected $fillable = [
        'id',
        'slug',
        'name',
        'content',
        'author_id',
    ];

    

    /**
     * Set the unique slug.
     *
     * @param $value
     * @param $extra
     */
    public function setUniqueSlug($value, $extra)
    {
        $slug = Str::slug($value.'-'.$extra);

        if (static::whereSlug($slug)->exists()) {
            $this->setUniqueSlug($slug, (int) $extra + 1);

            return;
        }

        $this->attributes['slug'] = $slug;
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id')->withDefault();
    }

    public function hubs(): BelongsToMany
    {
        return $this->belongsToMany(Hub::class, 'post_hubs', 'posts_id', 'hub_id');
    }

    /**
     * Get the views relationship.
     *
     * @return HasMany
     */
    public function views(): HasMany
    {
        return $this->hasMany(View::class);
    }

//    public function comments(): BelongsToMany
//    {
//        return $this->belongsToMany(Comment::class, 'structure_tree', 'subject_id',
//            'ancestor_id')->with('author')->withPivot('level')->orderBy('ancestor_id');
//    }

    public function isAuthUserUpvoted()
    {
        return (string) $this->isUpvotedBy((int) Auth::user());
    }

    /**
     * @return array
     */
    public function getHubsIdsAttribute(): array
    {
        return $this->hubs()->pluck('hub_id')->toArray();
    }
}
