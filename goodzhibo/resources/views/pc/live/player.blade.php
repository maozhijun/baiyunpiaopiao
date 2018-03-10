<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta charset="UTF-8">
    <meta name="referrer" content="no-referrer">
    <title>黑土体育-体育数据|足球比分|篮球网球比分直播|竞猜足球|世界杯|五大联赛|NBA|CBA|高清直播</title>
    <link rel="stylesheet" type="text/css" href="{{env('CDN_URL')}}/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{env('CDN_URL')}}/css/player.css">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <meta http-equiv="X-UA-Compatible" content="edge" />
    <meta name="renderer" content="webkit|ie-stand|ie-comp">
    <meta name="baidu-site-verification" content="nEdUlBWvbw">
    <link rel="Shortcut Icon" data-ng-href="{{env('CDN_URL')}}/img/ico.ico" href="{{env('CDN_URL')}}/img/ico.ico">
</head>
<body scroll="no">
<div class="player_content" id="MyFrame"></div>
</body>
<script type="text/javascript" src="//apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="//imgcache.qq.com/open/qcloud/video/vcplayer/TcPlayer-2.2.0.js"></script>
<script type="text/javascript" src="{{env('CDN_URL')}}/js/public/pc/ckplayer/ckplayer.js"></script>

<script type="text/javascript">
    function isMobileWithJS() {
        var u = navigator.userAgent;
        var isAndroid = u.indexOf('Android') > -1; //android终端或者uc浏览器
        var isiPhone = u.indexOf('iPhone') > -1; //是否为iPhone或者QQ HD浏览器
        var isiPad = u.indexOf('iPad') > -1; //是否iPad
        return (isAndroid || isiPhone || isiPad) ? '1' : '';
    }
    function ShareWarm (Text) {
        var P = document.createElement('p');
        P.id = 'ShareWarm';
        P.innerHTML = Text;
        document.body.appendChild(P)
    }
    window.host = window.location.host;
    window.isMobile = isMobileWithJS();
</script>
<script type="text/javascript" src="{{env('CDN_URL')}}/js/public/pc/player.js?t=2018030300002"></script>
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?80abd79db1a96ee8d5904e6268e7c34a";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
<script type="text/javascript">
    window.onload = function () { //需要添加的监控放在这里
        LoadVideo();
    }
</script>
</html>