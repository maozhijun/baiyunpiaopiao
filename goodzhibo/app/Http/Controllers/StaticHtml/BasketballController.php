<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/3/13
 * Time: 18:48
 */

namespace App\Http\Controllers\StaticHtml;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class BasketballController extends Controller
{

    public function staticWapDetail(Request $request, $date, $id) {
        $wapCon = new \App\Http\Controllers\Mobile\Live\BasketBallController();
        $html = $wapCon->basketballDetail($request, $date, $id);
        Storage::disk('public')->put('/static/m/basketball/detail/' . $date . '/' . $id . '.html', $html);
    }

}