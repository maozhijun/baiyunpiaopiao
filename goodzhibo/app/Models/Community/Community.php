<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/26
 * Time: 17:15
 */

namespace App\Models\Community;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * 社区表
 * Class Community
 * @package App\Models\Community
 */
class Community extends Model
{
    const kStatusValid = 1, kStatusDelete = -1;
    protected $connection = "heitu";
    protected $table = 't_communities';

    public function ext() {
        return $this->hasOne(CommunityExt::class, 'id', 'id');
    }

    public function community2Json() {
        $community['id'] = $this->id;
        $community['name'] = $this->name;
        $community['icon'] = $this->icon;
        $community['intro'] = $this->intro;
        $community['od'] = $this->od;

        $ext = $this->ext;
        if (isset($ext)) {
            $community['topic_count'] = $ext->topic_count;
            $community['focus_count'] = $ext->focus_count;
        } else {
            $community['topic_count'] = 0;
            $community['focus_count'] = 0;
        }
        return $community;
    }

    /**
     * 获取社区信息
     * @return array
     */
    public static function getCommunities() {
        $array = self::query()->where('status', self::kStatusValid)->get();
        $communities = [];
        foreach ($array as $community) {
            $communities[] = $community->community2Json();
        }
        return $communities;
    }

    /**
     * 静态化社区json
     */
    public static function staticCommunities() {
        $communities = Community::getCommunities();
        Storage::disk('public')->put('/static/m/v100/app/communities.json', json_encode($communities));
    }

}