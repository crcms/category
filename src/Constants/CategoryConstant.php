<?php

namespace CrCms\Category\Constants;

use CrCms\Constant\AbstractConstant;

/**
 * Class CategoryConstant
 *
 * @package CrCms\Category\Constants
 */
class CategoryConstant extends AbstractConstant
{
    /**
     * unknown
     */
    const STATUS_UNKNOWN = 0;

    /**
     *
     */
    const STATUS_OPEN = 1;

    /**
     *
     */
    const STATUS_HIDDEN = 2;

    /**
     *
     */
    const STATUS_CLOSE = 3;

    /**
     * @return array
     */
    public static function constants(): array
    {
        return [
            static::STATUS_UNKNOWN => '未知',
            static::STATUS_OPEN => '开启',
            static::STATUS_HIDDEN => '隐藏',
            static::STATUS_CLOSE => '关闭',
        ];
    }
}