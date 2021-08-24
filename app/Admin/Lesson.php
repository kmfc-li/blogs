<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //定义关联数据表
    protected $table='lesson';
    //关联模型，点播关联课程，一对一
   public function course(){
    return $this -> hasOne('App\Admin\Course','id','course_id');
 }
}
