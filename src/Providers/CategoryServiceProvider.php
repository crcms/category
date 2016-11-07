<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/11/7
 * Time: 9:28
 */

namespace CrCms\Category\Providers;


use CrCms\Kernel\Providers\PackageServiceProvider;

class CategoryServiceProvider extends PackageServiceProvider
{

    /**
     *
     * @var string
     * @author simon
     */
    protected $namespaceName = 'category';

    /**
     *
     * @var string
     * @author simon
     */
    protected $packagePath = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;


    /**
     * register
     */
    public function register()
    {
        parent::register();

        //组件加载
        $this->app->register(ComponentServiceProvider::class);
    }

}