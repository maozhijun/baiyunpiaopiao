{{--@extends('layouts.resources')--}}
{{--@section('content')--}}
{{--<p id="url" style="">加载中</p>--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--<script src="/js/jquery.js"></script>--}}
{{--<script type="text/javascript">--}}
{{--var play_url = '加载失败';--}}
{{--var bj = '{!! $js !!}';--}}
{{--console.log(bj);--}}
{{--eval(bj);--}}
{{--$('#url')[0].innerHTML = play_url;--}}
{{--</script>--}}
{{--@endsection--}}
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
<textarea id="url" style="width: 90%;height: 60px">加载中</textarea>
</body>
<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/toastr.min.js"></script>
@if(session('error'))
    <script>
        toastr.error('{{ session('error') }}');
    </script>
@endif
<script type="text/javascript">
    var play_url = '加载失败';
    var bj = '{!! $js !!}';
    console.log(bj);
    eval(bj);
    $('#url')[0].innerHTML = play_url;
</script>
</html>
