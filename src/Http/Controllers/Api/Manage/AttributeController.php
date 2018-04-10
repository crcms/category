<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-04-10 21:29
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Category\Http\Controllers\Api\Manage;

use CrCms\Category\Attributes\CategoryAttribute;
use CrCms\Foundation\App\Http\Controllers\Controller;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

/**
 * Class AttributeController
 * @package CrCms\Category\Http\Controllers\Api\Manage
 */
class AttributeController extends Controller
{
    /**
     * @param null|string $type
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function postAttribute(?string $type = '')
    {
        return $this->response->array(['data' => $this->allow($type)]);
    }

    /**
     * @param null|string $type
     * @return array
     */
    protected function allow(?string $type): array
    {
        $allows = [
            CategoryAttribute::KEY_STATUS => CategoryAttribute::getStaticTransform(CategoryAttribute::KEY_STATUS)
        ];

        if (!empty($type) && !isset($allows[$type])) {
            throw new NotFoundResourceException(trans('category::app.not_found'));
        }

        return empty($type) ? $allows : [$type => $allows[$type] ?? []];
    }
}