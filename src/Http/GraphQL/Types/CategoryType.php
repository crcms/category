<?php

namespace CrCms\Category\Http\GraphQL\Types;

use CrCms\Category\Models\ModuleModel;
use CrCms\Category\Repositories\CategoryRepository;
use CrCms\Foundation\App\Http\GraphQL\AbstractType;
use Folklore\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;

/**
 * Class CategoryType
 * @package CrCms\Category\Http\GraphQL\Types
 */
class CategoryType extends AbstractType
{
    /**
     * @var array
     */
    protected $fields = ['id', 'name', 'status', 'sign', 'created_at', 'updated_at', 'parent_id','sort','icon'];

    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * CategoryType constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        parent::__construct();
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return array
     */
    protected function parentIdField(): array
    {
        return [
            'type' => GraphQL::type($this->getNameByClass(CategoryType::class))
        ];
    }

    /**
     * @return array
     */
    protected function idField(): array
    {
        return [
            'type' => Type::int(),
        ];
    }

    /**
     * @return array
     */
    protected function nameField(): array
    {
        return [
            'type' => Type::string(),
        ];
    }

    /**
     * @return array
     */
    protected function sortField(): array
    {
        return [
            'type' => Type::int(),
        ];
    }

    /**
     * @return array
     */
    protected function iconField(): array
    {
        return [
            'type' => Type::string(),
        ];
    }

    /**
     * @return array
     */
    protected function statusField(): array
    {
        return [
            'type' => GraphQL::type(
                $this->getNameByClass(StatusType::class)
            )
        ];
    }

    /**
     * @return array
     */
    protected function signField(): array
    {
        return [
            'type' => Type::string(),
        ];
    }

    /**
     * @return array
     */
    protected function createdAtField(): array
    {
        return [
            'type' => Type::string(),
        ];
    }

    /**
     * @return array
     */
    protected function updatedAtField(): array
    {
        return [
            'type' => Type::string(),
        ];
    }

    /**
     * @param ModuleModel $category
     * @param array $args
     * @return string
     */
    protected function resolveCreatedAtField(ModuleModel $category, array $args): string
    {
        return $category->created_at->toDateTimeString();
    }

    /**
     * @param ModuleModel $category
     * @param array $args
     * @return string
     */
    protected function resolveUpdatedAtField(ModuleModel $category, array $args): string
    {
        return $category->updated_at->toDateTimeString();
    }

    /**
     * @param ModuleModel $categoryModel
     * @param array $args
     * @return null|ModuleModel
     */
    protected function resolveParentIdField(ModuleModel $categoryModel, array $args)
    {
        return $categoryModel->parent_id === 0 ?
            null :
            $this->categoryRepository->byIntId($categoryModel->parent_id);
    }
}