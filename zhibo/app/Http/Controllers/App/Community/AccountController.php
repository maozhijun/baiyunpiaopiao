<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/3/9
 * Time: 10:34
 */

namespace App\Http\Controllers\App\Community;


use App\Http\Controllers\App\Model\AppCommonResponse;
use App\Models\Community\AccountFocus;
use App\Models\User\Account;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AccountController extends Controller
{

    /**
     * 访问其他人的终端信息
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function info(Request $request, $id) {
        $json = $this->infoJson($id);
        return response()->json($json);
    }

    /**
     * 获取用户信息
     * @param $id
     * @return AppCommonResponse
     */
    public function infoJson($id) {
        $account = Account::query()->find($id);
        if (!isset($account)) {
            return AppCommonResponse::createAppCommonResponse(-1, '用户不存在');
        }
        $info = [];
        $info['id'] = $account->id;
        $info['nickname'] = $account->nickname;
        $info['gender'] = $account->gender;
        $info['icon'] = $account->icon;

        return AppCommonResponse::createAppCommonResponse(0, '', ['info'=>$info]);
    }

    /**
     * 关注用户
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function focus(Request $request) {
        $uid = TopicController::getUserId($request);//当前登陆用户的ID
        $type = $request->input('type');//关注类型，1：关注用户，2：取消关注
        $f_uid = $request->input('f_uid');//关注用户的ID
        //判断参数 开始
        if ($uid == 0) {
            return response()->json(AppCommonResponse::createAppCommonResponse('-1', '抱歉，您尚未登陆，不能操作。'));
        }

        if (!in_array($type, [AccountFocus::kTypeFocus, AccountFocus::kTypeUnFocus]) || !is_numeric($f_uid) || $uid == $f_uid) {
            return response()->json(AppCommonResponse::createAppCommonResponse('-1', '参数错误。'));
        }
        $f_account = Account::query()->find($f_uid);
        if (!isset($f_account)) {
            return response()->json(AppCommonResponse::createAppCommonResponse('-1', '您关注的用户不存在。'));
        }
        //判断参数 结束

        $accountFocus = AccountFocus::query()->where('uid', $uid)->where('f_uid', $f_uid)->first();

        if ($type == AccountFocus::kTypeFocus) {//关注用户
            if (!isset($accountFocus)) {
                $accountFocus = new AccountFocus();
                $accountFocus->uid = $uid;
                $accountFocus->f_uid = $f_uid;
            }
            $accountFocus->type = $type;
            $accountFocus->save();
            return response()->json(AppCommonResponse::createAppCommonResponse(0, '关注成功'));
        } else {//取消关注用户
            if (isset($accountFocus)) {
                $accountFocus->uid = $uid;
                $accountFocus->f_uid = $f_uid;
                $accountFocus->type = $type;
                $accountFocus->save();
            }
            return response()->json(AppCommonResponse::createAppCommonResponse(0, '取消关注成功'));
        }
    }

}