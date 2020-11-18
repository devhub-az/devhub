<?php
declare(strict_types=1);

namespace App\Models;

use App\Http\Traits\Can\CanBeBookmarked;
use App\Http\Traits\Can\CanBeVoted;
use Auth;
use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Post
 *
 * @mixin Eloquent
 */
class Post extends Model
{
    use CanBeVoted, CanBeBookmarked;

    protected $table = 'posts';

    protected $fillable = [
        'name',
        'body',
        'author_id',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id')->withDefault();
    }

    public function hubs(): BelongsToMany
    {
        return $this->belongsToMany(Hub::class, 'post_hubs', 'posts_id', 'hub_id');
    }

    public function views(): HasMany
    {
        return $this->hasMany(PostView::class);
    }

    public function comments(): BelongsToMany
    {
        return $this->belongsToMany(Comment::class, 'structure_tree', 'subject_id',
            'ancestor_id')->with('author')->withPivot('level')->orderBy('ancestor_id');
    }

    public function isAuthUserUpvoted()
    {
        return (string)$this->isUpvotedBy((int)Auth::user());
    }

    /**
     * @return array
     */
    public function getHubsIdsAttribute(): array
    {
        return $this->hubs()->pluck('hub_id')->toArray();
    }

}
