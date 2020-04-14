<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //登录页面
    public function index()
    {
        return null;
    }
    //登录行为
    public function login()
    {
        return "你来啦！";
    }
    //登出行为
    public function logout()
    {
        echo 111;
    }
}
