<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-04-10 21:29
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Category\Http\Controllers\Api\Manage;

use CrCms\Category\Http\Resources\AttributeResource;
use CrCms\Foundation\App\Http\Controllers\Controller;

/**
 * Class AttributeController
 * @package CrCms\Category\Http\Controllers\Api\Manage
 */
class AttributeController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        return $this->response->resource([], AttributeResource::class);
    }

    /**
     * @param string $type
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(string $type)
    {
        return $this->response->resource([$type], AttributeResource::class);
    }
}