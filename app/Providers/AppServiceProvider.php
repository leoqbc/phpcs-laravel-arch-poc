<?php

namespace App\Providers;

use App\Repository\Eloquent\EloquentRepository;
use App\UseCase\BiddingsUseCase;
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
        $this->app->singleton(BiddingsUseCase::class, function ($app) {
            return new BiddingsUseCase($app->make(EloquentRepository::class));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // ...
    }
}
