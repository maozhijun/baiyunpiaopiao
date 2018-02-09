<div class="Corner_Data_{{$key}}_Content" league="{{$league}}" ha="{{$ha}}">
    @if($analyse['goalbig_percent'] > 0 || $analyse['goaldraw_percent'] > 0 || $analyse['goalsmall_percent'] > 0)
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
    <dl class="progressBox">
        @if($analyse['goalbig_percent'] > 0)
            <dd class="win" style="width: {{$win}}%;"><p>大球 {{$win}}%</p></dd>
        @endif
        @if($analyse['goaldraw_percent'] > 0)
            <dd class="draw" style="width: {{$draw}}%;"><p>走水 {{$draw}}%</p></dd>
        @endif
        @if($analyse['goalsmall_percent'] > 0)
            <dd class="lose" style="width: {{$lose}}%;"><p>小球 {{$lose}}%</p></dd>
        @endif
    </dl>
    @endif
    <table class="corner_{{$key}}_item" num="10">
        <thead>
        <tr>
            <th rowspan="2" class="league">赛事</th>
            <th rowspan="2" class="date">日期</th>
            <th rowspan="2" class="team">主队</th>
            <th rowspan="2" class="score">角球比分 (半场)</th>
            <th rowspan="2" class="team">客队</th>
            <th colspan="3">盘口</th>
            <th rowspan="2" class="result">大小</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($data))
            @foreach($data as $match)
                <tr>
                    <?php
                    //赛事背景色
                    $lid = $match['lid'];
                    $bgRgb = \App\Http\Controllers\CommonTool::getLeagueBgRgb($match['lid']);
                    $r = $bgRgb['r'];
                    $g = $bgRgb['g'];
                    $b = $bgRgb['b'];
                    ?>
                    <td><p style="background: rgb({{$r}}, {{$g}}, {{$b}});">{{isset($match['lname'])?$match['lname']:$match['win_lname']}}</p></td>
                    <td>{{ Carbon\Carbon::parse($match['time'])->format('Y-m-d') }}</td>
                    <td @if($match['hid'] == $teamId) class="red" @endif>{{$match['hname']}}</td>
                    <td>{{$match['h_corner']}}-{{$match['a_corner']}} ({{$match['h_half_corner']}}-{{$match['a_half_corner']}})</td>
                    <td @if($match['aid'] == $teamId) class="red" @endif>{{$match['aname']}}</td>
                    <td class="odd">{{$match['goalup2']}}</td>
                    <td class="comity">{{$match['goalmiddle2']}}</td>
                    <td class="odd">{{$match['goaldown2']}}</td>
                    @if(isset($match['goalmiddle2']))
                        @if($match['h_corner'] + $match['a_corner'] > $match['goalmiddle2'])
                            <td class="red">大</td>
                        @elseif($match['h_corner'] + $match['a_corner'] < $match['goalmiddle2'])
                            <td class="blue">小</td>
                        @else
                            <td class="green">走</td>
                        @endif
                    @else
                        <td>-</td>
                    @endif
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>