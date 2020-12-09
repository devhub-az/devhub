<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $auth_user;

    public function __construct()
    {
        $this->auth_user = new AuthorResource(Auth::user());
    }

    public function showPosts($username)
    {
        $user = User::where('username', '=', $username)->firstorfail();

        return view(
            'pages.profile.show.posts',
            ['user' => $user, 'url' => '/api/authors/' . $user->id . '/posts', 'auth_user' => $this->auth_user]
        );
    }

    public function showInfo($username)
    {
        $user = User::where('username', '=', $username)->firstorfail();

        return view(
            'pages.profile.show.info',
            ['user' => $user, 'auth_user' => $this->auth_user]
        );
    }

    public function showFollowers($username)
    {
        $user = User::where('username', '=', $username)->firstorfail();

        $followers = $user->followers()->addselect('name', 'avatar')->get();
        return view('pages.profile.show.followers',
            ['user' => $user, 'followers' => $followers, 'auth_user' => $this->auth_user]);
    }

    public function showFollowings($username)
    {
        $user = User::where('username', '=', $username)->firstorfail();

        $followings = $user->followings()->addselect('name', 'avatar')->get();
        return view('pages.profile.show.followings',
            ['user' => $user, 'followings' => $followings, 'auth_user' => $this->auth_user]);
    }

    public function userList()
    {
        return view('pages.profile.users');
    }

    public function update_avatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        $avatarName = $user->id . '_avatar' . time() . '.' . request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars', $avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()->with('success', 'You have successfully upload image.');
    }
}
