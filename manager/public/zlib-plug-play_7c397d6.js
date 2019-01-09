!
function(a, b) {
    var c = {
        handle: "",
        limit: !1,
        mxleft: 0,
        mxright: 9999,
        mxtop: 0,
        mxbottom: 9999,
        lock: !1,
        lockX: !1,
        lockY: !1,
        contrainer: null,
        onStart: function() {},
        onMove: function() {},
        onStop: function() {}
    },
    d = function(a, b) {
        var d = $.extend({},
        c, b);
        for (var e in d) this[e] = d[e];
        this.drag = $(a),
        this._init()
    },
    e = {
        _init: function() {
            $(this.handle)[0] ? this.handle = $(this.handle) : this.handle = this.drag,
            this._x = this._y = 0,
            "fixed" != this.drag.css("position") && this.drag.css("position", "absolute"),
            null != this.contrainer && (this.contrainer = $(this.contrainer)),
            this.FM = this.inhertEvent(this, this.Move),
            this.FS = this.inhert(this, this.Stop),
            this.handle.bind("mousedown", this.inhertEvent(this, this.Start))
        },
        Start: function(a) {
            this.lock || (this._x = a.clientX - this.drag.position().left, this._y = a.clientY - this.drag.position().top, $(document).bind("mousemove", this.FM), $(document).bind("mouseup", this.FS), this.handle[0].losecapture ? (this.handle.bind("losecapture", this.FS), this.handle[0].setCapture()) : ($(window).bind("blur", this.FS), a.preventDefault()), this.onStart())
        },
        Move: function(a) {
            if (this.lock) return void this.Stop();
            window.getSelection ? window.getSelection().removeAllRanges() : document.selection.empty();
            var b = a.clientX - this._x,
            c = a.clientY - this._y;
            this.limit && (b = Math.max(Math.min(b, this.mxright - this.drag.width()), this.mxleft), c = Math.max(Math.min(c, this.mxbottom - this.drag.height()), this.mxtop)),
            this.lockX || this.drag.css({
                left: b
            }),
            this.lockY || this.drag.css({
                top: c
            }),
            this.onMove()
        },
        Stop: function(a) {
            $(document).unbind("mousemove", this.FM),
            $(document).unbind("mouseup", this.FS),
            this.handle[0].losecapture ? (this.handle.unbind("losecapture", this.FS), this.handle[0].releaseCapture()) : $(window).unbind("blur", this.FS),
            this.onStop()
        },
        inhertEvent: function(a, b) {
            return function(c) {
                return b.call(a, c || window.event)
            }
        },
        inhert: function(a, b) {
            return function() {
                return b.apply(a, arguments)
            }
        }
    };
    a.extend(d, e),
    b.drag = d
} (zlib = zlib || {},
zlib.plug = zlib.plug || {}),
function(a) {
    function b(b) {
        var c = b || window.event,
        d = [].slice.call(arguments, 1),
        e = 0,
        f = 0,
        g = 0;
        return b = a.event.fix(c),
        b.type = "mousewheel",
        c.wheelDelta && (e = c.wheelDelta / 120),
        c.detail && (e = -c.detail / 3),
        g = e,
        void 0 !== c.axis && c.axis === c.HORIZONTAL_AXIS && (g = 0, f = -1 * e),
        void 0 !== c.wheelDeltaY && (g = c.wheelDeltaY / 120),
        void 0 !== c.wheelDeltaX && (f = -1 * c.wheelDeltaX / 120),
        d.unshift(b, e, f, g),
        (a.event.dispatch || a.event.handle).apply(this, d)
    }
    var c = ["DOMMouseScroll", "mousewheel"];
    if (a.event.fixHooks) for (var d = c.length; d;) a.event.fixHooks[c[--d]] = a.event.mouseHooks;
    a.event.special.mousewheel = {
        setup: function() {
            if (this.addEventListener) for (var a = c.length; a;) this.addEventListener(c[--a], b, !1);
            else this.onmousewheel = b
        },
        teardown: function() {
            if (this.removeEventListener) for (var a = c.length; a;) this.removeEventListener(c[--a], b, !1);
            else this.onmousewheel = null
        }
    },
    a.fn.extend({
        mousewheel: function(a) {
            return a ? this.bind("mousewheel", a) : this.trigger("mousewheel")
        },
        unmousewheel: function(a) {
            return this.unbind("mousewheel", a)
        }
    })
} (jQuery),
function(a, b) {
    "use strict";
    function c(a, b) {
        var c = $.extend({},
        d, b);
        for (var e in c) this[e] = c[e];
        this.el = $(a),
        this._init(),
        null != b && this._mkMyStyle()
    }
    var d = {
        scWidth: "10px",
        barWidth: "4px",
        barBgColor: "#a6b0c3",
        barHoverColor: "#caccd0",
        panelBgColor: "transparent"
    },
    e = !1,
    f = {
        _init: function() {
            this._inintEvent(),
            this._wrapDom(),
            this._layout(),
            this._mkstyle()
        },
        _wrapDom: function() {
            var b = this._getUnicStr(),
            c = this.el.height(),
            d = this.el.width(),
            e = $("<div class='zyscwrap zyscwrap_" + b + "'></div>");
            e.css({
                height: c,
                width: d
            });
            var f = $('<div class="scbar"><div class="scpanel"><div class="sc-bar"></div></div></div>');
            this.el.wrap(e),
            this.el.parent().append(f),
            this.elc = this.el.find(".sc_content") ? this.el.children().first() : this.el.find(".sc_content"),
            this.elp = this.el.parent(),
            this.bar = this.el.parent().find(">.scbar>.scpanel>.sc-bar"),
            a.tool.reLayParent(this.el)
        },
        _mkstyle: function() {
            if (!e) {
                var b = {
                    ".zyscwrap": {
                        position: "relative;",
                        ".scbar": {
                            position: "absolute;",
                            width: d.scWidth,
                            right: "0px;",
                            height: "100%;",
                            top: "0px;",
                            ".scpanel": {
                                position: "relative;",
                                width: d.barWidth,
                                height: "100%;",
                                margin: "0px auto;",
                                background: d.panelBgColor,
                                ".sc-bar": {
                                    position: "absolute;",
                                    width: d.barWidth,
                                    background: d.barBgColor,
                                    "border-radius": "3px;",
                                    cursor: "pointer;",
                                    "z-index": "2;",
                                    "&:hover": {
                                        background: d.barHoverColor
                                    },
                                    "&:active": {
                                        background: d.barHoverColor
                                    }
                                }
                            }
                        }
                    }
                };
                a.tool.mkcss(b),
                e = !0
            }
        },
        _mkMyStyle: function() {
            var b = this._getUnicStr(),
            c = {};
            c[".zyscwrap_" + b] = {},
            c[".zyscwrap_" + b] = {
                ".scbar": {
                    width: this.scWidth,
                    ".scpanel": {
                        width: this.barWidth,
                        background: this.panelBgColor,
                        ".sc-bar": {
                            width: this.barWidth,
                            background: this.barBgColor,
                            "&:hover": {
                                background: this.barHoverColor
                            },
                            "&:active": {
                                background: this.barHoverColor
                            }
                        }
                    }
                }
            },
            a.tool.mkcss(c)
        },
        _getUnicStr: function() {
            var a = $.trim(this.el.attr("id") || ""),
            b = $.trim(this.el.attr("class") || "").split(/\s+/gi).join("."),
            c = null;
            return null != a && a.length > 0 && (c = $.trim(a)),
            null == c && (c = b),
            c
        },
        _layout: function() {
            var a = this.el.height(),
            c = {
                lockX: !0,
                limit: !0,
                mxbottom: a,
                onMove: $.proxy(function() {
                    this._scrollByBar()
                },
                this)
            };
            this.dg = new b.drag(this.bar, c),
            this.update()
        },
        _inintEvent: function() {
            this.el.mousewheel($.proxy(function(a, b, c, d) {
                var e = e ? e: window.event;
                e.preventDefault ? e.preventDefault() : e.returnValue = !1,
                this.el[0].scrollTop -= 20 * b,
                this._setBarPosition(),
                "function" == typeof this.callback && this.callback(this.el[0].scrollTop, this.el.height(), this.elc.height())
            },
            this))
        },
        _setBarPosition: function() {
            var a = this.elc.height(),
            b = this.el.height(),
            c = this.el[0].scrollTop,
            d = c * (b - this.barh) / (a - b);
            this.bar.css({
                top: d
            })
        },
        _scrollByBar: function() {
            var a = this.elc.height(),
            b = this.el.height(),
            c = this.bar.position().top,
            d = c / ((b - this.barh) / (a - b));
            this.el.scrollTop(d)
        },
        update: function() {
            var a = this._coutBar();
            this.bar.css({
                height: a
            }),
            this.barh = a,
            this._setBarPosition(),
            this.dg.mxbottom = this.el.height(),
            "function" == typeof this.callback && this.callback(this.el[0].scrollTop, this.el.height(), this.elc.height())
        },
        scrollTo: function(a) {
            if ("top" == a) this.el.scrollTop(0),
            this.bar.css({
                top: 0
            });
            else if ("bottom" == a) this.el.scrollTop(99999),
            this.barh > 0 && this.bar.css({
                top: this.el.height() - this.barh
            });
            else if ("number" == typeof a) {
                this.el.scrollTop(a);
                var b = a * (this.el.height() - this.barh) / (this.elc.height() - this.el.height());
                this.bar.css({
                    top: b
                })
            }
        },
        _coutBar: function() {
            var a = this.el.height(),
            b = this.elc.height();
            0 == b && 0 != a && (b = a);
            var c = a >= b ? 0 : 20 >= a * a / b ? 20 : a * a / b;
            return c
        }
    };
    a.extend(c, f),
    b.zscroll = c
} (zlib = zlib || {},
zlib.plug = zlib.plug || {}),
function(a) {
    a.fn.zclip = function(b) {
        if ("object" == typeof b && !b.length) {
            var c = a.extend({
                path: "ZeroClipboard.swf",
                copy: null,
                beforeCopy: null,
                afterCopy: null,
                clickAfter: !0,
                setHandCursor: !0,
                setCSSEffects: !0
            },
            b);
            return this.each(function() {
                var b = a(this);
                if (b.is(":visible") && ("string" == typeof c.copy || a.isFunction(c.copy))) {
                    ZeroClipboard.setMoviePath(c.path);
                    var d = new ZeroClipboard.Client;
                    a.isFunction(c.copy) && b.bind("zClip_copy", c.copy),
                    a.isFunction(c.beforeCopy) && b.bind("zClip_beforeCopy", c.beforeCopy),
                    a.isFunction(c.afterCopy) && b.bind("zClip_afterCopy", c.afterCopy),
                    d.setHandCursor(c.setHandCursor),
                    d.setCSSEffects(c.setCSSEffects),
                    d.addEventListener("mouseOver",
                    function(a) {
                        b.trigger("mouseenter")
                    }),
                    d.addEventListener("mouseOut",
                    function(a) {
                        b.trigger("mouseleave")
                    }),
                    d.addEventListener("mouseDown",
                    function(e) {
                        b.trigger("mousedown"),
                        a.isFunction(c.copy) ? d.setText(b.triggerHandler("zClip_copy")) : d.setText(c.copy),
                        a.isFunction(c.beforeCopy) && b.trigger("zClip_beforeCopy")
                    }),
                    d.addEventListener("complete",
                    function(d, e) {
                        a.isFunction(c.afterCopy) ? b.trigger("zClip_afterCopy") : (e.length > 500 && (e = e.substr(0, 500) + "...\n\n(" + (e.length - 500) + " characters not shown)"), b.removeClass("hover")),
                        c.clickAfter && b.trigger("click")
                    }),
                    d.glue(b[0], b.parent()[0]),
                    a(window).bind("load resize",
                    function() {
                        d.reposition()
                    })
                }
            })
        }
        return "string" == typeof b ? this.each(function() {
            var c = a(this);
            b = b.toLowerCase();
            var d = c.data("zclipId"),
            e = a("#" + d + ".zclip");
            "remove" == b ? (e.remove(), c.removeClass("active hover")) : "hide" == b ? (e.hide(), c.removeClass("active hover")) : "show" == b && e.show()
        }) : void 0
    }
} (jQuery);
var ZeroClipboard = {
    version: "1.0.7",
    clients: {},
    moviePath: "ZeroClipboard.swf",
    nextId: 1,
    $: function(a) {
        return "string" == typeof a && (a = document.getElementById(a)),
        a.addClass || (a.hide = function() {
            this.style.display = "none"
        },
        a.show = function() {
            this.style.display = ""
        },
        a.addClass = function(a) {
            this.removeClass(a),
            this.className += " " + a
        },
        a.removeClass = function(a) {
            for (var b = this.className.split(/\s+/), c = -1, d = 0; d < b.length; d++) b[d] == a && (c = d, d = b.length);
            return c > -1 && (b.splice(c, 1), this.className = b.join(" ")),
            this
        },
        a.hasClass = function(a) {
            return !! this.className.match(new RegExp("\\s*" + a + "\\s*"))
        }),
        a
    },
    setMoviePath: function(a) {
        this.moviePath = a
    },
    dispatch: function(a, b, c) {
        var d = this.clients[a];
        d && d.receiveEvent(b, c)
    },
    register: function(a, b) {
        this.clients[a] = b
    },
    getDOMObjectPosition: function(a, b) {
        var c = {
            left: 0,
            top: 0,
            width: a.width ? a.width: a.offsetWidth,
            height: a.height ? a.height: a.offsetHeight
        };
        return a && a != b && (c.left += a.offsetLeft, c.top += a.offsetTop),
        c
    },
    Client: function(a) {
        this.handlers = {},
        this.id = ZeroClipboard.nextId++,
        this.movieId = "ZeroClipboardMovie_" + this.id,
        ZeroClipboard.register(this.id, this),
        a && this.glue(a)
    }
};
ZeroClipboard.Client.prototype = {
    id: 0,
    ready: !1,
    movie: null,
    clipText: "",
    handCursorEnabled: !0,
    cssEffects: !0,
    handlers: null,
    glue: function(a, b, c) {
        this.domElement = ZeroClipboard.$(a);
        var d = 99;
        this.domElement.style.zIndex && (d = parseInt(this.domElement.style.zIndex, 10) + 1),
        "string" == typeof b ? b = ZeroClipboard.$(b) : "undefined" == typeof b && (b = document.getElementsByTagName("body")[0]);
        var e = ZeroClipboard.getDOMObjectPosition(this.domElement, b);
        this.div = document.createElement("div"),
        this.div.className = "zclip",
        this.div.id = "zclip-" + this.movieId,
        $(this.domElement).data("zclipId", "zclip-" + this.movieId);
        var f = this.div.style;
        if (f.position = "absolute", f.left = "" + e.left + "px", f.top = "" + e.top + "px", f.width = "" + e.width + "px", f.height = "" + e.height + "px", f.zIndex = d, "object" == typeof c) for (addedStyle in c) f[addedStyle] = c[addedStyle];
        b.appendChild(this.div),
        this.div.innerHTML = this.getHTML(e.width, e.height)
    },
    getHTML: function(a, b) {
        var c = "",
        d = "id=" + this.id + "&width=" + a + "&height=" + b;
        if (navigator.userAgent.match(/MSIE/)) {
            var e = location.href.match(/^https/i) ? "https://": "http://";
            c += '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="' + e + 'download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="' + a + '" height="' + b + '" id="' + this.movieId + '" align="middle"><param name="allowScriptAccess" value="always" /><param name="allowFullScreen" value="false" /><param name="movie" value="' + ZeroClipboard.moviePath + '" /><param name="loop" value="false" /><param name="menu" value="false" /><param name="quality" value="best" /><param name="bgcolor" value="#ffffff" /><param name="flashvars" value="' + d + '"/><param name="wmode" value="transparent"/></object>'
        } else c += '<embed id="' + this.movieId + '" src="' + ZeroClipboard.moviePath + '" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="' + a + '" height="' + b + '" name="' + this.movieId + '" align="middle" allowScriptAccess="always" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="' + d + '" wmode="transparent" />';
        return c
    },
    hide: function() {
        this.div && (this.div.style.left = "-2000px")
    },
    show: function() {
        this.reposition()
    },
    destroy: function() {
        if (this.domElement && this.div) {
            this.hide(),
            this.div.innerHTML = "";
            var a = document.getElementsByTagName("body")[0];
            try {
                a.removeChild(this.div)
            } catch(b) {}
            this.domElement = null,
            this.div = null
        }
    },
    reposition: function(a) {
        if (a && (this.domElement = ZeroClipboard.$(a), this.domElement || this.hide()), this.domElement && this.div) {
            var b = ZeroClipboard.getDOMObjectPosition(this.domElement),
            c = this.div.style;
            c.left = "" + b.left + "px",
            c.top = "" + b.top + "px"
        }
    },
    setText: function(a) {
        this.clipText = a,
        this.ready && this.movie.setText(a)
    },
    addEventListener: function(a, b) {
        a = a.toString().toLowerCase().replace(/^on/, ""),
        this.handlers[a] || (this.handlers[a] = []),
        this.handlers[a].push(b)
    },
    setHandCursor: function(a) {
        this.handCursorEnabled = a,
        this.ready && this.movie.setHandCursor(a)
    },
    setCSSEffects: function(a) {
        this.cssEffects = !!a
    },
    receiveEvent: function(a, b) {
        switch (a = a.toString().toLowerCase().replace(/^on/, "")) {
        case "load":
            if (this.movie = document.getElementById(this.movieId), !this.movie) {
                var c = this;
                return void setTimeout(function() {
                    c.receiveEvent("load", null)
                },
                1)
            }
            if (!this.ready && navigator.userAgent.match(/Firefox/) && navigator.userAgent.match(/Windows/)) {
                var c = this;
                return setTimeout(function() {
                    c.receiveEvent("load", null)
                },
                100),
                void(this.ready = !0)
            }
            this.ready = !0;
            try {
                this.movie.setText(this.clipText)
            } catch(d) {}
            try {
                this.movie.setHandCursor(this.handCursorEnabled)
            } catch(d) {}
            break;
        case "mouseover":
            this.domElement && this.cssEffects && (this.domElement.addClass("hover"), this.recoverActive && this.domElement.addClass("active"));
            break;
        case "mouseout":
            this.domElement && this.cssEffects && (this.recoverActive = !1, this.domElement.hasClass("active") && (this.domElement.removeClass("active"), this.recoverActive = !0), this.domElement.removeClass("hover"));
            break;
        case "mousedown":
            this.domElement && this.cssEffects && this.domElement.addClass("active");
            break;
        case "mouseup":
            this.domElement && this.cssEffects && (this.domElement.removeClass("active"), this.recoverActive = !1)
        }
        if (this.handlers[a]) for (var e = 0,
        f = this.handlers[a].length; f > e; e++) {
            var g = this.handlers[a][e];
            "function" == typeof g ? g(this, b) : "object" == typeof g && 2 == g.length ? g[0][g[1]](this, b) : "string" == typeof g && window[g](this, b)
        }
    }
};