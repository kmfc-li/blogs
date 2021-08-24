<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入Storage
use Storage;


class UploaderController extends Controller
{
    //上传文件的处理
    public function webuploader(Request $request){
        //判断文件是否上传成功
        if($request -> hasFile('file') && $request -> file('file') -> isValid()){
            //文件上传

            $filename = sha1(time() . $request -> file('file') -> getClientOriginalName()) . '.' . $request -> file('file') -> getClientOriginalExtension();
            //die($filename);

            //文件的保存
            //Storage::disk(磁盘名)->put(文件名，文件内容);
            Storage::disk('public') -> put($filename,file_get_contents($request -> file('file') ->path()));


            //返回数据
            $result = [
                'errCode'   =>     '0',
                'errMsg'    =>     '',
                'succMsg'   =>     '文件上传成功！',
                'path'      =>     '/storage/' . $filename,
                

            ];
        }
        else{
            //没有文件上传或者出错
            $result = [
                'errCode'    =>   '000001',
                'errMsg'     =>   $request -> file('file') -> getErrorMessage()
            ];

        }
        //返回信息
        return   response() -> json($result);
    }
}
