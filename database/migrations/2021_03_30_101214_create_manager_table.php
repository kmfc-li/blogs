<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //建表
        Schema::create('manager', function (Blueprint $table) {
            //设置字段
               $table -> increments('id');
               $table -> string('username',20) -> notNull();
               $table -> string('password') -> notNull();
               $table -> enum('gender',[1,2,3]) -> notNull() -> default('1');//性别 1男 2女 3保密
               $table -> string('mobile',11);//手机号
               $table -> string('email',50);
               $table -> tinyInteger('role_id');//角色表中的主键
               $table -> timestamps();//created_at和updated_at时间字段(系统自己创建)
               $table -> rememberToken();//实现记住登录状态字段,用于存储token
               $table -> enum('status',[1,2]) -> notNull() -> default('2');//账号状态,1=禁用,2=启用
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manager');
    }
}
