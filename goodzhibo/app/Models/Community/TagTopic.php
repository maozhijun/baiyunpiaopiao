<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/3/1
 * Time: 15:53
 */

namespace App\Models\Community;


use Illuminate\Database\Eloquent\Model;

/**
 * 帖子标签
 * Class TagTopic
 * @package App\Models\Community
 */
class TagTopic extends Model
{
    protected $connection = "heitu";
    protected $table = 't_tag_topic';
    public $timestamps = false;
}