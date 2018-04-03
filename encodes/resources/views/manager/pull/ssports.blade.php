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
                <td>直播地址</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($lives as $live)
                @if($live['state'] == 0 || $live['state'] == 1)
                    <tr>
                        <td>{{ $live['leagueChname'] }}</td>
                        <td>{{ date('Y-m-d H:i',$live['time_stamp']) }}</td>
                        <td>{!! $live['homeTeamName'].'&nbsp;VS&nbsp;'.$live['guestTeamName'] !!}</td>
                        <td>
                            @if($live['state']==0)
                                <label class="label label-default">未开始</label>
                            @elseif($live['state']==1)
                                <label class="label label-info">进行中</label>
                            @else
                                <label class="label label-warning">{{ $live['state'] }}</label>
                            @endif
                        </td>
                        <td>
                            <a href="/resources/ssports/get_live_url/{{ $live['matchId'] }}" target="_blank">
                                获取M3U8地址
                            </a>
                        </td>
                        <td>
                            @if($live['state'] == 0)
                                {{--<a class="btn btn-xs btn-danger" href="/resources/ssports/created/">推流</a>--}}
                            @endif
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>

@endsection