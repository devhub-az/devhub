<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\DB;
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
        \Session::put('lang', 'az');
        $this->app->singleton(Parsedown::class);
        \Carbon\Carbon::setLocale('az');
        Schema::defaultStringLength(191);

        Relation::morphMap([
            'posts' => 'App\Models\Post',
            'comments' => 'App\Models\Comments',
        ]);
    }
}
