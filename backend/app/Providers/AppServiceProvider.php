<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Package\Adapter\Gateway\TaskGateway;
use Package\Domain\Model\Task\TaskRepository;

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
            \Package\Domain\Model\Task\TaskRepository::class,
            \Package\Adapter\Gateway\TaskGateway::class,
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
