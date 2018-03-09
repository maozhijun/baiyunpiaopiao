<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/3/9
 * Time: 16:54
 */

namespace App\Http\Controllers\StaticHtml;


use App\Http\Controllers\App\Community\AccountController;
use App\Http\Controllers\App\Community\TopicController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommunityController extends Controller
{

    /**
     * 静态化帖子终端
     * @param Request $request
     * @param $id
     */
    public function staticTopicDetail(Request $request, $id) {
        $con = new TopicController();
        $json = $con->detailJson($id);
        Storage::disk('public')->put('/static/m/v100/app/topics/' . $id . '/detail.json', json_encode($json));
    }

    /**
     * 静态化用户信息
     * @param Request $request
     * @param $id
     */
    public function staticAccountInfo(Request $request, $id) {
        $con = new AccountController();
        $json = $con->infoJson($id);
        Storage::disk('public')->put('/static/m/v100/app/account/' . $id . '/info.json', json_encode($json));
    }


}