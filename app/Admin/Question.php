<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //定义相关的表名
    protected $table = 'question';

    //关联模型， 关联试卷，一对一
    public function paper(){
        return $this -> hasOne('App\Admin\Paper','id','paper_id');
    }

}
