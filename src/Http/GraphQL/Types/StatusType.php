<?php

namespace CrCms\Category\Http\GraphQL\Types;

use CrCms\Category\Attributes\CategoryAttribute;
use CrCms\Foundation\App\Http\GraphQL\AbstractType;

/**
 * Class StatusType
 * @package CrCms\Category\Http\GraphQL\Types
 */
class StatusType extends AbstractType
{
    /**
     * @var bool
     */
    protected $enumObject = true;

    /**
     * StatusType constructor.
     */
    public function __construct()
    {
        $this->attributes['values'] = $this->values();
        parent::__construct();
    }

    /**
     * @return array
     */
    protected function values(): array
    {
        return collect(CategoryAttribute::getStaticTransform(CategoryAttribute::KEY_STATUS))->mapWithKeys(function ($value, $key) {
            return [$value => ['value' => $key]];
        })->toArray();
    }
}