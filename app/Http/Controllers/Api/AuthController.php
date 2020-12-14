<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ReqisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
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

        $email    = $request['email'];
        $password = $request['password'];
        $user     = User::where('email', $email)->first();
        if ($user) {
            if (\Hash::check($password, $user->password)) {
                Auth::attempt(
                    [
                        'email'    => $email,
                        'password' => $password,
                    ]
                );

                return response()->json(['success' => true]);
            }

            return response()->json(
                [
                    'success'  => false,
                    'error'    => 'Üzr istəyirik istifadə etdiyiniz etimadnamələr etibarsızdır.',
                    'password' => $password,
                ]
            );
        }

        return response()->json(
            ['success' => false, 'error' => 'Üzr istəyirik istifadə etdiyiniz etimadnamələr etibarsızdır.']
        );

//        if (!$token = JWTAuth::attempt($credentials)) {
//            return response([
//                'status' => 'error',
//                'error'  => 'invalid.credentials',
//                'msg'    => 'Invalid Credentials.'
//            ], 400);
//        }
    }

    public function register(ReqisterRequest $request)
    {
        $validated = $request->validated();
        $user = User::create(
            [
                'id'       => Uuid::uuid4()->toString(),
                'name'     => $validated['name'],
                'username' => $validated['username'],
                'email'    => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]
        );
        return $user;
    }

    public function checkEmail(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email|unique:users',
            ]
        );
//        $input     = ['email' => \Request::get('email')];
//        $rules     = [
//            'email' => 'email|unique:users,email',
//        ];
//
//        try {
//            $validator = Validator::make($input, $rules);
//            return response(null, 204);
//        } catch (\Exception $e){
//            return $e->getMessage();
//        }
    }
}
