<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStreamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stream',function($table){
            $table -> increments('id');//自增主键
            $table -> string('stream_name',200) -> notNull();//直播流名称
            $table -> enum('status',[1,2,3]) -> notNull() -> default('1');//流状态，1=正常，2=永久禁播，3=限时禁播 
            $table -> integer('permited_at') -> notNull() -> default(0);//开启直播时间戳（当状态为3时适用）
            $table -> integer('sort') -> notNull() -> default(0);//排序编号，大→小排列   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stream');
    }
}
