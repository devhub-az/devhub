<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\AuthorResource;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

//        $user->sendEmailVerificationNotification();

//        $token = $user->createToken($request->username)->plainTextToken;

//        return response()->json(['token' => $token], 201);
    }

    /**
     * Handles Login Request
     *
     * @param LoginRequest $request
     * @return array
     * @throws AuthenticationException
     */
    public function login(LoginRequest $request): array
    {
        if (! auth()->attempt($request->only('email', 'password'))) {
            throw new AuthenticationException("Email or password is not valid");
        }


        $token = auth()->user()->createToken('user-token');

        return [
            'message' => ['successfully logged in'],
            'token' => $token->plainTextToken
        ];
    }

    /**
     * Returns Authenticated User Details
     *
     * @param Request $request
     * @return AuthorResource
     */
    public function details(Request $request): AuthorResource
    {
        return new AuthorResource($request->user());
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return JsonResponse [string] message
     */
    public function logout(): JsonResponse
    {
        auth('sanctum')->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'You have been successfully logged out',
        ]);
    }

    public function sendPasswordResetLinkEmail(Request $request): JsonResponse
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return response()->json(['message' => __($status)]);
        } else {
            throw ValidationException::withMessages([
                'email' => __($status)
            ]);
        }
    }

    public function resetPassword(Request $request): JsonResponse
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return response()->json(['message' => __($status)], 200);
        } else {
            throw ValidationException::withMessages([
                'email' => __($status)
            ]);
        }
    }
}
