<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Models\Article;
use App\Models\Hub;
use App\Models\User;
use Auth;
use Carbon\CarbonPeriod;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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

        $user = new AuthorResource(
            User::withCount(['followers', 'followings'])->where('username', $username)->firstorfail()
        );

        return view(
            'pages.profile.show.posts',
            [
                'user'      => $user->toResponse($request)->getData(),
                'url'       => '/api/authors/'.$user->id.'/posts',
                'auth_user' => $this->auth_user,
            ]
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

        $user_col = new AuthorResource(
            User::withCount(['followers', 'followings'])->where('username', $username)->firstorfail()
        );
        $start_date = Carbon::now()->subDays(30)->format('Y-m-d');
        $current_date = Carbon::now()->format('Y-m-d');
        $period = CarbonPeriod::create($start_date, $current_date);

        foreach ($period->toArray() as $date) {
            $week_dates[] = Carbon::parse($date)->format('Y-m-d');
            $count[] = Article::select('created_at')->where('author_id', $user_col->id)
                ->whereDate('created_at', Carbon::parse($date))
                ->count();
            $tasks[] = $count;
        }

        return view(
            'pages.profile.show.info',
            ['user' => $user_col->toResponse($request)->getData(), 'auth_user' => $this->auth_user],
            compact('count')
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
}
