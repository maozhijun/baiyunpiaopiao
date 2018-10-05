{{--{!! $html !!}--}}
<?php $host="http://sstream365.com"; ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="renderer" content="webkit">
    <link rel="shortcut icon" href="{{$host}}/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="{{$host}}/Public/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{$host}}/Tpl/default/system.css?3.9.180725">
    <script type="text/javascript" src="{{$host}}/Public/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="{{$host}}/Public/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{$host}}/Public/js/system.js?3.9.180725"></script>
    <script type="text/javascript" src="{{$host}}/Tpl/default/system.js?3.9.180725"></script>
    <link rel="stylesheet" href="{{$host}}/css/playInfo.css">
    <!--[if lt IE 9]>
    <script src="{{$host}}/Public/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="{{$host}}/Public/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{$host}}/lib/p2p-media-loader-core.min.js?v=01"></script>
    <script src="{{$host}}/lib/p2p-media-loader-hlsjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/clappr@latest/dist/clappr.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/clappr-flvjs-playback@latest/dist/clappr-flvjs-playback.min.js"></script>
</head>
<body class="vod-play">
<div class="container ff-bg">
    <div class="row ff-row">
        <div class="col-md-8 ff-col">
            <div id="cms_player">

                <div id="HLSPlayer"></div>
                {!! $eval !!}
                {{--<SCRIPT LANGUAGE=JavaScript>eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('0 8="";0 6="4%";0 i=d;0 c="/1/1.3";0 e="/1/f.3";0 g="/1/2/b.a";0 5="/1/2/7.9";0 h="j%w%v%u.x.y.B%A%z.t%s%m-l%k%n%o%r.q.p.C";',39,39,'var|HLSPlayer|images|swf|100|vCssurl|vWidth|mini|vID|css|jpg|start1|vPlayer|400|vHLSset|HLS|vPic|vHLSurl|vHeight|http|26e|HEKxw|3Dvw1gMmzn9_2d7sxU|3D1538726417|26ip|53|239|3D120|3Fst|m3u8|2Fcn|2F|3A|hls|livecdn|2Fstream1738144|2Flive|tk|65'.split('|'),0,{}))</SCRIPT>--}}
                <script type="text/javascript" src="{{$host}}/HLSPlayer/js/hls.min.js?rand=20141217"></script>
            </div>
        </div>
    </div>
</div><!--container end -->
<script type="text/javascript">
    window.setInterval("getHlsUrl()", 500);
    function getHlsUrl() {
        var Video = $('#CuPlayerVideo_video_object');
        if (Video) {
            var dataStr = Video.html();
            var dataStrs = dataStr.split('file=');

            for (var i = 0; i < dataStrs.length; i++) {
                var str = dataStrs[i];
                if (str.indexOf(".m3u8") >= 0) {

                    console.log(str);
//                    str = window.btoa(str);
                    location.href = '?hlsUrl=' + str;
                    break;
                }
            }

//            dataStr = dataStr.split('&qualitymonitor')[0];
//            dataStr = dataStr.split('&file=')[1];
//            console.log(3,dataStr);
        }
    }
</script>
</body>
</html>