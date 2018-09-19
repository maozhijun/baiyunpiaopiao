function getFlash(e) {
    var t = null;
    return t = -1 != navigator.appName.indexOf("Microsoft") ? window[e] : document[e],
    null == t && (t = $("#" + e)[0]),
    t
}
function cutstr(e, t) {
    var n = {
        cut: !1,
        ret: e
    },
    i = 0,
    r = 0,
    s = new String;
    r = e.length;
    for (var o = 0; r > o; o++) a = e.charAt(o),
    i++,
    escape(a).length > 4 && i++,
    t >= i ? s = s.concat(a) : (s = s.concat(""), n.cut = !0, n.ret = s);
    return n.len = i,
    n
}
function test() {
    Chat.addmsg("2", "ghy", null, "eggbarrage", !1, null, {
        egglevel: 5,
        eggaward: 3e3
    }),
    Chat.addmsg("3", "ghy2", null, "eggbarrage", !1, null, {
        egglevel: 5,
        eggaward: 3e3
    }),
    Chat.addmsg("2", "ghy3", null, "eggbarrage", !1, null, {
        egglevel: 5,
        eggaward: 3e3
    }),
    Chat.addmsg("2", "ghy4", null, "eggbarrage", !1, null, {
        egglevel: 6,
        eggaward: 3e3
    }),
    Chat.addmsg("2", "ghy5", null, "eggbarrage", !1, null, {
        egglevel: 6,
        eggaward: 3e3
    }),
    Chat.addmsg("2", "ghy6", null, "eggbarrage", !1, null, {
        egglevel: 6,
        eggaward: 3e3
    }),
    Chat.addmsg("2", "ghy7", null, "eggbarrage", !1, null, {
        egglevel: 7,
        eggaward: 3e3
    }),
    Chat.addmsg("2", "ghy7", null, "eggbarrage", !1, null, {
        egglevel: 8,
        eggaward: 3e3
    })
}
function test2() {
    var e = {
        uname: "haha",
        cname: "cname",
        rate: 3,
        money: 34,
        giftPicture: "http://img.zhangyu.tv/1440499749475371.png",
        num: 4,
        comboNum: 2
    };
    EVT.trigger(document, "luckyGiftMoney", e)
}
var swfobject = function() {
    function e() {
        if (!G && document.getElementsByTagName("body")[0]) {
            try {
                var e, t = v("span");
                t.style.display = "none",
                e = V.getElementsByTagName("body")[0].appendChild(t),
                e.parentNode.removeChild(e),
                e = null,
                t = null
            } catch(n) {
                return
            }
            G = !0;
            for (var a = Z.length,
            i = 0; a > i; i++) Z[i]()
        }
    }
    function t(e) {
        G ? e() : Z[Z.length] = e
    }
    function n(e) {
        if (typeof z.addEventListener !== I) z.addEventListener("load", e, !1);
        else if (typeof V.addEventListener !== I) V.addEventListener("load", e, !1);
        else if (typeof z.attachEvent !== I) y(z, "onload", e);
        else if ("function" == typeof z.onload) {
            var t = z.onload;
            z.onload = function() {
                t(),
                e()
            }
        } else z.onload = e
    }
    function a() {
        var e = V.getElementsByTagName("body")[0],
        t = v(_);
        t.setAttribute("style", "visibility: hidden;"),
        t.setAttribute("type", D);
        var n = e.appendChild(t);
        if (n) {
            var a = 0; !
            function r() {
                if (typeof n.GetVariable !== I) try {
                    var s = n.GetVariable("$version");
                    s && (s = s.split(" ")[1].split(","), Q.pv = [k(s[0]), k(s[1]), k(s[2])])
                } catch(o) {
                    Q.pv = [8, 0, 0]
                } else if (10 > a) return a++,
                void setTimeout(r, 10);
                e.removeChild(t),
                n = null,
                i()
            } ()
        } else i()
    }
    function i() {
        var e = U.length;
        if (e > 0) for (var t = 0; e > t; t++) {
            var n = U[t].id,
            a = U[t].callbackFn,
            i = {
                success: !1,
                id: n
            };
            if (Q.pv[0] > 0) {
                var l = g(n);
                if (l) if (!$(U[t].swfVersion) || Q.wk && Q.wk < 312) if (U[t].expressInstall && s()) {
                    var d = {};
                    d.data = U[t].expressInstall,
                    d.width = l.getAttribute("width") || "0",
                    d.height = l.getAttribute("height") || "0",
                    l.getAttribute("class") && (d.styleclass = l.getAttribute("class")),
                    l.getAttribute("align") && (d.align = l.getAttribute("align"));
                    for (var u = {},
                    f = l.getElementsByTagName("param"), p = f.length, h = 0; p > h; h++)"movie" !== f[h].getAttribute("name").toLowerCase() && (u[f[h].getAttribute("name")] = f[h].getAttribute("value"));
                    o(d, u, n, a)
                } else c(l),
                a && a(i);
                else b(n, !0),
                a && (i.success = !0, i.ref = r(n), i.id = n, a(i))
            } else if (b(n, !0), a) {
                var m = r(n);
                m && typeof m.SetVariable !== I && (i.success = !0, i.ref = m, i.id = m.id),
                a(i)
            }
        }
    }
    function r(e) {
        var t = null,
        n = g(e);
        return n && "OBJECT" === n.nodeName.toUpperCase() && (t = typeof n.SetVariable !== I ? n: n.getElementsByTagName(_)[0] || n),
        t
    }
    function s() {
        return ! J && $("6.0.65") && (Q.win || Q.mac) && !(Q.wk && Q.wk < 312)
    }
    function o(e, t, n, a) {
        var i = g(n);
        if (n = m(n), J = !0, x = a || null, N = {
            success: !1,
            id: n
        },
        i) {
            "OBJECT" === i.nodeName.toUpperCase() ? (T = l(i), E = null) : (T = i, E = n),
            e.id = A,
            (typeof e.width === I || !/%$/.test(e.width) && k(e.width) < 310) && (e.width = "310"),
            (typeof e.height === I || !/%$/.test(e.height) && k(e.height) < 137) && (e.height = "137");
            var r = Q.ie ? "ActiveX": "PlugIn",
            s = "MMredirectURL=" + encodeURIComponent(z.location.toString().replace(/&/g, "%26")) + "&MMplayerType=" + r + "&MMdoctitle=" + encodeURIComponent(V.title.slice(0, 47) + " - Flash Player Installation");
            if (typeof t.flashvars !== I ? t.flashvars += "&" + s: t.flashvars = s, Q.ie && 4 != i.readyState) {
                var o = v("div");
                n += "SWFObjectNew",
                o.setAttribute("id", n),
                i.parentNode.insertBefore(o, i),
                i.style.display = "none",
                p(i)
            }
            u(e, t, n)
        }
    }
    function c(e) {
        if (Q.ie && 4 != e.readyState) {
            e.style.display = "none";
            var t = v("div");
            e.parentNode.insertBefore(t, e),
            t.parentNode.replaceChild(l(e), t),
            p(e)
        } else e.parentNode.replaceChild(l(e), e)
    }
    function l(e) {
        var t = v("div");
        if (Q.win && Q.ie) t.innerHTML = e.innerHTML;
        else {
            var n = e.getElementsByTagName(_)[0];
            if (n) {
                var a = n.childNodes;
                if (a) for (var i = a.length,
                r = 0; i > r; r++) 1 == a[r].nodeType && "PARAM" === a[r].nodeName || 8 == a[r].nodeType || t.appendChild(a[r].cloneNode(!0))
            }
        }
        return t
    }
    function d(e, t) {
        var n = v("div");
        return n.innerHTML = "<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000'><param name='movie' value='" + e + "'>" + t + "</object>",
        n.firstChild
    }
    function u(e, t, n) {
        var a, i = g(n);
        if (n = m(n), Q.wk && Q.wk < 312) return a;
        if (i) {
            var r, s, o, c = v(Q.ie ? "div": _);
            typeof e.id === I && (e.id = n);
            for (o in t) {
                t.hasOwnProperty(o) && "movie" !== o.toLowerCase() && f(c, o, t[o]);
            }
            Q.ie && (c = d(e.data, c.innerHTML));
            for (r in e) {
                e.hasOwnProperty(r) ;
                 s = r.toLowerCase();
                  "styleclass" === s ? c.setAttribute("class", e[r]) : "classid" !== s && "data" !== s && c.setAttribute(r, e[r]);
            }
            Q.ie ? Y[Y.length] = e.id: (c.setAttribute("type", D), c.setAttribute("data", e.data)),
            // i.parentNode.replaceChild(c, i),
            i.appendChild(c),
            a = c
        }
        return a
    }
    function f(e, t, n) {
        var a = v("param");
        a.setAttribute("name", t),
        a.setAttribute("value", n),
        e.appendChild(a)
    }
    function p(e) {
        var t = g(e);
        t && "OBJECT" === t.nodeName.toUpperCase() && (Q.ie ? (t.style.display = "none",
        function n() {
            if (4 == t.readyState) {
                for (var e in t)"function" == typeof t[e] && (t[e] = null);
                t.parentNode.removeChild(t)
            } else setTimeout(n, 10)
        } ()) : t.parentNode.removeChild(t))
    }
    function h(e) {
        return e && e.nodeType && 1 === e.nodeType
    }
    function m(e) {
        return h(e) ? e.id: e
    }
    function g(e) {
        if (h(e)) return e;
        var t = null;
        try {
            t = V.getElementById(e)
        } catch(n) {}
        return t
    }
    function v(e) {
        return V.createElement(e)
    }
    function k(e) {
        return parseInt(e, 10)
    }
    function y(e, t, n) {
        e.attachEvent(t, n),
        F[F.length] = [e, t, n]
    }
    function $(e) {
        e += "";
        var t = Q.pv,
        n = e.split(".");
        return n[0] = k(n[0]),
        n[1] = k(n[1]) || 0,
        n[2] = k(n[2]) || 0,
        t[0] > n[0] || t[0] == n[0] && t[1] > n[1] || t[0] == n[0] && t[1] == n[1] && t[2] >= n[2] ? !0 : !1
    }
    function w(e, t, n, a) {
        var i = V.getElementsByTagName("head")[0];
        if (i) {
            var r = "string" == typeof n ? n: "screen";
            if (a && (P = null, j = null), !P || j != r) {
                var s = v("style");
                s.setAttribute("type", "text/css"),
                s.setAttribute("media", r),
                P = i.appendChild(s),
                Q.ie && typeof V.styleSheets !== I && V.styleSheets.length > 0 && (P = V.styleSheets[V.styleSheets.length - 1]),
                j = r
            }
            P && (typeof P.addRule !== I ? P.addRule(e, t) : typeof V.createTextNode !== I && P.appendChild(V.createTextNode(e + " {" + t + "}")))
        }
    }
    function b(e, t) {
        if (L) {
            var n = t ? "visible": "hidden",
            a = g(e);
            G && a ? a.style.visibility = n: "string" == typeof e && w("#" + e, "visibility:" + n)
        }
    }
    function C(e) {
        var t = /[\\\"<>\.;]/,
        n = null !== t.exec(e);
        return n && typeof encodeURIComponent !== I ? encodeURIComponent(e) : e
    } {
        var T, E, x, N, P, j, I = "undefined",
        _ = "object",
        O = "Shockwave Flash",
        S = "ShockwaveFlash.ShockwaveFlash",
        D = "application/x-shockwave-flash",
        A = "SWFObjectExprInst",
        R = "onreadystatechange",
        z = window,
        V = document,
        M = navigator,
        B = !1,
        Z = [],
        U = [],
        Y = [],
        F = [],
        G = !1,
        J = !1,
        L = !0,
        H = !1,
        Q = function() {
            var e = typeof V.getElementById !== I && typeof V.getElementsByTagName !== I && typeof V.createElement !== I,
            t = M.userAgent.toLowerCase(),
            n = M.platform.toLowerCase(),
            a = /win/.test(n ? n: t),
            i = /mac/.test(n ? n: t),
            r = /webkit/.test(t) ? parseFloat(t.replace(/^.*webkit\/(\d+(\.\d+)?).*$/, "$1")) : !1,
            s = "Microsoft Internet Explorer" === M.appName,
            o = [0, 0, 0],
            c = null;
            if (typeof M.plugins !== I && typeof M.plugins[O] === _) c = M.plugins[O].description,
            c && typeof M.mimeTypes !== I && M.mimeTypes[D] && M.mimeTypes[D].enabledPlugin && (B = !0, s = !1, c = c.replace(/^.*\s+(\S+\s+\S+$)/, "$1"), o[0] = k(c.replace(/^(.*)\..*$/, "$1")), o[1] = k(c.replace(/^.*\.(.*)\s.*$/, "$1")), o[2] = /[a-zA-Z]/.test(c) ? k(c.replace(/^.*[a-zA-Z]+(.*)$/, "$1")) : 0);
            else if (typeof z.ActiveXObject !== I) try {
                var l = new ActiveXObject(S);
                l && (c = l.GetVariable("$version"), c && (s = !0, c = c.split(" ")[1].split(","), o = [k(c[0]), k(c[1]), k(c[2])]))
            } catch(d) {}
            return {
                w3: e,
                pv: o,
                wk: r,
                ie: s,
                win: a,
                mac: i
            }
        } (); !
        function() {
            Q.w3 && ((typeof V.readyState !== I && ("complete" === V.readyState || "interactive" === V.readyState) || typeof V.readyState === I && (V.getElementsByTagName("body")[0] || V.body)) && e(), G || (typeof V.addEventListener !== I && V.addEventListener("DOMContentLoaded", e, !1), Q.ie && (V.attachEvent(R,
            function t() {
                "complete" === V.readyState && (V.detachEvent(R, t), e())
            }), z == top && !
            function n() {
                if (!G) {
                    try {
                        V.documentElement.doScroll("left")
                    } catch(t) {
                        return void setTimeout(n, 0)
                    }
                    e()
                }
            } ()), Q.wk && !
            function a() {
                return G ? void 0 : /loaded|complete/.test(V.readyState) ? void e() : void setTimeout(a, 0)
            } ()))
        } ()
    }
    Z[0] = function() {
        B ? a() : i()
    }; !
    function() {
        Q.ie && window.attachEvent("onunload",
        function() {
            for (var e = F.length,
            t = 0; e > t; t++) F[t][0].detachEvent(F[t][1], F[t][2]);
            for (var n = Y.length,
            a = 0; n > a; a++) p(Y[a]);
            for (var i in Q) Q[i] = null;
            Q = null;
            for (var r in swfobject) swfobject[r] = null;
            swfobject = null
        })
    } ();
    return {
        registerObject: function(e, t, n, a) {
            if (Q.w3 && e && t) {
                var i = {};
                i.id = e,
                i.swfVersion = t,
                i.expressInstall = n,
                i.callbackFn = a,
                U[U.length] = i,
                b(e, !1)
            } else a && a({
                success: !1,
                id: e
            })
        },
        getObjectById: function(e) {
            return Q.w3 ? r(e) : void 0
        },
        embedSWF: function(e, n, a, i, r, c, l, d, f, p, h) {
            var g = m(n),
            v = {
                success: !1,
                id: g
            };
            Q.w3 && !(Q.wk && Q.wk < 312) && e && n && a && i && r ? (b(g, !1), t(function() {
                a += "",
                i += "";
                var t = {};
                if (f && typeof f === _) for (var m in f) t[m] = f[m];
                t.data = e,
                t.width = a,
                t.height = i;
                var k = {};
                if (d && typeof d === _) for (var y in d) k[y] = d[y];
                if (l && typeof l === _) for (var w in l) if (l.hasOwnProperty(w)) {
                    var C = H ? encodeURIComponent(w) : w,
                    T = H ? encodeURIComponent(l[w]) : l[w];
                    typeof k.flashvars !== I ? k.flashvars += "&" + C + "=" + T: k.flashvars = C + "=" + T
                }
                if ($(r)) {
                    var E = u(t, k, n);
                    t.id == g && b(g, !0);
                    v.success = !0;
                    v.ref = E;
                    v.id = E.id;
                } else {
                    if (c && s()) return t.data = c,
                    void o(t, k, n, p);
                    "function" == typeof h && h(),
                    b(g, !0)
                }
                p && p(v)
            })) : p && p(v)
        },
        switchOffAutoHideShow: function() {
            L = !1
        },
        enableUriEncoding: function(e) {
            H = typeof e === I ? !0 : e
        },
        ua: Q,
        getFlashPlayerVersion: function() {
            return {
                major: Q.pv[0],
                minor: Q.pv[1],
                release: Q.pv[2]
            }
        },
        hasFlashPlayerVersion: $,
        createSWF: function(e, t, n) {
            return Q.w3 ? u(e, t, n) : void 0
        },
        showExpressInstall: function(e, t, n, a) {
            Q.w3 && s() && o(e, t, n, a)
        },
        removeSWF: function(e) {
            Q.w3 && p(e)
        },
        createCSS: function(e, t, n, a) {
            Q.w3 && w(e, t, n, a)
        },
        addDomLoadEvent: t,
        addLoadEvent: n,
        getQueryParamValue: function(e) {
            var t = V.location.search || V.location.hash;
            if (t) {
                if (/\?/.test(t) && (t = t.split("?")[1]), !e) return C(t);
                for (var n = t.split("&"), a = 0; a < n.length; a++) if (n[a].substring(0, n[a].indexOf("=")) == e) return C(n[a].substring(n[a].indexOf("=") + 1))
            }
            return ""
        },
        expressInstallCallback: function() {
            if (J) {
                var e = g(A);
                e && T && (e.parentNode.replaceChild(T, e), E && (b(E, !0), Q.ie && (T.style.display = "block")), x && x(N)),
                J = !1
            }
        },
        version: "2.3"
    }
} ();
$(document).ready(function() {
    PlayAjaxCore.init()
}),
window.PE = {
    SENDPHONECODE: "sendphonecode",
    SENDPHONECODE_SIMPLE: "sendphonecode_simple",
    SENDPHONECODE_SIMPLE_RET: "sendphonecode_simple_ret",
    SENDPHONECODE_RET: "sendphonecode_ret",
    CHECKPHONECODE: "checkphone",
    CHECKPHONECODE_RET: "checkphone_ret",
    BINDPHONE: "bindphone",
    BINDPHONE_RET: "bindphone_ret"
},
window.PlayAjaxCore = function() {
    var e = {
        init: function() {
            this.initEvent()
        },
        initEvent: function() {
            EVT.listen(document, PE.BINDPHONE,
            function(t, n) {
                t = t || {};
                var a = t.piccode,
                i = t.phone,
                r = t.country,
                s = t.code;
                e.bindphone(i, r, s, a, n)
            }),
            EVT.listen(document, PE.SENDPHONECODE,
            function(t, n) {
                t = t || {};
                var a = t.piccode,
                i = t.phone,
                r = t.country;
                e.sendphonecode(a, i, r, n)
            }),
            EVT.listen(document, PE.CHECKPHONECODE,
            function(t, n) {
                t = t || {};
                var a = t.phone,
                i = t.code;
                e.checkphone(a, i, n)
            }),
            EVT.listen(document, PE.SENDPHONECODE_SIMPLE,
            function(t, n) {
                t = t || {};
                var a = t.phone,
                i = t.piccode;
                e.sendphonecode_forcheck(a, n, i)
            })
        },
        bindphone: function(e, t, n, a, i) {
            var r = {
                phone: e,
                piccode: a,
                country: t,
                code: n
            };
            this.ajax("/home/bindcountryphone", r, PE.BINDPHONE_RET, "绑定手机", i)
        },
        checkphone: function(e, t, n) {
            var a = {
                phone: e,
                code: t
            };
            this.ajax("/home/validphone", a, PE.CHECKPHONECODE_RET, "验证手机", n)
        },
        sendphonecode: function(e, t, n, a) {
            var i = {
                phone: t,
                piccode: e,
                country: n
            };
            this.ajax("/logins/picphonecode", i, PE.SENDPHONECODE_RET, "发送手机验证码", a)
        },
        sendphonecode_forcheck: function(e, t, n) {
            var a = {
                phone: e,
                piccode: n
            };
            this.ajax("/logins/picphonecode", a, PE.SENDPHONECODE_SIMPLE_RET, "发送手机验证码", t)
        },
        ajax: function(e, t, n, a, i) {
            $.ajax({
                url: e,
                type: "post",
                data: t,
                dataType: "json",
                error: function() {
                    EVT.trigger(document, n, {
                        ret: "-1",
                        desc: a + "系统错误"
                    },
                    i)
                },
                success: function(e) {
                    EVT.trigger(document, n, e, i)
                }
            }),
            log("【ajax】" + a, JSON.stringify(t), i)
        }
    };
    return e
} (),
window.User = function() {
    var e = {
        money: Number($(".wealth-num span").html()) || 0
    },
    t = {
        getUser: function() {
            return e
        },
        setMoney: function(t) {
            e.money = t,
            EVT.trigger(document, "window_money_change", t)
        },
        getMoney: function() {
            return e.money
        },
        check: function(e) {
            var t = this;
            $.ajax({
                url: "/home/info",
                type: "post",
                dataType: "json",
                error: function() {
                    log("check userinfo err")
                },
                success: function(n) {
                    log("获取用户信息:", JSON.stringify(n)),
                    t.setMoney(n.money),
                    "function" == typeof e && e(n)
                }
            })
        }
    };
    return t
} (),
$(document).ready(function() {
    Chat.init()
});
var Chat = function() {
    var e = "no",
    t = 0,
    n = 0,
    a = null,
    i = !1,
    r = !1,
    s = !1,
    o = [],
    c = {
        opuid: "",
        cookies: "",
        dm: !1,
        cb: !1,
        uidip: {},
        auth: "no",
        frozen: !1,
        init: function() {
            l.initEvent(),
            l.layout(),
            l.checkIpThanksForbid()
        },
        initEvent: function() {
            $("#hide-g-dm").on("click",
            function() {
                var e = $(this).attr("checked");
                i = "checked" == e ? !0 : !1
            })
        },
        layout: function() {
            Chat.auth = ZY.auth,
            e = ZY.auth,
            "no" != e && $(".chat-list").addClass("am"),
            l.checkRes(!1),
            "true" == ZY.cb && (Chat.cb = !0, t = Number(ZY.cbtime) / 1e3 || 0, $("#send_flash").addClass("forbid"), setInterval(function() { (Number(t) || 0) > 0 ? t--:(Chat.cb = !1, $("#send_flash").removeClass("forbid"), $("#msg-ipt").removeAttr("disabled"))
            },
            1e3), l.showSysTip("forbid"))
        },
        dmready: function() {
            log("弹幕连接服务器，准备就绪..."),
            l.dm = !0,
            Chat.addmsg("", "", "弹幕加载成功", "sys", !1),
            Chatgift.getgift(),
            EVT.trigger(document, "dmready")
        },
        isForbid: function(e) {
            for (var t = !1,
            n = 0; n < o.length; n++) if (o[n] == e) {
                t = !0;
                break
            }
            return t
        },
        playready: function() {
            log("视频准备就绪..."),
            EVT.trigger(document, "playready")
        },
        userready: function() {
            log("弹幕连接房间，准备就绪..."),
            EVT.trigger(document, "dmuserready")
        },
        sendmsg: function(e, t, n, a) {
            Chat.addmsg(t, n, e, a, !1)
        },
        noticeInterface: function(e) {
            try {
                var t = {};
                "string" == typeof e ? (e = unescape(e), t = JSON.parse(e)) : "object" == typeof e && (t = e),
                log("弹幕通知", JSON.stringify(t));
                var n = t.msgtype || "";
                if ("sendgift" == n) i || Chat.sendGift(t, "gift"),
                EVT.trigger(document, "sendgift", t);
                else if ("runwayV2" == n) EVT.trigger(document, "runwayV2", t);
                else if ("getaward" == n) Chat.sendGift(t, "getaward");
                else if ("bancomment" == n) {
                    var a = t.uname,
                    r = t.uid,
                    s = t.opname || "",
                    c = Number(t.expireTime) || 0;
                    o.push(r),
                    Chat.sysNotice(r, a, n, c, s)
                } else if ("comment" == n || "sendhorn" == n) {
                    var d = t.dmdata || {},
                    u = d.ip || "",
                    a = d.username,
                    f = d.role,
                    r = d.userid,
                    p = d.text,
                    h = t.cookiestring;
                    if (l.uidip[r] = u, Chat.isForbid(r)) return void log("【弹幕】uid:" + r + "弹幕已经被封禁，不予展示"); ! Ut.Null(a) && !Ut.Null(r) && a.length > 0 && (Chat.addmsg(r, a, p, f, !1, h), window.dmRandom && dmRandom.setLastSendtime( + new Date))
                } else if ("award" == n) {
                    if (window.Gift) {
                        var m = t.cid; (m == ZY.cid || null != ZY.syspacket && m == ZY.syspacket) && EVT.trigger(document, "getreward", t)
                    }
                } else if ("Cask_Open" == n || "Cask_Finish" == n || "Cask_Failed" == n || "Cask_Update" == n || "Cask_GetKey" == n) {
                    if (window.JT && JT.process(t), "Cask_Finish" == n) {
                        var a = t.uname,
                        g = t.caskName,
                        v = "主播" + a + "今天的" + g + "装填任务成功得到奖励！";
                        Chat.addmsg("", "", v, "sys", !1)
                    }
                    if ("Cask_GetKey" == n) {
                        var k = t.keyNum,
                        y = t.keyid,
                        $ = "03" == y ? "铜": "02" == y ? "银": "01" == y ? "金": "",
                        v = "恭喜您获得" + k + "把" + $ + "钥匙";
                        Chat.addmsg("", "", v, "sys", !1)
                    }
                } else if ("luckyGiftMoney" == n) EVT.trigger(document, "luckyGiftMoney", t);
                else if ("egggame" == n) {
                    var m = t.cid;
                    m != ZY.cid || EVT.trigger(document, "openEgg", t)
                } else if ("barrage" == n) {
                    var w = t.content;
                    Chat.addmsg("", "", w, "barrage")
                } else if ("eggbarrage" == n) {
                    var a = t.uname,
                    r = t.uid,
                    b = t.level,
                    C = t.money;
                    Chat.addmsg(r, a, null, "eggbarrage", !1, null, {
                        egglevel: b,
                        eggaward: C
                    })
                } else if ("eggcompetitionbegin" == n) EVT.trigger(document, "egg_vs_matchAutoStart", t);
                else if ("eggcompetitionlevel" == n) EVT.trigger(document, "egg_vsdm_lucky", t);
                else if ("eggcompetitionwin" == n) {
                    var T = t.uname1,
                    E = t.uname2,
                    C = t.money,
                    x = t.status,
                    N = "";
                    3 == x ? (N = "恭喜" + T + "在砸蛋比拼中战胜了" + E + ",赢得了章鱼币" + C, Chat.addmsg(r, a, N, "sys", !1, null)) : 4 == x && (N = "恭喜" + E + "在砸蛋比拼中战胜了" + T + ",赢得了章鱼币" + C, Chat.addmsg(r, a, N, "sys", !1, null))
                }
            } catch(P) {
                log("chat err", P)
            }
        },
        sysNotice: function(e, n, a, i, r) {
            var s = "";
            e == ZY.uid ? "bancomment" == a ? (s = "您已被" + r + "禁言", $("#send_flash").addClass("forbid"), l.showSysTip("forbid"), Chat.cb = !0, t = Number(i) / 1e3 || 0, setInterval(function() { (Number(t) || 0) > 0 ? t--:(Chat.cb = !1, $("#send_flash").removeClass("forbid"), $("#msg-ipt").removeAttr("disabled"))
            },
            1e3)) : "unforbid" == a ? (s = "您已被解除禁言", Chat.cb = !1, t = 0, $("#send_flash").removeClass("forbid")) : "manager" == a ? s = "您已被任命为管理员": "unmanager" == a ? s = "您已被解除管理员身份": "bindphone" == a && (s = "请先绑定手机号，然后发送弹幕") : "bancomment" == a ? s = n + "已被" + r + "禁言": "unforbid" == a && (s = n + "已被解除禁言"),
            Chat.addmsg("", "", s, "sys", !1)
        },
        checkRes: function(e) {
            e ? n = 0 : (0 == n ? l._checkdm(3e4, "正在连接弹幕服务器...", Chat.checkRes) : 1 == n && l._checkdm(8e3, "连接弹幕服务器超时,可尝试刷新页面重试", Chat.checkRes), n++)
        },
        _checkdm: function(e, t, n) {
            Chat.addmsg("", "", t, "sys", !1),
            setInterval(function() {
                n(Chat.dm ? !0 : !1)
            },
            e)
        },
        showSysTip: function(e, n) {
            if (n === !1) return $("#systip").fadeOut(),
            void $("#msg-ipt").removeAttr("disabled");
            if (clearInterval(a), "forbid" == e) $("#systip").fadeIn(),
            a = setInterval(function() {
                Chat.cb || (clearInterval(a), l.showSysTip(null, !1), $("#msg-ipt").removeAttr("disabled"));
                var e = Math.floor(Number(t) / 60 / 60),
                n = Math.floor(Number(t) / 60 % 60),
                i = Math.floor(Number(t) % 60),
                r = "",
                s = "",
                o = "";
                e > 0 && (r = e + "小时"),
                n >= 0 && (s = n + "分钟"),
                i >= 0 && (o = i + "秒");
                var c = "禁言：还剩" + r + s + o;
                $("#systip").html(c),
                $("#msg-ipt").attr("disabled", !0)
            },
            1e3);
            else if ("dmnotready" == e) {
                var i = "弹幕尚未准备好";
                $("#systip").html(i).show(),
                setTimeout(function() {
                    l.showSysTip(null, !1)
                },
                1e3)
            }
        },
        addmsg: function(e, t, n, a, i, r, s) {
            var o = {
                uid: e,
                uname: t,
                content: n,
                isme: i,
                cookie: r,
                random: (s || {}).random,
                egglevel: (s || {}).egglevel,
                eggaward: (s || {}).eggaward
            },
            c = Chat.getMsg(a, o);
            $("#msg-list").append(c),
            window.PlayChat && PlayChat.updateChatScroll()
        },
        getMsg: function(e, t) {
            a = (a || "").replace(/&/gi, "&amp;"),
            i = (i || "").replace(/&/gi, "&amp;");
            var n = t.uid,
            a = t.uname,
            i = t.content,
            r = t.isme,
            s = t.cookie,
            o = t.random,
            c = t.egglevel,
            l = t.eggaward,
            d = $(zen("li>div.msg>span.u-name+span.content"));
            return r && d.addClass("me"),
            o && (d.addClass("random"), d.css({
                background: "#B0D3FF"
            })),
            "am" == e ? (d.find(".msg").attr("admin", !0).attr("auth", "am"), d.find(".u-name").before('<span class="admin-name">房管</span>')) : "sys" == e ? (d.addClass("sys"), d.find(".msg").attr("admin", !0).attr("auth", "sys"), d.find(".u-name").before('<span class="admin-name">系统提示:</span>'), a = "") : "ro" == e ? (d.find(".msg").attr("admin", !0).attr("auth", "ro"), d.find(".u-name").before('<span class="admin-name">主播</span>')) : "fy" == e ? d.find(".msg").attr("admin", !0).attr("auth", "fy") : "gift" == e ? d.find(".content").addClass("c_gift") : "getaward" == e ? d.find(".content").addClass("c_award") : "barrage" == e ? (d.addClass("sys"), d.find(".msg").attr("admin", !0).attr("auth", "sys"), a = "") : "eggbarrage" == e ? (d.addClass("eggbarrage"), i = this.getEggbrageMsg(a, c, l), a = "") : (d.find(".msg").attr("auth", "no"), i = i || "", i = i.replace(/</gi, "&lt"), i = i.replace(/>/gi, "&gt")),
            Ut.Null(a) || (a += ":"),
            d.find(".msg").attr("uid", n).attr("cookies", s),
            d.find(".u-name").html(a),
            d.find(".content").html(i),
            d
        },
        getEggbrageMsg: function(e, t, n) {
            var a = 100 * Math.random() | 0,
            i = "";
            return 5 == t ? a % 3 == 0 ? i = "<span class='egglv5'>" + e + "</span>小目标达成，砸到了<span class='egglv5'>" + t + "级蛋,</span>价值<span class='egglv5'>" + n + "章鱼币</span>": a % 3 == 1 ? i = "<span class='egglv5'>" + e + "</span>使用洪荒之力，砸到了<span class='egglv5'>" + t + "级蛋,</span>价值<span class='egglv5'>" + n + "章鱼币</span>": a % 3 == 2 && (i = "<span class='egglv5'>" + e + "</span>轻轻松松，砸到了<span class='egglv5'>" + t + "级蛋,</span>价值<span class='egglv5'>" + n + "章鱼币</span>") : 6 == t ? a % 3 == 0 ? i = "厉害了word<span class='egglv6'>" + e + "，</span>砸到了<span class='egglv6'>" + t + "级蛋,</span>价值<span class='egglv6'>" + n + "章鱼币</span>": a % 3 == 1 ? i = "<span class='egglv6'>" + e + "</span>666666，砸到了<span class='egglv6'>" + t + "级蛋,</span>价值<span class='egglv6'>" + n + "章鱼币</span>": a % 3 == 2 && (i = "祝贺<span class='egglv6'>" + e + "，</span>砸到了<span class='egglv6'>" + t + "级蛋,</span>价值<span class='egglv6'>" + n + "章鱼币</span>") : 7 == t ? i = "恭喜<span class='egglv7'>" + e + "，</span>砸到了<span class='egglv7'>" + t + "级蛋,</span>价值<span class='egglv7'>" + n + "章鱼币</span>": 8 == t ? i = "<span class='egglv8'>" + e + "，</span>砸到了<span class='egglv8'>" + t + "级蛋,</span>!so easy!价值<span class='egglv8'>" + n + "章鱼币</span>": 9 == t && (i = "哇喔，<span class='egglv9'>" + e + "，</span>砸到了<span class='egglv9'>" + t + "级蛋,</span>!so easy!价值<span class='egglv9'>" + n + "章鱼币</span>"),
            i
        },
        _getctiem: function() {
            var e = new Date;
            return e.getHours() + ":" + e.getMinutes() + ":" + e.getSeconds()
        },
        sendGift: function(e, t) {
            try {
                if ("gift" == t) {
                    var n = (e.giftId, e.uname),
                    a = e.number,
                    i = e.gpic,
                    o = e.uid;
                    if (!Ut.Null(i)) {
                        var c = "<span class='gu-name' uid='" + o + "' style='cursor:pointer;' class='c_red'>" + n + '</span>送给主播<img src="' + i + '" class="chat-gift" />×' + a;
                        Chat.addmsg(null, null, c, "gift", !1)
                    }
                }
                if ("getaward" == t) {
                    var l = e.cid,
                    n = e.uname,
                    d = e.dx || !1,
                    u = (Number(e.money) || 0) / 100;
                    if (ZY.cid == l || null != ZY.syspacket && l == ZY.syspacket) {
                        var c = "恭喜<span class='c_red'>" + n + "</span>领取了主播的<span class='c_red'>红包" + u + "元</span>";
                        if (d && (c = "<span class='c_red'>" + n + "</span>收到了主播答谢的<span class='c_red'>" + u + "元红包</span>"), d && r && !s) return void log("答谢封禁", "dx:" + d, "thanksForbid:" + r, "thanksDebug:", s);
                        Chat.addmsg(null, null, c, "getaward", !1)
                    }
                }
            } catch(f) {}
        },
        checkIpThanksForbid: function() {
            try {
                // $.ajax({
                //     url: "http://area.zhangyu.tv/thank.php",
                //     type: "post",
                //     data: {},
                //     error: function() {},
                //     success: function(e) {
                //         "true" == e && (r = !0)
                //     }
                // })
            } catch(e) {
                log("check forbid err")
            }
            s = "true" == store.get("thanksDebug")
        }
    },
    l = c;
    return c
} (),
dmRandom = function() {
    function e() {
        var e = new Date,
        t = e.getFullYear() + "" + e.getMonth() + e.getDate();
        return t
    }
    var t = {
        dmlist: [],
        servercheck: !1,
        issend: !1,
        lastSendtime: 0,
        trick: 600,
        random: .1,
        check: 1e4
    },
    n = !1,
    a = {
        init: function() {
            this.layout(),
            this.check()
        },
        layout: function() {
            log("check random dm...");
            var n = JSON.parse(store.get("dm")) || {},
            a = n.time,
            i = e(),
            r = ZY.fengyuncid,
            s = [],
            o = !1;
            if (i != a) store.set("dm", "{}"),
            o = !0;
            else {
                var c = JSON.parse(store.get("dm")) || {};
                if (null == c.dmdata) o = !0;
                else if (null == c.dmdata[r]) o = !0;
                else {
                    c.dmdata = c.dmdata || {};
                    var s = c.dmdata[r] || [];
                    t.servercheck = !0,
                    t.dmlist = s
                }
            }
            o && (log("fetch random dm..."), $.ajax({
                url: "/randomdm/dmlist",
                type: "post",
                data: {
                    fycid: ZY.fengyuncid
                },
                dataType: "json",
                success: function(e) {
                    var n = JSON.parse(store.get("dm")) || {};
                    n.time = i,
                    n.dmdata = n.dmdata || {},
                    n.dmdata[r] = e;
                    var a = JSON.stringify(n);
                    store.set("dm", a),
                    t.servercheck = !0,
                    t.dmlist = e
                }
            }))
        },
        check: function() {
            var e = setInterval(function() {
                var n = 0;
                if (t.servercheck && t.dmlist.length <= 0 && (clearInterval(e), n = -1), 1 != Chat.dm && (n = -2), 0 == n) {
                    var a = +new Date;
                    a - t.lastSendtime < t.check - 1 && (n = -3, t.issend = !1)
                }
                0 == n && (t.issend = !0)
            },
            t.check),
            n = setInterval(function() {
                var e = 0;
                if (t.servercheck && t.dmlist.length <= 0 && (clearInterval(n), e = -1), 0 == e && (t.issend || (e = -2)), 0 == e) {
                    var i = Math.random();
                    i > t.random && (e = -3)
                }
                if (0 == e) {
                    var r = a.getdm();
                    if (null != r) {
                        if (Chat.isForbid(r.uid)) return void log("【暖场弹幕】uid:" + r.uid + "弹幕已经被封禁，不予展示");
                        getFlash("fengyunplayer").showcomments(r.text, r.uid, r.nickname, null),
                        log("【暖场弹幕】 uid:" + r.uid + " msg:" + r.text);
                        var s = "true" == Ut.getParam("nc") || "true" == store.get("shownc");
                        s ? Chat.addmsg(r.uid, r.nickname, r.text, null, !1, null, {
                            random: !0
                        }) : Chat.addmsg(r.uid, r.nickname, r.text, null, !1, null)
                    }
                }
            },
            t.trick)
        },
        getdm: function() {
            var e = ZY.fengyuncid,
            n = JSON.parse(store.get("dm")) || {};
            n.dmdata = n.dmdata || {};
            var a = n.dmdata[e] || [],
            i = null;
            a.length > 0 ? (i = a[0], a = a.slice(1, a.length)) : a = [],
            t.dmlist = a,
            n.dmdata[e] = a;
            var r = JSON.stringify(n);
            return store.set("dm", r),
            i
        }
    },
    i = {
        getdm: function() {
            return a.getdm()
        },
        getdmlength: function() {
            return t.dmlist.length
        },
        setLastSendtime: function(e) {
            t.lastSendtime = e
        }
    };
    return "true" == ZY.status && "true" != ZY.issystem && "ro" != ZY.auth && EVT.listen(document, "playready",
    function() {
        n || (a.init(), n = !0)
    }),
    i
} ();
$(function() {}),
function(e, t, n) {
    if (null == t && n instanceof Function ? t = [] : t instanceof Function && (n = t), "function" == typeof define && define.amd) define(e, t, n);
    else {
        var a = [];
        if (t instanceof Array) {
            for (var i = 0; i < t.length; i++) a.push(window[t[i]]);
            window[e] = n.apply(this, Array.prototype.slice.call(a, 0))
        } else window[e] = n()
    }
} ("ChatSend", ["Chat"],
function(e) {
    "use strict";
    var t = !1,
    n = "",
    a = {
        init: function() {
            i.layout(),
            i.initEvent(),
            i.report()
        },
        initEvent: function() {
            $("#send_flash").on("click",
            function() {
                i.sendflash()
            }),
            $("#msg-ipt")[0].onkeydown = function(e) {
                var t = e || window.event || arguments.callee.caller.arguments[0];
                t && 13 == t.keyCode && (t.preventDefault && t.preventDefault(), $("#send_flash").click())
            },
            $("#msg-ipt").on("keyup",
            function() {
                var e = Number($(this).attr("max"));
                if (null != e && "" != e && void 0 != e) {
                    var t = cutstr($(this).val(), e);
                    t.cut && $("#msg-ipt").val(t.ret)
                }
            }),
            $("#send-tip-bindphone").on("click",
            function() {
                EVT.trigger(document, "showbindphone")
            })
        },
        layout: function() {
            zlib && zlib.ui && zlib.ui.wave("msg-ipt")
        },
        sendflash: function() {
            var a = ZY.uid,
            r = ZY.uname;
            if (null == a || null == r || "" == a || "" == r) return void EVT.trigger(document, "clicklogin", "pc_senddm");
            if (!i.canSend()) return $("#phone-bind-wrap").show(),
            EVT.trigger(document, "want_send_dm"),
            void e.sysNotice(a, r, "bindphone", null, null);
            if (!e.dm) return void e.showSysTip("dmnotready");
            if (e.showSysTip(null, !1), e.cb) return void e.showSysTip("forbid");
            var s = $.trim($("#msg-ipt").val());
            if (s = cutstr(s, 60).ret, 0 != s.length && !t) {
                try {
                    if (n == s) return;
                    n = s;
                    var o = e.auth;
                    getFlash("fengyunplayer").speak(s, a, r, o),
                    $("#send_flash").addClass("lock")
                } catch(c) {
                    log(c)
                }
                i.sendmymsg(s),
                $("#msg-ipt")[0].value = "",
                t = !0,
                setTimeout(function() {
                    t = !1,
                    $("#send_flash").removeClass("lock")
                },
                4e3)
            }
        },
        sendmymsg: function(t) {
            var n = ZY.uid,
            a = (ZY.uname, e.auth);
            e.addmsg(n, "我", t, a, !0)
        },
        canSend: function() {
            return "true" == ZY.senddm
        },
        report: function() {
            null != ZY.uid && null != ZY.uname && "" != ZY.uid && "" != ZY.uname && setTimeout(function() {
                var e = a.canSend();
                EVT.trigger(document, "can_send_dm", e)
            },
            1200)
        }
    },
    i = a;
    return a
}),
$(function() {
    ChatSend.init()
}),
$(document).ready(function() {
    GifDom.init(),
    BatterManager.init(),
    FA.init()
}),
window.BatterManager = function() {
    var e = [],
    t = [],
    n = 500,
    a = 3e3,
    i = !1,
    r = 1e4,
    s = 5,
    o = {
        init: function() {
            this.listen(),
            this.initEvent(),
            this.layout()
        },
        initEvent: function() {
            $(".debug-panel .test").on("click",
            function() {
                var e = $(this).html();
                test(e)
            })
        },
        layout: function() {
            var e = !0,
            t = {},
            n = [];
            try {
                n = JSON.parse(AnConf.range) || []
            } catch(a) {
                log("parse animate range err")
            }
            for (var i in n) if ((Number(n[i]) || 0) <= 0) {
                e = !1;
                break
            }
            e && (t.setRank = n),
            o.set(t)
        },
        listen: function() {
            EVT.listen(document, "sendgift",
            function(e) {
                var t = e.uid + "_" + e.giftId;
                l.update(t, e) === !1 && (c.add(e), !i && c.isCondition() && o.start())
            })
        },
        start: function() {
            i = !0,
            Ut.interval(o.render, n, !0)
        },
        stop: function() {
            i = !1
        },
        render: function() {
            var n = new Date,
            c = [],
            u = [];
            if (d.eachLongArray(function(e, t) {
                return t.time ? void(n - t.time < r && c.push(t)) : !0
            }), e = c, d.eachShowArray(function(e, t) {
                n - t.time < a ? u.push(t) : l.destory(t._id)
            }), t = u, t.length < s && e.length > 0) for (var f = s - t.length; f > 0; f--) {
                var p = d.popOne();
                null != p && l.add(p)
            }
            return o.check(),
            i
        },
        check: function() {
            return t.length <= 0 ? void o.stop() : (GifDom.getParentDom().show(), void GifDom.getParentDom().css("top", (GifDom.getChatRoom().height() - GifDom.getParentDom().height()) / 2 - 30))
        },
        set: function(e) {
            a = e.showTime || a,
            s = e.showLength || s;
            var t = e.setRank;
            null != t && t.length >= 5 && (t.sort(function(e, t) {
                return e - t
            }), GifDom.setRank(t)),
            a = e.showTime || a
        },
        debug: function() {
            $(".debug-panel").show(),
            $(".debug-panel .left ").empty(),
            $(".debug-panel .right ").empty();
            for (var n = 0; n < e.length; n++) {
                var a = e[n],
                i = $(".debug-panel .left .item[data-id='" + a._id + "']");
                i.length || (i = $(".debug-panel .tmp1").clone().removeClass("tmp1"), $(i).attr("data-id", a._id)),
                $(i).find(".bug-name").html(a.data.uname),
                $(i).find(".bug-num").html(a.number),
                $(".debug-panel .left").append(i)
            }
            for (var n = 0; n < t.length; n++) {
                var a = t[n],
                i = $(".debug-panel .right .item[data-id='" + a._id + "']");
                i.length || (i = $(".debug-panel  .tmp2").clone().removeClass("tmp2"), $(i).attr("data-id", a._id)),
                $(i).find(".bug-name").html(a.data.uname),
                $(i).find(".bug-num").html(a.number),
                $(".debug-panel .right").append(i)
            }
        }
    },
    c = {
        add: function(t) {
            var n = t.uid + "_" + t.giftId;
            if (c.update(n, t) === !1) {
                var a = (new Date).getTime(),
                i = function() {},
                r = {
                    time: a
                };
                t = t || {},
                r._id = n,
                r.gid = t.giftId,
                r.number = t.number || 1,
                r.data = t,
                r.destroy = $.isFunction(t.destroy) ? t.destroy: i,
                e.push(r)
            }
        },
        update: function(t, n) {
            var a, i, r = (new Date).getTime();
            return d.eachLongArray(function(e, n) {
                return t === n._id ? (a = e, !1) : void 0
            }),
            void 0 === a ? !1 : (i = e[a], i.time = r, i.number = (Number(i.number) || 1) + (Number(n.number) || 1), void(e[a] = i))
        },
        isCondition: function() {
            var e = !1;
            return d.eachLongArray(function(t, n) {
                return n.number >= 2 ? (e = !0, !1) : void 0
            }),
            e
        },
        length: function() {
            return e.length
        }
    },
    l = {
        add: function(e) {
            t.push(e),
            l.render(e)
        },
        update: function(e, n) {
            var a, i, r = (new Date).getTime();
            return d.eachShowArray(function(t, n) {
                return e === n._id ? (a = t, !1) : void 0
            }),
            void 0 === a ? !1 : (i = t[a], i.time = r, i.number = (Number(i.number) || 1) + (Number(n.number) || 1), t[a] = i, void l.render(i))
        },
        render: function(e) {
            var t = GifDom.getDivById(e._id);
            if (t.length) GifDom.updateDiv(t, e);
            else {
                var n;
                t = GifDom.createDiv(e),
                n = $(t).css({
                    "margin-left": -GifDom.getParentDom().innerWidth()
                }),
                GifDom.getParentDom().append(n),
                $(n).animate({
                    "margin-left": 0
                },
                400)
            }
            GifDom.UpdateAnimate($(t))
        },
        destory: function(e) {
            var t = GifDom.getDivById(e);
            t.length && t.animate({
                "margin-left": GifDom.getParentDom().outerWidth()
            },
            function() {
                $(this).remove(),
                i && GifDom.getParentDom().hide()
            })
        }
    },
    d = {
        eachLongArray: function(t) {
            for (var n = 0,
            a = e.length; a > n && t(n, e[n]) !== !1; n++);
        },
        eachShowArray: function(e) {
            for (var n = 0,
            a = t.length; a > n && e(n, t[n]) !== !1; n++);
        },
        popOne: function() {
            var t = null;
            if (e.length > 0) {
                for (var n = [], a = !1, i = 0; i < e.length; i++) {
                    var r = 2;
                    if (window.AnConf) var r = AnConf.anRul[e[i].gid] || 2;
                    null != e[i] && e[i].number < r || a ? n.push(e[i]) : (t = e[i], a = !0)
                }
                e = n
            }
            return t
        }
    };
    return o
} (),
window.GifDom = function() {
    var e, t, n, a, i, r = [1e3, 16e3, 8e4, 2e5],
    s = {
        init: function() {
            n = navigator.appVersion.indexOf("MSIE") > 0 || navigator.appVersion.indexOf("Trident/7.0") > 0,
            i = navigator.appVersion.indexOf("MSIE 7.0;") > 0,
            a = navigator.userAgent.indexOf("Firefox") > 0,
            t = $("#chat-list"),
            e = $("#batter-box")
        },
        createDiv: function(e) {
            var t = (e.number || 1) * e.data.price,
            n = 4;
            for (var a in r) if (t < r[a]) {
                n = a;
                break
            } (null == e.data.gifurl || 0 == e.data.gifurl.length || "" == e.data.gifurl) && (e.data.gifurl = e.data.gpic);
            var i, s = ['<div class="an-item an-' + n + '" data-id="<%=item._id%>"><img src="<%=item.data.gifurl%>" alt="" /><div class="msg"><span class="g-uname"><%=item.data.uname%></span><span>送出了</span><span class="g-name"><%=item.data.gname%></span><span>&nbsp;×&nbsp;</span><span class="g-count"><%=item.number%></span></div></div>'].join("");
            return (i = Ut.template(s))({
                item: e
            })
        },
        updateDiv: function(e, t) {
            var n = (t.number || 1) * t.data.price,
            a = 4;
            for (var i in r) if (n < r[i]) {
                a = i;
                break
            }
            e.addClass("an-" + a),
            e.find(".g-count").html(t.number)
        },
        getDivById: function(t) {
            return e.find('.an-item[data-id="' + t + '"]')
        },
        UpdateAnimate: function(e) {
            if (n) e.find(".g-count").css({
                zoom: t,
                "-moz-transform": "scale(" + t + ")"
            }).animate({
                zoom: i,
                "-moz-transform": "scale(" + i + ")"
            },
            300);
            else {
                var t = 1.1,
                i = .9;
                a && (t = 1.1, i = .9),
                e.find(".g-count").css({
                    zoom: t,
                    "-moz-transform": "scale(" + t + ")"
                }).animate({
                    zoom: i,
                    "-moz-transform": "scale(" + i + ")"
                },
                300)
            }
        },
        getParentDom: function() {
            return e
        },
        getChatRoom: function() {
            return t
        },
        setRank: function(e) {
            r = null != e && e.length > 0 ? e: r
        }
    };
    return s
} (),
window.FA = function() {
    var e = AnConf.anVersion,
    t = [],
    n = !1,
    a = {
        playlock: !1,
        init: function() {
            log("加载动画flash ..."),
            a.initflash("fa-gift", "fa-flash"),
            this.listen()
        },
        layout: function() {},
        ready: function() {
            if (log("礼物动画 flash 准备就绪, 存入队列长度", t.length), n = !0, t.length > 0) {
                for (var e = 0; e < t.length; e++) {
                    log("开始播放礼物动画 from 队列", t[e]);
                    try {
                        getFlash("fa-flash").playstart(t[e])
                    } catch(a) {
                        log("play gift animate err", t.length, a)
                    }
                }
                t = []
            }
        },
        end: function() {
            $("#fa-gift-wrap").removeClass("inplay"),
            log("play flash animate end...")
        },
        play: function(e) {
            if ($("#fa-gift-wrap").addClass("inplay"), n) try {
                getFlash("fa-flash").playstart(e)
            } catch(a) {
                log("动画异常", a)
            } else t.push(e),
            log("动画尚未准备好 存入队列中", t.length)
        },
        initEvent: function() {},
        listen: function() {
            EVT.listen(document, "dmuserready",
            function() {
                $.ajax({
                    url: "/giftanimation/checkGiftAnimations",
                    type: "post",
                    data: {
                        cid: ZY.cid
                    },
                    dataType: "json",
                    success: function() {}
                })
            }),
            EVT.listen(document, "sendgift",
            function(e) {
                var t = e.playflash;
                if (null != t && t === !0) {
                    var n = e.aid_pc;
                    null != n && (log("开始播放礼物动画", n), a.play(n))
                }
            })
        },
        initflash: function(t, n) {
            var a = "0.0.1",
            i = {};
            i = i || {},
            i.quality = "high",
            i.bgcolor = "#000000",
            i.allowscriptaccess = "always",
            i.allowfullscreen = "true",
            i.wmode = "Transparent",
            i.allowFullScreenInteractive = "true";
            var r = {};
            r.id = n,
            r.name = n,
            r.align = "middle",
            r.allowscriptaccess = "always",
            r.allowfullscreen = "true",
            r.allowFullScreenInteractive = "true",
            swfobject.embedSWF(e, t, "100%", "100%", a, "", {},
            i, r)
        }
    };
    return a
} (),
$(document).ready(function() {
    window.Gift.init(),
    window.PayCheck.init(),
    window.Chatgift.init()
}),
function() {
    "use strict";
    var e = "1427966921511",
    t = [],
    n = !1,
    a = 550,
    i = $("#pack-scroll .gift-item").length || 0,
    r = $("#gift-scroll .gift-item").length || 0,
    s = r,
    o = {
        init: function() {
            c.layout(),
            c.initEvent(),
            c.listenGift(),
            c.listen(),
            c.bindScll()
        },
        pkRetTime: 0,
        pkget: !1,
        item_w: 55,
        layout: function() {
            var e = Math.max(i, r);
            e > 0 && (a = e * this.item_w, $(".gift-panel").css("width", a))
        },
        initEvent: function() {
            $(".t-close").on("click",
            function() {
                $(this).parent().fadeOut(),
                $(".gift-item").parent().removeClass("show")
            }),
            $("#cancel-pay").on("click",
            function() {
                $("#pay-tip-panel").fadeOut()
            }),
            $(".close-taskpanel").on("click",
            function() {
                $(".task-panel").fadeOut()
            }),
            $(".close-packet").on("click",
            function() {
                $("#reward-wrap").fadeOut()
            }),
            $(".gift-item").on("click",
            function() {
                $(this).hasClass("gift-select-item") || ($(".gift-select-item").removeClass("gift-select-item"), "key" != $(this).attr("packtype") && $(this).addClass("gift-select-item"), "啤酒" == $(".gift-select-item").attr("name") ? ($("#send-g-num").attr("disabled", "true").val(1), $(".slct-panel").removeClass("show"), $(".num-ipt").addClass("lock")) : ($("#send-g-num").removeAttr("disabled").val(1), $(".num-ipt").removeClass("lock")))
            }),
            $("#send-g-btn").on("click",
            function() {
                var e = 0,
                t = $(".gift-select-item").attr("gid"),
                n = $(".gift-select-item").attr("gtype"),
                a = $("#send-g-num").val(),
                i = "true" == $(".gift-select-item").attr("isdiscount");
                if (Ut.Null(t) && (zalert("请选择一种礼物后再赠送"), e = -1), 0 == e && (Number(a) || 0) <= 0 && (zalert("请填写正确的礼物数量"), e = -2), 0 == e) {
                    var r = /^[0-9]*[1-9][0-9]*$/gi;
                    r.test(a) || (e = -3, zalert("请填写正确的礼物数量"))
                }
                0 == e && ZY.cid == ZY.uid && (zalert("请不要给自己送礼"), e = -2),
                0 == e && (c.sendLock || (c.sendLock = !0, "parcel" == n ? c.sendParcel(t, ZY.cid, a) : c.sendGift(t, ZY.cid, a, i)))
            }),
            $(".task-tip").on("click",
            function() {
                c.showTaskPanle()
            }),
            $(".sign-btn").on("click",
            function() {
                Ut.Null(ZY.uid) ? EVT.trigger(document, "clicklogin", "pc_getsign") : c.getReward("sign")
            }),
            $(".get-regist-reward").on("click",
            function() {
                Ut.Null(ZY.uid) ? EVT.trigger(document, "clicklogin", "pc_getregist") : c.getReward("regist")
            }),
            $(".get-mobile-reward").on("click",
            function() {
                c.getReward("mobile")
            }),
            $("#bind-phone-link").on("click",
            function() {
                $("#bind-tip-panel").hide()
            }),
            $("#get-packet-btn").on("click",
            function() {
                var e = $(this).parent().attr("packid");
                return ("redpacketmoblie" == e || "redpacketpcregist" == e) && EVT.trigger(document, "special_redpacket_click", e),
                Ut.Null(ZY.uid) ? void EVT.trigger(document, "clicklogin", "pc_redpacketmoblie") : void(Ut.Null(e) || c.getPacket(e))
            }),
            $(".luck-sure").on("click",
            function() {
                $("#reward-wrap").hide(),
                c.pkget = !1,
                setTimeout(function() {
                    n = !1,
                    EVT.trigger(document, "showgift")
                },
                1e3)
            }),
            $(".close-redpacked").on("click",
            function() {
                $(".reward-wrap").hide(),
                c.pkget = !1,
                setTimeout(function() {
                    n = !1,
                    EVT.trigger(document, "showgift")
                },
                1e3)
            }),
            $(".s-icon").on("click",
            function() {
                "啤酒" != $(".gift-select-item").attr("name") && ($(".slct-panel").hasClass("show") ? $(".slct-panel").removeClass("show") : $(".slct-panel").addClass("show"))
            }),
            $(".slct-panel li").on("click",
            function() {
                var e = $(this).attr("num") || 1;
                $(".op-send-wrap .num").val(e),
                $(".slct-panel").removeClass("show")
            }),
            $("#send-g-num").on({
                focus: function() {
                    $(".slct-panel").removeClass("show")
                },
                keydown: function(e) {
                    var t = e || window.event || arguments.callee.caller.arguments[0];
                    t && 13 == t.keyCode && (t.preventDefault && t.preventDefault(), $("#send-g-btn").click())
                }
            }),
            $(".tab-navs .nav").on("click",
            function() {
                var e = $(this).attr("tag"),
                t = $(".play-wrap").width(),
                e = $(this).attr("tag");
                "gift" == e ? ($(".pack-nav,#pack-scroll").removeClass("current"), $(".gift-nav,#gift-scroll").addClass("current"), s = r, o.giftNavCheck(t, s), a = s * o.item_w) : "pack" == e && ($(".gift-nav,#gift-scroll").removeClass("current"), $(".pack-nav,#pack-scroll").addClass("current"), s = i, o.giftNavCheck(t, s), a = s * o.item_w),
                o.giftNavHoverCheck()
            })
        },
        listen: function() {
            EVT.listen(document, "accounterror",
            function(e) {
                log("account error,ret:" + e),
                $(".close-taskpanel").click(),
                $("#account-err-panel").addClass("show"),
                $("#gift-tip-panel").hide()
            }),
            EVT.listen(document, "showbindphone",
            function() {
                o.showBindTip()
            }),
            EVT.listen(document, "window_money_change",
            function(e) {
                $(".wealth-num span").html(e)
            })
        },
        listenGift: function() {
            EVT.listen(document, "getreward",
            function(e) {
                log("resive gift and push to stack,ret:" + e),
                t.push(e),
                EVT.trigger(document, "showpacket")
            }),
            EVT.listen(document, "showpacket",
            function() {
                var e = t.length;
                if (log("show gift,giftArray length:" + e), e > 0 && !n) {
                    var a = t[e - 1],
                    i = a.awardId,
                    r = a.uname,
                    s = a.title,
                    c = a.figurl,
                    l = a.expireTime;
                    o.showPacket(i, r, s, c, l),
                    t = t.slice(0, e - 1),
                    ("redpacketmoblie" == i || "redpacketpcregist" == i) && EVT.trigger(document, "special_redpacket_show", i)
                } else log("packt status len:" + e + "  lock:" + n)
            }),
            EVT.listen(document, "luckyGiftMoney",
            function(e) {
                log("收到幸运礼物通知");
                var t = e.uname,
                n = e.cname,
                a = e.rate || 1,
                i = e.money || 0,
                r = e.giftPicture,
                s = (e.giftName, e.number || 1),
                o = e.comboNum || 0,
                c = "";
                o > 0 && (c = "<div class='combo'><span>" + o + "</span></div>");
                var l = c + '恭喜<span class="chat_red">' + t + '</span>送给<span class="chat_red">' + n + "</span>" + s + '个<img src="' + r + '" />，幸运地得到<span class="chat_yellow">' + a + "倍共" + i + "章鱼币</span>",
                d = $(zen("li.lucky-msg>div.u-info"));
                d.find(".u-info").empty().append(l),
                $("#msg-list").append(d),
                window.PlayChat && PlayChat.updateChatScroll()
            })
        },
        bindScll: function() {
            var e = !1;
            $(".right-nv").on("click",
            function() {
                if (!e) {
                    var t = Number($("#gift-wrap").attr("shownum")) || 10,
                    n = -parseInt($(".gift-scroll.current .gift-panel").css("left")) || 0,
                    i = t * o.item_w - 5;
                    if (! (n + i >= a)) {
                        e = !0;
                        var r = n / o.item_w | 0,
                        c = s,
                        l = c >= r + 2 * t ? t: c - r - t;
                        $(".gift-scroll.current .gift-panel").animate({
                            left: -(n + l * o.item_w)
                        },
                        function() {
                            e = !1,
                            o.giftNavHoverCheck()
                        })
                    }
                }
            }),
            $(".left-nv").on("click",
            function() {
                if (!e) {
                    var t = -parseInt($(".gift-scroll.current .gift-panel").css("left")) || 0;
                    if (! (5 >= t)) {
                        e = !0;
                        var n = Number($("#gift-wrap").attr("shownum")) || 10,
                        a = t / o.item_w | 0,
                        i = a >= n ? n: a;
                        $(".gift-scroll.current .gift-panel").animate({
                            left: -(t - o.item_w * i)
                        },
                        function() {
                            e = !1,
                            o.giftNavHoverCheck()
                        })
                    }
                }
            }),
            $(".gift-item").on({
                mouseenter: function() {
                    var e = $(this).attr("packtype") || "";
                    if ("empty" != e) {
                        $("#ghover-tip").removeClass("discount").removeClass("backrmb").show();
                        var t = $(this).attr("name"),
                        n = "true" == $(this).attr("isDisCount") ? !0 : !1,
                        a = "true" == $(this).attr("isBackRmb") ? !0 : !1,
                        i = $(this).attr("desc") || "",
                        r = $(this).attr("overtime");
                        if (null != r && r.length > 0) {
                            var s = Ut.getTimeTostr(r);
                            i += "#过期时间：" + s
                        }
                        "key" == e ? ($("#ghover-tip").find(".g-oldprice").hide(), $("#ghover-tip").find(".g-price").hide()) : ($("#ghover-tip").find(".g-oldprice").hide(), $("#ghover-tip").find(".g-price").show(), n && $("#ghover-tip").find(".g-oldprice").show());
                        var c = $(this).attr("price"),
                        l = $(this).attr("discount");
                        $("#ghover-tip").find(".dexc-info").html(i),
                        a ? $("#ghover-tip").addClass("backrmb") : !1,
                        n ? $("#ghover-tip").addClass("discount") : l = c,
                        $("#ghover-tip").find(".g-oldprice span").html(c),
                        $("#ghover-tip").find(".g-price span").html(l),
                        $("#ghover-tip").find(".g-name").html(t);
                        var d = i.split("#") || [];
                        $("#ghover-tip .appddesc").remove();
                        for (var u = 0; u < d.length; u++) if (null != d[u] && d[u].length > 0) {
                            var f = $("#ghover-tip").find(".tmpdesc").clone().removeClass("tmpdesc").addClass("appddesc");
                            f.find(".dexc-info").html(d[u]),
                            $("#ghover-tip").append(f)
                        }
                        var p = o.getGiftTipPostion($(this));
                        $("#ghover-tip").css({
                            left: p
                        })
                    }
                },
                mouseleave: function() {
                    $("#ghover-tip").hide()
                }
            }),
            $(".pay-btn-cancel").on("click",
            function() {
                $("#pay-tip-panel").hide(),
                EVT.trigger(document, "closepayscan")
            })
        },
        showGift: function(e, t, n, a) {
            $("#gift-tip-panel").find("#g-ip-pic").attr("src", e),
            $("#gift-tip-panel").find(".g-name").html(t),
            $("#gift-tip-panel").attr("gid", n).attr("discount", a).fadeIn()
        },
        showBindTip: function() {
            $("#gift-tip-panel").hide(),
            Playbind.freshimg(),
            $("#phone-bind-wrap").show()
        },
        showCheckTip: function() {
            $("#gift-tip-panel").hide(),
            Playbind.freshimg(),
            $("#phone-check-wrap").show()
        },
        showPacket: function(e, t, a, i, r) {
            if (n = !0, $(".reward .u-icon img").attr("src", i), $(".reward.get").attr("packid", e), $(".reward .reward-desc").html(a), $(".reward .u-info").html(t + "的红包"), "redpacketpcregist" == e ? $(".close-packet").show() : $(".close-packet").hide(), c.showReward("get"), c.pkRetTime = Number(r) || 0, c.pkRetTime > 0) var s = setInterval(function() {
                c.pkRetTime > 0 ? (c.pkRetTime--, $("#exttime").html(c.pkRetTime)) : (clearInterval(s), c.pkget || ($(".reward-wrap").fadeOut(), setTimeout(function() {
                    n = !1,
                    EVT.trigger(document, "showgift")
                },
                1e3)))
            },
            1e3)
        },
        showReward: function(e, t) {
            $("#reward-wrap").show(),
            $("#reward-wrap").find(".reward").removeClass("current"),
            "get" == e ? $(".get").addClass("current") : "luck" == e ? $(".luck").addClass("current") : "unluck" == e && ($(".unluck").addClass("current"), Ut.Null(t) || $("#unluck-tip").html(t))
        },
        sendGift: function(t, n, a, i) {
            if (!Ut.Null(t) && !Ut.Null(n)) {
                var r = {
                    gid: t,
                    uid: n,
                    number: a
                }; (i || null != i && "true" == i) && (r.discount = !0),
                $.ajax({
                    url: "/gift/sendGift",
                    type: "post",
                    data: r,
                    error: function() {
                        c.sendLock = !1,
                        zalert("送礼失败")
                    },
                    dataType: "json",
                    success: function(n) {
                        if (c.sendLock = !1, null == n || 0 == n.length) return zalert("系统错误.."),
                        void(c.sendLock = !1);
                        var a = n.money;
                        if (0 == n.ret) null != n.dz && 0 == n.dz && ($(".gift-item[gid='" + t + "']").removeClass("discount").attr("isdiscount", !1), $(".gift-item[gid='" + t + "'] .dz-tip").hide()),
                        User.setMoney(a),
                        $("#gift-tip-panel").fadeOut(),
                        t != e && (Chatgift.checkGift(), EVT.trigger(document, "sendsuccess", t));
                        else if (304 == n.ret) {
                            var i = Number(n.paymoney) || 0;
                            i > 0 && ($("#needpay").html(10 * Math.ceil(i / 10)), $("#alipay-scan-pic").attr("src", "/pay/qrcode?total_amount=" + Math.ceil(i / 10) / 100), $("#pay-tip-panel").fadeIn(), EVT.trigger(document, "openpayscan", a, i))
                        } else 203 == n.ret ? EVT.trigger(document, "clicklogin", "pc_sendgift") : 306 == n.ret ? c.showBindTip() : 354 == n.ret ? c.showCheckTip() : zalert(n.desc)
                    }
                })
            }
        },
        sendParcel: function(e, t, n) {
            if (t == ZY.uid) return void zalert("不能在自己频道使用包裹");
            var a = 0 | $("#pack-scroll .gift-item[gid='" + e + "']").attr("total");
            if (n > a) return c.sendLock = !1,
            void zalert("包裹礼物数量不够，请重新选定数量再赠送");
            if (Ut.Null(e)) zalert("参数错误，请刷新页面从新使用包裹");
            else {
                var i = {
                    type: "gift",
                    propid: e,
                    cid: t,
                    num: n
                };
                $.ajax({
                    url: "/zymanager/parcel/use",
                    type: "post",
                    data: i,
                    error: function() {
                        c.sendLock = !1,
                        zalert("道具使用失败")
                    },
                    dataType: "json",
                    success: function(t) {
                        if (c.sendLock = !1, 0 == t.ret) {
                            var i = a - n;
                            $("#pack-scroll .gift-item[gid='" + e + "']").attr("total", i),
                            $("#pack-scroll .gift-item[gid='" + e + "'] .pack-num").html(i)
                        } else zalert(t.desc)
                    }
                })
            }
        },
        showPayPanel: function() {
            $("#pay-tip-panel").fadeIn()
        },
        showTaskPanle: function() {
            $("#feedback-wrap").hide(),
            c.getCoin(),
            $(".task-panel").fadeIn()
        },
        showTaskConplate: function(e) {
            e = parseInt(e),
            window.portplay ? zalert("成功领取" + e + "章鱼币") : ($(".task-panel").fadeOut(), $("#task-complate").find(".num").html(e), $("#task-complate").fadeIn())
        },
        getCoin: function() {
            $.ajax({
                url: "task/list",
                type: "get",
                dataType: "json",
                success: function(e) {
                    $(".sign-task-item .pic .num").html(e[0].money),
                    $(".mobile-task-item .pic .num").html(e[1].money),
                    $(".regist-task-item .pic .num").html(e[2].money),
                    $(".sign-task-item .pic .detail").html(e[0].desc),
                    $(".mobile-task-item .pic .detail").html(e[1].desc),
                    $(".regist-task-item .pic .detail").html(e[2].desc)
                }
            })
        },
        getReward: function(e) {
            Ut.Null(e) || $.ajax({
                url: "task/getMoney",
                type: "post",
                data: {
                    type: e
                },
                dataType: "json",
                success: function(t) {
                    if (0 == t.ret) {
                        if ("sign" == e) {
                            $(".sign-task-item").removeClass("finish"),
                            $(".sign-task-item").addClass("over");
                            var n = $(".sign-task-item .num").html();
                            n = parseInt(n),
                            c.showTaskConplate(n)
                        } else if ("regist" == e) {
                            $(".regist-task-item").removeClass("finish"),
                            $(".regist-task-item").addClass("over");
                            var a = $(".regist-task-item .num").html();
                            a = parseInt(a),
                            c.showTaskConplate(a)
                        } else if ("mobile" == e) {
                            $(".mobile-task-item").removeClass("finish"),
                            $(".mobile-task-item").addClass("over");
                            var i = $(".mobile-task-item .num").html();
                            i = parseInt(i),
                            c.showTaskConplate(i)
                        }
                        var r = Number(t.money) || -1;
                        r > 0 && User.setMoney(r);
                        var s = Number($(".task-panel .finish").length) || 0;
                        s > 0 || $(".task-icon2").remove()
                    } else 323 == t.ret && EVT.trigger(document, "accounterror")
                }
            })
        },
        getPacket: function(e) {
            var t = {
                rpid: e,
                cid: ZY.cid
            };
            c.pkget = !0,
            $.ajax({
                url: "/redpacket/openRedPacket",
                type: "post",
                data: t,
                dataType: "json",
                error: function() {
                    zalert("网络错误，请稍后尝试")
                },
                success: function(t) {
                    if (c.pkRetTime = 0, 0 == t.ret) {
                        var n = (Number(t.award) || 0) / 100;
                        $("#packet-money").html(n + "元"),
                        c.showReward("luck"),
                        "redpacketmoblie" == e ? $("#reward-wrap .t-info2").show() : $("#reward-wrap .t-info2").hide(),
                        EVT.trigger(document, "getpacket", e)
                    } else 323 == t.ret ? EVT.trigger(document, "accounterror") : c.showReward("unluck", t.desc)
                }
            })
        },
        resizeGiftPanel: function(e) {
            if (!window.portplay) {
                var t = r,
                n = o.getCanShowNum(e);
                o.giftNavCheck(e, r),
                r > n && (t = n);
                var i = $(".gift-wrap").attr("shownum") || 10;
                $("#gift-wrap").removeClass("showg-" + i).addClass("showg-" + t).attr("shownum", t);
                var s = -parseInt($(".gift-panel").css("left")) || 0,
                c = $(".gift-scroll").width();
                s + c >= a && $(".gift-panel").css("left", -5)
            }
        },
        giftNavCheck: function(e, t) {
            var n = o.getCanShowNum(e);
            t > n ? $("#gift-wrap").addClass("shownv") : $("#gift-wrap").removeClass("shownv")
        },
        giftNavHoverCheck: function() {
            var e = Number($("#gift-wrap").attr("shownum")) || 10,
            t = -parseInt($(".gift-scroll.current .gift-panel").css("left")) || 0,
            n = e * o.item_w - 5;
            t + n + o.item_w > a ? $("#task-wrap .right-nv").addClass("fade") : $("#task-wrap .right-nv").removeClass("fade"),
            t > 5 ? $("#task-wrap .left-nv").removeClass("fade") : $("#task-wrap .left-nv").addClass("fade")
        },
        getCanShowNum: function(e) {
            for (var t = 580,
            n = 10,
            a = e - t,
            i = 1; 10 >= i; i++) {
                var r = 50 * i + 5 * (i - 1) + 30;
                if (r > a) {
                    n = i - 2;
                    break
                }
            }
            return n = 1 > n ? 1 : n
        },
        getGiftTipPostion: function(e) {
            var t = 0,
            n = $(e).offset().left,
            a = $("#ghover-tip").width();
            if (ZY.portchannel) {
                var i = $("#gift-wrap").offset().left,
                r = n - i;
                t = r >= 210 ? 210 : r
            } else if (ZY.tmpchannel) {
                var s = $(".left-wrap").offset().left;
                t = n - s - a / 2 + 10
            } else t = n - 58 - a / 2;
            return t
        }
    },
    c = o;
    window.Gift = c
} (),
window.Chatgift = function() {
    var e = 0,
    t = null,
    n = {
        init: function() {
            this.checkfirst()
        },
        checkfirst: function() {
            JSON.parse(store.get("rgpacked")) || {};
            if (Ut.Null(ZY.uid)) {
                var e = {
                    awardId: "redpacketpcregist",
                    cid: ZY.syspacket,
                    uid: "2",
                    title: "新手红包",
                    expireTime: 60,
                    figurl: "http://static.ws.kukuplay.com/common/images/user/userdef.png",
                    msgtype: "award",
                    uname: "zhangyutv"
                };
                Chat.noticeInterface(e),
                setInterval(function() {
                    Chat.noticeInterface(e)
                },
                3e5)
            }
        },
        getgift: function() {
            $.ajax({
                url: "/redpacket/checkRedPacket",
                type: "post",
                data: {
                    cid: ZY.cid
                },
                dataType: "json",
                success: function(e) {
                    if (null != e && e.length > 0) {
                        for (var t = 0; t < e.length; t++) e[t].msgtype = "award",
                        Chat.noticeInterface(e[t]);
                        setTimeout(function() {
                            n.getgift()
                        },
                        3e5)
                    }
                }
            })
        },
        checkGift: function() {
            null == t && (t = setInterval(function() {
                100 > e ? (n.getgift(), e++) : clearInterval(t)
            },
            9e4))
        }
    };
    return n
} (),
window.PayCheck = function() {
    var e = null,
    t = 0,
    n = {
        init: function() {
            this.listen()
        },
        listen: function() {
            EVT.listen(document, "openpayscan",
            function(n, a) {
                null == e && (e = setInterval(function() {
                    $.ajax({
                        url: "/home/info",
                        type: "post",
                        data: {},
                        dataType: "json",
                        error: function() {
                            clearInterval(e)
                        },
                        success: function(e) {
                            try {
                                e.money >= n + a && (EVT.trigger(document, "closepayscan"), User.setMoney(e.money), $("#pay-tip-panel").hide())
                            } catch(i) {
                                EVT.trigger(document, "closepayscan")
                            }
                            t++
                        }
                    })
                },
                3e3))
            }),
            EVT.listen(document, "closepayscan",
            function() {
                clearInterval(e),
                e = null
            })
        }
    };
    return n
} ();
var giftTool = function() {
    var e = {
        updatePacket: function() {
            $.ajax({
                url: "/component/playpackt",
                type: "post",
                data: {},
                error: function() {},
                success: function(e) {
                    null != e && e.length > 0 && $("#pack-scroll .gift-panel").empty().append(e)
                }
            })
        }
    };
    return e
} ();
window.Zstar = function() {
    var e, t, n = 0,
    a = !1,
    i = !1,
    r = !1,
    s = 0,
    o = !1,
    c = {
        init: function() {
            c.trick(),
            c.initEvent(),
            c.checkgift(),
            c.updatepopularity()
        },
        setting: function(e, t, a) {
            var i = Math.ceil((a - t) / 1e3);
            i > 0 && (n = i + 1),
            $(".star-gift-wrap .star-num").html(e),
            log("setting start time", n, e, t, a)
        },
        initEvent: function() {
            $(".star-panel").on({
                mouseenter: function() {
                    a = !0,
                    i = !0,
                    c.changepanel(!0)
                },
                mouseleave: function() {
                    r || (a = !1, c.changepanel(!1)),
                    i = !1
                }
            }),
            $(".star-main").on({
                mouseenter: function() {
                    a = !0,
                    r = !0,
                    c.changepanel(!0)
                },
                mouseleave: function() {
                    i || (a = !1, c.changepanel(!1)),
                    r = !1
                }
            }),
            $("#star-gift-wrap .star-panel").on("click",
            function() {
                return Ut.Null(ZY.uid) ? void EVT.trigger(document, "clicklogin", "pc_freestar") : void c.sendFreeGift()
            })
        },
        trick: function() {
            setInterval(function() {
                n > 0 && (n -= 1, 0 == n && c.checkgift(), $("#star-deadcount").html(n + "s"))
            },
            1e3)
        },
        checkgift: function() {
            $.ajax({
                url: "/freegift/freegift/getfreegift",
                type: "post",
                data: {},
                dataType: "json",
                error: function() {},
                success: function(n) {
                    if (null != n.ret) {
                        if (203 == n.ret) return o = !0,
                        void log("领取星星 用户没有登录。。。");
                        s = n.freegiftnum || 0,
                        e = n.freegiftxepiretime,
                        t = n.servertime; {
                            n.freegiftmaxnum
                        }
                        605 == n.ret ? (c.setting(s, t, t), $("#star-gift-wrap").addClass("full")) : ($("#star-gift-wrap").removeClass("full"), e > t ? c.setting(s, t, e) : (c.setting(s, t, t), log("发送返回星星数量未满过期时间异常,重新领取"), c.checkgift())),
                        log(JSON.stringify(n))
                    } else log("领取免费礼物系统异常")
                }
            }),
            $(".star-num").html()
        },
        sendFreeGift: function() {
            $.ajax({
                url: "/freegift/freegift/sendfreegift",
                type: "post",
                data: {
                    cid: ZY.cid
                },
                dataType: "json",
                error: function() {
                    zalert("赠送免费礼物异常，请稍后尝试")
                },
                success: function(n) {
                    if (0 == n.ret) {
                        s = n.freegiftnum || 0,
                        e = n.freegiftxepiretime,
                        t = n.servertime; {
                            n.freegiftmaxnum
                        }
                        605 == n.ret ? (c.setting(s, t, t), $("#star-gift-wrap").addClass("full")) : ($("#star-gift-wrap").removeClass("full"), e > t ? c.setting(s, t, e) : (c.setting(s, t, t), log("发送返回星星数量未满过期时间异常,重新领取"), c.checkgift())),
                        log(JSON.stringify(n))
                    } else zalert(n.desc)
                }
            })
        },
        changepanel: function(e) {
            Ut.Null(ZY.uid) || ($("html").hasClass("csstransitions") ? e ? $(".star-gift-wrap").addClass("open") : $(".star-gift-wrap").removeClass("open") : e ? ($(".star-gift-wrap").css({
                filter: "alpha(opacity=100)"
            }), $("#star-gift-wrap").stop().animate({
                width: 190
            })) : ($(".star-gift-wrap").css({
                filter: "alpha(opacity=60)"
            }), $("#star-gift-wrap").stop().animate({
                width: 76
            })))
        },
        updatepopularity: function() {
            $.ajax({
                url: "/freegift/freegift/getfreegiftpopularity?cid=" + ZY.cid,
                type: "post",
                data: {},
                dataType: "json",
                error: function() {},
                success: function(e) {
                    if (0 == e.ret) {
                        var t = e.freegiftpopularity || 0;
                        $("#play-pop span").html(t)
                    }
                }
            })
        }
    };
    return c
} (),
$(document).ready(function() {
    Playbind.init(),
    PlayPhoneCheck.init()
}),
window.Playbind = function() {
    var e = !1,
    t = 60,
    n = {
        init: function() {
            this.initEvent()
        },
        initEvent: function() {
            var e = this;
            this.bind(),
            $("#phone-bind-btn").on("click",
            function() {
                n.bindPhone()
            }),
            $("#send-pic-btn").on("click",
            function() {
                n.getPiccode()
            }),
            $(".bind-phone-close").on("click",
            function() {
                $("#phone-bind-wrap").hide()
            }),
            $(".bind-piccode-img").on("click",
            function() {
                e.freshimg()
            })
        },
        bind: function() {
            EVT.listen(document, PE.SENDPHONECODE_RET, n.getPiccodeRet),
            EVT.listen(document, PE.BINDPHONE_RET, n.bindPhoneRet)
        },
        getPiccode: function() {
            var t = $("#bind-phone-num").val(),
            n = $("#bind-country-ret").attr("code") || "+86",
            a = $("#bind-phone-piccode").val();
            return "+86" != n || zcheck.vilidatePhone(t) ? null == a || 0 == a.length ? void zalert("请先填写图片验证码") : void(e || EVT.trigger(document, PE.SENDPHONECODE, {
                phone: t,
                country: n,
                piccode: a
            },
            "playbindphone")) : void zalert("手机号格式不正确")
        },
        getPiccodeRet: function(n, a) {
            if (console.log("发送结果", JSON.stringify(n)), "playbindphone" === a) if (0 == n.ret) {
                $("#send-pic-btn").addClass("disable");
                var i = t;
                $("#send-pic-btn").html("<span>" + i + "</span>s后再次发送"),
                e = !0;
                var r = setInterval(function() {
                    i--,
                    i > 0 ? $("#send-pic-btn span").html(i) : (e = !1, $("#send-pic-btn").removeClass("disable"), $("#send-pic-btn").html("重新发送"), clearInterval(r))
                },
                1e3)
            } else 113 == n.ret ? (zalert("图片验证码不正确"), Playbind.freshimg()) : zalert(n.desc)
        },
        bindPhone: function() {
            var e = $("#bind-phone-num").val(),
            t = $("#bind-country-ret").attr("code") || "+86",
            n = $("#bind-phone-piccode").val(),
            a = $("#bind-phone-code").val();
            return Ut.Null(e) ? void zalert("请填写手机号再绑定") : "+86" != t || zcheck.vilidatePhone(e) ? Ut.Null(n) ? void zalert("请填图片验证码再绑定") : Ut.Null(a) ? void zalert("请填写手机验证码号再绑定") : void EVT.trigger(document, PE.BINDPHONE, {
                phone: e,
                country: t,
                piccode: n,
                code: a
            },
            "playbindphone") : void zalert("手机号格式不正确")
        },
        bindPhoneRet: function(e, t) {
            "playbindphone" === t && (0 == e.ret ? window.location.reload() : zalert(e.desc))
        },
        freshimg: function() {
            var e = Math.random();
            $(".bind-piccode-img").attr("src", "/logins/getpiccode?rd=" + e)
        }
    };
    return n
} (),
window.PlayPhoneCheck = function() {
    var e = !1,
    t = 60,
    n = {
        init: function() {
            this.initEvent()
        },
        initEvent: function() {
            this.bind(),
            $("#phone-check-btn").on("click",
            function() {
                n.checkPhone()
            }),
            $("#check-pic-btn").on("click",
            function() {
                n.getPiccode()
            }),
            $(".check-phone-close").on("click",
            function() {
                $("#phone-check-wrap").hide()
            })
        },
        bind: function() {
            EVT.listen(document, PE.SENDPHONECODE_SIMPLE_RET, n.getPiccodeRet),
            EVT.listen(document, PE.CHECKPHONECODE_RET, n.checkPhoneRet)
        },
        getPiccode: function() {
            var t = $("#phone-check-wrap").attr("phone"),
            n = $("#check-phone-piccode").val();
            e || EVT.trigger(document, PE.SENDPHONECODE_SIMPLE, {
                phone: t,
                piccode: n
            },
            "sendcheckphonecode")
        },
        getPiccodeRet: function(n, a) {
            if (console.log("发送结果", JSON.stringify(n)), "sendcheckphonecode" === a) if (0 == n.ret) {
                $("#check-pic-btn").addClass("disable");
                var i = t;
                $("#check-pic-btn").html("<span>" + i + "</span>s后再次发送"),
                e = !0;
                var r = setInterval(function() {
                    i--,
                    i > 0 ? $("#check-pic-btn span").html(i) : (e = !1, $("#check-pic-btn").removeClass("disable"), $("#check-pic-btn").html("重新发送"), clearInterval(r))
                },
                1e3)
            } else zalert(n.desc)
        },
        checkPhone: function() {
            var e = $("#phone-check-wrap").attr("phone"),
            t = $("#check-phone-code").val();
            return Ut.Null(e) ? void zalert("手机号异常") : Ut.Null(t) ? void zalert("请填写手机验证码号再验证") : void EVT.trigger(document, PE.CHECKPHONECODE, {
                phone: e,
                code: t
            },
            "checkphone")
        },
        checkPhoneRet: function(e, t) {
            "checkphone" === t && (0 == e.ret ? window.location.reload() : zalert(e.desc))
        }
    };
    return n
} (),
$(function() {
    JT.init()
});
var JT = function() {
    var e, t, n, a, i, r = 1500,
    s = 0,
    o = !1,
    c = 0,
    l = {
        jtopen: !1,
        init: function() {
            this.initEvent(),
            this.checkJTstatus()
        },
        process: function(e) {
            if (null != e && 0 != e.length) {
                var t = e.msgtype,
                n = (e.uname, e.caskId),
                a = "tong" == n ? "qt": "yin" == n ? "by": "jin" == n ? "hj": "",
                i = (e._id, e.ctime, e.etime),
                r = (e.expireTime, e.caskName, e.totalNumber),
                s = e.currentNumber,
                o = e.servertime,
                c = (e.status, e.keyName),
                d = e.keyNum,
                u = e.keyid;
                if ("Cask_Open" == t) EVT.trigger(document, "cask_open", a, i, s, r, o);
                else if ("Cask_Finish" == t) EVT.trigger(document, "cask_finish", a, i, s, r, o);
                else if ("Cask_Failed" == t) EVT.trigger(document, "cask_failed", a, i, s, r, o);
                else if ("Cask_Update" == t) {
                    log("酒桶状态：", l.jtopen);
                    var f = o;
                    i > f ? l.jtopen ? EVT.trigger(document, "cask_update", a, i, s, r, o) : EVT.trigger(document, "cask_open", a, i, s, r, o) : log("开启酒桶，结束时间不正确")
                } else "Cask_GetKey" == t && EVT.trigger(document, "Cask_GetKey", c, d, u)
            }
        },
        initEvent: function() {
            $(document).on("click", "#jt-wrap .close,#jt-small-wrap .close",
            function() {
                d.closeJT()
            }),
            $(document).on("click", "#jt-wrap .jt-expand .small",
            function() {
                l.expand(),
                d.JTreport("jtsmall", {
                    uid: ZY.uid,
                    cid: ZY.cid
                })
            }),
            $(document).on("click", "#jt-small-wrap .big",
            function() {
                l.expand(!0),
                d.JTreport("jtbig", {
                    uid: ZY.uid,
                    cid: ZY.cid
                })
            }),
            $("#close-getkey .close").on("click",
            function() {
                $("#getkey-wrap").hide()
            }),
            EVT.listen(document, "cask_open",
            function(e, t, n, a, i) {
                log("resive meg cask_open", e, t, n, a, i);
                var r = i;
                t > r ? l.showJT(e, n, a, t, i) : log("开启酒桶，结束时间不正确")
            }),
            EVT.listen(document, "cask_finish",
            function(e, t, n, a, i) {
                log("resive meg cask_finish", e, t, a, i),
                l.successJT()
            }),
            EVT.listen(document, "cask_failed",
            function(e, t, n, a, i) {
                log("resive meg cask_failed", e, t, a, i),
                l.failJT()
            }),
            EVT.listen(document, "cask_update",
            function(e, t, n, a, i) {
                log("resive meg cask_update", e, t, a, i),
                n >= a ? l.successJT() : l.updateJT(n, a, e)
            }),
            EVT.listen(document, "Cask_GetKey",
            function(e, t, n) {
                var a = "03" == n ? "qt": "02" == n ? "by": "01" == n ? "hj": "";
                log("resive meg cask_getkey", e, t, n, a),
                null != a && a.length > 0 && (window.giftTool && giftTool.updatePacket(), l.showGetKey(e, t, a))
            })
        },
        checkJTstatus: function() {
            function e() {
                $.ajax({
                    url: "/lottery/cask/getCurrentCask?cid=" + ZY.cid,
                    type: "post",
                    data: {},
                    dataType: "json",
                    error: function() {},
                    success: function(e) {
                        if (null != e && "object" == typeof e) {
                            var t = e.status,
                            n = e.etime,
                            a = +new Date,
                            i = !1,
                            r = "null";
                            "failed" == t ? (e.msgtype = "Cask_Failed", l.jtopen && (l.process(e), r = "failed")) : "success" == t ? (e.msgtype = "Cask_Finish", l.jtopen && (l.process(e), i = !0, r = "success")) : "running" == t && (e.msgtype = "Cask_Update", n > a && (i = !0, r = "update", l.process(e)))
                        } else $(".jt-all-wrap").hide(),
                        $("#jt-wrap,#jt-small-wrap").hide();
                        log("check 酒桶面板状态:" + l.jtopen, "status:" + t, "update:" + i, "op:" + r)
                    }
                }),
                setTimeout(function() {
                    c > 0 && e()
                },
                6e4)
            }
            e()
        },
        showJT: function(e, s, o, u, f) {
            var p, h;
            if ("qt" == e ? ($(".jt-link").attr("href", "/lottery/lottery/turntable?tableid=3"), $("#jt-wrap .jt-name").html("青铜酒桶任务"), p = "qt", h = "青铜") : "by" == e ? ($(".jt-link").attr("href", "/lottery/lottery/turntable?tableid=2"), $("#jt-wrap .jt-name").html("白银酒桶任务"), p = "by", h = "白银") : "hj" == e && ($("#jt-wrap .jt-name").html("黄金酒桶任务"), $(".jt-link").attr("href", "/lottery/lottery/turntable?tableid=1"), p = "hj", h = "黄金"), null != p) {
                $("#jt-img,#jt-small-img").removeAttr("class"),
                null != s && s > 0 && s == o ? ($("#jt-img,#jt-small-img").addClass(p + "-1"), this.successJT()) : $("#jt-img,#jt-small-img").addClass(p + "-2"),
                $(".jt-open-tip").show().find("span").html(h),
                i = e,
                a = s,
                n = o,
                l.updateJT(s, o, e);
                var m = f;
                r = (u - m) / 1e3,
                d.timeCount(),
                log("cask open ", r),
                this.layout(),
                l.jtopen = !0,
                $("#jt-small-wrap").hide(),
                $(".jt-all-wrap").show(),
                $("#jt-wrap").show(),
                c++,
                clearInterval(t),
                log("当前时间。。。", r),
                log("显示酒桶:", "type:" + e, "num:" + s, "all:" + o, "结束时间" + new Date(u).toISOString(), "剩余时间" + r, "酒桶面板状态：" + l.jtopen, c),
                setTimeout(function() {
                    $(".jt-open-tip").fadeOut(),
                    2 > c && l.expand()
                },
                2e4)
            }
        },
        layout: function() {
            $("#end-tip .over").hide(),
            $("#end-tip .count").show(),
            $(".success-tip").hide(),
            $("#jt-wrap .expand-icon").removeClass("close").addClass("small"),
            $("#jt-small-wrap .expand-icon").removeClass("close").addClass("big")
        },
        updateJT: function(e, t, r) {
            log("更新酒桶进度 process", "num:" + e, "all:" + t, "酒桶面板状态：" + l.jtopen);
            var o = 0;
            if (a > e ? i == r && 2 > s && (s++, o = -1, log("更新当前酒桶数量小于显示数量，暂不更新...")) : s = 0, 0 == o) {
                $("#jt-task .num,#jt-small-task .num").html(e),
                $("#jt-task .all,#jt-small-task .all").html(t);
                var c = e / t;
                n = t,
                a = e,
                d.process(Number(100 * c) || 0),
                e > 0 && e >= t / 2 ? $("#jt-img,#jt-small-img").removeClass(i + "-2").addClass(i + "-1") : $("#jt-img,#jt-small-img").removeClass(i + "-1").addClass(i + "-2"),
                e >= 0 && e >= t ? $(".jt-success-light").show() : $(".jt-success-light").hide()
            }
        },
        showGetKey: function(e, t, n) {
            $("#getkey-wrap").removeAttr("class"),
            $("#getkey-wrap").addClass(n),
            $("#getkey-wrap .key-name").html(e),
            $("#getkey-wrap .key-num").html(t),
            $("#getkey-wrap").show()
        },
        successJT: function() {
            log("酒桶成功"),
            l.jtopen && (l.expand(!0), this.updateJT(n, n, i), d.deadCount(), $("#jt-wrap .success-tip").removeClass("fail"), $("#jt-wrap .success-tip").show(), $(".jt-expand .small,.jt-expand .big").removeClass("small").removeClass("big").addClass("close"))
        },
        failJT: function() {
            log("酒桶失败"),
            $("#jt-wrap .success-tip").addClass("fail").show(),
            $(".jt-expand .small,.jt-expand .big").removeClass("small").removeClass("big").addClass("close"),
            l.jtopen && (l.expand(!0), d.deadCount())
        },
        closeJT: function() {
            d.closeJT()
        },
        expand: function(e) {
            $(".jt-all-wrap").show(),
            e ? ($(".jt-small-wrap").hide(), $(".jt-wrap").show(), c++) : ($(".jt-wrap").hide(), $(".jt-small-wrap").show(), $(".jt-open-tip").fadeOut())
        }
    },
    d = {
        process: function(e) {
            e = e > 100 ? 100 : e;
            var t = 152 * e / 100;
            $("#jt-process").css({
                left: t
            })
        },
        timeCount: function() {
            function t() {
                var e = r / 3600 | 0,
                t = r / 60 % 60 | 0,
                n = r % 60 | 0;
                e = 10 > e ? "0" + e: e,
                t = 10 > t ? "0" + t: t,
                n = 10 > n ? "0" + n: n;
                var a = e + ":" + t + ":" + n;
                return a
            }
            var n = t();
            return $("#end-tip #count-num").html(n),
            null != e ? void log("倒计时正在运行中..") : void(e = setInterval(function() {
                r--,
                0 >= r && (clearInterval(e), d.deadCount(), o || l.failJT(), e = null, l.jtopen = !1);
                var n = t();
                $("#end-tip #count-num").html(n)
            },
            1e3))
        },
        deadCount: function() {
            $("#end-tip .count").hide(),
            $("#end-tip .over").show();
            var e = 10;
            null == t && ($("#end-tip .over span").html(e), t = setInterval(function() {
                e--,
                0 >= e && (clearInterval(t), d.closeJT(), t = null, l.jtopen = !1),
                $("#end-tip .over span").html(e)
            },
            1e3))
        },
        closeJT: function() {
            $(".jt-all-wrap").hide(),
            $("#jt-wrap,#jt-small-wrap").hide(),
            clearInterval(e),
            clearInterval(t),
            t = null,
            e = null,
            l.jtopen = !1
        },
        JTreport: function(e, t) {
            var n = {
                uid: ZY.uid,
                uni_id: cookie.get("uni_id"),
                cid: ZY.cid
            },
            a = $.extend({},
            n, t),
            i = [],
            r = JSON.stringify(a);
            i.push("itemtype=zhangyupc"),
            i.push("itemid=" + e),
            i.push("logver=v1"),
            i.push("jsoninfo=" + r);
            var s = i.join("&");
            s = encodeURI(s);
            var o = new Image;
            o.src = "http://log.kukuplay.com/report.gif?" + s
        }
    };
    return l
} (),
ts = function() {
    var e = {
        _id: "123",
        ctime: +new Date,
        etime: +new Date + 108e5,
        expireTime: +new Date + 108e5,
        caskId: "jing",
        caskName: "黄金酒桶",
        totalNumber: "100",
        currentNumber: "23",
        status: "running",
        msgtype: "Cask_Open"
    },
    t = {
        open: function() {
            e.msgtype = "Cask_Open",
            JT.process(e)
        },
        update: function(t) {
            e.msgtype = "Cask_Update",
            e.currentNumber = t,
            JT.process(e)
        },
        success: function(t) {
            e.msgtype = "Cask_Finish",
            e.currentNumber = t,
            JT.process(e)
        },
        fail: function(t) {
            e.msgtype = "Cask_Failed",
            e.currentNumber = t,
            JT.process(e)
        },
        getkey: function(e) {
            var t = {
                keyid: e,
                keyName: "黄金钥匙",
                keyNum: 3,
                msgtype: "Cask_GetKey"
            };
            JT.process(t)
        }
    };
    return t
} ();
$(document).ready(function() {
    ChatForbid.init()
}),
window.ChatForbid = function() {
    "use strict";
    var e = ZY.auth,
    t = !1,
    n = {
        fuid: "",
        funame: "",
        fcookie: "",
        fauth: "",
        msg: ""
    },
    a = {
        h_fix: -50,
        w_fix: 50,
        init: function() {
            i.initEvent()
        },
        initEvent: function() {
            $("#msg-list .u-name").live("click",
            function() {
                var t = $(this).parent().attr("uid"),
                a = $(this).html(),
                r = $(this).parent().attr("cookies"),
                s = ($(this).parent().parent().hasClass("me"), $(this).parent().attr("auth")),
                o = $(this).parent().find(".content").html();
                n.fuid = t,
                n.funame = a,
                n.fcookie = r,
                n.fauth = s,
                n.msg = o,
                log("用户操作，myauth" + e, "forbid:" + JSON.stringify(n)),
                null != t && 0 != t.length && ("fy" == e && "fy" != s && "ro" != s && i.showopTip(this, !0, s, e), "ro" == e && "fy" != s && i.showopTip(this, !0, s), "am" == e && "fy" != s && "ro" != s && "am" != s && i.showopTip(this, !0, s), Chat.frozen = !0)
            }),
            $(".chat-wrap").on("click",
            function() {
                i.showopTip(null, !1)
            }),
            $("#msg-list .gu-name").live("click",
            function() {
                var t = $(this).attr("uid"),
                a = $(this).html(),
                r = $(this).parent().attr("auth");
                n.fuid = t,
                n.funame = a,
                n.fauth = "no",
                log("礼物封禁，myauth" + e, "forbid:" + JSON.stringify(n)),
                null != t && 0 != t.length && ("fy" == e && "fy" != r && "ro" != r && i.showopTip(this, !0, r, e), Chat.frozen = !0)
            }),
            $(".forbid-btn").on("click",
            function() {
                i.showForbidPanel()
            }),
            $(".super-forbid-btn").on("click",
            function() {
                var e = $(this).attr("forbid");
                t ? zalert("禁言请求已经发送，请等待服务器返回") : Ut.Null(e) || "lock" != e ? a.quickForbid(n.fuid, n.fcookie, e, n.msg) : a.frozen(n.fuid)
            }),
            $("#manager-zpanel .close,#manager-zpanel .darkbtn").on("click",
            function() {
                $("#manager-zpanel").hide()
            }),
            $("#sure-forbid").on("click",
            function() {
                var e = n.fuid,
                a = n.fcookie;
                Ut.Null(e) && zalert("封禁uid 为空"),
                t || i.forbid(e, a, n.msg)
            }),
            $(".addmanager-btn").on("click",
            function() { ("fy" == e || "ro" == e) && (i.showopPanel("addmanager"), i.showopTip(null, !1))
            }),
            $(".unmanager-btn").on("click",
            function() { ("fy" == e || "ro" == e) && i.showopPanel("unmanager")
            }),
            $(".closeoppanel").on("click",
            function() {
                i.hideopPanel()
            }),
            $("#manager-sure").on("click",
            function() {
                var e = ChatForbid.getModel(),
                t = e.fuid;
                i.addmanager(t)
            }),
            $(".m-op .cancel").on("click",
            function() {
                i.hideopPanel()
            }),
            $("#unmanager-sure").on("click",
            function() {
                var e = ChatForbid.getModel(),
                t = e.fuid;
                i.unManager(t)
            })
        },
        showopTip: function(t, n, i, r) {
            if (n === !1) $("#chatop-wrap").hide(),
            Chat.frozen = !1;
            else if (null != t) {
                var s = $(t).offset().left,
                o = $(t).offset().top,
                c = ($(t).html(), $(t).parent().attr("uid") || $(t).attr("uid") || "");
                $("#chatop-wrap .uid-item").html("UID:" + c),
                $("#chatop-wrap").removeClass("show-manager").removeClass("show-unmanager"),
                ("ro" == e || "fy" == e) && ("am" == i ? $("#chatop-wrap").addClass("show-unmanager") : ("no" == i || "" == i || null == i) && $("#chatop-wrap").addClass("show-manager")),
                $("#chatop-wrap").css(ZY.tmpchannel ? {
                    top: o - 490,
                    left: s + 50,
                    display: "block"
                }: {
                    top: o + a.h_fix,
                    left: s + a.w_fix,
                    display: "block"
                })
            }
            "fy" == r ? $("#chatop-wrap").addClass("super-auth") : $("#chatop-wrap").removeClass("super-auth")
        },
        showForbidPanel: function() {
            $("#forbid-uname").html(n.funame),
            $("#forbid-uid").html(n.fuid),
            $("#manager-zpanel").show()
        },
        forbid: function(e, n, a) {
            var i = ZY.cid;
            if (!Ut.Null(e)) {
                var r = 60 * (Number($("#forbid-time").val()) || 0) * 60 * 1e3,
                s = "chatuid",
                o = e,
                c = null;
                if (0 >= r || r > 864e5) return void zalert("禁言时间超出了限制");
                var l = 1 == $("#ip-forbid:checked").length;
                if (l) {
                    var d = Chat.uidip[e];
                    Ut.Null(d) || (c = d),
                    s = "chatip"
                }
                var u = "",
                f = 1 == $("#all-forbid:checked").length;
                f && (u = "all");
                var p = 1 == $("#ever-forbid:checked").length;
                p && (r = 31536e7);
                var h = {
                    cid: i,
                    expireTime: r,
                    forbidtype: s,
                    forbidvalue: o,
                    forbidcookie: n,
                    forbidall: u,
                    msg: a
                };
                c && (h.forbidip = c),
                t = !0,
                $.ajax({
                    url: "/forbid/addforbid",
                    type: "post",
                    data: h,
                    dataType: "json",
                    error: function() {
                        zalert("禁言网络请求失败，请稍后尝试"),
                        t = !1
                    },
                    success: function(e) {
                        0 == e.ret ? (zalert("禁言成功"), $("#manager-zpanel").hide(), $("#chatop-wrap").hide()) : zalert("禁言失败：" + e.desc),
                        t = !1
                    }
                })
            }
        },
        quickForbid: function(e, n, a, i) {
            var r = 36e5,
            s = "";
            "roomday" == a ? r = 864e5: "allday" == a ? (r = 864e5, s = "all") : "allmonth" == a ? (r = 2592e6, s = "all") : "allever" == a && (r = 31104e7, s = "all");
            var o = {
                cid: ZY.cid,
                expireTime: r,
                forbidtype: "chatuid",
                forbidvalue: e,
                forbidcookie: n,
                forbidall: s,
                msg: i
            };
            t = !0,
            $.ajax({
                url: "/forbid/addforbid",
                type: "post",
                data: o,
                dataType: "json",
                error: function() {
                    zalert("禁言网络请求失败，请稍后尝试"),
                    t = !1
                },
                success: function(e) {
                    0 == e.ret ? (zalert("禁言成功"), $("#manager-zpanel").hide(), $("#chatop-wrap").hide()) : zalert("禁言失败：" + e.desc),
                    t = !1
                }
            })
        },
        frozen: function(e) {
            $.ajax({
                url: "/home/lockuser",
                type: "post",
                data: {
                    uid: e,
                    locktext: "播放页前端冻结"
                },
                dataType: "json",
                error: function() {},
                success: function(e) {
                    zalert(0 == e.ret ? "冻结成功": e.desc)
                }
            })
        },
        showopPanel: function(e, t, a) {
            "tip" == e && ($(".manager-panel").find(".restip").html(t), $(".manager-panel").find(".resmsg").html(a)),
            $(".manager-panel .uname").html(n.funame),
            $("#forbid-time").html(""),
            $(".manager-panel").show(),
            $(".manager-op").hide(),
            $("#" + e + "-oppanel").show()
        },
        hideopPanel: function() {
            $(".manager-panel").hide()
        },
        addmanager: function(e) {
            var t = ZY.cid;
            if ("" != e && null != e) {
                var n = {
                    uid: e,
                    cid: t
                };
                $.ajax({
                    url: "/auth/addauth",
                    type: "post",
                    data: n,
                    dataType: "json",
                    success: function(e) {
                        0 == e.ret ? i.showopPanel("tip", "添加房管成功") : i.showopPanel("tip", "添加房管失败", e.desc)
                    }
                })
            }
        },
        unManager: function(e) {
            var t = ZY.cid;
            if ("" != e && null != e) {
                var n = {
                    uid: e,
                    cid: t
                };
                $.ajax({
                    url: "/auth/deleteauth",
                    type: "post",
                    data: n,
                    dataType: "json",
                    success: function(e) {
                        0 == e.ret ? i.showopPanel("tip", "移除房管成功") : i.showopPanel("tip", "移除房管失败", e.desc)
                    }
                })
            }
        },
        getModel: function() {
            return n
        },
        setModel: function(e, t) {
            n[e] = t
        }
    },
    i = a;
    return a
} (),
$(function() {
    ZYRank.init()
}),
window.ZYRank = function() {
    var e = {
        init: function() {
            this.initEvent(),
            this.ajax().then(function(t) {
                e.appendData(t)
            }),
            this.update()
        },
        update: function() {
            if ("false" != ZY.status) {
                setInterval(function() {
                    $(".topother").empty(),
                    e.ajax().then(function(t) {
                        e.appendData(t)
                    })
                },
                12e4)
            }
        },
        initEvent: function() {
            setTimeout("$('.room-post').removeClass('post-view')", 1e4);
            $(".room-post").hover(function() {
                $(".room-post").addClass("post-view")
            },
            function() {
                $(".room-post").removeClass("post-view")
            }),
            $(".fans-rank").hover(function() {
                $(".fans-rank").animate({
                    height: "393"
                },
                100),
                $(".play-rank").addClass("nohidden")
            },
            function() {
                $(".fans-rank").animate({
                    height: "121"
                },
                100),
                $(".play-rank").removeClass("nohidden"),
                e.hideOppanel()
            }),
            $(".dayrank-tit").on("click",
            function() {
                $("#dayrank-list").addClass("show"),
                $("#weekrank-list").removeClass("show"),
                $(this).addClass("selected"),
                $(".weekrank-tit").removeClass("selected")
            }),
            $(".weekrank-tit").on("click",
            function() {
                $("#weekrank-list").addClass("show"),
                $("#dayrank-list").removeClass("show"),
                $(this).addClass("selected"),
                $(".dayrank-tit").removeClass("selected")
            }),
            $(document).on("click", ".play-rank .rank-name",
            function(t) {
                e.showOpPanel($(this)),
                t.stopPropagation()
            }),
            $(document).on("click", ".toprank-user",
            function(t) {
                e.showOpPanel($(this), !0),
                t.stopPropagation()
            }),
            $(document).on("click", ".rank-list",
            function() {
                e.hideOppanel()
            })
        },
        ajax: function() {
            var e = $.Deferred();
            return $.ajax({
                url: "/zyrank/fansrank/get",
                type: "post",
                data: {
                    cid: ZY.cid
                },
                dataType: "json",
                error: function() {
                    e.reject()
                },
                success: function(t) {
                    e.resolve(t)
                }
            }),
            e.promise()
        },
        appendData: function(t) {
            if (null != t) for (var n = t.day,
            a = t.week,
            i = [".first", ".second", ".third"], r = 0; 10 > r; r++) if (null == n[0] && ($(".dayrank-tit").removeClass("selected"), $("#dayrank-list").removeClass("show"), $(".weekrank-tit").addClass("selected"), $("#weekrank-list").addClass("show")), 3 > r && (e.topJudge("#dayrank-list", n[r], i[r]), e.topJudge("#weekrank-list", a[r], i[r])), r >= 3) {
                var s = n[r],
                o = a[r],
                c = $("<div class='item'><i class='rank-place'></i><span class='rank-name'></span><i class='rank-compare'></i></div>"),
                l = c.clone().removeAttr("style").removeAttr("id"),
                d = c.clone().removeAttr("style").removeAttr("id");
                null != s && l.attr("uid", s.uid).attr("uname", s.uname),
                l.find(".rank-place").html(r + 1),
                l.appendTo("#day-items"),
                d.find(".rank-place").html(r + 1),
                d.appendTo("#week-items"),
                null != o && d.attr("uid", o.uid).attr("uname", o.uname),
                e.otherJudge(s, l),
                e.otherJudge(o, d)
            }
        },
        otherJudge: function(e, t) {
            null == e ? (t.find(".rank-name").html("-- 虚位以待 --"), t.find(".rank-compare").addClass("rank-equal").removeClass("rank-up").removeClass("rank-down")) : (t.find(".rank-name").html(e.uname), 1 == e.status ? t.find(".rank-compare").addClass("rank-up").removeClass("rank-equal").removeClass("rank-down") : 0 == e.status ? t.find(".rank-compare").addClass("rank-equal").removeClass("rank-up").removeClass("rank-down") : t.find(".rank-compare").addClass("rank-down").removeClass("rank-up").removeClass("rank-equal"))
        },
        topJudge: function(e, t, n) {
            null != t ? ($(e).find(n).attr("uid", t.uid).attr("uname", t.uname).find(".toprank-img").attr("src", t.upic), $(e).find(n).find(".toprank-name").html(t.uname)) : ($(e).find(n).find(".toprank-img").attr("src", "http://static.ws.kukuplay.com/images/zydefault.jpg"), $(e).find(n).find(".toprank-name").html("-- 虚位以待 --"))
        },
        showOpPanel: function(e, t) {
            var n = ZY.auth,
            a = $(e).parent().position().left,
            i = $(e).parent().position().top,
            r = $(e).parent().attr("uname"),
            s = $(e).parent().attr("uid") || $(e).attr("uid") || "";
            if (!Ut.Null(s) && ("ro" == n || "fy" == n)) {
                ChatForbid.setModel("fuid", s),
                ChatForbid.setModel("funame", r);
                var o = t ? 0 : 80,
                c = t ? 50 : 160;
                $("#payrank-op").css({
                    top: i + c,
                    left: a + o,
                    display: "block"
                }),
                $("#payrank-op .uid-item").html("UID:" + s)
            }
        },
        hideOppanel: function() {
            $("#payrank-op").hide()
        }
    };
    return e
} (),
$(function() {
    Zstar.init()
}),
window.IE8 = !1,
window.Zstar = function() {
    function e(e) {
        l.save(),
        l.strokeStyle = v,
        l.lineWidth = 4,
        l.beginPath(),
        l.arc(24, 24, 24, -Math.PI / 2, -Math.PI / 2 + e * Math.PI * 2 / 100, !1),
        l.stroke(),
        l.closePath(),
        l.restore()
    }
    var t, n, a, i, r, s, o, c, l, d = [],
    u = 0,
    f = 600,
    p = 0,
    h = 0,
    m = -8,
    g = -14,
    v = "#fb5538",
    k = {
        init: function() {
            k.laytout(),
            k.animate(),
            this.updateStar(),
            this.checkgift(),
            this.initEvent(),
            this.initCanvas()
        },
        laytout: function() {
            window.portplay && (m = 35, g = 1, v = "#FFD400"),
            $("html").hasClass("csstransforms") || (IE8 = !0)
        },
        setExy: function(e, t) {
            for (var n = 0; n < d.length; n++) d[n].setExy(e, t)
        },
        initEvent: function() {
            $("#star-pic").on("click",
            function() {
                return Ut.Null(ZY.uid) ? void EVT.trigger(document, "clicklogin", "pc_freestar") : void k.sendFreeGift()
            }),
            setTimeout(function() {
                $("#sc-panel").scroll(function() {
                    var e = $("#play-pop").offset().top + m,
                    t = $("#play-pop").offset().left + g;
                    Zstar.setExy(t, e)
                })
            },
            3e3)
        },
        play: function() {
            var e = $("#star-dot .dottmp").clone().removeClass("dottmp");
            $("#star-dot").append(e),
            n = $("#star-dot").offset().top,
            t = $("#star-dot").offset().left,
            i = $("#play-pop").offset().top,
            a = $("#play-pop").offset().left;
            var r = t - 300 * Math.random() - 200,
            s = n - 100 * Math.random() - 100,
            o = a + m,
            c = i + g,
            l = anstar(e, r, s, o, c);
            d.push(l)
        },
        setting: function(e, t, n) {
            var a = Math.ceil((n - t) / 1e3);
            a > 0 && (u = a + 1),
            $(".star-wrap .star-num").html(e),
            log("setting start time", u, e, t, n)
        },
        trick: function() {
            o || (o = setInterval(function() {
                if (u > 0) {
                    if (window.Egg && Egg.show) return;
                    u -= 1;
                    var t = Math.floor((f - u) / f * 100);
                    if (0 == u && k.checkgift(), IE8) return;
                    if (1 >= t - p) l.clearRect(0, 0, c.width, c.height),
                    e(t);
                    else var n = p,
                    a = setInterval(function() {
                        n += .4,
                        n >= t && clearInterval(a),
                        l.clearRect(0, 0, c.width, c.height),
                        e(n)
                    },
                    10);
                    p = t
                }
            },
            1e3))
        },
        stopTrick: function() {
            clearInterval(o),
            !IE8 && e(100)
        },
        checkgift: function() {
            $.ajax({
                url: "/freegift/freegift/getfreegift",
                type: "post",
                data: {},
                dataType: "json",
                error: function() {},
                success: function(e) {
                    if (null != e.ret) {
                        if (203 == e.ret) return signerr = !0,
                        log("领取星星 用户没有登录。。。"),
                        void $("#star-wrap").addClass("show");
                        h = e.freegiftnum || 0,
                        r = e.freegiftxepiretime,
                        s = e.servertime; {
                            e.freegiftmaxnum
                        }
                        605 == e.ret ? (k.setting(h, s, s), $("#star-wrap").addClass(0 == h ? "end": "full"), k.stopTrick()) : 601 == e.ret ? (k.setting(h, s, s), $("#star-wrap").addClass("full"), k.stopTrick()) : ($("#star-wrap").removeClass("full").removeClass("end"), r > s ? k.setting(h, s, r) : (k.setting(h, s, s), log("发送返回星星数量未满过期时间异常,重新领取"), k.checkgift()), $("#star-wrap").addClass("show"), k.trick()),
                        log(JSON.stringify(e))
                    } else log("领取免费礼物系统异常")
                }
            })
        },
        sendFreeGift: function() {
            $.ajax({
                url: "/freegift/freegift/sendfreegift",
                type: "post",
                data: {
                    cid: ZY.cid
                },
                dataType: "json",
                error: function() {
                    zalert("赠送海星网络异常，请稍后尝试")
                },
                success: function(e) {
                    0 == e.ret ? (h = e.freegiftnum || 0, r = e.freegiftxepiretime, s = e.servertime, k.setting(h, s, s), $("#star-wrap").removeClass("full").removeClass("end"), r > s ? k.setting(h, s, r) : (k.setting(h, s, s), log("发送返回星星数量未满过期时间异常,重新领取"), k.checkgift()), $("#star-wrap").addClass("show"), Zstar.play(), k.trick(), log(JSON.stringify(e))) : zalert(e.desc)
                }
            })
        },
        delSend: function() {},
        updateStar: function() {
            $.ajax({
                url: "/freegift/freegift/getfreegiftpopularity?cid=" + ZY.cid,
                type: "post",
                data: {},
                dataType: "json",
                error: function() {},
                success: function(e) {
                    if (0 == e.ret) {
                        var t = e.freegiftpopularity || 0;
                        $("#play-pop span").html(t)
                    }
                }
            })
        },
        animate: function() {
            var e = window.requestAnimationFrame;
            e || (e = function(e) {
                var t, n = (new Date).getTime(),
                a = Math.max(0, 16 - (n - t)),
                i = window.setTimeout(function() {
                    e(n + a)
                },
                a);
                return t = n + a,
                i
            }),
            e(Zstar.animate),
            Zstar.render()
        },
        render: function() {
            for (var e = [], t = 0; t < d.length; t++) d[t].isend || e.push(d[t]);
            for (var t = 0; t < e.length; t++) e[t].animate();
            d = e
        },
        initCanvas: function() {
            IE8 || (c = document.getElementById("star-canvas"), l = c.getContext("2d"))
        }
    };
    return k
} ();
var anstar = function() {
    var e = 2e3,
    t = 4e3,
    n = 400,
    a = {},
    i = function(e, t, n, a, i) {
        this.el = $(e),
        this.sx = this.el.offset().left,
        this.sy = this.el.offset().top,
        this.ex = t,
        this.ey = n,
        this.ex1 = t,
        this.ey1 = n,
        this.ex2 = a,
        this.ey2 = i,
        this.antime = 0,
        this.x = 0,
        this.y = 0
    };
    return i.prototype = {
        isend: !1,
        isbeforeend: !1,
        setExy: function(e, t) {
            this.ex2 = e,
            this.ey2 = t
        },
        animate: function() {
            this.stime1 = Number(this.stime1) || Date.now() - 1;
            var i = Date.now() - this.stime1;
            if (e > i) {
                this.stime1 = Number(this.stime1) || Date.now() - 1;
                var i = Date.now() - this.stime1,
                r = this.ex1 - this.sx,
                s = this.ey1 - this.sy;
                this.geteasyLiner(i, r, s, e + 300),
                this.tx1 = this.sx + a.x,
                this.ty1 = this.sy + a.y,
                IE8 ? (this.el[0].style.left = a.x + "px", this.el[0].style.top = a.y + "px") : this.el[0].style.transform = "translate(" + a.x + "px, " + a.y + "px)"
            } else {
                this.stime2 = Number(this.stime2) || Date.now() - 1;
                var o = Date.now() - this.stime2,
                r = this.ex2 - this.tx1,
                s = this.ey2 - this.ty1;
                this.geteasyCir(o + 150, r, s, t),
                IE8 ? (this.el[0].style.left = a.x + this.ex1 - this.sx + "px", this.el[0].style.top = a.y + this.ey1 - this.sy + "px") : this.el[0].style.transform = "translate(" + (a.x + this.ex1 - this.sx) + "px, " + (a.y + this.ey1 - this.sy) + "px)"
            }
            Date.now() - this.stime1 > e + t ? this.end() : Date.now() - this.stime1 > e + t - n && (this.isbeforeend || (this.isbeforeend = !0, this.beforeEnd()))
        },
        beforeEnd: function() {
            var e = Number($("#play-pop span").html()) || 0;
            $("#play-pop span").html(e + 1)
        },
        end: function() {
            this.isend = !0,
            $("html").hasClass("csstransforms") ? this.el.addClass("an").addClass("light") : this.el.animate({
                opacity: 0
            },
            500)
        },
        geteasyLiner: function(e, t, n, i) {
            var r = (e = e / i - 1) * e * e + 1;
            r = Math.min(1, r),
            a.x = t * r,
            a.y = n * r
        },
        geteasyCir: function(e, t, n, i) {
            var r = (e /= i / 2) < 1 ? .5 * e * e * e * e * e: .5 * ((e -= 2) * e * e * e * e + 2);
            r = Math.min(1, r),
            a.x = t * r,
            a.y = n * Math.sqrt(r)
        }
    },
    function(e, t, n, a, r) {
        return new i(e, t, n, a, r)
    }
} (); !
function() {
    var e = window.jQuery,
    t = window.EVT,
    n = window.ZY,
    a = window.Ut,
    i = {
        ERR_OK: 0,
        ERR_FAILED: 313,
        ERR_DENIED: 203,
        ERR_ASYN: 700,
        INTERVAL_COUNT: 1e3,
        TIMEOUT_TOLOGIN: 2e3,
        TIMEOUT_OPEN: 3e3,
        TIMEOUT_SHAKE: 5e3,
        LIMIT_BOSS: 4
    },
    r = {
        RUNWAY: "runwayV2",
        LOGIN: "clicklogin"
    },
    s = {
        boxQueue: [],
        currBossId: "",
        currTime: "",
        currBoxShowAnimation: "",
        currBoxOpenAnimationUr: "",
        redPkgNum: 7,
        initPage: function() {
            this.initDom(),
            this.hideWrap(),
            this.bindEvent(),
            this.fetchQueue()
        },
        initDom: function() {
            this.$playTreasureWrap = e(".play-treasure-wrap"),
            this.$boxTimer = e("#timer-countDown"),
            this.$boxWrap = e("#treasure-wrap"),
            this.$boxClose = e(".treasure-close"),
            this.$boxAnimation = e(".treasure-animation"),
            this.$boxAnimationShake = e(".treasure-ani-shake"),
            this.$boxAnimationOpen = e(".treasure-ani-open"),
            this.$boxOpen = e(".treasure-open"),
            this.$redPkgWrap = e("#red-package-group"),
            this.$redPkgs = e(".red-packages"),
            this.$redOnePkg = e(".red-package"),
            this.$redPkgSucc = e("#red-package-succ"),
            this.$redPkgFail = e("#red-package-fail")
        },
        bindEvent: function() {
            var s = this;
            t.listen(document, r.RUNWAY,
            function(e) {
                "prop" === e.runwayConfigType && s.fetchQueue()
            }),
            this.$redOnePkg.on("click",
            function() {
                return a.Null(n.uid) ? (window.zalert("请先登录再抢红包喔~"), void setTimeout(function() {
                    e("#zalert").hide(),
                    t.trigger(document, r.LOGIN)
                },
                i.TIMEOUT_TOLOGIN)) : void s.getRedPkg(s.redPacketId).then(function(e) {
                    s.getRedPkgCallback(e)
                }).then(null,
                function() {
                    window.zalert("网络异常，请稍后再试吧")
                })
            }),
            e("#red-package-succ .confirm").on("click",
            function() {
                s.$redPkgSucc.hide(),
                s.$boxOpen.hide(),
                s.$redPkgWrap.hide(),
                s.currBossId || s.hideWrap()
            }),
            e("#red-package-fail .confirm").on("click",
            function() {
                s.$redPkgFail.hide(),
                s.$boxOpen.hide(),
                s.$redPkgWrap.hide(),
                s.currBossId || s.hideWrap()
            })
        },
        getRedPkgCallback: function(n) {
            switch (n.ret) {
            case i.ERR_OK:
                e(".zyb-num").html(n.data.money),
                e(".wealth-num span").html(parseInt(e(".wealth-num span").html()) + parseInt(n.data.money)),
                this.renderRedPkg("success"),
                this.setNext();
                break;
            case i.ERR_DENIED:
                window.zalert("请先登录再抢红包喔~"),
                setTimeout(function() {
                    e("#zalert").hide(),
                    t.trigger(document, "clicklogin")
                },
                i.TIMEOUT_TOLOGIN);
                break;
            case i.ERR_FAILED:
                this.renderRedPkg("fail"),
                this.setNext();
                break;
            case i.ERR_ASYN:
                window.clearInterval(this.timerBox),
                this.renderRedPkg("fail"),
                this.reset(),
                this.fetchQueue()
            }
        },
        fetchQueue: function() {
            var e = this;
            this.getBoxQueue().then(function(t) {
                if (t.boxqueue.length) {
                    e.showWrap();
                    var n = e.setQueue(t);
                    e.renderBoxQueue(n)
                }
            }).then(null,
            function() {
                console.log("网络异常，获取宝箱失败啦")
            })
        },
        getBoxQueue: function() {
            var t = e.Deferred();
            return e.ajax({
                url: "/zhangyugift/box/queue",
                type: "get",
                data: {
                    cid: n.cid
                },
                dataType: "json",
                error: function(e) {
                    t.reject(e)
                },
                success: function(e) {
                    t.resolve(e)
                }
            }),
            t.promise()
        },
        setQueue: function(e) {
            return this.currBossId && this.currBossId === e.boxqueue[0].boxId ? (this.boxQueue = this.boxQueue.slice(0, 1).concat(e.boxqueue.slice(1)), !0) : (this.currTime = e.currentTime, this.boxQueue = e.boxqueue, this.currBossId = this.boxQueue[0].boxId, this.currBoxShowAnimation = this.boxQueue[0].gift.boxShowAnimationUrl, this.currBoxOpenAnimation = this.boxQueue[0].gift.boxOpenAnimationUrl, this.renderBoxClose(), this.initCountdown(), !1)
        },
        renderBoxQueue: function(t) {
            t ? e("#star-boss .boss-item:not(:first)").remove() : e("#star-boss .boss-item").remove();
            for (var n = e("#star-boss .boss-item:first").size() ? 1 : 0, a = this.boxQueue.length >= i.LIMIT_BOSS ? i.LIMIT_BOSS: this.boxQueue.length, r = n; a > r; r++) {
                var s = '<div class="boss-item ' + r + this.boxQueue[r].boxId + '">',
                o = '<img width="30" src="' + this.boxQueue[r].sendUser.figureurl + '">',
                c = "</div>";
                e("#star-boss").append(s + o + c)
            }
        },
        initCountdown: function() {
            return window.clearInterval(this.timerBox),
            this.boxOpenGap = this.boxQueue[0].openTime - this.currTime,
            this.boxDeadTime = this.boxQueue[0].openTime + this.boxQueue[0].expire,
            this.redShowTimer = this.boxOpenGap <= 0 ? this.boxDeadTime - this.currTime: this.boxQueue[0].expire,
            this.redShowTimer <= 0 ? (this.renderRedPkg("close"), void this.setNext()) : (this.redPacketId = this.currBossId, void(this.boxOpenGap > 0 ? this.renderCountdown() : this.renderBoxAnimation("opening")))
        },
        setNext: function() {
            this.boxQueue.shift(),
            e("#star-boss .boss-item:first").remove(),
            this.boxQueue.length >= 1 ? (this.currBossId = this.boxQueue[0].boxId, this.currBoxShowAnimation = this.boxQueue[0].gift.boxShowAnimationUrl, this.currBoxOpenAnimation = this.boxQueue[0].gift.boxOpenAnimationUrl, this.fetchCurrentTime()) : (this.$redPkgSucc.is(":hidden") && this.$redPkgFail.is(":hidden") && this.hideWrap(), this.reset())
        },
        fetchCurrentTime: function() {
            var e = this;
            this.getBoxQueue().then(function(t) {
                e.currTime = t.currentTime,
                e.renderNext()
            }).then(null,
            function() {
                window.zalert("网络异常，连接服务器失败啦")
            })
        },
        reset: function() {
            this.boxQueue = [],
            this.currBossId = "",
            this.currTime = ""
        },
        hideWrap: function() {
            this.$playTreasureWrap.hide()
        },
        showWrap: function() {
            this.$playTreasureWrap.show()
        },
        fadeOutAni: function(e) {
            e.addClass("fade"),
            e.on("webkitAnimationEnd MSAnimationEnd mozAnimationEnd animationend",
            function() {
                e.hide(),
                e.removeClass("fade")
            })
        },
        renderNext: function() {
            this.renderBoxQueue(!0),
            this.renderBoxClose(),
            this.initCountdown()
        },
        renderBoxAnimation: function(e) {
            var t = this;
            "shake" === e ? (this.$boxClose.hide(), this.$boxAnimationShake.attr("src", this.currBoxShowAnimation), this.$boxAnimationShake.show(), this.timerAct = setTimeout(function() {
                t.renderBoxClose(),
                t.$boxAnimationShake.attr("src", "")
            },
            i.TIMEOUT_SHAKE)) : "opening" === e && (this.$boxClose.hide(), this.$boxTimer.hide(), this.$boxAnimationOpen.attr("src", this.currBoxOpenAnimation), this.$boxAnimationOpen.show(), this.timerAct = setTimeout(function() {
                t.renderBoxOpen(),
                t.initRedPkg(),
                t.$boxAnimationOpen.attr("src", ""),
                t.currBoxOpenAnimation = ""
            },
            i.TIMEOUT_OPEN))
        },
        renderBoxClose: function() {
            this.$boxWrap.show(),
            this.$boxClose.show(),
            this.$boxOpen.hide(),
            this.$boxAnimation.hide(),
            window.clearTimeout(this.timerAct)
        },
        renderBoxOpen: function() {
            this.$boxWrap.show(),
            this.$boxClose.hide(),
            this.$boxOpen.show(),
            this.$boxAnimation.hide(),
            window.clearTimeout(this.timerAct)
        },
        renderCountdown: function() {
            var e = this;
            this.$boxTimer.show(),
            this.renderBoxClose();
            var t = Math.ceil(this.boxOpenGap / 1e3);
            this.$boxTimer.html(t),
            this.timerBox = setInterval(function() {
                t -= 1,
                0 === t ? (e.$boxTimer.hide(), e.renderBoxAnimation("opening"), window.clearInterval(e.timerBox)) : 2 === t ? (e.$boxTimer.html(t), e.$redPkgSucc.hide(), e.$redPkgFail.hide(), e.$redPkgWrap.hide()) : (t % 10 === 0 && e.renderBoxAnimation("shake"), e.$boxTimer.html(t))
            },
            i.INTERVAL_COUNT)
        },
        initRedPkg: function() {
            var e = this,
            t = this.redPkgNum,
            n = this.redShowTimer / t;
            this.$redOnePkg.show(),
            this.$redPkgs.show(),
            this.$redPkgWrap.show(),
            this.timerRedPkg = setInterval(function() {
                return e.removeOneRedPkg(),
                t -= 1,
                0 === t ? (e.renderRedPkg("close"), void e.setNext()) : void 0
            },
            n)
        },
        removeOneRedPkg: function() {
            var t = e(".red-package:visible").size(),
            n = Math.floor(Math.random() * t),
            a = e(".red-package:visible:eq(" + n + ")");
            this.fadeOutAni(a)
        },
        getRedPkg: function(t) {
            var a = e.Deferred();
            return e.ajax({
                url: "zhangyugift/redpacket/open",
                type: "post",
                data: {
                    cid: n.cid,
                    redPacketId: t
                },
                dataType: "json",
                error: function(e) {
                    a.reject(e)
                },
                success: function(e) {
                    a.resolve(e)
                }
            }),
            a.promise()
        },
        renderRedPkg: function(e) {
            switch (e) {
            case "success":
                this.$redPkgWrap.show(),
                this.$redPkgs.hide(),
                this.$redPkgSucc.show(),
                window.clearInterval(this.timerRedPkg);
                break;
            case "fail":
                this.$redPkgWrap.show(),
                this.$redPkgs.hide(),
                this.$redPkgFail.show(),
                window.clearInterval(this.timerRedPkg);
                break;
            case "close":
                this.$redPkgWrap.hide(),
                this.$boxWrap.hide(),
                window.clearInterval(this.timerRedPkg)
            }
        }
    };
    e(function() {
        s.initPage()
    })
} ();