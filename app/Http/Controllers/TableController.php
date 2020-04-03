<?php

namespace App\Http\Controllers;

use App\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Boolean;

class TableController extends Controller
{
    public function request1(Request $request)
    {
        /*if($request->ismethod('post')) {
            echo 'en';
        } else {
            echo 'en~';
        };*/
        /*$res = $request->ajax();
        var_dump($res);*/
        /*$res = $request->is('student/*');
        var_dump($res);*/
        /*echo $request->id;
        echo $request->url();*/
    }
    public function session1(Request $request)
    {
        return Session::get('message');
//        return 'you come';
//        $request->session()->put('x1', 'v2');
//        echo $request->session()->get('x1');
//        session()->put('x1', 'v3');
//        echo session()->get('x1');
//        Session::put('x1', 'v8');
//        echo Session::get('x1');
//        echo Session::get('x2', 'xx');
//        Session::put(['x3' => 'v3', 'x4' => 'v4']);
//        echo Session::get('x4');
        /*Session::push('id', '07');
        Session::push('id', '08');
        $res = Session::get('id');
        var_dump($res);*/
        //获取后删掉
        //var_dump(Session::pull('x1', 'default'));
//        dd(Session::all());
//        Session::has('x4');
//        Session::forget('x3');
//        dd(Session::all());
        //清空所有
//        Session::flush();
        //暂存数据
//        Session::flash('x9', 'v9');
//        echo Session::get('x9');
    }
    public function response()
    {
        //转换json
        /*$data = [
            'errCode' => 0,
            'errMsg' => 'success',
            'data' => 'xh'
        ];
        return response()->json($data);
        var_dump($data);*/

        //重定向
//        return redirect('session1')->with('message', 'you jump');

        //控制器间跳转
        //1.action()
        /*return redirect()->action('TableController@session1')->with('message', 'you jump again');*/
        //2.route('别名')
//        return redirect()->route('session1')->with('message', 'you jump again and again');

        //3.返回上一级back()
//        return redirect()->back();
    }
    //宣传页
    public function activity0()
    {
        return 'waiting......';
    }
    public function activity1()
    {
        return 'welcome!';
    }
    public function activity2()
    {
        return 'welcome!welcome!';
    }
}



