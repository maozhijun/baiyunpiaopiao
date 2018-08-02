@extends('layouts.resources')
@section('content')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>赛事类型</td>
                <td>赛事名称</td>
                <td>时间</td>
                <td>比赛</td>
                <td>直播地址</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($lives as $live)
                <tr>
                    <td>{{ $live['type'] or '' }}</td>
                    <td>{{ $live['league'] or '' }}</td>
                    <td>{{ $live['date'] or '' }}</td>
                    <td>{{ $live['name'] or '' }}</td>
                    <td>
                        <a href="/resources/xbet/get_slive_url?url={{ urlencode($live['link'])}}" target="_blank">
                            获取RTMP地址
                        </a>
                    </td>
                    <td>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection