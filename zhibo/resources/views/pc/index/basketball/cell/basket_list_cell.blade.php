<?php
$status = $match['status'];
$mid = $match['id'];
$lid = $match['lid'];
//比赛详细数据
//$matchData = $match->matchData;
//赛制
//半全场赛制
$isHalfFormat = \App\Models\Match\BasketMatch::isHalfFormat($match['system']);

$matchTime = \App\Http\Controllers\PC\MatchTool::getBasketCurrentTime($status, $match['live_time_str'], $isHalfFormat);

$matchUlr = \App\Http\Controllers\CommonTool::matchPathWithId($mid, $match['time'], 2);

//亚赔
$asiaUp = "";
$asiaMiddle = "";
$asiaDown = "";
//    $oddAsia = $match->oddAsian();
if (isset($match['asiaMiddle'])) {
    $asiaUp = \App\Http\Controllers\CommonTool::float2Decimal($match['asiaUp']);
    $asiaDown = \App\Http\Controllers\CommonTool::float2Decimal($match['asiaDown']);
    $asiaMiddle = \App\Http\Controllers\CommonTool::float2Decimal($match['asiaMiddle'], true);
}

//大小分
$ouUp = "";
$ouMiddle = "";
$ouDown = "";
//    $oddOu = $match->oddOU();
if (isset($match['ouMiddle'])) {
    $ouUp = \App\Http\Controllers\CommonTool::float2Decimal($match['ouUp']);
    $ouDown = \App\Http\Controllers\CommonTool::float2Decimal($match['ouDown']);
    $ouMiddle = \App\Http\Controllers\CommonTool::float2Decimal($match['ouMiddle'], true);
}
//欧赔
$europeUp = "";
$europeDown = "";
//    $oddOu = $match->oddOU();
if (isset($match['europeUp'])) {
    $europeUp = \App\Http\Controllers\CommonTool::float2Decimal($match['europeUp']);
    $europeDown = \App\Http\Controllers\CommonTool::float2Decimal($match['europeDown']);
}

//赛事背景色
$bgRgb = \App\Http\Controllers\CommonTool::getLeagueBgRgb($lid);
$r = $bgRgb['r'];
$g = $bgRgb['g'];
$b = $bgRgb['b'];

//是否是NBA
$isNBA = $lid == 1;
//是否是竞彩
$isLottery = isset($match['betting_num']);

//比赛事件
$events = null;//isset($match->events) ? $match->events : null;

//半场比分
$h_half = \App\Http\Controllers\PC\MatchTool::getBasketHalfScoreTxt($match, true);
$a_half = \App\Http\Controllers\PC\MatchTool::getBasketHalfScoreTxt($match, false);;

//分差
$half_diff = \App\Http\Controllers\PC\MatchTool::getBasketScoreTxt($match, true, true);
$whole_diff = \App\Http\Controllers\PC\MatchTool::getBasketScoreTxt($match, false, true);

//总分
$half_total = \App\Http\Controllers\PC\MatchTool::getBasketScoreTxt($match, true, false);
$whole_total = \App\Http\Controllers\PC\MatchTool::getBasketScoreTxt($match, false, false);

//加时
$h_ots = \App\Http\Controllers\PC\MatchTool::getBasketOtScore($match['h_ot']);
$a_ots = \App\Http\Controllers\PC\MatchTool::getBasketOtScore($match['a_ot']);
$otCount = min(count($h_ots), count($a_ots));

