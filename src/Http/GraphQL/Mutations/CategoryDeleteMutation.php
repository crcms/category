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
use GraphQL\Type\Definition\IntType;
use GraphQL\Type\Definition\Type;
use Illuminate\Validation\Rule;

/**
 * Class CategoryDeleteMutation
 * @package CrCms\Category\Http\GraphQL\Mutations
 */
class CategoryDeleteMutation extends AbstractMutation
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
    public function type(): IntType
    {
        return Type::int();
    }

    /**
     * @return string
     */
    protected function setCurrentName(): string
    {
        return 'categoryDelete';
    }

    /**
     * @return array
     */
    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'rules' => function (array $root, array $args) {
                    return ['required', 'integer', Rule::exists('categories')->where('id', $args['id'])];
                }
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
        return $this->categoryRepository->relateDelete($args['id']);
    }
}