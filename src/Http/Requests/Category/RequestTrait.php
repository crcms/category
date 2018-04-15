<?php

namespace CrCms\Category\Http\Requests\Category;

use Illuminate\Validation\Rule;

/**
 * Trait RequestTrait
 * @package CrCms\Category\Http\Requests\Category
 */
trait RequestTrait
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'parent_id' => ['required', 'integer'],
            'name' => ['required', 'max:50'],
            'sign' => ['required', 'max:50', Rule::unique('categories')],
            'sort' => ['required', 'integer'],
            'status' => ['required', 'integer'],
            'icon' => ['max:255'],
            'modules' => ['required', 'array', Rule::exists('modules', 'id')]
        ];
    }

    /**
     * @return array
     */
    public function attributes(): array
    {
        return [
            'parent_id' => trans('category::lang.category.parent_id'),
            'name' => trans('category::lang.category.name'),
            'sign' => trans('category::lang.category.sign'),
            'sort' => trans('category::lang.category.sort'),
            'status' => trans('category::lang.category.status'),
            'icon' => trans('category::lang.category.icon'),
            'modules' => trans('category::lang.category.modules'),
        ];
    }
}