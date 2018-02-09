<div class="history_{{$key}}_content commonBox" league="{{$league}}" ha="{{$ha}}"  ou="1" asia="1" goal="1">
    <?php
    //20场x值
    $twentyX = array(0,5.3,10.6,15.9,21.2,26.5,31.8,37.1,42.4,47.7,53,58.3,63.6,68.9,73.2,79,83.8,89.1,95,100);

    //计算结果
    $ou = array();
    $asia10 = array();
    $goal10 = array();
    $asia20 = array();
    $goal20 = array();
    for($count = 0 ; $count < count($data) ; $count++){
        $match = $data[$count];
        if($match['hscore'] > $match['ascore'])
            if($match['hid'] == $hid)
                $ou[] = 3;
            else
                $ou[] = 0;
        elseif($match['hscore'] < $match['ascore'])
            if($match['hid'] == $hid)
                $ou[] = 0;
            else
                $ou[] = 3;
        else
            $ou[] = 1;


        if(isset($match['middle1'])){
            if($match['hscore'] - $match['ascore'] > $match['middle1'])
                if($match['hid'] == $hid){
                    $asia20[] = 3;
                    if ($count < 10)
                        $asia10[] = 3;
                }
                else{
                    $asia20[] = 0;
                    if ($count < 10)
                        $asia10[] = 0;
                }
            elseif($match['hscore'] - $match['ascore'] < $match['middle1'])
                if($match['hid'] == $hid){
                    $asia20[] = 0;
                    if ($count < 10)
                        $asia10[] = 0;
                }
                else{
                    $asia20[] = 3;
                    if ($count < 10)
                        $asia10[] = 3;
                }
            else{
                $asia20[] = 1;
                if ($count < 10)
                    $asia10[] = 1;
            }
        }

        if(isset($match['goalMiddle1'])){
            if($match['hscore'] + $match['ascore'] > $match['goalMiddle1']){
                $goal20[] = 3;
                if ($count < 10)
                    $goal10[] = 3;
            }
            elseif($match['hscore'] + $match['ascore'] < $match['goalMiddle1']){
                $goal20[] = 0;
                if ($count < 10)
                    $goal10[] = 0;
            }
            else{
                $goal20[] = 1;
                if ($count < 10)
                    $goal10[] = 1;
            }
        }
    }

    ?>
    <div class="svgbox" num="10">
        <dl class="europe">
            <dt class="win">主胜</dt>
            <dt class="draw">平局</dt>
            <dt class="lose">主负</dt>
            @for($i = 0; $i < 10; $i++)
                <?php
                if (count($ou) > $i)
                    $item = $ou[$i];
                else{
                    $item = -1;
                }
                ?>
                @if($item == 3)
                    <dd class="win" style="width: 10%;"></dd>
                @elseif($item == 1)
                    <dd class="draw" style="width: 10%;"></dd>
                @elseif($item == 0)
                    <dd class="lose" style="width: 10%;"></dd>
                @else
                    <dd class="" style="width: 10%;"></dd>
                @endif
            @endfor
            <svg class="ten">
                @for($i = 0 ; $i < 10 - 1 ; $i++)
                    <?php
                    if (count($ou) > ($i + 1)){
                        $item = $ou[$i];
                        $item2 = $ou[$i + 1];
                    }
                    else{
                        $item2 = null;
                    }
                    ?>
                        @if(isset($item2))
                            <line x1="{{11.1*$i}}%" y1="{{$item == 3 ? 0 :($item == 1?50:100)}}%" x2="{{11.1*($i+1)}}%" y2="{{$item2 == 3 ? 0 :($item2 == 1?50:100)}}%" style="stroke:#a8a8a8;stroke-width:2px;position:relative;"/>
                        @else
                            <line x1="{{11.1*$i}}%" y1="{{$item == 3 ? 0 :($item == 1?50:100)}}%" x2="{{11.1*($i+1)}}%" y2="{{$item2 == 3 ? 0 :($item2 == 1?50:100)}}%" display="none" style="stroke:#a8a8a8;stroke-width:2px;position:relative;"/>
                        @endif
                @endfor
            </svg>
        </dl>
        <dl class="asia">
            <dt class="win">主赢</dt>
            <dt class="draw">走水</dt>
            <dt class="lose">主输</dt>
            @for($i = 0; $i < 10; $i++)
                <?php
                if(count($asia10) > $i)
                    $item = $asia10[$i];
                else
                    $item = -1;
                ?>
                @if($item == 3)
                    <dd class="win" style="width: 10%;"></dd>
                @elseif($item == 1)
                    <dd class="draw" style="width: 10%;"></dd>
                @elseif($item == 0)
                    <dd class="lose" style="width: 10%;"></dd>
                @else
                    <dd class="" style="width: 10%;"></dd>
                @endif
            @endfor
            <svg class="ten">
                @for($i = 0 ; $i < 10 - 1 ; $i++)
                    <?php
                    if(count($asia10) > ($i + 1)){
                        $item = $asia10[$i];
                        $item2 = $asia10[$i + 1];
                    }else{
                        $item2 = null;
                    }
                    ?>
                    @if(isset($item2))
                        <line x1="{{11.1*$i}}%" y1="{{$item == 3 ? 0 :($item == 1?50:100)}}%" x2="{{11.1*($i+1)}}%" y2="{{$item2 == 3 ? 0 :($item2 == 1?50:100)}}%" style="stroke:#a8a8a8;stroke-width:2px;position:relative;"/>
                    @else
                        <line x1="{{11.1*$i}}%" y1="0%" x2="{{11.1*($i+1)}}%" y2="0%" display="none" style="stroke:#a8a8a8;stroke-width:2px;position:relative;"/>
                    @endif
                @endfor
            </svg>
        </dl>
        <dl class="goal">
            <dt class="win">大球</dt>
            <dt class="draw">走水</dt>
            <dt class="lose">小球</dt>
            @for($i = 0; $i < 10; $i++)
                <?php
                if(count($goal10) > $i)
                    $item = $goal10[$i];
                else
                    $item = -1;
                ?>
                @if($item == 3)
                    <dd class="win" style="width: 10%;"></dd>
                @elseif($item == 1)
                    <dd class="draw" style="width: 10%;"></dd>
                @elseif($item == 0)
                    <dd class="lose" style="width: 10%;"></dd>
                @else
                    <dd class="" style="width: 10%;"></dd>
                @endif
            @endfor
            <svg class="ten">
                @for($i = 0 ; $i <  10 - 1 ; $i++)
                    <?php
                    if(count($goal10) > ($i + 1)){
                        $item = $goal10[$i];
                        $item2 = $goal10[$i + 1];
                    }else{
                        $item2 = null;
                    }
                    ?>
                    @if(isset($item2))
                        <line x1="{{11.1*$i}}%" y1="{{$item == 3 ? 0 :($item == 1?50:100)}}%" x2="{{11.1*($i+1)}}%" y2="{{$item2 == 3 ? 0 :($item2 == 1?50:100)}}%" style="stroke:#a8a8a8;stroke-width:2px;position:relative;"/>
                    @else
                        <line x1="{{11.1*$i}}%" y1="0%" x2="{{11.1*($i+1)}}%" y2="0%" display="none" style="stroke:#a8a8a8;stroke-width:2px;position:relative;"/>
                    @endif
                @endfor
            </svg>
        </dl>
    </div>
    <div class="svgbox" num="20">
        <dl class="europe">
            <dt class="win">主胜</dt>
            <dt class="draw">平局</dt>
            <dt class="lose">主负</dt>
            @for($i = 0; $i < min(20,count($ou)); $i++)
                <?php
                $item = $ou[$i];
                ?>
                @if($item == 3)
                    <dd class="win" style="width: 5%;"></dd>
                @elseif($item == 1)
                    <dd class="draw" style="width: 5%;"></dd>
                @else
                    <dd class="lose" style="width: 5%;"></dd>
                @endif
            @endfor
            <svg class="twenty">
                @for($i = 0 ; $i < count($ou) - 1 ; $i++)
                    <?php
                    $item = $ou[$i];
                    $item2 = $ou[$i + 1];
                    ?>
                    <line x1="{{$twentyX[$i]}}%" y1="{{$item == 3 ? 0 :($item == 1?50:100)}}%" x2="{{$twentyX[$i+1]}}%" y2="{{$item2 == 3 ? 0 :($item2 == 1?50:100)}}%" style="stroke:#a8a8a8;stroke-width:2px;position:relative;"/>
                @endfor
            </svg>
        </dl>
        <dl class="asia">
            <dt class="win">主赢</dt>
            <dt class="draw">走水</dt>
            <dt class="lose">主输</dt>
            @for($i = 0; $i < 20; $i++)
                <?php
                if(count($asia20) > $i)
                    $item = $asia20[$i];
                else
                    $item = -1;
                ?>
                @if($item == 3)
                    <dd class="win" style="width: 5%;"></dd>
                @elseif($item == 1)
                    <dd class="draw" style="width: 5%;"></dd>
                @elseif($item == 0)
                    <dd class="lose" style="width: 5%;"></dd>
                @else
                    <dd class="" style="width: 5%;"></dd>
                @endif
            @endfor
            <svg class="twenty">
                @for($i = 0 ; $i < 20 - 1 ; $i++)
                    <?php
                    if(count($asia20) > ($i + 1)){
                        $item = $asia20[$i];
                        $item2 = $asia20[$i + 1];
                    }else{
                        $item2 = null;
                    }
                    ?>
                    @if(isset($item2))
                        <line x1="{{$twentyX[$i]}}%" y1="{{$item == 3 ? 0 :($item == 1?50:100)}}%" x2="{{$twentyX[$i+1]}}%" y2="{{$item2 == 3 ? 0 :($item2 == 1?50:100)}}%" style="stroke:#a8a8a8;stroke-width:2px;position:relative;"/>
                    @else
                        <line x1="{{$twentyX[$i]}}%" y1="0%" x2="0%" display="none" style="stroke:#a8a8a8;stroke-width:2px;position:relative;"/>
                    @endif
                @endfor
            </svg>
        </dl>
        <dl class="goal">
            <dt class="win">大球</dt>
            <dt class="draw">走水</dt>
            <dt class="lose">小球</dt>
            @for($i = 0; $i < 20; $i++)
                <?php
                if(count($goal20) > $i)
                    $item = $goal20[$i];
                else
                    $item = -1;
                ?>
                @if($item == 3)
                    <dd class="win" style="width: 5%;"></dd>
                @elseif($item == 1)
                    <dd class="draw" style="width: 5%;"></dd>
                @elseif($item == 0)
                    <dd class="lose" style="width: 5%;"></dd>
                @else
                    <dd class="" style="width: 5%;"></dd>
                @endif
            @endfor
            <svg class="twenty">
                @for($i = 0 ; $i < 20 - 1 ; $i++)
                    <?php
                    if(count($goal20) > ($i + 1)){
                        $item = $goal20[$i];
                        $item2 = $goal20[$i + 1];
                    }else{
                        $item2 = null;
                    }
                    ?>
                    @if(isset($item2))
                        <line x1="{{$twentyX[$i]}}%" y1="{{$item == 3 ? 0 :($item == 1?50:100)}}%" x2="{{$twentyX[$i+1]}}%" y2="{{$item2 == 3 ? 0 :($item2 == 1?50:100)}}%" style="stroke:#a8a8a8;stroke-width:2px;position:relative;"/>
                    @else
                        <line x1="{{$twentyX[$i]}}%" y1="0%" x2="0%" display="none" style="stroke:#a8a8a8;stroke-width:2px;position:relative;"/>
                    @endif
                @endfor
            </svg>
        </dl>
    </div>
    <table class="History_{{$key}}_item commonTable" num="10">
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
                    <select onchange="oddChange('history_{{$key}}_content','History_{{$key}}_item','ou',this)">
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
                    <select onchange="oddChange('history_{{$key}}_content','History_{{$key}}_item','asia',this)">
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
                    <select onchange="oddChange('history_{{$key}}_content','History_{{$key}}_item','goal',this)">
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
            <tr @if($num == 10)class="ten" @endif>
                <?php
                //赛事背景色
                $bgRgb = \App\Http\Controllers\CommonTool::getLeagueBgRgb($match['lid']);
                $r = $bgRgb['r'];
                $g = $bgRgb['g'];
                $b = $bgRgb['b'];
                ?>
                <td><p style="background: rgb({{$r}}, {{$g}}, {{$b}});">{{$match['league']}}</p></td>
                <td>{{Carbon\Carbon::parse($match['time'])->format('y-m-d')}}</td>
                <td
                @if($match['hid'] == $hid)
                class="red"
                @endif
                >{{$match['hname']}}</td>
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
                    >
                    {{$match['hscore']}}-{{$match['ascore']}}
                        </span>({{$match['hscorehalf']}}-{{$match['ascorehalf']}})</td>
                <td
                        @if($match['aid'] == $hid)
                        class="red"
                        @endif
                >{{$match['aname']}}</td>
                <td class="ou1">{{isset($match['ouUp1'])?$match['ouUp1']:'-'}}</td>
                @if(isset($match['ouMiddle1']))
                    <td class="ou1">{{$match['ouMiddle1']}}</td>
                @else
                    <td class="ou1">-</td>
                @endif
                <td class="ou1">{{isset($match['ouDown1'])?$match['ouDown1']:'-'}}</td>
                <td class="ou2">{{isset($match['ouUp2'])?$match['ouUp2']:'-'}}</td>
                @if(isset($match['ouMiddle2']))
                    <td class="ou2">{{$match['ouMiddle2']}}</td>
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
                @if(isset($match['middle1']))
                    <td class="asia2">{{\App\Models\Match\Odd::panKouText($match['middle2'])}}</td>
                @else
                    <td class="asia2">-</td>
                @endif
                <td class="asia2">{{$match['down2']}}</td>
                <td class="goal1">{{$match['goalUp1']}}</td>
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
                @if(isset($match['hscore']))
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
                @else
                    <td>-</td>
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
            $count++;
            ?>
        @endforeach
        </tbody>
    </table>
</div>