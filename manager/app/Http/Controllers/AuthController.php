<?php
namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

/**
 * Created by PhpStorm.
 * User: ricky007
 * Date: 2019/1/8
 * Time: 16:42
 */
class AuthController extends Controller
{
    const K_LOGIN_AUTH_TOKEN = '__auth_manager__';
    const K_LOGIN_SESSION_KEY = '_auth_manager_';

    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            if (!$request->has('account')) {
                View::share('err_msg', '用户名不能为空');
            } elseif (!$request->has('password')) {
                View::share('err_msg', '密码不能为空');
            } else {
                $user = Account::query()->where(['account' => $request->account, 'status'=>1])->first();
                if (isset($user) && sha1($request->password . $user['salt']) == $user['password']) {
                    $token = Account::generateToken();
                    $user->token = $token;
                    $user->expired_at = date_create('7 day');
                    if ($user->save()) {
                        $target = $request->input('target', '/');
                        $c = cookie(self::K_LOGIN_AUTH_TOKEN, $token, 60 * 24 * 7, '/', env('APP_HOST'), false, true);
                        return response()->redirectTo($target)->withCookies([$c]);
                    } else {
                        View::share('err_msg', "服务器异常，请稍后重试！");
                    }
                }
            }
            View::share('err_msg', '用户名或密码错误');
        }
        return view('manager.auth');
    }

    public function host(Request $request)
    {
        return view('welcome');
    }

    public function register(Request $request) {
        if ($request->isMethod('post')) {
            if (!$request->has('account')) {
                View::share('err_msg', '登录账号不能为空');
            } elseif (!$request->has('name')) {
                View::share('err_msg', '用户名不能为空');
            } elseif (!$request->has('password')) {
                View::share('err_msg', '密码不能为空');
            } else {
                $accountName = $request->input('account');
                $nickName = $request->input('name');
                $password = $request->input('password');
                $gid = $request->input('gid');

                $user = Account::query()->where(['account'=>$accountName, 'status'=>1])->first();
                if (isset($user)) {
                    View::share('err_msg', '该账号已注册');
                } else {
                    if (Account::query()->where('status', '1')->count() == 0) {
                        $role = Account::K_ROLE_ADMIN;
                    } else {
                        $role = Account::K_ROLE_MEMBER;
                    }
                    $user = Account::generateAccount($gid, $role, $accountName, $nickName, $password);
                    if ($user->save()) {
                        $c = cookie(self::K_LOGIN_AUTH_TOKEN, $user['token'], 60 * 24 * 7, '/', env('APP_HOST'), false, true);
                        return response()->redirectTo("/")->withCookies([$c]);
                    } else {
                        View::share('err_msg', "服务器异常，请稍后重试！");
                    }
                }
            }
        }
        return view('manager.register');
    }
}