<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Hub;
use App\Models\User;
use App\Observers\ArticleObserver;
use App\Observers\UserObserver;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        \Session::put('lang', 'ru');
        \Carbon\Carbon::setLocale('az');
        Schema::defaultStringLength(191);

        Article::observe(ArticleObserver::class);
        User::observe(UserObserver::class);

        Relation::morphMap([
            'posts'    => Article::class,
            'comments' => Comment::class,
            'users'    => User::class,
            'hubs'     => Hub::class,
        ]);
    }
}
