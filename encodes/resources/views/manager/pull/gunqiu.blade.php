@extends('layouts.resources')
@section('content')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>赛事</td>
                <td>时间</td>
                <td>比赛</td>
                <td>状态</td>
                <td>地址</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($matchesInfo as $match)
                <?php
                    $sid = $match['mid'];
                    $hbId = isset($livesInfo[$sid]) ? $livesInfo[$sid] : 0;
                ?>
                <tr>
                    <td>
                        <label class="label label-primary">{{ $match['league']}}</label>
                    </td>
                    <td>{{$match['matchtime']}}</td>
                    <td>{{$match['hometeam'].' vs '.$match['guestteam']}}</td>
                    <td>
                        @if($match['matchstate'] == 1)
                            <label class="label label-info">上半场</label>
                        @elseif($match['matchstate'] == 2)
                            <label class="label label-warning">中场</label>
                        @elseif($match['matchstate'] == 3)
                            <label class="label label-success">下半场</label>
                        @else
                            <label class="label label-default">未开始</label>
                        @endif
                    </td>
                    <td>
                        @if($hbId > 0)
                            <a href="http://www.heibaizhibo.com/live/{{$hbId}}" target="_blank">播放地址</a>
                        @else
                            <a href="http://www.gunqiu.com/match_live/{{$sid}}" target="_blank">播放地址</a>
                        @endif
                    </td>
                    <td>
                        <a href="/resources/gunqiu/get_live_url?sid={{$sid}}&hbId={{$hbId}}" target="_blank">获取流地址</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection