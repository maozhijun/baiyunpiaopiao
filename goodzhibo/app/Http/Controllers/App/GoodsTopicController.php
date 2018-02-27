<?php
/**
 * Created by PhpStorm.
 * User: BJ
 * Date: 2017/9/1
 * Time: 下午4:56
 */

namespace App\Http\Controllers\App;

use App\Models\Shop\Business\GoodsTopics;
use App\Models\Shop\Business\Order;
use App\Models\Shop\Business\TopicBanner;
use App\Models\Shop\Business\TopicTypes;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class GoodsTopicController extends Controller{
    //静态化
    public function staticData(){
        $this->homeIndex(new Request());
        $this->topicTypes(new Request());
    }

    /**
     * 主页
     * @param Request $request
     * @return json
     */
    public function homeIndex(Request $request) {
        try {
            $ch = curl_init();
            $url = 'https://shop.liaogou168.com/api/v140/app/topic/home';
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $json = curl_exec ($ch);
            $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close ($ch);
            if ($code >= 400 || empty($json)) {
                return;
            }
            Storage::disk("public")->put("/static/topic/json/home.json", $json);
        } catch (\Exception $exception) {
            Log::error($exception);
        }
        if ($json) {
            $json = json_decode($json, true);
            return $json;
        }
    }

    /**
     * 类型
     * @param Request $request
     * @return json
     */
    public function topicTypes(Request $request) {
        try {
            $ch = curl_init();
            $url = 'https://shop.liaogou168.com/api/v140/app/topic/types';
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $json = curl_exec ($ch);
            $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close ($ch);
            if ($code >= 400 || empty($json)) {
                return;
            }
            $json = json_decode($json, true);
            $tmp = array();
            if ($json['code'] == 0){
                foreach ($json['data'] as $item){
                    if (stristr($item['name'],'彩')){

                    }
                    else{
                        $tmp['data'][] = $item;
                    }
                }
                $tmp['code'] = $json['code'];
            }
            else{
                $tmp = $json;
            }
            $tmp = json_encode($tmp);
            Storage::disk("public")->put("/static/topic/json/types.json", $tmp);
        } catch (\Exception $exception) {
            Log::error($exception);
        }
        if ($tmp) {
            $json = json_decode($tmp, true);
            return $json;
        }
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
        $ids = $request->input("ids");
        $ch = curl_init();
        $url = 'https://shop.liaogou168.com/api/v140/app/topic/getMerchantTopicByIds?ids='.$ids;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
        $json = json_decode($json, true);
        return $json;
    }
}