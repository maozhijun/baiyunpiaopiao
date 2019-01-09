<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    const K_ROLE_ADMIN = 1; //超级管理员
    const K_ROLE_MANAGER = 2; //管理员
    const K_ROLE_HEADMAN = 3; //组长
    const K_ROLE_MEMBER = 4; //成员

    const MANAGER_ROLES = [
        self::K_ROLE_ADMIN=>['en'=>'admin', 'ch'=>'超管'],
        self::K_ROLE_MANAGER=>['en'=>'manager', 'ch'=>'主管'],
        self::K_ROLE_HEADMAN=>['en'=>'headman', 'ch'=>'组长'],
        self::K_ROLE_MEMBER=>['en'=>'member', 'ch'=>'成员']
    ];

    public function customers(){
        return $this->hasMany(Customer::class, 'mid', 'id')->where('customers.status', 1)->orderBy('customers.created_at','desc');
    }

    public function customersCount() {
        return count($this->customers);
    }

    public function roleStr() {
        return self::getRolePrexStr($this->role);
    }

    public static function getRolePrexStr($role) {
        if (array_key_exists($role, self::MANAGER_ROLES)) {
            return self::MANAGER_ROLES[$role]['en'];
        }
        return "";
    }

    //
    public static function generateToken()
    {
        $token = uniqid('mg', true);
        $al = Account::query()->where('token', $token)->first();
        if (empty($al)) {
            return $token;
        } else {
            return self::generateToken();
        }
    }

    public static function generateAccount($gid, $role, $account, $nickname, $password) {
        $user = new Account();
        $token = self::generateToken();
        $salt = self::generateSalt();
        $user->role = $role;
        $user->group_id = $gid;
        $user->token = $token;
        $user->expired_at = date_create('7 day');
        $user->name = $nickname;
        $user->account = $account;
        $user->salt = $salt;
        $user->password = sha1($password . $salt);

        return $user;
    }

    public static function generateSalt() {
        return uniqid('tt', true);
    }

    public static function allMembers($role){
        return self::query()->where('status', 1)->where('role', '>', $role)->orderBy('created_at')->get();
    }
}
