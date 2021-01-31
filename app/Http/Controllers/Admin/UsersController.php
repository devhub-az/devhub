<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\VerifyAdmins;
use App\Jobs\BanUser;
use App\Jobs\DeleteUser;
use App\Jobs\UnbanUser;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Auth\Middleware\Authenticate;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware([Authenticate::class, VerifyAdmins::class]);
    }

    public function ban(User $user)
    {
        $this->authorize(UserPolicy::BAN, $user);

        $this->dispatchNow(new BanUser($user));

        return back();
    }

    public function unban(User $user)
    {
        $this->authorize(UserPolicy::BAN, $user);

        $this->dispatchNow(new UnbanUser($user));

        return back();
    }

    public function delete(User $user)
    {
        $this->authorize(UserPolicy::DELETE, $user);

        $this->dispatchNow(new DeleteUser($user));

        $this->success('admin.users.deleted', $user->name());

        return redirect()->route('admin');
    }
}
