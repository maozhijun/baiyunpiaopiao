<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/26
 * Time: 18:31
 */

namespace App\Models\Community;


use App\Models\User\Account;
use Illuminate\Database\Eloquent\Model;

class AccountFocus extends Model
{
    const kTypeFocus = 1, kTypeUnFocus = 2;//1：关注，2：取消关注
    protected $connection = "heitu";
    protected $table = 't_account_focus';

    public function account() {
        return $this->hasOne(Account::class, 'id', 'uid');
    }

    public function f_account() {
        return $this->hasOne(Account::class, 'id', 'f_uid');
    }

}