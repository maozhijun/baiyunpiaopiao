<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;

class AuthController extends BaseController
{
    public function index(Request $request)
    {
        return response('OK');
    }
}
