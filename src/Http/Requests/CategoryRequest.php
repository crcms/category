<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/11/8
 * Time: 10:28
 */

namespace CrCms\Category\Http\Requests;


use CrCms\Kernel\Http\Requests\KernelRequest;

class CategoryRequest extends KernelRequest
{

    public function rules()
    {
        return [
            'parent_id'=>['required','integer'],
            'name'=>['required','max:50'],
            'mark'=>['required','max:30','unique:categories,mark,'.intval($this->input('id'))],
            'status'=>['required','integer'],
            'remark'=>['max:255'],
        ];
    }

}