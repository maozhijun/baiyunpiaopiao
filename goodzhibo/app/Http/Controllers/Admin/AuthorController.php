<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/10
 * Time: 16:22
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class AuthorController extends Controller
{
    const HEI_TU_AUTH_SESSION = "HEI_TU_AUTH_SESSION";
    const HEI_TU_AUTH_TOKEN = "HEI_TU_AUTH_TOKEN";
    const ACCOUNT_ARRAY = ['admin'=>'333333'];
    const SALT = "HEITU_MIMA_JIAMI";
    public function __construct()
    {
        $this->middleware('admin_auth')->except(['login.html', 'logout']);
    }

    public function sign(Request $request) {
        $isPost = $request->isMethod('post');
        $nickname = $request->input('nickname');
        $password = $request->input('password');
        $remember = $request->input("remember", 0);
        $target = $request->input("target", '/admin');

        if ($isPost) {
            if (!in_array($nickname, self::ACCOUNT_ARRAY)) {
                return back()->withInput([])->with(["error" => "账户或密码错误"]);
            }
            $pwd = self::ACCOUNT_ARRAY[$nickname];
            if ($password != self::shaPassword(self::SALT, $pwd)) {
                return back()->withInput([])->with(["error" => "账户或密码错误"]);
            }
            session([self::HEI_TU_AUTH_SESSION => $nickname]);//登录信息保存在session
            if ($remember == 1) {
                $token = uniqid('htc-', true);
                Redis::setEx($token, 60 * 60 * 24 * 7, $nickname);
                $c = cookie(self::HEI_TU_AUTH_TOKEN, $token, 60 * 24 * 7, '/', 'liaogou168.com', false, true);
                return response()->redirectTo($target)->withCookies([$c]);
            } else {
                return response()->redirectTo($target);
            }
        }
        return view('admin.auth.login');
    }

    public static function shaPassword($salt, $password)
    {
        return sha1($salt . $password);
    }

}