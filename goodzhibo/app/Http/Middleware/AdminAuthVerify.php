<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/3
 * Time: 17:16
 */
namespace App\Http\Middleware;

use App\Http\Controllers\Admin\AuthorController;
use Closure;
use Illuminate\Http\Request;

class AdminAuthVerify
{

    public function handle(Request $request, Closure $next)
    {
        if ($this->hasAuth($request)) {
            return $next($request);
        } else {
            return redirect('/admin/login.html/?target=' . urlencode(request()->fullUrl()));
        }
    }

    /**
     * 判断是登录
     * @param Request $request
     * @return bool
     */
    protected function hasAuth(Request $request)
    {
        $login = session(AuthorController::HEI_TU_AUTH_SESSION);
        if (isset($login)) {
            $request->_account = $login;
            return true;
        }
        if ($request->has(AuthorController::HEI_TU_AUTH_TOKEN)) {
            $token = $request->input(AuthorController::HEI_TU_AUTH_TOKEN);
        } else {
            $token = $request->cookie(AuthorController::HEI_TU_AUTH_TOKEN);
        }
        if (isset($token)) {

        }
        return true;
    }

}