<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入模型
use App\Admin\Manager;

class ManagerController extends Controller
{
    //管理员的类表操作
    public function index(){
        //查询数据
        $data=Manager::get();
        //展示视图
        return view('admin.manager.index',compact('data'));
    }
}
