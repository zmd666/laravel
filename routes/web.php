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

Route::get('about/dffg', 'TestController@test');

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
Route::get('query1', ['uses'=>'StudentController@query1']);
Route::get('query2', ['uses'=>'StudentController@query2']);
Route::get('orm2', ['uses'=>'StudentController@orm2']);
Route::get('student/request1', ['uses'=>'TableController@request1']);
Route::get('request1',['uses' => 'TableController@request1','middleware' => 'test']);

Route::group(['middleware'=>'web'], function()
{
    Route::get('session1', ['uses'=>'TableController@session1', 'as'=>'session1']);
    Route::get('session2', ['uses'=>'TableController@session2']);
});

Route::get('response',['uses' => 'TableController@response']);

//宣传页面
Route::get('activity0', ['uses'=>'TableController@activity0']);
//活动页面
Route::group(['middleware'=>'activity'], function()
{
    Route::get('activity1', ['uses'=>'TableController@activity1']);
    Route::get('activity2', ['uses'=>'TableController@activity2']);
});

