<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profession',function($table){
            $table -> increments('id');//主键
            $table -> string('pro_name',20) -> notNull();//专业名称
            $table -> tinyInteger('protype_id') -> notNull();//专业分类表的主键
            $table -> string('teachers_ids') -> notNull();//任课老师的id集合 
            $table -> string('description');//专业描述   
            $table -> string('cover_img');//在列表页面展示的图片地址
            $table -> integer('view_count') -> notNull() -> default('500');//点击量  
            $table -> timestamps();
            $table -> tinyinteger('sort') -> notNull() -> default('0');//排序编号
            $table -> tinyinteger('duration');//课时，单位：小时
            $table -> decimal('price',7,2);//价格，精确到两位小数
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profession');
    }
}
