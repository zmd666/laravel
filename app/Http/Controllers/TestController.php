<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(Request $request)
    {
        $aaa = $request->input('aaa', 11);
        echo $aaa;
    }
}
