@extends('layouts.push')
@section('content')
    <form action="/manager/other/created/" method="post">
        {{ csrf_field() }}
        @component('layouts.video_setting')
        @endcomponent
        <div class="form-inline form-group">
            <label for="label-channel">推送地址</label>
            <input name="channel" type="text" class="form-control" id="label-channel" size="120">
        </div>
        <div class="form-inline form-group">
            <label for="label-output">播放地址</label>
            <input name="output" type="text" class="form-control" id="label-output" size="120">
        </div>
        <button type="submit" class="btn btn-primary">新建转码</button>
        {{--<p>{{ $exec or '' }}</p>--}}
    </form>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>名称</td>
                <td>直播间</td>
                <td>地址</td>
                <td>开始时间</td>
                <td>状态</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($ets as $et)
                <tr>
                    <td width="15%">{{ $et->name }}</td>
                    <td>{{ $et->channel }}</td>
                    <td width="50%">
                        <textarea rows="6" style="width:100%;" readonly>{{ $et->out }}</textarea>
                    </td>
                    <td>
                        {{ substr($et->created_at,5,11) }}
                        <br>
                        {{ substr($et->updated_at,5,11) }}
                    </td>
                    <td>
                        <label class="label label-{{ $et->status==1?'success':'danger' }}">{{ $et->status==1?'正常':'停止' }}</label>
                    </td>
                    <td>
                        @if($et->status != 0)
                            <a class="btn btn-xs btn-danger"
                               href="javascript:if(confirm('确认删除')) location.href='/manager/other/stop/{{ $et->id }}'">停止</a>
                            <br><br>
                            <a class="btn btn-xs btn-warning"
                               href="javascript:if(confirm('确认重推')) location.href='/manager/other/repeat/{{ $et->id }}'">重推</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
