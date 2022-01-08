<?php

namespace App\Providers;

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
            \Package\Domain\Model\Task\TaskRepository::class,
            \Package\Adapter\Gateway\TaskGateway::class,
        );

        $this->app->bind(
            \Package\Domain\Model\User\UserRepository::class,
            \Package\Adapter\Gateway\UserGateway::class,
        );

        $this->app->bind(
            \Package\Domain\Model\Wordbook\WordbookRepository::class,
            \Package\Adapter\Gateway\WordbookGateway::class,
        );

        $this->app->bind(
            \Package\Domain\Model\Word\WordRepository::class,
            \Package\Adapter\Gateway\WordGateway::class,
        );

        $this->app->bind(
            \Package\Domain\Model\Favorite\FavoriteRepository::class,
            \Package\Adapter\Gateway\FavoriteGateway::class,
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
