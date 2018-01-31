<?php
/**
 * Created by PhpStorm.
 * User: maozhijun
 * Date: 18/1/30
 * Time: 17:51
 */

namespace App\Http\Middleware;


use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Closure;

class AuthVerify
{
    public function handle(Request $request, Closure $next)
    {
        if ($this->isAuth($request)) {
            return $next($request);
        } else {
            return redirect('/login/?target='.urlencode($request->fullUrl()));
        }
    }

    public function isAuth(Request $request)
    {
        //检查session
        $login_session = session(AuthController::K_LOGIN_SESSION_KEY);
        if (isset($login_session)) {
            return true;
        }
//        $auth_cookie = $request->cookie(AuthController::K_LOGIN_COOKIE_KEY);
//        if (!empty($cookie)) {
//
//        }
        return false;
    }
}