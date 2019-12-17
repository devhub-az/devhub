<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class ProfileController extends Controller
{
    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['unFollowUser']]);
    }

    /**
     * Follow the user.
     *
     * @param $profileId
     *
     * @return RedirectResponse|Redirector
     */
    public function followUser(int $profileId)
    {
        $user = User::find($profileId);
        if (!$user) {
            return back()->with('error', 'User does not exist.');
        }

        if (!Auth::check()) {
            return redirect('login');
        }

        $user->followers()->attach(auth()->user()->id);

        return back()->with('success', 'Successfully followed the user.');
    }

    /**
     * Follow the user.
     *
     * @param $profileId
     *
     * @return RedirectResponse
     */
    public function unFollowUser(int $profileId)
    {
        $user = User::find($profileId);
        if (!$user) {
            return redirect()->back()->with('error', 'User does not exist.');
        }
        $user->followers()->detach(auth()->user()->id);

        return redirect()->back()->with('success', 'Successfully unfollowed the user.');
    }
}
