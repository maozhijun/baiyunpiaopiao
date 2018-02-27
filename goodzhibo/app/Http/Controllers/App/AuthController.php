<?php
/**
 * Created by PhpStorm.
 * User: BJ
 * Date: 2018/2/26
 * Time: 下午12:10
 */
namespace App\Http\Controllers\App;

use App\Http\Controllers\App\Model\AppCommonResponse;
use App\Models\User\Account;
use App\Models\User\AccountLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Response;
use \Illuminate\Routing\Controller;
use App\Http\Controllers\Common\SMS\SMSTool;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    const HT_AUTH_TOKEN = "HT_AUTH_TOKEN";

    const VERIFY_CODE_TYPE_REGISTRATION = 'registration';
    const VERIFY_CODE_TYPE_FORGET = 'forget';
    const VERIFY_CODE_TYPE_REBIND = 'rebind';

    public function __construct()
    {
        $this->middleware('api')->except(['refreshVerifyCode']);
    }

    /**
     * app前台登录页面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $phone = $request->input("phone");
            $password = $request->input('password');
            if (empty($phone) || empty($password)) {//数据验证
                return Response::json(AppCommonResponse::createAppCommonResponse(-1, '账号或密码不能为空'));
            } else {
                $account = Account::query()->where("phone", $phone)->first();
                if (empty($account) || $account->password != sha1($account->salt . $password)) {
                    return Response::json(AppCommonResponse::createAppCommonResponse(-1, '账号或密码错误'));
                } else {
                    $token = AccountLogin::generateToken();
                    $al = new AccountLogin();
                    $al->token = $token;
                    $al->account_id = $account->id;
                    $al->platform = AccountLogin::K_PLATFORM_APP;
                    $al->domain = 'www.goodzhibo.com';
                    $al->expired_at = date_create('3 year');
                    $al->status = 1;
                    if ($al->save()) {
                        $logins = AccountLogin::query()->where(['account_id' => $account->id, 'status' => 1, 'platform' => AccountLogin::K_PLATFORM_APP])
                            ->where('token', '<>', $token)
                            ->get();
                        if (!empty($logins)) {
                            foreach ($logins as $login) {
                                $login->status = 0;
                                $login->save();
                            }
                        }
                        $c = cookie(self::HT_AUTH_TOKEN, $token, 60 * 24 * 365 * 3);
                        $json = AppCommonResponse::createAppCommonResponse(0, '登录成功', $account->appModel(), false);
                        $result = Response::json($json);
                        $result->headers->setCookie($c);

                        return $result;
                    } else {
                        return Response::json(AppCommonResponse::createAppCommonResponse(-1, '服务器异常，请稍后重试！'));
                    }
                }
            }
        } else {
            return Response::json(AppCommonResponse::createAppCommonResponse(-1, '只支持POST方法'));
        }
    }

    /**
     * 注册
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $phone = $request->input("phone");
            $password = trim($request->input("password", ''));
            $code = $request->input("code");
            $unionid = $request->input("unionid");
            $openid = $request->input("openid");
            $nickname = $request->input("nickname", $phone);
            $head = $request->input("head", '');
            $gender = $request->input("gender", 0);
            $udid = $request->input('udid');

            if (empty($phone)) {
                return Response::json(AppCommonResponse::createAppCommonResponse(-1, '电话号码不能为空'));
            } elseif (empty($password) || strlen($password) < 6) {
                return Response::json(AppCommonResponse::createAppCommonResponse(-1, '密码不能少于6位'));
            } elseif (empty($code)) {
                return Response::json(AppCommonResponse::createAppCommonResponse(-1, '验证码不能为空'));
            } else {
                $verify = $this->verifyCode(self::VERIFY_CODE_TYPE_REGISTRATION, $phone);
                if (!isset($verify)) {
                    return Response::json(AppCommonResponse::createAppCommonResponse(-1, '请先获取验证码'));
                } elseif ($verify != $code) {
                    return Response::json(AppCommonResponse::createAppCommonResponse(-1, '验证码错误'));
                }
            }
            $account = Account::query()->where("phone", $phone)->first();
            if (isset($account)) {
                return Response::json(AppCommonResponse::createAppCommonResponse(-1, '账号已经存在'));
            }

            if (isset($unionid)) {
                if (empty($openid)) {
                    return Response::json(AppCommonResponse::createAppCommonResponse(-1, 'openid不能为空'));
                }
                $account = Account::query()->where("unionid", $unionid)->first();
                if (isset($account)) {
                    return Response::json(AppCommonResponse::createAppCommonResponse(-1, '账号已经存在'));
                }
            }

            $account = new Account();
            $account->phone = $phone;
            $salt = uniqid('mm', true);
            $account->salt = $salt;
            $account->password = sha1($salt . $password);
            $account->nickname = $nickname;
            $account->icon = $head;
            $account->gender = $gender;
            $account->unionid = $unionid;
            $account->bind_udid = $udid;
            $account->openid_app = $openid;
            $account->platform = AccountLogin::K_PLATFORM_APP;
            if ($account->save()) {
                Account::markNewRegAccount($account->id);//标记新注册账号。
            } else {
                return Response::json(AppCommonResponse::createAppCommonResponse(-1, '服务异常，请稍候再试'));
            }

            if (isset($unionid)) {
                $account = Account::query()->where("unionid", $unionid)->first();
                if (isset($account)) {
                    $login = AccountLogin::query()
                        ->where(['account_id' => $account->id, 'status' => 1, 'platform' => AccountLogin::K_PLATFORM_APP])
                        ->orderBy('created_at', 'desc')
                        ->first();
                    if (!isset($login)) {
                        $token = AccountLogin::generateToken();
                        $login = new AccountLogin();
                        $login->token = $token;
                        $login->account_id = $account->id;
                        $login->platform = AccountLogin::K_PLATFORM_APP;
                        $login->domain = 'www.goodzhibo.com';
                        $login->expired_at = date_create('3 year');
                        $login->status = 1;
                        if (!$login->save()) {
                            return Response::json(AppCommonResponse::createAppCommonResponse(-1, '服务器异常，请稍后重试！'));
                        }
                    }
                    $c = cookie(self::HT_AUTH_TOKEN, $login->token, 60 * 24 * 365 * 3);
                    $json = AppCommonResponse::createAppCommonResponse(0, '创建账号成功', $account->appModel(),false);
                    $result = Response::json($json);
                    $result->headers->setCookie($c);
                    return $result;
                }
            }
            return Response::json(AppCommonResponse::createAppCommonResponse(0, '创建账号成功',$account->appModel(),false));
        } else {
            return Response::json(AppCommonResponse::createAppCommonResponse(-1, '只支持POST方法'));
        }
    }

    /**
     * 忘记密码
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function forget(Request $request)
    {
        $result = [];
        if ($request->isMethod('post')) {
            $phone = $request->input("phone");
            $password = $request->input("password");
            $code = $request->input("code");
            if (empty($phone)) {
                $result['error'] = "电话号码不能为空";
            } elseif (empty($password)) {
                $result['error'] = "密码不能为空";
            } elseif (empty($code)) {
                $result['error'] = "验证码不能为空";
            } else {
                $verify = $this->verifyCode(self::VERIFY_CODE_TYPE_FORGET, $phone);
                if (!isset($verify)) {
                    $result['error'] = "请先获取验证码";
                } elseif ($verify != $code) {
                    $result['error'] = "验证码错误";
                }
            }
            if (!isset($result['error'])) {
                $account = Account::query()->where("phone", $phone)->first();
                if (empty($account)) {
                    $result['error'] = "账号不存在";
                } else {
                    $account->password = sha1($account->salt . $password);
                    if ($account->save()) {
                        $als = AccountLogin::query()->where(['account_id' => $account->id, 'status' => 1])->get();
                        foreach ($als as $al) {
                            $al->status = 0;
                            $al->save();
                        }
                        $result['success'] = "重置密码成功";
                    } else {
                        $result['error'] = "服务异常，请稍候再试";
                    }
                }
            }
        }
        if (isset($result['error']))
            return Response::json(AppCommonResponse::createAppCommonResponse(-1, $result['error']));
        else
            return Response::json(AppCommonResponse::createAppCommonResponse(0, $result['success']));
    }

    /**
     * 获取手机验证码
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendVerifyCode(Request $request)
    {
        $phone = $request->input("phone");
        $type = $request->input("type");// registration , forget, rebind
        $rules = ['captcha' => 'required|captcha'];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Response::json(AppCommonResponse::createAppCommonResponse(402, '输入错误'));
        }

        //如果是微信注册进入,这个手机号码不用校验是否存在,因为后面会把手机和微信绑一齐,兼容之前没有开通平台前无unionid问题
        if (!preg_match("#^1[23456789]{1}[0-9]{9}$#", $phone)) {
            return Response::json(AppCommonResponse::createAppCommonResponse(401, '请输入正确的手机号码'));
        }

        if (!in_array($type, [self::VERIFY_CODE_TYPE_REGISTRATION, self::VERIFY_CODE_TYPE_FORGET, self::VERIFY_CODE_TYPE_REBIND])) {
            return Response::json(AppCommonResponse::createAppCommonResponse(401, '参数错误'));
        }

        $verify = $this->verifyCode($type, $phone);
        if (!empty($verify)) {
            return Response::json(AppCommonResponse::createAppCommonResponse(401, '验证码已发送，请查看手机短信。'));
        }

        /**
         * 获取验证码情况
         * 1.注册手机    判断手机是否被注册 已被注册则不发送并提示
         * 2.找回密码    判断用户是否存在手机，不存在则不发送并提示
         */
        switch ($type) {
            case self::VERIFY_CODE_TYPE_REGISTRATION: {
                if (!isset($fromWX)) {
                    $account = Account::query()->where("phone", $phone)->first();
                    $smsType = SMSTool::REGIST;
                    if (isset($account)) {
                        return Response::json(AppCommonResponse::createAppCommonResponse(401, '此手机号码已被注册'));
                    }
                }
                break;
            }
            case self::VERIFY_CODE_TYPE_FORGET: {
                $account = Account::query()->where("phone", $phone)->first();
                $smsType = SMSTool::FORGET;
                if (!isset($account)) {
                    return Response::json(AppCommonResponse::createAppCommonResponse(401, '此手机号码还没有注册'));
                }
                break;
            }
        }

        $code = mt_rand(1001, 9999);

        $rest = SMSTool::sendSms($phone,$code,$smsType);
        if (!empty($rest) && $rest->Code == 'OK') {
            $this->verifyCode($type, $phone, $code);
            return Response::json(AppCommonResponse::createAppCommonResponse(0, '发送成功!'));
        } else {
            return Response::json(AppCommonResponse::createAppCommonResponse(500, '服务异常，请稍候重试!'));
        }
    }

    /**
     * 获取用户信息
     * @param Request $request
     * @return mixed
     */
    public function getInfo(Request $request)
    {
        if ($request->_login) {
            $account = $request->_login->account;
            if (!isset($account)) {
                return Response::json(AppCommonResponse::createAppCommonResponse(-1, '获取用户信息失败'));
            }
            $data = $account->appModel();
            return Response::json(AppCommonResponse::createAppCommonResponse(0, '', $data,false));
        } else {
            return Response::json(AppCommonResponse::createAppCommonResponse(-1, '用户未登录'));
        }
    }

    /**
     * 退出登录
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        if (isset($request->_login)) {
            session()->forget('_login');
            setcookie(self::HT_AUTH_TOKEN, '', time() - 3600, '/', 'goodzhibo.com');
        }
        return back();
    }

    /**
     * 图片验证码
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function refreshVerifyCode(Request $request)
    {
        if ($request->input('json',0) == 1){
            return Response::json(array('code' => 0 , 'data'=>captcha_src()));
        }
        if ($request->input('callback')){
            $result['code'] = 0;
            $result['message'] = "ok";
            $result['data'] = captcha_src();
            return response()->jsonp($request->input('callback'), $result);
        }
        return response(captcha_src());
    }

    /**
     * 保存已发送验证码,防止重复发送
     * @param $type
     * @param $phone
     * @param null $code
     * @param bool $del
     * @return null
     */
    private function verifyCode($type, $phone, $code = null, $del = true)
    {
        $key = 'vc-' . $type . '-' . $phone;
        if (isset($code)) {
            Redis::setEx($key, 60 * 10, $code);
        } else {
            $code = Redis::get($key);
            if ($code && $del) {
                Redis::del($key);
            }
            return $code;
        }
    }
}