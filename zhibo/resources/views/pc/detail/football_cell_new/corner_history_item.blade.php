@if(isset($data))
<div class="Corner_History_Content" league="{{$league}}" ha="{{$ha}}">
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
    @if($total > 0)
        <dl class="progressBox">
            @if($win > 0)
                <dd class="win" style="width: {{$win}}%;"><p>大球 {{$win}}%</p></dd>
            @endif
            @if($draw > 0)
                <dd class="draw" style="width: {{$draw}}%;"><p>走水 {{$draw}}%</p></dd>
            @endif
            @if($lose > 0)
                <dd class="lose" style="width: {{$lose}}%;"><p>小球 {{$lose}}%</p></dd>
            @endif
        </dl>
    @endif
    <table class="corner_battle_item" num="10">
        <thead>
        <tr>
            <th class="league">赛事</th>
            <th class="date">日期</th>
            <th class="team">主队</th>
            <th class="score">角球比分 (半场)</th>
            <th class="team">客队</th>
            <th colspan="3">盘口</th>
            <th class="result">大小</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $match)
            <tr>
                <?php
                //赛事背景色
                $bgRgb = \App\Http\Controllers\CommonTool::getLeagueBgRgb($match['lid']);
                $r = $bgRgb['r'];
                $g = $bgRgb['g'];
                $b = $bgRgb['b'];
                ?>
                <td><p style="background: rgb({{$r}}, {{$g}}, {{$b}});">{{!empty($match['league'])?$match['league']: ''}}</p></td>
                <td>{{ Carbon\Carbon::parse($match['time'])->format('Y-m-d') }}</td>
                <td @if($match['hid'] == $hid) class="red" @endif>{{$match['hname']}}</td>
                <td>{{$match['h_corner']}}-{{$match['a_corner']}} ({{$match['h_half_corner']}}-{{$match['a_half_corner']}})</td>
                <td @if($match['aid'] == $hid) class="red" @endif>{{$match['aname']}}</td>
                <td class="odd">{{$match['up2']}}</td>
                <td class="comity">{{$match['middle2']}}</td>
                <td class="odd">{{$match['down2']}}</td>
                @if(isset($match['middle2']))
                    @if($match['h_corner'] + $match['a_corner'] > $match['middle2'])
                        <td class="red">大</td>
                    @elseif($match['h_corner'] + $match['a_corner'] < $match['middle2'])
                        <td class="blue">小</td>
                    @else
                        <td class="green">走</td>
                    @endif
                @else
                    <td>-</td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endif