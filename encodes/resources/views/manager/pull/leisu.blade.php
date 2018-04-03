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
                    <td>{{ $leagues[$live[1]][0] }}</td>
                    <td>{{ date('Y-m-d H:i',$live[3]) }}</td>
                    <td>{!! $live[5][1].'&nbsp;VS&nbsp;'.$live[6][1] !!}</td>
                    <td>
                        @if($live[2] == 1)
                            <label class="label label-default">未开始</label>
                        @elseif($live[2] == 2)
                            <label class="label label-info">上半场</label>
                        @elseif($live[2] == 3)
                            <label class="label label-warning">中场</label>
                        @elseif($live[2] == 4)
                            <label class="label label-success">下半场</label>
                        @else
                            {{ $live[2] }}
                        @endif
                    </td>
                    <td>
                        <a href="/resources/leisu/get_live_url/{{ $live[0] }}" target="_blank" title="右击复制地址">
                            获取RTMP地址
                        </a>
                    </td>
                    <td>
                        @if($live[2] == 0)
                            <a class="btn btn-xs btn-danger" href="/manager/leisu/created/">推流</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection