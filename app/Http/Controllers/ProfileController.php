<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class ProfileController extends Controller
{
    /**
     * Follow the user.
     *
     * @param $profileId
     *
     */
    public function followUser(int $profileId)
    {
    	$user = User::find($profileId);
    	if(!$user) {
        	return back()->with('error', 'User does not exist.'); 
        }

        if(!Auth::check()){
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
     */
    public function unFollowUser(int $profileId)
    {
    	$user = User::find($profileId);
    	if(! $user) {
        	return redirect()->back()->with('error', 'User does not exist.'); 
    	}
	    $user->followers()->detach(auth()->user()->id);
	    return redirect()->back()->with('success', 'Successfully unfollowed the user.');
    }
}
