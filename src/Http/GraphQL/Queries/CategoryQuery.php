<?php

namespace CrCms\Category\Http\GraphQL\Queries;

use CrCms\Category\Http\GraphQL\Types\CategoryType;
use CrCms\Category\Repositories\CategoryRepository;
use CrCms\Foundation\App\Http\GraqhQL\AbstractQuery;
use Folklore\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ListOfType;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

/**
 * Class CategoryQuery
 * @package CrCms\Category\Http\GraphQL\Queries
 */
class CategoryQuery extends AbstractQuery
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * CategoryQuery constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        parent::__construct();
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return string
     */
    protected function setCurrentName(): string
    {
        return 'categories';
    }

    /**
     * @return ListOfType
     */
    public function type(): ListOfType
    {
        return Type::listOf(GraphQL::type(
            $this->getNameByClass(CategoryType::class)
        ));
    }

    /**
     * @return array
     */
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['integer', 'min:1']
            ],
        ];
    }

    /**
     * @param $value
     * @param $args
     * @param $context
     * @param ResolveInfo $info
     * @return \Illuminate\Support\Collection
     */
    public function resolve($value, $args, $context, ResolveInfo $info)
    {
        if (isset($args['id'])) {
            return collect([$this->categoryRepository->byIntId($args['id'])]);
        }
        return $this->categoryRepository->all();
    }
}