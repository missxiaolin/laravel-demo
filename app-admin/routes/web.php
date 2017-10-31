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

// 登录相关
Route::get('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);

Route::group([], function($router){
    $router->any('home/index', 'HomeController@index')->name('home.index');
});
