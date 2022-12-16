<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repository\interfaces\SectionRepositoryInterface', 'App\Repository\repos\SectionRepository');
        $this->app->bind('App\Repository\interfaces\SubSectionRepositoryInterface', 'App\Repository\repos\SubSectionRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
