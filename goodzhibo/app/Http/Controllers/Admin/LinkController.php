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
        $links = [];
        $linksStr = Redis::get(self::LINKS_KEY);
        if (!empty($linksStr)) {
            $links = json_decode($linksStr, true);
        }
        return view('admin.link.links', ['links'=>$links]);
    }


    public function saveLink(Request $request) {
        $id = $request->input('id');
        $name = $request->input('name');
        $url = $request->input('link');

        if (empty($name) || empty($url)) {
            return back()->with('error', '网站名称或者链接为空');
        }
        if (!preg_match('/^http(s)?:\/\//', $url)) {
            return back()->with('error', '链接格式错误，请填写http或者https开头的链接。');
        }
        $linksStr = Redis::get(self::LINKS_KEY);
        $links = [];
        if (!empty($linksStr)) {
            //判断是否有该链接。
            $links = json_decode($linksStr, true);
        }
        if (($id == 0 || !empty($id)) && isset($links[$id])) {
            $links[$id] = ['name'=>$name, 'link'=>$url];
        } else {
            $links[] = ['name'=>$name, 'link'=>$url];
        }
        Redis::set(self::LINKS_KEY, json_encode($links));
        return back()->with('success', '保存成功');
    }

    /**
     * 删除友链
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delLink(Request $request) {
        $id = $request->input('id');
        if ($id != 0 && empty($id)) {
            return back()->with('error', '参数错误');
        }
        $linksStr = Redis::get(self::LINKS_KEY);
        if (!empty($linksStr)) {
            //判断是否有该链接。
            $links = json_decode($linksStr, true);
            if (isset($links[$id])) {
                unset($links[$id]);
            }
            Redis::set(self::LINKS_KEY, json_encode($links));
        }
        return back()->with('success', '删除成功');
    }

    public static function getLinks() {
        $links = [];
        $linksStr = Redis::get(self::LINKS_KEY);
        if (!empty($linksStr)) {
            $links = json_decode($linksStr, true);
        }
        return $links;
    }

}