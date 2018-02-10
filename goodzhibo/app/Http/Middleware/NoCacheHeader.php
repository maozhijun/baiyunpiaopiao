<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/10
 * Time: 17:55
 */

namespace App\Http\Middleware;


use Illuminate\Http\Request;

class NoCacheHeader
{
    public function handle(Request $request, \Closure $next)
    {
        $response = $next($request);
        $response->header('Cache-Control', 'public');
        return $response;
    }
}