<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Paper;

class PaperController extends Controller
{
    //列表方法
    public function index(){
        //查询数据
        $data=Paper::get();
        //展示视图
        return view('admin.paper.index',compact('data'));
    }
}
