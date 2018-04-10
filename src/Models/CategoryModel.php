<?php

namespace CrCms\Category\Models;

use CrCms\Foundation\App\Models\Model;
use CrCms\Module\Models\ModuleModel;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryModel extends Model
{
    use SoftDeletes;

    protected $dateFormat = 'U';

    protected $table = 'categories';


    /**
     * 需要转换成日期的属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $guarded = [];


    public function hasOneCategory(): HasOne
    {
        return $this->hasOne(static::class,'parent_id','id');
    }

    public function morphToManyModule(): MorphToMany
    {//,'relation_id','id','id'
        return $this->morphToMany(ModuleModel::class,'relation','module_relation','relation_id','module_id');
    }

}