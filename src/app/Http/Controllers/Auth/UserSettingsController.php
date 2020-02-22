<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\ValidationException;

class UserSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        if (\Auth::User()->username === $request->username) {
            $user = \Auth::user();
            $user->email = substr_replace($user->email, '***', 2, strpos($user->email, "@") - 2);
            return view('auth.settings.profile', compact("user"));
        }

        return abort(404);
    }

    public function update_avatar(Request $request)
    {

//        $request->validate([
//            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        ]);

        $user = \Auth::user();

        $avatarName = $user->id . '_avatar' . time() . '.' . request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars', $avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('success', 'You have successfully upload image.');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserProfile $request
     * @return void
     */
    public function update(UserProfile $request)
    {
        $user = \Auth::user();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email ? $request->email : \Auth::user()->email;
        $user->about = $request->about;

        $user->save();

        return response()->json($user, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
