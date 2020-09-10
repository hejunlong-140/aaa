<?php

use Illuminate\Support\Facades\Route;

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

//登录
Route::any('login',"A1\LoginController@login");  //登录视图
Route::any('login/index',"A1\LoginController@index");  //执行登录


//新闻添加
Route::middleware('login')->group(function(){
	Route::any('news',"A1\NewsController@create");		 //新闻视图
	Route::any('news/store',"A1\NewsController@store");  //新闻添加
	Route::any('news/index',"A1\NewsController@index");  //新闻展示
	Route::any('news/detail/{id}',"A1\NewsController@show");  //新闻详情
});


//后台品牌
Route::any('brand/create',"Admin\BrandController@create")->name('brand_name');  //品牌视图
Route::any('brand/store',"Admin\BrandController@store");  						//执行添加
Route::any('brand',"Admin\BrandController@index")->name('brand');  				//品牌列表
Route::any('brand/upload',"Admin\BrandController@upload");  					//图片添加
Route::any('brand/edit/{id}',"Admin\BrandController@edit")->name('brand_edit'); //修改视图
Route::any('brand/update/{id}',"Admin\BrandController@update");  				//执行修改
Route::any('brand/del/{id?}',"Admin\BrandController@destroy");  				//删除
Route::any('brand/change',"Admin\BrandController@change");  					//即点及改