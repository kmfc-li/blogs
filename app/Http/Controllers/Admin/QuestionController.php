<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Question;
use Input;
//引入excel
use Excel;

class QuestionController extends Controller
{
    //列表方法
    public function index(){
        //查询数据
        $data=Question::get();
        //展示视图
        return view('admin.question.index',compact('data'));
    }

    
    //Excel文件导出功能 By Laravel学院：https://laravelacademy.org/post/2024.html 安装命令composer require "maatwebsite/excel:~2.1.0"
    //https://blog.csdn.net/sinat_37390744/article/details/104208306
    //导出方法
    public function export(){
        $cellData = [
            ['序号','题目','所属试卷','分值','选项','正确答案','添加时间'],//表头
            
        ];
        //查询数据
        $data =Question::all();
        //循环写入行
        foreach($data as $key =>$value){
            $cellData[]=[
                $value -> id, //序号
                $value -> question,//题目
                $value -> paper -> paper_name,//所属试卷
                $value -> score,//分值
                $value -> options,//选项
                $value -> answer,//答案
                $value -> created_at,//时间
            ];
        }
        //dd($cellData);
        //使用excel类（参数1是文件名，参数2是
        //use ($cellData)引入数据，才能在里面用
        Excel::create(sha1(time().rand(1000,9999)),function($excel) use ($cellData){
            //在此处就可以使用cellData
            $excel->sheet('题库', function($sheet) use ($cellData){
                //写入行数据
                $sheet->rows($cellData);
            });
        })->export('xlsx');//导出
    }

    //导入方法
    public function import(){
        //判断请求的类型
        if(Input::method()=='POST'){
            //数据导入操作
            $filePath ='.' . Input::get('excelpath');//文件路径
            Excel::load($filePath, function($reader) {
                //$data = $reader->all();//读取整个表 //toArray对象转数组
                $data = $reader->getSheet(0) -> toArray();
                //echo '<pre>';
                //var_dump($data);die;

                //读取全部数据
                $temp = [];
                foreach($data as $key =>$value)
                {
                    //排除表头
                    if($key=='0')
                    {
                        continue;
                    }
                    //此时value是数组
                    $temp[]=[
                        'question'   =>  $value[0],//题目
                        'paper_id'   =>  Input::get('paper_id'),//试卷id
                        'score'      =>  $value[3],//分值
                        'options'    =>  $value[1],//选项
                        'answer'     =>  $value[2],//答案
                        'created_at' =>  date('Y-m-d H:i:s'),//当前时间
                    ];

                }
                //写入数据
                $result=Question::insert($temp);
                echo $result ? '1' : '0';//不能用return，因为没放在最后，ajxge返回不了1和0

            
            });
            
        }
        else{
            //查询试卷的列表
           $list=\App\Admin\Paper::get();
           //展示视图
           return view('admin.question.import',compact('list'));
        }
    }
    
}
