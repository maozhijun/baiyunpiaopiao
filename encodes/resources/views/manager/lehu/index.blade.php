@extends('layouts.lehu')
@section('content')
    <form action="/lehu/stream/push/" method="post">
        {{ csrf_field() }}

        <div class="form-inline form-group">
            <label for="label-channel">推流房间</label>
            <select name="room" class="form-control" id="label-channel">
                @foreach($rooms as $room)
                    @if($room->live_status == '0')
                        <option value="{{ $room->id.'-'.$room->room_num.'-'. $room->nickname }}">{{ $room->nickname }}</option>
                    @endif
                @endforeach
            </select>
            <label for="label-channel">房间类型</label>
            <select name="type" class="form-control" id="label-channel">
                @foreach($types as $type)
                    <optgroup label="{{ $type->name }}">{{ $type->name }}</optgroup>
                    @foreach($type->children as $st)
                        <option value="{{ $type->id.'-'.$st->id }}">{{ $st->name }}</option>
                    @endforeach
                @endforeach
            </select>
            <label for="label-logo-text">房间标题</label>
            <input name="title" type="text" value="" class="form-control" id="label-logo-text"
                   size="40">
            <label for="label-channel">计费类型</label>
            <select name="platform" class="form-control" id="label-channel">
                {{--<option value="3">网宿计费</option>--}}
                <option value="5">鲨鱼直播</option>
                <option value="4">阿里计费</option>
            </select>
        </div>
        <div class="form-inline form-group">
            <label class="checkbox-logo">
                <input name="logo" type="checkbox" id="checkbox-logo" value="1" @if(1 == $default_has_logo) checked @endif> 是否显示Logo挡板
            </label>

            <label for="label-logo-text">Logo文案</label>
            <input name="logo_text" type="text" value="{{ $logo_text }}" class="form-control" id="label-logo-text"
                   size="20">

            <label for="label-position">Logo位置</label>
            <select name="logo_position" class="form-control" id="label-position">
                @foreach($logo_position as $key=>$position)
                    <option value="{{ $key }}" @if($key == $default_logo_position) selected @endif>{{ $position['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-inline form-group">
            <label for="label-watermark">水印内容</label>
            <input name="watermark" type="text" value="{{ $watermark }}"
                   class="form-control" id="label-watermark" size="70">
            <label for="label-watermark-location">水印位置</label>
            <select id="label-watermark-location" name="location" class="form-control">
                <option value="bottom" @if('bottom' == $default_location) selected @endif>下面</option>
                <option value="top" @if('top' == $default_location) selected @endif>上面</option>
            </select>
            {{--<label for="label-fontsize">字体大小</label>--}}
            {{--<input name="fontsize" type="text" value="{{ $fontsize }}" class="form-control" id="label-fontsize" size="4">--}}
        </div>
        <div class="form-inline form-group">
            <label for="label-resource">源地址</label>
            <input name="input" type="text" class="form-control" id="label-resource" size="100">
            <button type="submit" class="btn btn-primary">一键转推</button>
        </div>
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
                        <label class="label label-{{ $et->status == 1?'success':'danger' }}">{{ $et->status == 1?'正常':'停止' }}</label>
                    </td>
                    <td>
                        @if($et->status != 0)
                            <a class="btn btn-xs btn-danger"
                               href="javascript:if(confirm('确认删除')) location.href='/lehu/stream/stop/{{ $et->id }}'">停止</a>
                            <br><br>
                            <a class="btn btn-xs btn-warning"
                               href="javascript:if(confirm('确认重推')) location.href='/lehu/stream/repeat/{{ $et->id }}'">重推</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection