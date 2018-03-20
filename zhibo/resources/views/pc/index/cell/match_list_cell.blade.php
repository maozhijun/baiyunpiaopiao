<?php
$status = $match['status']; $mid = $match['mid']; $lid = $match['lid'];
$time = $match['time'];
$time_format = date('Ymd', strtotime($time));
$matchTime = \App\Models\Match\Match::getMatchCurrentTime($time, $match['timehalf'], $status);

$matchUlr = \App\Http\Controllers\CommonTool::matchPathWithId($mid, $time);
if (empty($matchTime)) {
    //$lineup = $match->lineup;
}
$hasLineup = isset($lineup) && (!empty($lineup['h_lineup']) || !empty($lineup['a_lineup']));

//角球比分
$cornerScore = "-";
//半场比分
$halfScore = "";
if ($status > 0 || $status == -1) {
    $halfScore = ($status == 1) ? "" : ('（'.$match['hscorehalf'] . " - " . $match['ascorehalf'].'）');

    if (isset($match['h_corner'])) {
        $cornerScore = $match['h_corner'] . " - " . $match['a_corner'];
    }
}

//亚赔
$asiaUp = "-";
$asiaMiddle = "-";
$asiaDown = "-";
//    $oddAsia = $match->oddAsian();
if (isset($match['asiaMiddle'])) {
    $asiaUp = \App\Http\Controllers\CommonTool::float2Decimal($match['asiaUp']);
    $asiaDown = \App\Http\Controllers\CommonTool::float2Decimal($match['asiaDown']);
    $asiaMiddle = \App\Http\Controllers\CommonTool::getHandicapCn($match['asiaMiddle'], "-", \App\Models\Match\Odd::k_odd_type_asian);
}

//大小球
$ouUp = "-";
$ouMiddle = "-";
$ouDown = "-";
//    $oddOu = $match->oddOU();
if (isset($match['ouMiddle'])) {
    $ouUp = \App\Http\Controllers\CommonTool::float2Decimal($match['ouUp']);
    $ouDown = \App\Http\Controllers\CommonTool::float2Decimal($match['ouDown']);
    $ouMiddle = \App\Http\Controllers\CommonTool::getHandicapCn($match['ouMiddle'], "-", \App\Models\Match\Odd::k_odd_type_ou);
}

//赛事背景色
$bgRgb = \App\Http\Controllers\CommonTool::getLeagueBgRgb($lid);
$r = $bgRgb['r'];
$g = $bgRgb['g'];
$b = $bgRgb['b'];

$asiaOddArray = \App\Http\Controllers\PC\Index\FootballController::getMatchOdds($match['asiaMiddle'], \App\Models\Match\Odd::k_odd_type_asian);
$typeCn = $asiaOddArray['typeCn'];
if (str_contains($typeCn, "受")) {
    $asiaOdd = "asiaDown_" . $asiaOddArray['sort'];
} elseif($typeCn == '未开盘' || $typeCn == '平手') {
    $asiaOdd = "asiaMiddle_" . $asiaOddArray['sort'];
} else {
    $asiaOdd = "asiaUp_" . $asiaOddArray['sort'];
}
$ouOddArray = \App\Http\Controllers\PC\Index\FootballController::getMatchOdds($match['ouMiddle'], \App\Models\Match\Odd::k_odd_type_ou);
$ouOdd = "ou_" . $ouOddArray['sort'];

//是否是一级赛事
$isFirst = ($match['genre'] >> 1 & 1) == 1;
//$isFirst = isset($match->main) && $match->main == 1;
//$isFirst = (isset($match->hot) && $match->hot == 1) && (isset($match->odd) && $match->odd == 1);
//是否是竞彩
$isLottery = isset($match['betting_num']);

//比赛事件
$events = [];//isset($match->events) ? $match->events : null;


//默认是否显示
$show = $match['hide'] ? false : true;

