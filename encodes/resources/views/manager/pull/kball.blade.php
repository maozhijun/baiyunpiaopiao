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
                <td>录像地址</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($lives as $live)
                @if($live['liveType'] == 3)
                    <tr>
                        <td>{{ $live['matchName'] }}</td>
                        <td>{{ $live['date'].' '.$live['time'] }}</td>
                        <td>{!! $live['homeTeam'].'&nbsp;VS&nbsp;'.$live['awayTeam'] !!}</td>
                        <td>
                            {{ $live['statusString'] }}
                        </td>
                        <td>
                            <a href="{{ $live['liveLink'] }}" target="_blank" title="右击复制地址">
                                RTMP地址
                            </a>&nbsp;&nbsp;<a href="{{ $live['shareLiveLink'] }}" target="_blank" title="右击复制地址">
                                M3U8地址
                            </a>
                        </td>
                        <td>
                            @if(!empty($live['highLightsUrl']))
                                <a href="{{ $live['highLightsUrl'] }}" target="_blank"
                                   title="{{ $live['highLightsTitle'] }}">
                                    录像
                                </a>
                            @endif
                        </td>
                        <td>
                            {{--@if($live['status'] == 0)--}}
                                {{--<a class="btn btn-xs btn-danger" href="/manager/kball/created/">推流</a>--}}
                            {{--@endif--}}
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection