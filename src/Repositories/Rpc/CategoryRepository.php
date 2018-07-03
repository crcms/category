<?php

namespace CrCms\Category\Repositories\Rpc;

use CrCms\Category\Attributes\CategoryAttribute;
use CrCms\Category\Models\CategoryModel;
use CrCms\Category\Repositories\Contracts\CategoryRepositoryContract;
use CrCms\Foundation\App\Repositories\AbstractRepository;
use CrCms\Foundation\Rpc\Contracts\RpcContract;
use Illuminate\Support\Collection;
use UnexpectedValueException;
use CrCms\Foundation\App\Rpc\RpcTrait;
use CrCms\Category\Repositories\Local\CategoryRepository as LocalCategoryRepository;

class CategoryRepository extends LocalCategoryRepository implements CategoryRepositoryContract
{
    use RpcTrait;
    
    /**
     * @param CategoryModel $categoryModel
     * @param array $moduleIds
     * @return array [attached]=>[1,2,3] [detached]=>[1,2,3] [updated]=>[1,2,3]
     */
    public function relationModule(CategoryModel $categoryModel, array $moduleIds): array
    {
        //return $categoryModel->morphToManyModule()->sync($moduleIds);
        /*$x = $this->rpc()->call(
            'remove-module-relation',['relation_id'=>$categoryModel->id,'module_id'=>$moduleIds,'relation_model'=>get_class($categoryModel)]);

        logger($x);
        return [];*/
    }

    /**
     * @param CategoryModel $categoryModel
     * @return int
     */
    public function removeRelationModule(CategoryModel $categoryModel): int
    {
        return $categoryModel->morphToManyModule()->detach();
    }
}