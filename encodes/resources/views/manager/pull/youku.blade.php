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
                @if($live['liveStatus'] == 2 || $live['playType'] == 2)
                    @continue
                @endif
                <tr>
                    <td>
                        @if(isset($live['matchInfo']))
                            <label class="label label-primary">{{ $live['matchInfo']['leagueName'] }}</label>
                        @else
                            <label class="label label-primary">其他</label>
                        @endif
                    </td>
                    <td>{{date('Y-m-d H:i:s', $live['startTime']/1000)}}</td>
                    <td>{{ $live['name'] }}</td>
                    <td>
                        @if($live['liveStatus'] == 1)
                            <label class="label label-info">进行中</label>
                        @elseif($live['liveStatus'] == 0)
                            <label class="label label-default">未开始</label>
                        @endif
                    </td>
                    <td>
                        @foreach($live['multiLiveList'] as $liveItem)
                            <a class="label {{ $liveItem['isPay']==1?'label-danger':'label-primary' }}" href="/resources/youku/get_live_url/{{ $liveItem['liveId'] }}" target="_blank">{{$liveItem['styleName']}}</a>
                        @endforeach
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection