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
    	if($user == null)
    		abort('404');
        if (Auth::check()) {
            $isFollowing = $user->isFollowing(Auth::user());
        }
        return view('pages.profile.main', ['user' => $user, 'isFollowing' => $isFollowing]);
    }

    public function userList()
    {
    	return view('pages.profile.users');
    }
}
