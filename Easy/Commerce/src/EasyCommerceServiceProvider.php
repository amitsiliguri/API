<?php

namespace Easy\Commerce;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

use Easy\Commerce\Repository\Supplier\SupplierRepository;
use Easy\Commerce\Contracts\Supplier\SupplierRepositoryInterface;

use Easy\Commerce\Repository\Supplier\SupplierAddressRepository;
use Easy\Commerce\Contracts\Supplier\SupplierAddressRepositoryInterface;

use Easy\Commerce\Repository\Supplier\SupplierContactPersonRepository;
use Easy\Commerce\Contracts\Supplier\SupplierContactPersonRepositoryInterface;

/**
 * Class EasyCommerceServiceProvider
 * @package Easy\Commerce
 */
class EasyCommerceServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    private $namespace = 'Easy\Commerce';
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
        $this->app->bind(SupplierRepositoryInterface::class,SupplierRepository::class);
        $this->app->bind(SupplierAddressRepositoryInterface::class,SupplierAddressRepository::class);
        $this->app->bind(SupplierContactPersonRepositoryInterface::class,SupplierContactPersonRepository::class);

        $this->mergeAuthFileFrom(__DIR__ . '/config/auth.php', 'auth');

        Route::group($this->adminRouteConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/routes/api/admin.php');
        });

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    /**
     * Admin Route Configuration
     *
     * @return array
     */
    private function adminRouteConfiguration(): array
    {
        return [
            'namespace'  => $this->namespace,
            'middleware' => 'api',
            'prefix'     => 'api/admin',
        ];
    }

    /**
     * Merge auth configurations.
     *
     * @param $path
     * @param $key
     * @return void
     */
    protected function mergeAuthFileFrom($path,$key): void
    {
        $original = $this->app['config']->get($key, []);
        $this->app['config']->set($key, $this->multi_array_merge(require $path, $original));
    }

    /**
     * @param $toMerge
     * @param $original
     * @return array
     */
    protected function multi_array_merge($toMerge, $original): array
    {
        $auth = [];
        foreach ($original as $key => $value) {
            if (isset($toMerge[$key])) {
                $auth[$key] = array_merge($value, $toMerge[$key]);
            } else {
                $auth[$key] = $value;
            }
        }
        return $auth;
    }
}
