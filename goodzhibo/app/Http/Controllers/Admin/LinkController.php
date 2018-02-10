<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/10
 * Time: 14:49
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class LinkController extends Controller
{
    const LINKS_KEY = 'LINKS_KEY';
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request) {

        return view('admin.link.links');
    }


    public function saveLink(Request $request) {
        $request->name;
        $request->link;

        $linksStr = Redis::get(self::LINKS_KEY);
        $links = [];
        if (!empty($links)) {
            //判断是否有该链接。
            $links = json_decode($linksStr, true);
        }
        foreach ($links as $link) {
            $name = $link['name'];
            
        }
        [['name'=>'', 'links'=>'']];
    }


}