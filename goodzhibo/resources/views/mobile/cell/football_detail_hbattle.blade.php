<?php
$count = 0;
$ouWin = 0;//主胜
$ouDraw = 0;//平局
$ouLose = 0;//主负
$asia_win_count = 0;//亚盘赢盘常数
foreach($data as $match){
    $count++;
    if($match['hscore'] > $match['ascore'])
        if($match['hid'] == $hid)
            $ouWin++;
        else
            $ouLose++;
    elseif($match['hscore'] < $match['ascore'])
        if($match['hid'] == $hid)
            $ouLose++;
        else
            $ouWin++;
    else
        $ouDraw++;
    if (isset($match['asiamiddle1'])) {
        $asia_host_score = $match['hscore'] - $match['asiamiddle1'];
        if ($asia_host_score > $match['ascore']) {
            $asia_win_count++;
        }
    }
}
?>
<div class="canvasBox" ha="{{$ha}}" le="{{$league}}">
    <div class="canvasArea">
        <div class="circle"><canvas width="140px" height="140px" value="{{$count == 0 ? 0 : round($ouWin/$count, 1)}}" color="#F9423D"></canvas></div>
        <p>主胜<b class="red">{{$ouWin}}</b></p>
    </div>
    <div class="canvasArea">
        <div class="circle"><canvas width="140px" height="140px" value="{{$count == 0 ? 0 : round($ouDraw/$count, 1)}}" color="#32C47C"></canvas></div>
        <p>平局<b class="green">{{$ouDraw}}</b></p>
    </div>
    <div class="canvasArea">
        <div class="circle"><canvas width="140px" height="140px" value="{{$count == 0 ? 0 : round($ouLose/$count, 1)}}" color="#6E6E6E"></canvas></div>
        <p>主负<b class="gray">{{$ouLose}}</b></p>
    </div>
    <p class="summary">共{{$count}}场，胜率：<b>{{$count == 0 ? 0 : round($ouWin/$count, 3) * 100}}%</b>，赢盘率：<b>{{$count == 0 ? 0 : round($asia_win_count / $count, 4) * 100}}%</b></p>
</div>
<table ha="{{$ha}}" le="{{$league}}">
    <thead>
    <tr>
        <th>日期</th>
        <th>赛事</th>
        <th colspan="3">比分</th>
        <th>主让</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $match)
        <?php
        $goal_total = $match['hscore'] + $match['ascore'];
        $goal_result = $goal_total > $match['goalmiddle1'] ? '大' : ($goal_total == $match['goalmiddle1'] ? '走' : '小');
        $asia_host_score = $match['hscore'] - $match['asiamiddle1'];
        if ($asia_host_score > $match['ascore']) {
            if($match['hid'] == $hid)
                $asia_result = '<p class="win">赢</p>';
            else
                $asia_result = '<p class="lose">输</p>';
        } else if($asia_host_score == $match['ascore']) {
            $asia_result = '<p class="draw">走</p>';
        } else {
            if($match['hid'] == $hid)
                $asia_result = '<p class="lose">输</p>';
            else
                $asia_result = '<p class="win">赢</p>';
        }
        if ($match['asiamiddle1'] == null){
            $asia_result = '<p class="">-</p>';
        }
        ?>
        <tr>
            <td>{{substr($match['time'],0, 10)}}</td>
            <td>{{$match['league']}}</td>
            <td @if($match['hid'] == $hid) class="host red" @endif>{{$match['hname']}}</td>
            <td>{{$match['hscore']}} - {{$match['ascore']}}<p class="goal">{{$goal_result}}{{\App\Models\Match\Odd::getOddMiddleString($match['goalmiddle1'])}}</p></td>
            <td @if($match['aid'] == $hid) class="host red" @endif>{{$match['aname']}}</td>
            @if($match['asiamiddle1'] == null)
                <td>{{''}}{!! $asia_result !!}</td>
            @else
                <td>{{\App\Models\Match\Odd::getOddMiddleString($match['asiamiddle1'])}}{!! $asia_result !!}</td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>