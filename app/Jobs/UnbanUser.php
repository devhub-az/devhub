<?php

namespace App\Jobs;

use App\Models\User;

final class UnbanUser
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function handle(): User
    {
        $this->user->banned_at = null;
        $this->user->save();

        return $this->user;
    }
}
