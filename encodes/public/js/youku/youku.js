/**
 * Created by ricky007 on 2019/3/5.
 */
var liveInfoKey = 24679788;
var streamInfoKey = 23536927;

/**
 * 获取签名
 */
function getYoukuSignByLiveId(Token, Time, LiveId, Cna) {
    var AppKey;
    if (LiveId && LiveId.length > 0) {
        AppKey = streamInfoKey;
    } else {
        AppKey = liveInfoKey;
    }
    var Data = getYoukuRequestData(LiveId, Cna);
    return getYoukuSign(Token, Time, AppKey, Data);
}

/**
 * 获取签名
 */
function getYoukuSign(Token, Time, AppKey, Data) {
    var key = Token + "&" + Time + "&" + AppKey + "&" + Data;
    return generateYoukuSign(key);
}

function getYoukuCkey() {
    var e = window[window.UA_Opt.LogVal];
    return window.UA_Opt.Token = (new Date).getTime() + ":" + Math.random(), window.UA_Opt.reload && window.UA_Opt.reload(), this.ckey = e || this.ckey, this.ckey
}

/**
 * 获取签名
 */
function getYoukuRequestData(LiveId, Cna) {
    var data;
    if (LiveId && LiveId.length > 0) {
        // data = {"liveId": LiveId,"app":"H5"};
        // return"{\"liveId\":" + LiveId + ",\"app\":\"Pc\", \"ckey\":\""+getYoukuCkey()+"\"}";
        // data = '{"ccode":"live05010101","liveId":'+LiveId+',"app":"Pc","ckey":"'+getYoukuCkey()+'"}';
        data = {
            // "playAbilities": '{"decode_resolution_FPS":"1080p_50"}',
            "keyIndex":"web01",
            "encryptRClient": lib.mtop.config.encryptRClient,
            // "encryptRClient": "",
            "cna":Cna,
            "ccode":lib.mtop.config.ccode,
            // "ccode":"",
            "liveId":LiveId,
            // "ad":'"{\"site\":\"youku\",\"utdid\":\"\",\"aw\":\"w\",\"p\":1,\"vs\":\"1.0\",\"vc\":0,\"fu\":0,\"bt\":\"pc\",\"rst\":\"mp4\",\"dq\":0,\"isvert\":0,\"os\":\"win\",\"dvh\":290,\"dvw\":145,\"wintype\":\"h5\",\"ccode\":\"'+lib.mtop.config.ccode+'\",\"bf\":0,\"lid\":'+LiveId+'}"',
            // "ad":lib.mtop.config.ad,
            // "sceneId":0,
            // "reqQuality":0,
            // "utdid":"",
            "ckey":getYoukuCkey()
        };
    } else {
        data = {};
        // data = "{}";
    }
    return JSON.stringify(data);
    // return data;
}

/**
 * 根据key，获取cookie
 */
function getCookieItem(Key) {
    var b = new RegExp("(?:^|;\\s*)" + Key + "\\=([^;]+)(?:;\\s*|$)").exec(document.cookie);
    return b ? b[1] : void 0
}

/**
 * 签名方法
 */
function generateYoukuSign(a) {
    console.log("signKey", a);
    function b(a, b) {
        return a << b | a >>> 32 - b
    }

    function c(a, b) {
        var c, d, e, f, g;
        return e = 2147483648 & a, f = 2147483648 & b, c = 1073741824 & a, d = 1073741824 & b, g = (1073741823 & a) + (1073741823 & b), c & d ? 2147483648 ^ g ^ e ^ f : c | d ? 1073741824 & g ? 3221225472 ^ g ^ e ^ f : 1073741824 ^ g ^ e ^ f : g ^ e ^ f
    }

    function d(a, b, c) {
        return a & b | ~a & c
    }

    function e(a, b, c) {
        return a & c | b & ~c
    }

    function f(a, b, c) {
        return a ^ b ^ c
    }

    function g(a, b, c) {
        return b ^ (a | ~c)
    }

    function h(a, e, f, g, h, i, j) {
        return a = c(a, c(c(d(e, f, g), h), j)), c(b(a, i), e)
    }

    function i(a, d, f, g, h, i, j) {
        return a = c(a, c(c(e(d, f, g), h), j)), c(b(a, i), d)
    }

    function j(a, d, e, g, h, i, j) {
        return a = c(a, c(c(f(d, e, g), h), j)), c(b(a, i), d)
    }

    function k(a, d, e, f, h, i, j) {
        return a = c(a, c(c(g(d, e, f), h), j)), c(b(a, i), d)
    }

    function l(a) {
        for (var b, c = a.length, d = c + 8, e = (d - d % 64) / 64, f = 16 * (e + 1), g = new Array(f - 1), h = 0, i = 0; c > i;)b = (i - i % 4) / 4, h = i % 4 * 8, g[b] = g[b] | a.charCodeAt(i) << h, i++;
        return b = (i - i % 4) / 4, h = i % 4 * 8, g[b] = g[b] | 128 << h, g[f - 2] = c << 3, g[f - 1] = c >>> 29, g
    }

    function m(a) {
        var b, c, d = "", e = "";
        for (c = 0; 3 >= c; c++)b = a >>> 8 * c & 255, e = "0" + b.toString(16), d += e.substr(e.length - 2, 2);
        return d
    }

    function n(a) {
        a = a.replace(/\r\n/g, "\n");
        for (var b = "", c = 0; c < a.length; c++) {
            var d = a.charCodeAt(c);
            128 > d ? b += String.fromCharCode(d) : d > 127 && 2048 > d ? (b += String.fromCharCode(d >> 6 | 192), b += String.fromCharCode(63 & d | 128)) : (b += String.fromCharCode(d >> 12 | 224), b += String.fromCharCode(d >> 6 & 63 | 128), b += String.fromCharCode(63 & d | 128))
        }
        return b
    }

    var o, p, q, r, s, t, u, v, w, x = [], y = 7, z = 12, A = 17, B = 22, C = 5, D = 9, E = 14, F = 20, G = 4, H = 11, I = 16, J = 23, K = 6, L = 10, M = 15, N = 21;
    for (a = n(a), x = l(a), t = 1732584193, u = 4023233417, v = 2562383102, w = 271733878, o = 0; o < x.length; o += 16)p = t, q = u, r = v, s = w, t = h(t, u, v, w, x[o + 0], y, 3614090360), w = h(w, t, u, v, x[o + 1], z, 3905402710), v = h(v, w, t, u, x[o + 2], A, 606105819), u = h(u, v, w, t, x[o + 3], B, 3250441966), t = h(t, u, v, w, x[o + 4], y, 4118548399), w = h(w, t, u, v, x[o + 5], z, 1200080426), v = h(v, w, t, u, x[o + 6], A, 2821735955), u = h(u, v, w, t, x[o + 7], B, 4249261313), t = h(t, u, v, w, x[o + 8], y, 1770035416), w = h(w, t, u, v, x[o + 9], z, 2336552879), v = h(v, w, t, u, x[o + 10], A, 4294925233), u = h(u, v, w, t, x[o + 11], B, 2304563134), t = h(t, u, v, w, x[o + 12], y, 1804603682), w = h(w, t, u, v, x[o + 13], z, 4254626195), v = h(v, w, t, u, x[o + 14], A, 2792965006), u = h(u, v, w, t, x[o + 15], B, 1236535329), t = i(t, u, v, w, x[o + 1], C, 4129170786), w = i(w, t, u, v, x[o + 6], D, 3225465664), v = i(v, w, t, u, x[o + 11], E, 643717713), u = i(u, v, w, t, x[o + 0], F, 3921069994), t = i(t, u, v, w, x[o + 5], C, 3593408605), w = i(w, t, u, v, x[o + 10], D, 38016083), v = i(v, w, t, u, x[o + 15], E, 3634488961), u = i(u, v, w, t, x[o + 4], F, 3889429448), t = i(t, u, v, w, x[o + 9], C, 568446438), w = i(w, t, u, v, x[o + 14], D, 3275163606), v = i(v, w, t, u, x[o + 3], E, 4107603335), u = i(u, v, w, t, x[o + 8], F, 1163531501), t = i(t, u, v, w, x[o + 13], C, 2850285829), w = i(w, t, u, v, x[o + 2], D, 4243563512), v = i(v, w, t, u, x[o + 7], E, 1735328473), u = i(u, v, w, t, x[o + 12], F, 2368359562), t = j(t, u, v, w, x[o + 5], G, 4294588738), w = j(w, t, u, v, x[o + 8], H, 2272392833), v = j(v, w, t, u, x[o + 11], I, 1839030562), u = j(u, v, w, t, x[o + 14], J, 4259657740), t = j(t, u, v, w, x[o + 1], G, 2763975236), w = j(w, t, u, v, x[o + 4], H, 1272893353), v = j(v, w, t, u, x[o + 7], I, 4139469664), u = j(u, v, w, t, x[o + 10], J, 3200236656), t = j(t, u, v, w, x[o + 13], G, 681279174), w = j(w, t, u, v, x[o + 0], H, 3936430074), v = j(v, w, t, u, x[o + 3], I, 3572445317), u = j(u, v, w, t, x[o + 6], J, 76029189), t = j(t, u, v, w, x[o + 9], G, 3654602809), w = j(w, t, u, v, x[o + 12], H, 3873151461), v = j(v, w, t, u, x[o + 15], I, 530742520), u = j(u, v, w, t, x[o + 2], J, 3299628645), t = k(t, u, v, w, x[o + 0], K, 4096336452), w = k(w, t, u, v, x[o + 7], L, 1126891415), v = k(v, w, t, u, x[o + 14], M, 2878612391), u = k(u, v, w, t, x[o + 5], N, 4237533241), t = k(t, u, v, w, x[o + 12], K, 1700485571), w = k(w, t, u, v, x[o + 3], L, 2399980690), v = k(v, w, t, u, x[o + 10], M, 4293915773), u = k(u, v, w, t, x[o + 1], N, 2240044497), t = k(t, u, v, w, x[o + 8], K, 1873313359), w = k(w, t, u, v, x[o + 15], L, 4264355552), v = k(v, w, t, u, x[o + 6], M, 2734768916), u = k(u, v, w, t, x[o + 13], N, 1309151649), t = k(t, u, v, w, x[o + 4], K, 4149444226), w = k(w, t, u, v, x[o + 11], L, 3174756917), v = k(v, w, t, u, x[o + 2], M, 718787259), u = k(u, v, w, t, x[o + 9], N, 3951481745), t = c(t, p), u = c(u, q), v = c(v, r), w = c(w, s);
    var O = m(t) + m(u) + m(v) + m(w);
    return O.toLowerCase()
}

