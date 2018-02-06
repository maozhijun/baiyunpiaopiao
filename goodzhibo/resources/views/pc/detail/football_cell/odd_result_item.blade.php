<?php
//dump($data);
$all = $data['all'];
$away = $data['away'];
$home = $data['home'];
$six = $data['six'];
?>
<tbody>
<tr>
    <td>总</td>
    <td>{{$all['asiaWin']+$all['asiaDraw']+$all['asiaLose']}}</td>
    <td>{{$all['asiaWin']}}</td>
    <td>{{$all['asiaDraw']}}</td>
    <td>{{$all['asiaLose']}}</td>
    <td>{{$all['asiaPercent']}}%</td>
    <td>{{$all['goalBig']}}</td>
    <td>{{$all['goalBigPercent']}}%</td>
    <td>{{$all['goalSmall']}}</td>
    <td>{{$all['goalSmallPercent']}}%</td>
</tr>
<tr>
    <td style="color: #bc1c25;">主</td>
    <td>{{$home['asiaWin']+$home['asiaDraw']+$home['asiaLose']}}</td>
    <td>{{$home['asiaWin']}}</td>
    <td>{{$home['asiaDraw']}}</td>
    <td>{{$home['asiaLose']}}</td>
    <td>{{$home['asiaPercent']}}%</td>
    <td>{{$home['goalBig']}}</td>
    <td>{{$home['goalBigPercent']}}%</td>
    <td>{{$home['goalSmall']}}</td>
    <td>{{$home['goalSmallPercent']}}%</td>
</tr>
<tr>
    <td style="color: #58A1F6;">客</td>
    <td>{{$away['asiaWin']+$away['asiaDraw']+$away['asiaLose']}}</td>
    <td>{{$away['asiaWin']}}</td>
    <td>{{$away['asiaDraw']}}</td>
    <td>{{$away['asiaLose']}}</td>
    <td>{{$away['asiaPercent']}}%</td>
    <td>{{$away['goalBig']}}</td>
    <td>{{$away['goalBigPercent']}}%</td>
    <td>{{$away['goalSmall']}}</td>
    <td>{{$away['goalSmallPercent']}}%</td>
</tr>
<tr>
    <?php
    $asiaWin = 0;
    $asiaDraw = 0;
    $asiaLose = 0;
    $big = 0;
    $small = 0;
    if(isset($six['asia'])){
        foreach ($six['asia'] as $t){
            if ($t == 3)
                $asiaWin++;
            elseif ($t == 1)
                $asiaDraw++;
            else
                $asiaLose++;
        }
    }
    if(isset($six['goal'])){
        foreach ($six['goal'] as $t){
            if ($t == 3)
                $big++;
            elseif ($t == 1)
//            $asiaDraw++;
                ;
            else
                $small++;
        }
    }
    ?>
    <td>近6</td>
    <td>{{count($six['asia'])}}</td>
    <td>{{$asiaWin}}</td>
    <td>{{$asiaDraw}}</td>
    <td>{{$asiaLose}}</td>
    <td>{{count($six['asia']) > 0 ? round($asiaWin/count($six['asia']),4)*100 : 0}}%</td>
    <td>{{$big}}</td>
    <td>{{count($six['goal']) > 0 ? round($big/count($six['goal']),4)*100 : 0}}%</td>
    <td>{{$small}}</td>
    <td>{{count($six['goal']) > 0 ? round($small/count($six['goal']),4)*100 : 0}}%</td>
</tr>
</tbody>