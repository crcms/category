<?php

namespace CrCms\Category\Repositories;

use CrCms\Category\Models\ModuleModel;
use CrCms\Foundation\App\Repositories\AbstractRepository;

class CategoryRepository extends AbstractRepository
{
    protected $guard = ['id', 'name', 'sign', 'sort', 'icon', 'status', 'parent_id'];

    public function newModel(): ModuleModel
    {
        return app(ModuleModel::class);
    }

    /**
     * @param int $id
     * @return int
     */
    public function relateDelete(int $id): int
    {
        $model = $this->byIntId($id);

        $row = $this->delete($model->id);

        $children = $this->where('parent_id', $model->id)->get();
        if (!$children->isEmpty()) {
            $children->each(function (ModuleModel $categoryModel) {
                $this->relateDelete($categoryModel->id);
            });
        }

        return $row;
    }
}