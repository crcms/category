<?php

namespace CrCms\Category\Http\Controllers\Api\Manage;

use App\Http\Controllers\Api\Controller;
use App\Http\Controllers\Api\Traits\ResourceTrait;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Transformers\CategoryTransformer;
use CrCms\Category\Constants\CategoryConstant;
use CrCms\Category\Forms\CategoryForm;
use CrCms\Form\Form;

/**
 * Class CategoryController
 * @package App\Http\Controllers\Api
 */
class CategoryController extends Controller
{

    use ResourceTrait {
        classNamePlural as parentClassNamePlural;
    }

    public function __construct(CategoryForm $form,CategoryRepository $repository,CategoryTransformer $transformer)
    {
        //echo route('api.categories.create');
        parent::__construct();
        $this->repository = $repository;
        $this->transformer = $transformer;
        $this->form = $form;
    }

    public function index()
    {
        $models = $this->repository->all();

        return $this->response->collection($models,$this->transformer);
    }

    public function create(CategoryForm $categoryForm)
    {
        return $categoryForm->render();
    }

    protected function form(Category $category = null) : Form
    {
        return Form::create(function($form) use ($category){
            $form->input('name')->value($category->name ?? null)->rule(['required','max:50'])->label('name');
            $form->input('mark')->value($category->mark ?? null)->rule(['required','max:30'])->label('mark');
            $form->select('parent_id')->optionTip('Root Parent')->value($category->parent_id ?? 0)->options(function(){
                return $this->repository->all()->mapWithKeys(function($model){
                   return [$model->id=>$model->name];
                })->toArray();
            })->rule(['integer'])->default(0)->label('parent id');
            $form->radio('status')->value($category->status ?? 1)->default(1)->options(
                CategoryConstant::constants()            )->label('status');
            $form->textarea('remark')->value($category->remark ?? null)->rule(['max:255'])->label('remark');
            $form->hidden('id')->value($category->id ?? null)->rule(['regex:/^[1-9][\d]*$/']);
        });
    }

    protected function classNamePlural()
    {
        return 'manage.'.$this->parentClassNamePlural();
    }
}