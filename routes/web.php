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

Route::get('/', function () {
    return view('welcome');
});
//后台登录页面
Route::get('/admin/public/login','Admin\PublicController@login');
//登录处理路由
Route::post('/admin/public/checkLogin','Admin\PublicController@checkLogin');
//登录退出路由
Route::get('/admin/public/logout','Admin\PublicController@logout');

//由于后台所有页面都需添加中间件，所以建议使用路由群组
Route::group(['middleware' => 'auth:admin'],function(){
    //后台首页路由
    Route::get('/admin/index/index','Admin\IndexController@index');
    Route::get('/admin/index/welcome','Admin\IndexController@welcome');

    //管理员列表的路由地址
    Route::any('/admin/admin/index','Admin\AdminController@index');
    //ajax加载数据
    Route::get('/admin/admin/loadData','Admin\AdminController@loadData');
});