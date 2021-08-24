<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //试题
        Schema::create('question',function($table){
            $table -> increments('id');//自增主键
            $table -> string('question') -> notNull();//试题具体内容
            $table -> tinyInteger('paper_id') -> notNull();//关联试卷id
            $table -> tinyInteger('score') -> notNull() -> default(2);//该题总分
            $table -> string('options') -> notNull();//选项内容 
            $table -> string('answer',1) -> notNull();//正确答案
            $table -> string('remark');//试题备注说明
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question');
    }
}
