var check = function() {
    var e = {
        checkuname: function(e) {
            var o = 0;
            return null == e || "" == e ? o = 1001 : n._getstrlen(e) < 6 ? o = 1002 : n._getstrlen(e) > 14 && (o = 1003),
            o
        },
        checkpass: function(e) {
            var n = 0;
            if (null == e || "" == e.length) n = 1005;
            else if (e.length < 6) n = 1006;
            else if (e.length > 20) n = 1007;
            else {
                var o = "^[0-9a-zA-Z_]+$",
                a = new RegExp(o);
                a.test(e) || (n = 1008)
            }
            return n
        },
        checkemail: function(e) {
            var n = 0,
            o = /^(\w)+(\.\w+)*@(\w)+((\.\w{2,3}){1,3})$/;
            return o.test(e) || (n = 1009),
            n
        },
        checkpiccode: function(e) {
            var n = 0;
            return (null == e || 4 !== e.length) && (n = 1010),
            n
        },
        checksignature: function(e) {
            return null != e && n._getstrlen(e).length > 50 ? 1011 : 0
        },
        _getstrlen: function(e) {
            var n = 0,
            o = 0;
            o = e.length;
            for (var a = 0; o > a; a++) {
                var t = e.charAt(a);
                n++,
                escape(t).length > 4 && n++
            }
            return n
        }
    },
    n = e;
    return Monitor(e)
} (),
alertStyle = {
    "#zalert": {
        display: "none",
        "font-family": "'微软雅黑'",
        top: "0",
        left: "0",
        width: "100%",
        height: "100%",
        position: "fixed",
        "z-index": "99999"
    },
    "#zalert .bk": {
        opacity: "0.5",
        width: "100%",
        height: "100%",
        background: "#000",
        filter: "alpha(opacity=50)"
    },
    "#zalert .z-close": {
        position: "absolute",
        right: "8px",
        "font-size": "24px",
        top: "0px",
        color: "#B3B2B2",
        cursor: "pointer"
    },
    "#zalert .z-close:hover": {
        color: "#5F5A5A"
    },
    "#zalert .panel": {
        background: "#FFF",
        "border-radius": "3px",
        position: "fixed",
        "z-index": "99999999",
        width: "400px",
        "min-height": "100px",
        padding: "15px 20px",
        left: "50%",
        top: "25%",
        "margin-left": "-200px"
    },
    "#zalert .info": {
        margin: "30px auto",
        "text-align": "center",
        "font-size": "14px",
        height: "24px",
        "line-height": "24px",
        width: "100%"
    },
    "#zalert .zbtn": {
        width: "60px",
        border: "1px solid #df1155",
        color: "#fff",
        "background-color": "#f71d65",
        "font-size": "14px",
        "text-align": "center",
        cursor: "pointer",
        margin: "0px auto 20px",
        top: "25%",
        padding: "2px 5px"
    },
    "#zalert .zbtn:hover": {
        "background-color": "#FD4884"
    }
};
window.zalert = function() {
    var e = {
        init: function() {
            this.cstyle(),
            this.initEvent(),
            this.cpage()
        },
        cstyle: function() {
            $('<style type="text/css">' + e.getstyle(alertStyle) + "</style>").appendTo("head")
        },
        cpage: function() {
            var e = zen("div#zalert>div.bk+div.panel"),
            n = $(e).find(".panel");
            n.zen("div.zalert-title-wrap>div.z-title+div.z-close"),
            n.zen("div.content>div.info+div.zbtn"),
            $(n).find(".z-close").html("×"),
            $(n).find(".z-title").html("来自章鱼的提示"),
            $(n).find(".zbtn").html("确定"),
            $("body").append(e)
        },
        initEvent: function() {
            $(document).on("click", "#zalert .zbtn,#zalert .z-close",
            function() {
                $("#zalert").hide()
            })
        },
        alert: function(e) {
            $("#zalert").fadeIn(),
            $("#zalert .info").html(e)
        },
        getstyle: function(e) {
            function n(e) {
                var n = "";
                for (var o in e) if (/[#\.]/gi.test(o) && "object" == typeof e[o]) {
                    var a = e[o],
                    t = "";
                    for (var c in a) t += c + ":" + a[c] + ";";
                    n += o + "{" + t + "}"
                }
                return n
            }
            var o = n(e);
            return o
        }
    };
    return $(document).ready(function() {
        e.init()
    }),
    function(n, o) {
        e.alert(n, o)
    }
} ();
var login = function() {
    var e = {
        _id: "ZY.Sign",
        init: function() {
            n.autologin()
        },
        autologin: function() {
            $.ajax({
                url: "http://www.zhangyu.tv/logins/autologin",
                type: "post",
                dataType: "json",
                success: function(e) {
                    log("autologin", e),
                    0 == e.ret ? EVT.trigger(document, "autologinsuccess", e) : EVT.trigger(document, "autologinfail", e)
                }
            })
        },
        beginLogin: function(e) {
            {
                var o = 0,
                a = e.uname,
                t = e.upass;
                check.checkuname(a),
                check.checkpass(t)
            }
            return n._sendlogin(a, t),
            o
        },
        _sendlogin: function(e, n) {
            log("begin to login ", e, n),
            $.ajax({
                url: "http://www.zhangyu.tv/logins/login",
                type: "post",
                dataType: "json",
                data: {
                    uname: e,
                    upass: n
                },
                success: function(e) {
                    0 == e.ret ? EVT.trigger(document, "loginsuccess", e) : EVT.trigger(document, "loginfail", e)
                }
            })
        },
        logout: function() {
            log("begin logout"),
            $.ajax({
                url: "http://www.zhangyu.tv/logins/logout",
                type: "post",
                dataType: "json",
                error: function() {
                    EVT.trigger(document, "logoutsuccess", {
                        ret: -1
                    })
                },
                success: function(e) {
                    EVT.trigger(document, "logoutsuccess", e)
                }
            })
        },
        _vilidateuser: function(e) {
            var n = [],
            o = check.checkuname(e.uname);
            0 != o && n.push(o);
            var a = check.checkpass(e.upass);
            0 != a && n.push(a);
            var t = check.checkemail(e.email);
            return 0 != t && n.push(t),
            n
        }
    },
    n = e;
    return e
} (),
user = {
    islogin: !1,
    uid: "",
    uname: ""
},
ZRegist = function() {
    var e = !1,
    n = 60,
    o = {
        init: function() {
            this.initEvent(),
            this.phoneCode()
        },
        initEvent: function() {
            $("#vilidate-btn").on("click",
            function() {
                ZRegist.getPicCode()
            }),
            $("#phone-num").bind({
                blur: zcheck.checkPhone
            }),
            $("#runame").bind({
                blur: zcheck.checkNickName
            }),
            $("#rupass").bind({
                blur: zcheck.checkPass
            }),
            $("#rerupass").bind({
                blur: zcheck.checkRepass
            }),
            $("#regist-btn").on("click",
            function() {
                a.regist()
            }),
            EVT.listen(document, "registsuccess",
            function() {
                window.location.reload()
            }),
            EVT.listen(document, "registfail",
            function(e) {
                log("注册失败。。。。。");
                var n = Math.random();
                $(".regist-panel").find("#piccode-img").attr("src", "/logins/getpiccode?rd=" + n),
                "114" == e.ret ? Hd.showTip($("#phone-num"), "注册失败：" + e.desc) : 113 == e.ret ? Hd.showTip($("#piccode"), "注册失败：" + e.desc) : 115 == e.ret ? Hd.showTip($("#phone-code"), "注册失败：" + e.desc) : Hd.showTip($("#runame"), "注册失败：" + e.desc)
            })
        },
        phoneCode: function() {
            var e = RegionsCode.getAll({
                usual: "常用"
            },
            !0);
            $(".country-container").append(e),
            $(document).on("click",
            function() {
                $(".country-container").hide()
            }),
            $(".country-ret").on("click",
            function(e) {
                $(".country-container").show(),
                e.stopPropagation()
            }),
            $(document).on("click", ".country-container .record",
            function() {
                var e = $(this).find(".record-country").data("code") || "",
                n = $(this).find(".record-country").html();
                e = (e + "").replace(/\+/gi, ""),
                $(".country-ret span").html(n + "+" + e),
                $(".country-ret").attr("code", "+" + e),
                zcheck.checkPhone()
            })
        },
        getPicCode: function() {
            if (!e) {
                var o = $("#piccode").val();
                if (null == o || 0 == o.length) return void Hd.showTip($("#piccode"), "请先填写图片验证码");
                if (Hd.hideTip($("#piccode")), zcheck.checkPhone()) {
                    var a = $("#phone-num").val(),
                    t = $(".country-ret").attr("code") || "+86";
                    $.ajax({
                        url: "http://www.zhangyu.tv/logins/picphonecode",
                        type: "post",
                        data: {
                            phone: a,
                            piccode: o,
                            country: t
                        },
                        dataType: "json",
                        error: function() {
                            zalert("发送验证码系统错误"),
                            $("#vilidate-btn").removeClass("disable")
                        },
                        success: function(o) {
                            if (0 == o.ret) {
                                $("#vilidate-btn").addClass("disable");
                                var a = n;
                                $("#vilidate-btn").html("<span>" + a + "</span>s后再次发送"),
                                e = !0;
                                var t = setInterval(function() {
                                    a--,
                                    a > 0 ? $("#vilidate-btn span").html(a) : (e = !1, $("#vilidate-btn").removeClass("disable"), $("#vilidate-btn").html("重新发送"), clearInterval(t))
                                },
                                1e3)
                            } else 113 == o.ret ? Hd.showTip($("#piccode"), "验证码不正确") : 114 == o.ret ? Hd.showTip($("#phone-num"), "手机号已经被绑定") : zalert(o.desc)
                        }
                    })
                }
            }
        },
        regist: function() {
            if (a.checkRegist()) {
                var e = $.trim($("#runame").val());
                e = e.replace(/\s/g, "");
                var n = $("#rupass").val(),
                o = $.trim($("#phone-num").val()),
                t = $("#piccode").val(),
                c = $("#phone-code").val(),
                r = $("#phone-num").val(),
                i = $(".regist-panel").attr("behavior"),
                u = $(".country-ret").attr("code") || "";
                a.sendRegist(e, n, o, t, i, r, c, u)
            } else zalert("请填写好完整的注册信息再提交")
        },
        checkRegist: function() {
            var e = !0;
            return zcheck.checkPhone() && zcheck.checkPicCode() && zcheck.checkPhoneCode() && zcheck.checkPass() && zcheck.checkRepass() ? zcheck.checkNickName() || (e = !1) : e = !1,
            e
        },
        sendRegist: function(e, n, o, a, t, c, r, i) {
            var u = $("#regist_deail:checked").length > 0;
            return u ? ($.ajax({
                url: "http://www.zhangyu.tv/logins/phoneregist",
                type: "post",
                dataType: "json",
                data: {
                    uname: e,
                    upass: n,
                    piccode: a,
                    behavior: t,
                    phone: c,
                    phonecode: r,
                    country: i
                },
                error: function() {
                    EVT.trigger(document, "registsuccess")
                },
                success: function(e) {
                    0 == e.ret ? EVT.trigger(document, "registsuccess", e) : EVT.trigger(document, "registfail", e)
                }
            }), 0) : void zalert("请阅读并接受（章鱼最终用户使用许可协议）")
        }
    },
    a = o;
    return o
} (),
zcheck = function() {
    var e = {
        checkPhone: function() {
            var e = $("#phone-num").val(),
            n = $(".country-ret").attr("code") || "+86";
            if ("+86" == n) {
                var o = zcheck.vilidatePhone(e);
                return o ? Hd.hideTip($("#phone-num")) : Hd.showTip($("#phone-num"), "请填写正确的手机号"),
                o
            }
            return Hd.hideTip($("#phone-num")),
            !0
        },
        checkPicCode: function() {
            var e = !0,
            n = $("#piccode").val();
            return null == n || 0 == n.length ? (Hd.showTip($("#piccode"), "图片验证码不能为空"), e = !1) : Hd.hideTip($("#piccode")),
            e
        },
        checkPhoneCode: function() {
            var e = !0,
            n = $("#phone-code").val();
            return null == n || 0 == n.length ? (Hd.showTip($("#phone-code"), "手机验证码不能为空"), e = !1) : Hd.hideTip($("#phone-code")),
            e
        },
        checkPass: function() {
            var e = !0,
            n = $("#rupass").val();
            if (null == n || "" == n.length) Hd.showTip($("#rupass"), "密码不能为空"),
            e = !1;
            else if (n.length < 6) Hd.showTip($("#rupass"), "密码长度不能小于6位"),
            e = !1;
            else if (n.length > 20) Hd.showTip($("#rupass"), "密码太长"),
            e = !1;
            else {
                var o = "^[0-9a-zA-Z_]+$",
                a = new RegExp(o);
                a.test(n) || (Hd.showTip($("#rupass"), "密码包含非法字符"), e = !1)
            }
            return e && Hd.hideTip($("#rupass")),
            e
        },
        checkRepass: function() {
            var e = !1,
            n = $("#rupass").val(),
            o = $("#rerupass").val();
            return o != n ? Hd.showTip($("#rerupass"), "两次密码不一致") : (Hd.hideTip($("#rerupass")), e = !0),
            e
        },
        checkNickName: function() {
            var e = !1,
            n = $("#runame").val();
            return null == n || "" == n ? Hd.showTip($("#runame"), "用户名不能为空") : zcheck._getstrlen(n) < 6 ? Hd.showTip($("#runame"), "用户名长度不能小于3个汉字，6个字符") : zcheck._getstrlen(n) > 14 ? Hd.showTip($("#runame"), "用户名长度不应大于7个汉字，14个字符") : (Hd.hideTip($("#runame")), e = !0),
            e
        },
        vilidatePhone: function(e) {
            var n = 0;
            if ((null == e || 0 == e.length || 11 != e.length) && (n = -1), 0 == n) {
                var o = /^(13[0-9]|14[5-9]|15[0-3,5-9]|16[6]|17[0135678]|18[0-9]|19[89])\d{8}$/;
                o.test(e) || (n = -1)
            }
            return 0 == n
        },
        _getstrlen: function(e) {
            var n = 0,
            o = 0;
            o = e.length;
            for (var a = 0; o > a; a++) {
                var t = e.charAt(a);
                n++,
                escape(t).length > 4 && n++
            }
            return n
        }
    };
    return e
} (),
Hd = function() {
    var e = {
        init: function() {
            n.registEvent(),
            n.initEvent(),
            n.bindListen(),
            n.layout(),
            n.bindCheck(),
            n.scrollFooter(),
            login.init(),
            ZRegist.init()
        },
        registEvent: function() {},
        initEvent: function() {
            var e = this;
            $(".login-link").on("click",
            function() {
                cookie.set("behavior", "pc_header", 300),
                e.showloginpanel("login")
            }),
            $(".regist-link").on("click",
            function() {
                cookie.set("behavior", "pc_header", 300),
                e.showloginpanel("regist")
            }),
            $("#login-btn").on("click",
            function() {
                e.login()
            }),
            $(".user-logo").on({
                mouseenter: function() {
                    $(".user-slid-panel").show().attr("show", "true"),
                    $(".user-logo").addClass("cover")
                },
                mouseleave: function() {
                    $(".user-slid-panel").hide().attr("show", "false"),
                    $(".user-logo").removeClass("cover")
                }
            }),
            $(".user-slid-panel").on({
                mouseenter: function() {
                    $(".user-slid-panel").show().attr("show", "true"),
                    $(".user-logo").addClass("cover")
                },
                mouseleave: function() {
                    $(".user-slid-panel").hide().attr("show", "false"),
                    $(".user-logo").removeClass("cover")
                }
            }),
            $("#log-out").on("click",
            function() {
                e.logout()
            }),
            $("#close-loginpanel").on("click",
            function() {
                e.hideloginpanel()
            }),
            $("#bind-piccode-img,#piccode-img").on("click",
            function() {
                var e = Math.random();
                $(this).attr("src", "/logins/getpiccode?rd=" + e)
            }),
            $("#lupass")[0].onkeydown = function(e) {
                var n = e || window.event || arguments.callee.caller.arguments[0];
                n && 13 == n.keyCode && (n.preventDefault && n.preventDefault(), $("#login-btn").click())
            },
            $(".qq-btn").on("click",
            function() {
                e.openqq()
            }),
            $(".weibo-btn").on("click",
            function() {
                e.openweibo()
            }),
            $(".weixin-btn").on("click",
            function() {
                e.openweixin()
            }),
            $("#search-ipt").on({
                focus: function() {
                    $(this).parent().addClass("active")
                },
                blur: function() {
                    $(this).parent().removeClass("active")
                }
            }),
            $(".search-panel .search-btn").on({
                click: function() {
                    $(this).parent().addClass("active")
                },
                mouseleave: function() {}
            }),
            $(".search-panel .search-btn").on("click",
            function() {
                var e = $("#search-ipt").val();
                null != e && e.length > 0 && (e = encodeURIComponent(e), window.location.href = "/searchpage?keyword=" + e)
            }),
            $("#search-ipt").length && ($("#search-ipt")[0].onkeydown = function(e) {
                var n = e || window.event || arguments.callee.caller.arguments[0];
                if (n && 13 == n.keyCode) {
                    n.preventDefault && n.preventDefault();
                    var o = $(this).val();
                    null != o && o.length > 0 && (o = encodeURIComponent(o), window.location.href = "/searchpage?keyword=" + o)
                }
            }),
            $(".my-fav").on("mouseenter",
            function() {
                e.hasFeachFav || (e.hasFeachFav = !0, e.feachFavorite())
            })
        },
        bindListen: function() {
            EVT.listen(document, "clicklogin",
            function(e) {
                cookie.set("behavior", e, 300),
                n.showloginpanel("login")
            }),
            EVT.listen(document, "clickregist",
            function(e) {
                cookie.set("behavior", e, 300),
                n.showloginpanel("regist")
            }),
            EVT.listen(document, "loginsuccess",
            function() {
                var e = Ut.getParam("redirect");
                if (null != e && e.length > 0) {
                    var e = decodeURIComponent(Ut.getParam("redirect"));
                    window.location.href = e
                } else window.location.reload()
            }),
            EVT.listen(document, "loginfail",
            function(e) {
                n.showTip($("#lupass"), e.desc)
            }),
            EVT.listen(document, "logoutsuccess",
            function(e) {
                0 == e.ret ? window.location.reload() : alert("退出登录异常")
            }),
            EVT.listen(document, "autologinsuccess",
            function(e) {
                log("autologinsuccess header callback", e),
                $("#user-panel .uname").html(e.uname),
                $("#user-panel #home-link").attr("href", "/home/" + e.uid),
                $("#user-panel #head-user-logo").attr("src", e.figureurl),
                $("#user-panel").attr("uid", e.uid),
                $("#user-panel .notlogin-panel").removeClass("show"),
                $("#user-panel .haslogin-panel").addClass("show"),
                $(".quick-link").addClass("showfav")
            }),
            EVT.listen(document, "autologinfail",
            function(e) {
                if (log("autologinfail header callback", e), reg = /zhangyu.tv/gi, reg.test(document.domain) && window.Domains) for (var n = 0; n < Domains.domain.length; n++) {
                    var o = Domains.domain[n];
                    if (null != o && o.length > 1) {
                        var a = new Image;
                        a.src = "http://" + o + "/logins/yidlogin"
                    }
                }
            })
        },
        layout: function() {
            try {
                var e = $(window).width(),
                n = $(window).height();
                log("当前屏幕：", e + "*" + n)
            } catch(o) {}
        },
        headNavHover: function() {
            $(".nav-item").on({
                mouseenter: function() {
                    $(this).hasClass("current") || ($(".nav-item .tri-icon").hide(), $(this).find(".tri-icon").show())
                },
                mouseleave: function() {
                    $(this).hasClass("current") || ($(".nav-item .tri-icon").hide(), $(".nav-item.current .tri-icon").show())
                }
            })
        },
        openqq: function() {
            var e = "https://graph.qq.com/oauth2.0/authorize?",
            n = ["client_id=101191953", "redirect_uri=" + encodeURIComponent("http://www.zhangyu.tv/logins/qqlogincallback"), "response_type=code", "scope=all"],
            o = n.join("&"),
            a = e + o;
            window.open(a, "newwindow", "height=450, width=600, toolbar=no, menubar=no, scrollbars=no, location=no, status=no")
        },
        openweibo: function() {
            var e = "https://api.weibo.com/oauth2/authorize?",
            n = ["client_id=3317622220", "redirect_uri=" + encodeURIComponent("http://www.zhangyu.tv/logins/weibologincallback"), "response_type=code", "scope=all"],
            o = n.join("&"),
            a = e + o;
            window.open(a, "newwindow", "height=450, width=600, toolbar=no, menubar=no, scrollbars=no, location=no, status=no")
        },
        openweixin: function() {
            var e = "https://open.weixin.qq.com/connect/qrconnect?",
            n = ["appid=wx73fdd3d5a0138951", "redirect_uri=" + encodeURIComponent("http://www.zhangyu.tv/logins/weixinlogincallback"), "response_type=code", "scope=snsapi_login"],
            o = n.join("&"),
            a = e + o;
            window.open(a, "newwindow", "height=550, width=600, toolbar=no, menubar=no, scrollbars=no, location=no, status=no")
        },
        openLoginCallBack: function(e) {
            0 == e ? window.location.reload() : alert("207" == e ? "用户帐号被封": "登录失败，请尝试普通注册登录")
        },
        bindCheck: function() {},
        showloginpanel: function(e, n) {
            if ($(".lg-cover").fadeIn(), $(".lg-panel").fadeIn(), null != n && n.length > 0 && $(".regist-panel").attr("behavior", n), "regist" == e) {
                var o = Math.random();
                $(".regist-panel").find("#piccode-img").attr("src", "/logins/getpiccode?rd=" + o),
                $(".lg-panel").find(".login-panel").hide(),
                $(".lg-panel").find(".regist-panel").show(),
                $(".lg-panel").removeClass("current-l"),
                $(".login-link").removeClass("current"),
                $(".regist-link").addClass("current"),
                $(window).height() < 695 ? $("#lg-panel").css({
                    top: "30px"
                }) : $("#lg-panel").removeAttr("style")
            } else $(".lg-panel").find(".regist-panel").hide(),
            $(".lg-panel").find(".login-panel").show(),
            $(".lg-panel").addClass("current-l"),
            $(".regist-link").removeClass("current"),
            $(".login-link").addClass("current")
        },
        hideloginpanel: function() {
            $(".lg-panel").fadeOut(),
            $(".lg-cover").fadeOut(),
            $(".user-slid-panel").hide(),
            $(".regist-panel").removeAttr("behavior")
        },
        regist: function() {
            var e = $.trim($(".runame").val());
            e = e.replace(/\s/g, ""); {
                var n = $(".rupass").val(),
                o = ($(".rerupass").val(), $.trim($(".email").val())),
                a = $(".piccode").val(),
                t = $(".regist-panel").attr("behavior");
                login.beginregist(e, n, o, a, t)
            }
        },
        login: function() {
            {
                var e = n._getuserdata();
                login.beginLogin(e)
            }
        },
        logout: function() {
            login.logout()
        },
        _getuserdata: function() {
            var e = {};
            return e.uname = $(".lg-panel #luname").val(),
            e.upass = $(".lg-panel #lupass").val(),
            console.log("userdata:" + JSON.stringify(e)),
            e
        },
        _loginsuccess: function() {
            var e = Ut.getParam("redirect");
            null != e && e.length > 0 ? window.location.href = Ut.getParam("redirect") : window.location.reload()
        },
        showTip: function(e, n) {
            if (0 != $(e).length) {
                var o = $(e).parent().find(".tip"); (null == o || 0 == o.length) && (o = $('<div class="tip"></div>')),
                $(o).html(n);
                var a = $(e).position().left,
                t = $(e).position().top;
                $(o).css({
                    top: t + 36,
                    left: a + 10
                }),
                $(e).parent().append(o)
            }
        },
        hideTip: function(e) {
            $(e).parent().find(".tip").remove()
        },
        feedback: function(e, o, a) {
            var t = {},
            c = (new Date).getTime();
            t._id = c + "_" + Math.floor(1e3 * Math.random()),
            t.message = n.escapes($.trim(e)),
            t.contact = n.escapes($.trim(o)),
            null != a && (t.zycid = a);
            var r = "http://feedback.kukuplay.com/datamonitor/feedbackUpdate?app=zypcfeedback&data=" + JSON.stringify(t);
            t.message.length > 0 && ((new Image).src = r)
        },
        feachFavorite: function() {
            log("开始获取我的关注"),
            $.ajax({
                url: "http://www.zhangyu.tv/favorite/myfavonline",
                type: "post",
                dataType: "json",
                success: function(e) {
                    log("获取我的关注成功:" + JSON.stringify(e));
                    var n = e.list,
                    o = e.count,
                    a = n.length;
                    if (0 == o) {
                        var t = $(".hidefavorite").clone().removeClass("hidefavorite");
                        $(t).empty(),
                        $(t).append($('<div class="desc"><div class="icon"></div>您尚未关注任何直播</div>')),
                        $(".drop-menu").append(t)
                    } else if (a > 0) for (var c = 0; c < n.length; c++) {
                        var r = n[c].figurl,
                        i = n[c].cname,
                        u = n[c].url,
                        d = n[c]._id;
                        Ut.Null(u) || (d = u);
                        var l = n[c].lastPlayTime || 0,
                        t = $(".hidefavorite").clone().removeClass("hidefavorite");
                        if ($(t).find(".director-img").attr("src", r), $(t).find(".director-name").html(i), $(t).find("a").attr("href", "/" + d), 0 == l) $(t).find(".director-type").html("正在直播");
                        else {
                            var s = Math.floor(l / 6e4),
                            m = Math.floor(s / 60);
                            $(t).find(".director-type").html(m >= 24 ? "已开播大于1天": m >= 1 ? "已开播" + m + "小时" + s % 60 + "分": s >= 1 ? "已开播" + s % 60 + "分" + Math.floor(l / 1e3) % 60 + "秒": "已开播" + Math.floor(l / 1e3) % 60 + "秒")
                        }
                        $(".drop-menu").append(t)
                    } else {
                        var t = $(".hidefavorite").clone().removeClass("hidefavorite");
                        $(t).empty(),
                        $(t).append($('<div class="desc"><div class="icon"></div>您关注的主播尚未开播</div>')),
                        $(".drop-menu").append(t)
                    }
                }
            })
        },
        scrollFooter: function() {
            var e = $(".link-list"),
            n = $(e).clone();
            n.appendTo($(".friend-link-panel"));
            var o = $(e).height(),
            a = 45,
            t = o / a,
            c = t;
            t > 1 && setInterval(function() {
                t > 0 ? (t--, $(".link-list:first").animate({
                    marginTop: "-" + a * (c - t) + "px"
                },
                1e3)) : (t = c - 1, $(".link-list:first").remove().css({
                    marginTop: "0px"
                }).appendTo($(".friend-link-panel")), $(".link-list:first").animate({
                    marginTop: "-" + a * (c - t) + "px"
                },
                1e3))
            },
            3e3)
        },
        escapes: function(e) {
            return e.replace(/[\\*,\\&,\\\\,\\/, \\ ? , \\ | , \\: , \\ < , \\ > , \"]/g,"")},letvTJ:function(){function e(){log("开开心心上报乐视了")}EVT.listen(document,"autologinsuccess ",function(n){var o=JSON.parse(store.get("lastsign "))||{},a=o.uid,t=n.uid,c=o.time,r=+new Date;(a=null||a!=t)?(o.uid=t,o.time=r,store.set("lastsign ",JSON.stringify(o)),e()):r-c>18e5&&(o.uid=t,o.time=r,store.set("lastsign ",JSON.stringify(o)),e())})}},n=e;return e}();$(document).ready(function(){Hd.init()}),function(){function e(e,n){for(var o,a,r,i=[" < div class = 'country-code' > "],u=0;r=t[u++];)if(o=c[r],e&&r in e&&(r=e[r]),o){i.push(" < div class = 'container' > <div class = 'header' > "+r+" < /div>"),i.push("<ul class='list'>");for(var d,l=0;d=o[l++];)a=n?(d.code+"").replace(/ ^ 0 + /,function(){return"+"}):d.code,i.push("<li class='record clearfix'><span class='record-country' data-code='"+a+"'>"+d.country+"("+d.name+")</span > <span class = 'record-code' > "+a+" < /span></li > ");i.push(" < /ul></div > ")}return i.push(" < /div>"),i.join("")}function n(e){var n;if(e)for(var o,a=0;o=t[a++];){n=c[o];for(var r,i=0;r=n[i];i++)e(o,r,c[o],i)}}function o(){return c}function a(){return t}var t=["usual","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"],c={usual:[{country:"China",name:"中国",code:"+86"},{country:"Taiwan",name:"中国台湾",code:"+886"},{country:"Hong Kong",name:"中国香港",code:"+852"},{country:"United States",name:"美国",code:"+1"},{country:"Japan",name:"日本",code:"+81"},{country:"Korea Republic",name:"韩国",code:"+82"},{country:"Singapore",name:"新加坡",code:"+65"},{country:"Germany",name:"德国",code:"+49"},{country:"Italy",name:"意大利",code:"+39"}],A:[{country:"Afghanistan",name:"阿富汗",code:"+93"},{country:"Albania",name:"阿尔巴尼亚",code:"+355"},{country:"Algeria",name:"阿尔及利亚",code:"+213"},{country:"American Samoa",name:"美属萨摩亚",code:"+684"},{country:"Andorra",name:"安道尔",code:"+376"},{country:"Angola",name:"安哥拉",code:"+244"},{country:"Anguilla",name:"安圭拉岛",code:"+1264"},{country:"Antigua and Barbuda",name:"安提瓜和巴布达",code:"+1268"},{country:"Argentina",name:"阿根廷",code:"+54"},{country:"Armenia",name:"亚美尼亚",code:"+374"},{country:"Aruba",name:"阿鲁巴",code:"+297"},{country:"Australia",name:"澳大利亚",code:"+61"},{country:"Austria",name:"奥地利",code:"+43"},{country:"Azerbaijan",name:"阿塞拜疆",code:"+994"}],B:[{country:"Bahamas",name:"巴哈马群岛",code:"+1242"},{country:"Bahrain",name:"巴林",code:"+973"},{country:"Bangladesh",name:"孟加拉共和国",code:"+880"},{country:"Barbados",name:"巴巴多斯",code:"+1246"},{country:"Belarus",name:"白俄罗斯",code:"+375"},{country:"Belgium",name:"比利时",code:"+32"},{country:"Belize",name:"伯利兹",code:"+501"},{country:"Benin",name:"贝宁",code:"+229"},{country:"Bermuda",name:"百慕大群岛",code:"+1441"},{country:"Bhutan",name:"不丹",code:"+975"},{country:"Bolivia",name:"玻利维亚",code:"+591"},{country:"Bosnia and Herzegovina",name:"波黑(波斯尼亚和黑塞哥维那)",code:"+387"},{country:"Botswana",name:"博茨瓦纳",code:"+267"},{country:"Brazil",name:"巴西",code:"+55"},{country:"Brunei Darussalam",name:"文莱达鲁萨兰国",code:"+673"},{country:"Bulgaria",name:"保加利亚",code:"+359"},{country:"Burkina Faso",name:"布基纳法索",code:"+226"},{country:"Burundi",name:"布隆迪",code:"+257"}],C:[{country:"Cambodia",name:"柬埔寨",code:"+855"},{country:"Cameroon",name:"喀麦隆",code:"+237"},{country:"Canada",name:"加拿大",code:"+1"},{country:"Cape Verde",name:"佛得角",code:"+238"},{country:"Cayman Islands",name:"开曼群岛",code:"+1345"},{country:"Central African Republic",name:"中非共和国",code:"+236"},{country:"Chad",name:"乍得",code:"+235"},{country:"Chile",name:"智利",code:"+56"},{country:"China",name:"中国",code:"+86"},{country:"Colombia",name:"哥伦比亚",code:"+57"},{country:"Comoros",name:"科摩罗",code:"+269"},{country:"Congo",name:"刚果",code:"+242"},{country:"Congo The Democratic Republic",name:"刚果民主共和国",code:"+243"},{country:"Cook Islands",name:"库克群岛",code:"+682"},{country:"Costa Rica",name:"哥斯达黎加",code:"+506"},{country:"Cote D'ivoire",name:"科特迪瓦",code:"+225"},{country:"Croatia",name:"克罗地亚",code:"+385"},{country:"Cuba",name:"古巴",code:"+53"},{country:"Cyprus",name:"塞浦路斯",code:"+357"},{country:"Czech Republic",name:"捷克共和国",code:"+420"}],D:[{country:"Denmark",name:"丹麦",code:"+45"},{country:"Djibouti",name:"吉布提",code:"+253"},{country:"Dominica",name:"多米尼克",code:"+1767"},{country:"Dominican Republic",name:"多米尼加共和国",code:"+1890"}],E:[{country:"Ecuador",name:"厄瓜多尔",code:"+593"},{country:"Egypt",name:"埃及",code:"+20"},{country:"El Salvador",name:"萨尔瓦多",code:"+503"},{country:"Equatorial Guinea",name:"赤道几内亚",code:"+240"},{country:"Eritrea",name:"厄立特里亚",code:"+291"},{country:"Estonia",name:"爱沙尼亚",code:"+372"},{country:"Ethiopia",name:"埃塞俄比亚",code:"+251"}],F:[{country:"Falkland Islands (Malvinas)",name:"福克兰群岛",code:"+500"},{country:"Faroe Islands",name:"法罗群岛",code:"+298"},{country:"Fiji",name:"斐济",code:"+679"},{country:"Finland",name:"芬兰",code:"+358"},{country:"France",name:"法国",code:"+33"},{country:"French Guiana",name:"法属圭亚那",code:"+594"},{country:"French Polynesia",name:"法属玻利尼西亚",code:"+689"}],G:[{country:"Gabon",name:"加蓬",code:"+241"},{country:"Gambia",name:"冈比亚",code:"+220"},{country:"Georgia",name:"格鲁吉亚",code:"+995"},{country:"Germany",name:"德国",code:"+49"},{country:"Ghana",name:"加纳",code:"+233"},{country:"Gibraltar",name:"直布罗陀",code:"+350"},{country:"Greece",name:"希腊",code:"+30"},{country:"Greenland",name:"格陵兰岛",code:"+299"},{country:"Grenada",name:"格林纳达",code:"+1809"},{country:"Guadeloupe",name:"瓜德罗普",code:"+590"},{country:"Guam",name:"关岛",code:"+671"},{country:"Guatemala",name:"危地马拉",code:"+502"},{country:"Guernsey",name:"根西",code:"+44"},{country:"Guinea",name:"几内亚",code:"+675"},{country:"Guinea-Bissau",name:"几内亚比绍共和国",code:"+245"},{country:"Guyana",name:"圭亚那",code:"+592"}],H:[{country:"Haiti",name:"海地",code:"+509"},{country:"Honduras",name:"洪都拉斯",code:"+504"},{country:"Hong Kong",name:"中国香港",code:"+852"},{country:"Hungary",name:"匈牙利",code:"+36"}],I:[{country:"Iceland",name:"冰岛",code:"+354"},{country:"India",name:"印度",code:"+91"},{country:"Indonesia",name:"印度尼西亚",code:"+62"},{country:"Iran Islamic Republic",name:"伊朗",code:"+98"},{country:"Iraq",name:"伊拉克",code:"+964"},{country:"Ireland",name:"爱尔兰",code:"+353"},{country:"Isle of Man",name:"马恩",code:"+44"},{country:"Israel",name:"以色列",code:"+972"},{country:"Italy",name:"意大利",code:"+39"}],J:[{country:"Jamaica",name:"牙买加",code:"+1876"},{country:"Japan",name:"日本",code:"+81"},{country:"Jersey",name:"泽西",code:"+44"},{country:"Jordan",name:"约旦",code:"+962"}],K:[{country:"Kazakhstan",name:"哈萨克斯坦",code:"+7"},{country:"Kenya",name:"肯尼亚",code:"+254"},{country:"Korea Democratic People's Republic",name:"朝鲜",code:"+850"},{country:"Korea Republic",name:"韩国",code:"+82"},{country:"Kosovo",name:"科索沃",code:"+381"},{country:"Kuwait",name:"科威特",code:"+965"},{country:"Kyrgyzstan",name:"吉尔吉斯斯坦",code:"+996"}],L:[{country:"Lao People's Democratic Republic",name:"老挝人民民主共和国",code:"+856"},{country:"Latvia",name:"拉脱维亚",code:"+371"},{country:"Lebanon",name:"黎巴嫩",code:"+961"},{country:"Lesotho",name:"莱索托",code:"+266"},{country:"Liberia",name:"利比里亚",code:"+231"},{country:"Libyan Arab Jamahiriya",name:"利比亚",code:"+218"},{country:"Liechtenstein",name:"列支敦斯登",code:"+423"},{country:"Lithuania",name:"立陶宛",code:"+370"},{country:"Luxembourg",name:"卢森堡",code:"+352"}],M:[{country:"Macao",name:"中国澳门",code:"+853"},{country:"Macedonia",name:"马其顿王国",code:"+389"},{country:"Madagascar",name:"马达加斯加",code:"+261"},{country:"Malawi",name:"马拉维",code:"+265"},{country:"Malaysia",name:"马来西亚",code:"+60"},{country:"Maldives",name:"马尔代夫",code:"+960"},{country:"Mali",name:"马里",code:"+223"},{country:"Malta",name:"马耳他",code:"+356"},{country:"Martinique",name:"马提尼克",code:"+596"},{country:"Mauritania",name:"毛里塔尼亚",code:"+222"},{country:"Mauritius",name:"毛里求斯",code:"+230"},{country:"Mexico",name:"墨西哥",code:"+52"},{country:"Moldova",name:"摩尔多瓦",code:"+373"},{country:"Monaco",name:"摩纳哥",code:"+377"},{country:"Mongolia",name:"蒙古",code:"+976"},{country:"Montenegro",name:"黑山共和国",code:"+382"},{country:"Montserrat",name:"蒙特塞拉特岛",code:"+1664"},{country:"Morocco",name:"摩洛哥",code:"+212"},{country:"Mozambique",name:"莫桑比克",code:"+258"},{country:"Myanmar",name:"缅甸",code:"+95"}],N:[{country:"Namibia",name:"纳米比亚",code:"+264"},{country:"Nepal",name:"尼泊尔",code:"+977"},{country:"Netherlands",name:"荷兰",code:"+31"},{country:"Netherlands Antilles",name:"荷属安的列斯群岛",code:"+599"},{country:"New Caledonia",name:"新喀里多尼亚",code:"+687"},{country:"New Zealand",name:"新西兰",code:"+64"},{country:"Nicaragua",name:"尼加拉瓜",code:"+505"},{country:"Niger",name:"尼日尔",code:"+227"},{country:"Nigeria",name:"尼日利亚",code:"+234"},{country:"Norway",name:"挪威",code:"+47"}],O:[{country:"Oman",name:"阿曼",code:"+968"}],P:[{country:"Pakistan",name:"巴基斯坦",code:"+92"},{country:"Palau",name:"帕劳",code:"+680"},{country:"Panama",name:"巴拿马",code:"+507"},{country:"Papua New Guinea",name:"巴布亚新几内亚",code:"+675"},{country:"Paraguay",name:"巴拉圭",code:"+595"},{country:"Peru",name:"秘鲁",code:"+51"},{country:"Philippines",name:"菲律宾",code:"+63"},{country:"Poland",name:"波兰",code:"+48"},{country:"Portugal",name:"葡萄牙",code:"+351"},{country:"Puerto Rico",name:"波多黎各",code:"+1787"}],Q:[{country:"Qatar",name:"卡塔尔",code:"+974"}],R:[{country:"Reunion",name:"留尼旺",code:"+262"},{country:"Romania",name:"罗马尼亚",code:"+40"},{country:"Russian Federation",name:"俄罗斯联邦",code:"+7"},{country:"Rwanda",name:"卢旺达",code:"+250"}],S:[{country:"Saint Kitts and Nevis",name:"圣基茨和尼维斯",code:"+1869"},{country:"Saint Lucia",name:"圣卢西亚岛",code:"+1758"},{country:"Saint Vincent and the Grenadines",name:"圣文森特和格林纳丁斯",code:"+1784"},{country:"Samoa",name:"萨摩亚群岛",code:"+684"},{country:"San Marino",name:"圣马力诺",code:"+378"},{country:"Saudi Arabia",name:"沙特阿拉伯",code:"+966"},{country:"Senegal",name:"塞内加尔",code:"+221"},{country:"Serbia",name:"塞尔维亚",code:"+381"},{country:"Seychelles",name:"塞舌尔",code:"+248"},{country:"Sierra Leone",name:"塞拉利昂",code:"+232"},{country:"Singapore",name:"新加坡",code:"+65"},{country:"Slovakia",name:"斯洛伐克",code:"+421"},{country:"Slovenia",name:"斯洛文尼亚",code:"+386"},{country:"Solomon Islands",name:"所罗门群岛",code:"+677"},{country:"Somalia",name:"索马里",code:"+252"},{country:"South Africa",name:"南非",code:"+27"},{country:"South Sudan",name:"南苏丹",code:"+211"},{country:"Spain",name:"西班牙",code:"+34"},{country:"Sri Lanka",name:"斯里兰卡",code:"+94"},{country:"Sudan",name:"苏丹",code:"+249"},{country:"Suriname",name:"苏里南",code:"+597"},{country:"Swaziland",name:"斯威士兰",code:"+268"},{country:"Sweden",name:"瑞典",code:"+46"},{country:"Switzerland",name:"瑞士",code:"+41"},{country:"Syrian Arab Republic",name:"阿拉伯叙利亚共和国",code:"+963"}],T:[{country:"Taiwan",name:"中国台湾",code:"+886"},{country:"Tajikistan",name:"塔吉克斯坦",code:"+992"},{country:"Tanzania United Republic",name:"坦桑尼亚",code:"+255"},{country:"Thailand",name:"泰国",code:"+66"},{country:"Timor-Leste",name:"东帝汶",code:"+670"},{country:"Togo",name:"多哥",code:"+228"},{country:"Tonga",name:"汤加",code:"+676"},{country:"Trinidad and Tobago",name:"特立尼达和多巴哥",code:"+1809"},{country:"Tunisia",name:"突尼斯",code:"+216"},{country:"Turkey",name:"土耳其",code:"+90"},{country:"Turkmenistan",name:"土库曼斯坦",code:"+993"},{country:"Turks and Caicos Islands",name:"特克斯和凯科斯群岛",code:"+1649"}],U:[{country:"Uganda",name:"乌干达",code:"+256"},{country:"Ukraine",name:"乌克兰",code:"+380"},{country:"United Arab Emirates",name:"阿拉伯联合酋长国",code:"+971"},{country:"United Kingdom",name:"英国",code:"+44"},{country:"United States",name:"美国",code:"+1"},{country:"Uruguay",name:"乌拉圭",code:"+598"},{country:"Uzbekistan",name:"乌兹别克斯坦",code:"+998"}],V:[{country:"Vanuatu",name:"瓦努阿图",code:"+678"},{country:"Venezuela",name:"委内瑞拉",code:"+58"},{country:"Viet Nam",name:"越南",code:"+84"},{country:"Virgin Islands British",name:"英属维尔京群岛",code:"+1340"}],Y:[{country:"Yemen",name:"也门",code:"+967"}],Z:[{country:"Zambia",name:"赞比亚",code:"+260"},{country:"Zimbabwe",name:"津巴布韦",code:"+263"}]};window.RegionsCode={getAll:e,each:n,getData:o,getList:a}}(),function(){window.EVT&&EVT.listen(document,"onload",function(){_fmOpt={partner:"fyzhibo",appName:"zhangyu_web",token:cookie.get("uni_id")};var e=new Image(1,1);e.onload=function(){_fmOpt.imgLoaded=!0},e.src="https:/ / fp.fraudmetrix.cn / fp / clear.png ? partnerCode = fyzhibo & appName = zhangyu_web & tokenId = "+_fmOpt.token;var n=document.createElement("script ");n.type="text / javascript ",n.async=!0,n.src=("https: "==document.location.protocol?"https: //":"http://")+"static.fraudmetrix.cn/fm.js?ver=0.1&t="+((new Date).getTime()/36e5).toFixed(0);var o=document.getElementsByTagName("script")[0];o.parentNode.insertBefore(n,o)})}();
            