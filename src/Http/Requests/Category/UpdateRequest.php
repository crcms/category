<?php

namespace CrCms\Category\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    use RequestTrait {
        rules as _rules;
    }

    public function rules() : array
    {
        $rules = $this->_rules();
        $rules['sign'] = ['required', 'max:50', Rule::unique('categories')->ignore($this->route()->parameter('category'))];
        return $rules;
    }


}