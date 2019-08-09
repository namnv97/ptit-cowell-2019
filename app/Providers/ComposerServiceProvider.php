<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use View;

class ComposerServiceProvider extends ServiceProvider
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
        view()->composer(
            'layouts.client.menus',
            'App\Http\ViewComposers\ViewComposer@compose'
        );

        view()->composer(
            'layouts.client.auth',
            'App\Http\ViewComposers\ViewComposer@auth'
        );

        view()->composer(
            'layouts.client.banner',
            'App\Http\ViewComposers\ViewComposer@slider'
        );

        view()->composer(
            ['layouts.client.client','demo'],
            'App\Http\ViewComposers\ViewComposer@client'
        );
    }
}
