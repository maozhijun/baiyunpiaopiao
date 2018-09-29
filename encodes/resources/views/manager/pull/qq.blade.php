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
                <tr>
                    <td>
                        <label class="label {{ $live['isPay']==1?'label-danger':'label-primary' }}">{{ $live['matchDesc'] }}</label>
                    </td>
                    <td>
                        {{ $live['startTime'] }}
                    </td>
                    <td>
                        {!! $live['leftName'].'&nbsp;VS&nbsp;'.$live['rightName'] !!}
                    </td>
                    <td>
                        @if($live['livePeriod'] == 1)
                            <label class="label label-info">进行中</label>
                        @elseif($live['livePeriod'] == 0)
                            <label class="label label-default">未开始</label>
                        @endif
                    </td>
                    <td>
                        <a href="/resources/qq/get_live_url/{{ $live['liveId']+2 }}" target="_blank">
                            获取M3U8地址
                        </a>
                    </td>
                    <td>
                        {{--<a class="btn btn-xs btn-danger" href="/resources/ssports/created/">推流</a>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection