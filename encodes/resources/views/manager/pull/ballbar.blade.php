@extends('layouts.resources')
@section('content')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>赛事</td>
                <td>时间</td>
                <td>比赛</td>
                <td>直播地址</td>
                <td>M3U8地址</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($lives as $date=>$dlives)
                <tr>
                    <td colspan="6" class="danger">{{ $date }}</td>
                </tr>
                @foreach($dlives as $live)
                    @if($live['league']=='足球' || $live['league']=='篮球')
                    <tr>
                        <td>{{ $live['league'] }}</td>
                        <td>
                            {{ $live['time'] }}
                        </td>
                        <td>{{ $live['match_name'] }}</td>
                        <td>
                            <a href="{{ $live['url'] }}" target="_blank">点击播放</a>
                        </td>
                        <td>
                            <a href="/resources/ballbar/get_live_url/{{ $live['id'] }}" target="_blank">
                                获取M3U8地址
                            </a>
                        </td>
                        <td>
                            {{--<a class="btn btn-xs btn-danger" href="/resources/ssports/created/">推流</a>--}}
                        </td>
                    </tr>
                    @endif
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>

@endsection