<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Models\User;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
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

    /**
     * @param Request $request
     * @param         $username
     * @return Factory|View|Application
     */
    public function showPosts(Request $request, $username): Factory|View|Application
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
     * @return Factory|View|Application
     */
    public function showInfo(Request $request, $username): Factory|View|Application
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
     * @return Application|Factory|View
     */
    public function showFollowers($username)
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
     * @return Application|Factory|View
     */
    public function showFollowings($username): Factory|View|Application
    {
        $user = User::where('username', '=', $username)->firstorfail();

        $followings = $user->followings()->addselect('name', 'avatar')->get();

        return view(
            'pages.profile.show.followings',
            ['user' => $user, 'followings' => $followings, 'auth_user' => $this->auth_user]
        );
    }

    /**
     * @return Factory|View|Application
     */
    public function userList(): Factory|View|Application
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
