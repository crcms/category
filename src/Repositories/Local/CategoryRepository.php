<?php

namespace CrCms\Category\Repositories\Local;

use CrCms\Category\Attributes\CategoryAttribute;
use CrCms\Category\Models\CategoryModel;
use CrCms\Category\Repositories\Contracts\CategoryRepositoryContract;
use CrCms\Foundation\App\Repositories\AbstractRepository;
use Illuminate\Support\Collection;
use UnexpectedValueException;

class CategoryRepository extends AbstractRepository implements CategoryRepositoryContract
{
    /**
     * @var array
     */
    protected $guard = ['id', 'name', 'sign', 'sort', 'icon', 'status', 'parent_id'];

    /**
     * @return CategoryModel
     */
    public function newModel(): CategoryModel
    {
        return app(CategoryModel::class);
    }

    /**
     * @return Collection
     */
    public function treeByStatusEnable(): Collection
    {
        return $this->newModel()->where('status', CategoryAttribute::STATUS_ENABLE)->orderBy($this->getModel()->getCreatedAtColumn(), 'desc')->toTree();
    }

    /**
     * @return Collection
     */
    public function tree(): Collection
    {
        return $this->newModel()->orderBy($this->getModel()->getCreatedAtColumn(), 'desc')->get();
    }

    /**
     * @param int|string $id
     * @return bool|int
     */
    public function delete($id)
    {
        $id = (array)$id;

        $this->setOriginal($id);

        $this->setData($id);

        if ($this->fireEvent('deleting', $id) === false) return false;

        $models = collect($this->getData())->map(function ($id) {
            return $this->getModel()->newScopedQuery()->descendantsAndSelf($id);
        })->flatten(1)->unique('id');

        $count = $models->count();

        if ($count <= 0) {
            throw new UnexpectedValueException('Data deletion failed, Keys is:' . implode(',', $this->data));
        }

        $models->map->delete();

        $this->fireEvent('deleted', $models);

        return $count;
    }

    /**
     * @param CategoryModel $categoryModel
     * @param array $moduleIds
     * @return array
     */
    public function relationModule(CategoryModel $categoryModel, array $moduleIds): array
    {
        return $categoryModel->morphToManyModule()->sync($moduleIds);
    }

    /**
     * @param CategoryModel $categoryModel
     * @return int
     */
    public function removeRelationModule(CategoryModel $categoryModel): int
    {
        return $categoryModel->morphToManyModule()->detach();
    }

    /**
     * @param int $id
     * @return int
     */
//    public function relateDelete(int $id): int
//    {
//        $model = $this->byIntId($id);
//
//        $row = $this->delete($model->id);
//
//        $children = $this->where('parent_id', $model->id)->get();
//        if (!$children->isEmpty()) {
//            $children->each(function (CategoryModel $categoryModel) {
//                $this->relateDelete($categoryModel->id);
//            });
//        }
//
//        return $row;
//    }
}