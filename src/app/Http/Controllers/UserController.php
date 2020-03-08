<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showPosts($username)
    {
        $user = User::where('username', '=', $username)->firstorfail();

        return view(
            'pages.profile.show.posts',
            ['user' => $user, 'url' => '/api/users/' . $user->id . '/posts']
        );
    }

    public function showInfo($username)
    {
        $user = User::where('username', '=', $username)->firstorfail();

        return view(
            'pages.profile.show.info',
            ['user' => $user, 'url' => '/api/users/' . $user->id . '/posts']
        );
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
