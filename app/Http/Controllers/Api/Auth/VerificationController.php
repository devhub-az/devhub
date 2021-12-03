<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use function auth;
use function response;

class VerificationController extends Controller
{
    public function verify($user_id, Request $request): JsonResponse|RedirectResponse
    {
        if (!$request->hasValidSignature()) {
            return response()->json(["message" => "Invalid/Expired url provided."], 401);
        }
        $user = User::findOrFail($user_id);

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        return response()->json(["message" => "User verified"]);
    }

    public function resend(): JsonResponse
    {
        if (auth()->user()->hasVerifiedEmail()) {
            return response()->json(["message" => "Email already verified."], 400);
        }

        auth()->user()->sendEmailVerificationNotification();

        return response()->json(["message" => "Email verification link sent on your email id"]);
    }
}
