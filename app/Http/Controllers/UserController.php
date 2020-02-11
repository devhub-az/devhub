<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function show($username)
    {
        $user = User::where('username', '=', $username)->get()->first();
        $isFollowing = 'false';
        if ($user === null) {
            abort('404');
        } elseif (Auth::check()) {
            $isFollowing = $user->isFollowing(Auth::user());
        }
        
        return view('pages.profile.main', ['user' => $user, 'isFollowing' => $isFollowing, 'url' => '/api/users/'. $user->id .'/posts']);
    }

    public function userList()
    {
        return view('pages.profile.users');
    }
}
