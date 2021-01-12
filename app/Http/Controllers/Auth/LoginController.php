<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\AuthGetIP;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;
use Ramsey\Uuid\Uuid;
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

    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (auth()->attempt([$fieldType => $input['username'], 'password' => $input['password']])) {
            AuthGetIP::dispatch(auth()->user(), $request->ip());
            auth()->user()->notify(
                new Logger(
                    'AUTH',
                    null,
                    auth()->user(),
                    "🔒 User logged in to Taskord\n\n`".$request->ip().'`'
                )
            );
            loggy(request()->ip(), 'Auth', auth()->user(), 'Logged in via Taskord auth with '.auth()->user()->email);

            return redirect()->route('home');
        } else {
            $request->session()->flash('error', 'Invalid login credentials');

            return redirect()->back();
        }
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
