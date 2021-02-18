<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class FollowAuthor
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function handle(Request $request): JsonResponse
    {
        if ($request->user()->isFollowing($this->user)) {
            $request->user()->unfollow($this->user);

            return response()->json('unfollowed');
        } else {
            $request->user()->follow($this->user);

            return response()->json('followed');
        }
    }
}
