<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/26
 * Time: 17:28
 */

namespace App\Http\Controllers\App\Community;


use App\Http\Controllers\App\Model\AppCommonResponse;
use App\Models\Community\Community;
use App\Models\Community\CommunityMember;
use App\Models\Community\Topic;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CommunityController extends Controller
{

    /**
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function communities(Request $request) {
        $communities = Community::getCommunities();
        return response()->json(AppCommonResponse::createAppCommonResponse(0, '', ['communities'=>$communities]));
    }

    /**
     * 关注社区
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function focus(Request $request) {
        $cid = $request->input('cid');//社区ID
        $type = $request->input('type', 1);//1:关注，2：取消关注
        $uid = TopicController::getUserId($request);//当前登陆用户
        //判断参数 开始
        if (!is_numeric($cid) || !in_array($type, [CommunityMember::op_focus, CommunityMember::op_un_focus])) {
            return response()->json(AppCommonResponse::createAppCommonResponse(-1, '参数错误'));
        }
        //判断参数 结束
        $cm = CommunityMember::query()->where('cid', $cid)->where('uid', $uid)->first();
        if ($type == CommunityMember::op_focus) {
            //判断是否关注
            if (isset($cm)) {
                return response()->json(AppCommonResponse::createAppCommonResponse(-1, '您已关注过此社区'));
            }
            $cm = new CommunityMember();
            $cm->cid = $cid;
            $cm->uid = $uid;
            $cm->save();
            $msg = '关注成功';
        } else {
            if (!isset($cm)) {
                return response()->json(AppCommonResponse::createAppCommonResponse(-1, '您尚未关注此社区'));
            }
            $cm->delete();
            $msg = '取消关注成功';
        }
        return response()->json(AppCommonResponse::createAppCommonResponse(0, $msg));
    }

    /**
     * 社区帖子
     * @param Request $request
     * @param $cid
     * @param $page
     * @return \Illuminate\Http\JsonResponse
     */
    public function topics(Request $request, $cid, $page) {
        //$cid = $request->input('cid');//社区ID
        //$page = $request->input('page', 1);//页码
        $page_size = $request->input('page_size', 20);//条数
        $od = $request->input('od', 1);//排序方式 1：发帖时间，2：回复时间
        $type = $request->input('type', 1);//1：全部，2：精华，其他待添加
        $last_time = $request->input('last_time');//上一页最后帖子的时间 格式为秒

        if (!is_numeric($cid)) {
            return response()->json(AppCommonResponse::createAppCommonResponse(-1, '参数错误'));
        }

        $community = Community::query()->find($cid);
        if (!isset($community)) {
            return response()->json(AppCommonResponse::createAppCommonResponse(-1, '社区不存在'));
        }

        $query = Topic::query()->where('cid', $cid)->where('status', Topic::kStatusValid);
        if ($type == 2) {
            $query->where('good', Topic::kGood);
        }
        if ($od == 2) {
            $od_column = 'last_reply_time';
        } else {
            $od_column = 'created_at';
        }
        if (is_numeric($last_time)) {
            $last_date = date('Y-m-d H:i:s', $last_time);
            $query->where($od_column, '<', $last_date);
        }
        $query->orderBy($od_column, 'desc');
        $l_s = ($page - 1) * $page_size;
        $l_s = $l_s < 0 ? 0 : $l_s;

        $query->skip($l_s)->take($page_size);
//        dump($query->toSql());
//        $page = $query->paginate($page_size, ['*'], '', $page);
//        $array = $page->items();
        $array = $query->get();
        $topics = [];
        foreach ($array as $topic) {
            $topics[] = $topic->topic2Json();
        }
        return response()->json(AppCommonResponse::createAppCommonResponse(0, '', ['topics'=>$topics]));
    }

}