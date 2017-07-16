<?php

namespace CrCms\Category\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Facades\{
    Dingo\Api\Routing\Router as ApiRouter
};

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected $namespaceName = 'category';

    /**
     * @var string
     */
    protected $namespace = 'CrCms\Category\Http\Controllers';

    /**
     * @var string
     */
    protected $packagePath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;

    /**
     * @return void
     */
    public function boot()
    {
        //route load
        if (!$this->app->routesAreCached()) {
            $this->mapWebRoutes();
            $this->mapApiRoutes();
        }
    }

    /**
     * @return void
     */
    protected function mapWebRoutes()
    {
//        Route::middleware('web')
//            ->namespace($this->namespace)
//            ->group($this->loadRoutesFrom($this->packagePath . 'routes/web.php'));
    }

    /**
     * @return void
     */
    protected function mapApiRoutes()
    {
//        ApiRouter::version('v1', function ($apiRouter) {
//            ApiRouter::group(['namespace' => $this->namespace], function ($apiRouter) {
                $this->loadRoutesFrom($this->packagePath . 'routes/api.php');
//            });
//        });
    }
}