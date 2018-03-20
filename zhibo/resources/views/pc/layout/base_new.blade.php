<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta charset="UTF-8">
    <title>黑土体育-体育数据|足球比分|篮球网球比分直播|竞猜足球|世界杯|五大联赛|NBA|CBA|高清直播</title>
    <meta name="Keywords" content="免费直播,体育直播,足球直播,NBA直播,JRS,低调看直播,直播吧,CCTV5在线直播,CCTV5+在线直播">
    <meta name="Description" content="黑土体育是专业提供体育数据足球比分、篮球比分等专业体育数据平台，最快的足球比分直播、篮球比分直播、网球比分、斯诺克等比分直播，更有足球情报、篮球情报等及时发布，黑土体育努力做最好的体育数据平台">
    <meta http-equiv="X-UA-Compatible" content="edge" />
    <meta name="renderer" content="webkit|ie-stand|ie-comp">
    <meta name="baidu-site-verification" content="nEdUlBWvbw">
    <script type="text/javascript">
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            var url = window.location.href;
            if (url.indexOf('lives.html') != -1) {
                window.location = '/m/football/lives.html';
            } else {
                url = url.split('/');
                var str = '';
                for (var i = 0 ; i < url.length ; i++){
                    str = str + url[i] + '/';
                    if (i == 2){
                        str += 'm/';
                    }
                }
                if (url.length == 4){
                    str = str.substr(0,str.length - 1);
                } else{
                    str = str.substr(0,str.length - 1);
                }
                if (str.indexOf('.html') != -1 && str.lastIndexOf('/') == str.length - 1) {
                    str = str.substr(0, str.length - 1);
                }
                window.location = str;
            }
        }
    </script>
    <link rel="stylesheet" type="text/css" href="{{env('CDN_URL')}}/css/pc/style.css">
    @yield('css')
    <link rel="Shortcut Icon" data-ng-href="{{env('CDN_URL')}}/img/pc/ico.ico" href="{{env('CDN_URL')}}/img/pc/ico.ico">
</head>
<?php $nav = isset($nav) ? $nav : ''; ?>
<body>
<div id="Navigation">
    <div class="inner">
        <a href="/"><img class="icon" src="{{env('CDN_URL')}}/img/pc/logo_heitu.png"></a>
        {{--<a class="column {{$nav == 'football' ? 'on' : ''}}" @if($nav != 'football') href="/football/immediate.html" @endif ><span>足球</span></a>--}}
        {{--<a class="column {{$nav == 'basketball' ? 'on' : ''}}" @if($nav != 'basketball') href="/basketball/immediate.html" @endif ><span>篮球</span></a>--}}
        {{--<a class="column {{$nav == 'lives' ? 'on' : ''}}" @if($nav != 'lives') href="/lives.html" @endif ><span>直播</span></a>--}}
        {{--<a class="column {{$nav == 'download' ? 'on' : ''}}" @if($nav != 'download') href="/download.html" @endif ><span>手机直播</span></a>--}}
    </div>
</div>
@yield('content')
<div id="Bottom">
    <?php $links = \App\Http\Controllers\Admin\LinkController::getLinks(); ?>
    @if(isset($links) && count($links) > 0)<p>友情链接：@foreach($links as $link)<a target="_blank" href="{{$link['link']}}">{{$link['name']}}</a>@endforeach</p>@endif
    <p>Copyright 2014-2015 ©www.goodzhibo.com, All rights reserved.商户合作QQ：<a style="margin-left: 0;" href="tencent://AddContact/?fromId=50&fromSubId=1&subcmd=all&uin=2801866107" target="_blank">2801866107</a></p>
    <p>免责声明：本站所有直播和视频链接均由网友提供，如有侵权问题，请及时联系，我们将尽快处理。</p>
</div>
@yield('bottom')
</body>
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?80abd79db1a96ee8d5904e6268e7c34a";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
<script type="text/javascript" src="//apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
@yield('js')
</html>