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
    public function showArticles(Request $request, User $user): View
    {
        AuthorResource::withoutWrapping();

        $user_col = new AuthorResource($user);

        return view(
            'pages.profile.show.articles',
            [
                'author' => $user_col->toResponse($request)->getData(),
                'user'   => $user,
                'url'    => '/api/authors/'.$user->id.'/all',
            ]
        );
    }

    /**
     * @param Request $request
     * @param User    $user
     * @return View
     */
    public function showInfo(Request $request, User $user): View
    {
        AuthorResource::withoutWrapping();

        $user_col = new AuthorResource($user);

        return view(
            'pages.profile.show.info',
            [
                'author' => $user_col->toResponse($request)->getData(),
                'user'   => $user,
            ]
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
            ['user' => $user, 'followers' => $followers]
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
            ['user' => $user, 'followings' => $followings]
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
        $request->validate(
            [
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );

        $user = Auth::user();

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars', $avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()->with('success', 'You have successfully upload image.');
    }

    public function popover(string $id)
    {
        $author = User::find($id);

        return view('popover.author', [
            'author' => $author,
        ]);
    }

}
