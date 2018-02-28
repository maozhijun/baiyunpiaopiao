<?php
namespace App\Http\Controllers\App;

use App\Http\Controllers\App\Model\AppCommonResponse;
use App\Models\User\Account;
use App\Models\User\AccountLogin;
use App\Models\User\AppDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use \Illuminate\Routing\Controller;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/3
 * Time: 12:03
 */
class ConfigController extends Controller
{

    public function __construct()
    {
        $this->middleware('app_api_auth')->only(['setting']);
    }

    public function index(Request $request)
    {
        return Response::json(AppCommonResponse::createAppCommonResponse(0, 'OK', array(), false));
    }

    public function device(Request $request)
    {
        if ($request->isMethod('post')) {
            $udid = $request->input('udid', '');
            if (empty($udid)) {
                return Response::json(AppCommonResponse::createAppCommonResponse(-1, 'udid不能为空'));
            }
            $device = AppDevice::query()->find($udid);
            if (empty($device)) {
                $device = new AppDevice();
                $device->udid = $udid;
            }
            $os_v = $request->input('os_v');
            if (!empty($os_v)) {
                $device->os_v = $os_v;
            }
            $os = $request->input('os');
            if (!empty($os)) {
                $device->os = $os;
            }
            $app_v = $request->input('app_v');
            if (!empty($app_v)) {
                $device->app_v = $app_v;
            }
            $j_id = $request->input('j_id');
            if (!empty($j_id)) {
                $device->j_id = $j_id;
            }
            if ($device->save()) {
                return Response::json(AppCommonResponse::createAppCommonResponse(0, 'ok'));
            } else {
                return Response::json(AppCommonResponse::createAppCommonResponse(500, '数据库异常'));
            }
        } else {
            return Response::json(AppCommonResponse::createAppCommonResponse(403, '只支持POST方法'));
        }
    }

    public function check(Request $request)
    {
        if (isset($request->_login)) {
            if ($request->has('udid') && $request->_login->account->bind_udid != $request->input('udid')) {
                $udid = $request->input('udid');
                $account = Account::query()->where(['bind_udid' => $udid])->first();
                if (isset($account)) {
                    $account->bind_udid = '';
                    $account->save();
                }
                $request->_login->account->bind_udid = $udid;
                $openid = $request->input("openid");
                if (!empty($openid) && $request->_login->account->openid_app != $openid) {
                    $request->_login->account->openid_app = $openid;
                }
            }
            $request->_login->account->last_access_by = AccountLogin::K_PLATFORM_APP;
            $request->_login->account->last_access_at = date_create();
            $request->_login->account->save();
        }
        return Response::json(AppCommonResponse::createAppCommonResponse(0, 'ok'));
    }

}