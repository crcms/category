<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->nestedSet();
            $table->unsignedBigInteger('id',true);
//            $table->unsignedBigInteger('parent_id')->default(0)->comment('父级ID');
            $table->string('name',50)->default('')->comment('分类名称');
            $table->string('sign',50)->default('')->comment('分类标识');
            $table->unsignedInteger('status')->default(0)->commet('状态，1开启，2隐藏，3关闭');
            $table->unsignedBigInteger('sort')->default(0)->comment('排序值');
            $table->string('icon',255)->default('')->comment('图标路径');
            $table->unsignedBigInteger('created_at')->default(0)->comment('创建时间');
            $table->unsignedBigInteger('updated_at')->default(0)->comment('修改时间');
            $table->unsignedBigInteger('deleted_at')->default(null)->nullable()->comment('删除时间');
//            $table->index('parent_id');
            $table->unique('sign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
