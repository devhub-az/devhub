<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //check that app is local
        if ($this->app->isLocal()) {
            //if local register your services you require for development
            $this->app->register('Barryvdh\Debugbar\ServiceProvider');
        }else{
            //else register your services you require for production
            $this->app['request']->server->set('HTTPS', true);
        }
        $this->app->singleton(Parsedown::class);
        \Carbon\Carbon::setLocale('az');
        Schema::defaultStringLength(191);
    }
}
