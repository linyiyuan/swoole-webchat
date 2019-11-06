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
// ================== 前端部分路由 ==================
Route::namespace('Home')->group(function() {
    Route::prefix('/auth')->namespace('Auth')->group(function(){
        Route::get('/login', 'AuthController@login');
        Route::get('/register', 'AuthController@register');
        Route::get('/logout', 'AuthController@logout');
        Route::post('/doLogin', 'AuthController@doLogin');
        Route::post('/doRegister', 'AuthController@doRegister');

        ///第三方授权相关
        Route::prefix('/OAuth')->middleware('web')->group(function(){
            Route::get('/github','GithubController@init');
            Route::get('/weibo','WeiBoController@init');
            Route::get('/qq','QqController@init');


            Route::prefix('/callback')->group(function(){
                Route::any('/github','GithubController@callback');
                Route::any('/weibo','WeiBoController@callback');
                Route::any('/qq','QqController@callback');
            });
        });
    });

    Route::middleware('check.session')->group(function(){
        Route::get('/', 'IndexController@index');
    });
});





