<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/11/7
 * Time: 10:17
 */

namespace CrCms\Category\Repositories;


use App\Models\Category;
use CrCms\Form\Contracts\Data;
use CrCms\Form\HasData;
use CrCms\Repository\AbstractRepository;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository extends AbstractRepository implements Data
{
    use HasData;

    protected $guards = [];

    public function newModel()
    {
        return app(Category::class);
    }

}