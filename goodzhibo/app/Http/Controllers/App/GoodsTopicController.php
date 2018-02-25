<?php
/**
 * Created by PhpStorm.
 * User: BJ
 * Date: 2017/9/1
 * Time: 下午4:56
 */

namespace App\Http\Controllers\App;

use App\Http\Controllers\App\Model\AppCommonResponse;
use App\Http\Controllers\Common\Topic\TopicController;
use App\Models\CMS\PcArticle;
use App\Models\Match\MatchLive;
use App\Models\Shop\Business\GoodsArticles;
use App\Models\Shop\Business\GoodsTopics;
use App\Models\Shop\Business\Order;
use App\Models\Shop\Business\TopicBanner;
use App\Models\Shop\Business\TopicTypes;
use App\Models\Shop\Customer\AccountFavor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;

class GoodsTopicController extends Controller{
    //静态化


    /**
     * 主页
     * @param Request $request
     * @return json
     */
    public function homeIndex(Request $request) {
        $ch = curl_init();
        $url = 'https://shop.liaogou168.com/api/v140/app/topic/home';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }

    /**
     * 类型
     * @param Request $request
     * @return json
     */
    public function topicTypes(Request $request) {
        $ch = curl_init();
        $url = 'https://shop.liaogou168.com/api/v140/app/topic/types';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }

    /**
     * 资讯分类显示
     * @param Request $request
     * @return json
     */
    public function topicTypeList(Request $request) {
        $ch = curl_init();
        $type = $request->input('type',0);
        $pageSize = $request->input('pageSize',20);
        $pageNo = $request->input('pageNo',0);
        $url = 'https://shop.liaogou168.com/api/v140/app/topic/list'.'?type='.$type.'&pageSize='.$pageSize.'&pageNo='.$pageNo;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }

    /**
     * 资讯终端
     */
    public function topicDetailV140(Request $request) {
        $ch = curl_init();
        $url = 'https://shop.liaogou168.com/api/v140/app/topic/detail';
        $url = $url.'?id='.$request->input('id');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }

    /**
     * 资讯终端页面其他推荐解读
     */
    function topicDetailOthersV140(Request $request) {
        $ch = curl_init();
        $url = 'https://shop.liaogou168.com/api/v140/app/topic/detailOthers?id='.$request->input('id',0);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }

    //历史浏览,传id过来
    public function getMerchantTopicByIdsV140(Request $request) {
        $topicController = new TopicController();

        $ids = $request->input("ids");
        if (is_null($ids) || strlen($ids) == 0) {
            return Response::json(AppCommonResponse::createAppCommonResponse(-1,'参数错误'));
        }
        $array = $topicController->getTopicsByIds(explode(',', $ids));

        return Response::json(AppCommonResponse::createAppCommonResponse(0,'',$array,false));
    }
}