$hasLive = $match['live'];
?>
<tr class="{{$show?'show':'hide'}}" date="{{$time_format}}" id="m_tr_{{$mid}}" match="{{$mid}}" league="{{$lid}}" asiaOdd="{{$asiaOdd}}" ouOdd="{{$ouOdd}}" first="{{$isFirst?"first":""}}" lottery="{{$isLottery?"lottery":""}}" live="{{$hasLive?"live":""}}">
    <td>
        <button name="choose" value="{{$mid}}" name="match" id="match_{{$mid}}" ></button>
    </td>
    <td><p style="background: rgb({{$r}}, {{$g}}, {{$b}});">{{$match['league_name']}}</p></td>
    <td>{{date('H:i', strtotime($time))}} @if(isset($match['betting_num'])) <p>{{$match['betting_num']}}</p> @endif </td>
    <td id="time_{{$mid}}" @if(isset($matchTime) && '已结束' != $matchTime) class="red" @endif>{!! $matchTime !!}</td>
    <td id="h_team_{{$mid}}">
        <a href="{{$matchUlr}}" target="_blank">
            <img class="icon" src="{{$match['home_icon']}}">
            @if($match['h_red'] > 0)<span class="redCard">{{$match['h_red']}}</span>@endif
            @if($match['h_yellow'] > 0)<span class="yellowCard">{{$match['h_yellow']}}</span>@endif{{$match['hname']}}
        </a>
    </td>
    <td>
        <a href="{{$matchUlr}}" target="_blank" @if($status == -1 || $status > 0)  onmouseover="getMousePos(this); ct=window.setInterval('loadEvent(\'{{$mid}}\', \'{{$time_format}}\')',200)" onmouseout="window.clearInterval(ct)" @else onmouseover="getMousePos(this);" @endif >
            <p id="score_{{$mid}}" @if($hasLineup) style="font-size: 13px;" @endif >
                @if($hasLineup)[首发]@else{{\App\Models\Match\Match::getScoreText($status, $match['hscore'], $match['ascore'], true)}}@endif
            </p>
            <p id="half_score_{{$mid}}" class="half">{{$halfScore}}</p>
            @if($hasLineup)
                @component('pc.index.match_lineup_list', ['match'=>$match, 'lineup'=>$lineup])
                @endcomponent
            @else
                <div class="even" id="event_{{$mid}}">
                    <div class="head">
                        <p class="time">时间</p>
                        <p class="team">{{$match['hname']}}</p>
                        <p class="team">{{$match['aname']}}</p>
                    </div>
                    <ul>
                        @component('pc.index.match_event_list', ['match'=>$match, 'events'=>$events])
                        @endcomponent
                    </ul>
                </div>
            @endif
        </a>
    </td>
    <td id="a_team_{{$mid}}">
        <a href="{{$matchUlr}}" target="_blank">
            <img class="icon" src="{{$match['away_icon']}}">{{$match['aname']}}
            @if($match['a_yellow'] > 0)<span class="yellowCard">{{$match['a_yellow']}}</span>@endif
            @if($match['a_red'] > 0)<span class="redCard">{{$match['a_red']}}</span>@endif
        </a>
    </td>
    <td id="ch_score_{{$mid}}">{{$cornerScore}}</td>
    <td>
        @if($hasLive)
            @if($status > 0)
                <a href="{{\App\Http\Controllers\CommonTool::matchLiveFullPathWithId($mid)}}" target="_blank"><img id="live_{{$mid}}" src="{{env('CDN_URL')}}/img/pc/icon_home_video_live.gif" height="16"></a>
            @else
                <a href="{{\App\Http\Controllers\CommonTool::matchLiveFullPathWithId($mid)}}" target="_blank"><img id="live_{{$mid}}" src="{{env('CDN_URL')}}/img/pc/icon_home_live.png" height="16"></a>
            @endif
        @else
            @if($status == 0)
                待更新
            @else
                暂无
            @endif
        @endif
    </td>
    <td>
        <p class="asia"><span value="{{$asiaUp}}">{{$asiaUp}}</span><span value="{{$match['asiaMiddle']}}">{{$asiaMiddle}}</span><span value="{{$asiaDown}}">{{$asiaDown}}</span></p>
        <p class="goal"><span value="{{$ouUp}}">{{$ouUp}}</span><span value="{{$match['ouMiddle']}}">{{$ouMiddle}}</span><span value="{{$ouDown}}">{{$ouDown}}</span></p>
    </td>
    <td>
        <a href="{{$matchUlr}}" target="_blank">析</a>&nbsp;
        <a href="/football/detail_odd/{{$mid}}.html#asia" target="_blank">亚</a>&nbsp;
        <a href="/football/detail_odd/{{$mid}}.html#goal" target="_blank">大</a>&nbsp;
        <a href="/football/detail_odd/{{$mid}}.html#ou" target="_blank">欧</a>
    </td>
</tr>