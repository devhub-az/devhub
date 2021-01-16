<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserProfile;
use App\Models\User;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserSettingsController extends Controller
{
    /**
     * @var User|null
     */
    private ?User $user;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(
            function ($request, $next) {
                $this->user = Auth::user();

                return $next($request);
            }
        );
    }

    public function index(Request $request)
    {
        $this->user->email = substr_replace($this->user->email, '****', 1, strpos($this->user->email, '@') - 1);

        return view('auth.settings.profile', ['user' => $this->user]);
    }

    public function update_avatar(Request $request)
    {
//        $request->validate([
//            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        ]);

        dd(request()->avatar);

        $user = Auth::user();

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars', $avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()->with('success', 'You have successfully upload image.');
    }

    public function update(UserProfile $request): JsonResponse
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->username = $request->username;
        if ($request->email) {
            $user->email = $request->email;
        }
        $user->description = $request->description;

        $user->save();

        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     * @return Response
     */
    public function destroy()
    {
        //
    }
}
