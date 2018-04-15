<?php

namespace CrCms\Category\Http\Controllers\Api\Manage;

use function Couchbase\defaultDecoder;
use CrCms\Category\Http\Requests\Category\StoreRequest;
use CrCms\Category\Http\Requests\Category\UpdateRequest;
use CrCms\Category\Http\Resources\CategoryResource;
use CrCms\Category\Repositories\CategoryRepository;
use CrCms\Foundation\App\Http\Controllers\Controller;
use CrCms\Module\Models\ModuleModel;
use CrCms\Module\Repositories\ModuleRepository;

/**
 * Class CategoryController
 * @package CrCms\Category\Http\Controllers\Api\Manage
 */
class CategoryController extends Controller
{
    /**
     * CategoryController constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        parent::__construct();
        $this->repository = $categoryRepository;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $models = $this->repository->tree();
        return $this->response->collection($models, CategoryResource::class);
    }

    /**
     * @param StoreRequest $storeRequest
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(StoreRequest $storeRequest)
    {
        $model = $this->repository->create($storeRequest->all());
//
//        $this->repository->relationModule($model, $storeRequest->input('modules'));

        return $this->response->resource($model, CategoryResource::class, ['children']);
    }

    /**
     * @param UpdateRequest $updateRequest
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(UpdateRequest $updateRequest, int $id)
    {
        $model = $this->repository->update($updateRequest->all(), $id);
//
//        $this->repository->relationModule($model, $updateRequest->input('modules'));

        return $this->response->resource($model, CategoryResource::class, ['children']);
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy($id)
    {
        $rows = $this->repository->delete($id);

        return $this->response->noContent();
    }
}