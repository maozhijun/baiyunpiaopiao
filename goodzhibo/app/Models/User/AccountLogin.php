<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class AccountLogin extends Model
{
    //
    const K_PLATFORM_WAP = 'WAP';
    const K_PLATFORM_WECHAT = 'WECHAT';
    const K_PLATFORM_APP = 'APP';
    const K_PLATFORM_PC = 'PC';

    protected $connection = "heitu";
    protected $primaryKey = "token";
    protected $keyType = "string";

    public static function generateToken()
    {
        $token = uniqid('lg', true);
        $al = AccountLogin::find($token);
        if (empty($al)) {
            return $token;
        } else {
            return self::generateToken();
        }
    }

    public function account()
    {
        return $this->belongsTo('App\Models\User\Account', 'account_id');
    }
}
