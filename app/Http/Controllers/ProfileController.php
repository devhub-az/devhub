<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
//    TODO: ADD FAVORITE VIEW(blade)
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function follow(Request $request): JsonResponse
    {
        $followUser = User::findOrFail($request->get('id'));
        if (Auth::check()) {
            if (! $followUser->isFollowedBy(Auth::user()->id)) {
                try {
                    Auth::user()->follow($followUser);
                } catch (\Exception $e) {
                    report($e);
                }

                return response()->json(true, 201);
            }
            if ($followUser->isFollowedBy(Auth::user())) {
                try {
                    Auth::user()->unfollow($followUser);
                } catch (\Exception $e) {
                    report($e);
                }

                return response()->json(false, 201);
            }
        }

        return response()->json([], 403);
    }
}
