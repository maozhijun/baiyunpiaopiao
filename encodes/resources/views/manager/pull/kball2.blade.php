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
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($lives as $live)
                @if($live['isHasLive'] == 1)
                    <tr>
                        <td>{{ $live['competitionNameZh'] }}</td>
                        <td>{{ $live['matchDate']}}</td>
                        <td>{!! $live['homeTeamName'].'&nbsp;VS&nbsp;'.$live['awayTeamName'] !!}</td>
                        <td>
                            @if($live['liveStatus'] == 1)
                                <label class="label label-info">进行中</label>
                            @elseif($live['liveStatus'] == 2)
                                <label class="label label-default">未开始</label>
                            @endif
                        </td>
                        <td>
                            <a target="_blank" href="/resources/kball/rtmpurl?gid={{$live['gameId']}}">获取rtmp地址</a>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection