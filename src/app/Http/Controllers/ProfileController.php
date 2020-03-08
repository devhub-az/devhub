<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['follow']]);
    }

    public function follow(Request $request): JsonResponse
    {
        $userId = Auth::user();
        $followUser = User::findOrFail($request->get('id'));
        if (isset($followUser) && !$followUser->isFollowedBy($userId)) {
            $userId->follow($followUser);

            return response()->json(['success' => 'success'], 200);
        }
        if ($followUser->isFollowedBy($userId)) {
            $userId->unfollow($followUser);

            return response()->json(['delete' => 'delete'], 200);
        }

        return response()->json(['error' => 'error'], 401);
    }
}
