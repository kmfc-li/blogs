<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
//引入trait
use Illuminate\Auth\Authenticatable;

class Manager extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    //定义当前模型需要关联的数据表
    protected $table = 'manager';
    //使用trait,相当于将整个trait代码复制到这个位置
    use Authenticatable;

    //定义与角色关联的操作(一对一)
    public function role(){
        return $this ->hasOne('App\Admin\Role','id','role_id');
    }
}
