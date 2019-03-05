<!DOCTYPE html>
<html>
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

<body style="display: none" data-spm="8243346"><script>
//    with(document)with(body)with(insertBefore(createElement("script"),firstChild))setAttribute("exparams","userid=&aplus&sidx=0&ckx=|",id="beacon-aplus",src="//g.alicdn.com/alilog/mlog/aplus_o.js")
    with(document)with(body)with(insertBefore(createElement("script"),firstChild))setAttribute("exparams","userid=&aplus&sidx=0&ckx=|",id="beacon-aplus",src="/js/youku/aplus_o.js")
</script>
<div id="preview">
    <div class="preview-container">
        <div class="preview-video"></div>
        <div class="preview-info"></div>
        <div class="preview-footer"></div>
    </div>
</div>
<script src="/js/jquery.js"></script>
<script src="/js/youku/youku.js"></script>
{{--<script src="//log.mmstat.com/eg.js"></script>--}}
{{--<script src="/js/youku/eg.js"></script>--}}
<script src="//g.alicdn.com/code/npm/web-rax-framework/0.6.4/dist/framework.web.min.js"></script>
{{--<script src="/js/youku//framework.web.min.js"></script>--}}
<script src="//g.alicdn.com/mtb/lib-promise/3.1.3/polyfillB.js"></script>
{{--<script src="/js/youku/polyfillB.js"></script>--}}
<script src="//g.alicdn.com/mtb/lib-mtop/2.4.2/mtop.js"></script>
{{--<script src="/js/youku/mtop.js"></script>--}}
<script src="//g.alicdn.com/mtb/lib-powermsg-sdk/1.3.7/powermsg.js"></script>
{{--<script src="/js/youku/powermsg.js"></script>--}}
<script src="//g.alicdn.com/statics/live-h5/1.6.7/static/js/share.min.js"></script>
{{--<script src="/js/youku/share.min.js"></script>--}}
<script src="//g.alicdn.com/dingding/dingtalk-jsapi/2.0.48/dingtalk.open.js"></script>
{{--<script src="/js/youku/dingtalk.open.js"></script>--}}
<script src="//g.alicdn.com/player/ykplayer/0.5.81/done_aes-secret_.js"></script>
{{--<script src="/js/youku/done_aes-secret_.js"></script>--}}
<script>
    lib.mtop.config.prefix = 'acs';
    lib.mtop.config.subDomain = '';
    lib.mtop.config.mainDomain = 'youku.com';
    lib.mtop.config.liveAppkey = 24679788;

    window.onload = function () {
        var _m_h5_tk = getCookieItem("_m_h5_tk");
        var _m_h5_tk_enc = getCookieItem("_m_h5_tk_enc");

        var cookies = "";
        var token = "";
        if (_m_h5_tk && _m_h5_tk.length > 0) {
            cookies = "_m_h5_tk=" + _m_h5_tk + "; _m_h5_tk_enc=" + _m_h5_tk_enc + ";";
            token = _m_h5_tk.split("_")[0];
        }
        var time = new Date().getTime();

        var appKey, url;
        var liveId = '{{$id}}';
        var sign = getYoukuSignByLiveId(token, time, liveId);
        var data = getYoukuRequestData(liveId);
        if (liveId && liveId.length > 0) {
            appKey = streamInfoKey;
            url = "{{env('HOST_URL')}}" + "/resources/youku/get_live_url/" + liveId;
        } else {
            appKey = liveInfoKey;
            url = "{{env('HOST_URL')}}" + "/resources/youku"
        }
        var params = "appKey=" + appKey + "&t=" + time + "&sign=" +  sign + "&data=" + data;

        location.href = url + "?cookies=" + encodeURIComponent(cookies) + "&params=" + encodeURIComponent(params);
//        var href = url + "?cookies=" + encodeURIComponent(cookies) + "&params=" + encodeURIComponent(params);
//        console.log(href);
//        console.log(cookies);
//        console.log(appKey, time, sign, data);
    }
</script>
<script src="//g.alicdn.com/statics/pgcplayer/0.3.5/static/js/spv.js"></script>
{{--<script src="/js/youku/spv.js"></script>--}}
{{--<script src="//g.alicdn.com/live-platform/youku-live-rax/1.6.55/loader/h5/index.web.js"></script>--}}
<script src="/js/youku/index.web.js"></script>
</body>
</html>