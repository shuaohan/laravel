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
//首页
Route::get('/','Ordinary\AuthController@index');
//header资源路由
Route::resource('pictures', 'Ordinary\PictureController');
//前端视图管理
Route::group(['prefix' => 'frontend'], function () {
    Route::get('/login','Frontend\LoginController@getlogin');
    Route::get('/register','Frontend\RegisterController@getregister');
    Route::post('/login','Frontend\LoginController@login');
    Route::post('/register','Frontend\RegisterController@register');
    //退出登录
    Route::get('/logout','Frontend\LoginController@logout');
    //我的资料
    Route::get('/userinfo','Frontend\LoginController@getuserinfo');
    Route::post('/userinfo','Frontend\LoginController@userinfo');
    //修改密码
    Route::get('/changepass','Frontend\RegisterController@getchangepass');
    Route::post('/changepass','Frontend\RegisterController@changepass');
    //无聊图
    Route::resource('/boring', 'Frontend\Article\BoringController');
    //音乐文章
    Route::get('/sound', 'Frontend\Article\SoundController@index');


});
//后台管理
Route::group(['prefix' => 'admin'], function () {
    //登录
    Route::get('/login','Admin\AuthController@getlogin');
    Route::post('/login','Admin\AuthController@login');
    Route::get('/index','Admin\AuthController@index');
    //修改密码
    Route::get('/changepass','Admin\AuthController@getchangepass');
    Route::post('/changepass','Admin\AuthController@changepass');
    //退出
    Route::get('/logout','Admin\AuthController@logout');
    //资源路由
    Route::resource('pictures', 'Admin\PictureController');
    //课程路由
    Route::resource('lessons', 'Admin\LessonController');
    //文章管理
    Route::group(['prefix' => 'article'],function (){
        Route::get('/index','Admin\ArticleController@getindex');
        Route::post('/index','Admin\ArticleController@index');
        Route::get('/boring','Admin\ArticleController@getboring');
        Route::post('/boring','Admin\ArticleController@boring');
        Route::get('/joke','Admin\ArticleController@getjoke');
        Route::post('/joke','Admin\ArticleController@joke');
        Route::get('/multi','Admin\ArticleController@getmulti');
        Route::post('/multi','Admin\ArticleController@multi');
        Route::get('/sound','Admin\ArticleController@getsound');
        Route::post('/sound','Admin\ArticleController@sound');
        Route::get('/talk','Admin\ArticleController@gettalk');
        Route::post('/talk','Admin\ArticleController@talk');
    });
});
//api路由
Route::group(['prefix' => 'api'], function () {
    Route::apiResource('/sound', 'Backend\Api\SoundController');

});
//上传路由
Route::any('/admin/upload','Admin\UploadController@upload');
Route::any('/admin/upartpre','Admin\UploadController@upartpre');
//上传图片文件
Route::any('/admin/upartpic','Admin\UploadController@upartpic');
//上传文章文件
Route::any('/admin/uparttxt','Admin\UploadController@uparttxt');
Route::any('/admin/uptest','Admin\UploadController@uptest');

//测试
Route::any('/admin/test','Admin\UploadController@test');

Route::get('/test', function () {
    return view('test');
});
Route::get('/test2','Admin\TestController@test');
Route::post('/test2','Admin\TestController@posttest');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
