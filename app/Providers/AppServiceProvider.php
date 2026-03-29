<?php

namespace App\Providers;

use App\Interfaces\RepositoryInterface;
use App\Repositories\TagRepository;
use App\Repositories\TaskRepository;
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
        $this->app->bind(RepositoryInterface::class, TaskRepository::class);
        $this->app->bind(RepositoryInterface::class, TagRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
