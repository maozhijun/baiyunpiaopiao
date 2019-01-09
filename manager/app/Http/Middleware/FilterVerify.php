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

class FilterVerify
{
    public function handle(Request $request, Closure $next)
    {
        $output = [];
        $result = 0;
        exec('ffmpeg -version', $output, $result);
        if ($result == 0 || env('APP_DEBUG') == 'true') {
            return $next($request);
        } else {
            return response('编码系统不可用');
        }
    }
}