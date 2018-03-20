<?php
/**
 * Created by PhpStorm.
 * User: BJ
 * Date: 2018/2/24
 * Time: 下午7:43
 */

namespace App\Http\Controllers\App;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class DiscoverController extends Controller
{
    const LINKS_KEY = 'DISCOVER_KEY';

    /**
     * app接口
     * @param Request $request
     * @return link
     */
    public function appLinks(Request $request){
        $linksStr = Redis::get(self::LINKS_KEY);
        if (!empty($linksStr)) {
            $links = json_decode($linksStr, true);
            $links = array('code'=>0,'data'=>$links);
        }
        else{
            $links = array('code'=>-1,'message'=>'加载失败');
        }
        return $links;
    }
}