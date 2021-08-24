<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
   //定义关联数据表
   protected $table='course';

   //关联模型，课程关联专业，一对一
   public function profession(){
      return $this -> hasOne('App\Admin\Profession','id','profession_id');
   }



}
