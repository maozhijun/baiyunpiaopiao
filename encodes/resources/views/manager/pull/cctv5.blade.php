@extends('layouts.resources')
@section('content')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>赛事</td>
                <td>详情</td>
                <td>时间</td>
                <td>线路</td>
                <td>直播地址</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($lives as $live)
                @if($live['endtime']/1000 > time())
                    <tr>
                        <td width="20%">{{ $live['title'] }} {!! empty($live['shorttitle'])?'':'<br>'.$live['shorttitle'] !!}</td>
                        <td>
                            @if(!empty($live['ateam']))
                                {{ $live['ateam'] .' VS '.$live['bteam'] }}
                            @endif
                            {!! empty($live['commentator'])?'':'<br>解说:'.$live['commentator'] !!}
                        </td>
                        <td>{{ date('Y-m-d H:i',$live['starttime']/1000) }}</td>
                        <td>{{ empty($live['channeltype'])?$live['streamtype'] : $live['channeltype'] }}</td>
                        <td>
                            <a href="/resources/cctv5/get_live_url/{{ $live['id'] }}" target="_blank">
                                获取M3U8地址
                            </a>
                        </td>
                        <td>
                            {{--<a class="btn btn-xs btn-danger" href="/resources/ssports/created/">推流</a>--}}
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>

@endsection