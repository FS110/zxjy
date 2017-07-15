<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //首页方法1-index
    public function index(){
        return view('admin.index.index');
    }

    //首页方法2-welcome
    public function welcome(){
        return view('admin.index.welcome');
    }
}
