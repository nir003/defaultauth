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


use Illuminate\Support\Facades\Route;

Schema::defaultStringLength(191);



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



/*All Login By Dynamic web service*/
Route::get('login/{service}', 'Auth\LoginController@redirectToProvider_all');
Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback_all');

/*CheckList*/
Route::get('check','CheckListController@index');

Route::post('/check_save','CheckListController@check_save');
Route::post('/add_new_check','CheckListController@add_new_check');

