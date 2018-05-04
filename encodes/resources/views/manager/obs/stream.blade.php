@extends('layouts.obs')
@section('content')
    <form action="/obs/stream/take-stream/" method="post">
        {{ csrf_field() }}
        <div class="form-inline form-group">
            <label for="label-title">名称</label>
            <input name="name" type="text" class="form-control" id="label-title" size="30">
            <label for="label-channel">平台</label>
            <select name="channel" class="form-control" id="label-channel">
                @foreach($channels as $name => $cs)
                    <optgroup label="{{ $name }}">{{ $name }}</optgroup>
                    @foreach($cs as $name => $channel)
                        @if(!$streams->contains('channel',$channel))
                            <option value="{{ $channel }}">{{ explode('?',$channel)[0] }}</option>
                        @endif
                    @endforeach
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">获取推流码</button>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>名称</td>
                <td>房间</td>
                <td>推流地址</td>
                <td>播放地址</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($streams as $stream)
                <tr>
                    <td width="10%">{{ $stream->name }}</td>
                    <td width="20%">{{ explode('?',$stream->channel)[0] }}</td>
                    <td width="30%">
                        <textarea rows="6" style="width:100%;" readonly>{{ $stream->push_rtmp }}</textarea>
                    </td>
                    <td width="30%">
                        <textarea rows="6" style="width:100%;" readonly>{{ $stream->live_lines }}</textarea>
                    </td>
                    <td>
                        <a class="btn btn-xs btn-danger"
                           href="javascript:if(confirm('确认释放')) location.href='/obs/stream/release-stream/{{ $stream->id }}'">释放推流码</a>
                        @if($stream->platform == 'long' && $stream->status == 2)
                            <br>
                            <br>
                            <a class="btn btn-xs btn-warning"
                               href="javascript:if(confirm('确认关闭')) location.href='/obs/stream/close-long-stream/{{ $stream->id }}'">关闭平台直播</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
