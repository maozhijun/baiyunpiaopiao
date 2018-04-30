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
                @if($live['SportId']==1 || $live['SportId']==3)
                <tr>
                    <td width="20%">{{ $live['Sport'].'-'.$live['Liga'] }}</td>
                    <td>{{ date('Y-m-d H:i',$live['Start']/1000) }}</td>
                    <td width="30%">{!! $live['Opp1'].'&nbsp;VS&nbsp;'.$live['Opp2'] !!}</td>
                    <td>
                        进行到<label class="label label-warning">{{ $live['Time'] }}</label>分钟
                    </td>
                    <td>
                        <a href="/resources/xbet/get_live_url/{{ $live['FirstGameId'] }}" target="_blank">
                            获取RTMP地址
                        </a>
                    </td>
                    <td>

                    </td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>

@endsection