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
                <tr>
                    <td>
                        <label class="label {{ $live['isVip']==1?'label-danger':'label-primary' }}">{{ $live['league'] }}</label>
                    </td>
                    <td>
                        {{ isset($live['matchDatetime']) ? $live['matchDatetime'] : $live['startTime'] }}
                    </td>
                    <td>{{ $live['matchVs'] }}</td>
                    <td>
                        @if($live['status'] == 1)
                            <label class="label label-info">进行中</label>
                        @elseif($live['status'] == 0)
                            <label class="label label-default">未开始</label>
                        @endif
                    </td>
                    <td>
                        <a href="/resources/pptv/get_live_url/{{ $live['id'] }}" target="_blank">
                            获取M3U8地址
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection