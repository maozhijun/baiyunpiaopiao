/*!
 * Sat Jan 26 2019 20:06:03 GMT+0800 (CST).
 * The framework is built by hls.js and flv.js. Thanks for all contributors to both frameworks.
 */
!function (e, t) {
    "object" == typeof exports && "object" == typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define([], t) : "object" == typeof exports ? exports.Spv = t() : e.Spv = t()
}(this, function () {
    return function (e) {
        function t(i) {
            if (n[i])return n[i].exports;
            var s = n[i] = {i: i, l: !1, exports: {}};
            return e[i].call(s.exports, s, s.exports, t), s.l = !0, s.exports
        }

        var i = window.webpackJsonpSpv;
        window.webpackJsonpSpv = function (t, n, a) {
            for (var o, r, u = 0, l = []; u < t.length; u++)r = t[u], s[r] && l.push(s[r][0]), s[r] = 0;
            for (o in n)Object.prototype.hasOwnProperty.call(n, o) && (e[o] = n[o]);
            for (i && i(t, n, a); l.length;)l.shift()()
        };
        var n = {}, s = {1: 0};
        return t.e = function (e) {
            function i() {
                r.onerror = r.onload = null, clearTimeout(u);
                var t = s[e];
                0 !== t && (t && t[1](new Error("Loading chunk " + e + " failed.")), s[e] = void 0)
            }

            var n = s[e];
            if (0 === n)return new Promise(function (e) {
                e()
            });
            if (n)return n[2];
            var a = new Promise(function (t, i) {
                n = s[e] = [t, i]
            });
            n[2] = a;
            var o = document.getElementsByTagName("head")[0], r = document.createElement("script");
            r.type = "text/javascript", r.charset = "utf-8", r.async = !0, r.timeout = 12e4, t.nc && r.setAttribute("nonce", t.nc), r.src = t.p + "static/js/" + e + ".js";
            var u = setTimeout(i, 12e4);
            return r.onerror = r.onload = i, o.appendChild(r), a
        }, t.m = e, t.c = n, t.i = function (e) {
            return e
        }, t.d = function (e, i, n) {
            t.o(e, i) || Object.defineProperty(e, i, {configurable: !1, enumerable: !0, get: n})
        }, t.n = function (e) {
            var i = e && e.__esModule ? function () {
                return e.default
            } : function () {
                return e
            };
            return t.d(i, "a", i), i
        }, t.o = function (e, t) {
            return Object.prototype.hasOwnProperty.call(e, t)
        }, t.p = "//g.alicdn.com/statics/player/1.1.35/", t.oe = function (e) {
            throw console.error(e), e
        }, t(t.s = 86)
    }([function (e, t, i) {
        "use strict";
        t.__esModule = !0, t.default = function (e, t) {
            if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
        }
    }, function (e, t, i) {
        "use strict";
        t.__esModule = !0;
        var n = i(65), s = function (e) {
            return e && e.__esModule ? e : {default: e}
        }(n);
        t.default = function () {
            function e(e, t) {
                for (var i = 0; i < t.length; i++) {
                    var n = t[i];
                    n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), (0, s.default)(e, n.key, n)
                }
            }

            return function (t, i, n) {
                return i && e(t.prototype, i), n && e(t, n), t
            }
        }()
    }, function (e, t, i) {
        e.exports = {default: i(131), __esModule: !0}
    }, function (e, t, i) {
        "use strict";
        function n(e) {
            return e && e.__esModule ? e : {default: e}
        }

        t.__esModule = !0;
        var s = i(119), a = n(s), o = i(116), r = n(o), u = i(67), l = n(u);
        t.default = function (e, t) {
            if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + (void 0 === t ? "undefined" : (0, l.default)(t)));
            e.prototype = (0, r.default)(t && t.prototype, {
                constructor: {
                    value: e,
                    enumerable: !1,
                    writable: !0,
                    configurable: !0
                }
            }), t && (a.default ? (0, a.default)(e, t) : e.__proto__ = t)
        }
    }, function (e, t, i) {
        "use strict";
        t.__esModule = !0;
        var n = i(67), s = function (e) {
            return e && e.__esModule ? e : {default: e}
        }(n);
        t.default = function (e, t) {
            if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return !t || "object" !== (void 0 === t ? "undefined" : (0, s.default)(t)) && "function" != typeof t ? e : t
        }
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(66), i(8)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i) {
            "use strict";
            function n(e) {
                return e && e.__esModule ? e : {default: e}
            }

            function s(e) {
                if (e.status >= 200 && e.status < 300)return e;
                var t = new Error(e.statusText);
                throw t.response = e, t
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var a, o = n(t), r = n(i), u = (a = {
                TAG: "util",
                jsopInfo: {},
                KEYARR: [19, 1, 4, 7, 30, 14, 28, 8, 24, 17, 6, 35, 34, 16, 9, 10, 13, 22, 32, 29, 31, 21, 18, 3, 2, 23, 25, 27, 11, 20, 5, 15, 12, 0, 33, 26],
                protocol: "http:",
                addEventListenerHander: function (e, t, i) {
                    e.addEventListener ? e.addEventListener(t, i, !1) : e.attachEvent ? e.attachEvent("on" + t, i) : e["on" + t] = i
                },
                removeEventListenerHander: function (e, t, i) {
                    e.removeEventListener ? e.removeEventListener(t, i, !1) : e.detachEvent ? e.detachEvent("on" + t, i) : e["on" + t] = null
                },
                getById: function (e, t) {
                    return t && t instanceof HTMLElement ? t.getElementById(e) : document.getElementById(e)
                },
                getScreenState: function () {
                    var e = window.orientation;
                    switch (e) {
                        case 90:
                        case-90:
                            e = 0;
                            break;
                        default:
                            e = 1
                    }
                    return e
                },
                urlParameter: function (e) {
                    var t = [];
                    for (var i in e)t.push(i + "=" + e[i]);
                    return t.join("&")
                },
                toJSON: function (e) {
                    var t = [];
                    for (var i in e)t.push('"' + i + ":" + e[i] + '"');
                    return "{" + t.join(",")
                },
                getURlKey: function (e, t) {
                    var i = t.split("?");
                    if (i.length > 1) {
                        i = i[1].split("&");
                        for (var n = i.length, s = 0; s < n; s++) {
                            var a = i[s].split("=");
                            if (a.length > 1 && a[0] === e)return a[1]
                        }
                    }
                    return null
                },
                sendlog: function (e, t) {
                    e.indexOf("http:") < 0 && e.indexOf("https:") < 0 && (e = this.protocol + e);
                    var i = document.createElement("img");
                    t && i.addEventListener("error", t, !1), i.src = e + "&r_=" + Math.floor(1e4 * Math.random()), i.id = "youku-uniplayer-stat"
                },
                loadfile: function (e, t) {
                    var i = null;
                    "js" == t ? (i = document.createElement("script"), i.setAttribute("type", "text/javascript"), i.setAttribute("src", e)) : "css" == t && (i = document.createElement("link"), i.setAttribute("rel", "stylesheet"), i.setAttribute("type", "text/css"), i.setAttribute("href", e)), void 0 !== i && document.getElementsByTagName("head")[0].appendChild(i)
                },
                getJsonp: function (e, t, i, n, s) {
                    for (var a = ""; ;)if (a = ("" + (new Date).getTime() + Math.random()).replace(/\./, "").slice(3, 20), !this["_stId" + a])break;
                    var o = e, r = "_stId" + a, u = document.createElement("script"), l = "json" + a, d = this;
                    u.type = "text/javascript", u.onerror = u.onbort = function () {
                        d[r] && (clearTimeout(d[r]), delete d[r], i && i(), document.getElementsByTagName("head")[0].removeChild(u), delete window[l])
                    };
                    var h = s || 15e3;
                    d[r] = setTimeout(function (e) {
                        d[e] && (clearTimeout(d[e]), delete d[e], n && n(), document.getElementsByTagName("head")[0].removeChild(u), delete window[l])
                    }(r), h), window[l] = function (e) {
                        d[r] && (clearTimeout(d[r]), delete d[r], t(e), document.getElementsByTagName("head")[0].removeChild(u), delete window[l])
                    }, o += "&callback=" + l, u.src = o, document.getElementsByTagName("head")[0].appendChild(u)
                },
                request: function (e, t, i, n, s) {
                    "m.youku.com" === location.host || "h5.m.youku.com" === location.host ? u.fetchrequest(e, t, i, n, s) : u.getJsonp(e, t, i, n, s)
                },
                fetchrequest: function (e, t, i, n, a) {
                    document.domain = "youku.com", fetch(e, {
                        timeout: a || 5e3,
                        credentials: "include"
                    }).then(s).then(function (e) {
                        return e.json()
                    }).then(function (e) {
                        t && t(e)
                    }).catch(function (s) {
                        if (s && s.response) s.code = s.response.status, s.note = "数据获取失败，请检查网络之后重试"; else if (s && "Failed to fetch" === s.message)return void u.getJsonp(e, t, i, n, a);
                        i && i(s)
                    })
                },
                translate: function (e, t) {
                    for (var i = [], n = 0; n < e.length; n++) {
                        var s = 0;
                        s = e[n] >= "a" && e[n] <= "z" ? e[n].charCodeAt(0) - "a".charCodeAt(0) : e[n] - "0" + 26;
                        for (var a = 0; a < 36; a++)if (t[a] == s) {
                            s = a;
                            break
                        }
                        i[n] = s > 25 ? s - 26 : String.fromCharCode(s + 97)
                    }
                    return i.join("")
                },
                decode64: function (e) {
                    if (!e)return "";
                    e = e.toString();
                    var t = void 0, i = void 0, n = void 0, s = void 0, a = void 0, o = void 0, r = void 0, u = new Array(-1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 62, -1, -1, -1, 63, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, -1, -1, -1, -1, -1, -1, -1, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, -1, -1, -1, -1, -1, -1, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, -1, -1, -1, -1, -1);
                    for (o = e.length, a = 0, r = ""; a < o;) {
                        do {
                            t = u[255 & e.charCodeAt(a++)]
                        } while (a < o && -1 == t);
                        if (-1 == t)break;
                        do {
                            i = u[255 & e.charCodeAt(a++)]
                        } while (a < o && -1 == i);
                        if (-1 == i)break;
                        r += String.fromCharCode(t << 2 | (48 & i) >> 4);
                        do {
                            if (61 == (n = 255 & e.charCodeAt(a++)))return r;
                            n = u[n]
                        } while (a < o && -1 == n);
                        if (-1 == n)break;
                        r += String.fromCharCode((15 & i) << 4 | (60 & n) >> 2);
                        do {
                            if (61 == (s = 255 & e.charCodeAt(a++)))return r;
                            s = u[s]
                        } while (a < o && -1 == s);
                        if (-1 == s)break;
                        r += String.fromCharCode((3 & n) << 6 | s)
                    }
                    return r
                },
                encode64: function (e) {
                    if (!e)return "";
                    e = e.toString();
                    var t = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/", i = void 0, n = void 0, s = void 0, a = void 0, o = void 0, r = void 0;
                    for (s = e.length, n = 0, i = ""; n < s;) {
                        if (a = 255 & e.charCodeAt(n++), n == s) {
                            i += t.charAt(a >> 2), i += t.charAt((3 & a) << 4), i += "==";
                            break
                        }
                        if (o = e.charCodeAt(n++), n == s) {
                            i += t.charAt(a >> 2), i += t.charAt((3 & a) << 4 | (240 & o) >> 4), i += t.charAt((15 & o) << 2), i += "=";
                            break
                        }
                        r = e.charCodeAt(n++), i += t.charAt(a >> 2), i += t.charAt((3 & a) << 4 | (240 & o) >> 4), i += t.charAt((15 & o) << 2 | (192 & r) >> 6), i += t.charAt(63 & r)
                    }
                    return i
                },
                rc4: function (e, t) {
                    for (var i = [], n = 0, s = void 0, a = "", o = 0; o < 256; o++)i[o] = o;
                    for (o = 0; o < 256; o++)n = (n + i[o] + e.charCodeAt(o % e.length)) % 256, s = i[o], i[o] = i[n], i[n] = s;
                    o = 0, n = 0;
                    for (var r = 0; r < t.length; r++)o = (o + 1) % 256, n = (n + i[o]) % 256, s = i[o], i[o] = i[n], i[n] = s, a += String.fromCharCode(t.charCodeAt(r) ^ i[(i[o] + i[n]) % 256]);
                    return a
                },
                mergeObject: function (e, t) {
                    for (var i in e)t[i] = e[i];
                    return t
                },
                htmlEncodeAll: function (e) {
                    return null == e ? "" : e.replace(/\&/g, "&amp;").replace(/\</g, "&lt;").replace(/\>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&apos;")
                },
                cookie: {
                    isCookie: !0, getCookie: function (e, t) {
                        try {
                            for (var i = document.cookie.split(";"), n = i.length, s = 0; s < n; s++) {
                                var a = i[s].split("=");
                                if (a[0] = a[0].split(" ").join(""), a.length > 1 && a[0] === e)return decodeURIComponent(a[1])
                            }
                        } catch (e) {
                            return this.isCookie = !1, r.default.w(this.TAG, "document.cookie is excption"), null
                        }
                    }, setCookie: function (e, t, i) {
                        try {
                            i = i || {}, null === t && (t = "", i.expires = -1);
                            var n = "";
                            if (i.expires && ("number" == typeof i.expires || i.expires.toUTCString)) {
                                var s = void 0;
                                "number" == typeof i.expires ? (s = new Date, s.setTime(s.getTime() + 24 * i.expires * 60 * 60 * 1e3)) : s = i.expires, n = "; ex2pires=" + s.toUTCString()
                            }
                            var a = i.path ? "; path=" + i.path : "", o = i.domain ? "; domain=" + i.domain : "", u = i.secure ? "; secure" : "";
                            document.cookie = [e, "=", encodeURIComponent(t), n, a, o, u].join("")
                        } catch (e) {
                            this.isCookie = !1, r.default.w(this.TAG, "document.cookie is excption")
                        }
                    }
                },
                getTimeModel: function (e) {
                    var t = void 0, i = void 0, n = void 0, s = [];
                    return t = Math.floor(e / 3600), e %= 3600, i = Math.floor(e / 60), n = parseInt(e % 60), t > 0 && s.push(t), i > 9 ? s.push(i) : s.push("0" + i), n > 9 ? s.push(n) : s.push("0" + n), s.join(":")
                },
                addAplusMeta: function () {
                    var e = document.location.href;
                    if (e.indexOf("youku.com") < 0 && e.indexOf("tudou.com") < 0) {
                        var t = document.getElementsByTagName("head")[0], i = document.createElement("meta");
                        i.name = "aplus-disable-pvid", i.content = "true", t.appendChild(i)
                    }
                },
                loadAplus: function () {
                    window.goldlog ? window.goldlog.pvid && (window.goldlog.pvid = "") : (u.addAplusMeta(), this.loadfile(this.protocol + "//g.alicdn.com/alilog/??s/7.6.2/plugin/aplus_client.js,aplus_cplugin/0.1.2/monitor.js,s/7.6.2/aplus_o.js,s/7.6.2/plugin/aplus_urchin2.js", "js")), (window.goldlog_queue || (window.goldlog_queue = [])).push({
                        action: "goldlog.aplus_pubsub.subscribe",
                        arguments: ["sendPV", function (e, t, i) {
                            i && i.cna && (this.cna = i.cna)
                        }]
                    })
                },
                getUCStr: function (e) {
                    var t = "", i = navigator.userAgent.toLowerCase();
                    if (i.indexOf("ucbrowser") > -1)if ("undefined" != typeof uckey && uckey.getUCKey)try {
                        var n = uckey.getUCKey(e);
                        t += "&uc_param_str=xk&xk=" + n, r.default.i(this.TAG, n)
                    } catch (e) {
                        t += "&uc_param_str=x"
                    } else {
                        var s = i.search(/ucbrowser/i);
                        -1 != s && parseFloat(i.substr(s + 10, 4)) >= 9.8 && (t += "&uc_param_str=xk", r.default.i(this.TAG, parseFloat(i.substr(s + 10, 4))))
                    }
                    return t
                },
                checkProtocol: function () {
                    var e = "";
                    e = document.location && document.location.protocol ? document.location.protocol : document.location && document.location.href && document.location.href.indexOf("https:") > -1 ? "https:" : "http:", this.protocol = e
                },
                getCna: function () {
                    if (this.cna)return this.cna;
                    if (this.cookie.getCookie("cna"))return this.cna = this.cookie.getCookie("cna"), this.cna;
                    if (window.goldlog && window.goldlog.Etag)return this.cna = window.goldlog.Etag, this.cna;
                    return this.cookie.setCookie("cna", "defaultCnaLive20180425", {
                        domain: "youku.com",
                        path: "/"
                    }), "defaultCnaLive20180425"
                },
                initUA_OPT: function () {
                    if (!window.UA_Opt) {
                        var e = new Object;
                        window.UA_Opt = e, e.OnlyHost = 1, e.SendMethod = 9, e.FormId = "login_submit_form", e.ExTarget = ["password"], e.LogVal = "ua", window[e.LogVal] = "", e.Token = (new Date).getTime() + ":" + Math.random(), e.MaxMCLog = 50, e.MaxKSLog = 50, e.MaxMPLog = 50, e.MaxTCLog = 50, e.MaxFocusLog = 50, e.ResHost = "aeu.alicdn.com", e.Flag = 1670350
                    }
                    if (window.UA_Opt.callback = function () {
                            this.ckey = window[window.UA_Opt.LogVal]
                        }, void 0 === window.acjs) {
                        var t = document.createElement("script");
                        t.src = "//af.alicdn.com/js/uac.js", document.head.appendChild(t)
                    }
                },
                getUA: function () {
                    var e = window[window.UA_Opt.LogVal];
                    return window.UA_Opt.Token = (new Date).getTime() + ":" + Math.random(), window.UA_Opt.reload && window.UA_Opt.reload(), e && e.length > 1e3 && (e = e.substr(0, 1e3)), e
                },
                guid: function () {
                    return +Date.now()
                },
                hasClass: function (e, t) {
                    return -1 != e.className.indexOf(t)
                },
                hcbt: function (e) {
                    return this.genH(e)
                },
                genH: function (e) {
                    for (var t = !1, i = ""; !t;) {
                        i = this.randomString(20);
                        var n = e + i;
                        "00" == this.S(n).substring(0, 2) && (t = !0)
                    }
                    return i
                },
                addClass: function (e, t) {
                    this.hasClass(e, t) || (e.className = "" === e.className ? t : e.className + " " + t)
                },
                randomString: function (e) {
                    var t = void 0;
                    t = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ".split(""), e = e || 3, e = isNaN(e) ? 3 : e;
                    for (var i = t.length, n = ""; e >= 0;)n += t[Math.floor(Math.random() * i)], e--;
                    return n
                },
                removeClass: function (e, t) {
                    if (this.hasClass(e, t)) {
                        for (var i = e.className.split(" "), n = i.length - 1; n >= 0; n--)i[n] === t && i.splice(n, 1);
                        return e.className = i.join(" "), this
                    }
                }
            }, (0, o.default)(a, "urlParameter", function (e) {
                var t = [];
                for (var i in e)t.push(i + "=" + e[i]);
                return t.join("&")
            }), (0, o.default)(a, "encode64", function (e) {
                if (!e)return "";
                e = e.toString();
                var t = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/", i = void 0, n = void 0, s = void 0, a = void 0, o = void 0, r = void 0;
                for (s = e.length, n = 0, i = ""; n < s;) {
                    if (a = 255 & e.charCodeAt(n++), n == s) {
                        i += t.charAt(a >> 2), i += t.charAt((3 & a) << 4), i += "==";
                        break
                    }
                    if (o = e.charCodeAt(n++), n == s) {
                        i += t.charAt(a >> 2), i += t.charAt((3 & a) << 4 | (240 & o) >> 4), i += t.charAt((15 & o) << 2), i += "=";
                        break
                    }
                    r = e.charCodeAt(n++), i += t.charAt(a >> 2), i += t.charAt((3 & a) << 4 | (240 & o) >> 4), i += t.charAt((15 & o) << 2 | (192 & r) >> 6), i += t.charAt(63 & r)
                }
                return i
            }), (0, o.default)(a, "storageSet", function (e, t) {
                try {
                    localStorage.setItem(e, t)
                } catch (e) {
                }
            }), (0, o.default)(a, "signTS", function (e) {
                if (null == e)return 0;
                for (var t = 0, i = e.length, n = 0; n < i; n++)t = 43 * t + e.charCodeAt(n), t %= 1e10;
                return t
            }), (0, o.default)(a, "parseJsonStr", function (e) {
                var t = "";
                if (/{[^{^}]{0,}}/.test(e))try {
                    t = JSON.parse(e)
                } catch (e) {
                }
                return t
            }), (0, o.default)(a, "S", function (e) {
                function t(e, t) {
                    return e << t | e >>> 32 - t
                }

                function i(e) {
                    var t, i, n = "";
                    for (t = 7; t >= 0; t--)i = e >>> 4 * t & 15, n += i.toString(16);
                    return n
                }

                var n, s, a, o, r, u, l, d, h, c = new Array(80), f = 1732584193, v = 4023233417, p = 2562383102, m = 271733878, y = 3285377520;
                e = function (e) {
                    e = e.replace(/\r\n/g, "\n");
                    for (var t = "", i = 0; i < e.length; i++) {
                        var n = e.charCodeAt(i);
                        n < 128 ? t += String.fromCharCode(n) : n > 127 && n < 2048 ? (t += String.fromCharCode(n >> 6 | 192), t += String.fromCharCode(63 & n | 128)) : (t += String.fromCharCode(n >> 12 | 224), t += String.fromCharCode(n >> 6 & 63 | 128), t += String.fromCharCode(63 & n | 128))
                    }
                    return t
                }(e);
                var _ = e.length, g = new Array;
                for (s = 0; s < _ - 3; s += 4)a = e.charCodeAt(s) << 24 | e.charCodeAt(s + 1) << 16 | e.charCodeAt(s + 2) << 8 | e.charCodeAt(s + 3), g.push(a);
                switch (_ % 4) {
                    case 0:
                        s = 2147483648;
                        break;
                    case 1:
                        s = e.charCodeAt(_ - 1) << 24 | 8388608;
                        break;
                    case 2:
                        s = e.charCodeAt(_ - 2) << 24 | e.charCodeAt(_ - 1) << 16 | 32768;
                        break;
                    case 3:
                        s = e.charCodeAt(_ - 3) << 24 | e.charCodeAt(_ - 2) << 16 | e.charCodeAt(_ - 1) << 8 | 128
                }
                for (g.push(s); g.length % 16 != 14;)g.push(0);
                for (g.push(_ >>> 29), g.push(_ << 3 & 4294967295), n = 0; n < g.length; n += 16) {
                    for (s = 0; s < 16; s++)c[s] = g[n + s];
                    for (s = 16; s <= 79; s++)c[s] = t(c[s - 3] ^ c[s - 8] ^ c[s - 14] ^ c[s - 16], 1);
                    for (o = f, r = v, u = p, l = m, d = y, s = 0; s <= 19; s++)h = t(o, 5) + (r & u | ~r & l) + d + c[s] + 1518500249 & 4294967295, d = l, l = u, u = t(r, 30), r = o, o = h;
                    for (s = 20; s <= 39; s++)h = t(o, 5) + (r ^ u ^ l) + d + c[s] + 1859775393 & 4294967295, d = l, l = u, u = t(r, 30), r = o, o = h;
                    for (s = 40; s <= 59; s++)h = t(o, 5) + (r & u | r & l | u & l) + d + c[s] + 2400959708 & 4294967295, d = l, l = u, u = t(r, 30), r = o, o = h;
                    for (s = 60; s <= 79; s++)h = t(o, 5) + (r ^ u ^ l) + d + c[s] + 3395469782 & 4294967295, d = l, l = u, u = t(r, 30), r = o, o = h;
                    f = f + o & 4294967295, v = v + r & 4294967295, p = p + u & 4294967295, m = m + l & 4294967295, y = y + d & 4294967295
                }
                var h = i(f) + i(v) + i(p) + i(m) + i(y);
                return h.toLowerCase()
            }), (0, o.default)(a, "getTime", function (e) {
                if (!e)return "00:00";
                var t = Math.floor(e), i = t % 60, n = Math.floor(t / 60);
                return (n < 10 ? "0" + n : n) + ":" + (i < 10 ? "0" + i : i)
            }), (0, o.default)(a, "pvid", function () {
                return this.rand(this.cookie.getCookie("u_id"))
            }), (0, o.default)(a, "Mash", function () {
                var e = 4022871197, t = function (t) {
                    t = t.toString();
                    for (var i = 0; i < t.length; i++) {
                        e += t.charCodeAt(i);
                        var n = .02519603282416938 * e;
                        e = n >>> 0, n -= e, n *= e, e = n >>> 0, n -= e, e += 4294967296 * n
                    }
                    return 2.3283064365386963e-10 * (e >>> 0)
                };
                return t.version = "Mash 0.9", t
            }), (0, o.default)(a, "MRG32k3a", function () {
                var e = this;
                return function (t) {
                    var i = 4294967087, n = 4294944443, s = 12345, a = 12345, o = 123, r = 12345, u = 12345, l = 123;
                    0 === t.length && (t = [+new Date]);
                    for (var d = e.Mash(), h = 0; h < t.length; h++)s += 4294967296 * d(t[h]), a += 4294967296 * d(t[h]), o += 4294967296 * d(t[h]), r += 4294967296 * d(t[h]), u += 4294967296 * d(t[h]), l += 4294967296 * d(t[h]);
                    s %= i, a %= i, o %= i, r %= n, u %= n, l %= n, d = null;
                    var c = function () {
                        var e, t, i, n = 4294967087, d = 4294944443;
                        return t = 1403580 * a - 810728 * s, e = t / n | 0, t -= e * n, t < 0 && (t += n), s = a, a = o, o = t, i = 527612 * l - 1370589 * r, e = i / d | 0, i -= e * d, i < 0 && (i += d), r = u, u = l, l = i, t <= i ? t - i + n : t - i
                    }, f = function () {
                        return 2.3283064365386963e-10 * c()
                    };
                    return f.uint32 = c, f.fract53 = function () {
                        return f() + 1.1102230246251565e-16 * (2097151 & c())
                    }, f.version = "MRG32k3a 0.9", f.args = t, f
                }(Array.prototype.slice.call(arguments))
            }), (0, o.default)(a, "rand", function (e, t) {
                t = void 0 === t ? "" : t;
                var i = this.MRG32k3a(e || 0, location.href, Date.now());
                return t + (+new Date).toString(32) + parseInt(1e5 * i()).toString(32)
            }), (0, o.default)(a, "seid", function () {
                var e = this.cookie.getCookie("seid");
                (!e || +new Date > (parseInt(this.cookie.getCookie("seidtimeout")) || 0)) && (e = this.rand(this.cookie.getCookie("u_id"), "0"), this.cookie.getCookie("seid", e, {
                    domain: "youku.com",
                    path: "/"
                }), e = this.cookie.getCookie("seid") || 1);
                var t = this.cookie.getCookie("referhost");
                if (!t || +new Date > (parseInt(this.cookie.getCookie("seidtimeout")) || 0)) {
                    var i = /^https?:\/\/[^\/]+/.exec(document.referrer || "");
                    t = i ? i[0] : "", this.cookie.getCookie("referhost", t, {domain: "youku.com", path: "/"})
                }
                return this.cookie.getCookie("seidtimeout", Date.now() + 18e5, {domain: "youku.com", path: "/"}), e
            }), (0, o.default)(a, "GetQueryString", function (e) {
                var t = new RegExp("(^|&)" + e + "=([^&]*)(&|$)", "i"), i = window.location.search.substr(1).match(t), n = "";
                return null != i && (n = i[2]), n || ""
            }), (0, o.default)(a, "juid", function () {
                var e = this.cookie.getCookie("juid");
                return e || (e = this.rand(this.cookie.getCookie("u_id"), "0"), this.cookie.getCookie("juid", e, {
                    expires: 36500,
                    domain: "youku.com",
                    path: "/"
                }), e = this.cookie.getCookie("juid") || 1), e
            }), (0, o.default)(a, "QS", function (e) {
                var t = {}, i = (e || window.location.search).match(new RegExp("[?&][^?&]+=[^?&]+", "g"));
                if (null == i)return null;
                for (var n = 0; n < i.length; n++) {
                    var s = i[n], a = s.indexOf("="), o = s.substring(1, a), r = s.substring(a + 1);
                    try {
                        r = decodeURI(r)
                    } catch (e) {
                    }
                    "true" == r || "1" == r ? r = !0 : "false" != r && "0" != r || (r = !1), void 0 === t[o] ? t[o] = r : t[o] instanceof Array ? t[o].push(r) : t[o] = [t[o], r]
                }
                return t
            }), a), l = navigator.userAgent.toLowerCase(), d = {
                mac: /mac/.test(l),
                webkit: /webkit/.test(l),
                safari: /safari/.test(l) && !/chrome/.test(l),
                opera: /opera/.test(l),
                msie: /msie/.test(l) && !/opera/.test(l),
                mozilla: /mozilla/.test(l) && !/(compatible|webkit)/.test(l),
                iku: /iku/.test(l),
                wechat: /micromessenger/.test(l),
                youku: /youku/.test(l) && !/youku_hd/.test(l),
                youkuHD: /youku_hd/.test(l),
                html5: function () {
                    var e = document.createElement("input"), t = document.createElement("video");
                    return {
                        h264: !(!t.canPlayType || !t.canPlayType('video/mp4; codecs="avc1.42E01E, mp4a.40.2"').replace(/no/, "")),
                        history: !!(window.history && window.history.pushState && window.history.popState),
                        placeholder: "placeholder" in e
                    }
                },
                lang: (navigator.language || navigator.systemLanguage).toLowerCase(),
                iOS: (l.match(/(ipad|iphone|ipod)/) || [])[0],
                iOSVersion: (l.match(/os\s+([\d_]+)\s+like\s+mac\s+os/) || [0, "0_0_0"])[1].split("_"),
                wphone: parseFloat((l.match(/windows\sphone\s(?:os\s)?([\d.]+)/) || ["", "0"])[1]),
                android: parseFloat((l.match(/android[\s|\/]([\d.]+)/) || ["", "0"])[1]),
                youkuVersion: (l.match(/youku\/+([\d.]+)/i) || [0, "0.0.0"])[1],
                chrome: parseFloat((l.match(/chrome[\s|\/]([\d.]+)/) || ["", "0"])[1])
            };
            d.isMobile = !(!d.iOS && !d.wphone && !d.android && void 0 === window.orientation), d.isPad = d.isMobile && ("ipad" == d.iOS || -1 == l.indexOf("mobile") || -1 != l.indexOf("windows nt") && -1 != l.indexOf("touch")) || !1, d.isPhone = d.isMobile && ("iphone" == d.iOS || "ipod" == d.iOS) || -1 != l.indexOf("mobile") && !!d.android || !1, u.Browser = d;
            // var h = "Pc";
            var h = "H5";
            /iku|ikucid/.test(navigator.userAgent.toLowerCase()) ? h = d.mac ? "H5-Ikumac" : "H5-Iku" : d.youkuHD ? h = "H5-Pad" : d.youku && d.iOS ? h = "H5-Ios" : d.youku && d.android ? h = "H5-Android" : d.isPhone ? h = "H5" : d.isPad && (h = "Padweb"), u.appName = h, u.initUA_OPT(), u.checkProtocol(), u.loadAplus(), e.default = u
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(0), i(1)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i) {
            "use strict";
            function n(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var s = n(t), a = n(i), o = function () {
                function e(t, i) {
                    (0, s.default)(this, e), this.selector = t, this.EventManager = i;
                    for (var n = arguments.length, a = Array(n > 2 ? n - 2 : 0), o = 2; o < n; o++)a[o - 2] = arguments[o];
                    this.setUp(a)
                }

                return (0, a.default)(e, [{
                    key: "G", value: function (e, t) {
                        return (t || document).querySelector(e)
                    }
                }, {
                    key: "GA", value: function (e, t) {
                        return (t || document).querySelectorAll(e)
                    }
                }, {
                    key: "publicTemplate", value: function (e) {
                        var t = "spvdiv";
                        //fix
                        // return "live" == e && (t = "livebox"), '\n            <player class="player_ad">\n                <player class="player_ad_box">\n                    <player class="player_ad_tip player_ad_count">广告还有<span>0</span>秒</player>\n                    <player class="player_ad_tip ad_mute"></player>    \n                    <player class="player_ad_tip ad_nomute"></player>\n                    <player class="player_ad_tip player_ad_skip">跳过广告</player>\n                    <player class="player_ad_tip player_ad_more">了解详情</player>\n                    <player class="player_ad_big"></player>\n                </player>\n            </player>\n            <' + t + ' class="base ' + e + '_lock">\n                <' + t + ' class="' + e + '_lock_et"></' + t + ">\n                <" + t + ' class="' + e + '_lock_box">\n                    <' + t + ' class="' + e + '_lock_des"></' + t + ">\n                    <" + t + ' class="' + e + '_lock_btn" sourceid="youkulive"></' + t + ">\n                </" + t + ">\n            </" + t + ">\n            <" + t + ' class="' + e + '_load_first">\n                <' + t + ' class="' + e + '_load_img"></' + t + ">\n            </" + t + ">\n            <" + t + ' class="' + e + '_poster" style=""></' + t + ">\n            <" + t + ' class="' + e + '_little">\n                <' + t + ' class="' + e + '_little_tip"></' + t + ">\n            </" + t + ">\n            <" + t + ' class="' + e + '_tips"></' + t + ">\n            <" + t + ' class="' + e + '_play_btn"></' + t + ">\n            <" + t + ' class="' + e + '_background"></' + t + ">\n            <" + t + ' class="' + e + '_shadow"></' + t + ">\n            <" + t + ' class="' + e + '_logo"></' + t + ">\n            <" + t + ' class="' + e + '_playload">\n                <' + t + ' class="spvimg"></' + t + ">\n            </" + t + ">\n            <" + t + ' class="' + e + '_vip_info">\n                <' + t + ' class="' + e + '_vip_bar"></' + t + ">\n            </" + t + ">\n        "
                    }
                }, {
                    key: "template", value: function () {
                        return ""
                    }
                }, {
                    key: "getElem", value: function (e, t) {
                        return (t || document).querySelector(e)
                    }
                }, {
                    key: "setUp", value: function (e) {
                    }
                }, {
                    key: "hasClass", value: function (e, t) {
                        return -1 != e.className.indexOf(t)
                    }
                }, {
                    key: "eachAs", value: function (e) {
                        return [].slice.call(e)
                    }
                }, {
                    key: "removeClass", value: function (e, t) {
                        if (this.hasClass(e, t)) {
                            for (var i = e.className.split(" "), n = i.length - 1; n >= 0; n--)i[n] === t && i.splice(n, 1);
                            return e.className = i.join(" "), this
                        }
                    }
                }, {
                    key: "addClass", value: function (e, t) {
                        this.hasClass(e, t) || (e.className = "" === e.className ? t : e.className + " " + t)
                    }
                }, {
                    key: "render", value: function (e, t) {
                        this.dom = this.createTemplate(e, t)
                    }
                }, {
                    key: "createStyle", value: function (e, t) {
                        t.style && (e.style.cssText += t.style)
                    }
                }, {
                    key: "createTemplate", value: function (e, t) {
                        var i = document.createElement(e);
                        return i.className = t.className, i.innerHTML = t.innerHTML, this.createStyle(i, t), this.selector.appendChild(i), i
                    }
                }, {
                    key: "clear", value: function () {
                        try {
                            this.dom.parentNode.removeChild(this.dom)
                        } catch (e) {
                        }
                    }
                }, {
                    key: "attr", value: function (e, t, i) {
                        if (!i)return e.getAttribute(t);
                        e.setAttribute(t, i)
                    }
                }, {
                    key: "status", value: function () {
                        return "block" === this.dom.style.display
                    }
                }, {
                    key: "show", value: function () {
                        this.dom.style.display = "block"
                    }
                }, {
                    key: "hide", value: function () {
                        this.dom.style.display = "none"
                    }
                }]), e
            }();
            e.default = o
        })
    }, function (e, t) {
        var i = e.exports = {version: "2.5.7"};
        "number" == typeof __e && (__e = i)
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(0), i(1)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i) {
            "use strict";
            function n(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var s = n(t), a = n(i), o = function () {
                function e() {
                    (0, s.default)(this, e)
                }

                return (0, a.default)(e, null, [{
                    key: "e", value: function (t, i) {
                        if (e.ENABLE_ERROR) {
                            t && !e.FORCE_GLOBAL_TAG || (t = e.GLOBAL_TAG);
                            var n = "ERROR[" + t + "] > " + i;
                            console.error ? console.error(n) : console.warn ? console.warn(n) : console.log(n), e.ENABLE_PRINT && e.p(n)
                        }
                    }
                }, {
                    key: "i", value: function (t, i) {
                        if (e.ENABLE_INFO) {
                            t && !e.FORCE_GLOBAL_TAG || (t = e.GLOBAL_TAG);
                            var n = "INFO[" + t + "] > " + i;
                            console.info ? console.info(n) : console.log(n), e.ENABLE_PRINT && e.p(n)
                        }
                    }
                }, {
                    key: "w", value: function (t, i) {
                        if (e.ENABLE_WARN) {
                            t && !e.FORCE_GLOBAL_TAG || (t = e.GLOBAL_TAG);
                            var n = "WARN[" + t + "] > " + i;
                            console.warn ? console.warn(n) : console.log(n), e.ENABLE_PRINT && e.p(n)
                        }
                    }
                }, {
                    key: "d", value: function (t, i) {
                        if (e.ENABLE_DEBUG) {
                            t && !e.FORCE_GLOBAL_TAG || (t = e.GLOBAL_TAG);
                            var n = "DEBUG[" + t + "] > " + i;
                            console.debug ? console.debug(n) : console.log(n), e.ENABLE_PRINT && e.p(n)
                        }
                    }
                }, {
                    key: "p", value: function (t) {
                        t = "***" + t, e.dom ? e.dom.innerHTML = e.dom.innerHTML + "<br>" + t : document.getElementById(e.DOMID) ? e.dom = document.getElementById(e.DOMID) : (e.dom = document.createElement("div"), document.getElementsByTagName("body")[0].appendChild(e.dom))
                    }
                }]), e
            }();
            o.GLOBAL_TAG = "YoukuLivePlayer", o.FORCE_GLOBAL_TAG = !1, o.ENABLE_ERROR = -1 != location.href.indexOf("debugMessageShow"), o.ENABLE_INFO = -1 != location.href.indexOf("debugMessageShow"), o.ENABLE_WARN = -1 != location.href.indexOf("debugMessageShow"), o.ENABLE_DEBUG = -1 != location.href.indexOf("debugMessageShow"), o.ENABLE_PRINT = -1 != location.href.indexOf("debugMessageShow"), o.DOMID = "YoukuH5PlayerCore_log", e.default = o
        })
    }, function (e, t, i) {
        "use strict";
        t.__esModule = !0;
        var n = i(115), s = function (e) {
            return e && e.__esModule ? e : {default: e}
        }(n);
        t.default = s.default || function (e) {
                for (var t = 1; t < arguments.length; t++) {
                    var i = arguments[t];
                    for (var n in i)Object.prototype.hasOwnProperty.call(i, n) && (e[n] = i[n])
                }
                return e
            }
    }, function (e, t) {
        var i = e.exports = "undefined" != typeof window && window.Math == Math ? window : "undefined" != typeof self && self.Math == Math ? self : Function("return this")();
        "number" == typeof __g && (__g = i)
    }, function (e, t, i) {
        var n = i(45)("wks"), s = i(32), a = i(10).Symbol, o = "function" == typeof a;
        (e.exports = function (e) {
            return n[e] || (n[e] = o && a[e] || (o ? a : s)("Symbol." + e))
        }).store = n
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(66)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t) {
            "use strict";
            function i(e, t) {
                var i = e.substr(0, 5).split("."), n = !0;
                try {
                    n = parseInt(100 * i[0], 10) + parseInt(10 * i[1], 10) + parseInt(i[2], 10) < t
                } catch (e) {
                }
                return n
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var n = function (e) {
                return e && e.__esModule ? e : {default: e}
            }(t), s = function () {
                var e = self.navigator.userAgent.toLowerCase(), t = /(edge)\/([\w.]+)/.exec(e) || /(opr)[\/]([\w.]+)/.exec(e) || /(chrome)[ \/]([\w.]+)/.exec(e) || /(iemobile)[\/]([\w.]+)/.exec(e) || /(version)(applewebkit)[ \/]([\w.]+).*(safari)[ \/]([\w.]+)/.exec(e) || /(webkit)[ \/]([\w.]+).*(version)[ \/]([\w.]+).*(safari)[ \/]([\w.]+)/.exec(e) || /(webkit)[ \/]([\w.]+)/.exec(e) || /(opera)(?:.*version|)[ \/]([\w.]+)/.exec(e) || /(msie) ([\w.]+)/.exec(e) || e.indexOf("trident") >= 0 && /(rv)(?::| )([\w.]+)/.exec(e) || e.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec(e) || [], s = /(ipad)/.exec(e) || /(ipod)/.exec(e) || /(windows phone)/.exec(e) || /(iphone)/.exec(e) || /(kindle)/.exec(e) || /(android)/.exec(e) || /(windows)/.exec(e) || /(mac)/.exec(e) || /(linux)/.exec(e) || /(cros)/.exec(e) || [], a = {
                    browser: t[5] || t[3] || t[1] || "",
                    version: t[2] || t[4] || "0",
                    majorVersion: t[4] || t[2] || "0",
                    platform: s[0] || ""
                }, o = {};
                if (o.ua = e, o.inQQ = /qq/i.test(e) && /uiwebview/i.test(e), o.isMobile = e.indexOf("mobile") > -1, o.isIOS9 = /iPhone|iPod/.test(navigator.userAgent) && /OS 9|OS 1\d{1,}/i.test(navigator.userAgent), o.isMI = /miuibrowser/i.test(e), o.isMI && (o.isMobile = !0, o.android = !0, o.platform = "android"), o.isMobile) {
                    var r, u = (r = {
                        chrome: "chrome",
                        alipay: "alipayclient",
                        weixin: "micromessenger",
                        qqBrowser: "mqqbrowser",
                        sogou: "sogoumse"
                    }, (0, n.default)(r, "sogou", "sogoumobilebrowser"), (0, n.default)(r, "baidu", "baidubrowser"), (0, n.default)(r, "maoyan", "movie/"), (0, n.default)(r, "weibo", "weibo"), (0, n.default)(r, "youku", "youku"), (0, n.default)(r, "UC", "ucbrowser"), (0, n.default)(r, "vivo", "vivobrowser"), r);
                    for (var l in u)e.indexOf(u[l]) > -1 && (o.browserType = l)
                }
                if (a.browser) {
                    o[a.browser] = !0, "safari" == a.browser && (o.isSafari = !0);
                    var d = a.majorVersion.split(".");
                    o.version = {
                        major: parseInt(a.majorVersion, 10),
                        string: a.version
                    }, d.length > 1 && (o.version.minor = parseInt(d[1], 10)), d.length > 2 && (o.version.build = parseInt(d[2], 10))
                }
                if (a.platform && (o[a.platform] = !0), (o.chrome || o.opr || o.safari) && (o.webkit = !0), o.rv || o.iemobile) {
                    o.rv && delete o.rv;
                    a.browser = "msie", o.msie = !0
                }
                if (o.edge) {
                    delete o.edge;
                    a.browser = "msedge", o.msedge = !0
                }
                if (o.opr) {
                    a.browser = "opera", o.opera = !0
                }
                if (o.safari && o.android) {
                    a.browser = "android", o.android = !0
                }
                o.browserType ? (o.name = o.browserType, o.safari = !1, o.chrome = !1) : o.safari ? (o.name = "safari", o.safari = !0) : (o.name = "chrome", o.chrome = !0), o.android ? (o.os = "android", o.android = !0) : "iphone" === a.platform || "ipod" === a.platform || "ipad" === a.platform || "mac" === a.platform ? (o.os = "ios", o.ios = !0) : "windows phone" !== a.platform && "windows" !== a.platform || (o.os = "windows"), o.isMobile ? o.device = "phone" : "windows" === a.platform ? o.device = "pc" : o.device = a.platform, o.iku = /iku|ikucid/.test(navigator.userAgent.toLowerCase()), o.isIphone = "iphone" === a.platform, o.isIpod = "ipod" === a.platform, o.isIpad = "ipad" === a.platform;
                var h = e.match("mac" == a.platform ? /youku\/([\d\.]+)/i : /iku\/([\d\.]+)/i);
                return h && h[1] && (o.oldIku = o.windows && i(h[1], 738) || "mac" == a.platform && i(h[1], 150)), o
            }();
            e.default = s
        })
    }, function (e, t, i) {
        e.exports = !i(20)(function () {
            return 7 != Object.defineProperty({}, "a", {
                    get: function () {
                        return 7
                    }
                }).a
        })
    }, function (e, t, i) {
        var n = i(10), s = i(7), a = i(68), o = i(21), r = i(15), u = function (e, t, i) {
            var l, d, h, c = e & u.F, f = e & u.G, v = e & u.S, p = e & u.P, m = e & u.B, y = e & u.W, _ = f ? s : s[t] || (s[t] = {}), g = _.prototype, k = f ? n : v ? n[t] : (n[t] || {}).prototype;
            f && (i = t);
            for (l in i)(d = !c && k && void 0 !== k[l]) && r(_, l) || (h = d ? k[l] : i[l], _[l] = f && "function" != typeof k[l] ? i[l] : m && d ? a(h, n) : y && k[l] == h ? function (e) {
                var t = function (t, i, n) {
                    if (this instanceof e) {
                        switch (arguments.length) {
                            case 0:
                                return new e;
                            case 1:
                                return new e(t);
                            case 2:
                                return new e(t, i)
                        }
                        return new e(t, i, n)
                    }
                    return e.apply(this, arguments)
                };
                return t.prototype = e.prototype, t
            }(h) : p && "function" == typeof h ? a(Function.call, h) : h, p && ((_.virtual || (_.virtual = {}))[l] = h, e & u.R && g && !g[l] && o(g, l, h)))
        };
        u.F = 1, u.G = 2, u.S = 4, u.P = 8, u.B = 16, u.W = 32, u.U = 64, u.R = 128, e.exports = u
    }, function (e, t) {
        var i = {}.hasOwnProperty;
        e.exports = function (e, t) {
            return i.call(e, t)
        }
    }, function (e, t) {
        e.exports = function (e) {
            return "object" == typeof e ? null !== e : "function" == typeof e
        }
    }, function (e, t, i) {
        var n = i(19), s = i(70), a = i(48), o = Object.defineProperty;
        t.f = i(13) ? Object.defineProperty : function (e, t, i) {
            if (n(e), t = a(t, !0), n(i), s)try {
                return o(e, t, i)
            } catch (e) {
            }
            if ("get" in i || "set" in i)throw TypeError("Accessors not supported!");
            return "value" in i && (e[t] = i.value), e
        }
    }, function (e, t, i) {
        var n = i(71), s = i(37);
        e.exports = function (e) {
            return n(s(e))
        }
    }, function (e, t, i) {
        var n = i(16);
        e.exports = function (e) {
            if (!n(e))throw TypeError(e + " is not an object!");
            return e
        }
    }, function (e, t) {
        e.exports = function (e) {
            try {
                return !!e()
            } catch (e) {
                return !0
            }
        }
    }, function (e, t, i) {
        var n = i(17), s = i(31);
        e.exports = i(13) ? function (e, t, i) {
            return n.f(e, t, s(1, i))
        } : function (e, t, i) {
            return e[t] = i, e
        }
    }, function (e, t) {
        function i() {
            this._events = this._events || {}, this._maxListeners = this._maxListeners || void 0
        }

        function n(e) {
            return "function" == typeof e
        }

        function s(e) {
            return "number" == typeof e
        }

        function a(e) {
            return "object" == typeof e && null !== e
        }

        function o(e) {
            return void 0 === e
        }

        e.exports = i, i.EventEmitter = i, i.prototype._events = void 0, i.prototype._maxListeners = void 0, i.defaultMaxListeners = 10, i.prototype.setMaxListeners = function (e) {
            if (!s(e) || e < 0 || isNaN(e))throw TypeError("n must be a positive number");
            return this._maxListeners = e, this
        }, i.prototype.emit = function (e) {
            var t, i, s, r, u, l;
            if (this._events || (this._events = {}), "error" === e && (!this._events.error || a(this._events.error) && !this._events.error.length)) {
                if ((t = arguments[1]) instanceof Error)throw t;
                var d = new Error('Uncaught, unspecified "error" event. (' + t + ")");
                throw d.context = t, d
            }
            if (i = this._events[e], o(i))return !1;
            if (n(i))switch (arguments.length) {
                case 1:
                    i.call(this);
                    break;
                case 2:
                    i.call(this, arguments[1]);
                    break;
                case 3:
                    i.call(this, arguments[1], arguments[2]);
                    break;
                default:
                    r = Array.prototype.slice.call(arguments, 1), i.apply(this, r)
            } else if (a(i))for (r = Array.prototype.slice.call(arguments, 1), l = i.slice(), s = l.length, u = 0; u < s; u++)l[u].apply(this, r);
            return !0
        }, i.prototype.addListener = function (e, t) {
            var s;
            if (!n(t))throw TypeError("listener must be a function");
            return this._events || (this._events = {}), this._events.newListener && this.emit("newListener", e, n(t.listener) ? t.listener : t), this._events[e] ? a(this._events[e]) ? this._events[e].push(t) : this._events[e] = [this._events[e], t] : this._events[e] = t, a(this._events[e]) && !this._events[e].warned && (s = o(this._maxListeners) ? i.defaultMaxListeners : this._maxListeners) && s > 0 && this._events[e].length > s && (this._events[e].warned = !0, console.error("(node) warning: possible EventEmitter memory leak detected. %d listeners added. Use emitter.setMaxListeners() to increase limit.", this._events[e].length), "function" == typeof console.trace && console.trace()), this
        }, i.prototype.on = i.prototype.addListener, i.prototype.once = function (e, t) {
            function i() {
                this.removeListener(e, i), s || (s = !0, t.apply(this, arguments))
            }

            if (!n(t))throw TypeError("listener must be a function");
            var s = !1;
            return i.listener = t, this.on(e, i), this
        }, i.prototype.removeListener = function (e, t) {
            var i, s, o, r;
            if (!n(t))throw TypeError("listener must be a function");
            if (!this._events || !this._events[e])return this;
            if (i = this._events[e], o = i.length, s = -1, i === t || n(i.listener) && i.listener === t) delete this._events[e], this._events.removeListener && this.emit("removeListener", e, t); else if (a(i)) {
                for (r = o; r-- > 0;)if (i[r] === t || i[r].listener && i[r].listener === t) {
                    s = r;
                    break
                }
                if (s < 0)return this;
                1 === i.length ? (i.length = 0, delete this._events[e]) : i.splice(s, 1), this._events.removeListener && this.emit("removeListener", e, t)
            }
            return this
        }, i.prototype.removeAllListeners = function (e) {
            var t, i;
            if (!this._events)return this;
            if (!this._events.removeListener)return 0 === arguments.length ? this._events = {} : this._events[e] && delete this._events[e], this;
            if (0 === arguments.length) {
                for (t in this._events)"removeListener" !== t && this.removeAllListeners(t);
                return this.removeAllListeners("removeListener"), this._events = {}, this
            }
            if (i = this._events[e], n(i)) this.removeListener(e, i); else if (i)for (; i.length;)this.removeListener(e, i[i.length - 1]);
            return delete this._events[e], this
        }, i.prototype.listeners = function (e) {
            return this._events && this._events[e] ? n(this._events[e]) ? [this._events[e]] : this._events[e].slice() : []
        }, i.prototype.listenerCount = function (e) {
            if (this._events) {
                var t = this._events[e];
                if (n(t))return 1;
                if (t)return t.length
            }
            return 0
        }, i.listenerCount = function (e, t) {
            return e.listenerCount(t)
        }
    }, function (e, t, i) {
        var n, s, a;
        !function (i, o) {
            s = [t], n = o, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e) {
            "use strict";
            function t(e) {
                var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "EXP", n = arguments[2], s = arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : "POST", a = arguments[4];
                goldlog.record ? goldlog.record(e, t, n + "&_g_encode=utf-8", s) : i(a)
            }

            function i(e, t) {
                var i = "youku-uniplayer-stat_" + +new Date, n = document.createElement("img");
                t && n.addEventListener("error", t, !1), n.src = e + "&r_=" + Math.floor(1e4 * Math.random()), n.id = i
            }

            function n() {
                var e = void 0;
                if (parent !== window)try {
                    e = parent.location.href
                } catch (t) {
                    e = document.referrer
                }
                return e
            }

            function s(e, t) {
                var i = void 0;
                "js" == t ? (i = document.createElement("script"), i.setAttribute("type", "text/javascript"), i.setAttribute("src", e)) : "css" == t && (i = document.createElement("link"), i.setAttribute("rel", "stylesheet"), i.setAttribute("type", "text/css"), i.setAttribute("href", e)), i && document.getElementsByTagName("head")[0].appendChild(i)
            }

            function a(e, t, n, s, a, o, r, u, l, d, h) {
                i("//yt2.mmstat.com/yt/youkulive.stableness.userforlivecase?linktype=" + e + "&livestatus=" + t + "&hd=" + n + "&live_room_id=" + s + "&enter_time=" + a + "&get_stream=" + o + "&init_player=" + r + "&send_stream=" + u + "&load_first_frame=" + l + "&render_first_frame=" + d + "&url=" + h)
            }

            function o(e, t, n, s, a) {
                i("//yt2.mmstat.com/yt/youkulive.stableness.userforscreen?linktype=" + e + "&switch_screen=" + t + "&switch_screen_type=" + n + "&live_room_id=" + s + "&hd=" + a)
            }

            function r(e, t, n, s, a, o) {
                i("//yt2.mmstat.com/yt/youkulive.stableness.userforinterface?linktype=" + e + "&interfacestatus=" + t + "&interface_time=" + n + "&interface_reason=" + s + "&interface_des=" + a + "&url=" + o)
            }

            function u(e) {
                i("//yt2.mmstat.com/yt/youkulive.web.playmserror?app=" + e)
            }

            function l(e, t, n, s) {
                var a = "a2hlv.8243345.hplayer.time";
                n && (a = "a2hlv.8243345.fplayer.time"), s = s || "drag", i("//yt2.mmstat.com/yt/youkulive.playclick.interact?spm=" + a + "&liveid=" + e + "&screenid=" + t + "&type=live&handler=" + s)
            }

            function d(e, t, n) {
                var s = "a2hlv.8243345.hplayer.nowtime";
                n && (s = "a2hlv.8243345.fplayer.nowtime"), i("//yt2.mmstat.com/yt/youkulive.playclick.interact?spm=" + s + "&liveid=" + e + "&screenid=" + t + "&type=live")
            }

            Object.defineProperty(e, "__esModule", {value: !0}), e.sendGold = t, e.sendMessage = i, e.getParentUrl = n, e.load = s, e.userforlivecase = a, e.userforscreen = o, e.sendInterface = r, e.sendMseError = u, e.tlClick = l, e.tlBackClick = d
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (i, o) {
            s = [t], n = o, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e) {
            "use strict";
            Object.defineProperty(e, "__esModule", {value: !0});
            var t = {
                loadstart: "onLoadStart",
                canplay: "onCanPlay",
                loadeddata: "onLoadedData",
                loadedmetadata: "onLoadedMetaData",
                abort: "onAbort",
                error: "onError",
                pause: "onPause",
                waiting: "onWaiting",
                stalled: "onStalled",
                suspend: "onSuspend",
                play: "onPlay",
                volumechange: "onVolumeChange",
                playing: "onPlaying",
                seeked: "onSeeked",
                seeking: "onSeeking",
                durationchange: "onDurationChange",
                progress: "onProgress",
                ratechange: "onRateChange",
                timeupdate: "onTimeUpdate",
                ended: "onEnded"
            };
            e.VIDEO_EVENTS = t
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(2), i(0), i(1), i(4), i(3), i(6)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o) {
            "use strict";
            function r(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var u = r(t), l = r(i), d = r(n), h = r(s), c = r(a), f = r(o), v = void 0, p = function (e) {
                function t(e, i) {
                    (0, l.default)(this, t);
                    var n = (0, h.default)(this, (t.__proto__ || (0, u.default)(t)).call(this, e, i));
                    return n.dom = n.G(".spv_tips", n.selector), n
                }

                return (0, c.default)(t, e), (0, d.default)(t, [{
                    key: "init", value: function (e, t) {
                        var i = this;
                        this._forceHide = !1, this.removeClass(this.dom, "spv_tips_top"), this.dom.innerHTML = '<spvdiv class="spv_tips_con">' + e + '</spvdiv><spvdiv class="spv_tips_close">×</spvdiv>';
                        var n = this.G(".spv_tips_close", this.dom), s = function e() {
                            i.forceHide(), n.removeEventListener("click", e, !1)
                        };
                        return n.addEventListener("click", s, !1), this.show(t), this.dom
                    }
                }, {
                    key: "show", value: function (e) {
                        this._forceHide || (this.dom.style.display = "flex", this.resetPos(e))
                    }
                }, {
                    key: "resetPos", value: function (e) {
                        var t = e;
                        if (!e) {
                            var i = this.G(".spv_dashboard", this.selector);
                            t = !!i && "block" === i.style.display
                        }
                        this[t ? "removeClass" : "addClass"](this.dom, "spv_tips2")
                    }
                }, {
                    key: "forceHide", value: function () {
                        this._forceHide = !0, this.dom.style.display = "none"
                    }
                }, {
                    key: "share", value: function (e) {
                        this.init('广告收入一部分回馈给视频作者，详见<a class="spv_tips_link" href="//c.youku.com/intro" target="_blank">分享计划</a>', e), this.addClass(this.dom, "spv_tips_top")
                    }
                }], [{
                    key: "getInstance", value: function (e, i) {
                        return v || (v = new t(e, i)), v
                    }
                }]), t
            }(f.default);
            e.default = p.getInstance
        })
    }, function (e, t, i) {
        e.exports = {default: i(125), __esModule: !0}
    }, function (e, t) {
        e.exports = {}
    }, function (e, t) {
        e.exports = !0
    }, function (e, t, i) {
        var n = i(76), s = i(38);
        e.exports = Object.keys || function (e) {
                return n(e, s)
            }
    }, function (e, t) {
        t.f = {}.propertyIsEnumerable
    }, function (e, t) {
        e.exports = function (e, t) {
            return {enumerable: !(1 & e), configurable: !(2 & e), writable: !(4 & e), value: t}
        }
    }, function (e, t) {
        var i = 0, n = Math.random();
        e.exports = function (e) {
            return "Symbol(".concat(void 0 === e ? "" : e, ")_", (++i + n).toString(36))
        }
    }, function (e, t, i) {
        var n, s, a;
        !function (i, o) {
            s = [t], n = o, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e) {
            "use strict";
            Object.defineProperty(e, "__esModule", {value: !0});
            var t = {
                PLAYER_STATE: {
                    INIT: "PLAYER_STATE_INIT",
                    READY: "PLAYER_STATE_READY",
                    AD: "PLAYER_STATE_AD",
                    ADPLAY: "PLAYER_STATE_ADPLAYING",
                    ADPAUSE: "PLAYER_STATE_ADPAUSE",
                    PLAYING: "PLAYER_STATE_PLAYING",
                    END: "PLAYER_STATE_END",
                    ERROR: "PLAYER_STATE_ERROR",
                    PAUSE: "PLAYER_STATE_PAUSE"
                }
            };
            e.YKP = t
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (i, o) {
            s = [t], n = o, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e) {
            "use strict";
            Object.defineProperty(e, "__esModule", {value: !0});
            var t = {
                FRONT_AD: "frontAD",
                BACK_AD: "backAD",
                INSERT_AD: "insertAD",
                PAUSE_AD: "pauseAD",
                OVERLAY_AD: "overlayAD",
                AD_END: "adend",
                AD_ERROR: "aderror",
                AD_PLAY: "adplay",
                AD_PAUSE: "adpause",
                AD_TIMEUPDATE: "adtimeupdate",
                AD_LOADING: "adloading",
                AD_TIMEOUT: "adtimeout",
                AD_CANPLAY: "adcanplay",
                AD_READY: "adready",
                AD_DATA_OK: "addataok",
                AD_DATA_ERROR: "addataerror",
                UGLY_CLOSE_AD: "uglyclosead",
                FRONT_AD_END: "frontADend",
                FRONT_AD_ERROR: "frontADerror",
                FRONT_AD_INFO_OK: "frontAdinfook",
                FRONT_AD_UNITED_INFO_OK: "unitedfrontadinfook",
                FRONT_AD_INFO_ADAPER_OK: "frontAdinfoadapterok",
                FRONT_AD_INFO_TIMEOUT: "frontAdinfotimeout",
                BACK_AD_END: "backAdend",
                BACK_AD_ERROR: "backaderror",
                BACK_AD_INFO_OK: "backAdinfook",
                BACK_AD_INFO_TIMEOUT: " backAdinfotimeout",
                INSERT_AD_INFO_OK: "insertAdinfook",
                PAUSE_AD_INFO_OK: "pauseAdinfook",
                PAUSE_AD_INFO_ERROR: "pauseAdinfoerror",
                PAUSE_AD_INFO_TIMEOUT: "pauseadinfotimeout",
                OVERLAY_AD_INFO_OK: "overlayAdinfook",
                AdPluginObject: "adpluginobject"
            };
            e.default = t
        })
    }, function (e, t, i) {
        "use strict";
        function n(e) {
            return e && e.__esModule ? e : {default: e}
        }

        t.__esModule = !0;
        var s = i(2), a = n(s), o = i(118), r = n(o);
        t.default = function e(t, i, n) {
            null === t && (t = Function.prototype);
            var s = (0, r.default)(t, i);
            if (void 0 === s) {
                var o = (0, a.default)(t);
                return null === o ? void 0 : e(o, i, n)
            }
            if ("value" in s)return s.value;
            var u = s.get;
            if (void 0 !== u)return u.call(n)
        }
    }, function (e, t) {
        var i = {}.toString;
        e.exports = function (e) {
            return i.call(e).slice(8, -1)
        }
    }, function (e, t) {
        e.exports = function (e) {
            if (void 0 == e)throw TypeError("Can't call method on  " + e);
            return e
        }
    }, function (e, t) {
        e.exports = "constructor,hasOwnProperty,isPrototypeOf,propertyIsEnumerable,toLocaleString,toString,valueOf".split(",")
    }, function (e, t, i) {
        var n = i(19), s = i(145), a = i(38), o = i(44)("IE_PROTO"), r = function () {
        }, u = function () {
            var e, t = i(69)("iframe"), n = a.length;
            for (t.style.display = "none", i(140).appendChild(t), t.src = "javascript:", e = t.contentWindow.document, e.open(), e.write("<script>document.F=Object<\/script>"), e.close(), u = e.F; n--;)delete u.prototype[a[n]];
            return u()
        };
        e.exports = Object.create || function (e, t) {
                var i;
                return null !== e ? (r.prototype = n(e), i = new r, r.prototype = null, i[o] = e) : i = u(), void 0 === t ? i : s(i, t)
            }
    }, function (e, t, i) {
        var n = i(30), s = i(31), a = i(18), o = i(48), r = i(15), u = i(70), l = Object.getOwnPropertyDescriptor;
        t.f = i(13) ? l : function (e, t) {
            if (e = a(e), t = o(t, !0), u)try {
                return l(e, t)
            } catch (e) {
            }
            if (r(e, t))return s(!n.f.call(e, t), e[t])
        }
    }, function (e, t) {
        t.f = Object.getOwnPropertySymbols
    }, function (e, t, i) {
        var n = i(14), s = i(7), a = i(20);
        e.exports = function (e, t) {
            var i = (s.Object || {})[e] || Object[e], o = {};
            o[e] = t(i), n(n.S + n.F * a(function () {
                    i(1)
                }), "Object", o)
        }
    }, function (e, t, i) {
        var n = i(17).f, s = i(15), a = i(11)("toStringTag");
        e.exports = function (e, t, i) {
            e && !s(e = i ? e : e.prototype, a) && n(e, a, {configurable: !0, value: t})
        }
    }, function (e, t, i) {
        var n = i(45)("keys"), s = i(32);
        e.exports = function (e) {
            return n[e] || (n[e] = s(e))
        }
    }, function (e, t, i) {
        var n = i(7), s = i(10), a = s["__core-js_shared__"] || (s["__core-js_shared__"] = {});
        (e.exports = function (e, t) {
            return a[e] || (a[e] = void 0 !== t ? t : {})
        })("versions", []).push({
            version: n.version,
            mode: i(28) ? "pure" : "global",
            copyright: "© 2018 Denis Pushkarev (zloirock.ru)"
        })
    }, function (e, t) {
        var i = Math.ceil, n = Math.floor;
        e.exports = function (e) {
            return isNaN(e = +e) ? 0 : (e > 0 ? n : i)(e)
        }
    }, function (e, t, i) {
        var n = i(37);
        e.exports = function (e) {
            return Object(n(e))
        }
    }, function (e, t, i) {
        var n = i(16);
        e.exports = function (e, t) {
            if (!n(e))return e;
            var i, s;
            if (t && "function" == typeof(i = e.toString) && !n(s = i.call(e)))return s;
            if ("function" == typeof(i = e.valueOf) && !n(s = i.call(e)))return s;
            if (!t && "function" == typeof(i = e.toString) && !n(s = i.call(e)))return s;
            throw TypeError("Can't convert object to primitive value")
        }
    }, function (e, t, i) {
        var n = i(10), s = i(7), a = i(28), o = i(50), r = i(17).f;
        e.exports = function (e) {
            var t = s.Symbol || (s.Symbol = a ? {} : n.Symbol || {});
            "_" == e.charAt(0) || e in t || r(t, e, {value: o.f(e)})
        }
    }, function (e, t, i) {
        t.f = i(11)
    }, function (e, t) {
        var i;
        i = function () {
            return this
        }();
        try {
            i = i || Function("return this")() || (0, eval)("this")
        } catch (e) {
            "object" == typeof window && (i = window)
        }
        e.exports = i
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(9), i(0), i(1), i(23), i(8), i(5)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o) {
            "use strict";
            function r(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var u = r(t), l = r(i), d = r(n), h = r(a), c = r(o), f = function () {
                function e(t, i) {
                    (0, l.default)(this, e), this.data = t, this.TAG = "LiveReportor", this.cna = this.data.cna, this.tsSn = 1
                }

                return (0, d.default)(e, [{
                    key: "tsInit", value: function () {
                        delete this.tsSn
                    }
                }, {
                    key: "reset", value: function (e) {
                        (0, u.default)(this.data, e)
                    }
                }, {
                    key: "fdlLog", value: function () {
                        var e = {}, t = this.data;
                        e.userid = t.userId, e.vid = t.liveId, e.cna = this.cna, e.ccode = t.ccode, e.ups_client_netip = t.clientIp, e.psid = t.psid, e.title = t.name, e.utdid = t.utdid, e.screenid = t.screenId || 1, e.view = t.view, e.refer = encodeURIComponent(document.referrer), e.hd = t.dq, window.UrchinAplus && window.UrchinAplus._yVvlogInfo && (e.pvid = (window.UrchinAplus._yVvlogInfo() || {}).pvid), e.ext = t.ext, e.app = c.default.appName;
                        c.default.urlParameter(e);
                        (0, s.sendMessage)("//yt.mmstat.com/yt/youkuplayer.fdl.h5send?" + c.default.urlParameter(e))
                    }
                }, {
                    key: "refreshLog", value: function (e) {
                        (0, s.sendMessage)("//yt1.mmstat.com/yt/youkulive.refresh.pmg?app=" + c.default.appName + "&pmg=" + e)
                    }
                }, {
                    key: "mdLog", value: function () {
                        var e = {}, t = this.data;
                        e.userid = t.userId, e.vid = t.liveId, e.cna = this.cna, e.ccode = t.ccode, e.ups_client_netip = t.clientIp, e.psid = t.psid, e.title = t.name, e.utdid = t.utdid, e.screenid = t.screenId || 1, e.view = t.view, e.refer = encodeURIComponent(document.referrer), e.hd = t.hd, window.UrchinAplus && window.UrchinAplus._yVvlogInfo && (e.pvid = (window.UrchinAplus._yVvlogInfo() || {}).pvid), e.ext = t.ext, e.app = c.default.appName;
                        c.default.urlParameter(e);
                        (0, s.sendMessage)("//yt.mmstat.com/yt/youkulive.web.md?" + c.default.urlParameter(e))
                    }
                }, {
                    key: "ALiInfo", value: function () {
                        var e = {}, t = this.data;
                        return e.tlplay = t.tlplay || 0, e.URL = encodeURIComponent(location.href), e.data_source = 1, e.cookieid = c.default.cookie.getCookie("__ysuid"), e.userid = t.userId, e.playtype = t.liveStatus, e.liveid = t.liveId, e.fps = 25, e.categoryId = t.categoryId || "", e.source = t.source || "", e.cna = this.cna, e.categoryName = t.categoryName || "", e.name = t.name || "", t.ccode && (e.ccode = t.ccode), e.area = t.area, e.dmaCode = t.dmaCode, e.clientIp = t.clientIp, e.pay = t.pay ? 1 : 0, t.psid && (e.psid = t.psid), e.drm = t.drm ? "drm" : -1, e.utdid = t.utdid, e.screenid = t.screenId || 1, e.view = t.view, e.referurl = encodeURIComponent(document.referrer), e.vvid = t.vvid, e.ctype = 71, e.hd = t.hd, window.UrchinAplus && window.UrchinAplus._yVvlogInfo && (e.pvid = (window.UrchinAplus._yVvlogInfo() || {}).pvid), e.ext = t.ext, e.app = c.default.appName, e
                    }
                }, {
                    key: "sendVipLog", value: function () {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {}, t = this.ALiInfo();
                        e && e.type && (t.viplogtype = e.type), (0, s.sendMessage)("//yt2.mmstat.com/yt/youkulive.web.vip?" + c.default.urlParameter(t))
                    }
                }, {
                    key: "sendFrametLog", value: function () {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {}, t = this.ALiInfo();
                        t.livePermissionDuration = e.livePermissionDuration, t.durationType = e.durationType;
                        c.default.urlParameter(t);
                        (0, s.sendMessage)("//yt2.mmstat.com/yt/youkulive.firstframe.info?" + c.default.urlParameter(t))
                    }
                }, {
                    key: "sendTSLog", value: function (e) {
                        var t = this;
                        h.default.i(this.TAG, "TSLOG: " + (e || "start"));
                        var i = this.ALiInfo();
                        i.lognum = this.tsSn;
                        var n = 5;
                        if (1 == this.tsSn && (n = 5), 2 == this.tsSn && (n = 5), 3 == this.tsSn && (n = 10), this.tsSn > 3 && (n = 20), this.tsSn++, "stop" == e)return this.tstimer && clearTimeout(this.tstimer), this.tsSn = 1, void(this.tstimer = null);
                        i.heartbeatInterval = n;
                        var a = 1e3 * n;
                        c.default.urlParameter(i);
                        this.tstimer = setTimeout(function () {
                            (0, s.sendMessage)("//yt1.mmstat.com/yt/youkulive.web.ts?" + c.default.urlParameter(i)), t.sendTSLog()
                        }, a)
                    }
                }, {
                    key: "sendDrmError", value: function () {
                        var e = this.ALiInfo();
                        (0, s.sendMessage)("//yt2.mmstat.com/yt/youkulive.web.drmsecreterror?" + c.default.urlParameter(e))
                    }
                }, {
                    key: "sendVVLog", value: function (e) {
                        h.default.i(this.TAG, "VVLOG: success");
                        var t = this.ALiInfo();
                        c.default.urlParameter(t);
                        (0, s.sendMessage)("//yt.mmstat.com/yt/youkulive.web.vv?" + c.default.urlParameter(t))
                    }
                }, {
                    key: "sendUepLog", value: function (e, t) {
                        var i = this.ALiInfo();
                        if ("errorbeforeplay" == e || "errorplaying" == e) {
                            if (this.hasSendUepError)return;
                            this.hasSendUepError = !0
                        }
                        i.type = e, t.s && (i.second = t.s), t.code && (i.uepcode = t.code), (0, s.sendMessage)("//yt2.mmstat.com/yt/youkulive.web.uep?" + c.default.urlParameter(i))
                    }
                }]), e
            }();
            e.default = f
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(26), i(114), i(0), i(1), i(93), i(12), i(8), i(5), i(94), i(107), i(92), i(55), i(91), i(54), i(34), i(56), i(22), i(24), i(96), i(33), i(57), i(112), i(52)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o, r, u, l, d, h, c, f, v, p, m, y, _, g, k, E, A, T) {
            "use strict";
            function b(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0}), e.EventEmitter = e.util = e.Log = e.Browser = e.YoukuH5PlayerCore = void 0;
            var w = b(t), S = b(i), P = b(n), L = b(s), I = b(a), x = b(o), C = b(r), D = b(u), M = b(l), U = b(d), O = b(h), R = b(c), N = b(f), V = b(p), F = b(y), G = b(g), H = b(E), j = b(A), B = b(T), q = function () {
                function e(t, i) {
                    if ((0, P.default)(this, e), this.TAG = "YoukuH5PlayerCore", !(t && (i.videoId || i.param && i.param.showid)))return void console.error("the param is error,please check!!!");
                    if ("string" == typeof t && D.default.getById(t)) this.containerId = t, this.container = D.default.getById(t), this.mediaElementId = "xplayer_" + t; else if (t instanceof HTMLElement) {
                        this.container = t;
                        var n = (new Date).getTime() + "";
                        this.mediaElementId = "xplayer" + n
                    } else C.default.e("the value of container id error,please check!!!");
                    this.config = i, this.liveReportor = new B.default(i.livereportData), this.config.client_id || (this.config.client_id = "youkumobileplaypgit age"), this.control = this.config.control || {}, this._createVideo(), this.hlsSupport = window.fetch && window.Hls && window.Hls.isSupported && window.Hls.isSupported(), this.supportType = this._getSupportType(), this.winType = this.config.winType ? this.config.winType : x.default.isMobile ? "xplayer_m3u8" : "xplayer_h5", this.isThirdParty = this._isThirdParty(), this.error = !1, this._firstTag = !0, this._isAdPlaying = !1, this.currentTime = 0, this._frontAd = !1, this._replay = !1, this.isPause = !0, this.cna = D.default.getCna();
                    var s = {};
                    if (s.vid = i.videoId, s.ccode = i.ccode, s.client_ip = "0.0.0.0", this.config.param)for (var a in this.config.param) {
                        if (!this.config.param[a])return;
                        s[a] = this.config.param[a]
                    }
                    s.client_ts = parseInt((new Date).getTime() / 1e3), s.utid = this.cna;
                    var o = null;
                    this.isThirdParty && (o = {}, this.config.password && (this.custumPassword = this.config.password, o.password = this.config.password), o.client_id = this.config.client_id, o.video_id = this.config.videoId, o.embsig = this.config.embsig, o.refer = encodeURIComponent(window.location.href)), this._upsInfo = new I.default(s, o), this._videoInfo = new M.default(this.config.ccode);
                    var r = -1 != navigator.userAgent.toLowerCase().indexOf("alipay");
                    !this.hlsSupport || "m3u8" !== this.supportType || this.supportM3U8() || r ? "m3u8" === this.supportType ? this._player = new R.default({}) : this._player = new O.default({}) : this._player = new N.default({}), this._emitter = new F.default;
                    var u = {
                        supportType: "mp4",
                        sid: "",
                        client_id: this.config.client_id,
                        ccode: this.config.ccode,
                        vvlogconfig: this.config.logconfig,
                        cna: this.cna
                    };
                    this._reporter = new G.default(this.mediaElement, null, u, this), this._e = {
                        onPlay: this._onPlay.bind(this),
                        onPause: this._onPause.bind(this),
                        onEnded: this._onEnded.bind(this),
                        onCanPlay: this._onCanplay.bind(this),
                        onTimeUpdate: this._onTimeupdate.bind(this),
                        onError: this._onError.bind(this),
                        onLoadedData: this._onLoadeddata.bind(this),
                        onLoadedMetaData: this._onLoadedmetaData.bind(this),
                        onAbort: this._onAbort.bind(this),
                        onStalled: this._onStalled.bind(this),
                        onSuspend: this._onSuspend.bind(this),
                        onWaiting: this._onWaiting.bind(this),
                        onVolumeChange: this._onVolumeChange.bind(this),
                        onPlaying: this._onPlaying.bind(this),
                        onSeeked: this._onSeeked.bind(this),
                        onSeeking: this._onSeeking.bind(this),
                        onDurationChange: this._onDurationChange.bind(this),
                        onProgress: this._onProgress.bind(this),
                        onRateChange: this._onRateChange.bind(this),
                        onLoadStart: this._onLoadStart.bind(this)
                    }, this._adEvent = {
                        onAdStartPlay: this._onAdStartPlay.bind(this),
                        onAdEnd: this._onAdEnd.bind(this),
                        onAdPause: this._onAdPause.bind(this),
                        onAdTimeUpdate: this._onAdTimeUpdate.bind(this),
                        onAdError: this._onAdError.bind(this),
                        onAdLoading: this._onAdLoading.bind(this),
                        onAdCanPlay: this._onAdCanPlay.bind(this),
                        onAdTimeout: this._onAdTimeout.bind(this),
                        adDataOk: this._adDataOk.bind(this),
                        adDataError: this._adDataError.bind(this),
                        onAdReady: this._onAdReady.bind(this)
                    }, this.currentState = k.YKP.PLAYER_STATE.INIT, this._adplugin = new U.default(this.mediaElement, {
                        supportType: this.supportType,
                        ccode: this.config.ccode
                    }), this._attachAdEvents(), this.load(null, o), "https:" == location.protocol && x.default.safari ? this.supportVR = !1 : this.supportVR = j.default.isSupport(), this.vrMode = 0, this.vr3d = null
                }

                return (0, L.default)(e, [{
                    key: "destroy", value: function () {
                        this.error = !1, this._firstTag = !0, this._isAdPlaying = !1, this.currentTime = 0, this._frontAd = !1, this._replay = !1, this._originalData = null, this.totalTime = 0, this.isPause = !0, this.vv59 = !1, this._player.destroy(), this._videoInfo.destroy(), this._adplugin.destroy(), this._reporter.destroy()
                    }
                }, {
                    key: "_createVideo", value: function (e, t) {
                        if (!this.mediaElement) {
                            var i = document.createElement("video");
                            i.id = this.mediaElementId, i.setAttribute("webkit-playsinline", !0), i.setAttribute("playsinline", !0), i.style.width = "100%", i.style.height = "100%", i.style.display = "none", i.style.position = "relative", this.control.autoplay && (i.autoplay = "autoplay"), this.config.loop && (i.loop = !0), e && (i.width = "string" == typeof e && e.indexOf("px") > 0 ? e : e + "px"), t && (e.height = "string" == typeof t && t.indexOf("px") > 0 ? t : t + "px"), this.container.appendChild(i), this.mediaElement = i, this.config.hidecontrol && this.changeMuted(0)
                        }
                    }
                }, {
                    key: "_attachPlayerEvents", value: function () {
                        if (!this.ifEvent && (this.ifEvent = !0, this._player && this._e))for (var e in _.VIDEO_EVENTS)this._player.on(_.VIDEO_EVENTS[e], this._e[_.VIDEO_EVENTS[e]])
                    }
                }, {
                    key: "_dettachPlayerEvents", value: function () {
                        if (this._player && this._e)for (var e in _.VIDEO_EVENTS)this._player.off(_.VIDEO_EVENTS[e], this._e[_.VIDEO_EVENTS[e]])
                    }
                }, {
                    key: "_attachAdEvents", value: function () {
                        this._adplugin && this._adEvent && (this._adplugin.on(V.default.AD_DATA_OK, this._adEvent.adDataOk), this._adplugin.on(V.default.AD_DATA_ERROR, this._adEvent.adDataError), this._adplugin.on(V.default.AD_PLAY, this._adEvent.onAdStartPlay), this._adplugin.on(V.default.AD_PAUSE, this._adEvent.onAdPause), this._adplugin.on(V.default.AD_END, this._adEvent.onAdEnd), this._adplugin.on(V.default.AD_TIMEUPDATE, this._adEvent.onAdTimeUpdate), this._adplugin.on(V.default.AD_ERROR, this._adEvent.onAdError), this._adplugin.on(V.default.AD_CANPLAY, this._adEvent.onAdCanPlay), this._adplugin.on(V.default.AD_LOADING, this._adEvent.onAdLoading), this._adplugin.on(V.default.AD_TIMEOUT, this._adEvent.onAdTimeout), this._adplugin.on(V.default.AD_READY, this._adEvent.onAdReady))
                    }
                }, {
                    key: "_dettachAdEvents", value: function () {
                        this._adplugin && this._adEvent && (this._adplugin.off(V.default.AD_DATA_OK, this._adEvent.adDataOk), this._adplugin.off(V.default.AD_DATA_ERROR, this._adEvent.adDataError), this._adplugin.off(V.default.AD_PLAY, this._adEvent.onAdStartPlay), this._adplugin.off(V.default.AD_PAUSE, this._adEvent.onAdPause), this._adplugin.off(V.default.AD_END, this._adEvent.onAdEnd), this._adplugin.off(V.default.AD_TIMEUPDATE, this._adEvent.onAdTimeUpdate), this._adplugin.off(V.default.AD_ERROR, this._adEvent.onAdError), this._adplugin.off(V.default.AD_CANPLAY, this._adEvent.onAdCanPlay), this._adplugin.off(V.default.AD_LOADING, this._adEvent.onAdLoading), this._adplugin.off(V.default.AD_TIMEOUT, this._adEvent.onAdTimeout), this._adplugin.off(V.default.AD_READY, this._adEvent.onAdReady))
                    }
                }, {
                    key: "_isThirdParty", value: function () {
                        return !(!this.config.client_id || 16 != (this.config.client_id + "").length) && (this.winType = "BDskin", !0)
                    }
                }, {
                    key: "_getSupportType", value: function () {
                        return this.control && "mp4" === this.control.playerType ? "mp4" : "m3u8"
                    }
                }, {
                    key: "_upsdataSuccess", value: function (e, t) {
                        this.error = !1, this.thirdData = t;
                        var i = null;
                        if (this.custumPassword && (this.password = this.custumPassword, i = this.config.client_id), e.error) {
                            var n = e.error.code;
                            if (["-2002", "-2003", "-3001", "-3002", "-3006", "-3007", "-3008"].join(",").indexOf(n) > -1) this._originalData = e, this._videoInfo.init(e, this.password, i), this._initControlInfo(); else {
                                switch (n) {
                                    case"-4004":
                                        this.sendErrorLog("23", "23404");
                                        break;
                                    case"-4005":
                                        this.sendErrorLog("23", "23405");
                                        break;
                                    case"-5001":
                                        this.sendErrorLog("23", "23501");
                                        break;
                                    case"-6001":
                                        this.sendErrorLog("23", "23601");
                                        break;
                                    case"-6003":
                                        this.sendErrorLog("23", "23603");
                                        break;
                                    case"-6004":
                                        this.sendErrorLog("23", "23604")
                                }
                                this.currentState = k.YKP.PLAYER_STATE.ERROR
                            }
                            this.error = !0, this._upsDataError(e.error)
                        } else {
                            if (this._originalData = e, this._videoInfo.init(e, this.password, i), this._initControlInfo(), this.totalTime = this._videoInfo.video ? Number(this._videoInfo.video.seconds) : 0, !this.control.lang)for (var s in this._videoInfo.video.stream_types) {
                                this.control.lang = s;
                                break
                            }
                            if (!this.control.hd)for (var a in this._videoInfo.video.stream_types) {
                                this.control.hd = this._videoInfo.video.stream_types[a][0];
                                break
                            }
                            var o = this._videoInfo.getStreamData(this.control.lang, this.control.hd);
                            this.totalTime = o.seconds_video > this.totalTime ? o.seconds_video : this.totalTime, this.headAdTime = o.headTime, this.tailAdTime = o.tailTime;
                            var r = !0, u = !1, l = void 0;
                            try {
                                for (var d, h = (0, S.default)(this._videoInfo.video.type); !(r = (d = h.next()).done); r = !0) {
                                    if ("panorama" === d.value) {
                                        this._videoInfo.isVR = 1;
                                        break
                                    }
                                }
                            } catch (e) {
                                u = !0, l = e
                            } finally {
                                try {
                                    !r && h.return && h.return()
                                } finally {
                                    if (u)throw l
                                }
                            }
                            this._initAdPlugin(), this._reporter.init(this._videoInfo), C.default.i(this.TAG, "get ups data from upsInfo vid is:" + e.video.id)
                        }
                        this.upsDataSuccess(e), this.upsDataReady(e)
                    }
                }, {
                    key: "_initAdPlugin", value: function () {
                        var e = {};
                        e.fu = this.control.fullscreen, e.vr = 0, e.rst = x.default.isMobile && "ios" === x.default.os ? "m3u8" : "mp4", e.dq = v.VIDEOHD_MAP[this.control.hd], e.os = x.default.os, e.bt = x.default.device, e.bd = x.default.brand, e.tict = 0, e.fu = this.control.fullscreen ? 1 : 0, e.d = this.config.param && this.config.param.playlist_id ? this.config.param.playlist_id : 0, this.isThirdParty && (e.partnerid = this.config.client_id, e.atm = this.thirdData && this.thirdData.atm ? this.thirdData.atm : "");
                        var t = {};
                        t.param = e, this.config.adConfig && (t.adConfig = this.config.adConfig), t.supportType = this.supportType, t.lang = this.control.lang, t.hd = this.control.hd, t.m3u8_url = this._videoInfo.stream[this.control.lang][this.control.hd].m3u8_url, this._adplugin.init(this._videoInfo, t)
                    }
                }, {
                    key: "_realStartPlay", value: function (e) {
                        if (C.default.i(this.TAG, "_realStartPlay" + e + " "), this._firstTag) {
                            this._videoInfo.isVR ? this.setVRMode(1) : this.setVRMode(0);
                            var t = {};
                            this._player.attachMediaElement(this.mediaElement), this._attachPlayerEvents();
                            var i = this._videoInfo.stream[this.control.lang][this.control.hd];
                            if (this.totalTime = i.seconds_video > this.totalTime ? i.seconds_video : this.totalTime, this._videoInfo.trial ? t.totalTime = this._videoInfo.trial.time : t.totalTime = this.totalTime, "m3u8" === this.supportType) {
                                var n = i.m3u8_url;
                                t.m3u8Url = n, t.frontAdTime = this._adplugin.frontAdTime
                            } else t.segs = i.segs;
                            this._player.load(t), this.currentState = k.YKP.PLAYER_STATE.PLAYING, this.isThirdParty && this._upsInfo.sendThirdToken(), this.vv59 || (this._reporter.addPlayerDurationReport(59), this.liveReportor.sendVVLog(), this.vv59 = !0)
                        } else this.sendEventLog("xpl", "c");
                        e && this._player.play(), this.currentState = k.YKP.PLAYER_STATE.PLAYING
                    }
                }, {
                    key: "_initControlInfo", value: function () {
                        if (this._videoInfo.langcodes) {
                            var e = this.control, t = this._videoInfo.langcodes.join(",") + ",", i = e.lang;
                            !e.lang || t.indexOf(i + ",") < 0 ? this.control.lang = this._videoInfo.langcodes[0] : this.control.lang = e.lang, this.control.hd = e.hd || "mp4hd";
                            var n = this._videoInfo.hdList[this.control.lang].hdcodes;
                            (n.join(",") + ",").indexOf(this.control.hd + ",") < 0 && (this.control.hd = n.join(",").indexOf("3gphd") > -1 ? "3gphd" : n[0]), this.control.autoplay = e.autoplay || !1, this.control.fullscreen = e.fullscreen || !1
                        }
                    }
                }, {
                    key: "_upsTimeout", value: function () {
                        this.currentState = k.YKP.PLAYER_STATE.ERROR, C.default.i(this.TAG, "get ups data timeout,please try again"), this.sendErrorLog("20", "20408");
                        var e = {code: "0001", note: "数据获取失败，请检查网络之后重试"};
                        this.upsDataFail(e)
                    }
                }, {
                    key: "_upsDataError", value: function (e) {
                        this.currentState = k.YKP.PLAYER_STATE.ERROR, C.default.d(this.TAG, "_upsDataError:" + (0, w.default)(e)), this.upsDataError(e)
                    }
                }, {
                    key: "_upsDataFail", value: function (e) {
                        C.default.d(this.TAG, e), this.currentState = k.YKP.PLAYER_STATE.ERROR, e && e.response && this.sendErrorLog("21", "21" + e.code), e && !e.response && this.sendErrorLog("21", "21408"), e || this.sendErrorLog("20", "20404"), e = e || {
                                code: "0002",
                                note: "数据获取失败，请检查网络之后重试"
                            }, this.upsDataFail(e), C.default.d(this.TAG, "_upsDataFail:get upsinfo fail,the service is 404 or 503")
                    }
                }, {
                    key: "_onPlay", value: function (e) {
                        C.default.d(this.TAG, "_onPlay" + this._player.currentTime), this._firstTag && (this._firstTag = !1, this._reporter.sendTSLog(60), this.liveReportor.sendTSLog(), this._reporter.sendUPSLog(3)), this.isPause = !1, this.onPlay()
                    }
                }, {
                    key: "_onPause", value: function (e) {
                        C.default.d(this.TAG, "_onPause:"), this.isPause = !0, 0 === D.default.getScreenState() && this._adplugin.requestPauseAd(), this.onPause()
                    }
                }, {
                    key: "_onEnded", value: function (e) {
                        this.isEnd || (this.currentState = k.YKP.PLAYER_STATE.END, this.isEnd = !0, this.liveReportor.sendTSLog("stop"), this._reporter.sendTSLog(61), C.default.d(this.TAG, "onEnded"), this.onEnded())
                    }
                }, {
                    key: "_onCanplay", value: function (e) {
                        C.default.d(this.TAG, "_onCanplay" + this._player.currentTime), this.onCanplay(e)
                    }
                }, {
                    key: "_onTimeupdate", value: function (e, t) {
                        t <= this.totalTime && (this.currentTime = t, this.onTimeupdate(e, t))
                    }
                }, {
                    key: "_onError", value: function (e) {
                        C.default.d(this.TAG, "_onError"), this.error = !0, this.currentState = k.YKP.PLAYER_STATE.ERROR, "m3u8" === this.supportType ? 0 === this.currentTime ? this.sendErrorLog("32", "32408") : this.sendErrorLog("32", "32602") : this.sendErrorLog("31", "31602"), this.onError(e)
                    }
                }, {
                    key: "_onLoadeddata", value: function (e) {
                        this.onLoadeddata(e), C.default.d(this.TAG, "_onLoadeddata")
                    }
                }, {
                    key: "_onLoadedmetaData", value: function (e) {
                        this.onLoadedmetaData(e), C.default.d(this.TAG, "_onLoadedmetaData")
                    }
                }, {
                    key: "_onLoadStart", value: function (e) {
                        this.onLoadStart(e), C.default.d(this.TAG, "_onLoadStart")
                    }
                }, {
                    key: "_onAbort", value: function (e) {
                        this.onAbort(e), C.default.d(this.TAG, "_onAbort")
                    }
                }, {
                    key: "_onStalled", value: function (e) {
                        this.onStalled(), C.default.d(this.TAG, "_onStalled")
                    }
                }, {
                    key: "_onSuspend", value: function (e) {
                        this.onSuspend(), C.default.d(this.TAG, "_onSuspend")
                    }
                }, {
                    key: "_onWaiting", value: function (e) {
                        this.onWaiting(e), C.default.d(this.TAG, "_onWaiting")
                    }
                }, {
                    key: "_onVolumeChange", value: function (e) {
                        this.onVolumeChange(e), C.default.d(this.TAG, "_onVolumeChange")
                    }
                }, {
                    key: "_onPlaying", value: function (e) {
                        this.onPlaying(e), this.currentState = k.YKP.PLAYER_STATE.PLAYING, this.mediaElement.style.display = "block", C.default.d(this.TAG, "_onPlaying")
                    }
                }, {
                    key: "_onSeeked", value: function (e) {
                        this.onSeeked(e), C.default.d(this.TAG, "_onSeeked")
                    }
                }, {
                    key: "_onSeeking", value: function (e) {
                        this.onSeeking(e), C.default.d(this.TAG, "_onSeeking")
                    }
                }, {
                    key: "_onDurationChange", value: function (e) {
                        this.onDurationChange(e), C.default.d(this.TAG, "_onDurationChange")
                    }
                }, {
                    key: "_onProgress", value: function (e) {
                        this.onProgress(e)
                    }
                }, {
                    key: "_onRateChange", value: function (e) {
                        this.onRateChange(e), C.default.d(this.TAG, "_onRateChange")
                    }
                }, {
                    key: "_onAdTimeUpdate", value: function (e, t, i, n) {
                        this.onAdTimeUpdate(e, t, i, n)
                    }
                }, {
                    key: "_onAdStartPlay", value: function (e, t) {
                        this.isPause = !1, this._player.adStatus = !0, this.currentState = k.YKP.PLAYER_STATE.ADPLAY, this._isAdPlaying || (this._isAdPlaying = !0, this._reporter.sendUPSLog(1)), "front" !== t || this.vv59 || (this.vv59 = !0), this.onAdStartPlay(e, t)
                    }
                }, {
                    key: "_onAdEnd", value: function (e, t) {
                        C.default.i(this.TAG, "_onAdEnd::" + t + "|||" + e), this.onAdEnd(e, t), this._isAdPlaying = !1, this._reporter.sendUPSLog(2), "front" === t ? (this._frontAd = !0, this._realStartPlay()) : "end" === t && (this._endAd = !0, this._isAdPlaying = !1, this.currentState = k.YKP.PLAYER_STATE.END, this.onEnded()), this._player.adStatus = !1
                    }
                }, {
                    key: "_onAdPause", value: function (e, t) {
                        C.default.d(this.TAG, "  _onAdPause:"), this.currentState = k.YKP.PLAYER_STATE.ADPAUSE, this.isPause = !0, this.onAdPause(e, t)
                    }
                }, {
                    key: "_onAdError", value: function (e, t) {
                        C.default.d(this.TAG, "_onAdError"), this._adError = !0, this._onAdEnd(e, t), this.onAdError(e, t)
                    }
                }, {
                    key: "_onAdTimeout", value: function (e, t) {
                        this.onAdTimeout(e, t)
                    }
                }, {
                    key: "_onAdLoading", value: function (e, t) {
                        this.onAdLoading(e, t)
                    }
                }, {
                    key: "_onAdCanPlay", value: function (e, t) {
                        C.default.i(this.TAG, "_onAdCanPlay"), this.onAdCanPlay(e, t)
                    }
                }, {
                    key: "_onAdReady", value: function (e, t) {
                        "front" === t && !this.error && this.control.autoplay && this._adplugin.autoPlay(), this.onAdReady(e, t)
                    }
                }, {
                    key: "_adDataOk", value: function (e, t) {
                        m.AD_MAP.PAUSE === t ? e.VAL.length && this.pauseAdDataOk(e) : ("front" === t && this._reporter.initAdInfo(e), this.adDataOk(e, t))
                    }
                }, {
                    key: "_adDataError", value: function (e) {
                        C.default.i(this.TAG, "this._curNum++;"), this._onAdEnd(null, e), this.adDataError()
                    }
                }, {
                    key: "getVideoInfo", value: function () {
                        return this._videoInfo.getVideoInfo()
                    }
                }, {
                    key: "getUserInfo", value: function () {
                        return this._videoInfo.getUserInfo()
                    }
                }, {
                    key: "getVideoList", value: function () {
                        return this._videoInfo.getVideoList()
                    }
                }, {
                    key: "getShow", value: function () {
                        return this._videoInfo.getShow()
                    }
                }, {
                    key: "getUps", value: function () {
                        return this._videoInfo.ups
                    }
                }, {
                    key: "getCurStreamLogo", value: function () {
                        var e = this._videoInfo.getStreamLogo();
                        return e && e[this.control.lang] && null !== e[this.control.lang][this.control.hd] ? e[this.control.lang][this.control.hd] : null
                    }
                }, {
                    key: "getTrialInfo", value: function () {
                        return this._videoInfo.getTrialInfo()
                    }
                }, {
                    key: "getAlbum", value: function () {
                        return this._videoInfo.getAlbum()
                    }
                }, {
                    key: "getUploader", value: function () {
                        return this._videoInfo.getUploader()
                    }
                }, {
                    key: "getPreviewInfo", value: function () {
                        return this._videoInfo.getPreviewInfo()
                    }
                }, {
                    key: "getCloudOptions", value: function () {
                        return this._videoInfo.getCloudOptions()
                    }
                }, {
                    key: "getTicketInfo", value: function () {
                        return this._videoInfo.ticket
                    }
                }, {
                    key: "getPayInfo", value: function () {
                        return this._videoInfo.getPayInfo()
                    }
                }, {
                    key: "getVideolike", value: function () {
                        return this._videoInfo.getVideolike()
                    }
                }, {
                    key: "getLanguageList", value: function () {
                        return this._videoInfo.languageList
                    }
                }, {
                    key: "getHdList", value: function (e) {
                        return this._videoInfo.hdList ? e && this._videoInfo.langcodes.join(",").indexOf(e) > -1 ? this._videoInfo.hdList[e].hditems : this._videoInfo.hdList[this.control.lang].hditems : null
                    }
                }, {
                    key: "getVipPayInfo", value: function () {
                        return this._videoInfo.getVipPayInfo()
                    }
                }, {
                    key: "getZpdPayInfo", value: function () {
                        return this._videoInfo.getZpdPayInfo()
                    }
                }, {
                    key: "getController", value: function () {
                        return this._videoInfo.getController()
                    }
                }, {
                    key: "getError", value: function () {
                        return this._videoInfo.error
                    }
                }, {
                    key: "getCurrentTime", value: function () {
                        return this.currentTime
                    }
                }, {
                    key: "ifShowLogo", value: function () {
                        var e = this._videoInfo.getStreamLogo();
                        if (e && e[this.control.lang] && e[this.control.lang][this.control.hd]) {
                            return 1 !== e[this.control.lang][this.control.hd]
                        }
                        return !0
                    }
                }, {
                    key: "launchFullscreen", value: function () {
                        this.control.fullscreen = !0
                    }
                }, {
                    key: "exitFullscreen", value: function () {
                        this.control.fullscreen = !1
                    }
                }, {
                    key: "getAdInfo", value: function (e) {
                        return this._adplugin.addata
                    }
                }, {
                    key: "skipAd", value: function (e) {
                        this._adplugin.skip(e)
                    }
                }, {
                    key: "setVRMode", value: function (e) {
                        this.vrMode != e && (0 == e ? this.vr3d && (this.vr3d.releaseVR(), this.vr3d = null) : (this.vr3d || (this.vr3d = new j.default), this.vr3d.init(this.mediaElement)), this.vrMode = e)
                    }
                }, {
                    key: "load", value: function (e, t) {
                        this._endAd = !1;
                        var i = e || {};
                        if (e)for (var n in e)i[n] = e[n];
                        this._upsInfo.start(this._upsdataSuccess.bind(this), this._upsDataFail.bind(this), this._upsTimeout.bind(this), i, t)
                    }
                }, {
                    key: "play", value: function () {
                        if (C.default.d(this.TAG, "play::" + this.currentState + "  _isAdPlaying:" + this._isAdPlaying), !this.error) {
                            if (this.currentState === k.YKP.PLAYER_STATE.END)return this.isEnd = !1, void this.replay();
                            this._firstTag && !this._isAdPlaying && this.sendEventLog("xPs", "c"), this._isAdPlaying || this.currentState === k.YKP.PLAYER_STATE.INIT ? this._adplugin.play() : this._realStartPlay(!0)
                        }
                    }
                }, {
                    key: "pause", value: function () {
                        C.default.d(this.TAG, "play::" + this.currentState + " isEnd:" + this.isEnd), this.error || this.isEnd || (this._isAdPlaying ? (this.currentState = k.YKP.PLAYER_STATE.ADPAUSE, this._adplugin.pause()) : (this.sendEventLog("xPa", "c"), this._player.pause(), this.currentState = k.YKP.PLAYER_STATE.PAUSE))
                    }
                }, {
                    key: "replay", value: function () {
                        if (C.default.i(this.TAG, "replay"), !this.error)return this.isEnd = !1, this.error = !1, this._firstTag = !0, this._isAdPlaying = !1, this.currentTime = 0, this._frontAd = !0, this._replay = !0, this.currentState = k.YKP.PLAYER_STATE.PLAYING, this._player.replay(), this.sendEventLog("Rp", "c"), this._reporter.tsInit(), !0
                    }
                }, {
                    key: "changeByVid", value: function (e, t, i) {
                        if (this._adError = !1, this.isEnd = !1, this.vv59 = !1, this._endAd = !1, this.currentState = k.YKP.PLAYER_STATE.INIT, !e)return void C.default.e(this.TAG, "changeByVid the param vid is undefined");
                        this.pause(), this._isAdPlaying && this.onAdEnd(), this.destroy();
                        var n = {};
                        if (n.vid = e, i && i.control && (this.control = i.control), i && i.param)for (var s in i.param)n[s] = i.param[s];
                        var a = null;
                        i && this.isThirdParty ? (a = {}, this.custumPassword = i.password, a.password = i.password, a.embsig = i.embsig, a.refer = i.refer) : this.custumPassword = null, this.config.videoId = e, this._upsInfo.start(function (e) {
                            this._upsdataSuccess(e), t && t(e)
                        }.bind(this), this._upsDataFail.bind(this), this._upsTimeout.bind(this), n, a)
                    }
                }, {
                    key: "reLoad", value: function (e) {
                        this.isEnd = !1, this.vv59 = !1, this._adError = !1, this._reporter.tsInit(), this._firstTag = !0, this.currentState = k.YKP.PLAYER_STATE.INIT;
                        var t = {};
                        e ? (t.password = e, this.password = e) : (this._reporter.changeParam({isRetry: 1}), this.password = null), this.load(t)
                    }
                }, {
                    key: "seek", value: function (e) {
                        (0 === e || e) && (C.default.i(this.TAG, "seek(_time):" + this._isAdPlaying), this._isAdPlaying || this._player.seek(e))
                    }
                }, {
                    key: "getVideoAttr", value: function (e) {
                        return this.mediaElement ? this.mediaElement[e] : null
                    }
                }, {
                    key: "setVideoAttr", value: function (e, t) {
                        this.mediaElement && (this.mediaElement[e] = t)
                    }
                }, {
                    key: "changeLanguage", value: function (e, t) {
                        if (e === this.control.lang)return C.default.i(this.TAG, " this.control.lang:" + this.control.lang + "  langCode:" + e + "  this.currentState:" + this.currentState), !1;
                        if (this.currentState === k.YKP.PLAYER_STATE.ERROR || this.currentState === k.YKP.PLAYER_STATE.INIT || this.currentState === k.YKP.PLAYER_STATE.ADPLAY || this.currentState === k.YKP.PLAYER_STATE.ADPAUSE)return this.control.lang = e, t && t(this.control), !0;
                        var i = {};
                        if (this._videoInfo.stream[e] && this._videoInfo.stream[e][this.control.hd]) {
                            if ("m3u8" === this.supportType) {
                                var n = this._videoInfo.stream[e][this.control.hd].m3u8_url;
                                i.m3u8Url = n, i.frontAdTime = 0
                            } else i.segs = this._videoInfo.stream[e][this.control.hd].segs;
                            return this._player.load(i), this.control.lang = e, t && t(this.control), !0
                        }
                        return !1
                    }
                }, {
                    key: "changeHd", value: function (e, t) {
                        var i = {};
                        if (e === this.control.hd)return C.default.i(this.TAG, " this.control.hd:" + this.control.hd + "  hdCode:" + e + "  this.currentState:" + this.currentState), !1;
                        if (C.default.i(this.TAG, " changeHd:" + e), this.currentState === k.YKP.PLAYER_STATE.ERROR || this.currentState === k.YKP.PLAYER_STATE.INIT || this.currentState === k.YKP.PLAYER_STATE.ADPLAY || this.currentState === k.YKP.PLAYER_STATE.ADPAUSE) {
                            return this._videoInfo.hdList[this.control.lang].hdcodes.join(",").indexOf(e) > -1 && (this.control.hd = e, t && t(this.control), !0)
                        }
                        if (this._videoInfo.stream[this.control.lang] && this._videoInfo.stream[this.control.lang][e]) {
                            if ("m3u8" === this.supportType) {
                                var n = this._videoInfo.stream[this.control.lang][e].m3u8_url;
                                i.m3u8Url = n, i.frontAdTime = 0
                            } else i.segs = this._videoInfo.stream[this.control.lang][e].segs;
                            return this.control.hd = e, this._player.pause(), this._player.load(i), t && t(this.control), !0
                        }
                        return !1
                    }
                }, {
                    key: "changeMuted", value: function (e) {
                        return e > 1 && (e = 1), e > 0 ? (this.mediaElement.muted = !1, this.mediaElement.volume = e) : (this.mediaElement.muted = !0, this.mediaElement.volume = 0), this.mediaElement.volume
                    }
                }, {
                    key: "sendEventLog", value: function (e, t, i, n) {
                    }
                }, {
                    key: "sendAdClickLog", value: function (e) {
                        this._adplugin.sendCUM(e)
                    }
                }, {
                    key: "sendPauseAdCUM", value: function (e) {
                        H.default.sendPauseAdCUM(e)
                    }
                }, {
                    key: "sendPauseAdSUS", value: function (e) {
                        H.default.sendPauseAdSUS(e)
                    }
                }, {
                    key: "sendErrorLog", value: function (e, t) {
                        this.viewErrorCode = this._reporter.createViewCode();
                        var i = {};
                        i.errorType = e;
                        var n = this.mediaElement.src || "";
                        n.indexOf("m3u8") > -1 ? (i.m3u8Url = n, i.cdnUrl = "") : (i.cdnUrl = n, i.m3u8Url = ""), i.upsUrl = encodeURIComponent(this._upsInfo.upsUrl), i.errorCode = t || "", i.currentTime = this.currentTime, this._reporter.sendErrorLog(this.viewErrorCode, i)
                    }
                }, {
                    key: "sendGoldLog", value: function (e, t, i, n) {
                        this._reporter.sendGoldLog(e, t, i, n)
                    }
                }, {
                    key: "upsDataError", value: function (e) {
                        C.default.i(this.TAG, "extupsDataError")
                    }
                }, {
                    key: "upsDataFail", value: function (e) {
                        C.default.i(this.TAG, "extupsDataFail")
                    }
                }, {
                    key: "upsDataReady", value: function (e) {
                        C.default.i(this.TAG, "extupsDataReady")
                    }
                }, {
                    key: "upsDataSuccess", value: function (e) {
                        C.default.i(this.TAG, "upsDataSuccess")
                    }
                }, {
                    key: "onPlay", value: function (e) {
                    }
                }, {
                    key: "onPause", value: function (e) {
                    }
                }, {
                    key: "onEnded", value: function (e) {
                    }
                }, {
                    key: "onPlaying", value: function (e) {
                    }
                }, {
                    key: "onError", value: function (e) {
                    }
                }, {
                    key: "onCanplay", value: function (e) {
                    }
                }, {
                    key: "onTimeupdate", value: function (e, t) {
                    }
                }, {
                    key: "onLoadStart", value: function (e) {
                    }
                }, {
                    key: "onLoadeddata", value: function (e) {
                    }
                }, {
                    key: "onLoadedmetaData", value: function (e) {
                    }
                }, {
                    key: "onAbort", value: function (e) {
                    }
                }, {
                    key: "onStalled", value: function (e) {
                    }
                }, {
                    key: "onSuspend", value: function (e) {
                    }
                }, {
                    key: "onWaiting", value: function (e) {
                    }
                }, {
                    key: "onVolumeChange", value: function (e) {
                    }
                }, {
                    key: "onSeeking", value: function (e) {
                    }
                }, {
                    key: "onSeeked", value: function (e) {
                    }
                }, {
                    key: "onDurationChange", value: function (e) {
                    }
                }, {
                    key: "onProgress", value: function (e) {
                    }
                }, {
                    key: "onRateChange", value: function (e) {
                    }
                }, {
                    key: "adDataOk", value: function (e, t) {
                        C.default.i(this.TAG, "adDataOk|||" + t)
                    }
                }, {
                    key: "pauseAdDataOk", value: function (e) {
                    }
                }, {
                    key: "adDataError", value: function (e) {
                        C.default.i(this.TAG, "adDataError:" + e)
                    }
                }, {
                    key: "onAdTimeUpdate", value: function (e, t, i, n) {
                    }
                }, {
                    key: "onAdStartPlay", value: function (e, t) {
                        C.default.i(this.TAG, "onAdStartPlay:" + t)
                    }
                }, {
                    key: "onAdEnd", value: function (e, t) {
                        C.default.i(this.TAG, "onAdEnd:" + t)
                    }
                }, {
                    key: "onAdPause", value: function (e, t) {
                        C.default.i(this.TAG, "onAdPause:" + t)
                    }
                }, {
                    key: "onAdError", value: function (e, t) {
                        C.default.i(this.TAG, "onAdError:" + t)
                    }
                }, {
                    key: "onAdLoading", value: function (e, t) {
                    }
                }, {
                    key: "onAdCanPlay", value: function (e, t) {
                    }
                }, {
                    key: "onAdReady", value: function (e, t) {
                    }
                }, {
                    key: "onAdTimeout", value: function (e, t) {
                    }
                }, {
                    key: "supportM3U8", value: function () {
                        return "" !== this.mediaElement.canPlayType("application/vnd.apple.mpegURL")
                    }
                }]), e
            }();
            e.YoukuH5PlayerCore = q, e.Browser = x.default, e.Log = C.default, e.util = D.default, e.EventEmitter = F.default
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (i, o) {
            s = [t], n = o, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e) {
            "use strict";
            Object.defineProperty(e, "__esModule", {value: !0});
            var t = {
                flv: "flv",
                mp4hd: "mp4",
                mp4hd2: "flv",
                mp4hd3: "flv",
                mp4hd2v2: "mp4",
                mp4hd3v2: "mp4",
                mp4sd: "mp4",
                "3gphd": "mp4",
                "3gp": "flv",
                flvhd: "flv"
            }, i = {
                "3gphd": "标清",
                flvhd: "标清",
                mp4sd: "标清",
                mp4hd: "高清",
                mp4hd2: "超清",
                mp4hd2v2: "超清",
                mp4hd3: "1080P",
                mp4hd3v2: "1080P"
            }, n = {}, s = {};
            e.VIDEOHD_MAP = t, e.SHOWHD_MAP = i, e.ACT_HD_MAP = s, e.LOW_MAP = n
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(0), i(1), i(24), i(22), i(8), i(5)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o) {
            "use strict";
            function r(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var u = r(t), l = r(i), d = r(s), h = r(a), c = r(o), f = function () {
                function e(t) {
                    (0, u.default)(this, e), this.TAG = "M3U8Player", this._currentTime = 0, this.m3u8Url = t.m3u8Url || [], this._tryTime = t.tryTime || -1, this._totalTime = t.totalTime || 0, this._firstflag = !0, this._frontAdTime = 0, this._endAdTime = 0, this._emitter = new d.default, this.adStatus = !0, this._ifEmitPause = !1, this._e = {
                        onPlay: this._onPlay.bind(this),
                        onPause: this._onPause.bind(this),
                        onEnded: this._onEnd.bind(this),
                        onCanPlay: this._onCanplay.bind(this),
                        onTimeUpdate: this._onTimeupdate.bind(this),
                        onError: this._onError.bind(this),
                        onLoadeddata: this._onLoadeddata.bind(this),
                        onLoadedmetaData: this._onLoadedmetaData.bind(this),
                        onAbort: this._onAbort.bind(this),
                        onStalled: this._onStalled.bind(this),
                        onSuspend: this._onSuspend.bind(this),
                        onWaiting: this._onWaiting.bind(this),
                        onVolumeChange: this._onVolumeChange.bind(this),
                        onPlaying: this._onPlaying.bind(this),
                        onSeeked: this._onSeeked.bind(this),
                        onSeeking: this._onSeeking.bind(this),
                        onDurationChange: this._onDurationChange.bind(this),
                        onProgress: this._onProgress.bind(this),
                        onRateChange: this._onRateChange.bind(this),
                        onLoadStart: this._onLoadStart.bind(this)
                    }
                }

                return (0, l.default)(e, [{
                    key: "destroy", value: function () {
                        this._currentTime = 0, this._segs = [], this._tryTime = -1, this._totalTime = 0, this._firstflag = !0, this._mediaElement && this._mediaElement.pause(), this._ifEmitPause = !1, this.dettachMediaElement()
                    }
                }, {
                    key: "on", value: function (e, t) {
                        this._emitter.addListener(e, t)
                    }
                }, {
                    key: "off", value: function (e, t) {
                        this._emitter.removeListener(e, t)
                    }
                }, {
                    key: "attachMediaElement", value: function (e) {
                        if (!this.ifEvent) {
                            h.default.i(this.TAG, this.ifEvent), this.ifEvent = !0, this._mediaElement = e, this._mediaElement.poster = "";
                            for (var t in n.VIDEO_EVENTS)c.default.addEventListenerHander(this._mediaElement, t, this._e[n.VIDEO_EVENTS[t]])
                        }
                    }
                }, {
                    key: "dettachMediaElement", value: function () {
                        if (this.ifEvent = !1, this._mediaElement) {
                            for (var e in n.VIDEO_EVENTS)c.default.removeEventListenerHander(this._mediaElement, e, this._e[n.VIDEO_EVENTS[e]]);
                            this._mediaElement && (this._mediaElement.src = "", this._mediaElement.removeAttribute("src"), this._mediaElement = null)
                        }
                    }
                }, {
                    key: "loadExtend", value: function (e) {
                        this._firstflag && "" !== this._mediaElement.src || (this.m3u8Url = e.m3u8Url, this._mediaElement.src = this.m3u8Url)
                    }
                }, {
                    key: "load", value: function (e) {
                        e.time && (this._currentTime = e.time), e.totalTime && (this._totalTime = e.totalTime), e.frontAdTime ? this._frontAdTime = e.frontAdTime : this._frontAdTime = 0, e.endAdTime && (this._endAdTime = _mediaElement.endAdTime), this._firstflag && (this._currentTime = 0), this._ifEmitPause = !0, this.loadExtend(e), h.default.i(this.TAG, "m3u8Url:" + this._mediaElement.src + " _currentTime:" + this._currentTime + "   _frontAdTime:" + this._frontAdTime), this._currentTime > 0 && (this.firstTime = this._currentTime + this._frontAdTime, this.seek(this._currentTime)), 0 === this._currentTime && this._frontAdTime > 0 && this._onCanplay(null)
                    }
                }, {
                    key: "play", value: function () {
                        this.m3u8Url && this._mediaElement && (this._mediaElement.src || (this._mediaElement.src = this.m3u8Url, this._mediaElement.play()), this._mediaElement.paused && this._mediaElement.play())
                    }
                }, {
                    key: "pause", value: function () {
                        this.m3u8Url && this._mediaElement && this._mediaElement.pause()
                    }
                }, {
                    key: "replay", value: function () {
                        this.m3u8Url && this._mediaElement && (this._mediaElement.src = this.m3u8Url, this._currentTime = 0, this._firstflag = !0, this._frontAdTime = 0, this._mediaElement.currentTime = 0 + this._frontAdTime, this._mediaElement.play())
                    }
                }, {
                    key: "seek", value: function (e) {
                        this.m3u8Url && this._mediaElement && this._mediaElement.src && !(e < 0) && (0 === e && (e = .2), e >= this._totalTime && (e = this._totalTime - 1 > 0 ? this._totalTime - 1 : this._totalTime), e += this._frontAdTime, h.default.i(this.TAG, "Seek:" + e + "   _mediaElement.currentTime:" + this._mediaElement.currentTime + " _frontAdTime:" + this._frontAdTime), this._mediaElement.currentTime = e, this.play())
                    }
                }, {
                    key: "_setCurrentTime", value: function (e) {
                        try {
                            this._mediaElement.currentTime = e
                        } catch (i) {
                            var t = !1;
                            c.default.addEventListenerHander("canplay", function () {
                                t || (t = !0, this._mediaElement.currentTime = e)
                            })
                        }
                    }
                }, {
                    key: "_onPlay", value: function (e) {
                        this._ifEmitPause = !1, this.adStatus || this._mediaElement.currentTime < this._frontAdTime || (this._firstflag && (this._firstflag = !1), this._emitter.emit(n.VIDEO_EVENTS.play, e))
                    }
                }, {
                    key: "_onPause", value: function (e) {
                        if (!(this.adStatus || this._mediaElement.currentTime < this._frontAdTime))return this._ifEmitPause ? (h.default.d(this.TAG, "_onPause:_ifEmitPause" + this._ifEmitPause), void(this._ifEmitPause = !1)) : void this._emitter.emit(n.VIDEO_EVENTS.pause, e)
                    }
                }, {
                    key: "_onEnd", value: function (e) {
                        this.adStatus || this._mediaElement.currentTime < this._frontAdTime || (h.default.i(this.TAG, "_onEnd(e)" + this._mediaElement.currentTime), this._emitter.emit(n.VIDEO_EVENTS.ended, e))
                    }
                }, {
                    key: "_onCanplay", value: function (e) {
                        this.adStatus || this._mediaElement.currentTime < this._frontAdTime || (this.firstTime > 0 && (h.default.i(this.TAG + "  _onCanplay(e):this.firstTime:" + this.firstTime), this._mediaElement.currentTime = this.firstTime, this.firstTime = 0), this._emitter.emit(n.VIDEO_EVENTS.canplay, e))
                    }
                }, {
                    key: "_onTimeupdate", value: function (e) {
                        if (!(this.adStatus || this._mediaElement.currentTime < this._frontAdTime)) {
                            if (this._currentTime = this._mediaElement.currentTime - this._frontAdTime, this._currentTime >= this._totalTime)return this._mediaElement.pause(), this._ifEmitPause = !0, h.default.i(this.TAG, "trytime is out"), void this._onEnd(e);
                            this._emitter.emit(n.VIDEO_EVENTS.timeupdate, e, this._currentTime)
                        }
                    }
                }, {
                    key: "_onError", value: function (e) {
                        this.adStatus || this._emitter.emit(n.VIDEO_EVENTS.error, e)
                    }
                }, {
                    key: "_onLoadeddata", value: function (e) {
                        this.adStatus || this._mediaElement.currentTime < this._frontAdTime || this._emitter.emit(n.VIDEO_EVENTS.loadeddata, e)
                    }
                }, {
                    key: "_onLoadedmetaData", value: function (e) {
                        this.adStatus || this._mediaElement.currentTime < this._frontAdTime || this._emitter.emit(n.VIDEO_EVENTS.loadedmetadata, e)
                    }
                }, {
                    key: "_onLoadStart", value: function (e) {
                        this.adStatus || this._mediaElement.currentTime < this._frontAdTime || this._emitter.emit(n.VIDEO_EVENTS.loadstart, e)
                    }
                }, {
                    key: "_onAbort", value: function (e) {
                        this.adStatus || this._mediaElement.currentTime < this._frontAdTime || this._emitter.emit(n.VIDEO_EVENTS.abort, e)
                    }
                }, {
                    key: "_onStalled", value: function (e) {
                        this.adStatus || this._mediaElement.currentTime < this._frontAdTime || this._emitter.emit(n.VIDEO_EVENTS.stalled, e)
                    }
                }, {
                    key: "_onSuspend", value: function (e) {
                        this.adStatus || this._mediaElement.currentTime < this._frontAdTime || this._emitter.emit(n.VIDEO_EVENTS.suspend, e)
                    }
                }, {
                    key: "_onWaiting", value: function (e) {
                        this.adStatus || this._mediaElement.currentTime < this._frontAdTime || this._emitter.emit(n.VIDEO_EVENTS.waiting, e)
                    }
                }, {
                    key: "_onVolumeChange", value: function (e) {
                        this.adStatus || this._mediaElement.currentTime < this._frontAdTime || this._emitter.emit(n.VIDEO_EVENTS.volumechange, e)
                    }
                }, {
                    key: "_onPlaying", value: function (e) {
                        this.adStatus || this._mediaElement.currentTime < this._frontAdTime || this._emitter.emit(n.VIDEO_EVENTS.playing, e)
                    }
                }, {
                    key: "_onSeeked", value: function (e) {
                        this.adStatus || this._mediaElement.currentTime < this._frontAdTime || this._emitter.emit(n.VIDEO_EVENTS.seeked, e)
                    }
                }, {
                    key: "_onSeeking", value: function (e) {
                        this.adStatus || this._mediaElement.currentTime < this._frontAdTime || this._emitter.emit(n.VIDEO_EVENTS.seeking, e)
                    }
                }, {
                    key: "_onDurationChange", value: function (e) {
                        this.adStatus || this._mediaElement.currentTime < this._frontAdTime || (this._currentTime = this._mediaElement.currentTime - this._frontAdTime, this._emitter.emit(n.VIDEO_EVENTS.durationchange, e))
                    }
                }, {
                    key: "_onProgress", value: function (e) {
                        this.adStatus || this._mediaElement.currentTime < this._frontAdTime || this._emitter.emit(n.VIDEO_EVENTS.progress, e)
                    }
                }, {
                    key: "_onRateChange", value: function (e) {
                        this.adStatus || this._mediaElement.currentTime < this._frontAdTime || this._emitter.emit(n.VIDEO_EVENTS.ratechange, e)
                    }
                }]), e
            }();
            e.default = f
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (i, o) {
            s = [t], n = o, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e) {
            "use strict";
            Object.defineProperty(e, "__esModule", {value: !0});
            var t = {
                FRONT_AD_API: "//valf.atm.youku.com/vf",
                END_AD_API: "//valb.atm.youku.com/vb",
                MID_AD_API: "//valo.atm.youku.com/vo",
                STA_AD_API: "//valt.atm.youku.com/vt",
                PAUSE_AD_API: "//valp.atm.youku.com/vp"
            }, i = {
                FRONT_AD_API: "//mf.atm.youku.com/mf",
                END_AD_API: "//mb.atm.youku.com/mb",
                CONTENT_AD_API: "//mo.atm.youku.com/mo",
                STA_AD_API: "//mt.atm.youku.com/mt",
                PAUSE_AD_API: "//mp.atm.youku.com/mp"
            }, n = {IF_FRONT: !0, IF_MID: !0, IF_END: !0, IF_CONT: !0}, s = {
                FRONT: "front",
                END: "end",
                CONT: "contentad",
                STA: "standard",
                PAUSE: "pause"
            };
            e.YoukuAdApiPC = t, e.YoukuAdApiM = i, e.ADConfigM = n, e.AD_MAP = s
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(0), i(1), i(5)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n) {
            "use strict";
            function s(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var a = s(t), o = s(i), r = s(n), u = function () {
                function e(t) {
                    (0, a.default)(this, e), this.addata = t, this.curnum = 0
                }

                return (0, o.default)(e, [{
                    key: "changeNum", value: function (e) {
                        this.curnum = e
                    }
                }, {
                    key: "setData", value: function (e) {
                        this.addata = e
                    }
                }, {
                    key: "sendSUS", value: function (e) {
                        if (!(!this.addata || e < 0 || e >= this.addata.VAL.length)) {
                            var t = this.addata.VAL[e], i = t.SUS;
                            if (void 0 !== i) {
                                for (var n = 0; n < i.length; n++) {
                                    var s = i[n].U;
                                    r.default.sendlog(s)
                                }
                                this._loadBRS(t.BRS)
                            }
                        }
                    }
                }, {
                    key: "sendUnitedVTVC", value: function (e) {
                        if (this.addata) {
                            e += 2;
                            var t = this.addata.VAL[0], i = t.VTVC;
                            this._vtccache || (this._vtccache = []);
                            for (var n = null, s = 1e6, a = 1e5, o = 0; o < i.length; o++) {
                                var u = i[o].U, l = parseInt(i[o].T, 10), d = e - l;
                                d >= 0 && d < a && (a = d, n = u, s = l)
                            }
                            null != n && -1 === this._vtccache.indexOf(s) && (this._vtccache.push(s), debug.log("<b> vc = " + n + "</b>"), r.default.loadfile(n, "js"))
                        }
                    }
                }, {
                    key: "sendVC", value: function (e) {
                        if (!(!this.addata || e < 0 || e >= this.addata.VAL.length)) {
                            var t = this.addata.VAL[this.curnum];
                            if (void 0 !== t.VT) {
                                var i = t.VC;
                                loadjscssfile(i, "js")
                            }
                        }
                    }
                }, {
                    key: "sendSUS_", value: function (e) {
                        if (!(!this.addata || e < 0 || e >= this.addata.VAL.length)) {
                            var t = this.addata, i = this.curnum + 2, n = t["A" + i].SU, s = t["A" + i].ATMSU, a = t["A" + i].ISOSU;
                            r.default.sendlog(n), r.default.sendlog(s), r.default.sendlog(a)
                        }
                    }
                }, {
                    key: "sendSUE", value: function (e) {
                        if (!(!this.addata || e < 0 || e >= this.addata.VAL.length)) {
                            var t = this.addata.VAL[e], i = t.SUE;
                            if (void 0 !== i)for (var n = 0; n < i.length; n++) {
                                var s = i[n].U;
                                r.default.sendlog(s)
                            }
                        }
                    }
                }, {
                    key: "sendSU", value: function (e) {
                        if (this.addata) {
                            var t = this.addata.VAL[this.curnum], i = t.SU;
                            if (void 0 !== i) {
                                this._sucache || (this._sucache = []);
                                for (var n = 1e4, s = 1e6, a = 0; a < i.length; a++) {
                                    var o = (i[a].U, parseInt(i[a].T, 10)), u = e - o;
                                    u >= 0 && u < n && (n = u, s = o)
                                }
                                if (1e6 != s && -1 == this._sucache.indexOf(s)) {
                                    this._sucache.push(s);
                                    for (var l = 0; l < i.length; l++)parseInt(i[l].T, 10) == s && r.default.sendlog(i[l].U)
                                }
                            }
                        }
                    }
                }, {
                    key: "sendSU_", value: function (e) {
                        if (this.addata) {
                            //fix
                            //curnum += 2;
                            var t = this.addata["A" + curnum].MT;
                            if (t && e >= parseInt(t, 10)) {
                                var i = this.addata["A" + curnum].MU, n = this.addata["A" + curnum].CMU;
                                r.default.sendlog(i), r.default.sendlog(n)
                            }
                        }
                    }
                }, {
                    key: "sendCUM", value: function () {
                        if (this.addata) {
                            var e = this.addata.VAL[this.curnum], t = e.CUM;
                            if (void 0 !== t)for (var i = 0; i < t.length; i++) {
                                var n = t[i].U;
                                r.default.sendlog(n)
                            }
                        }
                    }
                }, {
                    key: "sendUnitedCUM", value: function (e) {
                        if (this.addata) {
                            var t = this.addata.VAL[0], i = t.CUM;
                            if (void 0 !== i && 0 !== i.length)for (var n = 0; n < i.length; n++)if (e < parseInt(i[n].T, 10)) {
                                for (var s = 0; s < (i[n].CUM || []).length; s++)r.default.sendlog(i[n].CUM[s].U);
                                break
                            }
                        }
                    }
                }, {
                    key: "_loadBRS", value: function () {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "";
                        (/^https/.test(e) || /^https/.test(location.href) && /^\/{2}:/.test(e)) && r.default.loadfile(e, "js")
                    }
                }], [{
                    key: "sendPauseAdCUM", value: function (e) {
                        var t = e.VAL[0].CUM;
                        if (t)for (var i = 0; i < t.length; i++)r.default.sendlog(t[i].U)
                    }
                }, {
                    key: "sendPauseAdSUS", value: function (e) {
                        var t = e.VAL[0].SUS;
                        if (t)for (var i = 0; i < t.length; i++)r.default.sendlog(t[i].U)
                    }
                }]), e
            }();
            e.default = u
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (i, o) {
            s = [t], n = o, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e) {
            "use strict";
            function t(e, t, i, n) {
                if ("string" == typeof e && (n = i, i = t, t = e, e = window), void 0 === i)return i = e.document.cookie.match(new RegExp("(?:\\s|^)" + t + "\\=([^;]*)")), i ? decodeURIComponent(i[1]) : null;
                n = n || {};
                var s, a = "";
                n.expires && (n.expires.constructor == Date ? s = n.expires : (s = new Date, s.setTime(s.getTime() + 24 * n.expires * 60 * 60 * 1e3)), a = "; expires=" + s.toGMTString());
                var o = n.path ? "; path=" + n.path : "", r = n.domain ? "; domain=" + n.domain : "", u = n.secure ? "; secure" : "";
                e.document.cookie = [t, "=", encodeURIComponent(i), a, o, r, u].join("")
            }

            Object.defineProperty(e, "__esModule", {value: !0}), e.default = t
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(0), i(1), i(8)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n) {
            "use strict";
            function s(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var a = s(t), o = s(i), r = s(n), u = function () {
                function e() {
                    (0, a.default)(this, e), this.TAG = "Live:Manager", this.__events = {}
                }

                return (0, o.default)(e, [{
                    key: "on", value: function (e, t) {
                        return this.__events[e] || (this.__events[e] = []), -1 == this.__events[e].indexOf(t) && "function" == typeof t && this.__events[e].push(t), this
                    }
                }, {
                    key: "fire", value: function (e) {
                        if (r.default.i(this.TAG, e), !this.__events || !this.__events[e])return void console.log(e + "的绑定函数不存在！");
                        for (var t = this.__events[e], i = 0, n = t.length, s = arguments.length, a = Array(s > 1 ? s - 1 : 0), o = 1; o < s; o++)a[o - 1] = arguments[o];
                        for (i; i < n; i++)t[i].apply(t, a);
                        return this
                    }
                }, {
                    key: "off", value: function (e, t) {
                        if (e || t || (this.__events = {}), e && !t && delete this.__events[e], e && t) {
                            var i = this.__events[e], n = i.indexOf(t);
                            n > -1 && i.splice(n, 1)
                        }
                        return this
                    }
                }]), e
            }();
            e.default = u
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(0), i(1)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i) {
            "use strict";
            function n(e) {
                return e && e.__esModule ? e : {default: e}
            }

            function s(e, t) {
                var i = t.clientX - e.clientX, n = t.clientY - e.clientY;
                return Math.sqrt(i * i + n * n)
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var a = n(t), o = n(i), r = function () {
                function e(t) {
                    (0, a.default)(this, e);
                    var i = this, n = function (e) {
                        var t = e[0];
                        2 === i.evtType ? i.preT0 && (i.sendEvt("drag", {
                            deltaX: t.clientX - i.preT0.clientX,
                            deltaY: t.clientY - i.preT0.clientY
                        }), i.preT0 = t) : (i.evtType = 1, i.preT0 ? s(i.preT0, t) > 10 ? (i.evtType = 2, i.sendEvt("drag", {
                            deltaX: t.clientX - i.preT0.clientX,
                            deltaY: t.clientY - i.preT0.clientY
                        }), i.preT0 = t) : e.length > 1 && (i.evtType = 3) : i.preT0 = t)
                    }, o = function () {
                        1 === i.evtType ? i.sendEvt("tap", null) : 2 === i.evtType && i.sendEvt("dragend", null), i.evtType = 0, i.preT0 = null
                    };
                    this.elem = t, this.elem.addEventListener("mousedown", function (e) {
                        1 !== e.buttons && 1 !== e.which || n([e])
                    }, !1), this.elem.addEventListener("mousemove", function (e) {
                        1 !== e.buttons && 1 !== e.which || n([e])
                    }, !1), this.elem.addEventListener("mouseup", function () {
                        o()
                    }, !1), this.elem.addEventListener("touchstart", function (e) {
                        n(e.touches)
                    }, !1), this.elem.addEventListener("touchmove", function (e) {
                        n(e.touches)
                    }, !1), this.elem.addEventListener("touchend", function (e) {
                        o(e.touches)
                    }, !1)
                }

                return (0, o.default)(e, [{
                    key: "sendEvt", value: function (e, t) {
                        var i = document.createEvent("Event");
                        i.initEvent(e, !0, !0), i.lgdata = t, this.elem.dispatchEvent(i)
                    }
                }]), e
            }();
            e.default = r
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(5)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t) {
            "use strict";
            function i(e, t, i) {
                e.timer && clearTimeout(e.timer), e.clearAttributes ? e.clearAttributes() : e.onload = e.onreadystatechange = e.onerror = null, delete window["HeyiCORS" + t]
            }

            function n() {
                var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                if (!e.url)return void console.warn("JSONP方法中url不能为null");
                var t = e.callback || "callback", n = e.data || {}, a = parseInt(e.time) || 1e4, o = "_call_" + s.default.randomString(6);
                n[t] = "HeyiCORS" + o;
                var r = s.default.urlParameter(n), u = e.url;
                u += (-1 === u.indexOf("?") ? "?" : "&") + r;
                var l = document.createElement("script");
                window["HeyiCORS" + o] = function (t) {
                    try {
                        "timeout" != l.jsonp && (l.jsonp = "success", e.success && e.success(t))
                    } catch (e) {
                        window.console.log(e)
                    }
                }, a && (l.timer = setTimeout(function () {
                    l.jsonp = "timeout", e.fail && e.fail({message: "timeout"})
                }, a)), l.onreadystatechange = l.onload = function () {
                    this.readyState && "loaded" != this.readyState && "complete" != this.readyState || ("timeout" !== l.jsonp && "success" != l.jsonp && e.fail && e.fail({message: "fail"}), i(l, o))
                }, l.onerror = function () {
                    l.jsonp = "error", i(l, o), e.fail && e.fail({message: "error"})
                }, l.src = u, document.getElementsByTagName("head")[0].appendChild(l)
            }

            Object.defineProperty(e, "__esModule", {value: !0}), e.default = n;
            var s = function (e) {
                return e && e.__esModule ? e : {default: e}
            }(t)
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(2), i(0), i(1), i(4), i(3), i(6)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o) {
            "use strict";
            function r(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var u = r(t), l = r(i), d = r(n), h = r(s), c = r(a), f = r(o), v = function (e) {
                function t(e, i, n) {
                    (0, l.default)(this, t);
                    var s = (0, h.default)(this, (t.__proto__ || (0, u.default)(t)).call(this, e, i, n));
                    return s.dom = s.selector.querySelector("." + n + "_lock"), s.liveLockBtn = s.dom.querySelector("." + n + "_lock_btn"), s.liveLockDes = s.dom.querySelector("." + n + "_lock_des"), s.liveLockErrorDes = s.dom.querySelector("." + n + "_lock_et"), s.domEvent(), s
                }

                return (0, c.default)(t, e), (0, d.default)(t, [{
                    key: "lockScreen", value: function (e) {
                        var t = "", i = "";
                        switch (this.type = e, this.liveLockBtn.style.display = "inline-block", this.liveLockErrorDes.innerHTML = e, this.removeClass(this.liveLockBtn, "youku_vip_pay_btn"), e) {
                            case"nosupport":
                                t = "对不起，当前客户端暂不支持播放", i = "前往优酷app观看";
                                break;
                            case 1001:
                                t = "抱歉，您还不是优酷会员", i = "加入会员 立即体验";
                                break;
                            case 100101:
                            case 100102:
                                t = "抱歉，您还不是优酷体育会员", i = "加入会员 立即体验";
                                break;
                            case 100103:
                                t = "抱歉，您还不是优酷会员", i = "加入会员 立即体验";
                                break;
                            case 100104:
                                t = "抱歉，您还不能享用1080P会员尊享权限", i = "加入会员 立即体验";
                                break;
                            case 40001:
                                t = "直播在线观看人数较多，请您稍后重试", i = "  重试  ";
                                break;
                            case 40002:
                                t = "抱歉，该地域无法观看此直播，请观看其他直播", i = "  观看其他直播  ";
                                break;
                            case 1111:
                                t = "请您到优酷APP观看完整版", i = "  前往优酷APP  ";
                                break;
                            case 30650:
                                t = "当前直播需要登录观看", i = "  登录  ";
                                break;
                            case 30306:
                                t = "抱歉，直播走丢了，请稍后重试", i = "  重试  ";
                                break;
                            case 30202:
                                t = "抱歉，该直播无权观看，请观看其他直播", i = "  观看其他直播  ";
                                break;
                            case 30201:
                                t = "这个内容太火爆啦，请稍后重试", i = "  重试  ";
                                break;
                            case 30100:
                            case 400:
                            case 404:
                            case 403:
                            default:
                                t = "抱歉，直播走丢了，请稍后重试", i = "  重试  "
                        }
                        this.liveLockDes.innerHTML = t, this.liveLockBtn.innerHTML = i, this.show()
                    }
                }, {
                    key: "domEvent", value: function () {
                        var e = this, t = function (t) {
                            e.EventManager.fire("lock:open", {type: e.type})
                        };
                        this.liveLockBtn.addEventListener("click", t, !1)
                    }
                }]), t
            }(f.default);
            e.default = v
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(2), i(0), i(1), i(4), i(3), i(6)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o) {
            "use strict";
            function r(e) {
                return e && e.__esModule ? e : {default: e}
            }

            function u(e, t) {
                return e.currentStyle ? e.currentStyle[t] : window.getComputedStyle(e, null)[t]
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var l = r(t), d = r(i), h = r(n), c = r(s), f = r(a), v = r(o), p = function (e) {
                function t(e, i, n, s, a, o) {
                    return (0, d.default)(this, t), (0, c.default)(this, (t.__proto__ || (0, l.default)(t)).call(this, e, i, n, s, a, o))
                }

                return (0, f.default)(t, e), (0, h.default)(t, [{
                    key: "setUp", value: function (e) {
                        this.dom = this.selector.querySelector("." + e[0] + "_logo"), this.waterMark = e[1], this.now = e[2], this.cha = e[3], this.full = 3, this.left = 0, this.top = 0, this.width = this.selector.clientWidth, this.height = this.selector.clientHeight, this.per = 1, this.waterQueueDom = [], this.wposition = [], this.addEvent()
                    }
                }, {
                    key: "addEvent", value: function () {
                        var e = this;
                        window.addEventListener("resize", function (t) {
                            e.per = e.selector.clientWidth / e.width, e.width = e.selector.clientWidth, e.height = e.selector.clientHeight, e.waterMark.forEach(function (t, i) {
                                t.autoScale && e.waterQueueDom.length && e.waterQueueDom.forEach(function (t, i) {
                                    t.div.style.width = parseInt(u(t.div, "width")) * e.per + "px", t.div.style.height = parseInt(u(t.div, "height")) * e.per + "px", t.div.style[t.po1] = parseInt(u(t.div, t.po1) || 1) * e.per + "px", t.div.style[t.po2] = parseInt(u(t.div, t.po2) || 1) * e.per + "px"
                                })
                            })
                        }, !1)
                    }
                }, {
                    key: "change", value: function (e) {
                        this.waterQueueDom.forEach(function (t) {
                            0 != t.mode && (t.div.style.display = t.mode != e ? "none" : "block")
                        })
                    }
                }, {
                    key: "waterController", value: function (e) {
                        var t = this, i = e.width, n = e.height, s = i / n, a = 0, o = 0;
                        this.waterMark.forEach(function (e, i) {
                            1 == e.refWnd && (t.width / t.height > s ? a = Math.abs(t.width - t.height * s) / 2 : t.width / t.height < s && (o = Math.abs(t.height - t.width / s) / 2));
                            var n = e.autoScale;
                            t.wposition.push({
                                left: a,
                                top: o,
                                autoScale: n
                            }), t.waterQueueDom.push(t.createDom(e)), t.waterDisplay(e, i)
                        })
                    }
                }, {
                    key: "waterCount", value: function (e, t) {
                        var i = this, n = e[0];
                        if (n) {
                            var s = n.start || 0, a = n.duration || 0, o = Date.now(), r = this.waterQueueDom[t].mode;
                            if (o - this.now >= s)if (0 == a) {
                                if (o - this.now > s)return this.full != r && 0 != r || (this.waterQueueDom[t].div.style.display = "block"), void this.setWaterPosition(n, t);
                                e.shift()
                            } else o - this.now >= s + a ? (this.waterQueueDom[t].div.style.display = "none", e.shift()) : (this.full != r && 0 != r || (this.waterQueueDom[t].div.style.display = "block"), this.setWaterPosition(n, t));
                            setTimeout(function () {
                                i.waterCount(e, t)
                            }, 1e3)
                        }
                    }
                }, {
                    key: "setWaterPosition", value: function (e, t) {
                        var i = this.waterQueueDom[t];
                        i.div.style.width = e.width + "px", i.div.style.height = e.height + "px", i.div.style[i.po1] = e.posX + this.wposition[t].left + "px", i.div.style[i.po2] = e.posY + this.wposition[t].top + "px"
                    }
                }, {
                    key: "createDom", value: function (e) {
                        var t = null;
                        if (t = document.createElement("div"), t.style.display = "none", 1 != e.rsType) {
                            var i = new Image;
                            i.src = e.rsUrl, t.appendChild(i)
                        }
                        1 == e.rsType && (t.innerHTML = e.text, t.style.fontSize = (e.textSize ? e.textSize : 16) + "px", t.style.color = e.textColor ? e.textColor : "#fff"), t.style.opacity = 1 - (e.alpha || 0), t.style.position = "absolute", this.dom.appendChild(t);
                        var n = void 0, s = void 0;
                        switch (e.refCoord) {
                            case 0:
                                n = "left", s = "top";
                                break;
                            case 1:
                                n = "right", s = "top";
                                break;
                            case 2:
                                n = "right", s = "bottom";
                                break;
                            case 3:
                                n = "left", s = "bottom"
                        }
                        var a = e.displayMode;
                        return e.displayMode > 0 && e.displayMode < 3 && (a = 1), {div: t, po1: n, po2: s, mode: a}
                    }
                }, {
                    key: "waterDisplay", value: function (e, t) {
                        0 != e.rsType && 2 != e.rsType || e.rsUrl && this.waterCount(e.displayDTOS, t), 1 == e.rsType && e.text && this.waterCount(e.displayDTOS, t)
                    }
                }]), t
            }(v.default);
            e.default = p
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(2), i(0), i(1), i(4), i(35), i(3), i(6), i(23)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o, r, u) {
            "use strict";
            function l(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var d = l(t), h = l(i), c = l(n), f = l(s), v = l(a), p = l(o), m = l(r), y = function (e) {
                function t() {
                    return (0, h.default)(this, t), (0, f.default)(this, (t.__proto__ || (0, d.default)(t)).apply(this, arguments))
                }

                return (0, p.default)(t, e), (0, c.default)(t, [{
                    key: "setUp", value: function () {
                        (0, v.default)(t.prototype.__proto__ || (0, d.default)(t.prototype), "render", this).call(this, "div", {
                            className: "heyi_player_ad_pause",
                            style: "width:100%;height:100%;position:absolute;left:0;display:none;z-index:800;overflow:hidden;",
                            innerHTML: '\n            <div class="heyi_player_ad_container" style="position:relative;height:100%;text-align: center;">\n                <a href="javascript:;" style="width:15px;height:15px;position:absolute;right:0;top:0;display:block;padding:20px;z-index:10;">\n                        <b style="width:15px;height:15px;display:block;background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAPCAMAAAAMCGV4AAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAATlBMVEUAAAC7u7u7u7u7u7u7u7u7u7uxsbFpaWm7u7uOjo4AAACvr68AAACxsbEoKCgAAAC0tLS6uroAAAAAAACzs7MqKiqvr6+AgIAEBAQAAAAaDEZ0AAAAGXRSTlMABZ3XMublWNnPBead5ubX5d7ZMube5ebmf2jNHgAAAAFiS0dEAIgFHUgAAAAJcEhZcwAACxIAAAsSAdLdfvwAAABySURBVAjXRY7bEoMgDAUPl4AiLVpQ+/9f2ubCmLfdyWQD50OETAzeAZ4oZcGFaC0IpIKRtoqYRAi+3g3ILPZD8NNh4sG/2BnHRMRD+Jy46L5mFceYwkJnMhHsslSuzv9qiMXd4NbNQvm6vxUotVmot1p+dyYGFO2RSFQAAAAASUVORK5CYII=);overflow:hidden"></b></a>\n                <span style="vertical-align: middle;position:relative;display:block;"></span>\n            </div>'
                        }), this.domEvent()
                    }
                }, {
                    key: "setImage", value: function (e, t, i) {
                        this.setSize(t, i), this.span.style.background = "#000 url(" + e + ") no-repeat center center", this.span.style.backgroundSize = "contain"
                    }
                }, {
                    key: "setSize", value: function () {
                        this.span.style.width = "100%", this.span.style.height = "100%", this.dom.style.left = "0", this.dom.style.top = "0"
                    }
                }, {
                    key: "setInfo", value: function (e) {
                        this.info = e
                    }
                }, {
                    key: "domEvent", value: function () {
                        var e = this;
                        this.close = this.dom.querySelectorAll("a")[0], this.span = this.dom.querySelectorAll("span")[0];
                        var i = function (t) {
                            e.hide(t)
                        }, n = function (i) {
                            t.sendPauseAdCUM(e.info), e.clickImage(i)
                        };
                        this.close.addEventListener("click", i, !1), this.span.addEventListener("click", n, !1)
                    }
                }, {
                    key: "clickImage", value: function () {
                        window.open(this.info.VAL[0].CU)
                    }
                }, {
                    key: "loadVC", value: function (e) {
                        this.setInfo(e), this.setImage(e.VAL[0].RS, e.VAL[0].W, e.VAL[0].H), t.sendPauseAdSUS(e)
                    }
                }], [{
                    key: "sendPauseAdSUS", value: function (e) {
                        var t = e.VAL[0].SUS;
                        if (t)for (var i = 0; i < t.length; i++)(0, u.sendMessage)(t[i].U)
                    }
                }, {
                    key: "sendPauseAdCUM", value: function (e) {
                        var t = e.VAL[0].CUM;
                        if (t)for (var i = 0; i < t.length; i++)(0, u.sendMessage)(t[i].U)
                    }
                }]), t
            }(m.default);
            e.default = y
        })
    }, function (e, t, i) {
        e.exports = {default: i(128), __esModule: !0}
    }, function (e, t, i) {
        "use strict";
        t.__esModule = !0;
        var n = i(65), s = function (e) {
            return e && e.__esModule ? e : {default: e}
        }(n);
        t.default = function (e, t, i) {
            return t in e ? (0, s.default)(e, t, {
                value: i,
                enumerable: !0,
                configurable: !0,
                writable: !0
            }) : e[t] = i, e
        }
    }, function (e, t, i) {
        "use strict";
        function n(e) {
            return e && e.__esModule ? e : {default: e}
        }

        t.__esModule = !0;
        var s = i(121), a = n(s), o = i(120), r = n(o), u = "function" == typeof r.default && "symbol" == typeof a.default ? function (e) {
            return typeof e
        } : function (e) {
            return e && "function" == typeof r.default && e.constructor === r.default && e !== r.default.prototype ? "symbol" : typeof e
        };
        t.default = "function" == typeof r.default && "symbol" === u(a.default) ? function (e) {
            return void 0 === e ? "undefined" : u(e)
        } : function (e) {
            return e && "function" == typeof r.default && e.constructor === r.default && e !== r.default.prototype ? "symbol" : void 0 === e ? "undefined" : u(e)
        }
    }, function (e, t, i) {
        var n = i(135);
        e.exports = function (e, t, i) {
            if (n(e), void 0 === t)return e;
            switch (i) {
                case 1:
                    return function (i) {
                        return e.call(t, i)
                    };
                case 2:
                    return function (i, n) {
                        return e.call(t, i, n)
                    };
                case 3:
                    return function (i, n, s) {
                        return e.call(t, i, n, s)
                    }
            }
            return function () {
                return e.apply(t, arguments)
            }
        }
    }, function (e, t, i) {
        var n = i(16), s = i(10).document, a = n(s) && n(s.createElement);
        e.exports = function (e) {
            return a ? s.createElement(e) : {}
        }
    }, function (e, t, i) {
        e.exports = !i(13) && !i(20)(function () {
                return 7 != Object.defineProperty(i(69)("div"), "a", {
                        get: function () {
                            return 7
                        }
                    }).a
            })
    }, function (e, t, i) {
        var n = i(36);
        e.exports = Object("z").propertyIsEnumerable(0) ? Object : function (e) {
            return "String" == n(e) ? e.split("") : Object(e)
        }
    }, function (e, t, i) {
        "use strict";
        var n = i(28), s = i(14), a = i(77), o = i(21), r = i(27), u = i(142), l = i(43), d = i(75), h = i(11)("iterator"), c = !([].keys && "next" in [].keys()), f = function () {
            return this
        };
        e.exports = function (e, t, i, v, p, m, y) {
            u(i, t, v);
            var _, g, k, E = function (e) {
                if (!c && e in w)return w[e];
                switch (e) {
                    case"keys":
                    case"values":
                        return function () {
                            return new i(this, e)
                        }
                }
                return function () {
                    return new i(this, e)
                }
            }, A = t + " Iterator", T = "values" == p, b = !1, w = e.prototype, S = w[h] || w["@@iterator"] || p && w[p], P = S || E(p), L = p ? T ? E("entries") : P : void 0, I = "Array" == t ? w.entries || S : S;
            if (I && (k = d(I.call(new e))) !== Object.prototype && k.next && (l(k, A, !0), n || "function" == typeof k[h] || o(k, h, f)), T && S && "values" !== S.name && (b = !0, P = function () {
                    return S.call(this)
                }), n && !y || !c && !b && w[h] || o(w, h, P), r[t] = P, r[A] = f, p)if (_ = {
                    values: T ? P : E("values"),
                    keys: m ? P : E("keys"),
                    entries: L
                }, y)for (g in _)g in w || a(w, g, _[g]); else s(s.P + s.F * (c || b), t, _);
            return _
        }
    }, function (e, t, i) {
        var n = i(32)("meta"), s = i(16), a = i(15), o = i(17).f, r = 0, u = Object.isExtensible || function () {
                return !0
            }, l = !i(20)(function () {
            return u(Object.preventExtensions({}))
        }), d = function (e) {
            o(e, n, {value: {i: "O" + ++r, w: {}}})
        }, h = function (e, t) {
            if (!s(e))return "symbol" == typeof e ? e : ("string" == typeof e ? "S" : "P") + e;
            if (!a(e, n)) {
                if (!u(e))return "F";
                if (!t)return "E";
                d(e)
            }
            return e[n].i
        }, c = function (e, t) {
            if (!a(e, n)) {
                if (!u(e))return !0;
                if (!t)return !1;
                d(e)
            }
            return e[n].w
        }, f = function (e) {
            return l && v.NEED && u(e) && !a(e, n) && d(e), e
        }, v = e.exports = {KEY: n, NEED: !1, fastKey: h, getWeak: c, onFreeze: f}
    }, function (e, t, i) {
        var n = i(76), s = i(38).concat("length", "prototype");
        t.f = Object.getOwnPropertyNames || function (e) {
                return n(e, s)
            }
    }, function (e, t, i) {
        var n = i(15), s = i(47), a = i(44)("IE_PROTO"), o = Object.prototype;
        e.exports = Object.getPrototypeOf || function (e) {
                return e = s(e), n(e, a) ? e[a] : "function" == typeof e.constructor && e instanceof e.constructor ? e.constructor.prototype : e instanceof Object ? o : null
            }
    }, function (e, t, i) {
        var n = i(15), s = i(18), a = i(137)(!1), o = i(44)("IE_PROTO");
        e.exports = function (e, t) {
            var i, r = s(e), u = 0, l = [];
            for (i in r)i != o && n(r, i) && l.push(i);
            for (; t.length > u;)n(r, i = t[u++]) && (~a(l, i) || l.push(i));
            return l
        }
    }, function (e, t, i) {
        e.exports = i(21)
    }, function (e, t, i) {
        "use strict";
        var n = i(148)(!0);
        i(72)(String, "String", function (e) {
            this._t = String(e), this._i = 0
        }, function () {
            var e, t = this._t, i = this._i;
            return i >= t.length ? {value: void 0, done: !0} : (e = n(t, i), this._i += e.length, {value: e, done: !1})
        })
    }, function (e, t, i) {
        i(153);
        for (var n = i(10), s = i(21), a = i(27), o = i(11)("toStringTag"), r = "CSSRuleList,CSSStyleDeclaration,CSSValueList,ClientRectList,DOMRectList,DOMStringList,DOMTokenList,DataTransferItemList,FileList,HTMLAllCollection,HTMLCollection,HTMLFormElement,HTMLSelectElement,MediaList,MimeTypeArray,NamedNodeMap,NodeList,PaintRequestList,Plugin,PluginArray,SVGLengthList,SVGNumberList,SVGPathSegList,SVGPointList,SVGStringList,SVGTransformList,SourceBufferList,StyleSheetList,TextTrackCueList,TextTrackList,TouchList".split(","), u = 0; u < r.length; u++) {
            var l = r[u], d = n[l], h = d && d.prototype;
            h && !h[o] && s(h, o, l), a[l] = a.Array
        }
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(9), i(90), i(5)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n) {
            "use strict";
            function s(e) {
                return e && e.__esModule ? e : {default: e}
            }

            function a(e) {
                var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {}, i = {};
                window.HeyiCORS = {};
                for (var n = document.querySelectorAll(e), s = 0, a = n.length; s < a; s++) {
                    var o = {};
                    n[s].style.width = "100%", n[s].style.height = "100%", n[s].style.position = "relative";
                    for (var l in t)Array.isArray(t[l]) && (o[l] = t[l][s]);
                    i[s] = new u.default(n[s], (0, r.default)({}, t, o))
                }
                return i.length = n.length, i
            }

            function o(e) {
                var t = l.default.QS() || {};
                return ["hidecontrol", "autoplay", "lowhd", "refer", "withoutfull"].forEach(function (i) {
                    t[i] && (e[i] = t[i] || "")
                }), a(e.target, e)
            }

            Object.defineProperty(e, "__esModule", {value: !0}), e.default = o;
            var r = s(t), u = s(i), l = s(n)
        })
    }, function (e, t, i) {
        "use strict";
        function n(e) {
            return e && "object" == typeof e && "default" in e ? e.default : e
        }

        function s() {
            var e = g.match(/Chrom(e|ium)\/([0-9]+)\./i);
            return !!e && parseInt(e[2], 10)
        }

        function a(e) {
            return e < 10 ? "0" + e : e
        }

        function o(e, t) {
            var i = Object.assign({}, N, t), n = document.createElement("video"), s = !0, a = !1, o = void 0;
            try {
                for (var r, u = Object.keys(i)[Symbol.iterator](); !(s = (r = u.next()).done); s = !0) {
                    var l = r.value;
                    if ("style" === l && "object" === I(i.style)) {
                        var d = i.style, h = !0, c = !1, f = void 0;
                        try {
                            for (var v, p = Object.keys(d)[Symbol.iterator](); !(h = (v = p.next()).done); h = !0) {
                                var m = v.value;
                                n.style[m] = d[m]
                            }
                        } catch (e) {
                            c = !0, f = e
                        } finally {
                            try {
                                !h && p.return && p.return()
                            } finally {
                                if (c)throw f
                            }
                        }
                    } else {
                        var y = i[l];
                        y && n.setAttribute(l, y)
                    }
                    n.setAttribute("webkit-playsinline", !0), n.setAttribute("playsinline", !0)
                }
            } catch (e) {
                a = !0, o = e
            } finally {
                try {
                    !s && u.return && u.return()
                } finally {
                    if (a)throw o
                }
            }
            return "object" === (void 0 === e ? "undefined" : I(e)) && e.setAttribute && e.appendChild(n), n
        }

        function r(e) {
            return e = Math.round(e), [parseInt(e / 3600), parseInt(e % 3600 / 60), e % 60].map(function (e) {
                return a(e)
            }).join(":")
        }

        function u(e, t) {
            var i = "player-stat-" + Math.floor(1e4 * Math.random()), n = document.createElement("img");
            t && n.addEventListener("error", t, !1), n.src = "" + e, n.className = i
        }

        function l(e, t) {
            var i = null;
            "js" === t ? (i = document.createElement("script"), i.setAttribute("type", "text/javascript"), i.setAttribute("src", e)) : "css" === t && (i = document.createElement("link"), i.setAttribute("rel", "stylesheet"), i.setAttribute("type", "text/css"), i.setAttribute("href", e)), void 0 !== i && document.getElementsByTagName("head")[0].appendChild(i)
        }

        function d(e) {
            var t = [];
            for (var i in e)t.push(i + "=" + e[i]);
            return t.join("&")
        }

        function h(e, t) {
            e && (e.style.display = t || "block")
        }

        function c(e) {
            e && (e.style.display = "none")
        }

        function f(e, t) {
            if (e.classList) e.classList.add(t); else {
                var i = e.className.split(" ");
                if (i.indexOf(t) > -1)return;
                i.push(t), e.className = i.join(" ")
            }
        }

        function v(e, t) {
            if (e.classList) e.classList.remove(t); else {
                var i = e.className.split(" ");
                if (-1 === i.indexOf(t))return;
                for (var n = -1, s = 0, a = i.length; s < a; s++)i[s] === t && (n = s);
                n > -1 && i.splice(n, 1), e.className = i.join(" ")
            }
        }

        function p(e) {
            if (e) {
                var t = 0, i = [], n = [], s = [], a = [], o = {};
                for (var r in e)"VAL" !== r && (o[r] = e[r]);
                o.VAL = [];
                for (var u = e.VAL || [], l = 0, d = 0; d < u.length; d++)if (2 !== parseInt(u[d].VT)) {
                    if (null !== u[d].RS && "" !== u[d].RS.trim() && null !== u[d].VID && null !== u[d].VQT) {
                        var h = {};
                        h.F1 = u[d].BRS, h.CU = u[d].CU;
                        var c = {};
                        c.src = u[d].RS, c.seconds = parseInt(u[d].AL), c.startTime = t, c.ie = u[d].IE, c.tryCount = 0, o.VAL.push(u[d]), s.push(c), n.push(parseInt(u[d].AL)), t += u[d].AL, c.endTime = t, a.push(h), h.F1 && (l += 1)
                    }
                } else u[d].pos_ = d - 1 - i.length, i.push(u[d]);
                return o.pipCount = l, o.urls = s, o.seconds = n, o.vtvc = i, o.totalTime = t, o.index = 0, o.pipList = a, o
            }
        }

        function m(e) {
            var t = e.container;
            q.init(e.video);
            var i = q.register(e.video.id, "layers", z, {container: t, attr: {role: "Layers"}});
            (P.isIOS || P.isAndroid) && f(t, "mobile-ui");
            var n = {
                getContainer: function () {
                    return t
                }, setTheme: function (e) {
                    f(t, e)
                }, removeTheme: function (e) {
                    v(t, e)
                }, registerComponent: function (e, i, n) {
                    n.container || (n.container = t), q.register(n.video.id, e, i, n)
                }, unRegisterComponent: function (t) {
                    q.unRegister(e.video.id, t)
                }, getComponent: function (t) {
                    return q.findComponent(e.video.id, t)
                }, Component: Y, switchLayer: function (e) {
                    i.switch(e)
                }, getLayer: function (e) {
                    return i.getLayer(e)
                }, appendLayer: function (e, t) {
                    return i.append(e, t)
                }, appendCss: function (e) {
                    var t = document.createElement("style");
                    t.type = "text/css", t.styleSheet ? t.styleSheet.cssText = e : t.appendChild(document.createTextNode(e)), document.getElementsByTagName("head")[0].appendChild(t)
                }, setStyle: function (e, i) {
                    if ("string" == typeof e)return t.style[e] = i;
                    if ("object" === (void 0 === e ? "undefined" : I(e))) {
                        var n = e, s = !0, a = !1, o = void 0;
                        try {
                            for (var r, u = Object.keys(n)[Symbol.iterator](); !(s = (r = u.next()).done); s = !0) {
                                var l = r.value;
                                t.style[l] = n[l]
                            }
                        } catch (e) {
                            a = !0, o = e
                        } finally {
                            try {
                                !s && u.return && u.return()
                            } finally {
                                if (a)throw o
                            }
                        }
                    }
                }, reRender: function () {
                    q.reRender()
                }
            };
            if (e.ui) {
                var s = !0, a = !1, o = void 0;
                try {
                    for (var r, u = Object.keys(e.ui)[Symbol.iterator](); !(s = (r = u.next()).done); s = !0) {
                        var l = r.value, d = n.getComponent(l);
                        d && "object" === I(e.ui[l]) && d.setStyle(e.ui[l])
                    }
                } catch (e) {
                    a = !0, o = e
                } finally {
                    try {
                        !s && u.return && u.return()
                    } finally {
                        if (a)throw o
                    }
                }
            }
            return e.theme && n.setTheme(e.theme), "object" === I(e.layers) && Object.keys(e.layers).length > 0 && Object.keys(e.layers).forEach(function (t) {
                n.appendLayer(t, e.layers[t])
            }), Array.isArray(e.icons) && e.icons.forEach(function (e) {
                var t = e.component;
                n.insertIcon(e.name, t, e.args, e.parentControl)
            }), Object.assign(e.video, {ui: n})
        }

        var y = n(i(22)), _ = n(i(165)), g = window.navigator.userAgent.toLowerCase(), k = /(iphone)/.test(g) || /(ipad)/.test(g), E = /(android)/.test(g), A = /(windows phone)/.test(g), T = k || E || A, b = /(webkit)[ \/]([\w.]+).*(version)[\/]([\w.]+).*(safari)[\/]([\w.]+)/.test(g) || /(version)(applewebkit)[\/]([\w.]+).*(safari)[\/]([\w.]+)/.test(g), w = /(msie) ([\w.]+)/.test(g) || /trident.*(rv)(?::| )([\w.]+)/.test(g), S = /(chrome)\/([\w.]+)/.test(g), P = {
            isIOS: k,
            isAndroid: E,
            isWP: A,
            isMobile: T,
            isSafari: b,
            isIE: w,
            isChrome: S,
            ua: g,
            getChromeVersion: s
        }, L = {
            loadstart: "_onloadstart",
            canplay: "_oncanplay",
            loadeddata: "_onloadeddata",
            loadedmetadata: "_onloadedmetadata",
            abort: "_onabort",
            error: "_onerror",
            pause: "_onpause",
            waiting: "_onwaiting",
            stalled: "_onstalled",
            suspend: "_onsuspend",
            play: "_onplay",
            volumechange: "_onvolumechange",
            playing: "_onplaying",
            seeked: "_onseeked",
            seeking: "_onseeking",
            durationchange: "_ondurationchange",
            progress: "_onprogress",
            ratechange: "_onratechange",
            timeupdate: "_ontimeupdate",
            ended: "_onended",
            canplaythrough: "_oncanplaythrough"
        }, I = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
            return typeof e
        } : function (e) {
            return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
        }, x = function (e, t) {
            if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
        }, C = function () {
            function e(e, t) {
                for (var i = 0; i < t.length; i++) {
                    var n = t[i];
                    n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
                }
            }

            return function (t, i, n) {
                return i && e(t.prototype, i), n && e(t, n), t
            }
        }(), D = function (e, t) {
            if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
            e.prototype = Object.create(t && t.prototype, {
                constructor: {
                    value: e,
                    enumerable: !1,
                    writable: !0,
                    configurable: !0
                }
            }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
        }, M = function (e, t) {
            if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return !t || "object" != typeof t && "function" != typeof t ? e : t
        }, U = "auto", O = Math.random(), R = P.getChromeVersion();
        (P.isChrome || P.isIE) && O <= .99 && R && R > 50 && (U = "metadata");
        var N = {
            controls: !1,
            preload: U || "auto",
            style: {width: "100%", height: "100%", backgroundColor: "rgb(0,0,0)"}
        }, V = function () {
            function e(t) {
                x(this, e);
                var i = {env: "dev"};
                this.args = Object.assign(i, t), this._conatainer = t.container, this.init(t), this.eventEmitter = new y.EventEmitter
            }

            return C(e, [{
                key: "init", value: function (e) {
                    this.video = this._createVideo(e.videoAttr), "hidden" === this.args.videoVisiblity && this.hide(), this.videoInfo = {}, this.duration = 0, this.currentTime = 0, this._registerEvents()
                }
            }, {
                key: "loadSource", value: function (e) {
                    this.setSource(e)
                }
            }, {
                key: "setSource", value: function (e) {
                    this.video.src = e
                }
            }, {
                key: "resetSource", value: function (e) {
                    try {
                        this.currentTime = 0
                    } catch (e) {
                        console.log("__ error 1 ___", e)
                    }
                    this.currentTime = 0, this.duration = 0, this._source = e.source
                }
            }, {
                key: "on", value: function (e, t) {
                    var i = this;
                    "error" === e && (e = "videoerror"), this.eventEmitter.on(e, function (e) {
                        t(e, i.video)
                    })
                }
            }, {
                key: "once", value: function (e, t) {
                    this.eventEmitter.once(e, t)
                }
            }, {
                key: "fire", value: function (e, t) {
                    "error" === e && (e = "videoerror"), this.eventEmitter.removeListener(e, t)
                }
            }, {
                key: "fireAll", value: function () {
                    this.eventEmitter.removeAllListeners()
                }
            }, {
                key: "emit", value: function (e, t) {
                    e = "error" === e ? "videoerror" : e, this.eventEmitter.emit(e, t)
                }
            }, {
                key: "_createVideo", value: function () {
                    var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                    return o(this._conatainer, Object.assign(e, {src: this.args.source, muted: this.args.muted}))
                }
            }, {
                key: "play", value: function () {
                    return this.video.paused && this.video.play(), this.video.paused
                }
            }, {
                key: "pause", value: function () {
                    return this.video.pause(), this.video.paused
                }
            }, {
                key: "seek", value: function (e) {
                    this.duration
                }
            }, {
                key: "setVolume", value: function (e) {
                    return e > 1 && (e = 1), e > 0 ? (this.video.muted = !1, this.video.volume = e) : this.video.volume = 0, this.video.volume
                }
            }, {
                key: "setMuted", value: function (e) {
                    return this.video.muted = e, this.video.muted
                }
            }, {
                key: "setRate", value: function (e) {
                    return this.video.playbackRate = e, this.video.defaultPlaybackRate = e, this.video.playbackRate
                }
            }, {
                key: "replay", value: function () {
                    this.video.currentTime = 0, this.currentTime = 0, this.video.play()
                }
            }, {
                key: "getDuration", value: function () {
                    return this.duration
                }
            }, {
                key: "getCurrentTimeWithTimeFormate", value: function () {
                    return r(this.video.currentTime)
                }
            }, {
                key: "getCurrentTime", value: function () {
                    return this.currentTime
                }
            }, {
                key: "getVolume", value: function () {
                    return this.video.volume
                }
            }, {
                key: "getBufferTime", value: function () {
                    var e = this.getDuration(), t = this.video, i = 0;
                    if (e > 0)for (var n = 0; n < t.buffered.length; n++)if (t.buffered.start(t.buffered.length - 1 - n) < t.currentTime) {
                        var s = t.buffered.end(t.buffered.length - 1 - n);
                        i = s;
                        break
                    }
                    return i
                }
            }, {
                key: "getAttribute", value: function (e) {
                    if (this.video[e])return this.video[e]
                }
            }, {
                key: "setAttribute", value: function (e, t) {
                    this.video[e] = t
                }
            }, {
                key: "setStyle", value: function (e, t) {
                    this.video.style[e] = t
                }
            }, {
                key: "setSize", value: function (e, t) {
                    this.video.width = e, this.video.height = t
                }
            }, {
                key: "fullScreen", value: function () {
                }
            }, {
                key: "load", value: function () {
                    this.video.setAttribute("preload", !0), this.video.load()
                }
            }, {
                key: "end", value: function () {
                    var e = this.video.duration;
                    this.setCurrentTime(e - .1)
                }
            }, {
                key: "_registerEvents", value: function (e) {
                    var t = this, i = e || this.video;
                    if (i) {
                        var n = !0, s = !1, a = void 0;
                        try {
                            for (var o, r = Object.keys(L)[Symbol.iterator](); !(n = (o = r.next()).done); n = !0)!function () {
                                var e = o.value;
                                i.addEventListener(e, function (i) {
                                    var n = {event: i, videoInfo: t.videoInfo, isSuccess: !0};
                                    "string" == typeof L[e] && "function" == typeof t[L[e]] && t[L[e]](n)
                                })
                            }()
                        } catch (e) {
                            s = !0, a = e
                        } finally {
                            try {
                                !n && r.return && r.return()
                            } finally {
                                if (s)throw a
                            }
                        }
                    }
                }
            }, {
                key: "_onloadstart", value: function (e) {
                    this.emit("loadstart", e)
                }
            }, {
                key: "_oncanplay", value: function (e) {
                    this.emit("canplay", e)
                }
            }, {
                key: "_onloadeddata", value: function (e) {
                    this.emit("loadeddata", e)
                }
            }, {
                key: "_onloadedmetadata", value: function (e) {
                    this.emit("loadedmetadata", e)
                }
            }, {
                key: "_onabort", value: function (e) {
                    this.emit("abort", e)
                }
            }, {
                key: "_onerror", value: function (e) {
                    e.error = this.video.error, e.networkState = this.video.networkState, e.url = this.video.src, this.emit("error", e)
                }
            }, {
                key: "_onpause", value: function (e) {
                    this.emit("pause", e)
                }
            }, {
                key: "_onwaiting", value: function (e) {
                    this.emit("waiting", e)
                }
            }, {
                key: "_onstalled", value: function (e) {
                    e.error = this.video.error, e.networkState = this.video.networkState, e.url = this.video.src, this.emit("stalled", e)
                }
            }, {
                key: "_onsuspend", value: function (e) {
                    e.error = this.video.error, e.networkState = this.video.networkState, e.url = this.video.src, this.emit("suspend", e)
                }
            }, {
                key: "_onplay", value: function (e) {
                    this.emit("play", e)
                }
            }, {
                key: "_onvolumechange", value: function (e) {
                    this.emit("volumechange", e)
                }
            }, {
                key: "_onplaying", value: function (e) {
                    this.emit("playing", e)
                }
            }, {
                key: "_onseeked", value: function (e) {
                    this.emit("seeked", e)
                }
            }, {
                key: "_onseeking", value: function (e) {
                    this.emit("seeking", e)
                }
            }, {
                key: "_ondurationchange", value: function (e) {
                    this.duration = this.video.duration, this.emit("durationchange", e)
                }
            }, {
                key: "_onprogress", value: function (e) {
                    this.emit("progress", e)
                }
            }, {
                key: "_onratechange", value: function (e) {
                    e.playbackRate = this.video.playbackRate, this.emit("ratechange", e)
                }
            }, {
                key: "_ontimeupdate", value: function (e) {
                    this.currentTime = this.video.currentTime, this.emit("timeupdate", e)
                }
            }, {
                key: "_onended", value: function (e) {
                    this.emit("ended", e)
                }
            }, {
                key: "_oncanplaythrough", value: function (e) {
                    this.emit("canplaythrough", e)
                }
            }]), e
        }(), F = function (e) {
            function t(e) {
                x(this, t);
                var i = M(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                if (i._isPause = !0, i._curIndex = 0, i.currentTime = 0, i.isend = !1, !e.source)return M(i);
                i._source = i._processSource(e.source), i._totalNum = i._source.length;
                var n = i._countDuration(i._source);
                return i.duration = e.duration ? e.duration : n, i._source.length > 0 && (i.video.src = i._source[0].src), e.poster && (i.video.poster = e.poster), e.autoplay && (i._autoplay = !0, i.video.autoplay = i._autoplay, i.video.preload = !0, i._isPause = !1), i
            }

            return D(t, e), C(t, [{
                key: "seek", value: function (e) {
                    this.isend = !1, 1 === this._totalNum ? (e >= this.duration && (e = this.duration), this._setCurrentTime(e)) : this._multiSeek(e)
                }
            }, {
                key: "play", value: function () {
                    var e = this;
                    this._isPause = !1, this.video.src || (this.video.src = this._source[this._curIndex].src);
                    var t = this.video.play();
                    return t && t.catch(function (t) {
                        "object" !== (void 0 === t ? "undefined" : I(t)) || "AbortError" !== t.name && "NotAllowedError" !== t.name || (e.emit("pause", t), e.emit("safariAboart", t))
                    }), this.video.paused
                }
            }, {
                key: "pause", value: function () {
                    return this._isPause = !0, this.video.pause(), this.video.paused
                }
            }, {
                key: "replay", value: function () {
                    this.currentTime = 0, this._curIndex = 0, this.video.src = this._source[this._curIndex].src, this.video.play(), this._isPause = !1, this.isend = !1
                }
            }, {
                key: "setSource", value: function (e) {
                    this.currentTime = 0, this._curIndex = 0, this.isend = !1, this._source = this._processSource(e.source), this._totalNum = this._source.length;
                    var t = this._countDuration(this._source);
                    this.duration = e.duration || t, this.video.pause(), this.args.seekTime = e.seekTime, this.video.src = this._source[this._curIndex].src, "number" == typeof this.args.seekTime && this.args.seekTime > .1 && this.seek(this.args.seekTime), this.currentTime = this.args.seekTime, e.autoplay && (this._autoplay = !0, this.video.autoplay = this._autoplay, this.video.preload = !0, this._isPause = !1)
                }
            }, {
                key: "_processSource", value: function (e) {
                    var t = [];
                    return e instanceof Array ? t = e : "string" == typeof e && t.push({src: e, seconds: 0}), t
                }
            }, {
                key: "_createVideo", value: function () {
                    var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                    return o(this._conatainer, Object.assign(e, {conrtols: "true", crossorigin: this.args.crossorigin}))
                }
            }, {
                key: "_multiSeek", value: function (e) {
                    if (e <= 0) this._setCurrentTime(0); else {
                        var t = this._getIndexByTime(e);
                        t !== this._curIndex && (this.video.pause(), this.video.src = this._source[t].src), e >= this._source[t].endTime ? this._setCurrentTime(this._source[t].endTime) : this._setCurrentTime(e - this._source[t].startTime), this._curIndex = t
                    }
                }
            }, {
                key: "_getIndexByTime", value: function (e) {
                    for (var t = this._source.length, i = 0, n = 0; t > i;) {
                        if (n = parseInt((t + i) / 2), e <= this._source[n].endTime && e >= this._source[n].startTime)return n;
                        e > this._source[n].endTime ? i = n : t = n
                    }
                    return n
                }
            }, {
                key: "_countDuration", value: function (e) {
                    for (var t = 0, i = 0, n = 0, s = e.length; n < s; n++)t += e[n].seconds, e[n].startTime = i, i += e[n].seconds, e[n].endTime = i;
                    return t
                }
            }, {
                key: "setCurrentTime", value: function (e) {
                    this._setCurrentTime(e)
                }
            }, {
                key: "getCurrentTime", value: function () {
                    return 1 === this._totalNum || 0 === this._curIndex ? this.video.currentTime : this.video.currentTime + this._source[this._curIndex].startTime
                }
            }, {
                key: "tagErrorSrc", value: function (e) {
                    e.setAttribute("data-orginal-src", "true")
                }
            }, {
                key: "_setCurrentTime", value: function (e) {
                    try {
                        this.video.currentTime = e, this.video.play()
                    } catch (s) {
                        var t = !0, i = this, n = function n() {
                            t && (t = !1, i.video.currentTime = e, i.video.play()), i.video.removeEventListener("canplay", n)
                        };
                        this.video.addEventListener("canplay", n)
                    }
                }
            }, {
                key: "_onpause", value: function (e) {
                    this._isPause && this.emit("pause", e)
                }
            }, {
                key: "_onplay", value: function (e) {
                    this._isPause = !1, this.emit("play", e)
                }
            }, {
                key: "_oncanplay", value: function (e) {
                    !this._isPause && this.video.paused && this.video.play(), this.emit("canplay", e)
                }
            }, {
                key: "_ondurationchange", value: function (e) {
                    1 === this._totalNum && 0 === this.duration && (this.duration = this.video.duration, this._source[0].seconds = this.duration, this._source[0].endTime = this.duration), this.emit("durationchange", e)
                }
            }, {
                key: "_ontimeupdate", value: function (e) {
                    1 === this._totalNum ? this.currentTime = this.video.currentTime : this.currentTime = this.video.currentTime + this._source[this._curIndex].startTime, e.currentTime = this.currentTime, this.emit("timeupdate", e)
                }
            }, {
                key: "_onended", value: function (e) {
                    if (this._totalNum > 1) this._multiEnded(e); else {
                        if (this.isend)return;
                        this.isend = !0, this.emit("ended", e)
                    }
                }
            }, {
                key: "_multiEnded", value: function (e) {
                    if (this._curIndex + 1 < this._totalNum) this._curIndex++, this.video.pause(), this.video.src = this._source[this._curIndex].src, this._setCurrentTime(0); else {
                        if (this.isend)return;
                        this.isend = !0, this.emit("ended", e)
                    }
                }
            }]), t
        }(V), G = {};
        G.fullscreen = "fullscreen";
        for (var H in L)G[H] = H;
        var j = {
            FRONT: "frontad",
            END: "endad",
            CONTENT: "contentad",
            STAND: "standard",
            PAUSE: "pausead",
            CUT: "bfad"
        }, B = {
            PLAY: "adplay",
            PLAYING: "adplaying",
            PAUSE: "adpause",
            READY: "adready",
            END: "adended",
            ERROR: "aderror",
            WAITING: "adwaiting",
            SABORT: "safariabort"
        };
        !function (e) {
            if (e && "undefined" != typeof window) {
                var t = document.createElement("style");
                t.setAttribute("media", "screen"), t.innerHTML = e, document.head.appendChild(t)
            }
        }(".h5-ext-layer {\n  position: absolute;\n  top: 0;\n  bottom: 0;\n  left: 0;\n  right: 0;\n  z-index: 100;\n  width: 100%;\n  height: 100%;\n}\n.h5-ext-layer .h5-frame-layer {\n  display: none;\n  position: absolute;\n  left: 0px;\n  top: 0px;\n  width: 100%;\n  height: 100%;\n  z-index: 202;\n}\n.h5-ext-layer ul,\n.h5-ext-layer li {\n  display: block;\n  margin: 0;\n  padding: 0;\n}\n.h5-ext-layer ul,\n.h5-ext-layer li {\n  list-style: none;\n}\n.h5-ext-layer .inter-player,\n.h5-ext-layer .ad-play-btn-layer {\n  width: 100%;\n  height: 100%;\n  position: absolute;\n  left: 0;\n  bottom: 0;\n  z-index: 300;\n  cursor: pointer;\n}\n.h5-ext-layer .ad-play-btn-layer .ad-play-btn {\n  width: 100%;\n  height: 100%;\n  position: absolute;\n  left: 0;\n  top: 0;\n  background: rgba(0, 0, 0, 0.3) url('//g.alicdn.com/statics/player/1.0.44/play@2x.png') no-repeat center center;\n  display: block;\n  background-size: 80px;\n  z-index: 500;\n}\n.h5-ext-layer .inter-player span {\n  color: red;\n  padding: 0 2px 0 2px;\n}\n.h5-ext-layer .spv-ad-box {\n  height: 100%;\n  position: relative;\n}\n.h5-ext-layer .spv-ad-tip {\n  position: absolute;\n  height: 30px;\n  font-size: 12px;\n  line-height: 30px;\n  color: #454545;\n  right: 0;\n  background: rgba(0, 0, 0, 0.6);\n  color: #fff;\n  width: 120px;\n  z-index: 202;\n  text-align: center;\n}\n.h5-ext-layer .inter-player svg {\n  float: left;\n}\n.h5-ext-layer .spv-ad-mute {\n  width: 25px;\n  height: 17px;\n  right: 105px;\n  top: 0;\n  padding: 6px 6px 7px 7px;\n  cursor: pointer;\n}\n.h5-ext-layer .spv-ad-nomute {\n  display: none;\n  width: 25px;\n  height: 17px;\n  right: 105px;\n  top: 0px;\n  padding: 6px 6px 7px 7px;\n  cursor: pointer;\n}\n.h5-ext-layer .spv-ad-count {\n  padding: 0 10px;\n  right: 148px;\n  top: 0;\n}\n.h5-ext-layer .spv-ad-skip {\n  width: 100px;\n  cursor: pointer;\n  top: 0;\n}\n.h5-ext-layer .spv-ad-more {\n  bottom: 60px;\n  width: 100px;\n  cursor: pointer;\n  z-index: 200;\n}\n.h5-ext-layer .spv-ad-note {\n  display: none;\n  position: absolute;\n  bottom: 20px;\n  left: 15px;\n  z-index: 200;\n}\n.h5-ext-layer .spv-ad-note span {\n  display: inline-block;\n  color: #000;\n  background-color: rgba(184, 204, 215, 0.5);\n  border-radius: 3px;\n  line-height: 18px;\n  padding: 2px 4px;\n  margin-left: 4px;\n  text-align: center;\n  font-size: 12px;\n}\n.h5-ext-layer .spv-ad-view {\n  bottom: 60px;\n  width: 100px;\n  cursor: pointer;\n  right: 105px;\n  display: none;\n}\n.h5-ext-layer .spv-ad-count {\n  width: 110px;\n}\n.h5-ext-layer .spv-ad-skip-view {\n  position: absolute;\n  bottom: 110px;\n  cursor: pointer;\n  right: 10px;\n  display: none;\n  height: 40px;\n  line-height: 40px;\n  background-color: rgba(222, 218, 218, 0.45);\n  color: rgba(0, 0, 0, 0.9);\n  opacity: 0.8;\n  border-radius: 10px;\n  border: 1px solid rgba(206, 153, 153, 0.45);\n  font-size: 14px;\n  width: 140px;\n  z-index: 202;\n  text-align: center;\n  padding: 0 5px 0 5px;\n}\n.h5-ext-layer .spv-ad-skip-view .view-adtime {\n  color: #4cb7ff;\n  padding: 0 2px 0 2px;\n  font-size: 16px;\n}\n.h5-ext-layer .spv-ad-skip-view .view-txt {\n  color: rgba(0, 0, 0, 0.9);\n}\n.h5-ext-layer .inter-player-big {\n  width: 100%;\n  height: 100%;\n  position: absolute;\n  left: 0;\n  top: 0;\n  z-index: 200;\n}\n.h5-ext-layer-adsdk {\n  position: absolute;\n  top: 0;\n  left: 0;\n  bottom: 0;\n  width: 100%;\n  height: 100%;\n}\n.yk-video-fixed .h5-ext-layer .spv-ad-count {\n  left: 0px;\n}\n.yk-video-fixed .h5-ext-layer .spv-ad-mute,\n.yk-video-fixed .h5-ext-layer .spv-ad-skip,\n.yk-video-fixed .h5-ext-layer .inter-player-big,\n.yk-video-fixed .h5-ext-layer .h5-frame-layer {\n  display: none;\n}\n.yk-video-fixed .h5-ext-layer .spv-ad-more {\n  bottom: 30px;\n  width: 65px;\n}\n.yk-video-fixed .h5-ext-layer .spv-ad-view {\n  bottom: 30px;\n  right: 70px;\n  width: 65px;\n}\n.yk-video-fixed .h5-ext-layer .spv-ad-skip-view {\n  width: 110px;\n  height: 25px;\n  bottom: 65px;\n  font-size: 12px;\n  line-height: 25px;\n}\n.yk-video-fixed .h5-ext-layer .spv-ad-skip-view .view-adtime {\n  font-size: 14px;\n}\n.yk-video-fixed .h5-ext-layer-adsdk {\n  display: none;\n}\n.h5-ext-layer .preloading-container {\n  display: none;\n  position: absolute;\n  top: 50%;\n  left: 50%;\n  width: 100px;\n  height: 75px;\n  margin-left: -50px;\n  margin-top: -40px;\n  z-index: 104;\n}\n.h5-ext-layer .preloading-container .h5-layer-loading {\n  position: relative;\n  width: 40px;\n  height: 40px;\n  margin: 0 auto;\n}\n.h5-ext-layer .preloading-container .h5-layer-loading .spinner {\n  animation: rotator 1.4s linear infinite;\n}\n@keyframes rotator {\n  0% {\n    transform: rotate(0deg);\n  }\n  100% {\n    transform: rotate(270deg);\n  }\n}\n@keyframes rotator2 {\n  0% {\n    transform: rotate(0deg);\n  }\n  100% {\n    transform: rotate(270deg);\n  }\n}\n.h5-ext-layer .preloading-container .h5-layer-loading .path {\n  stroke-dasharray: 188.8;\n  stroke-dashoffset: 0;\n  transform-origin: center;\n  animation: dash 1.4s ease-in-out infinite;\n}\n@keyframes dash {\n  0% {\n    stroke-dashoffset: 188.8;\n    opacity: 0;\n  }\n  50% {\n    stroke-dashoffset: 47.2;\n    transform: rotate(135deg);\n    opacity: 1;\n  }\n  100% {\n    stroke-dashoffset: 188.8;\n    transform: rotate(450deg);\n    opacity: 0;\n  }\n}\n");
        var q = {
            init: function (e) {
                var t = e.id;
                this.componentsGroup || (this.componentsGroup = {}), this.componentsGroup[t] = {
                    _video: e,
                    _originalOptions: e.config || {}
                }
            }, register: function (e, t, i) {
                var n = arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : {};
                this.componentsGroup && this.componentsGroup[e] || this.init({id: e}), this.componentsGroup[e]._components || (this.componentsGroup[e]._components = {});
                var s = this.componentsGroup[e]._components, a = this.componentsGroup[e]._originalOptions;
                n.video = this.componentsGroup[e]._video, n.name = t;
                var o = !0, r = !1, u = void 0;
                try {
                    for (var l, d = Object.keys(a)[Symbol.iterator](); !(o = (l = d.next()).done); o = !0) {
                        var h = l.value;
                        t.toLowerCase() === h.toLowerCase() && (n = Object.assign({}, n, a[h]))
                    }
                } catch (e) {
                    r = !0, u = e
                } finally {
                    try {
                        !o && d.return && d.return()
                    } finally {
                        if (r)throw u
                    }
                }
                return n.disabled && "dashboard" !== t ? null : (s[t.toLowerCase()] = new i(n), s[t.toLowerCase()].func = i, s[t.toLowerCase()])
            }, unRegister: function (e, t) {
                this.componentsGroup[e]._components[t].destroy(), this.componentsGroup[e]._components[t] = null
            }, findComponent: function (e, t) {
                var i = t.toLowerCase();
                return this.componentsGroup[e]._components[i]
            }, reRender: function (e) {
                var t = {}, i = this.componentsGroup[e]._components, n = !0, s = !1, a = void 0;
                try {
                    for (var o, r = Object.keys(i)[Symbol.iterator](); !(n = (o = r.next()).done); n = !0) {
                        var u = o.value;
                        t[u] = {component: i[u].func, options: i[u]._args}, this.unRegister(u)
                    }
                } catch (e) {
                    s = !0, a = e
                } finally {
                    try {
                        !n && r.return && r.return()
                    } finally {
                        if (s)throw a
                    }
                }
                var l = !0, d = !1, h = void 0;
                try {
                    for (var c, f = Object.keys(t)[Symbol.iterator](); !(l = (c = f.next()).done); l = !0) {
                        var v = c.value;
                        this.register(e, v, t[v].component, t[v].options)
                    }
                } catch (e) {
                    d = !0, h = e
                } finally {
                    try {
                        !l && f.return && f.return()
                    } finally {
                        if (d)throw h
                    }
                }
            }
        }, Y = function () {
            function e() {
                var t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                x(this, e), this._args = t, this._events = {}, this.init(t)
            }

            return C(e, [{
                key: "init", value: function (e) {
                    this._parent = e.container, this._children = [], this._video = e.video, this.name = e.name;
                    var t = this.render();
                    t ? this._el = this.insert(t, e.index) : e.tag && (this._el = this.createElement(e.tag, e.name), this._parent.appendChild(this._el)), this.attr = e.attr ? e.attr : {}, this.style = e.style ? e.style : {}, this.setAttr(this.attr), this.setStyle(this.style);
                    var i = this.children();
                    if (Object.keys(i).length > 0) {
                        var n = !0, s = !1, a = void 0;
                        try {
                            for (var o, r = Object.keys(i)[Symbol.iterator](); !(n = (o = r.next()).done); n = !0) {
                                var u = o.value, l = u, d = this._registerComponent(l, i[u]);
                                this._children.push(d)
                            }
                        } catch (e) {
                            s = !0, a = e
                        } finally {
                            try {
                                !n && r.return && r.return()
                            } finally {
                                if (s)throw a
                            }
                        }
                    }
                }
            }, {
                key: "insert", value: function (e, t) {
                    var i = this._parent.children.length, n = parseInt(t);
                    if (void 0 === t || i <= n)return this._parent.insertAdjacentHTML("beforeend", e), this._parent.children[this._parent.children.length - 1];
                    if (0 === n)return this._parent.insertAdjacentHTML("afterbegin", e), this._parent.children[0];
                    var s = this._parent.children[n];
                    return s && s.insertAdjacentHTML ? (s.insertAdjacentHTML("beforebegin", e), this._parent.children[n]) : void 0
                }
            }, {
                key: "children", value: function () {
                    return {}
                }
            }, {
                key: "_registerComponent", value: function (e, t, i) {
                    var n = "object" === (void 0 === i ? "undefined" : I(i)) ? i : {};
                    n.container = this._el;
                    var s = this._args._id || "component_share";
                    return this._video && this._video.id && (s = this._video.id), q.register(s, e, t, n)
                }
            }, {
                key: "getComponent", value: function (e) {
                    return q.findComponent(this._video.id, e)
                }
            }, {
                key: "_createElement", value: function (e, t) {
                    this._el = document.createElement(e), this._el.name = t
                }
            }, {
                key: "find", value: function (e) {
                    return this._el.querySelector(e)
                }
            }, {
                key: "bind", value: function (e, t, i) {
                    arguments.length < 3 && "function" == typeof t ? this.bindEL(e, t) : 3 === arguments.length && "function" == typeof i && _.bind(this._el, e, t, i)
                }
            }, {
                key: "unbind", value: function (e, t, i) {
                    arguments.length < 3 && "function" == typeof t ? this.unbindEL(e, t) : "function" == typeof i && _.ubind(this._el, t, i, !1)
                }
            }, {
                key: "on", value: function (e, t) {
                    var i = this;
                    "string" == typeof e ? (this._events[e] = t, this._video.on(e, t)) : Array.isArray(e) && e.forEach(function (e) {
                        i._events[e] = t, i._video.on(e, t)
                    })
                }
            }, {
                key: "fire", value: function (e, t) {
                    var i = this;
                    "string" == typeof e ? (this._events[e] = void 0, this._video.fire(e, t)) : Array.isArray(e) && e.forEach(function (e) {
                        i._events[e] = void 0, i._video.fire(e, t)
                    })
                }
            }, {
                key: "fireAll", value: function () {
                    var e = !0, t = !1, i = void 0;
                    try {
                        for (var n, s = Object.keys(this._events)[Symbol.iterator](); !(e = (n = s.next()).done); e = !0) {
                            var a = n.value;
                            this.fire(a, this._events[a])
                        }
                    } catch (e) {
                        t = !0, i = e
                    } finally {
                        try {
                            !e && s.return && s.return()
                        } finally {
                            if (t)throw i
                        }
                    }
                }
            }, {
                key: "emit", value: function (e, t) {
                    this._video.emit(e, t)
                }
            }, {
                key: "setStyle", value: function (e, t) {
                    if ("string" == typeof e)return this.style[e] = t, this._el.style[e] = t;
                    if ("object" === (void 0 === e ? "undefined" : I(e))) {
                        var i = e, n = !0, s = !1, a = void 0;
                        try {
                            for (var o, r = Object.keys(i)[Symbol.iterator](); !(n = (o = r.next()).done); n = !0) {
                                var u = o.value;
                                this._el.style[u] = i[u]
                            }
                        } catch (e) {
                            s = !0, a = e
                        } finally {
                            try {
                                !n && r.return && r.return()
                            } finally {
                                if (s)throw a
                            }
                        }
                    }
                }
            }, {
                key: "setAttr", value: function (e, t) {
                    if ("string" == typeof e)return this._el.setAttribute(e, t);
                    if ("object" === (void 0 === e ? "undefined" : I(e))) {
                        var i = e, n = !0, s = !1, a = void 0;
                        try {
                            for (var o, r = Object.keys(i)[Symbol.iterator](); !(n = (o = r.next()).done); n = !0) {
                                var u = o.value;
                                this._el.setAttribute(u, i[u])
                            }
                        } catch (e) {
                            s = !0, a = e
                        } finally {
                            try {
                                !n && r.return && r.return()
                            } finally {
                                if (s)throw a
                            }
                        }
                    }
                }
            }, {
                key: "setHtml", value: function (e, t) {
                    this._el.innerHtml = e, "function" == typeof t && t()
                }
            }, {
                key: "bindEL", value: function (e, t) {
                    var i = arguments.length > 2 && void 0 !== arguments[2] && arguments[2];
                    "on" + e in this._el && "function" == typeof t && this._el.addEventListener(e, t, i)
                }
            }, {
                key: "unbindEL", value: function (e, t) {
                    var i = arguments.length > 2 && void 0 !== arguments[2] && arguments[2];
                    "on" + e in this._el && "function" == typeof t && this._node.removeEventListener(e, t, i)
                }
            }, {
                key: "show", value: function () {
                    if (this._el.style.display = "", "none" === window.getComputedStyle(this._el, null).getPropertyValue("display"))return this._el.style.display = "block"
                }
            }, {
                key: "hide", value: function () {
                    this._el.style.display = "none"
                }
            }, {
                key: "render", value: function () {
                    return "<div></div>"
                }
            }, {
                key: "destroy", value: function () {
                    this._el && (this._el.hasOwnProperty("remove") ? this._el.remove() : this._el.parentNode && this._el.parentNode.removeChild(this._el)), this.fireAll()
                }
            }]), e
        }(), z = function (e) {
            function t(e) {
                return x(this, t), M(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e))
            }

            return D(t, e), C(t, [{
                key: "switch", value: function (e) {
                    this.hideAllLayer();
                    var t = !0, i = !1, n = void 0;
                    try {
                        for (var s, a = this._children[Symbol.iterator](); !(t = (s = a.next()).done); t = !0) {
                            var o = s.value;
                            o.name === e && o.show()
                        }
                    } catch (e) {
                        i = !0, n = e
                    } finally {
                        try {
                            !t && a.return && a.return()
                        } finally {
                            if (i)throw n
                        }
                    }
                }
            }, {
                key: "hideAllLayer", value: function () {
                    var e = !0, t = !1, i = void 0;
                    try {
                        for (var n, s = this._children[Symbol.iterator](); !(e = (n = s.next()).done); e = !0) {
                            n.value.hide()
                        }
                    } catch (e) {
                        t = !0, i = e
                    } finally {
                        try {
                            !e && s.return && s.return()
                        } finally {
                            if (t)throw i
                        }
                    }
                }
            }, {
                key: "append", value: function (e, t) {
                    if ("object" === (void 0 === t ? "undefined" : I(t)) && t.html) {
                        var i = this._registerComponent(e, function (e) {
                            function i() {
                                return x(this, i), M(this, (i.__proto__ || Object.getPrototypeOf(i)).apply(this, arguments))
                            }

                            return D(i, e), C(i, [{
                                key: "render", value: function () {
                                    return t.html
                                }
                            }]), i
                        }(Y));
                        return this._children.push(i), i
                    }
                    if ("function" == typeof t) {
                        var n = this._registerComponent(e, t);
                        "Component" === Object.getPrototypeOf(n.constructor).name && this._children.push(n)
                    }
                }
            }, {
                key: "getLayer", value: function (e) {
                    var t = !0, i = !1, n = void 0;
                    try {
                        for (var s, a = this._children[Symbol.iterator](); !(t = (s = a.next()).done); t = !0) {
                            var o = s.value;
                            if (o.name === e)return o
                        }
                    } catch (e) {
                        i = !0, n = e
                    } finally {
                        try {
                            !t && a.return && a.return()
                        } finally {
                            if (i)throw n
                        }
                    }
                }
            }, {
                key: "childrens", value: function () {
                    return {}
                }
            }, {
                key: "render", value: function () {
                    return '\n            <div class="h5-layer-conatiner">\n            </div>\n        '
                }
            }]), t
        }(Y), K = function (e) {
            function t(e) {
                return x(this, t), M(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e))
            }

            return D(t, e), C(t, [{
                key: "render", value: function () {
                    return '\n            <div class="h5-full-layer">\n              Hello!\n            </div>\n        '
                }
            }]), t
        }(Y), W = {
            install: function (e, t, i) {
                m({container: e, video: t, layers: i})
            }, componentsManager: q
        }, Q = function (e) {
            function t(e) {
                x(this, t);
                var i = M(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                return i.totalTime = 0, i.timerShow = i.find(".spv-ad-count"), i.muteIcon = i.find(".spv-ad-mute"), i.nomuteIcon = i.find(".spv-ad-nomute"), i.moreIcon = i.find(".spv-ad-more"), i.skipAdIcon = i.find(".spv-ad-skip"), i.bigDom = i.find(".inter-player-big"), i.viewIcon = i.find(".spv-ad-view"), i.skipViewIcon = i.find(".spv-ad-skip-view"), i.skipTimeSpan = i.find(".view-adtime"), i.dspDom = i.find(".spv-ad-note"), i.dspNoteDom = i.find(".third-note"), i.playBtn = i.find(".ad-play-btn-layer"), i.data = null, i
            }

            return D(t, e), C(t, [{
                key: "show", value: function () {
                    this._el.style.display = "block"
                }
            }, {
                key: "hide", value: function () {
                    this._el.style.display = "none"
                }
            }, {
                key: "update", value: function (e) {
                    this.data = e, this.data && this.data.totalTime && (this.totalTime = this.data ? this.data.totalTime : 0, this.showSkipView(), this.showDsp(), this._canskip = !1, this.timerShow.innerHTML = this.showTimeMode(this.totalTime), "contentad" === this.data.adtype ? this.hide() : this.show())
                }
            }, {
                key: "updateIndex", value: function () {
                    this.showDsp()
                }
            }, {
                key: "bind", value: function () {
                    var e = this;
                    this.bigDom.addEventListener("click", this.openUrl.bind(this)), this.muteIcon.addEventListener("click", this.setMuted.bind(this, !0)), this.nomuteIcon.addEventListener("click", this.setMuted.bind(this, !1)), this.skipAdIcon.addEventListener("click", this.skipAd.bind(this)), this.moreIcon.addEventListener("click", this.openUrl.bind(this)), this.viewIcon.addEventListener("click", this.viewAD.bind(this)), this.skipViewIcon.addEventListener("click", this.skipViewAd.bind(this)), this.playBtn.addEventListener("click", function (t) {
                        return e.player.play(), t.cancelBubble = !0, t.stopPropagation(), t.preventDefault(), !1
                    }), this.player.on(G.timeupdate, function (t) {
                        e.updateAdTime(t.currentTime)
                    }), this.player.on(G.volumechange, function (t) {
                        e.changeMuted(t.event.target.muted)
                    }), this.player.on(G.play, function () {
                        c(e.playBtn), h(e.find(".inter-player-box"))
                    }), this.player.on(G.pause, function () {
                        h(e.playBtn)
                    })
                }
            }, {
                key: "showSkipView", value: function () {
                    window.youku_vip_pay_eventTarget || P.isMobile || this._loadfile("//static.youku.com/paymentcenter/vip_pay/vip_pc_pay.js");
                    var e = this.data.index, t = this.data.VAL[e];
                    if (!t.EM || !t.EM.SKIP && !t.EM.VIEW)return this.skipViewIcon.style.display = "none", this.viewIcon.style.block = "none", !1;
                    t.EM.SKIP && (this._SKIP = t.EM.SKIP, this.skipViewIcon.style.display = "block", this.skipViewIcon.innerHTML = "" + this.skipTimeMode(this._SKIP.TX1), this.skipTimeSpan = this.find(".view-adtime")), t.EM.VIEW && (this._VIEW = t.EM.VIEW, this.viewIcon.style.display = "block", this.viewIcon.innerHTML = this._VIEW.TX)
                }
            }, {
                key: "skipViewAd", value: function () {
                    this._canskip && this.player.skip(this._SKIP)
                }
            }, {
                key: "viewAD", value: function () {
                    this.player.sendVIEW(this._VIEW), window.open(this._VIEW.CU)
                }
            }, {
                key: "changeMuted", value: function (e) {
                    e ? (h(this.nomuteIcon), c(this.muteIcon)) : (c(this.nomuteIcon), h(this.muteIcon))
                }
            }, {
                key: "setMuted", value: function (e) {
                    this.player.setMuted(e)
                }
            }, {
                key: "skipAd", value: function () {
                    P.isMobile && (location.href = "https://h5.vip.youku.com/buy?tags=fromzhibo");
                    try {
                        window.goldlog && window.goldlog.record("/yt/click.index.module", "CLK", "mid=7002&mname=adfree", "H1478724911")
                    } catch (e) {
                        console.log(e)
                    }
                }
            }, {
                key: "openUrl", value: function () {
                    var e = this;
                    if (this.click)return !1;
                    this.click = !0;
                    var t = setTimeout(function () {
                        clearTimeout(t), e.click = !1
                    }, 500), i = this.data.VAL[this.data.index].CU;
                    this.player.sendCUM(), setTimeout(function () {
                        i && window.open(i, "_blank")
                    }, 300)
                }
            }, {
                key: "showTimeMode", value: function (e) {
                    return e <= 120 ? "广告还有<span class='adtime'>" + e + "</span>秒" : (e = r(e), e[2] > 0 ? "广告还有<span class='adtime'>" + e[1] + "</span>分<span class='adtime'>" + e[2] + "</span>秒" : "广告还有<span class='adtime'>" + e[2] + "</span>秒")
                }
            }, {
                key: "showDsp", value: function () {
                    var e = this.data.index, t = this.data.VAL[e];
                    if (!t.DSPNAME)return void c(this.dspDom);
                    this.dspNoteDom.innerHTML = t.DSPNAME, h(this.dspDom)
                }
            }, {
                key: "hideDsp", value: function () {
                    c(this.dspDom)
                }
            }, {
                key: "skipTimeMode", value: function (e) {
                    return e.split("|").map(function (e) {
                        return e ? '<span class="view_txt">' + e + "</span>" : ""
                    }).join("<span class='view-adtime'>" + this._SKIP.T + "</span>")
                }
            }, {
                key: "updateAdTime", value: function (e) {
                    if (e <= this.totalTime && 1e3 * this.totalTime - 1e3 * e >= 300) {
                        var t = Math.round(this.totalTime - e);
                        if (this.timerShow.innerHTML = this.showTimeMode(t), !this._canskip && this._SKIP && e < this._SKIP.T) {
                            var i = Math.round(this._SKIP.T - e);
                            this.skipTimeSpan.innerHTML = "" + (i < 1 ? 1 : i)
                        } else!this._canskip && this._SKIP && (this._canskip = !0, this.skipViewIcon.innerHTML = '<span class="view_txt">' + this._SKIP.TX2 + "</span>", this.skipTimeSpan.style.display = "none")
                    }
                }
            }, {
                key: "_loadfile", value: function (e) {
                    var t = null;
                    t = document.createElement("script"), t.setAttribute("type", "text/javascript"), e += "?" + (new Date).getTime(), t.setAttribute("src", e), void 0 !== t && document.getElementsByTagName("head")[0].appendChild(t)
                }
            }, {
                key: "render", value: function () {
                    return '<div class="inter-player">\n                <div class="inter-player-box" style="display:none;">\n                    <div class="h5-frame-layer"></div>\n                    <div class="inter-player-big"></div>\n                    <div class="spv-ad-tip spv-ad-count">广告还有<span class=\'adtime\'>0</span>秒</div>\n                    <div class="spv-ad-tip spv-ad-mute">\n                        <svg width="25px" height="17px" viewBox="0 0 25 19" version="1.1">\n                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\n                                <g transform="translate(-854.000000, -545.000000)" fill="#FFFFFF">\n                                    <g transform="translate(146.000000, 543.000000)">\n                                        <g transform="translate(708.000000, 2.000000)">\n                                            <path d="M18.5777497,3.87020852 C18.4917826,3.78534285 18.4007585,3.70730546 18.3097345,3.6297558 L18.0670038,3.43612552 L18.0467762,3.45563487 C17.783818,3.33809104 17.4500632,3.39320495 17.2427307,3.59902858 C17.0303413,3.80924181 16.9747155,4.11700178 17.091024,4.37550064 L17.0101138,4.4530503 L17.2174463,4.62863444 C17.323641,4.71496331 17.4247788,4.80226764 17.5208597,4.89786345 C19.528445,6.87659911 19.528445,10.0966171 17.5208597,12.074865 C17.4247788,12.1728995 17.3185841,12.2621547 17.2123894,12.3504345 L17,12.5279696 L17.1314791,12.6503908 C17.0657396,12.8869416 17.1264223,13.1425141 17.3084703,13.3205369 C17.4905183,13.5024616 17.7737042,13.5648915 18.0164349,13.4868541 L18.0922882,13.5580632 L18.335019,13.3468745 C18.4209861,13.2771286 18.5018963,13.2064072 18.5777497,13.1303207 C19.8318584,11.8939158 20.5195954,10.2492777 20.5195954,8.50026463 C20.5195954,6.75125155 19.8318584,5.10710121 18.5777497,3.87020852 Z M21.7231353,0.580444643 C21.6270544,0.487775238 21.5309735,0.401934105 21.4298357,0.316580706 L21.2983565,0.199036882 L21.091024,0.0702751825 L21.0859671,0.0756402533 C20.8280657,-0.0584865171 20.4791403,-0.0121518146 20.2667509,0.198061415 C20.1352718,0.327798581 20.0644753,0.499968581 20.0644753,0.683356456 C20.0644753,0.801875748 20.0948167,0.916005436 20.1504425,1.01696631 L20.0847029,1.08232263 L20.4083439,1.36618365 C20.494311,1.43983144 20.5802781,1.51250376 20.6611884,1.59249209 C24.4437421,5.33097098 24.4437421,11.4139858 20.6611884,15.1524647 C20.4791403,15.3299998 20.2920354,15.4904642 20.0998736,15.6504408 L19.9077118,15.8143194 L19.9785082,15.8957709 C19.9127686,16.0079496 19.8773704,16.1357359 19.8773704,16.2688872 C19.8773704,16.4639807 19.9532238,16.6478563 20.0948167,16.7858849 C20.2313527,16.9234258 20.4184576,17 20.6156764,17 C20.8128951,17 21,16.9234258 21.1415929,16.7863726 C21.1972187,16.7293078 21.2326169,16.6678533 21.2427307,16.6522459 C21.4045512,16.512754 21.5663717,16.3722867 21.7231353,16.2191383 C26.0922882,11.9075723 26.0922882,4.89249838 21.7231353,0.580444643 Z" id="形状-20"></path>\n                                            <path d="M12.915,19 L12.915,19 C12.385,19 11.795,18.8202751 11.115,18.4505554 L11.04,18.4048539 L6.015,14.8755709 L3.92,14.8755709 C1.76,14.8755709 0,13.0680522 0,10.8466528 L0,8.12664523 C0,5.9047323 1.76,4.09721359 3.92,4.09721359 L5.925,4.09721359 L10.61,0.734817978 C11.43,0.240317829 12.145,0 12.785,0 C14.285,0 14.985,1.32020756 15,2.54644469 L15,16.1033486 C15,17.1570498 14.755,17.9457852 14.27,18.4449069 C13.92,18.8079511 13.45,19 12.915,19 Z M11.85,17.1082673 C12.395,17.3978811 12.73,17.4600146 12.915,17.4600146 C13.085,17.4600146 13.16,17.4081511 13.21,17.3568012 C13.39,17.1688603 13.5,16.7010621 13.5,16.1048891 L13.5,2.55568768 C13.495,2.32461285 13.435,1.54049891 12.785,1.54049891 C12.54,1.54049891 12.095,1.62882084 11.39,2.04886354 L6.4,5.63719899 L3.92,5.63719899 C2.585,5.63719899 1.5,6.7540607 1.5,8.12664523 L1.5,10.8466528 C1.5,12.2187238 2.585,13.3355855 3.92,13.3355855 L6.475,13.3355855 L11.85,17.1082673 Z"></path>\n                                        </g>\n                                    </g>\n                                </g>\n                            </g>\n                        </svg>\n                    </div>\n                    <div class="spv-ad-tip spv-ad-nomute">\n                        <svg width="25px" height="17px" viewBox="0 0 26 19" version="1.1">\n                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\n                                    <g transform="translate(-923.000000, -545.000000)" fill="#FFFFFF">\n                                        <g transform="translate(146.000000, 543.000000)">\n                                            <g transform="translate(777.000000, 2.000000)">\n                                                <path d="M12.915,19 L12.915,19 C12.385,19 11.795,18.8202751 11.115,18.4505554 L11.04,18.4048539 L6.015,14.8755709 L3.92,14.8755709 C1.76,14.8755709 0,13.0680522 0,10.8466528 L0,8.12664523 C0,5.9047323 1.76,4.09721359 3.92,4.09721359 L5.925,4.09721359 L10.61,0.734817978 C11.43,0.240317829 12.145,0 12.785,0 C14.285,0 14.985,1.32020756 15,2.54644469 L15,16.1033486 C15,17.1570498 14.755,17.9457852 14.27,18.4449069 C13.92,18.8079511 13.45,19 12.915,19 Z M11.85,17.1082673 C12.395,17.3978811 12.73,17.4600146 12.915,17.4600146 C13.085,17.4600146 13.16,17.4081511 13.21,17.3568012 C13.39,17.1688603 13.5,16.7010621 13.5,16.1048891 L13.5,2.55568768 C13.495,2.32461285 13.435,1.54049891 12.785,1.54049891 C12.54,1.54049891 12.095,1.62882084 11.39,2.04886354 L6.4,5.63719899 L3.92,5.63719899 C2.585,5.63719899 1.5,6.7540607 1.5,8.12664523 L1.5,10.8466528 C1.5,12.2187238 2.585,13.3355855 3.92,13.3355855 L6.475,13.3355855 L11.85,17.1082673 Z"></path>\n                                                <path d="M22.6078873,9.50402685 L25.771831,6.33087248 C26.0760563,6.02533557 26.0760563,5.52852349 25.771831,5.22298658 C25.4777465,4.92701342 24.9605634,4.92701342 24.6664789,5.22298658 L21.5025352,8.39563758 L18.3335211,5.22197987 C18.0394366,4.92600671 17.5222535,4.92600671 17.228169,5.22197987 C16.9239437,5.52751678 16.9239437,6.02432886 17.228169,6.32986577 L20.3971831,9.50402685 L17.2433803,12.6625839 C16.9391549,12.9681208 16.9391549,13.4649329 17.2433803,13.7704698 C17.3904225,13.9184564 17.588169,14 17.7960563,14 C18.0039437,14 18.2016901,13.9184564 18.3487324,13.7704698 L21.5025352,10.6119128 L24.6512676,13.7694631 C24.7983099,13.9174497 24.9960563,13.9984899 25.2039437,13.9984899 C25.411831,13.9984899 25.6095775,13.9169463 25.7566197,13.7694631 C25.903662,13.6214765 25.9847887,13.4246644 25.9847887,13.2152685 C25.9847887,13.0063758 25.903662,12.8095638 25.7566197,12.6615772 L22.6078873,9.50402685 Z"></path>\n                                            </g>\n                                        </g>\n                                    </g>\n                                </g>\n                            </svg>\n                    </div>\n                    <div class="spv-ad-skip-view"></div>\n                    <div class="spv-ad-tip spv-ad-skip youku_vip_pay_btn" sourceid="spv-ad-skip">会员免广告</div>\n                    <div class="spv-ad-tip spv-ad-view">欣赏广告</div>\n                    <div class="spv-ad-tip spv-ad-more">了解详情</div>\n                    <div class="spv-ad-note"><span>广告</span><span class="third-note"></span></div>\n                </div>\n                <div class="ad-play-btn-layer" style="display:block;">\n                     <div class="ad-play-btn"></div>\n                </div>\n            </div>'
                }
            }]), t
        }(K), J = function (e) {
            function t(e) {
                return x(this, t), M(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e))
            }

            return D(t, e), C(t, [{
                key: "render", value: function () {
                    return '<div class="preloading-container">\n                  <div class="h5-layer-loading">\n                      <svg class="spinner" width="100%" height="100%" viewBox="0 0 80 80" xmlns="http://www.w3.org/2000/svg">\n                        <defs>\n                          <linearGradient id="grad" gradientUnits="objectBoundingBox" gradientTransform="rotate(135 0.5 0.5)">\n                            <stop offset="0%" stop-color="#3cdbff"></stop>\n                            <stop offset="100%" stop-color="#2794ff"></stop>\n                          </linearGradient>\n                        </defs>\n                       <circle class="path" stroke="url(#grad)" stroke-width="10" fill="none" stroke-linecap="round" cx="40" cy="40" r="30"></circle>\n                      </svg>\n                  </div>\n              </div>'
                }
            }]), t
        }(K), X = function (e) {
            function t(e) {
                return x(this, t), M(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e))
            }

            return D(t, e), C(t, [{
                key: "show", value: function () {
                    this._el.style.display = "block", "contentad" !== this.adtype ? this._children[0].show() : this._children[0].hide()
                }
            }, {
                key: "hide", value: function () {
                    this._el.style.display = "none"
                }
            }, {
                key: "updateData", value: function (e) {
                    this.adtype = e.adtype, this._children[0].update(e)
                }
            }, {
                key: "adPlayer", value: function (e) {
                    e && (this._children[0].player = e, this._children[0].bind())
                }
            }, {
                key: "children", value: function () {
                    return {ShowLayer: Q, LoadingLayer: J}
                }
            }, {
                key: "showLoading", value: function () {
                    this._children[1].show()
                }
            }, {
                key: "hideLoading", value: function () {
                    this._children[1].hide()
                }
            }, {
                key: "updateIndex", value: function (e) {
                    this._children[0].updateIndex(e)
                }
            }, {
                key: "render", value: function () {
                    return '<div class="h5-ext-layer">\n        </div>'
                }
            }]), t
        }(K), Z = function () {
            function e(t, i, n, s, a) {
                x(this, e), this.addata = t, this.curnum = 0, this._emitter = a, this.logparam = {
                    lvs: 6,
                    bt: 3,
                    os: this.getOSNum(),
                    avs: n,
                    appid: "pw",
                    st: 1
                }, this.psid = i, this.wintype = s
            }

            return C(e, [{
                key: "changeNum", value: function (e) {
                    this.curnum = e
                }
            }, {
                key: "reset", value: function (e, t) {
                    this.adtype = t, this.addata = e, this.curnum = 0
                }
            }, {
                key: "sendSUS", value: function (e) {
                    if (!(!this.addata || e < 0 || e >= this.addata.VAL.length)) {
                        var t = this.addata.VAL[e];
                        if (!t.ifsus && "hvideo" !== t.RST) {
                            t.ifsus = !0;
                            var i = t.SUS;
                            if (i) {
                                for (var n = 0; n < i.length; n++) {
                                    u(i[n].U)
                                }
                                this._sendBRS(e), t.SUS = null
                            }
                        }
                    }
                }
            }, {
                key: "sendDotSUS", value: function (e) {
                    if (e && e.SUS)for (var t = 0; t < e.SUS.length; t++) {
                        var i = e.SUS[t].U;
                        u(i)
                    }
                }
            }, {
                key: "sendDotSUE", value: function (e) {
                    if (e && e.SUE)for (var t = 0; t < e.SUE.length; t++) {
                        var i = e.SUE[t].U;
                        u(i)
                    }
                }
            }, {
                key: "_sendBRS", value: function (e) {
                    switch (this.addata.P) {
                        case 1:
                            this._emitter.emit("playerpreadinit", this.addata.pipList, e);
                            break;
                        case 3:
                            this._emitter.emit("playerminadinit", this.addata.pipList, e);
                            break;
                        case 2:
                            this._emitter.emit("playerlasteadinit", this.addata.pipList, e)
                    }
                }
            }, {
                key: "sendVC", value: function (e) {
                    if (!(!this.addata || e < 0 || e >= this.addata.VAL.length)) {
                        var t = this.addata.VAL[this.curnum];
                        if (void 0 !== t.VT) {
                            l(t.VC, "js")
                        }
                    }
                }
            }, {
                key: "sendSUE", value: function (e) {
                    if (!(!this.addata || e < 0 || e >= this.addata.VAL.length)) {
                        var t = this.addata.VAL[e];
                        if ("hvideo" !== t.RST) {
                            var i = t.SUE;
                            if (i) {
                                for (var n = 0; n < i.length; n++) {
                                    u(i[n].U)
                                }
                                t.SUE = null
                            }
                        }
                    }
                }
            }, {
                key: "sendSU", value: function (e) {
                    if (!this.addata.urls[this.curnum] || !this.addata.VAL[this.curnum].SU)return !1;
                    var t = e - this.addata.urls[this.curnum].startTime;
                    if (this.addata) {
                        var i = this.addata.VAL[this.curnum].SU;
                        if (void 0 !== i) {
                            this._sucache || (this._sucache = []);
                            for (var n = 0; n < i.length; n++) {
                                var s = 1e3 * (t - i[n].T);
                                s >= 0 && s < 1e3 && !i[n].ifsend && (i[n].ifsend = !0, u(i[n].U))
                            }
                        }
                    }
                }
            }, {
                key: "sendCUM", value: function () {
                    if (this.addata) {
                        var e = this.addata.VAL[this.curnum], t = e.CUM;
                        if (void 0 !== t)for (var i = 0; i < t.length; i++) {
                            var n = t[i].U;
                            u(n)
                        }
                    }
                }
            }, {
                key: "sendVIEW", value: function (e) {
                    if (e)for (var t = e.IMP, i = 0; i < t.length; i++)t[i].U && u(t[i].U)
                }
            }, {
                key: "_loadBRS", value: function () {
                    var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "";
                    (/^https/.test(e) || /^https/.test(location.href) && /^\/{2}:/.test(e)) && l(e, "js")
                }
            }, {
                key: "getOSNum", value: function () {
                    return 2
                }
            }, {
                key: "sendProcessLog", value: function (e) {
                    var t = {};
                    for (var i in this.logparam)t[i] = this.logparam[i];
                    if (t.sp = e.sp, t.p = e.p, t.cd = e.cd, t.reqid = this.psid, e.VAL) {
                        for (var n = "", s = 0, a = e.VAL.length; s < a; s++)n += e.VAL[s].IE + ",";
                        t.ie = n
                    }
                    e.ext || (e.ext = {}), e.ext.psid = this.psid, e.ext.REQID || (e.ext.REQID = this.addata.REQID), e.ext.ua = navigator.userAgent, e.ext.wintype = this.wintype;
                    var o = "";
                    for (var r in e.ext)o += r + ":" + e.ext[r] + ";";
                    t.ext = encodeURIComponent(o), u("//count.atm.youku.com/mlog?" + d(t))
                }
            }], [{
                key: "sendPauseAdCUM", value: function (e) {
                    var t = e.VAL[0].CUM;
                    if (t)for (var i = 0; i < t.length; i++)u(t[i].U)
                }
            }, {
                key: "sendPauseAdSUS", value: function (e) {
                    var t = e.VAL[0].SUS;
                    if (t)for (var i = 0; i < t.length; i++)u(t[i].U)
                }
            }]), e
        }(), $ = function () {
            function e(t) {
                x(this, e), this.container = t.container, this._state = "INIT", this._iffirst = !0, this._video = null, this._emitter = null, this.data = {}, this.data.index = 0, this._intervalTimer = null, this._isRequestEnd = !1, this._videoCanPlay = !1, this.currentTime = 0, this.adType = j.FRONT, this._logger = null, this.errorCount = 4, this._createPlayer(), t.data && this.initData(t.data)
            }

            return C(e, null, [{
                key: "ADEvents", get: function () {
                    return G
                }
            }]), C(e, [{
                key: "_bindPlayerEvents", value: function () {
                    var e = this;
                    this._video.on(G.play, function (t) {
                        e._onPlay(t)
                    }), this._video.on(G.canplay, function () {
                        e._onCanplay(), e._component.hideLoading()
                    }), this._video.on(G.ended, function (t) {
                        e._onEnd(t)
                    }), this._video.on(G.pause, function () {
                        e._onPause()
                    }), this._video.on(G.timeupdate, function (t) {
                        e._onTimeUpdate(t)
                    }), this._video.on(G.playing, function (t) {
                        e._onplaying(t)
                    }), this._video.on(G.waiting, function () {
                        e._component.showLoading()
                    }), this._video.on(G.error, function (t) {
                        e._onError(t)
                    }), this._video.on("safariAboart", function () {
                    })
                }
            }, {
                key: "hide", value: function () {
                    this.container.style.display = "none", this._video && this._video.pause()
                }
            }, {
                key: "show", value: function () {
                    this.container.style.display = "block"
                }
            }, {
                key: "_onPlay", value: function () {
                    this._component.show();
                    var e = {};
                    e.type = this.adType, e.iffirst = this._iffirst, this._changeState(B.PLAY, e), (P.isSafari || this._videoCanPlay) && this._onCanplay()
                }
            }, {
                key: "_onEnd", value: function () {
                    if (this._state === B.END)return !1;
                    if (this.data && this.data) {
                        var e = this.data.index;
                        this._logger.sendSUE(e)
                    }
                    this._isRequestEnd = !1, this._iffirst = !0, this._videoCanPlay = !1, this._component.hide(), this.hide(), this._changeState(B.END)
                }
            }, {
                key: "_onPause", value: function () {
                }
            }, {
                key: "_onTimeUpdate", value: function (e) {
                    if (!(this.data && this.data.VAL && this.data.urls && this._video))return !1;
                    var t = this.data.index, i = this.data.VAL[this._video._curIndex], n = this.data.urls[this._video._curIndex];
                    if (!i || !n)return !1;
                    t < this.data.urls.length && e.currentTime >= this.data.urls[t].endTime && (this._logger.sendSUE(t), ++this.data.index < this.data.urls.length && (this._logger.changeNum(this.data.index), this._logger.sendSUS(this.data.index))), this._logger.sendSU(e.currentTime)
                }
            }, {
                key: "_onplaying", value: function () {
                }
            }, {
                key: "_onCanplay", value: function (e) {
                    if (this.data && !(this.data.VAL.length < 1)) {
                        if (this._video.play(), this._videoCanPlay = !0, this.data.index = this._video._curIndex, this._logger.changeNum(this.data.index), this._logger.sendSUS(this.data.index), this._state !== B.PLAY)return !1;
                        var t = e || {};
                        this._iffirst && (this._iffirst = !1), t.type = this.adType, t.iffirst = this._iffirst, this._changeState(B.PLAYING, t)
                    }
                }
            }, {
                key: "_onError", value: function (e) {
                    if (--this.errorCount >= 0 && this.data.index < this.data.urls.length - 1) {
                        var t = this.data.urls[this.data.index].endTime + .2;
                        this.data.index++, this._video.seek(t), this._logger.changeNum(this.data.index), this._errorAdCount++, this._video.play()
                    } else this._errorAdCount++, this.data.index++, this._onEnd(e)
                }
            }, {
                key: "_changeState", value: function (e, t) {
                    t || (t = {}), t.totalAdCount = this.data && this.data.urls ? this.data.urls.length : 0, t.errorAdCount = this._errorAdCount, t.pipCount = this.data && this.data.pipCount ? this.data.pipCount : 0, t.currentIndex = this.data ? this.data.index : 0;
                    var i = {state: e, type: this.adType, data: t};
                    t && (i.iffirst = t.iffirst), this._state = e, this.emit(e, i)
                }
            }, {
                key: "_createPlayer", value: function () {
                    this._video || (this._video = new F({
                        container: this.container,
                        source: [],
                        duration: 0
                    }), this._emitter = this._video.eventEmitter, this._video.id = "component" + (new Date).getTime(), W.install(this.container, this._video, {AdLayer: X}), this._component = this._video.ui.getComponent("AdLayer"), this._component.adPlayer(this), this._bindPlayerEvents())
                }
            }, {
                key: "_resetPlayer", value: function () {
                    this.errorCount = 4, this._video.setSource({source: this.data.urls, duration: this.data.totalTime})
                }
            }, {
                key: "initData", value: function (e, t) {
                    if (e && e.VAL && (t = {psid: ""}, e = p(e), 0 !== e.VAL.length && 0 !== e.totalTime)) {
                        if (this.data = e, this._resetPlayer(), this._component.updateData(this.data), !this._logger) {
                            this._logger = new Z({}, t.psid, "0.1.1", "interior", this._emitter)
                        }
                        this._logger.reset(this.data, this.adType), this.show()
                    }
                }
            }, {
                key: "sendCUM", value: function () {
                    this._logger.sendCUM()
                }
            }, {
                key: "sendVIEW", value: function (e) {
                    this._logger.sendVIEW(e)
                }
            }, {
                key: "skip", value: function (e) {
                    this._logger.sendVIEW(e), this._video.pause(), this._onEnd()
                }
            }, {
                key: "play", value: function () {
                    this._video && this._video.play()
                }
            }, {
                key: "pause", value: function () {
                    this._video && this._video.pause()
                }
            }, {
                key: "setVolume", value: function (e) {
                    this._video.setVolume(e)
                }
            }, {
                key: "setMuted", value: function (e) {
                    this._video.setMuted(e)
                }
            }, {
                key: "on", value: function (e, t) {
                    this._emitter.on(e, t)
                }
            }, {
                key: "emit", value: function (e, t) {
                    this._emitter.emit(e, t)
                }
            }, {
                key: "fire", value: function (e, t) {
                    this._emitter.removeListener(e, t)
                }
            }]), e
        }();
        e.exports = $
    }, function (e, t, i) {
        "use strict";
        (function (t) {/*!
         * The buffer module from node.js, for the browser.
         *
         * @author   Feross Aboukhadijeh <feross@feross.org> <http://feross.org>
         * @license  MIT
         */
            function n(e, t) {
                if (e === t)return 0;
                for (var i = e.length, n = t.length, s = 0, a = Math.min(i, n); s < a; ++s)if (e[s] !== t[s]) {
                    i = e[s], n = t[s];
                    break
                }
                return i < n ? -1 : n < i ? 1 : 0
            }

            function s(e) {
                return t.Buffer && "function" == typeof t.Buffer.isBuffer ? t.Buffer.isBuffer(e) : !(null == e || !e._isBuffer)
            }

            function a(e) {
                return Object.prototype.toString.call(e)
            }

            function o(e) {
                return !s(e) && ("function" == typeof t.ArrayBuffer && ("function" == typeof ArrayBuffer.isView ? ArrayBuffer.isView(e) : !!e && (e instanceof DataView || !!(e.buffer && e.buffer instanceof ArrayBuffer))))
            }

            function r(e) {
                if (k.isFunction(e)) {
                    if (T)return e.name;
                    var t = e.toString(), i = t.match(w);
                    return i && i[1]
                }
            }

            function u(e, t) {
                return "string" == typeof e ? e.length < t ? e : e.slice(0, t) : e
            }

            function l(e) {
                if (T || !k.isFunction(e))return k.inspect(e);
                var t = r(e);
                return "[Function" + (t ? ": " + t : "") + "]"
            }

            function d(e) {
                return u(l(e.actual), 128) + " " + e.operator + " " + u(l(e.expected), 128)
            }

            function h(e, t, i, n, s) {
                throw new b.AssertionError({message: i, actual: e, expected: t, operator: n, stackStartFunction: s})
            }

            function c(e, t) {
                e || h(e, !0, t, "==", b.ok)
            }

            function f(e, t, i, r) {
                if (e === t)return !0;
                if (s(e) && s(t))return 0 === n(e, t);
                if (k.isDate(e) && k.isDate(t))return e.getTime() === t.getTime();
                if (k.isRegExp(e) && k.isRegExp(t))return e.source === t.source && e.global === t.global && e.multiline === t.multiline && e.lastIndex === t.lastIndex && e.ignoreCase === t.ignoreCase;
                if (null !== e && "object" == typeof e || null !== t && "object" == typeof t) {
                    if (o(e) && o(t) && a(e) === a(t) && !(e instanceof Float32Array || e instanceof Float64Array))return 0 === n(new Uint8Array(e.buffer), new Uint8Array(t.buffer));
                    if (s(e) !== s(t))return !1;
                    r = r || {actual: [], expected: []};
                    var u = r.actual.indexOf(e);
                    return -1 !== u && u === r.expected.indexOf(t) || (r.actual.push(e), r.expected.push(t), p(e, t, i, r))
                }
                return i ? e === t : e == t
            }

            function v(e) {
                return "[object Arguments]" == Object.prototype.toString.call(e)
            }

            function p(e, t, i, n) {
                if (null === e || void 0 === e || null === t || void 0 === t)return !1;
                if (k.isPrimitive(e) || k.isPrimitive(t))return e === t;
                if (i && Object.getPrototypeOf(e) !== Object.getPrototypeOf(t))return !1;
                var s = v(e), a = v(t);
                if (s && !a || !s && a)return !1;
                if (s)return e = A.call(e), t = A.call(t), f(e, t, i);
                var o, r, u = S(e), l = S(t);
                if (u.length !== l.length)return !1;
                for (u.sort(), l.sort(), r = u.length - 1; r >= 0; r--)if (u[r] !== l[r])return !1;
                for (r = u.length - 1; r >= 0; r--)if (o = u[r], !f(e[o], t[o], i, n))return !1;
                return !0
            }

            function m(e, t, i) {
                f(e, t, !0) && h(e, t, i, "notDeepStrictEqual", m)
            }

            function y(e, t) {
                if (!e || !t)return !1;
                if ("[object RegExp]" == Object.prototype.toString.call(t))return t.test(e);
                try {
                    if (e instanceof t)return !0
                } catch (e) {
                }
                return !Error.isPrototypeOf(t) && !0 === t.call({}, e)
            }

            function _(e) {
                var t;
                try {
                    e()
                } catch (e) {
                    t = e
                }
                return t
            }

            function g(e, t, i, n) {
                var s;
                if ("function" != typeof t)throw new TypeError('"block" argument must be a function');
                "string" == typeof i && (n = i, i = null), s = _(t), n = (i && i.name ? " (" + i.name + ")." : ".") + (n ? " " + n : "."), e && !s && h(s, i, "Missing expected exception" + n);
                var a = "string" == typeof n, o = !e && k.isError(s), r = !e && s && !i;
                if ((o && a && y(s, i) || r) && h(s, i, "Got unwanted exception" + n), e && s && i && !y(s, i) || !e && s)throw s
            }

            var k = i(171), E = Object.prototype.hasOwnProperty, A = Array.prototype.slice, T = function () {
                return "foo" === function () {
                    }.name
            }(), b = e.exports = c, w = /\s*function\s+([^\(\s]*)\s*/;
            b.AssertionError = function (e) {
                this.name = "AssertionError", this.actual = e.actual, this.expected = e.expected, this.operator = e.operator, e.message ? (this.message = e.message, this.generatedMessage = !1) : (this.message = d(this), this.generatedMessage = !0);
                var t = e.stackStartFunction || h;
                if (Error.captureStackTrace) Error.captureStackTrace(this, t); else {
                    var i = new Error;
                    if (i.stack) {
                        var n = i.stack, s = r(t), a = n.indexOf("\n" + s);
                        if (a >= 0) {
                            var o = n.indexOf("\n", a + 1);
                            n = n.substring(o + 1)
                        }
                        this.stack = n
                    }
                }
            }, k.inherits(b.AssertionError, Error), b.fail = h, b.ok = c, b.equal = function (e, t, i) {
                e != t && h(e, t, i, "==", b.equal)
            }, b.notEqual = function (e, t, i) {
                e == t && h(e, t, i, "!=", b.notEqual)
            }, b.deepEqual = function (e, t, i) {
                f(e, t, !1) || h(e, t, i, "deepEqual", b.deepEqual)
            }, b.deepStrictEqual = function (e, t, i) {
                f(e, t, !0) || h(e, t, i, "deepStrictEqual", b.deepStrictEqual)
            }, b.notDeepEqual = function (e, t, i) {
                f(e, t, !1) && h(e, t, i, "notDeepEqual", b.notDeepEqual)
            }, b.notDeepStrictEqual = m, b.strictEqual = function (e, t, i) {
                e !== t && h(e, t, i, "===", b.strictEqual)
            }, b.notStrictEqual = function (e, t, i) {
                e === t && h(e, t, i, "!==", b.notStrictEqual)
            }, b.throws = function (e, t, i) {
                g(!0, e, t, i)
            }, b.doesNotThrow = function (e, t, i) {
                g(!1, e, t, i)
            }, b.ifError = function (e) {
                if (e)throw e
            };
            var S = Object.keys || function (e) {
                    var t = [];
                    for (var i in e)E.call(e, i) && t.push(i);
                    return t
                }
        }).call(t, i(51))
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(2), i(0), i(1), i(4), i(3), i(6)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o) {
            "use strict";
            function r(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var u = r(t), l = r(i), d = r(n), h = r(s), c = r(a), f = r(o), v = function (e) {
                function t(e, i, n) {
                    return (0, l.default)(this, t), (0, h.default)(this, (t.__proto__ || (0, u.default)(t)).call(this, e, i, n))
                }

                return (0, c.default)(t, e), (0, d.default)(t, [{
                    key: "setUp", value: function (e) {
                        this.hideStatus = !1, this.dom = this.G(".player_ad", this.selector), this.countdown = this.G(".player_ad_count span", this.dom), this.skip = this.G(".player_ad_skip", this.dom), this.more = this.G(".player_ad_more", this.dom), this.big = this.G(".player_ad_big", this.dom), this.domEvent()
                    }
                }, {
                    key: "setTotalTime", value: function (e) {
                        this.countdown.innerHTML = e
                    }
                }, {
                    key: "hideMore", value: function () {
                        this.big.removeEventListener("click", this.moreEvent, !1), this.more.style.display = "none", this.hideStatus = !0
                    }
                }, {
                    key: "showMore", value: function () {
                        this.hideStatus && (this.hideStatus = !1, this.big.addEventListener("click", this.moreEvent, !1), this.more.style.display = "block")
                    }
                }, {
                    key: "domEvent", value: function () {
                        var e = this;
                        this.skip.addEventListener("click", function () {
                            return e.EventManager.fire("ad:skip")
                        }, !1), this.moreEvent = function () {
                            return e.EventManager.fire("ad:more")
                        }, this.big.addEventListener("click", this.moreEvent, !1), this.more.addEventListener("click", this.moreEvent, !1)
                    }
                }]), t
            }(f.default);
            e.default = v
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(2), i(0), i(1), i(4), i(3), i(6), i(85), i(12)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o, r, u) {
            "use strict";
            function l(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var d = l(t), h = l(i), c = l(n), f = l(s), v = l(a), p = l(o), m = l(r), y = l(u), _ = function (e) {
                function t(e, i, n) {
                    (0, h.default)(this, t);
                    var s = (0, f.default)(this, (t.__proto__ || (0, d.default)(t)).call(this, e, i, n));
                    return s.inMinScreen = !1, s
                }

                return (0, v.default)(t, e), (0, c.default)(t, [{
                    key: "setUp", value: function (e) {
                        this.config = e[0], this.render("livebox", {
                            className: "live_player",
                            innerHTML: this.publicTemplate("live") + (0, m.default)() + '<livebox class="live_adplayer" id="live_adplayer"></livebox>'
                        }), this.createTemplate("livebox", {
                            className: "order_player_container",
                            innerHTML: ""
                        }), this.shadowTimer = null, this.customer_volume = 0, this.element(this.config)
                    }
                }, {
                    key: "hideAdplayer", value: function () {
                        var e = document.querySelector(".live_adplayer");
                        e && (e.style.display = "none")
                    }
                }, {
                    key: "showAdplayer", value: function () {
                        var e = document.querySelector(".live_adplayer");
                        e && (e.style.display = "block")
                    }
                }, {
                    key: "posterShow", value: function () {
                        this.liveposter.style.display = "block"
                    }
                }, {
                    key: "posterHide", value: function () {
                        this.liveposter.style.display = "none"
                    }
                }, {
                    key: "nativePoster", value: function (e, t) {
                        e.setAttribute("poster", t)
                    }
                }, {
                    key: "setPoster", value: function (e) {
                        this.liveposter.style.backgroundImage = "url(" + e + ")"
                    }
                }, {
                    key: "element", value: function () {
                        if (this.emLoad = this.selector.querySelector(".live_load_first"), this.emShadow = this.selector.querySelector(".live_shadow"), this.liveposter = this.selector.querySelector(".live_poster"), this.liveplay = this.selector.querySelector(".live_icon_play"), this.livepause = this.selector.querySelector(".live_icon_pause"), this.livebackground = this.selector.querySelector(".live_background"), this.dashborad = this.selector.querySelector(".live_dashboard"), this.liveplaybtn = this.selector.querySelector(".live_play_btn"), this.livefullscreen = this.selector.querySelector(".live_icon_full"), this.liveexitscreen = this.selector.querySelector(".live_icon_half"), this.muteBtn = this.selector.querySelectorAll(".live_icon_mute")[0], this.volumeBtn = this.selector.querySelectorAll(".live_icon_volume")[0], this.volumeRange = this.selector.querySelectorAll(".live_volume_range")[0], this.volumeBox = this.selector.querySelectorAll(".live_volume")[0], this.volume = parseFloat(localStorage.getItem("live_volume")) || 1, this.volumeCurrent = this.selector.querySelectorAll(".live_volume_current")[0], this.tipBox = this.selector.querySelectorAll(".live_little")[0], this.tip = this.tipBox.querySelectorAll(".live_little_tip")[0], this.config.hideplay && this.controlBtnHide(), this.config.withoutfull && this.controlFullHide(), this.config.pc || (this.volumeBox.style.display = "none", this.volumeRange.style.display = "none", this.volumeBtn.style.display = "none"), this.config.hidecontrol)return void(this.dashborad.style.display = "none");
                        this.domEvent(), y.default.iku && y.default.oldIku && (this.livefullscreen.style.display = "none")
                    }
                }, {
                    key: "tipShow", value: function (e) {
                        this.timerTip && clearTimeout(this.timerTip), this.timerTip = null, this.tip.innerHTML = e, this.tipStatus() || (this.tipBox.style.display = "block"), this.tipHide()
                    }
                }, {
                    key: "tipHide", value: function () {
                        var e = this;
                        this.timerTip = setTimeout(function () {
                            e.tipBox.style.display = "none"
                        }, 2e3)
                    }
                }, {
                    key: "tipStatus", value: function () {
                        return "block" == this.tipBox.style.display
                    }
                }, {
                    key: "emLoadHide", value: function () {
                        this.emLoad.style.display = "none"
                    }
                }, {
                    key: "emLoadShow", value: function () {
                        this.emLoad.style.display = "block"
                    }
                }, {
                    key: "showLivePlayBtn", value: function () {
                        this.liveplaybtn.style.display = "block"
                    }
                }, {
                    key: "hideLivePlayBtn", value: function () {
                        this.liveplaybtn.style.display = "none"
                    }
                }, {
                    key: "backHide", value: function () {
                        this.livebackground.style.display = "none"
                    }
                }, {
                    key: "backShow", value: function () {
                        this.livebackground.style.display = "block"
                    }
                }, {
                    key: "controlBtnHide", value: function () {
                        this.livepause.style.display = "none", this.liveplay.style.display = "none"
                    }
                }, {
                    key: "controlFullHide", value: function () {
                        this.livefullscreen.style.display = "none"
                    }
                }, {
                    key: "controlFullShow", value: function () {
                        this.livefullscreen.style.display = "flex"
                    }
                }, {
                    key: "show", value: function () {
                        this.dom.style.display = "block"
                    }
                }, {
                    key: "playState", value: function () {
                        this.config.hideplay || (this.livepause.style.display = "none", this.liveplay.style.display = "flex")
                    }
                }, {
                    key: "pauseState", value: function () {
                        this.config.hideplay || (this.liveplay.style.display = "none", this.livepause.style.display = "flex")
                    }
                }, {
                    key: "bigButtonFn", value: function () {
                        this.EventManager.fire("video:play"), this.posterHide()
                    }
                }, {
                    key: "dashDomShow", value: function () {
                        this.dashborad.style.display = "block", this.backShow()
                    }
                }, {
                    key: "dashDomHide", value: function () {
                        this.dashborad.style.display = "none", this.backHide()
                    }
                }, {
                    key: "dashShow", value: function () {
                        var e = this;
                        this.config.hidecontrol || (this.dashDomShow(), this.shadowTimer = setTimeout(function () {
                            return e.dashHide()
                        }, 4e3))
                    }
                }, {
                    key: "dashHide", value: function () {
                        this.clearDashTimer(), this.config.alwaysShowProgress || this.dashDomHide()
                    }
                }, {
                    key: "bigButtonHideFn", value: function () {
                        this.liveplaybtn.style.display = "none"
                    }
                }, {
                    key: "setMock", value: function (e) {
                        this.livefullscreen.setAttribute("data-spm-click", e), this.livefullscreen.setAttribute("data-spm", "sbutton")
                    }
                }, {
                    key: "playStating", value: function () {
                        this.liveplaybtn.style.display = "none", this.pauseState(), this.posterHide()
                    }
                }, {
                    key: "shadowShow", value: function () {
                        this.emShadow.style.display = "block"
                    }
                }, {
                    key: "shadowHide", value: function () {
                        this.emShadow.style.display = "none"
                    }
                }, {
                    key: "clearDashTimer", value: function () {
                        this.shadowTimer && (clearTimeout(this.shadowTimer), this.shadowTimer = null)
                    }
                }, {
                    key: "domEvent", value: function () {
                        var e = this;
                        if (this.click = "click", this.liveplaybtn.addEventListener(this.click, function () {
                                e.bigButtonFn()
                            }, !1), this.liveplay.addEventListener(this.click, function () {
                                e.EventManager.fire("video:play")
                            }, !1), this.config.pc) {
                            var t = 0;
                            this.emShadow.addEventListener("click", function (i) {
                                e.inMinScreen || (t++, setTimeout(function () {
                                    1 == t ? e.EventManager.fire("video:auto") : 2 == t && e.EventManager.fire("shadow:dbclick"), t = 0
                                }, 300))
                            }, !1), y.default.isIpad || (this.emShadow.addEventListener("mouseenter", function () {
                                e.clearDashTimer(), e.dashShow()
                            }), this.emShadow.addEventListener("mousemove", function () {
                                e.clearDashTimer(), e.dashShow()
                            }), this.emShadow.addEventListener("mouseleave", function () {
                                e.shadowTimer || (e.shadowTimer = setTimeout(function () {
                                    return e.dashHide()
                                }, 4e3))
                            }))
                        } else this.emShadow.addEventListener("click", function () {
                            e.clearDashTimer(), e.dashShow()
                        });
                        this.livepause.addEventListener(this.click, function () {
                            e.EventManager.fire("video:pause"), e.EventManager.fire("ad:pause")
                        }, !1), this.liveexitscreen.addEventListener(this.click, function () {
                            e.EventManager.fire("screen:change")
                        }, !1), this.livefullscreen.addEventListener(this.click, function () {
                            e.EventManager.fire("screen:change")
                        }, !1);
                        var i = function () {
                            return e.mute()
                        }, n = function () {
                            return e.nomute()
                        }, s = function (t) {
                            return e.volumeChange(t)
                        };
                        this.volumeBtn.addEventListener("click", i, !1), this.muteBtn.addEventListener("click", n, !1), this.volumeRange.addEventListener("change", s, !1)
                    }
                }, {
                    key: "setMinScreenMode", value: function (e) {
                        this.inMinScreen = e
                    }
                }, {
                    key: "mute", value: function () {
                        this.volumeProgress(0), this.volume = 0, this.EventManager.fire("volume:change", {value: this.volume}), this.muteDisplay()
                    }
                }, {
                    key: "muteDisplay", value: function () {
                        this.volumeBtn.style.display = "none", this.muteBtn.style.display = "block"
                    }
                }, {
                    key: "nomuteDisplay", value: function () {
                        this.muteBtn.style.display = "none", this.volumeBtn.style.display = "block"
                    }
                }, {
                    key: "volumeProgress", value: function (e) {
                        this.volumeRange.value = e, this.volumeCurrent.style.width = 100 * e + "%"
                    }
                }, {
                    key: "nomute", value: function () {
                        this.customer_volume || (this.customer_volume = .5), this.volumeProgress(this.customer_volume), this.volume = this.customer_volume, this.EventManager.fire("volume:change", {value: this.volume}), this.nomuteDisplay()
                    }
                }, {
                    key: "volumeChange", value: function () {
                        var e = this.volumeRange.value;
                        this.volume = e, this.customer_volume = this.volume, 0 == this.volume ? this.muteDisplay() : this.nomuteDisplay(), this.volumeCurrent.style.width = 100 * this.volume + "%", this.EventManager.fire("volume:change", {value: this.volume})
                    }
                }, {
                    key: "fullToExit", value: function () {
                        this.config.withoutfull || (this.liveexitscreen.style.display = "none", this.livefullscreen.style.display = "flex")
                    }
                }, {
                    key: "exitToFull", value: function () {
                        this.config.withoutfull || (this.liveexitscreen.style.display = "flex", this.livefullscreen.style.display = "none")
                    }
                }]), t
            }(p.default);
            e.default = _
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (i, o) {
            s = [t], n = o, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e) {
            "use strict";
            Object.defineProperty(e, "__esModule", {value: !0}), e.default = function () {
                return '<livebox class="live_little">\n                <livebox class="live_little_tip"></livebox>\n            </livebox>\n            <livebox class="live_dashboard">\n                <livebox class="tlcomponent">\n                <div class="tlbase">\n                    \x3c!--<div class="thlload"></div>--\x3e\n                    <div class="tlload"></div>\n                    <div class="tlplay"></div>\n                    <div class="tlpoint"></div>\n                    <div class="tltip">返回直播</div>\n                </div></livebox>\n                <livebox class="live_controls">\n                    <livebox class="live_left_controls">\n                        <livebox class="live_icon live_icon_play"></livebox>\n                        <livebox class="live_icon live_icon_pause" title="暂停"></livebox>\n                    </livebox>\n                    <livebox class="live_right_controls">\n                        <livebox class="live_icon_quality">\n                            <span class="live_icon_qspan">标清</span>\n                            <livebox class="live_panel_quality">\n                                <livebox class="live_quality_ul"></livebox>\n                                <livebox class="live_mask"></livebox>\n                            </livebox>\n                        </livebox>\n                        <livebox class="live_icon live_icon_mute"></livebox>\n                        <livebox class="live_icon live_icon_volume"></livebox>\n                        <livebox class="live_volume">\n                            <livebox class="live_volume_slider live_volume_slider_hover">\n                                <input class="live_volume_range" type="range" min="0" max="1" step="0.1" value="0.5">\n                                <livebox class="live_volume_current" style="width:50%"></livebox>\n                            </livebox>\n                        </livebox>\n                        \n                        <livebox class="live_icon live_icon_full"></livebox>\n                        <livebox class="live_icon live_icon_half"></livebox>\n                    </livebox>\n                </livebox>\n            </livebox>\n            <livebox class="live_scroll_view">\n                <livebox class="live_scroll_box">\n                    <livebox class="live_scroll_ul"></livebox>\n                </livebox>\n            </livebox>\n            <livebox class="live_block"></livebox>'
            }
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [e, i(80)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t) {
            "use strict";
            var i = function (e) {
                return e && e.__esModule ? e : {default: e}
            }(t);
            e.exports = i.default
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(9), i(26), i(2), i(0), i(1), i(4), i(35), i(3), i(88), i(59), i(89), i(52), i(8), i(5), i(61), i(23), i(58), i(81), i(64)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o, r, u, l, d, h, c, f, v, p, m, y, _, g) {
            "use strict";
            function k(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var E = k(t), A = k(i), T = k(n), b = k(s), w = k(a), S = k(o), P = k(r), L = k(u), I = k(l), x = k(d), C = k(h), D = k(c), M = k(f), U = k(v), O = k(p), R = k(y), N = k(_), V = k(g), F = function (e) {
                function t(e, i) {
                    (0, b.default)(this, t);
                    var n = (0, S.default)(this, (t.__proto__ || (0, T.default)(t)).call(this, e, i));
                    return n.TAG = "Live:Core", n.EventManager = new x.default, n.R1 = window._sce_r_skjhfnck(), n.watcher(), n.isChanged = !1, i.R1 = n.R1, n.LiveApi = new I.default(n.config.liveid, n.EventManager, i), n.cna = n.LiveApi.utid, n.bufSecs = 0, n.ad_running = !1, n.linktype = U.default.appName, n.playType = "hls", n.firstFrameData = {}, n.errorCode = null, n.hadFrameLog = !1, n.firstRequest = !0, n.defaultQuality = 0, n.psid = "", n.adPlayer = null, n.streamStatus = 0, n.hadError = !1, n.full = !1, n.limitLocked = !1, n.quality = 2, n.bufError = !1, n.lockNow = !1, n.init(), n.logStartTime = Date.now(), n.firstFrameData.livePermissionDuration = 0, i.data ? (M.default.i(n.TAG, "liveservice done"), n.lData = i.data.data, i.data.now ? n.lData.now = i.data.now : n.lData.now = Math.floor(Date.now() / 1e3), n.liveServiceDone()) : n.LiveApi.init(), n
                }

                return (0, L.default)(t, e), (0, w.default)(t, [{
                    key: "getUtid", value: function () {
                        var e = window.utdid || "";
                        e = e.trim();
                        try {
                            if (!e) {
                                var t = navigator.userAgent.match(/(UTDID)(.*?);/gi);
                                if (t) {
                                    e = t[0].replace(/(UTDID|\s|;)?/gi, "")
                                }
                            }
                        } catch (e) {
                        }
                        return e
                    }
                }, {
                    key: "abort", value: function () {
                        this.onAbort()
                    }
                }, {
                    key: "onAbort", value: function () {
                    }
                }, {
                    key: "ended", value: function (e) {
                        this.onEnded(e)
                    }
                }, {
                    key: "onEnded", value: function (e) {
                    }
                }, {
                    key: "init", value: function () {
                    }
                }, {
                    key: "changeReportor", value: function () {
                        this.bufError = !0
                    }
                }, {
                    key: "liveServiceError", value: function (e) {
                    }
                }, {
                    key: "getStreamInfo", value: function () {
                        return {
                            area: this.stream.areaCode,
                            dmaCode: this.lData.dmaCode || this.stream.dmaCode,
                            clientIp: this.stream.clientIp
                        }
                    }
                }, {
                    key: "livePlayRefresh", value: function (e) {
                        var t = this, i = this.publicWd(e), n = this.getUtid();
                        i.match && setTimeout(function () {
                            t.LiveApi.livePermission(t.streamDefault, t.defaultQuality, {
                                psid: t.psid,
                                params: e.params,
                                utdid: n
                            }), t.reportor.refreshLog((0, A.default)(e))
                        }, i.time), M.default.i(this.TAG, "livePlayRefresh :" + (0, A.default)(e))
                    }
                }, {
                    key: "hideGoApp", value: function () {
                    }
                }, {
                    key: "publicWd", value: function (e) {
                        var t = U.default.appName, i = e.devices || [], n = e.areas || [], s = Math.floor(Math.random() * e.dt * 1e3), a = !1;
                        if (-1 != i.indexOf(t)) {
                            var o = this.stream.areaCode;
                            "0" !== o ? -1 != n.indexOf(o) && (a = !0) : a = !0
                        }
                        return {time: s, match: a}
                    }
                }, {
                    key: "hlsP2pStatusChange", value: function (e, t) {
                        this.reportor && this.reportor.reset({data_source: t.status ? 3 : 1})
                    }
                }, {
                    key: "changeFPSLog", value: function (e) {
                        if (this.reportor) {
                            var t = e || 25;
                            this.reportor.reset({fps: t})
                        }
                    }
                }, {
                    key: "liveLoggerDone", value: function () {
                        if (this.reportor)return void this.reportor.reset(this.stream);
                        this.reportor = new D.default(this.createReportData()), M.default.i(this.TAG, "reportor was created")
                    }
                }, {
                    key: "createReportData", value: function () {
                        var e = this.streamDefault.name, t = this.streamDefault.sceneId, i = this.getStreamInfo();
                        return (0, E.default)({}, this.lData, {
                            utdid: this.getUtid(),
                            ccode: this.config.ccode,
                            pc: this.config.pc,
                            view: e,
                            vvid: +new Date + Math.floor(1e7 * Math.random()),
                            atp: this.config.autoplay || 0,
                            area: i.area,
                            dma: i.dmaCode,
                            oip: encodeURIComponent(i.clientIp),
                            url: encodeURIComponent(location.href),
                            rurl: encodeURIComponent(document.referrer),
                            full: this.full || 0,
                            ext: encodeURIComponent("site=inner&sceneId=" + t),
                            cna: this.cna
                        }, this.stream)
                    }
                }, {
                    key: "liveStreamCallBack", value: function () {
                    }
                }, {
                    key: "changeToLive", value: function (e) {
                        var t = this;
                        this.firstFrameData.durationType = 1, this.logStartTime = Date.now();
                        var i = this.getUtid(), n = {utdid: i};
                        n || (n = {}), e && (n.params = e.params), M.default.i(this.TAG, "changetolive"), this.uepLogType = "errorbeforeplay", e || (e = {}), e.dt || (e.dt = 3);
                        var s = Math.floor(Math.random() * e.dt * 1e3);
                        setTimeout(function () {
                            t.LiveApi.livePermission(t.streamDefault, 0, n)
                        }, s)
                    }
                }, {
                    key: "viewChange", value: function (e) {
                        var t = this.lData.stream.filter(function (t) {
                            return t.sceneId == e
                        });
                        if (!t.length)return void console.log("未匹配任一视角");
                        this.streamDefault = t[0], this.uepLogType = "errorbeforeplay";
                        var i = this.config.pc ? this.streamDefault.bDefaultQuality : this.streamDefault.h5DefaultQuality;
                        this.defaultQuality = i;
                        var n = this.getUtid();
                        this.LiveApi.livePermission(this.streamDefault, 0, {utdid: n}), this.isChanged = !0
                    }
                }, {
                    key: "getPlayType", value: function (e) {
                        var t = e.playType;
                        return "rtmp" == t && (t = "flv"), t
                    }
                }, {
                    key: "updateQuality", value: function (e) {
                    }
                }, {
                    key: "copyMine", value: function (e) {
                        var t = [];
                        return e.forEach(function (e) {
                            var i = {};
                            for (var n in e)e.hasOwnProperty(n) && (i[n] = e[n]);
                            t.push(i)
                        }), t
                    }
                }, {
                    key: "removeError", value: function () {
                    }
                }, {
                    key: "payError", value: function () {
                    }
                }, {
                    key: "login", value: function (e, t) {
                        var i = {client: "pc"};
                        (0, O.default)({
                            url: "//cmstool.youku.com/cms/player/userinfo/user_info?specialTest=test",
                            data: i,
                            success: function (i) {
                                1 == i.error ? e() : 0 == i.error && t()
                            },
                            fail: function (t) {
                                e()
                            }
                        })
                    }
                }, {
                    key: "streamDoneCall", value: function () {
                    }
                }, {
                    key: "errorplaying", value: function (e) {
                        this.reportor.sendUepLog(this.uepLogType, {code: e})
                    }
                }, {
                    key: "livePlayLog", value: function () {
                        this.LiveApi.playlog({
                            shid: this.lData.showId,
                            v: this.lData.videoId,
                            tp: 1,
                            fid: this.liveId,
                            hwclass: this.config.pc ? 1 : 4,
                            nlid: this.cna,
                            autoplay: this.config.autoplay,
                            cg: this.lData.categoryName,
                            sk: this.lData.keywords,
                            stg: this.lData.screenId,
                            hd: this.defaultQuality - 1,
                            source: 101
                        })
                    }
                }, {
                    key: "liveStreamNext", value: function (e) {
                        var t = this;
                        if (this.stream.stream && (this.lData.stream = this.stream.stream, this.streamDefault = this.getDefaultScene(this.lData.stream)[0]), 200 != e)return 40001 != e && 30201 != e || this.config.events.servePre && this.config.events.servePre(this.stream.status), this.onError(e), void this.reportor.sendUepLog("errorbeforeplay", {code: e});
                        if (this.defaultPlaytype = this.stream.playType || "hls", this.psid = this.stream.psid, this.defaultQuality = this.stream.dq, this.firstFrameData.livePermissionDuration = Date.now() - this.logStartTime, 200 == e) {
                            this.live_get_stream = Date.now(), this.qualities = this.stream.qualities, this.streamDoneCall();
                            var i = this.qualities.filter(function (e) {
                                return e.quality == t.defaultQuality
                            });
                            i.length || i.push(this.qualities[0]), this.defaultStreamInfo = i[0];
                            var n = this.defaultStreamInfo.code, s = parseInt(this.stream.tryPlayTime, 10);
                            if (200 != n) {
                                if (!(parseInt(s, 10) > 0) || this.trialOver || 1001 != n)return this.onError(n), void this.reportor.sendUepLog("errorbeforeplay", {code: n});
                                if (this.timeBase >= 60 * s)return void this.onError(this.defaultStreamInfo.bizCode)
                            }
                            this.reportor && this.reportor.reset({
                                hd: this.defaultQuality,
                                view: this.streamDefault.name
                            }), this.liveManager()
                        }
                        this.updateLockType(e, this.lockNow)
                    }
                }, {
                    key: "hideBaseAD", value: function () {
                    }
                }, {
                    key: "liveObserve", value: function () {
                        this.hideBaseAD();
                        var e = this.lData.liveStatus;
                        this.wm(), M.default.i(this.TAG, "liveStatus: " + e), 0 == e && this.broadcastManager(), 1 == e && this.liveStreamNext(this.streamStatus), e > 1 && this.orderManagerMySelf()
                    }
                }, {
                    key: "wm", value: function () {
                    }
                }, {
                    key: "liveStreamDone", value: function (e) {
                        if (M.default.i(this.TAG, "livepermission => success"), !this.limitLocked) {
                            if (this.timeBase = parseInt((0, R.default)("timerun_" + this.lData.screenId)) || 0, this.stream = e.data || {}, this.liveLoggerDone(), this.stream.drm) {
                                if (this.reportor.reset({drm: "drm"}), !this.supportHls)return void this.errorToScan();
                                this.stream.ddk = null;
                                try {
                                    this.stream.ddk = window._sce_dlgtqred(this.R1, this.stream.eRs, this.stream.cRk)
                                } catch (e) {
                                    this.reportor.sendDrmError()
                                }
                            }
                            this.streamStatus = e.status, this.reportor.fdlLog();
                            var t = void 0;
                            try {
                                t = JSON.parse(window.atob(this.stream.adInfo))
                            } catch (e) {
                            }
                            t && t.VAL && t.VAL.length > 0 && !this.ad_running ? (this.ad_running = !0, this.createAdPlayer(t)) : this.liveObserve()
                        }
                    }
                }, {
                    key: "createAdPlayer", value: function (e) {
                        var t = this;
                        this.adPlayer = new N.default({
                            container: document.querySelector(".live_adplayer"),
                            data: e
                        }), this.adPlayer.on(N.default.ADEvents.ended, function () {
                            t.ad_running = !1, t.liveObserve()
                        }), U.default.Browser.isMobile || (this.adPlayer.play(), this.adPlayer.play())
                    }
                }, {
                    key: "updateLockType", value: function (e, t) {
                    }
                }, {
                    key: "orderInit", value: function (e) {
                    }
                }, {
                    key: "orderInitSelf", value: function (e) {
                    }
                }, {
                    key: "orderDestory", value: function () {
                    }
                }, {
                    key: "liveServiceDoneCallback", value: function (e) {
                    }
                }, {
                    key: "getDefaultScene", value: function (e) {
                        var t = e.filter(function (e) {
                            return 1 == e.defaultScene
                        });
                        return t.length || t.push(e[0]), t
                    }
                }, {
                    key: "getSceneId", value: function () {
                        return this.defaultSceneId
                    }
                }, {
                    key: "isVideoPlayer", value: function () {
                        return 0 == this.lData.liveStatus
                    }
                }, {
                    key: "needLogin", value: function () {
                        return this.streamDefault.isLogin
                    }
                }, {
                    key: "filterStatusUrl", value: function () {
                        var e = this.lData.now || Date.now(), t = "gostr=/yt/youkulive.playclick.interact;locaid=sbutton;liveid=" + this.config.liveid + "&screenid=" + this.lData.screenId, i = this.lData.endTimestamp, n = this.lData.startTimestamp, s = "";
                        return s = e > i ? "review" : e > n && e < i ? "live" : "railer", t += "&type=" + s
                    }
                }, {
                    key: "errorToScan", value: function () {
                    }
                }, {
                    key: "livePGCCallback", value: function (e) {
                    }
                }, {
                    key: "setPoster", value: function () {
                    }
                }, {
                    key: "liveServiceDone", value: function () {
                        if (M.default.i(this.TAG, "live:service"), this.timeRun = 0, this.timeBase = parseInt((0, R.default)("timerun_" + this.lData.screenId)) || 0, !this.lData)return M.default.i(this.TAG, "liveFullInfo数据错误!"), void this.onError("error");
                        if (this.backImage = this.config.pc ? this.lData.imgBUrl : this.lData.imgMUrl, this.setPoster(), this.lData.status)return void this.onError(this.lData.status);
                        var e = this.canPlayManager();
                        if (!this.supportHls && !e)return this.errorToScan(), void(0, m.sendMseError)(U.default.appName);
                        if (!this.limitLocked) {
                            this.broadcastVideoCode = this.lData.broadcastVideoCode, this.isOrderPlayer = this.isVideoPlayer(), this.streamDefault = this.getDefaultScene(this.lData.stream)[0];
                            var t = (0, A.default)(this.getAdParam());
                            this.firstFrameData.durationType = 0, this.logStartTime = Date.now();
                            var i = this.getUtid();
                            this.LiveApi.livePermission(this.streamDefault, 0, {
                                ad: t,
                                utdid: i,
                                sceneId: 0
                            }), this.liveServiceDoneCallback()
                        }
                    }
                }, {
                    key: "getAdParam", value: function () {
                        var e = {};
                        return e.site = "youku", e.utdid = this.getUtid(), e.aw = "w", e.p = 1, e.vs = "1.0", e.vc = 0, e.fu = this.full ? 1 : 0, e.bt = "pc", e.rst = "mp4", e.dq = this.defaultQuality, e.isvert = 0, U.default.Browser.iOS ? e.os = "iOS" : e.os = "win", e.dvh = this.video.clientWidth, e.dvw = this.video.clientHeight, e.wintype = "h5", e.ccode = this.config.ccode, e.bf = 0, e.lid = this.config.liveid, e
                    }
                }, {
                    key: "setQulitiesData", value: function () {
                        var e = {}, t = [], i = [];
                        return this.qualities.forEach(function (n) {
                            t.push(n.quality), i.push(n.name), e[n.quality] = n.selectionName || "尊享"
                        }), {selection: i, qualitiesList: t, qualityMap: e}
                    }
                }, {
                    key: "orderManagerMySelf", value: function () {
                        var e = this;
                        M.default.i(this.TAG, "Switch to order."), this.lockUI.hide();
                        var t = this.config.pc ? "0511" : "050E", i = this.lData.videoUrlCode, n = Math.floor(3e3 * Math.random());
                        i ? setTimeout(function () {
                            e.orderInitSelf({vid: i, ccode: t, progress: !0})
                        }, n) : this.backImage && this.simpleError()
                    }
                }, {
                    key: "getLiveAdParam", value: function (e) {
                        return {
                            s: this.lData.showId,
                            lid: this.config.liveid,
                            livestate: 1,
                            liveadflag: 1,
                            sid: this.stream.psid,
                            p: e
                        }
                    }
                }, {
                    key: "pauseAd", value: function () {
                        var e = this, t = this.getAdParam();
                        (0, E.default)(t, this.getLiveAdParam(4)), (0, O.default)({
                            url: "//valp.atm.youku.com/vp",
                            data: t,
                            success: function (t) {
                                t.VAL && t.VAL.length > 0 && (e.UIPauseAd || (e.UIPauseAd = new V.default(e.selector, e.EventManager)), e.UIPauseAd.loadVC(t), e.UIPauseAd.show())
                            },
                            fail: function (e) {
                            }
                        })
                    }
                }, {
                    key: "showBaseAd", value: function () {
                    }
                }, {
                    key: "orderManager", value: function () {
                        var e = this;
                        this.clearMSE(), this.lData.liveStatus = 2;
                        var t = this.getAdParam();
                        (0, E.default)(t, this.getLiveAdParam(2)), (0, O.default)({
                            url: "//valb.atm.youku.com/vb",
                            data: t,
                            success: function (t) {
                                t.VAL && t.VAL.length > 0 ? e.adPlayer ? (e.adPlayer.initData(t), e.showBaseAd(), e.adPlayer.play(), e.adPlayer.play()) : e.createAdPlayer(t) : e.orderManagerMySelf()
                            },
                            fail: function () {
                                e.orderManagerMySelf()
                            }
                        })
                    }
                }, {
                    key: "liveManager", value: function () {
                        this.send_stream = Date.now();
                        var e = this.defaultStreamInfo.playUrl;
                        this.pgcSrc(this.defaultPlaytype, e), this.reportor.mdLog(), M.default.i(this.TAG, "livemanager: " + e)
                    }
                }, {
                    key: "liveHide", value: function () {
                    }
                }, {
                    key: "broadcastManager", value: function () {
                        var e = this.config.pc ? "0511" : "050D", t = this.broadcastVideoCode;
                        t ? (M.default.i(this.TAG, "switch to orderplayer"), this.orderInitSelf({
                            vid: t,
                            ccode: e,
                            tryTime: this.tryTime
                        })) : this.backImage && (M.default.i(this.TAG, "switch to poster"), this.simpleError())
                    }
                }, {
                    key: "simpleError", value: function () {
                    }
                }, {
                    key: "waiting", value: function () {
                        M.default.i(this.TAG, "waiting"), this.firstRequest ? this.firstRequest = !1 : this.bufStartLog(), this.onWaiting()
                    }
                }, {
                    key: "play", value: function (e) {
                        M.default.i(this.TAG, "play: " + this.video.paused), this.isChanged && ((0, m.userforscreen)(this.linktype, "Y", "client", this.config.liveid, this.defaultStreamInfo.name), this.isChanged = !1), this.UIPauseAd && this.UIPauseAd.hide(), this.onPlay(e)
                    }
                }, {
                    key: "pause", value: function (e) {
                        this.video.pause(), this.statusCache = "paused", this.onPause(e)
                    }
                }, {
                    key: "canplay", value: function (e) {
                        this.uepLogType = "errorplaying", this.bufferEndLog(), this.onCanplay(e), !this.hadFrameLog && this.reportor && (this.reportor.sendFrametLog(this.firstFrameData), this.hadFrameLog = !0, this.reportor.sendVVLog(), this.reportor.sendTSLog(), this.playerRecover())
                    }
                }, {
                    key: "canplaythrough", value: function () {
                        this.uepLogType = "errorplaying", this.bufferEndLog(), this.onCanplay(), this.hadFrameLog || this.reportor && (this.reportor.sendFrametLog(this.firstFrameData), this.hadFrameLog = !0, this.reportor.sendVVLog(), this.reportor.sendTSLog())
                    }
                }, {
                    key: "playing", value: function (e) {
                        M.default.i(this.TAG, "playing"), this.hadError = !1, this.bufError = !1, this.playerRecover(), this.onPlaying()
                    }
                }, {
                    key: "timeupdate", value: function (e) {
                        this.time = Math.floor(this.video.currentTime), this.onTimeupdate(this.time)
                    }
                }, {
                    key: "payError", value: function () {
                    }
                }, {
                    key: "error", value: function (e) {
                        M.default.i(this.TAG, "system:error"), (0, P.default)(t.prototype.__proto__ || (0, T.default)(t.prototype), "error", this).call(this, e), this.config.events.playError && this.config.events.playError(), this.bufError = !0, this.errorPlayLog(), this.isChanged && ((0, m.userforscreen)(this.linktype, "N", "client", this.config.liveid, this.defaultStreamInfo.name), this.isChanged = !1), this.onError("video")
                    }
                }, {
                    key: "onCanplaythrough", value: function () {
                    }
                }, {
                    key: "onPlay", value: function (e) {
                    }
                }, {
                    key: "onPause", value: function (e) {
                    }
                }, {
                    key: "onError", value: function (e) {
                    }
                }, {
                    key: "onTimeupdate", value: function (e) {
                        M.default.i(this.TAG, e)
                    }
                }, {
                    key: "onPlaying", value: function () {
                    }
                }, {
                    key: "onWaiting", value: function () {
                    }
                }, {
                    key: "onCanplay", value: function () {
                    }
                }, {
                    key: "bufStartLog", value: function () {
                        var e = this;
                        this.bufStart || this.bufError || !this.reportor || (this.reportor.sendUepLog("bufStart", {s: 0}), this.bufStart = !0, this.timer = setInterval(function () {
                            e.bufSecs += 100
                        }, 100))
                    }
                }, {
                    key: "bufferEndLog", value: function () {
                        this.bufStart && this.bufSecs > 500 && !this.bufError && this.reportor && (this.reportor.sendUepLog("bufferload", {s: this.bufSecs}), this.bufSecs = 0, this.bufStart = !1, this.timer && clearInterval(this.timer))
                    }
                }, {
                    key: "errorPlayLog", value: function () {
                        this.reportor && this.reportor.sendTSLog("stop")
                    }
                }, {
                    key: "liveDataSuccessCall", value: function () {
                        try {
                            parent.window.getLiveUrlSuccess()
                        } catch (e) {
                        }
                        try {
                            external.getLiveUrlSuccess()
                        } catch (e) {
                        }
                    }
                }, {
                    key: "tsLogReStart", value: function (e) {
                        var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "";
                        this.reportor && this.reportor.reset({hd: e, view: t})
                    }
                }, {
                    key: "fixedIOS11", value: function () {
                        var e = this.video.play();
                        void 0 !== e && e.catch(function (e) {
                        }).then(function () {
                        })
                    }
                }, {
                    key: "qualityChange", value: function (e) {
                        this.uepLogType = "errorbeforeplay", this.defaultQuality = e;
                        var t = this.getUtid();
                        this.LiveApi.livePermission(this.streamDefault, e, {utdid: t}), this.isChanged = !0
                    }
                }, {
                    key: "urlSent", value: function () {
                    }
                }, {
                    key: "watcher", value: function () {
                        var e = this;
                        this.EventManager.on("live:error", function (t) {
                            e.liveServiceError(t)
                        }), this.EventManager.on("live:ps", function (t) {
                            return e.liveStreamDone(t)
                        }), this.EventManager.on("video:auto", function () {
                            e.video.paused ? e.video.play() : (e.video.pause(), e.EventManager.fire("dash:show"), e.EventManager.fire("ad:pause"))
                        })
                    }
                }]), t
            }(C.default);
            e.default = F
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(9), i(0), i(1), i(108), i(5), i(23)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o) {
            "use strict";
            function r(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var u = r(t), l = r(i), d = r(n), h = r(s), c = r(a), f = function () {
                function e(t, i, n) {
                    lib.mtop.config.encryptRClient = window._sce_lgtcaygl(n.R1);
                    lib.mtop.config.ccode = n.ccode;

                    (0, l.default)(this, e), this.liveid = t, this.EventManager = i, this.config = n, this.config.data && (this.data = this.config.data.data), this.collina = new h.default, this.utid = c.default.getCna(), this.linktype = this.config.pc ? "pc" : "h5", lib.mtop.config.subDomain = "", lib.mtop.config.mainDomain = "youku.com", -1 == lib.mtop.config.prefix.indexOf("acs") && (lib.mtop.config.prefix = "acs"), "acs" == lib.mtop.config.prefix || "pre-acs" == lib.mtop.config.prefix ? this.appKey = 23536927 : this.appKey = 4272
                }

                return (0, d.default)(e, [{
                    key: "changeLiveid", value: function (e) {
                        this.liveid = e
                    }
                }, {
                    key: "init", value: function () {
                        var e = this;
                        c.default.sendInterface();
                        var t = {
                            api: "mtop.youku.live.h5.livefullinfo",
                            v: "3.0",
                            H5Request: !0,
                            data: {liveId: this.liveid},
                            appKey: this.appKey,
                            ecode: 0
                        };
                        "H5" == c.default.appName && (t.data.refer = this.config.refer), this.config.SV && (t.SV = this.config.SV), lib.mtop.request(t).then(function (t) {
                            e.EventManager.fire("live:service", t.data)
                        }, function (t) {
                            e.EventManager.fire("live:error", {type: 500})
                        })
                    }
                }, {
                    key: "playlog", value: function (e) {
                        var t = {
                            api: "mtop.youku.playlog.open.push",
                            v: "1.0",
                            H5Request: !0,
                            data: (0, u.default)({
                                appKey: "55u05pKt5bmz5Yjw",
                                time: Date.now(),
                                version: 1,
                                source: 3
                            }, e),
                            appKey: this.appKey,
                            ecode: 0
                        };
                        this.config.SV && (t.SV = this.config.SV), lib.mtop.request(t).then(function (e) {
                            console.log("playlog: ", e)
                        }, function (e) {
                            console.log("playlogerror: ", e)
                        })
                    }
                }, {
                    key: "livePermission", value: function (e, t) {
                        var i = this, n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {};
                        this.now = Date.now();
                        var s = 0, a = e.sceneId, o = {sceneId: a, reqQuality: t};
                        !function e() {
                            var t = i.collina.getCkey();
                            return t ? ((0, u.default)(o, n, {ckey: t}), void i.livepermission3(o)) : s++ > 4 && !t ? (t = i.collina.defaultCkey, (0, u.default)(o, n, {ckey: t}), void i.livepermission3(o)) : void setTimeout(e, 100)
                        }()
                    }
                }, {
                    key: "getAdParams", value: function () {
                    }
                }, {
                    key: "livepermission3", value: function (e) {
                        var t = this, i = window._sce_lgtcaygl(this.config.R1), n = (0, u.default)({
                            playAbilities: '{"decode_resolution_FPS":"1080p_50"}',
                            keyIndex: "web01",
                            encryptRClient: i,
                            cna: this.utid,
                            ccode: this.config.ccode,
                            liveId: this.liveid,
                            app: c.default.appName,
                            ad: lib.mtop.config.ad
                        }, e), s = {
                            api: "mtop.youku.live.com.livePlayControlV2",
                            v: "2.0",
                            H5Request: !0,
                            AntiFlood: !0,
                            data: n,
                            appKey: this.appKey,
                            ecode: 0
                        };
                        lib.mtop.config.encryptRClient = i;
                        lib.mtop.config.ccode = this.config.ccode;
                        lib.mtop.config.streamParam_data = n;
                        "H5" == c.default.appName && (s.data.refer = this.config.refer), this.config.SV && (s.SV = this.config.SV), lib.mtop.request(s).then(function (e) {
                            var i = e.data;
                            t.EventManager.fire("live:ps", i), (0, o.sendInterface)(c.default.appName, "Y", Date.now() - t.now, "200", "mtop.youku.live.com.livePlayControlV2")
                        }, function (e) {
                            t.EventManager.fire("live:error", {type: "error"});
                            var i = "unknow";
                            e.ret && (i = e.ret[0]), (0, o.sendInterface)(c.default.appName, "N", Date.now() - t.now, i, "mtop.youku.live.com.livePlayControlV2")
                        })
                    }
                }]), e
            }();
            e.default = f
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(9), i(0), i(1), i(12), i(8), i(5), i(82)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, n, s, a, o, r, u) {
            "use strict";
            function l(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var d = l(t), h = l(n), c = l(s), f = l(a), v = l(o), p = l(r), m = function () {
                function e(t, i) {
                    if ((0, h.default)(this, e), !t)return void console.log("播放器error");
                    this.TAG = "Player:Player", this.selector = t, this.config = i, this.config.hd = "mp4", this.video = document.createElement("video"), this.videoContainer = document.createElement("livebox"), this.videoContainer.className = "live_video", this.videoContainer.appendChild(this.video), this.supportHls = window.Hls && window.Hls.isSupported && window.Hls.isSupported(), this.Hls = null, this.Flv = null, this.selector.appendChild(this.videoContainer), this.playerInit(), this.playerRecover(), this.nativeerror = !1, this.config.hlsConfig || (this.config.hlsConfig = {}), this.uepLogType = "errorbeforeplay"
                }

                return (0, c.default)(e, [{
                    key: "txt", value: function (e) {
                    }
                }, {
                    key: "eventInit", value: function () {
                        var e = this;
                        ["ended", "playing", "waiting", "canplay", "canplaythrough", "loadstart", "loadeddata", "loadedmetadata", "timeupdate", "volumechange", "play", "pause", "error", "seeking", "emptied", "abort"].forEach(function (t) {
                            e[t] || (e[t] = function () {
                                v.default.i(e.TAG, t)
                            }), e.video.addEventListener(t, function (i) {
                                e[t](i)
                            }, !1)
                        })
                    }
                }, {
                    key: "loadeddata", value: function () {
                        this.onloadeddata()
                    }
                }, {
                    key: "onloadeddata", value: function () {
                    }
                }, {
                    key: "playerInit", value: function () {
                        this.playerSetter(this.config), this.eventInit()
                    }
                }, {
                    key: "canplay", value: function () {
                    }
                }, {
                    key: "canplaythrough", value: function () {
                    }
                }, {
                    key: "seek", value: function (e) {
                        this.video.currentTime = e
                    }
                }, {
                    key: "playerRecover", value: function () {
                        this.video.style.width = "100%", this.video.style.height = "100%"
                    }
                }, {
                    key: "playerSetter", value: function (e) {
                        var t = {controlsList: "nodownload", controls: !1, preload: "none", "x-webkit-airplay": "deny"};
                        (0, d.default)(t, {
                            autoplay: e.autoplay,
                            loop: e.loop
                        }), p.default.Browser.iOSVersion[0] >= 11 ? (0, d.default)(t, {
                            playsinline: !0,
                            "webkit-playsinline": !0
                        }) : t.autoplay = !0;
                        for (var i in t)t[i] && this.video.setAttribute(i, t[i])
                    }
                }, {
                    key: "changeMuted", value: function (e) {
                        return e > 1 && (e = 1), e > 0 ? (this.video.muted = !1, this.video.volume = e) : (this.video.muted = !0, this.video.volume = 0), this.video.volume
                    }
                }, {
                    key: "onPlay", value: function (e) {
                    }
                }, {
                    key: "onPause", value: function () {
                    }
                }, {
                    key: "play", value: function (e) {
                    }
                }, {
                    key: "pause", value: function () {
                    }
                }, {
                    key: "clearMSE", value: function () {
                        this.Flv && (this.Flv.destroy(), this.Flv = null), this.Hls && (this.Hls.destroy(), this.Hls.bufferTimer && (clearInterval(this.Hls.bufferTimer), this.Hls.bufferTimer = null), this.Hls = null), this.video.pause()
                    }
                }, {
                    key: "error", value: function () {
                        this.nativeerror || (this.errorplaying("system"), this.nativeerror = !0)
                    }
                }, {
                    key: "errorplaying", value: function (e) {
                    }
                }, {
                    key: "flvInit", value: function (e, t) {
                        var n = this;
                        i.e(0).then(i.bind(null, 172)).then(function (t) {
                            n.Flv = t.createPlayer({
                                type: "flv",
                                url: e,
                                cors: !0,
                                isLive: !0,
                                withCredentials: !1
                            }), n.Flv.on(t.Events.ERROR, function () {
                                for (var e = arguments.length, t = Array(e), i = 0; i < e; i++)t[i] = arguments[i];
                                v.default.i(n.TAG, t), n.onError("error"), n.errorplaying("flverror")
                            }), n.Flv.attachMediaElement(n.video), n.Flv.load(), n.render_first_frame = Date.now(), n.config.autoplay && n.tryToPlay()
                        }).catch(function () {
                        })
                    }
                }, {
                    key: "hlsP2pStatusChange", value: function (e, t) {
                    }
                }, {
                    key: "hlsInit", value: function (e, t) {
                        var i = this;
                        if (!window.Hls)return !1;
                        this.Hls = new window.Hls((0, d.default)(this.config.hlsConfig, {
                            startPosition: 1,
                            decodeKey: this.stream.ddk,
                            manifestLoadingRetryDelay: 3e3,
                            levelLoadingRetryDelay: 3e3,
                            fragLoadingRetryDelay: 3e3
                        })), this.Hls.loadSource(e), this.Hls.attachMedia(this.video), this.Hls.on(window.Hls.Events.hlsP2pStatusChange, function (e, t) {
                            i.hlsP2pStatusChange(e, t)
                        }), this.Hls.on(window.Hls.Events.MANIFEST_PARSED, function (e, t) {
                            i.render_first_frame = Date.now(), i.config.autoplay && i.tryToPlay()
                        }), this.Hls.on(window.Hls.Events.ERROR, function (e, t) {
                            t && t.networkDetails && 403 == t.networkDetails.status ? (i.onError(403), i.errorplaying("403")) : t && t.fatal && (i.onError("error"), i.errorplaying("timeout"))
                        }), this.Hls.on(window.Hls.Events.FRAG_PARSING_DATA, function (e, t) {
                            if ("video" === t.type) {
                                var n = t.nb / (t.endPTS - t.startPTS);
                                i.changeFPSLog(Math.floor(n))
                            }
                        })
                    }
                }, {
                    key: "changeFPSLog", value: function (e) {
                    }
                }, {
                    key: "tryToPlay", value: function () {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : function () {
                        }, t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : function () {
                        }, i = this.video.play();
                        this.config.pc && void 0 != i && i.then(e).catch(t)
                    }
                }, {
                    key: "canPlayManager", value: function () {
                        var e = !1;
                        return this.video.canPlayType && (e = "" !== this.video.canPlayType("application/vnd.apple.mpegURL")), f.default.android && (e = !0), e
                    }
                }, {
                    key: "timerLine", value: function () {
                    }
                }, {
                    key: "pgcSrc", value: function (e, t) {
                        if (this.clearMSE(), !t)return void this.onError("error");
                        var i = t.replace("http:", "");
                        if (this.video.style.display = "block", "flv" == e) this.supportHls ? this.flvInit(i) : this.onError(500); else {
                            var n = i;
                            this.timerLine();
                            var s = this.getTlComponentCurrentTime();
                            if ("hls" == this.onHls && s && (n = i + (-1 != i.indexOf("?") ? "&" : "?") + "lhs_start=" + s), (this.panorama || this.stream && this.stream.drm) && this.supportHls)return void this.hlsInit(n);
                            this.canPlayManager() ? this.video.src = n : this.supportHls ? this.hlsInit(n) : this.video.src = n
                        }
                    }
                }, {
                    key: "onError", value: function (e) {
                    }
                }, {
                    key: "fullScreen", value: function (e) {
                        var t = this.video;
                        this.full = !0, this.config.pc && !f.default.isIpad && (t = this.selector), t.requestFullscreen ? t.requestFullscreen() : t.webkitRequestFullscreen ? t.webkitRequestFullscreen() : t.mozRequestFullScreen ? t.mozRequestFullScreen() : t.msRequestFullscreen ? t.msRequestFullscreen() : t ? t.webkitEnterFullScreen() : t.webkitEnterFullscreen()
                    }
                }, {
                    key: "cancelScreen", value: function (e) {
                        this.full = !1, document.exitFullscreen ? document.exitFullscreen() : document.webkitExitFullscreen ? document.webkitExitFullscreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.msExitFullscreen ? document.msExitFullscreen() : this.video.webkitExitFullscreen && this.video.webkitExitFullscreen()
                    }
                }, {
                    key: "status", set: function (e) {
                        this.statusCache = e
                    }, get: function () {
                        return this.statusCache
                    }
                }]), e
            }();
            e.default = m
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(9), i(26), i(2), i(0), i(1), i(4), i(3), i(87), i(84), i(62), i(113), i(12), i(63), i(97), i(8), i(58), i(23), i(111)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o, r, u, l, d, h, c, f, v, p, m, y, _) {
            "use strict";
            function g(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var k = g(t), E = g(i), A = g(n), T = g(s), b = g(a), w = g(o), S = g(r), P = g(u), L = g(l), I = g(d), x = g(h), C = g(c), D = g(f), M = g(v), U = g(p), O = g(m), R = g(_), N = function (e) {
                function t(e, i) {
                    (0, T.default)(this, t);
                    var n = (0, w.default)(this, (t.__proto__ || (0, A.default)(t)).call(this, e, i));
                    return n.init_player = Date.now(), n.TAG = "Live:Player", n.oneEnded = 0, n.eventBinder(), n.coreExtend(), C.default.iku && (n.ikuFullScreen(), document.body.style.overflow = "hidden"), document.addEventListener("click", function (e) {
                        if (!n.EventManager)return !1;
                        "live_icon_qspan" != e.target.className && n.EventManager.fire("window:clear")
                    }, !1), n
                }

                return (0, S.default)(t, e), (0, b.default)(t, [{
                    key: "on", value: function (e, t) {
                        this.sureOrder ? this.order[0].EventManager.on(e, t.bind(this)) : this.EventManager.on(e, t.bind(this))
                    }
                }, {
                    key: "fire", value: function (e) {
                        this.sureOrder ? this.order[0].EventManager.fire(e) : this.EventManager.fire(e)
                    }
                }, {
                    key: "payError", value: function () {
                        if (!this.config.pc)return void this.onError(1001);
                        var e = document.querySelector(".limitError");
                        if (e)return void(e.style.display = "block");
                        var t = document.createElement("section");
                        t.className = "limitError", t.innerHTML = '\n            <img src="' + this.backImage + '" alt="" class="limitErrorBg">\n            <div class="limitErrorDivBg"></div>\n            <div class="e-layer">\n                <span class="e-note">因版权原因，请使用优酷APP扫码，付费观看</span>\n                <span class="e-note-mini">给您带来不便非常抱歉</span>\n                <div class="e-qrcode">\n                    <img class="e-qrcod-img" src="' + this.lData.qrCodeUrl + '">\n                    <div class="e-btm-note">精彩内容，一扫即得</div>\n                </div>\n            </div>\n        ', this.selector.appendChild(t)
                    }
                }, {
                    key: "eventBinder", value: function () {
                        var e = this;
                        window.addEventListener("keydown", function (t) {
                            if (27 == t.keyCode) {
                                if (window.external && window.external.execute)return e.full = !1, e.baseUI.exitToFull(), void window.external.execute("iku", "iku://|play|living|click|liveplayer|normalsize|");
                                try {
                                    e.cancelScreen()
                                } catch (e) {
                                    console.log("keydown:", e)
                                }
                            }
                        }, !1);
                        try {
                            top.document.addEventListener("WV.Event.APP.Background", function (t) {
                                e.fire("video:pause")
                            }, !1)
                        } catch (e) {
                        }
                        var t = ["fullscreenchange", "webkitfullscreenchange", "mozfullscreenchange", "MSFullscreenChange", "webkitFullscreenchange"], i = ["fullscreenelement", "webkitFullscreenElement", "mozFullScreenElement", "msFullscreenElement", "webkitIsFullScreenelement"];
                        t.forEach(function (t) {
                            e.config.pc && !C.default.isIpad ? e.selector.addEventListener(t, function () {
                                var t = i.filter(function (e) {
                                    return document[e]
                                })[0];
                                t ? (e.full = !!t, e.baseUI.exitToFull()) : (e.full = !1, e.baseUI.fullToExit()), e.LogoUI && e.LogoUI.change(e.full ? 1 : 3)
                            }) : document.addEventListener(t, function () {
                                e.full = !!document.webkitFullscreenElement;
                                var t = i.filter(function (e) {
                                    return document[e]
                                })[0];
                                e.full = !!t, e.LogoUI && e.LogoUI.change(e.full ? 1 : 3)
                            })
                        })
                    }
                }, {
                    key: "formatTime", value: function () {
                        return this.lData.now - this.lData.endTimestamp
                    }
                }, {
                    key: "init", value: function () {
                        this.baseUI = new L.default(this.selector, this.EventManager, this.config), this.config.pc || this.baseUI.showLivePlayBtn(), this.config.hidecontrol && (this.video.volume = 0, this.video.muted = !0), this.lockUI = new I.default(this.selector, this.EventManager, "live"), this.config.events || (this.config.events = {})
                    }
                }, {
                    key: "updateLockType", value: function (e, t) {
                        this.order && (1006 !== e && 1008 !== e && 1007 !== e && (this.order[0].config.tryTime = 0), this.order[0].updateLockType(e, t))
                    }
                }, {
                    key: "playError", value: function (e) {
                        this.simpleError();
                        var t = null;
                        this.defaultStreamInfo && (t = this.defaultStreamInfo.bizCode);
                        var i = 0 === e || e ? e : 500;
                        1001 == e && (i = t || e), this.lockUI.lockScreen(i), this.lockUI.show(), window.parent.window && parent.window.getLiveUrlError && parent.window.getLiveUrlError()
                    }
                }, {
                    key: "simpleError", value: function () {
                        this.hadError = !0, this.changeReportor(), this.baseUI.shadowHide(), this.baseUI.emLoadHide(), this.baseUI.dashDomHide(), this.baseUI.hideLivePlayBtn(), this.backImage && this.baseUI.posterShow(), U.default.i(this.TAG, this.backImage)
                    }
                }, {
                    key: "onEnded", value: function () {
                    }
                }, {
                    key: "orderError", value: function (e) {
                        this.order && (this.order[0].needError = !0, this.order[0].onError(e))
                    }
                }, {
                    key: "onError", value: function (e) {
                        if (this.EventManager.fire("player:error", {type: e}), U.default.i(this.TAG, "errorcode: " + e), this.errorCode = e, this.render_first_frame = 0, this.fire("video:pause"), this.hadError = !0, this.baseUI.posterShow(), this.errorPlayLog(), this.UIPauseAd && this.UIPauseAd.hide(), 1111 === e) {
                            this.video.style.display = "none";
                            try {
                                this.video.parentNode.removeChild(this.video)
                            } catch (e) {
                                console.log("onError: child remove")
                            }
                            this.full && this.cancelScreen(), this.lockUI.lockScreen(e), this.lockUI.show()
                        }
                        this.baseUI.bigButtonHideFn(), C.default.safari || (this.video.style.display = "none"), this.hadError = !0, U.default.i(this.TAG, "errorCode: " + e), this.playError(e)
                    }
                }, {
                    key: "errorReH5", value: function () {
                        this.full && this.cancelScreen(), this.order && (this.orderHide(), this.liveShow()), this.baseUI.bigButtonHideFn(), this.playError("nosupport"), C.default.safari || (this.video.style.display = "none")
                    }
                }, {
                    key: "errorToScan", value: function () {
                        if (!this.showGoApp())if (U.default.i(this.TAG, "no support -> errorToScan"), "iku" == C.default.browserType || this.config.pc) {
                            var e = document.createElement("div");
                            e.className = "goAppContainer", e.innerHTML = '<div class="goApp"><div class="goAppTip">您的浏览器版本过低，请升级浏览器</div><div class="goAppImg"><div class="goAppImgInline"><img src="' + this.lData.qrCodeUrl + '" width="150" height="150" alt=""></div><span class="goAppText">优酷APP扫码直接进入直播现场</span></div></div>', this.selector.appendChild(e)
                        } else this.errorReH5()
                    }
                }, {
                    key: "liveServiceError", value: function (e) {
                        U.default.i(this.TAG, "直播服务错误"), this.playError(e.type)
                    }
                }, {
                    key: "urlSent", value: function () {
                        U.default.i(this.TAG, "url:ready"), this.baseUI.showLivePlayBtn()
                    }
                }, {
                    key: "getPgcQualityData", value: function () {
                    }
                }, {
                    key: "setPoster", value: function () {
                        this.baseUI.setPoster(this.backImage), this.baseUI.posterShow()
                    }
                }, {
                    key: "waterKa", value: function () {
                        this.now = this.lData.now;
                        var e = Math.floor(Date.now() / 1e3);
                        this.cha = e - this.now
                    }
                }, {
                    key: "liveServiceDoneCallback", value: function () {
                        var e = this;
                        this.waterKa(), U.default.i(this.TAG, "liveServiceDoneCallback"), this.baseUI.setMock(this.filterStatusUrl()), window.IKUCallStop = function () {
                            e.IKUCallStop()
                        }, window.IKUCallStartPlay = function () {
                            e.IKUCallStartPlay()
                        }, this.playerLoaded = !0, this.config.events.playerReady && this.config.events.playerReady(this)
                    }
                }, {
                    key: "wm", value: function () {
                        var e = this.stream.waterMarkV2 || this.stream.waterMark;
                        e && e.length >= 1 && !this.LogoUI && (this.LogoUI = new D.default(this.selector, this.EventManager, "live", e, Date.now()))
                    }
                }, {
                    key: "streamDoneCall", value: function () {
                        this.config.pc || this.baseUI.showLivePlayBtn(), this.baseUI.playState();
                        var e = this.setQulitiesData();
                        this.config.pc && !this.qualityUI ? (this.qualityUI = new x.default(this.selector, this.EventManager, e, this.defaultQuality), this.qualityUI.show()) : this.qualityUI && (this.qualityUI.change(e.qualitiesList, this.defaultQuality, e.qualityMap, e.selection), U.default.i(this.TAG, (0, E.default)(e.qualitiesList)))
                    }
                }, {
                    key: "IKUCallStop", value: function () {
                        this.fire("video:pause")
                    }
                }, {
                    key: "IKUCallStartPlay", value: function () {
                        this.fire("video:play")
                    }
                }, {
                    key: "onPause", value: function () {
                        this.baseUI.playState(), this.pauseCallBackToThird()
                    }
                }, {
                    key: "playCallBackToThird", value: function () {
                        window.livePlayerPlay && window.livePlayerPlay(this.config.pid), parent.window && parent.window.livePlayerPlay && parent.window.livePlayerPlay(this.config.pid), window.external && window.external.livePlayerPlay && external.livePlayerPlay(this.config.pid)
                    }
                }, {
                    key: "getPlayerCanPlay", value: function () {
                        var e = !1;
                        return this.video.paused && (e = this.video.paused), this.sureOrder && (e = this.order[0].mediaElement.paused), e
                    }
                }, {
                    key: "pauseCallBackToThird", value: function () {
                        window.livePlayerPause && window.livePlayerPause(this.config.pid), parent.window && parent.window.livePlayerPause && parent.window.livePlayerPause(this.config.pid), window.external && window.external.livePlayerPause && external.livePlayerPause(this.config.pid)
                    }
                }, {
                    key: "mockFullscreen", value: function () {
                        if (this.full) {
                            if (C.default.iku)return this.baseUI.fullToExit(), this.full = !1, void(window.external && window.external.execute && window.external.execute("iku", "iku://|play|living|click|liveplayer|normalsize|"));
                            this.cancelScreen()
                        } else {
                            if (C.default.iku)return this.baseUI.exitToFull(), this.full = !0, void(window.external && window.external.execute && window.external.execute("iku", "iku://|play|living|click|liveplayer|fullscreen|"));
                            this.fullScreen()
                        }
                    }
                }, {
                    key: "ikuFullScreen", value: function () {
                        this.selector.style.zIndex = "20000", this.selector.style.position = "fixed", this.selector.style.top = "0", this.selector.style.left = "0", this.selector.style.bottom = "0", this.selector.style.width = "100%", this.selector.style.height = "100%"
                    }
                }, {
                    key: "hideBaseAD", value: function () {
                        this.baseUI.hideAdplayer()
                    }
                }, {
                    key: "showBaseAd", value: function () {
                        this.baseUI.showAdplayer()
                    }
                }, {
                    key: "timerLine", value: function () {
                        var e = !C.default.isIpad && this.config.pc;
                        1 == this.lData.liveStatus && !this.TimeLineUI && this.stream.timeShiftSupported && e && (this.TimeLineUI = new R.default(this.selector, this.EventManager, (0, k.default)({}, {
                            timestart: this.lData.startTimestamp,
                            timeend: this.lData.endTimestamp,
                            timeShiftOffset: this.stream.timeShiftOffset,
                            timenow: this.lData.now
                        }, this.config)), this.TimeLineUI.show(), this.stream.timeShiftOffset >= 0 && (this.onHls = "hls", this.TimeLineUI.tip.style.display = "block"))
                    }
                }, {
                    key: "getTlComponentCurrentTime", value: function () {
                        if (this.TimeLineUI) {
                            var e = this.TimeLineUI.getTimePlayTime();
                            return e || this.TimeLineUI.reset(), e.format
                        }
                        return ""
                    }
                }, {
                    key: "coreExtend", value: function () {
                        var e = this;
                        this.EventManager.on("window:clear", function () {
                            e.qualityUI && e.qualityUI.panelHide()
                        }), this.EventManager.on("ui:modelock", function (t) {
                            e.baseUI.setMinScreenMode(t)
                        }), this.EventManager.on("tl:back", function () {
                            e.onHls = "", e.timeBase = parseInt((0, O.default)("timerun_" + e.lData.screenId)) || 0, e.pgcSrc(e.defaultPlaytype, e.defaultStreamInfo.playUrl), (0, y.tlBackClick)(e.config.liveid, e.streamDefault.sceneId, e.full), e.reportor && e.reportor.reset({tlplay: 0})
                        }), this.EventManager.on("tl:update", function (t) {
                            e.onHls = "hls", e.timeBase = parseInt((0, O.default)("timerun_" + e.lData.screenId)) || 0, e.pgcSrc(e.defaultPlaytype, e.defaultStreamInfo.playUrl), (0, y.tlClick)(e.config.liveid, e.streamDefault.sceneId, e.full, t.handler), e.reportor && e.reportor.reset({tlplay: 1})
                        }), this.EventManager.on("ad:pause", function () {
                            e.config.pc && e.pauseAd()
                        }), this.EventManager.on("player:error", function (t) {
                            e.config.events.playError && e.config.events.playError(t, e)
                        }), this.EventManager.on("shadow:dbclick", function () {
                            e.mockFullscreen()
                        }), this.EventManager.on("screen:change", function () {
                            e.mockFullscreen()
                        }), this.EventManager.on("video:play", function () {
                            e.baseUI.bigButtonHideFn(), U.default.i(e.TAG, "video:play"), e.tryToPlay()
                        }), this.EventManager.on("video:pause", function () {
                            e.video.pause()
                        }), this.EventManager.on("volume:change", function (t) {
                            0 == t.value ? e.baseUI.tipShow("静音") : e.baseUI.tipShow("音量" + 100 * t.value + "%"), e.changeMuted(t.value)
                        }), this.EventManager.on("lock:open", function (t) {
                            U.default.i(e.TAG, "Open: " + t), e.config.events.unLockScreen ? e.config.events.unLockScreen(t) : e.unLockScreen(t), e.reportor && e.reportor.sendVipLog(t)
                        }), this.EventManager.on("lock:lock", function (t) {
                            U.default.i(e.TAG, "Lock: " + t), e.config.events.lockScreen ? e.config.events.lockScreen(t) : e.lockScreen(t)
                        }), this.EventManager.on("view:change", function (t) {
                            e.switch_screen = "Y", e.removeError(), e.viewChange(t), e.baseUI.emLoadShow()
                        }), this.EventManager.on("quality:change", function (t) {
                            e.switch_screen = "N", e.removeError(), e.qualityChange(t.type), e.baseUI.emLoadShow()
                        }), this.EventManager.on("dash:show", function () {
                            e.baseUI.dashDomShow()
                        }), this.EventManager.on("dash:hide", function () {
                            e.baseUI.dashDomHide()
                        })
                    }
                }, {
                    key: "hideGoApp", value: function () {
                        this.baseUI.shadowShow();
                        var e = document.querySelector(".goAppContainer");
                        e && (e.style.display = "none")
                    }
                }, {
                    key: "showGoApp", value: function () {
                        this.baseUI.shadowHide(), this.baseUI.dashHide();
                        var e = document.querySelector(".goAppContainer");
                        if (e)return e.style.display = "block", !0
                    }
                }, {
                    key: "removeError", value: function () {
                        this.baseUI.posterHide(), this.lockUI.hide(), this.hadError = !1, this.config.pc && this.hideGoApp()
                    }
                }, {
                    key: "loginPu", value: function () {
                        window.external && window.external.execute ? window.external.execute("iku", "iku://|buildin|vip|do-login|live|url|http://vku.youku.com/live/ilproom?id=" + this.config.liveid + "|") : window.location.href = "https://account.youku.com/?callback=" + encodeURIComponent(window.location.href)
                    }
                }, {
                    key: "unLockScreen", value: function (e) {
                        -1 != [100101, 100102, 100103, 100104].indexOf(e.type) && (e.bizCode = e.type, e.type = 1001), this.config.events.pgcError(e)
                    }
                }, {
                    key: "onWaiting", value: function () {
                        this.bufError || this.baseUI.emLoadShow()
                    }
                }, {
                    key: "onCanplay", value: function () {
                        var e = this;
                        if (this.switch_screen = "Y", this.config.refer || (this.config.refer = ""), -1 != this.config.refer.indexOf("18yk11") ? setTimeout(function () {
                                e.baseUI.emLoadHide()
                            }, 2e3) : this.baseUI.emLoadHide(), this.render_first_frame || (this.render_first_frame = Date.now()), !this.hadSendLiveCase) {
                            this.hadSendLiveCase = !0;
                            var t = encodeURIComponent(window.location.href);
                            (0, y.userforlivecase)(this.linktype, "Y", this.defaultStreamInfo.name, this.config.liveid, this.config.live_enter_time, this.live_get_stream, this.init_player, this.send_stream, this.load_first_frame, this.render_first_frame, t)
                        }
                        this.LogoUI && !this.hasLogo && (this.hasLogo = !0, this.LogoUI.waterController({
                            width: this.video.videoWidth,
                            height: this.video.videoHeight
                        }))
                    }
                }, {
                    key: "onloadeddata", value: function () {
                        this.load_first_frame || (this.load_first_frame = Date.now())
                    }
                }, {
                    key: "onCanplaythrough", value: function () {
                    }
                }, {
                    key: "onPlaying", value: function () {
                        var e = this;
                        this.config.refer || (this.config.refer = ""), -1 == this.config.refer.indexOf("18yk11") && this.baseUI.emLoadHide(), this.full || this.config.withoutfull || setTimeout(function () {
                            e.baseUI.controlFullShow()
                        }, 500), this.config.pc || this.EventManager.fire("dash:hide")
                    }
                }, {
                    key: "onPlay", value: function () {
                        this.playerOn(), this.playCallBackToThird()
                    }
                }, {
                    key: "playerOn", value: function () {
                        U.default.i(this.TAG, "playerOn"), this.baseUI.hideLivePlayBtn(), this.lockUI.hide(), this.baseUI.posterHide(), this.UIAngle && this.UIAngle.show(), this.baseUI.shadowShow(), this.baseUI.pauseState()
                    }
                }, {
                    key: "liveShow", value: function () {
                        document.querySelectorAll(".live_video")[0].style.display = "block", document.querySelectorAll(".live_player")[0].style.display = "block"
                    }
                }, {
                    key: "limitLock", value: function () {
                        this.orderHide(), this.orderVideoHide(), this.liveShow(), this.limitLocked = !0, this.onError(1111)
                    }
                }, {
                    key: "liveHide", value: function () {
                        var e = document.querySelector(".live_video"), t = document.querySelector(".live_player");
                        this.sureOrder = !0, e && (e.style.display = "none"), t && (t.style.display = "none")
                    }
                }, {
                    key: "onTimeupdate", value: function () {
                        this.TimeLineUI && this.TimeLineUI.updateMax(this.video.currentTime);
                        var e = parseFloat((this.video.currentTime - this.timeRun).toFixed(5));
                        this.timeRun = e < 0 ? 0 : this.video.currentTime, (0, O.default)("timerun_" + this.lData.screenId, this.timeRun + this.timeBase, {
                            domain: "youku.com",
                            path: "/",
                            expires: 36500
                        }), this.defaultStreamInfo && this.timeRun + this.timeBase >= 60 * parseInt(this.stream.tryPlayTime || 0) && 200 != this.defaultStreamInfo.code && this.onError(1001)
                    }
                }, {
                    key: "containerCreate", value: function () {
                        if (!this.orderContainer) {
                            this.orderContainer = this.selector.querySelectorAll(".order_player_container")[0];
                            var e = document.createElement("div");
                            e.style.width = "100%", e.style.height = "100%", e.style.position = "absolute", e.style.left = "0", e.style.top = "0", this.orderContainer.appendChild(e)
                        }
                    }
                }, {
                    key: "liveInit", value: function (e) {
                        U.default.i(this.TAG, "liveInit======="), this.sureOrder = !1, this.orderHide(), this.lData.liveStatus = 1, this.ad_running || (this.liveShow(), this.baseUI.showLivePlayBtn(), this.baseUI.dashShow(), this.changeToLive(e))
                    }
                }, {
                    key: "orderInitSelf", value: function (e) {
                        U.default.i(this.TAG, "orderInit"), this.sureOrder = !0, this.clearMSE(), this.liveHide(), this.containerCreate(), this.orderContainer.style.display = "block", (0, k.default)(this.config, {
                            videoId: e.vid,
                            lockType: !1
                        });
                        var t = !(e && e.progress);
                        this.config.withoutprogress = t, this.config.withoutQuality = t;
                        var i = this.config.autoplay, n = -1 !== navigator.userAgent.toLowerCase().indexOf("iku");
                        -1 !== window.location.href.indexOf("m3u8") && (n = !1);
                        var s = n && t, a = "https:" === window.location.protocol && !C.default.safari || s ? "mp4" : "m3u8";
                        this.config.target = ".order_player_container", this.config.withoutorder = 1, this.config.fullLog = this.filterStatusUrl(), this.config.control = {
                            autoplay: i,
                            playerType: a,
                            loop: !0
                        }, this.config.loop = !0;
                        var o = (0, k.default)(this.getAdParam(), this.getLiveAdParam(4));
                        this.order ? (this.order[0].EventManager.fire("ChangeVid", {vid: e.vid}), this.orderShow()) : this.order = (0, M.default)((0, k.default)({pauseAdData: o}, this.config, {
                            ccode: e.ccode || "0511",
                            livereportData: this.createReportData()
                        }))
                    }
                }, {
                    key: "orderInit", value: function (e) {
                        this.orderInitSelf(e)
                    }
                }, {
                    key: "liveInitCall", value: function () {
                    }
                }, {
                    key: "orderShow", value: function () {
                        this.orderContainer && (this.orderContainer.style.display = "block")
                    }
                }, {
                    key: "orderHide", value: function () {
                        this.orderContainer && (this.orderContainer.style.display = "none"), this.order && this.order[0].pause()
                    }
                }, {
                    key: "orderVideoHide", value: function () {
                        this.order && (this.order[0].mediaElement.style.display = "none")
                    }
                }]), t
            }(P.default);
            e.default = N
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(2), i(0), i(1), i(4), i(3), i(55), i(5), i(24)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o, r, u) {
            "use strict";
            function l(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var d = l(t), h = l(i), c = l(n), f = l(s), v = l(a), p = l(o), m = l(r), y = function (e) {
                function t(e) {
                    (0, h.default)(this, t);
                    var i = (0, f.default)(this, (t.__proto__ || (0, d.default)(t)).call(this, e));
                    return i.TAG = "HLSPlayer", i
                }

                return (0, v.default)(t, e), (0, c.default)(t, [{
                    key: "dettachMediaElement", value: function () {
                        if (this.ifEvent = !1, this._mediaElement)for (var e in u.VIDEO_EVENTS)m.default.removeEventListenerHander(this._mediaElement, e, this._e[u.VIDEO_EVENTS[e]])
                    }
                }, {
                    key: "vsrc", value: function (e, t) {
                        var i = this;
                        this.hls && (this.hls.destroy(), this.hls = null), window.Hls && (this.hls = new window.Hls, this.hls.loadSource(e), this.hls.attachMedia(this._mediaElement), this.hls.on(window.Hls.Events.MANIFEST_PARSED, function (e) {
                            t && i._mediaElement.play()
                        }))
                    }
                }, {
                    key: "loadExtend", value: function (e) {
                        e.m3u8Url && (this.m3u8Url = e.m3u8Url, this.vsrc(this.m3u8Url))
                    }
                }, {
                    key: "play", value: function () {
                        this.m3u8Url && this._mediaElement && this._mediaElement.play()
                    }
                }, {
                    key: "replay", value: function () {
                        this.m3u8Url && this._mediaElement && (this._currentTime = 0, this._firstflag = !0, this._frontAdTime = 0, this._mediaElement.currentTime = 0 + this._frontAdTime, this.vsrc(this.m3u8Url, !0))
                    }
                }]), t
            }(p.default);
            e.default = y
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(0), i(1), i(24), i(22), i(8), i(5)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o) {
            "use strict";
            function r(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var u = r(t), l = r(i), d = r(s), h = r(a), c = r(o), f = function () {
                function e(t) {
                    (0, u.default)(this, e), this.TAG = "MP4Player", this._curNum = 0, this._isPause = !0, this._pastTime = 0, this._currentTime = 0, this._segs = t.segs || [], this._tryTime = t.tryTime || -1, this._totalTime = t.totalTime || 0, this._firstflag = !0, this._retryNum = 2, this._emitter = new d.default, this._e = {
                        onPlay: this._onPlay.bind(this),
                        onPause: this._onPause.bind(this),
                        onEnded: this._onEnd.bind(this),
                        onCanPlay: this._onCanplay.bind(this),
                        onTimeUpdate: this._onTimeupdate.bind(this),
                        onError: this._onError.bind(this),
                        onLoadeddata: this._onLoadeddata.bind(this),
                        onLoadedmetaData: this._onLoadedmetaData.bind(this),
                        onAbort: this._onAbort.bind(this),
                        onStalled: this._onStalled.bind(this),
                        onSuspend: this._onSuspend.bind(this),
                        onWaiting: this._onWaiting.bind(this),
                        onVolumeChange: this._onVolumeChange.bind(this),
                        onPlaying: this._onPlaying.bind(this),
                        onSeeked: this._onSeeked.bind(this),
                        onSeeking: this._onSeeking.bind(this),
                        onDurationChange: this._onDurationChange.bind(this),
                        onProgress: this._onProgress.bind(this),
                        onRateChange: this._onRateChange.bind(this),
                        onLoadStart: this._onLoadStart.bind(this)
                    }
                }

                return (0, l.default)(e, [{
                    key: "destroy", value: function () {
                        this._curNum = 0, this._isPause = !0, this._pastTime = 0, this._currentTime = 0, this._segs = [], this._tryTime = -1, this._totalTime = 0, this._firstflag = !0, this.dettachMediaElement()
                    }
                }, {
                    key: "resetStatus", value: function () {
                        h.default.i(this.TAG, "resetStatus"), this._curNum = 0, this._isPause = !0, this._pastTime = 0, this._currentTime = 0, this._firstflag = !0
                    }
                }, {
                    key: "on", value: function (e, t) {
                        this._emitter.addListener(e, t)
                    }
                }, {
                    key: "off", value: function (e, t) {
                        this._emitter.removeListener(e, t)
                    }
                }, {
                    key: "attachMediaElement", value: function (e) {
                        if (!this.ifEvent) {
                            this.ifEvent = !0, this._mediaElement = e, this._mediaElement.poster = "";
                            for (var t in n.VIDEO_EVENTS)c.default.addEventListenerHander(this._mediaElement, t, this._e[n.VIDEO_EVENTS[t]])
                        }
                    }
                }, {
                    key: "dettachMediaElement", value: function () {
                        if (this._mediaElement) {
                            this.ifEvent = !1;
                            for (var e in n.VIDEO_EVENTS)c.default.removeEventListenerHander(this._mediaElement, e, this._e[n.VIDEO_EVENTS[e]]);
                            this._mediaElement && (this._mediaElement.src = "", this._mediaElement.removeAttribute("src"), this._mediaElement = null)
                        }
                    }
                }, {
                    key: "load", value: function (e) {
                        if (e)if (e.segs && (this._segs = e.segs), e.time && (this._currentTime = e.time), e.totalTime) this._totalTime = e.totalTime; else {
                            this._totalTime = 0;
                            for (var t = 0, i = this._segs.length; t < i; t++)this._totalTime += this._segs[t].seconds_video
                        }
                        this._mediaElement.style.display = "block", this._firstflag && (this._curNum = 0, this._currentTime = 0), this._mediaElement.src = this._segs[this._curNum].cdn_url, this._mediaElement.play(), this._currentTime > 0 && this.seek(this._currentTime)
                    }
                }, {
                    key: "play", value: function (e) {
                        this._segs && 0 !== this._segs.length && (e && (this._mediaElement.src = this._segs[this._curNum].cdn_url, this._mediaElement.currentTime = this._currentTime - this._pastTime), this._isPause = !1, this._mediaElement.play())
                    }
                }, {
                    key: "pause", value: function () {
                        this._segs && 0 !== this._segs.length && (this._isPause = !0, this._mediaElement.pause())
                    }
                }, {
                    key: "seek", value: function (e) {
                        if (!this.adStatus && (h.default.i(this.TAG, "seek(time):" + e), this._segs && 0 !== this._segs.length)) {
                            e >= this._totalTime && (e = this._totalTime >= 1 ? this._totalTime - 1 : this._totalTime), e < 0 && (e = 0);
                            if (1 === this._segs.length)return 0, this._curNum = 0, this._mediaElement.currentTime = e, this._mediaElement.play(), void this._setCurrentTime(e);
                            this._seekMultiSeg(e)
                        }
                    }
                }, {
                    key: "replay", value: function () {
                        this._curNum = 0, this._isPause = !0, this._pastTime = 0, this._currentTime = 0, this._firstflag = !0, this._mediaElement.src = this._segs[this._curNum].cdn_url, this._mediaElement.currentTime = this._currentTime - this._pastTime, this._isPause = !1, this._mediaElement.play()
                    }
                }, {
                    key: "_seekMultiSeg", value: function (e) {
                        var t = 0, i = void 0;
                        if (i = 0 === e ? 0 : this._getCurNumBy(e), 0 === i ? (t = e, this._pastTime = 0) : (this._pastTime = this._segs[i - 1].totalSegs_seconds_video, t = e - this._pastTime), h.default.i(this.TAG, "_num:" + i + " _pastTime:" + this._pastTime + "  _vtTime:" + t), i === this._curNum) {
                            this._mediaElement.currentTime = t;
                            this._setCurrentTime(t), this._mediaElement.play()
                        } else {
                            var n = this._segs[i].cdn_url;
                            this.vkey = c.default.getURlKey("vkey", n), this.fileid = this._segs[i].fileid, this._curNum = i, n ? (this._mediaElement.pause(), this._mediaElement.src = n, this._mediaElement.currentTime = t, this._setCurrentTime(t), this._mediaElement.play()) : this._mediaElement.pause()
                        }
                    }
                }, {
                    key: "_setCurrentTime", value: function (e) {
                        try {
                            this._mediaElement.currentTime = e
                        } catch (n) {
                            var t = !0, i = this;
                            c.default.addEventListenerHander(this._mediaElement, "canplay", function () {
                                t && (t = !1, i._mediaElement.currentTime = e, i._mediaElement.play())
                            })
                        }
                    }
                }, {
                    key: "_getCurNumBy", value: function (e) {
                        var t = Math.floor(this._segs.length / 2);
                        if (1 === this._segs.length)return 0;
                        e < this._segs[t].totalSegs_seconds_video && (t = 0);
                        for (var i = this._segs.length; t < i && !(e < this._segs[t].totalSegs_seconds_video); t++);
                        return t
                    }
                }, {
                    key: "_onPlay", value: function (e) {
                        this.adStatus || (this._firstflag && (this._firstflag = !1), this._emitter.emit(n.VIDEO_EVENTS.play, e))
                    }
                }, {
                    key: "_onPause", value: function (e) {
                        if (!this.adStatus)return this._ifEmitPause ? void(this._ifEmitPause = !1) : void this._emitter.emit(n.VIDEO_EVENTS.pause, e)
                    }
                }, {
                    key: "_onEnd", value: function (e) {
                        if (!this.adStatus)if (++this._curNum < this._segs.length) {
                            this._pastTime += this._segs[this._curNum - 1].seconds_video, this._mediaElement.pause(), this._ifEmitPause = !0;
                            var t = this._segs[this._curNum].cdn_url;
                            this._mediaElement.src = t, this.vkey = c.default.getURlKey("vkey", t), this.fileid = this._segs[this._curNum].fileid;
                            var i = !0, s = this;
                            c.default.addEventListenerHander(this._mediaElement, "canplay", function () {
                                i && (h.default.d("MP4Player", "canplay:" + s._mediaElement.paused), s._mediaElement.play(), i = !1)
                            }), this._mediaElement.play()
                        } else h.default.i(this.TAG, "_onEnd" + this._curNum), this._emitter.emit(n.VIDEO_EVENTS.ended, e)
                    }
                }, {
                    key: "_onCanplay", value: function (e) {
                        this.adStatus || this._emitter.emit(n.VIDEO_EVENTS.canplay, e)
                    }
                }, {
                    key: "_onTimeupdate", value: function (e) {
                        if (!this.adStatus) {
                            if (this._currentTime = this._mediaElement.currentTime + this._pastTime, this._currentTime >= this._totalTime)return h.default.i(this.TAG, "trytime is out"), this._mediaElement.pause(), this._ifEmitPause = !0, h.default.i(this.TAG, "_onEnd" + this._curNum), void this._emitter.emit(n.VIDEO_EVENTS.ended, e);
                            this._emitter.emit(n.VIDEO_EVENTS.timeupdate, e, this._currentTime)
                        }
                    }
                }, {
                    key: "_onError", value: function (e) {
                        this.adStatus || (this._retryNum > 0 ? (this._mediaElement.src = this._segs[this._curNum].cdn_url, this.seek(this._currentTime), this._retryNum--) : this._emitter.emit(n.VIDEO_EVENTS.error, e))
                    }
                }, {
                    key: "_onLoadeddata", value: function (e) {
                        this.adStatus || this._emitter.emit(n.VIDEO_EVENTS.loadeddata, e)
                    }
                }, {
                    key: "_onLoadedmetaData", value: function (e) {
                        this.adStatus || this._emitter.emit(n.VIDEO_EVENTS.loadedmetadata, e)
                    }
                }, {
                    key: "_onLoadStart", value: function (e) {
                        this.adStatus || this._emitter.emit(n.VIDEO_EVENTS.loadstart, e)
                    }
                }, {
                    key: "_onAbort", value: function (e) {
                        this.adStatus || this._emitter.emit(n.VIDEO_EVENTS.abort, e)
                    }
                }, {
                    key: "_onStalled", value: function (e) {
                        this.adStatus || this._emitter.emit(n.VIDEO_EVENTS.stalled, e)
                    }
                }, {
                    key: "_onSuspend", value: function (e) {
                        this.adStatus || this._emitter.emit(n.VIDEO_EVENTS.suspend, e)
                    }
                }, {
                    key: "_onWaiting", value: function (e) {
                        this.adStatus || this._emitter.emit(n.VIDEO_EVENTS.waiting, e)
                    }
                }, {
                    key: "_onVolumeChange", value: function (e) {
                        this.adStatus || this._emitter.emit(n.VIDEO_EVENTS.volumechange, e)
                    }
                }, {
                    key: "_onPlaying", value: function (e) {
                        this.adStatus || this._emitter.emit(n.VIDEO_EVENTS.playing, e)
                    }
                }, {
                    key: "_onSeeked", value: function (e) {
                        this.adStatus || this._emitter.emit(n.VIDEO_EVENTS.seeked, e)
                    }
                }, {
                    key: "_onSeeking", value: function (e) {
                        this.adStatus || this._emitter.emit(n.VIDEO_EVENTS.seeking, e)
                    }
                }, {
                    key: "_onDurationChange", value: function (e) {
                        this.adStatus || this._emitter.emit(n.VIDEO_EVENTS.durationchange, e)
                    }
                }, {
                    key: "_onProgress", value: function (e) {
                        this.adStatus || this._emitter.emit(n.VIDEO_EVENTS.progress, e)
                    }
                }, {
                    key: "_onRateChange", value: function (e) {
                        this.adStatus || this._emitter.emit(n.VIDEO_EVENTS.ratechange, e)
                    }
                }]), e
            }();
            e.default = f
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(26), i(0), i(1), i(117), i(5), i(8), i(33)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o, r) {
            "use strict";
            function u(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var l = u(t), d = u(i), h = u(n), c = u(s), f = u(a), v = u(o), p = (0, c.default)({
                UPS_API_URL: "https://ups.youku.com/ups/get.json",
                OPEN_API_URL: "https://api.youku.com/players/custom.json",
                OPEN_API_URL_TOKEN: "https://api.youku.com/players/consume.json",
                defaultUA: "DIl58SLFxFNndSV1GFNnMQVYkx1PP5tKe1siZu/86PR1u/Wh1Ptd+WOZsHHWxysSfAOhNJpdVWsdVJNsfJ8Sxd8WKVvNfAS8aS8fAOzYARzPyPc3JvtnPHjTdKfESTdnuTW6ZPvk2pNDh4uFzotgdMEFkzQ5wZVXl2Pf1/Y6hLK0OnCNxBj3+nb0v72gZ6b0td+WOZsHHWxysSo/0y9D2K42SaB8Y/+aD2K42SaB8Y/+ahU+WOZsHcrxysooUeND"
            }), m = function () {
                function e(t, i) {
                    (0, d.default)(this, e), this.TAG = "UPSInfo", this.tryCount = 4, this.param = t, this.iserror = 0, this.issuccess = 0, this.callback = null, this.error = null, this.timeout = null, this.utidErrorNum = 0, this.customParam = i, this.customData = null, this.customContol = {success: !1}
                }

                return (0, h.default)(e, [{
                    key: "destroy", value: function () {
                        this.issuccess = 0, this.iserror = 0, this.customData = null, this.customContol = {success: !1}
                    }
                }, {
                    key: "_initData", value: function (e) {
                        v.default.i(this.TAG, "get ups info success"), this.issuccess++, this.callback(e.data, this.customData)
                    }
                }, {
                    key: "_requestError", value: function (e) {
                        if (console.error(this.TAG, "_requestError" + this.iserror), !this.issuccess)if (++this.iserror < this.tryCount && !this.issuccess) {
                            this.ckey = f.default.getUA() ? f.default.getUA() : this.ckey, this.param.client_ts = (new Date).getTime();
                            var t = this._buildUpsUrl();
                            t = this.iserror > 2 && "http:" === f.default.protocol ? t.replace("https:", "http:") : t, this.upsUrl = t, f.default.request(t, function (e) {
                                this._initData(e)
                            }.bind(this), function (e) {
                                this._requestError(e)
                            }.bind(this), function () {
                                this.timeout()
                            }.bind(this), 5e3)
                        } else this.iserror = 0, this.error(e)
                    }
                }, {
                    key: "_getOpenAPI", value: function () {
                        var e = {};
                        e.refer = this.customParam.refer, e.client_id = this.customParam.client_id, e.video_id = this.param.vid, e.version = "1.0", e.type = "h5", e.embsig = this.customParam.embsig || "";
                        var t = p.OPEN_API_URL + "?" + f.default.urlParameter(e);
                        f.default.getJsonp(t, function (e) {
                            this._parseCustom(e)
                        }.bind(this), function () {
                            this._customFail()
                        }.bind(this), function () {
                            this._customFail()
                        }.bind(this))
                    }
                }, {
                    key: "_parseCustom", value: function (e) {
                        v.default.d(this.TAG, "_parseCustom(data)"), this.customData = e, this.customData && this.customParam.password && this.customData.passless && 1 === parseInt(this.customData.passless) ? (this.param.client_id = this.customParam.client_id, this.param.password = this.customParam.password) : this.param.client_id && delete this.param.client_id, this._getUpsData()
                    }
                }, {
                    key: "_customFail", value: function () {
                        this.customData = null, this._getUpsData(), v.default.d(this.TAG, "_customFail()")
                    }
                }, {
                    key: "sendThirdToken", value: function () {
                        if (this.customData) {
                            var e = this.customData.token, t = p.OPEN_API_URL_TOKEN + "?token=" + e;
                            f.default.getJsonp(t, function (e) {
                                this._thirdTokenSuccess(e)
                            }.bind(this), function () {
                                this._thirdTokenFail()
                            }.bind(this), function () {
                                this._thirdTokenFail()
                            }.bind(this), 1e4)
                        }
                    }
                }, {
                    key: "_thirdTokenSuccess", value: function (e) {
                        v.default.d(this.TAG, "_thirdTokenSuccess(data):" + (0, l.default)(e))
                    }
                }, {
                    key: "_thirdTokenFail", value: function () {
                        v.default.d(this.TAG, "_thirdTokenFail()")
                    }
                }, {
                    key: "_buildUpsUrl", value: function () {
                        var e = f.default.upstest ? f.default.upstest : p.UPS_API_URL;
                        return e += "?" + f.default.urlParameter(this.param), e += "&utid=" + encodeURIComponent(this.utid), this.customData && this.customParam.password && 1 === this.customData.status && 1 === this.customData.passless && (e += "&client_id=" + this.customParam.client_id), this.customData && this.customData.stealsign && (e += "&r=" + encodeURIComponent(this.customData.stealsign)), e += "&ckey=" + encodeURIComponent(this.ckey), e += f.default.getUCStr(this.param.vid, this.param.ccode)
                    }
                }, {
                    key: "_getUpsData", value: function () {
                        if (this.param.client_ts = parseInt((new Date).getTime() / 1e3), this.param.utid ? this.utid = this.param.utid : this.utid = f.default.getCna(), delete this.param.utid, this.utid && this.ckey) {
                            this.utidErrorNum = 0;
                            var e = this._buildUpsUrl();
                            this.upsUrl = e, f.default.request(e, function (e) {
                                this._initData(e)
                            }.bind(this), function (e) {
                                this._requestError(e)
                            }.bind(this), function () {
                                this.timeout()
                            }.bind(this), 5e3)
                        } else {
                            if (this.utidErrorNum > 10) {
                                this.error({note: "请允许cookie存储", code: "0000"});
                                var t = "http://gm.mmstat.com/yt/youkuplayer.fdl.error?track_view_code=&utid=&ccode=0501&ups_url=&cdn_url=&m3u8_url=&error_type=10&error_code=10101&error_position=0&user_timestamp=" + (new Date).getTime() + "&userid=&vip=&player_version=&t=" + (new Date).getTime();
                                return f.default.sendlog(t), void(this.utidErrorNum = 0)
                            }
                            this.utidErrorNum++;
                            var i = this;
                            this.tryTimer = setTimeout(function () {
                                v.default.i(this.TAG, "再次获取utid"), i.utid = f.default.getCna(), i.utidErrorNum > 4 && !i.ckey ? i.ckey = p.defaultUA : i.ckey = f.default.getUA(), i.start(), clearTimeout(this.tryTimer)
                            }, 500)
                        }
                    }
                }, {
                    key: "start", value: function (e, t, i, n, s) {
                        if (this.error = t || this.error, this.callback = e || this.callback, this.timeout = i || function () {
                                }, n)for (var a in n)this.param[a] = n[a];
                        if (s)for (var a in s)this.customParam[a] = s[a];
                        s ? this._getOpenAPI() : (this.customParam && this.customParam.password && delete this.customParam.password, this._getUpsData())
                    }
                }]), e
            }();
            e.default = m
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(0), i(1), i(5), i(8), i(54)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a) {
            "use strict";
            function o(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var r = o(t), u = o(i), l = o(n), d = o(s), h = {
                ups: "ups",
                video: "video",
                stream: "stream",
                show: "show",
                fee: "fee",
                dvd: "dvd",
                videos: "videos",
                trial: "trial",
                user: "user",
                vip: "vip",
                ticket: "ticket",
                cloud: "cloud",
                uploader: "uploader",
                preview: "preview",
                album: "album",
                token: "token",
                controller: "controller",
                network: "network",
                playlog: "playlog",
                videolike: "videolike",
                pay: "pay",
                vipPayInfo: "vip_pay_info",
                zpdPayInfo: "zpd_pay_info",
                error: "error"
            }, c = function () {
                function e(t) {
                    (0, r.default)(this, e), this.TAG = "VideoInfo", this.ups = null, this.security = null, this.stream = {}, this.ccode = t
                }

                return (0, u.default)(e, [{
                    key: "destroy", value: function () {
                        for (var e in h)this[e] = null
                    }
                }, {
                    key: "init", value: function (e, t, i) {
                        if (this.destroy(), e.ups || d.default.e(this.TAG, "the data.ups is undefined,please check data"), this.password = t, this.client_id = i, this._copyData(e), this.totalTime = this.video.seconds, this.video.title = l.default.htmlEncodeAll(this.video.title), this.show && (this.show.title = l.default.htmlEncodeAll(this.show.title)), this.encodeId = this.video.encodeid, this.videoId = this.video.id, this.stream && !(this.stream.length < 1)) {
                            var n = this.video.stream_types, s = [];
                            this.langcodes = [];
                            for (var a in n)s.push({
                                lang: this.langCodeToCN(a).value,
                                langcode: a,
                                vid: this.encodeId
                            }), this.langcodes.push(a);
                            this.languageList = this.dvd && this.dvd.audiolang ? this.dvd.audiolang : s, this.logo = {}, this._createStream(this.stream, this.langcodes), this._createHdList()
                        }
                    }
                }, {
                    key: "_copyData", value: function (e) {
                        for (var t in h)this[t] = e[h[t]]
                    }
                }, {
                    key: "_getPreviewInfo", value: function (e) {
                        this.preview.point = e.point, this.preview.head = e.head, this.preview.tail = e.tail, this.preview.notsharing = e.notsharing, this.preview.threed = e.threed
                    }
                }, {
                    key: "langCodeToCN", value: function (e) {
                        var t = "";
                        switch (e) {
                            case"default":
                                t = {key: "default", value: "国语"};
                                break;
                            case"guoyu":
                                t = {key: "guoyu", value: "国语"};
                                break;
                            case"yue":
                                t = {key: "yue", value: "粤语"};
                                break;
                            case"chuan":
                                t = {key: "chuan", value: "川话"};
                                break;
                            case"tai":
                                t = {key: "tai", value: "台湾"};
                                break;
                            case"min":
                                t = {key: "min", value: "闽南"};
                                break;
                            case"en":
                                t = {key: "en", value: "英语"};
                                break;
                            case"ja":
                                t = {key: "ja", value: "日语"};
                                break;
                            case"kr":
                                t = {key: "kr", value: "韩语"};
                                break;
                            case"in":
                                t = {key: "in", value: "印度"};
                                break;
                            case"ru":
                                t = {key: "ru", value: "俄语"};
                                break;
                            case"fr":
                                t = {key: "fr", value: "法语"};
                                break;
                            case"de":
                                t = {key: "de", value: "德语"};
                                break;
                            case"it":
                                t = {key: "it", value: "意语"};
                                break;
                            case"es":
                                t = {key: "es", value: "西语"};
                                break;
                            case"po":
                                t = {key: "po", value: "葡语"};
                                break;
                            case"th":
                                t = {key: "th", value: "泰语"};
                                break;
                            case"man":
                                t = {key: "man", value: "暖男"};
                                break;
                            case"baby":
                                t = {key: "baby", value: "萌童"};
                                break;
                            default:
                                t = {key: "default", value: "国语"}
                        }
                        return t
                    }
                }, {
                    key: "_createStream", value: function (e, t) {
                        if (0 === e.length)return [];
                        var i = {};
                        e[0].audio_lang;
                        this.logo = {};
                        for (var n = 0, s = t.length; n < s; n++) {
                            var a = t[n];
                            i[a] = {}, this.logo[a] = {};
                            for (var o = 0, r = e.length; o < r; o++) {
                                for (var u = e[o], l = u.segs, d = 0, h = 0, c = 0, f = l.length; c < f; c++)l[c].seconds_audio = parseInt(l[c].total_milliseconds_audio) / 1e3, l[c].seconds_video = parseInt(l[c].total_milliseconds_video) / 1e3, d += parseInt(l[c].total_milliseconds_audio), h += parseInt(l[c].total_milliseconds_video), l[c].totalSegs_seconds_audio = d / 1e3, l[c].totalSegs_seconds_video = h / 1e3;
                                var v = void 0;
                                e[o].audio_lang === a && (u.seconds_audio = u.milliseconds_audio / 1e3, u.seconds_video = u.milliseconds_video / 1e3, i[a][e[o].stream_type] ? (v = i[a][e[o].stream_type], v.seconds_video += u.seconds_video, v.seconds_audio += u.seconds_audio, v.size += u.size, v.segs = this._splicSegs(v.segs, u.segs), "tail" === u.channel_type && (v.tailTime = u.seconds_video)) : (v = u, "head" === v.channel_type ? v.headTime = u.seconds_video : v.headTime = 0, v.tailTime = 0, v.m3u8_url = this._checkM3u8(u.m3u8_url), this.logo[a][e[o].stream_type] = u.logo && "none" !== u.logo ? 1 : 0), i[a][e[o].stream_type] = v)
                            }
                        }
                        this.stream = i
                    }
                }, {
                    key: "_splicSegs", value: function (e, t) {
                        for (var i = e[e.length - 1], n = i.totalSegs_seconds_audio, s = i.totalSegs_seconds_video, a = i.total_milliseconds_video, o = i.total_milliseconds_audio, r = 0, u = t.length; r < u; r++) {
                            var l = t[r];
                            l.totalSegs_seconds_audio += n, l.totalSegs_seconds_video += s, l.total_milliseconds_audio += o, l.total_milliseconds_video += a, e.push(l)
                        }
                        return e
                    }
                }, {
                    key: "_checkM3u8", value: function (e) {
                        l.default.m3u8test && (e = e.replace("http://pl-ali.youku.com", l.default.m3u8test)), this.password && e.indexOf("&password=") < 0 && (e += "&password=" + this.password), this.client_id && "youkumobileplaypage" !== this.client_id && e.indexOf("&client_id") < 0 && (e += "&client_id=" + this.client_id);
                        var t = l.default.getUCStr(this.encodeId, this.ccode) || "";
                        return e.indexOf("xk=") < 0 && t && (e += t), e
                    }
                }, {
                    key: "_checkKUrl", value: function (e) {
                        return e
                    }
                }, {
                    key: "_createHdList", value: function () {
                        var e = this;
                        this.hdList = {}, this.langcodes.forEach(function (t, i) {
                            var n = e.stream[t], s = e.video.stream_types[t];
                            e.hdList[t] = {}, e.hdList[t].hditems = [], e.hdList[t].hdcodes = [];
                            var o = s.indexOf("mp4hd2"), r = s.indexOf("mp4hd3"), u = s.indexOf("mp4sd"), l = s.indexOf("mp4hd2v2"), d = s.indexOf("mp4hd3v2"), h = s.indexOf("flvhd"), c = s.indexOf("3gphd");
                            u >= 0 ? (h >= 0 && s.splice(h, 1), c >= 0 && s.splice(c, 1)) : h >= 0 && c >= 0 && s.splice(c, 1), l >= 0 && o >= 0 && s.splice(o, 1), d >= 0 && r >= 0 && s.splice(r, 1), s.forEach(function (i, s) {
                                var o = i, r = a.SHOWHD_MAP[o];
                                n[o] && (e.hdList[t].hditems.push({hdcode: o, hdname: r}), e.hdList[t].hdcodes.push(o))
                            })
                        }), this.hdcodes = this.hdList[this.langcodes[0]].hdcodes
                    }
                }, {
                    key: "getVideoInfo", value: function () {
                        return this.video ? this.video : null
                    }
                }, {
                    key: "getVideoList", value: function () {
                        if (!this.videos)return null;
                        var e = {};
                        return e.list = this.videos.list || [], e.next = this.videos.next || null, e.previous = this.videos.previous || null, e
                    }
                }, {
                    key: "getShow", value: function () {
                        return this.show ? this.show : null
                    }
                }, {
                    key: "getStreamLogo", value: function () {
                        return this.logo ? this.logo : null
                    }
                }, {
                    key: "getTrialInfo", value: function () {
                        return this.trial ? this.trial : null
                    }
                }, {
                    key: "getPreviewInfo", value: function () {
                        if (!this.dvd && !this.preview)return null;
                        var e = {};
                        return this.preview && (e.thumb = this.preview.thumb, e.timespan = this.preview.timespan), this.dvd && (e.head = this.dvd.head ? parseInt(this.dvd.head) / 1e3 : 0, e.tail = this.dvd.tail ? parseInt(this.dvd.tail) / 1e3 : 0, e.point = this.dvd.point), e
                    }
                }, {
                    key: "getCloudOptions", value: function () {
                        if (!this.cloud && !this.playlog)return null;
                        var e = {};
                        return this.playlog && (e.lastpoint = this.playlog.lastpoint), this.cloud && (e.subtitle = this.cloud.player_var_subtitle, e.skip = this.cloud.player_skip_titles_credits, e.lang = this.cloud.player_language), e
                    }
                }, {
                    key: "getUserInfo", value: function () {
                        var e = {};
                        return this.user && (e.uid = this.user.uid, e.vip = this.user.vip, e.ip = this.user.ip), this.vip && (e.ad = this.vip.ad, e.acc_support = this.vip.acc_support, e.acc_pen = this.vip.acc_open, e.hd3 = this.vip.hd3, e.note = this.vip.note, e.reason = this.vip.reason, e.link = this.vip.link), e
                    }
                }, {
                    key: "getPayInfo", value: function () {
                        if (!this.pay && !this.fee)return null;
                        var e = {};
                        return this.pay && (e.can_play = this.pay.can_play, e.h5_caseurl = this.pay.h5_caseurl, e.price = this.pay.price, e.discount_price = this.pay.discount_price, e.duration = this.pay.duration), this.fee && (e.ad = this.fee.ad, e.paidType = this.fee.paid_type, e.ownChannelId = this.fee.own_channel_id, e.paid = this.fee.paid, e.videoType = this.fee.video_type), e
                    }
                }, {
                    key: "getVipPayInfo", value: function () {
                        return this.vipPayInfo ? this.vipPayInfo : null
                    }
                }, {
                    key: "getZpdPayInfo", value: function () {
                        if (!this.zpdPayInfo)return this.zpdPayInfo
                    }
                }, {
                    key: "getFee", value: function () {
                        return this.fee ? this.fee : null
                    }
                }, {
                    key: "getUploader", value: function () {
                        return this.uploader
                    }
                }, {
                    key: "getVideolike", value: function () {
                        return this.videolike
                    }
                }, {
                    key: "getController", value: function () {
                        return this.controller ? this.controller : null
                    }
                }, {
                    key: "getAlbum", value: function () {
                        return this.album ? this.album : null
                    }
                }, {
                    key: "getStreamData", value: function (e, t) {
                        return this.stream && this.stream[e] && this.stream[e][t] ? this.stream[e][t] : null
                    }
                }]), e
            }();
            e.default = c
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (i, o) {
            s = [t], n = o, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e) {
            "use strict";
            Object.defineProperty(e, "__esModule", {value: !0});
            var t = {
                ALI: {
                    TSLOG: "//yt1.mmstat.com/yt/vp.vtslog",
                    DURATIONLOG: "//yt.mmstat.com/yt/vp.vdoview",
                    EVENTLOG: "//yt2.mmstat.com/yt/vp.event"
                },
                TUDOU: {
                    TSLOG: "//gm.mmstat.com/yt/newtudou.web.ts",
                    DURATIONLOG: "//gm.mmstat.com/yt/newtudou.web.vv",
                    EVENTLOG: "//gm.mmstat.com/yt/newtudou.web.event"
                }
            }, i = {
                guoyu: {num: 1, name: "国语"},
                yue: {num: 2, name: "粤语"},
                chuan: {num: 3, name: "川话"},
                tai: {num: 4, name: "台湾"},
                min: {num: 5, name: "闽南"},
                en: {num: 6, name: "英语"},
                ja: {num: 7, name: "日语"},
                kr: {num: 8, name: "韩语"},
                in: {num: 9, name: "印度"},
                fr: {num: 11, name: "法语"},
                de: {num: 12, name: "德语"},
                it: {num: 13, name: "意语"},
                es: {num: 14, name: "西语"},
                th: {num: 16, name: "泰语"},
                baby: {num: 1, name: "萌童"},
                man: {num: 1, name: "暖男"}
            };
            e.REPORT_API = t, e.LANGMAP = i
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(0), i(1), i(5), i(12), i(95), i(33), i(8), i(109), i(110)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o, r, u, l) {
            "use strict";
            function d(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var h = d(t), c = d(i), f = d(n), v = d(s), p = d(r), m = (d(u), d(l)), y = function () {
                function e(t, i, n, s) {
                    (0, h.default)(this, e), this.TAG = "Reporter", this.cna = n.cna ? n.cna : f.default.getCna(), this.client_id = n.client_id, this.ccode = n.ccode || "0501", this.supportType = n.supportType || "mp4", this.winType = 30, this._player = s, this._isThirdParty = this._player.isThirdParty, this._mediaElement = t, this._videoInfo = i, this.totalTime = this._videoInfo && this._videoInfo.totalTime ? this._videoInfo.totalTime : 0, this.pubParam = {}, this._initParam(), this.mtype = this._getMType(), this.tsSn = 0, this.tstimer = null, this.drtimer = null, this._adInfo = {}, this.isRetry = 0, this.tsClb = 0, this.dClb = 0, this.dimension = {
                        w: this._mediaElement.offsetWidth,
                        h: this._mediaElement.offsetHeight
                    }, this.screenDim = {
                        w: screen.availWidth,
                        h: screen.availHeight
                    }, this._vvlogconfig = n.vvlogconfig || {};
                    try {
                        this.vvlogext = n._vvlogconfig.vvlogext ? n._vvlogconfig.vvlogext : UrchinAplus._yVvlogInfo()
                    } catch (e) {
                        this.vvlogext = ""
                    }
                    var a = new Date;
                    this._time = a.getFullYear() + "" + a.getMonth() + a.getDate()
                }

                return (0, c.default)(e, [{
                    key: "destroy", value: function () {
                        this._videoInfo = null, this.tsSn = 0, clearTimeout(this.tstimer), this.tstimer = null, clearInterval(this.drtimer), this.drtimer = null
                    }
                }, {
                    key: "init", value: function (e, t) {
                        this._videoInfo = e, this.sid = t, this.tsSn = 0, this.cna = this.cna ? this.cna : f.default.getCna(), this.totalTime = this._videoInfo.totalTime || 0, this._initParam()
                    }
                }, {
                    key: "changeParam", value: function (e) {
                        if (e)for (var t in e)this[t] = e[t]
                    }
                }, {
                    key: "sendTSLog", value: function (e) {
                    }
                }, {
                    key: "tsInit", value: function () {
                        this.tsSn = null, this.tsClb = 0, this.dClb = 0, this.drtimer && (clearInterval(this.drtimer), this.drtimer = null)
                    }
                }, {
                    key: "initAdInfo", value: function (e) {
                        this._adInfo || (this._adInfo = {}), this._adInfo.REQID = e.REQID, this._adInfo.is_pread = 1
                    }
                }, {
                    key: "addPlayerDurationReport", value: function (e) {
                    }
                }, {
                    key: "sendUserActionReport", value: function (e, t, i, n) {
                        var s = {t: 1002, e: e, v: t || "ac"};
                        s.d = f.default.encode64(this.mtype);
                        var o = {
                            v: "h5player",
                            vid: this.pubParam.videoId,
                            uid: this.pubParam.uid,
                            ssid: this.pubParam.psid,
                            sid: this.pubParam.showId,
                            ct: this.pubParam.cateId,
                            cs: this.pubParam.subcates,
                            tc: parseInt(this._player.currentTime) || 0,
                            w: this._mediaElement.offsetWidth,
                            h: this._mediaElement.offsetHeight
                        };
                        o.f = this._player.control.fullscreen ? "on" : "off", o.q = this._getQuality(), o.ver = "1.0.0";
                        for (var r in i)o[r] = i[r];
                        s.x = f.default.encode64(f.default.urlParameter(o)), s.cna = this.cna;
                        f.default.urlParameter(s);
                        if ("xenfs" == e || "xexfs" == e) {
                            this._giveupReTag = !0;
                            var u = this;
                            setTimeout(function (e) {
                                u._giveupReTag = !1
                            }, 800)
                        }
                        try {
                            this.vvlogext || (this.vvlogext = UrchinAplus._yVvlogInfo() || ""), this.vvlogext && (s.pc_i = this.vvlogext.pc_i, s.pc_u = this.vvlogext.pc_u)
                        } catch (e) {
                        }
                        s.url = n || "", "0505" === this.ccode ? f.default.sendlog(a.REPORT_API.TUDOU.EVENTLOG + "?" + f.default.urlParameter(s)) : f.default.sendlog(a.REPORT_API.ALI.EVENTLOG + "?" + f.default.urlParameter(s))
                    }
                }, {
                    key: "checkPlayerResize", value: function (e, t) {
                    }
                }, {
                    key: "sendUPSLog", value: function (e) {
                        var t = {};
                        t.psid = this.pubParam.psid, t.ups_client_netip = this.pubParam.ip, t.vid = this.pubParam.videoId, t.title = encodeURI(this.pubParam.title), t.ccode = this.ccode, t.uid = this.pubParam.uid || null, t.user_agent = encodeURI(navigator.userAgent), t.vip = this.pubParam.isvip, t.log_type = e;
                        var i = f.default.urlParameter(t);
                        this.sendGoldLog("/yt/youkuplayer.fdl.h5send", "EXP", i, "H1482418994")
                    }
                }, {
                    key: "sendErrorLog", value: function (e, t) {
                        var i = {};
                        i.track_view_code = e, i.utid = this.cna, i.ccode = this.ccode, i.ups_url = t.upsUrl, i.cdn_url = t.cdnUrl, i.m3u8_url = t.m3u8Url ? t.m3u8Url : "", i.error_type = t.errorType, i.error_code = t.errorCode || "", i.error_position = t.currentTime ? t.currentTime : 0, i.user_timestamp = (new Date).getTime(), i.userid = this.pubParam.userid ? this.pubParam.userid : "", i.vip = this.pubParam.isvip ? this.pubParam.isvip : 0, i.player_version = "H5", i.logextvv = m.default.hex_md5(this._time);
                        var n = f.default.urlParameter(i);
                        this.sendGoldLog("/yt/youkuplayer.fdl.error", "EXP", n, "H1481495508")
                    }
                }, {
                    key: "sendGoldLog", value: function (e, t, i, n) {
                        try {
                            goldlog.record(e, t, i, n)
                        } catch (t) {
                            p.default.w(this.TAG, "goldLog:goldlog.record is error||url:" + e + "||param:" + i + "||logCode:" + n)
                        }
                    }
                }, {
                    key: "createViewCode", value: function () {
                        var e = "H", t = (new Date).getTime() + "";
                        return e += Math.round(1e10 * Math.random()), e += t.substr(7, 12)
                    }
                }, {
                    key: "_initParam", value: function () {
                        if (this._videoInfo) {
                            this._videoInfo.user ? (this.pubParam.uid = this._videoInfo.user.uid ? this._videoInfo.user.uid : 0, this.pubParam.isvip = this._videoInfo.user.vip ? 1 : 0) : (this.pubParam.uid = 0, this.pubParam.isvip = 0), this.pubParam.frame = this._vvlogconfig && this._vvlogconfig.frame ? 1 : 0, this.pubParam.continous = this._vvlogconfig && this._vvlogconfig.continous ? 1 : 0, this.pubParam.ip = this._videoInfo.ups.ups_client_netip, this.pubParam.psid = this._videoInfo.ups.psid, this.pubParam.videoId = this._videoInfo.video.id, this.pubParam.paystate = this._getPayState(this._videoInfo.show), this.pubParam.playstate = this._videoInfo.trial ? 2 : 1, this.pubParam.cateId = this._videoInfo.video.category_id || "", this.pubParam.subcates = this._getSubCategories(this._videoInfo.video.subcategories), this.pubParam.userid = this._videoInfo.video.userid ? this._videoInfo.video.userid : "", this.pubParam.title = this._videoInfo.video.title, this.pubParam.totalsec = this._videoInfo.video.seconds;
                            var e = this._videoInfo.hdcodes.join(",");
                            if (e.indexOf("hd3") > -1 ? this.pubParam.format = 3 : e.indexOf("hd2") > -1 ? this.pubParam.format = 2 : e.indexOf("mp4hd,") ? this.pubParam.format = 1 : this.pubParam.format = 0, this._videoInfo.show ? (this.pubParam.showflag = "1", this.pubParam.showId = this._videoInfo.show.id || "", this.pubParam.Copyright = this._videoInfo.show.copyright || 0, this.pubParam.stage = this._videoInfo.show.stage ? this._videoInfo.show.stage : 0, this.pubParam.show_videotype = this._videoInfo.show.video_type, this.pubParam.showChannelId = this.pubParam.cateId, this.pubParam.ocs = this.pubParam.subcates) : (this.pubParam.showId = "", this.pubParam.showflag = "0", this.pubParam.Copyright = 0, this.pubParam.stage = 0, this.pubParam.show_videotype = 1), this.pubParam.Type = 0, this._videoInfo.album) {
                                var t = this._videoInfo.album;
                                this.pubParam.Type = 1, this.pubParam.playListId = t.id, this.pubParam.folderOwnerId = t.owner_id, this.pubParam.fob = this._vvlogconfig && this._vvlogconfig.order ? this._vvlogconfig.order : 1, this.pubParam.fpo = 0, player._videoInfo.videos && (this.pubParam.fpo = player._videoInfo.videos.next ? parseInt(player._videoInfo.videos.next.seq) - 1 : player._videoInfo.videos.previous ? parseInt(player._videoInfo.videos.previous.seq) : 0), this.pubParam.fcs = this.pubParam.subcates, this.pubParam.playListChannelId = this.pubParam.cateId, this.pubParam.stage = t.total
                            }
                            this._isThirdParty && (this.pubParam.emb = this._getEmb(this.pubParam.ip, this.pubParam.videoId)), this.pubParam.dma_code = this._videoInfo.network ? this._videoInfo.network.dma_code : "", this.pieceLength = "m3u8" === this.supportType ? 1 : this._videoInfo.stream[this._player.control.lang][this._player.control.hd].length
                        }
                    }
                }, {
                    key: "_getParentUrl", value: function () {
                        var e = null;
                        if (parent !== window)try {
                            e = parent.location.href
                        } catch (t) {
                            e = document.referrer
                        }
                        return e
                    }
                }, {
                    key: "_getMType", value: function () {
                        return v.default.android ? v.default.isAndroid4 ? "adr4" : "adr" : v.default.isIphone ? "iph" : v.default.isIpad ? "ipa" : v.default.isIpod ? "ipo" : "oth"
                    }
                }, {
                    key: "_getQuality", value: function () {
                        if ("m3u8" != this.supportType)return "m";
                        var e = this._player.control.hd;
                        return -1 !== e.indexOf("mp4hd") ? "m" : -1 !== e.indexOf("flvhd") ? "f" : -1 !== e.indexOf("mp4hd2") ? "h" : void 0
                    }
                }, {
                    key: "_signTS", value: function (e) {
                        if (null == e)return 0;
                        var t, i = 0, n = e.length;
                        for (t = 0; t < n; t++)i = 43 * i + e.charCodeAt(t), i %= 1e10;
                        return i
                    }
                }, {
                    key: "_getHDFlag", value: function (e) {
                        var t = {flv: 0, flvhd: 0, "3gphd": 0, mp4hd: 1, mp4hd2: 2, mp4hd3: 3};
                        return t[e] ? t[e] : 1
                    }
                }, {
                    key: "_getLanguage", value: function (e) {
                        return e || (e = this._player.control.lang), a.LANGMAP[e] ? a.LANGMAP[e].num : 1
                    }
                }, {
                    key: "_getPlayTime", value: function () {
                        return this.tsSn > 24 ? 180 + 20 * (this.tsSn - 24) : this.tsSn > 12 ? 60 + 10 * (this.tsSn - 12) : 5 * this.tsSn
                    }
                }, {
                    key: "_getExtString", value: function (e) {
                        var t = {};
                        t.iku = "n", t.full = this._player.control.fullscreen ? 1 : 0, t.lang = this._getLanguage(), t.num = e, t.ctp = 0, t.pc = 60 == e ? 0 : 1, t.clb = 0, t.ctype = this.ccode, t.ev = "1", t.isvip = this.pubParam.isvip, t.paystate = this.pubParam.paystate, t.playstate = this.pubParam.playstate;
                        var i = this.cna;
                        return t.cna = i || "", escape(f.default.urlParameter(t))
                    }
                }, {
                    key: "_getPayState", value: function (e) {
                        var t = 0;
                        if (!e || !e.pay_type)return 0;
                        var i = e.pay_type.join("");
                        return i.indexOf("vod") > -1 ? t = 1 : i.indexOf("mon") > -1 ? t = 2 : t
                    }
                }, {
                    key: "_getSubCategories", value: function (e) {
                        if (!e)return "";
                        for (var t = "", i = 0; i < e.length; i++)t += e[i].id + "|";
                        return t.substring(0, t.length - 1)
                    }
                }, {
                    key: "_getCurLoadedBytes", value: function () {
                        var e = this._player.mediaElement, t = e.buffered, i = t.length, n = 0;
                        try {
                            for (var s = this._videoInfo.stream[this._player.control.lang][this._player.control.hd].size, a = this.pubParam.totalsec, o = 0; o < i; o++) {
                                n += (t.end(o) - t.start(o)) / a * s
                            }
                        } catch (e) {
                        }
                        return parseInt(n)
                    }
                }, {
                    key: "_getEmb", value: function (e, t) {
                        var i = location.host, n = location.pathname, s = [];
                        s.push(e), s.push(t), s.push(i), s.push(n);
                        var a = s.join(" ");
                        return f.default.encode64(a)
                    }
                }]), e
            }();
            e.default = y
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(9), i(98)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i) {
            "use strict";
            function n(e) {
                return e && e.__esModule ? e : {default: e}
            }

            function s(e) {
                var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {}, i = {};
                if ("string" != typeof e)return void log.warn('selector must be String.Example:".class" or "#id"!');
                var n = document.querySelectorAll(e);
                if (n && n.length) {
                    for (var s = 0, a = n.length; s < a; s++) {
                        var u = {};
                        n[s].style.width = "100%", n[s].style.height = "100%", n[s].style.position = "relative";
                        for (var l in t)Array.isArray(t[l]) && (u[l] = t[l][s]);
                        var d = document.createElement("spvdiv");
                        d.className = "spv_video_container", n[s].appendChild(d), i[s] = new r.default(n[s], (0, o.default)({}, t, u))
                    }
                    return i.length = n.length, i.EventManager = i[0].EventManager, i
                }
            }

            function a(e) {
                return s(e.target, e)
            }

            Object.defineProperty(e, "__esModule", {value: !0}), e.default = a;
            var o = n(t), r = n(i)
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(9), i(2), i(0), i(1), i(4), i(3), i(53), i(64), i(61), i(63), i(12), i(59), i(104), i(100), i(83), i(102), i(101), i(25), i(99), i(62)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o, r, u, l, d, h, c, f, v, p, m, y, _, g, k) {
            "use strict";
            function E(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var A = E(t), T = E(i), b = E(n), w = E(s), S = E(a), P = E(o), L = E(u), I = E(l), x = E(d), C = E(h), D = E(c), M = E(f), U = E(v), O = E(p), R = E(m), N = E(y), V = E(_), F = E(g), G = E(k), H = function (e) {
                function t(e, i) {
                    (0, b.default)(this, t);
                    var n = (0, S.default)(this, (t.__proto__ || (0, T.default)(t)).call(this, e.querySelectorAll(".spv_video_container")[0], i));
                    return n.selector = e, n.loadFirst = !0, n.full = !1, n.config = i, n.EventManager = new D.default, n.private_key = n.config.private_key, n.UI = new M.default(e), n.UIControl = new U.default(e, n.EventManager, n.config), n.UIBlock = new F.default(e, n.EventManager, n.config), n.UILock = new G.default(e, n.EventManager, "spv"), n.mimeTime = 0, n.countTime = 0, n.Tipbar = (0, V.default)(e, n.EventManager), n.watcher(), n.hadEnd = !1, n.firstPlaying = !0, n.start_time = 0, n.width = n.selector.clientWidth, n.height = n.selector.clientHeight, n.selector.style.background = "#000", n.configInter(), n.UIControl.setMock(n.config.fullLog), C.default.iku && (n.ikuFullScreen(), document.body.style.overflow = "hidden"), n
                }

                return (0, P.default)(t, e), (0, w.default)(t, [{
                    key: "configInter", value: function () {
                        var e = this;
                        this.config.events || (this.config.events = {}), ["onPlayerStart", "onPlayerComplete", "onPlay", "onPause", "onBuffer", "onFullScreen", "playReady", "playEnded", "fullScreen", "helperWork", "controlHide", "controlShow"].forEach(function (t, i) {
                            e.config.events[t] || (e.config.events[t] = function () {
                            })
                        })
                    }
                }, {
                    key: "playCallBackToThird", value: function () {
                        window.livePlayerPlay && window.livePlayerPlay(this.config.pid);
                        try {
                            parent.window.livePlayerPlay(this.config.pid)
                        } catch (e) {
                        }
                        try {
                            external.livePlayerPlay(this.config.pid)
                        } catch (e) {
                        }
                    }
                }, {
                    key: "pauseCallBackToThird", value: function () {
                        window.livePlayerPause && window.livePlayerPause(this.config.pid);
                        try {
                            parent.window.livePlayerPause(this.config.pid)
                        } catch (e) {
                        }
                        try {
                            external.livePlayerPause(this.config.pid)
                        } catch (e) {
                        }
                    }
                }, {
                    key: "getPlayerStatus", value: function () {
                        return this.status
                    }
                }, {
                    key: "getPlayerSize", value: function () {
                        return {width: this.width, height: this.height}
                    }
                }, {
                    key: "getStreamSize", value: function () {
                        return this.data && this.data.stream && this.data.stream.length ? {
                            width: this.data.stream[0].width,
                            height: this.data.stream[0].height
                        } : {}
                    }
                }, {
                    key: "get_customor_time", value: function () {
                    }
                }, {
                    key: "onStreamSize", value: function (e) {
                        e.srcElement && (this.video_width = e.srcElement.videoWidth, this.video_height = e.srcElement.videoHeight)
                    }
                }, {
                    key: "getFirstPlayInfo", value: function () {
                        var e = this.data;
                        if (e.video) {
                            var t = e.video.encodeid, i = {};
                            return i.vid = e.video.id, i.vidEncoded = t, i.pt = this.getPt(t), i.loop = this.config.loop, i.isFullScreen = this.full, i.Fid = e.album && e.album.id, i
                        }
                    }
                }, {
                    key: "getOtherPlayInfo", value: function () {
                        var e = (this.data.videos, {});
                        return e.loop = this.config.loop, e.isFullScreen = this.full, e.Fid = this.data.album && this.data.album.id, e
                    }
                }, {
                    key: "coreExtendsReady", value: function () {
                        var e = this;
                        if (this.firstPlaying) {
                            this.UIControl.playFirstHide(), this.firstPlaying = !1;
                            var t = this.getShow();
                            t && t.youku_register_num && (this.UIControl.codeInfoChange(t.youku_register_num, t.license_num), this.UIControl.showDom("uicode"), setTimeout(function () {
                                return e.UIControl.hideDom("uicode")
                            }, 3e3)), t && t.exclusive
                        }
                        this.EventManager.fire("canPlay")
                    }
                }, {
                    key: "wm", value: function () {
                        var e = this.data.waterMark;
                        e && e.length >= 1 && (this.LogoUI = new x.default(this.selector, this.EventManager, "live", e, Date.now()))
                    }
                }, {
                    key: "onCanplay", value: function (e) {
                        var t = this;
                        this.UIControl.playFirstHide(), this.config.refer || (this.config.refer = ""), -1 == this.config.refer.indexOf("18yk11") ? this.UIControl.hideDom("uiplayload") : setTimeout(function () {
                            t.UIControl.hideDom("uiplayload")
                        }, 2e3), e && this.LogoUI && !this.hasWaterMark && (this.hasWaterMark = !0, this.LogoUI.waterController({
                            width: this.video.videoWidth,
                            height: this.video.videoHeight
                        }))
                    }
                }, {
                    key: "onPlaying", value: function () {
                        var e = this;
                        this.config.refer || (this.config.refer = ""), setTimeout(function () {
                            e.full || e.UIControl.halfhide()
                        }, 500), -1 == this.config.refer.indexOf("18yk11") && this.UIControl.hideDom("uiplayload")
                    }
                }, {
                    key: "onWaiting", value: function () {
                        this.UIControl.showDom("uiplayload"), this.config.events.onBuffer()
                    }
                }, {
                    key: "onPlay", value: function () {
                        this.UIPauseAd && this.UIPauseAd.hide(), this.UIControl.bigBtnHide(), this.coreExtendsReady(), this.status = "playing", this.UIBlock.hide(), this.customerDuration || (this.customerDuration = 0), this.UIControl.hideDom("uiposter"), this.UILimit && this.UILimit.hide(), this.UIControl.pause = !1, this.playCallBackToThird(), this._isAdPlaying || (this.UIControl.playingState(), this.UIControl.setCtrlDom(!1), this.config.events.onPlay())
                    }
                }, {
                    key: "getCustomerDuration", value: function () {
                        return this.mimeTime
                    }
                }, {
                    key: "onPause", value: function () {
                        "ended" != this.status && (this.status = "paused", this.UIControl.pauseState(), this.UIControl.setCtrlDom(!0), this.config.events.onPause(), this.pauseCallBackToThird())
                    }
                }, {
                    key: "onError", value: function (e, t) {
                        if (this.UIControl.bigBtnHide(), this.needError) {
                            this.UIPauseAd && this.UIPauseAd.hide(), this.needError = !1, this.pause(), this.UIBlock.error(this.data), this.UIBlock.show(), this.sendEventLog("xve", e || "e");
                            try {
                                parent.window.getLiveUrlError()
                            } catch (e) {
                            }
                            try {
                                external.getLiveUrlError()
                            } catch (e) {
                            }
                        }
                    }
                }, {
                    key: "onEnded", value: function (e) {
                        this.UIControl.duration = 0, this.status = "ended", this.replay(), this.UIControl.resetProgress(), this.hadEnd = !1, this.UIControl.tipHide(), this.UIControl.changeReplay("replay")
                    }
                }, {
                    key: "upsDataError", value: function (e) {
                        this.UIControl.playFirstHide(), this.status = "error", this.UIControl.setCtrlDom(!0), this.data = e;
                        var t = this.data.code;
                        t && "-4001 -2001 -3007 -3008 -3009 -2002 -2003 -2004".indexOf(t) < 0 && (this.UIBlock.error({
                            errorcode: t,
                            vcode: this.config.videoId
                        }), this.UIBlock.show())
                    }
                }, {
                    key: "upsDataFail", value: function (e) {
                        this.UIControl.playFirstHide(), this.status = "error", this.UIControl.setCtrlDom(!0), this.data = e, this.data.code && (this.UIBlock.error({
                            errorcode: this.data.code,
                            vcode: this.config.videoId
                        }), this.UIBlock.show())
                    }
                }, {
                    key: "tryTimeLock", value: function (e) {
                        return this.lockNow || this.config.lockType && e >= 60 * this.config.tryTime
                    }
                }, {
                    key: "livePermissionLock", value: function () {
                        this.pause()
                    }
                }, {
                    key: "updateLockType", value: function (e, t) {
                        this.lockNow = t, this.permissionCode = e, this.config.lockType = 200 != e
                    }
                }, {
                    key: "onTimeupdate", value: function (e, t) {
                        var i = Math.ceil(t);
                        return this.tryTimeLock(i) ? (this.pause(), this.UILock.lockScreen(this.permissionCode), void this.UILock.show()) : (i != this.countTime && (this.mimeTime++, this.countTime = i), this.UILimit.needLimit && i >= this.limit_duration ? (this.EventManager.fire("onTrialEnd"), void this.onEnded()) : (this.UIControl.setProgress(this.getVideoCurrentInfo(), this.duration), void this.UIControl.setTime(i, this)))
                    }
                }, {
                    key: "ikuFullScreen", value: function () {
                        this.selector.style.zIndex = "20000", this.selector.style.position = "fixed", this.selector.style.top = "0", this.selector.style.left = "0", this.selector.style.bottom = "0", this.selector.style.width = "100%", this.selector.style.height = "100%"
                    }
                }, {
                    key: "fullScreen", value: function () {
                        this.mediaElement.requestFullscreen ? this.mediaElement.requestFullscreen() : this.mediaElement.webkitRequestFullscreen ? this.mediaElement.webkitRequestFullscreen() : this.mediaElement.mozRequestFullScreen ? this.mediaElement.mozRequestFullScreen() : this.mediaElement.msRequestFullscreen ? this.mediaElement.msRequestFullscreen() : this.mediaElement.webkitEnterFullScreen && this.mediaElement.webkitEnterFullScreen()
                    }
                }, {
                    key: "containerFullScreen", value: function () {
                        this.selector.requestFullscreen ? this.selector.requestFullscreen() : this.selector.webkitRequestFullscreen ? this.selector.webkitRequestFullscreen() : this.selector.mozRequestFullScreen ? this.selector.mozRequestFullScreen() : this.selector.msRequestFullscreen ? this.selector.msRequestFullscreen() : this.selector.webkitEnterFullScreen()
                    }
                }, {
                    key: "containerExitScreen", value: function () {
                        document.exitFullscreen ? document.exitFullscreen() : document.msExitFullscreen ? document.msExitFullscreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitExitFullscreen ? document.webkitExitFullscreen() : this.mediaElement.webkitExitFullscreen && this.mediaElement.webkitExitFullscreen()
                    }
                }, {
                    key: "featureReady", value: function (e) {
                    }
                }, {
                    key: "isNeedAd", value: function () {
                        return !this.config.withoutad
                    }
                }, {
                    key: "adDataOk", value: function (e, t) {
                        this.ad_data = e, this.ad_totalTime = e.totalTime, this.UIAd = new O.default(this.selector, this.EventManager, this.ad_totalTime)
                    }
                }, {
                    key: "onAdTimeUpdate", value: function (e, t, i, n) {
                        this.ad_count != n && (this.ad_count = n), this.EventManager.fire("CountDown", (this.ad_totalTime || 90) - parseInt(t))
                    }
                }, {
                    key: "hideProgress", value: function () {
                        this.UIControl.changeProgress()
                    }
                }, {
                    key: "playStateUpdate", value: function (e) {
                        if (this.UIAd && this.UIAd.hide(), this.config.withoutprogress)return void this.hideProgress();
                        this.UIControl.setDuration(r.util.getTimeModel(this.duration))
                    }
                }, {
                    key: "seekLasted", value: function () {
                        if (C.default.android)return !1;
                        var e = this.data.data.id, t = -1, i = -1, n = -1, s = 0;
                        return this.data.data.playlog && (t = this.data.data.playlog.lastpoint / 1e3), i = localStorage.getItem(e + "_playpoint"), -1 != t && -1 != i && (n = Math.abs(t - i) < 60 ? i : t), s = localStorage.getItem("youku_ignore_lasttime"), -1 != n && n >= 120 && s < 3 && !this.data.data.trial && n < this.duration - 120 && (C.default.android && (this.waitSeek = n), !0)
                    }
                }, {
                    key: "skip", value: function () {
                    }
                }, {
                    key: "setProgressWidth", value: function (e) {
                        this.UIControl.progress.style.width = e - 180 + "px", this.UIControl.cacheProgress()
                    }
                }, {
                    key: "setSelectorSize", value: function () {
                        this.selector.style.width = "100%", this.selector.style.height = "100%"
                    }
                }, {
                    key: "getFullState", value: function () {
                        return C.default.iku ? this.full ? 1 : 0 : !!(document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement || document.webkitFullscreenElement || document.webkitFullscreenElement) || void 0
                    }
                }, {
                    key: "toggleFull", value: function (e) {
                        if (this.method = e.method || "c", this.getFullState()) {
                            if (this.UIControl.halfhide(), C.default.iku)return this.full = !1, void(window.external && window.external.execute && window.external.execute("iku", "iku://|play|living|click|liveplayer|normalsize|"));
                            this.containerExitScreen()
                        } else {
                            if (this.UIControl.fullhide(), C.default.iku)return this.full = !0, void(window.external && window.external.execute && window.external.execute("iku", "iku://|play|living|click|liveplayer|fullscreen|"));
                            this.containerFullScreen()
                        }
                    }
                }, {
                    key: "pauseAd", value: function () {
                        var e = this, t = this.config.pauseAdData;
                        (0, A.default)(t, {fu: this.full ? 1 : 0}), (0, I.default)({
                            url: "//valp.atm.youku.com/vp",
                            data: t,
                            success: function (t) {
                                t.VAL && t.VAL.length > 0 && (e.UIPauseAd || (e.UIPauseAd = new L.default(e.selector, e.EventManager)), e.UIPauseAd.loadVC(t), e.UIPauseAd.show())
                            },
                            fail: function () {
                            }
                        })
                    }
                }, {
                    key: "storageSet", value: function (e, t) {
                        try {
                            localStorage.setItem(e, t)
                        } catch (e) {
                        }
                    }
                }, {
                    key: "unLockScreen", value: function (e) {
                        switch (e.type) {
                            case 0:
                            case 1:
                            case 2:
                            case 400:
                                break;
                            case 1e3:
                                window.location.href = "https://account.youku.com/?callback=" + encodeURIComponent(window.location.href);
                                break;
                            case 1001:
                            case 1002:
                            case 1003:
                            case 1006:
                            case 1007:
                                window.location.href = "//vip.youku.com";
                                break;
                            case 1008:
                            case 500:
                            case 1004:
                            case 1005:
                            case 1111:
                            case 1024:
                                break;
                            case 3001:
                            case 3002:
                            case 3003:
                            case 3004:
                                break;
                            default:
                                window.location.reload()
                        }
                    }
                }, {
                    key: "watcher", value: function () {
                        var e = this;
                        this.EventManager.on("ad:pause", function (t) {
                            e.config.pc && e.pauseAd()
                        }), this.EventManager.on("exitFull", function () {
                            e.full = !1, window.external && window.external.execute && window.external.execute("iku", "iku://|play|living|click|liveplayer|normalsize|"), e.UIControl.halfhide()
                        }), this.EventManager.on("lock:open", function (t) {
                            e.unLockScreen(t)
                        }), this.EventManager.on("adVolume", function (t) {
                            e.changeMuted(t.value)
                        }), this.EventManager.on("volume:change", function (t) {
                            0 == t.value ? e.UIControl.tipShow("静音") : e.UIControl.tipShow("音量" + 100 * t.value + "%"), e.changeMuted(t.value)
                        }), this.EventManager.on("ChangeVid", function (t) {
                            e.control.hd !== localStorage.getItem("defaultVideoType") && (e.control.hd = localStorage.getItem("defaultVideoType")), e.changeByVid(t.vid), e.firstPlaying = !0, e.hadEnd = !1, e.UIControl.ressetProgress(), e.UIControl.pauseState(!0), e.UIControl.resetTime(), e.UIControl.tipHide()
                        }), this.EventManager.on("EventReport", function (t) {
                            e.sendEventLog(t.method, t.type)
                        }), this.EventManager.on("LoadJS", function (e) {
                        }), this.EventManager.on("PlayerVip", function (t) {
                            e.UIBlock.vip(e.data, t.duration)
                        }), this.EventManager.on("orientationchange", function (t) {
                            e.width = e.selector.clientWidth, e.height = e.selector.clientHeight, e.sendEventLog("xre", "s")
                        }), this.selector.addEventListener("webkitfullscreenchange", function (t) {
                            var i = e.method;
                            e.full = !!document.webkitFullscreenElement, e.full ? (e.launchFullscreen(), e.sendEventLog("exfs", i)) : (e.exitFullscreen(), e.sendEventLog("xenfs", i)), e.UIControl.cacheProgress(!0), e.config.events.onFullScreen(e.full)
                        }), this.EventManager.on("WordPass", function (t) {
                            e.reLoad(t.pass)
                        }), this.EventManager.on("video:reload", function (t) {
                            e.reLoad(), setTimeout(function () {
                                e.play()
                            }, 200)
                        }), this.EventManager.on("HasPanel", function (t) {
                            e.config.events.playEnded({recommend: !0, data: t})
                        }), this.EventManager.on("adsdk:toggle", function (e) {
                        }), this.EventManager.on("control:hide", function (t) {
                            e.Tipbar.resetPos(e.UIControl.ctrlStatus()), e.config.events.controlHide()
                        }), this.EventManager.on("control:show", function (t) {
                            e.Tipbar.resetPos(e.UIControl.ctrlStatus())
                        }), this.EventManager.on("PlayerLimit", function (t) {
                            e.limit_duration = parseInt(t.duration || 0, 10)
                        }), this.EventManager.on("LimitVideoOpenApp", function () {
                            e.UILimit.openApp()
                        }), this.EventManager.on("LanguageShow", function () {
                            e.sendEventLog("xcl", "c")
                        }), this.EventManager.on("LanguageHide", function () {
                            e.sendEventLog("xhl", "c")
                        }), this.EventManager.on("LanguageChange", function (t) {
                            e.storageSet("defaultVideoLang", t.type), e.sendEventLog("xsl", "c"), e.changeLanguage(t.type) && (e.UIControl.tipShow("已为您切换语言!"), e.mediaElement.paused && e.play())
                        }), this.EventManager.on("quality:change", function (t) {
                            if (e.sendEventLog("xsq", "c"), !e.changeHd(t.type))return void console.log("清晰度切换失败");
                            var i = {
                                mp4: "标清",
                                flv: "标清",
                                flvhd: "标清",
                                mp4hd: "高清",
                                mp4hd2: "超清",
                                mp4hd3: "1080P"
                            }, n = "已切换到 " + i[t.type] + "，为您提供更流畅的播放体验";
                            "mp4hd3" == t.type && (n = "已切换到 " + i[t.type] + "，为您提供更清晰的播放体验"), e.UIControl.tipShow(n), e.mediaElement.paused && e.play()
                        }), this.EventManager.on("QualityShow", function () {
                            e.sendEventLog("xcq", "c")
                        }), this.EventManager.on("QualityHide", function () {
                            e.sendEventLog("xhq", "c")
                        }), this.EventManager.on("VideoSeekEnd", function (t) {
                            var i = e.duration, n = i * t.rate;
                            e.sendEventLog("xds", "d", {
                                tb: e.start_time,
                                to: n
                            }), e.start_time = n, e.seek(n), e.currentState = "PLAYER_STATE_PLAYING", e.mediaElement.paused && e.play(), e.UIControl.noUpdate = !1
                        }), this.EventManager.on("SwitchFullScreen", function (t) {
                            var i = t && t.method;
                            e.config.pc ? e.toggleFull({method: i}) : e.fullScreen(), e.LogoUI && e.LogoUI.change(e.full ? 1 : 3)
                        }), this.EventManager.on("BigBtnToPlay", function () {
                            e.UILimit && e.UILimit.hide(), e.UIControl.hideDom("uiposter"), e.play()
                        }), this.EventManager.on("BtnToPlay", function (t) {
                            if ("error" != e.status)return e.UILimit && e.UILimit.hide(), e.UIControl.hideDom("uiposter"), t && "replay" == t.type ? (e.UIControl.resetProgress(), e.hadEnd = !1, e.UIControl.tipHide(), e.replay(), void e.UIControl.changeReplay("play")) : void 0
                        }), this.EventManager.on("video:pause", function () {
                            e._isAdPlaying || e.pause()
                        }), this.EventManager.on("video:play", function () {
                            e.mediaElement.paused && e.play()
                        }), this.EventManager.on("SkipHead", function () {
                            e.data.dvd && e.data.dvd.head && e.seek(e.data.dvd.head / 1e3)
                        }), this.EventManager.on("SkipNot", function () {
                        }), this.EventManager.on("Skip", function () {
                            window.open("http://vip.youku.com/")
                        }), this.EventManager.on("MoreAbout", function () {
                            if (e.ad_data) {
                                var t = e.getAdCu();
                                if (!t)return;
                                e.sendAdClickLog(e.getAdCur()), window.open(t, "", "", !1)
                            }
                        }), this.EventManager.on("CountDown", function (t) {
                            e.UIAd.countdown.innerHTML = t
                        }), this.EventManager.on("canPlay", function () {
                            e.bufferdTimer && clearTimeout(e.bufferdTimer), e.TipbarBufferd && (e.Tipbar.forceHide(), e.TipbarBufferd = !1)
                        }), this.EventManager.on("SeekToLasted", function () {
                        }), this.EventManager.on("vr:drag", function (t) {
                            e.vrMode && e.vr3d && e.vr3d.onUserInput(t)
                        })
                    }
                }, {
                    key: "getAdCu", value: function () {
                        return this.ad_data.VAL[this.getAdCur()].CU
                    }
                }, {
                    key: "getAdCur", value: function () {
                        return this._adplugin._adplayer.curNum
                    }
                }, {
                    key: "onAdStartPlay", value: function (e, t) {
                        this.ad_data && (this.getAdCu() ? this.UIAd.showMore() : this.UIAd.hideMore()), this.UIControl.playFirstHide(), this.UIControl.hideDom("uiposter"), this.UIBlock.hide(), this.UILimit && this.UILimit.hide(), this.UIControl.controlHide(!0), this.UIControl.hideDom("uiplayload"), this.UIAd.show(), this.EventManager.fire("onPlayerPreAdInit"), this.data && this.data.video && this.data.video.share_type && (this.Tipbar.share(this.UIControl.ctrlStatus()), this.tipBarShare = !0)
                    }
                }, {
                    key: "onAdPause", value: function () {
                    }
                }, {
                    key: "onAdEnd", value: function () {
                        this.UILimit && this.UILimit.needVip && this.UIBlock.vip(this.data), this.ad_data = null, this.tipBarShare && (this.tipBarShare = !1, this.Tipbar.forceHide()), this.featureReady(!0)
                    }
                }, {
                    key: "upsDataSuccess", value: function (e) {
                        this.status = "paused", this.data = e, this.UIBlock.update(e), this.dvd_tail = this.data.dvd && this.data.dvd.tail || 0;
                        var t = this.data.error;
                        if (this.dvd_tail = this.data.dvd && this.data.dvd.tail || 0, t) {
                            this.status = "error";
                            var i = t.code;
                            switch (this.UIControl.playFirstHide(), i) {
                                case-4001:
                                case-2001:
                                    this.UIBlock.commonTip(t.note), this.UIBlock.show();
                                    break;
                                case-3001:
                                case-3007:
                                case-3008:
                                case-3009:
                                    this.UIBlock.vip(e);
                                    break;
                                case-2002:
                                case-2003:
                                    this.UIBlock.needPassword(t), this.UIBlock.show();
                                    break;
                                case-2004:
                                    this.UIBlock.subscribe(e.uploader, e.trial)
                            }
                            this.UIControl.controlHide(!0)
                        } else this.UIControl.bigBtnShow();
                        try {
                            parent.window.getLiveUrlSuccess()
                        } catch (e) {
                        }
                        try {
                            external.getLiveUrlSuccess()
                        } catch (e) {
                        }
                        var n = this.getVideoInfo();
                        n && (this.UIControl.hideDom("uipassword"), this.duration = n.seconds + (this.headAdTime || 0) + (this.tailAdTime || 0), this.playStateUpdate(), this.setSystemInfo())
                    }
                }, {
                    key: "bufferedEnd", value: function () {
                        if (!this.mediaElement)return 0;
                        var e = this.mediaElement.buffered;
                        return 0 == e.length ? 0 : e.end(e.length - 1)
                    }
                }, {
                    key: "getVideoCurrentInfo", value: function () {
                        return {currentTime: this.getCurrentTime(), buffered: this.bufferedEnd()}
                    }
                }, {
                    key: "getPt", value: function (e) {
                        var t = this.data.videos, i = void 0;
                        return t && t.list && t.list.forEach(function (t, n) {
                            t.encodevid == e && (i = n)
                        }), i
                    }
                }, {
                    key: "setSystemInfo", value: function () {
                        if (this.loadFirst ? (this.setPoster(), this.loadFirst = !1) : this.UILimit && this.UILimit.updateLimit(), this.UILimit || (this.UILimit = new N.default(this.selector, this.EventManager, this.data, this.partner_config, this.config)), this.UILimit.needVip) {
                            if (this.UIBlock.vip(this.data), this.config.autoplay)return this.mediaElement.autoplay = !1, this.UIControl.hideDom("uiposter"), void this.UIControl.bigBtnHide()
                        } else this.UILimit.needLimit && this.UILimit.show();
                        var e = this.getHdList();
                        e && (this.UIQuality ? this.UIQuality.change(e, this.control.hd) : this.UIQuality = new R.default(this.selector, this.EventManager, e, this.control.hd), this.config.pc || this.UIQuality.hide(), this.wm())
                    }
                }, {
                    key: "setPoster", value: function () {
                        var e = this.data.video.logo;
                        e && (this.UIControl.changeUrl(e), this.UIControl.showDom("uiposter"))
                    }
                }, {
                    key: "PlayerSeek", value: function (e) {
                        this.seek(e)
                    }
                }]), t
            }(r.YoukuH5PlayerCore);
            e.default = H
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(2), i(0), i(1), i(4), i(3), i(6), i(105), i(103)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o, r, u) {
            "use strict";
            function l(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var d = l(t), h = l(i), c = l(n), f = l(s), v = l(a), p = l(o), m = l(r), y = l(u), _ = function (e) {
                function t(e, i, n) {
                    (0, h.default)(this, t);
                    var s = (0, f.default)(this, (t.__proto__ || (0, d.default)(t)).call(this, e, i));
                    return s.dom = e.querySelector(".spv_block"), s.UIVip = new m.default(e, i, s.dom, n), s.UISubcribe = new y.default(e, i, s.dom), s.EventManager.on("subscribe:success", function () {
                        s.hide()
                    }), s.EventManager.on("block:show", function () {
                        s.show()
                    }), s
                }

                return (0, v.default)(t, e), (0, c.default)(t, [{
                    key: "update", value: function (e) {
                        this.videoData = e
                    }
                }, {
                    key: "vip", value: function (e, t) {
                        e = e || this.videoData, this.UIVip.lockScreen(e, t)
                    }
                }, {
                    key: "subscribe", value: function (e, t) {
                        this.UISubcribe.init(e, t)
                    }
                }, {
                    key: "needPassword", value: function (e) {
                        this.dom.innerHTML = this.pwdTpl(e), this.uipassword = this.G(".spv_limit_private", this.dom), this.password_tip = this.G(".spv_limit_tit", this.dom), this.password_txt = this.G(".spv_limit_password", this.dom), this.password_btn = this.G(".spv_limit_submit", this.dom), this.password_btn.addEventListener("click", this.passwordEvent.bind(this), !1)
                    }
                }, {
                    key: "commonTip", value: function (e) {
                        var t = '<spvdiv class="spv_limit_info">\n                    <spvdiv class="spv_limit_panel">\n                        <spvdiv class="spv_limit_private">\n                            <spvdiv class="spv_limit_tit">' + e + "</spvdiv>\n                        </spvdiv>\n                    </spvdiv>\n                </spvdiv>";
                        this.dom.innerHTML = t
                    }
                }, {
                    key: "empty", value: function () {
                        this.dom.innerHTML = ""
                    }
                }, {
                    key: "error", value: function (e) {
                        var t = "http://csc.youku.com/feedback-web/web/subtype_2/?code=" + e.errorcode + "&videoID=" + e.vcode, i = '<spvdiv class="spv_error" style="">\n            <spvdiv class="spv_error_panel">\n                    <spvdiv class="spv_error_tit">出了点小状况，小酷正在为您搬运视频...</spvdiv>\n                    <spvdiv class="spv_error_option">\n                        您可以<spvdiv class="spv_error_action">更换线路</spvdiv>\n                    </spvdiv>\n                    <spvdiv class="spv_error_other">\n                        您还可以尝试：<spvdiv class="spv_error_download">下载PC客户端</spvdiv>或<a href="' + t + '" target="_blank" class="spv_error_contact">联系小酷客服</a>\n                    </spvdiv>\n            </spvdiv>\n        </spvdiv>';
                        this.dom.innerHTML = i, this.$action = this.G(".spv_error_action"), this.$download = this.G(".spv_error_download"), this.$action.addEventListener("click", this._error_action.bind(this), !1), this.$download.addEventListener("click", this._error_download.bind(this), !1)
                    }
                }, {
                    key: "_error_action", value: function () {
                        this.empty(), this.EventManager.fire("video:reload", {}), this.$action.removeEventListener("click", this._error_action)
                    }
                }, {
                    key: "_error_download", value: function () {
                        IS_MAC ? window.open("//iku.youku.com/macinstall/macywebplayererror", "_blank") : window.playerToIku && window.playerToIku(), this.$download.removeEventListener("click", this._error_download)
                    }
                }, {
                    key: "passwordShow", value: function (e) {
                        this.password_tip.innerHTML = e
                    }
                }, {
                    key: "passwordEvent", value: function () {
                        var e = this.password_txt.value;
                        if (!e)return void this.passwordShow("密码不能为空.");
                        this.hide(), this.password_btn.removeEventListener("click", this.passwordEvent, !1), this.EventManager.fire("WordPass", {pass: e})
                    }
                }, {
                    key: "pwdTpl", value: function (e) {
                        var t = '尊敬的用户您好，该视频需要<spvdiv class="spv_limit_type">密码</spvdiv>观看';
                        return -2003 == e.code && (t = e.note), '<spvdiv class="spv_limit_info">\n                    <spvdiv class="spv_limit_panel">\n                        <spvdiv class="spv_limit_private">\n                            <spvdiv class="spv_limit_tit">' + t + '</spvdiv>\n                            <spvdiv class="spv_limit_option">\n                                <input class="spv_limit_password" type="text">\n                                <spvdiv class="spv_limit_submit">确定</spvdiv>\n                                <a href="' + this.videoData.uploader.homepage + '" target="_blank" class="spv_limit_conact">联系作者</a>\n                            </spvdiv>\n                        </spvdiv>\n                    </spvdiv>\n                </spvdiv>'
                    }
                }]), t
            }(p.default);
            e.default = _
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(2), i(0), i(1), i(4), i(3), i(6), i(5), i(12), i(25), i(60)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o, r, u, l, d) {
            "use strict";
            function h(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var c = h(t), f = h(i), v = h(n), p = h(s), m = h(a), y = h(o), _ = h(r), g = h(u), k = h(l), E = h(d), A = function (e) {
                function t(e, i, n) {
                    (0, f.default)(this, t);
                    var s = (0, p.default)(this, (t.__proto__ || (0, c.default)(t)).call(this, e, i, n));
                    return s.config.pc && (s.Tipbar = (0, k.default)(e, s.EventManager)), s
                }

                return (0, m.default)(t, e), (0, v.default)(t, [{
                    key: "setUp", value: function (e) {
                        this.config = e[0], this.dom = this.G(".spv_player", document), this.play_btn = this.G(".spv_icon_play", this.dom), this.pause_btn = this.G(".spv_icon_pause", this.dom), this.myProgress = this.G(".spv_progress", this.dom), this.playBtn = this.G(".spv_play_btn", this.dom), this.range = this.G(".spv_progress_range", this.dom), this.progress = this.G(".spv_progress_container", this.dom), this.control_play = this.G(".spv_progress_play", this.dom), this.control_load = this.G(".spv_progress_load", this.dom), this.ad_mute = this.G(".ad_mute", this.dom), this.ad_nomute = this.G(".ad_nomute", this.dom), this.timeList = this.G(".spv_time", this.dom), this.now = this.G(".spv_time_current", this.dom), this.dur = this.G(".spv_time_duration", this.dom), this.control = this.G(".spv_dashboard", this.dom), this.tipBox = this.G(".spv_little", this.dom), this.tip = this.GA(".spv_little_tip", this.tipBox), this.play_first = this.G(".spv_load_first", this.dom), this.shadow = this.G(".spv_shadow", this.dom), this.background = this.G(".spv_background", this.dom), this.uicode = this.G(".spv_code", this.dom), this.code_a = this.G(".spv_code_tip", this.uicode), this.code_b = this.G(".spv_code_des", this.uicode), this.uiload = this.G(".spv_load", this.dom), this.uiplayload = this.G(".spv_load_first", this.dom), this.uiposter = this.G(".spv_poster", this.dom), this.muteBtn = this.G(".spv_icon_mute", this.dom), this.volumeBtn = this.G(".spv_icon_volume", this.dom), this.volumeRange = this.G(".spv_volume_range", this.dom), this.volumeBox = this.G(".spv_volume", this.dom), this.volumeCurrent = this.G(".spv_volume_current", this.dom), this.uiscreen = this.G(".spv_icon_full", this.dom), this.uihalf = this.G(".spv_icon_half", this.dom), g.default.iku && g.default.oldIku && (this.uiscreen.style.display = "none", this.uihalf.style.display = "none"), this.pause = !0, this.skip_flag = !1, this.customer_volume = this.volume, this.volume = parseFloat(localStorage.getItem("spv_volume")) || 1, this.count = "00:00", this.playedTime = 0, this.config.hideplay && (this.hideDom("play_btn"), this.hideDom("pause_btn")), this.config.withoutfull && this.hideDom("uiscreen"), this.config.withoutprogress && this.changeProgress(), this.config.hidecontrol && (this.control.style.display = "none"), this.config.pc || (this.volumeBtn.style.display = "none", this.volumeBox.style.display = "none"), this.domEvent()
                    }
                }, {
                    key: "fullhide", value: function () {
                        this.uiscreen.style.display = "none", this.uihalf.style.display = "block"
                    }
                }, {
                    key: "halfhide", value: function () {
                        this.uihalf.style.display = "none", this.uiscreen.style.display = "block"
                    }
                }, {
                    key: "bigBtnShow", value: function () {
                        this.playBtn.style.display = "block"
                    }
                }, {
                    key: "bigBtnHide", value: function () {
                        this.playBtn.style.display = "none"
                    }
                }, {
                    key: "changeProgress", value: function () {
                        this.myProgress.style.display = "none", this.timeList.style.display = "none"
                    }
                }, {
                    key: "playFirstHide", value: function () {
                    }
                }, {
                    key: "backgroundShow", value: function () {
                        this.background.style.display = "block"
                    }
                }, {
                    key: "backgroundHide", value: function () {
                        this.background.style.display = "none"
                    }
                }, {
                    key: "changeUrl", value: function (e) {
                        this.uiposter.style.backgroundImage = "url(" + e + ")"
                    }
                }, {
                    key: "codeInfoChange", value: function (e, t) {
                        this.code_a.innerHTML = e || "", this.code_b.innerHTML = t || ""
                    }
                }, {
                    key: "showDom", value: function (e) {
                        this[e] && (this[e].style.display = "block")
                    }
                }, {
                    key: "hideDom", value: function (e) {
                        this[e] && (this[e].style.display = "none")
                    }
                }, {
                    key: "tipHide", value: function () {
                        var e = this;
                        this.timerTip = setTimeout(function () {
                            e.tipBox.style.display = "none"
                        }, 2e3)
                    }
                }, {
                    key: "tipStatus", value: function () {
                        return "block" == this.tipBox.style.display
                    }
                }, {
                    key: "tipShow", value: function (e) {
                        this.timerTip && clearTimeout(this.timerTip), this.timerTip = null, this.tip.innerHTML = e, this.tipStatus() || (this.tipBox.style.display = "block"), this.tipHide()
                    }
                }, {
                    key: "cacheProgress", value: function (e) {
                        e || this.EventManager.fire("orientationchange"), this.width = this.selector.clientWidth, this.progress.style.width = "100%"
                    }
                }, {
                    key: "controlShow", value: function () {
                        this.width || this.cacheProgress(!0), this.controlHandle(), this.setCtrlDom(!0)
                    }
                }, {
                    key: "controlHandle", value: function () {
                        this.timer && (clearTimeout(this.timer), this.timer = null)
                    }
                }, {
                    key: "controlHide", value: function (e) {
                        var t = this;
                        if (e)return void this.setCtrlDom(!1);
                        this.pause || this.timer || (this.timer = setTimeout(function () {
                            t.setCtrlDom(!1)
                        }, 5e3))
                    }
                }, {
                    key: "setCtrlDom", value: function (e) {
                        if (e) {
                            if (this.backgroundShow(), this.config.hidecontrol)return;
                            this.control.style.display = "block", this.EventManager.fire("control:show")
                        } else this.backgroundHide(), this.control.style.display = "none", this.EventManager.fire("control:hide")
                    }
                }, {
                    key: "ctrlStatus", value: function () {
                        return "block" == this.control.style.display
                    }
                }, {
                    key: "setTime", value: function (e, t) {
                        var i = _.default.getTimeModel(e);
                        this.count != i && (this.now.innerHTML = i, this.count = i, t.customerDuration++)
                    }
                }, {
                    key: "setDuration", value: function (e) {
                        this.dur.innerHTML = e
                    }
                }, {
                    key: "setProgress", value: function (e, t, i) {
                        this.duration = t;
                        var n = i || e.currentTime, s = n / this.duration;
                        this.noUpdate || (this.control_play.style.width = 100 * s + "%", this.range.value = 100 * s, n += Math.max(e.buffered - n, 0), s = n / this.duration + .05, this.control_load.style.width = 100 * Math.min(Math.max(s + .01, 0), 1) + "%")
                    }
                }, {
                    key: "ressetProgress", value: function () {
                        this.range.value = 0, this.control_load.style.width = 0, this.control_play.style.width = 0
                    }
                }, {
                    key: "playingState", value: function (e) {
                        this.pause_btn.style.display = "block", this.play_btn.style.display = "none", e || this.tipShow("播放"), this.pause = !1
                    }
                }, {
                    key: "endState", value: function () {
                        this.pause_btn.style.display = "none", this.play_btn.style.display = "block", this.pause = !0, this.controlShow(), this.setCtrlDom(!1)
                    }
                }, {
                    key: "pauseState", value: function (e) {
                        this.play_btn.style.display = "block", this.pause_btn.style.display = "none", e || this.tipShow("暂停"), this.pause = !0
                    }
                }, {
                    key: "changeReplay", value: function (e) {
                        this.btnType = e
                    }
                }, {
                    key: "toPlay", value: function () {
                        "replay" == this.btnType ? this.EventManager.fire("BtnToPlay", {type: "replay"}) : this.EventManager.fire("video:play"), this.btnType = ""
                    }
                }, {
                    key: "toPause", value: function () {
                        this.EventManager.fire("video:pause"), this.EventManager.fire("ad:pause"), this.pauseState()
                    }
                }, {
                    key: "setMock", value: function (e) {
                        this.uiscreen.setAttribute("data-spm-click", e), this.uiscreen.setAttribute("data-spm", "sbutton")
                    }
                }, {
                    key: "shadowHide", value: function () {
                        this.shadow.style.display = "none"
                    }
                }, {
                    key: "shadowClick", value: function () {
                        var e = this;
                        this.shadowTimer = setTimeout(function () {
                            e.pause ? e.EventManager.fire("video:play") : (e.EventManager.fire("video:pause"), e.EventManager.fire("ad:pause"))
                        }, 300)
                    }
                }, {
                    key: "shadowMouse", value: function () {
                        this.ctrlStatus() || (this.controlShow(), this.controlHide())
                    }
                }, {
                    key: "volumePanelToggle", value: function () {
                    }
                }, {
                    key: "domEvent", value: function () {
                        var e = this, t = function () {
                            return e.shadowClick()
                        }, i = function () {
                            return e.shadowMouse()
                        }, n = function () {
                            return e.toPlay()
                        }, s = function () {
                            return e.toPause()
                        }, a = function () {
                            return e.EventManager.fire("SwitchFullScreen")
                        }, o = function () {
                            return e.mute()
                        }, r = function () {
                            return e.nomute()
                        }, u = function (t) {
                            return e.volumeChange(t)
                        }, l = function () {
                            return e.cacheProgress()
                        }, d = function (t) {
                            return e.videoSeek(t)
                        };
                        this.gest = new E.default(this.shadow), this.shadow.addEventListener("drag", function (t) {
                            e.EventManager.fire("vr:drag", t.lgdata)
                        }, !1), this.config.pc && !g.default.isIpad ? (this.shadow.addEventListener("mousemove", i, !1), this.shadow.addEventListener("mouseenter", i, !1), this.shadow.addEventListener("click", t, !1), this.shadow.addEventListener("mousemove", i, !1)) : this.shadow.addEventListener("tap", function () {
                            e.setCtrlDom(!0), setTimeout(function () {
                                e.setCtrlDom(!0)
                            }, 3e3)
                        }), this.playBtn.addEventListener("click", n, !1), this.play_btn.addEventListener("click", n, !1), this.pause_btn.addEventListener("click", s, !1), this.ad_mute.addEventListener("click", function () {
                            e.ad_nomute.style.display = "block", e.ad_mute.style.display = "none", e.EventManager.fire("adVolume", {value: 0})
                        }, !1), this.ad_nomute.addEventListener("click", function () {
                            e.ad_mute.style.display = "block", e.ad_nomute.style.display = "none", e.EventManager.fire("adVolume", {value: 1})
                        }, !1), this.uiscreen.addEventListener("click", a, !1), this.uihalf.addEventListener("click", a, !1), this.volumeBtn.addEventListener("click", o, !1), this.muteBtn.addEventListener("click", r, !1), this.volumeRange.addEventListener("change", u, !1), this.range.addEventListener("mousedown", function (t) {
                            e.noUpdate = !0
                        }, !1), document.addEventListener("mouseup", function () {
                            e.noUpdate = !1
                        }, !1), window.addEventListener("resize", l), this.range.addEventListener("mousemove", function (t) {
                            return e.playedUpdate(t)
                        }, !1), this.range.addEventListener("change", d, !1), this.range.addEventListener("mouseup", function () {
                            e.noUpdate = !1
                        }), window.addEventListener("keydown", function (t) {
                            var i = +e.volumeRange.value, n = void 0;
                            "27" == t.keyCode && (e.EventManager.fire("exitFull"), t.preventDefault()), "38" == t.keyCode && i <= .9 && (n = i + .1, e.volumeProgress(n), e.volumeChange(), t.preventDefault()), "40" == t.keyCode && i >= .1 && (n = i - .1, e.volumeProgress(n), e.volumeChange(), t.preventDefault())
                        }, !1), this.ressetProgress()
                    }
                }, {
                    key: "playedUpdate", value: function (e) {
                        this.control_play.style.width = e.currentTarget.value + "%"
                    }
                }, {
                    key: "videoSeek", value: function (e) {
                        var t = e.currentTarget;
                        this.noUpdate = !0, this.playedUpdate(e), this.EventManager.fire("VideoSeekEnd", {rate: t.value / 100})
                    }
                }, {
                    key: "resetTime", value: function () {
                        this.now.innerHTML = "00:00"
                    }
                }, {
                    key: "resetProgress", value: function () {
                        this.control_load.style.width = 0, this.range.value = 0, this.resetTime(), this.control_play.style.width = 0
                    }
                }, {
                    key: "volumeProgress", value: function (e) {
                        this.volumeRange.value = e, this.volumeCurrent.style.width = 100 * e + "%"
                    }
                }, {
                    key: "mute", value: function () {
                        this.volumeProgress(0), this.volume = 0, this.EventManager.fire("volume:change", {value: this.volume}), this.muteDisplay()
                    }
                }, {
                    key: "muteDisplay", value: function () {
                        this.volumeBtn.style.display = "none", this.muteBtn.style.display = "block"
                    }
                }, {
                    key: "nomuteDisplay", value: function () {
                        this.muteBtn.style.display = "none", this.volumeBtn.style.display = "block"
                    }
                }, {
                    key: "nomute", value: function () {
                        this.customer_volume || (this.customer_volume = .5), this.volumeProgress(this.customer_volume), this.volume = this.customer_volume, this.EventManager.fire("volume:change", {value: this.volume}), this.nomuteDisplay()
                    }
                }, {
                    key: "volumeChange", value: function () {
                        var e = this.volumeRange.value;
                        this.volume = e, this.customer_volume = this.volume, 0 == this.volume ? this.muteDisplay() : this.nomuteDisplay(), this.volumeCurrent.style.width = 100 * this.volume + "%", this.EventManager.fire("volume:change", {value: this.volume})
                    }
                }, {
                    key: "getWidth", value: function (e) {
                        return e.offsetWidth || parseInt(document.defaultView.getComputedStyle(e, !1).width, 10)
                    }
                }]), t
            }(y.default);
            e.default = A
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(2), i(0), i(1), i(4), i(3), i(6), i(53)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o, r) {
            "use strict";
            function u(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var l = u(t), d = u(i), h = u(n), c = u(s), f = u(a), v = u(o), p = function (e) {
                function t(e, i, n, s, a) {
                    (0, d.default)(this, t);
                    var o = (0, c.default)(this, (t.__proto__ || (0, l.default)(t)).call(this, e, i));
                    return o.data = n, o.config = a, o.pauseFlag = !1, o.clientId = s, o.created = !1, o.limitDuration = 1e5, o.cateId = o.data.video && o.data.video.category_id, o.vip = o.data.vip || o.data.pay && o.data.pay.can_play, o.canPlay = o.data.pay && o.data.pay.can_play, o.needLimit = !1, o.needOpen = !1, o.duration = parseInt(o.data.video.seconds, 10), o.showkind = o.data.show && o.data.show.showkind, o.updateLimit(), o
                }

                return (0, f.default)(t, e), (0, h.default)(t, [{
                    key: "updateLimit", value: function () {
                        if (!this.canPlay) {
                            var e = this.data.trial;
                            e && "time subscribe".indexOf(e.type) > -1 && (this.needLimit = !0, this.needOpen = !1, this.needVip = !0, this.limitDuration = e.time || 300), this.isEpisodes = e && "episodes" == e.type, this.EventManager.fire("PlayerLimit", {duration: this.duration >= this.limitDuration ? this.limitDuration : this.duration}), this.show(), (this.needLimit || this.normalLimit) && (this.html5_disable = !0), this.html5_disable
                        }
                    }
                }, {
                    key: "limitOpenApp", value: function () {
                    }
                }, {
                    key: "End", value: function () {
                        this.needOpen && this.openApp()
                    }
                }, {
                    key: "download", value: function () {
                        Browser.android ? window.open("http://dl.m.cc.youku.com/android/phone/Youku_Android_xianbobofangqi.apk") : window.location.href = "http://hz.youku.com/red/click.php?tp=1&cp=4007554&cpp=1000673&url=https://itunes.apple.com/cn/app/id394075284?l=cn&mt=8"
                    }
                }, {
                    key: "getYoukuAppSchema", value: function (e, t) {
                        var i, n = [];
                        return t ? i = "http://iosport.youku.com/ipad/ulink?" : (i = "youku://", "ipad" == e.client ? i = "youkuhd://" : "isAndroidChrome" == e.client && (i = "intent://"), i += "play?"), n.push("vid=" + e.id), n.push("pid=" + e.pid), n.push("guid=" + e.guid), n.push("idfa=" + e.idfa), n.push("ouid=" + e.ouid), n.push("source=" + e.source), n.push("ua=" + e.ua), n.push("ver=" + e.ver), n.push("datetime=" + e.datetime), n.push("from=" + encodeURIComponent(window.location.href)), n.push("pagetype=1"), n.push("cookieid=" + e.cookieid), n.push("tuid=" + e.tuid), n.push("refer=" + (e.refer || "87c959fb273378eb")), n.push("special=" + e.special), n.push("sender=" + e.sender), i += n.join("&"), "isAndroidChrome" == e.client && (i += "#Intent;scheme=youku;package=com.youku.phone;end;"), i
                    }
                }, {
                    key: "seid", value: function () {
                        var e = util.cookie.getCookie("seid");
                        (!e || +new Date > (parseInt(util.cookie.getCookie("seidtimeout")) || 0)) && (e = this.rand(util.cookie.getCookie("u_id"), "0"), util.cookie.setCookie("seid", e, {
                            domain: "youku.com",
                            path: "/"
                        }), e = util.cookie.getCookie("seid") || 1);
                        var t = util.cookie.getCookie("referhost");
                        if (!t || +new Date > (parseInt(util.cookie.getCookie("seidtimeout")) || 0)) {
                            var i = /^https?:\/\/[^\/]+/.exec(document.referrer || "");
                            t = i ? i[0] : "", util.cookie.setCookie("referhost", t, {domain: "youku.com", path: "/"})
                        }
                        return util.cookie.setCookie("seidtimeout", Date.now() + 18e5, {
                            domain: "youku.com",
                            path: "/"
                        }), e
                    }
                }, {
                    key: "juid", value: function () {
                        var e = util.cookie.getCookie("juid");
                        return e || (e = this.rand(util.cookie.getCookie("u_id"), "0"), util.cookie.setCookie("juid", e, {
                            expires: 36500,
                            domain: "youku.com",
                            path: "/"
                        }), e = util.cookie.getCookie("juid") || 1), window.juidStr = e, e
                    }
                }, {
                    key: "openApp", value: function () {
                        var e = 0, t = Browser.ua;
                        document.addEventListener("visibilitychange", function t() {
                            document.removeEventListener("visibilitychange", t, !1), e = 0
                        }, !1), t = Browser.weixin ? "wechat" : Browser.UC ? "uc" : Browser.weibo ? "weibo" : "other";
                        var i = !0, n = Browser.ios && browser.version.major <= 8;
                        if ((n || Browser.youku) && (i = !1), this.YoukuAppSchema = this.getYoukuAppSchema({
                                id: this.data.video.encodeid,
                                client: Browser.isIpad && "ipad" || Browser.android && Browser.chrome && "androidChrome",
                                pid: "87c959fb273378eb",
                                guid: this.seid(),
                                idfa: "",
                                ouid: "",
                                source: "mplaypage4",
                                ua: t,
                                ver: "",
                                datetime: Math.floor(+new Date / 1e3),
                                refer: "pad-play",
                                cookieid: this.juid(),
                                tuid: 0,
                                special: 0,
                                sender: 1
                            }, i), n <= 8) {
                            var s = document.createElement("iframe");
                            s.height = 0, s.width = 0, s.frameBorder = "no", s.src = this.YoukuAppSchema, document.getElementsByTagName("body")[0].appendChild(s)
                        } else window.location.href = this.YoukuAppSchema
                    }
                }, {
                    key: "rand", value: function (e, t) {
                        t = void 0 === t ? "" : t;
                        var i = this.MRG32k3a(e || 0, location.href, Date.now());
                        return t + (+new Date).toString(32) + parseInt(1e5 * i()).toString(32)
                    }
                }, {
                    key: "MRG32k3a", value: function () {
                        var e = this;
                        return function (t) {
                            var i = 4294967087, n = 4294944443, s = 12345, a = 12345, o = 123, r = 12345, u = 12345, l = 123;
                            0 === t.length && (t = [+new Date]);
                            for (var d = e.Mash(), h = 0; h < t.length; h++)s += 4294967296 * d(t[h]), a += 4294967296 * d(t[h]), o += 4294967296 * d(t[h]), r += 4294967296 * d(t[h]), u += 4294967296 * d(t[h]), l += 4294967296 * d(t[h]);
                            s %= i, a %= i, o %= i, r %= n, u %= n, l %= n, d = null;
                            var c = function () {
                                var e, t, i, n = 4294967087, d = 4294944443;
                                return t = 1403580 * a - 810728 * s, e = t / n | 0, t -= e * n, t < 0 && (t += n), s = a, a = o, o = t, i = 527612 * l - 1370589 * r, e = i / d | 0, i -= e * d, i < 0 && (i += d), r = u, u = l, l = i, t <= i ? t - i + n : t - i
                            }, f = function () {
                                return 2.3283064365386963e-10 * c()
                            };
                            return f.uint32 = c, f.fract53 = function () {
                                return f() + 1.1102230246251565e-16 * (2097151 & c())
                            }, f.version = "MRG32k3a 0.9", f.args = t, f
                        }(Array.prototype.slice.call(arguments))
                    }
                }, {
                    key: "Mash", value: function () {
                        var e = 4022871197, t = function (t) {
                            t = t.toString();
                            for (var i = 0; i < t.length; i++) {
                                e += t.charCodeAt(i);
                                var n = .02519603282416938 * e;
                                e = n >>> 0, n -= e, n *= e, e = n >>> 0, n -= e, e += 4294967296 * n
                            }
                            return 2.3283064365386963e-10 * (e >>> 0)
                        };
                        return t.version = "Mash 0.9", t
                    }
                }, {
                    key: "setUp", value: function () {
                        this.domEvent()
                    }
                }, {
                    key: "changeTip", value: function (e) {
                        this.addClass(this.limitLayer, e)
                    }
                }, {
                    key: "domEvent", value: function () {
                        this.dom = this.G(".spv_limit", this.selector), this.limitLayer = this.G(".spv_limit_layer", this.dom), this.limitClose = this.G(".spv_limit_close", this.dom), this.limitOpenApp = this.G(".spv_limit_open", this.dom), this.addClass(this.limitLayer, "tenMins"), this.limitClose.addEventListener("click", this.hide.bind(this), !1), this.limitOpenApp.addEventListener("click", this.openApp.bind(this), !1)
                    }
                }]), t
            }(v.default);
            e.default = p
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(2), i(0), i(1), i(4), i(3), i(6)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o) {
            "use strict";
            function r(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var u = r(t), l = r(i), d = r(n), h = r(s), c = r(a), f = r(o), v = function (e) {
                function t(e, i, n, s) {
                    return (0, l.default)(this, t), (0, h.default)(this, (t.__proto__ || (0, u.default)(t)).call(this, e, i, n, s))
                }

                return (0, c.default)(t, e), (0, d.default)(t, [{
                    key: "lockScreen", value: function (e) {
                    }
                }, {
                    key: "setUp", value: function (e) {
                        this.current = 0;
                        var t = e[0], i = e[1];
                        this.dom = this.selector.querySelector(".spv_icon_quality"), this.domEvent(), this.change(t, i)
                    }
                }, {
                    key: "checkForOrder", value: function () {
                    }
                }, {
                    key: "checkForLive", value: function () {
                    }
                }, {
                    key: "change", value: function (e, t) {
                        var i = this;
                        this.qualityUl.innerHTML = "";
                        var n = "";
                        e.length > 4 && e.splice(4);
                        var s = ["mp4hd3v2", "mp4hd3", "mp4hd2v2", "mp4hd2", "mp4hd", "mp4sd", "mp4", "flvhd", "3gphd"];
                        e.sort(function (e, t) {
                            return s.indexOf(e.hdcode) - s.indexOf(t.hdcode)
                        }), e.forEach(function (e, s) {
                            var a = "";
                            e.hdcode == t && (i.current = s, a = "current", i.qualityBtn.innerHTML = e.hdname), n += '<li data-type="' + e.hdcode + '" class="' + a + '">' + e.hdname + "</li>"
                        }), this.qualityUl.innerHTML = n, this.delegate()
                    }
                }, {
                    key: "delegate", value: function () {
                        this.quality_li = this.dom.querySelectorAll("li");
                        for (var e = this.quality_li.length; e--;)this.quality_li[e].addEventListener("click", this.qualityEvent.bind(this, e), !1)
                    }
                }, {
                    key: "qualityEvent", value: function (e) {
                        this.panelHide(), e != this.current && (this.qualityBtn.innerHTML = this.quality_li[e].innerHTML, this.toggleStyle(e), this.EventManager.fire("quality:change", {type: this.quality_li[e].getAttribute("data-type")}))
                    }
                }, {
                    key: "toggleStyle", value: function (e) {
                        this.removeClass(this.quality_li[this.current], "current"), this.addClass(this.quality_li[e], "current"), this.panelHide(), this.current = e
                    }
                }, {
                    key: "qualityShowEvent", value: function () {
                        "block" == this.qualityPanel.style.display ? this.panelHide() : this.panelShow()
                    }
                }, {
                    key: "domEvent", value: function () {
                        this.qualityBtn = this.dom.querySelector("span"), this.qualityPanel = this.dom.querySelector(".spv_panel_quality"), this.qualityUl = this.dom.querySelector(".spv_quality_ul"), this.qualityBtn.addEventListener("click", this.qualityShowEvent.bind(this), !1)
                    }
                }, {
                    key: "panelShow", value: function () {
                        this.qualityPanel.style.display = "block"
                    }
                }, {
                    key: "panelHide", value: function () {
                        this.qualityPanel.style.display = "none"
                    }
                }]), t
            }(f.default);
            e.default = v
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(2), i(0), i(1), i(4), i(3), i(6), i(25)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o, r) {
            "use strict";
            function u(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var l = u(t), d = u(i), h = u(n), c = u(s), f = u(a), v = u(o), p = u(r), m = function (e) {
                function t(e, i, n) {
                    (0, d.default)(this, t);
                    var s = (0, c.default)(this, (t.__proto__ || (0, l.default)(t)).call(this, e, i));
                    return s.Tipbar = (0, p.default)(e, i), s.target = n, s
                }

                return (0, f.default)(t, e), (0, h.default)(t, [{
                    key: "init", value: function (e, t) {
                        var i = this;
                        this.target.innerHTML = this.tpl(e, t);
                        var n = t ? t.time > 60 ? t.time / 60 + "分钟" : t.time + "秒" : 0;
                        n ? this.Tipbar.init("你可以免费试看" + n + '，订阅我就可以免费看完全部 <a class="spv_tips_link spv_sub_btn" href="javascript:;" data-id="' + e.uid + '">订阅</a>') : this.EventManager.fire("block:show"), this.GA(".spv_sub_btn", this.selector).forEach(function (t) {
                            t.addEventListener("click", function (t) {
                                i.subscribe(e.uid)
                            })
                        })
                    }
                }, {
                    key: "subscribe", value: function (e) {
                        var t = this;
                        !this.loading && e && this.EventManager.fire("playerSubscribe", function (e) {
                            t.EventManager.fire("video:reload", {}), t.Tipbar.forceHide()
                        }, e, {stype: "9-6"})
                    }
                }, {
                    key: "tpl", value: function (e, t) {
                        return '<spvdiv class="spv_limit_info">\n                <spvdiv class="spv_limit_panel">\n                    <spvdiv class="spv_limit_subscribe">\n                        <spvdiv class="spv_limit_tit">尊敬的用户您好，该视频需要<spvdiv class="spv_limit_type">订阅</spvdiv>观看</spvdiv>\n                        <spvdiv class="spv_limit_option">\n                            <a class="spv_limit_action spv_sub_btn" href="javascript:;" data-id="' + e.uid + '">立即订阅</a>\n                        </spvdiv>\n                    </spvdiv>\n                </spvdiv>\n                </spvdiv>'
                    }
                }]), t
            }(v.default);
            e.default = m
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(2), i(0), i(1), i(4), i(35), i(3), i(6)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o, r) {
            "use strict";
            function u(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var l = u(t), d = u(i), h = u(n), c = u(s), f = u(a), v = u(o), p = u(r), m = function (e) {
                function t(e, i, n) {
                    return (0, d.default)(this, t), (0, c.default)(this, (t.__proto__ || (0, l.default)(t)).call(this, e, i, n))
                }

                return (0, v.default)(t, e), (0, h.default)(t, [{
                    key: "setUp", value: function (e) {
                        (0, f.default)(t.prototype.__proto__ || (0, l.default)(t.prototype), "render", this).call(this, "spvdiv", {
                            className: "spv_player",
                            innerHTML: this.publicTemplate("spv") + '\n            <spvdiv class="spv_dashboard">\n                <spvdiv class="spv_progress spv_progress_hover">\n                    <spvdiv class="spv_progress_container">\n                        <input class="spv_progress_range" type="range" min="0" max="100" step="0.1" value="50">\n                        <spvdiv class="spv_progress_load"></spvdiv>\n                        <spvdiv class="spv_progress_play"></spvdiv>\n                    </spvdiv>\n                </spvdiv>\n                <spvdiv class="spv_controls">\n                    <spvdiv class="spv_left_controls">\n                        <spvdiv class="spv_icon spv_icon_play" title="播放"></spvdiv>\n                        <spvdiv class="spv_icon spv_icon_pause" title="暂停"></spvdiv>\n                        <spvdiv class="spv_time">\n                            <spvdiv class="spv_time_current">00:00</spvdiv>\n                            <spvdiv class="spv_time_split">/</spvdiv>\n                            <spvdiv class="spv_time_duration">00:00</spvdiv>\n                        </spvdiv>\n                    </spvdiv>\n                    <spvdiv class="spv_right_controls">\n                        <spvdiv class="spv_icon spv_icon_mute"></spvdiv>\n                        <spvdiv class="spv_icon spv_icon_volume"></spvdiv>\n                        <spvdiv class="spv_volume">\n                            <spvdiv class="spv_volume_slider spv_volume_slider_hover">\n                                <input class="spv_volume_range" type="range" min="0" max="1" step="0.1" value="0.5">\n                                <spvdiv class="spv_volume_current" style="width:50%"></spvdiv>\n                            </spvdiv>\n                        </spvdiv>\n                       \n                        \n                        <spvdiv class="spv_icon_quality">\n                            <span>标清</span>\n                            <spvdiv class="spv_panel_quality">\n                                <spvdiv class="spv_quality_ul"></spvdiv>\n                                <spvdiv class="spv_mask"></spvdiv>\n                            </spvdiv>\n                        </spvdiv>\n                        <spvdiv class="spv_icon spv_icon_full"></spvdiv>\n                        <spvdiv class="spv_icon spv_icon_half"></spvdiv>\n                    </spvdiv>\n                </spvdiv>\n            </spvdiv>  \n            <spvdiv class="spv_limit" >\n                <spvdiv class="spv_limit_layer">\n                    <spvdiv class="spv_limit_close"></spvdiv>\n                </spvdiv>\n                <spvdiv class="spv_limit_open"></spvdiv>\n                <spvdiv class="spv_limit_bg"></spvdiv>\n            </spvdiv>\n            <spvdiv class="spv_code">\n                <spvdiv class="spv_relative">\n                    <spvdiv class="spv_code_base spv_code_tip"></spvdiv>\n                    <spvdiv class="spv_code_base spv_code_des"></spvdiv>\n                </spvdiv>\n            </spvdiv>\n           \n            <spvdiv class="spv_recommend">\n                <spvdiv class="spv_recommend_parent">\n                    <spvdiv class="spv_recommend_page"></spvdiv>\n                </spvdiv>\n            </spvdiv>\n            <spvdiv class="spv_block"></spvdiv>\n            '
                        })
                    }
                }]), t
            }(p.default);
            e.default = m
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(2), i(0), i(1), i(4), i(3), i(6), i(5), i(25)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o, r, u) {
            "use strict";
            function l(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var d = l(t), h = l(i), c = l(n), f = l(s), v = l(a), p = l(o), m = l(r), y = l(u), _ = {}, g = function (e) {
                function t(e, i, n, s) {
                    (0, h.default)(this, t);
                    var a = (0, f.default)(this, (t.__proto__ || (0, d.default)(t)).call(this, e, i));
                    return a.Tipbar = (0, y.default)(e, i), a.target = n, a.config = s, a
                }

                return (0, v.default)(t, e), (0, c.default)(t, [{
                    key: "lockScreen", value: function (e, t) {
                        var i = e.video.id;
                        this.limit_duration = parseInt(t || this.limit_duration || 0, 10), _[i] ? this.render(_[i]) : this.getPayInfo(e)
                    }
                }, {
                    key: "getPayInfo", value: function (e) {
                        var t = this;
                        if (!this.loading) {
                            var i = e.error ? e.error.code : 0, n = e.fee ? e.fee.paid : 0, s = e.video.id, a = e.fee ? e.fee.own_channel_id : 0, o = -3008 === i ? 1 : 0, r = {
                                c: "member",
                                a: o ? "show_pay_url" : "pc_player_get_pay_info",
                                video_id: s,
                                own_channel_id: a,
                                channel_vip: o,
                                fee: o ? 0 : n
                            };
                            this.loading = !0, m.default.getJsonp("//vip.youku.com/?" + m.default.urlParameter(r), function (e) {
                                "20000" === e.code && (_[s] = e.result, t.render(e.result)), t.loading = !1
                            }, function (e) {
                                console.error("getPayInfo error")
                            })
                        }
                    }
                }, {
                    key: "tpl", value: function (e) {
                        var t = this.config.pc ? "" : "display:none;";
                        return '<spvdiv class="spv_limit_info">\n                <spvdiv class="spv_limit_panel">\n                    <spvdiv class="spv_limit_vip">\n                        <spvdiv class="spv_limit_tit">' + e.desc + '</spvdiv>\n                        <spvdiv class="spv_limit_option">' + e.button + " " + e.buyone + '</spvdiv>\n                        <spvdiv class="spv_limit_desc" style="' + t + '">\n                            <spvdiv class="spv_limit_span">' + e.title + '</spvdiv>\n                            <spvdiv class="spv_limit_span">' + e.tip + "</spvdiv>\n                        </spvdiv>\n                    </spvdiv>\n                </spvdiv>\n            </spvdiv>"
                    }
                }, {
                    key: "render", value: function (e) {
                        var t = /<a[^>]+>[^<]+<\/a>/gi, i = /<font[^>]+>([^<]+)<\/font>/gi, n = t.exec(e.button), s = e.title.replace(i, "$1"), a = n ? n[0] : '<a href="//pay.youku.com/buy/products.html">开通黄金会员</a>', o = e.desc.replace(i, '<spvdiv class="spv_limit_type">$1</spvdiv>'), r = e.tip.replace(/<font[^>]+>/gi, "").replace(/<\/font>/, "");
                        t.lastIndex = 0;
                        var u = t.exec(e.buyone);
                        u = u ? u[0] : "", o = o.replace(/<font[^>]+>/gi, "").replace(/<\/font>/, ""), a = a.replace("event:", e.button_url).replace(/(<a )/, '$1 class="spv_limit_action" '), u = u.replace(/(<a )/, '$1 class="spv_limit_link" '), this.target.innerHTML = this.tpl({
                            desc: o,
                            button: a,
                            tip: r,
                            title: s,
                            buyone: u
                        }), this.playBar(e), this.limit_duration || this.EventManager.fire("block:show")
                    }
                }, {
                    key: "playBar", value: function (e) {
                        var t = this;
                        if (!e.play_bar)return !1;
                        var i = /^[^<]+/.exec(e.play_bar);
                        i = i ? i[0] : "";
                        var n = i + '<a class="spv_tips_link" href="' + e.play_bar_link + '" target="_blank">立即购买</a>';
                        this.limit_duration && (n = n.replace(/\{data\}/, this.limit_duration / 60 + "分钟"), this.Tipbar.init(n));
                        var s = this.selector.querySelector(".spv_tips_link");
                        s && s.addEventListener("click", function (e) {
                            t.EventManager.fire("video:pause")
                        })
                    }
                }]), t
            }(p.default);
            e.default = g
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(0), i(1), i(34), i(5), i(22), i(8), i(57)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o, r) {
            "use strict";
            function u(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var l = u(t), d = u(i), h = u(n), c = u(s), f = u(a), v = u(o), p = u(r), m = function () {
                function e(t) {
                    (0, l.default)(this, e), this.TAG = "ADPlayer", this.config = t, this.supportType = t.supportType || "mp4", this.addata = null, this.curNum = 0, this.remainTime = 0, this.currentTime = 0, this._pastTime = 0, this._firstTag = !0, this._isEnd = !0, this.posiTime = 0, this.e = {
                        onPlay: this._onPlay.bind(this),
                        onEnd: this._onEnd.bind(this),
                        onUnitEnd: this._onUnitEnd.bind(this),
                        onPause: this._onPause.bind(this),
                        onTimeupdate: this._onTimeupdate.bind(this),
                        onUnitTimeUpdate: this._onUnitTimeUpdate.bind(this),
                        onCanPlay: this._onCanPlay.bind(this),
                        onStalled: this._onStalled.bind(this),
                        onError: this._onError.bind(this),
                        onProgress: this._onProgress.bind(this)
                    }, this.tryNum = 1, this._emitter = new f.default, this._mediaElement = null, this._timer = null, this._adreport = new p.default
                }

                return (0, d.default)(e, [{
                    key: "destroy", value: function () {
                        this.addata = null, this.curNum = 0, this.remainTime = 0, this.currentTime = 0, this._pastTime = 0, this._firstTag = !0, this._isEnd = !0, this._timer && (clearInterval(this._timer), this._timer = null)
                    }
                }, {
                    key: "attachMediaElement", value: function (e) {
                        this._mediaElement = e, this._mediaElement.poster = "", c.default.addEventListenerHander(this._mediaElement, "play", this.e.onPlay), "m3u8" === this.supportType ? (c.default.addEventListenerHander(this._mediaElement, "timeupdate", this.e.onUnitTimeUpdate), c.default.addEventListenerHander(this._mediaElement, "ended", this.e.onUnitEnd)) : (c.default.addEventListenerHander(this._mediaElement, "ended", this.e.onEnd), c.default.addEventListenerHander(this._mediaElement, "timeupdate", this.e.onTimeupdate)), c.default.addEventListenerHander(this._mediaElement, "canplay", this.e.onCanPlay), c.default.addEventListenerHander(this._mediaElement, "stalled", this.e.onStalled), c.default.addEventListenerHander(this._mediaElement, "error", this.e.onError), c.default.addEventListenerHander(this._mediaElement, "progress", this.e.onProgress), c.default.addEventListenerHander(this._mediaElement, "pause", this.e.onPause)
                    }
                }, {
                    key: "dettachMediaElement", value: function () {
                        if (this._mediaElement) {
                            if (this._mediaElement.removeEventListener("timeupdate", this.e.onTimeupdate), this._mediaElement.removeEventListener("ended", this.e.onEnd), c.default.removeEventListenerHander(this._mediaElement, "play", this.e.onPlay), c.default.removeEventListenerHander(this._mediaElement, "ended", this.e.onEnd), c.default.removeEventListenerHander(this._mediaElement, "timeupdate", this.e.onTimeupdate), c.default.removeEventListenerHander(this._mediaElement, "canplay", this.e.onCanPlay), c.default.removeEventListenerHander(this._mediaElement, "stalled", this.e.onStalled), c.default.removeEventListenerHander(this._mediaElement, "error", this.e.onError), c.default.removeEventListenerHander(this._mediaElement, "progress", this.e.onProgress), c.default.removeEventListenerHander(this._mediaElement, "pause", this.e.onPause), "m3u8" === this.supportType)return void this._mediaElement.pause();
                            this._mediaElement && (this._mediaElement.src = "", this._mediaElement.removeAttribute("src"), this._mediaElement = null)
                        }
                    }
                }, {
                    key: "on", value: function (e, t) {
                        this._emitter.addListener(e, t)
                    }
                }, {
                    key: "off", value: function (e, t) {
                        this._emitter.removeListener(e, t)
                    }
                }, {
                    key: "setAdData", value: function (e, t) {
                        v.default.i(this.TAG, "setAdData:"), this.addata = e, this._adreport.setData(e), this.remainTime = this.addata.totalTime, this.m3u8url = t, this.load()
                    }
                }, {
                    key: "startTimer", value: function () {
                        if (!this._timer) {
                            var e = this;
                            this._lastTime = 0, this._timer = setInterval(function () {
                                if (e._isEnd)return void clearInterval(e._timer);
                                e._lastTime === e._mediaElement.currentTime && (v.default.i(e.TAG, "stall try again"), this._mediaElement.load(), this._mediaElement.play()), e._lastTime = e._mediaElement.currentTime
                            }, 3e3)
                        }
                    }
                }, {
                    key: "load", value: function () {
                        if (v.default.i(this.TAG, "load"), !this._mediaElement)throw new IllegalStateException("HTMLMediaElement must be attached before load()!");
                        if (!this.addata)throw new IllegalStateException("adPlayer must be set adData and adtype");
                        if (0 === this.addata.VAL.length)return v.default.d(this.TAG, "the length of addata is 0"), void this.destroy();
                        this.currentTime = 0, this._pastTime = 0, this.curNum = 0, this._isEnd = !1, "m3u8" === this.supportType ? (this.src = this.m3u8url, this.posiTime = this._mediaElement.currentTime || 0) : this.src = this.addata.VAL[this.curNum].RS, this._mediaElement.readyState > 0 && (this._mediaElement.currentTime = 0)
                    }
                }, {
                    key: "play", value: function () {
                        if (v.default.i(this.TAG, "this._mediaElement.paused:" + this._mediaElement.paused + " this._isEnd:" + this._isEnd + " this._firstTag:" + this._firstTag), !this._isEnd) {
                            if (!this._mediaElement)return void v.default.e("please attachMediaElement for adPlayer");
                            if (this._firstTag) {
                                ("m3u8" !== this.supportType || "m3u8" === this.supportType && "" === this._mediaElement.src) && (this._mediaElement.src = this.src), this._mediaElement.style.display = "block", this._mediaElement.play();
                                var e = 0, t = this;
                                this._mediaElement.addEventListener("canplay", function () {
                                    1 !== e && (e = 1, v.default.i(t.TAG, "canplay time=" + t.currentTime), this.play())
                                })
                            }
                            this._mediaElement.paused && this._mediaElement.play()
                        }
                    }
                }, {
                    key: "setSrc", value: function () {
                        ("m3u8" !== this.supportType || "m3u8" === this.supportType && "" === this._mediaElement.src) && (this._mediaElement.src = this.src)
                    }
                }, {
                    key: "pause", value: function () {
                        if (!this._isEnd)return this._mediaElement ? void this._mediaElement.pause() : void v.default.e("please attachMediaElement for adPlayer")
                    }
                }, {
                    key: "skip", value: function (e) {
                        if (!(this._isEnd || e < 0 || 0 !== e && !e))if (e < this.addata.VAL.length - 1) {
                            this.curNum = e + 1, this._pastTime = 0;
                            for (var t = 0; t < this.curNum; t++)this._pastTime += this.addata.VAL[t].AL;
                            if (this.currentTime = this._pastTime, "m3u8" === this.supportType) this._seek(this._pastTime); else {
                                this._mediaElement.src = this.addata.VAL[this.curNum].RS, this._mediaElement.play();
                                var i = !1, n = this;
                                c.default.addEventListenerHander(this._mediaElement, "canplay", function () {
                                    i || (n._mediaElement.play(), i = !0)
                                })
                            }
                        } else this.curNum = this.addata.VAL.length - 1, "m3u8" === this.supportType && this._seek(this.addata.totalTime), this._pastTime += this.addata.VAL[this.curNum].AL, this.currentTime = this.addata.totalTime, "m3u8" === this.supportType ? this._onUnitTimeUpdate(null) : (this._mediaElement.pause(), this._ifEmitPause = !0, this._emitter.emit(h.default.AD_TIMEUPDATE, null, this.currentTime, this.curNum), this._onEnd(null))
                    }
                }, {
                    key: "_seek", value: function (e) {
                        if (Math.abs(this._mediaElement.currentTime - e) < 1)return !1;
                        try {
                            this._mediaElement.currentTime = e
                        } catch (n) {
                            var t = !1, i = this;
                            c.default.addEventListenerHander(this._mediaElement, "canplay", function () {
                                t || (t = !0, i._mediaElement.currentTime = e)
                            })
                        }
                        this._mediaElement.play()
                    }
                }, {
                    key: "_onEnd", value: function (e) {
                        this._isEnd || (v.default.i(this.TAG, "_adEnd:||this.curNum:" + this.curNum + "this.currentTime:" + this.currentTime), this._pastTime += this.addata.VAL[this.curNum].AL, this._adreport.sendSUE(this.curNum), this.curNum++, this.curNum < this.addata.VAL.length ? (this._adreport.sendSUS(this.curNum), this._adreport.changeNum(this.curNum), this._mediaElement.pause(), this._ifEmitPause = !0, this._mediaElement.src = this.addata.VAL[this.curNum].RS, this._mediaElement.play()) : (v.default.i(this.TAG, "_adEnd:||this._isEnd:" + this._isEnd), this._isEnd || (this._isEnd = !0, this.destroy(), this._emitter.emit(h.default.AD_END, e))))
                    }
                }, {
                    key: "_onUnitEnd", value: function (e) {
                        this._isEnd || (v.default.i(this.TAG, "_onUnitEnd:||this._isEnd:" + this._isEnd + "   this._mediaElement.currentTime:" + this._mediaElement.currentTime), this._isEnd = !0, this._mediaElement.pause(), this._ifEmitPause = !0, this.destroy(), this._emitter.emit(h.default.AD_END, e, this._mediaElement.currentTime))
                    }
                }, {
                    key: "_onTimeupdate", value: function (e) {
                        if (!this._isEnd && this._mediaElement) {
                            var t = this._mediaElement.currentTime;
                            this.currentTime = this._pastTime + t, this.remainTime = this.addata.totalTime - this.currentTime, this._emitter.emit(h.default.AD_TIMEUPDATE, e, this.currentTime, this.curNum)
                        }
                    }
                }, {
                    key: "_onUnitTimeUpdate", value: function (e) {
                        this._isEnd || this._mediaElement && (this.currentTime = this._mediaElement.currentTime, this.currentTime >= this.addata.totalTime ? (this._adreport.sendSUE(this.curNum), this._onUnitEnd(e)) : (this.currentTime > this._pastTime + this.addata.VAL[this.curNum].AL && (this._pastTime += this.addata.VAL[this.curNum].AL, this._adreport.sendSUE(this.curNum), this.curNum++, this._adreport.sendSUS(this.curNum), this._adreport.changeNum(this.curNum)), this._emitter.emit(h.default.AD_TIMEUPDATE, e, this.currentTime, this.curNum)))
                    }
                }, {
                    key: "_onPlay", value: function (e) {
                        this._isEnd || (this._firstTag && this._adreport.sendSUS(this.curNum), this._firstTag = !1, this._emitter.emit(h.default.AD_PLAY, e))
                    }
                }, {
                    key: "_onPause", value: function (e) {
                        if (this._isEnd)return v.default.d(this.TAG, "_onPause:" + this._ifEmitPause), void(this._ifEmitPause = !1);
                        v.default.i(this.TAG, "_onPause::this._isEnd:" + this._isEnd), this._emitter.emit(h.default.AD_PAUSE, e)
                    }
                }, {
                    key: "_onError", value: function (e) {
                        if (!this._isEnd) {
                            if ("m3u8" === this.supportType)return void(this.tryNum > 0 ? (this.tryNum--, this._mediaElement.src = this.m3u8url, this._mediaElement.currentTime = this.currentTime, this._mediaElement.play()) : (this._isEnd = !0, this._emitter.emit(h.default.AD_ERROR, e)));
                            if (this.curNum < this.addata.VAL.length - 1)return void this.skip(this.curNum);
                            this._isEnd = !0, this._emitter.emit(h.default.AD_ERROR, e)
                        }
                    }
                }, {
                    key: "_onCanPlay", value: function (e) {
                        v.default.i(this.TAG, "_onCanPlay"), this._isEnd || this._emitter.emit(h.default.AD_CANPLAY, e)
                    }
                }, {
                    key: "_onProgress", value: function (e) {
                    }
                }, {
                    key: "_onStalled", value: function (e) {
                    }
                }, {
                    key: "_onSeeking", value: function (e) {
                    }
                }]), e
            }();
            e.default = m
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(0), i(1), i(56), i(5), i(8), i(106), i(22), i(34)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o, r, u) {
            "use strict";
            function l(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var d = l(t), h = l(i), c = l(s), f = l(a), v = l(o), p = l(r), m = l(u), y = function () {
                function e(t, i, n) {
                    (0, d.default)(this, e), this.TAG = "ADplugin", this.param = {}, this.adpoint = [], this.param.aw = "w", this.param.vs = "1.0", this.param.pver = "1", this.param.tict = 0, this.param.wintype = "xplayer_m3u8", (n || i) && this.init(n, i), this.param.site = location.origin.indexOf("tudou.com") > -1 || "0505" === this.ccode ? "-1" : "1", this._mediaElement = t, this.status = 0, this.contentNum = 0, this.netflag = !1, this.startplay = !1, this.content_addata = null, this.stand_addata = null, this.front_addata = null, this.end_addata = null, this.frontAdTime = 0, this.endAdTime = 0, this.addata = null, this._vtvc = [], this._defaultData = {VAL: []}, this.e = {
                        adPlayError: this._adError.bind(this),
                        adPlay: this._adPlay.bind(this),
                        adTimeUpdate: this._adtimeUpdate.bind(this),
                        adPlayEnd: this._adplayEnd.bind(this),
                        adPlayPause: this._adplayPause.bind(this),
                        adCanPlay: this._adcanplay.bind(this),
                        adPlayLoading: this._adplayLoading.bind(this),
                        adReady: this._adReady.bind(this)
                    }, this._emitter = new p.default, this._adplayer = new v.default({supportType: this.supportType}), this._adplayer.attachMediaElement(this._mediaElement), this._addAdplayerEmit()
                }

                return (0, h.default)(e, [{
                    key: "destroy", value: function () {
                        this.adpoint = [], this.status = 0, this.contentNum = 0, this.netflag = !1, this.startplay = !1, this.content_addata = null, this.stand_addata = null, this.front_addata = null, this.end_addata = null, this.frontAdTime = 0, this.endAdTime = 0, this.addata = null, this.unitedAd = !1, this._adplayer.destroy()
                    }
                }, {
                    key: "_reset", value: function () {
                        this.status = 0, this.startplay = !1, this.adType = "", this.netflag = !1, this.addata = null, this._ispause = !1
                    }
                }, {
                    key: "init", value: function (e, t) {
                        if (t) {
                            if (t.m3u8_url && (this.m3u8url = t.m3u8_url), t.supportType && (this.supportType = t.supportType), t.ccode && (this.ccode = t.ccode), t.param)for (var i in t.param)this.param[i] = t.param[i];
                            if (t.adConfig)for (var n in t.adConfig)this.param[n] = t.adConfig[n]
                        }
                        if (e) {
                            this.videoId = e.encodeId, this.param.isvert = c.default.getScreenState(), this.param.wintype = "xplayer_m3u8", this.param.vl = e.trial ? parseInt(e.trial.time) - 1 : parseInt(e.video.seconds), this.param.ct = e.video.category_letter_id, this.param.sid = e.ups.psid;
                            for (var s = e.video.subcategories || [], a = [], o = 0, r = s.length; o < r; o++)a.push(s[o].id);
                            this.param.cs = a.join("|");
                            var u = e.video.type.join(",");
                            this.param.paid = u.indexOf("fee") > -1 || u.indexOf("channel_vip") > -1 || e.fee || e.show && e.show.pay ? 1 : 0, this.param.s = e.show ? e.show.id : 0, this.param.v = e.videoId, this.param.vip = e.user && e.user.vip ? 1 : 0;
                            var l = e.video.tags || [];
                            this.param.k = encodeURIComponent(l.join("|")), this.param.u = e.video.userid || "", this.param.td = e.video.source ? e.video.source : 0, this.param.ti = encodeURIComponent(e.video.title), this.param.vr = 0, e.trial && (this.param.tt = e.trial.type);
                            var d = e.dvd && e.dvd.point || [];
                            this._setAdPoint(d), "m3u8" === this.supportType ? (this.requestFrontAd(), this.requestEndAd()) : this.requestFrontAd()
                        }
                    }
                }, {
                    key: "_removeAdplayerEmit", value: function () {
                        this._adplayer.off(m.default.AD_PLAY, this.e.adPlay), this._adplayer.off(m.default.AD_PAUSE, this.e.adPlayPause), this._adplayer.off(m.default.AD_END, this.e.adPlayEnd), this._adplayer.off(m.default.AD_TIMEUPDATE, this.e.adTimeUpdate), this._adplayer.off(m.default.AD_ERROR, this.e.adPlayError), this._adplayer.off(m.default.AD_CANPLAY, this.e.adCanPlay), this._adplayer.off(m.default.AD_LOADING, this.e.adPlayLoading)
                    }
                }, {
                    key: "_addAdplayerEmit", value: function () {
                        this._adplayer.on(m.default.AD_PLAY, this.e.adPlay), this._adplayer.on(m.default.AD_PAUSE, this.e.adPlayPause), this._adplayer.on(m.default.AD_END, this.e.adPlayEnd), this._adplayer.on(m.default.AD_TIMEUPDATE, this.e.adTimeUpdate), this._adplayer.on(m.default.AD_ERROR, this.e.adPlayError), this._adplayer.on(m.default.AD_CANPLAY, this.e.adCanPlay), this._adplayer.on(m.default.AD_LOADING, this.e.adPlayLoading)
                    }
                }, {
                    key: "on", value: function (e, t) {
                        this._emitter.addListener(e, t)
                    }
                }, {
                    key: "off", value: function (e, t) {
                        this._emitter.removeListener(e, t)
                    }
                }, {
                    key: "play", value: function () {
                        if (f.default.i(this.TAG, "play|||this.startplay:" + this.startplay), !this.addata)return void this._adplayEnd(null);
                        if (this.startplay) this._adplayer.play(); else {
                            if (0 === this.addata.VAL.length)return f.default.d(this.TAG, "play|||this.addata.VAL.length:" + this.addata.VAL.length), void this._adplayEnd(null);
                            this.ifReady || this._initAdPlayer(this.addata), this.loadVTVC(this.addata.vtvc), f.default.i(this.TAG, "play|||this._adplayer:"), this._adplayer.play()
                        }
                        this._ispause = !1
                    }
                }, {
                    key: "autoPlay", value: function () {
                        if (this._mediaElement.style.display = "block", 0 === this.addata.VAL.length)return f.default.d(this.TAG, "play|||this.addata.VAL.length:" + this.addata.VAL.length), void this._adplayEnd(null);
                        this._adplayer.setSrc()
                    }
                }, {
                    key: "pause", value: function () {
                        this.addata && this.startplay && (this._adplayer.pause(), this._ispause = !0)
                    }
                }, {
                    key: "skip", value: function (e, t) {
                        this._adplayer.skip(e)
                    }
                }, {
                    key: "ifPlayAd", value: function (e) {
                        if (0 === this._midpoints.length)return !1;
                        if (this.contentNum < this._midpoints.length) {
                            var t = parseInt(this._midpoints[this.contentNum].start) / 1e3;
                            if (t - e <= 5 && !this.netflag && !this.content_addata)return this.requestContentAd(), !1;
                            if (e >= t)return !0
                        }
                        return !1
                    }
                }, {
                    key: "_initAdPlayer", value: function (e) {
                        if (this.ifReady = !0, 0 === this.addata.VAL.length)return void this._adReady(null);
                        this._adplayer.setAdData(this.addata, this.m3u8url), this._adReady(null)
                    }
                }, {
                    key: "_setAdPoint", value: function (e) {
                        for (var t = [], i = 0, n = 0, s = 0, a = e.length; s < a; s++)"standard" !== e[s].ctype && "contentad" !== e[s].ctype || (e[s].num = "standard" === e[s].ctype ? i++ : n++, t.push(e[s]));
                        this._midpoints = t
                    }
                }, {
                    key: "_isNeedAd", value: function (e) {
                        return !0
                    }
                }, {
                    key: "_splitVTVC", value: function () {
                        var e = {
                            SKIP: 1,
                            VER: "3.0",
                            P: 7,
                            REQID: "150166na62-00Zp-04oFEn-02A-0DQ",
                            VAL: []
                        }, t = 0, i = [], n = [], s = [], a = {};
                        for (var o in e)"VAL" != o && (a[o] = e[o]);
                        a.VAL = [];
                        for (var r = e.VAL, u = 0; u < r.length; u++)2 !== parseInt(r[u].VT) ? null != r[u].RS && "" != r[u].RS.trim() && null != r[u].VID && null != r[u].VQT && (a.VAL.push(r[u]), s.push(r[u].RS), n.push(parseInt(r[u].AL)), t += r[u].AL) : (r[u].pos_ = u - 1 - i.length, i.push(r[u]));
                        return a.urls = s, a.seconds = n, a.vtvc = i, a.totalTime = t, a
                    }
                }, {
                    key: "buildM3u8", value: function (e, t) {
                        e && (this.m3u8url = e);
                        var i = this.front_addata && this.front_addata.VAL && !t ? this.front_addata.VAL : [], n = this.end_addata && this.end_addata.VAL ? this.end_addata.VAL : [];
                        if (0 === i.length && 0 === n.length)return this.m3u8url;
                        var s = this.m3u8url.split("?"), a = s[0];
                        s = s[1].split("&");
                        for (var o = 0, r = -1, u = "", l = 0; l < s.length; l++) {
                            var d = s[l].split("=");
                            d.length > 0 && "vid" === d[0] && (o = l, d[1]), d.length > 0 && "type" === d[0] && (u = d[1], r = l)
                        }
                        u || (u = "mp4");
                        for (var h = [], f = 0, v = i.length, p = 0; p < v; p++) {
                            var m = i[p], y = (m.RS, m.VID), _ = m.VQT;
                            h["a" + (p + 1)] = y + "_" + _
                        }
                        f = i.length + 1, h.v = this.videoId + "_" + u;
                        for (var g = n.length, k = 0; k < g; k++) {
                            var E = n[k], A = (E.RS, E.VID), T = E.VQT;
                            h["a" + (f + k)] = A + "_" + T
                        }
                        return s[o] = "ids=" + encodeURIComponent(c.default.toJSON(h)), s[r] = "", this.m3u8url = a + "?" + s.join("&"), this.m3u8url
                    }
                }, {
                    key: "parseFrontAd", value: function (e) {
                        if (!this.front_addata) {
                            if (f.default.i(this.TAG, "parseFrontAd"), this.adType = n.AD_MAP.FRONT, this.addata = this.front_addata, this.front_addata = this._splitVTVC(e), this.frontAdTime = this.front_addata.totalTime, this.netflag = !1, this._emitter.emit(m.default.AD_DATA_OK, this.front_addata, this.adType), "m3u8" === this.supportType)return void this.parseUnited();
                            this.addata = this.front_addata, this._initAdPlayer()
                        }
                    }
                }, {
                    key: "parseEndAd", value: function (e) {
                        if (f.default.i(this.TAG, "parseEndAd"), this.netflag = !1, this.adType = n.AD_MAP.END, this.end_addata = this._splitVTVC(e), "m3u8" === this.supportType)return void this.parseUnited();
                        this.addata = this.end_addata, this._emitter.emit(m.default.AD_DATA_OK, this.end_addata, this.adType), this._initAdPlayer(this.addata), f.default.i(this.TAG, "parseEndAd(data)"), this.play()
                    }
                }, {
                    key: "parseContentAd", value: function (e) {
                        this.netflag = !1, this.content_addata = this._splitVTVC(e), this._emitter.emit(m.default.AD_DATA_OK, this.content_addata, this.adType), this.addata = this.content_addata
                    }
                }, {
                    key: "parsePauseAd", value: function (e) {
                        f.default.i(this.TAG, "parsePauseAd"), this._emitter.emit(m.default.AD_DATA_OK, e, n.AD_MAP.PAUSE)
                    }
                }, {
                    key: "parseUnited", value: function () {
                        if (!this.unitedAd && this.front_addata && this.end_addata) {
                            if (this.unitedAd = !0, f.default.i(this.TAG, "parseUnited"), this.endAdTime = this.end_addata.totalTime, this.m3u8url = this.buildM3u8(this.m3u8url, !0), this.addata = this.front_addata, !this.addata.VAL.length)return void this._emitter.emit(m.default.AD_END, {}, "front");
                            this.adType = "front", this._initAdPlayer(this.addata)
                        }
                    }
                }, {
                    key: "adDataTimeout", value: function (e) {
                        f.default.i(this.TAG, "adDataTimeout:" + e), e === n.AD_MAP.FRONT ? this.parseFrontAd(this._defaultData) : e === n.AD_MAP.END && this.parseEndAd(this._defaultData), this._emitter.emit(m.default.AD_DATA_ERROR, this.adType)
                    }
                }, {
                    key: "adDataError", value: function (e) {
                        f.default.e(this.TAG, "fronOutAdError:" + e), e === n.AD_MAP.FRONT ? this.parseFrontAd(this._defaultData) : e === n.AD_MAP.END && this.parseEndAd(this._defaultData), this._emitter.emit(m.default.AD_DATA_ERROR, this.adType)
                    }
                }, {
                    key: "changeParam", value: function (e) {
                        for (var t in e)this.param[t] = e[t]
                    }
                }, {
                    key: "requestFrontAd", value: function (e) {
                        var t = this;
                        f.default.i(this.TAG, "requestFrontAd：ifPlay：" + e), this.adType = n.AD_MAP.FRONT;
                        var i = {};
                        i.p = 7;
                        var s = c.default.protocol + n.YoukuAdApiM.FRONT_AD_API + "?" + c.default.urlParameter(this.param) + "&" + c.default.urlParameter(i);
                        this.netflag = !0, c.default.getJsonp(s, function (i) {
                            t.parseFrontAd(i, e)
                        }, function () {
                            t.adDataError(n.AD_MAP.FRONT)
                        }, function () {
                            t.adDataTimeout(n.AD_MAP.FRONT)
                        })
                    }
                }, {
                    key: "requestContentAd", value: function (e) {
                        var t = this;
                        f.default.i(this.TAG, "requestContentAd");
                        var i = {};
                        i.p = 8, i.ps = this._midpoints[this.contentNum];
                        this._midpoints[this.contentNum];
                        i.pt = this._midpoints[this.contentNum].start / 1e3;
                        var s = c.default.protocol + n.YoukuAdApiM.CONTENT_AD_API + "?" + c.default.urlParameter(this.param) + "&" + c.default.urlParameter(i);
                        this.netflag = !0, c.default.getJsonp(s, function (i) {
                            t.parseContentAd(i, e)
                        }, function () {
                            t.adDataError(n.AD_MAP.CONT)
                        }, function () {
                            t.adDataTimeout(n.AD_MAP.CONT)
                        })
                    }
                }, {
                    key: "requestStandardAd", value: function () {
                        ({}).p = 9
                    }
                }, {
                    key: "requestEndAd", value: function (e) {
                        var t = this;
                        f.default.i(this.TAG, "requestEndAd:ifPlay" + e);
                        var i = {};
                        i.p = 9, i.ctu = 1;
                        var s = c.default.protocol + n.YoukuAdApiM.END_AD_API + "?" + c.default.urlParameter(this.param) + "&" + c.default.urlParameter(i);
                        this.netflag = !0, c.default.getJsonp(s, function (i) {
                            t.parseEndAd(i, e)
                        }, function () {
                            t.adDataError(n.AD_MAP.END)
                        }, function () {
                            t.adDataTimeout(n.AD_MAP.END)
                        })
                    }
                }, {
                    key: "requestPauseAd", value: function () {
                        var e = this;
                        f.default.i(this.TAG + " requestPauseAd");
                        var t = {p: 10}, i = "" + c.default.protocol + n.YoukuAdApiM.PAUSE_AD_API + "?" + c.default.urlParameter(this.param) + "&" + c.default.urlParameter(t);
                        c.default.getJsonp(i, function (t) {
                            e.parsePauseAd(t)
                        }, function () {
                            e.adDataError(n.AD_MAP.PAUSE)
                        }, function () {
                            e.adDataTimeout(n.AD_MAP.PAUSE)
                        })
                    }
                }, {
                    key: "loadVTVC", value: function (e) {
                        if (e)for (var t = 0; t < e.length; t++)c.default.loadfile(e[t].VC, "js")
                    }
                }, {
                    key: "sendCUM", value: function () {
                        this._adplayer._adreport && this._adplayer._adreport.sendCUM()
                    }
                }, {
                    key: "playFrontAD", value: function () {
                        f.default.i(this.TAG, "playFrontAD():"), this.adType = n.AD_MAP.FRONT, this.front_addata ? (this.addata = this.front_addata, this._initAdPlayer(this.addata), this.play()) : "m3u8" === this.supportType ? (this.requestFrontAd(), this.requestEndAd()) : this.requestFrontAd(!0)
                    }
                }, {
                    key: "playEndAD", value: function () {
                        this.adType = n.AD_MAP.END, "m3u8" === this.supportType ? (this.addata = this.end_addata, this._emitter.emit(m.default.AD_DATA_OK, this.end_addata, this.adType), this._initAdPlayer(this.addata, !0), this.play()) : this.requestEndAd(!0)
                    }
                }, {
                    key: "playContentAd", value: function () {
                        this.adType = n.AD_MAP.CONT
                    }
                }, {
                    key: "_adReady", value: function (e) {
                        f.default.i(this.TAG, "_adReady|adtype:" + this.adType), this._emitter.emit(m.default.AD_READY, e, this.adType)
                    }
                }, {
                    key: "_adError", value: function (e) {
                        f.default.i(this.TAG, "_adError|adtype"), this._emitter.emit(m.default.AD_ERROR, e, this.adType)
                    }
                }, {
                    key: "_adPlay", value: function (e) {
                        this.startplay = !0, f.default.i(this.TAG, "_adPlay|adtype" + this.adType), this._emitter.emit(m.default.AD_PLAY, e, this.adType)
                    }
                }, {
                    key: "_adtimeUpdate", value: function (e, t, i) {
                        this._currentTime = t, this._emitter.emit(m.default.AD_TIMEUPDATE, e, t, this.adType, i)
                    }
                }, {
                    key: "_adplayEnd", value: function (e, t) {
                        f.default.i(this.TAG, "_adplayEnd|adtype|" + this.adType), this.startplay = !1, this.adType !== n.AD_MAP.CONT && this.adType !== n.AD_MAP.STA || this.contentNum++, this.adType === n.AD_MAP.FRONT && (this.frontAdTime = t || this.frontAdTime, f.default.i(this.TAG, "_adplayEnd(e):this..frontAdTime" + this.frontAdTime)), this.addata = null, this._emitter.emit(m.default.AD_END, e, this.adType), this._reset()
                    }
                }, {
                    key: "_adplayPause", value: function (e) {
                        f.default.i(this.TAG, "_adplayPause|adtype" + this.adType), this._emitter.emit(m.default.AD_PAUSE, e, this.adType)
                    }
                }, {
                    key: "_adplayLoading", value: function (e) {
                        f.default.i(this.TAG, "_adplayLoading|adtype" + this.adType), this._emitter.emit(m.default.AD_LOADING, e, this.adType)
                    }
                }, {
                    key: "_adcanplay", value: function (e) {
                        f.default.i(this.TAG, "_adcanplay|adtype" + this.adType), this._emitter.emit(m.default.AD_CANPLAY, e, this.adType)
                    }
                }]), e
            }();
            e.default = y
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(0), i(1)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i) {
            "use strict";
            function n(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var s = n(t), a = n(i), o = function () {
                function e(t) {
                    (0, s.default)(this, e), this.ckey = null, t && t.callback && (this.callback = t.callback), this.maxCount = t && t.maxCount ? t.maxCount : 5, this.defaultCkey = t && t.defaultCkey ? t.defaultCkey : "DIl58SLFxFNndSV1GFNnMQVYkx1PP5tKe1siZu/86PR1u/Wh1Ptd+WOZsHHWxysSfAOhNJpdVWsdVJNsfJ8Sxd8WKVvNfAS8aS8fAOzYARzPyPc3JvtnPHjTdKfESTdnuTW6ZPvk2pNDh4uFzotgdMEFkzQ5wZVXl2Pf1/Y6hLK0OnCNxBj3+nb0v72gZ6b0td+WOZsHHWxysSo/0y9D2K42SaB8Y/+aD2K42SaB8Y/+ahU+WOZsHcrxysooUeND", this.onlyHost = t && t.onlyHost ? 1 : 0, this.startTime = (new Date).getTime(), this.init()
                }

                return (0, a.default)(e, [{
                    key: "init", value: function () {
                        if (!window.UA_Opt) {
                            var e = new {};
                            window.UA_Opt = e, this.uaKey = "collina_" + (new Date).getTime(), e.OnlyHost = this.onlyHost, e.SendMethod = 9, e.FormId = "login_submit_form", e.ExTarget = ["password"], e.LogVal = this.uaKey, window[e.LogVal] = "", e.Token = (new Date).getTime() + ":" + Math.random(), e.MaxMCLog = this.maxCount, e.MaxKSLog = this.maxCount, e.MaxMPLog = this.maxCount, e.MaxTCLog = this.maxCount, e.MaxFocusLog = this.maxCount, e.ResHost = "aeu.alicdn.com", e.Flag = 1670350
                        }
                        if (window[window.UA_Opt.LogVal] ? (this.endTime = (new Date).getTime(), this.ckey = window[window.UA_Opt.LogVal]) : this.addCallback(), void 0 === window.acjs) {
                            this.startTime = (new Date).getTime();
                            var t = document.createElement("script");
                            t.src = "//af.alicdn.com/js/uac.js", document.head.appendChild(t)
                        }
                    }
                }, {
                    key: "addCallback", value: function () {
                        var e = this;
                        window.UA_Opt.callback = function () {
                            e.endTime = (new Date).getTime(), e.ckey = window[window.UA_Opt.LogVal], e.callback && (e.callback({ckey: e.ckey}), e.callback = null)
                        }
                    }
                }, {
                    key: "getCkey", value: function () {
                        var e = window[window.UA_Opt.LogVal];
                        return window.UA_Opt.Token = (new Date).getTime() + ":" + Math.random(), window.UA_Opt.reload && window.UA_Opt.reload(), this.ckey = e || this.ckey, this.ckey
                    }
                }]), e
            }();
            e.default = o
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (i, o) {
            s = [t], n = o, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e) {
            "use strict";
            function t(e) {
                function t(e, t) {
                    return e << t | e >>> 32 - t
                }

                function i(e) {
                    var t, i, n = "";
                    for (t = 7; t >= 0; t--)i = e >>> 4 * t & 15, n += i.toString(16);
                    return n
                }

                var n, s, a, o, r, u, l, d, h, c = new Array(80), f = 1732584193, v = 4023233417, p = 2562383102, m = 271733878, y = 3285377520;
                e = function (e) {
                    e = e.replace(/\r\n/g, "\n");
                    for (var t = "", i = 0; i < e.length; i++) {
                        var n = e.charCodeAt(i);
                        n < 128 ? t += String.fromCharCode(n) : n > 127 && n < 2048 ? (t += String.fromCharCode(n >> 6 | 192), t += String.fromCharCode(63 & n | 128)) : (t += String.fromCharCode(n >> 12 | 224), t += String.fromCharCode(n >> 6 & 63 | 128), t += String.fromCharCode(63 & n | 128))
                    }
                    return t
                }(e);
                var _ = e.length, g = new Array;
                for (s = 0; s < _ - 3; s += 4)a = e.charCodeAt(s) << 24 | e.charCodeAt(s + 1) << 16 | e.charCodeAt(s + 2) << 8 | e.charCodeAt(s + 3), g.push(a);
                switch (_ % 4) {
                    case 0:
                        s = 2147483648;
                        break;
                    case 1:
                        s = e.charCodeAt(_ - 1) << 24 | 8388608;
                        break;
                    case 2:
                        s = e.charCodeAt(_ - 2) << 24 | e.charCodeAt(_ - 1) << 16 | 32768;
                        break;
                    case 3:
                        s = e.charCodeAt(_ - 3) << 24 | e.charCodeAt(_ - 2) << 16 | e.charCodeAt(_ - 1) << 8 | 128
                }
                for (g.push(s); g.length % 16 != 14;)g.push(0);
                for (g.push(_ >>> 29), g.push(_ << 3 & 4294967295), n = 0; n < g.length; n += 16) {
                    for (s = 0; s < 16; s++)c[s] = g[n + s];
                    for (s = 16; s <= 79; s++)c[s] = t(c[s - 3] ^ c[s - 8] ^ c[s - 14] ^ c[s - 16], 1);
                    for (o = f, r = v, u = p, l = m, d = y, s = 0; s <= 19; s++)h = t(o, 5) + (r & u | ~r & l) + d + c[s] + 1518500249 & 4294967295, d = l, l = u, u = t(r, 30), r = o, o = h;
                    for (s = 20; s <= 39; s++)h = t(o, 5) + (r ^ u ^ l) + d + c[s] + 1859775393 & 4294967295, d = l, l = u, u = t(r, 30), r = o, o = h;
                    for (s = 40; s <= 59; s++)h = t(o, 5) + (r & u | r & l | u & l) + d + c[s] + 2400959708 & 4294967295, d = l, l = u, u = t(r, 30), r = o, o = h;
                    for (s = 60; s <= 79; s++)h = t(o, 5) + (r ^ u ^ l) + d + c[s] + 3395469782 & 4294967295, d = l, l = u, u = t(r, 30), r = o, o = h;
                    f = f + o & 4294967295, v = v + r & 4294967295, p = p + u & 4294967295, m = m + l & 4294967295, y = y + d & 4294967295
                }
                var h = i(f) + i(v) + i(p) + i(m) + i(y);
                return h.toLowerCase()
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var i = {
                hcbt: function (e) {
                    return this.genH(e)
                }, genH: function (e) {
                    for (var i = !1, n = void 0, s = ""; !i;) {
                        s = this.randomString(20);
                        n = t(e + s), "00" == n.substring(0, 2) && (i = !0)
                    }
                    return s
                }, randomString: function (e) {
                    for (var t = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz", i = "", n = 0; n < e; n++) {
                        var s = Math.floor(Math.random() * t.length);
                        i += t.substring(s, s + 1)
                    }
                    return i
                }
            };
            e.default = i
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (i, o) {
            s = [t], n = o, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e) {
            "use strict";
            Object.defineProperty(e, "__esModule", {value: !0});
            var t = {
                hexcase: 0, b64pad: "", chrsz: 8, hex_md5: function (e) {
                    return this.binl2hex(this.core_md5(this.str2binl(e), e.length * this.chrsz))
                }, b64_md5: function (e) {
                    return this.binl2b64(this.core_md5(this.str2binl(e), e.length * this.chrsz))
                }, hex_hmac_md5: function (e, t) {
                    return this.binl2hex(this.core_hmac_md5(e, t))
                }, b64_hmac_md5: function (e, t) {
                    return this.binl2b64(this.core_hmac_md5(e, t))
                }, calcMD5: function (e) {
                    return this.binl2hex(this.core_md5(this.str2binl(e), e.length * this.chrsz))
                }, md5_vm_test: function () {
                    return "900150983cd24fb0d6963f7d28e17f72" == this.hex_md5("abc")
                }, core_md5: function (e, t) {
                    e[t >> 5] |= 128 << t % 32, e[14 + (t + 64 >>> 9 << 4)] = t;
                    for (var i = 1732584193, n = -271733879, s = -1732584194, a = 271733878, o = 0; o < e.length; o += 16) {
                        var r = i, u = n, l = s, d = a;
                        i = this.md5_ff(i, n, s, a, e[o + 0], 7, -680876936), a = this.md5_ff(a, i, n, s, e[o + 1], 12, -389564586), s = this.md5_ff(s, a, i, n, e[o + 2], 17, 606105819), n = this.md5_ff(n, s, a, i, e[o + 3], 22, -1044525330), i = this.md5_ff(i, n, s, a, e[o + 4], 7, -176418897), a = this.md5_ff(a, i, n, s, e[o + 5], 12, 1200080426), s = this.md5_ff(s, a, i, n, e[o + 6], 17, -1473231341), n = this.md5_ff(n, s, a, i, e[o + 7], 22, -45705983), i = this.md5_ff(i, n, s, a, e[o + 8], 7, 1770035416), a = this.md5_ff(a, i, n, s, e[o + 9], 12, -1958414417), s = this.md5_ff(s, a, i, n, e[o + 10], 17, -42063), n = this.md5_ff(n, s, a, i, e[o + 11], 22, -1990404162), i = this.md5_ff(i, n, s, a, e[o + 12], 7, 1804603682), a = this.md5_ff(a, i, n, s, e[o + 13], 12, -40341101), s = this.md5_ff(s, a, i, n, e[o + 14], 17, -1502002290), n = this.md5_ff(n, s, a, i, e[o + 15], 22, 1236535329), i = this.md5_gg(i, n, s, a, e[o + 1], 5, -165796510), a = this.md5_gg(a, i, n, s, e[o + 6], 9, -1069501632), s = this.md5_gg(s, a, i, n, e[o + 11], 14, 643717713), n = this.md5_gg(n, s, a, i, e[o + 0], 20, -373897302), i = this.md5_gg(i, n, s, a, e[o + 5], 5, -701558691), a = this.md5_gg(a, i, n, s, e[o + 10], 9, 38016083), s = this.md5_gg(s, a, i, n, e[o + 15], 14, -660478335), n = this.md5_gg(n, s, a, i, e[o + 4], 20, -405537848), i = this.md5_gg(i, n, s, a, e[o + 9], 5, 568446438), a = this.md5_gg(a, i, n, s, e[o + 14], 9, -1019803690), s = this.md5_gg(s, a, i, n, e[o + 3], 14, -187363961), n = this.md5_gg(n, s, a, i, e[o + 8], 20, 1163531501), i = this.md5_gg(i, n, s, a, e[o + 13], 5, -1444681467), a = this.md5_gg(a, i, n, s, e[o + 2], 9, -51403784), s = this.md5_gg(s, a, i, n, e[o + 7], 14, 1735328473), n = this.md5_gg(n, s, a, i, e[o + 12], 20, -1926607734), i = this.md5_hh(i, n, s, a, e[o + 5], 4, -378558), a = this.md5_hh(a, i, n, s, e[o + 8], 11, -2022574463), s = this.md5_hh(s, a, i, n, e[o + 11], 16, 1839030562), n = this.md5_hh(n, s, a, i, e[o + 14], 23, -35309556), i = this.md5_hh(i, n, s, a, e[o + 1], 4, -1530992060), a = this.md5_hh(a, i, n, s, e[o + 4], 11, 1272893353), s = this.md5_hh(s, a, i, n, e[o + 7], 16, -155497632), n = this.md5_hh(n, s, a, i, e[o + 10], 23, -1094730640), i = this.md5_hh(i, n, s, a, e[o + 13], 4, 681279174), a = this.md5_hh(a, i, n, s, e[o + 0], 11, -358537222), s = this.md5_hh(s, a, i, n, e[o + 3], 16, -722521979), n = this.md5_hh(n, s, a, i, e[o + 6], 23, 76029189), i = this.md5_hh(i, n, s, a, e[o + 9], 4, -640364487), a = this.md5_hh(a, i, n, s, e[o + 12], 11, -421815835), s = this.md5_hh(s, a, i, n, e[o + 15], 16, 530742520), n = this.md5_hh(n, s, a, i, e[o + 2], 23, -995338651), i = this.md5_ii(i, n, s, a, e[o + 0], 6, -198630844), a = this.md5_ii(a, i, n, s, e[o + 7], 10, 1126891415), s = this.md5_ii(s, a, i, n, e[o + 14], 15, -1416354905), n = this.md5_ii(n, s, a, i, e[o + 5], 21, -57434055), i = this.md5_ii(i, n, s, a, e[o + 12], 6, 1700485571), a = this.md5_ii(a, i, n, s, e[o + 3], 10, -1894986606), s = this.md5_ii(s, a, i, n, e[o + 10], 15, -1051523), n = this.md5_ii(n, s, a, i, e[o + 1], 21, -2054922799), i = this.md5_ii(i, n, s, a, e[o + 8], 6, 1873313359), a = this.md5_ii(a, i, n, s, e[o + 15], 10, -30611744), s = this.md5_ii(s, a, i, n, e[o + 6], 15, -1560198380), n = this.md5_ii(n, s, a, i, e[o + 13], 21, 1309151649), i = this.md5_ii(i, n, s, a, e[o + 4], 6, -145523070), a = this.md5_ii(a, i, n, s, e[o + 11], 10, -1120210379), s = this.md5_ii(s, a, i, n, e[o + 2], 15, 718787259), n = this.md5_ii(n, s, a, i, e[o + 9], 21, -343485551), i = this.safe_add(i, r), n = this.safe_add(n, u), s = this.safe_add(s, l), a = this.safe_add(a, d)
                    }
                    return Array(i, n, s, a)
                }, md5_cmn: function (e, t, i, n, s, a) {
                    return this.safe_add(this.bit_rol(this.safe_add(this.safe_add(t, e), this.safe_add(n, a)), s), i)
                }, md5_ff: function (e, t, i, n, s, a, o) {
                    return this.md5_cmn(t & i | ~t & n, e, t, s, a, o)
                }, md5_gg: function (e, t, i, n, s, a, o) {
                    return this.md5_cmn(t & n | i & ~n, e, t, s, a, o)
                }, md5_hh: function (e, t, i, n, s, a, o) {
                    return this.md5_cmn(t ^ i ^ n, e, t, s, a, o)
                }, md5_ii: function (e, t, i, n, s, a, o) {
                    return this.md5_cmn(i ^ (t | ~n), e, t, s, a, o)
                }, core_hmac_md5: function (e, t) {
                    var i = this.str2binl(e);
                    i.length > 16 && (i = core_md5(i, e.length * this.chrsz));
                    for (var n = Array(16), s = Array(16), a = 0; a < 16; a++)n[a] = 909522486 ^ i[a], s[a] = 1549556828 ^ i[a];
                    var o = this.core_md5(n.concat(this.str2binl(t)), 512 + t.length * this.chrsz);
                    return this.core_md5(s.concat(o), 640)
                }, safe_add: function (e, t) {
                    var i = (65535 & e) + (65535 & t);
                    return (e >> 16) + (t >> 16) + (i >> 16) << 16 | 65535 & i
                }, bit_rol: function (e, t) {
                    return e << t | e >>> 32 - t
                }, str2binl: function (e) {
                    for (var t = Array(), i = (1 << this.chrsz) - 1, n = 0; n < e.length * this.chrsz; n += this.chrsz)t[n >> 5] |= (e.charCodeAt(n / this.chrsz) & i) << n % 32;
                    return t
                }, binl2hex: function (e) {
                    for (var t = this.hexcase ? "0123456789ABCDEF" : "0123456789abcdef", i = "", n = 0; n < 4 * e.length; n++)i += t.charAt(e[n >> 2] >> n % 4 * 8 + 4 & 15) + t.charAt(e[n >> 2] >> n % 4 * 8 & 15);
                    return i
                }, binl2b64: function (e) {
                    for (var t = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/", i = "", n = 0; n < 4 * e.length; n += 3)for (var s = (e[n >> 2] >> n % 4 * 8 & 255) << 16 | (e[n + 1 >> 2] >> (n + 1) % 4 * 8 & 255) << 8 | e[n + 2 >> 2] >> (n + 2) % 4 * 8 & 255, a = 0; a < 4; a++)8 * n + 6 * a > 32 * e.length ? i += this.b64pad : i += t.charAt(s >> 6 * (3 - a) & 63);
                    return i
                }
            };
            e.default = t
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(2), i(0), i(4), i(1), i(3), i(6)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o) {
            "use strict";
            function r(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var u = r(t), l = r(i), d = r(n), h = r(s), c = r(a), f = r(o), v = function (e) {
                function t(e, i, n) {
                    (0, l.default)(this, t);
                    var s = (0, d.default)(this, (t.__proto__ || (0, u.default)(t)).call(this, e, i, n));
                    return s.timeend = n.timeend, s.timenow = n.timenow, s.timeShiftOffset = n.timeShiftOffset, s.fixErrorEndTime(), s.timemax = s.timenow - n.timestart, s.timerange = s.timeend - n.timestart, s.timestart = n.timestart, s.timecurrent = s.timemax, s.timeShiftOffset >= 0 && (s.timecurrent = s.timeShiftOffset || 0), s.timeoffset = 0, s.timeDiff = 1e3 * s.timenow - Date.now(), s.width = s.selector.clientWidth - 72, s.moved = 0, s.timelog = 0, s.getElem(), s.domEvent(), s.progressUpdate(), s
                }

                return (0, c.default)(t, e), (0, h.default)(t, null, [{
                    key: "tmFormat", value: function (e) {
                        e = parseInt(1e3 * e);
                        var t = new Date(e), i = t.getMonth() + 1;
                        i = i < 10 ? "0" + i : i;
                        var n = t.getHours(), s = t.getMinutes(), a = t.getSeconds(), o = t.getDate();
                        return o = o < 10 ? "0" + o : o, n = n < 10 ? "0" + n : n, s = s < 10 ? "0" + s : s, a = a < 10 ? "0" + a : a, t.getFullYear() + "" + i + o + n + s + a
                    }
                }]), (0, h.default)(t, [{
                    key: "fixErrorEndTime", value: function () {
                        this.timenow >= this.timeend && (this.timeend = this.timenow)
                    }
                }, {
                    key: "setUp", value: function () {
                        this.dom = document.querySelector(".tlcomponent")
                    }
                }, {
                    key: "getElem", value: function () {
                        this.loaded = this.dom.querySelector(".tlload"), this.played = this.dom.querySelector(".tlplay"), this.current = this.dom.querySelector(".tlpoint"), this.tip = this.dom.querySelector(".tltip")
                    }
                }, {
                    key: "domHover", value: function () {
                        clearTimeout(this.hoverTimer), this.addClass(this.dom, "tlhover")
                    }
                }, {
                    key: "domLeave", value: function () {
                        var e = this;
                        this.hoverTimer = setTimeout(function () {
                            return e.removeClass(e.dom, "tlhover")
                        }, 1e3)
                    }
                }, {
                    key: "domClick", value: function (e) {
                        clearTimeout(this.hoverTimer), this.width = this.selector.clientWidth - 72, this.moved = e.offsetX, this.current.style.left = this.moved / this.width * 100 + "%", this.calcuUp("click")
                    }
                }, {
                    key: "domEvent", value: function () {
                        var e = this;
                        this.mouse_down = function (t) {
                            return e.onMouseDown(t)
                        }, this.mouse_move = function (t) {
                            return e.onMouseMove(t)
                        }, this.mouse_up = function (t) {
                            return e.onMouseUp(t)
                        }, this.dom.addEventListener("mousedown", this.mouse_down, !1), this.played.addEventListener("mouseenter", function (t) {
                            return e.domHover(t)
                        }), this.loaded.addEventListener("mouseenter", function (t) {
                            return e.domHover(t)
                        }), this.played.addEventListener("click", function (t) {
                            return e.domClick(t)
                        }), this.loaded.addEventListener("click", function (t) {
                            return e.domClick(t)
                        }), this.played.addEventListener("mouseleave", function (t) {
                            return e.domLeave(t)
                        }), this.loaded.addEventListener("mouseleave", function (t) {
                            return e.domLeave(t)
                        }), this.tip.addEventListener("click", function (t) {
                            e.EventManager.fire("tl:back"), e.reset()
                        })
                    }
                }, {
                    key: "progressUpdate", value: function () {
                        this.width = this.selector.clientWidth - 72, this.distance = this.timemax / this.timerange * this.width, this.distance = this.distance >= this.wdith ? this.width : this.distance, this.loaded.style.width = this.distance / this.width * 100 + "%", this.tip.style.left = this.distance / this.width * 100 + "%", this.currentDistance = this.timecurrent / this.timerange * this.width, this.currentDistance = this.currentDistance >= this.wdith ? this.width : this.currentDistance, this.played.style.width = this.currentDistance / this.width * 100 + "%", this.current.style.left = this.currentDistance / this.width * 100 + "%"
                    }
                }, {
                    key: "setUserSchedule", value: function () {
                    }
                }, {
                    key: "updateMax", value: function (e) {
                        if (!this.isTouching) {
                            this.getServerTime() >= this.timeend && (this.timerange = this.getServerTime() - this.timestart);
                            var t = parseFloat((e - this.timelog).toFixed(5));
                            t >= 1 ? this.timelog = e : t < 0 ? this.timelog = 0 : (this.timemax += t, this.timecurrent += t, this.progressUpdate(), this.timelog = e)
                        }
                    }
                }, {
                    key: "onMouseDown", value: function (e) {
                        e.preventDefault(), this.isTouching = !0, this.startX = e.clientX, document.addEventListener("mousemove", this.mouse_move, !1), document.addEventListener("mouseup", this.mouse_up, !1)
                    }
                }, {
                    key: "calculation", value: function (e) {
                        this.width = this.selector.clientWidth - 72, this.clientX = e, this.moved = this.currentDistance + (e - (this.startX || 0)), this.moved = this.correct(this.moved, 0, this.timemax / this.timerange * this.width), this.current.style.left = this.moved / this.width * 100 + "%"
                    }
                }, {
                    key: "onMouseMove", value: function (e) {
                        if (this.isTouching) {
                            if (e.preventDefault(), e.stopPropagation(), !this.startX)return;
                            this.calculation(e.clientX)
                        }
                    }
                }, {
                    key: "correct", value: function (e, t, i) {
                        return e < t && (e = t), e > i && (e = i), e
                    }
                }, {
                    key: "calcuUp", value: function (e) {
                        this.width = this.selector.clientWidth - 72;
                        var t = this.correct(Math.floor(this.moved / this.width * this.timerange), 0, this.timemax);
                        Math.abs(this.timecurrent - t) < 9 || (this.timecurrent = t, this.currentDistance = this.moved, this.calcuClick(e))
                    }
                }, {
                    key: "calcuClick", value: function (e) {
                        var t = this.getPlayCurrent();
                        if (this.progressUpdate(), t && !isNaN(t)) {
                            this.getServerTime() - t < 60 ? (this.EventManager.fire("tl:back"), this.reset()) : (this.EventManager.fire("tl:update", {handler: e}), this.tip.style.display = "block")
                        }
                    }
                }, {
                    key: "setPlayCurrent", value: function (e) {
                        this.timecurrent = e + 5
                    }
                }, {
                    key: "getPlayCurrent", value: function () {
                        return this.timestart + this.timecurrent
                    }
                }, {
                    key: "getTimePlayTime", value: function () {
                        var e = this.getPlayCurrent();
                        return !e || isNaN(e) ? "" : {format: t.tmFormat(e), time: e}
                    }
                }, {
                    key: "getServerTime", value: function () {
                        return Math.floor((Date.now() + this.timeDiff) / 1e3)
                    }
                }, {
                    key: "onMouseUp", value: function (e) {
                        this.isTouching = !1, document.removeEventListener("mousemove", this.mouse_move, !1), document.removeEventListener("mouseup", this.mouse_up, !1), this.calculation(e.clientX), this.calcuUp("drag")
                    }
                }, {
                    key: "reset", value: function () {
                        this.width = this.selector.clientWidth - 72, this.tip.style.display = "none", this.timecurrent = this.timemax, this.current.style.left = this.distance / this.width * 100 + "%", this.played.style.width = this.distance / this.width * 100 + "%"
                    }
                }]), t
            }(f.default);
            e.default = v
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(0), i(1), i(60)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n) {
            "use strict";
            function s(e) {
                return e && e.__esModule ? e : {default: e}
            }

            function a(e) {
            }

            function o(e) {
                for (var t = [], i = [], n = [], s = 0; s <= 30; ++s)for (var a = 0; a <= 50; ++a) {
                    var o = s * Math.PI / 30, r = 2 * a * Math.PI / 50 + Math.PI / 2, u = Math.sin(o), l = Math.sin(r), d = Math.cos(o), h = Math.cos(r), c = h * u, f = d, v = l * u, p = a / 50, m = s / 30;
                    i.push(p), i.push(m), t.push(10 * c), t.push(10 * f), t.push(10 * v)
                }
                for (var y = 0; y < 30; ++y)for (var _ = 0; _ < 50; ++_) {
                    var g = 51 * y + _, k = g + 50 + 1;
                    n.push(g), n.push(k), n.push(g + 1), n.push(k), n.push(k + 1), n.push(g + 1)
                }
                var E = e.createBuffer();
                e.bindBuffer(e.ARRAY_BUFFER, E), e.bufferData(e.ARRAY_BUFFER, new Float32Array(t), e.STATIC_DRAW);
                var A = e.createBuffer();
                e.bindBuffer(e.ARRAY_BUFFER, A), e.bufferData(e.ARRAY_BUFFER, new Float32Array(i), e.STATIC_DRAW);
                var T = e.createBuffer();
                return e.bindBuffer(e.ELEMENT_ARRAY_BUFFER, T), e.bufferData(e.ELEMENT_ARRAY_BUFFER, new Uint16Array(n), e.STREAM_DRAW), {
                    vbPos: E,
                    vbTex: A,
                    ibo: T,
                    iCnt: n.length
                }
            }

            function r(e, t) {
                return [e[0] * t[0] + e[4] * t[1] + e[8] * t[2] + e[12] * t[3], e[1] * t[0] + e[5] * t[1] + e[9] * t[2] + e[13] * t[3], e[2] * t[0] + e[6] * t[1] + e[10] * t[2] + e[14] * t[3], e[3] * t[0] + e[7] * t[1] + e[11] * t[2] + e[15] * t[3], e[0] * t[4] + e[4] * t[5] + e[8] * t[6] + e[12] * t[7], e[1] * t[4] + e[5] * t[5] + e[9] * t[6] + e[13] * t[7], e[2] * t[4] + e[6] * t[5] + e[10] * t[6] + e[14] * t[7], e[3] * t[4] + e[7] * t[5] + e[11] * t[6] + e[15] * t[7], e[0] * t[8] + e[4] * t[9] + e[8] * t[10] + e[12] * t[11], e[1] * t[8] + e[5] * t[9] + e[9] * t[10] + e[13] * t[11], e[2] * t[8] + e[6] * t[9] + e[10] * t[10] + e[14] * t[11], e[3] * t[8] + e[7] * t[9] + e[11] * t[10] + e[15] * t[11], e[0] * t[12] + e[4] * t[13] + e[8] * t[14] + e[12] * t[15], e[1] * t[12] + e[5] * t[13] + e[9] * t[14] + e[13] * t[15], e[2] * t[12] + e[6] * t[13] + e[10] * t[14] + e[14] * t[15], e[3] * t[12] + e[7] * t[13] + e[11] * t[14] + e[15] * t[15]]
            }

            function u(e, t, i) {
                var n = Math.cos(e), s = Math.sin(e), a = Math.cos(t), o = Math.sin(t), r = Math.cos(i), u = Math.sin(i), l = s * o, d = n * o;
                return [a * r, l * r - n * u, d * r + s * u, 0, a * u, l * u + n * r, d * u - s * r, 0, -o, s * a, n * a, 0, 0, 0, 0, 1]
            }

            function l(e, t, i, n) {
                var s = Math.tan(e * Math.PI / 360) * i, a = -s, o = t * a, r = t * s;
                return [2 * i / (r - o), 0, 0, 0, 0, 2 * i / (s - a), 0, 0, (r + o) / (r - o), (s + a) / (s - a), -(n + i) / (n - i), -1, 0, 0, -2 * n * i / (n - i), 0]
            }

            Object.defineProperty(e, "__esModule", {value: !0}), e.VR_MODE_SPHERE = e.VR_MODE_NONE = void 0;
            var d = s(t), h = s(i), c = s(n), f = (e.VR_MODE_NONE = 0, e.VR_MODE_SPHERE = 1, window.navigator.userAgent.toLowerCase()), v = /(msie) ([\w.]+)/.test(f) || /trident.*(rv)(?::| )([\w.]+)/.test(f), p = /(iphone)/.test(f) || /(ipad)/.test(f), m = /(android)/.test(f), y = p || m, _ = !0, g = function () {
                function e(t) {
                    (0, d.default)(this, e), this.cb = t
                }

                return (0, h.default)(e, [{
                    key: "buildMVP", value: function () {
                        this.matMVP = r(l(this.lookFov, this.lookRate, 1, 20), u(this.lookPitch, this.lookYaw, 0))
                    }
                }, {
                    key: "setLookParam", value: function (e, t, i) {
                        var n = 2 * Math.PI;
                        e > n && (e -= n), e < 0 && (e += n);
                        var s = Math.PI / 2 - .1;
                        t > s && (t = s), t < -s && (t = -s);
                        i > 120 ? i = 120 : i < 40 && (i = 40), this.lookYaw = e, this.lookPitch = t, this.lookFov = i, this.buildMVP()
                    }
                }, {
                    key: "onUserInput", value: function (e) {
                        var t = e.deltaX || 0, i = e.deltaY || 0, n = e.deltaFov || 0;
                        this.setLookParam(this.lookYaw + .02 * t, this.lookPitch + .02 * i, this.lookFov + .02 * n), _ && Math.abs(t) + Math.abs(i) > 10 && (_ = !1, sessionStorage.setItem("youku_vr_tip_show", "1"))
                    }
                }, {
                    key: "initGL", value: function () {
                        function e() {
                            var t = c.video, n = Date.now();
                            if (t.readyState >= t.HAVE_CURRENT_DATA && n >= c.nextTexTime && 0 !== t.videoWidth) {
                                if (!c.texId) {
                                    var s = c.texId = i.createTexture();
                                    i.activeTexture(i.TEXTURE0), i.bindTexture(i.TEXTURE_2D, s), i.texParameteri(i.TEXTURE_2D, i.TEXTURE_MAG_FILTER, i.LINEAR), i.texParameteri(i.TEXTURE_2D, i.TEXTURE_MIN_FILTER, i.LINEAR), i.texParameteri(i.TEXTURE_2D, i.TEXTURE_WRAP_S, i.CLAMP_TO_EDGE), i.texParameteri(i.TEXTURE_2D, i.TEXTURE_WRAP_T, i.CLAMP_TO_EDGE)
                                }
                                var o = t;
                                1 === v && (c.canvas2D || (c.canvas2D = document.createElement("canvas"), c.canvas2D.width = (t.videoWidth || 1280) / p, c.canvas2D.height = (t.videoHeight || 720) / p, c.canvas2D.setAttribute("crossorigin", "anonymous"), c.ctx2D = c.canvas2D.getContext("2d")), c.ctx2D.drawImage(t, 0, 0, t.videoWidth, t.videoHeight, 0, 0, c.canvas2D.width, c.canvas2D.height), o = c.canvas2D);
                                try {
                                    i.texImage2D(i.TEXTURE_2D, 0, i.RGBA, i.RGBA, i.UNSIGNED_BYTE, o)
                                } catch (e) {
                                    return c.requestId = 0, c.releaseVR(), c.cb && c.cb(), c.showMsg("浏览器不支持全景视频，切换回普通视频", 5), void a("texImage2D Fail:" + e.message)
                                }
                                c.nextTexTime = n + 1e3 / 30
                            }
                            c.texId && (i.useProgram(r), i.uniformMatrix4fv(d, !1, c.matMVP), i.enableVertexAttribArray(0), i.enableVertexAttribArray(1), i.bindBuffer(i.ARRAY_BUFFER, h.vbPos), i.vertexAttribPointer(0, 3, i.FLOAT, !1, 0, 0), i.bindBuffer(i.ARRAY_BUFFER, h.vbTex), i.vertexAttribPointer(1, 2, i.FLOAT, !1, 0, 0), i.bindBuffer(i.ELEMENT_ARRAY_BUFFER, h.ibo), i.activeTexture(i.TEXTURE0), i.bindTexture(i.TEXTURE_2D, c.texId), i.drawElements(i.TRIANGLES, h.iCnt, i.UNSIGNED_SHORT, 0));
                            var u = i.getError();
                            0 !== u && console.log("gl error:".concat(u)), c.requestId = requestAnimationFrame(e)
                        }

                        if (this.canvas && !this.ctx) {
                            var t = this.canvas, i = t.getContext("webgl") || t.getContext("experimental-webgl");
                            if (!i)return null;
                            var n = i.createShader(i.VERTEX_SHADER);
                            i.shaderSource(n, "uniform mat4 u_MatMVP;attribute vec4 vTex;attribute vec4 vPos;varying vec2 vt;void main(){gl_Position=u_MatMVP*vPos;vt=vTex.st;}"), i.compileShader(n);
                            var s = i.createShader(i.FRAGMENT_SHADER);
                            i.shaderSource(s, "precision mediump float; uniform sampler2D s;varying vec2 vt;void main(){vec2 t=vt.st; gl_FragColor=texture2D(s,t);}"), i.compileShader(s);
                            var r = i.createProgram();
                            i.attachShader(r, n), i.attachShader(r, s);
                            for (var u = ["vPos", "vTex"], l = 0; l < u.length; ++l)i.bindAttribLocation(r, l, u[l]);
                            i.linkProgram(r), i.useProgram(r);
                            var d = i.getUniformLocation(r, "u_MatMVP");
                            i.disable(i.DEPTH_TEST), i.disable(i.BLEND), i.clearColor(.2, .2, 0, 1), i.clear(i.COLOR_BUFFER_BIT);
                            var h = o(i), c = this;
                            this.ctx = i, this.texId = 0, this.meshInfo = h, this.uMatMVP = d;
                            var f = this.video;
                            c.lookRate = c.canvas.clientWidth / c.canvas.clientHeight, c.lookYaw = 0, c.lookPitch = 0, c.lookFov = 60, c.buildMVP(), window.addEventListener("resize", function () {
                                c.lookRate = c.canvas.clientWidth / c.canvas.clientHeight, c.buildMVP()
                            }, !1);
                            var v = y ? 1 : 0, p = window.devicePixelRatio || 1;
                            f.width || (f.width = 1280 / p, f.height = 720 / p), c.nextTexTime = Date.now(), e(), t.addEventListener("webglcontextlost", function () {
                                c.releaseVR(), c.showMsg("WebGL错误，切换回普通视频", 5)
                            }, !1)
                        }
                    }
                }, {
                    key: "releaseVR", value: function () {
                        this.canvas && (this.container.replaceChild(this.video, this.canvas), this.canvas = null), this.requestId && (cancelAnimationFrame(this.requestId), this.requestId = 0)
                    }
                }, {
                    key: "init", value: function (t, i) {
                        var n = this;
                        if (this.evtElement = i, this.video === t)return this.canvas;
                        var s = this.container = t.parentNode;
                        if (!s)return null;
                        if (this.video = t, !e.isSupport())return i && this.showMsg("浏览器不支持全景视频，切换回普通视频", 5), null;
                        var o = document.createElement("canvas");
                        if (o.style.width = "100%", o.style.height = "100%", s.replaceChild(o, t), y && (t.setAttribute("x5-video-player-type", "h5"), t.setAttribute("x5-video-player-fullscreen", "false"), t.setAttribute("playsinline", !0), t.setAttribute("webkit-playsinline", !0), t.setAttribute("crossorigin", "anonymous")), this.canvas = o, this.initGL(), !this.requestId)return s.replaceChild(t, o), a("create gl fail"), null;
                        i && (this.gest = new c.default(i), i.addEventListener("drag", function (e) {
                            n.onUserInput(e.lgdata)
                        }, !1), i.addEventListener("wheel", function (e) {
                            e.preventDefault(), n.onUserInput({deltaFov: e.deltaY})
                        })), sessionStorage && sessionStorage.getItem ? (_ = !sessionStorage.getItem("youku_vr_tip_show")) && this.showMsg("开启全景模式<br>拖到屏幕可以调整视角!", 5) : _ = !1
                    }
                }, {
                    key: "switchVideo", value: function (e) {
                        if (this.video === e)return this.canvas;
                        this.video = e
                    }
                }, {
                    key: "showMsg", value: function (e, t) {
                        var i = this;
                        if (this.destroyMsg(), this.evtElement) {
                            var n = document.createElement("div");
                            n.style.position = "absolute", n.style.left = "50%", n.style.top = "35%", n.style.color = "rgb(255, 255, 255)", n.style.fontSize = "22px", n.style.zIndex = "9999", n.style.opacity = "0.7", n.style.pointerEvents = "none";
                            var s = document.createElement("div");
                            s.style.position = "relative", s.style.left = "-50%", s.style.top = "-25px", s.style.lineHeight = "110%", s.style.textShadow = "rgb(0, 0, 0) 1px 1px 2px", n.appendChild(s);
                            var a = document.createElement("center");
                            a.style.display = "block", a.style.textAlign = "center", s.appendChild(a), a.innerHTML = e, this.divMsg = n, this.evtElement.appendChild(n);
                            var o = this;
                            t && t > 0 && setTimeout(function () {
                                o.divMsg === n && i.destroyMsg()
                            }, 1e3 * t)
                        }
                    }
                }, {
                    key: "destroyMsg", value: function () {
                        var e = this.divMsg;
                        e && e.parentNode && e.parentNode.removeChild(e), this.divMsg = void 0
                    }
                }], [{
                    key: "isSupport", value: function () {
                        return !v && !!window.WebGLRenderingContext
                    }
                }]), e
            }();
            e.default = g
        })
    }, function (e, t, i) {
        var n, s, a;
        !function (o, r) {
            s = [t, i(2), i(0), i(1), i(4), i(3), i(6)], n = r, void 0 !== (a = "function" == typeof n ? n.apply(t, s) : n) && (e.exports = a)
        }(0, function (e, t, i, n, s, a, o) {
            "use strict";
            function r(e) {
                return e && e.__esModule ? e : {default: e}
            }

            Object.defineProperty(e, "__esModule", {value: !0});
            var u = r(t), l = r(i), d = r(n), h = r(s), c = r(a), f = r(o), v = function (e) {
                function t() {
                    return (0, l.default)(this, t), (0, h.default)(this, (t.__proto__ || (0, u.default)(t)).apply(this, arguments))
                }

                return (0, c.default)(t, e), (0, d.default)(t, [{
                    key: "setUp", value: function (e) {
                        this.current = 0;
                        var t = e[0].qualitiesList, i = e[1], n = e[0].qualityMap, s = e[0].selection;
                        this.dom = this.selector.querySelector(".live_icon_quality"), this.domEvent(), this.change(t, i, n, s)
                    }
                }, {
                    key: "checkForOrder", value: function () {
                    }
                }, {
                    key: "checkForLive", value: function () {
                    }
                }, {
                    key: "change", value: function (e, t, i, n) {
                        var s = this;
                        this.qualityUl.innerHTML = "";
                        var a = "";
                        e.forEach(function (e, o) {
                            var r = "", u = i[e];
                            e == t && (s.current = o, r = "current", s.qualityBtn.innerHTML = n[o]), a += '<li data-type="' + e + '" class="' + r + '">' + u + "</li>"
                        }), this.qualityUl.innerHTML = a, this.delegate(n)
                    }
                }, {
                    key: "delegate", value: function (e) {
                        var t = this;
                        this.quality_li = this.dom.querySelectorAll("li");
                        for (var i = function (i) {
                            t.panelHide(), i != t.current && (t.qualityBtn.innerHTML = e[i], t.toggleStyle(i), t.EventManager.fire("quality:change", {type: t.quality_li[i].getAttribute("data-type")}))
                        }, n = this.quality_li.length; n--;)this.quality_li[n].addEventListener("click", i.bind(this, n), !1)
                    }
                }, {
                    key: "toggleStyle", value: function (e) {
                        this.removeClass(this.quality_li[this.current], "current"), this.addClass(this.quality_li[e], "current"), this.panelHide(), this.current = e
                    }
                }, {
                    key: "qualityShowEvent", value: function () {
                        this.panelState() ? this.panelHide() : this.panelShow()
                    }
                }, {
                    key: "domEvent", value: function () {
                        this.qualityBtn = this.dom.querySelector("span"), this.qualityPanel = this.dom.querySelector(".live_panel_quality"), this.qualityUl = this.dom.querySelector(".live_quality_ul"), this.qualityBtn.addEventListener("click", this.qualityShowEvent.bind(this), !1)
                    }
                }, {
                    key: "panelState", value: function () {
                        return "block" == this.qualityPanel.style.display
                    }
                }, {
                    key: "panelShow", value: function () {
                        this.qualityPanel.style.display = "block"
                    }
                }, {
                    key: "panelHide", value: function () {
                        this.qualityPanel.style.display = "none"
                    }
                }]), t
            }(f.default);
            e.default = v
        })
    }, function (e, t, i) {
        e.exports = {default: i(124), __esModule: !0}
    }, function (e, t, i) {
        e.exports = {default: i(126), __esModule: !0}
    }, function (e, t, i) {
        e.exports = {default: i(127), __esModule: !0}
    }, function (e, t, i) {
        e.exports = {default: i(129), __esModule: !0}
    }, function (e, t, i) {
        e.exports = {default: i(130), __esModule: !0}
    }, function (e, t, i) {
        e.exports = {default: i(132), __esModule: !0}
    }, function (e, t, i) {
        e.exports = {default: i(133), __esModule: !0}
    }, function (e, t, i) {
        e.exports = {default: i(134), __esModule: !0}
    }, function (e, t, i) {
        var n = i(168);
        e.exports = function (e, t, i) {
            for (var s = i ? e : e.parentNode; s && s !== document;) {
                if (n(s, t))return s;
                s = s.parentNode
            }
        }
    }, function (e, t) {
        function i() {
            n = window.addEventListener ? "addEventListener" : "attachEvent", s = window.removeEventListener ? "removeEventListener" : "detachEvent", a = "addEventListener" !== n ? "on" : ""
        }

        var n, s, a;
        t.bind = function (e, t, s, o) {
            return n || i(), e[n](a + t, s, o || !1), s
        }, t.unbind = function (e, t, n, o) {
            return s || i(), e[s](a + t, n, o || !1), n
        }
    }, function (e, t, i) {
        i(79), i(78), e.exports = i(152)
    }, function (e, t, i) {
        var n = i(7), s = n.JSON || (n.JSON = {stringify: JSON.stringify});
        e.exports = function (e) {
            return s.stringify.apply(s, arguments)
        }
    }, function (e, t, i) {
        i(154), e.exports = i(7).Object.assign
    }, function (e, t, i) {
        i(155);
        var n = i(7).Object;
        e.exports = function (e, t) {
            return n.create(e, t)
        }
    }, function (e, t, i) {
        i(156);
        var n = i(7).Object;
        e.exports = function (e, t, i) {
            return n.defineProperty(e, t, i)
        }
    }, function (e, t, i) {
        i(157), e.exports = i(7).Object.freeze
    }, function (e, t, i) {
        i(158);
        var n = i(7).Object;
        e.exports = function (e, t) {
            return n.getOwnPropertyDescriptor(e, t)
        }
    }, function (e, t, i) {
        i(159), e.exports = i(7).Object.getPrototypeOf
    }, function (e, t, i) {
        i(160), e.exports = i(7).Object.setPrototypeOf
    }, function (e, t, i) {
        i(162), i(161), i(163), i(164), e.exports = i(7).Symbol
    }, function (e, t, i) {
        i(78), i(79), e.exports = i(50).f("iterator")
    }, function (e, t) {
        e.exports = function (e) {
            if ("function" != typeof e)throw TypeError(e + " is not a function!");
            return e
        }
    }, function (e, t) {
        e.exports = function () {
        }
    }, function (e, t, i) {
        var n = i(18), s = i(150), a = i(149);
        e.exports = function (e) {
            return function (t, i, o) {
                var r, u = n(t), l = s(u.length), d = a(o, l);
                if (e && i != i) {
                    for (; l > d;)if ((r = u[d++]) != r)return !0
                } else for (; l > d; d++)if ((e || d in u) && u[d] === i)return e || d || 0;
                return !e && -1
            }
        }
    }, function (e, t, i) {
        var n = i(36), s = i(11)("toStringTag"), a = "Arguments" == n(function () {
                return arguments
            }()), o = function (e, t) {
            try {
                return e[t]
            } catch (e) {
            }
        };
        e.exports = function (e) {
            var t, i, r;
            return void 0 === e ? "Undefined" : null === e ? "Null" : "string" == typeof(i = o(t = Object(e), s)) ? i : a ? n(t) : "Object" == (r = n(t)) && "function" == typeof t.callee ? "Arguments" : r
        }
    }, function (e, t, i) {
        var n = i(29), s = i(41), a = i(30);
        e.exports = function (e) {
            var t = n(e), i = s.f;
            if (i)for (var o, r = i(e), u = a.f, l = 0; r.length > l;)u.call(e, o = r[l++]) && t.push(o);
            return t
        }
    }, function (e, t, i) {
        var n = i(10).document;
        e.exports = n && n.documentElement
    }, function (e, t, i) {
        var n = i(36);
        e.exports = Array.isArray || function (e) {
                return "Array" == n(e)
            }
    }, function (e, t, i) {
        "use strict";
        var n = i(39), s = i(31), a = i(43), o = {};
        i(21)(o, i(11)("iterator"), function () {
            return this
        }), e.exports = function (e, t, i) {
            e.prototype = n(o, {next: s(1, i)}), a(e, t + " Iterator")
        }
    }, function (e, t) {
        e.exports = function (e, t) {
            return {value: t, done: !!e}
        }
    }, function (e, t, i) {
        "use strict";
        var n = i(29), s = i(41), a = i(30), o = i(47), r = i(71), u = Object.assign;
        e.exports = !u || i(20)(function () {
            var e = {}, t = {}, i = Symbol(), n = "abcdefghijklmnopqrst";
            return e[i] = 7, n.split("").forEach(function (e) {
                t[e] = e
            }), 7 != u({}, e)[i] || Object.keys(u({}, t)).join("") != n
        }) ? function (e, t) {
            for (var i = o(e), u = arguments.length, l = 1, d = s.f, h = a.f; u > l;)for (var c, f = r(arguments[l++]), v = d ? n(f).concat(d(f)) : n(f), p = v.length, m = 0; p > m;)h.call(f, c = v[m++]) && (i[c] = f[c]);
            return i
        } : u
    }, function (e, t, i) {
        var n = i(17), s = i(19), a = i(29);
        e.exports = i(13) ? Object.defineProperties : function (e, t) {
            s(e);
            for (var i, o = a(t), r = o.length, u = 0; r > u;)n.f(e, i = o[u++], t[i]);
            return e
        }
    }, function (e, t, i) {
        var n = i(18), s = i(74).f, a = {}.toString, o = "object" == typeof window && window && Object.getOwnPropertyNames ? Object.getOwnPropertyNames(window) : [], r = function (e) {
            try {
                return s(e)
            } catch (e) {
                return o.slice()
            }
        };
        e.exports.f = function (e) {
            return o && "[object Window]" == a.call(e) ? r(e) : s(n(e))
        }
    }, function (e, t, i) {
        var n = i(16), s = i(19), a = function (e, t) {
            if (s(e), !n(t) && null !== t)throw TypeError(t + ": can't set as prototype!")
        };
        e.exports = {
            set: Object.setPrototypeOf || ("__proto__" in {} ? function (e, t, n) {
                try {
                    n = i(68)(Function.call, i(40).f(Object.prototype, "__proto__").set, 2), n(e, []), t = !(e instanceof Array)
                } catch (e) {
                    t = !0
                }
                return function (e, i) {
                    return a(e, i), t ? e.__proto__ = i : n(e, i), e
                }
            }({}, !1) : void 0), check: a
        }
    }, function (e, t, i) {
        var n = i(46), s = i(37);
        e.exports = function (e) {
            return function (t, i) {
                var a, o, r = String(s(t)), u = n(i), l = r.length;
                return u < 0 || u >= l ? e ? "" : void 0 : (a = r.charCodeAt(u), a < 55296 || a > 56319 || u + 1 === l || (o = r.charCodeAt(u + 1)) < 56320 || o > 57343 ? e ? r.charAt(u) : a : e ? r.slice(u, u + 2) : o - 56320 + (a - 55296 << 10) + 65536)
            }
        }
    }, function (e, t, i) {
        var n = i(46), s = Math.max, a = Math.min;
        e.exports = function (e, t) {
            return e = n(e), e < 0 ? s(e + t, 0) : a(e, t)
        }
    }, function (e, t, i) {
        var n = i(46), s = Math.min;
        e.exports = function (e) {
            return e > 0 ? s(n(e), 9007199254740991) : 0
        }
    }, function (e, t, i) {
        var n = i(138), s = i(11)("iterator"), a = i(27);
        e.exports = i(7).getIteratorMethod = function (e) {
            if (void 0 != e)return e[s] || e["@@iterator"] || a[n(e)]
        }
    }, function (e, t, i) {
        var n = i(19), s = i(151);
        e.exports = i(7).getIterator = function (e) {
            var t = s(e);
            if ("function" != typeof t)throw TypeError(e + " is not iterable!");
            return n(t.call(e))
        }
    }, function (e, t, i) {
        "use strict";
        var n = i(136), s = i(143), a = i(27), o = i(18);
        e.exports = i(72)(Array, "Array", function (e, t) {
            this._t = o(e), this._i = 0, this._k = t
        }, function () {
            var e = this._t, t = this._k, i = this._i++;
            return !e || i >= e.length ? (this._t = void 0, s(1)) : "keys" == t ? s(0, i) : "values" == t ? s(0, e[i]) : s(0, [i, e[i]])
        }, "values"), a.Arguments = a.Array, n("keys"), n("values"), n("entries")
    }, function (e, t, i) {
        var n = i(14);
        n(n.S + n.F, "Object", {assign: i(144)})
    }, function (e, t, i) {
        var n = i(14);
        n(n.S, "Object", {create: i(39)})
    }, function (e, t, i) {
        var n = i(14);
        n(n.S + n.F * !i(13), "Object", {defineProperty: i(17).f})
    }, function (e, t, i) {
        var n = i(16), s = i(73).onFreeze;
        i(42)("freeze", function (e) {
            return function (t) {
                return e && n(t) ? e(s(t)) : t
            }
        })
    }, function (e, t, i) {
        var n = i(18), s = i(40).f;
        i(42)("getOwnPropertyDescriptor", function () {
            return function (e, t) {
                return s(n(e), t)
            }
        })
    }, function (e, t, i) {
        var n = i(47), s = i(75);
        i(42)("getPrototypeOf", function () {
            return function (e) {
                return s(n(e))
            }
        })
    }, function (e, t, i) {
        var n = i(14);
        n(n.S, "Object", {setPrototypeOf: i(147).set})
    }, function (e, t) {
    }, function (e, t, i) {
        "use strict";
        var n = i(10), s = i(15), a = i(13), o = i(14), r = i(77), u = i(73).KEY, l = i(20), d = i(45), h = i(43), c = i(32), f = i(11), v = i(50), p = i(49), m = i(139), y = i(141), _ = i(19), g = i(16), k = i(18), E = i(48), A = i(31), T = i(39), b = i(146), w = i(40), S = i(17), P = i(29), L = w.f, I = S.f, x = b.f, C = n.Symbol, D = n.JSON, M = D && D.stringify, U = f("_hidden"), O = f("toPrimitive"), R = {}.propertyIsEnumerable, N = d("symbol-registry"), V = d("symbols"), F = d("op-symbols"), G = Object.prototype, H = "function" == typeof C, j = n.QObject, B = !j || !j.prototype || !j.prototype.findChild, q = a && l(function () {
            return 7 != T(I({}, "a", {
                    get: function () {
                        return I(this, "a", {value: 7}).a
                    }
                })).a
        }) ? function (e, t, i) {
            var n = L(G, t);
            n && delete G[t], I(e, t, i), n && e !== G && I(G, t, n)
        } : I, Y = function (e) {
            var t = V[e] = T(C.prototype);
            return t._k = e, t
        }, z = H && "symbol" == typeof C.iterator ? function (e) {
            return "symbol" == typeof e
        } : function (e) {
            return e instanceof C
        }, K = function (e, t, i) {
            return e === G && K(F, t, i), _(e), t = E(t, !0), _(i), s(V, t) ? (i.enumerable ? (s(e, U) && e[U][t] && (e[U][t] = !1), i = T(i, {enumerable: A(0, !1)})) : (s(e, U) || I(e, U, A(1, {})), e[U][t] = !0), q(e, t, i)) : I(e, t, i)
        }, W = function (e, t) {
            _(e);
            for (var i, n = m(t = k(t)), s = 0, a = n.length; a > s;)K(e, i = n[s++], t[i]);
            return e
        }, Q = function (e, t) {
            return void 0 === t ? T(e) : W(T(e), t)
        }, J = function (e) {
            var t = R.call(this, e = E(e, !0));
            return !(this === G && s(V, e) && !s(F, e)) && (!(t || !s(this, e) || !s(V, e) || s(this, U) && this[U][e]) || t)
        }, X = function (e, t) {
            if (e = k(e), t = E(t, !0), e !== G || !s(V, t) || s(F, t)) {
                var i = L(e, t);
                return !i || !s(V, t) || s(e, U) && e[U][t] || (i.enumerable = !0), i
            }
        }, Z = function (e) {
            for (var t, i = x(k(e)), n = [], a = 0; i.length > a;)s(V, t = i[a++]) || t == U || t == u || n.push(t);
            return n
        }, $ = function (e) {
            for (var t, i = e === G, n = x(i ? F : k(e)), a = [], o = 0; n.length > o;)!s(V, t = n[o++]) || i && !s(G, t) || a.push(V[t]);
            return a
        };
        H || (C = function () {
            if (this instanceof C)throw TypeError("Symbol is not a constructor!");
            var e = c(arguments.length > 0 ? arguments[0] : void 0), t = function (i) {
                this === G && t.call(F, i), s(this, U) && s(this[U], e) && (this[U][e] = !1), q(this, e, A(1, i))
            };
            return a && B && q(G, e, {configurable: !0, set: t}), Y(e)
        }, r(C.prototype, "toString", function () {
            return this._k
        }), w.f = X, S.f = K, i(74).f = b.f = Z, i(30).f = J, i(41).f = $, a && !i(28) && r(G, "propertyIsEnumerable", J, !0), v.f = function (e) {
            return Y(f(e))
        }), o(o.G + o.W + o.F * !H, {Symbol: C});
        for (var ee = "hasInstance,isConcatSpreadable,iterator,match,replace,search,species,split,toPrimitive,toStringTag,unscopables".split(","), te = 0; ee.length > te;)f(ee[te++]);
        for (var ie = P(f.store), ne = 0; ie.length > ne;)p(ie[ne++]);
        o(o.S + o.F * !H, "Symbol", {
            for: function (e) {
                return s(N, e += "") ? N[e] : N[e] = C(e)
            }, keyFor: function (e) {
                if (!z(e))throw TypeError(e + " is not a symbol!");
                for (var t in N)if (N[t] === e)return t
            }, useSetter: function () {
                B = !0
            }, useSimple: function () {
                B = !1
            }
        }), o(o.S + o.F * !H, "Object", {
            create: Q,
            defineProperty: K,
            defineProperties: W,
            getOwnPropertyDescriptor: X,
            getOwnPropertyNames: Z,
            getOwnPropertySymbols: $
        }), D && o(o.S + o.F * (!H || l(function () {
                var e = C();
                return "[null]" != M([e]) || "{}" != M({a: e}) || "{}" != M(Object(e))
            })), "JSON", {
            stringify: function (e) {
                for (var t, i, n = [e], s = 1; arguments.length > s;)n.push(arguments[s++]);
                if (i = t = n[1], (g(t) || void 0 !== e) && !z(e))return y(t) || (t = function (e, t) {
                    if ("function" == typeof i && (t = i.call(this, e, t)), !z(t))return t
                }), n[1] = t, M.apply(D, n)
            }
        }), C.prototype[O] || i(21)(C.prototype, O, C.prototype.valueOf), h(C, "Symbol"), h(Math, "Math", !0), h(n.JSON, "JSON", !0)
    }, function (e, t, i) {
        i(49)("asyncIterator")
    }, function (e, t, i) {
        i(49)("observable")
    }, function (e, t, i) {
        var n = i(122), s = i(123), a = ["focus", "blur"];
        t.bind = function (e, t, i, o, r) {
            return -1 !== a.indexOf(i) && (r = !0), s.bind(e, i, function (i) {
                var s = i.target || i.srcElement;
                i.delegateTarget = n(s, t, !0, e), i.delegateTarget && o.call(e, i)
            }, r)
        }, t.unbind = function (e, t, i, n) {
            -1 !== a.indexOf(t) && (n = !0), s.unbind(e, t, i, n)
        }
    }, , function (e, t) {
        "function" == typeof Object.create ? e.exports = function (e, t) {
            e.super_ = t, e.prototype = Object.create(t.prototype, {
                constructor: {
                    value: e,
                    enumerable: !1,
                    writable: !0,
                    configurable: !0
                }
            })
        } : e.exports = function (e, t) {
            e.super_ = t;
            var i = function () {
            };
            i.prototype = t.prototype, e.prototype = new i, e.prototype.constructor = e
        }
    }, function (e, t) {
        function i(e, t) {
            if (s)return s.call(e, t);
            for (var i = e.parentNode.querySelectorAll(t), n = 0; n < i.length; ++n)if (i[n] == e)return !0;
            return !1
        }

        var n = Element.prototype, s = n.matchesSelector || n.webkitMatchesSelector || n.mozMatchesSelector || n.msMatchesSelector || n.oMatchesSelector;
        e.exports = i
    }, function (e, t) {
        function i() {
            throw new Error("setTimeout has not been defined")
        }

        function n() {
            throw new Error("clearTimeout has not been defined")
        }

        function s(e) {
            if (d === setTimeout)return setTimeout(e, 0);
            if ((d === i || !d) && setTimeout)return d = setTimeout, setTimeout(e, 0);
            try {
                return d(e, 0)
            } catch (t) {
                try {
                    return d.call(null, e, 0)
                } catch (t) {
                    return d.call(this, e, 0)
                }
            }
        }

        function a(e) {
            if (h === clearTimeout)return clearTimeout(e);
            if ((h === n || !h) && clearTimeout)return h = clearTimeout, clearTimeout(e);
            try {
                return h(e)
            } catch (t) {
                try {
                    return h.call(null, e)
                } catch (t) {
                    return h.call(this, e)
                }
            }
        }

        function o() {
            p && f && (p = !1, f.length ? v = f.concat(v) : m = -1, v.length && r())
        }

        function r() {
            if (!p) {
                var e = s(o);
                p = !0;
                for (var t = v.length; t;) {
                    for (f = v, v = []; ++m < t;)f && f[m].run();
                    m = -1, t = v.length
                }
                f = null, p = !1, a(e)
            }
        }

        function u(e, t) {
            this.fun = e, this.array = t
        }

        function l() {
        }

        var d, h, c = e.exports = {};
        !function () {
            try {
                d = "function" == typeof setTimeout ? setTimeout : i
            } catch (e) {
                d = i
            }
            try {
                h = "function" == typeof clearTimeout ? clearTimeout : n
            } catch (e) {
                h = n
            }
        }();
        var f, v = [], p = !1, m = -1;
        c.nextTick = function (e) {
            var t = new Array(arguments.length - 1);
            if (arguments.length > 1)for (var i = 1; i < arguments.length; i++)t[i - 1] = arguments[i];
            v.push(new u(e, t)), 1 !== v.length || p || s(r)
        }, u.prototype.run = function () {
            this.fun.apply(null, this.array)
        }, c.title = "browser", c.browser = !0, c.env = {}, c.argv = [], c.version = "", c.versions = {}, c.on = l, c.addListener = l, c.once = l, c.off = l, c.removeListener = l, c.removeAllListeners = l, c.emit = l, c.prependListener = l, c.prependOnceListener = l, c.listeners = function (e) {
            return []
        }, c.binding = function (e) {
            throw new Error("process.binding is not supported")
        }, c.cwd = function () {
            return "/"
        }, c.chdir = function (e) {
            throw new Error("process.chdir is not supported")
        }, c.umask = function () {
            return 0
        }
    }, function (e, t) {
        e.exports = function (e) {
            return e && "object" == typeof e && "function" == typeof e.copy && "function" == typeof e.fill && "function" == typeof e.readUInt8
        }
    }, function (e, t, i) {
        (function (e, n) {
            function s(e, i) {
                var n = {seen: [], stylize: o};
                return arguments.length >= 3 && (n.depth = arguments[2]), arguments.length >= 4 && (n.colors = arguments[3]), p(i) ? n.showHidden = i : i && t._extend(n, i), E(n.showHidden) && (n.showHidden = !1), E(n.depth) && (n.depth = 2), E(n.colors) && (n.colors = !1), E(n.customInspect) && (n.customInspect = !0), n.colors && (n.stylize = a), u(n, e, n.depth)
            }

            function a(e, t) {
                var i = s.styles[t];
                return i ? "[" + s.colors[i][0] + "m" + e + "[" + s.colors[i][1] + "m" : e
            }

            function o(e, t) {
                return e
            }

            function r(e) {
                var t = {};
                return e.forEach(function (e, i) {
                    t[e] = !0
                }), t
            }

            function u(e, i, n) {
                if (e.customInspect && i && S(i.inspect) && i.inspect !== t.inspect && (!i.constructor || i.constructor.prototype !== i)) {
                    var s = i.inspect(n, e);
                    return g(s) || (s = u(e, s, n)), s
                }
                var a = l(e, i);
                if (a)return a;
                var o = Object.keys(i), p = r(o);
                if (e.showHidden && (o = Object.getOwnPropertyNames(i)), w(i) && (o.indexOf("message") >= 0 || o.indexOf("description") >= 0))return d(i);
                if (0 === o.length) {
                    if (S(i)) {
                        var m = i.name ? ": " + i.name : "";
                        return e.stylize("[Function" + m + "]", "special")
                    }
                    if (A(i))return e.stylize(RegExp.prototype.toString.call(i), "regexp");
                    if (b(i))return e.stylize(Date.prototype.toString.call(i), "date");
                    if (w(i))return d(i)
                }
                var y = "", _ = !1, k = ["{", "}"];
                if (v(i) && (_ = !0, k = ["[", "]"]), S(i)) {
                    y = " [Function" + (i.name ? ": " + i.name : "") + "]"
                }
                if (A(i) && (y = " " + RegExp.prototype.toString.call(i)), b(i) && (y = " " + Date.prototype.toUTCString.call(i)), w(i) && (y = " " + d(i)), 0 === o.length && (!_ || 0 == i.length))return k[0] + y + k[1];
                if (n < 0)return A(i) ? e.stylize(RegExp.prototype.toString.call(i), "regexp") : e.stylize("[Object]", "special");
                e.seen.push(i);
                var E;
                return E = _ ? h(e, i, n, p, o) : o.map(function (t) {
                    return c(e, i, n, p, t, _)
                }), e.seen.pop(), f(E, y, k)
            }

            function l(e, t) {
                if (E(t))return e.stylize("undefined", "undefined");
                if (g(t)) {
                    var i = "'" + JSON.stringify(t).replace(/^"|"$/g, "").replace(/'/g, "\\'").replace(/\\"/g, '"') + "'";
                    return e.stylize(i, "string")
                }
                return _(t) ? e.stylize("" + t, "number") : p(t) ? e.stylize("" + t, "boolean") : m(t) ? e.stylize("null", "null") : void 0
            }

            function d(e) {
                return "[" + Error.prototype.toString.call(e) + "]"
            }

            function h(e, t, i, n, s) {
                for (var a = [], o = 0, r = t.length; o < r; ++o)C(t, String(o)) ? a.push(c(e, t, i, n, String(o), !0)) : a.push("");
                return s.forEach(function (s) {
                    s.match(/^\d+$/) || a.push(c(e, t, i, n, s, !0))
                }), a
            }

            function c(e, t, i, n, s, a) {
                var o, r, l;
                if (l = Object.getOwnPropertyDescriptor(t, s) || {value: t[s]}, l.get ? r = l.set ? e.stylize("[Getter/Setter]", "special") : e.stylize("[Getter]", "special") : l.set && (r = e.stylize("[Setter]", "special")), C(n, s) || (o = "[" + s + "]"), r || (e.seen.indexOf(l.value) < 0 ? (r = m(i) ? u(e, l.value, null) : u(e, l.value, i - 1), r.indexOf("\n") > -1 && (r = a ? r.split("\n").map(function (e) {
                        return "  " + e
                    }).join("\n").substr(2) : "\n" + r.split("\n").map(function (e) {
                        return "   " + e
                    }).join("\n"))) : r = e.stylize("[Circular]", "special")), E(o)) {
                    if (a && s.match(/^\d+$/))return r;
                    o = JSON.stringify("" + s), o.match(/^"([a-zA-Z_][a-zA-Z_0-9]*)"$/) ? (o = o.substr(1, o.length - 2), o = e.stylize(o, "name")) : (o = o.replace(/'/g, "\\'").replace(/\\"/g, '"').replace(/(^"|"$)/g, "'"), o = e.stylize(o, "string"))
                }
                return o + ": " + r
            }

            function f(e, t, i) {
                var n = 0;
                return e.reduce(function (e, t) {
                    return n++, t.indexOf("\n") >= 0 && n++, e + t.replace(/\u001b\[\d\d?m/g, "").length + 1
                }, 0) > 60 ? i[0] + ("" === t ? "" : t + "\n ") + " " + e.join(",\n  ") + " " + i[1] : i[0] + t + " " + e.join(", ") + " " + i[1]
            }

            function v(e) {
                return Array.isArray(e)
            }

            function p(e) {
                return "boolean" == typeof e
            }

            function m(e) {
                return null === e
            }

            function y(e) {
                return null == e
            }

            function _(e) {
                return "number" == typeof e
            }

            function g(e) {
                return "string" == typeof e
            }

            function k(e) {
                return "symbol" == typeof e
            }

            function E(e) {
                return void 0 === e
            }

            function A(e) {
                return T(e) && "[object RegExp]" === L(e)
            }

            function T(e) {
                return "object" == typeof e && null !== e
            }

            function b(e) {
                return T(e) && "[object Date]" === L(e)
            }

            function w(e) {
                return T(e) && ("[object Error]" === L(e) || e instanceof Error)
            }

            function S(e) {
                return "function" == typeof e
            }

            function P(e) {
                return null === e || "boolean" == typeof e || "number" == typeof e || "string" == typeof e || "symbol" == typeof e || void 0 === e
            }

            function L(e) {
                return Object.prototype.toString.call(e)
            }

            function I(e) {
                return e < 10 ? "0" + e.toString(10) : e.toString(10)
            }

            function x() {
                var e = new Date, t = [I(e.getHours()), I(e.getMinutes()), I(e.getSeconds())].join(":");
                return [e.getDate(), O[e.getMonth()], t].join(" ")
            }

            function C(e, t) {
                return Object.prototype.hasOwnProperty.call(e, t)
            }

            var D = /%[sdj%]/g;
            t.format = function (e) {
                if (!g(e)) {
                    for (var t = [], i = 0; i < arguments.length; i++)t.push(s(arguments[i]));
                    return t.join(" ")
                }
                for (var i = 1, n = arguments, a = n.length, o = String(e).replace(D, function (e) {
                    if ("%%" === e)return "%";
                    if (i >= a)return e;
                    switch (e) {
                        case"%s":
                            return String(n[i++]);
                        case"%d":
                            return Number(n[i++]);
                        case"%j":
                            try {
                                return JSON.stringify(n[i++])
                            } catch (e) {
                                return "[Circular]"
                            }
                        default:
                            return e
                    }
                }), r = n[i]; i < a; r = n[++i])m(r) || !T(r) ? o += " " + r : o += " " + s(r);
                return o
            }, t.deprecate = function (i, s) {
                function a() {
                    if (!o) {
                        if (n.throwDeprecation)throw new Error(s);
                        n.traceDeprecation ? console.trace(s) : console.error(s), o = !0
                    }
                    return i.apply(this, arguments)
                }

                if (E(e.process))return function () {
                    return t.deprecate(i, s).apply(this, arguments)
                };
                if (!0 === n.noDeprecation)return i;
                var o = !1;
                return a
            };
            var M, U = {};
            t.debuglog = function (e) {
                if (E(M) && (M = i.i({NODE_ENV: "production"}).NODE_DEBUG || ""), e = e.toUpperCase(), !U[e])if (new RegExp("\\b" + e + "\\b", "i").test(M)) {
                    var s = n.pid;
                    U[e] = function () {
                        var i = t.format.apply(t, arguments);
                        console.error("%s %d: %s", e, s, i)
                    }
                } else U[e] = function () {
                };
                return U[e]
            }, t.inspect = s, s.colors = {
                bold: [1, 22],
                italic: [3, 23],
                underline: [4, 24],
                inverse: [7, 27],
                white: [37, 39],
                grey: [90, 39],
                black: [30, 39],
                blue: [34, 39],
                cyan: [36, 39],
                green: [32, 39],
                magenta: [35, 39],
                red: [31, 39],
                yellow: [33, 39]
            }, s.styles = {
                special: "cyan",
                number: "yellow",
                boolean: "yellow",
                undefined: "grey",
                null: "bold",
                string: "green",
                date: "magenta",
                regexp: "red"
            }, t.isArray = v, t.isBoolean = p, t.isNull = m, t.isNullOrUndefined = y, t.isNumber = _, t.isString = g, t.isSymbol = k, t.isUndefined = E, t.isRegExp = A, t.isObject = T, t.isDate = b, t.isError = w, t.isFunction = S, t.isPrimitive = P, t.isBuffer = i(170);
            var O = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            t.log = function () {
                console.log("%s - %s", x(), t.format.apply(t, arguments))
            }, t.inherits = i(167), t._extend = function (e, t) {
                if (!t || !T(t))return e;
                for (var i = Object.keys(t), n = i.length; n--;)e[i[n]] = t[i[n]];
                return e
            }
        }).call(t, i(51), i(169))
    }])
});