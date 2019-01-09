<?php
/**
 * Created by PhpStorm.
 * User: maozhijun
 * Date: 18/1/30
 * Time: 17:51
 */

namespace App\Http\Middleware;


use App\Http\Controllers\AuthController;
use App\Models\Account;
use Illuminate\Http\Request;
use Closure;

class AuthVerify
{
    public function handle(Request $request, Closure $next)
    {
        $user = $this->getAuth($request);
        if (isset($user)) {
            $request->_account = $user;
            $request->_role = $user->role;
            $request->_roleStr = $user->roleStr();
            return $this->switchRolePage($request, $next, $user->role);
        } else {
            return redirect('/login/?target=' . urlencode($request->fullUrl()));
        }
    }

    public function getAuth(Request $request)
    {
        $user = null;
        if ($request->has(AuthController::K_LOGIN_AUTH_TOKEN)) {
            $token = $request->input(AuthController::K_LOGIN_AUTH_TOKEN);
        } else {
            $token = $request->cookie(AuthController::K_LOGIN_AUTH_TOKEN);
        }
        if ($token) {
            $user = Account::query()->where('token', $token)->where('expired_at', '>', date_create())->first();
        }
        return $user;
    }

    public function switchRolePage(Request $request, Closure $next, $role) {
        $path = $request->path();

        if (strlen($path) > 0 && starts_with("/", $path)) {
            $path = substr($path, 1, strlen($path));
        }
        if (strlen($path) <= 0) {
            $name = "";
        } else {
            if (str_contains($path, "/")) {
                list($name, $other) = explode('/', $request->path(), 2);
            } else {
                $name = $path;
            }
        }
        $roleStr = Account::getRolePrexStr($role);
        if ($name == $roleStr) {
            return $next($request);
        }
        return redirect("/$roleStr");
    }
}