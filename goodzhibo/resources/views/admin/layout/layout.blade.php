<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>黑土管理后台</title>
    <!-- Bootstrap -->
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/toastr.js/latest/css/toastr.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/fonts/glyphicons-halflings-regular.svg" rel="stylesheet">
    <link href="{{env('CDN_URL')}}/css/admin/dashboard.css" rel="stylesheet">
    @yield('css')
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/admin/">黑土后台</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">admin</a></li>
                <li><a href="/admin/logout/">退出</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="/admin/links/list">友链列表</a></li>
                <li><a href="/admin/discover/list">发现列表</a></li>
                <li><a href="/admin/comm/communities">社区列表</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            @yield('content')
        </div>
    </div>
</div>
</body>
<script src="//cdn.bootcss.com/jquery/2.1.4/jquery.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.js"></script>
<script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="//cdn.bootcss.com/js-sha1/0.4.1/sha1.js"></script>
<script type="text/javascript">
    $(function () {
        var success = '{{ session('success','') }}';
        var error = '{{ session('error','') }}';
        if (success != '') {
            toastr.success(success);
        } else if (error != '') {
            toastr.error(error);
        }

        var path = window.location.pathname;
        var curA = $("ul.nav-sidebar li a[href^='" + path + "']:first");
        curA.parent().addClass("active");
    });
</script>
@yield('js')
</html>