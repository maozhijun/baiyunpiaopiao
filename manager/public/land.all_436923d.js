!
function(e, i, t) {
    if (null == i && t instanceof Function ? i = [] : i instanceof Function && (t = i), "function" == typeof define && define.amd) define(e, i, t);
    else {
        var n = [];
        if (i instanceof Array) {
            for (var a = 0; a < i.length; a++) n.push(window[i[a]]);
            window[e] = t.apply(this, Array.prototype.slice.call(n, 0))
        } else window[e] = t()
    }
} ("Lrp", [],
function() {
    "use strict";
    var e = {
        init: function() {
            this.layout(),
            this.listen()
        },
        layout: function() {
            "true" == ZY.basicreport && e.report("pc_basicuser", {
                phone: ZY.phone
            })
        },
        listen: function() {
            EVT.listen(document, "sendsuccess",
            function(i) {
                e.report("pc_sendgift", {
                    gid: i
                })
            }),
            EVT.listen(document, "getpacket",
            function(i) {
                e.report("pc_getredpacket", {
                    phone: ZY.phone,
                    rpid: i
                })
            }),
            EVT.listen(document, "special_redpacket_show",
            function(i) {
                e.report("special_redpacket_show", {
                    rpid: i
                })
            }),
            EVT.listen(document, "special_redpacket_click",
            function(i) {
                e.report("special_redpacket_click", {
                    rpid: i
                })
            }),
            EVT.listen(document, "can_send_dm",
            function(i) {
                e.report("can_send_dm", {
                    senddm: i
                })
            }),
            EVT.listen(document, "want_send_dm",
            function() {
                e.report("want_send_dm", {
                    senddm: !1
                })
            })
        },
        report: function(e, i, t) {
            var n = {
                uid: ZY.uid,
                uni_id: cookie.get("uni_id"),
                cid: ZY.cid
            }; (null == t || 0 == t.length) && (t = "zhangyupc");
            var a = $.extend({},
            n, i),
            o = [],
            c = JSON.stringify(a);
            o.push("itemtype=" + t),
            o.push("itemid=" + e),
            o.push("logver=v1"),
            o.push("jsoninfo=" + c);
            var r = o.join("&");
            r = encodeURI(r);
            var l = new Image;
            l.src = "http://log.kukuplay.com/report.gif?" + r
        }
    };
    return e
}),
$(function() {
    window.Lrp.init()
}),
$(document).ready(function() {
    Play.init(),
    CH.init()
}),
window.Play = function() {
    var e;
    play = {
        init: function() {
            //i.layout();
            i.ininflash();
            //i.initEvent();
            //i.updatePlayScroll();
        },
        initEvent: function() {
            $("#video-switch-bar").on("click",
            function() {
                Play.resizeplay($(".right-wrap").hasClass("hide") ? "show": "hide")
            }),
            $(".scan-wrap").on({
                mouseenter: function() {
                    $(".scan-img").show()
                },
                mouseleave: function() {
                    $(".scan-img").hide()
                }
            }),
            $("#like-btn").on("click",
            function() {
                null != ZY.uid && "" != ZY.uid ? i.addLick() : $(".login-link").click()
            }),
            $("#unlike-btn").on("click",
            function() {
                null != ZY.uid && "" != ZY.uid ? i.unLick() : $(".login-link").click()
            }),
            $(".feedback-link").on("click",
            function() {
                $("#feedback-wrap").fadeIn(),
                $(".task-panel").hide()
            }),
            $("#feedback-btn").on("click",
            function() {
                var e = $("#feedback-msg").val(),
                i = $("#feedback-contact").val();
                $(".task-panel").fadeOut(),
                Hd.feedback(e, i, ZY.cid),
                $("#feedback-wrap").fadeOut(),
                $("#feedback-success").fadeIn()
            }),
            $(".close-feedback").on("click",
            function() {
                $(this).parent().parent().fadeOut()
            }),
            $(".feed-sure").on("click",
            function() {
                $("#feedback-success").fadeOut()
            }),
            $(".c-close").on("click",
            function() {
                var e = $(this).attr("ct");
                $("#" + e).hide()
            }),
            $(".tip-close").on("click",
            function() {
                $(".play-login-tip").hide()
            }),
            $(".play-login-btn").on("click",
            function() {
                EVT.trigger(document, "clicklogin", "qualityChange"),
                $(".play-login-tip").hide()
            }),
            $(".play-regist-btn").on("click",
            function() {
                EVT.trigger(document, "clickregist", "qualityChange"),
                $(".play-login-tip").hide()
            })
        },
        layout: function() {
            var e = document.referrer || "null",
            i = "http://web.log.kukuplay.com/report.gif?app=zyplaypage&fromurl=" + encodeURIComponent(e),
            t = new Image;
            t.src = i,
            this.reportIn()
        },
        reportIn: function() {
            var e = ZY.cid,
            i = ZY.uid;
            if (!Ut.Null(e) && !Ut.Null(i)) {
                var t = new Image;
                t.src = "/zyrank/barrage/userWealthy?cid=" + e + "&uid=" + i
            }
        },
        unLick: function() {
            var e = ZY.cid,
            i = ZY.uid; (null != e && "" != e || null != i || "" != i) && $.ajax({
                url: "http://www.zhangyu.tv/favorite/unlike",
                type: "post",
                dataType: "json",
                data: {
                    cid: e,
                    uid: i
                },
                success: function(e) {
                    if (0 == e.ret) {
                        $(".like-wrap").removeClass("haslike");
                        var i = (Number($(".like-nums").html()) || 0) - 1;
                        $(".like-nums").html(i)
                    } else alert(e.desc)
                }
            })
        },
        addLick: function() {
            var e = ZY.cid,
            i = ZY.uid; (null != e && "" != e || null != i || "" != i) && $.ajax({
                url: "http://www.zhangyu.tv/favorite/like",
                type: "post",
                dataType: "json",
                data: {
                    cid: e,
                    uid: i
                },
                success: function(e) {
                    if (0 == e.ret) {
                        $(".like-wrap").addClass("haslike");
                        var i = (Number($(".like-nums").html()) || 0) + 1;
                        $(".like-nums").html(i)
                    } else alert(e.desc)
                }
            })
        },
        ininflash: function() {
            log("初始化flash 播放器");
            var e = window.ZY.cid || "";
            if ("" != e) {
                // var t = store.get("playvideo");
                // "true" != t && 
                i.embedflash(ZY.playerVersion, "codeinner", "fengyunplayer1")
                i.embedflash(ZY.playerVersion, "codeinner", "fengyunplayer2")
                i.embedflash(ZY.playerVersion, "codeinner", "fengyunplayer3")
                i.embedflash(ZY.playerVersion, "codeinner", "fengyunplayer4")
                i.embedflash(ZY.playerVersion, "codeinner", "fengyunplayer5")
                i.embedflash(ZY.playerVersion, "codeinner", "fengyunplayer6")
                i.embedflash(ZY.playerVersion, "codeinner", "fengyunplayer7")
                i.embedflash(ZY.playerVersion, "codeinner", "fengyunplayer8")
                i.embedflash(ZY.playerVersion, "codeinner", "fengyunplayer9")
                i.embedflash(ZY.playerVersion, "codeinner", "fengyunplayer10")
            } else log("cid is null" + e)
        },
        embedflash: function(e, i, t, n) {
            var a = "0.0.1",
            o = {},
            c = {};
            if (null != n && "string" == typeof n && n.length > 0) try {
                c = JSON.parse(n)
            } catch(r) {
                alert("转换出错")
            }
            c = c || {},
            c.type = "live",
            c.partner = "useelive",
            c.channel = ZY.fengyuncid,
            c.zyuid = ZY.uid,
            c.zycid = ZY.cid,
            c.mode = "fullscreen",
            c.y_id = cookie.get("y_id"),
            c.close = "true" == PL.close ? !0 : !1,
            c.closereason = PL.closeReason,
            c.closetime = PL.closeUntil,
            c.uni_id = cookie.get("uni_id"),
            c.issystem = "true" == ZY.issystem ? !0 : !1,
            o.config = encodeURIComponent(JSON.stringify(c));
            var l = {};
            l = l || {},
            l.quality = "high",
            l.bgcolor = "#000000",
            l.allowscriptaccess = "always",
            l.allowfullscreen = "true",
            l.wmode = "Transparent",
            l.allowFullScreenInteractive = "true";
            var s = {};
            s.id = t,
            s.name = t,
            s.align = "middle",
            s.allowscriptaccess = "always",
            s.allowfullscreen = "true",
            s.allowFullScreenInteractive = "true",
            swfobject.embedSWF(e, i, "100%", "100%", a, "", o, l, s, null,
            function() {
                $(".flash-install-tip").show()
            })
        },
        resizeplay: function(e) {
            if ("hide" == e) {
                $(".right-wrap").addClass("hide");
                var i = $("#main").width() - 83;
                $(".zyscwrap_main-inner").css({
                    width: i,
                    paddingRight: 13
                })
            } else if ("show" == e) {
                var i = $("#main").width() - 423;
                $(".right-wrap").removeClass("hide"),
                $(".zyscwrap_main-inner").css({
                    width: i,
                    paddingRight: 353
                })
            }
            var t = $(".play-wrap").width(),
            n = 9 * t / 16 + 40,
            a = $(window).height();
            n > a - 240 && (setTimeout(function() {
                $("#sc-panel").scrollTop("99")
            },
            0), n > a - 140 && (n = a - 140));
            var o = $(".chat-wrap").height() - 164;
            $(".chat-sc .zyscwrap").css({
                height: o
            }),
            Gift.resizeGiftPanel(t),
            $(".play-wrap").css({
                height: n
            })
        },
        updatePlayScroll: function() {
            0 != $("#main-inner").length && (null == e ? e = new zlib.plug.zscroll($("#main-inner"), {
                scWidth: "8px",
                barWidth: "8px",
                barBgColor: "#cfcfcf",
                barHoverColor: "#999",
                panelBgColor: "transparent"
            }) : e.update())
        },
        setNum: function(e) {
            $(".play-director #online-num").html(e)
        },
        tiplogin: function() {
            Ut.Null(ZY.uid) && $(".play-login-tip").show()
        }
    };
    var i = play;
    return play
} (),
function() {
    function e() {
        function e() {
            o || (o = setInterval(function() {
                var e = (new Date).getTime(),
                t = new Object(a);
                t.i = {
                    dl: "30000",
                    testdl: e - n + ""
                },
                t.code = "000",
                i(t),
                n = e
            },
            3e4));
            var e = new Object(a);
            e.i = {
                pv: 1
            },
            e.code = "000",
            i(e)
        }
        function i(e) {
            //var i = "http://realtime.monitor.kukuplay.com:6001/FlashP2PMonitorNew/RealTimeReport?postData=",
            //t = encodeURIComponent(JSON.stringify(e)),
            //n = new Image;
            //n.src = i + t
        }
        function t() {
            if (!Ut.Null(ZY.uid) && "true" == ZY.status && "true" == ZY.phoneBind) {
                var e = "/zhangyuonline/online/watch?cid=" + ZY.cid,
                i = new Image;
                i.src = e,
                setInterval(function() {
                    var i = new Image;
                    i.src = e
                },
                6e4)
            }
        }
        var n = (new Date).getTime(),
        a = {
            bz: "live",
            c: "usee_" + ZY.fengyuncid + "_abc"
        },
        o = null;
        t(),
        e()
    }
    EVT.listen(document, "onload",
    function() {
        e()
    })
} (),
window.CH = function() {
    var e = {
        init: function() {
            this.layout()
        },
        layout: function() {
            this.getdesc()
        },
        initEvent: function() {},
        getdesc: function() {
            log("获取直播详情"),
            $.ajax({
                url: "http://www.zhangyu.tv/zymanager/channel/getCdesc?cid=" + ZY.cid,
                type: "post",
                data: {},
                dataType: "json",
                error: function() {
                    log("获取直播详情异常")
                },
                success: function(e) {
                    if (e = e || {},
                    null == e || Ut.Null(e.cdesc)) $(".desc-wrap .desc-inner").addClass("nodesc").html("暂无直播详情");
                    else {
                        var i = e.cdesc;
                        $(".desc-wrap .desc-inner").html(i)
                    }
                }
            })
        }
    };
    return e
} (),
$(document).ready(function() {
    PlayChat.init()
});
var PlayChat = function() {
    var e, i = 0,
    t = {
        init: function() {
            this.initEvent(),
            this.layout()
        },
        initEvent: function() {
            $("#scro-tip").on("click",
            function() {
                null != e && e.scrollTo("bottom"),
                $(this).hide(),
                Chat.scro = !1
            }),
            $(".gift-item").on({
                mouseenter: function() {
                    var e = $(this).attr("packtype") || "";
                    if ("empty" != e) {
                        $("#ghover-tip").removeClass("discount").removeClass("backrmb").show();
                        var i = $(this).attr("name"),
                        t = "true" == $(this).attr("isDisCount") ? !0 : !1,
                        n = "true" == $(this).attr("isBackRmb") ? !0 : !1,
                        a = $(this).attr("desc") || "",
                        o = $(this).attr("overtime");
                        if (null != o && o.length > 0) {
                            var c = Ut.getTimeTostr(o);
                            a += "#过期时间：" + c
                        }
                        "key" == e ? ($("#ghover-tip").find(".g-oldprice").hide(), $("#ghover-tip").find(".g-price").hide()) : ($("#ghover-tip").find(".g-oldprice").hide(), $("#ghover-tip").find(".g-price").show(), t && $("#ghover-tip").find(".g-oldprice").show());
                        var r = $(this).attr("price"),
                        l = $(this).attr("discount");
                        $("#ghover-tip").find(".dexc-info").html(a),
                        n ? $("#ghover-tip").addClass("backrmb") : !1,
                        t ? $("#ghover-tip").addClass("discount") : l = r,
                        $("#ghover-tip").find(".g-oldprice span").html(r),
                        $("#ghover-tip").find(".g-price span").html(l),
                        $("#ghover-tip").find(".g-name").html(i);
                        var s = a.split("#") || [];
                        $("#ghover-tip .appddesc").remove();
                        for (var u = 0; u < s.length; u++) if (null != s[u] && s[u].length > 0) {
                            var d = $("#ghover-tip").find(".tmpdesc").clone().removeClass("tmpdesc").addClass("appddesc");
                            d.find(".dexc-info").html(s[u]),
                            $("#ghover-tip").append(d)
                        }
                        var p = $(this).offset().left,
                        h = $("#ghover-tip").width();
                        if (ZY.tmpchannel) {
                            var f = $(".left-wrap").offset().left;
                            $("#ghover-tip").css("left", p - f - h / 2 + 10)
                        } else $("#ghover-tip").css("left", p - 58 - h / 2)
                    }
                },
                mouseleave: function() {
                    $("#ghover-tip").hide()
                }
            })
        },
        layout: function() {
            var e = Ut.getParam("f");
            if (!Ut.Null(e) && Ut.Null(ZY.addspic) && "true" == ZY.adds && (i = 100), 1 != ZY.tmpchannel) if (i > 0) _this.resize();
            else {
                var t = $(".play-wrap").width();
                window.Gift && Gift.resizeGiftPanel(t)
            }
        },
        updateChatScroll: function() {
            if (null == e) e = new zlib.plug.zscroll($("#chat-list"));
            else {
                e.update();
                var i = e.el[0].scrollTop,
                t = e.elc.height(),
                n = t - i - e.el.height();
                n > 150 ? $("#scro-tip").show() : e.scrollTo("bottom")
            }
        },
        resize: function() {
            var e = $(window).height() - 46 - i;
            $(".main-inner").css({
                height: e + i
            }),
            $(".zyscwrap.zyscwrap_main-inner").css({
                height: e,
                width: "auto"
            }),
            Play.updatePlayScroll();
            var n = $(window).width();
            Play.resizeplay(1058 >= n ? "hide": "show"),
            t.updateChatScroll()
        }
    };
    return window.SC = e,
    t
} ();
window.onresize = function() {
    1 != ZY.tmpchannel && PlayChat.resize()
},
$(document).ready(function() {
    PlayShare.init()
});
var PlayShare = function() {
    initcopy = !1;
    var e = {
        init: function() {
            this.initEvent(),
            this.initShare()
        },
        initEvent: function() {
            $(".shar-info-pic").on("click",
            function() {
                $(".share-wrap").show(),
                e.initCopy()
            }),
            $(".share-close").on("click",
            function(e) {
                $(".share-wrap").hide(),
                e.stopPropagation()
            })
        },
        initCopy: function() {
            initcopy || ($(".share-copy").zclip({
                path: "http://static.ws.kukuplay.com/common/lib/zclip/ZeroClipboard.swf",
                copy: function() {
                    return $("#share-ipt").val()
                },
                afterCopy: function() {
                    zalert("复制成功")
                }
            }), initcopy = !0)
        },
        initShare: function() {
            $(".share-custom a").click(function() {
                var e = $(this).data("share"),
                i = $("#play-title").data("cname"),
                t = $("#play-director").data("director"),
                n = $("#play-title").data("pic");
                if ("tieba" == e) {
                    var a = "http://tieba.baidu.com/f/commit/share/openShareApi?url=" + encodeURIComponent("http://www.zhangyu.tv/" + ZY.cid) + "&title=" + encodeURIComponent("我正在 " + t + " 的房间观看直播【" + i + "】，欢迎大家前来围观 / 来自#章鱼#章鱼-全民原创互动的体育直播") + "&desc=";
                    null != n && n.length > 0 && (a += "&pic=" + n),
                    $(this).attr("href", a).attr("target", "_blank")
                } else {
                    if (!e) return ! 1;
                    if ("tsina" == e) var o = "&appkey=3317622220";
                    else var o = "";
                    var a = "http://www.jiathis.com/send/?webid=" + e + "&url=" + encodeURIComponent("http://www.zhangyu.tv/" + ZY.cid) + "&title=&summary=" + encodeURIComponent("我正在 " + t + " 的房间观看直播【" + i + "】，欢迎大家前来围观 / 来自#章鱼#章鱼-全民原创互动的体育直播") + "&uid=1896137&data_track_clickback=true" + o;
                    null != n && n.length > 0 && (a += "&pic=" + n),
                    $(this).attr("href", a).attr("target", "_blank")
                }
            })
        }
    };
    return e
} ();
$(function() {
    Zvip.init()
}),
window.Zvip = function() {
    var e = {
        init: function() {
            this.layout(),
            this.initEvent()
        },
        initEvent: function() {
            $("#levip-btn").on("click",
            function() {
                return Ut.Null(ZY.uid) ? void EVT.trigger(document, "clicklogin") : void 0
            }),
            $("#prebuyvip-btn").on("click",
            function() {
                return Ut.Null(ZY.uid) ? void EVT.trigger(document, "clicklogin") : "true" != ZY.phone ? (Playbind.freshimg(), void $("#phone-bind-wrap").show()) : void $(".vip-wrap .vip-alert").fadeIn()
            }),
            $("#payvip-btn").on("click",
            function() {
                e.payVip()
            }),
            $("#close-vip").on("click",
            function() {
                $(".vip-alert").fadeOut()
            })
        },
        layout: function() {
            if ("true" == ZY.status && "true" == PL.isVipChannel && "true" != PL.vip && $(".vip-wrap").show(), "true" == ZY.status && "true" == PL.isVipChannel && "true" == PL.vip) {
                var e = Number(PL.vipexpireTime) || -1,
                i = Number(PL.systime) || +new Date;
                e > i && setTimeout(function() {
                    window.location.reload()
                },
                e - i)
            }
        },
        payVip: function() {
            $.ajax({
                url: "http://www.zhangyu.tv/payGameRecord/pay",
                type: "post",
                data: {},
                dataType: "json",
                error: function() {
                    zalert(ret["网络异常，请稍后重试"])
                },
                success: function(e) {
                    0 == e.ret ? window.location.reload() : zalert(e.desc)
                }
            })
        },
        checkVip: function() {}
    };
    return e
} ();