<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;	//用户验证类
class PublicController extends Controller
{
    public function login()
    {
        return view('admin.public.login');
    }

    public function checkLogin(Request $request){
        //字段有效性基本验证
        $this -> validate($request,[
            //需要验证码的表单项name值 => 验证规则（可以是多个）
            'username'		=>	'required|min:3|max:20',
            'password'		=>	'required|min:6|max:32',
            'captcha'		=>	'required|size:5|captcha',
        ]);
        //开始验证用户帐号的合法性（查询数据库）
        $data = $request -> only("username","password");	//数组格式
        //dd($data);die;
        //dd($request -> get('online'));die;
        //尝试去验证，并且实现记住我功能
        $result = Auth::guard('admin') -> attempt($data,$request -> get('online'));
        //判断结果
        if($result){
            //echo '登录成功';
            return redirect('/admin/index/index');
        }else{
            //echo '登录失败';
            return redirect('/admin/public/login') -> withErrors([
                'loginError'	=>	'用户名或密码错误！',
            ]);
        }
    }

    public function logout()
    {
        Auth::guard('admin') -> logout();
        return redirect('/admin/public/login');
    }

}
