<?php

namespace CrCms\Category\Listeners;

use CrCms\Category\Repositories\CategoryRepository;

class Category
{

    protected $repository = null;

    public function __construct()
    {
    }

    public function handle(CategoryRepository $categoryRepository,$model)
    {
        //dd(2);
        dd($model);
    }
}