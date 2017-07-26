<?php

namespace App\Providers;

use Faker\Generator as FakerGenerator;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\Schema;
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
        /**
         * Laravel 5.4 made a change to the default database character set, and it’s now utf8mb4 which includes
         * support for storing emojis. This only affects new applications and as long as you are running MySQL v5.7.7
         * and higher you do not need to do anything.
         */
        Schema::defaultStringLength(191);
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
    }
}
