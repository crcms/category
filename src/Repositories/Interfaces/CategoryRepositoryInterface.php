<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/11/7
 * Time: 10:16
 */

namespace CrCms\Category\Repositories\Interfaces;


use CrCms\Kernel\Repositories\Interfaces\RepositoryInterface;

interface CategoryRepositoryInterface extends RepositoryInterface
{

    /**
     * @return array
     */
    public function status() : array ;


    /**
     * @return int
     */
    public function statusOpen() : int;


    /**
     * @return int
     */
    public function statusClose() : int;

}