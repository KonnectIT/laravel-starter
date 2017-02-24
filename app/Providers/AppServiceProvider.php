<?php

namespace App\Providers;

use Debugbar;
use Faker\Generator as FakerGenerator;
use Faker\Factory as FakerFactory;
use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\DuskServiceProvider;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton( FakerGenerator::class, function () {
            return FakerFactory::create( 'nl_NL' );
        } );

        if ($this->app->environment() !== 'production') {
            $this->app->register(DuskServiceProvider::class);
            $this->app->register(IdeHelperServiceProvider::class);
        }
        if (config('app.debug')) {
            Debugbar::enable();
        } else {
            Debugbar::disable();
        }
    }
}
