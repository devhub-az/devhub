<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasAuthor
{
    public function author(): BelongsTo
    {
        return $this->creator();
    }

    public function authoredBy(User $author)
    {
        $this->creator()->associate($author);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function isAuthoredBy(User $user): bool
    {
        return $this->author()->matches($user);
    }
}
