<?php

namespace App\Providers;

use App\Http\Repositories\Messages\MessageDecorator;
use App\Http\Repositories\Messages\MessageInterface;
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
        $this->app->bind(
            MessageInterface::class,
            MessageDecorator::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
