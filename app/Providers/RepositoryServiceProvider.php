<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //user
        $this->app->bind(
            'App\Http\Controllers\Interfaces\V1\User\AuthRepositoryInterface',
            'App\Http\Controllers\Eloquent\V1\User\AuthRepository'
        );


        $this->app->bind(
            'App\Http\Controllers\Interfaces\V1\User\HelperRepositoryInterface',
            'App\Http\Controllers\Eloquent\V1\User\HelperRepository'
        );

        $this->app->bind(
            'App\Http\Controllers\Interfaces\V1\User\HomeRepositoryInterface',
            'App\Http\Controllers\Eloquent\V1\User\HomeRepository'
        );
        $this->app->bind(
            'App\Http\Controllers\Interfaces\V1\User\OrdersRepositoryInterface',
            'App\Http\Controllers\Eloquent\V1\User\OrdersRepository'
        );
        $this->app->bind(
            'App\Http\Controllers\Interfaces\V1\User\UserRepositoryInterface',
            'App\Http\Controllers\Eloquent\V1\User\UserRepository'
        );
        $this->app->bind(
            'App\Http\Controllers\Interfaces\V1\User\ReviewRepositoryInterface',
            'App\Http\Controllers\Eloquent\V1\User\ReviewRepository'
        );
        $this->app->bind(
            'App\Http\Controllers\Interfaces\V1\Provider\ReviewRepositoryInterface',
            'App\Http\Controllers\Eloquent\V1\Provider\ReviewRepository'
        );
        $this->app->bind(
            'App\Http\Controllers\Interfaces\V1\User\ServicesRepositoryInterface',
            'App\Http\Controllers\Eloquent\V1\User\ServicesRepository'
        );

        //provider
        $this->app->bind(
            'App\Http\Controllers\Interfaces\V1\Provider\AuthRepositoryInterface',
            'App\Http\Controllers\Eloquent\V1\Provider\AuthRepository'
        );

        $this->app->bind(
            'App\Http\Controllers\Interfaces\V1\Provider\ProviderOrdersRepositoryInterface',
            'App\Http\Controllers\Eloquent\V1\Provider\ProviderOrdersRepository'
        );

        $this->app->bind(
            'App\Http\Controllers\Interfaces\V1\Provider\ReviewRepositoryInterface',
            'App\Http\Controllers\Eloquent\V1\Provider\ReviewRepository'
        );
        $this->app->bind(
            'App\Http\Controllers\Interfaces\V1\Provider\CarRepositoryInterface',
            'App\Http\Controllers\Eloquent\V1\Provider\CarRepository'
        );


    }
}
