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

class Topic extends Model
{
    const kStatusValid = 1, kStatusUnValid = 2;
    const kFromPc = 1, kFromWap = 2, kFromAndroid = 3, kFromIOS = 4;
    const kGood = 1;//精华类型
    const kTop = 1;//置顶
    protected $connection = "heitu";
    protected $table = 't_topics';

    public function author() {
        return $this->hasOne(Account::class, 'id', 'uid');
    }

    public function topic2Json() {
        $topic['id'] = $this->id;
        $topic['title'] = $this->title;
        $topic['content'] = $this->content;
        $topic['uid'] = $this->uid;
        $topic['title'] = $this->title;
        $topic['cid'] = $this->cid;
        $topic['max_floor'] = $this->max_floor;
        $topic['top'] = $this->top;
        $topic['good'] = $this->good;
        $topic['approval'] = $this->approval;
        $topic['oppose'] = $this->oppose;
        $topic['created_at'] = strtotime($this->created_at);
        $topic['author'] = [];

        if (isset($this->author)) {
            $t_author = $this->author;
            $topic['author']['id'] = $this->uid;
            $topic['author']['icon'] = $t_author->icon;
            $topic['author']['nickname'] = $t_author->nickname;
            $topic['author']['gender'] = $t_author->gender;
        }
        return $topic;
    }

}