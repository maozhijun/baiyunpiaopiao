<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>银过48开心每一天-章鱼-全民原创互动的体育直播</title>
    <meta content="章鱼,中超直播,章鱼直播,体育直播,原创体育,体育解说,户外项目直播" name="keywords">
    <meta name="Description"
          content="章鱼是全民原创互动的体育直播，为观众提供覆盖面最广的比赛和多样化的直播体验。章鱼的直播内容包括中超、英超、足总杯、国王杯、WTA、MLB等热门联赛，也包括花样滑冰、短道速滑、羽毛球、乒乓球、户外项目、赛车等项目。">

    <link href="http://crossorigin.kukuplay.com/cdns/zyuser/201704//favicon.ico" rel="shortcut icon"
          type="image/x-icon"/>
    <link rel="stylesheet" href="http://crossorigin.kukuplay.com/cdns/zyuser/201704//static/css/font/font_4891000.css"/>
    <link rel="stylesheet"
          href="http://crossorigin.kukuplay.com/cdns/zyuser/201704//static/css/header/header-spring-narrow_520f11a.css"/>
    <link rel="stylesheet" href="http://crossorigin.kukuplay.com/cdns/zyuser/201704//static/css/play/play_b51f18c.css"/>
</head>
<body class="fixed">

<div class="main" id="main">
    <div class="main-inner clear" id="main-inner">
        <div id="sc-panel">
            <div class="left-wrap">

                <div class="play-head">
                    <div class="head-inner">
                        <div class="play-title" id="play-title" data-cname="银过48开心每一天"
                             data-pic="http://oss.zhangyu.tv/live/zy_1506586539569.jpg">
                            {{ $json['cname'] }}
                        </div>
                    </div>
                </div>
                <!--播放器-->

                <div class="play-wrap" id="play-wrap">
                    <div class="playcode">
                        <div id="codeinner"></div>
                        <div class="flash-install-tip">
                            <div class="tip-title">陛下，您的Flash插件已过期，无法播放视频了</div>
                            <div class="tip-advice">建议...</div>
                            <div class="install-panel">
                                <a href="http://www.adobe.com/go/getflashplayer" target="_blank"
                                   class="flash_install_option" title="升级Flash插件"></a>
                                <a href="http://www.adobe.com/go/getflashplayer" target="_blank"
                                   class="flash_install_text">升级 Flash 插件</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
    <div class="right-wrap" id="right-wrap">

        <!--收起按钮-->
        <div class="video-switch-bar" id="video-switch-bar"></div>
        <!--右侧内部-->
        <div class="right-inner">
            <!--聊天室-->
            <div class="chat-wrap">
                <ul>
                    <li class="empty-msg">
                        <div class="u-info"><span class="lb"></span><span class="u-name"></span><span
                                    class="msg"></span></div>
                    </li>
                    <li id="lucky-msg">
                        <div class="u-info"></div>
                    </li>
                </ul>
                <div class="chat-sc">
                    <div class="chat-list" id="chat-list">
                        <ul id="msg-list" class="sc_content">
                            <div class="empty"></div>
                        </ul>
                    </div>
                </div>
                <div id="batter-box">
                </div>
                <div class="chat-op">
                    <div class="scro-tip" id="scro-tip">有更多消息</div>
                    <textarea name="" id="msg-ipt" max="60" class="msg-ipt"></textarea>
                    <div id="send_flash">
                        <input type="button" onclick="funSpeak(this);" style="width:64px;" value="开始"/>
                    </div>
                </div>
            </div>

            <!--红包-->

            <div class="reward-wrap zymove" id="reward-wrap">
                <div class="reward get current">
                    <i class="iconfont close close-packet">&#xe62b;</i>
                    <!--<div class="close close-packet" style="top: 45px; right: -2px; "></div>-->
                    <div class="u-icon"><img src="http://static.ws.kukuplay.com/images/zydefaultupic.jpg" alt=""
                                             id="packet-uimg" class=""/>
                        <div class="uimg-cover"></div>
                    </div>
                    <div class="info hb-info">主播发红包啦</div>
                    <div class="reward-btn get-btn" id="get-packet-btn"></div>
                    <div class="t-info">还有<span class="ti" id="exttime"></span>秒消失</div>
                </div>
                <div class="reward luck">
                    <!--<div class="close close-redpacked"></div>-->
                    <i class="iconfont close close-redpacked">&#xe62b;</i>
                    <div class="u-icon"><img src="http://static.ws.kukuplay.com/images/zydefaultupic.jpg"/>
                        <div class="uimg-cover"></div>
                    </div>
                    <div class="info u-info" id="packet-u-info"></div>
                    <div class="info reward-desc"></div>
                    <div class="info m-info" id="packet-money"></div>
                    <div class="luck-btn luck-sure"></div>

                    <div class="t-info">请到移动端提现，<a href="http://www.zhangyu.tv/download" target="_blank">下载APP</a></div>
                    <div class="t-info t-info2" style="top:154px">(7日过期)</div>
                </div>
                <div class="reward unluck">
                    <i class="iconfont close close-redpacked">&#xe62b;</i>
                    <div class="u-icon"><img src="http://static.ws.kukuplay.com/images/zydefaultupic.jpg"/>
                        <div class="uimg-cover"></div>
                    </div>
                    <div class="info u-info" id="packet-u-info"></div>
                    <div class="info reward-desc"></div>
                    <div class="info m-info" id="packet-money">红包已经抢光了</div>
                    <div class="luck-btn luck-sure"></div>
                    <div class="t-info">别灰心，再接再厉</div>
                </div>
            </div>

            <div id="fa-gift-wrap">
                <div id="fa-gift"></div>
            </div>
            <!--酒桶-->


            <div class="jt-all-wrap">
                <div class="jt-wrap" id="jt-wrap">
                    <div class="abt jt-expand">
                        <div class="abt expand-icon small zymove"></div>
                    </div>
                    <a href="/lottery/lottery/turntable?from=jiutong" target="_blcnk" class="jt-link">
                        <div class="abt jt-bk"></div>
                        <div class="abt jt-task" id="jt-task"><span class="jt-name">黄金酒桶任务</span><span
                                    class="num">45</span>/<span class="all">150</span></div>
                        <div class="abt jt-slide">
                            <div class="abt jt-process" id="jt-process"></div>
                        </div>
                        <div class="abt  jt-img-panel small">
                            <div class="abt jt-success-light"></div>
                            <div class="abt jt-img by-1" id="jt-img"></div>
                        </div>
                        <div class="abt overtime"></div>
                        <div class="abt success-tip"></div>
                        <div class="abt end-tip" id="end-tip">
                            <div class="abt end-icon"></div>
                            <span class="end-info count">结束时间 <span class="count-num" id="count-num"
                                                                    style="color:#fff;margin-left:5px;"></span></span>
                            <span class="end-info over"><span style="color:#c12727"></span> 秒后自动关闭</span>
                        </div>
                    </a>
                    <div class="abt jt-open-tip">
                        主播发起了<span>白银</span>酒桶任务
                    </div>
                </div>
                <div class="jt-small-wrap" id="jt-small-wrap" class="jt-link">
                    <div class="abt jt-expand">
                        <div class="abt expand-icon big zymove"></div>
                    </div>
                    <a href="/lottery/lottery/turntable?from=jiutong" target="_blcnk">
                        <div class="abt jt-bk"></div>
                        <div class="abt jt-img-panel">
                            <div class="jt-img by-1" id="jt-small-img"></div>
                        </div>
                        <div class="abt tip">当前进度</div>
                        <div class="abt small-process" id="jt-small-task"><span class="num">45</span>/<span class="all">150</span>
                        </div>
                    </a>
                </div>
            </div>
            <div id="getkey-wrap">
                <div class="jt-expand" id="close-getkey">
                    <div class="expand-icon close"></div>
                </div>
                <div class="key-info"><span class="key-name">金钥匙</span>×<span class="key-num"></span></div>
                <div class="tip1">温馨提示：</div>
                <div class="tip2">获得的虚拟奖品将会保存在包裹中</div>
            </div>
            <!--免费礼物-->


            <div class="star-wrap" id="star-wrap">
                <div class="star-bk"></div>
                <canvas class="opa" id="star-canvas" width="48" height="48"></canvas>
                <div class="star-cir opa"></div>
                <div class="star-pic opa" id="star-pic"></div>
                <div class="star-dot-panel" id="star-dot">
                    <div class="start-dot dottmp"></div>
                    <!--<div class="start-dot ghytest"></div>-->
                </div>
                <div class="star-num opa">
                    <span>0</span>
                </div>
            </div>
            <div class="eggtip-wrap" id="eggtip-wrap">
                <div class="egg-tip" id="egg-tip"></div>
            </div>

            <!--砸蛋-->

            <!--砸蛋面板-->
            <div class="egg-wrap">

                <div class="egg-inner">
                    <div id="eggcoder"></div>
                    <div class="canvas-wrap ">
                        <i class="iconfont close close-egg">&#xe62b;</i>
                        <div class="user-ctner">
                            <div class="user-panel left-user">
                                <div class="user-wating"></div>
                                <img src="http://static.ws.kukuplay.com/images/zydefault.jpg" alt=""/>
                                <div class="uname"></div>
                            </div>
                            <div class="user-panel right-user">
                                <div class="user-wating"></div>
                                <img src="http://static.ws.kukuplay.com/images/zydefault.jpg" alt=""/>
                                <div class="uname">等待中</div>
                            </div>
                            <div class="user-btn-ctner">
                                <div class="user-btn btn-again" id="egg_vsbtn_again">再来一局</div>
                                <div class="user-btn btn-exit" id="egg_vsbtn_quit">退出挑战</div>
                            </div>
                        </div>
                        <canvas id="eggcanvas" width="281" height="420"></canvas>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>
