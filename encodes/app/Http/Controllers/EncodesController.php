<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;

class EncodesController extends BaseController
{
    public function index(Request $request)
    {
        return view('manager.channels');
    }
}
