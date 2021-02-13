<?php

namespace Easy\CatalogCategory;

use Illuminate\Support\ServiceProvider;


class CatalogCategoryServiceProvider extends ServiceProvider
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
      $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

}
