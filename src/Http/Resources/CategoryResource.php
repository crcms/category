<?php

namespace CrCms\Category\Http\Resources;

use CrCms\Category\Attributes\CategoryAttribute;
use CrCms\Category\Models\CategoryModel;
use CrCms\Foundation\App\Http\Resources\Resource;

class CategoryResource extends Resource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'sign' => $this->sign,
            'status' => CategoryAttribute::getAttributes(CategoryAttribute::KEY_STATUS)[$this->status],
            'parent_id' => $this->parent_id !== 0 ? $this->hasOneCategory->getModel() : $this->parent_id,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }

}