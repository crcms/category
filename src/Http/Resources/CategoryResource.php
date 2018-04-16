<?php

namespace CrCms\Category\Http\Resources;

use CrCms\Category\Attributes\CategoryAttribute;
use CrCms\Category\Models\CategoryModel;
use CrCms\Foundation\App\Http\Resources\Resource;
use CrCms\Module\Http\Resources\ModuleResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryResource extends Resource
{
    /**
     * @var array
     */
    protected $defaultIncludes = ['module'];

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'sign' => $this->sign,
            'status' => $this->status,
            'status_convert' => CategoryAttribute::getStaticTransform(CategoryAttribute::KEY_STATUS . '.' . strval($this->status)),
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
            'children' => empty($this->children) ? [] : self::collection($this->children),
        ];
    }

    /**
     * @param CategoryModel $categoryModel
     * @return ResourceCollection
     */
    protected function includeModule(CategoryModel $categoryModel): ResourceCollection
    {
        return ModuleResource::collection($categoryModel->morphToManyModule()->get());
    }
}