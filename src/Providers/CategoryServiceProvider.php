<?php

namespace CrCms\Category\Providers;

use CrCms\Category\Listeners\Repositories\CategoryListener;
use CrCms\Category\Repositories\Local\CategoryRepository;
use CrCms\Category\Repositories\Contracts\CategoryRepositoryContract;
use CrCms\Foundation\App\Providers\ModuleServiceProvider;

/**
 * Class CategoryServiceProvider
 * @package CrCms\category\src\Providers
 */
class CategoryServiceProvider extends ModuleServiceProvider
{
    /**
     * @var string
     */
    protected $basePath = __DIR__ . '/../../';

    /**
     * @var string
     */
    protected $name = 'category';

    /**
     * @return void
     */
    public function boot(): void
    {
        parent::boot();

        $this->publishes([
            $this->basePath . 'config/config.php' => config_path("{$this->name}.php"),
            $this->basePath . 'resources/lang' => resource_path("lang/vendor/{$this->name}"),
        ]);
    }

    /**
     * @return void
     */
    protected function repositoryListener(): void
    {
        $this->app->make(CategoryRepositoryContract::class)::observer(CategoryListener::class);
    }

    /**
     * @return void
     */
    public function register(): void
    {
        parent::register();

        $this->app->bind(CategoryRepositoryContract::class, CategoryRepository::class);
    }
}