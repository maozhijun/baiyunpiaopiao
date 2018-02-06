<?php
$asiaWin = 0;
$asiaDraw = 0;
$asiaLose = 0;
$goalWin = 0;
$goalDraw = 0;
$goalLose = 0;
$ouWin = 0;
$ouDraw = 0;
$ouLose = 0;

for($i = 0 ; $i < min(10,count($data));$i++){
    $match = $data[$i];
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

    if (isset($match['middle1'])){
        //初盘
        if($match['hscore'] - $match['ascore'] > $match['middle1'])
            if($match['hid'] == $hid)
                $asiaWin++;
            else
                $asiaLose++;
        elseif($match['hscore'] - $match['ascore'] < $match['middle1'])
            if($match['hid'] == $hid)
                $asiaLose++;
            else
                $asiaWin++;
        else
            $asiaDraw++;
    }
    if (isset($match['goalMiddle1'])){
        if($match['hscore'] + $match['ascore'] > $match['goalMiddle1'])
            $goalWin++;
        elseif($match['hscore'] + $match['ascore'] < $match['goalMiddle1'])
            $goalLose++;
        else
            $goalDraw++;
    }
}
?>
<div class="battle_content commonBox" league="{{$league}}" ha="{{$ha}}" ou="1" asia="1" goal="1">
    <div class="canvasBox commonCanvasBox">
        <canvas width="140px" height="140px" class="europe" win="{{$ouWin}}" draw="{{$ouDraw}}" lose="{{$ouLose}}"></canvas>
        <canvas width="140px" height="140px" class="asia" win="{{$asiaWin}}" draw="{{$asiaDraw}}" lose="{{$asiaLose}}"></canvas>
        <canvas width="140px" height="140px" class="goal" win="{{$goalWin}}" draw="{{$goalDraw}}" lose="{{$goalLose}}"></canvas>
        <div class="cover europe"></div>
        <div class="cover asia"></div>
        <div class="cover goal"></div>
        <p class="europe">
            <span class="win">主胜：{{($ouWin + $ouDraw + $ouLose) > 0 ? 100*round($ouWin/($ouWin + $ouDraw + $ouLose),2):0}}%</span>
            <span class="draw">平局：{{($ouWin + $ouDraw + $ouLose) > 0 ? 100*round($ouDraw/($ouWin + $ouDraw + $ouLose),2):0}}%</span>
            <span class="lose">主负：{{($ouWin + $ouDraw + $ouLose) > 0 ? 100*round($ouLose/($ouWin + $ouDraw + $ouLose),2):0}}%</span>
        </p>
        <p class="asia">
            <span class="win">主赢：{{($asiaWin + $asiaDraw + $asiaLose) > 0 ? 100*round($asiaWin/($asiaWin + $asiaDraw + $asiaLose),2):0}}%</span>
            <span class="draw">走水：{{($asiaWin + $asiaDraw + $asiaLose) > 0 ? 100*round($asiaDraw/($asiaWin + $asiaDraw + $asiaLose),2):0}}%</span>
            <span class="lose">主输：{{($asiaWin + $asiaDraw + $asiaLose) > 0 ? 100*round($asiaLose/($asiaWin + $asiaDraw + $asiaLose),2):0}}%</span>
        </p>
        <p class="goal">
            <span class="win">大球：{{($goalWin + $goalDraw +$goalLose) > 0 ? 100*round($goalWin/($goalWin + $goalDraw +$goalLose),2):0}}%</span>
            <span class="draw">走水：{{($goalWin + $goalDraw +$goalLose) > 0 ? 100*round($goalDraw/($goalWin + $goalDraw +$goalLose),2):0}}%</span>
            <span class="lose">小球：{{($goalWin + $goalDraw +$goalLose) > 0 ? 100*round($goalLose/($goalWin + $goalDraw +$goalLose),2):0}}%</span>
        </p>
    </div>
    <table class="commonTable Battle_item" num="10">
        <thead>
        <tr>
            <th rowspan="2" class="league">赛事</th>
            <th rowspan="2" class="date">日期</th>
            <th rowspan="2" class="team">主队</th>
            <th rowspan="2" class="score">比分 (半场)</th>
            <th rowspan="2" class="team">客队</th>
            <th colspan="3">
                {{--<div class="selectParent">--}}
                {{--<select>--}}
                {{--<option>SB</option>--}}
                {{--<option>365</option>--}}
                {{--<option>易胜博</option>--}}
                {{--<option>澳门</option>--}}
                {{--<option>12bet</option>--}}
                {{--</select>--}}
                {{--</div>--}}
                <div class="selectParent">
                    <select class="ou" onchange="oddChange('battle_content','Battle_item','ou',this)">
                        <option value="1">初盘</option>
                        <option value="2">终盘</option>
                    </select>
                </div>
            </th>
            <th colspan="3">
                {{--<div class="selectParent">--}}
                {{--<select>--}}
                {{--<option>SB</option>--}}
                {{--<option>365</option>--}}
                {{--<option>易胜博</option>--}}
                {{--<option>澳门</option>--}}
                {{--<option>12bet</option>--}}
                {{--</select>--}}
                {{--</div>--}}
                <div class="selectParent">
                    <select class="asia" onchange="oddChange('battle_content','Battle_item','asia',this)">
                        <option value="1">初盘</option>
                        <option value="2">终盘</option>
                    </select>
                </div>
            </th>
            <th colspan="3">
                {{--<div class="selectParent">--}}
                {{--<select>--}}
                {{--<option>SB</option>--}}
                {{--<option>365</option>--}}
                {{--<option>易胜博</option>--}}
                {{--<option>澳门</option>--}}
                {{--<option>12bet</option>--}}
                {{--</select>--}}
                {{--</div>--}}
                <div class="selectParent">
                    <select class="goal" onchange="oddChange('battle_content','Battle_item','goal',this)">
                        <option value="1">初盘</option>
                        <option value="2">终盘</option>
                    </select>
                </div>
            </th>
            <th rowspan="2" class="result">胜负</th>
            <th rowspan="2" class="result">让球</th>
            <th rowspan="2" class="result">大小</th>
        </tr>
        <tr>
            <th class="odd red">胜</th>
            <th class="odd green">平</th>
            <th class="odd">负</th>
            <th class="odd red">主赢</th>
            <th class="comity">盘口</th>
            <th class="odd">主输</th>
            <th class="odd red">大球</th>
            <th class="odd">盘口</th>
            <th class="odd">小球</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $num = 0;
        ?>
        @foreach($data as $match)
            <tr @if($num == 9) ten="1" @endif>
                <?php
                //赛事背景色
                $bgRgb = \App\Http\Controllers\CommonTool::getLeagueBgRgb($match['lid']);
                $r = $bgRgb['r'];
                $g = $bgRgb['g'];
                $b = $bgRgb['b'];
                ?>
                <td><p style="background: rgb({{$r}}, {{$g}}, {{$b}});">{{$match['league']}}</p></td>
                <td>{{Carbon\Carbon::parse($match['time'])->format('y-m-d')}}</td>
                <td @if($match['hid'] == $hid) class="red" @endif>{{$match['hname']}}</td>
                <td><span
                            @if($match['hscore'] > $match['ascore'])
                            @if($match['hid'] == $hid)
                            class="red"
                            @else
                            class="blue"
                            @endif
                            @elseif($match['hscore'] < $match['ascore'])
                            @if($match['hid'] == $hid)
                            class="blue"
                            @else
                            class="red"
                            @endif
                            @else
                            class="green"
                            @endif
                    >{{$match['hscore']}}-{{$match['ascore']}}</span>
                    ({{$match['hscorehalf']}}-{{$match['ascorehalf']}})</td>
                <td @if($match['aid'] == $hid) class="red" @endif>{{$match['aname']}}</td>
                <td  class="ou1">{{isset($match['ouUp1'])?$match['ouUp1']:'-'}}</td>
                @if(isset($match['ouMiddle1']))
                    <td class="ou1">{{\App\Models\Match\Odd::getOddMiddleString($match['ouMiddle1'])}}</td>
                @else
                    <td class="ou1">-</td>
                @endif
                <td class="ou1">{{isset($match['ouDown1'])?$match['ouDown1']:'-'}}</td>
                <td class="ou2">{{isset($match['ouUp2'])?$match['ouUp2']:'-'}}</td>
                @if(isset($match['ouMiddle2']))
                    <td class="ou2">{{\App\Models\Match\Odd::getOddMiddleString($match['ouMiddle2'])}}</td>
                @else
                    <td class="ou2">-</td>
                @endif
                <td class="ou2">{{isset($match['ouDown2'])?$match['ouDown2']:'-'}}</td>
                <td class="asia1">{{isset($match['up1'])?$match['up1']:'-'}}</td>
                @if(isset($match['middle1']))
                    <td class="asia1">{{\App\Models\Match\Odd::panKouText($match['middle1'])}}</td>
                @else
                    <td class="asia1">-</td>
                @endif
                <td class="asia1">{{isset($match['down1'])?$match['down1']:'-'}}</td>
                <td class="asia2">{{isset($match['up2'])?$match['up2']:'-'}}</td>
                @if(isset($match['middle2']))
                    <td class="asia2">{{\App\Models\Match\Odd::panKouText($match['middle2'])}}</td>
                @else
                    <td class="asia2">-</td>
                @endif
                <td class="asia2">{{isset($match['down2'])?$match['down2']:'-'}}</td>
                <td class="goal1">{{isset($match['goalUp1'])?$match['goalUp1']:'-'}}</td>
                @if(isset($match['goalMiddle1']))
                    <td class="goal1">{{\App\Models\Match\Odd::getOddMiddleString($match['goalMiddle1'])}}</td>
                @else
                    <td class="goal1">-</td>
                @endif
                <td class="goal1">{{isset($match['goalDown1'])?$match['goalDown1']:'-'}}</td>
                <td class="goal2">{{isset($match['goalUp2'])?$match['goalUp2']:'-'}}</td>
                @if(isset($match['goalMiddle2']))
                    <td class="goal2">{{\App\Models\Match\Odd::getOddMiddleString($match['goalMiddle2'])}}</td>
                @else
                    <td class="goal2">-</td>
                @endif
                <td class="goal2">{{isset($match['goalDown2'])?$match['goalDown2']:'-'}}</td>
                @if($match['hscore'] > $match['ascore'])
                    @if($match['hid'] == $hid)
                        <td class="red">胜</td>
                    @else
                        <td class="blue">负</td>
                    @endif
                @elseif($match['hscore'] < $match['ascore'])
                    @if($match['hid'] == $hid)
                        <td class="blue">负</td>
                    @else
                        <td class="red">胜</td>
                    @endif
                @else
                    <td class="green">平</td>
                @endif
                @if(isset($match['middle2']))
                    @if($match['hscore'] - $match['ascore'] > $match['middle2'])
                        @if($match['hid'] == $hid)
                            <td class="asia2 red">赢</td>
                        @else
                            <td class="asia2 blue">输</td>
                        @endif
                    @elseif($match['hscore'] - $match['ascore'] < $match['middle2'])
                        @if($match['hid'] == $hid)
                            <td class="asia2 blue">输</td>
                        @else
                            <td class="asia2 red">赢</td>
                        @endif
                    @else
                        <td class="asia2 green">走</td>
                    @endif
                @else
                    <td class="asia2">-</td>
                @endif
                @if(isset($match['middle1']))
                    @if($match['hscore'] - $match['ascore'] > $match['middle1'])
                        @if($match['hid'] == $hid)
                            <td class="asia1 red">赢</td>
                        @else
                            <td class="asia1 blue">输</td>
                        @endif
                    @elseif($match['hscore'] - $match['ascore'] < $match['middle1'])
                        @if($match['hid'] == $hid)
                            <td class="asia1 blue">输</td>
                        @else
                            <td class="asia1 red">赢</td>
                        @endif
                    @else
                        <td class="asia1 green">走</td>
                    @endif
                @else
                    <td class="asia1">-</td>
                @endif
                @if(isset($match['goalMiddle2']))
                    @if($match['hscore'] + $match['ascore'] > $match['goalMiddle2'])
                        <td class="goal2 red">大</td>
                    @elseif($match['hscore'] + $match['ascore'] < $match['goalMiddle2'])
                        <td class="goal2 blue">小</td>
                    @else
                        <td class="goal2 green">走</td>
                    @endif
                @else
                    <td class="goal2">-</td>
                @endif
                @if(isset($match['goalMiddle1']))
                    @if($match['hscore'] + $match['ascore'] > $match['goalMiddle1'])
                        <td class="goal1 red">大</td>
                    @elseif($match['hscore'] + $match['ascore'] < $match['goalMiddle1'])
                        <td class="goal1 blue">小</td>
                    @else
                        <td class="goal1 green">走</td>
                    @endif
                @else
                    <td class="goal1">-</td>
                @endif
            </tr>
            <?php
            $num++;
            ?>
        @endforeach
        </tbody>
    </table>
</div>