<?php

namespace CrCms\Category\Http\Controllers\Api\Manage;

use CrCms\Category\Attributes\ModuleAttribute;
use CrCms\Category\Http\Requests\Category\StoreRequest;
use CrCms\Category\Http\Requests\Category\UpdateRequest;
use CrCms\Category\Repositories\CategoryRepository;
use CrCms\Foundation\App\Http\Controllers\Controller;
use CrCms\Foundation\App\Http\Resources\Resource;
use Illuminate\Support\Facades\DB;

/**
 * Class CategoryController
 * @package CrCms\Category\Http\Controllers\Api\Manage
 */
class CategoryController extends Controller
{

    public function __construct(CategoryRepository $categoryRepository)
    {
        parent::__construct();
        $this->repository = $categoryRepository;
    }


    public function index()
    {
        return DB::table('categories')->get();
    }

    public function store(StoreRequest $storeRequest)
    {
        $model = $this->repository->create($storeRequest->all());

        return $this->response->resource($model,Resource::class);
    }

    public function update(UpdateRequest $updateRequest, int $id)
    {
        $model = $this->repository->update($updateRequest->all(),$id);
        $this->repository->delete($id);
        return $this->response->resource($model,Resource::class);
    }
}