<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta charset="UTF-8">
    <title>黑土体育-体育数据|足球比分|篮球网球比分直播|竞猜足球|世界杯|五大联赛|NBA|CBA|高清直播</title>
    <link rel="stylesheet" type="text/css" href="{{env('CDN_URL')}}/css/player.css?time=20180126">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <meta http-equiv="X-UA-Compatible" content="edge" />
    <meta name="renderer" content="webkit|ie-stand|ie-comp">
    <meta name="baidu-site-verification" content="nEdUlBWvbw">
    <link rel="Shortcut Icon" data-ng-href="{{env('CDN_URL')}}/img/ico.ico" href="{{env('CDN_URL')}}/img/ico.ico">
</head>
<body scroll="no">
<iframe width="100%" height="100%" id="MyFrame">
</iframe>
</body>
<script type="text/javascript" src="//apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">
    //获取是S还是非S
    function GetHttp () {
        if (location.href.indexOf('https://') != -1) {
            return 'https://';
        }else{
            return 'http://';
        }
    }
    //通过播放地址判断使用http头
    function CheckHttp (Link) {
        if (Link.indexOf('.flv') != -1 || Link.indexOf('rtmp://') == 0 || Link.indexOf('.m3u8') != -1) { //播放方式为播放器播放
            return 'https://';
        }else{
            return 'http://';
        }
    }
    //获取地址
    function PlayVideoShare(mid ,sport) {
        var host = '{{$_SERVER['HTTP_HOST']}}';
        $.ajax({
            url: '/match/live/url/match/' + mid + '?sport=' + sport,
            type:'GET',
            dataType:'json',
            success:function(data){
                if (data.code == 0){
                    var preUrl;
                    if (GetHttp() == 'https://') { //如果当前地址是https，则只能使用https的player
                        preUrl = 'https://' + host + '/live/player.html?sport=' + sport + '&cid=' + data.cid;
                    }else{ //如果当前地址是http
                        if (data.play == 11) { //规定了播放方式，并为iframe方式，使用http
                            preUrl = 'http://' + host + '/live/player.html?sport=' + sport + '&cid=' + data.cid;
                        }else if (data.play >= 12) { //规定了播放方式，并为播放器播放，使用https
                            preUrl = 'https://' + host + '/live/player.html?sport=' + sport + '&cid=' + data.cid;
                        } else if (data.playurl) { //如果无规定，则要对playurl做判断
                            preUrl = CheckHttp(data.playurl) + host + '/live/player.html?sport=' + sport + '&cid=' + data.cid;
                        }else if (data.js){ //如果加密了，无playurl，用https
                            preUrl = 'https://' + host + '/live/player.html?sport=' + sport + '&cid=' + data.cid;
                        }
                    }
                    var MyFrame = document.getElementById('MyFrame');
                    MyFrame.setAttribute('allowfullscreen','true');
                    MyFrame.setAttribute('scrolling','no');
                    MyFrame.setAttribute('frameborder','0');
                    MyFrame.src = preUrl;
                }
            }
        })
    }

    window.onload = function () { //需要添加的监控放在这里
        var mid = '{{request('mid')}}';
        var sport = '{{request('sport')}}';
        if (mid && mid != '') {
            PlayVideoShare(mid, sport);
        }
    }
</script>
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?80abd79db1a96ee8d5904e6268e7c34a";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
</html>