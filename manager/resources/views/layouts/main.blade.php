<?php
$roleStr = request()->_roleStr;
$role = request()->_role;
$isAdmin = $role > 0 && $role <= \App\Models\Account::K_ROLE_MANAGER;
if ($isAdmin && !isset($groups)) {
    $groups = \App\Models\Group::allGroups();
}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>管理后台</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- Bootstrap -->
    <link href="/css/bootstrap-theme.css" rel="stylesheet">
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/toastr.css" rel="stylesheet">
    <link href="/css/glyphicons-halflings-regular.svg" rel="stylesheet">
    <link href="{{ asset('/css/dashboard.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="margin-bottom: 0">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    </button>
    <div class="navbar-header" style="background-color: {{ $banner_color or '' }};width: 100%;">
        <a class="navbar-brand" href="/" style="color: #fff;">管理后台</a>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        @if(isset($groups))
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li {{ starts_with(request()->path(), "$roleStr/groups")?'class=active':'' }}>
                        <a href="/{{$roleStr}}/groups">管理小组</a>
                    </li>
                    @foreach($groups as $group)
                        <?php $gid = $group->id; ?>
                        <li {{ request()->has('gid') && request()->gid == $gid ? 'class=active':'' }}>
                            <a href="/{{$roleStr}}/members?gid={{$gid}}">{{$group->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-sm-9 @if(isset($groups)) col-sm-offset-3 col-md-10 col-md-offset-2 @endif main">
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
@yield('js')
@if(session('error'))
    <script>
        toastr.error('{{ session('error') }}');
    </script>
@elseif(session('success'))
    <script>
        toastr.success('{{ session('success') }}');
    </script>
@endif
</html>
