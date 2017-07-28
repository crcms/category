<?php

namespace CrCms\Category\Repositories;

use App\Models\Category;
use CrCms\Form\Contracts\Data;
use CrCms\Form\HasData;
use CrCms\Repository\AbstractRepository;

class CategoryRepository extends AbstractRepository implements Data
{
    use HasData;

    protected $guard = ['name','mark','status','remark','parent_id'];

    protected static $events = [
        'created'=>\CrCms\Category\Listeners\Category::class
    ];

    public function newModel()
    {
        return app(Category::class);
    }
}