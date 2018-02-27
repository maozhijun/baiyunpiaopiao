<?php

namespace App\Models\User;

use App\Models\AccountLogin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class Account extends Model
{
    //
    public $connection = "heitu";

    protected $unReadCount = NULL;
    protected $unPayCount = NULL;

    const NEW_REG_ACCOUNT_PREFIX = "NEW_REG_ACCOUNT_PREFIX_";
    const SMS_SEND = 1, SMS_UN_SEND = 0;

    public static function databaseString()
    {
        return env('DB_DATABASE_USER');
    }

    public function login() {
        return $this->hasMany(AccountLogin::class, 'account_id', 'id');
    }

    /**
     * 最后登录
     * @return mixed
     */
    public function lastLogin() {
        return $this->login()->orderBy('updated_at', 'desc')->first();
    }

    public function lastLoginTime() {
        $lastLogin = $this->lastLogin();
        if (isset($lastLogin)) {
            return $lastLogin->updated_at;
        }
        return "";
    }

    public function appModel(){
        $iconString = '';
        if(isset($this->icon)){
            if (strpos($this->icon, '//') == 0)
                $iconString = 'http:'.$this->icon;
            else
                $iconString = $this->icon;
        }
        $model = array(
            'email'=>isset($this->email)?$this->email:'',
            'gender'=>isset($this->gender)?$this->gender:0,
            'icon'=>$iconString,
            'nickname'=>isset($this->nickname)?$this->nickname:'',
            'phone'=>isset($this->phone) ? ''.$this->phone : ''
        );
        return $model;
    }

    public function getNickname() {
        $nickname = $this->nickname;
        if (empty($nickname)) {
            return "";
        }
        if (preg_match('/^1[34578]\d{9}$/', $nickname)) {
            return (substr($nickname, 0, 3) . '***' . substr($nickname, strlen($nickname) - 4));
        }
        return $nickname;
    }

    /**
     * 标记新注册用户。
     * 在redis中增加一个标记。
     * @param $account_id
     */
    public static function markNewRegAccount($account_id) {
        $key = self::NEW_REG_ACCOUNT_PREFIX . $account_id;
        Redis::set($key, "true");
    }

    /**
     * 删除redis的新用户标记。
     * 登录后就删除标记。
     * @param $account_id
     */
    public static function delNewAccountMark($account_id) {
        $key = self::NEW_REG_ACCOUNT_PREFIX . $account_id;
        Redis::del($key);
    }

    /**
     * 判断是否新注册用户。
     * @param $account_id
     * @return mixed
     */
    public static function isNewRegAccount($account_id) {
        $key = self::NEW_REG_ACCOUNT_PREFIX . $account_id;
        return Redis::exists($key);
    }

}
