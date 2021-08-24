<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入模型
use App\Admin\Protype;

class ProtypeController extends Controller
{
    //专业分类
    public function index(){
        //获取数据
        $data = Protype::orderBy('sort','desc') -> get();
        //展示视图
        return view('admin.protype.index',compact('data'));

    }
}
