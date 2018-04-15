<?php

namespace CrCms\Category\Listeners\Repositories;

use CrCms\Category\Models\CategoryModel;
use CrCms\Category\Repositories\CategoryRepository;
use CrCms\Module\Models\ModuleModel;
use CrCms\Module\Repositories\ModuleRepository;
use Illuminate\Support\Collection;

class CategoryListener
{
    /**
     * @param ModuleRepository $repository
     * @param ModuleModel $model
     */
    public function created(CategoryRepository $repository, CategoryModel $model)
    {
        $repository->relationModule($model, $repository->getOriginal()['modules']);
    }

    /**
     * @param CategoryRepository $repository
     * @param CategoryModel $model
     */
    public function updated(CategoryRepository $repository, CategoryModel $model)
    {
        $repository->relationModule($model, $repository->getOriginal()['modules']);
    }

    /**
     * @param CategoryRepository $repository
     * @param Collection $models
     */
    public function deleted(CategoryRepository $repository, Collection $models)
    {
        $models->map(function (CategoryModel $model) use ($repository) {
            //如果未开启软删除
            if (!method_exists($model, 'getDeletedAtColumn')) {
                $repository->removeRelationModule($model);
            }
        });
    }
}