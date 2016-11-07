<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/11/7
 * Time: 10:11
 */

namespace CrCms\Category\Providers;


use CrCms\Category\Repositories\CategoryRepository;
use CrCms\Category\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class ComponentServiceProvider extends ServiceProvider
{

    /**
     * @var bool
     */
    public $defer = true;


    /**
     *
     */
    public function register()
    {
        $this->app->bind(CategoryRepositoryInterface::class,CategoryRepository::class);
    }


    /**
     * @return array
     */
    public function provides()
    {
        return [
            CategoryRepositoryInterface::class,
        ];
    }

}