<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Models\User;
use Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public AuthorResource $auth_user;

    /**
     * AuthorController constructor.
     */
    public function __construct()
    {
        $this->auth_user = new AuthorResource(Auth::user());
    }

    public function showPosts(Request $request, $username)
    {
        AuthorResource::withoutWrapping();

        $user = new AuthorResource(User::withCount(['followers', 'followings'])->where('username', '=', $username)->firstorfail());

        return view(
            'pages.profile.show.posts',
            ['user' => $user->toResponse($request)->getData(), 'url' => '/api/authors/'.$user->id.'/posts', 'auth_user' => $this->auth_user]
        );
    }

    /**
     * @param Request $request
     * @param         $username
     * @return View
     */
    public function showInfo(Request $request, $username): View
    {
        AuthorResource::withoutWrapping();

        $user = new AuthorResource(User::withCount(['followers', 'followings'])->where('username', '=', $username)->firstorfail());

        return view(
            'pages.profile.show.info',
            ['user' => $user->toResponse($request)->getData(), 'auth_user' => $this->auth_user]
        );
    }

    /**
     * @param $username
     * @return View
     */
    public function showFollowers($username): View
    {
        $user = User::where('username', '=', $username)->firstorfail();

        $followers = $user->followers()->addselect('name', 'avatar')->get();

        return view(
            'pages.profile.show.followers',
            ['user' => $user, 'followers' => $followers, 'auth_user' => $this->auth_user]
        );
    }

    /**
     * @param $username
     * @return View
     */
    public function showFollowings($username): View
    {
        $user = User::where('username', '=', $username)->firstorfail();

        $followings = $user->followings()->addselect('name', 'avatar')->get();

        return view(
            'pages.profile.show.followings',
            ['user' => $user, 'followings' => $followings, 'auth_user' => $this->auth_user]
        );
    }

    /**
     * @return View
     */
    public function userList(): View
    {
        return view('pages.profile.users');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update_avatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars', $avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()->with('success', 'You have successfully upload image.');
    }
}
