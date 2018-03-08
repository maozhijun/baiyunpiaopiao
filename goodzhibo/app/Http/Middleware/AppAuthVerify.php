<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/3
 * Time: 17:16
 */
namespace App\Http\Middleware;

use App\Http\Controllers\App\AuthController;
use App\Models\User\AccountLogin;
use Closure;
use Illuminate\Http\Request;

class AppAuthVerify
{

    public function handle(Request $request, Closure $next)
    {
        if ($this->hasAuth($request)) {
            return $next($request);
        } else {
            return response()->json(['code' => 401, 'msg' => '抱歉，您尚未登陆不能操作。']);
        }
    }


    /**
     * 判断是登录
     * @param Request $request
     * @return bool
     */
    public function hasAuth(Request $request)
    {
        $login = session('_login');
        if ($login) {
            $request->_login = $login;
            return true;
        }

        if (!isset($request->_login)) {
            $token = $request->cookie(AuthController::HT_AUTH_TOKEN);//"lg58cb8fd3840df3.64547554";//
            if (isset($token)) {
                $login = AccountLogin::query()->find($token);
                if (isset($login) && $login->status == 1) {
                    if (strtotime($login->expired_at) > strtotime('now')) {
                        $request->_login = $login;
                        session(['_login' => $login]);
                        return true;
                    }
                }
            }
        }
        return false;
    }

}