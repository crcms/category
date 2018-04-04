<?php

namespace CrCms\Category\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

/**
 * Class CategoryServiceProvider
 * @package CrCms\category\src\Providers
 */
class CategoryServiceProvider extends ServiceProvider
{

    protected $basePath = __DIR__ . '/../../';

    protected $name = 'category';

    protected function publish()
    {
        $this->publishes([
//            $this->basePath  ."config/{$this->name}.php" => config_path("{$this->name}.php"),
//            $this->basePath.'/path/to/translations' => resource_path('lang/vendor/courier'),
        ]);
    }

    protected function merge()
    {
        $this->mergeConfigFrom(
            $this->basePath ."config/config.php", $this->name
        );


    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        $this->loadRoutesFrom(
            $this->basePath.'routes/web.php'
        );

    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        $this->loadRoutesFrom(
            /*Route::prefix('api')
                ->middleware('api')
                ->group($this->basePath.'routes/api.php')*/
            $this->basePath.'routes/api.php'
        );
    }

    public function register()
    {
        $this->merge();


    }

    public function boot()
    {
//        require $this->basePath.'routes/graphql.php';
        $this->publish();
        //$this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->mapApiRoutes();

        $this->mapWebRoutes();

//        $this->loadRoutesFrom(
           require_once $this->basePath.'routes/graphql.php';
//        );

        $this->loadMigrationsFrom($this->basePath.'database/migrations');

        $this->loadTranslationsFrom($this->basePath.'resources/lang', $this->name);
    }

    protected function command()
    {

    }
}