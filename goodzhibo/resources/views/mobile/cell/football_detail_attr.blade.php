<?php
    $home = isset($data['home']) ? $data['home'] :null;
    $away = isset($data['away']) ? $data['away'] :null;
?>
<table ha="{{$ha}}" le="{{$le}}">
    <thead>
    <tr>
        <th>球队</th>
        <th>场均进球</th>
        <th>场均失球</th>
        <th>进球场次</th>
        <th>失球场次</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($home))
    <tr>
        <td>{{$hname}}</td>
        <td @if($away && $home[$key]['avgGoal'] > $away[$key]['avgGoal']) class="red" @endif>{{$home[$key]['avgGoal']}}球</td>
        <td @if($away && $home[$key]['avgMiss'] > $away[$key]['avgMiss']) class="red" @endif>{{$home[$key]['avgMiss']}}球</td>
        <td @if($away && $home[$key]['avgGoalMatch'] > $away[$key]['avgGoalMatch']) class="red" @endif>{{$home[$key]['avgGoalMatch']}}场</td>
        <td @if($away && $home[$key]['avgMissMatch'] > $away[$key]['avgMissMatch']) class="red" @endif>{{$home[$key]['avgMissMatch']}}场</td>
    </tr>
    @endif
    @if(isset($away))
    <tr>
        <td>{{$aname}}</td>
        <td @if($home && $home[$key]['avgGoal'] < $away[$key]['avgGoal']) class="red" @endif>{{$away[$key]['avgGoal']}}球</td>
        <td @if($home && $home[$key]['avgMiss'] < $away[$key]['avgMiss']) class="red" @endif>{{$away[$key]['avgMiss']}}球</td>
        <td @if($home && $home[$key]['avgGoalMatch'] < $away[$key]['avgGoalMatch']) class="red" @endif>{{$away[$key]['avgGoalMatch']}}场</td>
        <td @if($home && $home[$key]['avgMissMatch'] < $away[$key]['avgMissMatch']) class="red" @endif>{{$away[$key]['avgMissMatch']}}场</td>
    </tr>
    @endif
    <tr>
        <td colspan="5">* 近10场，如不够10场则以球队显示场数为准</td>
    </tr>
    </tbody>
</table>