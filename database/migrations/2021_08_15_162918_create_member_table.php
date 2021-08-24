<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //建表
        Schema::create('member',function($table){
            $table -> increments('id'); //id主键
            $table -> string('username',20) -> notNull();//账号
            $table -> string('password') -> notNull();//密码
            $table -> enum('gender',[1,2,3]) -> nutNull() -> default('1');//性别
            $table -> string('mobile',11);//手机号
            $table -> string('email',40);//电子邮件
            $table -> string('avatar');//头像地址
            $table -> timestamps();//记录创建时间
            $table -> rememberToken();//记住登录功能需要存储的标记
            $table -> enum('type',[1,2]) -> notNull() -> default('1');//帐号类型，1=学生，2=老师
            $table -> enum('status',[1,2]) -> notNull() -> default('2');//帐号状态：1=禁用，2=启用
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //删表
        Schema::dropIfExists('member');
    }
}
