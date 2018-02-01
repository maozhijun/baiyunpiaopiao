<?php
$all = $data['all'];
$away = $data['away'];
$home = $data['home'];
$six = $data['six'];

$asia_six = isset($six['asia']) ? $six['asia'] : [];
$goal_six = isset($six['goal']) ? $six['goal'] : [];
$asia_six_html = '';
$goal_six_html = '';

foreach ($asia_six as $r) {
    if ($r == 3) {
        $asia_six_html .= '<p class="win asia">赢</p>';
    } else if ($r == 1) {
        $asia_six_html .= '<p class="draw asia">走</p>';
    } else {
        $asia_six_html .= '<p class="lose asia">输</p>';
    }
}

foreach ($goal_six as $r) {
    if ($r == 3) {
        $goal_six_html .= '<p class="big goal">大</p>';
    } else if ($r == 1) {
        $goal_six_html .= '<p class="draw goal">走</p>';
    } else {
        $goal_six_html .= '<p class="small goal">小</p>';
    }
}
?>
<p class="teamName"><span>{{$tname}}</span></p>
<table>
    <thead>
    <tr>
        <th>全场</th>
        <th>赢/走/输</th>
        <th>赢盘率</th>
        <th>大球</th>
        <th>大球率</th>
        <th>小球</th>
        <th>小球率</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>总</td>
        <td>{{$all['asiaWin']}}/{{$all['asiaDraw']}}/{{$all['asiaLose']}}</td>
        <td>{{$all['asiaPercent']}}%</td>
        <td>{{$all['goalBig']}}</td>
        <td>{{$all['goalBigPercent']}}%</td>
        <td>{{$all['goalSmall']}}</td>
        <td>{{$all['goalSmallPercent']}}%</td>
    </tr>
    <tr>
        <td>主</td>
        <td>{{$home['asiaWin']}}/{{$home['asiaDraw']}}/{{$home['asiaLose']}}</td>
        <td>{{$home['asiaPercent']}}%</td>
        <td>{{$home['goalBig']}}</td>
        <td>{{$home['goalBigPercent']}}%</td>
        <td>{{$home['goalSmall']}}</td>
        <td>{{$home['goalSmallPercent']}}%</td>
    </tr>
    <tr>
        <td>客</td>
        <td>{{$away['asiaWin']}}/{{$away['asiaDraw']}}/{{$away['asiaLose']}}</td>
        <td>{{$away['asiaPercent']}}%</td>
        <td>{{$away['goalBig']}}</td>
        <td>{{$away['goalBigPercent']}}%</td>
        <td>{{$away['goalSmall']}}</td>
        <td>{{$away['goalSmallPercent']}}%</td>
    </tr>
    <tr>
        <td>近6</td>
        <td colspan="3">{!! $asia_six_html !!}</td>
        <td colspan="3">{!! $goal_six_html !!}</td>
    </tr>
    </tbody>
</table>