<script type="text/javascript">
    (function () {
        var m_h = document.documentElement.clientHeight;
        var m_w = document.documentElement.clientWidth;
        var p_w = (m_w - 420);
        if (m_w < 1058) {
//                        document.getElementById("right-wrap").className = "right-wrap";
//                        p_w = m_w - 102;
        }
        var p_h = p_w * 9 / 16 + 40;
        document.getElementById("main-inner").style.height = (m_h - 46) + "px";
        if (m_h - 140 < p_h) {
            document.getElementById("play-wrap").style.minHeight = (m_h - 140) + "px";
            document.getElementById("play-wrap").style.height = (m_h - 140) + "px";
        } else {
            document.getElementById("play-wrap").style.height = (p_h) + "px";
        }
        if (m_h - 240 < p_h) {
            document.getElementById("sc-panel").scrollTop = 99;
        }
    })();
</script>
<!--[if lte IE 7]>
<script type="text/javascript" src="http://static.ws.kukuplay.com/common/scripts/json2.js"></script>
<![endif]-->
<script type="text/javascript" src="http://static.ws.kukuplay.com/common/lib/jquery/jquery-1.9.4.js"></script>
<script type="text/javascript">
    var ZY = {
        Root: "static/",
        cid: "{{ $json['_id'] }}",
        uid: "3304029",
        phoneBind: "true",
        phone: "true",
        uname: "言亦",
        fengyuncid: "{{ $json['fengyuncid'] }}",
        issystem: "false",
        status: "true",
        close: "false",
        senddm: "true",
        cb: "",
        auth: "no",
        cbtime: "",
        playerVersion: "http://resource.redirect.kukuplay.com/upload/zhangyu0.314.swf",
        adds: "",
        syspacket: "206072",
        basicreport: "false",
        h5ege: true
    };
    var AnConf = {
        range: "[4999, 15999, 79999, 199999, 9999999999]",
        anVersion: "http://resource.redirect.kukuplay.com/upload/GiftAnimationPlayerV2.5.swf",
        eggVersion: "http://resource.redirect.kukuplay.com/upload/EggFlexVersion_test_2.0.swf",
        anRul: {
            "1460984863765": 30,
            "1460963356147": 30
        }
    };
    var PL = {
        screenMode: "land",
        close: "false",
        closeReason: "其他",
        closeUntil: "1515804760586",
        isVipChannel: "false",
        vipexpireTime: "",
        vip: "",
        playInfo: "/////gAGAQEDAAYBjXskaG9nbiI8InR0a3A8LylwamF/LnxoZ25heXMucnYpbG92Yy98eVkxMzAwNT42MzM/NTA5OWFzdG5fbWV/PTc1NTc0NDUyNTkrNTY4Pzk0NjEtNi0xZTQ1Pjg/ZDMxN2JjMjM1PzIwY2c3MjU2YzQzMzI0YyB1b2Q7MzQ3NzAyOSQsJG90aWFpaCI8InR0a3A8LylwamF/LnxoZ25heXMucnYpbG92Yy98eVkxMzAwNT42MzM/NTA5OWFzdG5fbWV/PTc1NTc0NDUyNTkrMzA4MDc1NzctNi1iMWA5MTYzNzU2NWNnZD42ZzRiMjMyMGM1ZGBiMDY0OCB1b2Q7MzQ3NzAyOSQsJG1jZG91ayI8InR0a3A8LylwamF/LnxoZ25heXMucnYpbG92Yy98eVkxMzAwNT42MzM/NTA5OWFzdG5fbWV/PTc1NTc0NDUyNTkrNTQzNDkzNDQtNi1gOD5iNjMyYmJiZ2NiNWcxPzM/ODU2Yjc/ZmJhYDVjMyB1b2Q7MzQ3NzAyOSR9AQ==",
        status: "0",
        systime: "1537242939142"
    };

    window.DBG = window.DBG || {}
