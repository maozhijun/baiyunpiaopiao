!function (e) {
    var t = {};

    t.fakeDomain = "vku.youku.com";
    t.fakeRefer= "http://vku.youku.com/resources/youku/fake_detail?id=";

    function n(r) {
        if (t[r])return t[r].exports;
        var o = t[r] = {i: r, l: !1, exports: {}};
        return e[r].call(o.exports, o, o.exports, n), o.l = !0, o.exports
    }

    n.m = e, n.c = t, n.d = function (e, t, r) {
        n.o(e, t) || Object.defineProperty(e, t, {enumerable: !0, get: r})
    }, n.r = function (e) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {value: "Module"}), Object.defineProperty(e, "__esModule", {value: !0})
    }, n.t = function (e, t) {
        if (1 & t && (e = n(e)), 8 & t)return e;
        if (4 & t && "object" == typeof e && e && e.__esModule)return e;
        var r = Object.create(null);
        if (n.r(r), Object.defineProperty(r, "default", {
                enumerable: !0,
                value: e
            }), 2 & t && "string" != typeof e)for (var o in e)n.d(r, o, function (t) {
            return e[t]
        }.bind(null, o));
        return r
    }, n.n = function (e) {
        var t = e && e.__esModule ? function () {
            return e.default
        } : function () {
            return e
        };
        return n.d(t, "a", t), t
    }, n.o = function (e, t) {
        return Object.prototype.hasOwnProperty.call(e, t)
    }, n.p = "https://g.alicdn.com/live-platform/youku-live-rax/1.7.7", n(n.s = 1019)
}({
    1: function (e, t) {
        e.exports = require("rax")
    }, 100: function (e, t, n) {
    }, 101: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), o = n(1);
        n(102);
        var i = (0, o.createElement)("h6", null, "合作伙伴"), a = function (e) {
            function t(e) {
                return function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t), function (e, t) {
                    if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e))
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, o.Component), r(t, [{
                key: "render", value: function () {
                    var e = this.props.partner;
                    return (0, o.createElement)("div", {className: "footerCon"}, e && (0, o.createElement)("div", null, i, (0, o.createElement)("div", {class: "partnership"}, e.length > 0 && e.map(function (e) {
                                return (0, o.createElement)("i", null, (0, o.createElement)("img", {
                                    width: "80",
                                    height: "40",
                                    src: e.url
                                }))
                            }))), "Copyright © 2019 优酷 youku.com 版权所有")
                }
            }]), t
        }();
        t.default = a, e.exports = t.default
    }, 1019: function (e, t, n) {
        "use strict";
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), o = n(1), i = v(n(2)), a = v(n(27)), s = v(n(97)), u = v(n(101)), c = v(n(103)), l = v(n(113)), f = v(n(118)), p = v(n(140)), d = v(n(143)), h = v(n(149)), m = v(n(267));

        function v(e) {
            return e && e.__esModule ? e : {default: e}
        }

        n(186), n(187), n(188);
        var y = function (e) {
            function t(e) {
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t);
                var n = function (e, t) {
                    if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                return n.tabList = [{
                    name: "TeleText", title: "图文直播", render: function (e) {
                        var t = e.widgetInitData.doc && e.widgetInitData.doc[0];
                        return (0, o.createElement)(h.default, t)
                    }
                }], n
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, a.default), r(t, [{
                key: "roomInitInfoDidLoad", value: function (e) {
                    document.querySelector("#preview").style.display = "none", document.title = e.data.name + " 优酷直播";
                    var t = document.querySelector("body"), n = "url(" + this.state.backgroundUrl + ")", r = "#" + this.state.backgroundColor;
                    t.style.backgroundImage = n, t.style.backgroundColor = r, this.setState({
                        indexTab: 0,
                        originFullInfo: e
                    })
                }
            }, {
                key: "onTabSelect", value: function (e) {
                    this.setState({indexTab: e})
                }
            }, {
                key: "renderTabHeader", value: function (e) {
                    var t = this, n = this.state.indexTab;
                    return (0, o.createElement)("div", {className: "tabHeader"}, e.length > 1 && e.map(function (e, r) {
                            var a = (0, i.default)("tabHeaderItem", {current: r === n});
                            return (0, o.createElement)("div", {
                                className: a,
                                onClick: t.onTabSelect.bind(t, r)
                            }, e.title)
                        }))
                }
            }, {
                key: "renderTabPanel", value: function (e) {
                    var t = this, n = this.state, r = n.indexTab, a = n.widgetInitData;
                    return (0, o.createElement)("div", {className: "tabPanel"}, a.didLoad && e.map(function (e, n) {
                            var a = (0, i.default)("tabPanelItem", {current: n === r});
                            return (0, o.createElement)("div", {className: a}, e.render ? e.render(t.state) : null)
                        }))
                }
            }, {
                key: "render", value: function () {
                    var e = this.state, t = e.originFullInfo, n = e.roomState, r = e.chatWidgetId, a = (0, i.default)("video", {"video-wide": "" === r}), h = (0, i.default)("inter", {"inter-wide": "" === r});
                    return (0, o.createElement)("div", {id: "aliroom"}, n > -1 && (0, o.createElement)("div", {className: "container"}, (0, o.createElement)("div", {className: "header"}, (0, o.createElement)(s.default, this.state)), (0, o.createElement)("div", {className: "content"}, 0 === n && (0, o.createElement)(c.default, this.state), (0, o.createElement)("div", {className: "main"}, (0, o.createElement)("div", {className: a}, t && (0, o.createElement)(l.default, t)), (0, o.createElement)("div", {className: h}, (0, o.createElement)(f.default, this.state), (0, o.createElement)(m.default, this.state))), (0, o.createElement)("div", {className: "info"}, (0, o.createElement)(p.default, this.state), (0, o.createElement)(d.default, this.state)), (0, o.createElement)("div", {className: "action"}, (0, o.createElement)("div", {className: "tabControl"}, this.renderTabHeader(this.tabList), this.renderTabPanel(this.tabList)))), (0, o.createElement)("div", {className: "footer"}, (0, o.createElement)(u.default, this.state))))
                }
            }]), t
        }();
        (0, o.render)((0, o.createElement)(y, null))
    }, 102: function (e, t, n) {
    }, 103: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = Object.assign || function (e) {
                for (var t = 1; t < arguments.length; t++) {
                    var n = arguments[t];
                    for (var r in n)Object.prototype.hasOwnProperty.call(n, r) && (e[r] = n[r])
                }
                return e
            }, o = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), i = n(1), a = u(n(104)), s = u(n(109));

        function u(e) {
            return e && e.__esModule ? e : {default: e}
        }

        n(112);
        var c = function (e) {
            function t(e) {
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t);
                var n = function (e, t) {
                    if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                return n.state = {showComponent: !0}, n.handleCount = function (e) {
                    n.setState({showComponent: e})
                }, n
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, i.Component), o(t, [{
                key: "render", value: function () {
                    return (0, i.createElement)("div", null, this.state.showComponent && (0, i.createElement)("div", {className: "eaves"}, (0, i.createElement)(a.default, r({}, this.props, {handleCount: this.handleCount})), (0, i.createElement)(s.default, this.props)))
                }
            }]), t
        }();
        t.default = c, e.exports = t.default
    }, 104: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), o = n(1), i = s(n(105)), a = s(n(106));

        function s(e) {
            return e && e.__esModule ? e : {default: e}
        }

        n(108);
        var u = (0, o.createElement)("em", null, "VS"), c = function (e) {
            function t(e) {
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t);
                var n = function (e, t) {
                    if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                return n.onComplete = function () {
                    n.props.handleCount(!1)
                }, n.gapTime = 1e3 * (e.roomStartTimestamp - e.sysTime), n.sportsTemp = "sports" === n.props.template, n
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, o.Component), r(t, [{
                key: "formatDate", value: function (e) {
                    return a.default.formatDate("MM月DD日 hh:mm", 1e3 * e)
                }
            }, {
                key: "render", value: function () {
                    var e = this.gapTime > 0;
                    if (this.sportsTemp)var t = this.props.matchInfo, n = t.homeTeamBadge, r = t.guestTeamBadge;
                    return (0, o.createElement)("div", {className: "countdown"}, e && [this.sportsTemp ? (0, o.createElement)("span", {className: "counttime sports"}, "距离", (0, o.createElement)("img", {src: n}), u, (0, o.createElement)("img", {src: r}), this.formatDate(this.props.roomStartTimestamp), "比赛开始还有") : (0, o.createElement)("span", {className: "counttime"}, "距离", this.formatDate(this.props.roomStartTimestamp), "直播开始还有"), this.gapTime > 0 && (0, o.createElement)(i.default, {
                            timeRemaining: this.gapTime,
                            timeStyle: {color: "#fff", "font-size": this.sportsTemp ? "42px" : "48px"},
                            secondStyle: {color: "#fff", "font-size": this.sportsTemp ? "42px" : "48px"},
                            textStyle: {
                                color: "#fff",
                                "font-size": this.sportsTemp ? "26px" : "30px",
                                "padding-left": "12px",
                                "padding-right": "16px"
                            },
                            tpl: "{d}天{h}小时{m}分{s}秒",
                            onComplete: this.onComplete
                        })])
                }
            }]), t
        }();
        t.default = c, e.exports = t.default
    }, 105: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.default = void 0;
        var r = n(1), o = s(n(7)), i = s(n(5)), a = s(n(8));

        function s(e) {
            return e && e.__esModule ? e : {default: e}
        }

        function u(e) {
            return (u = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
                return typeof e
            } : function (e) {
                return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
            })(e)
        }

        function c(e, t) {
            for (var n = 0; n < t.length; n++) {
                var r = t[n];
                r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
            }
        }

        function l(e) {
            return (l = Object.setPrototypeOf ? Object.getPrototypeOf : function (e) {
                return e.__proto__ || Object.getPrototypeOf(e)
            })(e)
        }

        function f(e, t) {
            return (f = Object.setPrototypeOf || function (e, t) {
                    return e.__proto__ = t, e
                })(e, t)
        }

        function p(e) {
            if (void 0 === e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return e
        }

        function d(e, t, n) {
            return t in e ? Object.defineProperty(e, t, {
                value: n,
                enumerable: !0,
                configurable: !0,
                writable: !0
            }) : e[t] = n, e
        }

        function h(e) {
            return e && "[object Function]" === {}.toString.call(e)
        }

        var m = function (e) {
            function t() {
                var e, n;
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t);
                for (var r = arguments.length, o = new Array(r), i = 0; i < r; i++)o[i] = arguments[i];
                return d(p(p(n = function (e, t) {
                    return !t || "object" !== u(t) && "function" != typeof t ? p(e) : t
                }(this, (e = l(t)).call.apply(e, [this].concat(o))))), "state", {timeRemaining: 0}), d(p(p(n)), "timeoutId", 0), d(p(p(n)), "tick", function () {
                    var e = n.props, t = e.onComplete, r = e.onTick, o = e.interval, i = n.state.timeRemaining, a = 1e3 > i;
                    n.timeoutId && clearTimeout(n.timeoutId), a && h(t) ? t() : n.timeoutId = !a && setTimeout(function () {
                            return n.setState({timeRemaining: i - o}, function () {
                                return h(r) && r(i)
                            })
                        }, o)
                }), n
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function");
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        writable: !0,
                        configurable: !0
                    }
                }), t && f(e, t)
            }(t, r.Component), function (e, t, n) {
                t && c(e.prototype, t), n && c(e, n)
            }(t, [{
                key: "componentWillMount", value: function () {
                    var e = this.props.timeRemaining;
                    this.setState({timeRemaining: e})
                }
            }, {
                key: "componentDidMount", value: function () {
                    this.tick()
                }
            }, {
                key: "componentDidUpdate", value: function () {
                    this.tick()
                }
            }, {
                key: "componentWillReceiveProps", value: function (e) {
                    e.timeRemaining !== this.props.timeRemaining && (this.timeoutId && clearTimeout(this.timeoutId), this.setState({timeRemaining: e.timeRemaining}))
                }
            }, {
                key: "componentWillUnmount", value: function () {
                    this.timeoutId && clearTimeout(this.timeoutId)
                }
            }, {
                key: "shouldComponentUpdate", value: function (e, t) {
                    return this.props.timeRemaining !== e.timeRemaining || this.state.timeRemaining !== t.timeRemaining
                }
            }, {
                key: "render", value: function () {
                    var e = this.state.timeRemaining, t = this.props, n = t.formatFunc, s = t.timeStyle, u = t.timeBackgroundStyle, c = t.timeWrapStyle, l = t.timeBackground, f = t.secondStyle, p = t.textStyle, d = t.tpl;
                    if (n)return n(e);
                    for (var h = Math.floor(e / 1e3), m = parseInt(h / 3600 / 24), y = parseInt(h / 3600) % 24, g = parseInt(h / 60) % 60, b = parseInt(h % 60), w = [v.background, u], _ = {
                        d: m,
                        h: y,
                        m: g,
                        s: b
                    }, x = new RegExp("{[d,h,m,s]}", "g"), E = [], k = null; null !== (k = x.exec(d));)E.push(k.index, k.index);
                    0 !== E.length && E.push(-1);
                    var T = 0;
                    return (0, r.createElement)(i.default, {style: v.main}, E.map(function (e, t) {
                        if (-1 === e) {
                            var n = d.slice(T);
                            return n ? (0, r.createElement)(o.default, {style: p}, n) : null
                        }
                        var u = d[e + 1];
                        switch (u) {
                            case"d":
                            case"h":
                            case"m":
                            case"s":
                                return t % 2 == 0 ? (0, r.createElement)(o.default, {style: p}, d.slice(T, e)) : (T = e + 3, function (e, t, n, s, u, c) {
                                    var l = e < 0 ? 0 : e, f = l < 10 ? 0 : l.toString().slice(0, 1), p = l < 10 ? l : l.toString().slice(1);
                                    return (0, r.createElement)(i.default, {style: [t, v.item]}, n ? (0, r.createElement)(a.default, {
                                        source: n,
                                        style: s
                                    }) : null, (0, r.createElement)(o.default, {style: u}, "" + f), (0, r.createElement)(o.default, {style: c}, "" + p))
                                }(_[u], c, l, w, s, f));
                            default:
                                return null
                        }
                    }))
                }
            }]), t
        }();
        d(m, "propTypes", {
            formatFunc: r.PropTypes.func,
            onTick: r.PropTypes.func,
            onComplete: r.PropTypes.func,
            tpl: r.PropTypes.string,
            timeRemaining: r.PropTypes.number,
            secondStyle: r.PropTypes.object,
            timeStyle: r.PropTypes.object,
            textStyle: r.PropTypes.object,
            timeWrapStyle: r.PropTypes.object,
            timeBackground: r.PropTypes.string,
            timeBackgroundStyle: r.PropTypes.object,
            interval: r.PropTypes.number
        }), d(m, "defaultProps", {tpl: "{d}天{h}时{m}分{s}秒", timeRemaining: 0, interval: 1e3});
        var v = {
            main: {flexDirection: "row", justifyContent: "flex-start", alignItems: "center"},
            item: {flexDirection: "row"},
            background: {position: "absolute"}
        }, y = m;
        t.default = y, e.exports = t.default
    }, 106: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = a(n(107)), o = n(53), i = a(o);

        function a(e) {
            return e && e.__esModule ? e : {default: e}
        }

        var s = r.default.format;

        function u(e, t) {
            return void 0 === t ? t = new Date : (0, o.isNumeric)(t) ? t = new Date(parseInt(t, 10)) : (0, o.isString)(t) && (t = new Date(t.replace(/-/g, "/"))), e.replace(/([YMDhsm])\1*/g, function (e) {
                switch (e.charAt()) {
                    case"Y":
                        return s(t.getFullYear(), e);
                    case"M":
                        return s(t.getMonth() + 1, e);
                    case"D":
                        return s(t.getDate(), e);
                    case"w":
                        return t.getDay() + 1;
                    case"h":
                        return s(t.getHours(), e);
                    case"m":
                        return s(t.getMinutes(), e);
                    case"s":
                        return s(t.getSeconds(), e)
                }
            })
        }

        var c = 86400;
        t.default = {
            release: function (e, t, n) {
                (0, o.isNumeric)(e) && (e = new Date(parseInt(e, 10))), (0, o.isNumeric)(t) && (t = new Date(parseInt(t, 10))), void 0 === e && (e = new Date), void 0 === t && (t = new Date), n || (n = "YYYY年MM月DD日");
                var r = (+t - +e) / 1e3, i = (+t - +new Date(t.toDateString())) / 1e3;
                return r <= 60 ? "刚刚" : r <= 3600 ? Math.floor(r / 60) + "分钟前" : r <= i ? Math.floor(r / 3600) + "小时前" : r <= i + c ? "昨天" : r <= i + 2 * c ? "前天" : r <= i + 25 * c ? Math.floor(r / c) + "天前" : u(n, e)
            }, formatDate: u, formatTime: function (e, t, n) {
                t = "date" === (0, i.default)(t) ? +t : parseInt(t);
                var r = new Date(t), o = r.getHours();
                return r > 432e5 && (o += Math.floor(r / 432e5)), n && (e = e.replace(/(\w)\1+/g, "$1")), e.replace(/([hms])\1*/g, function (t) {
                    switch (t.charAt()) {
                        case"h":
                            return s(o - 8, t);
                        case"m":
                            var n = 60 * (/h+/.test(e) ? 0 : o - 8) + r.getMinutes();
                            return s(n, t);
                        case"s":
                            return s(r.getSeconds(), t)
                    }
                })
            }, formatTimeE: function (e, t) {
                return e < 36e5 ? this.formatTime("mm:ss", e, t) : this.formatTime("hh:mm:ss", e, t)
            }, beautyTime: function (e, t) {
                var n, r, o = [];
                return void 0 == t || t ? (n = parseInt(e / 3600), r = parseInt(e % 3600 / 60)) : r = parseInt(e / 60), e %= 60, r < 10 && (r = "0" + r), e < 10 && (e = "0" + e), o = [r, e], n > 0 && o.unshift(n), o.join(":")
            }, parseTime: function (e, t) {
                for (var n = 0, r = 0, o = (e = String(e).split(":")).length; r < o; r++)n += parseInt(e[r], 10) * Math.pow(60, o - r - 1);
                return t ? 1e3 * n : n
            }
        }, e.exports = t.default
    }, 107: function (e, t, n) {
        "use strict";
        function r(e, t) {
            return t = t || ",", String(e).replace(/(\d)(?=(\d{3})+($|\.))/g, "$1" + t)
        }

        Object.defineProperty(t, "__esModule", {value: !0}), t.default = {
            format: function (e, t) {
                return t = t.length, e = e || 0, 1 == t ? e : (e = String(Math.pow(10, t) + e)).substr(e.length - t)
            }, split: r, pad: function (e, t) {
                var n = "", r = String(Math.abs(e));
                return r.length < t && (n = new Array(t - r.length + 1).join("0")), (e < 0 ? "-" : "") + n + r
            }, field: function (e) {
                var t;
                if ((e = parseInt(e)) >= 1e8) t = (e / 1e8).toFixed(2) + "亿"; else if (e >= 1e4) {
                    var n = e / 1e4, o = parseInt(n).toString(), i = o.length;
                    i < 4 && n != o && (o = n.toFixed(1 == i ? 2 : 4 - i)), t = r(o) + "万"
                } else t = r(e);
                return t
            }, bytes: function (e) {
                e = parseInt(e);
                var t = -1;
                do {
                    e /= 1024, t++
                } while (e > 1024);
                return Math.max(e, .1).toFixed(1) + ["KB", "MB", "GB", "TB"][t]
            }, range: function (e, t, n) {
                return Math.min(Math.max(e, t || 0), n || 100)
            }
        }, e.exports = t.default
    }, 108: function (e, t, n) {
    }, 109: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), o = n(1), i = s(n(110)), a = s(n(98));

        function s(e) {
            return e && e.__esModule ? e : {default: e}
        }

        n(111);
        var u = function (e) {
            function t(e) {
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t);
                var n = function (e, t) {
                    if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                return n.state = {subscribeState: 0}, n.subscribe = function () {
                    n.clicked = !0, 0 === n.state.subscribeState ? n.fetSubscribe() : 1 === n.state.subscribeState && n.fetUnsubscribe()
                }, n.clicked = !1, n
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, o.Component), r(t, [{
                key: "componentWillMount", value: function () {
                    this.checkSub()
                }
            }, {
                key: "checkSub", value: function () {
                    var e = this;
                    i.default.checkSubscribe(this.props.roomId).then(function (t) {
                        t.data.data[0] && 1 == t.data.data[0].isSub ? e.setState({subscribeState: 1}) : e.setState({subscribeState: 0})
                    }).catch(function () {
                        e.setState({subscribeState: 0})
                    })
                }
            }, {
                key: "fetSubscribe", value: function () {
                    var e = this;
                    a.default.checkLogin().then(function () {
                        i.default.subscribe(e.props.roomId).then(function () {
                            e.setState({subscribeState: 1})
                        }).catch(function () {
                            e.setState({subscribeState: 0})
                        })
                    }).catch(function () {
                        a.default.doLogin()
                    })
                }
            }, {
                key: "fetUnsubscribe", value: function () {
                    var e = this;
                    i.default.unsubscribe(this.props.roomId).then(function () {
                        e.setState({subscribeState: 0})
                    }).catch(function () {
                        e.setState({subscribeState: 1})
                    })
                }
            }, {
                key: "getSubscribeText", value: function () {
                    var e = this.state.subscribeState;
                    return 0 == e ? "立即预约" : 1 == e ? "已预约" : 2 == e ? "预约中" : 3 == e ? "取消中" : ""
                }
            }, {
                key: "render", value: function () {
                    var e = this.getSubscribeText();
                    return (0, o.createElement)("div", {className: "subscribe"}, (0, o.createElement)("button", {
                        className: "subsbtn",
                        onClick: this.subscribe
                    }, e))
                }
            }]), t
        }();
        t.default = u, e.exports = t.default
    }, 110: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = n(28);
        t.default = {
            checkSubscribe: function (e) {
                return r.mtop.request({
                    api: "mtop.youku.live.infoapi.checksubscribe",
                    v: "2.0",
                    type: "GET",
                    secType: 2,
                    data: {liveIds: e}
                })
            }, subscribe: function (e) {
                return r.mtop.request({
                    api: "mtop.youku.live.infoapi.subscribe",
                    v: "2.0",
                    type: "GET",
                    secType: 2,
                    data: {source: "weex-live-room-pgc", liveId: e}
                })
            }, unsubscribe: function (e) {
                return r.mtop.request({
                    api: "mtop.youku.live.infoapi.unsubscribe",
                    v: "2.0",
                    type: "GET",
                    secType: 2,
                    data: {source: "weex-live-room-pgc", liveId: e}
                })
            }
        }, e.exports = t.default
    }, 111: function (e, t, n) {
    }, 112: function (e, t, n) {
    }, 113: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), o = n(1), i = p(n(2)), a = p(n(90)), s = p(n(114)), u = p(n(88)), c = p(n(116)), l = p(n(98)), f = p(n(75));

        function p(e) {
            return e && e.__esModule ? e : {default: e}
        }

        n(117);
        var d = (0, o.createElement)("span", {class: "limit-play-desc"}, "直播在线观看人数较多，请您稍后重试"), h = (0, o.createElement)("div", {
            className: "spv-player",
            id: "spvPlayer"
        }), m = (0, o.createElement)("div", {id: "sports-vip-pay"}), v = function (e) {
            function t(e) {
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t);
                var n = function (e, t) {
                    if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                return n.state = {disAppear: !1, limitPlay: !1}, n.reload = function () {
                    window.location.reload()
                }, n.handleOnAppear = function () {
                    n.allowMini && !0 === n.state.disAppear && n.setState({disAppear: !1})
                }, n.handleOnDisappear = function () {
                    var e = (0, a.default)(window).scrollTop();
                    n.allowMini && !1 === n.state.disAppear && e > 600 && n.setState({disAppear: !0})
                }, n.handleClose = function () {
                    n.allowMini = !1, n.setState({disAppear: !1}), f.default.CK("fplayer.smallwindows", "button-fplayer-closewindows")
                }, n.handleMiniPlayer = function () {
                    var e = 0, t = 0, r = 0, o = 0, i = 0, a = 0;
                    n.spvc = document.getElementById("spvContainer"), n.spvc.onmousedown = function (s) {
                        !0 === n.state.disAppear && (n.dragging = !0, e = n.spvc.offsetLeft, t = n.spvc.offsetTop, r = parseInt(n.getMouseXY(s).x), o = parseInt(n.getMouseXY(s).y), i = r - e, a = o - t, f.default.CK("fplayer.windowmove", "button-fplayer-windowmove", {handler: "click"}))
                    }, n.spvc.onmousemove = function (e) {
                        if (n.dragging) {
                            n.moving = !0;
                            var t = n.getMouseXY(e).x - i, r = n.getMouseXY(e).y - a, o = document.documentElement.clientWidth - n.spvc.offsetWidth, s = document.documentElement.clientHeight - n.spvc.offsetHeight;
                            t = Math.min(Math.max(0, t), o), r = Math.min(Math.max(0, r), s), n.spvc.style.left = t + "px", n.spvc.style.top = r + "px"
                        }
                    }, n.spvc.onmouseup = function () {
                        n.dragging = !1, n.moving && (n.moving = !1, f.default.CK("fplayer.windowmove", "button-fplayer-windowmove", {handler: "drag"}))
                    }
                }, n.allowMini = !0, n.dragging = !1, n.moving = !1, n.disAppear = !1, n
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, o.Component), r(t, [{
                key: "getMouseXY", value: function (e) {
                    var t = 0, n = 0;
                    return (e = e || window.event).pageX ? (t = e.pageX, n = e.pageY) : (t = e.clientX + document.body.scrollLeft - document.body.clientLeft, n = e.clientY + document.body.scrollTop - document.body.clientTop), {
                        x: t,
                        y: n
                    }
                }
            }, {
                key: "popSportsVipPay", value: function () {
                    new s.default({
                        container: document.getElementById("sports-vip-pay"),
                        video_id: this.videoId,
                        channel: "live"
                    }).showPop()
                }
            }, {
                key: "callNormalVipPay", value: function () {
                    var e = document.getElementsByClassName("live_lock_btn");
                    if (e.length > 0)for (var t = 0; t < e.length; t++)e[t].className = e[t].className + " youku_vip_pay_btn"
                }
            }, {
                key: "limitRender", value: function () {
                    return (0, o.createElement)("div", {class: "limit-play"}, (0, o.createElement)("div", {class: "limit-play-pc"}, d, (0, o.createElement)("span", {
                        class: "limit-play-btn",
                        onClick: this.reload
                    }, "重试")))
                }
            }, {
                key: "initPlayer", value: function () {
                    var e = this, t = this.props.data;
                    this.liveId = t.liveId, this.videoId = t.videoId, this.videoUrlCode = t.videoUrlCode, (0 === t.liveStatus || 2 === t.liveStatus && !this.videoUrlCode) && (this.allowMini = !1), window.spvPlayer = window.Spv && window.Spv({
                            ccode: c.default,
                            live_enter_time: 0,
                            target: "#spvPlayer",
                            from: "pgc",
                            data: {data: t},
                            liveid: this.liveId,
                            must: "h5",
                            ui: "youkulive",
                            autoplay: !0,
                            needAngle: 0,
                            pc: 1,
                            events: {
                                playError: function (e) {
                                    console.log("播放错误", e)
                                }, qualityChange: function () {
                                }, pgcError: function (t) {
                                    switch (t.type) {
                                        case 40001:
                                            window.location.reload();
                                            break;
                                        case 40002:
                                            window.location.href = "//vku.youku.com";
                                            break;
                                        case 30650:
                                            l.default.doLogin();
                                            break;
                                        case 30306:
                                            window.location.reload();
                                            break;
                                        case 30202:
                                            window.location.href = "//vku.youku.com";
                                            break;
                                        case 30201:
                                        case 30100:
                                        case 400:
                                        case 403:
                                            window.location.reload();
                                            break;
                                        case 1001:
                                            window.spvPlayer[0].full && window.spvPlayer[0].cancelScreen(), 100101 === t.bizCode || 100102 === t.bizCode ? e.popSportsVipPay() : (100103 === t.bizCode || t.bizCode, e.callNormalVipPay());
                                            break;
                                        default:
                                            window.location.reload()
                                    }
                                }, servePre: function () {
                                    document.getElementById("spvPlayer").remove(), e.setState({limitPlay: !0})
                                }
                            }
                        }), window.spvPlayer[0].EventManager.fire("ui:modelock", !0)
                }
            }, {
                key: "initSocket", value: function () {
                    var e = this;
                    u.default.io.on("live_play_refresh", function (e) {
                        window.spvPlayer[0].livePlayRefresh(e)
                    }), u.default.io.on("live_state_change", function (t) {
                        var n = parseInt(Math.random() * (t.dt || 3) * 1e3);
                        setTimeout(function () {
                            0 == t.st && (window.spvPlayer[0].fire("video:pause"), window.spvPlayer[0].orderManager()), 1 == t.st && (window.spvPlayer[0].liveInit(t), e.allowMini = !0)
                        }, n)
                    })
                }
            }, {
                key: "componentDidMount", value: function () {
                    this.initPlayer(), this.initSocket(), this.handleMiniPlayer()
                }
            }, {
                key: "render", value: function () {
                    var e = this.state, t = e.disAppear, n = e.limitPlay, r = (0, i.default)("spv-container", {"video-fixed": !0 === t});
                    return (0, o.createElement)("div", {
                        className: "player-wrapper",
                        id: "playerWrapper",
                        onAppear: this.handleOnAppear,
                        onDisappear: this.handleOnDisappear
                    }, (0, o.createElement)("div", {
                        className: r,
                        id: "spvContainer"
                    }, (0, o.createElement)("div", {className: "spv-con"}, h, (0, o.createElement)("i", {
                        class: "close",
                        onClick: this.handleClose
                    }), m, n && this.limitRender())))
                }
            }]), t
        }();
        t.default = v, e.exports = t.default
    }, 114: function (e, t, n) {
        "use strict";
        (function (e) {
            var n, r, o, i = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
                return typeof e
            } : function (e) {
                return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
            };
            !function (a, s) {
                "object" === i(t) && "object" === i(e) ? e.exports = s() : (r = [], void 0 === (o = "function" == typeof(n = s) ? n.apply(t, r) : n) || (e.exports = o))
            }("undefined" != typeof self && self, function () {
                return function (e) {
                    var t = {};

                    function n(r) {
                        if (t[r])return t[r].exports;
                        var o = t[r] = {i: r, l: !1, exports: {}};
                        return e[r].call(o.exports, o, o.exports, n), o.l = !0, o.exports
                    }

                    return n.m = e, n.c = t, n.d = function (e, t, r) {
                        n.o(e, t) || Object.defineProperty(e, t, {configurable: !1, enumerable: !0, get: r})
                    }, n.n = function (e) {
                        var t = e && e.__esModule ? function () {
                            return e.default
                        } : function () {
                            return e
                        };
                        return n.d(t, "a", t), t
                    }, n.o = function (e, t) {
                        return Object.prototype.hasOwnProperty.call(e, t)
                    }, n.p = "/dist/", n(n.s = 0)
                }([function (e, t) {
                    Object.defineProperty(t, "__esModule", {value: !0});
                    var n = {
                        TAG: "util",
                        jsopInfo: {},
                        KEYARR: [19, 1, 4, 7, 30, 14, 28, 8, 24, 17, 6, 35, 34, 16, 9, 10, 13, 22, 32, 29, 31, 21, 18, 3, 2, 23, 25, 27, 11, 20, 5, 15, 12, 0, 33, 26],
                        protocol: "http:",
                        addEventListenerHander: function (e, t, n) {
                            e.addEventListener ? e.addEventListener(t, n, !1) : e.attachEvent ? e.attachEvent("on" + t, n) : e["on" + t] = n
                        },
                        removeEventListenerHander: function (e, t, n) {
                            e.removeEventListener ? e.removeEventListener(t, n, !1) : e.detachEvent ? e.detachEvent("on" + t, n) : e["on" + t] = null
                        },
                        getById: function (e, t) {
                            return t && t instanceof HTMLElement ? t.getElementById(e) : document.getElementById(e)
                        },
                        deleteEleById: function (e) {
                            var t = document.getElementById(e);
                            t.parentNode.removeChild(t)
                        },
                        emptyEleById: function (e) {
                            document.getElementById(e) && (document.getElementById(e).innerHTML = "")
                        },
                        getByClass: function (e, t) {
                            return t && t instanceof HTMLElement ? t.getElementsByClassName(e) : document.getElementsByClassName(e)
                        },
                        get: function (e, t) {
                            if (t = t || document, 0 === e.indexOf(".")) {
                                var n = e.substr(1, e.length - 1);
                                return t.getElementsByClassName(n)
                            }
                            var r = e;
                            return 0 === e.indexOf("#") && (r = e.substr(1, e.length - 1)), t.getElementById(r)
                        },
                        hasClass: function (e, t) {
                            return 0 != (t = t || "").replace(/\s/g, "").length && new RegExp(" " + t + " ").test(" " + e.className + " ")
                        },
                        addClass: function (e, t) {
                            this.hasClass(e, t) || (e.className = "" == e.className ? t : e.className + " " + t)
                        },
                        removeClass: function (e, t) {
                            if (this.hasClass(e, t)) {
                                for (var n = " " + e.className.replace(/[\t\r\n]/g, "") + " "; n.indexOf(" " + t + " ") >= 0;)n = n.replace(" " + t + " ", " ");
                                e.className = n.replace(/^\s+|\s+$/g, "")
                            }
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
                            for (var n in e)t.push(n + "=" + e[n]);
                            return t.join("&")
                        },
                        toJSON: function (e) {
                            var t = [];
                            for (var n in e)t.push('"' + n + '":"' + e[n] + '"');
                            return "{" + t.join(",") + "}"
                        },
                        getURlKey: function (e, t) {
                            var n = t.split("?");
                            if (n.length > 1)for (var r = (n = n[1].split("&")).length, o = 0; o < r; o++) {
                                var i = n[o].split("=");
                                if (i.length > 1 && i[0] === e)return i[1]
                            }
                            return null
                        },
                        loadfile: function (e, t, n) {
                            var r = null;
                            "js" == t ? ((r = document.createElement("script")).setAttribute("type", "text/javascript"), r.setAttribute("id", n), r.setAttribute("src", e)) : "css" == t && ((r = document.createElement("link")).setAttribute("rel", "stylesheet"), r.setAttribute("id", n), r.setAttribute("type", "text/css"), r.setAttribute("href", e)), void 0 !== r && null === document.getElementById(n) && document.getElementsByTagName("head")[0].appendChild(r)
                        },
                        loadCssCode: function (e, t) {
                            var n = document.createElement("style");
                            n.type = "text/css", n.rel = "stylesheet", n.id = t || "defaultid";
                            try {
                                n.appendChild(document.createTextNode(e))
                            } catch (t) {
                                n.styleSheet.cssText = e
                            }
                            var r = document.getElementsByTagName("head")[0];
                            null === document.getElementById(n.id) && r.appendChild(n)
                        },
                        getJsonp: function (e, t, n, r, o) {
                            var i = e, a = (new Date).getTime() + Math.round(100 * Math.random()), s = "_stId" + a, u = document.createElement("script"), c = "json" + a, l = this;
                            u.type = "text/javascript", u.onerror = u.onbort = function () {
                                l[s] && (clearTimeout(l[s]), l[s] = null, n && n(), document.getElementsByTagName("head")[0].removeChild(u))
                            };
                            var f = o || 15e3;
                            l[s] = setTimeout(function (e) {
                                l[e] && (clearTimeout(l[e]), l[e] = null, r && r(), document.getElementsByTagName("head")[0].removeChild(u))
                            }(s), f), window[c] = function (e) {
                                l[s] && (clearTimeout(l[s]), l[s] = null, document.getElementsByTagName("head")[0].removeChild(u), t(e))
                            }, i += "&callback=" + c, u.src = i, document.getElementsByTagName("head")[0].appendChild(u)
                        },
                        loadJsWithCb: function (e, t) {
                            var n = document.getElementsByTagName("head")[0], r = document.createElement("script");
                            r.type = "text/javascript", r.onload = r.onreadystatechange = function () {
                                this.readyState && "loaded" !== this.readyState && "complete" !== this.readyState || (t && t(), r.onload = r.onreadystatechange = null)
                            }, r.onerror = function () {
                                r.onload = null
                            }, r.src = e, n.appendChild(r)
                        },
                        translate: function (e, t) {
                            for (var n = [], r = 0; r < e.length; r++) {
                                var o = 0;
                                o = e[r] >= "a" && e[r] <= "z" ? e[r].charCodeAt(0) - "a".charCodeAt(0) : e[r] - "0" + 26;
                                for (var i = 0; i < 36; i++)if (t[i] == o) {
                                    o = i;
                                    break
                                }
                                n[r] = o > 25 ? o - 26 : String.fromCharCode(o + 97)
                            }
                            return n.join("")
                        },
                        decode64: function (e) {
                            if (!e)return "";
                            e = e.toString();
                            var t, n = void 0, r = void 0, o = void 0, i = void 0, a = void 0, s = void 0, u = new Array(-1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 62, -1, -1, -1, 63, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, -1, -1, -1, -1, -1, -1, -1, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, -1, -1, -1, -1, -1, -1, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, -1, -1, -1, -1, -1);
                            for (t = e.length, a = 0, s = ""; a < t;) {
                                do {
                                    n = u[255 & e.charCodeAt(a++)]
                                } while (a < t && -1 == n);
                                if (-1 == n)break;
                                do {
                                    r = u[255 & e.charCodeAt(a++)]
                                } while (a < t && -1 == r);
                                if (-1 == r)break;
                                s += String.fromCharCode(n << 2 | (48 & r) >> 4);
                                do {
                                    if (61 == (o = 255 & e.charCodeAt(a++)))return s;
                                    o = u[o]
                                } while (a < t && -1 == o);
                                if (-1 == o)break;
                                s += String.fromCharCode((15 & r) << 4 | (60 & o) >> 2);
                                do {
                                    if (61 == (i = 255 & e.charCodeAt(a++)))return s;
                                    i = u[i]
                                } while (a < t && -1 == i);
                                if (-1 == i)break;
                                s += String.fromCharCode((3 & o) << 6 | i)
                            }
                            return s
                        },
                        encode64: function (e) {
                            if (!e)return "";
                            var t, n = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/", r = void 0, o = void 0, i = void 0, a = void 0, s = void 0;
                            for (t = (e = e.toString()).length, o = 0, r = ""; o < t;) {
                                if (i = 255 & e.charCodeAt(o++), o == t) {
                                    r += n.charAt(i >> 2), r += n.charAt((3 & i) << 4), r += "==";
                                    break
                                }
                                if (a = e.charCodeAt(o++), o == t) {
                                    r += n.charAt(i >> 2), r += n.charAt((3 & i) << 4 | (240 & a) >> 4), r += n.charAt((15 & a) << 2), r += "=";
                                    break
                                }
                                s = e.charCodeAt(o++), r += n.charAt(i >> 2), r += n.charAt((3 & i) << 4 | (240 & a) >> 4), r += n.charAt((15 & a) << 2 | (192 & s) >> 6), r += n.charAt(63 & s)
                            }
                            return r
                        },
                        rc4: function (e, t) {
                            for (var n = [], r = 0, o = void 0, i = "", a = 0; a < 256; a++)n[a] = a;
                            for (a = 0; a < 256; a++)r = (r + n[a] + e.charCodeAt(a % e.length)) % 256, o = n[a], n[a] = n[r], n[r] = o;
                            a = 0, r = 0;
                            for (var s = 0; s < t.length; s++)r = (r + n[a = (a + 1) % 256]) % 256, o = n[a], n[a] = n[r], n[r] = o, i += String.fromCharCode(t.charCodeAt(s) ^ n[(n[a] + n[r]) % 256]);
                            return i
                        },
                        mergeObject: function (e, t) {
                            for (var n in e)t[n] = e[n];
                            return t
                        },
                        htmlEncodeAll: function (e) {
                            return null == e ? "" : e.replace(/\&/g, "&amp;").replace(/\</g, "&lt;").replace(/\>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&apos;")
                        },
                        show: function (e, t) {
                            if (t = t || "block", e instanceof Array)for (var n = 0, r = e.length; n < r; n++) {
                                var o = e[n];
                                o && o instanceof HTMLElement && (o.style.display = t)
                            }
                            e && e instanceof HTMLElement && (e.style.display = t)
                        },
                        hide: function (e) {
                            if (e instanceof Array)for (var t = 0, n = e.length; t < n; t++) {
                                var r = e[t];
                                r && r instanceof HTMLElement && (r.style.display = "none")
                            }
                            e && e instanceof HTMLElement && (e.style.display = "none")
                        },
                        createElement: function (e, t, n, r) {
                            r = r || "div";
                            var o = document.createElement(r);
                            return e && (o.className = e), t && (o.id = t), n && (o.innerHTML = n), o
                        },
                        getTimeModel: function (e) {
                            var t, n, r, o = [];
                            return t = Math.floor(e / 3600), e %= 3600, n = Math.floor(e / 60), r = parseInt(e % 60), t > 0 && o.push(t), n > 9 ? o.push(n) : o.push("0" + n), r > 9 ? o.push(r) : o.push("0" + r), o.join(":")
                        },
                        checkBind: function () {
                            Function.prototype.bind || (Function.prototype.bind = function (e) {
                                if ("function" != typeof this)throw new TypeError("What is trying to be bound is not callable");
                                var t = Array.prototype.slice.call(arguments, 1), n = this, r = function () {
                                };
                                return function () {
                                    return n.apply(this instanceof r ? this : e, t.concat(Array.prototype.slice.call(arguments)))
                                }, r.prototype = this.prototype, fBound.prototype = new r, fBound
                            })
                        },
                        checkProtocol: function () {
                            var e = "";
                            e = document.location && document.location.protocol ? document.location.protocol : document.location && document.location.href && document.location.href.indexOf("https:") > -1 ? "https:" : "http:", this.protocol = e
                        },
                        getCna: function () {
                            return this.cna ? this.cna : this.cookie.getCookie("cna") ? (this.cna = this.cookie.getCookie("cna"), this.cna) : window.goldlog && window.goldlog.Etag ? (this.cna = window.goldlog.Etag, this.cna) : (this.loadfile("https://log.mmstat.com/eg.js", "js"), null)
                        }
                    };
                    n.checkBind(), n.checkProtocol();
                    var r = n;
                    var o = {
                        login: function (e, t) {
                            (function (e, t) {
                                var n = "url(https://account.youku.com/static-resources/images/stylize/youku_bg.jpg) no-repeat right bottom", r = "#333", o = (new Date).getHours();
                                return (o >= 18 || o <= 8) && (n = "url(https://account.youku.com/static-resources/images/stylize/yknight.jpg) no-repeat right bottom", r = "#fff"), new getLoginFrame({
                                    loginOrLogout: "login",
                                    callbackURL: "",
                                    mode: "popup",
                                    template: "tempA",
                                    buid: "youku",
                                    pid: !window.youku_vip_pay_env || "local" !== window.youku_vip_pay_env && "daily" !== window.youku_vip_pay_env ? "20160607PLF000287" : "20160919PLF001101",
                                    themes: ["35b5ff", "c0e8f6"],
                                    bgThemes: n,
                                    fontColor: r,
                                    linkColor: r,
                                    padding: [30, 30, 30, 410],
                                    loginModel: ["mobile", "normal"],
                                    regModel: ["mobile", "email"],
                                    isQRlogin: !0,
                                    isThirdPartLogin: !0,
                                    regShowType: "in",
                                    regRules: ["用户协议", "http://mapp.youku.com/service/agreement", "http://mapp.youku.com/service/copyright"],
                                    qrMsg: "请使用优酷APP扫码登录",
                                    qrBu: ["ykt", 80, "false"],
                                    size: "normal",
                                    loginSuccess: function () {
                                        t();
                                        var e = document.getElementById("YT-loginFramePop");
                                        e && e.parentNode.removeChild(e);
                                        var n = document.getElementById("YT-loginFrameshade");
                                        n && n.parentNode.removeChild(n)
                                    },
                                    closeCallback: function () {
                                        var e = document.getElementsByClassName("YT-loginFrame-popbox"), t = e.length;
                                        if (t > 1) {
                                            var n = e[t - 1];
                                            n.parentNode.removeChild(n)
                                        }
                                        var r = document.getElementById("closeFrame");
                                        r && (r.style.display = "none")
                                    }
                                })
                            })(0, t).buildLoginDom();
                            var n = document.getElementById("closeFrame");
                            n && (n.style.display = "block")
                        }
                    };
                    var i = function () {
                        function e(t) {
                            !function (e, t) {
                                if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                            }(this, e), this.container_id = t.container_id, this.container = document.getElementById(this.container_id), this.domain = t.fakeDomain, this.vipPaymentURL = t.vipPaymentURL + "&place=111&showId=" + t.showId, this.channel = t.channel, this.container && this.show(), !this.container && this.count(0, 300)
                        }

                        return e.prototype.show = function () {
                            !document.getElementById("vip_player_payment_side_style") && r.loadCssCode(this.getStyle(), "vip_player_payment_side_style"), this.initBox(), this.getPayInfo()
                        }, e.prototype.count = function (e, t) {
                            var n = this;
                            e > 3 || setTimeout(function () {
                                var t = document.getElementById(n.container_id);
                                t ? (n.container = t, n.show()) : n.count(e + 1, 500)
                            }, t)
                        }, e.prototype.getPayInfo = function (e) {
                            var t = this;
                            r.getJsonp(this.vipPaymentURL, function (n) {
                                if (e && "function" == typeof e) e(n); else {
                                    if (2e4 != n.code)return;
                                    var r = n.result && n.result.model && n.result.model.playerAttrs && n.result.model.playerAttrs.pay_scenes || {};
                                    r.scenes && t.render(r.scenes)
                                }
                            }, function () {
                            })
                        }, e.prototype.render = function (e) {
                            var t = void 0;
                            if (e.forEach(function (e) {
                                    t = "pc_player_rightside" === e.scene ? e.components : t
                                }), t) {
                                var n = {}, o = [], i = [], a = !1, s = this;
                                t.forEach(function (e) {
                                    "label" === e.type ? n[e.code] = e.text : e.action && "button" === e.type && !o.length && o.push(e)
                                }), o.forEach(function (e) {
                                    var t = e.text, n = e.action, r = n.mode, o = n.params && n.params.products && n.params.products.join(","), u = n.params && n.params.spm ? 'data-spm-anchor-id="' + n.params.spm + '"' : "", c = "", l = "default";
                                    1 == r ? l = "vip.trade.order.render.cibn" === n.pageKey ? "kumiao" : "default" : 2 == r ? (c = "consumeticket_event_side", s.showid = n.params.show_id, s.code = n.params.code, s.isSportTicket = (e.attribute || "-").indexOf("pptv") > -1, a = !0, s.consumeticketText = n.params) : 3 == r ? l = "vod" : 4 == r && (l = "vippkg"), "h5cashier" == n.type && !o && (e.attribute || "-").indexOf("pptv") > -1 && (l = "psport");
                                    var f = '<a href="JavaScript:;" class="' + (c || "youku_vip_pay_btn") + ' vip_limit_btn" data-type="' + (l || "") + '" data-products="' + (o || "") + '" data-tag="' + s.channel + '_pc_trial_sid" ' + u + ">" + t + "</a>";
                                    i.push(f)
                                }), n.button = i.join(""), s.container_main.innerHTML = this.tplSide(n), a && r.addEventListenerHander(r.getByClass("consumeticket_event_side", this.container)[0], "click", function () {
                                    s.runConsumeticket(s)
                                })
                            }
                        }, e.prototype.render_error = function () {
                        }, e.prototype.tplSide = function (e) {
                            return '<div class="vip_limit_content_sid" id="vip_limit_content_sid">\n            ' + e.button + "\n            <p>" + e.subtitle + "</p>\n        </div>"
                        }, e.prototype.getStyle = function () {
                            return ".vip_limit_box_side{\n            text-align: center;\n            position: relative;\n            padding: 20px;\n            font-family: PingFangSC-Regular;\n        }\n        .vip_limit_box_side .vip_limit_btn{\n            display: block;\n            width: 100%;\n            position: relative;\n            border-radius: 15px;\n            font-size: 14px;\n            line-height: 30px;\n            color: #1f1f1f;\n            text-align: center;\n            background: #C1A875;\n            border-radius: 15px;\n        }\n        .vip_limit_box_side .vip_limit_btn em{\n            position: absolute;\n            left: 100%;\n            top: -14px;\n            transform: translate( -66%, 0 );\n            background-image: linear-gradient(-135deg, #d52525 0%, #f35b5b 15%, #fb444c 100%);\n            height: 20px;\n            line-height: 20px;\n            font-size: 12px;\n            padding: 0 10px;\n            border-radius: 15px 0px 15px 0px;\n            color: #fff;\n            white-space: nowrap;\n            font-style: normal;\n        }\n        .vip_limit_box_side p{\n            padding: 10px;\n            text-align: center;\n            font-size: 12px;\n            color: #999;\n            line-height: 18px;\n            white-space: nowrap;\n            overflow: hidden;\n            max-width: 100%;\n        }\n        .vip_limit_tips_side{\n            position: absolute;\n            top: 10px;\n            right: 10px;\n            bottom: 10px;\n            left: 10px;\n            background: rgba(0, 0, 0, 0.9);\n            z-index: 1001;\n        }\n        .vip_limit_tips_side p{\n            margin-top: 7px;\n            color: #ddd; \n        }\n        .vip_limit_tips_side .vip_limit_btn{\n            width: 40%;\n            margin: 0 auto;\n            line-height: 30px;\n        }"
                        }, e.prototype.initBox = function () {
                            this.container.innerHTML = '<div class="vip_limit_box_side" id="vip_limit_box_side"></div>', this.container_main = document.getElementById("vip_limit_box_side")
                        }, e.prototype.runConsumeticket = function (e) {
                            var t = document.createElement("div");
                            t.id = "vip_limit_tips_side", t.className = "vip_limit_tips_side";
                            var n = "//" + e.domain + "/api/ticket_exchange?code=" + e.code + "&showId=" + e.showid + "&channel=pc@yk";
                            r.getJsonp(n, function (n) {
                                if (!(n.result || {}).success) {
                                    var o = n.result.message || "网络错误，请稍后重试";
                                    return t.innerHTML = "<p>" + o + '</p>\n                    <a href="JavaScript:;" class="vip_limit_btn" id="sid_goback">返回</a>\n                </div>', void document.getElementById("sid_goback").addEventListener("click", function () {
                                        r.deleteEleById("vip_limit_tips_side")
                                    })
                                }
                                t.innerHTML = '<p>用券成功，请刷新页面观看！</p>\n                <a href="JavaScript:;" class="vip_limit_btn" id="sid_reload">刷新</a>\n            </div>', e.container_main.appendChild(t), document.getElementById("sid_reload").addEventListener("click", function () {
                                    window.location.reload()
                                })
                            }, function () {
                            })
                        }, e
                    }();
                    var a = function () {
                        function e(t) {
                            !function (e, t) {
                                if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                            }(this, e), this.container = t.container, this.container_sid_id = t.container_sid_id, this.payment_data = t.payment_data || null, this.domain = t.fakeDomain || "pc.pay.youku.com", this.vipPaymentURL = "//" + this.domain + "/api/get_pay_info?source=3&device=2&version=7.3.0&videoId=" + t.video_id, this.reload = t.reload, this.video_id = t.video_id, this.showId = t.show_id, this.channel = t.channel, this.superscript = t.superscript, r.getByClass("vip_info")[0] && (r.getByClass("vip_info")[0].style.display = "block"), this.loadCashier(), this.container_sid_id && this.invokeSid()
                        }

                        return e.prototype.show = function () {
                            this.showPop()
                        }, e.prototype.showPop = function () {
                            !document.getElementById("vip_player_payment_style") && r.loadCssCode(this.getStyle(), "vip_player_payment_style"), !document.getElementById("vip_limit_box") && this.initBox(), r.addClass(document.getElementById("vip_limit_box"), "status_pop"), this.payment_data && this.payment_data.model && this.payment_data.model.playerAttrs && this.render(this.payment_data.model.playerAttrs, "trial_end"), this.payment_data || this.getPayInfo("", "trial_end"), r.removeClass(document.getElementById("vip_player_payment_pop"), "none")
                        }, e.prototype.hide = function () {
                            this.hidePop()
                        }, e.prototype.hidePop = function () {
                            r.removeClass(document.getElementById("vip_limit_box"), "status_pop"), r.emptyEleById("vip_player_payment_pop"), r.addClass(document.getElementById("vip_player_payment_pop"), "none")
                        }, e.prototype.showToast = function () {
                            !document.getElementById("vip_player_payment_style") && r.loadCssCode(this.getStyle(), "vip_player_payment_style"), !document.getElementById("vip_limit_box") && this.initBox(), r.addClass(document.getElementById("vip_limit_box"), "status_toast"), this.payment_data && this.payment_data.model && this.payment_data.model.playerAttrs && this.render(this.payment_data.model.playerAttrs, "trial_playing"), this.payment_data || this.getPayInfo("", "trial_playing"), r.removeClass(document.getElementById("vip_player_payment_toast"), "none")
                        }, e.prototype.hideToast = function () {
                            r.removeClass(document.getElementById("vip_limit_box"), "status_toast"), r.emptyEleById("vip_player_payment_toast"), r.addClass(document.getElementById("vip_player_payment_toast"), "none")
                        }, e.prototype.runReload = function () {
                            this.hidePop(), (window.H5player || window.player || {
                                seek: function () {
                                }
                            }).seek(0)
                        }, e.prototype.loadLoginFrame = function () {
                            var e = this;
                            window.getLoginFrame ? e.loginAPI = o : r.loadJsWithCb("//g.alicdn.com/static-es6/login/public/load.js", function () {
                                getLoginFrame && (e.loginAPI = o)
                            })
                        }, e.prototype.loadCashier = function () {
                            setTimeout(function () {
                                window.isPayJSLoad || r.loadJsWithCb("//static.youku.com/paymentcenter/vip_pay/vip_pc_pay.js?v=201809", function () {
                                })
                            }, 350)
                        }, e.prototype.initLoginFrame = function () {
                            var e = this, t = "//" + e.domain + "/api/get_login_state?_=pc.pay";
                            r.getJsonp(t, function (t) {
                                2e4 == t.code ? (r.deleteEleById("vip_limit_login"), window.location.reload()) : e.invokeLoginFrame()
                            }, function () {
                                e.invokeLoginFrame()
                            })
                        }, e.prototype.invokeLoginFrame = function () {
                            "v" === this.channel && window.Login && window.Login.login ? window.Login.login(null, function () {
                                window.location.reload()
                            }) : this.loginAPI.login(!0, function () {
                                window.location.reload()
                            })
                        }, e.prototype.destroy = function () {
                            this.hidePop(), this.hideToast(), r.deleteEleById("vip_limit_box"), this.payment_data = null
                        }, e.prototype.update = function (e) {
                            this.payment_data = null, "pop" === e ? (this.hidePop(), this.showPop()) : "toast" === e ? (this.hideToast(), this.showToast()) : (this.destroy(), this.showPop(), this.showToast())
                        }, e.prototype.getPayInfo = function (e, t) {
                            var n = this;
                            r.getJsonp(this.vipPaymentURL, function (r) {
                                if (e && "function" == typeof e) e(r); else {
                                    if (2e4 != r.code)return;
                                    n.payment_data = r.result || {}, n.isLogin = n.payment_data.isLogin, n.payment_data.model && n.payment_data.model.playerAttrs && n.render(n.payment_data.model.playerAttrs, t, !0), n.payment_data.model && n.payment_data.model.playerAttrs || n.render_error(n.payment_data, t), window.__trial_payment_info = n.payment_data.model && n.payment_data.model.playerAttrs || !1
                                }
                            }, function () {
                            })
                        }, e.prototype.render_trial_playing = function (e) {
                            var t = this, n = {}, o = [], i = [], a = !1, s = this;
                            e.forEach(function (e) {
                                "title" === e.code && (n.icon = e.icon ? '<b><img src="' + e.icon + '"></b>' : ""), "label" === e.type ? n[e.code] = e.text : e.action && "button" === e.type && o.push(e)
                            }), o.forEach(function (e) {
                                var t = e.text, n = e.action, r = n.mode, o = n.params && n.params.products && n.params.products.join(","), u = n.params && n.params.spm ? 'data-spm-anchor-id="' + n.params.spm + '"' : "", c = "", l = "default";
                                1 == r ? l = "vip.trade.order.render.cibn" === n.pageKey ? "kumiao" : "default" : 2 == r ? (c = "consumeticket_event", s.showid = n.params.show_id, s.code = n.params.code, s.isSportTicket = (e.attribute || "-").indexOf("pptv") > -1, a = !0, s.consumeticketText = n.params) : 3 == r ? l = "vod" : 4 == r && (l = "vippkg"), "h5cashier" == n.type && !o && (e.attribute || "-").indexOf("pptv") > -1 && (l = "psport");
                                var f = '<a href="JavaScript:;" class="' + (c || "youku_vip_pay_btn") + '" data-type="' + l + '" data-products="' + (o || "") + '" data-tag="' + s.channel + '_pc_trial_playing" ' + u + ">" + t + "</a>";
                                i.push(f)
                            }), n.href = i.join(""), document.getElementById("vip_player_payment_toast").innerHTML = this.tplToast(n), r.addEventListenerHander(document.getElementById("toast_close"), "click", function () {
                                t.hideToast()
                            }), a && r.addEventListenerHander(r.getByClass("consumeticket_event", this.container)[0], "click", function () {
                                s.consumeticketConfim(s)
                            })
                        }, e.prototype.render_trial_end = function (e) {
                            var t = this, n = {}, o = [], i = [], a = [], s = !1, u = this;
                            n.vipState = "none", n.vipType = "优酷VIP", e.forEach(function (e) {
                                "label" === e.type ? n[e.code] = e.text : e.action && "button" === e.type && o.push(e)
                            }), o.forEach(function (e) {
                                var t = e.text, r = e.action, o = r.mode, c = r.params && r.params.products && r.params.products.join(","), l = r.params && r.params.spm ? 'data-spm-anchor-id="' + r.params.spm + '"' : "", f = "", p = "default";
                                1 == o ? (p = "vip.trade.order.render.cibn" === r.pageKey ? "kumiao" : "default", (e.attribute || "-").indexOf("pptv") > -1 ? (!u.isLogin && a.push("已是体育会员"), n.vipState = "vip_auth_sport", n.vipType = "体育会员") : (!u.isLogin && a.push("已是优酷VIP"), n.vipState = "vip_auth_youku")) : 2 == o ? (f = "consumeticket_pop", u.showid = r.params.show_id, u.code = r.params.code, u.isSportTicket = (e.attribute || "-").indexOf("pptv") > -1, s = !0, !u.isLogin && a.push("有券"), u.consumeticketText = r.params) : 3 == o ? (p = "vod", !u.isLogin && -1 == a.join("").indexOf("已购买") && a.push("已购买")) : 4 == o && (p = "vippkg", !u.isLogin && -1 == a.join("").indexOf("已购买") && a.push("已购买")), "h5cashier" == r.type && !c && (e.attribute || "-").indexOf("pptv") > -1 && (p = "psport");
                                var d = u.superscript && e.superscript ? "<em>" + e.superscript + "</em>" : "", h = '<a href="JavaScript:;" class="vip_limit_btn ' + (f || "youku_vip_pay_btn") + '" data-type="' + p + '" data-products="' + (c || "") + '" data-tag="' + u.channel + '_pc_trial_end" ' + l + ">" + t + d + "</a>";
                                i.push(h)
                            }), n.login_text = a.join("或"), n.button = i.join(""), n.loginState = this.isLogin ? "" : '<span href="JavaScript:;" id="vip_limit_login" class="vip_limit_login">' + n.login_text + ' , <a href="JavaScript:;" class="J-login" id="pay_user_login">登录观看</a>></span>', n.reloadState = this.reload ? '<a href="JavaScript:;" class="vip_limit_reload" id="vip_limit_reload">重新试看</a>' : "", document.getElementById("vip_player_payment_pop").innerHTML = this.tplPop(n), s && r.addEventListenerHander(r.getByClass("consumeticket_pop")[0], "click", function () {
                                u.consumeticketConfim(u)
                            }), n.reloadState && r.addEventListenerHander(r.getById("vip_limit_reload"), "click", function () {
                                t.runReload()
                            }), !this.isLogin && this.loadLoginFrame(), !this.isLogin && r.addEventListenerHander(r.getById("pay_user_login"), "click", function () {
                                t.initLoginFrame()
                            })
                        }, e.prototype.render_error = function () {
                        }, e.prototype.render = function (e, t) {
                            var n = this;
                            e.pay_scenes.scenes.forEach(function (e) {
                                e.scene === t && n["render_" + t](e.components)
                            })
                        }, e.prototype.tplPop = function (e) {
                            return '<div class="vip_limit_content" id="vip_limit_content">\n            <h6>' + e.title + "</h6>\n            <p>" + e.subtitle + '</p>\n            <div class="vip_limit_button_box">' + e.button + '</div>\n            <div class="vip_limit_auth ' + e.vipState + '">\n                <p><span></span><strong>开通' + e.vipType + '尊享以下权限</strong><span></span></p>\n                <ul>\n                    <li><b class="s1"></b><span>免费大片</span></li>\n                    <li><b class="s2"></b><span>广告特权</span></li>\n                    <li><b class="s3"></b><span>1080P</span></li>\n                    <li><b class="s4"></b><span>抢先看剧</span></li>\n                    <li class="vip_icon_sport"><b class="s5"></b><span>专享比赛</span></li>\n                    <li class="vip_icon_sport"><b class="s6"></b><span>广告特权</span></li>\n                    <li class="vip_icon_sport"><b class="s7"></b><span>多端共享</span></li>\n                    <li class="vip_icon_sport"><b class="s8"></b><span>1080高清</span></li>\n                </ul>\n            </div>\n        </div>\n        <div class="vip_limit_bottom">\n            ' + e.reloadState + "\n            " + e.loginState + "\n        </div>"
                        }, e.prototype.tplToast = function (e) {
                            return '<div id="toast_content"><p id="toast_text" class="toast_text">' + e.icon + (e.title ? e.title + "," : "") + e.href + '<span class="toast_close" id="toast_close">×</span></p></div>'
                        }, e.prototype.getStyle = function () {
                            return ".vip_limit_box{\n            position: absolute;\n            bottom: 0;\n            left: 0;\n            width: 100%;\n            height: 0;\n            padding-bottom: 52px;\n            z-index: 999;\n            display: flex;\n            flex-direction: column;\n        }\n        .vip_limit_box.status_toast{\n            height: 30px;\n            background: rgba(0, 0, 0, 0);\n        }\n        .vip_limit_box.status_pop{\n            height: 100%;\n            box-sizing: border-box;\n            background: rgba(0, 0, 0, 0.8);\n        }\n        .vip_limit_box::before{\n                flex: 1;\n                content: '';\n                width: 100%;\n        }\n        .vip_limit_box .none{\n            display: none;\n        }\n        .vip_player_payment_pop{\n            flex: 9999;\n            width: 100%;\n            position: relative;\n        }\n        .vip_limit_content{\n            position: absolute;\n            left: 50%;\n            top: 50%;\n            transform: translate( -50%, -50% );\n            text-align: center;\n            padding-top: 52px;\n        }\n        .vip_limit_content h6, .vip_limit_content p{\n            font-size: 18px;\n            line-height: 36px;\n            color: #fff;\n            text-align: center;\n        }\n        .vip_limit_content p{\n            font-size: 14px;\n            line-height: 36px;\n            color: #999;\n        }\n        .vip_limit_button_box{\n            text-align: center;\n            white-space: nowrap;\n            overflow: hidden;\n        }\n        .vip_limit_content .vip_limit_btn{\n            display: inline-block;\n            min-width: 100px;\n            position: relative;\n            background: #f60;\n            padding: 0 35px;\n            margin: 14px 5px 25px 5px;\n            border-radius: 38px;\n            font-size: 18px;\n            line-height: 38px;\n            color: #623A0C;\n            text-align: center;\n            background-image: linear-gradient(-135deg, #FBE8A8 0%, #F8E7AC 15%, #E2C078 100%);\n        }\n        .vip_limit_content .vip_limit_btn em{\n            position: absolute;\n            left: 100%;\n            top: -14px;\n            transform: translate( -66%, 0 );\n            background-image: linear-gradient(-135deg, #d52525 0%, #f35b5b 15%, #fb444c 100%);\n            height: 20px;\n            line-height: 20px;\n            font-size: 12px;\n            padding: 0 10px;\n            border-radius: 15px 0px 15px 0px;\n            color: #fff;\n            white-space: nowrap;\n            font-style: normal;\n        }\n        .vip_limit_bottom{\n            position: absolute;\n            bottom: 0;\n            left: 0;\n            height: 36px;\n            width: 100%;\n            line-height: 36px;\n            color: #acacac;\n        }\n        .vip_limit_auth.none{\n            display: none;\n        }\n        .vip_limit_auth p strong{\n            display: inline-block;\n            padding: 0 10px;\n            font-weight: normal;\n        }\n        .vip_limit_auth p span{\n            position: relative;\n            top: -5px;\n            display: inline-block;\n            width: 60px;\n            border-top: 1px solid #acacac;\n        }\n        .vip_limit_auth ul{\n            display: block;\n            width: 360px;\n            height: 60px;\n            margin: 10px auto 0;\n        }\n        .vip_limit_auth li{\n            float: left;\n            width: 90px;\n            height: 60px;\n            line-height: 28px;\n            color: #fff;\n            text-align: center;\n            list-style: none;\n            padding: 0;\n            margin: 0;\n        }\n        .vip_limit_auth li b{\n            display: block;\n            margin: 0 auto;\n            width: 36px;\n            height: 32px;\n            background-image: url(//img.alicdn.com/tfs/TB1YSEtbXzqK1RjSZFzXXXjrpXa-36-450.png);\n            background-repeat: no-repeat;\n        }\n        .vip_limit_auth li b.s2{\n            background-position: center -50px;\n        }\n        .vip_limit_auth li b.s3{\n            background-position: center -100px;\n        }\n        .vip_limit_auth li b.s4{\n            background-position: center -150px;\n        }\n        .vip_limit_auth li b.s5{\n            background-position: center -250px;\n        }\n        .vip_limit_auth li b.s6{\n            background-position: center -300px;\n        }\n        .vip_limit_auth li b.s7{\n            background-position: center -350px;\n        }\n        .vip_limit_auth li b.s8{\n            background-position: center -400px;\n        }\n        .vip_limit_auth .vip_icon_sport{\n            display: none;\n        }\n        .vip_auth_sport li{\n            display: none;\n        }\n        .vip_auth_sport .vip_icon_sport{\n            display: block;\n        }\n        .vip_limit_reload{\n            float: left;\n            margin: 0 0 0 20px;\n            padding-left: 26px;\n            background-image: url(//img.alicdn.com/tfs/TB1YSEtbXzqK1RjSZFzXXXjrpXa-36-450.png);\n            background-repeat: no-repeat;\n            background-position: 0 -200px;\n            opacity: 0.6;\n            color: #fff;\n        }\n        .vip_limit_reload:hover{\n            opacity: 1;\n            color: #fff;\n        }\n        .vip_limit_login{\n            float: right;\n            margin: 0 20px 0 0;\n        }\n        .vip_limit_login a, .vip_limit_login a:link{\n            color: #FD6700;\n            padding-right: 5px;\n        }\n        .vip_limit_login a:hover{\n            color: #cf5500;\n        }\n        .vip_limit_toast{\n            position: absolute;\n            height:30px;\n            width: 100%;\n            bottom: 46px;\n            left: 0;\n        }\n        .vip_player_payment_toast{\n            height:30px;\n            width: 100%;\n            line-height: 30px;\n            color: #fff;\n            font-size: 14px;\n            padding: 0 10px;\n            box-sizing: border-box;\n            position: relative;\n            text-align: left;\n        }\n        .vip_player_payment_toast a, .vip_player_payment_toast a:link, .vip_player_payment_toast a:visited{\n            color: #08c;\n        }\n        .vip_player_payment_toast a:hover{\n            color: #2692ff;\n        }\n        .vip_player_payment_toast .toast_content, .vip_player_payment_toast p{\n            width: 100%;\n            height: 30px;\n            white-space: nowrap;\n            text-overflow: ellipsis;\n            overflow: hidden;\n            text-align: left;\n        }\n        .vip_player_payment_toast p{\n            display: inline-block;\n            width: auto;\n        }\n        .vip_player_payment_toast .toast_text{\n            background: #333;\n            border-radius: 15px;\n            padding: 0 12px;\n            height: 26px;\n            margin-top: 2px;\n            line-height: 26px;\n        }\n        .vip_player_payment_toast .toast_text a, .vip_player_payment_toast .toast_text a:link{\n            color: #FD6700;\n            padding: 0 5px;\n        }\n\n        .vip_player_payment_toast .toast_text a:hover{\n            color: #cf5500;\n        }\n        .vip_player_payment_toast .toast_text b{\n            float: left;\n            width: 22px;\n            height: 22px;\n            margin: 2px 5px 0 0;\n            border-radius: 50%;\n            overflow: hidden;\n            background: #000;\n        }\n        .vip_player_payment_toast .toast_text img{\n            display: block;\n            margin: 2px auto 0;\n            width: 18px;\n            height: 18px;\n        }\n        .vip_player_payment_toast .toast_close{\n            font-size: 20px;\n            cursor: pointer;\n            padding: 0 5px;\n        }\n        .ykplayer-dashboard-hidden .vip_limit_box{\n            padding-bottom: 0;\n        }\n        .ykplayer-dashboard-hidden .vip_limit_content{\n            padding-top: 0;\n        }\n        .vip_limit_confim{\n            position: absolute;\n            bottom: 0;\n            left: 0;\n            width: 100%;\n            height: 100%;\n            background: rgba(0, 0, 0, 0.9);\n            z-index: 1001;\n        }\n        .vip_limit_consumetick{\n            min-width: 94%;\n            position: absolute;\n            left: 50%;\n            top: 50%;\n            transform: translate( -50%, -50% );\n            text-align: center;\n        }\n        .consumeticket_title{\n            font-size: 18px;\n            line-height: 40px;\n            padding: 20px;\n        }\n        .consumeticket_desc{\n            padding: 0 20px 20px;\n        }\n        .consumeticket_btn{\n            text-align: center;\n        }\n        .consumeticket_btn .vip_limit_btn{\n            display: inline-block;\n            min-width: 100px;\n            position: relative;\n            background: #f60;\n            padding: 0 35px;\n            margin: 14px 5px 25px 5px;\n            border-radius: 38px;\n            font-size: 18px;\n            line-height: 38px;\n            color: #623A0C;\n            text-align: center;\n            background-image: linear-gradient(-135deg, #FBE8A8 0%, #F8E7AC 15%, #E2C078 100%);\n        }\n        .vip_limit_confim .vip_confim_close{\n            position: absolute;\n            right: 30px;\n            top: 30px;\n            font-size: 24px;\n            line-height: 26px;\n            cursor: pointer;\n        }"
                        }, e.prototype.initBox = function () {
                            this.container.innerHTML = '<div class="vip_limit_box" id="vip_limit_box">\n            <div class="vip_player_payment_pop none" id="vip_player_payment_pop"></div>\n            <div class="vip_player_payment_toast none" id="vip_player_payment_toast"></div>\n        </div>'
                        }, e.prototype.consumeticketConfim = function (e) {
                            var t = document.createElement("div");
                            t.id = "vip_limit_confim", t.className = "vip_limit_confim", t.innerHTML = '<span class="vip_confim_close" id="vip_confim_close">×</span>\n            <div class="vip_limit_consumetick" id="vip_limit_consumetick">\n                <p class="consumeticket_title">' + e.consumeticketText.dialog_title + '</p>\n                <p class="consumeticket_desc">' + (e.consumeticketText.dialog_desc1 || "") + "," + (e.consumeticketText.dialog_desc2 || "") + "," + (e.consumeticketText.dialog_desc3 || "") + '</p>\n                <div class="consumeticket_btn">\n                    <a href="JavaScript:;" class="vip_limit_btn" id="vip_consumeticket_entry">确定</a>\n                </div>\n                </p>\n            </div>', e.container.appendChild(t), document.getElementById("vip_consumeticket_entry").addEventListener("click", function () {
                                e.runConsumeticket(e)
                            }), document.getElementById("vip_confim_close").addEventListener("click", function () {
                                e.is_consumeticket_done && window.location.reload(), r.deleteEleById("vip_limit_confim")
                            })
                        }, e.prototype.runConsumeticket = function (e) {
                            var t = "//" + e.domain + "/api/ticket_exchange?code=" + e.code + "&showId=" + e.showid + "&channel=pc@yk";
                            r.getJsonp(t, function (t) {
                                if ((t.result || {}).success) e.is_consumeticket_done = !0, r.getByClass("consumeticket_title")[0].innerHTML = "用券成功，请刷新页面观看！", r.getByClass("consumeticket_desc")[0].innerHTML = "", r.getByClass("consumeticket_btn")[0].innerHTML = '<a href="JavaScript:;" class="vip_limit_btn" id="vip_consumeticket_reload">刷新</a>', document.getElementById("vip_consumeticket_reload").addEventListener("click", function () {
                                    window.location.reload()
                                }); else {
                                    var n = t.result.message || "网络错误，请稍后重试";
                                    r.getByClass("consumeticket_title")[0].innerHTML = n
                                }
                            }, function () {
                            })
                        }, e.prototype.invokeSid = function () {
                            new i({
                                container_id: this.container_sid_id,
                                channel: this.channel,
                                domain: this.domain,
                                showId: this.showId,
                                vipPaymentURL: this.vipPaymentURL
                            })
                        }, e
                    }();
                    t.default = a
                }]).default
            })
        }).call(this, n(115)(e))
    }, 115: function (e, t) {
        e.exports = function (e) {
            return e.webpackPolyfill || (e.deprecate = function () {
            }, e.paths = [], e.children || (e.children = []), Object.defineProperty(e, "loaded", {
                enumerable: !0,
                get: function () {
                    return e.l
                }
            }), Object.defineProperty(e, "id", {
                enumerable: !0, get: function () {
                    return e.i
                }
            }), e.webpackPolyfill = 1), e
        }
    }, 116: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function (e) {
            return e && e.__esModule ? e : {default: e}
        }(n(46));
        var o = "";
        o = r.default.isPhone ? r.default.youku ? r.default.iOS ? "live05020301" : "live05020401" : r.default.iOS ? "live05020101" : "live05020201" : r.default.isPad ? r.default.youkuHD ? "live05010501" : "live05010601" : r.default.iku ? r.default.mac ? "live05010401" : "live05010301" : r.default.mac ? "live05010201" : "live05010101", t.default = o, e.exports = t.default
    }, 117: function (e, t, n) {
    }, 118: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), o = n(1), i = n(119), a = u(n(98)), s = u(n(134));

        function u(e) {
            return e && e.__esModule ? e : {default: e}
        }

        function c(e, t) {
            if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return !t || "object" != typeof t && "function" != typeof t ? e : t
        }

        var l = (0, o.createElement)("div", {className: "limit-chat"}), f = function (e) {
            function t() {
                var e, n, r;
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t);
                for (var o = arguments.length, i = Array(o), s = 0; s < o; s++)i[s] = arguments[s];
                return n = r = c(this, (e = t.__proto__ || Object.getPrototypeOf(t)).call.apply(e, [this].concat(i))), r.chatError = function (e) {
                    "FAIL_SYS_SESSION_EXPIRED" === e.data.ailpRetCode && a.default.doLogin()
                }, c(r, n)
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, s.default), r(t, [{
                key: "render", value: function () {
                    var e = this, t = this.props, n = t.appId, r = t.roomId, a = t.chatWidgetId, s = t.roomAnchorId, u = t.roomScreenId, c = t.closeChatEchoImmediately, f = this.state.chatExData;
                    return a ? [(0, o.createElement)(i.WidgetChatList, {
                        ref: "widgetChatList",
                        key: "chatList",
                        keyboardType: "default",
                        appId: n,
                        roomId: r,
                        widgetId: a,
                        limit: "100",
                        loadHistory: !0,
                        cellControl: function (t) {
                            return e.chatListCellControl(t)
                        },
                        maxDelayTime: 200,
                        minDelayTime: 100
                    }), a && (0, o.createElement)(i.WidgetChatInput, {
                        ref: "widgetChatInput",
                        inputRef: "chatInputText",
                        key: "chatInput",
                        appId: n,
                        roomId: r,
                        limit: "30",
                        placeholder: "来聊两句吧~",
                        widgetId: a,
                        exLogApp: "pc",
                        exAnchorId: s,
                        exScreenId: u,
                        chatExData: f,
                        onSuccess: !c && this.chatSuccess,
                        onError: this.chatError,
                        clearInput: !0
                    })] : l
                }
            }]), t
        }();
        t.default = f, e.exports = t.default
    }, 119: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.WidgetChatInput = t.ChatExDataBuilder = t.WidgetChatList = void 0;
        var r = a(n(120)), o = a(n(129)), i = a(n(123));

        function a(e) {
            return e && e.__esModule ? e : {default: e}
        }

        t.WidgetChatList = r.default, t.ChatExDataBuilder = i.default, t.WidgetChatInput = o.default
    }, 120: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r, o, i = Object.assign || function (e) {
                for (var t = 1; t < arguments.length; t++) {
                    var n = arguments[t];
                    for (var r in n)Object.prototype.hasOwnProperty.call(n, r) && (e[r] = n[r])
                }
                return e
            }, a = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), s = n(1), u = l(n(121)), c = l(n(125));

        function l(e) {
            return e && e.__esModule ? e : {default: e}
        }

        var f = (o = r = function (e) {
            function t() {
                return function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t), function (e, t) {
                    if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).apply(this, arguments))
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, u.default), a(t, [{
                key: "render", value: function () {
                    var e = this.props;
                    return (0, s.createElement)(c.default, i({ref: "yklChatList"}, e))
                }
            }]), t
        }(), r.defaultProps = i({}, u.default.defaultProps), o);
        t.default = f, e.exports = t.default
    }, 121: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r, o, i = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), a = n(1), s = f(n(88)), u = n(122), c = f(n(123)), l = f(n(124));

        function f(e) {
            return e && e.__esModule ? e : {default: e}
        }

        var p = (o = r = function (e) {
            function t(e) {
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t);
                var n = function (e, t) {
                    if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                return n.tryToSetQueue(), s.default.io.on("interact_chat", function (e) {
                    var t = e.widgetId, r = e.data;
                    if (n.props.widgetId && t == n.props.widgetId) {
                        var o = new c.default(r.d);
                        o.source = "socket", n.addChatMessage(r.m, o, !0)
                    }
                }), n
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, a.Component), i(t, [{
                key: "componentDidMount", value: function () {
                    this.getChatHistory()
                }
            }, {
                key: "componentWillReceiveProps", value: function () {
                    this.tryToSetQueue()
                }
            }, {
                key: "getChatHistory", value: function () {
                    var e = this, t = this.props, n = t.appId, r = t.roomId, o = t.widgetId;
                    t.loadHistory && (0, u.history)(n, r, o).then(function (t) {
                        for (var n = t.data.result, r = n.length - 1; r >= 0; r--) {
                            var o = new c.default(n[r].data, n[r].userId);
                            o.source = "history", e.addChatMessage(n[r].content, o, !0)
                        }
                    }).catch(function (e) {
                        console.log(e)
                    })
                }
            }, {
                key: "addChatMessage", value: function (e, t, n) {
                    var r = this;
                    if (!(t = this.props.cellControl(t)))return !1;
                    n && this.delayQueue ? this.delayQueue.add(function () {
                        r.addChatMessage(e, t, !1)
                    }) : this.refs.yklChatList && this.refs.yklChatList.addChatListMessage(e, t)
                }
            }, {
                key: "tryToSetQueue", value: function () {
                    var e = this.props, t = e.minDelayTime, n = e.maxDelayTime;
                    t > 0 && n > t && (this.delayQueue || (this.delayQueue = new l.default), this.delayQueue.maxChatLimit = n, this.delayQueue.minChatLimit = t)
                }
            }]), t
        }(), r.defaultProps = {
            widgetId: "",
            roomId: "",
            appId: "",
            loadHistory: !0,
            style: {},
            tag: "inline",
            limit: "100",
            cellControl: function (e) {
                return e
            },
            newMsgTipBgColor: "000000",
            newMsgTipBgAlpha: "FF",
            newMsgTipTextColor: "000000",
            newMsgTipBorderColor: "000000",
            maxDelayTime: 0,
            minDelayTime: 0
        }, o);
        t.default = p, e.exports = t.default
    }, 122: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.sendMessage = t.history = void 0;
        var r = n(28);
        t.history = function (e, t, n) {
            return r.mtop.request({
                api: "mtop.youku.live.interact.chat.room.history",
                v: "1.0",
                data: {appId: e, roomId: t, instanceId: n},
                ecode: 0
            })
        }, t.sendMessage = function (e, t, n) {
            var o = arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : "", i = arguments.length > 4 && void 0 !== arguments[4] ? arguments[4] : "{}", a = arguments.length > 5 && void 0 !== arguments[5] ? arguments[5] : "ailp", s = arguments.length > 6 && void 0 !== arguments[6] ? arguments[6] : "ailp", u = arguments.length > 7 && void 0 !== arguments[7] ? arguments[7] : "ailp";
            return r.mtop.request({
                api: "mtop.youku.live.interact.chat.room.chat",
                v: "1.0",
                type: "POST",
                data: {appId: e, instanceId: n, roomId: t, content: o, data: i, logApp: a, anchorId: s, screenId: u},
                ecode: 1
            })
        }
    }, 123: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }();

        function o(e, t) {
            if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
        }

        var i = function () {
            function e() {
                var t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : 0, n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : 0, r = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : 0, i = arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : 1;
                o(this, e), this.r = t, this.g = n, this.b = r, this.a = i
            }

            return r(e, [{
                key: "hex", value: function () {
                    var e = this;
                    return (arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "rgba").split("").map(function (t) {
                        var n = t.toLowerCase(), r = e[t];
                        return "a" == n && (r = parseInt(255 * r)), function () {
                            var e = (arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : 0).toString(16).toUpperCase();
                            return 1 == e.length && (e = "0" + e), e
                        }(r)
                    }).join("")
                }
            }, {
                key: "cssRgba", value: function () {
                    return "rgba(" + this.r + "," + this.g + "," + this.b + "," + this.a + ")"
                }
            }]), e
        }(), a = function () {
            function e(t, n) {
                o(this, e), this.deviceId = "", this.roomTitle = "", this.userName = "", this.userFace = "", this.userId = "", this.vip = 0, this.faceIcon = "", this.afterNameIcon = [], this.beforeNameIcon = [], this.source = "unknow", this.nameColor = new i(0, 0, 0, 1), this.backgroundColor = new i(255, 255, 255, 1), this.messageColor = new i(0, 0, 0, 1), t && this.parseSocketExData(t, n)
            }

            return r(e, [{
                key: "setNameColor", value: function (e, t, n, r) {
                    this.nameColor = new i(e, t, n, r)
                }
            }, {
                key: "setBackgroundColor", value: function (e, t, n, r) {
                    this.backgroundColor = new i(e, t, n, r)
                }
            }, {
                key: "setMessageColor", value: function (e, t, n, r) {
                    this.messageColor = new i(e, t, n, r)
                }
            }, {
                key: "setClassName", value: function (e) {
                    this.className = e
                }
            }, {
                key: "parseSocketExData", value: function () {
                    var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {}, t = arguments[1];
                    try {
                        e = JSON.parse(e)
                    } catch (t) {
                        e = {}
                    }
                    return e.vip && e.vip.isGoldVip && (e.vip = 100002), this.deviceId = e.did, this.roomTitle = e.lt, this.userName = e.u, this.userFace = e.uf, this.userId = t || e.uid, this.vip = e.vip, this.afterNameIcon = [e.cf || ""], this
                }
            }, {
                key: "toSocketExString", value: function () {
                    return JSON.stringify({
                        did: this.deviceId,
                        lt: this.roomTitle,
                        u: this.userName,
                        uf: this.userFace,
                        uid: this.userId,
                        vip: this.vip,
                        cf: this.afterNameIcon[0]
                    })
                }
            }]), e
        }();
        t.default = a, e.exports = t.default
    }, 124: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }();
        var o = function () {
            function e() {
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, e), this.queue = [], this.running = !1, this.maxChatLimit = 0, this.minChatLimit = 0
            }

            return r(e, [{
                key: "getRandomLimit", value: function () {
                    var e = this.maxChatLimit, t = this.minChatLimit;
                    return Math.floor(Math.random() * (e - t) + t)
                }
            }, {
                key: "run", value: function () {
                    if (this.running)return !1;
                    this.running = !0, this._run()
                }
            }, {
                key: "_run", value: function () {
                    var e = this, t = this.queue.shift();
                    if (!t)return this.running = !1, !1;
                    t();
                    var n = this.getRandomLimit();
                    setTimeout(function () {
                        e._run()
                    }, n)
                }
            }, {
                key: "add", value: function () {
                    var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : function () {
                    };
                    arguments[1], this.queue.push(e), this.run()
                }
            }]), e
        }();
        t.default = o, e.exports = t.default
    }, 125: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.default = void 0;
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), o = n(1), i = s(n(126)), a = s(n(127));

        function s(e) {
            return e && e.__esModule ? e : {default: e}
        }

        n(128);
        var u = (0, o.createElement)("div", {className: "shafa"}, (0, o.createElement)("span", {className: "shafaIcon"}, "沙发很寂寞~")), c = function (e) {
            function t() {
                return function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t), function (e, t) {
                    if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).apply(this, arguments))
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, i.default), r(t, [{
                key: "render", value: function () {
                    var e = this.state.chatMessages;
                    return (0, o.createElement)("div", {
                        ref: "container",
                        className: "chatList"
                    }, e.length ? (0, o.createElement)("ul", {ref: "list"}, e.map(function (e) {
                        var t = e.msg, n = e.chatExData;
                        return (0, o.createElement)(a.default, {msg: t, chatExData: n})
                    })) : u)
                }
            }, {
                key: "scrollToBottom", value: function () {
                    var e = this.refs, t = e.container, n = e.list;
                    n && (t.scrollTop = n.getBoundingClientRect().height)
                }
            }]), t
        }();
        t.default = c, e.exports = t.default
    }, 126: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.default = void 0;
        var r, o, i = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), a = n(1);

        function s(e, t) {
            if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return !t || "object" != typeof t && "function" != typeof t ? e : t
        }

        var u = (o = r = function (e) {
            function t() {
                var e, n, r;
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t);
                for (var o = arguments.length, i = Array(o), a = 0; a < o; a++)i[a] = arguments[a];
                return n = r = s(this, (e = t.__proto__ || Object.getPrototypeOf(t)).call.apply(e, [this].concat(i))), r.state = {chatMessages: []}, s(r, n)
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, a.Component), i(t, [{
                key: "componentDidUpdate", value: function () {
                    var e = this.state.chatMessages, t = this.props.limit;
                    t = parseInt(t), e.length > t ? this.setState({chatMessages: e.slice(-1 * t)}) : this.scrollToBottom()
                }
            }, {
                key: "addChatListMessage", value: function (e, t) {
                    var n = this.state.chatMessages, r = this.props.limit;
                    if (r = parseInt(r), n = n.concat([{msg: e, chatExData: t}]), r && r > 0 && n.length > r) {
                        var o = parseInt(r / 10);
                        n = n.slice(o)
                    }
                    this.setState({chatMessages: n})
                }
            }, {
                key: "scrollToBottom", value: function () {
                    throw new Error("please implemation methods [scrollToBottom:void]")
                }
            }]), t
        }(), r.defaultProps = {
            style: {},
            tag: "inline",
            limit: "100",
            newMsgTipBgColor: "000000",
            newMsgTipBgAlpha: "FF",
            newMsgTipTextColor: "000000",
            newMsgTipBorderColor: "000000"
        }, o);
        t.default = u, e.exports = t.default
    }, 127: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = n(1), o = (0, r.createElement)("i", {className: "vipIcon"});
        t.default = function (e) {
            var t = e.msg, n = e.chatExData;
            return (0, r.createElement)("li", {className: n.className}, (0, r.createElement)("img", {
                className: "avatar",
                src: n.userFace
            }), o, (0, r.createElement)("div", {className: "details"}, (0, r.createElement)("em", {className: "name"}, n.userName, ":"), (0, r.createElement)("p", {className: "comment"}, t)))
        }, e.exports = t.default
    }, 128: function (e, t, n) {
    }, 129: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), o = n(1), i = s(n(75)), a = s(n(130));

        function s(e) {
            return e && e.__esModule ? e : {default: e}
        }

        n(133);
        var u = function (e) {
            function t(e) {
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t);
                var n = function (e, t) {
                    if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                return n.state = {value: ""}, n.handleChange = function (e) {
                    n.setState({value: e.target.value})
                }, n.handleKeyUp = function (e) {
                    13 === e.keyCode && n.postMsg()
                }, n.postMsg = function () {
                    var e = n.state.value;
                    /\S/.test(e) && (n.sendMessage(e), !0 === n.props.clearInput && n.setState({value: ""})), i.default.CK("talk.now", "button-talk-now")
                }, n
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, a.default), r(t, [{
                key: "render", value: function () {
                    return (0, o.createElement)("div", {className: "chatInput"}, (0, o.createElement)("input", {
                        className: "chatInputText",
                        value: this.state.value,
                        onChange: this.handleChange,
                        onKeyUp: this.handleKeyUp,
                        type: "text",
                        maxlength: this.props.limit,
                        placeholder: this.props.placeholder
                    }), (0, o.createElement)("button", {
                        className: "chatInputBtn",
                        onClick: this.postMsg,
                        type: "button",
                        title: "回车键也可发送"
                    }, "发送"))
                }
            }]), t
        }();
        t.default = u, e.exports = t.default
    }, 130: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r, o, i = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), a = n(1), s = n(28), u = n(122), c = n(55);
        !function (e) {
            e && e.__esModule
        }(n(68));
        n(131);
        var l = (o = r = function (e) {
            function t() {
                return function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t), function (e, t) {
                    if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).apply(this, arguments))
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, a.Component), i(t, [{
                key: "sendMessage", value: function (e) {
                    var t = this.props, n = t.appId, r = t.roomId, o = t.widgetId, i = t.exLogApp, a = t.exAnchorId, c = t.exScreenId, l = t.chatExData, f = t.onError, p = t.onSuccess;
                    (0, u.sendMessage)(n, r, o, e, l.toSocketExString(), i, a, c).then(function () {
                        l.source = "sendSuccess", p(e, l)
                    }).catch(function (e) {
                        f(new s.AilpError(1e3, e.ailpRetMessage || "发送失败", e))
                    })
                }
            }, {
                key: "config", value: function (e) {
                }
            }, {
                key: "openKeyboard", value: function (e) {
                    var t = this, n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                    if (!this.props.canOpenKeyBoard())return !1;
                    var r = this.props, o = r.limit, i = r.orientation, a = r.placeholder, s = null;
                    (s = this.refs.webKeyboard) && (c.Track.clickLog("button-talk-now", "talk.now", {interact_type: 2}), s.open({
                        orientation: i,
                        tag: "default",
                        topic: "",
                        limit: o + "",
                        placeholder: a,
                        text: e || this.props.keyWord,
                        showYell: n.showYell || !1
                    }, function (e) {
                        var n = e.result, r = e.text;
                        "send" == n && r && (t.closeKeyBoard(), t.sendMessage(r))
                    })), this.props.clickCallBack && this.props.clickCallBack()
                }
            }, {
                key: "closeKeyBoard", value: function () {
                    var e = null;
                    (e = this.refs.webKeyboard) && e.close()
                }
            }]), t
        }(), r.defaultProps = {
            orientation: s.consts.SCREEN_PORTRAIT,
            limit: "100",
            placeholder: "",
            appId: "",
            widgetId: "",
            roomId: "",
            exLogApp: "",
            exAnchorId: "",
            exScreenId: "",
            keyWord: "",
            chatExData: null,
            onSuccess: function () {
            },
            onError: function () {
            },
            canOpenKeyBoard: function () {
                return !0
            },
            clickCallBack: function () {
            },
            onOpenKeyboard: function () {
            }
        }, o);
        t.default = l, e.exports = t.default
    }, 131: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = Object.assign || function (e) {
                for (var t = 1; t < arguments.length; t++) {
                    var n = arguments[t];
                    for (var r in n)Object.prototype.hasOwnProperty.call(n, r) && (e[r] = n[r])
                }
                return e
            }, o = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), i = n(1), a = l(n(5)), s = l(n(132)), u = l(n(9)), c = l(n(7));

        function l(e) {
            return e && e.__esModule ? e : {default: e}
        }

        function f(e, t) {
            if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return !t || "object" != typeof t && "function" != typeof t ? e : t
        }

        var p = {
            container: {position: "fixed", left: 0, top: 0, right: 0, bottom: 0, zIndex: 100},
            mask: {position: "absolute", left: 0, top: 0, right: 0, bottom: 0, backgroundColor: "rgba(0, 0, 0, 0.5)"},
            inputContainer: {
                position: "absolute",
                left: 0,
                top: 0,
                right: 0,
                height: "40px",
                backgroundColor: "#FFFFFF",
                flexDirection: "row"
            },
            input: {height: "40px", width: "600rem", backgroundColor: "#FFFFFF", color: "#000000", borderRadius: 0},
            sendBtn: {
                height: "40px",
                width: "150rem",
                backgroundColor: "rgb(38, 146, 255)",
                alignItems: "center",
                justifyContent: "center"
            },
            sendBtnText: {color: "#FFFFFF", fontSize: "16px"}
        }, d = function (e) {
            function t() {
                var e, n, r;
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t);
                for (var o = arguments.length, i = Array(o), a = 0; a < o; a++)i[a] = arguments[a];
                return n = r = f(this, (e = t.__proto__ || Object.getPrototypeOf(t)).call.apply(e, [this].concat(i))), r.state = {
                    isOpen: !1,
                    placeholder: "",
                    textValue: "",
                    callback: function () {
                    }
                }, f(r, n)
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, i.Component), o(t, [{
                key: "render", value: function () {
                    var e = this, t = this.state, n = t.isOpen, o = t.placeholder, l = t.textValue, f = n ? p.container : {display: "none"}, d = r({}, p.sendBtn);
                    return "" == l && (d.backgroundColor = "#CCCCCC"), (0, i.createElement)(a.default, {
                        ref: "webKeyboard",
                        style: f
                    }, (0, i.createElement)(u.default, {
                        style: p.mask, onPress: function () {
                            e.close()
                        }
                    }), (0, i.createElement)(a.default, {style: p.inputContainer}, (0, i.createElement)(s.default, {
                        ref: "input",
                        style: p.input,
                        placeholder: o,
                        onInput: function (t) {
                            e.change(t)
                        }
                    }), (0, i.createElement)(u.default, {
                        style: d, onPress: function () {
                            e.send()
                        }
                    }, (0, i.createElement)(c.default, {style: p.sendBtnText}, "发送"))))
                }
            }, {
                key: "send", value: function () {
                    this.state.callback({result: "send", text: this.state.textValue})
                }
            }, {
                key: "change", value: function (e) {
                    this.setState({textValue: e.value})
                }
            }, {
                key: "open", value: function (e, t) {
                    var n = (0, i.findDOMNode)(this.refs.webKeyboard);
                    n.parentNode != document.body && document.body.appendChild(n), this.refs.input.clear(), this.setState({
                        isOpen: !0,
                        placeholder: e.placeholder,
                        callback: t,
                        textValue: ""
                    }), this.refs.input.focus(), window.screenTop = 0
                }
            }, {
                key: "close", value: function () {
                    this.setState({
                        callback: function () {
                        }, isOpen: !1
                    })
                }
            }]), t
        }();
        t.default = d, e.exports = t.default
    }, 132: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.default = void 0;
        var r = n(1), o = {isWeex: !1, isWeb: !0, isNode: !1, isReactNative: !1};

        function i(e) {
            return (i = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
                return typeof e
            } : function (e) {
                return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
            })(e)
        }

        function a() {
            return (a = Object.assign || function (e) {
                    for (var t = 1; t < arguments.length; t++) {
                        var n = arguments[t];
                        for (var r in n)Object.prototype.hasOwnProperty.call(n, r) && (e[r] = n[r])
                    }
                    return e
                }).apply(this, arguments)
        }

        function s(e) {
            for (var t = 1; t < arguments.length; t++) {
                var n = null != arguments[t] ? arguments[t] : {}, r = Object.keys(n);
                "function" == typeof Object.getOwnPropertySymbols && (r = r.concat(Object.getOwnPropertySymbols(n).filter(function (e) {
                    return Object.getOwnPropertyDescriptor(n, e).enumerable
                }))), r.forEach(function (t) {
                    p(e, t, n[t])
                })
            }
            return e
        }

        function u(e, t) {
            for (var n = 0; n < t.length; n++) {
                var r = t[n];
                r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
            }
        }

        function c(e) {
            return (c = Object.setPrototypeOf ? Object.getPrototypeOf : function (e) {
                return e.__proto__ || Object.getPrototypeOf(e)
            })(e)
        }

        function l(e, t) {
            return (l = Object.setPrototypeOf || function (e, t) {
                    return e.__proto__ = t, e
                })(e, t)
        }

        function f(e) {
            if (void 0 === e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return e
        }

        function p(e, t, n) {
            return t in e ? Object.defineProperty(e, t, {
                value: n,
                enumerable: !0,
                configurable: !0,
                writable: !0
            }) : e[t] = n, e
        }

        var d = {
            default: "text",
            "ascii-capable": "text",
            "numbers-and-punctuation": "number",
            url: "url",
            "number-pad": "number",
            "phone-pad": "tel",
            "name-phone-pad": "text",
            "email-address": "email",
            "decimal-pad": "number",
            twitter: "text",
            "web-search": "search",
            numeric: "number"
        };

        function h(e) {
            return o.isWeex ? e.value : e.target.value
        }

        function m(e) {
            var t = h(e);
            return {nativeEvent: {text: t}, originalEvent: e, value: t, target: e.target}
        }

        var v = function (e) {
            function t() {
                var e, n;
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t);
                for (var o = arguments.length, a = new Array(o), s = 0; s < o; s++)a[s] = arguments[s];
                return p(f(f(n = function (e, t) {
                    return !t || "object" !== i(t) && "function" != typeof t ? f(e) : t
                }(this, (e = c(t)).call.apply(e, [this].concat(a))))), "handleInput", function (e) {
                    n.props.onInput(m(e))
                }), p(f(f(n)), "handleChange", function (e) {
                    if (n.props.onChange && n.props.onChange(m(e)), n.props.onChangeText) {
                        var t = h(e);
                        n.props.onChangeText(t)
                    }
                }), p(f(f(n)), "handleFocus", function (e) {
                    n.props.onFocus(m(e))
                }), p(f(f(n)), "handleBlur", function (e) {
                    n.props.onBlur(m(e))
                }), p(f(f(n)), "focus", function () {
                    n.refs.input.focus && n.refs.input.focus()
                }), p(f(f(n)), "blur", function () {
                    n.refs.input.blur && n.refs.input.blur()
                }), p(f(f(n)), "clear", function () {
                    (0, r.setNativeProps)(n.refs.input, {value: ""})
                }), n
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function");
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        writable: !0,
                        configurable: !0
                    }
                }), t && l(e, t)
            }(t, r.Component), function (e, t, n) {
                t && u(e.prototype, t), n && u(e, n)
            }(t, [{
                key: "componentWillReceiveProps", value: function (e) {
                    (0, r.setNativeProps)(this.refs.input, {value: e.value})
                }
            }, {
                key: "render", value: function () {
                    var e = this.props, t = e.accessibilityLabel, n = e.autoComplete, i = e.editable, u = e.keyboardType, c = e.maxNumberOfLines, l = e.maxLength, f = e.maxlength, p = e.multiline, h = e.numberOfLines, m = e.onBlur, v = e.onFocus, g = e.onChange, b = e.onChangeText, w = e.onInput, _ = e.password, x = e.secureTextEntry, E = e.style, k = e.value, T = e.defaultValue, C = s({}, this.props, {
                        "aria-label": t,
                        autoComplete: n && "on",
                        maxlength: f || l,
                        onChange: (g || b) && this.handleChange,
                        onInput: w && this.handleInput,
                        onBlur: m && this.handleBlur,
                        onFocus: v && this.handleFocus,
                        style: s({}, y.initial, E),
                        ref: "input"
                    });
                    k ? delete C.defaultValue : C.value = T, void 0 === i || i || (C.readOnly = !0);
                    var S, P = d[u];
                    if ((_ || x) && (P = "password"), o.isWeex) {
                        var O = Boolean(C.readOnly);
                        return p ? (0, r.createElement)("textarea", a({}, C, {
                            rows: 20,
                            disabled: O
                        })) : (0, r.createElement)("input", a({}, C, {type: P, disabled: O}))
                    }
                    if (p) {
                        var j = {maxRows: c || h, minRows: h};
                        S = (0, r.createElement)("textarea", a({}, C, j), C.value)
                    } else S = (0, r.createElement)("input", a({}, C, {type: P}));
                    return S
                }
            }]), t
        }();
        p(v, "propTypes", {});
        var y = {
            initial: {
                appearance: "none",
                backgroundColor: "transparent",
                borderColor: "#000000",
                borderWidth: 0,
                boxSizing: "border-box",
                color: "#000000",
                padding: 0,
                paddingLeft: 24,
                fontSize: 24,
                lineHeight: 60,
                height: 60
            }
        }, g = v;
        t.default = g, e.exports = t.default
    }, 133: function (e, t, n) {
    }, 134: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), o = n(1), i = n(135), a = function (e) {
            if (e && e.__esModule)return e;
            var t = {};
            if (null != e)for (var n in e)Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
            return t.default = e, t
        }(n(59));

        function s(e, t) {
            if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return !t || "object" != typeof t && "function" != typeof t ? e : t
        }

        var u = function (e) {
            function t() {
                var e, n, r;
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t);
                for (var o = arguments.length, i = Array(o), a = 0; a < o; a++)i[a] = arguments[a];
                return n = r = s(this, (e = t.__proto__ || Object.getPrototypeOf(t)).call.apply(e, [this].concat(i))), r.state = {
                    chatExData: null,
                    openDanmuInput: !0
                }, r.chatSuccess = function (e, t) {
                    r.refs.widgetChatList.addChatMessage(e, t, !0)
                }, r.chatError = function (e) {
                    alert(e.msg)
                }, s(r, n)
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, o.Component), r(t, [{
                key: "componentDidMount", value: function () {
                    this.setChatExData(this.props)
                }
            }, {
                key: "componentWillReceiveProps", value: function (e) {
                    this.setChatExData(e)
                }
            }, {
                key: "setChatExData", value: function (e) {
                    var t = e.userNumberId, n = e.userDeviceId, r = e.roomTitle, o = e.userName, a = e.userFaceUrl, s = e.userVip, u = e.iconAfterChatName, c = new i.ChatExDataBuilder;
                    c.deviceId = n, c.roomTitle = r, c.userName = o, c.userFace = a, c.userId = t, c.vip = s, c.vip && (c.faceIcon = "https://gw.alicdn.com/tfs/TB1kEErFDtYBeNjy1XdXXXXyVXa-51-51.png"), u && u.length > 0 && (c.afterNameIcon = u), this.setState({chatExData: c})
                }
            }, {
                key: "chatListCellControl", value: function (e) {
                    var t = this.props, n = t.userNumberId, r = t.roomAnchorId, o = t.userDeviceId, i = t.tag;
                    return "socket" == e.source && e.deviceId == o ? null : (e.userId && r == e.userId ? i && "default" == i ? (e.setNameColor(255, 146, 16, 1), e.setMessageColor(255, 146, 16, 1), e.setBackgroundColor(21, 21, 21, .77)) : (e.setNameColor(37, 145, 254, 1), e.setMessageColor(37, 145, 254, 1), e.setBackgroundColor(21, 21, 21, .3)) : (i && "default" == i ? (e.setBackgroundColor(21, 21, 21, .77), e.setMessageColor(255, 255, 255, 1)) : (e.setBackgroundColor(255, 255, 255, 0), e.setMessageColor(104, 104, 104, 1)), e.userId && n == e.userId && e.vip ? i && "default" == i ? (e.setNameColor(252, 179, 60, 1), e.setBackgroundColor(184, 154, 88, .46)) : (e.setNameColor(250, 81, 95, 1), e.setClassName("vip own")) : e.vip ? i && "default" == i ? e.setNameColor(252, 179, 60, 1) : (e.setNameColor(250, 81, 95, 1), e.setClassName("vip")) : e.userId && n == e.userId ? i && "default" == i ? (e.setNameColor(255, 255, 255, 1), e.setBackgroundColor(38, 146, 255, .46)) : (e.setNameColor(223, 68, 225, 1), e.setClassName("own")) : i && "default" == i ? e.setNameColor(204, 204, 204, 1) : e.setNameColor(37, 145, 254, 1), e.vip && (e.faceIcon = "https://gw.alicdn.com/tfs/TB1kEErFDtYBeNjy1XdXXXXyVXa-51-51.png")), e.userName = a.cutZhFont(e.userName, 14), e)
                }
            }]), t
        }();
        t.default = u, e.exports = t.default
    }, 135: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.ChatExDataBuilder = t.WidgetChatInput = t.WidgetChatList = void 0;
        var r = a(n(136)), o = a(n(139)), i = a(n(123));

        function a(e) {
            return e && e.__esModule ? e : {default: e}
        }

        t.WidgetChatList = r.default, t.WidgetChatInput = o.default, t.ChatExDataBuilder = i.default
    }, 136: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r, o, i = Object.assign || function (e) {
                for (var t = 1; t < arguments.length; t++) {
                    var n = arguments[t];
                    for (var r in n)Object.prototype.hasOwnProperty.call(n, r) && (e[r] = n[r])
                }
                return e
            }, a = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), s = n(1), u = function (e) {
            return e && e.__esModule ? e : {default: e}
        }(n(121));
        var c;
        c = n(137);
        var l = (o = r = function (e) {
            function t() {
                return function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t), function (e, t) {
                    if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).apply(this, arguments))
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, u.default), a(t, [{
                key: "render", value: function () {
                    var e = this.props;
                    return c && (0, s.createElement)(c, i({ref: "yklChatList"}, e))
                }
            }]), t
        }(), r.defaultProps = i({}, u.default.defaultProps), o);
        t.default = l, e.exports = t.default
    }, 137: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.default = void 0;
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), o = Object.assign || function (e) {
                for (var t = 1; t < arguments.length; t++) {
                    var n = arguments[t];
                    for (var r in n)Object.prototype.hasOwnProperty.call(n, r) && (e[r] = n[r])
                }
                return e
            }, i = n(1), a = u(n(126)), s = u(n(138));

        function u(e) {
            return e && e.__esModule ? e : {default: e}
        }

        var c = {
            border: "0 solid black",
            position: "relative",
            boxSizing: "border-box",
            display: "flex",
            flexDirection: "column",
            alignContent: "flex-start",
            flexShrink: 0,
            margin: 0,
            padding: 0
        }, l = {container: o({}, c, {overflowY: "scroll"}), ul: o({}, c), li: o({}, c)}, f = function (e) {
            function t() {
                return function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t), function (e, t) {
                    if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).apply(this, arguments))
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, a.default), r(t, [{
                key: "render", value: function () {
                    var e = this.state.chatMessages, t = o({}, l.container, this.props.style);
                    return (0, i.createElement)("div", {ref: "container", style: t}, (0, i.createElement)("ul", {
                        ref: "list",
                        style: l.ul
                    }, e.map(function (e) {
                        var t = e.msg, n = e.chatExData;
                        return (0, i.createElement)(s.default, {msg: t, chatExData: n})
                    })))
                }
            }, {
                key: "scrollToBottom", value: function () {
                    var e = this.refs, t = e.container, n = e.list;
                    t.scrollTop = n.getBoundingClientRect().height
                }
            }]), t
        }();
        t.default = f, e.exports = t.default
    }, 138: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = n(1), o = {
            faceContainerStyle: {position: "relative", paddingRight: "4px", width: "20px", height: "20px"},
            faceStyle: {width: "20px", height: "20px", borderRadius: "10px", verticalAlign: "top"},
            faceIconStyle: {
                position: "absolute",
                right: 0,
                bottom: 0,
                width: "12px",
                height: "12px",
                borderRadius: "5px"
            }
        };
        t.default = function (e) {
            var t = e.msg, n = e.chatExData, i = {
                marginRight: "4px",
                color: n.nameColor.cssRgba(),
                fontSize: "14px",
                wordBreak: "keep-all"
            }, a = {color: n.messageColor.cssRgba(), fontSize: "14px", lineHeight: "18px", wordBreak: "break-all"};
            return (0, r.createElement)("li", {style: {marginBottom: "5px"}}, (0, r.createElement)("span", {style: o.faceContainerStyle}, (0, r.createElement)("img", {
                style: o.faceStyle,
                src: n.userFace
            }), n.faceIcon && (0, r.createElement)("img", {
                    style: o.faceIconStyle,
                    src: n.faceIcon
                })), (0, r.createElement)("span", {style: i}, n.userName), (0, r.createElement)("span", {style: a}, t))
        }, e.exports = t.default
    }, 139: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r, o, i = Object.assign || function (e) {
                for (var t = 1; t < arguments.length; t++) {
                    var n = arguments[t];
                    for (var r in n)Object.prototype.hasOwnProperty.call(n, r) && (e[r] = n[r])
                }
                return e
            }, a = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), s = n(1), u = (l(n(7)), l(n(9))), c = l(n(130));
        l(n(8));
        function l(e) {
            return e && e.__esModule ? e : {default: e}
        }

        var f;
        f = n(131);
        var p = (o = r = function (e) {
            function t() {
                return function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t), function (e, t) {
                    if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).apply(this, arguments))
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, c.default), a(t, [{
                key: "componentDidMount", value: function () {
                    this.closeKeyBoard()
                }
            }, {
                key: "render", value: function () {
                    var e = this, t = this.props, n = t.style, r = t.renderItem, o = t.renderYell, a = [(0, s.createElement)(u.default, {
                        style: i({}, n),
                        onPress: function () {
                            e.openKeyboard(), e.props.onOpenKeyboard()
                        }
                    }, r ? r(this.props) : null), o ? o(this.props) : null];
                    return a.push((0, s.createElement)(f, {ref: "webKeyboard"})), a
                }
            }]), t
        }(), r.defaultProps = i({}, c.default.defaultProps), o);
        t.default = p, e.exports = t.default
    }, 140: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), o = n(1), i = u(n(2)), a = u(n(75)), s = u(n(141));

        function u(e) {
            return e && e.__esModule ? e : {default: e}
        }

        n(142);
        var c = (0, o.createElement)("div", {className: "itemShadow"}), l = (0, o.createElement)("span", {class: "prev mbtn"}, (0, o.createElement)("a", {href: "javascript:;"})), f = (0, o.createElement)("span", {class: "prevBtn mBtn"}), p = (0, o.createElement)("span", {class: "next mbtn"}, (0, o.createElement)("a", {href: "javascript:;"})), d = (0, o.createElement)("span", {class: "nextBtn mBtn"}), h = function (e) {
            function t(e) {
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t);
                var n = function (e, t) {
                    if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                return n.state = {indexTab: 0}, n.streamList = [], n
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, o.Component), r(t, [{
                key: "onSelect", value: function (e, t) {
                    this.setState({indexTab: e}), window.spvPlayer[0].EventManager.fire("view:change", t), a.default.CK("fplayer.view", "button-fplayer-view", {
                        index: e,
                        sceneId: t
                    })
                }
            }, {
                key: "componentDidMount", value: function () {
                    this.streamList.length > 1 && (0, s.default)(".ScreenView", {showArrow: !0})
                }
            }, {
                key: "renderItem", value: function () {
                    var e = this, t = this.state.indexTab;
                    return (0, o.createElement)("div", {className: "ScreenViewCon panel"}, this.streamList.map(function (n, r) {
                        var a = (0, i.default)("ScreenViewItem", {current: r === t});
                        return (0, o.createElement)("div", {
                            className: a,
                            onClick: e.onSelect.bind(e, r, n.sceneId)
                        }, (0, o.createElement)("img", {
                            className: "itemImg",
                            src: n.imgMUrl
                        }), c, (0, o.createElement)("span", {className: "itemName"}, n.name))
                    }))
                }
            }, {
                key: "render", value: function () {
                    var e = this.props, t = e.roomState, n = e.stream;
                    return this.streamList = n, (0, o.createElement)("div", {className: "screen"}, this.streamList.length > 1 && 1 === t && (0, o.createElement)("div", {className: "ScreenView"}, (0, o.createElement)("div", {
                            className: "ScreenViewList modPSlide",
                            id: "ScreenViewList"
                        }, (0, o.createElement)("div", {className: "ScreenViewSlide"}, this.renderItem()), l, f, p, d)))
                }
            }]), t
        }();
        t.default = h, e.exports = t.default
    }, 141: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), o = function (e) {
            return e && e.__esModule ? e : {default: e}
        }(n(90));
        var i = function () {
            var e = function () {
                function e(t, n) {
                    !function (e, t) {
                        if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                    }(this, e);
                    var r = this;
                    r.box = t, this.opt = n || {}, this.opt.patchWidth = this.opt.patchWidth || 20, this.showArrow = this.opt.showArrow, r.panel = r.box.find(".panel"), r.current = 0, r.prevBtn = !1, r.nextBtn = !0, setTimeout(function () {
                        r.setPos()
                    }, 100), r.box.delegate(".mBtn", "click", function (e) {
                        e.preventDefault(), r.setPos();
                        var t = (0, o.default)(this).closest(".mBtn").hasClass("nextBtn") ? r.current >= r.step ? r.step : ++r.current : r.current <= 0 ? 0 : --r.current;
                        !function (e, t) {
                            e.animate({left: -t}, 300)
                        }(r.panel, r.pos[t]), r.resetBtn()
                    }), r.box.bind("slider:show", function () {
                        this.setPos()
                    }.bind(r)), (0, o.default)(window).bind("resize", function () {
                        setTimeout(function () {
                            r.panel.is(":visible") && (r.reload(), r.setPos())
                        }, 100)
                    })
                }

                return r(e, [{
                    key: "resetBtn", value: function () {
                        var e = this.box.find(".prevBtn, .nextBtn");
                        switch (this.current) {
                            case 0:
                                e.eq(1).show(), e.eq(0).hide();
                                break;
                            case this.step - 1:
                                e.eq(0).show(), e.eq(1).hide();
                                break;
                            default:
                                e.show()
                        }
                    }
                }, {
                    key: "setPos", value: function () {
                        var e, t = this, n = t.box, r = t.box.width(), i = 0;
                        t.$item = t.panel.children(), t.pos = [0], t.box.attr("id"), t.panel.css({width: 5e4}), o.default.each(t.$item, function (n) {
                            var a = (0, o.default)(this), s = a.width();
                            if (i = a.position().left + s, e = t.pos.length > 0 ? t.pos[t.pos.length - 1] : 0, a.position().left + s > r + e && t.pos.push(a.position().left), n == t.$item.length - 1 && i - r > 0) {
                                var u = t.pos.length;
                                1 == u ? t.pos.push(i - r) : (t.pos[u - 1] = i - r, t.pos[u - 1] == t.pos[u - 2] && t.pos.pop())
                            }
                        }), 1 == t.pos.length && (1 != this.showArrow && n.find(".prevBtn, .nextBtn").hide(), 0 != t.panel[0].offsetLeft && (t.panel.css("left", "0"), t.current = 0)), i < 400 ? i = 5e4 : i += t.opt.patchWidth, t.panel.css({width: i}), t.step = t.pos.length
                    }
                }, {
                    key: "reload", value: function () {
                        this.current = 0, this.panel.css({left: 0}), this.resetBtn()
                    }
                }]), e
            }();
            var t = {};
            return function (n, r) {
                var i, a = (0, o.default)(n) || (0, o.default)(document), s = (0, o.default)(".modPSlide", a);
                s[0] && s.each(function (n, a) {
                    i = (0, o.default)(a).attr("id"), t[i] ? t[i].reload() : t[i] = new e((0, o.default)("#" + i), r)
                })
            }
        }();
        t.default = i, e.exports = t.default
    }, 142: function (e, t, n) {
    }, 143: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), o = n(1), i = s(n(144)), a = s(n(146));

        function s(e) {
            return e && e.__esModule ? e : {default: e}
        }

        n(148);
        var u = function (e) {
            function t(e) {
                return function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t), function (e, t) {
                    if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e))
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, o.Component), r(t, [{
                key: "render", value: function () {
                    var e = this.props, t = e.roomId, n = e.roomTitle, r = e.roomState, s = e.roomDesc, u = e.qrCodeUrl, c = e.widgetShareImgUrl, l = e.widgetShareDescription;
                    return (0, o.createElement)("div", {className: "intro"}, (0, o.createElement)("div", {className: "title"}, (0, o.createElement)("h2", {className: "caption"}, n), (0, o.createElement)("div", {className: "outlets"}, (0, o.createElement)(i.default, {
                        roomState: r,
                        qrCodeUrl: u
                    }), (0, o.createElement)(a.default, {
                        roomId: t,
                        shareImgUrl: c,
                        shareTitle: n,
                        shareDescription: l,
                        qrCodeUrl: u
                    }))), (0, o.createElement)("div", {className: "description"}, (0, o.createElement)("p", {dangerouslySetInnerHTML: {__html: (s || "").replace(/\r\n/g, "<br/>")}})))
                }
            }]), t
        }();
        t.default = u, e.exports = t.default
    }, 144: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), o = n(1);
        n(145);
        var i = (0, o.createElement)("em", null, "扫码用手机继续看"), a = (0, o.createElement)("p", null, "用优酷APP或微信扫码在手机上继续观看", (0, o.createElement)("br", null), "扫码后可分享给好友"), s = function (e) {
            function t(e) {
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t);
                var n = function (e, t) {
                    if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                return n.downLoadIku = function () {
                    window.open("https://iku.youku.com/channelinstall/yweblive")
                }, n
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, o.Component), r(t, [{
                key: "render", value: function () {
                    var e = this.props, t = e.roomState, n = e.qrCodeUrl;
                    return (0, o.createElement)("div", {className: "client"}, 0 === t && (0, o.createElement)("div", {
                            class: "pcClient",
                            onClick: this.downLoadIku
                        }, "客户端看"), (0, o.createElement)("div", {class: "mbClient"}, "手机看", (0, o.createElement)("span", {class: "panel"}, i, (0, o.createElement)("i", {
                        class: "qrcode",
                        style: {backgroundImage: "url(" + n + ")"}
                    }), a)))
                }
            }]), t
        }();
        t.default = s, e.exports = t.default
    }, 145: function (e, t, n) {
    }, 146: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), o = n(1), i = function (e) {
            return e && e.__esModule ? e : {default: e}
        }(n(75));
        n(147);
        var a = function (e) {
            function t(e) {
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t);
                var n = function (e, t) {
                    if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                return n.CK = function (e) {
                    i.default.CK("hplayer.share", "button-share", {share_go: e})
                }, n
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, o.Component), r(t, [{
                key: "render", value: function () {
                    var e = this.props, t = e.roomId, n = e.shareImgUrl, r = e.shareTitle, i = e.shareDescription, a = e.qrCodeUrl, s = "https://vku.youku.com/live/ilproom?id=" + t + "&source=ykliveshare", u = "//sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?to=qzone&title='" + encodeURIComponent(r) + "&url=" + encodeURIComponent(s) + "&summary=" + encodeURIComponent(i), c = "//service.weibo.com/share/share.php?title=" + encodeURIComponent(i) + "'&source=优酷直播&pic=" + n + "&url=" + encodeURIComponent(s), l = "//connect.qq.com/widget/shareqq/index.html?title=" + encodeURIComponent(r) + "&url=" + encodeURIComponent(s) + "&site=优酷直播&pics=" + n + "'&summary=" + encodeURIComponent(i);
                    return (0, o.createElement)("div", {className: "share"}, (0, o.createElement)("span", {class: "shareList"}, "分享给朋友：", (0, o.createElement)("a", {
                        href: "javascript:;",
                        onMouseEnter: this.CK.bind(this, "wechat"),
                        class: "weixin"
                    }, (0, o.createElement)("i", {style: {backgroundImage: "url(" + a + ")"}})), (0, o.createElement)("a", {
                        href: u,
                        onClick: this.CK.bind(this, "qzone"),
                        target: "_blank",
                        class: "qzone"
                    }), (0, o.createElement)("a", {
                        href: c,
                        onClick: this.CK.bind(this, "weibo"),
                        target: "_blank",
                        class: "weibo"
                    }), (0, o.createElement)("a", {
                        href: l,
                        onClick: this.CK.bind(this, "qq"),
                        target: "_blank",
                        class: "qq"
                    })))
                }
            }]), t
        }();
        t.default = a, e.exports = t.default
    }, 147: function (e, t, n) {
    }, 148: function (e, t, n) {
    }, 149: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), o = n(1), i = function (e) {
            return e && e.__esModule ? e : {default: e}
        }(n(150));
        var a = function (e) {
            function t() {
                return function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t), function (e, t) {
                    if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).apply(this, arguments))
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, o.Component), r(t, [{
                key: "render", value: function () {
                    return (0, o.createElement)(i.default, this.props)
                }
            }]), t
        }();
        t.default = a, e.exports = t.default
    }, 15: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.default = function (e, t, n, i) {
            if (!e)return;
            "function" != typeof n && null != n || (i = n, n = {timingFunction: "ease", duration: 0, delay: 0});
            for (var a in t)t[a] = (0, o.convertUnit)(t[a], a);
            if (r.isWeex) {
                var s = __weex_require__("@weex-module/animation");
                s.transition(e.ref, {
                    styles: t,
                    timingFunction: n.timingFunction || "linear",
                    delay: n.delay || 0,
                    duration: n.duration || 0,
                    needLayout: n.needLayout || !1
                }, i || function () {
                    })
            } else if (r.isWeb) {
                var u = n.duration || 0, c = n.timingFunction || "linear", l = n.delay || 0, f = "all " + u + "ms " + c + " " + l + "ms";
                if (e.style.transition = f, e.style.webkitTransition = f, i) {
                    var p = function t(n) {
                        n.stopPropagation(), e.removeEventListener("webkitTransitionEnd", t), e.removeEventListener("transitionend", t), e.style.transition = "", e.style.webkitTransition = "", i()
                    };
                    e.addEventListener("webkitTransitionEnd", p), e.addEventListener("transitionend", p)
                }
                for (var d in t) {
                    var h = t[d];
                    e.style[d] = h
                }
            }
        };
        var r = {isWeex: !1, isWeb: !0, isNode: !1, isReactNative: !1}, o = n(16);
        e.exports = t.default
    }, 150: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), o = n(1), i = u(n(2)), a = u(n(106)), s = u(n(151));

        function u(e) {
            return e && e.__esModule ? e : {default: e}
        }

        n(153);
        var c = (0, o.createElement)("div", {className: "docListNo"}, "已经没有更多内容啦！"), l = function (e) {
            function t(e) {
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t);
                var n = function (e, t) {
                    if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                return n.state = {docList: []}, n.showPreview = function (e) {
                    n.setState({showModal: !0, picUrl: e})
                }, n.hidePreview = function () {
                    n.setState({showModal: !1})
                }, n
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, s.default), r(t, [{
                key: "addDocList", value: function (e) {
                    this.setState({docList: e, ifMore: !0, showModal: !1, picUrl: null})
                }
            }, {
                key: "moreLoad", value: function (e) {
                    this.setState({ifMore: e})
                }
            }, {
                key: "formatDate", value: function (e) {
                    return a.default.formatDate("hh:mm", e)
                }
            }, {
                key: "itemRender", value: function (e) {
                    var t = this, n = (0, i.default)("docListItem", {docListTop: e.top}), r = (0, i.default)("docListImg", {several: 2 == e.type && e.imageUrls.length > 1});
                    return (0, o.createElement)("div", {className: n}, (0, o.createElement)("div", {className: "docListBox"}, (0, o.createElement)("span", {className: "docListPoint"}, e.top ? "置顶" : this.formatDate(e.createTime)), (0, o.createElement)("p", {className: "docListTit"}, e.content), 2 == e.type && (0, o.createElement)("div", {className: r}, e.imageUrls.map(function (e) {
                            return (0, o.createElement)("span", null, (0, o.createElement)("img", {
                                src: e,
                                onClick: function () {
                                    t.showPreview(e)
                                }
                            }))
                        })), 4 == e.type && (0, o.createElement)("div", {className: "docListVideo"}, (0, o.createElement)("iframe", {
                            src: "//player.youku.com/embed/" + e.videoCode + "?wmode=transparent",
                            width: "540px",
                            height: "340px",
                            frameborder: "0",
                            allowfullscreen: !0
                        }))))
                }
            }, {
                key: "render", value: function () {
                    var e = this, t = this.state, n = t.docList, r = t.ifMore, i = t.showModal, a = t.picUrl;
                    return (0, o.createElement)("div", {className: "teletext"}, n.length ? (0, o.createElement)("div", {className: "teletextCon"}, (0, o.createElement)("div", {className: "docList"}, n.map(function (t) {
                        return e.itemRender(t)
                    })), r ? (0, o.createElement)("div", {className: "docListMore"}, (0, o.createElement)("span", {onClick: this.moreDocList}, "加载更多")) : c) : null, i && (0, o.createElement)("div", {className: "previewModalBg"}, (0, o.createElement)("div", {className: "previewModal"}, (0, o.createElement)("img", {
                            src: a,
                            className: "previewPic"
                        }), (0, o.createElement)("span", {onClick: this.hidePreview, class: "previewClose"}))))
                }
            }]), t
        }();
        t.default = l, e.exports = t.default
    }, 151: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), o = n(1), i = function (e) {
            return e && e.__esModule ? e : {default: e}
        }(n(88)), a = n(152);
        var s = function (e) {
            function t(e) {
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t);
                var n = function (e, t) {
                    if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                return n.moreDocList = function () {
                    (0, a.getDocList)(n.roomId, n.widgetId, n.lastId).then(function (e) {
                        var t = e.data.data.liveDoc;
                        t.length < 10 && n.moreLoad(!1), t.length && (n.lastId = t[t.length - 1].docId, n.dealDocData(t, "history"))
                    }).catch(function (e) {
                        console.log(e)
                    })
                }, n.appId = e.appId, n.roomId = e.roomId, n.widgetId = e.widgetId, n.lastId = -1, n.tempList = [], n.sticky = null, i.default.io.on("interact_doc", function (e) {
                    e.data && n.dealDocData(e.data, "socket")
                }), n
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, o.Component), r(t, [{
                key: "componentDidMount", value: function () {
                    if (this.props.bizData && this.props.bizData.liveDoc && this.props.bizData.liveDoc.length) {
                        var e = this.props.bizData.liveDoc;
                        this.lastId = e[e.length - 1].docId, this.dealDocData(e, "history")
                    }
                }
            }, {
                key: "dealDocData", value: function (e, t) {
                    var n = this;
                    "socket" === t ? 0 == e.action ? (this.sticky && this.sticky.docId == e.docId && (this.sticky = null, this.tempList.push(e)), this.tempList.forEach(function (t, r) {
                        t.docId == e.docId && n.tempList.splice(r, 1)
                    })) : 0 == e.top && 1 == e.topAction ? this.tempList.unshift(e) : 1 == e.top && 2 == e.topAction ? (this.sticky && this.tempList.push(this.sticky), this.sticky = e, this.tempList.forEach(function (t, r) {
                        t.docId == e.docId && n.tempList.splice(r, 1)
                    })) : 0 == e.top && 3 == e.topAction && (this.sticky.top = !1, this.sticky.docId > this.tempList[this.tempList.length - 1].docId && this.tempList.push(this.sticky), this.sticky = null) : (1 == e[0].top && (this.sticky = e[0], e.splice(0, 1)), this.tempList = this.tempList.concat(e)), this.tempList.sort(function (e, t) {
                        return t.docId - e.docId
                    });
                    var r = this.sticky ? [this.sticky].concat(this.tempList) : this.tempList;
                    this.addDocList(r)
                }
            }]), t
        }();
        t.default = s, e.exports = t.default
    }, 152: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.getDocList = function (e, t) {
            var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : -1;
            return r.mtop.request({
                api: "mtop.youku.live.interact.doc.docRecord.list",
                type: "GET",
                v: "1.0",
                data: {appId: "1000", roomId: e, widgetId: t, lastId: n}
            })
        };
        var r = n(28)
    }, 153: function (e, t, n) {
    }, 155: function (e, t, n) {
        var r = n(156), o = n(157), i = n(182), a = n(184);

        function s(e, t, n, i, a) {
            var s = [].slice.call(arguments, 1), u = s.length, c = "function" == typeof s[u - 1];
            if (!c && !r())throw new Error("Callback required as last argument");
            if (!c) {
                if (u < 1)throw new Error("Too few arguments provided");
                return 1 === u ? (n = t, t = i = void 0) : 2 !== u || t.getContext || (i = n, n = t, t = void 0), new Promise(function (r, a) {
                    try {
                        var s = o.create(n, i);
                        r(e(s, t, i))
                    } catch (e) {
                        a(e)
                    }
                })
            }
            if (u < 2)throw new Error("Too few arguments provided");
            2 === u ? (a = n, n = t, t = i = void 0) : 3 === u && (t.getContext && void 0 === a ? (a = i, i = void 0) : (a = i, i = n, n = t, t = void 0));
            try {
                var l = o.create(n, i);
                a(null, e(l, t, i))
            } catch (e) {
                a(e)
            }
        }

        t.create = o.create, t.toCanvas = s.bind(null, i.render), t.toDataURL = s.bind(null, i.renderToDataURL), t.toString = s.bind(null, function (e, t, n) {
            return a.render(e, n)
        })
    }, 156: function (e, t) {
        e.exports = function () {
            return "function" == typeof Promise && Promise.prototype && Promise.prototype.then
        }
    }, 157: function (e, t, n) {
        var r = n(158), o = n(160), i = n(161), a = n(162), s = n(163), u = n(164), c = n(165), l = n(166), f = n(167), p = n(168), d = n(171), h = n(175), m = n(172), v = n(176), y = n(159);

        function g(e, t, n) {
            var r, o, i = e.size, a = h.getEncodedBits(t, n);
            for (r = 0; r < 15; r++)o = 1 == (a >> r & 1), r < 6 ? e.set(r, 8, o, !0) : r < 8 ? e.set(r + 1, 8, o, !0) : e.set(i - 15 + r, 8, o, !0), r < 8 ? e.set(8, i - r - 1, o, !0) : r < 9 ? e.set(8, 15 - r - 1 + 1, o, !0) : e.set(8, 15 - r - 1, o, !0);
            e.set(i - 8, 8, 1, !0)
        }

        function b(e, t, n) {
            var i = new a;
            n.forEach(function (t) {
                i.put(t.mode.bit, 4), i.put(t.getLength(), m.getCharCountIndicator(t.mode, e)), t.write(i)
            });
            var s = 8 * (o.getSymbolTotalCodewords(e) - f.getTotalCodewordsCount(e, t));
            for (i.getLengthInBits() + 4 <= s && i.put(0, 4); i.getLengthInBits() % 8 != 0;)i.putBit(0);
            for (var u = (s - i.getLengthInBits()) / 8, c = 0; c < u; c++)i.put(c % 2 ? 17 : 236, 8);
            return function (e, t, n) {
                for (var i = o.getSymbolTotalCodewords(t), a = f.getTotalCodewordsCount(t, n), s = i - a, u = f.getBlocksCount(t, n), c = u - i % u, l = Math.floor(i / u), d = Math.floor(s / u), h = d + 1, m = l - d, v = new p(m), y = 0, g = new Array(u), b = new Array(u), w = 0, _ = new r(e.buffer), x = 0; x < u; x++) {
                    var E = x < c ? d : h;
                    g[x] = _.slice(y, y + E), b[x] = v.encode(g[x]), y += E, w = Math.max(w, E)
                }
                var k, T, C = new r(i), S = 0;
                for (k = 0; k < w; k++)for (T = 0; T < u; T++)k < g[T].length && (C[S++] = g[T][k]);
                for (k = 0; k < m; k++)for (T = 0; T < u; T++)C[S++] = b[T][k];
                return C
            }(i, e, t)
        }

        function w(e, t, n, r) {
            var i;
            if (y(e)) i = v.fromArray(e); else {
                if ("string" != typeof e)throw new Error("Invalid data");
                var a = t;
                if (!a) {
                    var f = v.rawSplit(e);
                    a = d.getBestVersionForData(f, n)
                }
                i = v.fromString(e, a || 40)
            }
            var p = d.getBestVersionForData(i, n);
            if (!p)throw new Error("The amount of data is too big to be stored in a QR Code");
            if (t) {
                if (t < p)throw new Error("\nThe chosen QR Code version cannot contain this amount of data.\nMinimum version required to store current data is: " + p + ".\n")
            } else t = p;
            var h = b(t, n, i), m = o.getSymbolSize(t), w = new s(m);
            return function (e, t) {
                for (var n = e.size, r = c.getPositions(t), o = 0; o < r.length; o++)for (var i = r[o][0], a = r[o][1], s = -1; s <= 7; s++)if (!(i + s <= -1 || n <= i + s))for (var u = -1; u <= 7; u++)a + u <= -1 || n <= a + u || (s >= 0 && s <= 6 && (0 === u || 6 === u) || u >= 0 && u <= 6 && (0 === s || 6 === s) || s >= 2 && s <= 4 && u >= 2 && u <= 4 ? e.set(i + s, a + u, !0, !0) : e.set(i + s, a + u, !1, !0))
            }(w, t), function (e) {
                for (var t = e.size, n = 8; n < t - 8; n++) {
                    var r = n % 2 == 0;
                    e.set(n, 6, r, !0), e.set(6, n, r, !0)
                }
            }(w), function (e, t) {
                for (var n = u.getPositions(t), r = 0; r < n.length; r++)for (var o = n[r][0], i = n[r][1], a = -2; a <= 2; a++)for (var s = -2; s <= 2; s++)-2 === a || 2 === a || -2 === s || 2 === s || 0 === a && 0 === s ? e.set(o + a, i + s, !0, !0) : e.set(o + a, i + s, !1, !0)
            }(w, t), g(w, n, 0), t >= 7 && function (e, t) {
                for (var n, r, o, i = e.size, a = d.getEncodedBits(t), s = 0; s < 18; s++)n = Math.floor(s / 3), r = s % 3 + i - 8 - 3, o = 1 == (a >> s & 1), e.set(n, r, o, !0), e.set(r, n, o, !0)
            }(w, t), function (e, t) {
                for (var n = e.size, r = -1, o = n - 1, i = 7, a = 0, s = n - 1; s > 0; s -= 2)for (6 === s && s--; ;) {
                    for (var u = 0; u < 2; u++)if (!e.isReserved(o, s - u)) {
                        var c = !1;
                        a < t.length && (c = 1 == (t[a] >>> i & 1)), e.set(o, s - u, c), -1 == --i && (a++, i = 7)
                    }
                    if ((o += r) < 0 || n <= o) {
                        o -= r, r = -r;
                        break
                    }
                }
            }(w, h), isNaN(r) && (r = l.getBestMask(w, g.bind(null, w, n))), l.applyMask(r, w), g(w, n, r), {
                modules: w,
                version: t,
                errorCorrectionLevel: n,
                maskPattern: r,
                segments: i
            }
        }

        t.create = function (e, t) {
            if (void 0 === e || "" === e)throw new Error("No input text");
            var n, r, a = i.M;
            return void 0 !== t && (a = i.from(t.errorCorrectionLevel, i.M), n = d.from(t.version), r = l.from(t.maskPattern), t.toSJISFunc && o.setToSJISFunction(t.toSJISFunc)), w(e, n, a, r)
        }
    }, 158: function (e, t, n) {
        "use strict";
        var r = n(159);
        i.TYPED_ARRAY_SUPPORT = function () {
            try {
                var e = new Uint8Array(1);
                return e.__proto__ = {
                    __proto__: Uint8Array.prototype, foo: function () {
                        return 42
                    }
                }, 42 === e.foo()
            } catch (e) {
                return !1
            }
        }();
        var o = i.TYPED_ARRAY_SUPPORT ? 2147483647 : 1073741823;

        function i(e, t, n) {
            return i.TYPED_ARRAY_SUPPORT || this instanceof i ? "number" == typeof e ? u(this, e) : function (e, t, n, r) {
                if ("number" == typeof t)throw new TypeError('"value" argument must not be a number');
                if ("undefined" != typeof ArrayBuffer && t instanceof ArrayBuffer)return function (e, t, n, r) {
                    if (n < 0 || t.byteLength < n)throw new RangeError("'offset' is out of bounds");
                    if (t.byteLength < n + (r || 0))throw new RangeError("'length' is out of bounds");
                    var o;
                    o = void 0 === n && void 0 === r ? new Uint8Array(t) : void 0 === r ? new Uint8Array(t, n) : new Uint8Array(t, n, r);
                    i.TYPED_ARRAY_SUPPORT ? o.__proto__ = i.prototype : o = c(e, o);
                    return o
                }(e, t, n, r);
                if ("string" == typeof t)return function (e, t) {
                    var n = 0 | f(t), r = s(e, n), o = r.write(t);
                    o !== n && (r = r.slice(0, o));
                    return r
                }(e, t);
                return function (e, t) {
                    if (i.isBuffer(t)) {
                        var n = 0 | a(t.length), r = s(e, n);
                        return 0 === r.length ? r : (t.copy(r, 0, 0, n), r)
                    }
                    if (t) {
                        if ("undefined" != typeof ArrayBuffer && t.buffer instanceof ArrayBuffer || "length" in t)return "number" != typeof t.length || function (e) {
                            return e != e
                        }(t.length) ? s(e, 0) : c(e, t);
                        if ("Buffer" === t.type && Array.isArray(t.data))return c(e, t.data)
                    }
                    throw new TypeError("First argument must be a string, Buffer, ArrayBuffer, Array, or array-like object.")
                }(e, t)
            }(this, e, t, n) : new i(e, t, n)
        }

        function a(e) {
            if (e >= o)throw new RangeError("Attempt to allocate Buffer larger than maximum size: 0x" + o.toString(16) + " bytes");
            return 0 | e
        }

        function s(e, t) {
            var n;
            return i.TYPED_ARRAY_SUPPORT ? (n = new Uint8Array(t)).__proto__ = i.prototype : (null === (n = e) && (n = new i(t)), n.length = t), n
        }

        function u(e, t) {
            var n = s(e, t < 0 ? 0 : 0 | a(t));
            if (!i.TYPED_ARRAY_SUPPORT)for (var r = 0; r < t; ++r)n[r] = 0;
            return n
        }

        function c(e, t) {
            for (var n = t.length < 0 ? 0 : 0 | a(t.length), r = s(e, n), o = 0; o < n; o += 1)r[o] = 255 & t[o];
            return r
        }

        function l(e, t) {
            var n;
            t = t || 1 / 0;
            for (var r = e.length, o = null, i = [], a = 0; a < r; ++a) {
                if ((n = e.charCodeAt(a)) > 55295 && n < 57344) {
                    if (!o) {
                        if (n > 56319) {
                            (t -= 3) > -1 && i.push(239, 191, 189);
                            continue
                        }
                        if (a + 1 === r) {
                            (t -= 3) > -1 && i.push(239, 191, 189);
                            continue
                        }
                        o = n;
                        continue
                    }
                    if (n < 56320) {
                        (t -= 3) > -1 && i.push(239, 191, 189), o = n;
                        continue
                    }
                    n = 65536 + (o - 55296 << 10 | n - 56320)
                } else o && (t -= 3) > -1 && i.push(239, 191, 189);
                if (o = null, n < 128) {
                    if ((t -= 1) < 0)break;
                    i.push(n)
                } else if (n < 2048) {
                    if ((t -= 2) < 0)break;
                    i.push(n >> 6 | 192, 63 & n | 128)
                } else if (n < 65536) {
                    if ((t -= 3) < 0)break;
                    i.push(n >> 12 | 224, n >> 6 & 63 | 128, 63 & n | 128)
                } else {
                    if (!(n < 1114112))throw new Error("Invalid code point");
                    if ((t -= 4) < 0)break;
                    i.push(n >> 18 | 240, n >> 12 & 63 | 128, n >> 6 & 63 | 128, 63 & n | 128)
                }
            }
            return i
        }

        function f(e) {
            return i.isBuffer(e) ? e.length : "undefined" != typeof ArrayBuffer && "function" == typeof ArrayBuffer.isView && (ArrayBuffer.isView(e) || e instanceof ArrayBuffer) ? e.byteLength : ("string" != typeof e && (e = "" + e), 0 === e.length ? 0 : l(e).length)
        }

        i.TYPED_ARRAY_SUPPORT && (i.prototype.__proto__ = Uint8Array.prototype, i.__proto__ = Uint8Array, "undefined" != typeof Symbol && Symbol.species && i[Symbol.species] === i && Object.defineProperty(i, Symbol.species, {
            value: null,
            configurable: !0,
            enumerable: !1,
            writable: !1
        })), i.prototype.write = function (e, t, n) {
            void 0 === t ? (n = this.length, t = 0) : void 0 === n && "string" == typeof t ? (n = this.length, t = 0) : isFinite(t) && (t |= 0, isFinite(n) ? n |= 0 : n = void 0);
            var r = this.length - t;
            if ((void 0 === n || n > r) && (n = r), e.length > 0 && (n < 0 || t < 0) || t > this.length)throw new RangeError("Attempt to write outside buffer bounds");
            return function (e, t, n, r) {
                return function (e, t, n, r) {
                    for (var o = 0; o < r && !(o + n >= t.length || o >= e.length); ++o)t[o + n] = e[o];
                    return o
                }(l(t, e.length - n), e, n, r)
            }(this, e, t, n)
        }, i.prototype.slice = function (e, t) {
            var n, r = this.length;
            if (e = ~~e, t = void 0 === t ? r : ~~t, e < 0 ? (e += r) < 0 && (e = 0) : e > r && (e = r), t < 0 ? (t += r) < 0 && (t = 0) : t > r && (t = r), t < e && (t = e), i.TYPED_ARRAY_SUPPORT) (n = this.subarray(e, t)).__proto__ = i.prototype; else {
                var o = t - e;
                n = new i(o, void 0);
                for (var a = 0; a < o; ++a)n[a] = this[a + e]
            }
            return n
        }, i.prototype.copy = function (e, t, n, r) {
            if (n || (n = 0), r || 0 === r || (r = this.length), t >= e.length && (t = e.length), t || (t = 0), r > 0 && r < n && (r = n), r === n)return 0;
            if (0 === e.length || 0 === this.length)return 0;
            if (t < 0)throw new RangeError("targetStart out of bounds");
            if (n < 0 || n >= this.length)throw new RangeError("sourceStart out of bounds");
            if (r < 0)throw new RangeError("sourceEnd out of bounds");
            r > this.length && (r = this.length), e.length - t < r - n && (r = e.length - t + n);
            var o, a = r - n;
            if (this === e && n < t && t < r)for (o = a - 1; o >= 0; --o)e[o + t] = this[o + n]; else if (a < 1e3 || !i.TYPED_ARRAY_SUPPORT)for (o = 0; o < a; ++o)e[o + t] = this[o + n]; else Uint8Array.prototype.set.call(e, this.subarray(n, n + a), t);
            return a
        }, i.prototype.fill = function (e, t, n) {
            if ("string" == typeof e) {
                if ("string" == typeof t ? (t = 0, n = this.length) : "string" == typeof n && (n = this.length), 1 === e.length) {
                    var r = e.charCodeAt(0);
                    r < 256 && (e = r)
                }
            } else"number" == typeof e && (e &= 255);
            if (t < 0 || this.length < t || this.length < n)throw new RangeError("Out of range index");
            if (n <= t)return this;
            var o;
            if (t >>>= 0, n = void 0 === n ? this.length : n >>> 0, e || (e = 0), "number" == typeof e)for (o = t; o < n; ++o)this[o] = e; else {
                var a = i.isBuffer(e) ? e : new i(e), s = a.length;
                for (o = 0; o < n - t; ++o)this[o + t] = a[o % s]
            }
            return this
        }, i.concat = function (e, t) {
            if (!r(e))throw new TypeError('"list" argument must be an Array of Buffers');
            if (0 === e.length)return s(null, 0);
            var n;
            if (void 0 === t)for (t = 0, n = 0; n < e.length; ++n)t += e[n].length;
            var o = u(null, t), a = 0;
            for (n = 0; n < e.length; ++n) {
                var c = e[n];
                if (!i.isBuffer(c))throw new TypeError('"list" argument must be an Array of Buffers');
                c.copy(o, a), a += c.length
            }
            return o
        }, i.byteLength = f, i.prototype._isBuffer = !0, i.isBuffer = function (e) {
            return !(null == e || !e._isBuffer)
        }, e.exports = i
    }, 159: function (e, t) {
        var n = {}.toString;
        e.exports = Array.isArray || function (e) {
                return "[object Array]" == n.call(e)
            }
    }, 16: function (e, t, n) {
        "use strict";
        function r(e) {
            return (r = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
                return typeof e
            } : function (e) {
                return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
            })(e)
        }

        Object.defineProperty(t, "__esModule", {value: !0}), t.isRem = c, t.calcRem = l, t.getRem = f, t.setRem = p, t.isUnitNumber = d, t.convertUnit = function (e, t) {
            var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : f();
            if (t && d(e, t))return e * n + "px";
            if (c(e))return l(e, n);
            return e
        }, t.default = void 0;
        var o = {
            animationIterationCount: !0,
            borderImageOutset: !0,
            borderImageSlice: !0,
            borderImageWidth: !0,
            boxFlex: !0,
            boxFlexGroup: !0,
            boxOrdinalGroup: !0,
            columnCount: !0,
            flex: !0,
            flexGrow: !0,
            flexPositive: !0,
            flexShrink: !0,
            flexNegative: !0,
            flexOrder: !0,
            gridRow: !0,
            gridColumn: !0,
            fontWeight: !0,
            lineClamp: !0,
            opacity: !0,
            order: !0,
            orphans: !0,
            tabSize: !0,
            widows: !0,
            zIndex: !0,
            zoom: !0,
            lines: !0
        }, i = /\d+(rem|rpx)/, a = /[-+]?\d*\.?\d+(rem|rpx)/g, s = "__global_rem_unit__", u = "object" === ("undefined" == typeof window ? "undefined" : r(window)) ? window : "object" === r(u) ? u : {};

        function c(e) {
            return i.test(e)
        }

        function l(e) {
            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : f();
            return e.replace(a, function (e) {
                return parseFloat(e) * t + "px"
            })
        }

        function f() {
            return u[s]
        }

        function p(e) {
            u[s] = e
        }

        function d(e, t) {
            return "number" == typeof e && !o[t]
        }

        void 0 === f() && p(1), t.default = e.exports;
        var h = e.exports;
        t.default = h
    }, 160: function (e, t) {
        var n, r = [0, 26, 44, 70, 100, 134, 172, 196, 242, 292, 346, 404, 466, 532, 581, 655, 733, 815, 901, 991, 1085, 1156, 1258, 1364, 1474, 1588, 1706, 1828, 1921, 2051, 2185, 2323, 2465, 2611, 2761, 2876, 3034, 3196, 3362, 3532, 3706];
        t.getSymbolSize = function (e) {
            if (!e)throw new Error('"version" cannot be null or undefined');
            if (e < 1 || e > 40)throw new Error('"version" should be in range from 1 to 40');
            return 4 * e + 17
        }, t.getSymbolTotalCodewords = function (e) {
            return r[e]
        }, t.getBCHDigit = function (e) {
            for (var t = 0; 0 !== e;)t++, e >>>= 1;
            return t
        }, t.setToSJISFunction = function (e) {
            if ("function" != typeof e)throw new Error('"toSJISFunc" is not a valid function.');
            n = e
        }, t.isKanjiModeEnabled = function () {
            return void 0 !== n
        }, t.toSJIS = function (e) {
            return n(e)
        }
    }, 161: function (e, t) {
        t.L = {bit: 1}, t.M = {bit: 0}, t.Q = {bit: 3}, t.H = {bit: 2}, t.isValid = function (e) {
            return e && void 0 !== e.bit && e.bit >= 0 && e.bit < 4
        }, t.from = function (e, n) {
            if (t.isValid(e))return e;
            try {
                return function (e) {
                    if ("string" != typeof e)throw new Error("Param is not a string");
                    switch (e.toLowerCase()) {
                        case"l":
                        case"low":
                            return t.L;
                        case"m":
                        case"medium":
                            return t.M;
                        case"q":
                        case"quartile":
                            return t.Q;
                        case"h":
                        case"high":
                            return t.H;
                        default:
                            throw new Error("Unknown EC Level: " + e)
                    }
                }(e)
            } catch (e) {
                return n
            }
        }
    }, 162: function (e, t) {
        function n() {
            this.buffer = [], this.length = 0
        }

        n.prototype = {
            get: function (e) {
                var t = Math.floor(e / 8);
                return 1 == (this.buffer[t] >>> 7 - e % 8 & 1)
            }, put: function (e, t) {
                for (var n = 0; n < t; n++)this.putBit(1 == (e >>> t - n - 1 & 1))
            }, getLengthInBits: function () {
                return this.length
            }, putBit: function (e) {
                var t = Math.floor(this.length / 8);
                this.buffer.length <= t && this.buffer.push(0), e && (this.buffer[t] |= 128 >>> this.length % 8), this.length++
            }
        }, e.exports = n
    }, 163: function (e, t, n) {
        var r = n(158);

        function o(e) {
            if (!e || e < 1)throw new Error("BitMatrix size must be defined and greater than 0");
            this.size = e, this.data = new r(e * e), this.data.fill(0), this.reservedBit = new r(e * e), this.reservedBit.fill(0)
        }

        o.prototype.set = function (e, t, n, r) {
            var o = e * this.size + t;
            this.data[o] = n, r && (this.reservedBit[o] = !0)
        }, o.prototype.get = function (e, t) {
            return this.data[e * this.size + t]
        }, o.prototype.xor = function (e, t, n) {
            this.data[e * this.size + t] ^= n
        }, o.prototype.isReserved = function (e, t) {
            return this.reservedBit[e * this.size + t]
        }, e.exports = o
    }, 164: function (e, t, n) {
        var r = n(160).getSymbolSize;
        t.getRowColCoords = function (e) {
            if (1 === e)return [];
            for (var t = Math.floor(e / 7) + 2, n = r(e), o = 145 === n ? 26 : 2 * Math.ceil((n - 13) / (2 * t - 2)), i = [n - 7], a = 1; a < t - 1; a++)i[a] = i[a - 1] - o;
            return i.push(6), i.reverse()
        }, t.getPositions = function (e) {
            for (var n = [], r = t.getRowColCoords(e), o = r.length, i = 0; i < o; i++)for (var a = 0; a < o; a++)0 === i && 0 === a || 0 === i && a === o - 1 || i === o - 1 && 0 === a || n.push([r[i], r[a]]);
            return n
        }
    }, 165: function (e, t, n) {
        var r = n(160).getSymbolSize;
        t.getPositions = function (e) {
            var t = r(e);
            return [[0, 0], [t - 7, 0], [0, t - 7]]
        }
    }, 166: function (e, t) {
        t.Patterns = {
            PATTERN000: 0,
            PATTERN001: 1,
            PATTERN010: 2,
            PATTERN011: 3,
            PATTERN100: 4,
            PATTERN101: 5,
            PATTERN110: 6,
            PATTERN111: 7
        };
        var n = 3, r = 3, o = 40, i = 10;

        function a(e, n, r) {
            switch (e) {
                case t.Patterns.PATTERN000:
                    return (n + r) % 2 == 0;
                case t.Patterns.PATTERN001:
                    return n % 2 == 0;
                case t.Patterns.PATTERN010:
                    return r % 3 == 0;
                case t.Patterns.PATTERN011:
                    return (n + r) % 3 == 0;
                case t.Patterns.PATTERN100:
                    return (Math.floor(n / 2) + Math.floor(r / 3)) % 2 == 0;
                case t.Patterns.PATTERN101:
                    return n * r % 2 + n * r % 3 == 0;
                case t.Patterns.PATTERN110:
                    return (n * r % 2 + n * r % 3) % 2 == 0;
                case t.Patterns.PATTERN111:
                    return (n * r % 3 + (n + r) % 2) % 2 == 0;
                default:
                    throw new Error("bad maskPattern:" + e)
            }
        }

        t.isValid = function (e) {
            return null != e && "" !== e && !isNaN(e) && e >= 0 && e <= 7
        }, t.from = function (e) {
            return t.isValid(e) ? parseInt(e, 10) : void 0
        }, t.getPenaltyN1 = function (e) {
            for (var t = e.size, r = 0, o = 0, i = 0, a = null, s = null, u = 0; u < t; u++) {
                o = i = 0, a = s = null;
                for (var c = 0; c < t; c++) {
                    var l = e.get(u, c);
                    l === a ? o++ : (o >= 5 && (r += n + (o - 5)), a = l, o = 1), (l = e.get(c, u)) === s ? i++ : (i >= 5 && (r += n + (i - 5)), s = l, i = 1)
                }
                o >= 5 && (r += n + (o - 5)), i >= 5 && (r += n + (i - 5))
            }
            return r
        }, t.getPenaltyN2 = function (e) {
            for (var t = e.size, n = 0, o = 0; o < t - 1; o++)for (var i = 0; i < t - 1; i++) {
                var a = e.get(o, i) + e.get(o, i + 1) + e.get(o + 1, i) + e.get(o + 1, i + 1);
                4 !== a && 0 !== a || n++
            }
            return n * r
        }, t.getPenaltyN3 = function (e) {
            for (var t = e.size, n = 0, r = 0, i = 0, a = 0; a < t; a++) {
                r = i = 0;
                for (var s = 0; s < t; s++)r = r << 1 & 2047 | e.get(a, s), s >= 10 && (1488 === r || 93 === r) && n++, i = i << 1 & 2047 | e.get(s, a), s >= 10 && (1488 === i || 93 === i) && n++
            }
            return n * o
        }, t.getPenaltyN4 = function (e) {
            for (var t = 0, n = e.data.length, r = 0; r < n; r++)t += e.data[r];
            return Math.abs(Math.ceil(100 * t / n / 5) - 10) * i
        }, t.applyMask = function (e, t) {
            for (var n = t.size, r = 0; r < n; r++)for (var o = 0; o < n; o++)t.isReserved(o, r) || t.xor(o, r, a(e, o, r))
        }, t.getBestMask = function (e, n) {
            for (var r = Object.keys(t.Patterns).length, o = 0, i = 1 / 0, a = 0; a < r; a++) {
                n(a), t.applyMask(a, e);
                var s = t.getPenaltyN1(e) + t.getPenaltyN2(e) + t.getPenaltyN3(e) + t.getPenaltyN4(e);
                t.applyMask(a, e), s < i && (i = s, o = a)
            }
            return o
        }
    }, 167: function (e, t, n) {
        var r = n(161), o = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 1, 2, 2, 4, 1, 2, 4, 4, 2, 4, 4, 4, 2, 4, 6, 5, 2, 4, 6, 6, 2, 5, 8, 8, 4, 5, 8, 8, 4, 5, 8, 11, 4, 8, 10, 11, 4, 9, 12, 16, 4, 9, 16, 16, 6, 10, 12, 18, 6, 10, 17, 16, 6, 11, 16, 19, 6, 13, 18, 21, 7, 14, 21, 25, 8, 16, 20, 25, 8, 17, 23, 25, 9, 17, 23, 34, 9, 18, 25, 30, 10, 20, 27, 32, 12, 21, 29, 35, 12, 23, 34, 37, 12, 25, 34, 40, 13, 26, 35, 42, 14, 28, 38, 45, 15, 29, 40, 48, 16, 31, 43, 51, 17, 33, 45, 54, 18, 35, 48, 57, 19, 37, 51, 60, 19, 38, 53, 63, 20, 40, 56, 66, 21, 43, 59, 70, 22, 45, 62, 74, 24, 47, 65, 77, 25, 49, 68, 81], i = [7, 10, 13, 17, 10, 16, 22, 28, 15, 26, 36, 44, 20, 36, 52, 64, 26, 48, 72, 88, 36, 64, 96, 112, 40, 72, 108, 130, 48, 88, 132, 156, 60, 110, 160, 192, 72, 130, 192, 224, 80, 150, 224, 264, 96, 176, 260, 308, 104, 198, 288, 352, 120, 216, 320, 384, 132, 240, 360, 432, 144, 280, 408, 480, 168, 308, 448, 532, 180, 338, 504, 588, 196, 364, 546, 650, 224, 416, 600, 700, 224, 442, 644, 750, 252, 476, 690, 816, 270, 504, 750, 900, 300, 560, 810, 960, 312, 588, 870, 1050, 336, 644, 952, 1110, 360, 700, 1020, 1200, 390, 728, 1050, 1260, 420, 784, 1140, 1350, 450, 812, 1200, 1440, 480, 868, 1290, 1530, 510, 924, 1350, 1620, 540, 980, 1440, 1710, 570, 1036, 1530, 1800, 570, 1064, 1590, 1890, 600, 1120, 1680, 1980, 630, 1204, 1770, 2100, 660, 1260, 1860, 2220, 720, 1316, 1950, 2310, 750, 1372, 2040, 2430];
        t.getBlocksCount = function (e, t) {
            switch (t) {
                case r.L:
                    return o[4 * (e - 1) + 0];
                case r.M:
                    return o[4 * (e - 1) + 1];
                case r.Q:
                    return o[4 * (e - 1) + 2];
                case r.H:
                    return o[4 * (e - 1) + 3];
                default:
                    return
            }
        }, t.getTotalCodewordsCount = function (e, t) {
            switch (t) {
                case r.L:
                    return i[4 * (e - 1) + 0];
                case r.M:
                    return i[4 * (e - 1) + 1];
                case r.Q:
                    return i[4 * (e - 1) + 2];
                case r.H:
                    return i[4 * (e - 1) + 3];
                default:
                    return
            }
        }
    }, 168: function (e, t, n) {
        var r = n(158), o = n(169);

        function i(e) {
            this.genPoly = void 0, this.degree = e, this.degree && this.initialize(this.degree)
        }

        i.prototype.initialize = function (e) {
            this.degree = e, this.genPoly = o.generateECPolynomial(this.degree)
        }, i.prototype.encode = function (e) {
            if (!this.genPoly)throw new Error("Encoder not initialized");
            var t = new r(this.degree);
            t.fill(0);
            var n = r.concat([e, t], e.length + this.degree), i = o.mod(n, this.genPoly), a = this.degree - i.length;
            if (a > 0) {
                var s = new r(this.degree);
                return s.fill(0), i.copy(s, a), s
            }
            return i
        }, e.exports = i
    }, 169: function (e, t, n) {
        var r = n(158), o = n(170);
        t.mul = function (e, t) {
            var n = new r(e.length + t.length - 1);
            n.fill(0);
            for (var i = 0; i < e.length; i++)for (var a = 0; a < t.length; a++)n[i + a] ^= o.mul(e[i], t[a]);
            return n
        }, t.mod = function (e, t) {
            for (var n = new r(e); n.length - t.length >= 0;) {
                for (var i = n[0], a = 0; a < t.length; a++)n[a] ^= o.mul(t[a], i);
                for (var s = 0; s < n.length && 0 === n[s];)s++;
                n = n.slice(s)
            }
            return n
        }, t.generateECPolynomial = function (e) {
            for (var n = new r([1]), i = 0; i < e; i++)n = t.mul(n, [1, o.exp(i)]);
            return n
        }
    }, 170: function (e, t, n) {
        var r = n(158);
        if (r.alloc)var o = r.alloc(512), i = r.alloc(256); else o = new r(512), i = new r(256);
        !function () {
            for (var e = 1, t = 0; t < 255; t++)o[t] = e, i[e] = t, 256 & (e <<= 1) && (e ^= 285);
            for (t = 255; t < 512; t++)o[t] = o[t - 255]
        }(), t.log = function (e) {
            if (e < 1)throw new Error("log(" + e + ")");
            return i[e]
        }, t.exp = function (e) {
            return o[e]
        }, t.mul = function (e, t) {
            return 0 === e || 0 === t ? 0 : o[i[e] + i[t]]
        }
    }, 171: function (e, t, n) {
        var r = n(160), o = n(167), i = n(161), a = n(172), s = n(173), u = n(159), c = r.getBCHDigit(7973);

        function l(e, t) {
            return a.getCharCountIndicator(e, t) + 4
        }

        function f(e, t) {
            var n = 0;
            return e.forEach(function (e) {
                var r = l(e.mode, t);
                n += r + e.getBitsLength()
            }), n
        }

        t.from = function (e, t) {
            return s.isValid(e) ? parseInt(e, 10) : t
        }, t.getCapacity = function (e, t, n) {
            if (!s.isValid(e))throw new Error("Invalid QR Code version");
            void 0 === n && (n = a.BYTE);
            var i = 8 * (r.getSymbolTotalCodewords(e) - o.getTotalCodewordsCount(e, t));
            if (n === a.MIXED)return i;
            var u = i - l(n, e);
            switch (n) {
                case a.NUMERIC:
                    return Math.floor(u / 10 * 3);
                case a.ALPHANUMERIC:
                    return Math.floor(u / 11 * 2);
                case a.KANJI:
                    return Math.floor(u / 13);
                case a.BYTE:
                default:
                    return Math.floor(u / 8)
            }
        }, t.getBestVersionForData = function (e, n) {
            var r, o = i.from(n, i.M);
            if (u(e)) {
                if (e.length > 1)return function (e, n) {
                    for (var r = 1; r <= 40; r++)if (f(e, r) <= t.getCapacity(r, n, a.MIXED))return r
                }(e, o);
                if (0 === e.length)return 1;
                r = e[0]
            } else r = e;
            return function (e, n, r) {
                for (var o = 1; o <= 40; o++)if (n <= t.getCapacity(o, r, e))return o
            }(r.mode, r.getLength(), o)
        }, t.getEncodedBits = function (e) {
            if (!s.isValid(e) || e < 7)throw new Error("Invalid QR Code version");
            for (var t = e << 12; r.getBCHDigit(t) - c >= 0;)t ^= 7973 << r.getBCHDigit(t) - c;
            return e << 12 | t
        }
    }, 172: function (e, t, n) {
        var r = n(173), o = n(174);
        t.NUMERIC = {id: "Numeric", bit: 1, ccBits: [10, 12, 14]}, t.ALPHANUMERIC = {
            id: "Alphanumeric",
            bit: 2,
            ccBits: [9, 11, 13]
        }, t.BYTE = {id: "Byte", bit: 4, ccBits: [8, 16, 16]}, t.KANJI = {
            id: "Kanji",
            bit: 8,
            ccBits: [8, 10, 12]
        }, t.MIXED = {bit: -1}, t.getCharCountIndicator = function (e, t) {
            if (!e.ccBits)throw new Error("Invalid mode: " + e);
            if (!r.isValid(t))throw new Error("Invalid version: " + t);
            return t >= 1 && t < 10 ? e.ccBits[0] : t < 27 ? e.ccBits[1] : e.ccBits[2]
        }, t.getBestModeForData = function (e) {
            return o.testNumeric(e) ? t.NUMERIC : o.testAlphanumeric(e) ? t.ALPHANUMERIC : o.testKanji(e) ? t.KANJI : t.BYTE
        }, t.toString = function (e) {
            if (e && e.id)return e.id;
            throw new Error("Invalid mode")
        }, t.isValid = function (e) {
            return e && e.bit && e.ccBits
        }, t.from = function (e, n) {
            if (t.isValid(e))return e;
            try {
                return function (e) {
                    if ("string" != typeof e)throw new Error("Param is not a string");
                    switch (e.toLowerCase()) {
                        case"numeric":
                            return t.NUMERIC;
                        case"alphanumeric":
                            return t.ALPHANUMERIC;
                        case"kanji":
                            return t.KANJI;
                        case"byte":
                            return t.BYTE;
                        default:
                            throw new Error("Unknown mode: " + e)
                    }
                }(e)
            } catch (e) {
                return n
            }
        }
    }, 173: function (e, t) {
        t.isValid = function (e) {
            return !isNaN(e) && e >= 1 && e <= 40
        }
    }, 174: function (e, t) {
        var n = "(?:[u3000-u303F]|[u3040-u309F]|[u30A0-u30FF]|[uFF00-uFFEF]|[u4E00-u9FAF]|[u2605-u2606]|[u2190-u2195]|u203B|[u2010u2015u2018u2019u2025u2026u201Cu201Du2225u2260]|[u0391-u0451]|[u00A7u00A8u00B1u00B4u00D7u00F7])+", r = "(?:(?![A-Z0-9 $%*+\\-./:]|" + (n = n.replace(/u/g, "\\u")) + ")(?:.|[\r\n]))+";
        t.KANJI = new RegExp(n, "g"), t.BYTE_KANJI = new RegExp("[^A-Z0-9 $%*+\\-./:]+", "g"), t.BYTE = new RegExp(r, "g"), t.NUMERIC = new RegExp("[0-9]+", "g"), t.ALPHANUMERIC = new RegExp("[A-Z $%*+\\-./:]+", "g");
        var o = new RegExp("^" + n + "$"), i = new RegExp("^[0-9]+$"), a = new RegExp("^[A-Z0-9 $%*+\\-./:]+$");
        t.testKanji = function (e) {
            return o.test(e)
        }, t.testNumeric = function (e) {
            return i.test(e)
        }, t.testAlphanumeric = function (e) {
            return a.test(e)
        }
    }, 175: function (e, t, n) {
        var r = n(160), o = r.getBCHDigit(1335);
        t.getEncodedBits = function (e, t) {
            for (var n = e.bit << 3 | t, i = n << 10; r.getBCHDigit(i) - o >= 0;)i ^= 1335 << r.getBCHDigit(i) - o;
            return 21522 ^ (n << 10 | i)
        }
    }, 176: function (e, t, n) {
        var r = n(172), o = n(177), i = n(178), a = n(179), s = n(180), u = n(174), c = n(160), l = n(181);

        function f(e) {
            return unescape(encodeURIComponent(e)).length
        }

        function p(e, t, n) {
            for (var r, o = []; null !== (r = e.exec(n));)o.push({
                data: r[0],
                index: r.index,
                mode: t,
                length: r[0].length
            });
            return o
        }

        function d(e) {
            var t, n, o = p(u.NUMERIC, r.NUMERIC, e), i = p(u.ALPHANUMERIC, r.ALPHANUMERIC, e);
            return c.isKanjiModeEnabled() ? (t = p(u.BYTE, r.BYTE, e), n = p(u.KANJI, r.KANJI, e)) : (t = p(u.BYTE_KANJI, r.BYTE, e), n = []), o.concat(i, t, n).sort(function (e, t) {
                return e.index - t.index
            }).map(function (e) {
                return {data: e.data, mode: e.mode, length: e.length}
            })
        }

        function h(e, t) {
            switch (t) {
                case r.NUMERIC:
                    return o.getBitsLength(e);
                case r.ALPHANUMERIC:
                    return i.getBitsLength(e);
                case r.KANJI:
                    return s.getBitsLength(e);
                case r.BYTE:
                    return a.getBitsLength(e)
            }
        }

        function m(e, t) {
            var n, u = r.getBestModeForData(e);
            if ((n = r.from(t, u)) !== r.BYTE && n.bit < u.bit)throw new Error('"' + e + '" cannot be encoded with mode ' + r.toString(n) + ".\n Suggested mode is: " + r.toString(u));
            switch (n !== r.KANJI || c.isKanjiModeEnabled() || (n = r.BYTE), n) {
                case r.NUMERIC:
                    return new o(e);
                case r.ALPHANUMERIC:
                    return new i(e);
                case r.KANJI:
                    return new s(e);
                case r.BYTE:
                    return new a(e)
            }
        }

        t.fromArray = function (e) {
            return e.reduce(function (e, t) {
                return "string" == typeof t ? e.push(m(t, null)) : t.data && e.push(m(t.data, t.mode)), e
            }, [])
        }, t.fromString = function (e, n) {
            for (var o = function (e, t) {
                for (var n = {}, o = {start: {}}, i = ["start"], a = 0; a < e.length; a++) {
                    for (var s = e[a], u = [], c = 0; c < s.length; c++) {
                        var l = s[c], f = "" + a + c;
                        u.push(f), n[f] = {node: l, lastCount: 0}, o[f] = {};
                        for (var p = 0; p < i.length; p++) {
                            var d = i[p];
                            n[d] && n[d].node.mode === l.mode ? (o[d][f] = h(n[d].lastCount + l.length, l.mode) - h(n[d].lastCount, l.mode), n[d].lastCount += l.length) : (n[d] && (n[d].lastCount = l.length), o[d][f] = h(l.length, l.mode) + 4 + r.getCharCountIndicator(l.mode, t))
                        }
                    }
                    i = u
                }
                for (p = 0; p < i.length; p++)o[i[p]].end = 0;
                return {map: o, table: n}
            }(function (e) {
                for (var t = [], n = 0; n < e.length; n++) {
                    var o = e[n];
                    switch (o.mode) {
                        case r.NUMERIC:
                            t.push([o, {data: o.data, mode: r.ALPHANUMERIC, length: o.length}, {
                                data: o.data,
                                mode: r.BYTE,
                                length: o.length
                            }]);
                            break;
                        case r.ALPHANUMERIC:
                            t.push([o, {data: o.data, mode: r.BYTE, length: o.length}]);
                            break;
                        case r.KANJI:
                            t.push([o, {data: o.data, mode: r.BYTE, length: f(o.data)}]);
                            break;
                        case r.BYTE:
                            t.push([{data: o.data, mode: r.BYTE, length: f(o.data)}])
                    }
                }
                return t
            }(d(e, c.isKanjiModeEnabled())), n), i = l.find_path(o.map, "start", "end"), a = [], s = 1; s < i.length - 1; s++)a.push(o.table[i[s]].node);
            return t.fromArray(function (e) {
                return e.reduce(function (e, t) {
                    var n = e.length - 1 >= 0 ? e[e.length - 1] : null;
                    return n && n.mode === t.mode ? (e[e.length - 1].data += t.data, e) : (e.push(t), e)
                }, [])
            }(a))
        }, t.rawSplit = function (e) {
            return t.fromArray(d(e, c.isKanjiModeEnabled()))
        }
    }, 177: function (e, t, n) {
        var r = n(172);

        function o(e) {
            this.mode = r.NUMERIC, this.data = e.toString()
        }

        o.getBitsLength = function (e) {
            return 10 * Math.floor(e / 3) + (e % 3 ? e % 3 * 3 + 1 : 0)
        }, o.prototype.getLength = function () {
            return this.data.length
        }, o.prototype.getBitsLength = function () {
            return o.getBitsLength(this.data.length)
        }, o.prototype.write = function (e) {
            var t, n, r;
            for (t = 0; t + 3 <= this.data.length; t += 3)n = this.data.substr(t, 3), r = parseInt(n, 10), e.put(r, 10);
            var o = this.data.length - t;
            o > 0 && (n = this.data.substr(t), r = parseInt(n, 10), e.put(r, 3 * o + 1))
        }, e.exports = o
    }, 178: function (e, t, n) {
        var r = n(172), o = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", " ", "$", "%", "*", "+", "-", ".", "/", ":"];

        function i(e) {
            this.mode = r.ALPHANUMERIC, this.data = e
        }

        i.getBitsLength = function (e) {
            return 11 * Math.floor(e / 2) + e % 2 * 6
        }, i.prototype.getLength = function () {
            return this.data.length
        }, i.prototype.getBitsLength = function () {
            return i.getBitsLength(this.data.length)
        }, i.prototype.write = function (e) {
            var t;
            for (t = 0; t + 2 <= this.data.length; t += 2) {
                var n = 45 * o.indexOf(this.data[t]);
                n += o.indexOf(this.data[t + 1]), e.put(n, 11)
            }
            this.data.length % 2 && e.put(o.indexOf(this.data[t]), 6)
        }, e.exports = i
    }, 179: function (e, t, n) {
        var r = n(158), o = n(172);

        function i(e) {
            this.mode = o.BYTE, this.data = new r(e)
        }

        i.getBitsLength = function (e) {
            return 8 * e
        }, i.prototype.getLength = function () {
            return this.data.length
        }, i.prototype.getBitsLength = function () {
            return i.getBitsLength(this.data.length)
        }, i.prototype.write = function (e) {
            for (var t = 0, n = this.data.length; t < n; t++)e.put(this.data[t], 8)
        }, e.exports = i
    }, 180: function (e, t, n) {
        var r = n(172), o = n(160);

        function i(e) {
            this.mode = r.KANJI, this.data = e
        }

        i.getBitsLength = function (e) {
            return 13 * e
        }, i.prototype.getLength = function () {
            return this.data.length
        }, i.prototype.getBitsLength = function () {
            return i.getBitsLength(this.data.length)
        }, i.prototype.write = function (e) {
            var t;
            for (t = 0; t < this.data.length; t++) {
                var n = o.toSJIS(this.data[t]);
                if (n >= 33088 && n <= 40956) n -= 33088; else {
                    if (!(n >= 57408 && n <= 60351))throw new Error("Invalid SJIS character: " + this.data[t] + "\nMake sure your charset is UTF-8");
                    n -= 49472
                }
                n = 192 * (n >>> 8 & 255) + (255 & n), e.put(n, 13)
            }
        }, e.exports = i
    }, 181: function (e, t, n) {
        "use strict";
        var r = {
            single_source_shortest_paths: function (e, t, n) {
                var o = {}, i = {};
                i[t] = 0;
                var a, s, u, c, l, f, p, d = r.PriorityQueue.make();
                for (d.push(t, 0); !d.empty();)for (u in s = (a = d.pop()).value, c = a.cost, l = e[s] || {})l.hasOwnProperty(u) && (f = c + l[u], p = i[u], (void 0 === i[u] || p > f) && (i[u] = f, d.push(u, f), o[u] = s));
                if (void 0 !== n && void 0 === i[n]) {
                    var h = ["Could not find a path from ", t, " to ", n, "."].join("");
                    throw new Error(h)
                }
                return o
            }, extract_shortest_path_from_predecessor_list: function (e, t) {
                for (var n = [], r = t; r;)n.push(r), e[r], r = e[r];
                return n.reverse(), n
            }, find_path: function (e, t, n) {
                var o = r.single_source_shortest_paths(e, t, n);
                return r.extract_shortest_path_from_predecessor_list(o, n)
            }, PriorityQueue: {
                make: function (e) {
                    var t, n = r.PriorityQueue, o = {};
                    for (t in e = e || {}, n)n.hasOwnProperty(t) && (o[t] = n[t]);
                    return o.queue = [], o.sorter = e.sorter || n.default_sorter, o
                }, default_sorter: function (e, t) {
                    return e.cost - t.cost
                }, push: function (e, t) {
                    var n = {value: e, cost: t};
                    this.queue.push(n), this.queue.sort(this.sorter)
                }, pop: function () {
                    return this.queue.shift()
                }, empty: function () {
                    return 0 === this.queue.length
                }
            }
        };
        e.exports = r
    }, 182: function (e, t, n) {
        var r = n(183);
        t.render = function (e, t, n) {
            var o = n, i = t;
            void 0 !== o || t && t.getContext || (o = t, t = void 0), t || (i = function () {
                try {
                    return document.createElement("canvas")
                } catch (e) {
                    throw new Error("You need to specify a canvas element")
                }
            }()), o = r.getOptions(o);
            var a = r.getImageWidth(e.modules.size, o), s = i.getContext("2d"), u = s.createImageData(a, a);
            return r.qrToImageData(u.data, e, o), function (e, t, n) {
                e.clearRect(0, 0, t.width, t.height), t.style || (t.style = {}), t.height = n, t.width = n, t.style.height = n + "px", t.style.width = n + "px"
            }(s, i, a), s.putImageData(u, 0, 0), i
        }, t.renderToDataURL = function (e, n, r) {
            var o = r;
            void 0 !== o || n && n.getContext || (o = n, n = void 0), o || (o = {});
            var i = t.render(e, n, o), a = o.type || "image/png", s = o.rendererOpts || {};
            return i.toDataURL(a, s.quality)
        }
    }, 183: function (e, t) {
        function n(e) {
            if ("string" != typeof e)throw new Error("Color should be defined as hex string");
            var t = e.slice().replace("#", "").split("");
            if (t.length < 3 || 5 === t.length || t.length > 8)throw new Error("Invalid hex color: " + e);
            3 !== t.length && 4 !== t.length || (t = Array.prototype.concat.apply([], t.map(function (e) {
                return [e, e]
            }))), 6 === t.length && t.push("F", "F");
            var n = parseInt(t.join(""), 16);
            return {r: n >> 24 & 255, g: n >> 16 & 255, b: n >> 8 & 255, a: 255 & n, hex: "#" + t.slice(0, 6).join("")}
        }

        t.getOptions = function (e) {
            e || (e = {}), e.color || (e.color = {});
            var t = void 0 === e.margin || null === e.margin || e.margin < 0 ? 4 : e.margin, r = e.width && e.width >= 21 ? e.width : void 0, o = e.scale || 4;
            return {
                width: r,
                scale: r ? 4 : o,
                margin: t,
                color: {dark: n(e.color.dark || "#000000ff"), light: n(e.color.light || "#ffffffff")},
                type: e.type,
                rendererOpts: e.rendererOpts || {}
            }
        }, t.getScale = function (e, t) {
            return t.width && t.width >= e + 2 * t.margin ? t.width / (e + 2 * t.margin) : t.scale
        }, t.getImageWidth = function (e, n) {
            var r = t.getScale(e, n);
            return Math.floor((e + 2 * n.margin) * r)
        }, t.qrToImageData = function (e, n, r) {
            for (var o = n.modules.size, i = n.modules.data, a = t.getScale(o, r), s = Math.floor((o + 2 * r.margin) * a), u = r.margin * a, c = [r.color.light, r.color.dark], l = 0; l < s; l++)for (var f = 0; f < s; f++) {
                var p = 4 * (l * s + f), d = r.color.light;
                if (l >= u && f >= u && l < s - u && f < s - u) d = c[i[Math.floor((l - u) / a) * o + Math.floor((f - u) / a)] ? 1 : 0];
                e[p++] = d.r, e[p++] = d.g, e[p++] = d.b, e[p] = d.a
            }
        }
    }, 184: function (e, t, n) {
        var r = n(183);

        function o(e, t) {
            var n = e.a / 255, r = t + '="' + e.hex + '"';
            return n < 1 ? r + " " + t + '-opacity="' + n.toFixed(2).slice(1) + '"' : r
        }

        function i(e, t, n) {
            var r = e + t;
            return void 0 !== n && (r += " " + n), r
        }

        t.render = function (e, t, n) {
            var a = r.getOptions(t), s = e.modules.size, u = e.modules.data, c = s + 2 * a.margin, l = a.color.light.a ? "<path " + o(a.color.light, "fill") + ' d="M0 0h' + c + "v" + c + 'H0z"/>' : "", f = "<path " + o(a.color.dark, "stroke") + ' d="' + function (e, t, n) {
                    for (var r = "", o = 0, a = !1, s = 0, u = 0; u < e.length; u++) {
                        var c = Math.floor(u % t), l = Math.floor(u / t);
                        c || a || (a = !0), e[u] ? (s++, u > 0 && c > 0 && e[u - 1] || (r += a ? i("M", c + n, .5 + l + n) : i("m", o, 0), o = 0, a = !1), c + 1 < t && e[u + 1] || (r += i("h", s), s = 0)) : o++
                    }
                    return r
                }(u, s, a.margin) + '"/>', p = 'viewBox="0 0 ' + c + " " + c + '"', d = '<svg xmlns="http://www.w3.org/2000/svg" ' + (a.width ? 'width="' + a.width + '" height="' + a.width + '" ' : "") + p + ' shape-rendering="crispEdges">' + l + f + "</svg>\n";
            return "function" == typeof n && n(null, d), d
        }
    }, 186: function (e, t, n) {
    }, 187: function (e, t, n) {
    }, 188: function (e, t, n) {
    }, 2: function (e, t, n) {
        var r;
        !function () {
            "use strict";
            var n = {}.hasOwnProperty;

            function o() {
                for (var e = [], t = 0; t < arguments.length; t++) {
                    var r = arguments[t];
                    if (r) {
                        var i = typeof r;
                        if ("string" === i || "number" === i) e.push(r); else if (Array.isArray(r) && r.length) {
                            var a = o.apply(null, r);
                            a && e.push(a)
                        } else if ("object" === i)for (var s in r)n.call(r, s) && r[s] && e.push(s)
                    }
                }
                return e.join(" ")
            }

            e.exports ? (o.default = o, e.exports = o) : void 0 === (r = function () {
                return o
            }.apply(t, [])) || (e.exports = r)
        }()
    }, 267: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), o = n(1), i = s(n(155)), a = s(n(88));

        function s(e) {
            return e && e.__esModule ? e : {default: e}
        }

        n(268);
        var u = (0, o.createElement)("div", {className: "tit"}, "红包雨专属通道"), c = (0, o.createElement)("div", {className: "tp"}), l = (0, o.createElement)("div", {className: "ewm"}, "优酷APP扫描二维码，开始抢红包！"), f = function (e) {
            function t(e) {
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t);
                var n = function (e, t) {
                    if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                return n.state = {showGuide: !1, qrCodeUrl: null}, n.retry = function () {
                    var e = Math.floor(3 * Math.random() * 1e3);
                    setTimeout(function () {
                        n.setState({qrCodeUrl: "https://qr.youku.com/qr?t=https://vku.youku.com/live/ilproom?id=" + n.props.roomId + "&refer=shijiebeizhibo_product.shanliang_daping_039000_rY3QVj_18061100"})
                    }, e)
                }, n
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, o.Component), r(t, [{
                key: "componentWillMount", value: function () {
                    var e = this;
                    a.default.io.on("interact_redpackRain", function (t) {
                        "widget_put" === t.msgType && (e.getQRCode(), e.redpackRain()), "widget_cancel" === t.msgType && e.cancelRedpackRain()
                    })
                }
            }, {
                key: "getQRCode", value: function () {
                    var e = this;
                    i.default.toDataURL("https://vku.youku.com/live/ilproom?id=" + this.props.roomId + "&refer=shijiebeizhibo_product.shanliang_daping_039000_rY3QVj_18061100", {errorCorrectionLevel: "H"}, function (t, n) {
                        t ? e.retry() : e.setState({qrCodeUrl: n})
                    })
                }
            }, {
                key: "redpackRain", value: function () {
                    var e = this;
                    this.timer && clearTimeout(this.timer), this.timer = setTimeout(function () {
                        e.setState({showGuide: !1})
                    }, 12e4), this.setState({showGuide: !0})
                }
            }, {
                key: "cancelRedpackRain", value: function () {
                    this.timer && clearTimeout(this.timer), this.setState({showGuide: !1})
                }
            }, {
                key: "render", value: function () {
                    var e = this.state, t = e.showGuide, n = e.qrCodeUrl;
                    return t ? (0, o.createElement)("div", {className: "guide-red-packet"}, (0, o.createElement)("div", {className: "red-packet-con"}, u, c, (0, o.createElement)("img", {
                        className: "qr",
                        src: n,
                        onError: this.retry
                    }), l, (0, o.createElement)("div", {
                        onClick: this.retry,
                        className: "retry"
                    }, "如二维码加载失败点击这里重试"))) : null
                }
            }]), t
        }();
        t.default = f, e.exports = t.default
    }, 268: function (e, t, n) {
    }, 27: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.default = void 0;
        var r = Object.assign || function (e) {
                for (var t = 1; t < arguments.length; t++) {
                    var n = arguments[t];
                    for (var r in n)Object.prototype.hasOwnProperty.call(n, r) && (e[r] = n[r])
                }
                return e
            }, o = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), i = n(1), a = n(28), s = n(55), u = (v(n(86)), n(59)), c = v(n(88)), l = v(n(93)), f = v(n(94)), p = v(n(46)), d = v(n(95)), h = v(n(68)), m = v(n(96));

        function v(e) {
            return e && e.__esModule ? e : {default: e}
        }

        var y = !0, g = function (e) {
            function t(e) {
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t);
                var n = function (e, t) {
                    if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                if (n.state = {
                        orientation: a.consts.SCREEN_PORTRAIT,
                        appId: "1000",
                        roomSocketTopic: "",
                        roomSocketExConnectInfo: {},
                        roomId: u.weexOptions.id,
                        roomTitle: "",
                        roomCover: "",
                        roomDesc: "",
                        roomScreenId: "",
                        roomAnchorId: "",
                        roomSdkVersion: 0,
                        roomStartTimestamp: "",
                        roomEndTimestamp: "",
                        roomState: -1,
                        userIsLogin: !1,
                        deUserBindTaobao: !0,
                        userFaceUrl: "",
                        userName: "",
                        userNumberId: "",
                        userVip: "",
                        userDeviceId: "",
                        clientIp: "",
                        showId: "",
                        showCode: "",
                        videoId: "",
                        userAreas: "",
                        playerIsSupportDlna: !1,
                        playerFreeFlowType: "live",
                        playerIsSupportTimeShift: !1,
                        playerIsAd: !1,
                        fixtureIsSupport: !1,
                        fixtureColorMode: 0,
                        tabData: [],
                        awardWidgetId: "",
                        awardName: "",
                        awardExtr: {},
                        sowingData: {isSupport: !1, vid: "", quality: 2},
                        reviewData: {isSupport: !1, vid: "", quality: 2},
                        stream: [],
                        adData: "",
                        chatWidgetId: "",
                        netState: a.consts.NET_UNKNOW,
                        isVertical: p.default.isVertical,
                        widgetInitData: {},
                        layout: "",
                        voteIcon: "",
                        iconAfterChatName: [],
                        isVideoControlViewShow: !0,
                        videoUrl: "",
                        isFree: !1,
                        widgetInitSysTime: (new Date).getTime(),
                        sysTimeDelay: 0,
                        showGift: !1,
                        isShowGiftEffect: !0,
                        isShowGiftTip: !1,
                        giftExtData: {},
                        deGoodList: [],
                        priceBtnShow: !1,
                        bottomInteractBarData: [{key: "selfPrice", show: !1}, {key: "cart", show: !1}, {
                            key: "vote",
                            show: !1
                        }, {key: "countdown", show: !1}, {key: "gift", show: !1}],
                        scgVideos: [],
                        showScgVideosPanel: !1,
                        tabCurrentIndex: 0,
                        showShoppingComponent: !0,
                        deBottomSlideData: null,
                        deBottomSlideShow: !1,
                        isAd: !1,
                        deCDAwardInfo: {},
                        deCDAwardCheckTipsShow: !1,
                        deCDAwardReceiveTipsShow: !1,
                        deCDAwardShow: !1,
                        deShowAwardResult: !1,
                        deAwardResultData: {}
                    }, n.playerToggleOperationTimer = null, p.default.isPad && y) {
                    var r = document.createElement("meta");
                    r.setAttribute("name", "viewport"), r.setAttribute("content", "width=1200px"), document.head.appendChild(r)
                }
                var o = n.state.isVertical;
                return window.addEventListener("orientationchange", function () {
                    switch (window.orientation) {
                        case 0:
                            o = !0;
                            break;
                        case-90:
                        case 90:
                            o = !1;
                            break;
                        case 180:
                            o = !0;
                            break;
                        default:
                            o = !0
                    }
                    n.setState({isVertical: o})
                }), n.updateUserInfo(), n.getRoomInfo(), n
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, i.Component), o(t, [{
                key: "updateGist", value: function () {
                    var e = this;
                    (0, f.default)({widgetId: this.state.awardWidgetId}).then(function (t) {
                        var n = t.data.records;
                        e.setState({deGoodList: n})
                    }).catch(function () {
                        h.default.show("查询用户过多，请您稍后重试"), e.setState({deGoodList: []})
                    })
                }
            }, {
                key: "getRoomInfo", value: function () {
                    var e = this;
                    (0, s.RoomInfo)().then(function (t) {
                        var n = t.data.scgVideos && t.data.scgVideos.map(function (e) {
                                return e.currentRoomTitle = t.data.name, e.liveId == t.data.liveId && (e.currentRoom = !0), e
                            }) || [], o = {
                            sysTime: t.sysTime,
                            roomId: t.data.liveId,
                            roomTitle: t.data.name,
                            clientIp: t.data.clientIp,
                            showId: t.data.showId,
                            showCode: t.data.showCode,
                            videoId: t.data.videoId,
                            roomCover: {uri: t.data.imgBUrl},
                            roomSocketTopic: t.data.chatRoomConnectionInfo.ext.topic,
                            roomSocketExConnectInfo: t.data.chatRoomConnectionInfo,
                            roomDesc: t.data.description,
                            roomScreenId: t.data.screenId,
                            roomAnchorId: t.data.userId,
                            roomSdkVersion: t.data.sdkVersion ? parseInt(t.data.sdkVersion.split(".").join("")) : 0,
                            roomStartTimestamp: t.data.startTimestamp,
                            roomEndTimestamp: t.data.endTimestamp,
                            roomState: t.data.liveStatus,
                            userAreas: t.data.areas,
                            sowingData: {
                                isSupport: !!t.data.broadcastVideoCode,
                                vid: t.data.broadcastVideoCode || "",
                                quality: "2"
                            },
                            reviewData: {
                                isSupport: !!t.data.videoUrlCode,
                                vid: t.data.videoUrlCode || "",
                                quality: t.data.videoUrlQuality || "2"
                            },
                            stream: t.data.stream,
                            adData: t.data.adInfo,
                            layout: t.data.layout || "",
                            categoryId: t.data.categoryId,
                            bizType: t.data.bizType,
                            qrCodeUrl: t.data.qrCodeUrl,
                            sdkTopBackgroundUrl: t.data.sdkTopBackgroundUrl || "https://gw.alicdn.com/tfs/TB1n_nCvxjaK1RjSZKzXXXVwXXa-750-756.png",
                            sdkBackgroundUrl: t.data.sdkBackgroundUrl || "https://gw.alicdn.com/tfs/TB1XXDavBLoK1RjSZFuXXXn0XXa-750-642.png",
                            backgroundUrl: t.data.backgroundUrl || "//r1.ykimg.com/051000005B6BF129A118830C880F0AF5",
                            backgroundColor: t.data.mediaExtendBackgroundColor || "2aa1ff",
                            widgetShareImgUrl: t.data.widgetShareImgUrl || t.data.imgSUrl,
                            widgetShareTitle: t.data.widgetShareTitle || t.data.name,
                            widgetShareDescription: t.data.widgetShareDescription || t.data.name,
                            partner: t.data.partner,
                            videoUrl: t.data.videoUrl ? t.data.videoUrl : "",
                            scgVideos: n,
                            showScgVideosPanel: n.length > 1
                        };
                        try {
                            o.layout = JSON.parse((0, a.base64Decode)(o.layout))
                        } catch (e) {
                            o.layout = null
                        }
                        return o.degradeSVGAClose = (0, u.isAndroid)() && o.roomSdkVersion < 124, s.Stat.init(t.data), s.Stat.PV(), e.setState(r({}, o)), e.roomInitInfoDidLoad(t), t
                    }).catch(function (t) {
                        e.roomException(1e3, "请求房间初始化间信息失败", t)
                    }).then(function (t) {
                        (0, s.WidgetInfo)(e.state.appId, e.state.roomId).then(function (e) {
                            return e.data
                        }).catch(function (t) {
                            e.roomException(1004, "请求互动组件初始化信息失败", t)
                        }).then(function (n) {
                            e.widgetInitInfoDidLoad(n, t)
                        }).catch(function (t) {
                            e.roomException(1005, "互动组件初始化失败", t)
                        })
                    }).catch(function (t) {
                        e.roomException(1003, "房间信息初始化失败", t)
                    }).then(function () {
                        return e.socketWillConnect(), e.connectSocket().pm
                    }).catch(function (t) {
                        e.roomException(1002, "socket链接失败", t)
                    }), this.throttleLogin = this.throttle(function (t, n) {
                        e._login(t, n)
                    }, 300, 1e3)
                }
            }, {
                key: "componentWillUnmount", value: function () {
                    c.default.io.disConnect()
                }
            }, {
                // key: "connectSocket", value: function () {
                //     var e = {
                //         appId: this.state.appId,
                //         roomId: this.state.roomId,
                //         topic: this.state.roomSocketTopic,
                //         cdnPullRequestPath: "https://live-interact.youku.com/interactPlatform/outboundMsg/" + this.state.appId + "/" + this.state.roomId,
                //         cdnPullRequestIntervalTime: 3e3,
                //         cdnExpireTime: 2e4,
                //         connectExInfo: this.state.roomSocketExConnectInfo
                //     };
                //     return e.webPmOption = {appKey: lib && lib.mtop && lib.mtop.config.liveAppkey || ""}, c.default.io.connect(e)
                // }
            }, {
                key: "roomException", value: function (e, t) {
                    var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {};
                    console.log("room error", e, t, n)
                }
            }, {
                key: "socketWillConnect", value: function () {
                    var e = this;
                    c.default.io.on("live_state_change", function (t) {
                        var n = parseInt(Math.random() * (t.dt || 3) * 1e3);
                        setTimeout(function () {
                            0 == t.st && (s.Stat.setLiveType(2), e.setState({
                                roomState: 2,
                                scgVideos: []
                            })), 1 == t.st && (s.Stat.setLiveType(1), e.setState({roomState: 1}), m.default.liveUploadMixinStartLiveUpload())
                        }, n)
                    }), c.default.io.on("interact_myaward", function (t) {
                        t.widgetId;
                        var n = t.data, r = t.msgType;
                        if ("widget_put" == r)try {
                            var o = 3;
                            try {
                                o = n.bizData.ttl
                            } catch (e) {
                            }
                            var i = Math.floor(Math.random() * o * 1e3);
                            if (e.state.priceBtnShow)return;
                            setTimeout(function () {
                                e.visibleChange("selfPrice", !0);
                                var t = n.bizData.extr ? JSON.parse(n.bizData.extr) : null;
                                e.setState({
                                    priceBtnShow: !0,
                                    awardWidgetId: n.bizData.id,
                                    awardName: n.bizData.name,
                                    awardExtr: t
                                })
                            }, i)
                        } catch (e) {
                        } else if ("widget_cancel" == r) {
                            var a = Math.floor(3 * Math.random() * 1e3);
                            setTimeout(function () {
                                e.visibleChange("selfPrice", !1), e.setState({priceBtnShow: !1})
                            }, a)
                        }
                    })
                }
            }, {
                key: "visibleChange", value: function (e, t) {
                    var n = !1, o = this.state.bottomInteractBarData.map(function (o) {
                        return o.key == e && o.show != t && (o.show = !!t, n = !0), r({}, o)
                    });
                    n && this.setState({bottomInteractBarData: o})
                }
            }, {
                key: "roomInitInfoDidLoad", value: function () {
                }
            }, {
                key: "widgetInitInfoDidLoad", value: function () {
                    var e = this, t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {
                        list: [],
                        sysTime: (new Date).getTime()
                    };
                    arguments[1];
                    var n = {};
                    for (var r in t.list.forEach(function (t) {
                        var r = t.widgetName, o = t.widgetId;
                        if (r && !n[t.widgetName] && (n[t.widgetName] = []), "chat" == r) e.setState({chatWidgetId: o}); else if ("doc" == r) e.setState({docWidgetId: o}); else if ("myaward" == r) {
                            e.visibleChange("selfPrice", !0);
                            var i = t.bizData.extr ? JSON.parse(t.bizData.extr) : {};
                            e.setState({awardWidgetId: o, priceBtnShow: !0, awardName: t.bizData.name, awardExtr: i})
                        } else if ("gift" == r && (e.state.roomSdkVersion >= 124 || y)) {
                            var a = {};
                            try {
                                a = t.bizData.ext ? JSON.parse(t.bizData.ext) : {}
                            } catch (e) {
                            }
                            e.setState({showGift: !0, giftExtData: a}), e.visibleChange("gift", !0)
                        }
                        n[t.widgetName].push(t)
                    }), n.didLoad = !0, this.setState({
                        widgetInitData: n,
                        widgetInitSysTime: t.sysTime,
                        sysTimeDelay: (new Date).getTime() - t.sysTime
                    }), a.GolbalStore.setSysTimeDelay(this.state.sysTimeDelay), n)d.default.emit(r, n[r]);
                    m.default.init(this.state.showId, this.state.videoId), 1 == this.state.roomState && m.default.liveUploadMixinStartLiveUpload()
                }
            }, {
                key: "updateUserInfo", value: function () {
                    var e = this;
                    s.UserInfo.getUserInfo().then(function (t) {
                        e.setState({
                            userIsLogin: t.isLogin,
                            userFaceUrl: t.faceUrl,
                            userName: t.userName,
                            userNumberId: t.userNumberId,
                            userEncodeUid: t.encodeUid,
                            userVip: t.vip,
                            userDeviceId: t.deviceId
                        }), s.Track.setUdtid(t.deviceId), s.Track.setVip(t.vip), l.default.log("更新用户信息", t)
                    }).catch(function (t) {
                        e.roomException(2e3, "请求用户信息失败", t)
                    })
                }
            }, {
                key: "fetchTaobaoBindingInfo", value: function () {
                    return !(arguments.length > 0 && void 0 !== arguments[0]) || arguments[0], Promise.resolve({openUserId: 12313123})
                }
            }, {
                key: "updateTaobaoUserInfo", value: function () {
                    var e = this, t = !(arguments.length > 0 && void 0 !== arguments[0]) || arguments[0];
                    return this.fetchTaobaoBindingInfo(t).then(function (t) {
                        l.default.log("更新淘宝绑定信息", t), e.setState({deUserBindTaobao: !0})
                    }).catch(function (t) {
                        l.default.log("更新淘宝绑定信息失败", t), e.setState({deUserBindTaobao: !1})
                    })
                }
            }, {
                key: "userBindTaoBao", value: function () {
                    return Promise.resolve()
                }
            }, {
                key: "deCheckUserLogin", value: function () {
                    var e = this.state, t = e.userIsLogin, n = e.deUserBindTaobao;
                    return t ? n || this.userBindTaoBao() : this.login(), n && t
                }
            }, {
                key: "login", value: function () {
                    this.throttleLogin(this.state.isVertical, a.consts.pspAnalyticsString)
                }
            }, {
                key: "_login", value: function (e, t) {
                    this.setScreenPortrait(), s.UserInfo.login(e, t)
                }
            }, {
                key: "setScreenPortrait", value: function () {
                    this.state.isVertical || s.Screen.setOrientation(a.consts.SCREEN_PORTRAIT)
                }
            }, {
                key: "throttle", value: function (e, t, n) {
                    var r = null, o = void 0;
                    return function () {
                        var i = this, a = arguments, s = +new Date;
                        clearTimeout(r), o || (o = s), s - o >= n ? (e.apply(i, a), o = s) : r = setTimeout(function () {
                            return e.apply(i, a)
                        }, t)
                    }
                }
            }, {
                key: "exit", value: function () {
                    c.default.io.disConnect(), s.Device.exit()
                }
            }, {
                key: "showBottomSlideWithData", value: function () {
                    var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : null;
                    this.setState({deBottomSlideData: e, deBottomSlideShow: !0})
                }
            }, {
                key: "closebottomSlide", value: function () {
                    this.setState({deBottomSlideShow: !1, deBottomSlideData: null})
                }
            }, {
                key: "showAwardResult", value: function (e) {
                    var t = this;
                    "shop" == (arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "other") && (e.rightDTO = {}, e.isSucc = !0, "first" == e.priceType ? (e.awardResultType = "physicalPrize", e.rightDTO.winPicUrl = e.extra.itemPic) : e.awardResultType = "lottery"), e.awardResultType || (e.awardResultType = "better"), this.setState({
                        deShowAwardResult: !0,
                        deAwardResultData: e
                    }), setTimeout(function () {
                        t.refs.awardResult && t.refs.awardResult.play()
                    }, 100)
                }
            }, {
                key: "closeAwardResult", value: function () {
                    this.setState({deShowAwardResult: !1, deAwardResultData: null})
                }
            }]), t
        }();
        t.default = g, e.exports = t.default
    }, 28: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.GolbalStore = t.Device = t.AilpError = t.consts = t.base64Decode = t.base64Encode = t.mtop = t.EventEmitter = void 0;
        var r = l(n(29)), o = l(n(30)), i = n(47), a = l(n(49)), s = l(n(50)), u = function (e) {
            if (e && e.__esModule)return e;
            var t = {};
            if (null != e)for (var n in e)Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
            return t.default = e, t
        }(n(51)), c = l(n(54));

        function l(e) {
            return e && e.__esModule ? e : {default: e}
        }

        t.EventEmitter = r.default, t.mtop = o.default, t.base64Encode = i.encode, t.base64Decode = i.decode, t.consts = a.default, t.AilpError = s.default, t.Device = u, t.GolbalStore = c.default
    }, 29: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }();
        var o = function () {
            function e() {
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, e), this.__EVENTS = {}
            }

            return r(e, [{
                key: "on", value: function (e, t) {
                    this.__EVENTS[e] || (this.__EVENTS[e] = []), this.__EVENTS[e].push(t)
                }
            }, {
                key: "off", value: function (e, t) {
                    var n = this, r = this.__EVENTS[e], o = function () {
                        delete n.__EVENTS[e]
                    };
                    r && (t ? 0 == (r = r.filter(function (e) {
                        if (e !== t)return e
                    })).length ? (this.__EVENTS[e] = [], o()) : this.__EVENTS[e] = r : o())
                }
            }, {
                key: "emit", value: function (e) {
                    for (var t = this, n = arguments.length, r = Array(n > 1 ? n - 1 : 0), o = 1; o < n; o++)r[o - 1] = arguments[o];
                    var i = this.__EVENTS[e];
                    i && i.length > 0 && i.forEach(function (e) {
                        e.apply(t, r)
                    })
                }
            }]), e
        }();
        t.default = o, e.exports = t.default
    }, 30: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = o(n(31));

        function o(e) {
            return e && e.__esModule ? e : {default: e}
        }

        var i = o(n(45)).default.getInstance("AILP Mtop"), a = {
            request: function (e) {
                return lib.mtop && lib.mtop.config.liveAppkey && !e.appKey && (e.appKey = lib.mtop.config.liveAppkey), i.log("send", e), new Promise(function (t, n) {
                    r.default.request(e, function (e) {
                        if (e.ret) {
                            var n = e.ret[0].split("::");
                            e.isSYSFail = !1, e.ailpRetCode = n[0], e.ailpRetMessage = n[1]
                        }
                        console.log('request', e);
                        i.log("response", e), t(e);
                    }, function (t) {
                        console.log('request err', t);
                        if (t.ret) {
                            var r = t.ret[0].split("::");
                            t.isSYSFail = /^FAIL_SYS/.test(r[0]), t.ailpRetCode = r[0], t.ailpRetMessage = r[1] || "请重试"
                        }
                        t.api = e.api, i.log("error", t), n(t)
                    })
                })
            }, config: function (e, t) {
                return r.default.config(e, t)
            }
        };
        t.default = a, e.exports = t.default
    }, 31: function (e, t, n) {
        "use strict";
        e.exports = n(32)
    }, 32: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = Object.assign || function (e) {
                for (var t = 1; t < arguments.length; t++) {
                    var n = arguments[t];
                    for (var r in n)Object.prototype.hasOwnProperty.call(n, r) && (e[r] = n[r])
                }
                return e
            }, o = n(33);
        try {
            n(43)
        } catch (e) {
            console.warn("Windvane require error")
        }
        try {
            n(44)
        } catch (e) {
            console.warn("Mtop require error")
        }
        var i = {ERROR: -1, SUCCESS: 0, TOKEN_EXPIRED: 1, SESSION_EXPIRED: 2};
        t.default = {
            request: function (e, t, n) {
                var r = function (r) {
                    (n = n || t) && n(r), function (e, t) {
                        if (!e.disableTracker) {
                            var n = void 0;
                            try {
                                n = JSON.stringify(t)
                            } catch (e) {
                            }
                            try {
                                (0, o.report)({
                                    url: location.protocol + "//" + location.host + location.pathname + "/universal_mtop",
                                    type: "data",
                                    sampling: 10,
                                    message: n ? n.substring(0, 500) : e.api + ":response can not be parse"
                                })
                            } catch (e) {
                            }
                        }
                    }(e, r)
                };
                if ("undefined" != typeof lib && lib.mtop)return lib.mtop.request(e, function (n) {
                    n && n.ret && n.ret.length && "WV_ERR::PARAM_PARSE_ERROR" === n.ret[0] ? lib.mtop.H5Request(e, t, r) : t && t(n)
                }, r)
            }, config: function (e, t) {
                "undefined" != typeof lib && lib.mtop && ("string" == typeof e ? lib.mtop.config[e] = t : lib.mtop.config = r({}, lib.mtop.config, e))
            }, RESPONSE_TYPE: i
        }, e.exports = t.default
    }, 33: function (e, t, n) {
        "use strict";
        e.exports = n(34)
    }, 34: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = Object.assign || function (e) {
                for (var t = 1; t < arguments.length; t++) {
                    var n = arguments[t];
                    for (var r in n)Object.prototype.hasOwnProperty.call(n, r) && (e[r] = n[r])
                }
                return e
            }, o = a(n(35)), i = a(n(40));

        function a(e) {
            return e && e.__esModule ? e : {default: e}
        }

        t.default = r({}, o.default, i.default), e.exports = t.default
    }, 35: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        "function" == typeof Symbol && Symbol.iterator;
        var r = i(n(36)), o = n(38);
        i(n(39));
        function i(e) {
            return e && e.__esModule ? e : {default: e}
        }

        var a = {
            record: function (e, t, n, r) {
                window.goldlog && (n = "string" == typeof n ? n : (0, o.objToParams)(n, !0), window.goldlog.record(e, t, n, r))
            }, launch: function () {
                var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : r.default.getPageSPM(), t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {}, n = (0, o.makeChkSum)(e.join(".")), i = {
                    checksum: n,
                    is_auto: !1,
                    page_id: ""
                };
                if (t.page_id && (i.page_id = t.page_id, delete t.page_id), !!(0, o.getMetaContentByName)("aplus-waiting")) {
                    var a = window.goldlog_queue || (window.goldlog_queue = []);
                    a.push({action: "goldlog.setPageSPM", arguments: [e[0], e[1]]}), a.push({
                        action: "goldlog.sendPV",
                        arguments: [i, t]
                    })
                } else window.goldlog && window.goldlog.setPageSPM && window.goldlog.setPageSPM(e[0], e[1], function () {
                    window.goldlog.sendPV && window.goldlog.sendPV({checksum: n})
                })
            }, updateNextProps: function () {
                !(arguments.length > 0 && void 0 !== arguments[0]) || arguments[0]
            }, updatePageUtparam: function () {
                !(arguments.length > 0 && void 0 !== arguments[0]) || arguments[0]
            }, updateNextPageUtparam: function () {
                !(arguments.length > 0 && void 0 !== arguments[0]) || arguments[0]
            }
        };
        a.sendPV = a.launch, t.default = a, e.exports = t.default
    }, 36: function (e, t, n) {
        "use strict";
        e.exports = n(37)
    }, 37: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = void 0;
        if (void 0 !== window.__UNIVERSAL_SPM__) r = window.__UNIVERSAL_SPM__; else {
            var o = ["0", "0"];
            r = {
                getPageSPM: function () {
                    if (window.goldlog) {
                        var e = window.goldlog.spm_ab;
                        o = e && Array.isArray(e) && "0.0" !== e.join(".") ? e : o
                    }
                    return [o[0], o[1]]
                }, getSPM: function (e, t) {
                    return [].concat(this.getPageSPM(), e || 0, t || 0)
                }, getSPMQueryString: function (e, t) {
                    return "spm=" + this.getSPM(e, t).join(".")
                }, setPageSPM: function (e, t) {
                    (o[0] = e, o[1] = t, window.goldlog && window.goldlog.setPageSPM) ? window.goldlog.setPageSPM(e, t) : (window.goldlog_queue || (window.goldlog_queue = [])).push({
                        action: "goldlog.setPageSPM",
                        arguments: [e, t]
                    })
                }
            }, window.__UNIVERSAL_SPM__ = r
        }
        t.default = r, e.exports = t.default
    }, 38: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.paramsToObj = function (e) {
            for (var t = {}, n = (e = "string" == typeof e ? e : "").split("&"), r = 0; r < n.length; r++) {
                var o = n[r], i = o.split("="), a = i[0], s = i[1];
                a && (t[a] = s)
            }
            return t
        }, t.objToParams = function (e, t) {
            var n = [];
            for (var r in e)if (e.hasOwnProperty(r)) {
                var o = t ? encodeURIComponent(e[r]) : e[r];
                n.push(r + "=" + o)
            }
            return n.join("&")
        }, t.getParamFromURL = function (e) {
            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "spm", n = "";
            return (e.split("?")[1] || "").split("&").forEach(function (e) {
                0 === e.indexOf(t + "=") && (n = e.substr(t.length + 1))
            }), n
        }, t.makeChkSum = function (e) {
            var t = (e = (e || "").split("#")[0].split("?")[0]).length;
            return t ? function (e) {
                for (var t = e.length, n = 0, r = 0; r < t; r++)n = 31 * n + e.charCodeAt(r);
                return n
            }(t + "#" + e.charCodeAt(t - 1)) : -1
        }, t.getMetaContentByName = function (e) {
            var t = window && window.document && window.document.getElementsByTagName("meta")[e];
            return t ? t.getAttribute("content") : ""
        }, t.simplifyURL = function () {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "";
            e.indexOf("_wx_tpl=") > -1 && (e = e.substring(e.indexOf("_wx_tpl=") + "_wx_tpl=".length, e.indexOf(".js") + ".js".length));
            return e.split("?")[0]
        }
    }, 39: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        "function" == typeof Symbol && Symbol.iterator;
        var r = void 0;
        "undefined" != typeof __weex_options__ && __weex_options__.weex;
        t.default = {
            customAdvance: function (e, t, n, o, i, a) {
                r.customAdvance(e, t, n, o, i, a)
            }, commit: function (e, t, n, o) {
                r.commit(e, t, n, o)
            }, enterEvent: function (e, t) {
                r.enterEvent ? r.enterEvent(e, t) : r.commit("enter", e, "", t)
            }, updatePageUtparam: function (e) {
                r.updatePageUtparam(e)
            }, updateNextPageUtparam: function (e) {
                r.updateNextPageUtparam(e)
            }, commitut: function (e, t, n, o, i, a, s, u) {
                r.commitut ? r.commitut(e, t, n, o, i, a, s, u) : r.commit && r.commit(e, i, i, u)
            }
        }, e.exports = t.default
    }, 40: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = n(41), o = s(n(42)), i = s(n(35)), a = n(38);

        function s(e) {
            return e && e.__esModule ? e : {default: e}
        }

        var u = 0;
        t.default = {
            report: function (e) {
                if (++u > 20)return !1;
                var t = {
                    screen: r.width + "x" + r.height,
                    sampling: 1,
                    url: o.default.format(e),
                    version: "universal-goldlog/2.1.0",
                    native: 0
                }, n = Object.assign({name: location.href}, t, e);
                Math.random() * n.sampling < 1 && i.default.record("/jstracker.3", "OTHER", (0, a.objToParams)(n), "H46777406")
            }
        }, e.exports = t.default
    }, 41: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = window.screen || {}, o = r.height, i = r.width;
        t.width = i = parseInt(i, 10), t.height = o = parseInt(o, 10), t.width = i, t.height = o
    }, 42: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = {render: "rx_render_err", data: "rx_data_fetch_err"};
        t.default = {
            format: function (e) {
                var t = location.href || "", n = r[e.type || "custom"] || "rx_user_define_err";
                return [t.replace(/[\?#].*$/, "").replace(/\/$/, ""), e.module || "", n].join("/")
            }
        }, e.exports = t.default
    }, 43: function (e, t) {
        e.exports = require("@weex-module/windvane")
    }, 44: function (e, t) {
        e.exports = require("@weex-module/mtop")
    }, 45: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        "function" == typeof Symbol && Symbol.iterator;
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }();
        !function (e) {
            e && e.__esModule
        }(n(46));
        var o = function () {
            function e(t) {
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, e), this.name = t
            }

            return r(e, [{
                key: "_send", value: function (e) {
                    arguments.length > 1 && void 0 !== arguments[1] && arguments[1]
                }
            }, {
                key: "log", value: function () {
                    for (var e = arguments.length, t = Array(e), n = 0; n < e; n++)t[n] = arguments[n];
                    return this.info.apply(this, t)
                }
            }, {
                key: "info", value: function () {
                    for (var e = arguments.length, t = Array(e), n = 0; n < e; n++)t[n] = arguments[n];
                    this._send("info", t)
                }
            }, {
                key: "debug", value: function () {
                    for (var e = arguments.length, t = Array(e), n = 0; n < e; n++)t[n] = arguments[n];
                    this._send("debug", t)
                }
            }, {
                key: "error", value: function () {
                    for (var e = arguments.length, t = Array(e), n = 0; n < e; n++)t[n] = arguments[n];
                    this._send("error", t)
                }
            }]), e
        }();
        o.getInstance = function (e) {
            return {
                log: function () {
                }, info: function () {
                }, debug: function () {
                }, error: function () {
                }
            }
        }, t.default = o, e.exports = t.default
    }, 46: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = navigator.userAgent.toLowerCase(), o = {
            mac: /mac/.test(r),
            webkit: /webkit/.test(r),
            safari: /safari/.test(r) && !/chrome/.test(r),
            opera: /opera/.test(r),
            IE: /msie|trident/.test(r) && !/opera/.test(r),
            mozilla: /mozilla/.test(r) && !/(compatible|webkit)/.test(r),
            IKU: /iku|ikucid/.test(r),
            wechat: /micromessenger/.test(r),
            dingtalk: /dingtalk/.test(r),
            youku: /youku/.test(r) && !/youku_hd/.test(r),
            youkuHD: /youku_hd/.test(r),
            iOS: (r.match(/(ipad|iphone|ipod)/) || [])[0],
            iOSVersion: (r.match(/os\s+([\d_]+)\s+like\s+mac\s+os/) || [0, "0_0_0"])[1].split("_"),
            wphone: parseFloat((r.match(/windows\sphone\s(?:os\s)?([\d.]+)/) || ["", "0"])[1]),
            android: parseFloat((r.match(/android[\s|\/]([\d.]+)/) || ["", "0"])[1]),
            youkuVersion: (r.match(/youku\/+([\d.]+)/i) || [0, "0.0.0"])[1],
            chrome: parseFloat((r.match(/chrome[\s|\/]([\d.]+)/) || ["", "0"])[1])
        };
        // o.isMobile = !(!o.iOS && !o.wphone && !o.android && void 0 === window.orientation), o.isPad = o.isMobile && ("ipad" == o.iOS || -1 == r.indexOf("mobile") || -1 != r.indexOf("windows nt") && -1 != r.indexOf("touch")) || !1, o.isPhone = o.isMobile && ("iphone" == o.iOS || "ipod" == o.iOS) || -1 != r.indexOf("mobile") && !!o.android || !1, o.isVertical = 90 !== window.orientation && -90 !== window.orientation, t.default = o, e.exports = t.default
        o.isMobile = true, o.isPad = o.isMobile && ("ipad" == o.iOS || -1 == r.indexOf("mobile") || -1 != r.indexOf("windows nt") && -1 != r.indexOf("touch")) || !1, o.isPhone = true, o.isVertical = 90 !== window.orientation && -90 !== window.orientation, t.default = o, e.exports = t.default
    }, 47: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.encode = function (e) {
            var t, n, i, a, s, u, c, l = "", f = 0;
            e = r.encode(e);
            for (; f < e.length;)t = e.charCodeAt(f++), n = e.charCodeAt(f++), i = e.charCodeAt(f++), a = t >> 2, s = (3 & t) << 4 | n >> 4, u = (15 & n) << 2 | i >> 6, c = 63 & i, isNaN(n) ? u = c = 64 : isNaN(i) && (c = 64), l = l + o.charAt(a) + o.charAt(s) + o.charAt(u) + o.charAt(c);
            return l
        }, t.decode = function (e) {
            var t, n, i, a, s, u, c, l = "", f = 0;
            e = e.replace(/[^A-Za-z0-9\+\/\=]/g, "");
            for (; f < e.length;)a = o.indexOf(e.charAt(f++)), s = o.indexOf(e.charAt(f++)), u = o.indexOf(e.charAt(f++)), c = o.indexOf(e.charAt(f++)), t = a << 2 | s >> 4, n = (15 & s) << 4 | u >> 2, i = (3 & u) << 6 | c, l += String.fromCharCode(t), 64 != u && (l += String.fromCharCode(n)), 64 != c && (l += String.fromCharCode(i));
            return l = r.decode(l)
        };
        var r = n(48), o = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/="
    }, 48: function (e, t, n) {
        !function (e) {
            var t, n, r, o = String.fromCharCode;

            function i(e) {
                for (var t, n, r = [], o = 0, i = e.length; o < i;)(t = e.charCodeAt(o++)) >= 55296 && t <= 56319 && o < i ? 56320 == (64512 & (n = e.charCodeAt(o++))) ? r.push(((1023 & t) << 10) + (1023 & n) + 65536) : (r.push(t), o--) : r.push(t);
                return r
            }

            function a(e) {
                if (e >= 55296 && e <= 57343)throw Error("Lone surrogate U+" + e.toString(16).toUpperCase() + " is not a scalar value")
            }

            function s(e, t) {
                return o(e >> t & 63 | 128)
            }

            function u(e) {
                if (0 == (4294967168 & e))return o(e);
                var t = "";
                return 0 == (4294965248 & e) ? t = o(e >> 6 & 31 | 192) : 0 == (4294901760 & e) ? (a(e), t = o(e >> 12 & 15 | 224), t += s(e, 6)) : 0 == (4292870144 & e) && (t = o(e >> 18 & 7 | 240), t += s(e, 12), t += s(e, 6)), t += o(63 & e | 128)
            }

            function c() {
                if (r >= n)throw Error("Invalid byte index");
                var e = 255 & t[r];
                if (r++, 128 == (192 & e))return 63 & e;
                throw Error("Invalid continuation byte")
            }

            function l() {
                var e, o;
                if (r > n)throw Error("Invalid byte index");
                if (r == n)return !1;
                if (e = 255 & t[r], r++, 0 == (128 & e))return e;
                if (192 == (224 & e)) {
                    if ((o = (31 & e) << 6 | c()) >= 128)return o;
                    throw Error("Invalid continuation byte")
                }
                if (224 == (240 & e)) {
                    if ((o = (15 & e) << 12 | c() << 6 | c()) >= 2048)return a(o), o;
                    throw Error("Invalid continuation byte")
                }
                if (240 == (248 & e) && (o = (7 & e) << 18 | c() << 12 | c() << 6 | c()) >= 65536 && o <= 1114111)return o;
                throw Error("Invalid UTF-8 detected")
            }

            e.version = "3.0.0", e.encode = function (e) {
                for (var t = i(e), n = t.length, r = -1, o = ""; ++r < n;)o += u(t[r]);
                return o
            }, e.decode = function (e) {
                t = i(e), n = t.length, r = 0;
                for (var a, s = []; !1 !== (a = l());)s.push(a);
                return function (e) {
                    for (var t, n = e.length, r = -1, i = ""; ++r < n;)(t = e[r]) > 65535 && (i += o((t -= 65536) >>> 10 & 1023 | 55296), t = 56320 | 1023 & t), i += o(t);
                    return i
                }(s)
            }
        }(t)
    }, 49: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.default = {
            pspAnalyticsString: "LiveOGCRoom",
            SCREEN_LANDSCAPE_RIGHT: "landscapeRight",
            SCREEN_LANDSCAPE_LEFT: "landscapeLeft",
            SCREEN_PORTRAIT: "portrait",
            SCREEN_PORTRAIT_UPSIDE_DOWN: "portraitUpsideDown",
            STATUS_BAR_LIGHT_COLOR: "light",
            STATUS_BAR_DARK_COLOR: "dark",
            NET_UNKNOW: "YKLNetUnknow",
            NET_WIFI: "YKLNetWifi",
            NET_CELL: "YKLNetCell",
            PAGE_APPEAR: "YKLPageAppear",
            PAGE_DISPPEAR: "YKLPageDisappear",
            PAGE_FOREGROUND: "YKLPageForeground",
            PAGE_BACKGROUND: "YKLPageBackground",
            SHAREURL: "https://vku.youku.com/live/ilproom?id="
        }, e.exports = t.default
    }, 5: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.default = void 0;
        var r = n(1), o = !1;

        function i(e) {
            return (i = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
                return typeof e
            } : function (e) {
                return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
            })(e)
        }

        function a() {
            return (a = Object.assign || function (e) {
                    for (var t = 1; t < arguments.length; t++) {
                        var n = arguments[t];
                        for (var r in n)Object.prototype.hasOwnProperty.call(n, r) && (e[r] = n[r])
                    }
                    return e
                }).apply(this, arguments)
        }

        function s(e, t) {
            for (var n = 0; n < t.length; n++) {
                var r = t[n];
                r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
            }
        }

        function u(e, t) {
            return !t || "object" !== i(t) && "function" != typeof t ? function (e) {
                if (void 0 === e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                return e
            }(e) : t
        }

        function c(e) {
            return (c = Object.setPrototypeOf ? Object.getPrototypeOf : function (e) {
                return e.__proto__ || Object.getPrototypeOf(e)
            })(e)
        }

        function l(e, t) {
            return (l = Object.setPrototypeOf || function (e, t) {
                    return e.__proto__ = t, e
                })(e, t)
        }

        function f(e, t, n) {
            return t in e ? Object.defineProperty(e, t, {
                value: n,
                enumerable: !0,
                configurable: !0,
                writable: !0
            }) : e[t] = n, e
        }

        var p = function (e) {
            function t() {
                return function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t), u(this, c(t).apply(this, arguments))
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function");
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        writable: !0,
                        configurable: !0
                    }
                }), t && l(e, t)
            }(t, r.Component), function (e, t, n) {
                t && s(e.prototype, t), n && s(e, n)
            }(t, [{
                key: "render", value: function () {
                    var e = this.props;
                    if (o)return (0, r.createElement)("div", e);
                    var t = function (e) {
                        for (var t = 1; t < arguments.length; t++) {
                            var n = null != arguments[t] ? arguments[t] : {}, r = Object.keys(n);
                            "function" == typeof Object.getOwnPropertySymbols && (r = r.concat(Object.getOwnPropertySymbols(n).filter(function (e) {
                                return Object.getOwnPropertyDescriptor(n, e).enumerable
                            }))), r.forEach(function (t) {
                                f(e, t, n[t])
                            })
                        }
                        return e
                    }({}, d.initial, e.style);
                    return (0, r.createElement)("div", a({}, e, {style: t}))
                }
            }]), t
        }();
        f(p, "propTypes", {});
        var d = {
            initial: {
                border: "0 solid black",
                position: "relative",
                boxSizing: "border-box",
                display: "flex",
                flexDirection: "column",
                alignContent: "flex-start",
                flexShrink: 0
            }
        }, h = p;
        t.default = h, e.exports = t.default
    }, 50: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        t.default = function e(t, n, r) {
            !function (e, t) {
                if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
            }(this, e), this.code = t, this.msg = n, this.data = r
        }, e.exports = t.default
    }, 51: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.weexOptions = t.BOTTOM_WX = t.STATUS_BAR_HEIGHT_WX = t.ENV = void 0;
        var r = Object.assign || function (e) {
                for (var t = 1; t < arguments.length; t++) {
                    var n = arguments[t];
                    for (var r in n)Object.prototype.hasOwnProperty.call(n, r) && (e[r] = n[r])
                }
                return e
            };
        t.wx = function (e) {
            return e + "px"
        }, t.px = function (e) {
            return Math.ceil(e / 2) + "px"
        }, t.isIos = m, t.isIphoneX = v, t.isLess375 = function () {
            return l < 375
        }, t.isH5Web = function () {
            return !!i
        }, t.isAndroid = y, t.wxToPx = g, t.pxToWx = function (e) {
            return e * l / 750
        }, t.screenWidth = function () {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "wx", t = l;
            "px" == e && (t = g(t));
            return t
        }, t.screenHeight = function () {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "wx", t = f;
            "px" == e && (t = g(t));
            return t
        }, t.halfscreenHeight = function () {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "wx", t = f - (422 + h) / 2;
            "px" == e && (t = g(t));
            return t
        }, t.navigator = b, t.getMemoryInfo = function () {
            return new Promise(function (e) {
                e({})
            })
        }, t.isLess1009 = w, t.closeAllInteract = function () {
            return w() && y()
        };
        var o = n(52), i = !0;
        var a = (0, o.params)(), s = "undefined" != typeof __weex_options__ ? __weex_options__.env ? __weex_options__ : __weex_options__.weex.config : r({}, a, {
            env: {
                scale: 1,
                deviceWidth: screen.width * window.devicePixelRatio,
                deviceHeight: screen.height * window.devicePixelRatio,
                osName: "web",
                osVersion: b.appVersion,
                platform: "web",
                appName: "YoukuLiveWeb",
                deviceModel: "live-web",
                appVersion: "99.99.99",
                utdid: "",
                dpr: window.devicePixelRatio
            }
        }), u = s.env, c = u.dpr || u.scale, l = u.deviceWidth / c, f = u.deviceHeight / c, p = m(), d = v(), h = (t.ENV = u, t.STATUS_BAR_HEIGHT_WX = p ? d ? 40 : 20 : 0);
        t.BOTTOM_WX = p && d ? 24 : 0, t.weexOptions = s;
        function m() {
            return "ios" === u.platform.toLowerCase()
        }

        function v() {
            return "iphone10,3" === u.deviceModel.toLowerCase() || "iphone10,6" === u.deviceModel.toLowerCase() || -1 != u.deviceModel.toLowerCase().indexOf("iphone11")
        }

        function y() {
            return "android" === u.platform.toLowerCase()
        }

        function g(e) {
            return e / l * 750
        }

        function b(e) {
            window.location = e
        }

        function w() {
            var e = u.appVersion ? u.appVersion.split(".") : [];
            if (e.length >= 2 && parseFloat(e[0] + "." + e[1]) < 7.5)return !0;
            return !1
        }
    }, 52: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.serialize = t.params = t.openURL = void 0;
        var r = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
            return typeof e
        } : function (e) {
            return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
        }, o = n(53), i = function (e) {
            return e && e.__esModule ? e : {default: e}
        }(n(46));
        var a = /\[\]$/;

        function s(e, t, n) {
            if ((0, o.isArray)(t)) t.forEach(function (t, o) {
                a.test(e) ? n(e, t) : s(e + "[" + ("object" === (void 0 === t ? "undefined" : r(t)) && null != t ? o : "") + "]", t, n)
            }); else if ("object" === type(t))for (var i in t)s(e + "[" + i + "]", t[i], n); else n(e, t)
        }

        t.openURL = function (e, t) {
            if (i.default.IE) {
                var n = document.createElement("a");
                n.href = e, n.target = t || "_self", n.setAttribute("data-openurl", "true"), document.body.appendChild(n), n.click()
            } else t ? window.open(e, t) : location.href = e
        }, t.params = function (e) {
            e = e || location.search || location.href;
            for (var t = {}, n = /([^\s&?#=\/]+)=([^\s&?#=]+)/g; n.exec(e);)t[RegExp.$1] = decodeURIComponent(RegExp.$2);
            return t
        }, t.serialize = function (e) {
            var t = [];

            function n(e, n) {
                var r = (0, o.isFunction)(n) ? n() : n;
                "" !== r && null != r && (t[t.length] = encodeURIComponent(e) + "=" + encodeURIComponent(r))
            }

            for (var r in e)s(r, e[r], n);
            return t.join("&")
        }
    }, 53: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
            return typeof e
        } : function (e) {
            return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
        }, o = {}, i = "Boolean Number String Function Array Date RegExp Object".split(" "), a = Object.prototype, s = a.hasOwnProperty, u = a.toString;

        function c(e) {
            return null == e ? e + "" : "object" === (void 0 === e ? "undefined" : r(e)) || "function" == typeof e ? o[u.call(e)] || "object" : void 0 === e ? "undefined" : r(e)
        }

        i.forEach(function (e) {
            o["[object " + e + "]"] = e.toLowerCase()
        });
        var l = Array.isArray;

        function f(e) {
            return null != e && e == e.window
        }

        t.default = c, t.isArray = l, t.isString = function (e) {
            return "string" === c(e)
        }, t.isFunction = function (e) {
            return "function" === c(e)
        }, t.isNumeric = function (e) {
            return !isNaN(parseFloat(e)) && isFinite(e)
        }, t.isWindow = f, t.isEmptyObject = function (e) {
            var t = void 0;
            for (t in e)return !1;
            return !0
        }, t.isPlainObject = function (e) {
            var t = void 0;
            if (!e || "object" !== c(e) || e.nodeType || f(e))return !1;
            try {
                if (e.constructor && !s.call(e, "constructor") && !s.call(e.constructor.prototype, "isPrototypeOf"))return !1
            } catch (e) {
                return !1
            }
            for (t in e);
            return void 0 === t || s.call(e, t)
        }
    }, 54: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        t.default = {
            sysTimeDelay: 0, getSysTimeDelay: function () {
                return this.sysTimeDelay
            }, setSysTimeDelay: function (e) {
                this.sysTimeDelay = e
            }
        }, e.exports = t.default
    }, 55: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.Stat = t.Track = t.Color = t.Screen = t.Device = t.Net = t.WidgetInfo = t.PageInfo = t.UserInfo = t.RoomInfo = void 0;
        var r = d(n(56)), o = d(n(60)), i = d(n(64)), a = d(n(65)), s = d(n(66)), u = d(n(67)), c = d(n(62)), l = d(n(69)), f = d(n(70)), p = d(n(75));

        function d(e) {
            return e && e.__esModule ? e : {default: e}
        }

        t.RoomInfo = r.default, t.UserInfo = o.default, t.PageInfo = i.default, t.WidgetInfo = a.default, t.Net = s.default, t.Device = u.default, t.Screen = c.default, t.Color = l.default, t.Track = f.default, t.Stat = p.default
    }, 56: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        Object.assign;
        var r = n(28), o = function (e) {
            return e && e.__esModule ? e : {default: e}
        }(n(57));
        n(45).getInstance("[ROOM INFO]");
        r.Device.weexOptions.env && r.Device.weexOptions.env.appVersion;
        t.default = function () {
            return new Promise(function (e, t) {
                (0, o.default)().then(function (t) {
                    e({code: 0, data: t.data.data, sysTime: t.data.now || (new Date).getTime()})
                }).catch(function (e) {
                    e && e.data ? t({
                        code: e.data.status,
                        msg: e.data.msg,
                        data: null,
                        sysTime: e.data.now || (new Date).getTime()
                    }) : t({code: 1, msg: "直播间信息拉取失败", data: null, sysTime: Date.now()})
                })
            })
        }, e.exports = t.default
    }, 57: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = n(28), o = function (e) {
            return e && e.__esModule ? e : {default: e}
        }(n(58)), i = n(59);
        t.default = function (e) {
            return new Promise(function (t, n) {
                e && (window.cacheLiveFullInfo = null), window.cacheLiveFullInfo ? t(window.cacheLiveFullInfo) : r.mtop.request({
                    api: "mtop.youku.live.com.livefullinfo",
                    v: "1.0",
                    data: {liveId: i.weexOptions.id, app: (0, o.default)()},
                    ecode: 0,
                    AntiCreep: !0
                }).then(function (e) {
                    window.cacheLiveFullInfo = e, t(e)
                }).catch(function (e) {
                    window.cacheLiveFullInfo = e, n(e)
                })
            })
        }, e.exports = t.default
    }, 58: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.default = function () {
            return r.default.IKU && r.default.mac ? "H5-Ikumac" : r.default.IKU ? "H5-Iku" : r.default.youku && r.default.iOS ? "H5-Ios" : r.default.youku && r.default.android ? "H5-Android" : r.default.youkuHD ? "H5-Pad" : r.default.isPhone ? "H5" : r.default.isPad ? "Padweb" : "Pc"
        };
        var r = function (e) {
            return e && e.__esModule ? e : {default: e}
        }(n(46));
        e.exports = t.default
    }, 59: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.weexOptions = t.wxToPx = t.px = t.screenHeight = t.screenWidth = t.isAndroid = t.isIphoneX = t.isIos = t.wx = void 0, t.padZero = i, t.resolveStartTime = function (e) {
            var t = new Date(1e3 * e), n = new Date;
            return t.getFullYear() === n.getFullYear() && t.getMonth() === n.getMonth() && t.getDate() === n.getDate() ? "今天 " + i(t.getHours()) + ":" + i(t.getMinutes()) : t.getMonth() + 1 + "月" + t.getDate() + "日 " + i(t.getHours()) + ":" + i(t.getMinutes())
        }, t.cutZhFont = function () {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "", t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : 10, n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : "...", r = e.trim(), o = r.replace(/[^\x00-\xFF]|[\x00-\x2F]|[\x3A-\x40]|~/g, "**").length;
            if (t < o) {
                for (var i = r.split(""), a = t, s = -1, u = 0; u < i.length; u++) {
                    var c = i[u];
                    if (/^[^\x00-\xFF]|[\x00-\x2F]|[\x3A-\x40]|~$/.test(c) ? a -= 2 : a -= 1, 0 === a) {
                        s = u + 1;
                        break
                    }
                    if (a < 0) {
                        s = u;
                        break
                    }
                }
                return r.substr(0, s) + n
            }
            return r
        }, t.transfromNumber = function (e) {
            for (var t = (e = (e += "").split("")).length, n = "", r = 0; r < t; r++)n += e[r], (t - r) % 3 == 1 && t - r != 1 && (n += ",");
            return n
        }, t.ani = function (e, t) {
            var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : 0, o = arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : "linear", i = arguments.length > 4 && void 0 !== arguments[4] ? arguments[4] : 0;
            return new Promise(function (a, s) {
                e ? (0, r.default)(e, t, {timingFunction: o, delay: i, duration: n}, function () {
                    a()
                }) : s(new Error("con't find ref"))
            })
        }, t.delay = function (e) {
            return new Promise(function (t) {
                setTimeout(function () {
                    t()
                }, e)
            })
        }, t.getComponentRect = function (e) {
            return new Promise(function (t, n) {
                if (e && e.getBoundingClientRect()) {
                    var r = e.getBoundingClientRect();
                    t({
                        result: !0,
                        size: {
                            bottom: r.bottom,
                            left: r.left,
                            right: r.top,
                            top: r.top,
                            width: r.width,
                            height: r.height
                        }
                    })
                } else n({result: !1})
            })
        }, t.dataFormatNoTime = function (e) {
            return e.replace(/\-/g, ".").slice(5, 16)
        }, t.timeFormat = function (e) {
            return e <= 60 ? "00:" + a(e) : a(e / 60) + ":" + a(e % 60)
        }, t.setDateStr = function (e) {
            var t = new Date(e), n = t.getMonth() + 1, r = t.getDate(), o = t.getHours(), i = t.getMinutes();
            return a(n) + "." + a(r) + " " + a(o) + ":" + a(i)
        }, t.params = function (e) {
            e = e || location.search || location.href;
            var t = {}, n = /([^\s&?#=\/]+)=([^\s&?#=]+)/g;
            for (; n.exec(e);)t[RegExp.$1] = decodeURIComponent(RegExp.$2);
            return t
        }, t.compareVersion = function () {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "", t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "";
            if (e === t)return 0;
            e = e.split(".").map(function (e) {
                return parseInt(e)
            }), t = t.split(".").map(function (e) {
                return parseInt(e)
            });
            for (var n = 0, r = 0; r < e.length; r++) {
                var o = t[r] || 0;
                if (e[r] < o) {
                    n = -1;
                    break
                }
                if (e[r] > o) {
                    n = 1;
                    break
                }
            }
            return n
        }, t.requestMt = function (e) {
            return window.fetch("https://hudong.alicdn.com/api/data/v2/" + e + ".js", {
                method: "GET",
                headers: {Cookie: ""},
                dataType: "json",
                mode: "cors"
            })
        };
        var r = function (e) {
            return e && e.__esModule ? e : {default: e}
        }(n(15)), o = n(28);
        t.wx = o.Device.wx, t.isIos = o.Device.isIos, t.isIphoneX = o.Device.isIphoneX, t.isAndroid = o.Device.isAndroid, t.screenWidth = o.Device.screenWidth, t.screenHeight = o.Device.screenHeight, t.px = o.Device.px, t.wxToPx = function (e) {
            return o.Device.wxToPx(e)
        }, t.weexOptions = o.Device.weexOptions;
        function i(e) {
            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : 2, n = "" + (0 | e);
            return "0000000000000".substr(0, t - n.length) + n
        }

        function a(e) {
            return e <= 9 ? "0" + e : e
        }
    }, 60: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), o = s(n(61)), i = s(n(49)), a = s(n(62));

        function s(e) {
            return e && e.__esModule ? e : {default: e}
        }

        var u = function () {
            function e() {
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, e)
            }

            return r(e, [{
                key: "throttle", value: function (e, t, n) {
                    var r = null, o = void 0;
                    return function () {
                        var i = this, a = arguments, s = +new Date;
                        clearTimeout(r), o || (o = s), s - o >= n ? (e.apply(i, a), o = s) : r = setTimeout(function () {
                            return e.apply(i, a)
                        }, t)
                    }
                }
            }, {
                key: "login", value: function (e) {
                    this.throttleLogin || (this.throttleLogin = this.throttle(this.toLogin, 300, 1e3)), this.throttleLogin(e)
                }
            }, {
                key: "toLogin", value: function (e) {
                    var t = this;
                    e ? this._login() : a.default.setOrientation(i.default.SCREEN_PORTRAIT).then(function () {
                        t._login()
                    }).catch(function () {
                        t._login()
                    })
                }
            }, {
                key: "_login", value: function () {
                }
            }, {
                key: "getUserInfo", value: function () {
                    return new Promise(function (t, r) {
                        n(63)("//cmstool.youku.com/cms/player/userinfo/user_info?specialTest=yklive&client=pc", {}).then(function (e) {
                            return e.json()
                        }).then(function (n) {
                            var r = {
                                isLogin: 0 == n.error,
                                userName: "",
                                faceUrl: "",
                                vip: "",
                                userNumberId: "",
                                deviceId: (0, o.default)("cna") || ""
                            };
                            if (r.isLogin) {
                                var i = n.data;
                                r.userName = i.username || "", r.faceUrl = i.avatar.big || "", r.userNumberId = i.ytid || "", r.encodeUid = i.encodeUid || "", r.webAvatar = i.avatar || "", r.webUid = i.uid, r.webVip = i.vip, r.webVip && r.webVip.isGoldVip ? r.vip = e.VipType.GOLD : r.vip = 0
                            }
                            t(r)
                        }).catch(function (e) {
                            r(e)
                        })
                    })
                }
            }]), e
        }();
        u.VipType = {GOLD: 100002, KUMIAO: 100006}, t.default = new u, e.exports = t.default
    }, 61: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.default = function (e, t, n, r) {
            if ("string" == typeof e && (r = n, n = t, t = e, e = window), void 0 === n)return (n = e.document.cookie.match(new RegExp("(?:\\s|^)" + t + "\\=([^;]*)"))) ? decodeURIComponent(n[1]) : null;
            var o, i = "";
            (r = r || {}).expires && (r.expires.constructor == Date ? o = r.expires : (o = new Date).setTime(o.getTime() + 24 * r.expires * 60 * 60 * 1e3), i = "; expires=" + o.toGMTString());
            var a = r.path ? "; path=" + r.path : "", s = r.domain ? "; domain=" + r.domain : "", u = r.secure ? "; secure" : "", c = [t, "=", encodeURIComponent(n), i, a, s, u].join("");
            e.document.cookie = c
        };
        e.exports = t.default
    }, 62: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), o = n(28);
        var i = function () {
            function e() {
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, e)
            }

            return r(e, [{
                key: "lockOrientation", value: function () {
                }
            }, {
                key: "unlockOrientation", value: function () {
                }
            }, {
                key: "setOrientation", value: function (e) {
                    return Promise.resolve().then(function () {
                        var t = new Event("ailp-screenOrientationChange");
                        t.orientation = e, t.isVertical = !(e != o.consts.SCREEN_PORTRAIT && e != o.consts.SCREEN_PORTRAIT_UPSIDE_DOWN), dispatchEvent(t)
                    })
                }
            }, {
                key: "setStatusBarStyle", value: function () {
                    return Promise.resolve()
                }
            }, {
                key: "setStatusBarHidden", value: function (e) {
                    return new Promise(function (t, n) {
                        null.setStatusBarHidden({hidden: e ? "1" : "0"}, function () {
                            t()
                        }, function () {
                            n()
                        })
                    })
                }
            }]), e
        }();
        t.default = new i, e.exports = t.default
    }, 63: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.default = void 0;
        var r = !1, o = 5e3, i = "callback";

        function a() {
            return "jsonp_".concat(Date.now(), "_").concat(Math.ceil(1e5 * Math.random()))
        }

        function s(e) {
            try {
                delete window[e]
            } catch (t) {
                window[e] = void 0
            }
        }

        function u(e) {
            document.getElementsByTagName("head")[0].removeChild(e)
        }

        var c = function (e) {
            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
            if (r) {
                var n = __weex_require__("@weex-module/stream");
                return new Promise(function (r, o) {
                    var s = null != t.jsonpCallback ? t.jsonpCallback : i, u = t.jsonpCallbackFunctionName || a();
                    -1 == e.indexOf(s) && (e = (e += -1 === e.indexOf("?") ? "?" : "&") + s + "=" + u);
                    var c = {url: e, method: "GET", dataType: "jsonp", type: "jsonp"};
                    n.fetch(c, function (e) {
                        try {
                            if ("string" == typeof e && (e = JSON.parse(e)).data && "string" == typeof e.data && e.ok)try {
                                e.data = JSON.parse(e.data)
                            } catch (e) {
                                throw new Error("the response.data in not valid json")
                            }
                            r({
                                ok: e.ok, status: e.status, statusText: e.statusText, data: e.data, json: function () {
                                    return Promise.resolve(e.data)
                                }
                            })
                        } catch (e) {
                            o(e)
                        }
                    }, function (e) {
                    })
                })
            }
            return new Promise(function (n, r) {
                var c, l = null != t.timeout ? t.timeout : o, f = null != t.jsonpCallback ? t.jsonpCallback : i, p = t.jsonpCallbackFunctionName || a(), d = document.createElement("script");
                window[p] = function (e) {
                    n({
                        ok: !0, json: function () {
                            return Promise.resolve(e)
                        }
                    }), c && clearTimeout(c), u(d), s(p)
                }, e += -1 === e.indexOf("?") ? "?" : "&", d.setAttribute("src", e + f + "=" + p), document.getElementsByTagName("head")[0].appendChild(d), c = setTimeout(function () {
                    r(new Error("JSONP request to ".concat(e, " timed out"))), u(d), window[p] = function () {
                        s(p)
                    }
                }, l)
            })
        };
        t.default = c, e.exports = t.default
    }, 64: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        t.default = {}, e.exports = t.default
    }, 65: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = n(28);
        t.default = function (e, t) {
            return r.mtop.request({
                api: "mtop.youku.live.interact.platform.widgetInitInfo.get",
                v: "1.0",
                data: {appId: e, roomId: t},
                ecode: 0,
                AntiCreep: !0
            })
        }, e.exports = t.default
    }, 66: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }();
        var o = function () {
            function e() {
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, e)
            }

            return r(e, [{
                key: "getNetStatus", value: function () {
                    return new Promise(function (e) {
                        null
                    })
                }
            }, {
                key: "setNetNotify", value: function () {
                    !(arguments.length > 0 && void 0 !== arguments[0]) || arguments[0]
                }
            }]), e
        }();
        t.default = new o, e.exports = t.default
    }, 67: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), o = n(28);
        !function (e) {
            e && e.__esModule
        }(n(68));
        var i = function () {
            function e() {
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, e), window.addEventListener("orientationchange", function () {
                    var e = new Event("ailp-orientationChange"), t = window.screen.msOrientation || (window.screen.orientation || window.screen.mozOrientation || {}).type;
                    "landscape-secondary" === t || "landscape-primary" == t ? (e.orientation = o.consts.SCREEN_LANDSCAPE_LEFT, e.isVertical = !1) : "portrait-secondary" !== t && "portrait-primary" !== t || (e.orientation = o.consts.SCREEN_PORTRAIT, e.isVertical = !0), dispatchEvent(e)
                })
            }

            return r(e, [{
                key: "setBackNotify", value: function () {
                    return arguments.length > 0 && void 0 !== arguments[0] && arguments[0], Promise.resolve()
                }
            }, {
                key: "exit", value: function () {
                    !(arguments.length > 0 && void 0 !== arguments[0]) || arguments[0], window.close()
                }
            }]), e
        }();
        t.default = new i, e.exports = t.default
    }, 68: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.default = void 0;
        var r, o = !1, i = [], a = !1;
        var s = {
            push: function (e, t) {
                i.push({message: e, duration: t}), this.show()
            }, show: function () {
                var e = this;
                if (!i.length)return r && r.parentNode.removeChild(r), void(r = null);
                if (!a) {
                    a = !0;
                    var t = i.shift();
                    !function (e) {
                        if (!r) {
                            for (var t in r = document.createElement("div"), u.container)r.style[t] = u.container[t];
                            document.body.appendChild(r)
                        }
                        r.style.transform = "translateX(-50%)", r.style.webkitTransform = "translateX(-50%)", r.innerHTML = e
                    }(t.message), setTimeout(function () {
                        r && setTimeout(function () {
                            r.style.transform = "translateX(-50%) scale(0.8)", r.style.webkitTransform = "translateX(-50%) scale(0.8)"
                        }, 0), a = !1, setTimeout(function () {
                            return e.show()
                        }, 600)
                    }, t.duration)
                }
            }
        }, u = {
            container: {
                backgroundColor: "rgba(0, 0, 0, 0.6)",
                boxSizing: "border-box",
                maxWidth: "80%",
                color: "#ffffff",
                padding: "8px 16px",
                position: "fixed",
                left: "50%",
                bottom: "50%",
                fontSize: "16px",
                lineHeight: "32px",
                fontWeight: "600",
                borderRadius: "4px",
                textAlign: "center",
                transition: "all 0.4s ease-in-out",
                webkitTransition: "all 0.4s ease-in-out",
                transform: "translateX(-50%)",
                webkitTransform: "translateX(-50%)",
                zIndex: 9999
            }
        }, c = {
            SHORT: 2e3, LONG: 3500, show: function (e) {
                var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : 2e3;
                if (o) {
                    var n = __weex_require__("@weex-module/modal");
                    n.toast && n.toast({message: e, duration: Number(t) / 1e3})
                } else s.push(e, t)
            }
        };
        t.default = c, e.exports = t.default
    }, 69: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function (e) {
            if (e && e.__esModule)return e;
            var t = {};
            if (null != e)for (var n in e)Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
            return t.default = e, t
        }(n(59));
        t.default = {
            cool: {
                bg: {
                    color1: "#FFFFFF",
                    color2: "#F2F2F2",
                    color3: "#FF1202",
                    color4: "#5432BF",
                    color5: "#2591F1",
                    color6: "#FFFFFF"
                },
                font: {
                    color1: "#000000",
                    color2: "#333333",
                    color3: "#666666",
                    color4: "#939393",
                    color5: "#FFFFFF",
                    color6: "#7F6841",
                    color7: "#2591FE",
                    color8: "#FF1202",
                    color9: "#2692FF",
                    color10: "#FA515F"
                },
                line: {color1: "#F5F5F5", color2: "#E9E9E9", color3: "#000000", color4: "#FF1202", color5: "#2591FE"},
                btn: {color1: "#F5F5F5", color2: "#2591FE", color3: "#FF1202"},
                icon: {
                    color1: "#2591FE",
                    color2: "#FF1202",
                    color3: "#919191",
                    color4: "#A58B65",
                    color5: "#166BCA",
                    color6: "#FE4C3D",
                    color7: "#EB9D1D",
                    color8: "#68B118"
                }
            },
            warm: {
                bg: {
                    color1: "#312C42",
                    color2: "rgba(0,0,0,0.7)",
                    color3: "#FF1202",
                    color4: "#5432BF",
                    color5: "#2591F1",
                    color6: "rgba(0,0,0,0.1)"
                },
                font: {
                    color1: "#FFFFFF",
                    color2: "#FFFFFF",
                    color3: "rgba(255,255,255,0.45)",
                    color4: "rgba(255,255,255,0.45)",
                    color5: "rgba(255,255,255,0.45)",
                    color6: "#FFFFFF",
                    color7: "#2591FE",
                    color8: "#FF1202",
                    color9: "#CCCCCC",
                    color10: "#F5A623"
                },
                line: {color1: "#312c42", color2: "#E9E9E9", color3: "#FFFFFF", color4: "#FF1202", color5: "#2591FE"},
                btn: {color1: "#F5F5F5", color2: "#2591FE", color3: "#FF1202"},
                icon: {
                    color1: "#2591FE",
                    color2: "#FF1202",
                    color3: "#919191",
                    color4: "#A58B65",
                    color5: "#166BCA",
                    color6: "#FE4C3D",
                    color7: "#EB9D1D",
                    color8: "#68B118"
                }
            },
            warmV2: {
                bg: {
                    color1: "#312C42",
                    color2: "rgba(0,0,0,0.7)",
                    color3: "#FF1202",
                    color4: "#5432BF",
                    color5: "#2591F1",
                    color6: "rgba(0,0,0,0.1)"
                },
                font: {
                    color1: "#FFFFFF",
                    color2: "#FFFFFF",
                    color3: "rgba(255,255,255,0.45)",
                    color4: "rgba(255,255,255,0.45)",
                    color5: "rgba(255,255,255,0.45)",
                    color6: "#FFFFFF",
                    color7: "#2591FE",
                    color8: "#FF1202",
                    color9: "#CCCCCC",
                    color10: "#F5A623"
                },
                line: {
                    color1: "#312c42",
                    color2: "#E9E9E9",
                    color3: "rgba(255, 255, 255, 0.5)",
                    color4: "#FF1202",
                    color5: "#2591FE"
                },
                btn: {color1: "#F5F5F5", color2: "#2591FE", color3: "#FF1202"},
                icon: {
                    color1: "#2591FE",
                    color2: "#FF1202",
                    color3: "#919191",
                    color4: "#A58B65",
                    color5: "#166BCA",
                    color6: "#FE4C3D",
                    color7: "#EB9D1D",
                    color8: "#68B118"
                }
            },
            sportCool: {
                bg: {color1: "rgba(0,0,0,0.1)", color2: "rgba(0,0,0,0)", color3: "rgba(0,0,0,0)"},
                font: {color1: "#FFFFFF", color2: "rgba(255,255,255,0.6)"},
                line: {color1: "rgba(0, 0, 0, 0.2)", color2: "#FFFFFF"}
            },
            sportWarm: {
                bg: {color1: "#FFFFFF", color2: "#FFFFFF", color3: r.isIos() ? "#FAFAFA" : "#F6F6F6"},
                font: {color1: "#000000", color2: "#666666"},
                line: {color1: "rgb(233, 233, 233)", color2: "#000000"}
            }
        }, e.exports = t.default
    }, 7: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.default = void 0;
        var r = n(1), o = {isWeex: !1, isWeb: !0, isNode: !1, isReactNative: !1};

        function i(e) {
            return (i = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
                return typeof e
            } : function (e) {
                return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
            })(e)
        }

        function a() {
            return (a = Object.assign || function (e) {
                    for (var t = 1; t < arguments.length; t++) {
                        var n = arguments[t];
                        for (var r in n)Object.prototype.hasOwnProperty.call(n, r) && (e[r] = n[r])
                    }
                    return e
                }).apply(this, arguments)
        }

        function s(e) {
            for (var t = 1; t < arguments.length; t++) {
                var n = null != arguments[t] ? arguments[t] : {}, r = Object.keys(n);
                "function" == typeof Object.getOwnPropertySymbols && (r = r.concat(Object.getOwnPropertySymbols(n).filter(function (e) {
                    return Object.getOwnPropertyDescriptor(n, e).enumerable
                }))), r.forEach(function (t) {
                    p(e, t, n[t])
                })
            }
            return e
        }

        function u(e, t) {
            for (var n = 0; n < t.length; n++) {
                var r = t[n];
                r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
            }
        }

        function c(e) {
            return (c = Object.setPrototypeOf ? Object.getPrototypeOf : function (e) {
                return e.__proto__ || Object.getPrototypeOf(e)
            })(e)
        }

        function l(e, t) {
            return (l = Object.setPrototypeOf || function (e, t) {
                    return e.__proto__ = t, e
                })(e, t)
        }

        function f(e) {
            if (void 0 === e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return e
        }

        function p(e, t, n) {
            return t in e ? Object.defineProperty(e, t, {
                value: n,
                enumerable: !0,
                configurable: !0,
                writable: !0
            }) : e[t] = n, e
        }

        var d = function (e) {
            function t() {
                var e, n;
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t);
                for (var u = arguments.length, l = new Array(u), d = 0; d < u; d++)l[d] = arguments[d];
                return p(f(f(n = function (e, t) {
                    return !t || "object" !== i(t) && "function" != typeof t ? f(e) : t
                }(this, (e = c(t)).call.apply(e, [this].concat(l))))), "renderText", function () {
                    var e = n.props, t = s({}, e, {style: e.style || {}}), i = "";
                    if (null != e.children && (i = Array.isArray(e.children) ? e.children.join("") : e.children.toString()), n.context.isInAParentText)return (0, r.createElement)("span", t, i);
                    if (e.onPress && (t.onClick = e.onPress), o.isWeex)return e.numberOfLines && (t.style.lines = e.numberOfLines), t.value = i, (0, r.createElement)("text", t);
                    var u = s({whiteSpace: "pre-wrap"}, v.text, t.style), c = e.numberOfLines;
                    return c && (1 === parseInt(c) ? u.whiteSpace = "nowrap" : (u.display = "-webkit-box", u.webkitBoxOrient = "vertical", u.webkitLineClamp = String(c)), u.overflow = "hidden"), (0, r.createElement)("span", a({}, t, {style: u}), i)
                }), p(f(f(n)), "renderRichText", function () {
                    var e = n.props, t = e.children, i = s({}, e, {style: e.style || {}}), u = s({}, v.richtext, i.style);
                    return o.isWeex && (t = m(t, f(f(n)))), (0, r.createElement)("p", a({}, i, {style: u}), t)
                }), n
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function");
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        writable: !0,
                        configurable: !0
                    }
                }), t && l(e, t)
            }(t, r.Component), function (e, t, n) {
                t && u(e.prototype, t), n && u(e, n)
            }(t, [{
                key: "getChildContext", value: function () {
                    return {isInAParentText: !0}
                }
            }, {
                key: "render", value: function () {
                    var e = this.props.children;
                    Array.isArray(e) || (e = [e]);
                    for (var t = !1, n = 0; n < e.length; n++) {
                        var r = e[n];
                        if (r && "object" === i(r)) {
                            t = !0;
                            break
                        }
                    }
                    return t ? this.renderRichText() : this.renderText()
                }
            }]), t
        }();

        function h(e, t) {
            var n = e.type, r = e.props, o = r.children;
            if ("function" == typeof n) {
                var i = new n;
                return i.props = r, o && (i.props.children = m(o, t)), i.context = t.getChildContext(), i.render()
            }
            return e
        }

        function m(e, t) {
            var n = [];
            Array.isArray(e) || (e = [e]);
            for (var r = 0; r < e.length; r++) {
                var o = e[r];
                "string" == typeof o ? n.push(o) : "object" === i(o) && n.push(h(o, t))
            }
            return n
        }

        p(d, "propTypes", {}), p(d, "contextTypes", {isInAParentText: r.PropTypes.bool}), p(d, "childContextTypes", {isInAParentText: r.PropTypes.bool});
        var v = {
            text: {
                border: "0 solid black",
                position: "relative",
                boxSizing: "border-box",
                display: "block",
                flexDirection: "column",
                alignContent: "flex-start",
                flexShrink: 0,
                fontSize: 32
            }, richtext: {marginTop: 0, marginBottom: 0}
        }, y = d;
        t.default = y, e.exports = t.default
    }, 70: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
            return typeof e
        } : function (e) {
            return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
        }, o = (Object.assign, n(71)), i = {
            pageName: "page_youkulive",
            AB: "a2h08.8176999",
            liveid: "",
            screenid: "",
            video_format: "",
            type: "",
            udtid: "",
            isVip: 0,
            categoryId: "",
            categoryName: "",
            view: "",
            scm: "",
            liveType: "直播",
            screenType: 0,
            direction: "hplayer",
            setScreenType: function (e) {
                this.screenType = e, this.direction = 0 == e ? "hplayer" : "fplayer"
            },
            setView: function (e) {
                this.view = e
            },
            setCategoryId: function (e) {
                this.categoryId = e
            },
            setCategoryName: function (e) {
                this.categoryName = e
            },
            setUdtid: function (e) {
                this.udtid = e
            },
            setVip: function (e) {
                this.isVip = e
            },
            setPageName: function (e) {
                this.pageName = e
            },
            setAB: function (e) {
                this.AB = e
            },
            setLiveId: function (e) {
                this.liveid = e + ""
            },
            setScreenId: function (e) {
                this.screenid = e
            },
            setLiveType: function (e) {
                var t = e;
                switch (t) {
                    case 0:
                        t = "预约";
                        break;
                    case 1:
                        t = "直播";
                        break;
                    case 2:
                        t = "回看"
                }
                this.liveType = t
            },
            setVideoFormat: function (e) {
                this.video_format = e
            },
            setSCM: function (e) {
                this.scm = e
            },
            init: function (e, t) {
                this.setPageName(e), this.setAB(t)
            },
            reportPV: function (e) {
                this.pageName, this.AB, this.liveid, this.screenid, this.liveType, this.scm
            },
            liveweexOpening: function () {
                arguments.length > 0 && void 0 !== arguments[0] && arguments[0], arguments[1], arguments[2], arguments[3], this.liveid, this.screenid, this.liveType
            },
            clickLog: function (e, t, n) {
                var o = {};
                n && "object" == (void 0 === n ? "undefined" : r(n)) && "[object object]" == Object.prototype.toString.call(n).toLowerCase() && (o = n), o.liveid = this.liveid, o.screenid = this.screenid, o.type = this.liveType, o.direction = this.direction, o.spm = this.AB + "." + t
            },
            appearLog: function (e, t, n) {
                var o = {};
                n && "object" == (void 0 === n ? "undefined" : r(n)) && "[object object]" == Object.prototype.toString.call(n).toLowerCase() && (o = n), o.liveid = this.liveid, o.screenid = this.screenid, o.type = this.liveType, o.direction = this.direction, o.CD = t, this.customLog("2201", e, "", "", o)
            },
            mtopLog: function (e) {
                this.clickLog("lfMtop", "mtop.request", e)
            },
            customLog: function () {
                arguments.length > 0 && void 0 !== arguments[0] && arguments[0], arguments[1], arguments[2], arguments[3];
                var e = arguments[4];
                e.CD && (e.spm = this.AB + "." + e.CD, e.liveid = this.liveid, e.screenid = this.screenid, e.type = this.liveType, e.direction = this.direction)
            },
            playerLog: function (e, t, n) {
                var r = o(this.getTime() + "" + Math.floor(10 * Math.random()) + this.udtid), i = {
                    live_type: 1,
                    screen_id: this.screenid,
                    video_format: this.video_format,
                    isFreeView: this.isVip,
                    isVip: this.isVip,
                    isvip_rt: 1 == this.isVip ? "y" : "n",
                    view: this.view,
                    play_type: this.liveType,
                    categoryId: this.categoryId,
                    categoryName: this.categoryName,
                    scm: this.scm,
                    source: "YOUKU",
                    vid: this.liveid,
                    data_source: 1,
                    screenType: this.screenType
                };
                if (n)for (var a in n)i[a] = n[a];
                this.customLog(e, this.liveid, r, t + "", i)
            },
            getDlna: function () {
                return {
                    live_type: "1",
                    screen_id: this.screenid,
                    video_format: this.video_format,
                    isvip_rt: 1 == this.isVip ? "y" : "n",
                    view: this.view,
                    play_type: this.liveType,
                    categoryId: this.categoryId + "",
                    categoryName: this.categoryName,
                    scm: this.scm,
                    source: "YOUKU",
                    vid: this.liveid,
                    data_source: "1"
                }
            },
            playerMdLog: function () {
                arguments.length > 0 && void 0 !== arguments[0] && arguments[0], arguments[1]
            },
            getTime: function () {
                var e = new Date;
                return (e.getFullYear() + "").substr(2) + this.setZero(e.getMonth() + 1) + this.setZero(e.getDate()) + this.setZero(e.getHours()) + this.setZero(e.getMinutes()) + this.setZero(e.getSeconds()) + "000"
            },
            setZero: function (e) {
                return e <= 9 ? "0" + e : e
            }
        };
        t.default = i, e.exports = t.default
    }, 71: function (e, t, n) {
        !function () {
            var t = n(72), r = n(73).utf8, o = n(74), i = n(73).bin, a = function (e, n) {
                e.constructor == String ? e = n && "binary" === n.encoding ? i.stringToBytes(e) : r.stringToBytes(e) : o(e) ? e = Array.prototype.slice.call(e, 0) : Array.isArray(e) || (e = e.toString());
                for (var s = t.bytesToWords(e), u = 8 * e.length, c = 1732584193, l = -271733879, f = -1732584194, p = 271733878, d = 0; d < s.length; d++)s[d] = 16711935 & (s[d] << 8 | s[d] >>> 24) | 4278255360 & (s[d] << 24 | s[d] >>> 8);
                s[u >>> 5] |= 128 << u % 32, s[14 + (u + 64 >>> 9 << 4)] = u;
                var h = a._ff, m = a._gg, v = a._hh, y = a._ii;
                for (d = 0; d < s.length; d += 16) {
                    var g = c, b = l, w = f, _ = p;
                    l = y(l = y(l = y(l = y(l = v(l = v(l = v(l = v(l = m(l = m(l = m(l = m(l = h(l = h(l = h(l = h(l, f = h(f, p = h(p, c = h(c, l, f, p, s[d + 0], 7, -680876936), l, f, s[d + 1], 12, -389564586), c, l, s[d + 2], 17, 606105819), p, c, s[d + 3], 22, -1044525330), f = h(f, p = h(p, c = h(c, l, f, p, s[d + 4], 7, -176418897), l, f, s[d + 5], 12, 1200080426), c, l, s[d + 6], 17, -1473231341), p, c, s[d + 7], 22, -45705983), f = h(f, p = h(p, c = h(c, l, f, p, s[d + 8], 7, 1770035416), l, f, s[d + 9], 12, -1958414417), c, l, s[d + 10], 17, -42063), p, c, s[d + 11], 22, -1990404162), f = h(f, p = h(p, c = h(c, l, f, p, s[d + 12], 7, 1804603682), l, f, s[d + 13], 12, -40341101), c, l, s[d + 14], 17, -1502002290), p, c, s[d + 15], 22, 1236535329), f = m(f, p = m(p, c = m(c, l, f, p, s[d + 1], 5, -165796510), l, f, s[d + 6], 9, -1069501632), c, l, s[d + 11], 14, 643717713), p, c, s[d + 0], 20, -373897302), f = m(f, p = m(p, c = m(c, l, f, p, s[d + 5], 5, -701558691), l, f, s[d + 10], 9, 38016083), c, l, s[d + 15], 14, -660478335), p, c, s[d + 4], 20, -405537848), f = m(f, p = m(p, c = m(c, l, f, p, s[d + 9], 5, 568446438), l, f, s[d + 14], 9, -1019803690), c, l, s[d + 3], 14, -187363961), p, c, s[d + 8], 20, 1163531501), f = m(f, p = m(p, c = m(c, l, f, p, s[d + 13], 5, -1444681467), l, f, s[d + 2], 9, -51403784), c, l, s[d + 7], 14, 1735328473), p, c, s[d + 12], 20, -1926607734), f = v(f, p = v(p, c = v(c, l, f, p, s[d + 5], 4, -378558), l, f, s[d + 8], 11, -2022574463), c, l, s[d + 11], 16, 1839030562), p, c, s[d + 14], 23, -35309556), f = v(f, p = v(p, c = v(c, l, f, p, s[d + 1], 4, -1530992060), l, f, s[d + 4], 11, 1272893353), c, l, s[d + 7], 16, -155497632), p, c, s[d + 10], 23, -1094730640), f = v(f, p = v(p, c = v(c, l, f, p, s[d + 13], 4, 681279174), l, f, s[d + 0], 11, -358537222), c, l, s[d + 3], 16, -722521979), p, c, s[d + 6], 23, 76029189), f = v(f, p = v(p, c = v(c, l, f, p, s[d + 9], 4, -640364487), l, f, s[d + 12], 11, -421815835), c, l, s[d + 15], 16, 530742520), p, c, s[d + 2], 23, -995338651), f = y(f, p = y(p, c = y(c, l, f, p, s[d + 0], 6, -198630844), l, f, s[d + 7], 10, 1126891415), c, l, s[d + 14], 15, -1416354905), p, c, s[d + 5], 21, -57434055), f = y(f, p = y(p, c = y(c, l, f, p, s[d + 12], 6, 1700485571), l, f, s[d + 3], 10, -1894986606), c, l, s[d + 10], 15, -1051523), p, c, s[d + 1], 21, -2054922799), f = y(f, p = y(p, c = y(c, l, f, p, s[d + 8], 6, 1873313359), l, f, s[d + 15], 10, -30611744), c, l, s[d + 6], 15, -1560198380), p, c, s[d + 13], 21, 1309151649), f = y(f, p = y(p, c = y(c, l, f, p, s[d + 4], 6, -145523070), l, f, s[d + 11], 10, -1120210379), c, l, s[d + 2], 15, 718787259), p, c, s[d + 9], 21, -343485551), c = c + g >>> 0, l = l + b >>> 0, f = f + w >>> 0, p = p + _ >>> 0
                }
                return t.endian([c, l, f, p])
            };
            a._ff = function (e, t, n, r, o, i, a) {
                var s = e + (t & n | ~t & r) + (o >>> 0) + a;
                return (s << i | s >>> 32 - i) + t
            }, a._gg = function (e, t, n, r, o, i, a) {
                var s = e + (t & r | n & ~r) + (o >>> 0) + a;
                return (s << i | s >>> 32 - i) + t
            }, a._hh = function (e, t, n, r, o, i, a) {
                var s = e + (t ^ n ^ r) + (o >>> 0) + a;
                return (s << i | s >>> 32 - i) + t
            }, a._ii = function (e, t, n, r, o, i, a) {
                var s = e + (n ^ (t | ~r)) + (o >>> 0) + a;
                return (s << i | s >>> 32 - i) + t
            }, a._blocksize = 16, a._digestsize = 16, e.exports = function (e, n) {
                if (void 0 === e || null === e)throw new Error("Illegal argument " + e);
                var r = t.wordsToBytes(a(e, n));
                return n && n.asBytes ? r : n && n.asString ? i.bytesToString(r) : t.bytesToHex(r)
            }
        }()
    }, 72: function (e, t) {
        !function () {
            var t = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/", n = {
                rotl: function (e, t) {
                    return e << t | e >>> 32 - t
                }, rotr: function (e, t) {
                    return e << 32 - t | e >>> t
                }, endian: function (e) {
                    if (e.constructor == Number)return 16711935 & n.rotl(e, 8) | 4278255360 & n.rotl(e, 24);
                    for (var t = 0; t < e.length; t++)e[t] = n.endian(e[t]);
                    return e
                }, randomBytes: function (e) {
                    for (var t = []; e > 0; e--)t.push(Math.floor(256 * Math.random()));
                    return t
                }, bytesToWords: function (e) {
                    for (var t = [], n = 0, r = 0; n < e.length; n++, r += 8)t[r >>> 5] |= e[n] << 24 - r % 32;
                    return t
                }, wordsToBytes: function (e) {
                    for (var t = [], n = 0; n < 32 * e.length; n += 8)t.push(e[n >>> 5] >>> 24 - n % 32 & 255);
                    return t
                }, bytesToHex: function (e) {
                    for (var t = [], n = 0; n < e.length; n++)t.push((e[n] >>> 4).toString(16)), t.push((15 & e[n]).toString(16));
                    return t.join("")
                }, hexToBytes: function (e) {
                    for (var t = [], n = 0; n < e.length; n += 2)t.push(parseInt(e.substr(n, 2), 16));
                    return t
                }, bytesToBase64: function (e) {
                    for (var n = [], r = 0; r < e.length; r += 3)for (var o = e[r] << 16 | e[r + 1] << 8 | e[r + 2], i = 0; i < 4; i++)8 * r + 6 * i <= 8 * e.length ? n.push(t.charAt(o >>> 6 * (3 - i) & 63)) : n.push("=");
                    return n.join("")
                }, base64ToBytes: function (e) {
                    e = e.replace(/[^A-Z0-9+\/]/gi, "");
                    for (var n = [], r = 0, o = 0; r < e.length; o = ++r % 4)0 != o && n.push((t.indexOf(e.charAt(r - 1)) & Math.pow(2, -2 * o + 8) - 1) << 2 * o | t.indexOf(e.charAt(r)) >>> 6 - 2 * o);
                    return n
                }
            };
            e.exports = n
        }()
    }, 73: function (e, t) {
        var n = {
            utf8: {
                stringToBytes: function (e) {
                    return n.bin.stringToBytes(unescape(encodeURIComponent(e)))
                }, bytesToString: function (e) {
                    return decodeURIComponent(escape(n.bin.bytesToString(e)))
                }
            }, bin: {
                stringToBytes: function (e) {
                    for (var t = [], n = 0; n < e.length; n++)t.push(255 & e.charCodeAt(n));
                    return t
                }, bytesToString: function (e) {
                    for (var t = [], n = 0; n < e.length; n++)t.push(String.fromCharCode(e[n]));
                    return t.join("")
                }
            }
        };
        e.exports = n
    }, 74: function (e, t) {
        function n(e) {
            return !!e.constructor && "function" == typeof e.constructor.isBuffer && e.constructor.isBuffer(e)
        }

        e.exports = function (e) {
            return null != e && (n(e) || function (e) {
                    return "function" == typeof e.readFloatLE && "function" == typeof e.slice && n(e.slice(0, 0))
                }(e) || !!e._isBuffer)
        }
    }, 75: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
            return typeof e
        } : function (e) {
            return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
        }, o = (s(n(76)), s(n(46))), i = s(n(58)), a = s(n(85));

        function s(e) {
            return e && e.__esModule ? e : {default: e}
        }

        var u = {
            AB: o.default.isPhone ? "a2hlv.8243346" : "a2hlv.8243345",
            liveid: "",
            screenid: "",
            video_format: "",
            type: "",
            statType: "",
            udtid: "",
            appName: "",
            isVip: 0,
            categoryId: "",
            categoryName: "",
            view: "",
            scm: "",
            liveType: "直播",
            screenType: 0,
            init: function (e) {
                this.setLiveId(e.liveId), this.setScreenId(e.screenId), this.setCategoryId(e.categoryId), this.setCategoryName(e.categoryName), this.setLiveType(e.liveStatus), this.setUdtid((0, a.default)()), this.setAppName((0, i.default)())
            },
            setAB: function (e) {
                this.AB = e
            },
            setCategoryId: function (e) {
                this.categoryId = e
            },
            setCategoryName: function (e) {
                this.categoryName = e
            },
            setUdtid: function (e) {
                this.utdid = e
            },
            setVip: function (e) {
                this.isVip = e
            },
            setAppName: function (e) {
                this.appName = e
            },
            setLiveId: function (e) {
                this.liveid = e
            },
            setScreenId: function (e) {
                this.screenid = e
            },
            setLiveType: function (e) {
                switch (e) {
                    case 0:
                        this.liveType = "预约", this.statType = "trailer";
                        break;
                    case 1:
                        this.liveType = "直播", this.statType = "live";
                        break;
                    case 2:
                        this.liveType = "回看", this.statType = "review"
                }
            },
            PV: function () {
                (window.goldlog_queue || (window.goldlog_queue = [])).push({
                    action: "goldlog.sendPV",
                    arguments: [{pageid: "", checksum: "46807200"}, {
                        liveid: this.liveid,
                        livetype: "1",
                        screenid: this.screenid,
                        utdid: this.utdid,
                        app: this.appName
                    }]
                })
            },
            CK: function (e, t, n) {
                var o = {};
                n && "object" == (void 0 === n ? "undefined" : r(n)) && "[object object]" == Object.prototype.toString.call(n).toLowerCase() && (o = n), o.spm = this.AB + "." + e, o.arg1 = t, o.liveid = this.liveid, o.screenid = this.screenid, o.type = this.statType, o.r = Math.random();
                var i = Object.keys(o).map(function (e) {
                    return encodeURIComponent(e) + "=" + encodeURIComponent(o[e])
                }).join("&");
                (new Image).src = "//gm.mmstat.com/yt/youkulive.playclick.interact?" + i
            }
        };
        t.default = u, e.exports = t.default
    }, 76: function (e, t, n) {
        "use strict";
        e.exports = n(77)
    }, 77: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = Object.assign || function (e) {
                for (var t = 1; t < arguments.length; t++) {
                    var n = arguments[t];
                    for (var r in n)Object.prototype.hasOwnProperty.call(n, r) && (e[r] = n[r])
                }
                return e
            }, o = a(n(78)), i = a(n(81));

        function a(e) {
            return e && e.__esModule ? e : {default: e}
        }

        t.default = r({}, o.default, i.default), e.exports = t.default
    }, 78: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        "function" == typeof Symbol && Symbol.iterator;
        var r = i(n(36)), o = n(79);
        i(n(80));
        function i(e) {
            return e && e.__esModule ? e : {default: e}
        }

        var a = {
            record: function (e, t, n, r) {
                window.goldlog && (n = "string" == typeof n ? n : (0, o.objToParams)(n, !0), window.goldlog.record(e, t, n, r))
            }, launch: function () {
                var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : r.default.getPageSPM(), t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {}, n = (0, o.makeChkSum)(e.join(".")), i = {
                    checksum: n,
                    is_auto: !1,
                    page_id: ""
                };
                if (t.page_id && (i.page_id = t.page_id, delete t.page_id), !!(0, o.getMetaContentByName)("aplus-waiting")) {
                    var a = window.goldlog_queue || (window.goldlog_queue = []);
                    a.push({action: "goldlog.setPageSPM", arguments: [e[0], e[1]]}), a.push({
                        action: "goldlog.sendPV",
                        arguments: [i, t]
                    })
                } else window.goldlog && window.goldlog.setPageSPM && window.goldlog.setPageSPM(e[0], e[1], function () {
                    window.goldlog.sendPV && window.goldlog.sendPV({checksum: n})
                })
            }, updateNextProps: function () {
                !(arguments.length > 0 && void 0 !== arguments[0]) || arguments[0]
            }, updatePageUtparam: function () {
                !(arguments.length > 0 && void 0 !== arguments[0]) || arguments[0]
            }, updateNextPageUtparam: function () {
                !(arguments.length > 0 && void 0 !== arguments[0]) || arguments[0]
            }
        };
        a.sendPV = a.launch, t.default = a, e.exports = t.default
    }, 79: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.paramsToObj = function (e) {
            for (var t = {}, n = (e = "string" == typeof e ? e : "").split("&"), r = 0; r < n.length; r++) {
                var o = n[r], i = o.split("="), a = i[0], s = i[1];
                a && (t[a] = s)
            }
            return t
        }, t.objToParams = function (e, t) {
            var n = [];
            for (var r in e)if (e.hasOwnProperty(r)) {
                var o = t ? encodeURIComponent(e[r]) : e[r];
                n.push(r + "=" + o)
            }
            return n.join("&")
        }, t.getParamFromURL = function (e) {
            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "spm", n = "";
            return (e.split("?")[1] || "").split("&").forEach(function (e) {
                0 === e.indexOf(t + "=") && (n = e.substr(t.length + 1))
            }), n
        }, t.makeChkSum = function (e) {
            var t = (e = (e || "").split("#")[0].split("?")[0]).length;
            return t ? function (e) {
                for (var t = e.length, n = 0, r = 0; r < t; r++)n = 31 * n + e.charCodeAt(r);
                return n
            }(t + "#" + e.charCodeAt(t - 1)) : -1
        }, t.getMetaContentByName = function (e) {
            var t = window && window.document && window.document.getElementsByTagName("meta")[e];
            return t ? t.getAttribute("content") : ""
        }, t.simplifyURL = function () {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "";
            e.indexOf("_wx_tpl=") > -1 && (e = e.substring(e.indexOf("_wx_tpl=") + "_wx_tpl=".length, e.indexOf(".js") + ".js".length));
            return e.split("?")[0]
        }
    }, 8: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.default = void 0;
        var r = n(1), o = !1, i = function (e) {
            return e && e.__esModule ? e : {default: e}
        }(n(5));

        function a(e) {
            return (a = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
                return typeof e
            } : function (e) {
                return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
            })(e)
        }

        function s() {
            return (s = Object.assign || function (e) {
                    for (var t = 1; t < arguments.length; t++) {
                        var n = arguments[t];
                        for (var r in n)Object.prototype.hasOwnProperty.call(n, r) && (e[r] = n[r])
                    }
                    return e
                }).apply(this, arguments)
        }

        function u(e) {
            for (var t = 1; t < arguments.length; t++) {
                var n = null != arguments[t] ? arguments[t] : {}, r = Object.keys(n);
                "function" == typeof Object.getOwnPropertySymbols && (r = r.concat(Object.getOwnPropertySymbols(n).filter(function (e) {
                    return Object.getOwnPropertyDescriptor(n, e).enumerable
                }))), r.forEach(function (t) {
                    d(e, t, n[t])
                })
            }
            return e
        }

        function c(e, t) {
            for (var n = 0; n < t.length; n++) {
                var r = t[n];
                r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
            }
        }

        function l(e) {
            return (l = Object.setPrototypeOf ? Object.getPrototypeOf : function (e) {
                return e.__proto__ || Object.getPrototypeOf(e)
            })(e)
        }

        function f(e, t) {
            return (f = Object.setPrototypeOf || function (e, t) {
                    return e.__proto__ = t, e
                })(e, t)
        }

        function p(e) {
            if (void 0 === e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return e
        }

        function d(e, t, n) {
            return t in e ? Object.defineProperty(e, t, {
                value: n,
                enumerable: !0,
                configurable: !0,
                writable: !0
            }) : e[t] = n, e
        }

        var h = function (e) {
            function t() {
                var e, n;
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t);
                for (var r = arguments.length, o = new Array(r), i = 0; i < r; i++)o[i] = arguments[i];
                return d(p(p(n = function (e, t) {
                    return !t || "object" !== a(t) && "function" != typeof t ? p(e) : t
                }(this, (e = l(t)).call.apply(e, [this].concat(o))))), "state", {source: n.props.source}), d(p(p(n)), "onLoad", function (e) {
                    var t = p(p(n)).onError, r = n.props.onLoad;
                    void 0 !== e.success ? e.success ? r(e) : t(e) : void 0 !== e.currentTarget && (e.currentTarget.naturalWidth > 1 && e.currentTarget.naturalHeight > 1 ? r(e) : t(e))
                }), d(p(p(n)), "onError", function (e) {
                    var t = n.props, r = t.fallbackSource, o = t.onError, i = n.state.source;
                    r.uri && i.uri !== r.uri && (n.isError = !0, n.setState({source: r})), o(e)
                }), d(p(p(n)), "save", function (e) {
                    n.refs.nativeImg.save(function (t) {
                        e(t)
                    })
                }), n
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function");
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        writable: !0,
                        configurable: !0
                    }
                }), t && f(e, t)
            }(t, r.PureComponent), function (e, t, n) {
                t && c(e.prototype, t), n && c(e, n)
            }(t, [{
                key: "render", value: function () {
                    var e = u({}, this.props), t = this.isError ? this.state.source : e.source;
                    if (t && t.uri) {
                        var n, a = e.style, c = t.width, l = t.height, f = t.uri;
                        null == c && null == l && null == a.height && null == a.width && (c = 0, l = 0), e.style = u({}, u({}, !this.context.isInAParentText && {display: "flex"}, {
                            width: c,
                            height: l
                        }), a), e.src = f, e.onLoad = this.onLoad, e.onError = this.onError, delete e.source, n = o ? "image" : "img";
                        var p = e.resizeMode || e.style.resizeMode;
                        return p && (o ? (e.resize = p, e.style.resizeMode = p) : e.style.objectFit = p), this.props.children ? (e.children = null, (0, r.createElement)(i.default, {style: e.style}, (0, r.createElement)(n, s({ref: "nativeImg"}, e)), (0, r.createElement)(i.default, {style: m.absoluteImage}, this.props.children))) : (0, r.createElement)(n, s({ref: "nativeImg"}, e))
                    }
                    return null
                }
            }]), t
        }();
        d(h, "propTypes", {}), d(h, "resizeMode", {
            contain: "contain",
            cover: "cover",
            stretch: "stretch",
            center: "center",
            repeat: "repeat"
        }), d(h, "contextTypes", {isInAParentText: r.PropTypes.bool}), d(h, "defaultProps", {
            onLoad: function () {
            }, onError: function () {
            }, fallbackSource: {}
        });
        var m = {absoluteImage: {left: 0, top: 0, position: "absolute"}}, v = h;
        t.default = v, e.exports = t.default
    }, 80: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        "function" == typeof Symbol && Symbol.iterator;
        var r = void 0;
        "undefined" != typeof __weex_options__ && __weex_options__.weex;
        t.default = {
            customAdvance: function (e, t, n, o, i, a) {
                r.customAdvance(e, t, n, o, i, a)
            }, commit: function (e, t, n, o) {
                r.commit(e, t, n, o)
            }, enterEvent: function (e, t) {
                r.enterEvent ? r.enterEvent(e, t) : r.commit("enter", e, "", t)
            }, updatePageUtparam: function (e) {
                r.updatePageUtparam(e)
            }, updateNextPageUtparam: function (e) {
                r.updateNextPageUtparam(e)
            }, commitut: function (e, t, n, o, i, a, s, u) {
                r.commitut ? r.commitut(e, t, n, o, i, a, s, u) : r.commit && r.commit(e, i, i, u)
            }
        }, e.exports = t.default
    }, 81: function (e, t, n) {
        "use strict";
        e.exports = n(82)
    }, 82: function (e, t, n) {
        "use strict";
        e.exports = n(83)
    }, 83: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        "function" == typeof Symbol && Symbol.iterator;
        var r = function (e) {
            return e && e.__esModule ? e : {default: e}
        }(n(84));
        var o = !0, i = 0, a = {
            screen: (screen && screen.width) + "x" + (screen && screen.height),
            sampling: 1,
            version: "rx-tracker/2.2.7",
            native: 0,
            isInWindmill: 0
        }, s = "/jstracker.3";

        function u(e) {
            if (++i > 20 && o)return !1;
            var t = Object.assign({url: r.default.format(e)}, a, e);
            t.sampling = location.href.indexOf("jt_debug=1") > -1 ? 1 : t.sampling, Math.random() * t.sampling < 1 && (o && "undefined" != typeof goldlog ? goldlog.send && goldlog.send("//gm.mmstat.com" + s, t) : function () {
                if ("undefined" != typeof my && my.getSystemInfoSync && "function" == typeof my.getSystemInfoSync && "TB" === my.getSystemInfoSync().app)return !0;
                return !1
            }() && (t.isInWindmill = "web", function (e) {
                my.httpRequest && "function" == typeof my.httpRequest && my.httpRequest({
                    url: "//gm.mmstat.com" + s,
                    method: "get",
                    data: e,
                    dataType: "json"
                })
            }(t)))
        }

        t.default = {
            report: u, reportError: function (e, t, n) {
                var r = {};
                e && e instanceof Error && (r = {
                    stack: JSON.stringify(e.stack),
                    name: e.name,
                    message: e.message,
                    type: "error",
                    module: t
                }, n && (r.reverse1 = n), u(r))
            }, reportApi: function (e, t) {
                e && e.url && (e.type = "api", e.module = t, e.sampling = e.sampling || "100", u(e))
            }, setConfig: function (e) {
                e && e.sampling && (a.sampling = e.sampling)
            }
        }, e.exports = t.default
    }, 84: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = {render: "rx_render_err", data: "rx_data_fetch_err", error: "rax_error"};
        t.default = {
            format: function (e) {
                var t = location.href || "", n = r[e.type || "custom"] || "rx_user_define_err";
                return [t.replace(/[\?#].*$/, "").replace(/\/$/, ""), e.module || "", n].join("/")
            }
        }, e.exports = t.default
    }, 85: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.default = function () {
            if (o.default.youku || o.default.youkuHD) {
                var e = window.navigator.userAgent.match(/(UTDID)(.*?);/gi);
                return e ? e[0].replace(/(UTDID|\s|;)?/gi, "") : ""
            }
            return o.default.IKU ? (0, r.default)("utdid") : ""
        };
        var r = i(n(61)), o = i(n(46));

        function i(e) {
            return e && e.__esModule ? e : {default: e}
        }

        e.exports = t.default
    }, 86: function (e, t, n) {
        "use strict";
        e.exports = n(87)
    }, 87: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }();
        var o = {};
        "undefined" != typeof localStorage && null !== localStorage && (o = localStorage);
        var i = function () {
            function e() {
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, e)
            }

            return r(e, null, [{
                key: "getItem", value: function (e) {
                    var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : function () {
                    };
                    if (o.getItem) {
                        var n = o.getItem(e);
                        t({data: n || "undefined", result: "success"})
                    }
                }
            }, {
                key: "setItem", value: function (e, t) {
                    var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : function () {
                    };
                    o.setItem && (o.setItem(e, t), n({data: void 0, result: "success"}))
                }
            }, {
                key: "removeItem", value: function (e) {
                    var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : function () {
                    };
                    o.removeItem && (o.removeItem(e), t({data: void 0, result: "success"}))
                }
            }, {
                key: "mergeItem", value: function () {
                }
            }, {
                key: "getAllKeys", value: function () {
                    var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : function () {
                    };
                    o.length && e({data: Object.keys(o), result: "success"})
                }
            }, {
                key: "flushGetRequests", value: function () {
                }
            }, {
                key: "clear", value: function () {
                    arguments.length > 0 && void 0 !== arguments[0] && arguments[0], e.getAllKeys(function (t) {
                        e.multiRemove(t.data)
                    })
                }
            }, {
                key: "multiGet", value: function () {
                }
            }, {
                key: "multiSet", value: function () {
                    arguments.length > 1 && void 0 !== arguments[1] && arguments[1]
                }
            }, {
                key: "multiRemove", value: function (t) {
                    arguments.length > 1 && void 0 !== arguments[1] && arguments[1], t.forEach(function (t) {
                        e.removeItem(t)
                    })
                }
            }, {
                key: "multiMerge", value: function () {
                    arguments.length > 1 && void 0 !== arguments[1] && arguments[1]
                }
            }, {
                key: "sLength", value: function () {
                    var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : function () {
                    };
                    o.length && e({data: o.length, result: "success"})
                }
            }]), e
        }();
        t.default = i, e.exports = t.default
    }, 88: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.PowerMessage = t.CdnPullRequest = t.default = void 0;
        var r = Object.assign || function (e) {
                for (var t = 1; t < arguments.length; t++) {
                    var n = arguments[t];
                    for (var r in n)Object.prototype.hasOwnProperty.call(n, r) && (e[r] = n[r])
                }
                return e
            }, o = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), i = n(28), a = (l(n(46)), l(n(89))), s = l(n(91)), u = l(n(45)), c = n(52);

        function l(e) {
            return e && e.__esModule ? e : {default: e}
        }

        var f = u.default.getInstance("AILP Socket"), p = {PM: "PM", CDN: "CDN"}, d = function (e) {
            function t() {
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t);
                var e = function (e, t) {
                    if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this));
                return e._hasReceiveMsg = {}, e.cdn = null, e.pm = null, e
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, i.EventEmitter), o(t, [{
                key: "connect", value: function (e) {
                    var t = this, n = e.appId, r = e.roomId, o = e.topic, i = e.connectExInfo, u = e.cdnPullRequestPath, c = e.cdnPullRequestIntervalTime, l = void 0 === c ? 3e3 : c, f = e.cdnExpireTime, d = void 0 === f ? 2e4 : f, h = e.webPmOption, m = void 0 === h ? {} : h, v = {};
                    return n && r && o && (this.pm = new s.default, this.pm.on("message", function (e) {
                        t.messageHandler(e.name, e.data, e.data.msgId, p.PM, e.__pmEventSource)
                    }), v.pm = this.pm.connect(n, r, o, i, m)), u && (this.cdn = new a.default(u, l, d), this.cdn.on("message", function (e) {
                        t.messageHandler(e.name, e.data, e.data.msgId, p.CDN)
                    }), v.cdn = this.cdn.connect()), v
                }
            }, {
                key: "disConnect", value: function () {
                    var e = {};
                    return this.cdn && (e.cdn = this.cdn.disConnect()), this.pm && (e.pm = this.pm.disConnect()), e
                }
            }, {
                key: "messageHandler", value: function (e, t, n, o) {
                    var i = arguments.length > 4 && void 0 !== arguments[4] ? arguments[4] : "";
                    if (n) {
                        var a = e + "_" + n;
                        if (this._hasReceiveMsg[a])return !1;
                        this._hasReceiveMsg[a] = !0
                    }
                    var s = r({}, t, {__source: o, __pmEventSource: i});
                    f.log("分发消息", e, s), this.emit(e, s)
                }
            }]), t
        }();
        d.io = new d, d.io.on("notify_unsubscribe", function (e) {
            var t = parseInt(Math.random() * (e.dt || 3) * 1e3), n = (0, c.params)().refer;
            setTimeout(function () {
                console.log('n= '+ n);
                "24679788" == e.mtopAppKey && e.refer === n && d.io.disConnect();
            }, t)
        }), d.SOURCE = p, t.default = d, t.CdnPullRequest = a.default, t.PowerMessage = s.default
    }, 89: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), o = n(28);

        function i(e, t) {
            if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return !t || "object" != typeof t && "function" != typeof t ? e : t
        }

        var a = function (e) {
            return e && e.__esModule ? e : {default: e}
        }(n(45)).default.getInstance("AILP CdnPullRequest"), s = n(90), u = function (e) {
            function t(e, n, r) {
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t);
                var o = i(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this));
                return o._path = e, o._intervalTime = n, o._cdnExpireTime = r, o._cdnPullTimer = null, o._errorCount = 0, o._errorCountMax = 10, i(o, o)
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, o.EventEmitter), r(t, [{
                key: "clearTimer", value: function () {
                    this._cdnPullTimer && (clearTimeout(this._cdnPullTimer), this._cdnPullTimer = null)
                }
            }, {
                key: "dealData", value: function (e, t) {
                    var n = this, r = e.msg;
                    r ? r.forEach(function (e) {
                        if (e.agr_ct && e.DS) {
                            var r = new Date(1e3 * e.agr_ct).getTime();
                            if (t - r <= n._cdnExpireTime) {
                                var o = e.DS, i = o.name, a = o.args;
                                o.name && o.args && o.args.length > 0 && a.forEach(function (e) {
                                    n.emit("message", {name: i, data: e})
                                })
                            }
                        }
                    }) : this.emit("data", e)
                }
            }, {
                key: "_connect", value: function () {
                    this.clearTimer(), window.fetch ? this.fetchConnect() : this.ajaxConnect()
                }
            }, {
                key: "ajaxConnect", value: function () {
                    var e = this;
                    s.ajax(this._path, {
                        type: "GET", dataType: "json", cache: !1, success: function (t) {
                            e.emit("data", t), e._errorCount <= e._errorCountMax && (e._cdnPullTimer = setTimeout(function () {
                                e.connect()
                            }, e._intervalTime))
                        }, error: function (e) {
                            function t() {
                                return e.apply(this, arguments)
                            }

                            return t.toString = function () {
                                return e.toString()
                            }, t
                        }(function () {
                            e._errorCount++, a.log("error count " + e._errorCount, error)
                        })
                    })
                }
            }, {
                key: "fetchConnect", value: function () {
                    var e = this;
                    fetch(this._path, {
                        method: "GET",
                        headers: {Cookie: ""},
                        dataType: "json",
                        mode: "cors"
                    }).then(function (t) {
                        var n = 0;
                        if (e._cdnExpireTime > 0) {
                            var r = t.headers.get("Date");
                            if (!r)throw new Error("读不到date");
                            n = new Date(r).getTime()
                        }
                        return t.json().then(function (e) {
                            return {data: e, date: n}
                        })
                    }).then(function (t) {
                        var n = t.data, r = t.date;
                        e.dealData(n, r)
                    }).catch(function (t) {
                        e._errorCount++, a.log("error count " + e._errorCount, t)
                    }).then(function () {
                        e._errorCount <= e._errorCountMax && (e._cdnPullTimer = setTimeout(function () {
                            e.connect()
                        }, e._intervalTime))
                    })
                }
            }, {
                key: "connect", value: function () {
                    return this._connect(), Promise.resolve()
                }
            }, {
                key: "disConnect", value: function () {
                    return this.clearTimer(), Promise.resolve()
                }
            }]), t
        }();
        t.default = u, e.exports = t.default
    }, 9: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0}), t.default = void 0;
        var r = n(1), o = function (e) {
            return e && e.__esModule ? e : {default: e}
        }(n(5));

        function i(e) {
            return (i = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
                return typeof e
            } : function (e) {
                return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
            })(e)
        }

        function a(e) {
            for (var t = 1; t < arguments.length; t++) {
                var n = null != arguments[t] ? arguments[t] : {}, r = Object.keys(n);
                "function" == typeof Object.getOwnPropertySymbols && (r = r.concat(Object.getOwnPropertySymbols(n).filter(function (e) {
                    return Object.getOwnPropertyDescriptor(n, e).enumerable
                }))), r.forEach(function (t) {
                    f(e, t, n[t])
                })
            }
            return e
        }

        function s(e, t) {
            for (var n = 0; n < t.length; n++) {
                var r = t[n];
                r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
            }
        }

        function u(e, t) {
            return !t || "object" !== i(t) && "function" != typeof t ? function (e) {
                if (void 0 === e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                return e
            }(e) : t
        }

        function c(e) {
            return (c = Object.setPrototypeOf ? Object.getPrototypeOf : function (e) {
                return e.__proto__ || Object.getPrototypeOf(e)
            })(e)
        }

        function l(e, t) {
            return (l = Object.setPrototypeOf || function (e, t) {
                    return e.__proto__ = t, e
                })(e, t)
        }

        function f(e, t, n) {
            return t in e ? Object.defineProperty(e, t, {
                value: n,
                enumerable: !0,
                configurable: !0,
                writable: !0
            }) : e[t] = n, e
        }

        var p = function (e) {
            function t() {
                return function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t), u(this, c(t).apply(this, arguments))
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function");
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        writable: !0,
                        configurable: !0
                    }
                }), t && l(e, t)
            }(t, r.Component), function (e, t, n) {
                t && s(e.prototype, t), n && s(e, n)
            }(t, [{
                key: "render", value: function () {
                    var e = this.props, t = a({}, e, {style: a({}, d.initial, e.style), onClick: e.onPress});
                    return delete t.onPress, (0, r.createElement)(o.default, t)
                }
            }]), t
        }();
        f(p, "propTypes", {});
        var d = {initial: {cursor: "pointer"}}, h = p;
        t.default = h, e.exports = t.default
    }, 90: function (e, t, n) {
        var r;
        !function (t, n) {
            "use strict";
            "object" == typeof e.exports ? e.exports = t.document ? n(t, !0) : function (e) {
                if (!e.document)throw new Error("jQuery requires a window with a document");
                return n(e)
            } : n(t)
        }("undefined" != typeof window ? window : this, function (n, o) {
            "use strict";
            var i = [], a = n.document, s = Object.getPrototypeOf, u = i.slice, c = i.concat, l = i.push, f = i.indexOf, p = {}, d = p.toString, h = p.hasOwnProperty, m = h.toString, v = m.call(Object), y = {}, g = function (e) {
                return "function" == typeof e && "number" != typeof e.nodeType
            }, b = function (e) {
                return null != e && e === e.window
            }, w = {type: !0, src: !0, noModule: !0};

            function _(e, t, n) {
                var r, o = (t = t || a).createElement("script");
                if (o.text = e, n)for (r in w)n[r] && (o[r] = n[r]);
                t.head.appendChild(o).parentNode.removeChild(o)
            }

            function x(e) {
                return null == e ? e + "" : "object" == typeof e || "function" == typeof e ? p[d.call(e)] || "object" : typeof e
            }

            var E = function (e, t) {
                return new E.fn.init(e, t)
            }, k = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;

            function T(e) {
                var t = !!e && "length" in e && e.length, n = x(e);
                return !g(e) && !b(e) && ("array" === n || 0 === t || "number" == typeof t && t > 0 && t - 1 in e)
            }

            E.fn = E.prototype = {
                jquery: "3.3.1", constructor: E, length: 0, toArray: function () {
                    return u.call(this)
                }, get: function (e) {
                    return null == e ? u.call(this) : e < 0 ? this[e + this.length] : this[e]
                }, pushStack: function (e) {
                    var t = E.merge(this.constructor(), e);
                    return t.prevObject = this, t
                }, each: function (e) {
                    return E.each(this, e)
                }, map: function (e) {
                    return this.pushStack(E.map(this, function (t, n) {
                        return e.call(t, n, t)
                    }))
                }, slice: function () {
                    return this.pushStack(u.apply(this, arguments))
                }, first: function () {
                    return this.eq(0)
                }, last: function () {
                    return this.eq(-1)
                }, eq: function (e) {
                    var t = this.length, n = +e + (e < 0 ? t : 0);
                    return this.pushStack(n >= 0 && n < t ? [this[n]] : [])
                }, end: function () {
                    return this.prevObject || this.constructor()
                }, push: l, sort: i.sort, splice: i.splice
            }, E.extend = E.fn.extend = function () {
                var e, t, n, r, o, i, a = arguments[0] || {}, s = 1, u = arguments.length, c = !1;
                for ("boolean" == typeof a && (c = a, a = arguments[s] || {}, s++), "object" == typeof a || g(a) || (a = {}), s === u && (a = this, s--); s < u; s++)if (null != (e = arguments[s]))for (t in e)n = a[t], a !== (r = e[t]) && (c && r && (E.isPlainObject(r) || (o = Array.isArray(r))) ? (o ? (o = !1, i = n && Array.isArray(n) ? n : []) : i = n && E.isPlainObject(n) ? n : {}, a[t] = E.extend(c, i, r)) : void 0 !== r && (a[t] = r));
                return a
            }, E.extend({
                expando: "jQuery" + ("3.3.1" + Math.random()).replace(/\D/g, ""),
                isReady: !0,
                error: function (e) {
                    throw new Error(e)
                },
                noop: function () {
                },
                isPlainObject: function (e) {
                    var t, n;
                    return !(!e || "[object Object]" !== d.call(e)) && (!(t = s(e)) || "function" == typeof(n = h.call(t, "constructor") && t.constructor) && m.call(n) === v)
                },
                isEmptyObject: function (e) {
                    var t;
                    for (t in e)return !1;
                    return !0
                },
                globalEval: function (e) {
                    _(e)
                },
                each: function (e, t) {
                    var n, r = 0;
                    if (T(e))for (n = e.length; r < n && !1 !== t.call(e[r], r, e[r]); r++); else for (r in e)if (!1 === t.call(e[r], r, e[r]))break;
                    return e
                },
                trim: function (e) {
                    return null == e ? "" : (e + "").replace(k, "")
                },
                makeArray: function (e, t) {
                    var n = t || [];
                    return null != e && (T(Object(e)) ? E.merge(n, "string" == typeof e ? [e] : e) : l.call(n, e)), n
                },
                inArray: function (e, t, n) {
                    return null == t ? -1 : f.call(t, e, n)
                },
                merge: function (e, t) {
                    for (var n = +t.length, r = 0, o = e.length; r < n; r++)e[o++] = t[r];
                    return e.length = o, e
                },
                grep: function (e, t, n) {
                    for (var r = [], o = 0, i = e.length, a = !n; o < i; o++)!t(e[o], o) !== a && r.push(e[o]);
                    return r
                },
                map: function (e, t, n) {
                    var r, o, i = 0, a = [];
                    if (T(e))for (r = e.length; i < r; i++)null != (o = t(e[i], i, n)) && a.push(o); else for (i in e)null != (o = t(e[i], i, n)) && a.push(o);
                    return c.apply([], a)
                },
                guid: 1,
                support: y
            }), "function" == typeof Symbol && (E.fn[Symbol.iterator] = i[Symbol.iterator]), E.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "), function (e, t) {
                p["[object " + t + "]"] = t.toLowerCase()
            });
            var C = function (e) {
                var t, n, r, o, i, a, s, u, c, l, f, p, d, h, m, v, y, g, b, w = "sizzle" + 1 * new Date, _ = e.document, x = 0, E = 0, k = ae(), T = ae(), C = ae(), S = function (e, t) {
                    return e === t && (f = !0), 0
                }, P = {}.hasOwnProperty, O = [], j = O.pop, I = O.push, A = O.push, M = O.slice, N = function (e, t) {
                    for (var n = 0, r = e.length; n < r; n++)if (e[n] === t)return n;
                    return -1
                }, L = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped", D = "[\\x20\\t\\r\\n\\f]", R = "(?:\\\\.|[\\w-]|[^\0-\\xa0])+", B = "\\[" + D + "*(" + R + ")(?:" + D + "*([*^$|!~]?=)" + D + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + R + "))|)" + D + "*\\]", F = ":(" + R + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + B + ")*)|.*)\\)|)", U = new RegExp(D + "+", "g"), q = new RegExp("^" + D + "+|((?:^|[^\\\\])(?:\\\\.)*)" + D + "+$", "g"), H = new RegExp("^" + D + "*," + D + "*"), V = new RegExp("^" + D + "*([>+~]|" + D + ")" + D + "*"), W = new RegExp("=" + D + "*([^\\]'\"]*?)" + D + "*\\]", "g"), z = new RegExp(F), K = new RegExp("^" + R + "$"), Y = {
                    ID: new RegExp("^#(" + R + ")"),
                    CLASS: new RegExp("^\\.(" + R + ")"),
                    TAG: new RegExp("^(" + R + "|[*])"),
                    ATTR: new RegExp("^" + B),
                    PSEUDO: new RegExp("^" + F),
                    CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + D + "*(even|odd|(([+-]|)(\\d*)n|)" + D + "*(?:([+-]|)" + D + "*(\\d+)|))" + D + "*\\)|)", "i"),
                    bool: new RegExp("^(?:" + L + ")$", "i"),
                    needsContext: new RegExp("^" + D + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + D + "*((?:-\\d)?\\d*)" + D + "*\\)|)(?=[^-]|$)", "i")
                }, X = /^(?:input|select|textarea|button)$/i, $ = /^h\d$/i, J = /^[^{]+\{\s*\[native \w/, G = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/, Q = /[+~]/, Z = new RegExp("\\\\([\\da-f]{1,6}" + D + "?|(" + D + ")|.)", "ig"), ee = function (e, t, n) {
                    var r = "0x" + t - 65536;
                    return r != r || n ? t : r < 0 ? String.fromCharCode(r + 65536) : String.fromCharCode(r >> 10 | 55296, 1023 & r | 56320)
                }, te = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g, ne = function (e, t) {
                    return t ? "\0" === e ? "�" : e.slice(0, -1) + "\\" + e.charCodeAt(e.length - 1).toString(16) + " " : "\\" + e
                }, re = function () {
                    p()
                }, oe = ge(function (e) {
                    return !0 === e.disabled && ("form" in e || "label" in e)
                }, {dir: "parentNode", next: "legend"});
                try {
                    A.apply(O = M.call(_.childNodes), _.childNodes), O[_.childNodes.length].nodeType
                } catch (e) {
                    A = {
                        apply: O.length ? function (e, t) {
                            I.apply(e, M.call(t))
                        } : function (e, t) {
                            for (var n = e.length, r = 0; e[n++] = t[r++];);
                            e.length = n - 1
                        }
                    }
                }
                function ie(e, t, r, o) {
                    var i, s, c, l, f, h, y, g = t && t.ownerDocument, x = t ? t.nodeType : 9;
                    if (r = r || [], "string" != typeof e || !e || 1 !== x && 9 !== x && 11 !== x)return r;
                    if (!o && ((t ? t.ownerDocument || t : _) !== d && p(t), t = t || d, m)) {
                        if (11 !== x && (f = G.exec(e)))if (i = f[1]) {
                            if (9 === x) {
                                if (!(c = t.getElementById(i)))return r;
                                if (c.id === i)return r.push(c), r
                            } else if (g && (c = g.getElementById(i)) && b(t, c) && c.id === i)return r.push(c), r
                        } else {
                            if (f[2])return A.apply(r, t.getElementsByTagName(e)), r;
                            if ((i = f[3]) && n.getElementsByClassName && t.getElementsByClassName)return A.apply(r, t.getElementsByClassName(i)), r
                        }
                        if (n.qsa && !C[e + " "] && (!v || !v.test(e))) {
                            if (1 !== x) g = t, y = e; else if ("object" !== t.nodeName.toLowerCase()) {
                                for ((l = t.getAttribute("id")) ? l = l.replace(te, ne) : t.setAttribute("id", l = w), s = (h = a(e)).length; s--;)h[s] = "#" + l + " " + ye(h[s]);
                                y = h.join(","), g = Q.test(e) && me(t.parentNode) || t
                            }
                            if (y)try {
                                return A.apply(r, g.querySelectorAll(y)), r
                            } catch (e) {
                            } finally {
                                l === w && t.removeAttribute("id")
                            }
                        }
                    }
                    return u(e.replace(q, "$1"), t, r, o)
                }

                function ae() {
                    var e = [];
                    return function t(n, o) {
                        return e.push(n + " ") > r.cacheLength && delete t[e.shift()], t[n + " "] = o
                    }
                }

                function se(e) {
                    return e[w] = !0, e
                }

                function ue(e) {
                    var t = d.createElement("fieldset");
                    try {
                        return !!e(t)
                    } catch (e) {
                        return !1
                    } finally {
                        t.parentNode && t.parentNode.removeChild(t), t = null
                    }
                }

                function ce(e, t) {
                    for (var n = e.split("|"), o = n.length; o--;)r.attrHandle[n[o]] = t
                }

                function le(e, t) {
                    var n = t && e, r = n && 1 === e.nodeType && 1 === t.nodeType && e.sourceIndex - t.sourceIndex;
                    if (r)return r;
                    if (n)for (; n = n.nextSibling;)if (n === t)return -1;
                    return e ? 1 : -1
                }

                function fe(e) {
                    return function (t) {
                        return "input" === t.nodeName.toLowerCase() && t.type === e
                    }
                }

                function pe(e) {
                    return function (t) {
                        var n = t.nodeName.toLowerCase();
                        return ("input" === n || "button" === n) && t.type === e
                    }
                }

                function de(e) {
                    return function (t) {
                        return "form" in t ? t.parentNode && !1 === t.disabled ? "label" in t ? "label" in t.parentNode ? t.parentNode.disabled === e : t.disabled === e : t.isDisabled === e || t.isDisabled !== !e && oe(t) === e : t.disabled === e : "label" in t && t.disabled === e
                    }
                }

                function he(e) {
                    return se(function (t) {
                        return t = +t, se(function (n, r) {
                            for (var o, i = e([], n.length, t), a = i.length; a--;)n[o = i[a]] && (n[o] = !(r[o] = n[o]))
                        })
                    })
                }

                function me(e) {
                    return e && void 0 !== e.getElementsByTagName && e
                }

                for (t in n = ie.support = {}, i = ie.isXML = function (e) {
                    var t = e && (e.ownerDocument || e).documentElement;
                    return !!t && "HTML" !== t.nodeName
                }, p = ie.setDocument = function (e) {
                    var t, o, a = e ? e.ownerDocument || e : _;
                    return a !== d && 9 === a.nodeType && a.documentElement ? (h = (d = a).documentElement, m = !i(d), _ !== d && (o = d.defaultView) && o.top !== o && (o.addEventListener ? o.addEventListener("unload", re, !1) : o.attachEvent && o.attachEvent("onunload", re)), n.attributes = ue(function (e) {
                        return e.className = "i", !e.getAttribute("className")
                    }), n.getElementsByTagName = ue(function (e) {
                        return e.appendChild(d.createComment("")), !e.getElementsByTagName("*").length
                    }), n.getElementsByClassName = J.test(d.getElementsByClassName), n.getById = ue(function (e) {
                        return h.appendChild(e).id = w, !d.getElementsByName || !d.getElementsByName(w).length
                    }), n.getById ? (r.filter.ID = function (e) {
                        var t = e.replace(Z, ee);
                        return function (e) {
                            return e.getAttribute("id") === t
                        }
                    }, r.find.ID = function (e, t) {
                        if (void 0 !== t.getElementById && m) {
                            var n = t.getElementById(e);
                            return n ? [n] : []
                        }
                    }) : (r.filter.ID = function (e) {
                        var t = e.replace(Z, ee);
                        return function (e) {
                            var n = void 0 !== e.getAttributeNode && e.getAttributeNode("id");
                            return n && n.value === t
                        }
                    }, r.find.ID = function (e, t) {
                        if (void 0 !== t.getElementById && m) {
                            var n, r, o, i = t.getElementById(e);
                            if (i) {
                                if ((n = i.getAttributeNode("id")) && n.value === e)return [i];
                                for (o = t.getElementsByName(e), r = 0; i = o[r++];)if ((n = i.getAttributeNode("id")) && n.value === e)return [i]
                            }
                            return []
                        }
                    }), r.find.TAG = n.getElementsByTagName ? function (e, t) {
                        return void 0 !== t.getElementsByTagName ? t.getElementsByTagName(e) : n.qsa ? t.querySelectorAll(e) : void 0
                    } : function (e, t) {
                        var n, r = [], o = 0, i = t.getElementsByTagName(e);
                        if ("*" === e) {
                            for (; n = i[o++];)1 === n.nodeType && r.push(n);
                            return r
                        }
                        return i
                    }, r.find.CLASS = n.getElementsByClassName && function (e, t) {
                            if (void 0 !== t.getElementsByClassName && m)return t.getElementsByClassName(e)
                        }, y = [], v = [], (n.qsa = J.test(d.querySelectorAll)) && (ue(function (e) {
                        h.appendChild(e).innerHTML = "<a id='" + w + "'></a><select id='" + w + "-\r\\' msallowcapture=''><option selected=''></option></select>", e.querySelectorAll("[msallowcapture^='']").length && v.push("[*^$]=" + D + "*(?:''|\"\")"), e.querySelectorAll("[selected]").length || v.push("\\[" + D + "*(?:value|" + L + ")"), e.querySelectorAll("[id~=" + w + "-]").length || v.push("~="), e.querySelectorAll(":checked").length || v.push(":checked"), e.querySelectorAll("a#" + w + "+*").length || v.push(".#.+[+~]")
                    }), ue(function (e) {
                        e.innerHTML = "<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";
                        var t = d.createElement("input");
                        t.setAttribute("type", "hidden"), e.appendChild(t).setAttribute("name", "D"), e.querySelectorAll("[name=d]").length && v.push("name" + D + "*[*^$|!~]?="), 2 !== e.querySelectorAll(":enabled").length && v.push(":enabled", ":disabled"), h.appendChild(e).disabled = !0, 2 !== e.querySelectorAll(":disabled").length && v.push(":enabled", ":disabled"), e.querySelectorAll("*,:x"), v.push(",.*:")
                    })), (n.matchesSelector = J.test(g = h.matches || h.webkitMatchesSelector || h.mozMatchesSelector || h.oMatchesSelector || h.msMatchesSelector)) && ue(function (e) {
                        n.disconnectedMatch = g.call(e, "*"), g.call(e, "[s!='']:x"), y.push("!=", F)
                    }), v = v.length && new RegExp(v.join("|")), y = y.length && new RegExp(y.join("|")), t = J.test(h.compareDocumentPosition), b = t || J.test(h.contains) ? function (e, t) {
                        var n = 9 === e.nodeType ? e.documentElement : e, r = t && t.parentNode;
                        return e === r || !(!r || 1 !== r.nodeType || !(n.contains ? n.contains(r) : e.compareDocumentPosition && 16 & e.compareDocumentPosition(r)))
                    } : function (e, t) {
                        if (t)for (; t = t.parentNode;)if (t === e)return !0;
                        return !1
                    }, S = t ? function (e, t) {
                        if (e === t)return f = !0, 0;
                        var r = !e.compareDocumentPosition - !t.compareDocumentPosition;
                        return r || (1 & (r = (e.ownerDocument || e) === (t.ownerDocument || t) ? e.compareDocumentPosition(t) : 1) || !n.sortDetached && t.compareDocumentPosition(e) === r ? e === d || e.ownerDocument === _ && b(_, e) ? -1 : t === d || t.ownerDocument === _ && b(_, t) ? 1 : l ? N(l, e) - N(l, t) : 0 : 4 & r ? -1 : 1)
                    } : function (e, t) {
                        if (e === t)return f = !0, 0;
                        var n, r = 0, o = e.parentNode, i = t.parentNode, a = [e], s = [t];
                        if (!o || !i)return e === d ? -1 : t === d ? 1 : o ? -1 : i ? 1 : l ? N(l, e) - N(l, t) : 0;
                        if (o === i)return le(e, t);
                        for (n = e; n = n.parentNode;)a.unshift(n);
                        for (n = t; n = n.parentNode;)s.unshift(n);
                        for (; a[r] === s[r];)r++;
                        return r ? le(a[r], s[r]) : a[r] === _ ? -1 : s[r] === _ ? 1 : 0
                    }, d) : d
                }, ie.matches = function (e, t) {
                    return ie(e, null, null, t)
                }, ie.matchesSelector = function (e, t) {
                    if ((e.ownerDocument || e) !== d && p(e), t = t.replace(W, "='$1']"), n.matchesSelector && m && !C[t + " "] && (!y || !y.test(t)) && (!v || !v.test(t)))try {
                        var r = g.call(e, t);
                        if (r || n.disconnectedMatch || e.document && 11 !== e.document.nodeType)return r
                    } catch (e) {
                    }
                    return ie(t, d, null, [e]).length > 0
                }, ie.contains = function (e, t) {
                    return (e.ownerDocument || e) !== d && p(e), b(e, t)
                }, ie.attr = function (e, t) {
                    (e.ownerDocument || e) !== d && p(e);
                    var o = r.attrHandle[t.toLowerCase()], i = o && P.call(r.attrHandle, t.toLowerCase()) ? o(e, t, !m) : void 0;
                    return void 0 !== i ? i : n.attributes || !m ? e.getAttribute(t) : (i = e.getAttributeNode(t)) && i.specified ? i.value : null
                }, ie.escape = function (e) {
                    return (e + "").replace(te, ne)
                }, ie.error = function (e) {
                    throw new Error("Syntax error, unrecognized expression: " + e)
                }, ie.uniqueSort = function (e) {
                    var t, r = [], o = 0, i = 0;
                    if (f = !n.detectDuplicates, l = !n.sortStable && e.slice(0), e.sort(S), f) {
                        for (; t = e[i++];)t === e[i] && (o = r.push(i));
                        for (; o--;)e.splice(r[o], 1)
                    }
                    return l = null, e
                }, o = ie.getText = function (e) {
                    var t, n = "", r = 0, i = e.nodeType;
                    if (i) {
                        if (1 === i || 9 === i || 11 === i) {
                            if ("string" == typeof e.textContent)return e.textContent;
                            for (e = e.firstChild; e; e = e.nextSibling)n += o(e)
                        } else if (3 === i || 4 === i)return e.nodeValue
                    } else for (; t = e[r++];)n += o(t);
                    return n
                }, (r = ie.selectors = {
                    cacheLength: 50,
                    createPseudo: se,
                    match: Y,
                    attrHandle: {},
                    find: {},
                    relative: {
                        ">": {dir: "parentNode", first: !0},
                        " ": {dir: "parentNode"},
                        "+": {dir: "previousSibling", first: !0},
                        "~": {dir: "previousSibling"}
                    },
                    preFilter: {
                        ATTR: function (e) {
                            return e[1] = e[1].replace(Z, ee), e[3] = (e[3] || e[4] || e[5] || "").replace(Z, ee), "~=" === e[2] && (e[3] = " " + e[3] + " "), e.slice(0, 4)
                        }, CHILD: function (e) {
                            return e[1] = e[1].toLowerCase(), "nth" === e[1].slice(0, 3) ? (e[3] || ie.error(e[0]), e[4] = +(e[4] ? e[5] + (e[6] || 1) : 2 * ("even" === e[3] || "odd" === e[3])), e[5] = +(e[7] + e[8] || "odd" === e[3])) : e[3] && ie.error(e[0]), e
                        }, PSEUDO: function (e) {
                            var t, n = !e[6] && e[2];
                            return Y.CHILD.test(e[0]) ? null : (e[3] ? e[2] = e[4] || e[5] || "" : n && z.test(n) && (t = a(n, !0)) && (t = n.indexOf(")", n.length - t) - n.length) && (e[0] = e[0].slice(0, t), e[2] = n.slice(0, t)), e.slice(0, 3))
                        }
                    },
                    filter: {
                        TAG: function (e) {
                            var t = e.replace(Z, ee).toLowerCase();
                            return "*" === e ? function () {
                                return !0
                            } : function (e) {
                                return e.nodeName && e.nodeName.toLowerCase() === t
                            }
                        }, CLASS: function (e) {
                            var t = k[e + " "];
                            return t || (t = new RegExp("(^|" + D + ")" + e + "(" + D + "|$)")) && k(e, function (e) {
                                    return t.test("string" == typeof e.className && e.className || void 0 !== e.getAttribute && e.getAttribute("class") || "")
                                })
                        }, ATTR: function (e, t, n) {
                            return function (r) {
                                var o = ie.attr(r, e);
                                return null == o ? "!=" === t : !t || (o += "", "=" === t ? o === n : "!=" === t ? o !== n : "^=" === t ? n && 0 === o.indexOf(n) : "*=" === t ? n && o.indexOf(n) > -1 : "$=" === t ? n && o.slice(-n.length) === n : "~=" === t ? (" " + o.replace(U, " ") + " ").indexOf(n) > -1 : "|=" === t && (o === n || o.slice(0, n.length + 1) === n + "-"))
                            }
                        }, CHILD: function (e, t, n, r, o) {
                            var i = "nth" !== e.slice(0, 3), a = "last" !== e.slice(-4), s = "of-type" === t;
                            return 1 === r && 0 === o ? function (e) {
                                return !!e.parentNode
                            } : function (t, n, u) {
                                var c, l, f, p, d, h, m = i !== a ? "nextSibling" : "previousSibling", v = t.parentNode, y = s && t.nodeName.toLowerCase(), g = !u && !s, b = !1;
                                if (v) {
                                    if (i) {
                                        for (; m;) {
                                            for (p = t; p = p[m];)if (s ? p.nodeName.toLowerCase() === y : 1 === p.nodeType)return !1;
                                            h = m = "only" === e && !h && "nextSibling"
                                        }
                                        return !0
                                    }
                                    if (h = [a ? v.firstChild : v.lastChild], a && g) {
                                        for (b = (d = (c = (l = (f = (p = v)[w] || (p[w] = {}))[p.uniqueID] || (f[p.uniqueID] = {}))[e] || [])[0] === x && c[1]) && c[2], p = d && v.childNodes[d]; p = ++d && p && p[m] || (b = d = 0) || h.pop();)if (1 === p.nodeType && ++b && p === t) {
                                            l[e] = [x, d, b];
                                            break
                                        }
                                    } else if (g && (b = d = (c = (l = (f = (p = t)[w] || (p[w] = {}))[p.uniqueID] || (f[p.uniqueID] = {}))[e] || [])[0] === x && c[1]), !1 === b)for (; (p = ++d && p && p[m] || (b = d = 0) || h.pop()) && ((s ? p.nodeName.toLowerCase() !== y : 1 !== p.nodeType) || !++b || (g && ((l = (f = p[w] || (p[w] = {}))[p.uniqueID] || (f[p.uniqueID] = {}))[e] = [x, b]), p !== t)););
                                    return (b -= o) === r || b % r == 0 && b / r >= 0
                                }
                            }
                        }, PSEUDO: function (e, t) {
                            var n, o = r.pseudos[e] || r.setFilters[e.toLowerCase()] || ie.error("unsupported pseudo: " + e);
                            return o[w] ? o(t) : o.length > 1 ? (n = [e, e, "", t], r.setFilters.hasOwnProperty(e.toLowerCase()) ? se(function (e, n) {
                                for (var r, i = o(e, t), a = i.length; a--;)e[r = N(e, i[a])] = !(n[r] = i[a])
                            }) : function (e) {
                                return o(e, 0, n)
                            }) : o
                        }
                    },
                    pseudos: {
                        not: se(function (e) {
                            var t = [], n = [], r = s(e.replace(q, "$1"));
                            return r[w] ? se(function (e, t, n, o) {
                                for (var i, a = r(e, null, o, []), s = e.length; s--;)(i = a[s]) && (e[s] = !(t[s] = i))
                            }) : function (e, o, i) {
                                return t[0] = e, r(t, null, i, n), t[0] = null, !n.pop()
                            }
                        }), has: se(function (e) {
                            return function (t) {
                                return ie(e, t).length > 0
                            }
                        }), contains: se(function (e) {
                            return e = e.replace(Z, ee), function (t) {
                                return (t.textContent || t.innerText || o(t)).indexOf(e) > -1
                            }
                        }), lang: se(function (e) {
                            return K.test(e || "") || ie.error("unsupported lang: " + e), e = e.replace(Z, ee).toLowerCase(), function (t) {
                                var n;
                                do {
                                    if (n = m ? t.lang : t.getAttribute("xml:lang") || t.getAttribute("lang"))return (n = n.toLowerCase()) === e || 0 === n.indexOf(e + "-")
                                } while ((t = t.parentNode) && 1 === t.nodeType);
                                return !1
                            }
                        }), target: function (t) {
                            var n = e.location && e.location.hash;
                            return n && n.slice(1) === t.id
                        }, root: function (e) {
                            return e === h
                        }, focus: function (e) {
                            return e === d.activeElement && (!d.hasFocus || d.hasFocus()) && !!(e.type || e.href || ~e.tabIndex)
                        }, enabled: de(!1), disabled: de(!0), checked: function (e) {
                            var t = e.nodeName.toLowerCase();
                            return "input" === t && !!e.checked || "option" === t && !!e.selected
                        }, selected: function (e) {
                            return e.parentNode && e.parentNode.selectedIndex, !0 === e.selected
                        }, empty: function (e) {
                            for (e = e.firstChild; e; e = e.nextSibling)if (e.nodeType < 6)return !1;
                            return !0
                        }, parent: function (e) {
                            return !r.pseudos.empty(e)
                        }, header: function (e) {
                            return $.test(e.nodeName)
                        }, input: function (e) {
                            return X.test(e.nodeName)
                        }, button: function (e) {
                            var t = e.nodeName.toLowerCase();
                            return "input" === t && "button" === e.type || "button" === t
                        }, text: function (e) {
                            var t;
                            return "input" === e.nodeName.toLowerCase() && "text" === e.type && (null == (t = e.getAttribute("type")) || "text" === t.toLowerCase())
                        }, first: he(function () {
                            return [0]
                        }), last: he(function (e, t) {
                            return [t - 1]
                        }), eq: he(function (e, t, n) {
                            return [n < 0 ? n + t : n]
                        }), even: he(function (e, t) {
                            for (var n = 0; n < t; n += 2)e.push(n);
                            return e
                        }), odd: he(function (e, t) {
                            for (var n = 1; n < t; n += 2)e.push(n);
                            return e
                        }), lt: he(function (e, t, n) {
                            for (var r = n < 0 ? n + t : n; --r >= 0;)e.push(r);
                            return e
                        }), gt: he(function (e, t, n) {
                            for (var r = n < 0 ? n + t : n; ++r < t;)e.push(r);
                            return e
                        })
                    }
                }).pseudos.nth = r.pseudos.eq, {
                    radio: !0,
                    checkbox: !0,
                    file: !0,
                    password: !0,
                    image: !0
                })r.pseudos[t] = fe(t);
                for (t in{submit: !0, reset: !0})r.pseudos[t] = pe(t);
                function ve() {
                }

                function ye(e) {
                    for (var t = 0, n = e.length, r = ""; t < n; t++)r += e[t].value;
                    return r
                }

                function ge(e, t, n) {
                    var r = t.dir, o = t.next, i = o || r, a = n && "parentNode" === i, s = E++;
                    return t.first ? function (t, n, o) {
                        for (; t = t[r];)if (1 === t.nodeType || a)return e(t, n, o);
                        return !1
                    } : function (t, n, u) {
                        var c, l, f, p = [x, s];
                        if (u) {
                            for (; t = t[r];)if ((1 === t.nodeType || a) && e(t, n, u))return !0
                        } else for (; t = t[r];)if (1 === t.nodeType || a)if (l = (f = t[w] || (t[w] = {}))[t.uniqueID] || (f[t.uniqueID] = {}), o && o === t.nodeName.toLowerCase()) t = t[r] || t; else {
                            if ((c = l[i]) && c[0] === x && c[1] === s)return p[2] = c[2];
                            if (l[i] = p, p[2] = e(t, n, u))return !0
                        }
                        return !1
                    }
                }

                function be(e) {
                    return e.length > 1 ? function (t, n, r) {
                        for (var o = e.length; o--;)if (!e[o](t, n, r))return !1;
                        return !0
                    } : e[0]
                }

                function we(e, t, n, r, o) {
                    for (var i, a = [], s = 0, u = e.length, c = null != t; s < u; s++)(i = e[s]) && (n && !n(i, r, o) || (a.push(i), c && t.push(s)));
                    return a
                }

                function _e(e, t, n, r, o, i) {
                    return r && !r[w] && (r = _e(r)), o && !o[w] && (o = _e(o, i)), se(function (i, a, s, u) {
                        var c, l, f, p = [], d = [], h = a.length, m = i || function (e, t, n) {
                                for (var r = 0, o = t.length; r < o; r++)ie(e, t[r], n);
                                return n
                            }(t || "*", s.nodeType ? [s] : s, []), v = !e || !i && t ? m : we(m, p, e, s, u), y = n ? o || (i ? e : h || r) ? [] : a : v;
                        if (n && n(v, y, s, u), r)for (c = we(y, d), r(c, [], s, u), l = c.length; l--;)(f = c[l]) && (y[d[l]] = !(v[d[l]] = f));
                        if (i) {
                            if (o || e) {
                                if (o) {
                                    for (c = [], l = y.length; l--;)(f = y[l]) && c.push(v[l] = f);
                                    o(null, y = [], c, u)
                                }
                                for (l = y.length; l--;)(f = y[l]) && (c = o ? N(i, f) : p[l]) > -1 && (i[c] = !(a[c] = f))
                            }
                        } else y = we(y === a ? y.splice(h, y.length) : y), o ? o(null, a, y, u) : A.apply(a, y)
                    })
                }

                function xe(e) {
                    for (var t, n, o, i = e.length, a = r.relative[e[0].type], s = a || r.relative[" "], u = a ? 1 : 0, l = ge(function (e) {
                        return e === t
                    }, s, !0), f = ge(function (e) {
                        return N(t, e) > -1
                    }, s, !0), p = [function (e, n, r) {
                        var o = !a && (r || n !== c) || ((t = n).nodeType ? l(e, n, r) : f(e, n, r));
                        return t = null, o
                    }]; u < i; u++)if (n = r.relative[e[u].type]) p = [ge(be(p), n)]; else {
                        if ((n = r.filter[e[u].type].apply(null, e[u].matches))[w]) {
                            for (o = ++u; o < i && !r.relative[e[o].type]; o++);
                            return _e(u > 1 && be(p), u > 1 && ye(e.slice(0, u - 1).concat({value: " " === e[u - 2].type ? "*" : ""})).replace(q, "$1"), n, u < o && xe(e.slice(u, o)), o < i && xe(e = e.slice(o)), o < i && ye(e))
                        }
                        p.push(n)
                    }
                    return be(p)
                }

                return ve.prototype = r.filters = r.pseudos, r.setFilters = new ve, a = ie.tokenize = function (e, t) {
                    var n, o, i, a, s, u, c, l = T[e + " "];
                    if (l)return t ? 0 : l.slice(0);
                    for (s = e, u = [], c = r.preFilter; s;) {
                        for (a in n && !(o = H.exec(s)) || (o && (s = s.slice(o[0].length) || s), u.push(i = [])), n = !1, (o = V.exec(s)) && (n = o.shift(), i.push({
                            value: n,
                            type: o[0].replace(q, " ")
                        }), s = s.slice(n.length)), r.filter)!(o = Y[a].exec(s)) || c[a] && !(o = c[a](o)) || (n = o.shift(), i.push({
                            value: n,
                            type: a,
                            matches: o
                        }), s = s.slice(n.length));
                        if (!n)break
                    }
                    return t ? s.length : s ? ie.error(e) : T(e, u).slice(0)
                }, s = ie.compile = function (e, t) {
                    var n, o = [], i = [], s = C[e + " "];
                    if (!s) {
                        for (t || (t = a(e)), n = t.length; n--;)(s = xe(t[n]))[w] ? o.push(s) : i.push(s);
                        (s = C(e, function (e, t) {
                            var n = t.length > 0, o = e.length > 0, i = function (i, a, s, u, l) {
                                var f, h, v, y = 0, g = "0", b = i && [], w = [], _ = c, E = i || o && r.find.TAG("*", l), k = x += null == _ ? 1 : Math.random() || .1, T = E.length;
                                for (l && (c = a === d || a || l); g !== T && null != (f = E[g]); g++) {
                                    if (o && f) {
                                        for (h = 0, a || f.ownerDocument === d || (p(f), s = !m); v = e[h++];)if (v(f, a || d, s)) {
                                            u.push(f);
                                            break
                                        }
                                        l && (x = k)
                                    }
                                    n && ((f = !v && f) && y--, i && b.push(f))
                                }
                                if (y += g, n && g !== y) {
                                    for (h = 0; v = t[h++];)v(b, w, a, s);
                                    if (i) {
                                        if (y > 0)for (; g--;)b[g] || w[g] || (w[g] = j.call(u));
                                        w = we(w)
                                    }
                                    A.apply(u, w), l && !i && w.length > 0 && y + t.length > 1 && ie.uniqueSort(u)
                                }
                                return l && (x = k, c = _), b
                            };
                            return n ? se(i) : i
                        }(i, o))).selector = e
                    }
                    return s
                }, u = ie.select = function (e, t, n, o) {
                    var i, u, c, l, f, p = "function" == typeof e && e, d = !o && a(e = p.selector || e);
                    if (n = n || [], 1 === d.length) {
                        if ((u = d[0] = d[0].slice(0)).length > 2 && "ID" === (c = u[0]).type && 9 === t.nodeType && m && r.relative[u[1].type]) {
                            if (!(t = (r.find.ID(c.matches[0].replace(Z, ee), t) || [])[0]))return n;
                            p && (t = t.parentNode), e = e.slice(u.shift().value.length)
                        }
                        for (i = Y.needsContext.test(e) ? 0 : u.length; i-- && (c = u[i], !r.relative[l = c.type]);)if ((f = r.find[l]) && (o = f(c.matches[0].replace(Z, ee), Q.test(u[0].type) && me(t.parentNode) || t))) {
                            if (u.splice(i, 1), !(e = o.length && ye(u)))return A.apply(n, o), n;
                            break
                        }
                    }
                    return (p || s(e, d))(o, t, !m, n, !t || Q.test(e) && me(t.parentNode) || t), n
                }, n.sortStable = w.split("").sort(S).join("") === w, n.detectDuplicates = !!f, p(), n.sortDetached = ue(function (e) {
                    return 1 & e.compareDocumentPosition(d.createElement("fieldset"))
                }), ue(function (e) {
                    return e.innerHTML = "<a href='#'></a>", "#" === e.firstChild.getAttribute("href")
                }) || ce("type|href|height|width", function (e, t, n) {
                    if (!n)return e.getAttribute(t, "type" === t.toLowerCase() ? 1 : 2)
                }), n.attributes && ue(function (e) {
                    return e.innerHTML = "<input/>", e.firstChild.setAttribute("value", ""), "" === e.firstChild.getAttribute("value")
                }) || ce("value", function (e, t, n) {
                    if (!n && "input" === e.nodeName.toLowerCase())return e.defaultValue
                }), ue(function (e) {
                    return null == e.getAttribute("disabled")
                }) || ce(L, function (e, t, n) {
                    var r;
                    if (!n)return !0 === e[t] ? t.toLowerCase() : (r = e.getAttributeNode(t)) && r.specified ? r.value : null
                }), ie
            }(n);
            E.find = C, E.expr = C.selectors, E.expr[":"] = E.expr.pseudos, E.uniqueSort = E.unique = C.uniqueSort, E.text = C.getText, E.isXMLDoc = C.isXML, E.contains = C.contains, E.escapeSelector = C.escape;
            var S = function (e, t, n) {
                for (var r = [], o = void 0 !== n; (e = e[t]) && 9 !== e.nodeType;)if (1 === e.nodeType) {
                    if (o && E(e).is(n))break;
                    r.push(e)
                }
                return r
            }, P = function (e, t) {
                for (var n = []; e; e = e.nextSibling)1 === e.nodeType && e !== t && n.push(e);
                return n
            }, O = E.expr.match.needsContext;

            function j(e, t) {
                return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase()
            }

            var I = /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i;

            function A(e, t, n) {
                return g(t) ? E.grep(e, function (e, r) {
                    return !!t.call(e, r, e) !== n
                }) : t.nodeType ? E.grep(e, function (e) {
                    return e === t !== n
                }) : "string" != typeof t ? E.grep(e, function (e) {
                    return f.call(t, e) > -1 !== n
                }) : E.filter(t, e, n)
            }

            E.filter = function (e, t, n) {
                var r = t[0];
                return n && (e = ":not(" + e + ")"), 1 === t.length && 1 === r.nodeType ? E.find.matchesSelector(r, e) ? [r] : [] : E.find.matches(e, E.grep(t, function (e) {
                    return 1 === e.nodeType
                }))
            }, E.fn.extend({
                find: function (e) {
                    var t, n, r = this.length, o = this;
                    if ("string" != typeof e)return this.pushStack(E(e).filter(function () {
                        for (t = 0; t < r; t++)if (E.contains(o[t], this))return !0
                    }));
                    for (n = this.pushStack([]), t = 0; t < r; t++)E.find(e, o[t], n);
                    return r > 1 ? E.uniqueSort(n) : n
                }, filter: function (e) {
                    return this.pushStack(A(this, e || [], !1))
                }, not: function (e) {
                    return this.pushStack(A(this, e || [], !0))
                }, is: function (e) {
                    return !!A(this, "string" == typeof e && O.test(e) ? E(e) : e || [], !1).length
                }
            });
            var M, N = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/;
            (E.fn.init = function (e, t, n) {
                var r, o;
                if (!e)return this;
                if (n = n || M, "string" == typeof e) {
                    if (!(r = "<" === e[0] && ">" === e[e.length - 1] && e.length >= 3 ? [null, e, null] : N.exec(e)) || !r[1] && t)return !t || t.jquery ? (t || n).find(e) : this.constructor(t).find(e);
                    if (r[1]) {
                        if (t = t instanceof E ? t[0] : t, E.merge(this, E.parseHTML(r[1], t && t.nodeType ? t.ownerDocument || t : a, !0)), I.test(r[1]) && E.isPlainObject(t))for (r in t)g(this[r]) ? this[r](t[r]) : this.attr(r, t[r]);
                        return this
                    }
                    return (o = a.getElementById(r[2])) && (this[0] = o, this.length = 1), this
                }
                return e.nodeType ? (this[0] = e, this.length = 1, this) : g(e) ? void 0 !== n.ready ? n.ready(e) : e(E) : E.makeArray(e, this)
            }).prototype = E.fn, M = E(a);
            var L = /^(?:parents|prev(?:Until|All))/, D = {children: !0, contents: !0, next: !0, prev: !0};

            function R(e, t) {
                for (; (e = e[t]) && 1 !== e.nodeType;);
                return e
            }

            E.fn.extend({
                has: function (e) {
                    var t = E(e, this), n = t.length;
                    return this.filter(function () {
                        for (var e = 0; e < n; e++)if (E.contains(this, t[e]))return !0
                    })
                }, closest: function (e, t) {
                    var n, r = 0, o = this.length, i = [], a = "string" != typeof e && E(e);
                    if (!O.test(e))for (; r < o; r++)for (n = this[r]; n && n !== t; n = n.parentNode)if (n.nodeType < 11 && (a ? a.index(n) > -1 : 1 === n.nodeType && E.find.matchesSelector(n, e))) {
                        i.push(n);
                        break
                    }
                    return this.pushStack(i.length > 1 ? E.uniqueSort(i) : i)
                }, index: function (e) {
                    return e ? "string" == typeof e ? f.call(E(e), this[0]) : f.call(this, e.jquery ? e[0] : e) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
                }, add: function (e, t) {
                    return this.pushStack(E.uniqueSort(E.merge(this.get(), E(e, t))))
                }, addBack: function (e) {
                    return this.add(null == e ? this.prevObject : this.prevObject.filter(e))
                }
            }), E.each({
                parent: function (e) {
                    var t = e.parentNode;
                    return t && 11 !== t.nodeType ? t : null
                }, parents: function (e) {
                    return S(e, "parentNode")
                }, parentsUntil: function (e, t, n) {
                    return S(e, "parentNode", n)
                }, next: function (e) {
                    return R(e, "nextSibling")
                }, prev: function (e) {
                    return R(e, "previousSibling")
                }, nextAll: function (e) {
                    return S(e, "nextSibling")
                }, prevAll: function (e) {
                    return S(e, "previousSibling")
                }, nextUntil: function (e, t, n) {
                    return S(e, "nextSibling", n)
                }, prevUntil: function (e, t, n) {
                    return S(e, "previousSibling", n)
                }, siblings: function (e) {
                    return P((e.parentNode || {}).firstChild, e)
                }, children: function (e) {
                    return P(e.firstChild)
                }, contents: function (e) {
                    return j(e, "iframe") ? e.contentDocument : (j(e, "template") && (e = e.content || e), E.merge([], e.childNodes))
                }
            }, function (e, t) {
                E.fn[e] = function (n, r) {
                    var o = E.map(this, t, n);
                    return "Until" !== e.slice(-5) && (r = n), r && "string" == typeof r && (o = E.filter(r, o)), this.length > 1 && (D[e] || E.uniqueSort(o), L.test(e) && o.reverse()), this.pushStack(o)
                }
            });
            var B = /[^\x20\t\r\n\f]+/g;

            function F(e) {
                return e
            }

            function U(e) {
                throw e
            }

            function q(e, t, n, r) {
                var o;
                try {
                    e && g(o = e.promise) ? o.call(e).done(t).fail(n) : e && g(o = e.then) ? o.call(e, t, n) : t.apply(void 0, [e].slice(r))
                } catch (e) {
                    n.apply(void 0, [e])
                }
            }

            E.Callbacks = function (e) {
                e = "string" == typeof e ? function (e) {
                    var t = {};
                    return E.each(e.match(B) || [], function (e, n) {
                        t[n] = !0
                    }), t
                }(e) : E.extend({}, e);
                var t, n, r, o, i = [], a = [], s = -1, u = function () {
                    for (o = o || e.once, r = t = !0; a.length; s = -1)for (n = a.shift(); ++s < i.length;)!1 === i[s].apply(n[0], n[1]) && e.stopOnFalse && (s = i.length, n = !1);
                    e.memory || (n = !1), t = !1, o && (i = n ? [] : "")
                }, c = {
                    add: function () {
                        return i && (n && !t && (s = i.length - 1, a.push(n)), function t(n) {
                            E.each(n, function (n, r) {
                                g(r) ? e.unique && c.has(r) || i.push(r) : r && r.length && "string" !== x(r) && t(r)
                            })
                        }(arguments), n && !t && u()), this
                    }, remove: function () {
                        return E.each(arguments, function (e, t) {
                            for (var n; (n = E.inArray(t, i, n)) > -1;)i.splice(n, 1), n <= s && s--
                        }), this
                    }, has: function (e) {
                        return e ? E.inArray(e, i) > -1 : i.length > 0
                    }, empty: function () {
                        return i && (i = []), this
                    }, disable: function () {
                        return o = a = [], i = n = "", this
                    }, disabled: function () {
                        return !i
                    }, lock: function () {
                        return o = a = [], n || t || (i = n = ""), this
                    }, locked: function () {
                        return !!o
                    }, fireWith: function (e, n) {
                        return o || (n = [e, (n = n || []).slice ? n.slice() : n], a.push(n), t || u()), this
                    }, fire: function () {
                        return c.fireWith(this, arguments), this
                    }, fired: function () {
                        return !!r
                    }
                };
                return c
            }, E.extend({
                Deferred: function (e) {
                    var t = [["notify", "progress", E.Callbacks("memory"), E.Callbacks("memory"), 2], ["resolve", "done", E.Callbacks("once memory"), E.Callbacks("once memory"), 0, "resolved"], ["reject", "fail", E.Callbacks("once memory"), E.Callbacks("once memory"), 1, "rejected"]], r = "pending", o = {
                        state: function () {
                            return r
                        }, always: function () {
                            return i.done(arguments).fail(arguments), this
                        }, catch: function (e) {
                            return o.then(null, e)
                        }, pipe: function () {
                            var e = arguments;
                            return E.Deferred(function (n) {
                                E.each(t, function (t, r) {
                                    var o = g(e[r[4]]) && e[r[4]];
                                    i[r[1]](function () {
                                        var e = o && o.apply(this, arguments);
                                        e && g(e.promise) ? e.promise().progress(n.notify).done(n.resolve).fail(n.reject) : n[r[0] + "With"](this, o ? [e] : arguments)
                                    })
                                }), e = null
                            }).promise()
                        }, then: function (e, r, o) {
                            var i = 0;

                            function a(e, t, r, o) {
                                return function () {
                                    var s = this, u = arguments, c = function () {
                                        var n, c;
                                        if (!(e < i)) {
                                            if ((n = r.apply(s, u)) === t.promise())throw new TypeError("Thenable self-resolution");
                                            c = n && ("object" == typeof n || "function" == typeof n) && n.then, g(c) ? o ? c.call(n, a(i, t, F, o), a(i, t, U, o)) : (i++, c.call(n, a(i, t, F, o), a(i, t, U, o), a(i, t, F, t.notifyWith))) : (r !== F && (s = void 0, u = [n]), (o || t.resolveWith)(s, u))
                                        }
                                    }, l = o ? c : function () {
                                        try {
                                            c()
                                        } catch (n) {
                                            E.Deferred.exceptionHook && E.Deferred.exceptionHook(n, l.stackTrace), e + 1 >= i && (r !== U && (s = void 0, u = [n]), t.rejectWith(s, u))
                                        }
                                    };
                                    e ? l() : (E.Deferred.getStackHook && (l.stackTrace = E.Deferred.getStackHook()), n.setTimeout(l))
                                }
                            }

                            return E.Deferred(function (n) {
                                t[0][3].add(a(0, n, g(o) ? o : F, n.notifyWith)), t[1][3].add(a(0, n, g(e) ? e : F)), t[2][3].add(a(0, n, g(r) ? r : U))
                            }).promise()
                        }, promise: function (e) {
                            return null != e ? E.extend(e, o) : o
                        }
                    }, i = {};
                    return E.each(t, function (e, n) {
                        var a = n[2], s = n[5];
                        o[n[1]] = a.add, s && a.add(function () {
                            r = s
                        }, t[3 - e][2].disable, t[3 - e][3].disable, t[0][2].lock, t[0][3].lock), a.add(n[3].fire), i[n[0]] = function () {
                            return i[n[0] + "With"](this === i ? void 0 : this, arguments), this
                        }, i[n[0] + "With"] = a.fireWith
                    }), o.promise(i), e && e.call(i, i), i
                }, when: function (e) {
                    var t = arguments.length, n = t, r = Array(n), o = u.call(arguments), i = E.Deferred(), a = function (e) {
                        return function (n) {
                            r[e] = this, o[e] = arguments.length > 1 ? u.call(arguments) : n, --t || i.resolveWith(r, o)
                        }
                    };
                    if (t <= 1 && (q(e, i.done(a(n)).resolve, i.reject, !t), "pending" === i.state() || g(o[n] && o[n].then)))return i.then();
                    for (; n--;)q(o[n], a(n), i.reject);
                    return i.promise()
                }
            });
            var H = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;
            E.Deferred.exceptionHook = function (e, t) {
                n.console && n.console.warn && e && H.test(e.name) && n.console.warn("jQuery.Deferred exception: " + e.message, e.stack, t)
            }, E.readyException = function (e) {
                n.setTimeout(function () {
                    throw e
                })
            };
            var V = E.Deferred();

            function W() {
                a.removeEventListener("DOMContentLoaded", W), n.removeEventListener("load", W), E.ready()
            }

            E.fn.ready = function (e) {
                return V.then(e).catch(function (e) {
                    E.readyException(e)
                }), this
            }, E.extend({
                isReady: !1, readyWait: 1, ready: function (e) {
                    (!0 === e ? --E.readyWait : E.isReady) || (E.isReady = !0, !0 !== e && --E.readyWait > 0 || V.resolveWith(a, [E]))
                }
            }), E.ready.then = V.then, "complete" === a.readyState || "loading" !== a.readyState && !a.documentElement.doScroll ? n.setTimeout(E.ready) : (a.addEventListener("DOMContentLoaded", W), n.addEventListener("load", W));
            var z = function (e, t, n, r, o, i, a) {
                var s = 0, u = e.length, c = null == n;
                if ("object" === x(n))for (s in o = !0, n)z(e, t, s, n[s], !0, i, a); else if (void 0 !== r && (o = !0, g(r) || (a = !0), c && (a ? (t.call(e, r), t = null) : (c = t, t = function (e, t, n) {
                        return c.call(E(e), n)
                    })), t))for (; s < u; s++)t(e[s], n, a ? r : r.call(e[s], s, t(e[s], n)));
                return o ? e : c ? t.call(e) : u ? t(e[0], n) : i
            }, K = /^-ms-/, Y = /-([a-z])/g;

            function X(e, t) {
                return t.toUpperCase()
            }

            function $(e) {
                return e.replace(K, "ms-").replace(Y, X)
            }

            var J = function (e) {
                return 1 === e.nodeType || 9 === e.nodeType || !+e.nodeType
            };

            function G() {
                this.expando = E.expando + G.uid++
            }

            G.uid = 1, G.prototype = {
                cache: function (e) {
                    var t = e[this.expando];
                    return t || (t = {}, J(e) && (e.nodeType ? e[this.expando] = t : Object.defineProperty(e, this.expando, {
                        value: t,
                        configurable: !0
                    }))), t
                }, set: function (e, t, n) {
                    var r, o = this.cache(e);
                    if ("string" == typeof t) o[$(t)] = n; else for (r in t)o[$(r)] = t[r];
                    return o
                }, get: function (e, t) {
                    return void 0 === t ? this.cache(e) : e[this.expando] && e[this.expando][$(t)]
                }, access: function (e, t, n) {
                    return void 0 === t || t && "string" == typeof t && void 0 === n ? this.get(e, t) : (this.set(e, t, n), void 0 !== n ? n : t)
                }, remove: function (e, t) {
                    var n, r = e[this.expando];
                    if (void 0 !== r) {
                        if (void 0 !== t) {
                            n = (t = Array.isArray(t) ? t.map($) : (t = $(t)) in r ? [t] : t.match(B) || []).length;
                            for (; n--;)delete r[t[n]]
                        }
                        (void 0 === t || E.isEmptyObject(r)) && (e.nodeType ? e[this.expando] = void 0 : delete e[this.expando])
                    }
                }, hasData: function (e) {
                    var t = e[this.expando];
                    return void 0 !== t && !E.isEmptyObject(t)
                }
            };
            var Q = new G, Z = new G, ee = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/, te = /[A-Z]/g;

            function ne(e, t, n) {
                var r;
                if (void 0 === n && 1 === e.nodeType)if (r = "data-" + t.replace(te, "-$&").toLowerCase(), "string" == typeof(n = e.getAttribute(r))) {
                    try {
                        n = function (e) {
                            return "true" === e || "false" !== e && ("null" === e ? null : e === +e + "" ? +e : ee.test(e) ? JSON.parse(e) : e)
                        }(n)
                    } catch (e) {
                    }
                    Z.set(e, t, n)
                } else n = void 0;
                return n
            }

            E.extend({
                hasData: function (e) {
                    return Z.hasData(e) || Q.hasData(e)
                }, data: function (e, t, n) {
                    return Z.access(e, t, n)
                }, removeData: function (e, t) {
                    Z.remove(e, t)
                }, _data: function (e, t, n) {
                    return Q.access(e, t, n)
                }, _removeData: function (e, t) {
                    Q.remove(e, t)
                }
            }), E.fn.extend({
                data: function (e, t) {
                    var n, r, o, i = this[0], a = i && i.attributes;
                    if (void 0 === e) {
                        if (this.length && (o = Z.get(i), 1 === i.nodeType && !Q.get(i, "hasDataAttrs"))) {
                            for (n = a.length; n--;)a[n] && 0 === (r = a[n].name).indexOf("data-") && (r = $(r.slice(5)), ne(i, r, o[r]));
                            Q.set(i, "hasDataAttrs", !0)
                        }
                        return o
                    }
                    return "object" == typeof e ? this.each(function () {
                        Z.set(this, e)
                    }) : z(this, function (t) {
                        var n;
                        if (i && void 0 === t)return void 0 !== (n = Z.get(i, e)) ? n : void 0 !== (n = ne(i, e)) ? n : void 0;
                        this.each(function () {
                            Z.set(this, e, t)
                        })
                    }, null, t, arguments.length > 1, null, !0)
                }, removeData: function (e) {
                    return this.each(function () {
                        Z.remove(this, e)
                    })
                }
            }), E.extend({
                queue: function (e, t, n) {
                    var r;
                    if (e)return t = (t || "fx") + "queue", r = Q.get(e, t), n && (!r || Array.isArray(n) ? r = Q.access(e, t, E.makeArray(n)) : r.push(n)), r || []
                }, dequeue: function (e, t) {
                    t = t || "fx";
                    var n = E.queue(e, t), r = n.length, o = n.shift(), i = E._queueHooks(e, t);
                    "inprogress" === o && (o = n.shift(), r--), o && ("fx" === t && n.unshift("inprogress"), delete i.stop, o.call(e, function () {
                        E.dequeue(e, t)
                    }, i)), !r && i && i.empty.fire()
                }, _queueHooks: function (e, t) {
                    var n = t + "queueHooks";
                    return Q.get(e, n) || Q.access(e, n, {
                            empty: E.Callbacks("once memory").add(function () {
                                Q.remove(e, [t + "queue", n])
                            })
                        })
                }
            }), E.fn.extend({
                queue: function (e, t) {
                    var n = 2;
                    return "string" != typeof e && (t = e, e = "fx", n--), arguments.length < n ? E.queue(this[0], e) : void 0 === t ? this : this.each(function () {
                        var n = E.queue(this, e, t);
                        E._queueHooks(this, e), "fx" === e && "inprogress" !== n[0] && E.dequeue(this, e)
                    })
                }, dequeue: function (e) {
                    return this.each(function () {
                        E.dequeue(this, e)
                    })
                }, clearQueue: function (e) {
                    return this.queue(e || "fx", [])
                }, promise: function (e, t) {
                    var n, r = 1, o = E.Deferred(), i = this, a = this.length, s = function () {
                        --r || o.resolveWith(i, [i])
                    };
                    for ("string" != typeof e && (t = e, e = void 0), e = e || "fx"; a--;)(n = Q.get(i[a], e + "queueHooks")) && n.empty && (r++, n.empty.add(s));
                    return s(), o.promise(t)
                }
            });
            var re = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source, oe = new RegExp("^(?:([+-])=|)(" + re + ")([a-z%]*)$", "i"), ie = ["Top", "Right", "Bottom", "Left"], ae = function (e, t) {
                return "none" === (e = t || e).style.display || "" === e.style.display && E.contains(e.ownerDocument, e) && "none" === E.css(e, "display")
            }, se = function (e, t, n, r) {
                var o, i, a = {};
                for (i in t)a[i] = e.style[i], e.style[i] = t[i];
                for (i in o = n.apply(e, r || []), t)e.style[i] = a[i];
                return o
            };

            function ue(e, t, n, r) {
                var o, i, a = 20, s = r ? function () {
                    return r.cur()
                } : function () {
                    return E.css(e, t, "")
                }, u = s(), c = n && n[3] || (E.cssNumber[t] ? "" : "px"), l = (E.cssNumber[t] || "px" !== c && +u) && oe.exec(E.css(e, t));
                if (l && l[3] !== c) {
                    for (u /= 2, c = c || l[3], l = +u || 1; a--;)E.style(e, t, l + c), (1 - i) * (1 - (i = s() / u || .5)) <= 0 && (a = 0), l /= i;
                    l *= 2, E.style(e, t, l + c), n = n || []
                }
                return n && (l = +l || +u || 0, o = n[1] ? l + (n[1] + 1) * n[2] : +n[2], r && (r.unit = c, r.start = l, r.end = o)), o
            }

            var ce = {};

            function le(e) {
                var t, n = e.ownerDocument, r = e.nodeName, o = ce[r];
                return o || (t = n.body.appendChild(n.createElement(r)), o = E.css(t, "display"), t.parentNode.removeChild(t), "none" === o && (o = "block"), ce[r] = o, o)
            }

            function fe(e, t) {
                for (var n, r, o = [], i = 0, a = e.length; i < a; i++)(r = e[i]).style && (n = r.style.display, t ? ("none" === n && (o[i] = Q.get(r, "display") || null, o[i] || (r.style.display = "")), "" === r.style.display && ae(r) && (o[i] = le(r))) : "none" !== n && (o[i] = "none", Q.set(r, "display", n)));
                for (i = 0; i < a; i++)null != o[i] && (e[i].style.display = o[i]);
                return e
            }

            E.fn.extend({
                show: function () {
                    return fe(this, !0)
                }, hide: function () {
                    return fe(this)
                }, toggle: function (e) {
                    return "boolean" == typeof e ? e ? this.show() : this.hide() : this.each(function () {
                        ae(this) ? E(this).show() : E(this).hide()
                    })
                }
            });
            var pe = /^(?:checkbox|radio)$/i, de = /<([a-z][^\/\0>\x20\t\r\n\f]+)/i, he = /^$|^module$|\/(?:java|ecma)script/i, me = {
                option: [1, "<select multiple='multiple'>", "</select>"],
                thead: [1, "<table>", "</table>"],
                col: [2, "<table><colgroup>", "</colgroup></table>"],
                tr: [2, "<table><tbody>", "</tbody></table>"],
                td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
                _default: [0, "", ""]
            };

            function ve(e, t) {
                var n;
                return n = void 0 !== e.getElementsByTagName ? e.getElementsByTagName(t || "*") : void 0 !== e.querySelectorAll ? e.querySelectorAll(t || "*") : [], void 0 === t || t && j(e, t) ? E.merge([e], n) : n
            }

            function ye(e, t) {
                for (var n = 0, r = e.length; n < r; n++)Q.set(e[n], "globalEval", !t || Q.get(t[n], "globalEval"))
            }

            me.optgroup = me.option, me.tbody = me.tfoot = me.colgroup = me.caption = me.thead, me.th = me.td;
            var ge = /<|&#?\w+;/;

            function be(e, t, n, r, o) {
                for (var i, a, s, u, c, l, f = t.createDocumentFragment(), p = [], d = 0, h = e.length; d < h; d++)if ((i = e[d]) || 0 === i)if ("object" === x(i)) E.merge(p, i.nodeType ? [i] : i); else if (ge.test(i)) {
                    for (a = a || f.appendChild(t.createElement("div")), s = (de.exec(i) || ["", ""])[1].toLowerCase(), u = me[s] || me._default, a.innerHTML = u[1] + E.htmlPrefilter(i) + u[2], l = u[0]; l--;)a = a.lastChild;
                    E.merge(p, a.childNodes), (a = f.firstChild).textContent = ""
                } else p.push(t.createTextNode(i));
                for (f.textContent = "", d = 0; i = p[d++];)if (r && E.inArray(i, r) > -1) o && o.push(i); else if (c = E.contains(i.ownerDocument, i), a = ve(f.appendChild(i), "script"), c && ye(a), n)for (l = 0; i = a[l++];)he.test(i.type || "") && n.push(i);
                return f
            }

            !function () {
                var e = a.createDocumentFragment().appendChild(a.createElement("div")), t = a.createElement("input");
                t.setAttribute("type", "radio"), t.setAttribute("checked", "checked"), t.setAttribute("name", "t"), e.appendChild(t), y.checkClone = e.cloneNode(!0).cloneNode(!0).lastChild.checked, e.innerHTML = "<textarea>x</textarea>", y.noCloneChecked = !!e.cloneNode(!0).lastChild.defaultValue
            }();
            var we = a.documentElement, _e = /^key/, xe = /^(?:mouse|pointer|contextmenu|drag|drop)|click/, Ee = /^([^.]*)(?:\.(.+)|)/;

            function ke() {
                return !0
            }

            function Te() {
                return !1
            }

            function Ce() {
                try {
                    return a.activeElement
                } catch (e) {
                }
            }

            function Se(e, t, n, r, o, i) {
                var a, s;
                if ("object" == typeof t) {
                    for (s in"string" != typeof n && (r = r || n, n = void 0), t)Se(e, s, n, r, t[s], i);
                    return e
                }
                if (null == r && null == o ? (o = n, r = n = void 0) : null == o && ("string" == typeof n ? (o = r, r = void 0) : (o = r, r = n, n = void 0)), !1 === o) o = Te; else if (!o)return e;
                return 1 === i && (a = o, (o = function (e) {
                    return E().off(e), a.apply(this, arguments)
                }).guid = a.guid || (a.guid = E.guid++)), e.each(function () {
                    E.event.add(this, t, o, r, n)
                })
            }

            E.event = {
                global: {}, add: function (e, t, n, r, o) {
                    var i, a, s, u, c, l, f, p, d, h, m, v = Q.get(e);
                    if (v)for (n.handler && (n = (i = n).handler, o = i.selector), o && E.find.matchesSelector(we, o), n.guid || (n.guid = E.guid++), (u = v.events) || (u = v.events = {}), (a = v.handle) || (a = v.handle = function (t) {
                        return void 0 !== E && E.event.triggered !== t.type ? E.event.dispatch.apply(e, arguments) : void 0
                    }), c = (t = (t || "").match(B) || [""]).length; c--;)d = m = (s = Ee.exec(t[c]) || [])[1], h = (s[2] || "").split(".").sort(), d && (f = E.event.special[d] || {}, d = (o ? f.delegateType : f.bindType) || d, f = E.event.special[d] || {}, l = E.extend({
                        type: d,
                        origType: m,
                        data: r,
                        handler: n,
                        guid: n.guid,
                        selector: o,
                        needsContext: o && E.expr.match.needsContext.test(o),
                        namespace: h.join(".")
                    }, i), (p = u[d]) || ((p = u[d] = []).delegateCount = 0, f.setup && !1 !== f.setup.call(e, r, h, a) || e.addEventListener && e.addEventListener(d, a)), f.add && (f.add.call(e, l), l.handler.guid || (l.handler.guid = n.guid)), o ? p.splice(p.delegateCount++, 0, l) : p.push(l), E.event.global[d] = !0)
                }, remove: function (e, t, n, r, o) {
                    var i, a, s, u, c, l, f, p, d, h, m, v = Q.hasData(e) && Q.get(e);
                    if (v && (u = v.events)) {
                        for (c = (t = (t || "").match(B) || [""]).length; c--;)if (d = m = (s = Ee.exec(t[c]) || [])[1], h = (s[2] || "").split(".").sort(), d) {
                            for (f = E.event.special[d] || {}, p = u[d = (r ? f.delegateType : f.bindType) || d] || [], s = s[2] && new RegExp("(^|\\.)" + h.join("\\.(?:.*\\.|)") + "(\\.|$)"), a = i = p.length; i--;)l = p[i], !o && m !== l.origType || n && n.guid !== l.guid || s && !s.test(l.namespace) || r && r !== l.selector && ("**" !== r || !l.selector) || (p.splice(i, 1), l.selector && p.delegateCount--, f.remove && f.remove.call(e, l));
                            a && !p.length && (f.teardown && !1 !== f.teardown.call(e, h, v.handle) || E.removeEvent(e, d, v.handle), delete u[d])
                        } else for (d in u)E.event.remove(e, d + t[c], n, r, !0);
                        E.isEmptyObject(u) && Q.remove(e, "handle events")
                    }
                }, dispatch: function (e) {
                    var t, n, r, o, i, a, s = E.event.fix(e), u = new Array(arguments.length), c = (Q.get(this, "events") || {})[s.type] || [], l = E.event.special[s.type] || {};
                    for (u[0] = s, t = 1; t < arguments.length; t++)u[t] = arguments[t];
                    if (s.delegateTarget = this, !l.preDispatch || !1 !== l.preDispatch.call(this, s)) {
                        for (a = E.event.handlers.call(this, s, c), t = 0; (o = a[t++]) && !s.isPropagationStopped();)for (s.currentTarget = o.elem, n = 0; (i = o.handlers[n++]) && !s.isImmediatePropagationStopped();)s.rnamespace && !s.rnamespace.test(i.namespace) || (s.handleObj = i, s.data = i.data, void 0 !== (r = ((E.event.special[i.origType] || {}).handle || i.handler).apply(o.elem, u)) && !1 === (s.result = r) && (s.preventDefault(), s.stopPropagation()));
                        return l.postDispatch && l.postDispatch.call(this, s), s.result
                    }
                }, handlers: function (e, t) {
                    var n, r, o, i, a, s = [], u = t.delegateCount, c = e.target;
                    if (u && c.nodeType && !("click" === e.type && e.button >= 1))for (; c !== this; c = c.parentNode || this)if (1 === c.nodeType && ("click" !== e.type || !0 !== c.disabled)) {
                        for (i = [], a = {}, n = 0; n < u; n++)void 0 === a[o = (r = t[n]).selector + " "] && (a[o] = r.needsContext ? E(o, this).index(c) > -1 : E.find(o, this, null, [c]).length), a[o] && i.push(r);
                        i.length && s.push({elem: c, handlers: i})
                    }
                    return c = this, u < t.length && s.push({elem: c, handlers: t.slice(u)}), s
                }, addProp: function (e, t) {
                    Object.defineProperty(E.Event.prototype, e, {
                        enumerable: !0, configurable: !0, get: g(t) ? function () {
                            if (this.originalEvent)return t(this.originalEvent)
                        } : function () {
                            if (this.originalEvent)return this.originalEvent[e]
                        }, set: function (t) {
                            Object.defineProperty(this, e, {enumerable: !0, configurable: !0, writable: !0, value: t})
                        }
                    })
                }, fix: function (e) {
                    return e[E.expando] ? e : new E.Event(e)
                }, special: {
                    load: {noBubble: !0}, focus: {
                        trigger: function () {
                            if (this !== Ce() && this.focus)return this.focus(), !1
                        }, delegateType: "focusin"
                    }, blur: {
                        trigger: function () {
                            if (this === Ce() && this.blur)return this.blur(), !1
                        }, delegateType: "focusout"
                    }, click: {
                        trigger: function () {
                            if ("checkbox" === this.type && this.click && j(this, "input"))return this.click(), !1
                        }, _default: function (e) {
                            return j(e.target, "a")
                        }
                    }, beforeunload: {
                        postDispatch: function (e) {
                            void 0 !== e.result && e.originalEvent && (e.originalEvent.returnValue = e.result)
                        }
                    }
                }
            }, E.removeEvent = function (e, t, n) {
                e.removeEventListener && e.removeEventListener(t, n)
            }, E.Event = function (e, t) {
                if (!(this instanceof E.Event))return new E.Event(e, t);
                e && e.type ? (this.originalEvent = e, this.type = e.type, this.isDefaultPrevented = e.defaultPrevented || void 0 === e.defaultPrevented && !1 === e.returnValue ? ke : Te, this.target = e.target && 3 === e.target.nodeType ? e.target.parentNode : e.target, this.currentTarget = e.currentTarget, this.relatedTarget = e.relatedTarget) : this.type = e, t && E.extend(this, t), this.timeStamp = e && e.timeStamp || Date.now(), this[E.expando] = !0
            }, E.Event.prototype = {
                constructor: E.Event,
                isDefaultPrevented: Te,
                isPropagationStopped: Te,
                isImmediatePropagationStopped: Te,
                isSimulated: !1,
                preventDefault: function () {
                    var e = this.originalEvent;
                    this.isDefaultPrevented = ke, e && !this.isSimulated && e.preventDefault()
                },
                stopPropagation: function () {
                    var e = this.originalEvent;
                    this.isPropagationStopped = ke, e && !this.isSimulated && e.stopPropagation()
                },
                stopImmediatePropagation: function () {
                    var e = this.originalEvent;
                    this.isImmediatePropagationStopped = ke, e && !this.isSimulated && e.stopImmediatePropagation(), this.stopPropagation()
                }
            }, E.each({
                altKey: !0,
                bubbles: !0,
                cancelable: !0,
                changedTouches: !0,
                ctrlKey: !0,
                detail: !0,
                eventPhase: !0,
                metaKey: !0,
                pageX: !0,
                pageY: !0,
                shiftKey: !0,
                view: !0,
                char: !0,
                charCode: !0,
                key: !0,
                keyCode: !0,
                button: !0,
                buttons: !0,
                clientX: !0,
                clientY: !0,
                offsetX: !0,
                offsetY: !0,
                pointerId: !0,
                pointerType: !0,
                screenX: !0,
                screenY: !0,
                targetTouches: !0,
                toElement: !0,
                touches: !0,
                which: function (e) {
                    var t = e.button;
                    return null == e.which && _e.test(e.type) ? null != e.charCode ? e.charCode : e.keyCode : !e.which && void 0 !== t && xe.test(e.type) ? 1 & t ? 1 : 2 & t ? 3 : 4 & t ? 2 : 0 : e.which
                }
            }, E.event.addProp), E.each({
                mouseenter: "mouseover",
                mouseleave: "mouseout",
                pointerenter: "pointerover",
                pointerleave: "pointerout"
            }, function (e, t) {
                E.event.special[e] = {
                    delegateType: t, bindType: t, handle: function (e) {
                        var n, r = e.relatedTarget, o = e.handleObj;
                        return r && (r === this || E.contains(this, r)) || (e.type = o.origType, n = o.handler.apply(this, arguments), e.type = t), n
                    }
                }
            }), E.fn.extend({
                on: function (e, t, n, r) {
                    return Se(this, e, t, n, r)
                }, one: function (e, t, n, r) {
                    return Se(this, e, t, n, r, 1)
                }, off: function (e, t, n) {
                    var r, o;
                    if (e && e.preventDefault && e.handleObj)return r = e.handleObj, E(e.delegateTarget).off(r.namespace ? r.origType + "." + r.namespace : r.origType, r.selector, r.handler), this;
                    if ("object" == typeof e) {
                        for (o in e)this.off(o, t, e[o]);
                        return this
                    }
                    return !1 !== t && "function" != typeof t || (n = t, t = void 0), !1 === n && (n = Te), this.each(function () {
                        E.event.remove(this, e, n, t)
                    })
                }
            });
            var Pe = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([a-z][^\/\0>\x20\t\r\n\f]*)[^>]*)\/>/gi, Oe = /<script|<style|<link/i, je = /checked\s*(?:[^=]|=\s*.checked.)/i, Ie = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;

            function Ae(e, t) {
                return j(e, "table") && j(11 !== t.nodeType ? t : t.firstChild, "tr") && E(e).children("tbody")[0] || e
            }

            function Me(e) {
                return e.type = (null !== e.getAttribute("type")) + "/" + e.type, e
            }

            function Ne(e) {
                return "true/" === (e.type || "").slice(0, 5) ? e.type = e.type.slice(5) : e.removeAttribute("type"), e
            }

            function Le(e, t) {
                var n, r, o, i, a, s, u, c;
                if (1 === t.nodeType) {
                    if (Q.hasData(e) && (i = Q.access(e), a = Q.set(t, i), c = i.events))for (o in delete a.handle, a.events = {}, c)for (n = 0, r = c[o].length; n < r; n++)E.event.add(t, o, c[o][n]);
                    Z.hasData(e) && (s = Z.access(e), u = E.extend({}, s), Z.set(t, u))
                }
            }

            function De(e, t) {
                var n = t.nodeName.toLowerCase();
                "input" === n && pe.test(e.type) ? t.checked = e.checked : "input" !== n && "textarea" !== n || (t.defaultValue = e.defaultValue)
            }

            function Re(e, t, n, r) {
                t = c.apply([], t);
                var o, i, a, s, u, l, f = 0, p = e.length, d = p - 1, h = t[0], m = g(h);
                if (m || p > 1 && "string" == typeof h && !y.checkClone && je.test(h))return e.each(function (o) {
                    var i = e.eq(o);
                    m && (t[0] = h.call(this, o, i.html())), Re(i, t, n, r)
                });
                if (p && (i = (o = be(t, e[0].ownerDocument, !1, e, r)).firstChild, 1 === o.childNodes.length && (o = i), i || r)) {
                    for (s = (a = E.map(ve(o, "script"), Me)).length; f < p; f++)u = o, f !== d && (u = E.clone(u, !0, !0), s && E.merge(a, ve(u, "script"))), n.call(e[f], u, f);
                    if (s)for (l = a[a.length - 1].ownerDocument, E.map(a, Ne), f = 0; f < s; f++)u = a[f], he.test(u.type || "") && !Q.access(u, "globalEval") && E.contains(l, u) && (u.src && "module" !== (u.type || "").toLowerCase() ? E._evalUrl && E._evalUrl(u.src) : _(u.textContent.replace(Ie, ""), l, u))
                }
                return e
            }

            function Be(e, t, n) {
                for (var r, o = t ? E.filter(t, e) : e, i = 0; null != (r = o[i]); i++)n || 1 !== r.nodeType || E.cleanData(ve(r)), r.parentNode && (n && E.contains(r.ownerDocument, r) && ye(ve(r, "script")), r.parentNode.removeChild(r));
                return e
            }

            E.extend({
                htmlPrefilter: function (e) {
                    return e.replace(Pe, "<$1></$2>")
                }, clone: function (e, t, n) {
                    var r, o, i, a, s = e.cloneNode(!0), u = E.contains(e.ownerDocument, e);
                    if (!(y.noCloneChecked || 1 !== e.nodeType && 11 !== e.nodeType || E.isXMLDoc(e)))for (a = ve(s), r = 0, o = (i = ve(e)).length; r < o; r++)De(i[r], a[r]);
                    if (t)if (n)for (i = i || ve(e), a = a || ve(s), r = 0, o = i.length; r < o; r++)Le(i[r], a[r]); else Le(e, s);
                    return (a = ve(s, "script")).length > 0 && ye(a, !u && ve(e, "script")), s
                }, cleanData: function (e) {
                    for (var t, n, r, o = E.event.special, i = 0; void 0 !== (n = e[i]); i++)if (J(n)) {
                        if (t = n[Q.expando]) {
                            if (t.events)for (r in t.events)o[r] ? E.event.remove(n, r) : E.removeEvent(n, r, t.handle);
                            n[Q.expando] = void 0
                        }
                        n[Z.expando] && (n[Z.expando] = void 0)
                    }
                }
            }), E.fn.extend({
                detach: function (e) {
                    return Be(this, e, !0)
                }, remove: function (e) {
                    return Be(this, e)
                }, text: function (e) {
                    return z(this, function (e) {
                        return void 0 === e ? E.text(this) : this.empty().each(function () {
                            1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || (this.textContent = e)
                        })
                    }, null, e, arguments.length)
                }, append: function () {
                    return Re(this, arguments, function (e) {
                        1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || Ae(this, e).appendChild(e)
                    })
                }, prepend: function () {
                    return Re(this, arguments, function (e) {
                        if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                            var t = Ae(this, e);
                            t.insertBefore(e, t.firstChild)
                        }
                    })
                }, before: function () {
                    return Re(this, arguments, function (e) {
                        this.parentNode && this.parentNode.insertBefore(e, this)
                    })
                }, after: function () {
                    return Re(this, arguments, function (e) {
                        this.parentNode && this.parentNode.insertBefore(e, this.nextSibling)
                    })
                }, empty: function () {
                    for (var e, t = 0; null != (e = this[t]); t++)1 === e.nodeType && (E.cleanData(ve(e, !1)), e.textContent = "");
                    return this
                }, clone: function (e, t) {
                    return e = null != e && e, t = null == t ? e : t, this.map(function () {
                        return E.clone(this, e, t)
                    })
                }, html: function (e) {
                    return z(this, function (e) {
                        var t = this[0] || {}, n = 0, r = this.length;
                        if (void 0 === e && 1 === t.nodeType)return t.innerHTML;
                        if ("string" == typeof e && !Oe.test(e) && !me[(de.exec(e) || ["", ""])[1].toLowerCase()]) {
                            e = E.htmlPrefilter(e);
                            try {
                                for (; n < r; n++)1 === (t = this[n] || {}).nodeType && (E.cleanData(ve(t, !1)), t.innerHTML = e);
                                t = 0
                            } catch (e) {
                            }
                        }
                        t && this.empty().append(e)
                    }, null, e, arguments.length)
                }, replaceWith: function () {
                    var e = [];
                    return Re(this, arguments, function (t) {
                        var n = this.parentNode;
                        E.inArray(this, e) < 0 && (E.cleanData(ve(this)), n && n.replaceChild(t, this))
                    }, e)
                }
            }), E.each({
                appendTo: "append",
                prependTo: "prepend",
                insertBefore: "before",
                insertAfter: "after",
                replaceAll: "replaceWith"
            }, function (e, t) {
                E.fn[e] = function (e) {
                    for (var n, r = [], o = E(e), i = o.length - 1, a = 0; a <= i; a++)n = a === i ? this : this.clone(!0), E(o[a])[t](n), l.apply(r, n.get());
                    return this.pushStack(r)
                }
            });
            var Fe = new RegExp("^(" + re + ")(?!px)[a-z%]+$", "i"), Ue = function (e) {
                var t = e.ownerDocument.defaultView;
                return t && t.opener || (t = n), t.getComputedStyle(e)
            }, qe = new RegExp(ie.join("|"), "i");

            function He(e, t, n) {
                var r, o, i, a, s = e.style;
                return (n = n || Ue(e)) && ("" !== (a = n.getPropertyValue(t) || n[t]) || E.contains(e.ownerDocument, e) || (a = E.style(e, t)), !y.pixelBoxStyles() && Fe.test(a) && qe.test(t) && (r = s.width, o = s.minWidth, i = s.maxWidth, s.minWidth = s.maxWidth = s.width = a, a = n.width, s.width = r, s.minWidth = o, s.maxWidth = i)), void 0 !== a ? a + "" : a
            }

            function Ve(e, t) {
                return {
                    get: function () {
                        if (!e())return (this.get = t).apply(this, arguments);
                        delete this.get
                    }
                }
            }

            !function () {
                function e() {
                    if (l) {
                        c.style.cssText = "position:absolute;left:-11111px;width:60px;margin-top:1px;padding:0;border:0", l.style.cssText = "position:relative;display:block;box-sizing:border-box;overflow:scroll;margin:auto;border:1px;padding:1px;width:60%;top:1%", we.appendChild(c).appendChild(l);
                        var e = n.getComputedStyle(l);
                        r = "1%" !== e.top, u = 12 === t(e.marginLeft), l.style.right = "60%", s = 36 === t(e.right), o = 36 === t(e.width), l.style.position = "absolute", i = 36 === l.offsetWidth || "absolute", we.removeChild(c), l = null
                    }
                }

                function t(e) {
                    return Math.round(parseFloat(e))
                }

                var r, o, i, s, u, c = a.createElement("div"), l = a.createElement("div");
                l.style && (l.style.backgroundClip = "content-box", l.cloneNode(!0).style.backgroundClip = "", y.clearCloneStyle = "content-box" === l.style.backgroundClip, E.extend(y, {
                    boxSizingReliable: function () {
                        return e(), o
                    }, pixelBoxStyles: function () {
                        return e(), s
                    }, pixelPosition: function () {
                        return e(), r
                    }, reliableMarginLeft: function () {
                        return e(), u
                    }, scrollboxSize: function () {
                        return e(), i
                    }
                }))
            }();
            var We = /^(none|table(?!-c[ea]).+)/, ze = /^--/, Ke = {
                position: "absolute",
                visibility: "hidden",
                display: "block"
            }, Ye = {
                letterSpacing: "0",
                fontWeight: "400"
            }, Xe = ["Webkit", "Moz", "ms"], $e = a.createElement("div").style;

            function Je(e) {
                var t = E.cssProps[e];
                return t || (t = E.cssProps[e] = function (e) {
                        if (e in $e)return e;
                        for (var t = e[0].toUpperCase() + e.slice(1), n = Xe.length; n--;)if ((e = Xe[n] + t) in $e)return e
                    }(e) || e), t
            }

            function Ge(e, t, n) {
                var r = oe.exec(t);
                return r ? Math.max(0, r[2] - (n || 0)) + (r[3] || "px") : t
            }

            function Qe(e, t, n, r, o, i) {
                var a = "width" === t ? 1 : 0, s = 0, u = 0;
                if (n === (r ? "border" : "content"))return 0;
                for (; a < 4; a += 2)"margin" === n && (u += E.css(e, n + ie[a], !0, o)), r ? ("content" === n && (u -= E.css(e, "padding" + ie[a], !0, o)), "margin" !== n && (u -= E.css(e, "border" + ie[a] + "Width", !0, o))) : (u += E.css(e, "padding" + ie[a], !0, o), "padding" !== n ? u += E.css(e, "border" + ie[a] + "Width", !0, o) : s += E.css(e, "border" + ie[a] + "Width", !0, o));
                return !r && i >= 0 && (u += Math.max(0, Math.ceil(e["offset" + t[0].toUpperCase() + t.slice(1)] - i - u - s - .5))), u
            }

            function Ze(e, t, n) {
                var r = Ue(e), o = He(e, t, r), i = "border-box" === E.css(e, "boxSizing", !1, r), a = i;
                if (Fe.test(o)) {
                    if (!n)return o;
                    o = "auto"
                }
                return a = a && (y.boxSizingReliable() || o === e.style[t]), ("auto" === o || !parseFloat(o) && "inline" === E.css(e, "display", !1, r)) && (o = e["offset" + t[0].toUpperCase() + t.slice(1)], a = !0), (o = parseFloat(o) || 0) + Qe(e, t, n || (i ? "border" : "content"), a, r, o) + "px"
            }

            function et(e, t, n, r, o) {
                return new et.prototype.init(e, t, n, r, o)
            }

            E.extend({
                cssHooks: {
                    opacity: {
                        get: function (e, t) {
                            if (t) {
                                var n = He(e, "opacity");
                                return "" === n ? "1" : n
                            }
                        }
                    }
                },
                cssNumber: {
                    animationIterationCount: !0,
                    columnCount: !0,
                    fillOpacity: !0,
                    flexGrow: !0,
                    flexShrink: !0,
                    fontWeight: !0,
                    lineHeight: !0,
                    opacity: !0,
                    order: !0,
                    orphans: !0,
                    widows: !0,
                    zIndex: !0,
                    zoom: !0
                },
                cssProps: {},
                style: function (e, t, n, r) {
                    if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
                        var o, i, a, s = $(t), u = ze.test(t), c = e.style;
                        if (u || (t = Je(s)), a = E.cssHooks[t] || E.cssHooks[s], void 0 === n)return a && "get" in a && void 0 !== (o = a.get(e, !1, r)) ? o : c[t];
                        "string" === (i = typeof n) && (o = oe.exec(n)) && o[1] && (n = ue(e, t, o), i = "number"), null != n && n == n && ("number" === i && (n += o && o[3] || (E.cssNumber[s] ? "" : "px")), y.clearCloneStyle || "" !== n || 0 !== t.indexOf("background") || (c[t] = "inherit"), a && "set" in a && void 0 === (n = a.set(e, n, r)) || (u ? c.setProperty(t, n) : c[t] = n))
                    }
                },
                css: function (e, t, n, r) {
                    var o, i, a, s = $(t);
                    return ze.test(t) || (t = Je(s)), (a = E.cssHooks[t] || E.cssHooks[s]) && "get" in a && (o = a.get(e, !0, n)), void 0 === o && (o = He(e, t, r)), "normal" === o && t in Ye && (o = Ye[t]), "" === n || n ? (i = parseFloat(o), !0 === n || isFinite(i) ? i || 0 : o) : o
                }
            }), E.each(["height", "width"], function (e, t) {
                E.cssHooks[t] = {
                    get: function (e, n, r) {
                        if (n)return !We.test(E.css(e, "display")) || e.getClientRects().length && e.getBoundingClientRect().width ? Ze(e, t, r) : se(e, Ke, function () {
                            return Ze(e, t, r)
                        })
                    }, set: function (e, n, r) {
                        var o, i = Ue(e), a = "border-box" === E.css(e, "boxSizing", !1, i), s = r && Qe(e, t, r, a, i);
                        return a && y.scrollboxSize() === i.position && (s -= Math.ceil(e["offset" + t[0].toUpperCase() + t.slice(1)] - parseFloat(i[t]) - Qe(e, t, "border", !1, i) - .5)), s && (o = oe.exec(n)) && "px" !== (o[3] || "px") && (e.style[t] = n, n = E.css(e, t)), Ge(0, n, s)
                    }
                }
            }), E.cssHooks.marginLeft = Ve(y.reliableMarginLeft, function (e, t) {
                if (t)return (parseFloat(He(e, "marginLeft")) || e.getBoundingClientRect().left - se(e, {marginLeft: 0}, function () {
                        return e.getBoundingClientRect().left
                    })) + "px"
            }), E.each({margin: "", padding: "", border: "Width"}, function (e, t) {
                E.cssHooks[e + t] = {
                    expand: function (n) {
                        for (var r = 0, o = {}, i = "string" == typeof n ? n.split(" ") : [n]; r < 4; r++)o[e + ie[r] + t] = i[r] || i[r - 2] || i[0];
                        return o
                    }
                }, "margin" !== e && (E.cssHooks[e + t].set = Ge)
            }), E.fn.extend({
                css: function (e, t) {
                    return z(this, function (e, t, n) {
                        var r, o, i = {}, a = 0;
                        if (Array.isArray(t)) {
                            for (r = Ue(e), o = t.length; a < o; a++)i[t[a]] = E.css(e, t[a], !1, r);
                            return i
                        }
                        return void 0 !== n ? E.style(e, t, n) : E.css(e, t)
                    }, e, t, arguments.length > 1)
                }
            }), E.Tween = et, et.prototype = {
                constructor: et, init: function (e, t, n, r, o, i) {
                    this.elem = e, this.prop = n, this.easing = o || E.easing._default, this.options = t, this.start = this.now = this.cur(), this.end = r, this.unit = i || (E.cssNumber[n] ? "" : "px")
                }, cur: function () {
                    var e = et.propHooks[this.prop];
                    return e && e.get ? e.get(this) : et.propHooks._default.get(this)
                }, run: function (e) {
                    var t, n = et.propHooks[this.prop];
                    return this.options.duration ? this.pos = t = E.easing[this.easing](e, this.options.duration * e, 0, 1, this.options.duration) : this.pos = t = e, this.now = (this.end - this.start) * t + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), n && n.set ? n.set(this) : et.propHooks._default.set(this), this
                }
            }, et.prototype.init.prototype = et.prototype, et.propHooks = {
                _default: {
                    get: function (e) {
                        var t;
                        return 1 !== e.elem.nodeType || null != e.elem[e.prop] && null == e.elem.style[e.prop] ? e.elem[e.prop] : (t = E.css(e.elem, e.prop, "")) && "auto" !== t ? t : 0
                    }, set: function (e) {
                        E.fx.step[e.prop] ? E.fx.step[e.prop](e) : 1 !== e.elem.nodeType || null == e.elem.style[E.cssProps[e.prop]] && !E.cssHooks[e.prop] ? e.elem[e.prop] = e.now : E.style(e.elem, e.prop, e.now + e.unit)
                    }
                }
            }, et.propHooks.scrollTop = et.propHooks.scrollLeft = {
                set: function (e) {
                    e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now)
                }
            }, E.easing = {
                linear: function (e) {
                    return e
                }, swing: function (e) {
                    return .5 - Math.cos(e * Math.PI) / 2
                }, _default: "swing"
            }, E.fx = et.prototype.init, E.fx.step = {};
            var tt, nt, rt = /^(?:toggle|show|hide)$/, ot = /queueHooks$/;

            function it() {
                nt && (!1 === a.hidden && n.requestAnimationFrame ? n.requestAnimationFrame(it) : n.setTimeout(it, E.fx.interval), E.fx.tick())
            }

            function at() {
                return n.setTimeout(function () {
                    tt = void 0
                }), tt = Date.now()
            }

            function st(e, t) {
                var n, r = 0, o = {height: e};
                for (t = t ? 1 : 0; r < 4; r += 2 - t)o["margin" + (n = ie[r])] = o["padding" + n] = e;
                return t && (o.opacity = o.width = e), o
            }

            function ut(e, t, n) {
                for (var r, o = (ct.tweeners[t] || []).concat(ct.tweeners["*"]), i = 0, a = o.length; i < a; i++)if (r = o[i].call(n, t, e))return r
            }

            function ct(e, t, n) {
                var r, o, i = 0, a = ct.prefilters.length, s = E.Deferred().always(function () {
                    delete u.elem
                }), u = function () {
                    if (o)return !1;
                    for (var t = tt || at(), n = Math.max(0, c.startTime + c.duration - t), r = 1 - (n / c.duration || 0), i = 0, a = c.tweens.length; i < a; i++)c.tweens[i].run(r);
                    return s.notifyWith(e, [c, r, n]), r < 1 && a ? n : (a || s.notifyWith(e, [c, 1, 0]), s.resolveWith(e, [c]), !1)
                }, c = s.promise({
                    elem: e,
                    props: E.extend({}, t),
                    opts: E.extend(!0, {specialEasing: {}, easing: E.easing._default}, n),
                    originalProperties: t,
                    originalOptions: n,
                    startTime: tt || at(),
                    duration: n.duration,
                    tweens: [],
                    createTween: function (t, n) {
                        var r = E.Tween(e, c.opts, t, n, c.opts.specialEasing[t] || c.opts.easing);
                        return c.tweens.push(r), r
                    },
                    stop: function (t) {
                        var n = 0, r = t ? c.tweens.length : 0;
                        if (o)return this;
                        for (o = !0; n < r; n++)c.tweens[n].run(1);
                        return t ? (s.notifyWith(e, [c, 1, 0]), s.resolveWith(e, [c, t])) : s.rejectWith(e, [c, t]), this
                    }
                }), l = c.props;
                for (!function (e, t) {
                    var n, r, o, i, a;
                    for (n in e)if (o = t[r = $(n)], i = e[n], Array.isArray(i) && (o = i[1], i = e[n] = i[0]), n !== r && (e[r] = i, delete e[n]), (a = E.cssHooks[r]) && "expand" in a)for (n in i = a.expand(i), delete e[r], i)n in e || (e[n] = i[n], t[n] = o); else t[r] = o
                }(l, c.opts.specialEasing); i < a; i++)if (r = ct.prefilters[i].call(c, e, l, c.opts))return g(r.stop) && (E._queueHooks(c.elem, c.opts.queue).stop = r.stop.bind(r)), r;
                return E.map(l, ut, c), g(c.opts.start) && c.opts.start.call(e, c), c.progress(c.opts.progress).done(c.opts.done, c.opts.complete).fail(c.opts.fail).always(c.opts.always), E.fx.timer(E.extend(u, {
                    elem: e,
                    anim: c,
                    queue: c.opts.queue
                })), c
            }

            E.Animation = E.extend(ct, {
                tweeners: {
                    "*": [function (e, t) {
                        var n = this.createTween(e, t);
                        return ue(n.elem, e, oe.exec(t), n), n
                    }]
                }, tweener: function (e, t) {
                    g(e) ? (t = e, e = ["*"]) : e = e.match(B);
                    for (var n, r = 0, o = e.length; r < o; r++)n = e[r], ct.tweeners[n] = ct.tweeners[n] || [], ct.tweeners[n].unshift(t)
                }, prefilters: [function (e, t, n) {
                    var r, o, i, a, s, u, c, l, f = "width" in t || "height" in t, p = this, d = {}, h = e.style, m = e.nodeType && ae(e), v = Q.get(e, "fxshow");
                    for (r in n.queue || (null == (a = E._queueHooks(e, "fx")).unqueued && (a.unqueued = 0, s = a.empty.fire, a.empty.fire = function () {
                        a.unqueued || s()
                    }), a.unqueued++, p.always(function () {
                        p.always(function () {
                            a.unqueued--, E.queue(e, "fx").length || a.empty.fire()
                        })
                    })), t)if (o = t[r], rt.test(o)) {
                        if (delete t[r], i = i || "toggle" === o, o === (m ? "hide" : "show")) {
                            if ("show" !== o || !v || void 0 === v[r])continue;
                            m = !0
                        }
                        d[r] = v && v[r] || E.style(e, r)
                    }
                    if ((u = !E.isEmptyObject(t)) || !E.isEmptyObject(d))for (r in f && 1 === e.nodeType && (n.overflow = [h.overflow, h.overflowX, h.overflowY], null == (c = v && v.display) && (c = Q.get(e, "display")), "none" === (l = E.css(e, "display")) && (c ? l = c : (fe([e], !0), c = e.style.display || c, l = E.css(e, "display"), fe([e]))), ("inline" === l || "inline-block" === l && null != c) && "none" === E.css(e, "float") && (u || (p.done(function () {
                        h.display = c
                    }), null == c && (l = h.display, c = "none" === l ? "" : l)), h.display = "inline-block")), n.overflow && (h.overflow = "hidden", p.always(function () {
                        h.overflow = n.overflow[0], h.overflowX = n.overflow[1], h.overflowY = n.overflow[2]
                    })), u = !1, d)u || (v ? "hidden" in v && (m = v.hidden) : v = Q.access(e, "fxshow", {display: c}), i && (v.hidden = !m), m && fe([e], !0), p.done(function () {
                        for (r in m || fe([e]), Q.remove(e, "fxshow"), d)E.style(e, r, d[r])
                    })), u = ut(m ? v[r] : 0, r, p), r in v || (v[r] = u.start, m && (u.end = u.start, u.start = 0))
                }], prefilter: function (e, t) {
                    t ? ct.prefilters.unshift(e) : ct.prefilters.push(e)
                }
            }), E.speed = function (e, t, n) {
                var r = e && "object" == typeof e ? E.extend({}, e) : {
                    complete: n || !n && t || g(e) && e,
                    duration: e,
                    easing: n && t || t && !g(t) && t
                };
                return E.fx.off ? r.duration = 0 : "number" != typeof r.duration && (r.duration in E.fx.speeds ? r.duration = E.fx.speeds[r.duration] : r.duration = E.fx.speeds._default), null != r.queue && !0 !== r.queue || (r.queue = "fx"), r.old = r.complete, r.complete = function () {
                    g(r.old) && r.old.call(this), r.queue && E.dequeue(this, r.queue)
                }, r
            }, E.fn.extend({
                fadeTo: function (e, t, n, r) {
                    return this.filter(ae).css("opacity", 0).show().end().animate({opacity: t}, e, n, r)
                }, animate: function (e, t, n, r) {
                    var o = E.isEmptyObject(e), i = E.speed(t, n, r), a = function () {
                        var t = ct(this, E.extend({}, e), i);
                        (o || Q.get(this, "finish")) && t.stop(!0)
                    };
                    return a.finish = a, o || !1 === i.queue ? this.each(a) : this.queue(i.queue, a)
                }, stop: function (e, t, n) {
                    var r = function (e) {
                        var t = e.stop;
                        delete e.stop, t(n)
                    };
                    return "string" != typeof e && (n = t, t = e, e = void 0), t && !1 !== e && this.queue(e || "fx", []), this.each(function () {
                        var t = !0, o = null != e && e + "queueHooks", i = E.timers, a = Q.get(this);
                        if (o) a[o] && a[o].stop && r(a[o]); else for (o in a)a[o] && a[o].stop && ot.test(o) && r(a[o]);
                        for (o = i.length; o--;)i[o].elem !== this || null != e && i[o].queue !== e || (i[o].anim.stop(n), t = !1, i.splice(o, 1));
                        !t && n || E.dequeue(this, e)
                    })
                }, finish: function (e) {
                    return !1 !== e && (e = e || "fx"), this.each(function () {
                        var t, n = Q.get(this), r = n[e + "queue"], o = n[e + "queueHooks"], i = E.timers, a = r ? r.length : 0;
                        for (n.finish = !0, E.queue(this, e, []), o && o.stop && o.stop.call(this, !0), t = i.length; t--;)i[t].elem === this && i[t].queue === e && (i[t].anim.stop(!0), i.splice(t, 1));
                        for (t = 0; t < a; t++)r[t] && r[t].finish && r[t].finish.call(this);
                        delete n.finish
                    })
                }
            }), E.each(["toggle", "show", "hide"], function (e, t) {
                var n = E.fn[t];
                E.fn[t] = function (e, r, o) {
                    return null == e || "boolean" == typeof e ? n.apply(this, arguments) : this.animate(st(t, !0), e, r, o)
                }
            }), E.each({
                slideDown: st("show"),
                slideUp: st("hide"),
                slideToggle: st("toggle"),
                fadeIn: {opacity: "show"},
                fadeOut: {opacity: "hide"},
                fadeToggle: {opacity: "toggle"}
            }, function (e, t) {
                E.fn[e] = function (e, n, r) {
                    return this.animate(t, e, n, r)
                }
            }), E.timers = [], E.fx.tick = function () {
                var e, t = 0, n = E.timers;
                for (tt = Date.now(); t < n.length; t++)(e = n[t])() || n[t] !== e || n.splice(t--, 1);
                n.length || E.fx.stop(), tt = void 0
            }, E.fx.timer = function (e) {
                E.timers.push(e), E.fx.start()
            }, E.fx.interval = 13, E.fx.start = function () {
                nt || (nt = !0, it())
            }, E.fx.stop = function () {
                nt = null
            }, E.fx.speeds = {slow: 600, fast: 200, _default: 400}, E.fn.delay = function (e, t) {
                return e = E.fx && E.fx.speeds[e] || e, t = t || "fx", this.queue(t, function (t, r) {
                    var o = n.setTimeout(t, e);
                    r.stop = function () {
                        n.clearTimeout(o)
                    }
                })
            }, function () {
                var e = a.createElement("input"), t = a.createElement("select").appendChild(a.createElement("option"));
                e.type = "checkbox", y.checkOn = "" !== e.value, y.optSelected = t.selected, (e = a.createElement("input")).value = "t", e.type = "radio", y.radioValue = "t" === e.value
            }();
            var lt, ft = E.expr.attrHandle;
            E.fn.extend({
                attr: function (e, t) {
                    return z(this, E.attr, e, t, arguments.length > 1)
                }, removeAttr: function (e) {
                    return this.each(function () {
                        E.removeAttr(this, e)
                    })
                }
            }), E.extend({
                attr: function (e, t, n) {
                    var r, o, i = e.nodeType;
                    if (3 !== i && 8 !== i && 2 !== i)return void 0 === e.getAttribute ? E.prop(e, t, n) : (1 === i && E.isXMLDoc(e) || (o = E.attrHooks[t.toLowerCase()] || (E.expr.match.bool.test(t) ? lt : void 0)), void 0 !== n ? null === n ? void E.removeAttr(e, t) : o && "set" in o && void 0 !== (r = o.set(e, n, t)) ? r : (e.setAttribute(t, n + ""), n) : o && "get" in o && null !== (r = o.get(e, t)) ? r : null == (r = E.find.attr(e, t)) ? void 0 : r)
                }, attrHooks: {
                    type: {
                        set: function (e, t) {
                            if (!y.radioValue && "radio" === t && j(e, "input")) {
                                var n = e.value;
                                return e.setAttribute("type", t), n && (e.value = n), t
                            }
                        }
                    }
                }, removeAttr: function (e, t) {
                    var n, r = 0, o = t && t.match(B);
                    if (o && 1 === e.nodeType)for (; n = o[r++];)e.removeAttribute(n)
                }
            }), lt = {
                set: function (e, t, n) {
                    return !1 === t ? E.removeAttr(e, n) : e.setAttribute(n, n), n
                }
            }, E.each(E.expr.match.bool.source.match(/\w+/g), function (e, t) {
                var n = ft[t] || E.find.attr;
                ft[t] = function (e, t, r) {
                    var o, i, a = t.toLowerCase();
                    return r || (i = ft[a], ft[a] = o, o = null != n(e, t, r) ? a : null, ft[a] = i), o
                }
            });
            var pt = /^(?:input|select|textarea|button)$/i, dt = /^(?:a|area)$/i;

            function ht(e) {
                return (e.match(B) || []).join(" ")
            }

            function mt(e) {
                return e.getAttribute && e.getAttribute("class") || ""
            }

            function vt(e) {
                return Array.isArray(e) ? e : "string" == typeof e && e.match(B) || []
            }

            E.fn.extend({
                prop: function (e, t) {
                    return z(this, E.prop, e, t, arguments.length > 1)
                }, removeProp: function (e) {
                    return this.each(function () {
                        delete this[E.propFix[e] || e]
                    })
                }
            }), E.extend({
                prop: function (e, t, n) {
                    var r, o, i = e.nodeType;
                    if (3 !== i && 8 !== i && 2 !== i)return 1 === i && E.isXMLDoc(e) || (t = E.propFix[t] || t, o = E.propHooks[t]), void 0 !== n ? o && "set" in o && void 0 !== (r = o.set(e, n, t)) ? r : e[t] = n : o && "get" in o && null !== (r = o.get(e, t)) ? r : e[t]
                }, propHooks: {
                    tabIndex: {
                        get: function (e) {
                            var t = E.find.attr(e, "tabindex");
                            return t ? parseInt(t, 10) : pt.test(e.nodeName) || dt.test(e.nodeName) && e.href ? 0 : -1
                        }
                    }
                }, propFix: {for: "htmlFor", class: "className"}
            }), y.optSelected || (E.propHooks.selected = {
                get: function (e) {
                    var t = e.parentNode;
                    return t && t.parentNode && t.parentNode.selectedIndex, null
                }, set: function (e) {
                    var t = e.parentNode;
                    t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex)
                }
            }), E.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function () {
                E.propFix[this.toLowerCase()] = this
            }), E.fn.extend({
                addClass: function (e) {
                    var t, n, r, o, i, a, s, u = 0;
                    if (g(e))return this.each(function (t) {
                        E(this).addClass(e.call(this, t, mt(this)))
                    });
                    if ((t = vt(e)).length)for (; n = this[u++];)if (o = mt(n), r = 1 === n.nodeType && " " + ht(o) + " ") {
                        for (a = 0; i = t[a++];)r.indexOf(" " + i + " ") < 0 && (r += i + " ");
                        o !== (s = ht(r)) && n.setAttribute("class", s)
                    }
                    return this
                }, removeClass: function (e) {
                    var t, n, r, o, i, a, s, u = 0;
                    if (g(e))return this.each(function (t) {
                        E(this).removeClass(e.call(this, t, mt(this)))
                    });
                    if (!arguments.length)return this.attr("class", "");
                    if ((t = vt(e)).length)for (; n = this[u++];)if (o = mt(n), r = 1 === n.nodeType && " " + ht(o) + " ") {
                        for (a = 0; i = t[a++];)for (; r.indexOf(" " + i + " ") > -1;)r = r.replace(" " + i + " ", " ");
                        o !== (s = ht(r)) && n.setAttribute("class", s)
                    }
                    return this
                }, toggleClass: function (e, t) {
                    var n = typeof e, r = "string" === n || Array.isArray(e);
                    return "boolean" == typeof t && r ? t ? this.addClass(e) : this.removeClass(e) : g(e) ? this.each(function (n) {
                        E(this).toggleClass(e.call(this, n, mt(this), t), t)
                    }) : this.each(function () {
                        var t, o, i, a;
                        if (r)for (o = 0, i = E(this), a = vt(e); t = a[o++];)i.hasClass(t) ? i.removeClass(t) : i.addClass(t); else void 0 !== e && "boolean" !== n || ((t = mt(this)) && Q.set(this, "__className__", t), this.setAttribute && this.setAttribute("class", t || !1 === e ? "" : Q.get(this, "__className__") || ""))
                    })
                }, hasClass: function (e) {
                    var t, n, r = 0;
                    for (t = " " + e + " "; n = this[r++];)if (1 === n.nodeType && (" " + ht(mt(n)) + " ").indexOf(t) > -1)return !0;
                    return !1
                }
            });
            var yt = /\r/g;
            E.fn.extend({
                val: function (e) {
                    var t, n, r, o = this[0];
                    return arguments.length ? (r = g(e), this.each(function (n) {
                        var o;
                        1 === this.nodeType && (null == (o = r ? e.call(this, n, E(this).val()) : e) ? o = "" : "number" == typeof o ? o += "" : Array.isArray(o) && (o = E.map(o, function (e) {
                            return null == e ? "" : e + ""
                        })), (t = E.valHooks[this.type] || E.valHooks[this.nodeName.toLowerCase()]) && "set" in t && void 0 !== t.set(this, o, "value") || (this.value = o))
                    })) : o ? (t = E.valHooks[o.type] || E.valHooks[o.nodeName.toLowerCase()]) && "get" in t && void 0 !== (n = t.get(o, "value")) ? n : "string" == typeof(n = o.value) ? n.replace(yt, "") : null == n ? "" : n : void 0
                }
            }), E.extend({
                valHooks: {
                    option: {
                        get: function (e) {
                            var t = E.find.attr(e, "value");
                            return null != t ? t : ht(E.text(e))
                        }
                    }, select: {
                        get: function (e) {
                            var t, n, r, o = e.options, i = e.selectedIndex, a = "select-one" === e.type, s = a ? null : [], u = a ? i + 1 : o.length;
                            for (r = i < 0 ? u : a ? i : 0; r < u; r++)if (((n = o[r]).selected || r === i) && !n.disabled && (!n.parentNode.disabled || !j(n.parentNode, "optgroup"))) {
                                if (t = E(n).val(), a)return t;
                                s.push(t)
                            }
                            return s
                        }, set: function (e, t) {
                            for (var n, r, o = e.options, i = E.makeArray(t), a = o.length; a--;)((r = o[a]).selected = E.inArray(E.valHooks.option.get(r), i) > -1) && (n = !0);
                            return n || (e.selectedIndex = -1), i
                        }
                    }
                }
            }), E.each(["radio", "checkbox"], function () {
                E.valHooks[this] = {
                    set: function (e, t) {
                        if (Array.isArray(t))return e.checked = E.inArray(E(e).val(), t) > -1
                    }
                }, y.checkOn || (E.valHooks[this].get = function (e) {
                    return null === e.getAttribute("value") ? "on" : e.value
                })
            }), y.focusin = "onfocusin" in n;
            var gt = /^(?:focusinfocus|focusoutblur)$/, bt = function (e) {
                e.stopPropagation()
            };
            E.extend(E.event, {
                trigger: function (e, t, r, o) {
                    var i, s, u, c, l, f, p, d, m = [r || a], v = h.call(e, "type") ? e.type : e, y = h.call(e, "namespace") ? e.namespace.split(".") : [];
                    if (s = d = u = r = r || a, 3 !== r.nodeType && 8 !== r.nodeType && !gt.test(v + E.event.triggered) && (v.indexOf(".") > -1 && (v = (y = v.split(".")).shift(), y.sort()), l = v.indexOf(":") < 0 && "on" + v, (e = e[E.expando] ? e : new E.Event(v, "object" == typeof e && e)).isTrigger = o ? 2 : 3, e.namespace = y.join("."), e.rnamespace = e.namespace ? new RegExp("(^|\\.)" + y.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, e.result = void 0, e.target || (e.target = r), t = null == t ? [e] : E.makeArray(t, [e]), p = E.event.special[v] || {}, o || !p.trigger || !1 !== p.trigger.apply(r, t))) {
                        if (!o && !p.noBubble && !b(r)) {
                            for (c = p.delegateType || v, gt.test(c + v) || (s = s.parentNode); s; s = s.parentNode)m.push(s), u = s;
                            u === (r.ownerDocument || a) && m.push(u.defaultView || u.parentWindow || n)
                        }
                        for (i = 0; (s = m[i++]) && !e.isPropagationStopped();)d = s, e.type = i > 1 ? c : p.bindType || v, (f = (Q.get(s, "events") || {})[e.type] && Q.get(s, "handle")) && f.apply(s, t), (f = l && s[l]) && f.apply && J(s) && (e.result = f.apply(s, t), !1 === e.result && e.preventDefault());
                        return e.type = v, o || e.isDefaultPrevented() || p._default && !1 !== p._default.apply(m.pop(), t) || !J(r) || l && g(r[v]) && !b(r) && ((u = r[l]) && (r[l] = null), E.event.triggered = v, e.isPropagationStopped() && d.addEventListener(v, bt), r[v](), e.isPropagationStopped() && d.removeEventListener(v, bt), E.event.triggered = void 0, u && (r[l] = u)), e.result
                    }
                }, simulate: function (e, t, n) {
                    var r = E.extend(new E.Event, n, {type: e, isSimulated: !0});
                    E.event.trigger(r, null, t)
                }
            }), E.fn.extend({
                trigger: function (e, t) {
                    return this.each(function () {
                        E.event.trigger(e, t, this)
                    })
                }, triggerHandler: function (e, t) {
                    var n = this[0];
                    if (n)return E.event.trigger(e, t, n, !0)
                }
            }), y.focusin || E.each({focus: "focusin", blur: "focusout"}, function (e, t) {
                var n = function (e) {
                    E.event.simulate(t, e.target, E.event.fix(e))
                };
                E.event.special[t] = {
                    setup: function () {
                        var r = this.ownerDocument || this, o = Q.access(r, t);
                        o || r.addEventListener(e, n, !0), Q.access(r, t, (o || 0) + 1)
                    }, teardown: function () {
                        var r = this.ownerDocument || this, o = Q.access(r, t) - 1;
                        o ? Q.access(r, t, o) : (r.removeEventListener(e, n, !0), Q.remove(r, t))
                    }
                }
            });
            var wt = n.location, _t = Date.now(), xt = /\?/;
            E.parseXML = function (e) {
                var t;
                if (!e || "string" != typeof e)return null;
                try {
                    t = (new n.DOMParser).parseFromString(e, "text/xml")
                } catch (e) {
                    t = void 0
                }
                return t && !t.getElementsByTagName("parsererror").length || E.error("Invalid XML: " + e), t
            };
            var Et = /\[\]$/, kt = /\r?\n/g, Tt = /^(?:submit|button|image|reset|file)$/i, Ct = /^(?:input|select|textarea|keygen)/i;

            function St(e, t, n, r) {
                var o;
                if (Array.isArray(t)) E.each(t, function (t, o) {
                    n || Et.test(e) ? r(e, o) : St(e + "[" + ("object" == typeof o && null != o ? t : "") + "]", o, n, r)
                }); else if (n || "object" !== x(t)) r(e, t); else for (o in t)St(e + "[" + o + "]", t[o], n, r)
            }

            E.param = function (e, t) {
                var n, r = [], o = function (e, t) {
                    var n = g(t) ? t() : t;
                    r[r.length] = encodeURIComponent(e) + "=" + encodeURIComponent(null == n ? "" : n)
                };
                if (Array.isArray(e) || e.jquery && !E.isPlainObject(e)) E.each(e, function () {
                    o(this.name, this.value)
                }); else for (n in e)St(n, e[n], t, o);
                return r.join("&")
            }, E.fn.extend({
                serialize: function () {
                    return E.param(this.serializeArray())
                }, serializeArray: function () {
                    return this.map(function () {
                        var e = E.prop(this, "elements");
                        return e ? E.makeArray(e) : this
                    }).filter(function () {
                        var e = this.type;
                        return this.name && !E(this).is(":disabled") && Ct.test(this.nodeName) && !Tt.test(e) && (this.checked || !pe.test(e))
                    }).map(function (e, t) {
                        var n = E(this).val();
                        return null == n ? null : Array.isArray(n) ? E.map(n, function (e) {
                            return {name: t.name, value: e.replace(kt, "\r\n")}
                        }) : {name: t.name, value: n.replace(kt, "\r\n")}
                    }).get()
                }
            });
            var Pt = /%20/g, Ot = /#.*$/, jt = /([?&])_=[^&]*/, It = /^(.*?):[ \t]*([^\r\n]*)$/gm, At = /^(?:GET|HEAD)$/, Mt = /^\/\//, Nt = {}, Lt = {}, Dt = "*/".concat("*"), Rt = a.createElement("a");

            function Bt(e) {
                return function (t, n) {
                    "string" != typeof t && (n = t, t = "*");
                    var r, o = 0, i = t.toLowerCase().match(B) || [];
                    if (g(n))for (; r = i[o++];)"+" === r[0] ? (r = r.slice(1) || "*", (e[r] = e[r] || []).unshift(n)) : (e[r] = e[r] || []).push(n)
                }
            }

            function Ft(e, t, n, r) {
                var o = {}, i = e === Lt;

                function a(s) {
                    var u;
                    return o[s] = !0, E.each(e[s] || [], function (e, s) {
                        var c = s(t, n, r);
                        return "string" != typeof c || i || o[c] ? i ? !(u = c) : void 0 : (t.dataTypes.unshift(c), a(c), !1)
                    }), u
                }

                return a(t.dataTypes[0]) || !o["*"] && a("*")
            }

            function Ut(e, t) {
                var n, r, o = E.ajaxSettings.flatOptions || {};
                for (n in t)void 0 !== t[n] && ((o[n] ? e : r || (r = {}))[n] = t[n]);
                return r && E.extend(!0, e, r), e
            }

            Rt.href = wt.href, E.extend({
                active: 0,
                lastModified: {},
                etag: {},
                ajaxSettings: {
                    url: wt.href,
                    type: "GET",
                    isLocal: /^(?:about|app|app-storage|.+-extension|file|res|widget):$/.test(wt.protocol),
                    global: !0,
                    processData: !0,
                    async: !0,
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    accepts: {
                        "*": Dt,
                        text: "text/plain",
                        html: "text/html",
                        xml: "application/xml, text/xml",
                        json: "application/json, text/javascript"
                    },
                    contents: {xml: /\bxml\b/, html: /\bhtml/, json: /\bjson\b/},
                    responseFields: {xml: "responseXML", text: "responseText", json: "responseJSON"},
                    converters: {"* text": String, "text html": !0, "text json": JSON.parse, "text xml": E.parseXML},
                    flatOptions: {url: !0, context: !0}
                },
                ajaxSetup: function (e, t) {
                    return t ? Ut(Ut(e, E.ajaxSettings), t) : Ut(E.ajaxSettings, e)
                },
                ajaxPrefilter: Bt(Nt),
                ajaxTransport: Bt(Lt),
                ajax: function (e, t) {
                    "object" == typeof e && (t = e, e = void 0), t = t || {};
                    var r, o, i, s, u, c, l, f, p, d, h = E.ajaxSetup({}, t), m = h.context || h, v = h.context && (m.nodeType || m.jquery) ? E(m) : E.event, y = E.Deferred(), g = E.Callbacks("once memory"), b = h.statusCode || {}, w = {}, _ = {}, x = "canceled", k = {
                        readyState: 0,
                        getResponseHeader: function (e) {
                            var t;
                            if (l) {
                                if (!s)for (s = {}; t = It.exec(i);)s[t[1].toLowerCase()] = t[2];
                                t = s[e.toLowerCase()]
                            }
                            return null == t ? null : t
                        },
                        getAllResponseHeaders: function () {
                            return l ? i : null
                        },
                        setRequestHeader: function (e, t) {
                            return null == l && (e = _[e.toLowerCase()] = _[e.toLowerCase()] || e, w[e] = t), this
                        },
                        overrideMimeType: function (e) {
                            return null == l && (h.mimeType = e), this
                        },
                        statusCode: function (e) {
                            var t;
                            if (e)if (l) k.always(e[k.status]); else for (t in e)b[t] = [b[t], e[t]];
                            return this
                        },
                        abort: function (e) {
                            var t = e || x;
                            return r && r.abort(t), T(0, t), this
                        }
                    };
                    if (y.promise(k), h.url = ((e || h.url || wt.href) + "").replace(Mt, wt.protocol + "//"), h.type = t.method || t.type || h.method || h.type, h.dataTypes = (h.dataType || "*").toLowerCase().match(B) || [""], null == h.crossDomain) {
                        c = a.createElement("a");
                        try {
                            c.href = h.url, c.href = c.href, h.crossDomain = Rt.protocol + "//" + Rt.host != c.protocol + "//" + c.host
                        } catch (e) {
                            h.crossDomain = !0
                        }
                    }
                    if (h.data && h.processData && "string" != typeof h.data && (h.data = E.param(h.data, h.traditional)), Ft(Nt, h, t, k), l)return k;
                    for (p in(f = E.event && h.global) && 0 == E.active++ && E.event.trigger("ajaxStart"), h.type = h.type.toUpperCase(), h.hasContent = !At.test(h.type), o = h.url.replace(Ot, ""), h.hasContent ? h.data && h.processData && 0 === (h.contentType || "").indexOf("application/x-www-form-urlencoded") && (h.data = h.data.replace(Pt, "+")) : (d = h.url.slice(o.length), h.data && (h.processData || "string" == typeof h.data) && (o += (xt.test(o) ? "&" : "?") + h.data, delete h.data), !1 === h.cache && (o = o.replace(jt, "$1"), d = (xt.test(o) ? "&" : "?") + "_=" + _t++ + d), h.url = o + d), h.ifModified && (E.lastModified[o] && k.setRequestHeader("If-Modified-Since", E.lastModified[o]), E.etag[o] && k.setRequestHeader("If-None-Match", E.etag[o])), (h.data && h.hasContent && !1 !== h.contentType || t.contentType) && k.setRequestHeader("Content-Type", h.contentType), k.setRequestHeader("Accept", h.dataTypes[0] && h.accepts[h.dataTypes[0]] ? h.accepts[h.dataTypes[0]] + ("*" !== h.dataTypes[0] ? ", " + Dt + "; q=0.01" : "") : h.accepts["*"]), h.headers)k.setRequestHeader(p, h.headers[p]);
                    if (h.beforeSend && (!1 === h.beforeSend.call(m, k, h) || l))return k.abort();
                    if (x = "abort", g.add(h.complete), k.done(h.success), k.fail(h.error), r = Ft(Lt, h, t, k)) {
                        if (k.readyState = 1, f && v.trigger("ajaxSend", [k, h]), l)return k;
                        h.async && h.timeout > 0 && (u = n.setTimeout(function () {
                            k.abort("timeout")
                        }, h.timeout));
                        try {
                            l = !1, r.send(w, T)
                        } catch (e) {
                            if (l)throw e;
                            T(-1, e)
                        }
                    } else T(-1, "No Transport");
                    function T(e, t, a, s) {
                        var c, p, d, w, _, x = t;
                        l || (l = !0, u && n.clearTimeout(u), r = void 0, i = s || "", k.readyState = e > 0 ? 4 : 0, c = e >= 200 && e < 300 || 304 === e, a && (w = function (e, t, n) {
                            for (var r, o, i, a, s = e.contents, u = e.dataTypes; "*" === u[0];)u.shift(), void 0 === r && (r = e.mimeType || t.getResponseHeader("Content-Type"));
                            if (r)for (o in s)if (s[o] && s[o].test(r)) {
                                u.unshift(o);
                                break
                            }
                            if (u[0] in n) i = u[0]; else {
                                for (o in n) {
                                    if (!u[0] || e.converters[o + " " + u[0]]) {
                                        i = o;
                                        break
                                    }
                                    a || (a = o)
                                }
                                i = i || a
                            }
                            if (i)return i !== u[0] && u.unshift(i), n[i]
                        }(h, k, a)), w = function (e, t, n, r) {
                            var o, i, a, s, u, c = {}, l = e.dataTypes.slice();
                            if (l[1])for (a in e.converters)c[a.toLowerCase()] = e.converters[a];
                            for (i = l.shift(); i;)if (e.responseFields[i] && (n[e.responseFields[i]] = t), !u && r && e.dataFilter && (t = e.dataFilter(t, e.dataType)), u = i, i = l.shift())if ("*" === i) i = u; else if ("*" !== u && u !== i) {
                                if (!(a = c[u + " " + i] || c["* " + i]))for (o in c)if ((s = o.split(" "))[1] === i && (a = c[u + " " + s[0]] || c["* " + s[0]])) {
                                    !0 === a ? a = c[o] : !0 !== c[o] && (i = s[0], l.unshift(s[1]));
                                    break
                                }
                                if (!0 !== a)if (a && e.throws) t = a(t); else try {
                                    t = a(t)
                                } catch (e) {
                                    return {state: "parsererror", error: a ? e : "No conversion from " + u + " to " + i}
                                }
                            }
                            return {state: "success", data: t}
                        }(h, w, k, c), c ? (h.ifModified && ((_ = k.getResponseHeader("Last-Modified")) && (E.lastModified[o] = _), (_ = k.getResponseHeader("etag")) && (E.etag[o] = _)), 204 === e || "HEAD" === h.type ? x = "nocontent" : 304 === e ? x = "notmodified" : (x = w.state, p = w.data, c = !(d = w.error))) : (d = x, !e && x || (x = "error", e < 0 && (e = 0))), k.status = e, k.statusText = (t || x) + "", c ? y.resolveWith(m, [p, x, k]) : y.rejectWith(m, [k, x, d]), k.statusCode(b), b = void 0, f && v.trigger(c ? "ajaxSuccess" : "ajaxError", [k, h, c ? p : d]), g.fireWith(m, [k, x]), f && (v.trigger("ajaxComplete", [k, h]), --E.active || E.event.trigger("ajaxStop")))
                    }

                    return k
                },
                getJSON: function (e, t, n) {
                    return E.get(e, t, n, "json")
                },
                getScript: function (e, t) {
                    return E.get(e, void 0, t, "script")
                }
            }), E.each(["get", "post"], function (e, t) {
                E[t] = function (e, n, r, o) {
                    return g(n) && (o = o || r, r = n, n = void 0), E.ajax(E.extend({
                        url: e,
                        type: t,
                        dataType: o,
                        data: n,
                        success: r
                    }, E.isPlainObject(e) && e))
                }
            }), E._evalUrl = function (e) {
                return E.ajax({url: e, type: "GET", dataType: "script", cache: !0, async: !1, global: !1, throws: !0})
            }, E.fn.extend({
                wrapAll: function (e) {
                    var t;
                    return this[0] && (g(e) && (e = e.call(this[0])), t = E(e, this[0].ownerDocument).eq(0).clone(!0), this[0].parentNode && t.insertBefore(this[0]), t.map(function () {
                        for (var e = this; e.firstElementChild;)e = e.firstElementChild;
                        return e
                    }).append(this)), this
                }, wrapInner: function (e) {
                    return g(e) ? this.each(function (t) {
                        E(this).wrapInner(e.call(this, t))
                    }) : this.each(function () {
                        var t = E(this), n = t.contents();
                        n.length ? n.wrapAll(e) : t.append(e)
                    })
                }, wrap: function (e) {
                    var t = g(e);
                    return this.each(function (n) {
                        E(this).wrapAll(t ? e.call(this, n) : e)
                    })
                }, unwrap: function (e) {
                    return this.parent(e).not("body").each(function () {
                        E(this).replaceWith(this.childNodes)
                    }), this
                }
            }), E.expr.pseudos.hidden = function (e) {
                return !E.expr.pseudos.visible(e)
            }, E.expr.pseudos.visible = function (e) {
                return !!(e.offsetWidth || e.offsetHeight || e.getClientRects().length)
            }, E.ajaxSettings.xhr = function () {
                try {
                    return new n.XMLHttpRequest
                } catch (e) {
                }
            };
            var qt = {0: 200, 1223: 204}, Ht = E.ajaxSettings.xhr();
            y.cors = !!Ht && "withCredentials" in Ht, y.ajax = Ht = !!Ht, E.ajaxTransport(function (e) {
                var t, r;
                if (y.cors || Ht && !e.crossDomain)return {
                    send: function (o, i) {
                        var a, s = e.xhr();
                        if (s.open(e.type, e.url, e.async, e.username, e.password), e.xhrFields)for (a in e.xhrFields)s[a] = e.xhrFields[a];
                        for (a in e.mimeType && s.overrideMimeType && s.overrideMimeType(e.mimeType), e.crossDomain || o["X-Requested-With"] || (o["X-Requested-With"] = "XMLHttpRequest"), o)s.setRequestHeader(a, o[a]);
                        t = function (e) {
                            return function () {
                                t && (t = r = s.onload = s.onerror = s.onabort = s.ontimeout = s.onreadystatechange = null, "abort" === e ? s.abort() : "error" === e ? "number" != typeof s.status ? i(0, "error") : i(s.status, s.statusText) : i(qt[s.status] || s.status, s.statusText, "text" !== (s.responseType || "text") || "string" != typeof s.responseText ? {binary: s.response} : {text: s.responseText}, s.getAllResponseHeaders()))
                            }
                        }, s.onload = t(), r = s.onerror = s.ontimeout = t("error"), void 0 !== s.onabort ? s.onabort = r : s.onreadystatechange = function () {
                            4 === s.readyState && n.setTimeout(function () {
                                t && r()
                            })
                        }, t = t("abort");
                        try {
                            s.send(e.hasContent && e.data || null)
                        } catch (e) {
                            if (t)throw e
                        }
                    }, abort: function () {
                        t && t()
                    }
                }
            }), E.ajaxPrefilter(function (e) {
                e.crossDomain && (e.contents.script = !1)
            }), E.ajaxSetup({
                accepts: {script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},
                contents: {script: /\b(?:java|ecma)script\b/},
                converters: {
                    "text script": function (e) {
                        return E.globalEval(e), e
                    }
                }
            }), E.ajaxPrefilter("script", function (e) {
                void 0 === e.cache && (e.cache = !1), e.crossDomain && (e.type = "GET")
            }), E.ajaxTransport("script", function (e) {
                var t, n;
                if (e.crossDomain)return {
                    send: function (r, o) {
                        t = E("<script>").prop({
                            charset: e.scriptCharset,
                            src: e.url
                        }).on("load error", n = function (e) {
                            t.remove(), n = null, e && o("error" === e.type ? 404 : 200, e.type)
                        }), a.head.appendChild(t[0])
                    }, abort: function () {
                        n && n()
                    }
                }
            });
            var Vt = [], Wt = /(=)\?(?=&|$)|\?\?/;
            E.ajaxSetup({
                jsonp: "callback", jsonpCallback: function () {
                    var e = Vt.pop() || E.expando + "_" + _t++;
                    return this[e] = !0, e
                }
            }), E.ajaxPrefilter("json jsonp", function (e, t, r) {
                var o, i, a, s = !1 !== e.jsonp && (Wt.test(e.url) ? "url" : "string" == typeof e.data && 0 === (e.contentType || "").indexOf("application/x-www-form-urlencoded") && Wt.test(e.data) && "data");
                if (s || "jsonp" === e.dataTypes[0])return o = e.jsonpCallback = g(e.jsonpCallback) ? e.jsonpCallback() : e.jsonpCallback, s ? e[s] = e[s].replace(Wt, "$1" + o) : !1 !== e.jsonp && (e.url += (xt.test(e.url) ? "&" : "?") + e.jsonp + "=" + o), e.converters["script json"] = function () {
                    return a || E.error(o + " was not called"), a[0]
                }, e.dataTypes[0] = "json", i = n[o], n[o] = function () {
                    a = arguments
                }, r.always(function () {
                    void 0 === i ? E(n).removeProp(o) : n[o] = i, e[o] && (e.jsonpCallback = t.jsonpCallback, Vt.push(o)), a && g(i) && i(a[0]), a = i = void 0
                }), "script"
            }), y.createHTMLDocument = function () {
                var e = a.implementation.createHTMLDocument("").body;
                return e.innerHTML = "<form></form><form></form>", 2 === e.childNodes.length
            }(), E.parseHTML = function (e, t, n) {
                return "string" != typeof e ? [] : ("boolean" == typeof t && (n = t, t = !1), t || (y.createHTMLDocument ? ((r = (t = a.implementation.createHTMLDocument("")).createElement("base")).href = a.location.href, t.head.appendChild(r)) : t = a), o = I.exec(e), i = !n && [], o ? [t.createElement(o[1])] : (o = be([e], t, i), i && i.length && E(i).remove(), E.merge([], o.childNodes)));
                var r, o, i
            }, E.fn.load = function (e, t, n) {
                var r, o, i, a = this, s = e.indexOf(" ");
                return s > -1 && (r = ht(e.slice(s)), e = e.slice(0, s)), g(t) ? (n = t, t = void 0) : t && "object" == typeof t && (o = "POST"), a.length > 0 && E.ajax({
                    url: e,
                    type: o || "GET",
                    dataType: "html",
                    data: t
                }).done(function (e) {
                    i = arguments, a.html(r ? E("<div>").append(E.parseHTML(e)).find(r) : e)
                }).always(n && function (e, t) {
                        a.each(function () {
                            n.apply(this, i || [e.responseText, t, e])
                        })
                    }), this
            }, E.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function (e, t) {
                E.fn[t] = function (e) {
                    return this.on(t, e)
                }
            }), E.expr.pseudos.animated = function (e) {
                return E.grep(E.timers, function (t) {
                    return e === t.elem
                }).length
            }, E.offset = {
                setOffset: function (e, t, n) {
                    var r, o, i, a, s, u, c = E.css(e, "position"), l = E(e), f = {};
                    "static" === c && (e.style.position = "relative"), s = l.offset(), i = E.css(e, "top"), u = E.css(e, "left"), ("absolute" === c || "fixed" === c) && (i + u).indexOf("auto") > -1 ? (a = (r = l.position()).top, o = r.left) : (a = parseFloat(i) || 0, o = parseFloat(u) || 0), g(t) && (t = t.call(e, n, E.extend({}, s))), null != t.top && (f.top = t.top - s.top + a), null != t.left && (f.left = t.left - s.left + o), "using" in t ? t.using.call(e, f) : l.css(f)
                }
            }, E.fn.extend({
                offset: function (e) {
                    if (arguments.length)return void 0 === e ? this : this.each(function (t) {
                        E.offset.setOffset(this, e, t)
                    });
                    var t, n, r = this[0];
                    return r ? r.getClientRects().length ? (t = r.getBoundingClientRect(), n = r.ownerDocument.defaultView, {
                        top: t.top + n.pageYOffset,
                        left: t.left + n.pageXOffset
                    }) : {top: 0, left: 0} : void 0
                }, position: function () {
                    if (this[0]) {
                        var e, t, n, r = this[0], o = {top: 0, left: 0};
                        if ("fixed" === E.css(r, "position")) t = r.getBoundingClientRect(); else {
                            for (t = this.offset(), n = r.ownerDocument, e = r.offsetParent || n.documentElement; e && (e === n.body || e === n.documentElement) && "static" === E.css(e, "position");)e = e.parentNode;
                            e && e !== r && 1 === e.nodeType && ((o = E(e).offset()).top += E.css(e, "borderTopWidth", !0), o.left += E.css(e, "borderLeftWidth", !0))
                        }
                        return {
                            top: t.top - o.top - E.css(r, "marginTop", !0),
                            left: t.left - o.left - E.css(r, "marginLeft", !0)
                        }
                    }
                }, offsetParent: function () {
                    return this.map(function () {
                        for (var e = this.offsetParent; e && "static" === E.css(e, "position");)e = e.offsetParent;
                        return e || we
                    })
                }
            }), E.each({scrollLeft: "pageXOffset", scrollTop: "pageYOffset"}, function (e, t) {
                var n = "pageYOffset" === t;
                E.fn[e] = function (r) {
                    return z(this, function (e, r, o) {
                        var i;
                        if (b(e) ? i = e : 9 === e.nodeType && (i = e.defaultView), void 0 === o)return i ? i[t] : e[r];
                        i ? i.scrollTo(n ? i.pageXOffset : o, n ? o : i.pageYOffset) : e[r] = o
                    }, e, r, arguments.length)
                }
            }), E.each(["top", "left"], function (e, t) {
                E.cssHooks[t] = Ve(y.pixelPosition, function (e, n) {
                    if (n)return n = He(e, t), Fe.test(n) ? E(e).position()[t] + "px" : n
                })
            }), E.each({Height: "height", Width: "width"}, function (e, t) {
                E.each({padding: "inner" + e, content: t, "": "outer" + e}, function (n, r) {
                    E.fn[r] = function (o, i) {
                        var a = arguments.length && (n || "boolean" != typeof o), s = n || (!0 === o || !0 === i ? "margin" : "border");
                        return z(this, function (t, n, o) {
                            var i;
                            return b(t) ? 0 === r.indexOf("outer") ? t["inner" + e] : t.document.documentElement["client" + e] : 9 === t.nodeType ? (i = t.documentElement, Math.max(t.body["scroll" + e], i["scroll" + e], t.body["offset" + e], i["offset" + e], i["client" + e])) : void 0 === o ? E.css(t, n, s) : E.style(t, n, o, s)
                        }, t, a ? o : void 0, a)
                    }
                })
            }), E.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "), function (e, t) {
                E.fn[t] = function (e, n) {
                    return arguments.length > 0 ? this.on(t, null, e, n) : this.trigger(t)
                }
            }), E.fn.extend({
                hover: function (e, t) {
                    return this.mouseenter(e).mouseleave(t || e)
                }
            }), E.fn.extend({
                bind: function (e, t, n) {
                    return this.on(e, null, t, n)
                }, unbind: function (e, t) {
                    return this.off(e, null, t)
                }, delegate: function (e, t, n, r) {
                    return this.on(t, e, n, r)
                }, undelegate: function (e, t, n) {
                    return 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", n)
                }
            }), E.proxy = function (e, t) {
                var n, r, o;
                if ("string" == typeof t && (n = e[t], t = e, e = n), g(e))return r = u.call(arguments, 2), (o = function () {
                    return e.apply(t || this, r.concat(u.call(arguments)))
                }).guid = e.guid = e.guid || E.guid++, o
            }, E.holdReady = function (e) {
                e ? E.readyWait++ : E.ready(!0)
            }, E.isArray = Array.isArray, E.parseJSON = JSON.parse, E.nodeName = j, E.isFunction = g, E.isWindow = b, E.camelCase = $, E.type = x, E.now = Date.now, E.isNumeric = function (e) {
                var t = E.type(e);
                return ("number" === t || "string" === t) && !isNaN(e - parseFloat(e))
            }, void 0 === (r = function () {
                return E
            }.apply(t, [])) || (e.exports = r);
            var zt = n.jQuery, Kt = n.$;
            return E.noConflict = function (e) {
                return n.$ === E && (n.$ = Kt), e && n.jQuery === E && (n.jQuery = zt), E
            }, o || (n.jQuery = n.$ = E), E
        })
    }, 91: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
            return typeof e
        } : function (e) {
            return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
        }, o = Object.assign || function (e) {
                for (var t = 1; t < arguments.length; t++) {
                    var n = arguments[t];
                    for (var r in n)Object.prototype.hasOwnProperty.call(n, r) && (e[r] = n[r])
                }
                return e
            }, i = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), a = n(28), s = c(n(46)), u = n(52);
        c(n(92));
        function c(e) {
            return e && e.__esModule ? e : {default: e}
        }

        var l = n(45).getInstance("AILP PowerMessage"), f = function (e) {
            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "H5_4291";
            return a.mtop.request({
                api: "mtop.youku.live.infoapi.powermsgtoken",
                v: "1.0",
                data: {windowId: e, appkey: t},
                ecode: 0
            })
        }, p = {
            mtopAppkey: "24679788",
            mode: 3,
            aserverProxy: "msgacs.youku.com",
            serviceId: "powermsg-youku",
            appkey: s.default.isPhone ? "H5_4291" : "H5_5001",
            topic: "",
            bizCode: 13,
            bizTag: "",
            accsToken: "",
            port: "https:" === window.location.protocol ? 443 : 80,
            userId: "0",
            nick: "nick"
        }, d = function (e) {
            function t() {
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t);
                var e = function (e, t) {
                    if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this));
                return e.topic = "", e.windowId = "", e.token = "", e.webPm = null, e.roomId = "", e
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, a.EventEmitter), i(t, [{
                key: "connect", value: function (e, t, n) {
                    var r = this, i = arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : {}, s = arguments.length > 4 && void 0 !== arguments[4] ? arguments[4] : {};
                    if (i.ext && i.ext.banSub4JS) {
                        i.ext.banSub4JS.refer = t.fakeRefer;
                        var c = null, d = null, h = null, m = null, v = i.ext.banSub4JS.topic, y = i.ext.banSub4JS.pmAppKey, g = i.ext.banSub4JS.refer;
                        if (v && 0 !== v.length && (d = !!v.includes(n)), y && 0 !== y.length && (h = !!y.includes(p.appkey)), g && 0 !== g.length && (m = !!g.includes((0, u.params)().refer)), null !== d && (c = d), null !== h && (c = null !== c ? c && h : h), null !== m && (c = null !== c ? c && m : m), c)return !1
                    }
                    return lib.accs && lib.accs.getAccsDeviceId && lib.PowerMsg ? Promise.resolve(n).then(function (e) {
                        return r.topic = e, r.windowId = lib.accs.getAccsDeviceId(), f(r.windowId, s.appkey)
                    }).then(function (e) {
                        return e.data && 200 === e.data.status ? (r.token = e.data.data, {
                            token: r.token,
                            topic: r.topic
                        }) : Promise.reject("getPowermsgToken response data status " + e.data.status)
                    }).then(function (e) {
                        var n = e.topic, i = e.token, a = new lib.PowerMsg(o({}, p, {topic: n, accsToken: i}, s));
                        a.on("ready", function () {
                            l.log("ready"), a.subscribe(), r.emit("ready")
                        }), a.on("subscribe", function () {
                            l.log("subscribe"), r.roomId = t, r.emit("subscribe")
                        }), a.on("unsubscribe", function () {
                            l.log("unsubscribe"), r.emit("unsubscribe")
                        }), a.on("message", function (e) {
                            r.emit("__pm_message", e)
                        }), a.on("bizInfo", function (e) {
                            e.msgData && r.messageHandler(e.msgData, "bizInfo")
                        }), a.on("hisBizInfo", function (e) {
                            e.msgData && r.messageHandler(e.msgData, "hisBizInfo")
                        }), r.webPm = a
                    }).catch(function (e) {
                        return new Promise.reject(new a.AilpError(2e3, "connect error", e))
                    }) : Promise.reject(new a.AilpError(1001, "can't find lib.accs.getAccsDeviceId, please add script [//g.alicdn.com/mtb/lib-powermsg-sdk/{version}/powermsg.js]", {}))
                }
            }, {
                key: "disConnect", value: function () {
                    return this.webPm && this.webPm.unSubscribe(), Promise.resolve()
                }
            }, {
                key: "messageHandler", value: function (e) {
                    var t = this, n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "", o = void 0 === e ? "undefined" : r(e);
                    if ("string" == (o = o.toLocaleLowerCase()))try {
                        e = JSON.parse(e)
                    } catch (t) {
                        e = null
                    }
                    if (!e)return !1;
                    var i = e.datas;
                    if (!i || 0 == i.length)return !1;
                    i.forEach(function (e) {
                        var r = e.msgType, o = e.data;
                        try {
                            o = (0, a.base64Decode)(o), o = JSON.parse(o)
                        } catch (e) {
                            o = null
                        }
                        if (o) {
                            var i = o.args;
                            r && i && i.length > 0 ? i.forEach(function (e) {
                                t.emit("message", {name: r, data: e, __pmEventSource: n})
                            }) : r && t.emit("message", {name: r, data: o, __pmEventSource: n})
                        }
                    })
                }
            }]), t
        }();
        d.getChatRoomInfo = function (e, t) {
            return a.mtop.request({
                api: "mtop.youku.live.chatroom.info.get",
                v: "1.0",
                data: {appId: e, roomId: t},
                ecode: 0
            })
        }, d.getPowermsgToken = f, t.default = d, e.exports = t.default
    }, 92: function (e, t) {
        e.exports = require("@weex-module/ykl-chatroom")
    }, 93: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function (e) {
            return e && e.__esModule ? e : {default: e}
        }(n(45));
        t.default = r.default.getInstance("YOUKU-LIVE"), e.exports = t.default
    }, 94: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = n(28);
        t.default = function () {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {}, t = {};
            return e.widgetId && (t.widgetId = e.widgetId), new Promise(function (e, n) {
                r.mtop.request({
                    api: "mtop.youku.live.act.myaward.list",
                    v: "1.0",
                    ecode: 1,
                    data: t,
                    dataType: "json"
                }).then(function (t) {
                    e(t)
                }).catch(function (e) {
                    n(e)
                })
            })
        }, e.exports = t.default
    }, 95: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = n(28);
        t.default = new r.EventEmitter, e.exports = t.default
    }, 96: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = {
            liveUploadMixinTimer: null,
            liveUploadMixinVideoTime: 0,
            showId: "",
            videoId: "",
            enterRoomTime: (new Date).getTime(),
            init: function (e, t) {
                this.showId = e, this.videoId = t
            },
            liveUploadMixinStartLiveUpload: function () {
                return this.liveUploadMixinStopLiveUpload(), !1
            },
            liveUploadMixinStopLiveUpload: function () {
                this.liveUploadMixinTimer && clearTimeout(this.liveUploadMixinTimer)
            }
        };
        t.default = r, e.exports = t.default
    }, 97: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), o = n(1), i = (a(n(61)), a(n(98)));

        function a(e) {
            return e && e.__esModule ? e : {default: e}
        }

        n(100);
        var s = (0, o.createElement)("h1", {
            className: "logo",
            title: "优酷直播"
        }, (0, o.createElement)("a", {href: "//live.youku.com/", target: "_blank"})), u = function (e) {
            function t(e) {
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t);
                var n = function (e, t) {
                    if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                return n.handleLogin = function () {
                    i.default.doLogin()
                }, n.handleLogout = function () {
                    i.default.doLogout()
                }, n
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, o.Component), r(t, [{
                key: "componentWillMount", value: function () {
                }
            }, {
                key: "render", value: function () {
                    var e = this.props, t = e.userIsLogin, n = e.userFaceUrl, r = e.userName, i = e.userEncodeUid;
                    return (0, o.createElement)("div", {className: "nav"}, s, (0, o.createElement)("div", {className: "user"}, t && (0, o.createElement)("a", {
                            className: "userInfo",
                            target: "_blank",
                            href: "//i.youku.com/u/" + i,
                            title: "进入个人主页"
                        }, (0, o.createElement)("img", {
                            class: "avatar",
                            src: n,
                            alt: r
                        }), r), t ? (0, o.createElement)("button", {
                        className: "logout",
                        onClick: this.handleLogout
                    }, "退出") : (0, o.createElement)("button", {className: "login", onClick: this.handleLogin}, "登录")))
                }
            }]), t
        }();
        t.default = u, e.exports = t.default
    }, 98: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }

            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(), o = u(n(29)), i = u(n(99)), a = u(n(46)), s = u(n(60));

        function u(e) {
            return e && e.__esModule ? e : {default: e}
        }

        var c = function (e) {
            function t() {
                !function (e, t) {
                    if (!(e instanceof t))throw new TypeError("Cannot call a class as a function")
                }(this, t);
                var e = function (e, t) {
                    if (!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this));
                return e.init(), e
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t)throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, o.default), r(t, [{
                key: "init", value: function () {
                    var e = this;
                    if (a.default.isPhone)return !1;
                    a.default.IKU && (window.IKUCallLogin = function () {
                        window.location.reload()
                    }, window.IKUCallLogout = function () {
                        window.location.reload()
                    });
                    var t = (new Date).getHours(), n = t >= 18 || t <= 8;
                    i.default.getScript("//g.alicdn.com/static-es6/login/public/load.js", function () {
                        e.ykLoginLoader = new YKLoginLoader({
                            loginOrLogout: "login",
                            callbackURL: "",
                            mode: "popup",
                            template: "tempA",
                            buid: "youku",
                            pid: "8fb8456183734a86bfc1c15a1c761cdf",
                            themes: ["35b5ff", "c0e8f6"],
                            bgThemes: "#fff url(" + (n ? "//r1.ykimg.com/0510000059F57C5DADC0AE97B9040A47" : "//r1.ykimg.com/0510000059F57C50ADC0AEA0580EBB5A") + ") no-repeat right bottom",
                            fontColor: n ? "#fff" : "#333",
                            linkColor: n ? "#fff" : "#333",
                            padding: [30, 30, 30, 410],
                            loginModel: ["normal", "mobile"],
                            regModel: ["mobile"],
                            isQRlogin: !0,
                            isThirdPartLogin: !0,
                            regShowType: "in",
                            regRules: ["用户协议", "//mapp.youku.com/service/agreement", "//mapp.youku.com/service/copyright"],
                            qrMsg: "请使用优酷APP扫码登录",
                            qrBu: ["ykt", 80, "false"],
                            size: "normal",
                            loginSuccess: function () {
                                window.location.reload()
                            }
                        })
                    })
                }
            }, {
                key: "doLogin", value: function () {
                    a.default.isPhone ? window.location.href = "https://account.youku.com/?callback=" + encodeURIComponent(window.location.href) : a.default.IKU ? window.external.execute("iku", "iku://|buildin|pcweb|do-login|-|-|") : this.ykLoginLoader.buildLoginDom()
                }
            }, {
                key: "doLogout", value: function () {
                    a.default.isPhone ? window.location.href = "https://account.youku.com/logoutAll.htm?callbackURL=" + encodeURIComponent(window.location.href) : a.default.IKU ? window.external.execute("iku", "iku://|buildin|pcweb|do-logout|-|-|") : new YKLoginLoader({
                        loginOrLogout: "logout",
                        buid: "youku",
                        pid: "8fb8456183734a86bfc1c15a1c761cdf",
                        logoutSuccess: function () {
                            window.location.reload()
                        }
                    })
                }
            }, {
                key: "doRegist", value: function () {
                    this.ykLoginLoader.buildRegDom()
                }
            }, {
                key: "checkLogin", value: function () {
                    return new Promise(function (e, t) {
                        s.default.getUserInfo().then(function (n) {
                            n.isLogin ? e(n) : t(!1)
                        }).catch(function () {
                            t(!1)
                        })
                    })
                }
            }]), t
        }();
        t.default = new c, e.exports = t.default
    }, 99: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var r = n(53), o = function (e) {
            return e.getScript = function (e, t) {
                var n = document.createElement("script");
                n.type = "text/javascript", n.async = !0, t ? (0, r.isFunction)(t) && (t = {callback: t}) : t = {}, t.charset && (n.charset = t.charset), n.src = e;
                var o = document.getElementsByTagName("head")[0], i = !1;
                n.onload = n.onreadystatechange = function () {
                    i || this.readyState && "loaded" != this.readyState && "complete" != this.readyState || (i = !0, n.onload = n.onreadystatechange = null, o.removeChild(n), t.callback && t.callback())
                }, o.appendChild(n)
            }, e.getRequest = function (e, t) {
                var n = new Image;
                n.onload = function () {
                }, n.src = t ? [e, e.match(/\?/) ? "&" : "?", "string" == typeof t ? t : $.param(t)].join("") : e
            }, e
        }({});
        t.default = o, e.exports = t.default
    }
});