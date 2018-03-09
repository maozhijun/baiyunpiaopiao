<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/26
 * Time: 18:24
 */

namespace App\Http\Controllers\App\Community;


use App\Http\Controllers\App\Model\AppCommonResponse;
use App\Models\Community\Comment;
use App\Models\Community\Community;
use App\Models\Community\CommunityExt;
use App\Models\Community\TagTopic;
use App\Models\Community\Topic;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TopicController extends Controller
{
    const Content_Type_Array = ['text', 'image', 'link', 'voice', 'video'];

    /**
     * 获取帖子详细信息
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function detail(Request $request, $id) {
        $json = $this->detailJson($id);
        return response()->json($json);
    }

    /**
     * 获取 帖子终端 json
     * @param $id
     * @return AppCommonResponse
     */
    public function detailJson($id) {
        $topic = Topic::query()->find($id);
        if (!isset($topic) || $topic->status != Topic::kStatusValid) {
            return AppCommonResponse::createAppCommonResponse(-1, '帖子不存在');
        }
        return AppCommonResponse::createAppCommonResponse(0, '', ['topic'=>$topic->topic2Json()]);
    }

    /**
     * 发帖
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createTopic(Request $request) {
        $uid = $this->getUserId($request);//获取用户ID
        $title = $request->input('title');//标题
        $content = $request->input('content');//内容
        $isPicTex = $request->input('isPicTex', 1);//是否图文json方式接受内容。1 是，其他 否。默认为 接收数组
        $cid = $request->input('cid');//社区ID
        $tags = $request->input('tags');//标签
        $from = $request->input('from');//来源

        //判断参数开始
        if ($uid == 0) {//判断用户
            return response()->json(AppCommonResponse::createAppCommonResponse(-1 , '抱歉，您尚未登陆，不能发帖'));
        }
        if (isset($_SERVER['HTTP_X_WAP_PROFILE']) && !in_array($from, [Topic::kFromAndroid, Topic::kFromIOS])) {//如果是移动设备 一定要传递 from 参数
            return response()->json(AppCommonResponse::createAppCommonResponse(-1 , '移动设备请务必传递正确得from参数'));
        }
        if (empty($title) || empty(trim($title))) {
            return response()->json(AppCommonResponse::createAppCommonResponse(-1 , '标题不能为空'));
        }
        if (empty($content) || empty(trim($content))) {
            return response()->json(AppCommonResponse::createAppCommonResponse(-1 , '内容不能为空'));
        }
        if ($isPicTex == 1) {
            $content_array = json_decode($content, true);
            if (is_null($content_array)) {
                return response()->json(AppCommonResponse::createAppCommonResponse(-1 , '内容格式错误'));
            }
        } else {
            //$content 转化为JSON todo
        }
        if (is_null($content_array)) {
            return response()->json(AppCommonResponse::createAppCommonResponse(-1 , '内容格式错误'));
        }
        //判断参数结束

        //处理 重复标签 开始
        $tag_array = [];
        if (!empty($tags)) {
            $list = explode(',', $tags);
            foreach ($list as $tag) {
                if (mb_strlen($tag) > 32 && !in_array($tag_array)) {
                    $tag_array[] = $tag;
                }
            }
        }
        //处理 重复标签 结束

        //处理 内容 开始
        $content_array = $this->checkContent($content_array);
        if (count($content_array) == 0) {
            return response()->json(AppCommonResponse::createAppCommonResponse(-1 , '内容为空或者格式错误'));
        }
        //处理 内容 结束

        $community = Community::query()->find($cid);
        if (is_null($community)) {
            return response()->json(AppCommonResponse::createAppCommonResponse(-1 , '社区不存在'));
        }

        //保存开始

        //保存帖子 开始
        $topic = new Topic();
        $topic->uid = $uid;//用户ID
        $topic->cid = $cid;//社区ID
        $topic->from = $from;
        $topic->ip = $request->getClientIp();
        $topic->max_floor = 0;
        $topic->status = Topic::kStatusValid;
        $topic->content = json_encode($content_array);//内容
        $topic->title = $title;//帖子标题
        $topic->save();
        $tid = $topic->id;
        //保存帖子 结束

        CommunityExt::topicCountAdd($cid);//保存社区的帖子总数

        //保存帖子标签 开始
        foreach ($tag_array as $tag) {
            $tt = TagTopic::query()->where('tag', $tag)->first();
            if (!isset($tt)) {
                $tt = new TagTopic();
                $tt->tag = $tag;
                $tt->tid = $tid;
            }
        }
        //保存帖子标签 结束

        //保存结束
        return response()->json(AppCommonResponse::createAppCommonResponse(0 , '发帖成功'));
    }

    /**
     * 回复帖子、评论
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveComment(Request $request) {
        $uid = $this->getUserId($request);//当前回复用户ID
        $tid = $request->input('tid');//帖子ID
        $reply = $request->input('reply');//回复评论ID
        $reply_uid = $request->input('reply_uid');//回复用户ID
        $reply_root = $request->input('reply_root');//回复评论的 主评论ID
        $isPicTex = $request->input('isPicTex',1);
        $content = $request->input('content');//回复内容
        $udid = $request->input('udid');//设备ID
        //$floor = $request->input('floor');//楼层
        $from = $request->input('from');//回复来源

        //判断参数 开始
        if ($uid == 0) {//判断用户
            return response()->json(AppCommonResponse::createAppCommonResponse(-1 , '抱歉，您尚未登陆，不能回复'));
        }
        if (isset($_SERVER['HTTP_X_WAP_PROFILE']) && !in_array($from, [Topic::kFromAndroid, Topic::kFromIOS])) {//如果是移动设备 一定要传递 from 参数
            return response()->json(AppCommonResponse::createAppCommonResponse(-1 , '移动设备请务必传递正确得from参数'));
        }
        if (!is_numeric($tid)) {
            return response()->json(AppCommonResponse::createAppCommonResponse(-1 , '您的回复内容错误'));
        }
        if ($isPicTex == 1) {
            $content_array = json_decode($content, true);
            if (is_null($content_array)) {
                return response()->json(AppCommonResponse::createAppCommonResponse(-1 , '内容格式错误'));
            }
        } else {
            $content_array = null;
            //$content 转化为JSON todo
        }

        if (is_null($content_array)) {
            return response()->json(AppCommonResponse::createAppCommonResponse(-1 , '内容格式错误'));
        }
        //判断参数 结束

        $topic = Topic::query()->find($tid);
        if (!isset($topic) || Topic::kStatusValid != $topic->status) {
            return response()->json(AppCommonResponse::createAppCommonResponse(-1 , '您回复的帖子不存在'));
        }

        if (is_numeric($reply)) {
            $comment = Comment::query()->find($reply);
            if (!isset($comment) || $comment->status !== Comment::kStatusValid  || $comment->tid != $tid) {
                return response()->json(AppCommonResponse::createAppCommonResponse(-1 , '您回复的评论不存在'));
            }
            if (is_numeric($reply_root)) {
                $root_comment = Comment::query()->find($reply_root);
                if (!isset($root_comment) || Comment::kStatusValid != $root_comment->status || $root_comment->tid != $tid) {
                    $reply_root = $reply;
                }
            } else {
                $reply_root = $reply;
            }
            $reply_uid = $comment->uid;
        }

        $max_floor = $topic->max_floor + 1;
        $new_comment = new Comment();
        $new_comment->uid = $uid;
        $new_comment->tid = $tid;
        $new_comment->reply = $reply;
        $new_comment->reply_root = $reply_root;
        $new_comment->content = json_encode($content_array);
        $new_comment->reply_uid = $reply_uid;
        $new_comment->udid = $udid;
        $new_comment->from = $from;
        $new_comment->status = Comment::kStatusValid;
        $new_comment->floor = $max_floor;
        $new_comment->ip = $request->getClientIp();

        $new_comment->save();
        //帖子增加最大楼层
        $topic->max_floor = $max_floor;
        $topic->last_reply_time = date('Y-m-d H:i:s');
        $topic->save();
        //帖子增加最大楼层
        return response()->json(AppCommonResponse::createAppCommonResponse(0 , '回复成功'));
    }

    /**
     * 检查内容
     * @param $content_array
     * @return mixed
     */
    protected function checkContent($content_array) {
        //json 格式：[{"type":"text","text":"微信中转群，扫码进来有惊喜……","voted":0,"count":0,"cityId":0},
        //    "type":"image","url":"http://img.54qiumi.com/15188811246817501909.jpg?w\u003d800\u0026h\u003d1422","thumbUrl":"http://img.54qiumi.com/15188811246817501909.jpg/320x320","voted":0,"count":0,"cityId":0}
        //     {"type":"link","name":"阿拉巴","link":"xxxx","voted":0}
        // ]
        foreach ($content_array as $index=>$json) {
            if (!isset($json['type']) || !in_array($json['type'], self::Content_Type_Array)) {
                unset($content_array[$index]);
                continue;
            }
            $type = $json['type'];
            switch ($type) {
                case 'text':
                    if (!isset($json['text']) || empty(trim($json['text'])) ) {
                        unset($content_array[$index]);
                    }
                    break;
                case 'image':
                    if (!isset($json['url']) || empty(trim($json['url'])) || !preg_match('/^https?:\/\//', $json['url']) ) {
                        unset($content_array[$index]);
                    }
                    break;
                case 'link':
                    if (!isset($json['link']) || empty(trim($json['link'])) || !preg_match('/^https?:\/\//', $json['link']) ) {
                        unset($content_array[$index]);
                    }
                    break;
                default:
                    unset($content_array[$index]);//其他类型的全部删除
            }
        }
        return $content_array;
    }

    /**
     * @param Request $request
     * @param $tid
     * @param $page
     * @return \Illuminate\Http\JsonResponse
     */
    public function topicComments(Request $request, $tid, $page) {
//        $tid = $request->input('tid');
        $pageSize = $request->input('pageSize', 20);//每页数量

//        if (!is_numeric($tid)) {
//            return response()->json(AppCommonResponse::createAppCommonResponse(-1 , '参数错误'));
//        }
        $topic = Topic::query()->find($tid);
        if (!isset($topic) || $topic->status != Topic::kStatusValid) {
            return response()->json(AppCommonResponse::createAppCommonResponse(-1 , '帖子不存在'));
        }
        $query = Comment::query()->where('tid', $tid)->where('status', Comment::kStatusValid);
        $skip = ($page - 1) * $pageSize;
        $skip = $skip < 0 ? 0 : $skip;
        $query->orderBy('created_at','desc');
        $query->skip($skip)->take($pageSize);
        $array = $query->get();
        $comments = [];
        foreach ($array as $comment) {
            $comments[] = $comment->comment2Json();
        }
        return response()->json(AppCommonResponse::createAppCommonResponse(0 , '', ['comments'=>$comments]));
    }

    /**
     * 获取当前用户id
     * @param Request $request
     * @return int
     */
    public static function getUserId(Request $request) {
        $login = session('_login');
        return isset($login) ? $login->account_id : 0;
    }
}