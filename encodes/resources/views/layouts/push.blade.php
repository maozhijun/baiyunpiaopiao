<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>推流后台</title>
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
                    <li role="presentation" {{ starts_with(request()->path(),'manager/hei')?'class=active':'' }}><a href="/manager/hei/">黑土转码</a></li>
                @elseif(env('APP_NAME')=='aikq')
                    <li role="presentation" {{ starts_with(request()->path(),'manager/qq')?'class=active':'' }}><a href="/manager/qq/">爱看球转码</a></li>
                @endif
                <li role="presentation" {{ starts_with(request()->path(),'manager/other')?'class=active':'' }}><a href="/manager/other/">自定义转码</a></li>
                <li role="presentation" {{ starts_with(request()->path(),'manager/qie')?'class=active':'' }}><a href="/manager/qie/">企鹅直播</a></li>
                <li role="presentation" {{ starts_with(request()->path(),'manager/zhibo')?'class=active':'' }}><a href="/manager/zhibo/">中国直播</a></li>
                <li role="presentation" {{ starts_with(request()->path(),'manager/longzhu')?'class=active':'' }}><a href="/manager/longzhu/">龙珠直播</a></li>
            </ul>
            <br>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12">
            @yield('content')
        </div>
    </div>

</div>
</body>
<script src="//cdn.bootcss.com/jquery/2.1.4/jquery.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.js"></script>
<script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
</html>
