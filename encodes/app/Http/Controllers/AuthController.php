<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AuthController extends BaseController
{
    const K_LOGIN_SESSION_KEY = '__auth__';
    const K_LOGIN_COOKIE_KEY = '__auth__';

    private $users = [
        [
            'account' => '牛逼编码系统',
            'password' => '9e8fa2d95c15baeca38d8d6c2ccae959ac078e61',
            'salt' => '6dUrCKcxVycRs',
            'role' => 'admin'
        ],
        [
            'account' => 'leqiuba',
            'password' => '141efbfed999db378707878803b34fb7585f7a6f',//leqiuba88
            'salt' => '6dalIaEsi35Cs',
            'role' => 'admin'
        ],
        [
            'account' => 'gg-user',
            'password' => '73b7873465e24754faeb01a5158b0ea97db49b72',
            'salt' => '6dalIdJiO2Vt',
            'role' => 'gg'
        ],
    ];

    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            if (!$request->has('account')) {
                View::share('err_msg', '用户名不能为空');
            } elseif (!$request->has('password')) {
                View::share('err_msg', '密码不能为空');
            } else {
                foreach ($this->users as $user) {
                    if ($request->account == $user['account'] &&
                        sha1($request->password . $user['salt']) == $user['password']
                    ) {
                        session([self::K_LOGIN_SESSION_KEY => $user]);
                        return redirect($request->input('target', '/manager/'));
                    }
                }
            }
            View::share('err_msg', '用户名或密码错误');
        }
        return view('manager.auth');
    }
}
