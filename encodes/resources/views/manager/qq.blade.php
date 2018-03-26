<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>转码列表</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- Bootstrap -->
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/toastr.js/latest/css/toastr.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/fonts/glyphicons-halflings-regular.svg" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    </button>
    <div class="navbar-header">
        <a class="navbar-brand" href="/manager/">推流后台</a>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <ul class="nav nav-tabs">
                @if(env('APP_NAME')=='good')
                    <li role="presentation"><a href="/manager/hei/">黑土转码</a></li>
                @elseif(env('APP_NAME')=='aikq')
                    <li role="presentation" class="active"><a href="/manager/qq/">爱看球转码</a></li>
                @endif
                <li role="presentation"><a href="/manager/other/">自定义转码</a></li>
                <li role="presentation"><a href="/manager/qie/">企鹅直播</a></li>
                <li role="presentation"><a href="/manager/zhibo/">中国直播</a></li>
                <li role="presentation"><a href="/manager/longzhu/">龙珠直播</a></li>
            </ul>
            <br>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12">
            <form action="/manager/qq/created/" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="label-title">名称</label>
                    <input name="name" type="text" class="form-control" id="label-title">
                </div>
                <div class="form-group">
                    <label for="label-watermark">水印内容</label>
                    <input name="watermark" type="text" value="免费看球网址：aikq.cc，加微信【fs188fs】进群聊球抢红包赢iPhone X"
                           class="form-control" id="label-watermark">
                </div>
                <div class="form-group">
                    <label for="label-watermark-location">水印位置</label>
                    <select id="label-watermark-location" name="location" class="form-control">
                        <option value="top">上面</option>
                        <option value="bottom">下面</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="label-resource">源URL</label>
                    <input name="input" type="text" class="form-control" id="label-resource">
                </div>
                <div class="form-group">
                    <label for="label-channel">直播间</label>
                    <select name="channel" class="form-control" id="label-channel">
                        <optgroup label="阿里云">
                            @foreach($alicdns as $key=>$value)
                                @if(!$ets->contains('channel','阿里云##'.$key))
                                    <option value="阿里云##{{ $key }}">阿里云##{{ $key }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                        <optgroup label="GG平台">
                            @foreach($ggcdns as $key=>$value)
                                @if(!$ets->contains('channel','GG##'.$key))
                                    <option value="GG##{{ $key }}">GG##{{ $key }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">新建转码</button>
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
                            </td>
                            <td>
                                <label class="label label-{{ $et->status==1?'success':'danger' }}">{{ $et->status==1?'正常':'停止' }}</label>
                            </td>
                            <td>
                                @if($et->status==1)
                                    <a class="btn btn-xs btn-danger" href="/manager/qq/stop/{{ $et->id }}">停止</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
</body>
<script src="//cdn.bootcss.com/jquery/2.1.4/jquery.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.js"></script>
<script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
</html>
