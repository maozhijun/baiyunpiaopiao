<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/8
 * Time: 14:55
 */

namespace App\Models\Shop\Business;


use App\Http\Controllers\Business\GoodsArticlesController;
use App\Models\Match\BasketMatch;
use App\Models\Match\BasketOdds;
use App\Models\Match\Match;
use App\Models\Match\Odd;
use App\Models\Shop\Pc\PcArticleSet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoodsArticles extends Model
{
    const kStatusNonPublish = 0;//未发布
    const kStatusPublished = 1;//已经发布
    const kStatusWaitAudit = 3;//等待审核，只有不中退款级别的推荐才会有待审这个状态。
    const kStatusExpire = 2;//过期
    const kStatusRefuse = -1;//审核不通过

    const kHitWinHalf = 31;//红半
    const kHitWin = 30;//红单
    const kHitDraw = 20;//走水
    const kHitLoseHalf = 11;//黑半
    const kHitLose = 10;//黑单
    const kHitUnknown = 0;//未统计
    const kHitError = -1;//数据异常

    const kResultUp = 1;//上盘、大球、主胜
    const kResultMiddle = 2;//-、-、平局
    const kResultDown = 3;//下盘、小球、客胜

    const kHideMatch = 1;

    const kTypeAsian = 1;
    const kTypeOU = 2;
    const kTypeChina = 3;
    const kTypeBettingBall = 4;//篮球竞彩大小分

    const kLevelNormal = 0, kLevelImportant = 1, kLevelHit = 2;//0：普通，1：重心，2：不中退款
    const dayImportTotal = 2, dayHitTotal = 2;//不中退款 每天只能发2条， 重心推荐每天只能发2条
    const kFreeCheckAll = 0, kFreeCheckFans = 1, kFreeCheckBuy = 2;//免费可见设置字段，0：全部可见，1：粉丝可见，2购买过可见。
    const kCourtFull = 0, kCourtHalf = 1;//0：全场，1：半场。默认全场
    const kSportFootball = 1, kSportBasketball = 2;//1：足球，2：篮球，其他待添加。

    const kRankTypeHot = "hot"; //按热度,wap首页
    const kRankTypeProfit = "profit"; //按盈利率排序
    const kRankTypeWin = "win"; //按胜率排序
    const kRankTypePrice = "price"; //按价格排序
    const kRankTypePublish = "publish"; //按发表时间排序

    public function package()
    {
        return $this->belongsToMany('App\Models\Shop\Business\GoodsPackage', 'goods_article_packages', 'article_id', 'package_id');
    }

    public function match()
    {
        return $this->hasOne('App\Models\Match\Match', 'id', 'match_id');
    }

    public function basketMatch() {
        return $this->hasOne('App\Models\Match\BasketMatch', 'id', 'match_id');
    }

    public function basketBetting() {
        return $this->hasOne('App\Models\Match\SportBettingBasket', 'mid', 'match_id');
    }

    public function match_cn()
    {
        return $this->hasOne('App\Models\Match\SportBetting', 'mid', 'match_id');
    }

    public function merchant()
    {
        return $this->belongsTo('App\Models\Shop\Business\Merchant', 'mch_id');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Shop\Business\Order', 'goods_id', 'id');
    }

    public function tags() {
        return $this->belongsToMany(ArticleTag::class, 'article_tag_relations', 'goods_id', 'tag_id')->wherePivot('type', ArticleTagRelation::TYPE_ARTICLE);
    }

    public function pc_set() {
        return $this->hasOne(PcArticleSet::class, 'id', 'id');
    }

    /**
     * 获取使用套餐解锁的用户
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderArticles()
    {
        return $this->hasMany('App\Models\Shop\Business\OrderArticles', 'article_id');
    }

    public function getMatch() {
        $sport = $this->sport;
        $match = null;
        switch ($sport) {
            case self::kSportFootball:
                $match = $this->match;
                break;
            case self::kSportBasketball:
                $match = $this->basketMatch;
                break;
        }
        return $match;
    }

    public function leagueName() {
        $match = $this->getMatch();
        if (isset($match)) {
            return isset($match->league) ? $match->league->name : $match['win_lname'];
        }
        return "";
    }

    public function matchHname() {
        $match = $this->getMatch();
        if (isset($match)) {
            return $match->hname;
        }
        return "";
    }

    public function matchAname() {
        $match = $this->getMatch();
        if (isset($match)) {
            return $match->aname;
        }
        return "";
    }

    public function statusCN()
    {
        switch ($this->status) {
            case self::kStatusNonPublish:
                return "未发布";
            case self::kStatusPublished:
                return "已发布";
            case self::kStatusExpire:
                return "已过期";
            default:
                return "其他";
        }
    }

    public function typeCN()
    {
        if ($this->sport == self::kSportFootball) {
            switch ($this->type) {
                case self::kTypeChina:
                    return $this->handicap == 0 ? "竞彩" : '竞彩让球';
                case self::kTypeOU:
                    return "亚盘大小";
                case self::kTypeAsian:
                    return "亚盘让球";
                default:
                    return "其他";
            }
        } elseif ($this->sport == self::kSportBasketball) {
            switch ($this->type) {
                case self::kTypeBettingBall:
                    return "竞彩大小";
                case self::kTypeChina:
                    return '竞彩让分';
                case self::kTypeOU:
                    return "亚盘大小";
                case self::kTypeAsian:
                    return "亚盘让分";
                default:
                    return "其他";
            }
        }
    }

    public function webTypeCN()
    {
        if ($this->sport == self::kSportFootball) {
            switch ($this->type) {
                case self::kTypeChina:
                    return $this->handicap == 0 ? "竞彩" : '竞彩让球';
                case self::kTypeOU:
                    return "大小球";
                case self::kTypeAsian:
                    return "亚盘让球";
                default:
                    return "其他";
            }
        } elseif ($this->sport == self::kSportBasketball) {
            switch ($this->type) {
                case self::kTypeBettingBall:
                    return "竞彩大小";
                case self::kTypeChina:
                    return '竞彩让分';
                case self::kTypeOU:
                    return "亚盘大小";
                case self::kTypeAsian:
                    return "亚盘让分";
                default:
                    return "其他";
            }
        }
    }

    public function wapTypeCN()
    {
        if ($this->sport == self::kSportFootball) {
            switch ($this->type) {
                case self::kTypeChina:
                    return "竞彩";
                case self::kTypeOU:
                    return "大小球";
                case self::kTypeAsian:
                    return "亚盘";
                default:
                    return "其他";
            }
        } elseif ($this->sport == self::kSportBasketball) {
            switch ($this->type) {
                case self::kTypeBettingBall:
                    return "竞彩大小";
                case self::kTypeChina:
                    return '竞彩让分';
                case self::kTypeOU:
                    return "亚盘大小";
                case self::kTypeAsian:
                    return "亚盘让分";
                default:
                    return "其他";
            }
        }

    }

    public function upNameCN()
    {
        switch ($this->type) {
            case self::kTypeChina:
                return "主胜";
            case self::kTypeOU:
            case self::kTypeBettingBall:
                return "大" . ($this->sport == 1 ? '球' : '分');
            case self::kTypeAsian:
                $match = $this->getMatch();
                if (isset($match)) {
                    return $match->hname;
                } else {
                    return '-';
                }
        }
    }

    public function middleNameCN()
    {
        switch ($this->type) {
            case self::kTypeChina:
                return "平手" . ($this->handicap > 0 ? '(' . $this->handicap . ')' : '');
            case self::kTypeOU:
            case self::kTypeAsian:
                return "盘口";
        }
    }

    public function downNameCN()
    {
        switch ($this->type) {
            case self::kTypeChina:
                return "主负";
            case self::kTypeOU:
            case self::kTypeBettingBall:
                return "小" . ($this->sport == 1 ? '球' : '分');
            case self::kTypeAsian:
                $match = $this->getMatch();
                if (isset($match)) {
                    return $match->aname;
                } else {
                    return '-';
                }
        }
    }

    public function upValueCN()
    {
        return $this->up;
    }

    public function middleValueCN()
    {
        switch ($this->type) {
            case self::kTypeChina:
                return $this->middle;
            case self::kTypeOU:
            case self::kTypeAsian:
                return $this->handicap;
        }
    }

    public function downValueCN()
    {
        return $this->down;
    }

    /**
     * 专家后台类型的中文
     * @return string
     */
    public function sportClass() {
        $sportClass = "";
        switch ($this->sport) {
            case self::kSportFootball: $sportClass = "blue";break;
            case self::kSportBasketball: $sportClass = "orange";break;
        }
        return $sportClass;
    }

    /**
     * 专家后台类型的中文
     * @return string
     */
    public function sportCnBusiness() {
        $sportCn = "";
        switch ($this->sport) {
            case self::kSportFootball: $sportCn = "足";break;
            case self::kSportBasketball: $sportCn = "篮";break;
        }
        return $sportCn;
    }

    /**
     * 全场/半场
     * @return string
     */
    public function courtCn() {
        $courtCn = "";
        switch ($this->court) {
            case self::kCourtFull: $courtCn = "全场"; break;
            case self::kCourtHalf: $courtCn = "半场"; break;
        }
        return $courtCn;
    }

    public function getHitText()
    {
        $hit = $this->hit;
        switch ($hit) {
            case self::kHitWinHalf:
            case self::kHitWin:
                return "红单";
            case self::kHitDraw:
                return "走水";
            case self::kHitLoseHalf:
            case self::kHitLose:
                return "黑单";
            case self::kHitError:
                return "异常";
            default:
                return "";
        }
    }

    public function typeCss()
    {
        switch ($this->type) {
            case self::kTypeAsian:
                return "asia";
            case self::kTypeOU:
                return "goal";
            case self::kTypeChina:
                if ($this->handicap === 0 || $this->handicap == '0') {
                    return 'europe';
                } else {
                    return 'china';
                }
        }
    }

    public function sportCss()
    {
        $sportCss = "";
        switch ($this->sport) {
            case self::kSportFootball:
                $sportCss = "football";
                break;
            case self::kSportBasketball:
                $sportCss = "basketball";
                break;
        }
        return $sportCss;
    }

    public function webTypeCss() {
        $sport = $this->sport;
        switch ($sport) {
            case self::kSportFootball:
                return $this->typeCss();
            case self::kSportBasketball:
                switch ($this->type) {
                    case self::kTypeAsian:
                        return "bas_asia";
                    case self::kTypeOU:
                        return "bas_goal";
                    case self::kTypeChina:
                        return 'bas_lotAsia';
                    case self::kTypeBettingBall:
                        return 'bas_lotGoal';
                }
                break;
        }
    }

    public function hitCss()
    {
        switch ($this->hit) {
            case self::kHitWinHalf:
            case self::kHitWin:
                return "win";
            case self::kHitDraw:
                return "draw";
            case self::kHitLose:
            case self::kHitLoseHalf:
                return "lose";
            case self::kHitError:
                return "other";
            default:
                return '';
        }
    }

    /**
     * 获取结果水位
     * @return mixed|string
     */
    public function getResultOdd()
    {
        $type = $this->type;
        if ($type != self::kTypeChina) {
            $result = $this->result;
            return $this->resultOdd($result);
        } else {
            $result = $this->result;
            $result1 = $this->result1;

            $text = $this->resultOdd($result);
            $text1 = $this->resultOdd($result1);

            if (empty($text1)) {
                return $text;
            } else {
                return $text . " , " . $text1;
            }
        }
    }

    /**
     * 获取结果水位
     * @param $result
     * @return mixed|string
     */
    protected function resultOdd($result)
    {
        switch ($result) {
            case self::kResultUp:
                return $this->up;
            case self::kResultMiddle:
                return $this->middle;
            case self::kResultDown:
                return $this->down;
            default:
                return "";
        }
    }

    /**
     * 获取结果 中文
     * @return string
     */
    public function getResultCn()
    {
        $type = $this->type;//1让球，2大小球，3竞彩
        switch ($type) {
            case self::kTypeAsian://让球
            case self::kTypeOU://大小球
            case self::kTypeBettingBall://篮球，竞彩大小
                return $this->resultCn($this->result);
                break;
            case self::kTypeChina://竞彩
                $text = $this->resultCn($this->result);
                $text1 = $this->resultCn($this->result1);
                if (empty($text1)) {
                    return $text;
                }
                return $text . " , " . $text1;
                break;
            default:
                return "";
        }
    }


    public function getMatchesSms()
    {
        $match = $this->getMatch();
        if (!isset($match)) {
            return "";
        }
        $leagueName = $this->sport == self::kSportFootball ? $match->league->name : $match->win_lname;
        switch ($this->type) {
            case self::kTypeAsian://让球
            case self::kTypeOU://大小球
            case self::kTypeBettingBall://篮球；竞彩大小分
            {
                return substr($match->time, 5, 11) . ' ' . $leagueName . ' ' . $match->hname . 'VS' . $match->aname;
            }
            case self::kTypeChina://让球
            {
                return $match->hname . 'VS' . $match->aname;
            }
        }
    }

    public function getResultSms() {
        if ($this->sport == self::kSportFootball) {
            return $this->getResultSmsFootball();
        } elseif ($this->sport == self::kSportBasketball) {
            return $this->getResultSmsBasketball();
        }
        return "";
    }

    /**
     * 篮球推荐结果中文
     * @return string
     */
    public function getResultSmsBasketball()
    {
        $match = $this->basketMatch;
        switch ($this->type) {
            case self::kTypeAsian://亚盘让分
            {
                if (!isset($match)) {
                    return "";
                }
                switch ($this->result) {
                    case self::kResultUp: {
                        $text = BasketOdds::panKouText($this->handicap);
                        return $match->hname . ' ' . $text;
                    }
                    case self::kResultDown: {
                        $text = BasketOdds::panKouText($this->handicap * -1);
                        return $match->aname . ' ' . $text;
                    }
                }
                break;
            }
            case self::kTypeOU://亚盘大小
            {
                switch ($this->result) {
                    case self::kResultUp: {
                        return '大' . round($this->handicap, 2) . '分';
                    }
                    case self::kResultDown: {
                        return '小' . round($this->handicap, 2) . '分';
                    }
                }
                break;
            }
            case self::kTypeBettingBall://竞彩大小
            {
                $betting = $this->basketBetting;
                if (!isset($betting)) {
                    return "";
                }
                switch ($this->result) {
                    case self::kResultUp: {
                        return '竞彩 ' . $betting->week . $betting->num . '场 大' . round($this->handicap, 2) . '分';
                    }
                    case self::kResultDown: {
                        return '竞彩 ' . $betting->week . $betting->num . '场 小' . round($this->handicap, 2) . '分';
                    }
                }
                break;
            }
            case self::kTypeChina://竞彩让分
            {
                $betting = $this->basketBetting;
                if (!isset($betting)) {
                    return "";
                }
                if ($this->handicap > 0) {
                    $handicap = " 让分+" . (($this->handicap * 100 % 100 == 0) ? round($this->handicap) : round($this->handicap, 2));
                } elseif ($this->handicap < 0) {
                    $handicap = " 让分" . (($this->handicap * 100 % 100 == 0) ? round($this->handicap) : round($this->handicap, 2));
                } else {
                    $handicap = " 不让分";
                }
                $result = '竞彩 ' . $betting->week . $betting->num . '场' . $handicap;
                switch ($this->result) {
                    case self::kResultUp: {
                        $result .= ' 主胜';
                        break;
                    }
                    case self::kResultMiddle: {
                        $result .= ' 平局';
                        break;
                    }
                    case self::kResultDown: {
                        $result .= ' 主负';
                        break;
                    }
                }
                return $result;
            }
        }
        return '';
    }

    /**
     * 足球推荐结果中文
     * @return string
     */
    public function getResultSmsFootball()
    {
        $court = $this->court == 1 ? '（半场）' : '';
        switch ($this->type) {
            case self::kTypeAsian://让球
            {
                if (!isset($this->match)) {
                    return "";
                }
                switch ($this->result) {
                    case self::kResultUp: {
                        $text = Odd::panKouText($this->handicap) . $court;
                        return $this->match->hname . ' ' . $text;
                    }
                    case self::kResultDown: {
                        $text = Odd::panKouText($this->handicap * -1) . $court;
                        return $this->match->aname . ' ' . $text;
                    }
                }
                break;
            }
            case self::kTypeOU://大小球
            {
                switch ($this->result) {
                    case self::kResultUp: {
                        return '大' . round($this->handicap, 2) . '球' . $court;
                    }
                    case self::kResultDown: {
                        return '小' . round($this->handicap, 2) . '球' . $court;
                    }
                }
                break;
            }
            case self::kTypeChina://竞彩
            {
                if (!isset($this->match_cn)) {
                    return "";
                }
                if ($this->handicap > 0) {
                    $handicap = " 让球+" . (($this->handicap * 100 % 100 == 0) ? round($this->handicap) : round($this->handicap, 2));
                } elseif ($this->handicap < 0) {
                    $handicap = " 让球" . (($this->handicap * 100 % 100 == 0) ? round($this->handicap) : round($this->handicap, 2));
                } else {
                    $handicap = " 不让球";
                }
                $result = '竞彩 ' . $this->match_cn->week . $this->match_cn->num . '场' . $handicap;
                switch ($this->result) {
                    case self::kResultUp: {
                        $result .= ' 主胜';
                        break;
                    }
                    case self::kResultMiddle: {
                        $result .= ' 平局';
                        break;
                    }
                    case self::kResultDown: {
                        $result .= ' 主负';
                        break;
                    }
                }
                if (isset($this->result1)) {
                    switch ($this->result1) {
                        case self::kResultUp: {
                            $result .= '|主胜';
                            break;
                        }
                        case self::kResultMiddle: {
                            $result .= '|平局';
                            break;
                        }
                        case self::kResultDown: {
                            $result .= '|主负';
                            break;
                        }
                    }
                }
                return $result;
            }
        }
        return '';
    }

    /**
     * 中文结果
     * @param $result
     * @return string
     */
    protected function resultCn($result)
    {
        $text = "";
        if ($result == self::kResultUp) {
            $text = $this->upNameCN();
        } else if ($result == self::kResultMiddle) {
            $text = "平局";
        } else if ($result == self::kResultDown) {
            $text = $this->downNameCN();
        }
        return $text;
    }

    /**
     * 盘口中文
     * @param $isKeepMatchHA boolean 是否保持比赛的主客场视角 true 以主队为视角看受让盘 false 以推荐球队的视角看受让盘
     * @return string
     */
    public function getHandicapCn($isKeepMatchHA = false)
    {
        $type = $this->type;
        $sport = $this->sport;
        if ($type == self::kTypeAsian) {
            if ($isKeepMatchHA) {
                if ($sport == self::kSportFootball) {
                    return Odd::panKouText($this->handicap);
                }
                return BasketOdds::panKouText($this->handicap);
            } else {
                if ($sport == self::kSportFootball) {
                    return Odd::panKouText($this->handicap, $this->result == 3);
                }
                return BasketOdds::panKouText($this->handicap, $this->result == 3);
            }
        } else if ($type == self::kTypeOU || $type == self::kTypeBettingBall) {//大小球
            $msg = $this->sport == self::kSportFootball ? '球' : '分';
            if ($this->handicap * 100 % 100 == 0) {
                return round($this->handicap) . $msg;
            }
            $handicap = round($this->handicap, 2);
            if ($handicap * 100 % 50 == 0) {//尾数为0.5的直接返回
                return $handicap . $msg;
            }
            $tempHandicap = round($this->handicap);//四舍五入
            $intHandicap = floor($this->handicap);//取整
            if ($tempHandicap == $intHandicap) {//比较 四舍五入 与 取整大小，尾数为 0.25 则为相同
                return $intHandicap . '/' . $intHandicap . '.5' . $msg;
            } else {//否则尾数为0.75
                return $intHandicap . '.5/' . ($intHandicap + 1) . $msg;
            }
            return $handicap;
        } else if ($type == self::kTypeChina) {//竞彩
            if ($this->sport == self::kSportFootball) {
                $handicap = (int) $this->handicap;
            } else {
                $handicap = $this->handicap;
                $handicap = ceil($handicap) == $handicap ? (int) $handicap : round($handicap, 1);
            }
            if ($handicap > 0) {
                return "+" . $handicap;
            } else if ($handicap == 0) {
                return 0;
            } else {
                return $handicap;
            }
        }

        return "";
    }

    /**
     * 前端盘口显示
     * @return mixed|string
     */
    public function getHandicapCnWap()
    {
        $sport = $this->sport;
        $type = $this->type;
        if ($sport == self::kSportFootball) {
            if ($type == self::kTypeAsian) {
                return Odd::panKouText($this->handicap);
            } else if ($type == self::kTypeOU) {//大小球
                if ($this->handicap * 100 % 100 == 0) {
                    return round($this->handicap);
                }
                $handicap = round($this->handicap, 2);
                if ($handicap * 100 % 50 == 0) {//尾数为0.5的直接返回
                    return $handicap;
                }
                $tempHandicap = round($this->handicap);//四舍五入
                $intHandicap = floor($this->handicap);//取整
                if ($tempHandicap == $intHandicap) {//比较 四舍五入 与 取整大小，尾数为 0.25 则为相同
                    return $intHandicap . '/' . $intHandicap . '.5';
                } else {//否则尾数为0.75
                    return $intHandicap . '.5/' . ($intHandicap + 1);
                }
                return $handicap;
            } else if ($type == self::kTypeChina) {//竞彩
                $handicap = $this->handicap;
                if ($handicap > 0) {
                    return "+" . $handicap;
                } else if ($handicap == 0) {
                    return "不让球";
                } else {
                    return $handicap;
                }
            }
        } elseif ($sport == self::kSportBasketball) {
            if ($type == self::kTypeAsian) {
                return BasketOdds::panKouText($this->handicap);
            } else if ($type == self::kTypeOU) {//大小球
                return (($this->handicap * 100 % 100 == 0) ? round($this->handicap) : round($this->handicap, 2));
            } else if ($type == self::kTypeChina) {//竞彩
                $handicap = $this->handicap;
                if ($handicap > 0) {
                    return "+" . $handicap;
                } else if ($handicap == 0) {
                    return "不让分";
                } else {
                    return $handicap;
                }
            } elseif ($type == self::kTypeBettingBall) {
                return (($this->middle * 100 % 100 == 0) ? round($this->middle) : round($this->middle, 2));
            }
        }
        return "";
    }

    /**
     * 是否解锁了文章
     * @param $account_id
     * @return bool
     */
    public function isOpen($account_id)
    {
        //先判断是否使用套餐
        $count = $this->orderArticles()->where("account_id", $account_id)->count();
        if ($count > 0) return true;
        //是否单独购买单场
        return $this->orders()->where("account_id", $account_id)->where("status", Order::kPayStatusSuccess)->where("type")->count() > 0;
    }

    public function getLink()
    {
        return "https://shop.liaogou168.com/article/detail/$this->id";
    }

    /**
     * 发送套餐用户
     * @param $package_id
     * @return int
     */
    public function sendPackageMemberCount($package_id)
    {
        return OrderArticles::query()->where('article_id', $this->id)->where('package_id', $package_id)->count();
    }

    /**
     * 单场购买用户
     * @return int
     */
    public function singleCount()
    {
        return OrderArticles::query()->where('article_id', $this->id)->whereNull('package_id')->count();
    }

    public function getReasonHtml()
    {
        $reason = $this->reason;
        if (empty($reason)) {
            return $reason;
        }
        //str_replace ($search, $replace, $subject, &$count = null) {}
        return preg_replace("/[\n|\r]/", "<br/>", $reason);
    }

    /**
     * 购买此单场的人数
     * @return mixed
     */
    public function getSingleBuyCount()
    {
        return $this->orders()->where("type", Order::kGoodsTypeArticle)->where("status", Order::kPayStatusSuccess)->count();
    }

    public function getSingleTotalFee() {
        $query = Order::query()->where("type", Order::kGoodsTypeArticle)->where("status", Order::kPayStatusSuccess);
        $query->where('goods_id', $this->id)->where('refund', '<>', Order::kRefund);
        $query->selectRaw('sum(total_fee) as total_fee');
        $total = $query->first();
        if (isset($total)) {
            return $total->total_fee;
        }
        return 0;
    }

    public function canBuy()
    {
//        return strtotime($this->start_at . ' - 15 minutes') > time();
        //改成上半场内都能投注
        $match = $this->getMatch();
        if (!is_null($match) && ($match->isBeforeHalf())){
            return true;
        } else {
            return false;
        }
    }

    /**
     * 判断登录用户是否能查看
     * @param $login
     * @return bool
     */
    public function canSee($login)
    {
        if (!$login && !isset($login->account)) {
            return false;
        }
        $account_id = $login->account->id;
        $query = OrderArticles::query()->where("article_id", $this->id)->where("account_id", $account_id);
        return $query->count() > 0;
    }

    /**
     * 首页推荐
     * @param int $type
     * @param int $size
     * @param int $account_id
     * @return array
     */
    public static function indexRecommendArticles($type = null, $size = 0, $account_id = null, $sport = -1, $court = -1, $rankType = self::kRankTypeProfit) {
        if (isset($type)) {
            $types = array($type);
        } else {
            $types = null;
        }
        return self::indexRecommendArticles2($types, $size, $account_id, $sport, $court, $rankType);
    }

    /**
     * 首页推荐
     * @param array $types
     * @param int $size
     * @param int $account_id
     * @return array
     */
    public static function indexRecommendArticles2($types = null, $size = 0, $account_id = null, $sport = -1, $court = -1, $rankType = self::kRankTypeProfit)
    {
        //主页赛事推荐  排序：获取今天有发布推荐的达人，按命中率排序 且每个达人只出一次
        $query = self::indexRecommendArticlesNewQuery($types, false, true, $account_id, $sport, $court, $rankType);
        if ($size > 0) {
            $query->take(max($size * 2, 10));
        }
        $ms = $query->get();

        $result = [];
        $mid_array = [];
        $tempResult = [];
        foreach ($ms as $m) {
            $articles = $m->merchant->indexArticlesByTop2($types, $account_id, $sport, $court);
            if (isset($articles) && $articles->canBuy()) {
                if ($articles["top"] == 1 && count($result) < $size) {
                    $result[] = ["merchant" => $m->merchant, "articles" => $articles];
                } else if (count($tempResult) < 6) { //随机筛选的专家最多6个
                    $tempResult[] = ["merchant" => $m->merchant, "articles" => $articles];
                }
            }
        }
        $eff_count = count($result);
        //获取除去置顶 剩下部分的随机推荐
        if ($size - $eff_count > 0 && count($tempResult) > 0) {
            $randomKeys = array_rand($tempResult, min($size - $eff_count, count($tempResult)));
            if (!is_array($randomKeys)){
                $randomKeys = array($randomKeys);
            }
            foreach ($randomKeys as $key) {
                $result[] = $tempResult[$key];
            }
        }
        //获取已经在列表里的专家id
        foreach ($result as $temp) {
            $mid_array[] = $temp["merchant"]["id"];
        }

        $eff_count = count($result);
        //如果不够三个则补满三个。取过去24小时有发推荐的达人，按命中率排序  开始
        if ($size > 0 && $size > $eff_count) {
            $more_query = self::indexRecommendArticlesQuery($types, '>', $sport, $court);
            if (count($mid_array) > 0) {
                $more_query->whereNotIn("goods_articles.mch_id", $mid_array);
            }
            $more_query->where('goods_articles.start_at', '>=', date('Y-m-d H:i', strtotime('-1 days')));
            $more_query->take($size - $eff_count);
            $ms = $more_query->get();
            foreach ($ms as $m) {
                $merchant = $m->merchant;
                $articles = $merchant->oldPublishArticles2($types, $sport, $court);
                if (isset($articles)) {
                    $result[] = ["merchant" => $merchant, "articles" => $articles];
                }
            }
        }
        //如果不够三个则补满三个。取过去24小时有发推荐的达人，按命中率排序  结束
        return ["recommends"=>$result, 'eff_count'=>$eff_count];
    }

    /**
     * @param $types array
     * @param string $eq
     * @param int $hit
     * @param bool $byElite
     * @return $this
     */
    protected static function indexRecommendArticlesQuery($types, $eq = '=', $hit = 0, $byElite = false, $sport = GoodsArticles::kSportFootball, $court = GoodsArticles::kCourtFull) {
        switch ($sport) {
            case GoodsArticles::kSportFootball:
                $query = MerchantFootballStatistics::query();
                $tableName = "merchant_football_statistics";
                break;
            case GoodsArticles::kSportBasketball:
                $query = MerchantBasketballStatistics::query();
                $tableName = "merchant_basketball_statistics";
                break;
            default:
                $query = MerchantStatistics::query();
                $tableName = "merchant_statistics";
                break;
        }
        $query->join("goods_articles", function ($query) use ($tableName, $eq, $hit, $sport, $court) {
            $query->on("$tableName.id", "=", "goods_articles.mch_id");
            $query = GoodsArticles::onSportAndCourtQuery($query, $sport, $court);
            $query->where("goods_articles.status", self::kStatusPublished);
            $query->where("goods_articles.hit", $eq, $hit);
        });
        if (isset($types) && count($types) > 0) {
            $query->whereIn("goods_articles.type", $types);
        }
        $query->groupBy("$tableName.id");
        if ($byElite) {
            $query->orderByRaw('max(goods_articles.elite) desc');
        }
        $query->orderByRaw('max(lately_odd) desc, max(lately_max_profit_hit) desc');
        $query->selectRaw("$tableName.id");
        return $query;
    }

    /**
     * @param $types array
     * @param bool $hit      是否结算，true：结算，false：未结算
     * @param bool $odTop    是否根据置顶排序。
     * @param $account_id    登录用户id
     * @return $this
     */
    protected static function indexRecommendArticlesNewQuery($types, $hit = false, $odTop = false, $account_id = null, $sport = GoodsArticles::kSportFootball, $court = GoodsArticles::kCourtFull, $rankType = self::kRankTypeProfit) {
        switch ($sport) {
            case GoodsArticles::kSportBasketball:
                $query = MerchantBasketballStatistics::query();
                $tableName = "merchant_basketball_statistics";
                break;
            case GoodsArticles::kSportFootball:
                $query = MerchantFootballStatistics::query();
                $tableName = "merchant_football_statistics";
                break;
            default:
                $query = MerchantStatistics::query();
                $tableName = "merchant_statistics";
                break;
        }
        $query->join("goods_articles", function ($joinQuery) use ($tableName, $hit, $sport, $court) {
            $joinQuery->on("$tableName.id", "=", "goods_articles.mch_id");
            $joinQuery->where("goods_articles.status", self::kStatusPublished);//发布
            $joinQuery->where("goods_articles.price", '>', 0);//收费

            $joinQuery = GoodsArticles::onSportAndCourtQuery($joinQuery, $sport, $court);

            if ($hit) {
                $joinQuery->where("goods_articles.hit", '>', 0);
            } else {
                $joinQuery->where(function ($orQuery) {
                    $orQuery->whereNull("goods_articles.hit");
                    $orQuery->orWhere("goods_articles.hit", 0);
                });
            }
            $joinQuery->where("goods_articles.start_at", '>', date('Y-m-d H:i', strtotime('-47 minutes')));//上半场已完结的不出现
        });
        $query->where("goods_articles.start_at", ">=", date('Y-m-d H:i', strtotime('-1 days')));
        if (isset($account_id)) {
            $query->whereNotExists(function ($existsQuery) use ($account_id) {
                $existsQuery->select(DB::raw("1"));
                $existsQuery->from("order_articles");
                $existsQuery->where("order_articles.account_id", $account_id);
                $existsQuery->whereRaw("order_articles.article_id = goods_articles.id");
            });
        }
        if (isset($types) && count($types) > 0) {
            $query->whereIn("goods_articles.type", $types);
        }
        $query->groupBy("$tableName.id");
        if ($odTop) {
            $query->orderByRaw('max(goods_articles.top * (1 + goods_articles.elite)) desc');
        }
        switch ($rankType) {
            case self::kRankTypePrice:
                $rankRaw = "max(goods_articles.price) desc, max(lately_max_profit_hit) desc";
                break;
            case self::kRankTypeWin:
                $rankRaw = "max(lately_hit/(lately_hit + lately_lose)) desc, max(lately_max_profit_hit) desc";
                break;
            case self::kRankTypePublish:
                $rankRaw = "max(goods_articles.publish_at) desc, max(lately_max_profit_hit) desc";
                break;
            case self::kRankTypeProfit:
            default:
                $rankRaw = "max(lately_odd) desc, max(lately_max_profit_hit) desc";
                break;
        }
        $query->orderByRaw($rankRaw);
        $query->selectRaw("$tableName.id");
        return $query;
    }

    public function getTitle() {
        $title = $this->title;
        $type = $this->type;
        if ($type == self::kTypeChina) {
            $match = $this->getMatch();
            if (isset($match)) {
                $num = $match->betting_num;
                $title = empty($num) ? $title : "【" . $num . "】" . $title;
            }
        }
        return $title;
    }

    /**
     * 竞彩num
     * @return string
     */
    public function getBettingNum() {
        $type = $this->type;
        if ($type == self::kTypeChina || $type == self::kTypeBettingBall) {
            $match = $this->getMatch();
            if (isset($match)) {
                return $match->betting_num;
            }
        }
        return "";
    }

    public static function businessArticlesQuery($mch_id) {
        $query = GoodsArticles::query()->where("mch_id", $mch_id);//获取所有推荐
        $query->selectRaw('*, if(if(status = -1, 1, hit),0,publish_at) as article_time, if(status = -1, 1, if(status = 3, 0, status) ) as b_s');//审核不通过的也按照正常发布的排序。
        $query->orderBy('b_s')->orderBy('article_time', 'desc')->orderBy('start_at', 'desc')->orderBy('publish_at', 'desc');
        return $query;
    }

    /**
     * 我的推荐列表
     * @param $id
     * @param $mch_id
     * @return mixed
     */
    public static function articlesResult($id, $mch_id) {
        $status = GoodsArticlesController::new_article;//新建
        if (is_numeric($id)) {
            $articles = GoodsArticles::query()->find($id);
            if (isset($articles)) {
                $match = $articles->getMatch();
                if ($mch_id == $articles->mch_id) {//不是自己的推荐无法操作
                    $rest["articles"] = $articles;
                    if ($articles->status == 0) {
                        $status = GoodsArticlesController::can_edit; //可编辑
                    } elseif (!isset($match) || $match->status != 0) {
                        $status = GoodsArticlesController::no_edit_no_publish; //不可编辑, 不可发布
                    } else {
                        $status = GoodsArticlesController::no_edit_can_publish; //不可编辑，可发布
                    }
                }
                $rest['match'] = $match;
            }
        }
        $rest['status'] = $status;
        if ($status == GoodsArticlesController::can_edit || $status == GoodsArticlesController::new_article) {
            //SELECT price, count(1) as c FROM goods_articles GROUP BY price ORDER BY c DESC LIMIT 3;
            $query = GoodsArticles::query()->where('mch_id', $mch_id)->where('price', '>=', 1000)->where('level', '<>', GoodsArticles::kLevelHit)->groupBy('price');//常用价格
            $query->selectRaw('price, max(created_at) as created_at')->orderByRaw('created_at desc, price asc')->take(2);
            $oftenPrices = $query->get();
            $array = ['price' => 0];
            if (count($oftenPrices) > 0) {
                foreach ($oftenPrices as $op) {
                    $array[] = ['price'=>$op->price];
                }
            } else {
                $array[] = ['price' => 1000];
                $array[] = ['price' => 1800];
            }
            usort($array, function ($a, $b) {
                return $a['price'] - $b['price'];
            });
            $rest['oftenPrices'] = $array;
        }
        return $rest;
    }

    public function packageCount() {
        return GoodsArticlePackages::query()->where('article_id', $this->id)->count();
    }

    /**
     * 首页最新推荐
     * @param $size
     * @param $isFree bool 是否免费
     * @return array
     */
    public static function index_new_articles($size, $isFree = false, $sport = -1, $court = -1) {
        /*$query = GoodsArticles::query()->where("status", GoodsArticles::kStatusPublished);
        $query->where('start_at', '>=', date('Y-m-d H:i:s', strtotime('-1 days')));
        if ($isFree){
            $query->where('price', 0);
        }
        $query->orderBy("start_at", "desc")->orderBy('publish_at', 'desc');
        $query->groupBy('mch_id');
        $query->selectRaw('max(id) AS id, max(publish_at) AS publish_at, max(start_at) AS start_at');
        $query->take($size);
        $article_ids = $query->get();

        $article_id_array = [];
        foreach ($article_ids as $a) {
            $article_id_array[] = $a->id;
        }

        $articles = GoodsArticles::query()->whereIn('id', $article_id_array)->get();
        $newArticles = [];
        foreach ($articles as $article) {
            $newArticles[] = $article;
        }
        $article_ids = $query->get();

        $article_id_array = [];
        foreach ($article_ids as $a) {
            $article_id_array[] = $a->id;
        }

        $articles = GoodsArticles::query()->whereIn('id', $article_id_array)->get();
        $newArticles = [];
        foreach ($articles as $article) {
            $newArticles[] = $article;
        }
        */

        $query = Merchant::query();
        $query->join('goods_articles', function ($join) {
            $join->on('goods_articles.mch_id', '=', 'merchants.id');
        });
        $query->where("goods_articles.status", GoodsArticles::kStatusPublished);
        $query->where('goods_articles.start_at', '>=', date('Y-m-d H:i:s', strtotime('-1 days')));
        if ($isFree){
            $query->where('goods_articles.price', 0);
        }

        $query = GoodsArticles::onSportAndCourtQuery($query, $sport, $court);

        //2017.07.05 首页最新推荐只显示红单
        $query->where(function ($or_query) {
            $or_query->whereNull("goods_articles.hit");//未结算
            $or_query->orWhere("goods_articles.hit", 0);//未结算
            $or_query->orWhere("goods_articles.hit", self::kHitWin);//已结算，红单
            $or_query->orWhere("goods_articles.hit", self::kHitWinHalf);//已结算，红半
        });
        $query->groupBy('merchants.id');
        $query->selectRaw('merchants.id AS id, max(goods_articles.publish_at) as publish_at');
        $query->orderBy('publish_at', 'desc');

        $query->take($size);
        $merchants = $query->get();

        $newArticles = [];
        foreach ($merchants as $merchant) {
            $article = $merchant->newPublishArticles(0, $sport, $court);
            if (!isset($article)) {
                $article = $merchant->oldPublishArticlesRed(0, $sport, $court);
            }
            $newArticles[] = $article;
        }

        usort($newArticles, function ($a, $b) {//自定义排序
            $a_hit = $a->hit;
            $b_hit = $b->hit;

            if ($a_hit == 0 && $b_hit == 0) {//未结算按照 发布时间倒叙
                $a_publish_at = strtotime($a->publish_at);
                $b_publish_at = strtotime($b->publish_at);
                return $b_publish_at - $a_publish_at;
            } else if ($a_hit == 0) {//未发布的在前面
                return -1;
            } else if ($b_hit == 0) {//未发布的在前面
                return 1;
            }

            $a_start_at = strtotime($a->start_at);
            $b_start_at = strtotime($b->start_at);
            if ($a_start_at == $b_start_at) {
                $a_publish_at = strtotime($a->publish_at);
                $b_publish_at = strtotime($b->publish_at);
                return $b_publish_at - $a_publish_at;
            }
            return $b_start_at - $a_start_at;
        });

        return $newArticles;
    }

    //搜索比赛用,不需要返回match
    public function addModelWithoutMatch($isIos = true){
        $article = $this;
        $merchant = $article->merchant;
        if (is_null($merchant)){
            return null;
        }
        $merchantStatistics = $merchant->merchantStatistics;
        $canSee = $article->canSee(request()->_login)?true:($article->hit > 0?true:false);
        $title = $article->title;
        if ($isIos) {
            if ($article->sport == GoodsArticles::kSportBasketball) {
                $title = '【篮球】' . $title;
            }
            if ($article->court == GoodsArticles::kCourtHalf) {
                $title = '【半场推荐】' . $title;
            }
            if ($article->level == GoodsArticles::kLevelHit) {
                $title = '【不中退款】' . $title;
            }
        }
        $model = array(
            'article'=>array(
                'id'=>$article->id,
                'elite'=>$article->elite,
                'title'=>$title,
                'type'=>$article->type,
                'level'=>$article->level,
                'freeCheck'=>$article->free_check,
                'price'=>$article->price,
                'publishAt'=>date_create($article->publish_at)->getTimestamp(),
                'hit'=>$article->hit,
                'canBuy'=>$article->canBuy(),
                'canSee'=>$canSee,
                'bettingNum'=>($article->hide_match == GoodsArticles::kHideMatch && $article->price > 0) ? ($canSee ? $article->getBettingNum() : '') : $article->getBettingNum(),
                'up'=>$article->up,
                'middle'=>$article->middle,
                'down'=>$article->down,
                'hideMatch'=>($article->hide_match == GoodsArticles::kHideMatch && $article->price > 0) ? true : false,
                'handicap'=>$article->handicap,
                'court'=>$article->court,
                'sport'=>$article->sport
            ),
            'merchant'=>array(
                'merchantStatistics'=>array(
                	'continueHitOddDays' => isset($merchantStatistics->continue_hit_odd_days) ? $merchantStatistics->continue_hit_odd_days : 0,
                    'latelyMaxProfit'=>isset($merchantStatistics->lately_max_profit)?$merchantStatistics->lately_max_profit:0,
                    'latelyMaxProfitCount'=>isset($merchantStatistics->lately_max_profit_count)?$merchantStatistics->lately_max_profit_count:0,
                    'latelyMaxProfitLose'=>isset($merchantStatistics->lately_max_profit_lose)?$merchantStatistics->lately_max_profit_lose:0,
                    'latelyMaxProfitHit'=>isset($merchantStatistics->lately_max_profit_hit)?$merchantStatistics->lately_max_profit_hit:0,
                    'evenRed'=>$merchantStatistics->even_red,
                    'maxRed'=>$merchantStatistics->max_red,
                    'latelyHit'=>isset($merchantStatistics->lately_hit)?$merchantStatistics->lately_hit:0,
                    'latelyLose'=>isset($merchantStatistics->lately_lose)?$merchantStatistics->lately_lose:0,
                    'latelyOdd'=>isset($merchantStatistics->lately_odd)?$merchantStatistics->lately_odd:0,
                    'latelyDayCount'=>3,
                ),
                'id'=>$merchant->id,
                'intro'=>$merchant->intro,
                'logo'=>$merchant->getFullLogo('/100px'),
                'name'=>$merchant->name
            ));
        return $model;
    }

    public function appModel($isIos = true){
        $model = $this->addModelWithoutMatch($isIos);
        if (is_null($model))
            return null;

        $article = $this;
        $match = $this->getMatch();

        //如果隐藏比赛则只出时间
        if (!($model['article']['canSee']) &&
            $article->hide_match && $article->hit == GoodsArticles::kHitUnknown && $article->price > 0){
            if (isset($match)){
                $model['match'] = array(
                    'time'=>date_create($match->time)->getTimestamp(),
                );
            }
        }
        else{
            if (isset($match)) {
                $model['match'] = array(
                    'url' => ($article->sport == self::kSportBasketball ? "" : 'https://m.liaogou168.com/matches/data/match_detail/' . $match->id . '.html'),
                    'hname' => $match->hname,
                    'aname' => $match->aname,
                    'time' => date_create($match->time)->getTimestamp(),
                    'status' => $match->status,
                    'statusStr' => $match->getStatusText(),
                    'hscore' => $match->hscore,
                    'ascore' => $match->ascore,
                    'hscorehalf'=>$match->hscorehalf,
                    'ascorehalf'=>$match->ascorehalf,
                    'league' => $this->leagueName(),
                );
            }
        }

        return $model;
    }

    public static function getUnPushPackageStart() {
        return strtotime(date('Y-m-d') . ' 23:00:00');
    }

    public static function getUnPushPackageEnd() {
        return strtotime(date('Y-m-d') . ' 07:00:00');
    }

    /**
     * 是否能推荐到套餐
     * @return bool
     */
    public static function canPushPackage() {
        $un_start_time = strtotime(date('Y-m-d') . ' 00:00:00');
        $un_end_time = strtotime(date('Y-m-d') . ' 06:00:00');

        $now = time();
        //凌晨 0点 到 早上 6 点不能推荐到套餐。
        if ($now >= $un_start_time && $now <= $un_end_time) {
            return false;
        }
        return true;
    }

    /**
     * 赛事推荐页
     * @param $type_array
     * @param $type
     * @param string $orderBy
     * @param bool $isFree 是否免费
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function recommendArticles($type_array, $type, $orderBy = 'win', $isFree = false) {
        return self::recommendArticlesNew($type_array, $type, $orderBy, $isFree, null, -1, -1);
    }

    /**
     * 赛事推荐页
     * @param $type_array
     * @param $type
     * @param string $orderBy
     * @param $mode 全部、不中退款、精华、免费
     * @param $sport 1：足球，2：篮球
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function recommendArticlesMode($type_array, $type, $orderBy = 'win', $mode, $sport = null) {
        $query = GoodsArticles::query()->where("status", GoodsArticles::kStatusPublished);
        $query->where("start_at", ">=", date('Y-m-d H:i:s', strtotime('-1 days')) );

        /*if (isset($type_array[$type]) && is_numeric($type_array[$type])) {
            $query->where('type', $type_array[$type]);
        }*/
        switch ($type) {
            case 'bet':
                if ($sport == 1 || $sport == 2) {//1、足球：竞彩，2、篮球：竞彩让分
                    $query->where('type', 3);
                } else {//综合：竞彩
                    $query->where(function ($orQuery) {
                        $orQuery->where('type', 3);
                        $orQuery->orWhere('type', 4);
                    });
                }
                break;
            case 'asia':
                if ($sport == 1 || $sport == 2) {//1、足球：亚盘让球 2、篮球：亚盘让分
                    $query->where('type', 1);
                } else {//综合：亚盘
                    $query->where(function ($orQuery) {
                        $orQuery->where('type', 1);
                        $orQuery->orWhere('type', 2);
                    });
                }
                break;
            case 'ball':
                //足球：亚盘大小球 ， 篮球：亚盘大小分
                $query->where('type', 2);
                break;
            case 'bet_ball':
                $query->where('type', 4);//篮球：竞彩大小
                break;
        }

        switch ($mode) {
            case 'free':
                $query->where('price', 0);
                break;
            case 'refund':
                $query->where("goods_articles.level", 2);
                break;
            case 'elite':
                $query->where("goods_articles.elite", 1);
                break;
        }

        if (is_numeric($sport) && $sport > 0) {
            $query->where("goods_articles.sport", $sport);
        }

        $query->select("goods_articles.*");

        $query->selectRaw("if(goods_articles.hit, 1, 0) as n_hit");
        $query->selectRaw("if(goods_articles.hit, start_at, 0) as o_hit");
        $query->selectRaw("if(goods_articles.top, goods_articles.elite, 0) as n_elite");

        $query->orderBy('n_hit');//按未结算排序 > 已结算
        if ($orderBy == 'mix') {
            $query->orderBy("goods_articles.top", "desc")->orderBy("n_elite", "desc");//混合排序  按照精华排序
            //$query->orderBy("goods_articles.elite", "desc");//混合排序  按照精华排序
        }
        $query->orderBy('o_hit', 'desc');//已结束的按照比赛时间倒叙排序
        //mix 排序： 先按未结算>已结算排序，未结算与已结算精华推荐都置顶；精华和未结算的推荐按盈利高>低排序，已结算按比赛时间倒序

        if ($orderBy == 'win' || $orderBy == 'mix') {
            $query->join('merchant_statistics', function ($query) {
                $query->on('merchant_statistics.id', '=', 'mch_id');
            });
            $query->orderBy("merchant_statistics.lately_odd", "desc");//按专家盈利排序
            $query->orderBy("merchant_statistics.lately_max_profit_hit", "desc");//按专家总盈利
            $query->orderBy("goods_articles.publish_at", "desc");//按发布时间
        } else {
            $query->orderBy('publish_at', 'desc');//按照发布时间排序
        }
        return $query->get();
    }

    /**
     * 赛事推荐
     * @param $type_array
     * @param $type
     * @param string $orderBy
     * @param bool $isFree
     * @param null $level   推荐等级。
     * @param $sport
     * @param $court
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function recommendArticlesNew($type_array, $type, $orderBy = 'win', $isFree = false, $level = null, $sport = self::kSportFootball, $court = self::kCourtFull) {
        $query = GoodsArticles::query()->where("status", GoodsArticles::kStatusPublished);

        $query = self::onSportAndCourtQuery($query, $sport, $court);

        $query->where("start_at", ">=", date('Y-m-d H:i:s', strtotime('-1 days')) );
        if (is_numeric($type_array[$type])) {
            $query->where('type', $type_array[$type]);
        }
        if ($isFree) {
            $query->where('price', 0);
        }
        $query->select("goods_articles.*");

        if (is_numeric($level)) {
            $query->where("goods_articles.level", $level);
            $query->where(function ($or) {
                $or->whereNull("goods_articles.hit");
                $or->orWhere("goods_articles.hit", 0);
            });
        }

        $query->selectRaw("if(goods_articles.hit, 1, 0) as n_hit");
        $query->selectRaw("if(goods_articles.hit, start_at, 0) as o_hit");

        $query->orderBy('n_hit');//按未结算排序 > 已结算
        if ($orderBy == 'mix') {
            $query->orderBy("goods_articles.elite", "desc");//混合排序  按照精华排序
        }
        $query->orderBy('o_hit', 'desc');//已结束的按照比赛时间倒叙排序
        //mix 排序： 先按未结算>已结算排序，未结算与已结算精华推荐都置顶；精华和未结算的推荐按盈利高>低排序，已结算按比赛时间倒序

        if ($orderBy == 'win' || $orderBy == 'mix') {
            $query->join('merchant_statistics', function ($query) {
                $query->on('merchant_statistics.id', '=', 'mch_id');
            });
            $query->orderBy("merchant_statistics.lately_odd", "desc");//按专家盈利排序
            $query->orderBy("merchant_statistics.lately_max_profit_hit", "desc");//按专家总盈利
            $query->orderBy("goods_articles.publish_at", "desc");//按发布时间
        } else {
            $query->orderBy('publish_at', 'desc');//按照发布时间排序
        }
        return $query->get();
    }

    /**
     * 获取今天热门有发比赛的热门联赛
     * @return null
     */
    public static function todayHotLeagues() {
        $clock = Match::getMatchTodayClock();
        $start_time = $clock["start"];
        $end_time = $clock["end"];

        $today_match_and_leagues = Match::getTodayMatchLeagues($start_time, $end_time);
        $leagues = $today_match_and_leagues["leagues"];//今天的所有联赛

        $data = [];//今天有推荐的联赛
        //获取今天所有 联赛、其他的推荐赛事
        if (count($leagues) > 0) {
            foreach ($leagues as $lid => $league) {
                $mid_array = $league["matches"];
                $gas_query = GoodsArticles::query()->join("merchant_statistics", function ($query) {
                    $query->on("merchant_statistics.id", "=", "goods_articles.mch_id");
                });
                $gas_query->where('goods_articles.hide_match', '<>', GoodsArticles::kHideMatch);
                $gas_query->where("status", GoodsArticles::kStatusPublished)->whereIn("match_id", $mid_array);
                $gas_query->orderByRaw("g_hit, lately_odd desc, publish_at desc");
                $gas_query->selectRaw("goods_articles.*, IF(goods_articles.hit = 0, 0, 99) AS g_hit");//时间最近，相同比赛按命中率排序
                $gas = $gas_query->get();
                if (count($gas) > 0) {
                    $data[] = ["league"=>$league, "articles"=>$gas];
                }
            }
        }
        //排序 推荐场次多的排在前面开始
        usort($data, function ($a, $b) {
            if (count($a["articles"]) == count($b["articles"])) {
                return 0;
            }
            return count($a["articles"]) > count($b["articles"]) ? -1 : 1;
        });
        //排序 推荐场次多的排在前面结束

        $today_leagues = [];
        foreach ($data as $d) {
            $today_leagues[] = $d["league"];
        }
        return $today_leagues;
    }

    /**
     * 获取今天热门有发比赛的热门联赛
     * @return null
     */
    public static function todayBasketballHotLeagues() {
        $clock = Match::getMatchTodayClock();
        $start_time = $clock["start"];
        $end_time = $clock["end"];

        $today_match_and_leagues = BasketMatch::getTodayMatchLeagues($start_time, $end_time);
        $leagues = $today_match_and_leagues["leagues"];//今天的所有联赛

        $data = [];//今天有推荐的联赛
        //获取今天所有 联赛、其他的推荐赛事
        if (count($leagues) > 0) {
            foreach ($leagues as $lid => $league) {
                $mid_array = $league["matches"];
                $gas_query = GoodsArticles::query()->join("merchant_statistics", function ($query) {
                    $query->on("merchant_statistics.id", "=", "goods_articles.mch_id");
                });
                $gas_query->where('goods_articles.sport', self::kSportBasketball);
                $gas_query->where('goods_articles.hide_match', '<>', GoodsArticles::kHideMatch);
                $gas_query->where("status", GoodsArticles::kStatusPublished)->whereIn("match_id", $mid_array);
                $gas_query->orderByRaw("g_hit, lately_odd desc, publish_at desc");
                $gas_query->selectRaw("goods_articles.*, IF(goods_articles.hit = 0, 0, 99) AS g_hit");//时间最近，相同比赛按命中率排序
                $gas = $gas_query->get();

                if (count($gas) > 0) {
                    $data[] = ["league"=>$league, "articles"=>$gas];
                }
            }
        }
        //排序 推荐场次多的排在前面开始
        usort($data, function ($a, $b) {
            if (count($a["articles"]) == count($b["articles"])) {
                return 0;
            }
            return count($a["articles"]) > count($b["articles"]) ? -1 : 1;
        });
        //排序 推荐场次多的排在前面结束

        $today_leagues = [];
        foreach ($data as $d) {
            $today_leagues[] = $d["league"];
        }
        return $today_leagues;
    }

    /**
     * 此比赛的最终结果。（此结果为当前推荐的 盘口 作为计算。）
     * @return int
     */
    public function finalResult() {
        $match = $this->getMatch();
        if (!isset($match)) {
            return 0;
        }
        if ($match->status != -1) {
            return 0;
        }
        $h_score = $match->hscore;
        $a_score = $match->ascore;
        $type = $this->type;
        $result = 0;//最后结果
        $handicap = abs($this->handicap);
        $hit = $this->hit;
        switch ($type) {
            case self::kTypeChina://竞彩
                $diff = $h_score + $this->handicap - $a_score;
                if ($diff > 0) {
                    $result = 1;
                } else if ($diff == 0) {
                    $result = 2;
                } else {
                    $result = 3;
                }
                break;
            case self::kTypeAsian ://让球
            case self::kTypeOU://大小球
            case self::kTypeBettingBall://竞彩大小球
                if ($hit == self::kHitWin || $hit == self::kHitWinHalf) {//红单
                    $result = $this->result;
                } else if ($hit == self::kHitDraw) {//走水
                    $result = 2;
                } else if ($hit == self::kHitLose || $hit == self::kHitLoseHalf) {//黑单
                    $result = $this->result == 1 ? 3 : 1;
                }
                break;
        }
        return $result;
    }

    public function levelCn() {
        $level = $this->level;
        $cn = "普通推荐";
        switch ($level) {
            case self::kLevelImportant:
                $cn = "重心推荐";
                break;
            case self::kLevelHit:
                $cn = "不中退款";
                break;
        }
        return $cn;
    }

    public function smallBallCn() {
        return $this->sport == self::kSportFootball ? '小球' : '小分';
    }

    public function ballCn() {
        return $this->sport == self::kSportFootball ? '大小球' : '大小分';
    }

    public function bigBallCn() {
        return $this->sport == self::kSportFootball ? '大球' : '大分';
    }

    public static function noHitRefundQuery() {
        GoodsArticles::query();
    }

    /**
     * 去除空格后的总字数。
     * @return int
     */
    public function reasonCount() {
        if (empty($this->reason)) {
            return 0;
        }
        return mb_strlen(str_replace([" ", "　", "\r", "\n", "\t"], '', $this->reason));
    }

    /**
     * app跳转协议
     * @return string
     */
    public function appAction(){
        return 'liaogou://article?id='.$this->id;
    }

    /**
     * 专门给article查询竞技类型和半全场类型
     */
    public static function onSportAndCourtQuery($query, $sport, $court) {
        if (isset($query)) {
            if ($sport > 0) {
                $query->where('goods_articles.sport', $sport);
            }
            if ($court >= 0) {
                $query->where('goods_articles.court', $court);
            }
        }
        return $query;
    }

    public static function getSportRequestType(Request $request, $defaultType = "all") {
        $sportKey = $request->input('sport', $defaultType);
        $sport_array = ["all" => -1, "basketball" => GoodsArticles::kSportBasketball, "football" => GoodsArticles::kSportFootball];

        $sport = GoodsArticles::kSportFootball;
        if (is_numeric($sport_array[$sportKey])) {
            $sport = $sport_array[$sportKey];
        }
        return $sport;
    }

    public static function getCourtRequestType(Request $request, $defaultType = "all") {
        $courtKey = $request->input('court', $defaultType);
        $court_array = ["all" => -1, "whole" => GoodsArticles::kCourtFull, "half" => GoodsArticles::kCourtHalf];

        $court = GoodsArticles::kCourtFull;
        if (is_numeric($court_array[$courtKey])) {
            $court = $court_array[$courtKey];
        }
        return $court;
    }

    public static function getStatisticsTableName($sport) {
        switch ($sport) {
            case GoodsArticles::kSportFootball:
                $tableName = "merchant_football_statistics";
                break;
            case GoodsArticles::kSportBasketball:
                $tableName = "merchant_basketball_statistics";
                break;
            default:
                $tableName = "merchant_statistics";
                break;
        }
        return $tableName;
    }

    /**
     * 获取最新的专家推送的足球比赛，按照推送的专家的多少排序
     * @param $mid_array array  比赛id
     * @param int $count
     * @return array
     */
    public static function getArticlesHotMatches($mid_array, $count = 8) {
        $query = GoodsArticles::query()
            ->where(function ($q) use($mid_array) {
                if (isset($mid_array) && count($mid_array) > 0) {
                    foreach ($mid_array as $key => $array) {
                        $q->where(function ($q) use ($key, $array) {
                            $q->where('sport', $key)
                                ->whereNotIn('match_id', $array);
                        });
                    }
                }
            })->selectRaw("match_id, sport, count(*) as count, max(start_at) as start_at")
            ->groupBy("match_id", "sport")
            ->orderBy("count", "desc")->orderBy("start_at", "desc");

        $tempQuery = clone $query;

        $query->where("start_at", ">", date_create("-1 days"))
            ->where("hit", self::kHitUnknown);
        if ($count > 0) {
            $query->take($count);
        }
        $articles = $query->get();

        $matches = array();
        foreach ($articles as $article) {
            $match = $article->getMatch();
            $match['lname'] = $match->league->name;
            $match["article_count"] = $article->count;
            $match["mid"] = $match->id;
            $match["sport"] = $article->sport;
            $matches[] = $match;
        }

        $otherCount = $count - count($articles);
        if ($otherCount > 0) {
            $otherArticles = $tempQuery->where("hit", ">", self::kHitUnknown)->whereNotIn('match_id', $mid_array)
                ->where("start_at", ">", date_create("-1 days"))
                ->take($otherCount)->get();

            foreach ($otherArticles as $article) {
                $match = $article->getMatch();
                $match['lname'] = $match->league->name;
                $match["article_count"] = $article->count;
                $match["mid"] = $match->id;
                $match["sport"] = $article->sport;
                $matches[] = $match;
            }
        }
        if ($count > 0 && count($matches) < $count) {
            $matches = array_slice($matches, 0, $count / 2);
        }

        return $matches;
    }
}