<?php
use App\Http\Controllers\AuthController;

$role = request()->role;
$pushAccess = AuthController::isAccess($role, AuthController::ACCESS_INDEX_PUSH);
$pullAccess = AuthController::isAccess($role, AuthController::ACCESS_INDEX_PULL);
$obsAccess = AuthController::isAccess($role, AuthController::ACCESS_INDEX_OBS);
$recordAccess = AuthController::isAccess($role, AuthController::ACCESS_INDEX_RECODE);
$settingAccess = AuthController::isAccess($role, AuthController::ACCESS_INDEX_SETTING);

$black = request()->black;
$pushCountAccess = !AuthController::isAccess($black, AuthController::BLACK_INDEX_PUSH_COUNT);
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>推流后台</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- Bootstrap -->
    <link href="/css/bootstrap-theme.css" rel="stylesheet">
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/toastr.css" rel="stylesheet">
    <link href="/css/glyphicons-halflings-regular.svg" rel="stylesheet">
    <link href="{{ asset('/css/dashboard.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="margin-bottom: 0">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    </button>
    <div class="navbar-header" style="background-color: {{ $banner_color or '' }};width: 100%;">
        <a class="navbar-brand" href="/manager/" style="color: #fff;">
            @if($pushCountAccess)
            推流后台-{{ $banner_text or '' }}-当前推流数：<label class="label label-danger">{{ $banner_count or 0 }}条</label>
            @else
            推流后台-{{ $banner_text or '' }}
            @endif
        </a>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                @if(env('APP_NAME')=='aikq' || env('APP_NAME')=='aikq1')
                    @if($pushAccess)
                    <li {{ starts_with(request()->path(),'manager')?'class=active':'' }}>
                        {{--<a href="/manager/longzhu/">推流</a>--}}
                        <a href="/manager/aikqws1/">推流</a>
                    </li>
                    @endif
                    @if($obsAccess)
                    <li {{ starts_with(request()->path(),'obs')?'class=active':'' }}>
                        <a href="/obs/stream/">OBS推流码</a>
                    </li>
                    @endif
                    @if($pullAccess)
                    <li {{ starts_with(request()->path(),'resources')?'class=active':'' }}>
                        <a href="/resources/kball/">直播源</a>
                    </li>
                    @endif
                    @if($recordAccess)
                    <li {{ starts_with(request()->path(),'records')?'class=active':'' }}>
                        <a href="/records/qq/">录像、集锦</a>
                    </li>
                    @endif
                @elseif(env('APP_NAME')=='leqiuba')
                    @if($pushAccess)
                    <li {{ starts_with(request()->path(),'manager')?'class=active':'' }}>
                        <a href="/manager/longzhu/">推流</a>
                    </li>
                    @endif
                    @if($obsAccess)
                    <li {{ starts_with(request()->path(),'obs')?'class=active':'' }}>
                        <a href="/obs/stream/">OBS推流码</a>
                    </li>
                    @endif
                    @if($pullAccess)
                    <li {{ starts_with(request()->path(),'resources')?'class=active':'' }}>
                        <a href="/resources/qq/">直播源</a>
                    </li>
                    @endif
                @endif
                @if($settingAccess)
                <li {{ starts_with(request()->path(),'setting')?'class=active':'' }}>
                    <a href="/setting/video/">推流设置</a>
                </li>
                @endif
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            @yield('navTabs')
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

</div>
</body>
<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/toastr.min.js"></script>
@if(session('error'))
    <script>
        toastr.error('{{ session('error') }}');
    </script>
@endif
</html>
