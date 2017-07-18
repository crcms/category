<?php

namespace CrCms\Category\Forms;

use App\Forms\AbstractForm;
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
}