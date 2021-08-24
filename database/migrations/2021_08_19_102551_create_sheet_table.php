<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //答题卡
        Schema::create('sheet',function($table){
            $table -> increments('id');//自增主键
            $table -> tinyInteger('paper_id') -> notNull();//试卷id
            $table -> tinyInteger('question_id') -> notNull();//关联课程id，所属的课程
            $table -> tinyInteger('member_id') -> notNull();//会员id 
            $table -> enum('is_correct',[1,2]) -> notNull() -> default('2');//是否正确，1=对，2=错
            $table -> tinyInteger('score') -> notNull() -> default(0);//该题用户的得分
            $table -> string('answer',1);//学生的答案 
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
        Schema::dropIfExists('sheet');
    }
}