//默认是否显示
$show = $match['hide'] ? false : true;
$league_name = isset($match['league_name']) ? $match['league_name'] : $match['win_lname'];
$hasLive = $match['live'];
$icon_pre = 'http://nba.win007.com';
$home_icon = !empty($match['home_icon']) ? ($icon_pre . $match['home_icon']) : (env('CDN_URL'). '/img/pc/icon_teamDefault.png');
$away_icon = !empty($match['away_icon']) ? ($icon_pre . $match['away_icon']) : (env('CDN_URL'). '/img/pc/icon_teamDefault.png');
?>
<table class="{{$show?'show':'hide'}}" id="m_table_{{$mid}}" match="{{$mid}}" league="{{$lid}}" nba="{{$isNBA?"nba":""}}" lottery="{{$isLottery?"lottery":""}}" live="{{$hasLive?"live":""}}">
    <thead>
    <tr>
        <th colspan="2">
            <button value="{{$mid}}" name="choose" id="match_{{$mid}}"></button>
            <span class="league" style="background: rgb({{$r}}, {{$g}}, {{$b}});">{{$league_name}}</span>
            <p id="time_{{$mid}}">
                @if($status > 0)
                    <span class="blue">{{$matchTime}}</span>
                @else
                    {{$matchTime}}
                @endif
            </p>
            {{--<p>第四节&nbsp;&nbsp;04：30</p>--}}
        </th>
        @if($isHalfFormat)
            <th class="period_half" name="first">上半场</th>
            <th class="period_half" name="third">下半场</th>
        @else
            <th class="period" name="first">一节</th>
            <th class="period" name="second">二节</th>
            <th class="period" name="third">三节</th>
            <th class="period" name="fourth">四节</th>
        @endif
        @if($otCount > 0)
            @for($i = 0; $i<$otCount; $i++)
                <th class="period" name="ot_{{$i+1}}">{{$i+1}}'OT</th>
            @endfor
        @endif
        <th id="half_{{$mid}}" class="half">半场</th>
        <th class="full">全场</th>
        <th class="difference">分差</th>
        <th class="add">总分</th>
        <th class="europe">欧指</th>
        <th class="asia">让分</th>
        <th class="goal">总分</th>
        <th class="data">数据</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td rowspan="2">
            {{date('m月d日', strtotime($match['time']))}}<br/>
            {{date('H:i', strtotime($match['time']))}}
            @if($hasLive)
                <br/>
                @if($match['status'] > 0)
                    <a href="{{\App\Http\Controllers\CommonTool::matchLiveFullPathWithId($mid,2)}}" target="_blank"><img id="live_{{$mid}}" src="{{env('CDN_URL')}}/img/pc/icon_home_video_live.gif"></a>
                @else
                    <a href="{{\App\Http\Controllers\CommonTool::matchLiveFullPathWithId($mid,2)}}" target="_blank"><img id="live_{{$mid}}" src="{{env('CDN_URL')}}/img/pc/icon_home_live.png"></a>
                @endif
            @endif
        </td>
        <td id="h_team_{{$mid}}" class="team"><img src="{{$home_icon}}">{{$match['hname']}}</td>
        <td id="h_score1_{{$mid}}"><p>{{\App\Http\Controllers\PC\MatchTool::getBasketScore($match['hscore_1st'])}}</p></td>
        @if(!$isHalfFormat)
            <td id="h_score2_{{$mid}}"><p>{{\App\Http\Controllers\PC\MatchTool::getBasketScore($match['hscore_2nd'])}}</p></td>
        @endif
        <td id="h_score3_{{$mid}}"><p>{{\App\Http\Controllers\PC\MatchTool::getBasketScore($match['hscore_3rd'])}}</p></td>
        @if(!$isHalfFormat)
            <td id="h_score4_{{$mid}}"><p>{{\App\Http\Controllers\PC\MatchTool::getBasketScore($match['hscore_4th'])}}</p></td>
        @endif
        @if($otCount > 0)
            @for($i = 0; $i<$otCount; $i++)
                <td id="h_ot{{1+$i}}_{{$mid}}"><p>{{$h_ots[$i]}}</p></td>
            @endfor
        @endif
        <td id="h_half_{{$mid}}" class="half">{{$h_half}}</td>
        <td id="h_full_{{$mid}}" class="full">
            <b>
                @if($status > 0)
                    <span class="blue"><p>{{\App\Http\Controllers\PC\MatchTool::getBasketScore($match['hscore'])}}</p></span>
                @elseif($status == -1)
                    {{\App\Http\Controllers\PC\MatchTool::getBasketScore($match['hscore'])}}
                @endif
            </b>
        </td>
        <td id="half_diff_{{$mid}}">{{$half_diff}}</td>
        <td id="half_total_{{$mid}}">{{$half_total}}</td>
        <td>{{$europeUp}}</td>
        <td class="asia">
            @if($asiaMiddle >= 0)<span data="{{$asiaMiddle}}">{{$asiaMiddle}}</span>@endif
            <p style="margin: 0;" data="{{$asiaUp}}">{{$asiaUp}}</p>
        </td>
        <td class="goal">
            <span data="{{$ouMiddle}}">{{$ouMiddle>0?'大 '.$ouMiddle:''}}</span>
            <p style="margin: 0;" data="{{$ouUp}}">{{$ouUp}}</p>
        </td>
        <td rowspan="2" class="link">
            {{--<a href="match_bk.html">析</a>&nbsp;<a href="oddAsia_bk.html">亚</a>&nbsp;<a href="oddGoal_bk.html">大</a>&nbsp;<a href="oddEurope_bk.html">欧</a>--}}
        </td>
    </tr>
    <tr>
        <td id="a_team_{{$mid}}" class="team"><img src="{{$away_icon}}">{{$match['aname']}}</td>
        <td id="a_score1_{{$mid}}"><p>{{\App\Http\Controllers\PC\MatchTool::getBasketScore($match['ascore_1st'])}}</p></td>
        @if(!$isHalfFormat)
            <td id="a_score2_{{$mid}}"><p>{{\App\Http\Controllers\PC\MatchTool::getBasketScore($match['ascore_2nd'])}}</p></td>
        @endif
        <td id="a_score3_{{$mid}}"><p>{{\App\Http\Controllers\PC\MatchTool::getBasketScore($match['ascore_3rd'])}}</p></td>
        @if(!$isHalfFormat)
            <td id="a_score4_{{$mid}}"><p>{{\App\Http\Controllers\PC\MatchTool::getBasketScore($match['ascore_4th'])}}</p></td>
        @endif
        @if($otCount > 0)
            @for($i = 0; $i<$otCount; $i++)
                <td id="a_ot{{1+$i}}_{{$mid}}"><p>{{$a_ots[$i]}}</p></td>
            @endfor
        @endif
        <td id="a_half_{{$mid}}" class="half">{{$a_half}}</td>
        <td id="a_full_{{$mid}}" class="full">
            <b>
                @if($status > 0)
                    <span class="blue"><p>{{\App\Http\Controllers\PC\MatchTool::getBasketScore($match['ascore'])}}</p></span>
                @elseif($status == -1)
                    {{\App\Http\Controllers\PC\MatchTool::getBasketScore($match['ascore'])}}
                @endif
            </b>
        </td>
        <td id="full_diff_{{$mid}}">{{$whole_diff}}</td>
        <td id="full_total_{{$mid}}">{{$whole_total}}</td>
        <td>{{$europeDown}}</td>
        <td class="asia">
            @if($asiaMiddle < 0)<span data="{{$asiaMiddle}}">{{abs($asiaMiddle)}}</span>@endif
            <p style="margin: 0;" data="{{$asiaDown}}">{{$asiaDown}}</p>
        </td>
        <td class="goal">
            <span data="{{$ouMiddle}}">{{$ouMiddle>0?'小 '.$ouMiddle:''}}</span>
            <p style="margin: 0;" data="{{$ouDown}}">{{$ouDown}}</p>
        </td>
    </tr>
    </tbody>
</table>