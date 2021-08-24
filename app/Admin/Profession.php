<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
     //定义相关的表名
    protected $table = 'profession';

    //定义与protype的关联模型（1对1)
    public function protype(){
        return $this -> hasOne('\App\Admin\Protype','id','protype_id');
    }

}
