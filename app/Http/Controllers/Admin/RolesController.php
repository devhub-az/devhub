<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRolesRequest;
use App\Http\Requests\Admin\UpdateRolesRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Silber\Bouncer\Database\Ability;
use Silber\Bouncer\Database\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of Role.
     *
     * @return Factory|View|void
     */
    public function index()
    {
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating new Role.
     *
     * @return Factory|View|void
     */
    public function create()
    {
        return view('admin.roles.create', compact('abilities'));
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param StoreRolesRequest $request
     *
     * @return RedirectResponse|void
     */
    public function store(StoreRolesRequest $request)
    {
        $role = Role::create($request->all());
        $role->allow($request->input('abilities'));

        return redirect()->route('admin.roles.index');
    }

    /**
     * Show the form for editing Role.
     *
     * @param int $id
     *
     * @return Factory|View|void
     */
    public function edit($id)
    {
        $abilities = Ability::get()->pluck('name', 'name');

        $role = Role::findOrFail($id);

        return view('admin.roles.edit', compact('role', 'abilities'));
    }

    /**
     * Update Role in storage.
     *
     * @param UpdateRolesRequest $request
     * @param int                $id
     *
     * @return RedirectResponse|void
     */
    public function update(UpdateRolesRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());
        foreach ($role->getAbilities() as $ability) {
            $role->disallow($ability->name);
        }
        $role->allow($request->input('abilities'));

        return redirect()->route('admin.roles.index');
    }

    public function show(Role $role)
    {
        $role->load('abilities');

        return view('admin.roles.show', compact('role'));
    }

    /**
     * Remove Role from storage.
     *
     * @param int $id
     *
     * @return RedirectResponse|void
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('admin.roles.index');
    }

    /**
     * Delete all selected Role at once.
     *
     *
     * @return Response|void
     */
    public function massDestroy()
    {
        Role::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
