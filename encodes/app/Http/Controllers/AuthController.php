<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AuthController extends BaseController
{
    const K_LOGIN_SESSION_KEY = '__auth__';
    const K_LOGIN_COOKIE_KEY = '__auth__';

    private $user = ['account' => '牛逼编码系统', 'password' => '9e8fa2d95c15baeca38d8d6c2ccae959ac078e61', 'salt' => '6dUrCKcxVycRs'];

    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            if (!$request->has('account') || $request->account != $this->user['account']) {
                View::share('err_msg', '用户名错误');
            } elseif (!$request->has('password') || sha1($request->password . $this->user['salt']) != $this->user['password']) {
                View::share('err_msg', '密码错误');
            } else {
                session([self::K_LOGIN_SESSION_KEY => $this->user]);
                return redirect($request->input('target', '/manager/'));
            }
        }
        return view('manager.auth');
    }
}
