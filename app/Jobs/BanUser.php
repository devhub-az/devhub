<?php

namespace App\Jobs;

use App\Models\User;
use Carbon\Carbon;

final class BanUser
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function handle(): User
    {
        $this->user->banned_at = Carbon::now();
        $this->user->save();

        return $this->user;
    }
}
