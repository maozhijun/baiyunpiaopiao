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

class Comment extends Model
{
    const kStatusValid = 1, kStatusUnValid = 2;
    protected $connection = "heitu";
    protected $table = 't_comments';

    public function author() {
        return $this->hasOne(Account::class, 'id', 'uid');
    }

    /**
     * 返回评论json
     * @return mixed
     */
    public function comment2Json() {
        $comment['id'] = $this->id;
        $comment['uid'] = $this->uid;
        $comment['tid'] = $this->tid;
        $comment['floor'] = $this->floor;
        $comment['content'] = $this->content;
        $comment['approval'] = $this->approval;
        $comment['oppose'] = $this->oppose;
        $comment['created_at'] = strtotime($this->created_at);
        $comment['author'] = [];

        $author = $this->author;
        if (isset($author)) {
            $comment['author']['id'] = $author->id;
            $comment['author']['icon'] = $author->icon;
            $comment['author']['nickname'] = $author->nickname;
            $comment['author']['gender'] = $author->gender;
        }

        return $comment;
    }

}