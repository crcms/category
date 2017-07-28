<?php

namespace CrCms\Category\Forms;

use App\Forms\AbstractForm;
use CrCms\Category\Constants\CategoryConstant;
use CrCms\Category\Repositories\CategoryRepository;
use CrCms\Form\Form;

/**
 * Class CategoryForm
 *
 * @package CrCms\Category\Forms
 * @author simon
 */
class CategoryForm extends AbstractForm
{
    /**
     * @var CategoryRepository|null
     */
    protected $repository = null;

    /**
     * CategoryForm constructor.
     * @param Form $form
     * @param CategoryRepository $repository
     */
    public function __construct(Form $form,CategoryRepository $repository)
    {
        parent::__construct($form);
        $this->repository = $repository;
    }

    /**
     * @param Form $form
     */
    protected function getElementByName(Form $form)
    {
        $form->input('name')->value($this->model->name ?? null)->rule(['required', 'max:50'])->label('name');
    }

    /**
     * @param Form $form
     */
    protected function getElementByMark(Form $form)
    {
        $form->input('mark')->value($this->model->mark ?? null)->rule(['required', 'max:30'])->label('mark');
    }

    /**
     * @param Form $form
     */
    protected function getElementByParentId(Form $form)
    {
        $form->select('parent_id')->optionTip('Root Parent')->value($this->model->parent_id ?? 0)->options(function(){
            return $this->repository->all()->mapWithKeys(function($model){
            return [$model->id=>$model->name];
        })->toArray();
        })->rule(['integer'])->default(0)->label('parent id');
    }

    /**
     * @param Form $form
     */
    protected function getElementByStatus(Form $form)
    {
        $form->radio('status')->attributes(['v-model'=>'a.status'])->value($this->model->status ?? 1)->default(1)->options(
            CategoryConstant::constants()
        )->label('status');
    }

    /**
     * @param Form $form
     */
    protected function getElementByRemark(Form $form)
    {
        $form->textarea('remark')->value($this->model->remark ?? null)->rule(['max:255'])->label('remark');
    }

    /**
     * @param Form $form
     */
    protected function getElementById(Form $form)
    {
        $form->hidden('id')->value($this->model->id ?? null)->rule(['regex:/^[1-9][\d]*$/']);
    }
}