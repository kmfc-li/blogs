<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入模型
use App\Admin\Profession;

class ProfessionController extends Controller
{
    //专业列表
    public function index(){
        //获取数据
        $data = Profession::orderBy('sort','desc') -> get();
        //展示视图
        return view('admin.profession.index',compact('data'));
    }
}
