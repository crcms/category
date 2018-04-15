<?php

namespace CrCms\Category\Providers;

use CrCms\Category\Listeners\Repositories\CategoryListener;
use CrCms\Category\Repositories\CategoryRepository;
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
     *
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
        CategoryRepository::observer(CategoryListener::class);
    }
}