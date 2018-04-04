<?php

namespace CrCms\Category\Http\GraphQL\Types;

use CrCms\Category\Attributes\ModuleAttribute;
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
        return collect(ModuleAttribute::getStaticTransform(ModuleAttribute::KEY_STATUS))->mapWithKeys(function ($value, $key) {
            return [$value => ['value' => $key]];
        })->toArray();
    }
}