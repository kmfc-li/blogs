<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live',function($table){
            $table -> increments('id');//自增主键   
            $table -> string('live_name',50) -> notNull() -> unique();//需要直播的课程名（唯一）
            $table -> integer('profession_id') -> notNull();//所属的专业id，关联专业表
            $table -> integer('stream_id') -> notNull();//对应的直播流id  
            $table -> string('cover_img') -> notNull();//直播的封面图  
            $table -> integer('sort') -> notNull() -> default(0);//排序编号，大→小排列
            $table -> string('description');//课程简单的描述  
            $table -> integer('begin_at') -> notNull();//直播开始时间  
            $table -> integer('end_at') -> notNull();//直播结束时间 
            $table -> string('video_addr');//录播地址    
            $table -> timestamps();
            $table -> enum('status',[1,2]) -> notNull() -> default('1');//状态，1=正常，2=禁用
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('live');
    }
}
