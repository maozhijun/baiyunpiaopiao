<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta content="telephone=no,email=no" name="format-detection" />
    <meta name="viewport" content="width=device-width, initial-scale=0.5, maximum-scale=0.5, minimum-scale=0.5, user-scalable=no">
    <meta name="format-detection" content="telephone=no" />
    <link rel="stylesheet" type="text/css" href="{{env('CDN_URL')}}/css/mobile/style_phone.css">
    <link rel="stylesheet" type="text/css" href="{{env('CDN_URL')}}/css/mobile/matchPhone.css">
    @yield('css')
    {{--<link rel="Shortcut Icon" data-ng-href="{{asset('img/customer3/ico.ico')}}" href="{{asset('img/customer3/ico.ico')}}">--}}
    {{--<link href="{{asset('img/customer2/icon_face.png')}}" sizes="100x100" rel="apple-touch-icon-precomposed">--}}
    <script type="text/javascript" src="//apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <title>料狗</title>
</head>
<body @yield('body_attr') >
@yield('banner')
@yield('content')
@yield('bottom')
</body>
<script type="text/javascript">
    window.onload = function () {
        setPage();
        setCanvas();
    }
</script>
<script type="text/javascript" src="{{env('CDN_URL')}}/js/public/mobile/matchPhone.js"></script>
@yield('js')
</html>

