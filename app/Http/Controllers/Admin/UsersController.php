<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Silber\Bouncer\Database\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return Factory|View
     */
    public function index()
    {

        $users = User::with('roles')->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return Factory|View
     */
    public function create()
    {
        $roles = Role::get()->pluck('name', 'name');

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param StoreUsersRequest $request
     * @return RedirectResponse
     */
    public function store(StoreUsersRequest $request): RedirectResponse
    {
        $user = User::create($request->all());

        if ($request->input('roles')) {
            foreach ($request->input('roles') as $role) {
                $user->assign($role);
            }
        }

        return redirect()->route('admin.users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param int $id
     * @return Factory|View
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
     * @param UpdateUsersRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateUsersRequest $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        foreach ($user->roles as $role) {
            $user->retract($role);
        }
        if ($request->input('roles')) {
            foreach ($request->input('roles') as $role) {
                $user->assign($role);
            }
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
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @return Response
     */
    public function massDestroy(): Response
    {
        User::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }

}
