<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//后台路由部分(不需要权限判断)
Route::group(['prefix' => 'admin'],function(){
    //后台登录页面
    Route::get('public/login','Admin\PublicController@login')->name('login');
    //后台登录处理页面
    Route::post('public/check','Admin\PublicController@check');
    //退出地址
    Route::get('public/logout','Admin\PublicController@logout');
    //后台首页路由
    //Route::get('index/index','Admin\IndexController@index')->middleware('auth');
    //Route::get('index/welcome','Admin\IndexController@welcome')->middleware('auth');
});
//后台路由部分(需要权限判断)
Route::group(['prefix' => 'admin','middleware'=>['auth:admin','checkrbac']],function(){
    //后台首页路由
    Route::get('index/index','Admin\IndexController@index');
    Route::get('index/welcome','Admin\IndexController@welcome');

    //管理员管理模块
    Route::get('manager/index','Admin\ManagerController@index');

    //权限管理模块
     Route::get('auth/index','Admin\AuthController@index');
     Route::any('auth/add','Admin\AuthController@add');
     
     //权限分派模块角色管理模块
      Route::get('role/index','Admin\RoleController@index');
      Route::any('role/assign','Admin\RoleController@assign');

    //会员的管理模块
    Route::get('member/index','Admin\MemberController@index');//会员的列表
    Route::any('member/add','Admin\MemberController@add');//添加
    
    Route::get('member/getareabyid','Admin\MemberController@getAreaById');//ajax的联动
    Route::post('member/uploader/webuploader','Admin\UploaderController@webuploader');//异步上传

    //专业分类的管理模块
    Route::get('protype/index','Admin\ProtypeController@index');//列表
    Route::get('profession/index','Admin\ProfessionController@index');//会员的列表

    //课程与点播课程的管理
    Route::get('course/index','Admin\CourseController@index');//列表
    Route::get('lesson/index','Admin\LessonController@index');//列表
    Route::get('lesson/play','Admin\LessonController@play');//点播页面

    //试卷试题管理
    Route::get('paper/index','Admin\PaperController@index');//试卷列表
    Route::get('question/index','Admin\QuestionController@index');//试题列表
    Route::get('question/export','Admin\QuestionController@export');//导出
    Route::any('question/import','Admin\QuestionController@import');//导入
    Route::post('question/uploader/webuploader','Admin\UploaderController@webuploader');//异步导入上传文件

    //直播课程管理
    Route::get('live/index','Admin\LiveController@index');//直播课程列表
    Route::get('stream/index','Admin\StreamController@index');//直播流列表
    Route::any('stream/add','Admin\StreamController@add');//直播流添加






});
Route::get('manager/assign','Admin\ManagerController@index');