/**
 * 根据uid，获取sig
 */
function getApiSignature (uid) {
    var n = Math.round((new Date).getTime() / 1e3);
    var r = uid;
    var i = "1001";
    return "appid=" + i + "&ts=" + n + "&uid=" + r + "&sig=" + Md5([i, n, r].join(""));
}

function Md5 (t) {
    var n = function (t, n) {
        return t << n | t >>> 32 - n
    };
    var r = function U(e, t) {
        var U = void 0;
        var n = void 0;
        var r = void 0;
        var i = void 0;
        var s = void 0;
        r = e & 2147483648;
        i = t & 2147483648;
        U = e & 1073741824;
        n = t & 1073741824;
        s = (e & 1073741823) + (t & 1073741823);
        if (U & n)return s ^ 2147483648 ^ r ^ i;
        if (U | n) {
            if (s & 1073741824)return s ^ 3221225472 ^ r ^ i; else return s ^ 1073741824 ^ r ^ i
        } else {
            return s ^ r ^ i
        }
    };
    var i = function (t, n, r) {
        return t & n | ~t & r
    };
    var s = function (t, n, r) {
        return t & r | n & ~r
    };
    var o = function (t, n, r) {
        return t ^ n ^ r
    };
    var u = function (t, n, r) {
        return n ^ (t | ~r)
    };
    var a = function (t, s, o, u, a, f, l) {
        t = r(t, r(r(i(s, o, u), a), l));
        return r(n(t, f), s)
    };
    var f = function (t, i, o, u, a, f, l) {
        t = r(t, r(r(s(i, o, u), a), l));
        return r(n(t, f), i)
    };
    var l = function (t, i, s, u, a, f, l) {
        t = r(t, r(r(o(i, s, u), a), l));
        return r(n(t, f), i)
    };
    var c = function (t, i, s, o, a, f, l) {
        t = r(t, r(r(u(i, s, o), a), l));
        return r(n(t, f), i)
    };
    var h = function (t) {
        var n = void 0;
        var r = t.length;
        var i = r + 8;
        var s = (i - i % 64) / 64;
        var o = (s + 1) * 16;
        var u = Array(o - 1);
        var a = 0;
        var f = 0;
        while (f < r) {
            n = (f - f % 4) / 4;
            a = f % 4 * 8;
            u[n] = u[n] | t.charCodeAt(f) << a;
            f++
        }
        n = (f - f % 4) / 4;
        a = f % 4 * 8;
        u[n] = u[n] | 128 << a;
        u[o - 2] = r << 3;
        u[o - 1] = r >>> 29;
        return u
    };
    var p = function (t) {
        var n = "";
        var r = "";
        var i = void 0;
        var s = void 0;
        for (s = 0; s <= 3; s++) {
            i = t >>> s * 8 & 255;
            r = "0" + i.toString(16);
            n = n + r.substr(r.length - 2, 2)
        }
        return n
    };
    var d = function (t) {
        t = t.replace(/\x0d\x0a/g, "\n");
        var n = "";
        for (var r = 0; r < t.length; r++) {
            var i = t.charCodeAt(r);
            if (i < 128) {
                n += String.fromCharCode(i)
            } else if (i > 127 && i < 2048) {
                n += String.fromCharCode(i >> 6 | 192);
                n += String.fromCharCode(i & 63 | 128)
            } else {
                n += String.fromCharCode(i >> 12 | 224);
                n += String.fromCharCode(i >> 6 & 63 | 128);
                n += String.fromCharCode(i & 63 | 128)
            }
        }
        return n
    };
    var v = [];
    var m = void 0, g = void 0, y = void 0, b = void 0, w = void 0, E = void 0, S = void 0, x = void 0, T = void 0;
    var N = 7;
    var C = 12;
    var k = 17;
    var L = 22;
    var A = 5;
    var O = 9;
    var M = 14;
    var _ = 20;
    var D = 4;
    var P = 11;
    var H = 16;
    var B = 23;
    var j = 6;
    var F = 10;
    var I = 15;
    var q = 21;
    t = d(t);
    v = h(t);
    E = 1732584193;
    S = 4023233417;
    x = 2562383102;
    T = 271733878;
    for (m = 0; m < v.length; m += 16) {
        g = E;
        y = S;
        b = x;
        w = T;
        E = a(E, S, x, T, v[m + 0], N, 3614090360);
        T = a(T, E, S, x, v[m + 1], C, 3905402710);
        x = a(x, T, E, S, v[m + 2], k, 606105819);
        S = a(S, x, T, E, v[m + 3], L, 3250441966);
        E = a(E, S, x, T, v[m + 4], N, 4118548399);
        T = a(T, E, S, x, v[m + 5], C, 1200080426);
        x = a(x, T, E, S, v[m + 6], k, 2821735955);
        S = a(S, x, T, E, v[m + 7], L, 4249261313);
        E = a(E, S, x, T, v[m + 8], N, 1770035416);
        T = a(T, E, S, x, v[m + 9], C, 2336552879);
        x = a(x, T, E, S, v[m + 10], k, 4294925233);
        S = a(S, x, T, E, v[m + 11], L, 2304563134);
        E = a(E, S, x, T, v[m + 12], N, 1804603682);
        T = a(T, E, S, x, v[m + 13], C, 4254626195);
        x = a(x, T, E, S, v[m + 14], k, 2792965006);
        S = a(S, x, T, E, v[m + 15], L, 1236535329);
        E = f(E, S, x, T, v[m + 1], A, 4129170786);
        T = f(T, E, S, x, v[m + 6], O, 3225465664);
        x = f(x, T, E, S, v[m + 11], M, 643717713);
        S = f(S, x, T, E, v[m + 0], _, 3921069994);
        E = f(E, S, x, T, v[m + 5], A, 3593408605);
        T = f(T, E, S, x, v[m + 10], O, 38016083);
        x = f(x, T, E, S, v[m + 15], M, 3634488961);
        S = f(S, x, T, E, v[m + 4], _, 3889429448);
        E = f(E, S, x, T, v[m + 9], A, 568446438);
        T = f(T, E, S, x, v[m + 14], O, 3275163606);
        x = f(x, T, E, S, v[m + 3], M, 4107603335);
        S = f(S, x, T, E, v[m + 8], _, 1163531501);
        E = f(E, S, x, T, v[m + 13], A, 2850285829);
        T = f(T, E, S, x, v[m + 2], O, 4243563512);
        x = f(x, T, E, S, v[m + 7], M, 1735328473);
        S = f(S, x, T, E, v[m + 12], _, 2368359562);
        E = l(E, S, x, T, v[m + 5], D, 4294588738);
        T = l(T, E, S, x, v[m + 8], P, 2272392833);
        x = l(x, T, E, S, v[m + 11], H, 1839030562);
        S = l(S, x, T, E, v[m + 14], B, 4259657740);
        E = l(E, S, x, T, v[m + 1], D, 2763975236);
        T = l(T, E, S, x, v[m + 4], P, 1272893353);
        x = l(x, T, E, S, v[m + 7], H, 4139469664);
        S = l(S, x, T, E, v[m + 10], B, 3200236656);
        E = l(E, S, x, T, v[m + 13], D, 681279174);
        T = l(T, E, S, x, v[m + 0], P, 3936430074);
        x = l(x, T, E, S, v[m + 3], H, 3572445317);
        S = l(S, x, T, E, v[m + 6], B, 76029189);
        E = l(E, S, x, T, v[m + 9], D, 3654602809);
        T = l(T, E, S, x, v[m + 12], P, 3873151461);
        x = l(x, T, E, S, v[m + 15], H, 530742520);
        S = l(S, x, T, E, v[m + 2], B, 3299628645);
        E = c(E, S, x, T, v[m + 0], j, 4096336452);
        T = c(T, E, S, x, v[m + 7], F, 1126891415);
        x = c(x, T, E, S, v[m + 14], I, 2878612391);
        S = c(S, x, T, E, v[m + 5], q, 4237533241);
        E = c(E, S, x, T, v[m + 12], j, 1700485571);
        T = c(T, E, S, x, v[m + 3], F, 2399980690);
        x = c(x, T, E, S, v[m + 10], I, 4293915773);
        S = c(S, x, T, E, v[m + 1], q, 2240044497);
        E = c(E, S, x, T, v[m + 8], j, 1873313359);
        T = c(T, E, S, x, v[m + 15], F, 4264355552);
        x = c(x, T, E, S, v[m + 6], I, 2734768916);
        S = c(S, x, T, E, v[m + 13], q, 1309151649);
        E = c(E, S, x, T, v[m + 4], j, 4149444226);
        T = c(T, E, S, x, v[m + 11], F, 3174756917);
        x = c(x, T, E, S, v[m + 2], I, 718787259);
        S = c(S, x, T, E, v[m + 9], q, 3951481745);
        E = r(E, g);
        S = r(S, y);
        x = r(x, b);
        T = r(T, w)
    }
    var R = p(E) + p(S) + p(x) + p(T);
    return R.toLowerCase();
}