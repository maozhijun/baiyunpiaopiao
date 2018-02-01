<!DOCTYPE HTML>
<html>
<head>
    @yield('title')
    <meta name="Keywords" content="黑土体育-体育数据|足球比分|篮球网球比分直播|竞猜足球|世界杯|五大联赛|NBA|CBA|高清直播">
    <meta name="Description" content="黑土体育是专业提供体育数据足球比分、篮球比分等专业体育数据平台，最快的足球比分直播、篮球比分直播、网球比分、斯诺克等比分直播，更有足球情报、篮球情报等及时发布，黑土体育努力做最好的体育数据平台">
    <meta charset="utf-8"/>
    <meta content="telephone=no,email=no" name="format-detection"/>
    <meta name="viewport" content="width=device-width, initial-scale=0.5, maximum-scale=0.5, minimum-scale=0.5, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{env('CDN_URL')}}/css/mobile/style_phone.css">
    @yield('css')
    <link rel="Shortcut Icon" data-ng-href="{{env('CDN_URL')}}/img/ico.ico" href="{{env('CDN_URL')}}/img/ico.ico">
    <script type="text/javascript">
        if(!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {

        } else {
            var url = window.location.href;
            url = url.split('/');
            var str = '';
            if (url[3] == 'm'){
                for (var i = 0 ; i < url.length ; i++){
                    if (i == 3){
                        continue;
                    }
                    str = str + url[i] + '/';
                }
                str = str.substr(0,str.length - 1);
                window.location = str;
            }
        }
    </script>
</head>
<body @yield('body_attr') >
@yield('banner')
@yield('content')
@yield('bottom')
</body>
<script type="text/javascript" src="//apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
@yield('js')
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?2966b2031ac2b01631362b1474d7f853";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
</html>