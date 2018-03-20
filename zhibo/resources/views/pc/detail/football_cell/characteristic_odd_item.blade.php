<?php
if (isset($data)){
    $win = 0;
    $draw = 0;
    $lose = 0;
    switch ($count){
        case 10:
            $win = $data['win10'];
            $draw = $data['draw10'];
            $lose = $data['lose10'];
            break;
        case 20:
            $win = $data['win20'];
            $draw = $data['draw20'];
            $lose = $data['lose20'];
            break;
    }
}
?>
@if(isset($data))
    <?php
    $winText = '主赢';
    $drawText = '走水';
    $loseText = '主输';
            switch ($type){
                case 2:
                    $winText = '大球';
                    $drawText = '走水';
                    $loseText = '小球';
                    break;
                case 3:
                    $winText = '主胜';
                    $drawText = '平局';
                    $loseText = '主负';
                    break;
            }
    ?>
    <div class="result">
        <p class="win"><span>{{$win}}%</span><br/><em style="color:#333;">{{$winText}}</em></p><p style="color: #999"><span>{{$draw}}%</span><br/><em style="color:#333;">{{$drawText}}</em></p><p class="blue"><span>{{$lose}}%</span><br><em style="color:#333;">{{$loseText}}</em></p>
        <div class="clear"></div>
    </div>
    <table>
        <thead>
        <tr>
            <th class="league">赛事</th>
            <th class="date">日期</th>
            <th class="team">主队</th>
            <th class="score">比分 (半场)</th>
            <th class="team">客队</th>
            <th colspan="3">初盘</th>
            <th colspan="3">终盘</th>
            <th class="end">结果</th>
        </tr>
        </thead>
        <tbody>
        @for($i = 0 ; $i < min($count,count($data['matches']));$i++)
            <?php
            $match = $data['matches'][$i];
            $result = '';
            $class = $data['result'][$i] == 3?'red':($data['result'][$i] == 1?'green':'blue');
            switch ($type){
                case 1:
                    $result = $data['result'][$i] == 3?'赢':($data['result'][$i] == 1?'走':'输');
                    break;
                case 2:
                    $result = $data['result'][$i] == 3?'大球':($data['result'][$i] == 1?'走':'小球');
                    break;
                case 3:
                    $result = $data['result'][$i] == 3?'主胜':($data['result'][$i] == 1?'平':'客胜');
                    break;
            }
            ?>
            <tr>
                <?php
                //赛事背景色
                $match = App\Http\Controllers\CommonTool::object_to_array($match);
                $bgRgb = \App\Http\Controllers\CommonTool::getLeagueBgRgb($match['lid']);
                $r = $bgRgb['r'];
                $g = $bgRgb['g'];
                $b = $bgRgb['b'];
                ?>
                <td><p style="background: rgb({{$r}}, {{$g}}, {{$b}});">{{isset($match['lname'])?$match['lname']:$match['win_lname']}}</p></td>
                <td>{{Carbon\Carbon::parse($match['time'])->format('y-m-d')}}</td>
                <td>{{$match['hname']}}</td>
                <td>{{$match['hscore']}}-{{$match['ascore']}} ({{$match['hscorehalf']}}-{{$match['ascorehalf']}})</td>
                <td>{{$match['aname']}}</td>
                <td class="odd">{{$match['up1']}}</td>
                <td class="comity">{{$type == 2 ? $match['middle1'] :\App\Models\Match\Odd::getOddMiddleString($match['middle1'])}}</td>
                <td class="odd">{{$match['down1']}}</td>
                <td class="odd {{\App\Http\Controllers\CommonTool::colorOfUpDown($match['up1'],$match['up2'])}}">{{$match['up2']}}</td>
                <td class="comity {{\App\Http\Controllers\CommonTool::colorOfUpDown($match['middle1'],$match['middle2'])}}">{{$type == 2 ? $match['middle2'] :\App\Models\Match\Odd::getOddMiddleString($match['middle2'])}}</td>
                <td class="odd {{\App\Http\Controllers\CommonTool::colorOfUpDown($match['down1'],$match['down2'])}}">{{$match['down2']}}</td>
                <td class="{{$class}}">{{$result}}</td>
            </tr>
        @endfor
        </tbody>
    </table>
    <?php
    switch ($type){
        case 1:
            $text = '亚盘';
            break;
        case 2:
            $text = '大小球';
            break;
        case 3:
            $text = '欧赔';
            break;
    }
    ?>
    <div class="noList">暂无{{isset($text)?$text:''}}同赔数据</div>
@else
    @if(isset($result))
    <?php
    switch ($type){
        case 1:
            $text = '亚盘';
            break;
        case 2:
            $text = '大小球';
            break;
        case 3:
            $text = '欧赔';
            break;
    }
    ?>
    <div class="noList">暂无{{isset($text)?$text:''}}同赔数据</div>
        @endif
@endif