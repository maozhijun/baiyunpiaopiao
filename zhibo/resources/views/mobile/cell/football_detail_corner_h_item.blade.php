<?php
$total = ($analyse['win'] + $analyse['draw'] + $analyse['lose']);
$win = 0;
$draw = 0;
$lose = 0;
if ($total > 0){
    $win = round(100*$analyse['win']/$total,2);
    $draw = round(100*$analyse['draw']/$total,2);
    $lose = 100 - $win - $draw;
}
?>
<div class="canvasBox" ha="{{$ha}}" le="{{$le}}">
    <div class="canvasArea">
        <div class="circle"><canvas width="140px" height="140px" value="{{$win/100}}" color="#F9423D"></canvas></div>
        <p>大球<b class="red">{{$analyse['win']}}</b></p>
    </div>
    <div class="canvasArea">
        <div class="circle"><canvas width="140px" height="140px" value="{{$draw/100}}" color="#32C47C"></canvas></div>
        <p>走水<b class="green">{{$analyse['draw']}}</b></p>
    </div>
    <div class="canvasArea">
        <div class="circle"><canvas width="140px" height="140px" value="{{$lose/100}}" color="#6E6E6E"></canvas></div>
        <p>小球<b class="gray">{{$analyse['lose']}}</b></p>
    </div>
    <p class="summary">共{{$total}}场，大球率：<b>{{$win}}%</b></p>
</div>
<table ha="{{$ha}}" le="{{$le}}">
    <thead>
    <tr>
        <th>日期</th>
        <th>赛事</th>
        <th colspan="3">角球比分</th>
        <th>盘口</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $match)
        <tr>
            <td>{{substr($match['time'], 0, 10)}}</td>
            <td>{{!empty($match['league'])?$match['league']:$match['win_lname']}}</td>
            <td @if($hid == $match['hid'] || $hname == $match['hname']) class="host" @endif >{{$match['hname']}}</td>
            <td>{{$match['h_corner']}}-{{$match['a_corner']}}<p class="goal">{{$match['h_half_corner']}}-{{$match['a_half_corner']}}</p></td>
            <td @if($hid == $match['hid'] || $hname == $match['hname']) class="host" @endif >{{$match['aname']}}</td>
            <td>{{$match['middle2']}}
            @if(isset($match['middle2']))
                @if($match['h_corner'] + $match['a_corner'] > $match['middle2'])
                    <p class="big">大</p>
                @elseif($match['h_corner'] + $match['a_corner'] < $match['middle2'])
                    <p class="small">小</p>
                @else
                    <p class="draw">走</p>
                @endif
            @else
                -
            @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>