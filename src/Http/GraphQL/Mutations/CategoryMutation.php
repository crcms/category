<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-04-01 12:04
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Category\Http\GraphQL\Mutations;

use CrCms\Category\Http\GraphQL\Types\CategoryType;
use CrCms\Category\Repositories\CategoryRepository;
use CrCms\Foundation\App\Http\GraqhQL\AbstractMutation;
use Folklore\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Illuminate\Validation\Rule;

/**
 * Class CategoryMutation
 * @package CrCms\Category\Http\GraphQL\Mutations
 */
class CategoryMutation extends AbstractMutation
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * CategoryMutation constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        parent::__construct();
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return CategoryType
     */
    public function type(): ObjectType
    {
        return GraphQL::type(
            $this->getNameByClass(CategoryType::class)
        );
    }

    /**
     * @return string
     */
    protected function setCurrentName(): string
    {
        return 'category';
    }

    /**
     * @return array
     */
    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'rules' => ['integer']
            ],
            'parent_id' => [
                'type' => Type::int(),
                'rules' => ['required', 'integer']
            ],
            'name' => [
                'type' => Type::string(),
                'rules' => ['required', 'max:50']
            ],
            'sign' => [
                'type' => Type::string(),
                'rules' => function (array $root, array $args) {
                    return ['required', 'max:50', Rule::unique('categories')->ignore($args['id'] ?? 0)];
                }
            ],
            'sort' => [
                'type' => Type::int(),
                'rules' => ['required', 'integer']
            ],
            'status' => [
                'type' => Type::int(),
                'rules' => ['required', 'integer']
            ],
            'icon' => [
                'type' => Type::int(),
                'rules' => ['max:255']
            ],
        ];
    }

    /**
     * @param array $root
     * @param array $args
     * @return bool|mixed
     */
    public function resolve(array $root, array $args)
    {
        return empty($args['id']) ?
            $this->categoryRepository->create($args) :
            $this->categoryRepository->update($args, $args['id']);
    }
}