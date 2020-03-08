<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Silber\Bouncer\Database\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::with('roles')->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get()->pluck('name', 'name');

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        $user = User::create($request->all());

        foreach ($request->input('roles') as $role) {
            $user->assign($role);
        }

        return redirect()->route('admin.users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::get()->pluck('name', 'name');

        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        foreach ($user->roles as $role) {
            $user->retract($role);
        }
        foreach ($request->input('roles') as $role) {
            $user->assign($role);
        }

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }

}
