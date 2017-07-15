<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Admin; //引入admin模型
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin.index');
    }
    //获取ajax
    public function loadData(){
        //查询数据
        $data = Admin::get();
        //返回数据
        return [
            'data'	=>	$data,	//主题数据
        ];
    }
}
