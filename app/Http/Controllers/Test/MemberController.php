<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function Mem()
    {
        return route('Member');
    }
}