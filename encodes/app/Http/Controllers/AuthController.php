<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AuthController extends BaseController
{
    const K_LOGIN_SESSION_KEY = '__auth__';
    const K_LOGIN_COOKIE_KEY = '__auth__';

    const ACCESS_INDEX_PUSH = 0;
    const ACCESS_INDEX_PULL = 1;
    const ACCESS_INDEX_RECODE = 2;
    const ACCESS_INDEX_OBS = 3;
    const ACCESS_INDEX_SETTING = 4;

    const ACCESS_NAME_INDEXS = [
        "manager"=>self::ACCESS_INDEX_PUSH, //Push 推流
        "resources"=>self::ACCESS_INDEX_PULL, //Pull 直播源
        "records"=>self::ACCESS_INDEX_RECODE, //Record 录像、集锦
        "obs"=>self::ACCESS_INDEX_OBS, //Stream OBS推流码
        "setting"=>self::ACCESS_INDEX_SETTING, //Setting 推流设置
    ];

    private function getAccessRole(array $array = null) {
        $accessRole = 0;
        if (isset($array) && count($array) > 0) {
            foreach ($array as $index) {
                $accessRole = $accessRole | 1 << $index;
            }
        } else { //如果传入的array为空则认为开放全部权限
            foreach (self::ACCESS_NAME_INDEXS as $name => $index) {
                $accessRole = $accessRole | 1 << $index;
            }
        }
        return $accessRole;
    }

    public static function isAccess($role, $index) {
        return ($role >> $index & 1) == 1;
    }

    private function getUsers() {
        return [
            [
                'account' => '牛逼编码系统',
                'password' => '9e8fa2d95c15baeca38d8d6c2ccae959ac078e61',
                'salt' => '6dUrCKcxVycRs',
                'role' => $this->getAccessRole()
            ],
            [
                'account' => 'leqiuba',
                'password' => '141efbfed999db378707878803b34fb7585f7a6f',//leqiuba88
                'salt' => '6dalIaEsi35Cs',
                'role' => $this->getAccessRole()
            ],
            [
                'account' => 'gg-user',
                'password' => '73b7873465e24754faeb01a5158b0ea97db49b72',
                'salt' => '6dalIdJiO2Vt',
//                'role' => $this->getAccessRole([self::ACCESS_INDEX_PULL])
                'role' => $this->getAccessRole()
            ],
            [
                'account' => 'ricky',
                'password' => '246e7a738db9b835ef16455b1ce01179d653f918',//333333
                'salt' => '6dclIaFsi45Es',
                'role' => $this->getAccessRole()
            ]
        ];
    }

    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            if (!$request->has('account')) {
                View::share('err_msg', '用户名不能为空');
            } elseif (!$request->has('password')) {
                View::share('err_msg', '密码不能为空');
            } else {
                foreach ($this->getUsers() as $user) {
                    if ($request->account == $user['account'] &&
                        sha1($request->password . $user['salt']) == $user['password']
                    ) {
                        session([self::K_LOGIN_SESSION_KEY => $user]);
                        return redirect($request->input('target', '/manager/'));
                    }
                }
            }
            View::share('err_msg', '用户名或密码错误');
        }
        return view('manager.auth');
    }

    public function host(Request $request) {
        return view('layouts.main');
    }

    public static function hasAccess(Request $request, $user) {
        $path = $request->path();
        if (isset($user)) {
            if (strlen($path) > 0 && starts_with("/", $path)) {
                $path = substr($path, 1, strlen($path));
            }
            if (strlen($path) <= 0) return true; //如果是首页，只要登录成功就有权限

            if (is_array($user) && array_key_exists("role", $user)) {
                if (str_contains($path, "/")) {
                    list($name, $other) = explode('/', $request->path(), 2);
                } else {
                    $name = $path;
                }
                $role = $user['role'];
                if (array_key_exists($name, self::ACCESS_NAME_INDEXS)) {
                    $index = self::ACCESS_NAME_INDEXS[$name];
                    return self::isAccess($role, $index);
                }
            }
        }
        return false;
    }
}
