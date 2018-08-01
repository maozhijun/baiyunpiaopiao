<div class="form-inline form-group">
    <label for="label-title">名称</label>
    <input name="name" type="text" class="form-control" id="label-title" size="50">
</div>
<div class="form-inline form-group">
    <label for="label-size">分辨率</label>
    <select name="size" class="form-control" id="label-size">
        @foreach($sizes as $key=>$size)
            <option value="{{ $key }}" @if($key == $default_sizes) selected @endif>{{ $size['name'] }}</option>
        @endforeach
    </select>

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
        <option value="bottom" @if('bottom' == $default_position) selected @endif>下面</option>
        <option value="top" @if('top' == $default_position) selected @endif>上面</option>
    </select>
    {{--<label for="label-fontsize">字体大小</label>--}}
    {{--<input name="fontsize" type="text" value="{{ $fontsize }}" class="form-control" id="label-fontsize" size="4">--}}
</div>
<div class="form-inline form-group">
    <label for="label-resource">源地址</label>
    <input name="input" type="text" class="form-control" id="label-resource" size="120">
</div>
<div class="form-inline form-group">
    <label for="label-referer">Referer(Http源)</label>
    <input name="referer" type="text" class="form-control" id="label-referer" size="40">
    <label for="label-header1">Header1(Http源)</label>
    <input name="header1" type="text" class="form-control" id="label-header1" size="40">
</div>
<div class="form-inline form-group">
    <label for="label-header2">Header2(Http源)</label>
    <input name="header2" type="text" class="form-control" id="label-header2" size="40">
    <label for="label-header3">Header3(Http源)</label>
    <input name="header3" type="text" class="form-control" id="label-header3" size="40">
</div>