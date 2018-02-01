<p class="teamName"><span>{{$tname}}</span></p>
<table>
    <thead>
    <tr>
        <th>日期</th>
        <th>赛事</th>
        <th colspan="3">主客球队</th>
        <th>相隔</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $match)
    <tr>
        <td class="red">{{substr($match['time'], 0, 10)}}</td>
        <td>{{isset($match['lname'])?$match['lname']:$match['win_lname']}}</td>
        <td @if($tid == $match['hid'] || $match['hname'] == $tname) class="red" @endif >{{$match['hname']}}</td>
        <td>VS</td>
        <td @if($tid == $match['aid'] || $match['aname'] == $tname) class="red" @endif >{{$match['aname']}}</td>
        <td>{{$match['day']}}</td>
    </tr>
    @endforeach
    </tbody>
</table>