<?php

namespace App\Http\Middleware;

use Closure;
//引入需要的门面
use Route;
use Auth;

class CheckRbac
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::guard('admin') -> user() -> role_id != '1'){
          //Rbac鉴权
          //获取当前的路由  App\Http\Controllers\Admin\IndexController@Index
          $route=Route::currentRouteAction();
          //获取当前用户对应的角色已经具备的权限
          $ac=Auth::guard('admin') -> user() -> role -> auth_ac;
          //dd($ac);
          $ac=strtolower($ac . ',indexcontroller@index,indexcontroller@welcome');
          //判断权限  strpot 查找字母首次出现位置
          $routeArr =explode('\\',$route);//转数组
          if(strpos($ac,strtolower(end($routeArr))) === false){
            exit("<h1>你没有访问权限</h1>");
          }

          
        }
        
        //继续后续的请求
        return $next($request);
    }
}
