<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/11/7
 * Time: 10:17
 */

namespace CrCms\Category\Repositories;


use CrCms\Category\Models\Category;
use CrCms\Category\Repositories\Interfaces\CategoryRepositoryInterface;
use CrCms\Kernel\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository extends Repository implements CategoryRepositoryInterface
{

    /**
     *
     */
    const STATUS_OPEN = 1;

    /**
     *
     */
    const STATUS_CLOSE = 2;

    /**
     *
     */
    const STATUS = [self::STATUS_OPEN=>'开启',self::STATUS_CLOSE=>'关闭'];


    /**
     * CategoryRepository constructor.
     * @param Category $Model
     */
    public function __construct(Category $Model)
    {
        parent::__construct($Model);
    }


    /**
     * @return array
     */
    public function status() : array
    {
        return static::STATUS;
    }


    /**
     * @return int
     */
    public function statusOpen() : int
    {
        return static::STATUS_OPEN;
    }


    /**
     * @return int
     */
    public function statusClose() : int
    {
        return static::STATUS_CLOSE;
    }


}