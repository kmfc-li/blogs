<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paper',function($table){
            $table -> increments('id');//自增主键 
            $table -> string('paper_name',50) -> notNull();//试卷名  
            $table -> tinyInteger('course_id') -> notNull();//关联课程id，所属的课程
            $table -> tinyInteger('score') -> notNull() -> default(100);//试卷总分 
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
        Schema::dropIfExists('paper');
    }
}
