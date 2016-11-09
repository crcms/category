<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/11/7
 * Time: 10:15
 */

namespace CrCms\Category\Models;


use CrCms\Kernel\Models\MysqlModel;
use CrCms\Kernel\Models\Traits\SoftDeletes;

class Category extends MysqlModel
{

    use SoftDeletes;

    protected $table = 'categories';

}