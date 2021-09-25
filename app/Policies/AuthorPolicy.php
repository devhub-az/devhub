<?php

namespace App\Policies;

use App\Models\User;

final class AuthorPolicy
{
    public const FOLLOW = 'follow';
    public const ADMIN = 'admin';
    public const BAN = 'ban';
    public const DELETE = 'delete';

    public function follow(User $user, User $subject): bool
    {
        return $user->id !== $subject->id;
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
