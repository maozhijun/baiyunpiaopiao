<?php
$total = ($analyse['goalbig_percent'] + $analyse['goalsmall_percent'] + $analyse['goaldraw_percent']);
$win = 0;
$draw = 0;
$lose = 0;
if ($total > 0){
    $win = round(100*$analyse['goalbig_percent']/$total,1);
    $draw = round(100*$analyse['goaldraw_percent']/$total,1);
    $lose = 100 - $win - $draw;
}
?>
<div class="proportionBox" ha="{{$ha}}" le="{{$le}}">
    <div class="proportion">
        <p class="win" style="width: {{$win}}%;"><b>{{$analyse['goalbig']}}</b></p>
        <p class="draw" style="width: {{$draw}}%;"><b>{{$analyse['goaldraw']}}</b></p>
        <p class="lose" style="width: {{$lose}}%;"><b>{{$analyse['goalsmall']}}</b></p>
    </div>
    <p class="summary">共{{$analyse['goaltotal']}}场，大球率：<b>{{$analyse['goalbig_percent']}}%</b></p>
</div>
<table ha="{{$ha}}" le="{{$le}}">
    <thead>
    <tr>
        <th>日期</th>
        <th>赛事</th>
        <th colspan="3">角球比分</th>
        <th>主让</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $match)
        <tr>
            <td>{{substr($match['time'], 0, 10)}}</td>
            <td>{{isset($match['lname'])?$match['lname']:$match['win_lname']}}</td>
            <td @if($tid == $match['hid']) class="host" @endif >{{$match['hname']}}</td>
            <td>{{$match['h_corner']}}-{{$match['a_corner']}}<p class="goal">{{$match['h_half_corner']}}-{{$match['a_half_corner']}}</p></td>
            <td @if($tid == $match['aid']) class="host" @endif >{{$match['aname']}}</td>
            <td>{{$match['goalmiddle2']}}
            @if(isset($match['goalmiddle2']))
                @if($match['h_corner'] + $match['a_corner'] > $match['goalmiddle2'])
                    <p class="big">大</p>
                @elseif($match['h_corner'] + $match['a_corner'] < $match['goalmiddle2'])
                    <p class="draw">小</p>
                @else
                    <p class="small">走</p>
                @endif
            @else
                <p>-</p>
            @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>