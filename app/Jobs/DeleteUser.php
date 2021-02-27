<?php

namespace App\Jobs;

use App\Models\User;

final class DeleteUser
{
    /**
     * @var User
     */
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function handle()
    {
        $this->user->delete();
    }
}
