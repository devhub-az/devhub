<?php

namespace App\Policies;

use App\Models\User;

final class AuthorPolicy
{
    const FOLLOW = 'follow';
    const ADMIN = 'admin';
    const BAN = 'ban';
    const DELETE = 'delete';

    public function follow(User $user, User $subject): bool
    {
        return ! $subject->isFollowedBy($user) && $user->id !== $subject->id;
    }

    public function admin(User $user): bool
    {
        return $user->isAdmin() || $user->isModerator();
    }

    public function ban(User $user, User $subject): bool
    {
        return ($user->isAdmin() && ! $subject->isAdmin()) ||
            ($user->isModerator() && ! $subject->isAdmin() && ! $subject->isModerator());
    }

    public function delete(User $user, User $subject): bool
    {
        return ($user->isAdmin() || $user->matches($subject)) && ! $subject->isAdmin();
    }
}
