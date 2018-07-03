<?php

namespace CrCms\Category\Listeners\Repositories;

use CrCms\Category\Models\CategoryModel;
use CrCms\Category\Repositories\Contracts\CategoryRepositoryContract;
use CrCms\Module\Models\ModuleModel;
use CrCms\Module\Repositories\ModuleRepository;
use Illuminate\Support\Collection;

/**
 * Class CategoryListener
 * @package CrCms\Category\Listeners\Repositories
 */
class CategoryListener
{
    /**
     * @param CategoryRepositoryContract $repository
     * @param CategoryModel $model
     */
    public function created(CategoryRepositoryContract $repository, CategoryModel $model)
    {
        $repository->relationModule($model, $repository->getOriginal()['modules']);
    }

    /**
     * @param CategoryRepositoryContract $repository
     * @param CategoryModel $model
     */
    public function updated(CategoryRepositoryContract $repository, CategoryModel $model)
    {
        $repository->relationModule($model, $repository->getOriginal()['modules']);
    }

    /**
     * @param CategoryRepositoryContract $repository
     * @param Collection $models
     */
    public function deleted(CategoryRepositoryContract $repository, Collection $models)
    {
        $models->map(function (CategoryModel $model) use ($repository) {
            //如果未开启软删除
            if (!method_exists($model, 'getDeletedAtColumn')) {
                $repository->removeRelationModule($model);
            }
        });
    }
}