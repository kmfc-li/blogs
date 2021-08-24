<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Lesson;
use Input;

class LessonController extends Controller
{
    //列表
    public function index(){
        //获取数据
        $data = Lesson::orderBy('sort','desc') -> get();
        //展示视图
        return view('admin.lesson.index',compact('data'));
    }
    //播放
    public function play(){
        //获取播放视频的id
        $id=Input::get('id');
        //根据视频的id查出视频地址
        $addr=Lesson::where('id',$id) -> value('video_addr');
        //播放视频
        return "<video src='/blogs/public/$addr' width='100%' controls='controls'>12132</video>";
    }
}
