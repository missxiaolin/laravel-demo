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

//Route::group(['namespace'=>'Weapp','prefix'=>'index'], function($router){
//    $router->any('index', 'IndexController@index')->name('index.index');
//});

Route::group([], function($router){
    $router->any('index/index', 'IndexController@index')->name('index.index');
    $router->any('index/upload', 'IndexController@upload')->name('index.upload');
});