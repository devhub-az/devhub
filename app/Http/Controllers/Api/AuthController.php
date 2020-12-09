<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $rules = [
            'email'    => 'required|email',
            'password' => 'required',
        ];

        $input = $request->only('email', 'password');

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            $error = $validator->messages();

            return response()->json(['success' => false, 'error' => $error]);
        }

        $email = $request['email'];
        $password = $request['password'];
        $user = User::where('email', $email)->first();
        if ($user) {
            if (\Hash::check($password, $user->password)) {
                Auth::attempt([
                    'email'    => $email,
                    'password' => $password,
                ]);

                return response()->json(['success' => true]);
            }

            return response()->json(['success' => false, 'error' => 'Üzr istəyirik istifadə etdiyiniz etimadnamələr etibarsızdır.', 'password' => $password]);
        }

        return response()->json(['success' => false, 'error' => 'Üzr istəyirik istifadə etdiyiniz etimadnamələr etibarsızdır.']);

//        if (!$token = JWTAuth::attempt($credentials)) {
//            return response([
//                'status' => 'error',
//                'error'  => 'invalid.credentials',
//                'msg'    => 'Invalid Credentials.'
//            ], 400);
//        }
    }
}
