<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/26
 * Time: 17:15
 */

namespace App\Models\Community;


use Illuminate\Database\Eloquent\Model;

/**
 * 社区表
 * Class Community
 * @package App\Models\Community
 */
class CommunityExt extends Model
{
    protected $connection = "heitu";
    protected $table = 't_community_ext';

    public static function topicCountAdd($cid) {
        $ext = self::query()->find($cid);
        if (!isset($ext)) {
            $ext = new CommunityExt();
            $ext->id = $cid;
        }
        $ext->topic_count = is_null($ext->topic_count) ? 1 : $ext->topic_count + 1;
        $ext->save();
    }
}