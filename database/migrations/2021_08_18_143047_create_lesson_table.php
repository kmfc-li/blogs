<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson',function($table){
            $table -> increments('id');//自增主键 
            $table -> string('lesson_name',50) -> notNull();//点播记录名 
            $table -> integer('course_id') -> notNull();//所属课程id 
            $table -> integer('video_time');//视频的长度，单位秒 
            $table -> string('video_addr');//点播视频的地址
            $table -> integer('sort') -> notNull() -> default(0);//排序编号    
            $table -> string('description');//描述
            $table -> timestamps();//创建时间
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
        Schema::dropIfExists('lesson');
    }
}
