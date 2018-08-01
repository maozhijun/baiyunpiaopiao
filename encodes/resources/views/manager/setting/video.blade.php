@extends('layouts.setting')
@section('content')
    <form action="/manager/custom/created/" method="post">
        {{ csrf_field() }}
        <div class="form-inline form-group">
            <label for="label-size">默认分辨率</label>
            <select name="size" class="form-control" id="label-size">
                @foreach($sizes as $key=>$size)
                    <option value="{{ $key }}" @if($key == $default_sizes) selected @endif>{{ $size['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-inline form-group">
            <label class="checkbox-logo">
                <input name="logo" type="checkbox" id="checkbox-logo" value="1" checked> 默认是否显示Logo挡板
            </label>
        </div>
        <div class="form-inline form-group">
            <label for="label-logo-text">默认Logo文案</label>
            <input name="logo_text" type="text" value="{{ $logo_text }}" class="form-control" id="label-logo-text"
                   size="20">
        </div>
        <div class="form-inline form-group">
            <label for="label-position">默认Logo位置</label>
            <select name="logo_position" class="form-control" id="label-position">
                @foreach($logo_position as $key=>$position)
                    <option value="{{ $key }}" @if($key == $default_logo_position) selected @endif>{{ $position['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-inline form-group">
            <label for="label-watermark">默认水印内容</label>
            <input name="watermark" type="text" value="{{ $watermark }}"
                   class="form-control" id="label-watermark" size="70">
        </div>
        <div class="form-inline form-group">
            <label for="label-watermark-location">默认水印位置</label>
            <select id="label-watermark-location" name="location" class="form-control">
                <option value="bottom" @if('bottom' == $default_position) selected @endif>下面</option>
                <option value="top" @if('top' == $default_position) selected @endif>上面</option>
            </select>
            {{--<label for="label-fontsize">字体大小</label>--}}
            {{--<input name="fontsize" type="text" value="{{ $fontsize }}" class="form-control" id="label-fontsize" size="4">--}}
        </div>
        <button type="submit" class="btn btn-primary">保存设置</button>
    </form>
@endsection