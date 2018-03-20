@extends('admin.layout.layout')
@section('css')
    <style>
        .self-btn {
            width:99px;height: 30px;display: inline;margin-left: 5px;vertical-align: bottom;
        }
    </style>
@endsection
@section('content')
    <h1 class="page-header">播放器广告设置</h1>
    <div style="margin-bottom: 20px;">
        <button class="btn-success btn-sm btn" id="code">高清验证码</button>
        <input class="form-control self-btn" value="{{isset($images['code']) ? $images['code'] : ''}}" readonly>
        <input style="width: 140px;" class="form-control self-btn" value="{{isset($images['dd_time']) ? $images['dd_time'] : ''}}" placeholder="广告时长默认5秒" id="time" value=""> <b>秒</b>
        <button class="btn-primary btn-sm btn" id="dd_time">设置广告时长</button>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <form method="post" action="/admin/live/player/images/save" enctype="multipart/form-data">
                    <tr>
                        <th>{{csrf_field()}}</th>
                        <th>
                            <select name="type">
                                @foreach($typeCns as $key=>$name)
                                    <option value="{{$key}}">{{$name}}</option>
                                @endforeach
                            </select>
                        </th>
                        <th><input type="file" name="image"></th>
                        <th><button type="submit" class="btn btn-xs btn-success">保存</button></th>
                    </tr>
                </form>
                <tr>
                    <th width="110px;">ID</th>
                    <th width="200px;">广告类型</th>
                    <th>图片</th>
                    <th width="100px;">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($images as $key=>$image)
                    @continue(!isset($typeCns[$key]))
                    <form method="post" action="/admin/live/player/images/save" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <tr>
                            <td>{{$key or ''}}</td>
                            <td>
                                <select name="type" required>
                                    @foreach($typeCns as $tKey=>$name)
                                        <option value="{{$tKey}}" @if($tKey == $key) selected @endif >{{$name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                @if(!empty($image)) <img src="{{$image}}" style="max-width: 70%;max-height: 100px;" /> @endif
                                <input type="file" name="image">
                            </td>
                            <td>
                                <button type="submit" class="btn btn-xs btn-success">保存</button>
                                <a class="btn btn-xs btn-danger" href="javascript:delImage('{{$key}}')">删除</a>
                            </td>
                        </tr>
                    </form>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
        });

        function delImage(type) {
            if (!confirm('是否确认删除该播放器广告图片？')) {
                return;
            }
            location.href = '/admin/live/player/images/del?type=' + type;
        }
        $("#code").click(function () {
            this.setAttribute('disabled', 'disabled');
            if (!confirm('是否确认重新生成高清验证码？')) {
                return;
            }
            location.href = '/admin/live/player/images/set-code';
        });

        $("#dd_time").click(function () {
            var time = $("#time").val();
            if (!/\d+/.test(time) || time < 0) {
                alert('请输入正整数');
                return;
            }
            if (!confirm('是否确认设置广告时间？')) {
                return;
            }
            this.setAttribute('disabled', 'disabled');
            location.href = '/admin/live/player/images/set-time?time=' + time;
        });
    </script>
@endsection