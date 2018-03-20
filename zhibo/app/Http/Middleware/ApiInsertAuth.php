<?php
/**
 * Created by PhpStorm.
 * User: BJ
 * Date: 2018/2/26
 * Time: 下午12:09
 */
namespace App\Http\Middleware;

use App\Http\Controllers\App\AuthController;
use App\Models\User\AccountLogin;
use Closure;
use Illuminate\Http\Request;

class ApiInsertAuth
{

    public function handle(Request $request, Closure $next)
    {
        $this->insertAuthToRequest($request);
        $response = $next($request);
        return $response;
    }

    /**
     * 判断是登录
     * @param Request $request
     * @return bool
     */
    public function insertAuthToRequest(Request $request)
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
                    } else {
                        $login->status = 0;
                        $login->save();
                    }
                }
            }
        }
        return false;
    }

}