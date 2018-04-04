<?php

namespace CrCms\Category\Http\Requests\Category;

use Illuminate\Validation\Rule;

/**
 * Trait RequestTrait
 * @package CrCms\Category\Http\Requests\Category
 */
trait RequestTrait
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'parent_id' => ['required', 'integer'],
            'name' => ['required', 'max:50'],
            'sign' => ['required', 'max:50', Rule::unique('categories')],
            'sort' => ['required', 'integer'],
            'status' => ['required', 'integer'],
            'icon' => ['max:255'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => trans('category::lang.category.name'),
            'sign' => trans('category::lang.category.sign'),
        ];
    }
}