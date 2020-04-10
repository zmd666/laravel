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

Route::group(['prefix'=>'admin','namespace'=>'Test'], function()
{
    Route::get('login', 'LoginController@test');
    Route::get('quit', 'QuitController@test');
    Route::any('member/info', [
        'uses'=>'MemberController@Mem',
        'as'=>'Member']);
});
Route::get('test1', ['uses'=>'StudentController@test1',
    'as'=>'student']);

Route::get('student/request1', ['uses'=>'TableController@request1']);
Route::get('request1',['uses' => 'TableController@request1','middleware' => 'test']);

Route::group(['middleware'=>'web'], function()
{
    Route::get('session1', ['uses'=>'TableController@session1', 'as'=>'session1']);
    Route::get('session2', ['uses'=>'TableController@session2']);
});

//Route::get('response',['uses' => 'TableController@response']);

//宣传页面
Route::get('activity0', ['uses'=>'TableController@activity0']);
//活动页面
Route::group(['middleware'=>'activity'], function()
{
    Route::get('activity1', ['uses'=>'TableController@activity1']);
    Route::get('activity2', ['uses'=>'TableController@activity2']);
});

Route::get('activity3', ['uses'=>'TableController@activity3']);

Route::group(['prefix'=>'users', 'middleware'=>'users'], function()
{
    Route::get('list', ['uses'=>'UsersController@list']);
    Route::get('select', ['uses'=>'UsersController@select']);
    Route::get('create', ['uses'=>'UsersController@create']);
    Route::get('update', ['uses'=>'UsersController@update']);
    Route::get('delete', ['uses'=>'UsersController@delete']);
});
Route::group(['prefix'=>'address'], function()
{
    Route::get('list', ['uses'=>'AddressController@list']);
    Route::get('create', ['uses'=>'AddressController@create']);
    Route::get('delete', ['uses'=>'AddressController@delete']);
    Route::get('is_default', ['uses'=>'AddressController@is_default']);
});
//注册页面
//Route::get('register', 'RegisterController@index');
//注册行为
Route::post('register', 'RegisterController@register');
//登录页面
Route::get('login', 'LoginController@index');
//登录行为
Route::post('login', 'LoginController@login');
//登出行为
Route::get('logout', 'LoginController@logout');
//个人设置页面
Route::get('user/me/setting', 'UserController@setting');
//个人设置操作
Route::post('user/me/setting', 'UserController@settingStore');