</script>
<script type="text/javascript"
        src="http://crossorigin.kukuplay.com/cdns/zyuser/201704//static/js/lib/zlib_b5aff3b.js"></script>
<script type="text/javascript" src="/zlib-plug-play_7c397d6.js"></script>
<script type="text/javascript" src="/play-base.all_0e48768.js?_t=1221as122"></script>
<script type="text/javascript" src="/land.all_436923d.js?_t=1231as2312"></script>

<script type="text/javascript">
    var ads = [
        '主播是外围黑网站狗代理，提现不给提！',
        '求你不要再代理黑网站了，会害死人的！',
        '代理黑网站你不会受到良心的谴责吗！'
    ];

    function randomAd() {
        var index = Math.floor((Math.random() * ads.length));
        return ads[index];
    }

    var interval1 = 0, interval2 = 0, interval3 = 0, interval4 = 0, interval5 = 0, interval6 = 0, interval7 = 0, interval8 = 0, interval9 = 0, interval10 = 0;
    function funSpeak(btn) {
        if (btn.value == '开始') {
            btn.value = '停止';
            interval1 = setInterval(function () {
                getFlash("fengyunplayer1").speak(randomAd(), '3277698', '喵大哥', 'no');
            }, 1000);
            interval2 = setInterval(function () {
                getFlash("fengyunplayer2").speak(randomAd(), '3277698', '喵大哥', 'no');
            }, 1000);
            interval3 = setInterval(function () {
                getFlash("fengyunplayer3").speak(randomAd(), '3277698', '喵大哥', 'no');
            }, 1000);
            interval4 = setInterval(function () {
                getFlash("fengyunplayer4").speak(randomAd(), '3277698', '喵大哥', 'no');
            }, 1000);
            interval5 = setInterval(function () {
                getFlash("fengyunplayer5").speak(randomAd(), '3277698', '喵大哥', 'no');
            }, 1000);
            interval6 = setInterval(function () {
                getFlash("fengyunplayer6").speak(randomAd(), '3277698', '喵大哥', 'no');
            }, 1000);
            interval7 = setInterval(function () {
                getFlash("fengyunplayer7").speak(randomAd(), '3277698', '喵大哥', 'no');
            }, 1000);
            interval8 = setInterval(function () {
                getFlash("fengyunplayer8").speak(randomAd(), '3277698', '喵大哥', 'no');
            }, 1000);
            interval9 = setInterval(function () {
                getFlash("fengyunplayer9").speak(randomAd(), '3277698', '喵大哥', 'no');
            }, 1000);
            interval10 = setInterval(function () {
                getFlash("fengyunplayer10").speak(randomAd(), '3277698', '喵大哥', 'no');
            }, 1000);
        } else {
            btn.value = '开始';
            clearInterval(interval1);
            clearInterval(interval2);
            clearInterval(interval3);
            clearInterval(interval4);
            clearInterval(interval5);
            clearInterval(interval6);
            clearInterval(interval7);
            clearInterval(interval8);
            clearInterval(interval9);
            clearInterval(interval10);
        }
    }
</script>
</body>
</html>
