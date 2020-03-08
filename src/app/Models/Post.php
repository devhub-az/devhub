<?php
declare(strict_types=1);

namespace App\Models;

use App\Http\Traits\Can\CanBeBookmarked;
use App\Http\Traits\Can\CanBeVoted;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use CanBeVoted, CanBeBookmarked;

    protected $table = 'posts';

    protected $fillable = [
        'id',
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

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'post_id')->with('author');
    }

    /**
     * @return array
     */
    public function getHubsIdsAttribute(): array
    {
        return $this->hubs()->pluck('hub_id')->toArray();
    }

}
