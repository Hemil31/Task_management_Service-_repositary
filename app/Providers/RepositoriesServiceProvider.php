<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            'App\Interfaces\UserInterface',
            'App\Repositories\UserRepositories'
        );
        $this->app->bind(
            'App\Interfaces\UserTaskInterface',
            'App\Repositories\UserTaskRepositories'
        );
        $this->app->bind(
            'App\Interfaces\EmailInterfaceSend',
            'App\Repositories\EmailRepositoriesSend'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
