<?php

namespace App\Models;

use App\Helpers\HasAuthor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

final class Comment extends Model
{
    use HasAuthor;

    /**
     * {@inheritdoc}
     */
    protected $table = 'comments';

    /**
     * {@inheritdoc}
     */
    protected $guarded = ['id'];

    /**
     * {@inheritdoc}
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * {@inheritdoc}
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * Relationship: commentable models.
     *
     * @return MorphTo
     */
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function articles(): MorphToMany
    {
        return $this->morphedByMany(Article::class, 'commentable');
    }
}
