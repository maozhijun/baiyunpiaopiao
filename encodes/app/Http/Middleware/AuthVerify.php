<?php
/**
 * Created by PhpStorm.
 * User: maozhijun
 * Date: 18/1/30
 * Time: 17:51
 */

namespace App\Http\Middleware;


use Illuminate\Http\Request;
use Closure;

class AuthVerify
{
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}