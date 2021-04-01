<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\VerifyAdmins;
use App\Jobs\BanUser;
use App\Jobs\DeleteUser;
use App\Jobs\UnbanUser;
use App\Models\User;
use App\Policies\AuthorPolicy;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\RedirectResponse;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware([Authenticate::class, VerifyAdmins::class]);
    }

    public function ban(User $user): RedirectResponse
    {
        try {
            $this->authorize(AuthorPolicy::BAN, $user);
        } catch (AuthorizationException $e) {
        }

        $this->dispatchNow(new BanUser($user));

        return back();
    }

    public function unban(User $user): RedirectResponse
    {
        try {
            $this->authorize(AuthorPolicy::BAN, $user);
        } catch (AuthorizationException $e) {
        }

        $this->dispatchNow(new UnbanUser($user));

        return back();
    }

    public function delete(User $user): RedirectResponse
    {
        try {
            $this->authorize(AuthorPolicy::DELETE, $user);
        } catch (AuthorizationException $e) {
        }

        $this->dispatchNow(new DeleteUser($user));

        $this->success('admin.users.deleted', $user->name());

        return redirect()->route('admin');
    }
}
