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

class CommunityMember extends Model
{
    const op_focus = 1, op_un_focus = 2;
    protected $connection = "heitu";
    protected $table = 't_community_member';

    /**
     * 用户信息
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function author() {
        return $this->hasOne(Account::class, 'id', 'uid');
    }

    /**
     * 社区
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function community() {
        return $this->hasOne(Community::class, 'id', 'tid');
    }

}