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
                    $sid = $match['sid'];
                    $hbId = $match['hbId'];
                ?>
                <tr>
                    <td>
                        <label class="label label-primary">{{ $match['league']}}</label>
                    </td>
                    <td>{{$match['time']}}</td>
                    <td>{{$match['hname'].' vs '.$match['aname']}}</td>
                    <td>
                        @if($match['liveStatus'] == 1)
                            <label class="label label-info">进行中</label>
                        @elseif($match['liveStatus'] == 0)
                            <label class="label label-default">未开始</label>
                        @else
                            <label class="label">已结束</label>
                        @endif
                    </td>
                    <td>
                        @if($hbId > 0)
                            <a href="http://www.heibaizhibo.com/live/{{$hbId}}" target="_blank">播放地址</a>
                        @elseif($sid > 0)
                            <a href="http://www.gunqiu.com/match_live/{{$sid}}" target="_blank">播放地址</a>
                        @endif
                    </td>
                    <td>
                        @if($hbId > 0 || $sid > 0)
                            <a href="/resources/gunqiu/get_live_url?sid={{$sid}}&hbId={{$hbId}}" target="_blank">获取流地址</a>
                        @else
                            赛前更新
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection