<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course',function($table){
            $table -> increments('id');//自增主键  
            $table -> string('course_name',30) -> notNull();//课程名称
            $table -> integer('profession_id') -> notNull();//关联专业id 
            $table -> string('cover_img');//封面图片
            $table -> integer('sort') -> notNull() -> default(0);//排序
            $table -> string('description');//描述 
            $table -> timestamps();//数据
            $table -> enum('status',[1,2]) -> notNull() -> default('2');//状态
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course');
    }
}
