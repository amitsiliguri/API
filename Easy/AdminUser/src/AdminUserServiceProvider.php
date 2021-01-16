<?php

namespace Easy\AdminUser;

use Illuminate\Support\ServiceProvider;

// use Illuminate\Routing\Router;

class AdminUserServiceProvider extends ServiceProvider
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
      $this->loadRoutesFrom(__DIR__.'/routes/api.php');
    }

}
