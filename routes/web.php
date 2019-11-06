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
// ---------- 初始路由
Route::view('/','welcome');

Route::get('/login', 'Auth\AuthController@login');
Route::get('/register', 'Auth\AuthController@register');
Route::get('/index', 'Home\IndexController@index');

