<tbody>
@foreach($matches as $match)
    <tr>
        <?php
        //赛事背景色
        $bgRgb = \App\Http\Controllers\CommonTool::getLeagueBgRgb($match['lid']);
        $r = $bgRgb['r'];
        $g = $bgRgb['g'];
        $b = $bgRgb['b'];
        ?>
        <td><p style="background: rgb({{$r}}, {{$g}}, {{$b}});">{{isset($match['lname'])?$match['lname']:$match['win_lname']}}</p></td>
        <td>{{Carbon\Carbon::parse($match['time'])->format('y-m-d')}}</td>
        <td><span @if($teamId == $match['hid'] || $match['hname'] == $teamName) class="red" @endif>{{$match['hname']}}</span> vs <span @if($teamId == $match['aid'] || $match['aname'] == $teamName) class="red" @endif>{{$match['aname']}}</span></td>
        <td>{{$match['day']}}</td>
    </tr>
    @endforeach
</tbody>