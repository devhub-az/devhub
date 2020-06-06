<?php

namespace App\Providers;

use App\Models\Hub;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Comment;
use App\Models\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Session::put('lang', 'az');
        $this->app->singleton(Parsedown::class);
        \Carbon\Carbon::setLocale('az');
        Schema::defaultStringLength(191);

        Relation::morphMap([
            'posts'    => Post::class,
            'comments' => Comment::class,
            'users'    => User::class,
            'hubs'     => Hub::class,
        ]);
    }
}
