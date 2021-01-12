<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Ramsey\Uuid\Uuid;
use Laravel\Socialite\Facades\Socialite;
use Str;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function github()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubRedirect(): RedirectResponse
    {
        $user = Socialite::driver('github')->user();

        $user = User::firstOrCreate(
            [
                'email' => $user->email,
            ],
            [
                'id'          => Uuid::uuid4(),
                'name'        => $user->name,
                'description' => $user->user['bio'],
                'username'    => $user->nickname,
                'github_url'  => $user->user['html_url'],
                'password'    => Hash::make(Str::random(24)),
            ]
        );

        Auth::login($user, true);

        return back();
    }
}
