<?php

namespace CrCms\Category\Models;

use CrCms\Foundation\App\Models\Model;
use CrCms\Module\Models\ModuleModel;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;

class CategoryModel extends Model
{
    use SoftDeletes, NodeTrait;

    /**
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * @var string
     */
    protected $table = 'categories';

    /**
     * 需要转换成日期的属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return HasOne
     */
    public function hasOneCategory(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'parent_id');
    }

    /**
     * @return MorphToMany
     */
    public function morphToManyModule(): MorphToMany
    {
        return $this->morphToMany(ModuleModel::class, 'relation', 'module_relation', 'relation_id', 'module_id');
    }
}