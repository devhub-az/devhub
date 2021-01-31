<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\VerifyAdmins;
use App\Models\Article;
use App\Models\User;
use App\Models\View;
use Carbon\Carbon;

/**
 * Class AdminController
 *
 * @package \App\Http\Controllers\Admin
 */
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware([Authenticate::class, VerifyAdmins::class]);
    }

    public function index()
    {
        $users    = User::latest()->paginate(10);
        $articles = Article::get();
        $views    = View::get();

        $newUsers = $users->where(
            'created_at',
            '>=',
            Carbon::now()->subDays(1)->startOfDay()
        )->count();

        $newViews = $views->where(
            'created_at',
            '>=',
            Carbon::now()->subDays(1)->startOfDay()
        )->count();

        $newArticles = $articles->where(
            'created_at',
            '>=',
            Carbon::now()->subDays(1)->startOfDay()
        )->count();

        return view('admin.home', compact('users', 'newUsers', 'articles', 'newArticles', 'views', 'newViews'));
    }
}
