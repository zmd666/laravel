<?php

namespace App\Http\Controllers;

use App\Jobs\Message;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $aa = 11;
        dispatch(new Message($aa))->onQueue('List');
    }
}
