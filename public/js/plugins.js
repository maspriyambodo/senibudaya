;
window.Modernizr = function(a, b, c) {
        function x(a) {
            j.cssText = a
        }

        function y(a, b) {
            return x(prefixes.join(a + ";") + (b || ""))
        }

        function z(a, b) {
            return typeof a === b
        }

        function A(a, b) {
            return !!~("" + a).indexOf(b)
        }

        function B(a, b) {
            for (var d in a) {
                var e = a[d];
                if (!A(e, "-") && j[e] !== c) return b == "pfx" ? e : !0
            }
            return !1
        }

        function C(a, b, d) {
            for (var e in a) {
                var f = b[a[e]];
                if (f !== c) return d === !1 ? a[e] : z(f, "function") ? f.bind(d || b) : f
            }
            return !1
        }

        function D(a, b, c) {
            var d = a.charAt(0).toUpperCase() + a.slice(1),
                e = (a + " " + n.join(d + " ") + d).split(" ");
            return z(b, "string") || z(b, "undefined") ? B(e, b) : (e = (a + " " + o.join(d + " ") + d).split(" "), C(e, b, c))
        }
        var d = "2.6.2",
            e = {},
            f = !0,
            g = b.documentElement,
            h = "modernizr",
            i = b.createElement(h),
            j = i.style,
            k, l = {}.toString,
            m = "Webkit Moz O ms",
            n = m.split(" "),
            o = m.toLowerCase().split(" "),
            p = {},
            q = {},
            r = {},
            s = [],
            t = s.slice,
            u, v = {}.hasOwnProperty,
            w;
        !z(v, "undefined") && !z(v.call, "undefined") ? w = function(a, b) {
            return v.call(a, b)
        } : w = function(a, b) {
            return b in a && z(a.constructor.prototype[b], "undefined")
        }, Function.prototype.bind || (Function.prototype.bind = function(b) {
            var c = this;
            if (typeof c != "function") throw new TypeError;
            var d = t.call(arguments, 1),
                e = function() {
                    if (this instanceof e) {
                        var a = function() {};
                        a.prototype = c.prototype;
                        var f = new a,
                            g = c.apply(f, d.concat(t.call(arguments)));
                        return Object(g) === g ? g : f
                    }
                    return c.apply(b, d.concat(t.call(arguments)))
                };
            return e
        }), p.csstransitions = function() {
            return D("transition")
        };
        for (var E in p) w(p, E) && (u = E.toLowerCase(), e[u] = p[E](), s.push((e[u] ? "" : "no-") + u));
        return e.addTest = function(a, b) {
                if (typeof a == "object")
                    for (var d in a) w(a, d) && e.addTest(d, a[d]);
                else {
                    a = a.toLowerCase();
                    if (e[a] !== c) return e;
                    b = typeof b == "function" ? b() : b, typeof f != "undefined" && f && (g.className += " " + (b ? "" : "no-") + a), e[a] = b
                }
                return e
            }, x(""), i = k = null,
            function(a, b) {
                function k(a, b) {
                    var c = a.createElement("p"),
                        d = a.getElementsByTagName("head")[0] || a.documentElement;
                    return c.innerHTML = "x<style>" + b + "</style>", d.insertBefore(c.lastChild, d.firstChild)
                }

                function l() {
                    var a = r.elements;
                    return typeof a == "string" ? a.split(" ") : a
                }

                function m(a) {
                    var b = i[a[g]];
                    return b || (b = {}, h++, a[g] = h, i[h] = b), b
                }

                function n(a, c, f) {
                    c || (c = b);
                    if (j) return c.createElement(a);
                    f || (f = m(c));
                    var g;
                    return f.cache[a] ? g = f.cache[a].cloneNode() : e.test(a) ? g = (f.cache[a] = f.createElem(a)).cloneNode() : g = f.createElem(a), g.canHaveChildren && !d.test(a) ? f.frag.appendChild(g) : g
                }

                function o(a, c) {
                    a || (a = b);
                    if (j) return a.createDocumentFragment();
                    c = c || m(a);
                    var d = c.frag.cloneNode(),
                        e = 0,
                        f = l(),
                        g = f.length;
                    for (; e < g; e++) d.createElement(f[e]);
                    return d
                }

                function p(a, b) {
                    b.cache || (b.cache = {}, b.createElem = a.createElement, b.createFrag = a.createDocumentFragment, b.frag = b.createFrag()), a.createElement = function(c) {
                        return r.shivMethods ? n(c, a, b) : b.createElem(c)
                    }, a.createDocumentFragment = Function("h,f", "return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&(" + l().join().replace(/\w+/g, function(a) {
                        return b.createElem(a), b.frag.createElement(a), 'c("' + a + '")'
                    }) + ");return n}")(r, b.frag)
                }

                function q(a) {
                    a || (a = b);
                    var c = m(a);
                    return r.shivCSS && !f && !c.hasCSS && (c.hasCSS = !!k(a, "article,aside,figcaption,figure,footer,header,hgroup,nav,section{display:block}mark{background:#FF0;color:#000}")), j || p(a, c), a
                }
                var c = a.html5 || {},
                    d = /^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,
                    e = /^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,
                    f, g = "_html5shiv",
                    h = 0,
                    i = {},
                    j;
                (function() {
                    try {
                        var a = b.createElement("a");
                        a.innerHTML = "<xyz></xyz>", f = "hidden" in a, j = a.childNodes.length == 1 || function() {
                            b.createElement("a");
                            var a = b.createDocumentFragment();
                            return typeof a.cloneNode == "undefined" || typeof a.createDocumentFragment == "undefined" || typeof a.createElement == "undefined"
                        }()
                    } catch (c) {
                        f = !0, j = !0
                    }
                })();
                var r = {
                    elements: c.elements || "abbr article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output progress section summary time video",
                    shivCSS: c.shivCSS !== !1,
                    supportsUnknownElements: j,
                    shivMethods: c.shivMethods !== !1,
                    type: "default",
                    shivDocument: q,
                    createElement: n,
                    createDocumentFragment: o
                };
                a.html5 = r, q(b)
            }(this, b), e._version = d, e._domPrefixes = o, e._cssomPrefixes = n, e.testProp = function(a) {
                return B([a])
            }, e.testAllProps = D, g.className = g.className.replace(/(^|\s)no-js(\s|$)/, "$1$2") + (f ? " js " + s.join(" ") : ""), e
    }(this, this.document),
    function(a, b, c) {
        function d(a) {
            return "[object Function]" == o.call(a)
        }

        function e(a) {
            return "string" == typeof a
        }

        function f() {}

        function g(a) {
            return !a || "loaded" == a || "complete" == a || "uninitialized" == a
        }

        function h() {
            var a = p.shift();
            q = 1, a ? a.t ? m(function() {
                ("c" == a.t ? B.injectCss : B.injectJs)(a.s, 0, a.a, a.x, a.e, 1)
            }, 0) : (a(), h()) : q = 0
        }

        function i(a, c, d, e, f, i, j) {
            function k(b) {
                if (!o && g(l.readyState) && (u.r = o = 1, !q && h(), l.onload = l.onreadystatechange = null, b)) {
                    "img" != a && m(function() {
                        t.removeChild(l)
                    }, 50);
                    for (var d in y[c]) y[c].hasOwnProperty(d) && y[c][d].onload()
                }
            }
            var j = j || B.errorTimeout,
                l = b.createElement(a),
                o = 0,
                r = 0,
                u = {
                    t: d,
                    s: c,
                    e: f,
                    a: i,
                    x: j
                };
            1 === y[c] && (r = 1, y[c] = []), "object" == a ? l.data = c : (l.src = c, l.type = a), l.width = l.height = "0", l.onerror = l.onload = l.onreadystatechange = function() {
                k.call(this, r)
            }, p.splice(e, 0, u), "img" != a && (r || 2 === y[c] ? (t.insertBefore(l, s ? null : n), m(k, j)) : y[c].push(l))
        }

        function j(a, b, c, d, f) {
            return q = 0, b = b || "j", e(a) ? i("c" == b ? v : u, a, b, this.i++, c, d, f) : (p.splice(this.i++, 0, a), 1 == p.length && h()), this
        }

        function k() {
            var a = B;
            return a.loader = {
                load: j,
                i: 0
            }, a
        }
        var l = b.documentElement,
            m = a.setTimeout,
            n = b.getElementsByTagName("script")[0],
            o = {}.toString,
            p = [],
            q = 0,
            r = "MozAppearance" in l.style,
            s = r && !!b.createRange().compareNode,
            t = s ? l : n.parentNode,
            l = a.opera && "[object Opera]" == o.call(a.opera),
            l = !!b.attachEvent && !l,
            u = r ? "object" : l ? "script" : "img",
            v = l ? "script" : u,
            w = Array.isArray || function(a) {
                return "[object Array]" == o.call(a)
            },
            x = [],
            y = {},
            z = {
                timeout: function(a, b) {
                    return b.length && (a.timeout = b[0]), a
                }
            },
            A, B;
        B = function(a) {
            function b(a) {
                var a = a.split("!"),
                    b = x.length,
                    c = a.pop(),
                    d = a.length,
                    c = {
                        url: c,
                        origUrl: c,
                        prefixes: a
                    },
                    e, f, g;
                for (f = 0; f < d; f++) g = a[f].split("="), (e = z[g.shift()]) && (c = e(c, g));
                for (f = 0; f < b; f++) c = x[f](c);
                return c
            }

            function g(a, e, f, g, h) {
                var i = b(a),
                    j = i.autoCallback;
                i.url.split(".").pop().split("?").shift(), i.bypass || (e && (e = d(e) ? e : e[a] || e[g] || e[a.split("/").pop().split("?")[0]]), i.instead ? i.instead(a, e, f, g, h) : (y[i.url] ? i.noexec = !0 : y[i.url] = 1, f.load(i.url, i.forceCSS || !i.forceJS && "css" == i.url.split(".").pop().split("?").shift() ? "c" : c, i.noexec, i.attrs, i.timeout), (d(e) || d(j)) && f.load(function() {
                    k(), e && e(i.origUrl, h, g), j && j(i.origUrl, h, g), y[i.url] = 2
                })))
            }

            function h(a, b) {
                function c(a, c) {
                    if (a) {
                        if (e(a)) c || (j = function() {
                            var a = [].slice.call(arguments);
                            k.apply(this, a), l()
                        }), g(a, j, b, 0, h);
                        else if (Object(a) === a)
                            for (n in m = function() {
                                    var b = 0,
                                        c;
                                    for (c in a) a.hasOwnProperty(c) && b++;
                                    return b
                                }(), a) a.hasOwnProperty(n) && (!c && !--m && (d(j) ? j = function() {
                                var a = [].slice.call(arguments);
                                k.apply(this, a), l()
                            } : j[n] = function(a) {
                                return function() {
                                    var b = [].slice.call(arguments);
                                    a && a.apply(this, b), l()
                                }
                            }(k[n])), g(a[n], j, b, n, h))
                    } else !c && l()
                }
                var h = !!a.test,
                    i = a.load || a.both,
                    j = a.callback || f,
                    k = j,
                    l = a.complete || f,
                    m, n;
                c(h ? a.yep : a.nope, !!i), i && c(i)
            }
            var i, j, l = this.yepnope.loader;
            if (e(a)) g(a, 0, l, 0);
            else if (w(a))
                for (i = 0; i < a.length; i++) j = a[i], e(j) ? g(j, 0, l, 0) : w(j) ? B(j) : Object(j) === j && h(j, l);
            else Object(a) === a && h(a, l)
        }, B.addPrefix = function(a, b) {
            z[a] = b
        }, B.addFilter = function(a) {
            x.push(a)
        }, B.errorTimeout = 1e4, null == b.readyState && b.addEventListener && (b.readyState = "loading", b.addEventListener("DOMContentLoaded", A = function() {
            b.removeEventListener("DOMContentLoaded", A, 0), b.readyState = "complete"
        }, 0)), a.yepnope = k(), a.yepnope.executeStack = h, a.yepnope.injectJs = function(a, c, d, e, i, j) {
            var k = b.createElement("script"),
                l, o, e = e || B.errorTimeout;
            k.src = a;
            for (o in d) k.setAttribute(o, d[o]);
            c = j ? h : c || f, k.onreadystatechange = k.onload = function() {
                !l && g(k.readyState) && (l = 1, c(), k.onload = k.onreadystatechange = null)
            }, m(function() {
                l || (l = 1, c(1))
            }, e), i ? k.onload() : n.parentNode.insertBefore(k, n)
        }, a.yepnope.injectCss = function(a, c, d, e, g, i) {
            var e = b.createElement("link"),
                j, c = i ? h : c || f;
            e.href = a, e.rel = "stylesheet", e.type = "text/css";
            for (j in d) e.setAttribute(j, d[j]);
            g || (n.parentNode.insertBefore(e, n), m(c, 0))
        }
    }(this, document), Modernizr.load = function() {
        yepnope.apply(window, [].slice.call(arguments, 0))
    };
jQuery.easing.jswing = jQuery.easing.swing;
jQuery.extend(jQuery.easing, {
    def: "easeOutQuad",
    swing: function(e, f, a, h, g) {
        return jQuery.easing[jQuery.easing.def](e, f, a, h, g)
    },
    easeInQuad: function(e, f, a, h, g) {
        return h * (f /= g) * f + a
    },
    easeOutQuad: function(e, f, a, h, g) {
        return -h * (f /= g) * (f - 2) + a
    },
    easeInOutQuad: function(e, f, a, h, g) {
        if ((f /= g / 2) < 1) {
            return h / 2 * f * f + a
        }
        return -h / 2 * ((--f) * (f - 2) - 1) + a
    },
    easeInCubic: function(e, f, a, h, g) {
        return h * (f /= g) * f * f + a
    },
    easeOutCubic: function(e, f, a, h, g) {
        return h * ((f = f / g - 1) * f * f + 1) + a
    },
    easeInOutCubic: function(e, f, a, h, g) {
        if ((f /= g / 2) < 1) {
            return h / 2 * f * f * f + a
        }
        return h / 2 * ((f -= 2) * f * f + 2) + a
    },
    easeInQuart: function(e, f, a, h, g) {
        return h * (f /= g) * f * f * f + a
    },
    easeOutQuart: function(e, f, a, h, g) {
        return -h * ((f = f / g - 1) * f * f * f - 1) + a
    },
    easeInOutQuart: function(e, f, a, h, g) {
        if ((f /= g / 2) < 1) {
            return h / 2 * f * f * f * f + a
        }
        return -h / 2 * ((f -= 2) * f * f * f - 2) + a
    },
    easeInQuint: function(e, f, a, h, g) {
        return h * (f /= g) * f * f * f * f + a
    },
    easeOutQuint: function(e, f, a, h, g) {
        return h * ((f = f / g - 1) * f * f * f * f + 1) + a
    },
    easeInOutQuint: function(e, f, a, h, g) {
        if ((f /= g / 2) < 1) {
            return h / 2 * f * f * f * f * f + a
        }
        return h / 2 * ((f -= 2) * f * f * f * f + 2) + a
    },
    easeInSine: function(e, f, a, h, g) {
        return -h * Math.cos(f / g * (Math.PI / 2)) + h + a
    },
    easeOutSine: function(e, f, a, h, g) {
        return h * Math.sin(f / g * (Math.PI / 2)) + a
    },
    easeInOutSine: function(e, f, a, h, g) {
        return -h / 2 * (Math.cos(Math.PI * f / g) - 1) + a
    },
    easeInExpo: function(e, f, a, h, g) {
        return (f == 0) ? a : h * Math.pow(2, 10 * (f / g - 1)) + a
    },
    easeOutExpo: function(e, f, a, h, g) {
        return (f == g) ? a + h : h * (-Math.pow(2, -10 * f / g) + 1) + a
    },
    easeInOutExpo: function(e, f, a, h, g) {
        if (f == 0) {
            return a
        }
        if (f == g) {
            return a + h
        }
        if ((f /= g / 2) < 1) {
            return h / 2 * Math.pow(2, 10 * (f - 1)) + a
        }
        return h / 2 * (-Math.pow(2, -10 * --f) + 2) + a
    },
    easeInCirc: function(e, f, a, h, g) {
        return -h * (Math.sqrt(1 - (f /= g) * f) - 1) + a
    },
    easeOutCirc: function(e, f, a, h, g) {
        return h * Math.sqrt(1 - (f = f / g - 1) * f) + a
    },
    easeInOutCirc: function(e, f, a, h, g) {
        if ((f /= g / 2) < 1) {
            return -h / 2 * (Math.sqrt(1 - f * f) - 1) + a
        }
        return h / 2 * (Math.sqrt(1 - (f -= 2) * f) + 1) + a
    },
    easeInElastic: function(f, h, e, l, k) {
        var i = 1.70158;
        var j = 0;
        var g = l;
        if (h == 0) {
            return e
        }
        if ((h /= k) == 1) {
            return e + l
        }
        if (!j) {
            j = k * 0.3
        }
        if (g < Math.abs(l)) {
            g = l;
            var i = j / 4
        } else {
            var i = j / (2 * Math.PI) * Math.asin(l / g)
        }
        return -(g * Math.pow(2, 10 * (h -= 1)) * Math.sin((h * k - i) * (2 * Math.PI) / j)) + e
    },
    easeOutElastic: function(f, h, e, l, k) {
        var i = 1.70158;
        var j = 0;
        var g = l;
        if (h == 0) {
            return e
        }
        if ((h /= k) == 1) {
            return e + l
        }
        if (!j) {
            j = k * 0.3
        }
        if (g < Math.abs(l)) {
            g = l;
            var i = j / 4
        } else {
            var i = j / (2 * Math.PI) * Math.asin(l / g)
        }
        return g * Math.pow(2, -10 * h) * Math.sin((h * k - i) * (2 * Math.PI) / j) + l + e
    },
    easeInOutElastic: function(f, h, e, l, k) {
        var i = 1.70158;
        var j = 0;
        var g = l;
        if (h == 0) {
            return e
        }
        if ((h /= k / 2) == 2) {
            return e + l
        }
        if (!j) {
            j = k * (0.3 * 1.5)
        }
        if (g < Math.abs(l)) {
            g = l;
            var i = j / 4
        } else {
            var i = j / (2 * Math.PI) * Math.asin(l / g)
        }
        if (h < 1) {
            return -0.5 * (g * Math.pow(2, 10 * (h -= 1)) * Math.sin((h * k - i) * (2 * Math.PI) / j)) + e
        }
        return g * Math.pow(2, -10 * (h -= 1)) * Math.sin((h * k - i) * (2 * Math.PI) / j) * 0.5 + l + e
    },
    easeInBack: function(e, f, a, i, h, g) {
        if (g == undefined) {
            g = 1.70158
        }
        return i * (f /= h) * f * ((g + 1) * f - g) + a
    },
    easeOutBack: function(e, f, a, i, h, g) {
        if (g == undefined) {
            g = 1.70158
        }
        return i * ((f = f / h - 1) * f * ((g + 1) * f + g) + 1) + a
    },
    easeInOutBack: function(e, f, a, i, h, g) {
        if (g == undefined) {
            g = 1.70158
        }
        if ((f /= h / 2) < 1) {
            return i / 2 * (f * f * (((g *= (1.525)) + 1) * f - g)) + a
        }
        return i / 2 * ((f -= 2) * f * (((g *= (1.525)) + 1) * f + g) + 2) + a
    },
    easeInBounce: function(e, f, a, h, g) {
        return h - jQuery.easing.easeOutBounce(e, g - f, 0, h, g) + a
    },
    easeOutBounce: function(e, f, a, h, g) {
        if ((f /= g) < (1 / 2.75)) {
            return h * (7.5625 * f * f) + a
        } else {
            if (f < (2 / 2.75)) {
                return h * (7.5625 * (f -= (1.5 / 2.75)) * f + 0.75) + a
            } else {
                if (f < (2.5 / 2.75)) {
                    return h * (7.5625 * (f -= (2.25 / 2.75)) * f + 0.9375) + a
                } else {
                    return h * (7.5625 * (f -= (2.625 / 2.75)) * f + 0.984375) + a
                }
            }
        }
    },
    easeInOutBounce: function(e, f, a, h, g) {
        if (f < g / 2) {
            return jQuery.easing.easeInBounce(e, f * 2, 0, h, g) * 0.5 + a
        }
        return jQuery.easing.easeOutBounce(e, f * 2 - g, 0, h, g) * 0.5 + h * 0.5 + a
    }
});
/*!
 * Isotope PACKAGED v2.2.2
 *
 * Licensed GPLv3 for open source use
 * or Isotope Commercial License for commercial use
 *
 * http://isotope.metafizzy.co
 * Copyright 2015 Metafizzy
 */
! function(a) {
    function b() {}

    function c(a) {
        function c(b) {
            b.prototype.option || (b.prototype.option = function(b) {
                a.isPlainObject(b) && (this.options = a.extend(!0, this.options, b))
            })
        }

        function e(b, c) {
            a.fn[b] = function(e) {
                if ("string" == typeof e) {
                    for (var g = d.call(arguments, 1), h = 0, i = this.length; i > h; h++) {
                        var j = this[h],
                            k = a.data(j, b);
                        if (k)
                            if (a.isFunction(k[e]) && "_" !== e.charAt(0)) {
                                var l = k[e].apply(k, g);
                                if (void 0 !== l) return l
                            } else f("no such method '" + e + "' for " + b + " instance");
                        else f("cannot call methods on " + b + " prior to initialization; attempted to call '" + e + "'")
                    }
                    return this
                }
                return this.each(function() {
                    var d = a.data(this, b);
                    d ? (d.option(e), d._init()) : (d = new c(this, e), a.data(this, b, d))
                })
            }
        }
        if (a) {
            var f = "undefined" == typeof console ? b : function(a) {
                console.error(a)
            };
            return a.bridget = function(a, b) {
                c(b), e(a, b)
            }, a.bridget
        }
    }
    var d = Array.prototype.slice;
    "function" == typeof define && define.amd ? define("jquery-bridget/jquery.bridget", ["jquery"], c) : c("object" == typeof exports ? require("jquery") : a.jQuery)
}(window),
function(a) {
    function b(b) {
        var c = a.event;
        return c.target = c.target || c.srcElement || b, c
    }
    var c = document.documentElement,
        d = function() {};
    c.addEventListener ? d = function(a, b, c) {
        a.addEventListener(b, c, !1)
    } : c.attachEvent && (d = function(a, c, d) {
        a[c + d] = d.handleEvent ? function() {
            var c = b(a);
            d.handleEvent.call(d, c)
        } : function() {
            var c = b(a);
            d.call(a, c)
        }, a.attachEvent("on" + c, a[c + d])
    });
    var e = function() {};
    c.removeEventListener ? e = function(a, b, c) {
        a.removeEventListener(b, c, !1)
    } : c.detachEvent && (e = function(a, b, c) {
        a.detachEvent("on" + b, a[b + c]);
        try {
            delete a[b + c]
        } catch (d) {
            a[b + c] = void 0
        }
    });
    var f = {
        bind: d,
        unbind: e
    };
    "function" == typeof define && define.amd ? define("eventie/eventie", f) : "object" == typeof exports ? module.exports = f : a.eventie = f
}(window),
function() {
    "use strict";

    function a() {}

    function b(a, b) {
        for (var c = a.length; c--;)
            if (a[c].listener === b) return c;
        return -1
    }

    function c(a) {
        return function() {
            return this[a].apply(this, arguments)
        }
    }
    var d = a.prototype,
        e = this,
        f = e.EventEmitter;
    d.getListeners = function(a) {
        var b, c, d = this._getEvents();
        if (a instanceof RegExp) {
            b = {};
            for (c in d) d.hasOwnProperty(c) && a.test(c) && (b[c] = d[c])
        } else b = d[a] || (d[a] = []);
        return b
    }, d.flattenListeners = function(a) {
        var b, c = [];
        for (b = 0; b < a.length; b += 1) c.push(a[b].listener);
        return c
    }, d.getListenersAsObject = function(a) {
        var b, c = this.getListeners(a);
        return c instanceof Array && (b = {}, b[a] = c), b || c
    }, d.addListener = function(a, c) {
        var d, e = this.getListenersAsObject(a),
            f = "object" == typeof c;
        for (d in e) e.hasOwnProperty(d) && -1 === b(e[d], c) && e[d].push(f ? c : {
            listener: c,
            once: !1
        });
        return this
    }, d.on = c("addListener"), d.addOnceListener = function(a, b) {
        return this.addListener(a, {
            listener: b,
            once: !0
        })
    }, d.once = c("addOnceListener"), d.defineEvent = function(a) {
        return this.getListeners(a), this
    }, d.defineEvents = function(a) {
        for (var b = 0; b < a.length; b += 1) this.defineEvent(a[b]);
        return this
    }, d.removeListener = function(a, c) {
        var d, e, f = this.getListenersAsObject(a);
        for (e in f) f.hasOwnProperty(e) && (d = b(f[e], c), -1 !== d && f[e].splice(d, 1));
        return this
    }, d.off = c("removeListener"), d.addListeners = function(a, b) {
        return this.manipulateListeners(!1, a, b)
    }, d.removeListeners = function(a, b) {
        return this.manipulateListeners(!0, a, b)
    }, d.manipulateListeners = function(a, b, c) {
        var d, e, f = a ? this.removeListener : this.addListener,
            g = a ? this.removeListeners : this.addListeners;
        if ("object" != typeof b || b instanceof RegExp)
            for (d = c.length; d--;) f.call(this, b, c[d]);
        else
            for (d in b) b.hasOwnProperty(d) && (e = b[d]) && ("function" == typeof e ? f.call(this, d, e) : g.call(this, d, e));
        return this
    }, d.removeEvent = function(a) {
        var b, c = typeof a,
            d = this._getEvents();
        if ("string" === c) delete d[a];
        else if (a instanceof RegExp)
            for (b in d) d.hasOwnProperty(b) && a.test(b) && delete d[b];
        else delete this._events;
        return this
    }, d.removeAllListeners = c("removeEvent"), d.emitEvent = function(a, b) {
        var c, d, e, f, g = this.getListenersAsObject(a);
        for (e in g)
            if (g.hasOwnProperty(e))
                for (d = g[e].length; d--;) c = g[e][d], c.once === !0 && this.removeListener(a, c.listener), f = c.listener.apply(this, b || []), f === this._getOnceReturnValue() && this.removeListener(a, c.listener);
        return this
    }, d.trigger = c("emitEvent"), d.emit = function(a) {
        var b = Array.prototype.slice.call(arguments, 1);
        return this.emitEvent(a, b)
    }, d.setOnceReturnValue = function(a) {
        return this._onceReturnValue = a, this
    }, d._getOnceReturnValue = function() {
        return this.hasOwnProperty("_onceReturnValue") ? this._onceReturnValue : !0
    }, d._getEvents = function() {
        return this._events || (this._events = {})
    }, a.noConflict = function() {
        return e.EventEmitter = f, a
    }, "function" == typeof define && define.amd ? define("eventEmitter/EventEmitter", [], function() {
        return a
    }) : "object" == typeof module && module.exports ? module.exports = a : e.EventEmitter = a
}.call(this),
    function(a) {
        function b(a) {
            if (a) {
                if ("string" == typeof d[a]) return a;
                a = a.charAt(0).toUpperCase() + a.slice(1);
                for (var b, e = 0, f = c.length; f > e; e++)
                    if (b = c[e] + a, "string" == typeof d[b]) return b
            }
        }
        var c = "Webkit Moz ms Ms O".split(" "),
            d = document.documentElement.style;
        "function" == typeof define && define.amd ? define("get-style-property/get-style-property", [], function() {
            return b
        }) : "object" == typeof exports ? module.exports = b : a.getStyleProperty = b
    }(window),
    function(a, b) {
        function c(a) {
            var b = parseFloat(a),
                c = -1 === a.indexOf("%") && !isNaN(b);
            return c && b
        }

        function d() {}

        function e() {
            for (var a = {
                    width: 0,
                    height: 0,
                    innerWidth: 0,
                    innerHeight: 0,
                    outerWidth: 0,
                    outerHeight: 0
                }, b = 0, c = h.length; c > b; b++) {
                var d = h[b];
                a[d] = 0
            }
            return a
        }

        function f(b) {
            function d() {
                if (!m) {
                    m = !0;
                    var d = a.getComputedStyle;
                    if (j = function() {
                            var a = d ? function(a) {
                                return d(a, null)
                            } : function(a) {
                                return a.currentStyle
                            };
                            return function(b) {
                                var c = a(b);
                                return c || g("Style returned " + c + ". Are you running this code in a hidden iframe on Firefox? See http://bit.ly/getsizebug1"), c
                            }
                        }(), k = b("boxSizing")) {
                        var e = document.createElement("div");
                        e.style.width = "200px", e.style.padding = "1px 2px 3px 4px", e.style.borderStyle = "solid", e.style.borderWidth = "1px 2px 3px 4px", e.style[k] = "border-box";
                        var f = document.body || document.documentElement;
                        f.appendChild(e);
                        var h = j(e);
                        l = 200 === c(h.width), f.removeChild(e)
                    }
                }
            }

            function f(a) {
                if (d(), "string" == typeof a && (a = document.querySelector(a)), a && "object" == typeof a && a.nodeType) {
                    var b = j(a);
                    if ("none" === b.display) return e();
                    var f = {};
                    f.width = a.offsetWidth, f.height = a.offsetHeight;
                    for (var g = f.isBorderBox = !(!k || !b[k] || "border-box" !== b[k]), m = 0, n = h.length; n > m; m++) {
                        var o = h[m],
                            p = b[o];
                        p = i(a, p);
                        var q = parseFloat(p);
                        f[o] = isNaN(q) ? 0 : q
                    }
                    var r = f.paddingLeft + f.paddingRight,
                        s = f.paddingTop + f.paddingBottom,
                        t = f.marginLeft + f.marginRight,
                        u = f.marginTop + f.marginBottom,
                        v = f.borderLeftWidth + f.borderRightWidth,
                        w = f.borderTopWidth + f.borderBottomWidth,
                        x = g && l,
                        y = c(b.width);
                    y !== !1 && (f.width = y + (x ? 0 : r + v));
                    var z = c(b.height);
                    return z !== !1 && (f.height = z + (x ? 0 : s + w)), f.innerWidth = f.width - (r + v), f.innerHeight = f.height - (s + w), f.outerWidth = f.width + t, f.outerHeight = f.height + u, f
                }
            }

            function i(b, c) {
                if (a.getComputedStyle || -1 === c.indexOf("%")) return c;
                var d = b.style,
                    e = d.left,
                    f = b.runtimeStyle,
                    g = f && f.left;
                return g && (f.left = b.currentStyle.left), d.left = c, c = d.pixelLeft, d.left = e, g && (f.left = g), c
            }
            var j, k, l, m = !1;
            return f
        }
        var g = "undefined" == typeof console ? d : function(a) {
                console.error(a)
            },
            h = ["paddingLeft", "paddingRight", "paddingTop", "paddingBottom", "marginLeft", "marginRight", "marginTop", "marginBottom", "borderLeftWidth", "borderRightWidth", "borderTopWidth", "borderBottomWidth"];
        "function" == typeof define && define.amd ? define("get-size/get-size", ["get-style-property/get-style-property"], f) : "object" == typeof exports ? module.exports = f(require("desandro-get-style-property")) : a.getSize = f(a.getStyleProperty)
    }(window),
    function(a) {
        function b(a) {
            "function" == typeof a && (b.isReady ? a() : g.push(a))
        }

        function c(a) {
            var c = "readystatechange" === a.type && "complete" !== f.readyState;
            b.isReady || c || d()
        }

        function d() {
            b.isReady = !0;
            for (var a = 0, c = g.length; c > a; a++) {
                var d = g[a];
                d()
            }
        }

        function e(e) {
            return "complete" === f.readyState ? d() : (e.bind(f, "DOMContentLoaded", c), e.bind(f, "readystatechange", c), e.bind(a, "load", c)), b
        }
        var f = a.document,
            g = [];
        b.isReady = !1, "function" == typeof define && define.amd ? define("doc-ready/doc-ready", ["eventie/eventie"], e) : "object" == typeof exports ? module.exports = e(require("eventie")) : a.docReady = e(a.eventie)
    }(window),
    function(a) {
        "use strict";

        function b(a, b) {
            return a[g](b)
        }

        function c(a) {
            if (!a.parentNode) {
                var b = document.createDocumentFragment();
                b.appendChild(a)
            }
        }

        function d(a, b) {
            c(a);
            for (var d = a.parentNode.querySelectorAll(b), e = 0, f = d.length; f > e; e++)
                if (d[e] === a) return !0;
            return !1
        }

        function e(a, d) {
            return c(a), b(a, d)
        }
        var f, g = function() {
            if (a.matches) return "matches";
            if (a.matchesSelector) return "matchesSelector";
            for (var b = ["webkit", "moz", "ms", "o"], c = 0, d = b.length; d > c; c++) {
                var e = b[c],
                    f = e + "MatchesSelector";
                if (a[f]) return f
            }
        }();
        if (g) {
            var h = document.createElement("div"),
                i = b(h, "div");
            f = i ? b : e
        } else f = d;
        "function" == typeof define && define.amd ? define("matches-selector/matches-selector", [], function() {
            return f
        }) : "object" == typeof exports ? module.exports = f : window.matchesSelector = f
    }(Element.prototype),
    function(a, b) {
        "use strict";
        "function" == typeof define && define.amd ? define("fizzy-ui-utils/utils", ["doc-ready/doc-ready", "matches-selector/matches-selector"], function(c, d) {
            return b(a, c, d)
        }) : "object" == typeof exports ? module.exports = b(a, require("doc-ready"), require("desandro-matches-selector")) : a.fizzyUIUtils = b(a, a.docReady, a.matchesSelector)
    }(window, function(a, b, c) {
        var d = {};
        d.extend = function(a, b) {
            for (var c in b) a[c] = b[c];
            return a
        }, d.modulo = function(a, b) {
            return (a % b + b) % b
        };
        var e = Object.prototype.toString;
        d.isArray = function(a) {
            return "[object Array]" == e.call(a)
        }, d.makeArray = function(a) {
            var b = [];
            if (d.isArray(a)) b = a;
            else if (a && "number" == typeof a.length)
                for (var c = 0, e = a.length; e > c; c++) b.push(a[c]);
            else b.push(a);
            return b
        }, d.indexOf = Array.prototype.indexOf ? function(a, b) {
            return a.indexOf(b)
        } : function(a, b) {
            for (var c = 0, d = a.length; d > c; c++)
                if (a[c] === b) return c;
            return -1
        }, d.removeFrom = function(a, b) {
            var c = d.indexOf(a, b); - 1 != c && a.splice(c, 1)
        }, d.isElement = "function" == typeof HTMLElement || "object" == typeof HTMLElement ? function(a) {
            return a instanceof HTMLElement
        } : function(a) {
            return a && "object" == typeof a && 1 == a.nodeType && "string" == typeof a.nodeName
        }, d.setText = function() {
            function a(a, c) {
                b = b || (void 0 !== document.documentElement.textContent ? "textContent" : "innerText"), a[b] = c
            }
            var b;
            return a
        }(), d.getParent = function(a, b) {
            for (; a != document.body;)
                if (a = a.parentNode, c(a, b)) return a
        }, d.getQueryElement = function(a) {
            return "string" == typeof a ? document.querySelector(a) : a
        }, d.handleEvent = function(a) {
            var b = "on" + a.type;
            this[b] && this[b](a)
        }, d.filterFindElements = function(a, b) {
            a = d.makeArray(a);
            for (var e = [], f = 0, g = a.length; g > f; f++) {
                var h = a[f];
                if (d.isElement(h))
                    if (b) {
                        c(h, b) && e.push(h);
                        for (var i = h.querySelectorAll(b), j = 0, k = i.length; k > j; j++) e.push(i[j])
                    } else e.push(h)
            }
            return e
        }, d.debounceMethod = function(a, b, c) {
            var d = a.prototype[b],
                e = b + "Timeout";
            a.prototype[b] = function() {
                var a = this[e];
                a && clearTimeout(a);
                var b = arguments,
                    f = this;
                this[e] = setTimeout(function() {
                    d.apply(f, b), delete f[e]
                }, c || 100)
            }
        }, d.toDashed = function(a) {
            return a.replace(/(.)([A-Z])/g, function(a, b, c) {
                return b + "-" + c
            }).toLowerCase()
        };
        var f = a.console;
        return d.htmlInit = function(c, e) {
            b(function() {
                for (var b = d.toDashed(e), g = document.querySelectorAll(".js-" + b), h = "data-" + b + "-options", i = 0, j = g.length; j > i; i++) {
                    var k, l = g[i],
                        m = l.getAttribute(h);
                    try {
                        k = m && JSON.parse(m)
                    } catch (n) {
                        f && f.error("Error parsing " + h + " on " + l.nodeName.toLowerCase() + (l.id ? "#" + l.id : "") + ": " + n);
                        continue
                    }
                    var o = new c(l, k),
                        p = a.jQuery;
                    p && p.data(l, e, o)
                }
            })
        }, d
    }),
    function(a, b) {
        "use strict";
        "function" == typeof define && define.amd ? define("outlayer/item", ["eventEmitter/EventEmitter", "get-size/get-size", "get-style-property/get-style-property", "fizzy-ui-utils/utils"], function(c, d, e, f) {
            return b(a, c, d, e, f)
        }) : "object" == typeof exports ? module.exports = b(a, require("wolfy87-eventemitter"), require("get-size"), require("desandro-get-style-property"), require("fizzy-ui-utils")) : (a.Outlayer = {}, a.Outlayer.Item = b(a, a.EventEmitter, a.getSize, a.getStyleProperty, a.fizzyUIUtils))
    }(window, function(a, b, c, d, e) {
        "use strict";

        function f(a) {
            for (var b in a) return !1;
            return b = null, !0
        }

        function g(a, b) {
            a && (this.element = a, this.layout = b, this.position = {
                x: 0,
                y: 0
            }, this._create())
        }

        function h(a) {
            return a.replace(/([A-Z])/g, function(a) {
                return "-" + a.toLowerCase()
            })
        }
        var i = a.getComputedStyle,
            j = i ? function(a) {
                return i(a, null)
            } : function(a) {
                return a.currentStyle
            },
            k = d("transition"),
            l = d("transform"),
            m = k && l,
            n = !!d("perspective"),
            o = {
                WebkitTransition: "webkitTransitionEnd",
                MozTransition: "transitionend",
                OTransition: "otransitionend",
                transition: "transitionend"
            }[k],
            p = ["transform", "transition", "transitionDuration", "transitionProperty"],
            q = function() {
                for (var a = {}, b = 0, c = p.length; c > b; b++) {
                    var e = p[b],
                        f = d(e);
                    f && f !== e && (a[e] = f)
                }
                return a
            }();
        e.extend(g.prototype, b.prototype), g.prototype._create = function() {
            this._transn = {
                ingProperties: {},
                clean: {},
                onEnd: {}
            }, this.css({
                position: "absolute"
            })
        }, g.prototype.handleEvent = function(a) {
            var b = "on" + a.type;
            this[b] && this[b](a)
        }, g.prototype.getSize = function() {
            this.size = c(this.element)
        }, g.prototype.css = function(a) {
            var b = this.element.style;
            for (var c in a) {
                var d = q[c] || c;
                b[d] = a[c]
            }
        }, g.prototype.getPosition = function() {
            var a = j(this.element),
                b = this.layout.options,
                c = b.isOriginLeft,
                d = b.isOriginTop,
                e = a[c ? "left" : "right"],
                f = a[d ? "top" : "bottom"],
                g = this.layout.size,
                h = -1 != e.indexOf("%") ? parseFloat(e) / 100 * g.width : parseInt(e, 10),
                i = -1 != f.indexOf("%") ? parseFloat(f) / 100 * g.height : parseInt(f, 10);
            h = isNaN(h) ? 0 : h, i = isNaN(i) ? 0 : i, h -= c ? g.paddingLeft : g.paddingRight, i -= d ? g.paddingTop : g.paddingBottom, this.position.x = h, this.position.y = i
        }, g.prototype.layoutPosition = function() {
            var a = this.layout.size,
                b = this.layout.options,
                c = {},
                d = b.isOriginLeft ? "paddingLeft" : "paddingRight",
                e = b.isOriginLeft ? "left" : "right",
                f = b.isOriginLeft ? "right" : "left",
                g = this.position.x + a[d];
            c[e] = this.getXValue(g), c[f] = "";
            var h = b.isOriginTop ? "paddingTop" : "paddingBottom",
                i = b.isOriginTop ? "top" : "bottom",
                j = b.isOriginTop ? "bottom" : "top",
                k = this.position.y + a[h];
            c[i] = this.getYValue(k), c[j] = "", this.css(c), this.emitEvent("layout", [this])
        }, g.prototype.getXValue = function(a) {
            var b = this.layout.options;
            return b.percentPosition && !b.isHorizontal ? a / this.layout.size.width * 100 + "%" : a + "px"
        }, g.prototype.getYValue = function(a) {
            var b = this.layout.options;
            return b.percentPosition && b.isHorizontal ? a / this.layout.size.height * 100 + "%" : a + "px"
        }, g.prototype._transitionTo = function(a, b) {
            this.getPosition();
            var c = this.position.x,
                d = this.position.y,
                e = parseInt(a, 10),
                f = parseInt(b, 10),
                g = e === this.position.x && f === this.position.y;
            if (this.setPosition(a, b), g && !this.isTransitioning) return void this.layoutPosition();
            var h = a - c,
                i = b - d,
                j = {};
            j.transform = this.getTranslate(h, i), this.transition({
                to: j,
                onTransitionEnd: {
                    transform: this.layoutPosition
                },
                isCleaning: !0
            })
        }, g.prototype.getTranslate = function(a, b) {
            var c = this.layout.options;
            return a = c.isOriginLeft ? a : -a, b = c.isOriginTop ? b : -b, n ? "translate3d(" + a + "px, " + b + "px, 0)" : "translate(" + a + "px, " + b + "px)"
        }, g.prototype.goTo = function(a, b) {
            this.setPosition(a, b), this.layoutPosition()
        }, g.prototype.moveTo = m ? g.prototype._transitionTo : g.prototype.goTo, g.prototype.setPosition = function(a, b) {
            this.position.x = parseInt(a, 10), this.position.y = parseInt(b, 10)
        }, g.prototype._nonTransition = function(a) {
            this.css(a.to), a.isCleaning && this._removeStyles(a.to);
            for (var b in a.onTransitionEnd) a.onTransitionEnd[b].call(this)
        }, g.prototype._transition = function(a) {
            if (!parseFloat(this.layout.options.transitionDuration)) return void this._nonTransition(a);
            var b = this._transn;
            for (var c in a.onTransitionEnd) b.onEnd[c] = a.onTransitionEnd[c];
            for (c in a.to) b.ingProperties[c] = !0, a.isCleaning && (b.clean[c] = !0);
            if (a.from) {
                this.css(a.from);
                var d = this.element.offsetHeight;
                d = null
            }
            this.enableTransition(a.to), this.css(a.to), this.isTransitioning = !0
        };
        var r = "opacity," + h(q.transform || "transform");
        g.prototype.enableTransition = function() {
            this.isTransitioning || (this.css({
                transitionProperty: r,
                transitionDuration: this.layout.options.transitionDuration
            }), this.element.addEventListener(o, this, !1))
        }, g.prototype.transition = g.prototype[k ? "_transition" : "_nonTransition"], g.prototype.onwebkitTransitionEnd = function(a) {
            this.ontransitionend(a)
        }, g.prototype.onotransitionend = function(a) {
            this.ontransitionend(a)
        };
        var s = {
            "-webkit-transform": "transform",
            "-moz-transform": "transform",
            "-o-transform": "transform"
        };
        g.prototype.ontransitionend = function(a) {
            if (a.target === this.element) {
                var b = this._transn,
                    c = s[a.propertyName] || a.propertyName;
                if (delete b.ingProperties[c], f(b.ingProperties) && this.disableTransition(), c in b.clean && (this.element.style[a.propertyName] = "", delete b.clean[c]), c in b.onEnd) {
                    var d = b.onEnd[c];
                    d.call(this), delete b.onEnd[c]
                }
                this.emitEvent("transitionEnd", [this])
            }
        }, g.prototype.disableTransition = function() {
            this.removeTransitionStyles(), this.element.removeEventListener(o, this, !1), this.isTransitioning = !1
        }, g.prototype._removeStyles = function(a) {
            var b = {};
            for (var c in a) b[c] = "";
            this.css(b)
        };
        var t = {
            transitionProperty: "",
            transitionDuration: ""
        };
        return g.prototype.removeTransitionStyles = function() {
            this.css(t)
        }, g.prototype.removeElem = function() {
            this.element.parentNode.removeChild(this.element), this.css({
                display: ""
            }), this.emitEvent("remove", [this])
        }, g.prototype.remove = function() {
            if (!k || !parseFloat(this.layout.options.transitionDuration)) return void this.removeElem();
            var a = this;
            this.once("transitionEnd", function() {
                a.removeElem()
            }), this.hide()
        }, g.prototype.reveal = function() {
            delete this.isHidden, this.css({
                display: ""
            });
            var a = this.layout.options,
                b = {},
                c = this.getHideRevealTransitionEndProperty("visibleStyle");
            b[c] = this.onRevealTransitionEnd, this.transition({
                from: a.hiddenStyle,
                to: a.visibleStyle,
                isCleaning: !0,
                onTransitionEnd: b
            })
        }, g.prototype.onRevealTransitionEnd = function() {
            this.isHidden || this.emitEvent("reveal")
        }, g.prototype.getHideRevealTransitionEndProperty = function(a) {
            var b = this.layout.options[a];
            if (b.opacity) return "opacity";
            for (var c in b) return c
        }, g.prototype.hide = function() {
            this.isHidden = !0, this.css({
                display: ""
            });
            var a = this.layout.options,
                b = {},
                c = this.getHideRevealTransitionEndProperty("hiddenStyle");
            b[c] = this.onHideTransitionEnd, this.transition({
                from: a.visibleStyle,
                to: a.hiddenStyle,
                isCleaning: !0,
                onTransitionEnd: b
            })
        }, g.prototype.onHideTransitionEnd = function() {
            this.isHidden && (this.css({
                display: "none"
            }), this.emitEvent("hide"))
        }, g.prototype.destroy = function() {
            this.css({
                position: "",
                left: "",
                right: "",
                top: "",
                bottom: "",
                transition: "",
                transform: ""
            })
        }, g
    }),
    function(a, b) {
        "use strict";
        "function" == typeof define && define.amd ? define("outlayer/outlayer", ["eventie/eventie", "eventEmitter/EventEmitter", "get-size/get-size", "fizzy-ui-utils/utils", "./item"], function(c, d, e, f, g) {
            return b(a, c, d, e, f, g)
        }) : "object" == typeof exports ? module.exports = b(a, require("eventie"), require("wolfy87-eventemitter"), require("get-size"), require("fizzy-ui-utils"), require("./item")) : a.Outlayer = b(a, a.eventie, a.EventEmitter, a.getSize, a.fizzyUIUtils, a.Outlayer.Item)
    }(window, function(a, b, c, d, e, f) {
        "use strict";

        function g(a, b) {
            var c = e.getQueryElement(a);
            if (!c) return void(h && h.error("Bad element for " + this.constructor.namespace + ": " + (c || a)));
            this.element = c, i && (this.$element = i(this.element)), this.options = e.extend({}, this.constructor.defaults), this.option(b);
            var d = ++k;
            this.element.outlayerGUID = d, l[d] = this, this._create(), this.options.isInitLayout && this.layout()
        }
        var h = a.console,
            i = a.jQuery,
            j = function() {},
            k = 0,
            l = {};
        return g.namespace = "outlayer", g.Item = f, g.defaults = {
            containerStyle: {
                position: "relative"
            },
            isInitLayout: !0,
            isOriginLeft: !0,
            isOriginTop: !0,
            isResizeBound: !0,
            isResizingContainer: !0,
            transitionDuration: "0.4s",
            hiddenStyle: {
                opacity: 0,
                transform: "scale(0.001)"
            },
            visibleStyle: {
                opacity: 1,
                transform: "scale(1)"
            }
        }, e.extend(g.prototype, c.prototype), g.prototype.option = function(a) {
            e.extend(this.options, a)
        }, g.prototype._create = function() {
            this.reloadItems(), this.stamps = [], this.stamp(this.options.stamp), e.extend(this.element.style, this.options.containerStyle), this.options.isResizeBound && this.bindResize()
        }, g.prototype.reloadItems = function() {
            this.items = this._itemize(this.element.children)
        }, g.prototype._itemize = function(a) {
            for (var b = this._filterFindItemElements(a), c = this.constructor.Item, d = [], e = 0, f = b.length; f > e; e++) {
                var g = b[e],
                    h = new c(g, this);
                d.push(h)
            }
            return d
        }, g.prototype._filterFindItemElements = function(a) {
            return e.filterFindElements(a, this.options.itemSelector)
        }, g.prototype.getItemElements = function() {
            for (var a = [], b = 0, c = this.items.length; c > b; b++) a.push(this.items[b].element);
            return a
        }, g.prototype.layout = function() {
            this._resetLayout(), this._manageStamps();
            var a = void 0 !== this.options.isLayoutInstant ? this.options.isLayoutInstant : !this._isLayoutInited;
            this.layoutItems(this.items, a), this._isLayoutInited = !0
        }, g.prototype._init = g.prototype.layout, g.prototype._resetLayout = function() {
            this.getSize()
        }, g.prototype.getSize = function() {
            this.size = d(this.element)
        }, g.prototype._getMeasurement = function(a, b) {
            var c, f = this.options[a];
            f ? ("string" == typeof f ? c = this.element.querySelector(f) : e.isElement(f) && (c = f), this[a] = c ? d(c)[b] : f) : this[a] = 0
        }, g.prototype.layoutItems = function(a, b) {
            a = this._getItemsForLayout(a), this._layoutItems(a, b), this._postLayout()
        }, g.prototype._getItemsForLayout = function(a) {
            for (var b = [], c = 0, d = a.length; d > c; c++) {
                var e = a[c];
                e.isIgnored || b.push(e)
            }
            return b
        }, g.prototype._layoutItems = function(a, b) {
            if (this._emitCompleteOnItems("layout", a), a && a.length) {
                for (var c = [], d = 0, e = a.length; e > d; d++) {
                    var f = a[d],
                        g = this._getItemLayoutPosition(f);
                    g.item = f, g.isInstant = b || f.isLayoutInstant, c.push(g)
                }
                this._processLayoutQueue(c)
            }
        }, g.prototype._getItemLayoutPosition = function() {
            return {
                x: 0,
                y: 0
            }
        }, g.prototype._processLayoutQueue = function(a) {
            for (var b = 0, c = a.length; c > b; b++) {
                var d = a[b];
                this._positionItem(d.item, d.x, d.y, d.isInstant)
            }
        }, g.prototype._positionItem = function(a, b, c, d) {
            d ? a.goTo(b, c) : a.moveTo(b, c)
        }, g.prototype._postLayout = function() {
            this.resizeContainer()
        }, g.prototype.resizeContainer = function() {
            if (this.options.isResizingContainer) {
                var a = this._getContainerSize();
                a && (this._setContainerMeasure(a.width, !0), this._setContainerMeasure(a.height, !1))
            }
        }, g.prototype._getContainerSize = j, g.prototype._setContainerMeasure = function(a, b) {
            if (void 0 !== a) {
                var c = this.size;
                c.isBorderBox && (a += b ? c.paddingLeft + c.paddingRight + c.borderLeftWidth + c.borderRightWidth : c.paddingBottom + c.paddingTop + c.borderTopWidth + c.borderBottomWidth), a = Math.max(a, 0), this.element.style[b ? "width" : "height"] = a + "px"
            }
        }, g.prototype._emitCompleteOnItems = function(a, b) {
            function c() {
                e.dispatchEvent(a + "Complete", null, [b])
            }

            function d() {
                g++, g === f && c()
            }
            var e = this,
                f = b.length;
            if (!b || !f) return void c();
            for (var g = 0, h = 0, i = b.length; i > h; h++) {
                var j = b[h];
                j.once(a, d)
            }
        }, g.prototype.dispatchEvent = function(a, b, c) {
            var d = b ? [b].concat(c) : c;
            if (this.emitEvent(a, d), i)
                if (this.$element = this.$element || i(this.element), b) {
                    var e = i.Event(b);
                    e.type = a, this.$element.trigger(e, c)
                } else this.$element.trigger(a, c)
        }, g.prototype.ignore = function(a) {
            var b = this.getItem(a);
            b && (b.isIgnored = !0)
        }, g.prototype.unignore = function(a) {
            var b = this.getItem(a);
            b && delete b.isIgnored
        }, g.prototype.stamp = function(a) {
            if (a = this._find(a)) {
                this.stamps = this.stamps.concat(a);
                for (var b = 0, c = a.length; c > b; b++) {
                    var d = a[b];
                    this.ignore(d)
                }
            }
        }, g.prototype.unstamp = function(a) {
            if (a = this._find(a))
                for (var b = 0, c = a.length; c > b; b++) {
                    var d = a[b];
                    e.removeFrom(this.stamps, d), this.unignore(d)
                }
        }, g.prototype._find = function(a) {
            return a ? ("string" == typeof a && (a = this.element.querySelectorAll(a)), a = e.makeArray(a)) : void 0
        }, g.prototype._manageStamps = function() {
            if (this.stamps && this.stamps.length) {
                this._getBoundingRect();
                for (var a = 0, b = this.stamps.length; b > a; a++) {
                    var c = this.stamps[a];
                    this._manageStamp(c)
                }
            }
        }, g.prototype._getBoundingRect = function() {
            var a = this.element.getBoundingClientRect(),
                b = this.size;
            this._boundingRect = {
                left: a.left + b.paddingLeft + b.borderLeftWidth,
                top: a.top + b.paddingTop + b.borderTopWidth,
                right: a.right - (b.paddingRight + b.borderRightWidth),
                bottom: a.bottom - (b.paddingBottom + b.borderBottomWidth)
            }
        }, g.prototype._manageStamp = j, g.prototype._getElementOffset = function(a) {
            var b = a.getBoundingClientRect(),
                c = this._boundingRect,
                e = d(a),
                f = {
                    left: b.left - c.left - e.marginLeft,
                    top: b.top - c.top - e.marginTop,
                    right: c.right - b.right - e.marginRight,
                    bottom: c.bottom - b.bottom - e.marginBottom
                };
            return f
        }, g.prototype.handleEvent = function(a) {
            var b = "on" + a.type;
            this[b] && this[b](a)
        }, g.prototype.bindResize = function() {
            this.isResizeBound || (b.bind(a, "resize", this), this.isResizeBound = !0)
        }, g.prototype.unbindResize = function() {
            this.isResizeBound && b.unbind(a, "resize", this), this.isResizeBound = !1
        }, g.prototype.onresize = function() {
            function a() {
                b.resize(), delete b.resizeTimeout
            }
            this.resizeTimeout && clearTimeout(this.resizeTimeout);
            var b = this;
            this.resizeTimeout = setTimeout(a, 100)
        }, g.prototype.resize = function() {
            this.isResizeBound && this.needsResizeLayout() && this.layout()
        }, g.prototype.needsResizeLayout = function() {
            var a = d(this.element),
                b = this.size && a;
            return b && a.innerWidth !== this.size.innerWidth
        }, g.prototype.addItems = function(a) {
            var b = this._itemize(a);
            return b.length && (this.items = this.items.concat(b)), b
        }, g.prototype.appended = function(a) {
            var b = this.addItems(a);
            b.length && (this.layoutItems(b, !0), this.reveal(b))
        }, g.prototype.prepended = function(a) {
            var b = this._itemize(a);
            if (b.length) {
                var c = this.items.slice(0);
                this.items = b.concat(c), this._resetLayout(), this._manageStamps(), this.layoutItems(b, !0), this.reveal(b), this.layoutItems(c)
            }
        }, g.prototype.reveal = function(a) {
            this._emitCompleteOnItems("reveal", a);
            for (var b = a && a.length, c = 0; b && b > c; c++) {
                var d = a[c];
                d.reveal()
            }
        }, g.prototype.hide = function(a) {
            this._emitCompleteOnItems("hide", a);
            for (var b = a && a.length, c = 0; b && b > c; c++) {
                var d = a[c];
                d.hide()
            }
        }, g.prototype.revealItemElements = function(a) {
            var b = this.getItems(a);
            this.reveal(b)
        }, g.prototype.hideItemElements = function(a) {
            var b = this.getItems(a);
            this.hide(b)
        }, g.prototype.getItem = function(a) {
            for (var b = 0, c = this.items.length; c > b; b++) {
                var d = this.items[b];
                if (d.element === a) return d
            }
        }, g.prototype.getItems = function(a) {
            a = e.makeArray(a);
            for (var b = [], c = 0, d = a.length; d > c; c++) {
                var f = a[c],
                    g = this.getItem(f);
                g && b.push(g)
            }
            return b
        }, g.prototype.remove = function(a) {
            var b = this.getItems(a);
            if (this._emitCompleteOnItems("remove", b), b && b.length)
                for (var c = 0, d = b.length; d > c; c++) {
                    var f = b[c];
                    f.remove(), e.removeFrom(this.items, f)
                }
        }, g.prototype.destroy = function() {
            var a = this.element.style;
            a.height = "", a.position = "", a.width = "";
            for (var b = 0, c = this.items.length; c > b; b++) {
                var d = this.items[b];
                d.destroy()
            }
            this.unbindResize();
            var e = this.element.outlayerGUID;
            delete l[e], delete this.element.outlayerGUID, i && i.removeData(this.element, this.constructor.namespace)
        }, g.data = function(a) {
            a = e.getQueryElement(a);
            var b = a && a.outlayerGUID;
            return b && l[b]
        }, g.create = function(a, b) {
            function c() {
                g.apply(this, arguments)
            }
            return Object.create ? c.prototype = Object.create(g.prototype) : e.extend(c.prototype, g.prototype), c.prototype.constructor = c, c.defaults = e.extend({}, g.defaults), e.extend(c.defaults, b), c.prototype.settings = {}, c.namespace = a, c.data = g.data, c.Item = function() {
                f.apply(this, arguments)
            }, c.Item.prototype = new f, e.htmlInit(c, a), i && i.bridget && i.bridget(a, c), c
        }, g.Item = f, g
    }),
    function(a, b) {
        "use strict";
        "function" == typeof define && define.amd ? define("isotope/js/item", ["outlayer/outlayer"], b) : "object" == typeof exports ? module.exports = b(require("outlayer")) : (a.Isotope = a.Isotope || {}, a.Isotope.Item = b(a.Outlayer))
    }(window, function(a) {
        "use strict";

        function b() {
            a.Item.apply(this, arguments)
        }
        b.prototype = new a.Item, b.prototype._create = function() {
            this.id = this.layout.itemGUID++, a.Item.prototype._create.call(this), this.sortData = {}
        }, b.prototype.updateSortData = function() {
            if (!this.isIgnored) {
                this.sortData.id = this.id, this.sortData["original-order"] = this.id, this.sortData.random = Math.random();
                var a = this.layout.options.getSortData,
                    b = this.layout._sorters;
                for (var c in a) {
                    var d = b[c];
                    this.sortData[c] = d(this.element, this)
                }
            }
        };
        var c = b.prototype.destroy;
        return b.prototype.destroy = function() {
            c.apply(this, arguments), this.css({
                display: ""
            })
        }, b
    }),
    function(a, b) {
        "use strict";
        "function" == typeof define && define.amd ? define("isotope/js/layout-mode", ["get-size/get-size", "outlayer/outlayer"], b) : "object" == typeof exports ? module.exports = b(require("get-size"), require("outlayer")) : (a.Isotope = a.Isotope || {}, a.Isotope.LayoutMode = b(a.getSize, a.Outlayer))
    }(window, function(a, b) {
        "use strict";

        function c(a) {
            this.isotope = a, a && (this.options = a.options[this.namespace], this.element = a.element, this.items = a.filteredItems, this.size = a.size)
        }
        return function() {
            function a(a) {
                return function() {
                    return b.prototype[a].apply(this.isotope, arguments)
                }
            }
            for (var d = ["_resetLayout", "_getItemLayoutPosition", "_manageStamp", "_getContainerSize", "_getElementOffset", "needsResizeLayout"], e = 0, f = d.length; f > e; e++) {
                var g = d[e];
                c.prototype[g] = a(g)
            }
        }(), c.prototype.needsVerticalResizeLayout = function() {
            var b = a(this.isotope.element),
                c = this.isotope.size && b;
            return c && b.innerHeight != this.isotope.size.innerHeight
        }, c.prototype._getMeasurement = function() {
            this.isotope._getMeasurement.apply(this, arguments)
        }, c.prototype.getColumnWidth = function() {
            this.getSegmentSize("column", "Width")
        }, c.prototype.getRowHeight = function() {
            this.getSegmentSize("row", "Height")
        }, c.prototype.getSegmentSize = function(a, b) {
            var c = a + b,
                d = "outer" + b;
            if (this._getMeasurement(c, d), !this[c]) {
                var e = this.getFirstItemSize();
                this[c] = e && e[d] || this.isotope.size["inner" + b]
            }
        }, c.prototype.getFirstItemSize = function() {
            var b = this.isotope.filteredItems[0];
            return b && b.element && a(b.element)
        }, c.prototype.layout = function() {
            this.isotope.layout.apply(this.isotope, arguments)
        }, c.prototype.getSize = function() {
            this.isotope.getSize(), this.size = this.isotope.size
        }, c.modes = {}, c.create = function(a, b) {
            function d() {
                c.apply(this, arguments)
            }
            return d.prototype = new c, b && (d.options = b), d.prototype.namespace = a, c.modes[a] = d, d
        }, c
    }),
    function(a, b) {
        "use strict";
        "function" == typeof define && define.amd ? define("masonry/masonry", ["outlayer/outlayer", "get-size/get-size", "fizzy-ui-utils/utils"], b) : "object" == typeof exports ? module.exports = b(require("outlayer"), require("get-size"), require("fizzy-ui-utils")) : a.Masonry = b(a.Outlayer, a.getSize, a.fizzyUIUtils)
    }(window, function(a, b, c) {
        var d = a.create("masonry");
        return d.prototype._resetLayout = function() {
            this.getSize(), this._getMeasurement("columnWidth", "outerWidth"), this._getMeasurement("gutter", "outerWidth"), this.measureColumns();
            var a = this.cols;
            for (this.colYs = []; a--;) this.colYs.push(0);
            this.maxY = 0
        }, d.prototype.measureColumns = function() {
            if (this.getContainerWidth(), !this.columnWidth) {
                var a = this.items[0],
                    c = a && a.element;
                this.columnWidth = c && b(c).outerWidth || this.containerWidth
            }
            var d = this.columnWidth += this.gutter,
                e = this.containerWidth + this.gutter,
                f = e / d,
                g = d - e % d,
                h = g && 1 > g ? "round" : "floor";
            f = Math[h](f), this.cols = Math.max(f, 1)
        }, d.prototype.getContainerWidth = function() {
            var a = this.options.isFitWidth ? this.element.parentNode : this.element,
                c = b(a);
            this.containerWidth = c && c.innerWidth
        }, d.prototype._getItemLayoutPosition = function(a) {
            a.getSize();
            var b = a.size.outerWidth % this.columnWidth,
                d = b && 1 > b ? "round" : "ceil",
                e = Math[d](a.size.outerWidth / this.columnWidth);
            e = Math.min(e, this.cols);
            for (var f = this._getColGroup(e), g = Math.min.apply(Math, f), h = c.indexOf(f, g), i = {
                    x: this.columnWidth * h,
                    y: g
                }, j = g + a.size.outerHeight, k = this.cols + 1 - f.length, l = 0; k > l; l++) this.colYs[h + l] = j;
            return i
        }, d.prototype._getColGroup = function(a) {
            if (2 > a) return this.colYs;
            for (var b = [], c = this.cols + 1 - a, d = 0; c > d; d++) {
                var e = this.colYs.slice(d, d + a);
                b[d] = Math.max.apply(Math, e)
            }
            return b
        }, d.prototype._manageStamp = function(a) {
            var c = b(a),
                d = this._getElementOffset(a),
                e = this.options.isOriginLeft ? d.left : d.right,
                f = e + c.outerWidth,
                g = Math.floor(e / this.columnWidth);
            g = Math.max(0, g);
            var h = Math.floor(f / this.columnWidth);
            h -= f % this.columnWidth ? 0 : 1, h = Math.min(this.cols - 1, h);
            for (var i = (this.options.isOriginTop ? d.top : d.bottom) + c.outerHeight, j = g; h >= j; j++) this.colYs[j] = Math.max(i, this.colYs[j])
        }, d.prototype._getContainerSize = function() {
            this.maxY = Math.max.apply(Math, this.colYs);
            var a = {
                height: this.maxY
            };
            return this.options.isFitWidth && (a.width = this._getContainerFitWidth()), a
        }, d.prototype._getContainerFitWidth = function() {
            for (var a = 0, b = this.cols; --b && 0 === this.colYs[b];) a++;
            return (this.cols - a) * this.columnWidth - this.gutter
        }, d.prototype.needsResizeLayout = function() {
            var a = this.containerWidth;
            return this.getContainerWidth(), a !== this.containerWidth
        }, d
    }),
    function(a, b) {
        "use strict";
        "function" == typeof define && define.amd ? define("isotope/js/layout-modes/masonry", ["../layout-mode", "masonry/masonry"], b) : "object" == typeof exports ? module.exports = b(require("../layout-mode"), require("masonry-layout")) : b(a.Isotope.LayoutMode, a.Masonry)
    }(window, function(a, b) {
        "use strict";

        function c(a, b) {
            for (var c in b) a[c] = b[c];
            return a
        }
        var d = a.create("masonry"),
            e = d.prototype._getElementOffset,
            f = d.prototype.layout,
            g = d.prototype._getMeasurement;
        c(d.prototype, b.prototype), d.prototype._getElementOffset = e, d.prototype.layout = f, d.prototype._getMeasurement = g;
        var h = d.prototype.measureColumns;
        d.prototype.measureColumns = function() {
            this.items = this.isotope.filteredItems, h.call(this)
        };
        var i = d.prototype._manageStamp;
        return d.prototype._manageStamp = function() {
            this.options.isOriginLeft = this.isotope.options.isOriginLeft, this.options.isOriginTop = this.isotope.options.isOriginTop, i.apply(this, arguments)
        }, d
    }),
    function(a, b) {
        "use strict";
        "function" == typeof define && define.amd ? define("isotope/js/layout-modes/fit-rows", ["../layout-mode"], b) : "object" == typeof exports ? module.exports = b(require("../layout-mode")) : b(a.Isotope.LayoutMode)
    }(window, function(a) {
        "use strict";
        var b = a.create("fitRows");
        return b.prototype._resetLayout = function() {
            this.x = 0, this.y = 0, this.maxY = 0, this._getMeasurement("gutter", "outerWidth")
        }, b.prototype._getItemLayoutPosition = function(a) {
            a.getSize();
            var b = a.size.outerWidth + this.gutter,
                c = this.isotope.size.innerWidth + this.gutter;
            0 !== this.x && b + this.x > c && (this.x = 0, this.y = this.maxY);
            var d = {
                x: this.x,
                y: this.y
            };
            return this.maxY = Math.max(this.maxY, this.y + a.size.outerHeight), this.x += b, d
        }, b.prototype._getContainerSize = function() {
            return {
                height: this.maxY
            }
        }, b
    }),
    function(a, b) {
        "use strict";
        "function" == typeof define && define.amd ? define("isotope/js/layout-modes/vertical", ["../layout-mode"], b) : "object" == typeof exports ? module.exports = b(require("../layout-mode")) : b(a.Isotope.LayoutMode)
    }(window, function(a) {
        "use strict";
        var b = a.create("vertical", {
            horizontalAlignment: 0
        });
        return b.prototype._resetLayout = function() {
            this.y = 0
        }, b.prototype._getItemLayoutPosition = function(a) {
            a.getSize();
            var b = (this.isotope.size.innerWidth - a.size.outerWidth) * this.options.horizontalAlignment,
                c = this.y;
            return this.y += a.size.outerHeight, {
                x: b,
                y: c
            }
        }, b.prototype._getContainerSize = function() {
            return {
                height: this.y
            }
        }, b
    }),
    function(a, b) {
        "use strict";
        "function" == typeof define && define.amd ? define(["outlayer/outlayer", "get-size/get-size", "matches-selector/matches-selector", "fizzy-ui-utils/utils", "isotope/js/item", "isotope/js/layout-mode", "isotope/js/layout-modes/masonry", "isotope/js/layout-modes/fit-rows", "isotope/js/layout-modes/vertical"], function(c, d, e, f, g, h) {
            return b(a, c, d, e, f, g, h)
        }) : "object" == typeof exports ? module.exports = b(a, require("outlayer"), require("get-size"), require("desandro-matches-selector"), require("fizzy-ui-utils"), require("./item"), require("./layout-mode"), require("./layout-modes/masonry"), require("./layout-modes/fit-rows"), require("./layout-modes/vertical")) : a.Isotope = b(a, a.Outlayer, a.getSize, a.matchesSelector, a.fizzyUIUtils, a.Isotope.Item, a.Isotope.LayoutMode)
    }(window, function(a, b, c, d, e, f, g) {
        function h(a, b) {
            return function(c, d) {
                for (var e = 0, f = a.length; f > e; e++) {
                    var g = a[e],
                        h = c.sortData[g],
                        i = d.sortData[g];
                    if (h > i || i > h) {
                        var j = void 0 !== b[g] ? b[g] : b,
                            k = j ? 1 : -1;
                        return (h > i ? 1 : -1) * k
                    }
                }
                return 0
            }
        }
        var i = a.jQuery,
            j = String.prototype.trim ? function(a) {
                return a.trim()
            } : function(a) {
                return a.replace(/^\s+|\s+$/g, "")
            },
            k = document.documentElement,
            l = k.textContent ? function(a) {
                return a.textContent
            } : function(a) {
                return a.innerText
            },
            m = b.create("isotope", {
                layoutMode: "masonry",
                isJQueryFiltering: !0,
                sortAscending: !0
            });
        m.Item = f, m.LayoutMode = g, m.prototype._create = function() {
            this.itemGUID = 0, this._sorters = {}, this._getSorters(), b.prototype._create.call(this), this.modes = {}, this.filteredItems = this.items, this.sortHistory = ["original-order"];
            for (var a in g.modes) this._initLayoutMode(a)
        }, m.prototype.reloadItems = function() {
            this.itemGUID = 0, b.prototype.reloadItems.call(this)
        }, m.prototype._itemize = function() {
            for (var a = b.prototype._itemize.apply(this, arguments), c = 0, d = a.length; d > c; c++) {
                var e = a[c];
                e.id = this.itemGUID++
            }
            return this._updateItemsSortData(a), a
        }, m.prototype._initLayoutMode = function(a) {
            var b = g.modes[a],
                c = this.options[a] || {};
            this.options[a] = b.options ? e.extend(b.options, c) : c, this.modes[a] = new b(this)
        }, m.prototype.layout = function() {
            return !this._isLayoutInited && this.options.isInitLayout ? void this.arrange() : void this._layout()
        }, m.prototype._layout = function() {
            var a = this._getIsInstant();
            this._resetLayout(), this._manageStamps(), this.layoutItems(this.filteredItems, a), this._isLayoutInited = !0
        }, m.prototype.arrange = function(a) {
            function b() {
                d.reveal(c.needReveal), d.hide(c.needHide)
            }
            this.option(a), this._getIsInstant();
            var c = this._filter(this.items);
            this.filteredItems = c.matches;
            var d = this;
            this._bindArrangeComplete(), this._isInstant ? this._noTransition(b) : b(), this._sort(), this._layout()
        }, m.prototype._init = m.prototype.arrange, m.prototype._getIsInstant = function() {
            var a = void 0 !== this.options.isLayoutInstant ? this.options.isLayoutInstant : !this._isLayoutInited;
            return this._isInstant = a, a
        }, m.prototype._bindArrangeComplete = function() {
            function a() {
                b && c && d && e.dispatchEvent("arrangeComplete", null, [e.filteredItems])
            }
            var b, c, d, e = this;
            this.once("layoutComplete", function() {
                b = !0, a()
            }), this.once("hideComplete", function() {
                c = !0, a()
            }), this.once("revealComplete", function() {
                d = !0, a()
            })
        }, m.prototype._filter = function(a) {
            var b = this.options.filter;
            b = b || "*";
            for (var c = [], d = [], e = [], f = this._getFilterTest(b), g = 0, h = a.length; h > g; g++) {
                var i = a[g];
                if (!i.isIgnored) {
                    var j = f(i);
                    j && c.push(i), j && i.isHidden ? d.push(i) : j || i.isHidden || e.push(i)
                }
            }
            return {
                matches: c,
                needReveal: d,
                needHide: e
            }
        }, m.prototype._getFilterTest = function(a) {
            return i && this.options.isJQueryFiltering ? function(b) {
                return i(b.element).is(a)
            } : "function" == typeof a ? function(b) {
                return a(b.element)
            } : function(b) {
                return d(b.element, a)
            }
        }, m.prototype.updateSortData = function(a) {
            var b;
            a ? (a = e.makeArray(a), b = this.getItems(a)) : b = this.items, this._getSorters(), this._updateItemsSortData(b)
        }, m.prototype._getSorters = function() {
            var a = this.options.getSortData;
            for (var b in a) {
                var c = a[b];
                this._sorters[b] = n(c)
            }
        }, m.prototype._updateItemsSortData = function(a) {
            for (var b = a && a.length, c = 0; b && b > c; c++) {
                var d = a[c];
                d.updateSortData()
            }
        };
        var n = function() {
            function a(a) {
                if ("string" != typeof a) return a;
                var c = j(a).split(" "),
                    d = c[0],
                    e = d.match(/^\[(.+)\]$/),
                    f = e && e[1],
                    g = b(f, d),
                    h = m.sortDataParsers[c[1]];
                return a = h ? function(a) {
                    return a && h(g(a))
                } : function(a) {
                    return a && g(a)
                }
            }

            function b(a, b) {
                var c;
                return c = a ? function(b) {
                    return b.getAttribute(a)
                } : function(a) {
                    var c = a.querySelector(b);
                    return c && l(c)
                }
            }
            return a
        }();
        m.sortDataParsers = {
            parseInt: function(a) {
                return parseInt(a, 10)
            },
            parseFloat: function(a) {
                return parseFloat(a)
            }
        }, m.prototype._sort = function() {
            var a = this.options.sortBy;
            if (a) {
                var b = [].concat.apply(a, this.sortHistory),
                    c = h(b, this.options.sortAscending);
                this.filteredItems.sort(c), a != this.sortHistory[0] && this.sortHistory.unshift(a)
            }
        }, m.prototype._mode = function() {
            var a = this.options.layoutMode,
                b = this.modes[a];
            if (!b) throw new Error("No layout mode: " + a);
            return b.options = this.options[a], b
        }, m.prototype._resetLayout = function() {
            b.prototype._resetLayout.call(this), this._mode()._resetLayout()
        }, m.prototype._getItemLayoutPosition = function(a) {
            return this._mode()._getItemLayoutPosition(a)
        }, m.prototype._manageStamp = function(a) {
            this._mode()._manageStamp(a)
        }, m.prototype._getContainerSize = function() {
            return this._mode()._getContainerSize()
        }, m.prototype.needsResizeLayout = function() {
            return this._mode().needsResizeLayout()
        }, m.prototype.appended = function(a) {
            var b = this.addItems(a);
            if (b.length) {
                var c = this._filterRevealAdded(b);
                this.filteredItems = this.filteredItems.concat(c)
            }
        }, m.prototype.prepended = function(a) {
            var b = this._itemize(a);
            if (b.length) {
                this._resetLayout(), this._manageStamps();
                var c = this._filterRevealAdded(b);
                this.layoutItems(this.filteredItems), this.filteredItems = c.concat(this.filteredItems), this.items = b.concat(this.items)
            }
        }, m.prototype._filterRevealAdded = function(a) {
            var b = this._filter(a);
            return this.hide(b.needHide), this.reveal(b.matches), this.layoutItems(b.matches, !0), b.matches
        }, m.prototype.insert = function(a) {
            var b = this.addItems(a);
            if (b.length) {
                var c, d, e = b.length;
                for (c = 0; e > c; c++) d = b[c], this.element.appendChild(d.element);
                var f = this._filter(b).matches;
                for (c = 0; e > c; c++) b[c].isLayoutInstant = !0;
                for (this.arrange(), c = 0; e > c; c++) delete b[c].isLayoutInstant;
                this.reveal(f)
            }
        };
        var o = m.prototype.remove;
        return m.prototype.remove = function(a) {
            a = e.makeArray(a);
            var b = this.getItems(a);
            o.call(this, a);
            var c = b && b.length;
            if (c)
                for (var d = 0; c > d; d++) {
                    var f = b[d];
                    e.removeFrom(this.filteredItems, f)
                }
        }, m.prototype.shuffle = function() {
            for (var a = 0, b = this.items.length; b > a; a++) {
                var c = this.items[a];
                c.sortData.random = Math.random()
            }
            this.options.sortBy = "random", this._sort(), this._layout()
        }, m.prototype._noTransition = function(a) {
            var b = this.options.transitionDuration;
            this.options.transitionDuration = 0;
            var c = a.call(this);
            return this.options.transitionDuration = b, c
        }, m.prototype.getFilteredItemElements = function() {
            for (var a = [], b = 0, c = this.filteredItems.length; c > b; b++) a.push(this.filteredItems[b].element);
            return a
        }, m
    });
(function() {
    function e() {}

    function t(e, t) {
        for (var n = e.length; n--;)
            if (e[n].listener === t) return n;
        return -1
    }

    function n(e) {
        return function() {
            return this[e].apply(this, arguments)
        }
    }
    var i = e.prototype,
        r = this,
        o = r.EventEmitter;
    i.getListeners = function(e) {
        var t, n, i = this._getEvents();
        if ("object" == typeof e) {
            t = {};
            for (n in i) i.hasOwnProperty(n) && e.test(n) && (t[n] = i[n])
        } else t = i[e] || (i[e] = []);
        return t
    }, i.flattenListeners = function(e) {
        var t, n = [];
        for (t = 0; e.length > t; t += 1) n.push(e[t].listener);
        return n
    }, i.getListenersAsObject = function(e) {
        var t, n = this.getListeners(e);
        return n instanceof Array && (t = {}, t[e] = n), t || n
    }, i.addListener = function(e, n) {
        var i, r = this.getListenersAsObject(e),
            o = "object" == typeof n;
        for (i in r) r.hasOwnProperty(i) && -1 === t(r[i], n) && r[i].push(o ? n : {
            listener: n,
            once: !1
        });
        return this
    }, i.on = n("addListener"), i.addOnceListener = function(e, t) {
        return this.addListener(e, {
            listener: t,
            once: !0
        })
    }, i.once = n("addOnceListener"), i.defineEvent = function(e) {
        return this.getListeners(e), this
    }, i.defineEvents = function(e) {
        for (var t = 0; e.length > t; t += 1) this.defineEvent(e[t]);
        return this
    }, i.removeListener = function(e, n) {
        var i, r, o = this.getListenersAsObject(e);
        for (r in o) o.hasOwnProperty(r) && (i = t(o[r], n), -1 !== i && o[r].splice(i, 1));
        return this
    }, i.off = n("removeListener"), i.addListeners = function(e, t) {
        return this.manipulateListeners(!1, e, t)
    }, i.removeListeners = function(e, t) {
        return this.manipulateListeners(!0, e, t)
    }, i.manipulateListeners = function(e, t, n) {
        var i, r, o = e ? this.removeListener : this.addListener,
            s = e ? this.removeListeners : this.addListeners;
        if ("object" != typeof t || t instanceof RegExp)
            for (i = n.length; i--;) o.call(this, t, n[i]);
        else
            for (i in t) t.hasOwnProperty(i) && (r = t[i]) && ("function" == typeof r ? o.call(this, i, r) : s.call(this, i, r));
        return this
    }, i.removeEvent = function(e) {
        var t, n = typeof e,
            i = this._getEvents();
        if ("string" === n) delete i[e];
        else if ("object" === n)
            for (t in i) i.hasOwnProperty(t) && e.test(t) && delete i[t];
        else delete this._events;
        return this
    }, i.removeAllListeners = n("removeEvent"), i.emitEvent = function(e, t) {
        var n, i, r, o, s = this.getListenersAsObject(e);
        for (r in s)
            if (s.hasOwnProperty(r))
                for (i = s[r].length; i--;) n = s[r][i], n.once === !0 && this.removeListener(e, n.listener), o = n.listener.apply(this, t || []), o === this._getOnceReturnValue() && this.removeListener(e, n.listener);
        return this
    }, i.trigger = n("emitEvent"), i.emit = function(e) {
        var t = Array.prototype.slice.call(arguments, 1);
        return this.emitEvent(e, t)
    }, i.setOnceReturnValue = function(e) {
        return this._onceReturnValue = e, this
    }, i._getOnceReturnValue = function() {
        return this.hasOwnProperty("_onceReturnValue") ? this._onceReturnValue : !0
    }, i._getEvents = function() {
        return this._events || (this._events = {})
    }, e.noConflict = function() {
        return r.EventEmitter = o, e
    }, "function" == typeof define && define.amd ? define("eventEmitter/EventEmitter", [], function() {
        return e
    }) : "object" == typeof module && module.exports ? module.exports = e : this.EventEmitter = e
}).call(this),
    function(e) {
        function t(t) {
            var n = e.event;
            return n.target = n.target || n.srcElement || t, n
        }
        var n = document.documentElement,
            i = function() {};
        n.addEventListener ? i = function(e, t, n) {
            e.addEventListener(t, n, !1)
        } : n.attachEvent && (i = function(e, n, i) {
            e[n + i] = i.handleEvent ? function() {
                var n = t(e);
                i.handleEvent.call(i, n)
            } : function() {
                var n = t(e);
                i.call(e, n)
            }, e.attachEvent("on" + n, e[n + i])
        });
        var r = function() {};
        n.removeEventListener ? r = function(e, t, n) {
            e.removeEventListener(t, n, !1)
        } : n.detachEvent && (r = function(e, t, n) {
            e.detachEvent("on" + t, e[t + n]);
            try {
                delete e[t + n]
            } catch (i) {
                e[t + n] = void 0
            }
        });
        var o = {
            bind: i,
            unbind: r
        };
        "function" == typeof define && define.amd ? define("eventie/eventie", o) : e.eventie = o
    }(this),
    function(e, t) {
        "function" == typeof define && define.amd ? define(["eventEmitter/EventEmitter", "eventie/eventie"], function(n, i) {
            return t(e, n, i)
        }) : "object" == typeof exports ? module.exports = t(e, require("wolfy87-eventemitter"), require("eventie")) : e.imagesLoaded = t(e, e.EventEmitter, e.eventie)
    }(window, function(e, t, n) {
        function i(e, t) {
            for (var n in t) e[n] = t[n];
            return e
        }

        function r(e) {
            return "[object Array]" === d.call(e)
        }

        function o(e) {
            var t = [];
            if (r(e)) t = e;
            else if ("number" == typeof e.length)
                for (var n = 0, i = e.length; i > n; n++) t.push(e[n]);
            else t.push(e);
            return t
        }

        function s(e, t, n) {
            if (!(this instanceof s)) return new s(e, t);
            "string" == typeof e && (e = document.querySelectorAll(e)), this.elements = o(e), this.options = i({}, this.options), "function" == typeof t ? n = t : i(this.options, t), n && this.on("always", n), this.getImages(), a && (this.jqDeferred = new a.Deferred);
            var r = this;
            setTimeout(function() {
                r.check()
            })
        }

        function f(e) {
            this.img = e
        }

        function c(e) {
            this.src = e, v[e] = this
        }
        var a = e.jQuery,
            u = e.console,
            h = u !== void 0,
            d = Object.prototype.toString;
        s.prototype = new t, s.prototype.options = {}, s.prototype.getImages = function() {
            this.images = [];
            for (var e = 0, t = this.elements.length; t > e; e++) {
                var n = this.elements[e];
                "IMG" === n.nodeName && this.addImage(n);
                var i = n.nodeType;
                if (i && (1 === i || 9 === i || 11 === i))
                    for (var r = n.querySelectorAll("img"), o = 0, s = r.length; s > o; o++) {
                        var f = r[o];
                        this.addImage(f)
                    }
            }
        }, s.prototype.addImage = function(e) {
            var t = new f(e);
            this.images.push(t)
        }, s.prototype.check = function() {
            function e(e, r) {
                return t.options.debug && h && u.log("confirm", e, r), t.progress(e), n++, n === i && t.complete(), !0
            }
            var t = this,
                n = 0,
                i = this.images.length;
            if (this.hasAnyBroken = !1, !i) return this.complete(), void 0;
            for (var r = 0; i > r; r++) {
                var o = this.images[r];
                o.on("confirm", e), o.check()
            }
        }, s.prototype.progress = function(e) {
            this.hasAnyBroken = this.hasAnyBroken || !e.isLoaded;
            var t = this;
            setTimeout(function() {
                t.emit("progress", t, e), t.jqDeferred && t.jqDeferred.notify && t.jqDeferred.notify(t, e)
            })
        }, s.prototype.complete = function() {
            var e = this.hasAnyBroken ? "fail" : "done";
            this.isComplete = !0;
            var t = this;
            setTimeout(function() {
                if (t.emit(e, t), t.emit("always", t), t.jqDeferred) {
                    var n = t.hasAnyBroken ? "reject" : "resolve";
                    t.jqDeferred[n](t)
                }
            })
        }, a && (a.fn.imagesLoaded = function(e, t) {
            var n = new s(this, e, t);
            return n.jqDeferred.promise(a(this))
        }), f.prototype = new t, f.prototype.check = function() {
            var e = v[this.img.src] || new c(this.img.src);
            if (e.isConfirmed) return this.confirm(e.isLoaded, "cached was confirmed"), void 0;
            if (this.img.complete && void 0 !== this.img.naturalWidth) return this.confirm(0 !== this.img.naturalWidth, "naturalWidth"), void 0;
            var t = this;
            e.on("confirm", function(e, n) {
                return t.confirm(e.isLoaded, n), !0
            }), e.check()
        }, f.prototype.confirm = function(e, t) {
            this.isLoaded = e, this.emit("confirm", this, t)
        };
        var v = {};
        return c.prototype = new t, c.prototype.check = function() {
            if (!this.isChecked) {
                var e = new Image;
                n.bind(e, "load", this), n.bind(e, "error", this), e.src = this.src, this.isChecked = !0
            }
        }, c.prototype.handleEvent = function(e) {
            var t = "on" + e.type;
            this[t] && this[t](e)
        }, c.prototype.onload = function(e) {
            this.confirm(!0, "onload"), this.unbindProxyEvents(e)
        }, c.prototype.onerror = function(e) {
            this.confirm(!1, "onerror"), this.unbindProxyEvents(e)
        }, c.prototype.confirm = function(e, t) {
            this.isConfirmed = !0, this.isLoaded = e, this.emit("confirm", this, t)
        }, c.prototype.unbindProxyEvents = function(e) {
            n.unbind(e.target, "load", this), n.unbind(e.target, "error", this)
        }, s
    });
/*!
 * Packery layout mode PACKAGED v1.1.3
 * sub-classes Packery
 * http://packery.metafizzy.co
 */

! function(a) {
    function b(a) {
        return new RegExp("(^|\\s+)" + a + "(\\s+|$)")
    }

    function c(a, b) {
        var c = d(a, b) ? f : e;
        c(a, b)
    }
    var d, e, f;
    "classList" in document.documentElement ? (d = function(a, b) {
        return a.classList.contains(b)
    }, e = function(a, b) {
        a.classList.add(b)
    }, f = function(a, b) {
        a.classList.remove(b)
    }) : (d = function(a, c) {
        return b(c).test(a.className)
    }, e = function(a, b) {
        d(a, b) || (a.className = a.className + " " + b)
    }, f = function(a, c) {
        a.className = a.className.replace(b(c), " ")
    });
    var g = {
        hasClass: d,
        addClass: e,
        removeClass: f,
        toggleClass: c,
        has: d,
        add: e,
        remove: f,
        toggle: c
    };
    "function" == typeof define && define.amd ? define("classie/classie", g) : "object" == typeof exports ? module.exports = g : a.classie = g
}(window),
function(a, b) {
    "function" == typeof define && define.amd ? define("packery/js/rect", b) : "object" == typeof exports ? module.exports = b() : (a.Packery = a.Packery || {}, a.Packery.Rect = b())
}(window, function() {
    function a(b) {
        for (var c in a.defaults) this[c] = a.defaults[c];
        for (c in b) this[c] = b[c]
    }
    var b = window.Packery = function() {};
    return b.Rect = a, a.defaults = {
        x: 0,
        y: 0,
        width: 0,
        height: 0
    }, a.prototype.contains = function(a) {
        var b = a.width || 0,
            c = a.height || 0;
        return this.x <= a.x && this.y <= a.y && this.x + this.width >= a.x + b && this.y + this.height >= a.y + c
    }, a.prototype.overlaps = function(a) {
        var b = this.x + this.width,
            c = this.y + this.height,
            d = a.x + a.width,
            e = a.y + a.height;
        return this.x < d && b > a.x && this.y < e && c > a.y
    }, a.prototype.getMaximalFreeRects = function(b) {
        if (!this.overlaps(b)) return !1;
        var c, d = [],
            e = this.x + this.width,
            f = this.y + this.height,
            g = b.x + b.width,
            h = b.y + b.height;
        return this.y < b.y && (c = new a({
            x: this.x,
            y: this.y,
            width: this.width,
            height: b.y - this.y
        }), d.push(c)), e > g && (c = new a({
            x: g,
            y: this.y,
            width: e - g,
            height: this.height
        }), d.push(c)), f > h && (c = new a({
            x: this.x,
            y: h,
            width: this.width,
            height: f - h
        }), d.push(c)), this.x < b.x && (c = new a({
            x: this.x,
            y: this.y,
            width: b.x - this.x,
            height: this.height
        }), d.push(c)), d
    }, a.prototype.canFit = function(a) {
        return this.width >= a.width && this.height >= a.height
    }, a
}),
function(a, b) {
    if ("function" == typeof define && define.amd) define("packery/js/packer", ["./rect"], b);
    else if ("object" == typeof exports) module.exports = b(require("./rect"));
    else {
        var c = a.Packery = a.Packery || {};
        c.Packer = b(c.Rect)
    }
}(window, function(a) {
    function b(a, b, c) {
        this.width = a || 0, this.height = b || 0, this.sortDirection = c || "downwardLeftToRight", this.reset()
    }
    b.prototype.reset = function() {
        this.spaces = [], this.newSpaces = [];
        var b = new a({
            x: 0,
            y: 0,
            width: this.width,
            height: this.height
        });
        this.spaces.push(b), this.sorter = c[this.sortDirection] || c.downwardLeftToRight
    }, b.prototype.pack = function(a) {
        for (var b = 0, c = this.spaces.length; c > b; b++) {
            var d = this.spaces[b];
            if (d.canFit(a)) {
                this.placeInSpace(a, d);
                break
            }
        }
    }, b.prototype.placeInSpace = function(a, b) {
        a.x = b.x, a.y = b.y, this.placed(a)
    }, b.prototype.placed = function(a) {
        for (var b = [], c = 0, d = this.spaces.length; d > c; c++) {
            var e = this.spaces[c],
                f = e.getMaximalFreeRects(a);
            f ? b.push.apply(b, f) : b.push(e)
        }
        this.spaces = b, this.mergeSortSpaces()
    }, b.prototype.mergeSortSpaces = function() {
        b.mergeRects(this.spaces), this.spaces.sort(this.sorter)
    }, b.prototype.addSpace = function(a) {
        this.spaces.push(a), this.mergeSortSpaces()
    }, b.mergeRects = function(a) {
        for (var b = 0, c = a.length; c > b; b++) {
            var d = a[b];
            if (d) {
                var e = a.slice(0);
                e.splice(b, 1);
                for (var f = 0, g = 0, h = e.length; h > g; g++) {
                    var i = e[g],
                        j = b > g ? 0 : 1;
                    d.contains(i) && (a.splice(g + j - f, 1), f++)
                }
            }
        }
        return a
    };
    var c = {
        downwardLeftToRight: function(a, b) {
            return a.y - b.y || a.x - b.x
        },
        rightwardTopToBottom: function(a, b) {
            return a.x - b.x || a.y - b.y
        }
    };
    return b
}),
function(a, b) {
    "function" == typeof define && define.amd ? define("packery/js/item", ["get-style-property/get-style-property", "outlayer/outlayer", "./rect"], b) : "object" == typeof exports ? module.exports = b(require("desandro-get-style-property"), require("outlayer"), require("./rect")) : a.Packery.Item = b(a.getStyleProperty, a.Outlayer, a.Packery.Rect)
}(window, function(a, b, c) {
    var d = a("transform"),
        e = function() {
            b.Item.apply(this, arguments)
        };
    e.prototype = new b.Item;
    var f = e.prototype._create;
    return e.prototype._create = function() {
        f.call(this), this.rect = new c, this.placeRect = new c
    }, e.prototype.dragStart = function() {
        this.getPosition(), this.removeTransitionStyles(), this.isTransitioning && d && (this.element.style[d] = "none"), this.getSize(), this.isPlacing = !0, this.needsPositioning = !1, this.positionPlaceRect(this.position.x, this.position.y), this.isTransitioning = !1, this.didDrag = !1
    }, e.prototype.dragMove = function(a, b) {
        this.didDrag = !0;
        var c = this.layout.size;
        a -= c.paddingLeft, b -= c.paddingTop, this.positionPlaceRect(a, b)
    }, e.prototype.dragStop = function() {
        this.getPosition();
        var a = this.position.x != this.placeRect.x,
            b = this.position.y != this.placeRect.y;
        this.needsPositioning = a || b, this.didDrag = !1
    }, e.prototype.positionPlaceRect = function(a, b, c) {
        this.placeRect.x = this.getPlaceRectCoord(a, !0), this.placeRect.y = this.getPlaceRectCoord(b, !1, c)
    }, e.prototype.getPlaceRectCoord = function(a, b, c) {
        var d = b ? "Width" : "Height",
            e = this.size["outer" + d],
            f = this.layout[b ? "columnWidth" : "rowHeight"],
            g = this.layout.size["inner" + d];
        b || (g = Math.max(g, this.layout.maxY), this.layout.rowHeight || (g -= this.layout.gutter));
        var h;
        if (f) {
            f += this.layout.gutter, g += b ? this.layout.gutter : 0, a = Math.round(a / f);
            var i;
            i = this.layout.options.isHorizontal ? b ? "ceil" : "floor" : b ? "floor" : "ceil";
            var j = Math[i](g / f);
            j -= Math.ceil(e / f), h = j
        } else h = g - e;
        return a = c ? a : Math.min(a, h), a *= f || 1, Math.max(0, a)
    }, e.prototype.copyPlaceRectPosition = function() {
        this.rect.x = this.placeRect.x, this.rect.y = this.placeRect.y
    }, e.prototype.removeElem = function() {
        this.element.parentNode.removeChild(this.element), this.layout.packer.addSpace(this.rect), this.emitEvent("remove", [this])
    }, e
}),
function(a, b) {
    "function" == typeof define && define.amd ? define("packery/js/packery", ["classie/classie", "get-size/get-size", "outlayer/outlayer", "./rect", "./packer", "./item"], b) : "object" == typeof exports ? module.exports = b(require("desandro-classie"), require("get-size"), require("outlayer"), require("./rect"), require("./packer"), require("./item")) : a.Packery = b(a.classie, a.getSize, a.Outlayer, a.Packery.Rect, a.Packery.Packer, a.Packery.Item)
}(window, function(a, b, c, d, e, f) {
    function g(a, b) {
        return a.position.y - b.position.y || a.position.x - b.position.x
    }

    function h(a, b) {
        return a.position.x - b.position.x || a.position.y - b.position.y
    }
    d.prototype.canFit = function(a) {
        return this.width >= a.width - 1 && this.height >= a.height - 1
    };
    var i = c.create("packery");
    return i.Item = f, i.prototype._create = function() {
        c.prototype._create.call(this), this.packer = new e, this.stamp(this.options.stamped);
        var a = this;
        this.handleDraggabilly = {
            dragStart: function() {
                a.itemDragStart(this.element)
            },
            dragMove: function() {
                a.itemDragMove(this.element, this.position.x, this.position.y)
            },
            dragEnd: function() {
                a.itemDragEnd(this.element)
            }
        }, this.handleUIDraggable = {
            start: function(b) {
                a.itemDragStart(b.currentTarget)
            },
            drag: function(b, c) {
                a.itemDragMove(b.currentTarget, c.position.left, c.position.top)
            },
            stop: function(b) {
                a.itemDragEnd(b.currentTarget)
            }
        }
    }, i.prototype._resetLayout = function() {
        this.getSize(), this._getMeasurements();
        var a = this.packer;
        this.options.isHorizontal ? (a.width = Number.POSITIVE_INFINITY, a.height = this.size.innerHeight + this.gutter, a.sortDirection = "rightwardTopToBottom") : (a.width = this.size.innerWidth + this.gutter, a.height = Number.POSITIVE_INFINITY, a.sortDirection = "downwardLeftToRight"), a.reset(), this.maxY = 0, this.maxX = 0
    }, i.prototype._getMeasurements = function() {
        this._getMeasurement("columnWidth", "width"), this._getMeasurement("rowHeight", "height"), this._getMeasurement("gutter", "width")
    }, i.prototype._getItemLayoutPosition = function(a) {
        return this._packItem(a), a.rect
    }, i.prototype._packItem = function(a) {
        this._setRectSize(a.element, a.rect), this.packer.pack(a.rect), this._setMaxXY(a.rect)
    }, i.prototype._setMaxXY = function(a) {
        this.maxX = Math.max(a.x + a.width, this.maxX), this.maxY = Math.max(a.y + a.height, this.maxY)
    }, i.prototype._setRectSize = function(a, c) {
        var d = b(a),
            e = d.outerWidth,
            f = d.outerHeight;
        (e || f) && (e = this._applyGridGutter(e, this.columnWidth), f = this._applyGridGutter(f, this.rowHeight)), c.width = Math.min(e, this.packer.width), c.height = Math.min(f, this.packer.height)
    }, i.prototype._applyGridGutter = function(a, b) {
        if (!b) return a + this.gutter;
        b += this.gutter;
        var c = a % b,
            d = c && 1 > c ? "round" : "ceil";
        return a = Math[d](a / b) * b
    }, i.prototype._getContainerSize = function() {
        return this.options.isHorizontal ? {
            width: this.maxX - this.gutter
        } : {
            height: this.maxY - this.gutter
        }
    }, i.prototype._manageStamp = function(a) {
        var b, c = this.getItem(a);
        if (c && c.isPlacing) b = c.placeRect;
        else {
            var e = this._getElementOffset(a);
            b = new d({
                x: this.options.isOriginLeft ? e.left : e.right,
                y: this.options.isOriginTop ? e.top : e.bottom
            })
        }
        this._setRectSize(a, b), this.packer.placed(b), this._setMaxXY(b)
    }, i.prototype.sortItemsByPosition = function() {
        var a = this.options.isHorizontal ? h : g;
        this.items.sort(a)
    }, i.prototype.fit = function(a, b, c) {
        var d = this.getItem(a);
        d && (this._getMeasurements(), this.stamp(d.element), d.getSize(), d.isPlacing = !0, b = void 0 === b ? d.rect.x : b, c = void 0 === c ? d.rect.y : c, d.positionPlaceRect(b, c, !0), this._bindFitEvents(d), d.moveTo(d.placeRect.x, d.placeRect.y), this.layout(), this.unstamp(d.element), this.sortItemsByPosition(), d.isPlacing = !1, d.copyPlaceRectPosition())
    }, i.prototype._bindFitEvents = function(a) {
        function b() {
            d++, 2 == d && c.emitEvent("fitComplete", [a])
        }
        var c = this,
            d = 0;
        a.on("layout", function() {
            return b(), !0
        }), this.on("layoutComplete", function() {
            return b(), !0
        })
    }, i.prototype.resize = function() {
        var a = b(this.element),
            c = this.size && a,
            d = this.options.isHorizontal ? "innerHeight" : "innerWidth";
        c && a[d] == this.size[d] || this.layout()
    }, i.prototype.itemDragStart = function(a) {
        this.stamp(a);
        var b = this.getItem(a);
        b && b.dragStart()
    }, i.prototype.itemDragMove = function(a, b, c) {
        function d() {
            f.layout(), delete f.dragTimeout
        }
        var e = this.getItem(a);
        e && e.dragMove(b, c);
        var f = this;
        this.clearDragTimeout(), this.dragTimeout = setTimeout(d, 40)
    }, i.prototype.clearDragTimeout = function() {
        this.dragTimeout && clearTimeout(this.dragTimeout)
    }, i.prototype.itemDragEnd = function(b) {
        var c, d = this.getItem(b);
        if (d && (c = d.didDrag, d.dragStop()), !d || !c && !d.needsPositioning) return void this.unstamp(b);
        a.add(d.element, "is-positioning-post-drag");
        var e = this._getDragEndLayoutComplete(b, d);
        d.needsPositioning ? (d.on("layout", e), d.moveTo(d.placeRect.x, d.placeRect.y)) : d && d.copyPlaceRectPosition(), this.clearDragTimeout(), this.on("layoutComplete", e), this.layout()
    }, i.prototype._getDragEndLayoutComplete = function(b, c) {
        var d = c && c.needsPositioning,
            e = 0,
            f = d ? 2 : 1,
            g = this;
        return function() {
            return e++, e != f ? !0 : (c && (a.remove(c.element, "is-positioning-post-drag"), c.isPlacing = !1, c.copyPlaceRectPosition()), g.unstamp(b), g.sortItemsByPosition(), d && g.emitEvent("dragItemPositioned", [c]), !0)
        }
    }, i.prototype.bindDraggabillyEvents = function(a) {
        a.on("dragStart", this.handleDraggabilly.dragStart), a.on("dragMove", this.handleDraggabilly.dragMove), a.on("dragEnd", this.handleDraggabilly.dragEnd)
    }, i.prototype.bindUIDraggableEvents = function(a) {
        a.on("dragstart", this.handleUIDraggable.start).on("drag", this.handleUIDraggable.drag).on("dragstop", this.handleUIDraggable.stop)
    }, i.Rect = d, i.Packer = e, i
}),
function(a, b) {
    "function" == typeof define && define.amd ? define(["isotope/js/layout-mode", "packery/js/packery", "get-size/get-size"], b) : "object" == typeof exports ? module.exports = b(require("isotope-layout/js/layout-mode"), require("packery"), require("get-size")) : b(a.Isotope.LayoutMode, a.Packery, a.getSize)
}(window, function(a, b, c) {
    function d(a, b) {
        for (var c in b) a[c] = b[c];
        return a
    }
    var e = a.create("packery"),
        f = e.prototype._getElementOffset,
        g = e.prototype._getMeasurement;
    d(e.prototype, b.prototype), e.prototype._getElementOffset = f, e.prototype._getMeasurement = g;
    var h = e.prototype._resetLayout;
    e.prototype._resetLayout = function() {
        this.packer = this.packer || new b.Packer, h.apply(this, arguments)
    };
    var i = e.prototype._getItemLayoutPosition;
    e.prototype._getItemLayoutPosition = function(a) {
        return a.rect = a.rect || new b.Rect, i.call(this, a)
    };
    var j = e.prototype._manageStamp;
    return e.prototype._manageStamp = function() {
        this.options.isOriginLeft = this.isotope.options.isOriginLeft, this.options.isOriginTop = this.isotope.options.isOriginTop, j.apply(this, arguments)
    }, e.prototype.needsResizeLayout = function() {
        var a = c(this.element),
            b = this.size && a,
            d = this.options.isHorizontal ? "innerHeight" : "innerWidth";
        return b && a[d] != this.size[d]
    }, e
});
/*! lightgallery   */
! function(a, b, c, d) {
    "use strict";

    function e(b, d) {
        if (this.el = b, this.$el = a(b), this.s = a.extend({}, f, d), this.s.dynamic && "undefined" !== this.s.dynamicEl && this.s.dynamicEl.constructor === Array && !this.s.dynamicEl.length) throw "When using dynamic mode, you must also define dynamicEl as an Array.";
        return this.modules = {}, this.lGalleryOn = !1, this.lgBusy = !1, this.hideBartimeout = !1, this.isTouch = "ontouchstart" in c.documentElement, this.s.slideEndAnimatoin && (this.s.hideControlOnEnd = !1), this.s.dynamic ? this.$items = this.s.dynamicEl : "this" === this.s.selector ? this.$items = this.$el : "" !== this.s.selector ? this.s.selectWithin ? this.$items = a(this.s.selectWithin).find(this.s.selector) : this.$items = this.$el.find(a(this.s.selector)) : this.$items = this.$el.children(), this.$slide = "", this.$outer = "", this.init(), this
    }
    var f = {
        mode: "lg-slide",
        cssEasing: "ease",
        easing: "linear",
        speed: 600,
        height: "100%",
        width: "100%",
        addClass: "",
        startClass: "lg-start-zoom",
        backdropDuration: 150,
        hideBarsDelay: 6e3,
        useLeft: !1,
        closable: !0,
        loop: !0,
        escKey: !0,
        keyPress: !0,
        controls: !0,
        slideEndAnimatoin: !0,
        hideControlOnEnd: !1,
        mousewheel: !0,
        getCaptionFromTitleOrAlt: !0,
        appendSubHtmlTo: ".lg-sub-html",
        subHtmlSelectorRelative: !1,
        preload: 1,
        showAfterLoad: !0,
        selector: "",
        selectWithin: "",
        nextHtml: "",
        prevHtml: "",
        index: !1,
        iframeMaxWidth: "100%",
        download: !0,
        counter: !0,
        appendCounterTo: ".lg-toolbar",
        swipeThreshold: 50,
        enableSwipe: !0,
        enableDrag: !0,
        dynamic: !1,
        dynamicEl: [],
        galleryId: 1
    };
    e.prototype.init = function() {
        var c = this;
        c.s.preload > c.$items.length && (c.s.preload = c.$items.length);
        var d = b.location.hash;
        d.indexOf("lg=" + this.s.galleryId) > 0 && (c.index = parseInt(d.split("&slide=")[1], 10), a("body").addClass("lg-from-hash"), a("body").hasClass("lg-on") || (setTimeout(function() {
            c.build(c.index)
        }), a("body").addClass("lg-on"))), c.s.dynamic ? (c.$el.trigger("onBeforeOpen.lg"), c.index = c.s.index || 0, a("body").hasClass("lg-on") || setTimeout(function() {
            c.build(c.index), a("body").addClass("lg-on")
        })) : c.$items.on("click.lgcustom", function(b) {
            try {
                b.preventDefault(), b.preventDefault()
            } catch (a) {
                b.returnValue = !1
            }
            c.$el.trigger("onBeforeOpen.lg"), c.index = c.s.index || c.$items.index(this), a("body").hasClass("lg-on") || (c.build(c.index), a("body").addClass("lg-on"))
        })
    }, e.prototype.build = function(b) {
        var c = this;
        c.structure(), a.each(a.fn.lightGallery.modules, function(b) {
            c.modules[b] = new a.fn.lightGallery.modules[b](c.el)
        }), c.slide(b, !1, !1), c.s.keyPress && c.keyPress(), c.$items.length > 1 && (c.arrow(), setTimeout(function() {
            c.enableDrag(), c.enableSwipe()
        }, 50), c.s.mousewheel && c.mousewheel()), c.counter(), c.closeGallery(), c.$el.trigger("onAfterOpen.lg"), c.$outer.on("mousemove.lg click.lg touchstart.lg", function() {
            c.$outer.removeClass("lg-hide-items"), clearTimeout(c.hideBartimeout), c.hideBartimeout = setTimeout(function() {
                c.$outer.addClass("lg-hide-items")
            }, c.s.hideBarsDelay)
        })
    }, e.prototype.structure = function() {
        var c, d = "",
            e = "",
            f = 0,
            g = "",
            h = this;
        for (a("body").append('<div class="lg-backdrop"></div>'), a(".lg-backdrop").css("transition-duration", this.s.backdropDuration + "ms"), f = 0; f < this.$items.length; f++) d += '<div class="lg-item"></div>';
        if (this.s.controls && this.$items.length > 1 && (e = '<div class="lg-actions"><div class="lg-prev lg-icon">' + this.s.prevHtml + '</div><div class="lg-next lg-icon">' + this.s.nextHtml + "</div></div>"), ".lg-sub-html" === this.s.appendSubHtmlTo && (g = '<div class="lg-sub-html"></div>'), c = '<div class="lg-outer ' + this.s.addClass + " " + this.s.startClass + '"><div class="lg" style="width:' + this.s.width + "; height:" + this.s.height + '"><div class="lg-inner">' + d + '</div><div class="lg-toolbar group"><span class="lg-close lg-icon"></span></div>' + e + g + "</div></div>", a("body").append(c), this.$outer = a(".lg-outer"), this.$slide = this.$outer.find(".lg-item"), this.s.useLeft ? (this.$outer.addClass("lg-use-left"), this.s.mode = "lg-slide") : this.$outer.addClass("lg-use-css3"), h.setTop(), a(b).on("resize.lg orientationchange.lg", function() {
                setTimeout(function() {
                    h.setTop()
                }, 100)
            }), this.$slide.eq(this.index).addClass("lg-current"), this.doCss() ? this.$outer.addClass("lg-css3") : (this.$outer.addClass("lg-css"), this.s.speed = 0), this.$outer.addClass(this.s.mode), this.s.enableDrag && this.$items.length > 1 && this.$outer.addClass("lg-grab"), this.s.showAfterLoad && this.$outer.addClass("lg-show-after-load"), this.doCss()) {
            var i = this.$outer.find(".lg-inner");
            i.css("transition-timing-function", this.s.cssEasing), i.css("transition-duration", this.s.speed + "ms")
        }
        a(".lg-backdrop").addClass("in"), setTimeout(function() {
            h.$outer.addClass("lg-visible")
        }, this.s.backdropDuration), this.s.download && this.$outer.find(".lg-toolbar").append('<a id="lg-download" target="_blank" download class="lg-download lg-icon"></a>'), this.prevScrollTop = a(b).scrollTop()
    }, e.prototype.setTop = function() {
        if ("100%" !== this.s.height) {
            var c = a(b).height(),
                d = (c - parseInt(this.s.height, 10)) / 2,
                e = this.$outer.find(".lg");
            c >= parseInt(this.s.height, 10) ? e.css("top", d + "px") : e.css("top", "0px")
        }
    }, e.prototype.doCss = function() {
        var a = function() {
            var a = ["transition", "MozTransition", "WebkitTransition", "OTransition", "msTransition", "KhtmlTransition"],
                b = c.documentElement,
                d = 0;
            for (d = 0; d < a.length; d++)
                if (a[d] in b.style) return !0
        };
        return !!a()
    }, e.prototype.isVideo = function(a, b) {
        var c;
        if (c = this.s.dynamic ? this.s.dynamicEl[b].html : this.$items.eq(b).attr("data-html"), !a && c) return {
            html5: !0
        };
        var d = a.match(/\/\/(?:www\.)?youtu(?:\.be|be\.com)\/(?:watch\?v=|embed\/)?([a-z0-9\-\_\%]+)/i),
            e = a.match(/\/\/(?:www\.)?vimeo.com\/([0-9a-z\-_]+)/i),
            f = a.match(/\/\/(?:www\.)?dai.ly\/([0-9a-z\-_]+)/i),
            g = a.match(/\/\/(?:www\.)?(?:vk\.com|vkontakte\.ru)\/(?:video_ext\.php\?)(.*)/i);
        return d ? {
            youtube: d
        } : e ? {
            vimeo: e
        } : f ? {
            dailymotion: f
        } : g ? {
            vk: g
        } : void 0
    }, e.prototype.counter = function() {
        this.s.counter && a(this.s.appendCounterTo).append('<div id="lg-counter"><span id="lg-counter-current">' + (parseInt(this.index, 10) + 1) + '</span> / <span id="lg-counter-all">' + this.$items.length + "</span></div>")
    }, e.prototype.addHtml = function(b) {
        var c, d, e = null;
        if (this.s.dynamic ? this.s.dynamicEl[b].subHtmlUrl ? c = this.s.dynamicEl[b].subHtmlUrl : e = this.s.dynamicEl[b].subHtml : (d = this.$items.eq(b), d.attr("data-sub-html-url") ? c = d.attr("data-sub-html-url") : (e = d.attr("data-sub-html"), this.s.getCaptionFromTitleOrAlt && !e && (e = d.attr("title") || d.find("img").first().attr("alt")))), !c)
            if ("undefined" != typeof e && null !== e) {
                var f = e.substring(0, 1);
                "." !== f && "#" !== f || (e = this.s.subHtmlSelectorRelative && !this.s.dynamic ? d.find(e).html() : a(e).html())
            } else e = "";
        ".lg-sub-html" === this.s.appendSubHtmlTo ? c ? this.$outer.find(this.s.appendSubHtmlTo).load(c) : this.$outer.find(this.s.appendSubHtmlTo).html(e) : c ? this.$slide.eq(b).load(c) : this.$slide.eq(b).append(e), "undefined" != typeof e && null !== e && ("" === e ? this.$outer.find(this.s.appendSubHtmlTo).addClass("lg-empty-html") : this.$outer.find(this.s.appendSubHtmlTo).removeClass("lg-empty-html")), this.$el.trigger("onAfterAppendSubHtml.lg", [b])
    }, e.prototype.preload = function(a) {
        var b = 1,
            c = 1;
        for (b = 1; b <= this.s.preload && !(b >= this.$items.length - a); b++) this.loadContent(a + b, !1, 0);
        for (c = 1; c <= this.s.preload && !(a - c < 0); c++) this.loadContent(a - c, !1, 0)
    }, e.prototype.loadContent = function(c, d, e) {
        var f, g, h, i, j, k, l = this,
            m = !1,
            n = function(c) {
                for (var d = [], e = [], f = 0; f < c.length; f++) {
                    var h = c[f].split(" ");
                    "" === h[0] && h.splice(0, 1), e.push(h[0]), d.push(h[1])
                }
                for (var i = a(b).width(), j = 0; j < d.length; j++)
                    if (parseInt(d[j], 10) > i) {
                        g = e[j];
                        break
                    }
            };
        if (l.s.dynamic) {
            if (l.s.dynamicEl[c].poster && (m = !0, h = l.s.dynamicEl[c].poster), k = l.s.dynamicEl[c].html, g = l.s.dynamicEl[c].src, l.s.dynamicEl[c].responsive) {
                var o = l.s.dynamicEl[c].responsive.split(",");
                n(o)
            }
            i = l.s.dynamicEl[c].srcset, j = l.s.dynamicEl[c].sizes
        } else {
            if (l.$items.eq(c).attr("data-poster") && (m = !0, h = l.$items.eq(c).attr("data-poster")), k = l.$items.eq(c).attr("data-html"), g = l.$items.eq(c).attr("href") || l.$items.eq(c).attr("data-src"), l.$items.eq(c).attr("data-responsive")) {
                var p = l.$items.eq(c).attr("data-responsive").split(",");
                n(p)
            }
            i = l.$items.eq(c).attr("data-srcset"), j = l.$items.eq(c).attr("data-sizes")
        }
        var q = !1;
        l.s.dynamic ? l.s.dynamicEl[c].iframe && (q = !0) : "true" === l.$items.eq(c).attr("data-iframe") && (q = !0);
        var r = l.isVideo(g, c);
        if (!l.$slide.eq(c).hasClass("lg-loaded")) {
            if (q) l.$slide.eq(c).prepend('<div class="lg-video-cont" style="max-width:' + l.s.iframeMaxWidth + '"><div class="lg-video"><iframe class="lg-object" frameborder="0" src="' + g + '"  allowfullscreen="true"></iframe></div></div>');
            else if (m) {
                var s = "";
                s = r && r.youtube ? "lg-has-youtube" : r && r.vimeo ? "lg-has-vimeo" : "lg-has-html5", l.$slide.eq(c).prepend('<div class="lg-video-cont ' + s + ' "><div class="lg-video"><span class="lg-video-play"></span><img class="lg-object lg-has-poster" src="' + h + '" /></div></div>')
            } else r ? (l.$slide.eq(c).prepend('<div class="lg-video-cont "><div class="lg-video"></div></div>'), l.$el.trigger("hasVideo.lg", [c, g, k])) : l.$slide.eq(c).prepend('<div class="lg-img-wrap"><img class="lg-object lg-image" src="' + g + '" /></div>');
            if (l.$el.trigger("onAferAppendSlide.lg", [c]), f = l.$slide.eq(c).find(".lg-object"), j && f.attr("sizes", j), i) {
                f.attr("srcset", i);
                try {
                    picturefill({
                        elements: [f[0]]
                    })
                } catch (a) {
                    console.error("Make sure you have included Picturefill version 2")
                }
            }
            ".lg-sub-html" !== this.s.appendSubHtmlTo && l.addHtml(c), l.$slide.eq(c).addClass("lg-loaded")
        }
        l.$slide.eq(c).find(".lg-object").on("load.lg error.lg", function() {
            var b = 0;
            e && !a("body").hasClass("lg-from-hash") && (b = e), setTimeout(function() {
                l.$slide.eq(c).addClass("lg-complete"), l.$el.trigger("onSlideItemLoad.lg", [c, e || 0])
            }, b)
        }), r && r.html5 && !m && l.$slide.eq(c).addClass("lg-complete"), d === !0 && (l.$slide.eq(c).hasClass("lg-complete") ? l.preload(c) : l.$slide.eq(c).find(".lg-object").on("load.lg error.lg", function() {
            l.preload(c)
        }))
    }, e.prototype.slide = function(b, c, d) {
        var e = this.$outer.find(".lg-current").index(),
            f = this;
        if (!f.lGalleryOn || e !== b) {
            var g = this.$slide.length,
                h = f.lGalleryOn ? this.s.speed : 0,
                i = !1,
                j = !1;
            if (!f.lgBusy) {
                if (this.s.download) {
                    var k;
                    k = f.s.dynamic ? f.s.dynamicEl[b].downloadUrl !== !1 && (f.s.dynamicEl[b].downloadUrl || f.s.dynamicEl[b].src) : "false" !== f.$items.eq(b).attr("data-download-url") && (f.$items.eq(b).attr("data-download-url") || f.$items.eq(b).attr("href") || f.$items.eq(b).attr("data-src")), k ? (a("#lg-download").attr("href", k), f.$outer.removeClass("lg-hide-download")) : f.$outer.addClass("lg-hide-download")
                }
                if (this.$el.trigger("onBeforeSlide.lg", [e, b, c, d]), f.lgBusy = !0, clearTimeout(f.hideBartimeout), ".lg-sub-html" === this.s.appendSubHtmlTo && setTimeout(function() {
                        f.addHtml(b)
                    }, h), this.arrowDisable(b), c) {
                    var l = b - 1,
                        m = b + 1;
                    0 === b && e === g - 1 ? (m = 0, l = g - 1) : b === g - 1 && 0 === e && (m = 0, l = g - 1), this.$slide.removeClass("lg-prev-slide lg-current lg-next-slide"), f.$slide.eq(l).addClass("lg-prev-slide"), f.$slide.eq(m).addClass("lg-next-slide"), f.$slide.eq(b).addClass("lg-current")
                } else f.$outer.addClass("lg-no-trans"), this.$slide.removeClass("lg-prev-slide lg-next-slide"), b < e ? (j = !0, 0 !== b || e !== g - 1 || d || (j = !1, i = !0)) : b > e && (i = !0, b !== g - 1 || 0 !== e || d || (j = !0, i = !1)), j ? (this.$slide.eq(b).addClass("lg-prev-slide"), this.$slide.eq(e).addClass("lg-next-slide")) : i && (this.$slide.eq(b).addClass("lg-next-slide"), this.$slide.eq(e).addClass("lg-prev-slide")), setTimeout(function() {
                    f.$slide.removeClass("lg-current"), f.$slide.eq(b).addClass("lg-current"), f.$outer.removeClass("lg-no-trans")
                }, 50);
                f.lGalleryOn ? (setTimeout(function() {
                    f.loadContent(b, !0, 0)
                }, this.s.speed + 50), setTimeout(function() {
                    f.lgBusy = !1, f.$el.trigger("onAfterSlide.lg", [e, b, c, d])
                }, this.s.speed)) : (f.loadContent(b, !0, f.s.backdropDuration), f.lgBusy = !1, f.$el.trigger("onAfterSlide.lg", [e, b, c, d])), f.lGalleryOn = !0, this.s.counter && a("#lg-counter-current").text(b + 1)
            }
        }
    }, e.prototype.goToNextSlide = function(a) {
        var b = this;
        b.lgBusy || (b.index + 1 < b.$slide.length ? (b.index++, b.$el.trigger("onBeforeNextSlide.lg", [b.index]), b.slide(b.index, a, !1)) : b.s.loop ? (b.index = 0, b.$el.trigger("onBeforeNextSlide.lg", [b.index]), b.slide(b.index, a, !1)) : b.s.slideEndAnimatoin && (b.$outer.addClass("lg-right-end"), setTimeout(function() {
            b.$outer.removeClass("lg-right-end")
        }, 400)))
    }, e.prototype.goToPrevSlide = function(a) {
        var b = this;
        b.lgBusy || (b.index > 0 ? (b.index--, b.$el.trigger("onBeforePrevSlide.lg", [b.index, a]), b.slide(b.index, a, !1)) : b.s.loop ? (b.index = b.$items.length - 1, b.$el.trigger("onBeforePrevSlide.lg", [b.index, a]), b.slide(b.index, a, !1)) : b.s.slideEndAnimatoin && (b.$outer.addClass("lg-left-end"), setTimeout(function() {
            b.$outer.removeClass("lg-left-end")
        }, 400)))
    }, e.prototype.keyPress = function() {
        var c = this;
        this.$items.length > 1 && a(b).on("keyup.lg", function(a) {
            c.$items.length > 1 && (37 === a.keyCode && (a.preventDefault(), c.goToPrevSlide()), 39 === a.keyCode && (a.preventDefault(), c.goToNextSlide()))
        }), a(b).on("keydown.lg", function(a) {
            c.s.escKey === !0 && 27 === a.keyCode && (a.preventDefault(), c.$outer.hasClass("lg-thumb-open") ? c.$outer.removeClass("lg-thumb-open") : c.destroy())
        })
    }, e.prototype.arrow = function() {
        var a = this;
        this.$outer.find(".lg-prev").on("click.lg", function() {
            a.goToPrevSlide()
        }), this.$outer.find(".lg-next").on("click.lg", function() {
            a.goToNextSlide()
        })
    }, e.prototype.arrowDisable = function(a) {
        !this.s.loop && this.s.hideControlOnEnd && (a + 1 < this.$slide.length ? this.$outer.find(".lg-next").removeAttr("disabled").removeClass("disabled") : this.$outer.find(".lg-next").attr("disabled", "disabled").addClass("disabled"), a > 0 ? this.$outer.find(".lg-prev").removeAttr("disabled").removeClass("disabled") : this.$outer.find(".lg-prev").attr("disabled", "disabled").addClass("disabled"))
    }, e.prototype.setTranslate = function(a, b, c) {
        this.s.useLeft ? a.css("left", b) : a.css({
            transform: "translate3d(" + b + "px, " + c + "px, 0px)"
        })
    }, e.prototype.touchMove = function(b, c) {
        var d = c - b;
        Math.abs(d) > 15 && (this.$outer.addClass("lg-dragging"), this.setTranslate(this.$slide.eq(this.index), d, 0), this.setTranslate(a(".lg-prev-slide"), -this.$slide.eq(this.index).width() + d, 0), this.setTranslate(a(".lg-next-slide"), this.$slide.eq(this.index).width() + d, 0))
    }, e.prototype.touchEnd = function(a) {
        var b = this;
        "lg-slide" !== b.s.mode && b.$outer.addClass("lg-slide"), this.$slide.not(".lg-current, .lg-prev-slide, .lg-next-slide").css("opacity", "0"), setTimeout(function() {
            b.$outer.removeClass("lg-dragging"), a < 0 && Math.abs(a) > b.s.swipeThreshold ? b.goToNextSlide(!0) : a > 0 && Math.abs(a) > b.s.swipeThreshold ? b.goToPrevSlide(!0) : Math.abs(a) < 5 && b.$el.trigger("onSlideClick.lg"), b.$slide.removeAttr("style")
        }), setTimeout(function() {
            b.$outer.hasClass("lg-dragging") || "lg-slide" === b.s.mode || b.$outer.removeClass("lg-slide")
        }, b.s.speed + 100)
    }, e.prototype.enableSwipe = function() {
        var a = this,
            b = 0,
            c = 0,
            d = !1;
        a.s.enableSwipe && a.isTouch && a.doCss() && (a.$slide.on("touchstart.lg", function(c) {
            a.$outer.hasClass("lg-zoomed") || a.lgBusy || (c.preventDefault(), a.manageSwipeClass(), b = c.originalEvent.targetTouches[0].pageX)
        }), a.$slide.on("touchmove.lg", function(e) {
            a.$outer.hasClass("lg-zoomed") || (e.preventDefault(), c = e.originalEvent.targetTouches[0].pageX, a.touchMove(b, c), d = !0)
        }), a.$slide.on("touchend.lg", function() {
            a.$outer.hasClass("lg-zoomed") || (d ? (d = !1, a.touchEnd(c - b)) : a.$el.trigger("onSlideClick.lg"))
        }))
    }, e.prototype.enableDrag = function() {
        var c = this,
            d = 0,
            e = 0,
            f = !1,
            g = !1;
        c.s.enableDrag && !c.isTouch && c.doCss() && (c.$slide.on("mousedown.lg", function(b) {
            c.$outer.hasClass("lg-zoomed") || (a(b.target).hasClass("lg-object") || a(b.target).hasClass("lg-video-play")) && (b.preventDefault(), c.lgBusy || (c.manageSwipeClass(), d = b.pageX, f = !0, c.$outer.scrollLeft += 1, c.$outer.scrollLeft -= 1, c.$outer.removeClass("lg-grab").addClass("lg-grabbing"), c.$el.trigger("onDragstart.lg")))
        }), a(b).on("mousemove.lg", function(a) {
            f && (g = !0, e = a.pageX, c.touchMove(d, e), c.$el.trigger("onDragmove.lg"))
        }), a(b).on("mouseup.lg", function(b) {
            g ? (g = !1, c.touchEnd(e - d), c.$el.trigger("onDragend.lg")) : (a(b.target).hasClass("lg-object") || a(b.target).hasClass("lg-video-play")) && c.$el.trigger("onSlideClick.lg"), f && (f = !1, c.$outer.removeClass("lg-grabbing").addClass("lg-grab"))
        }))
    }, e.prototype.manageSwipeClass = function() {
        var a = this.index + 1,
            b = this.index - 1,
            c = this.$slide.length;
        this.s.loop && (0 === this.index ? b = c - 1 : this.index === c - 1 && (a = 0)), this.$slide.removeClass("lg-next-slide lg-prev-slide"), b > -1 && this.$slide.eq(b).addClass("lg-prev-slide"), this.$slide.eq(a).addClass("lg-next-slide")
    }, e.prototype.mousewheel = function() {
        var a = this;
        a.$outer.on("mousewheel.lg", function(b) {
            b.deltaY && (b.deltaY > 0 ? a.goToPrevSlide() : a.goToNextSlide(), b.preventDefault())
        })
    }, e.prototype.closeGallery = function() {
        var b = this,
            c = !1;
        this.$outer.find(".lg-close").on("click.lg", function() {
            b.destroy()
        }), b.s.closable && (b.$outer.on("mousedown.lg", function(b) {
            c = !!(a(b.target).is(".lg-outer") || a(b.target).is(".lg-item ") || a(b.target).is(".lg-img-wrap"))
        }), b.$outer.on("mouseup.lg", function(d) {
            (a(d.target).is(".lg-outer") || a(d.target).is(".lg-item ") || a(d.target).is(".lg-img-wrap") && c) && (b.$outer.hasClass("lg-dragging") || b.destroy())
        }))
    }, e.prototype.destroy = function(c) {
        var d = this;
        c || d.$el.trigger("onBeforeClose.lg"), a(b).scrollTop(d.prevScrollTop), c && (d.s.dynamic || this.$items.off("click.lg click.lgcustom"), a.removeData(d.el, "lightGallery")), this.$el.off(".lg.tm"), a.each(a.fn.lightGallery.modules, function(a) {
            d.modules[a] && d.modules[a].destroy()
        }), this.lGalleryOn = !1, clearTimeout(d.hideBartimeout), this.hideBartimeout = !1, a(b).off(".lg"), a("body").removeClass("lg-on lg-from-hash"), d.$outer && d.$outer.removeClass("lg-visible"), a(".lg-backdrop").removeClass("in"), setTimeout(function() {
            d.$outer && d.$outer.remove(), a(".lg-backdrop").remove(), c || d.$el.trigger("onCloseAfter.lg")
        }, d.s.backdropDuration + 50)
    }, a.fn.lightGallery = function(b) {
        return this.each(function() {
            if (a.data(this, "lightGallery")) try {
                a(this).data("lightGallery").init()
            } catch (a) {
                console.error("lightGallery has not initiated properly")
            } else a.data(this, "lightGallery", new e(this, b))
        })
    }, a.fn.lightGallery.modules = {}
}(jQuery, window, document);
/*! lg-zoom  
 * http://sachinchoolur.github.io/lightGallery
 * Copyright (c) 2016 Sachin N; Licensed GPLv3 */
! function(a, b) {
    "function" == typeof define && define.amd ? define(["jquery"], function(a) {
        return b(a)
    }) : "object" == typeof exports ? module.exports = b(require("jquery")) : b(jQuery)
}(this, function(a) {
    ! function() {
        "use strict";
        var b = function() {
                var a = !1,
                    b = navigator.userAgent.match(/Chrom(e|ium)\/([0-9]+)\./);
                return b && parseInt(b[2], 10) < 54 && (a = !0), a
            },
            c = {
                scale: 1,
                zoom: !0,
                actualSize: !0,
                enableZoomAfter: 300,
                useLeftForZoom: b()
            },
            d = function(b) {
                return this.core = a(b).data("lightGallery"), this.core.s = a.extend({}, c, this.core.s), this.core.s.zoom && this.core.doCss() && (this.init(), this.zoomabletimeout = !1, this.pageX = a(window).width() / 2, this.pageY = a(window).height() / 2 + a(window).scrollTop()), this
            };
        d.prototype.init = function() {
            var b = this,
                c = '<span id="lg-zoom-in" class="lg-icon"></span><span id="lg-zoom-out" class="lg-icon"></span>';
            b.core.s.actualSize && (c += '<span id="lg-actual-size" class="lg-icon"></span>'), b.core.s.useLeftForZoom ? b.core.$outer.addClass("lg-use-left-for-zoom") : b.core.$outer.addClass("lg-use-transition-for-zoom"), this.core.$outer.find(".lg-toolbar").append(c), b.core.$el.on("onSlideItemLoad.lg.tm.zoom", function(c, d, e) {
                var f = b.core.s.enableZoomAfter + e;
                a("body").hasClass("lg-from-hash") && e ? f = 0 : a("body").removeClass("lg-from-hash"), b.zoomabletimeout = setTimeout(function() {
                    b.core.$slide.eq(d).addClass("lg-zoomable")
                }, f + 30)
            });
            var d = 1,
                e = function(c) {
                    var e, f, d = b.core.$outer.find(".lg-current .lg-image"),
                        g = (a(window).width() - d.prop("offsetWidth")) / 2,
                        h = (a(window).height() - d.prop("offsetHeight")) / 2 + a(window).scrollTop();
                    e = b.pageX - g, f = b.pageY - h;
                    var i = (c - 1) * e,
                        j = (c - 1) * f;
                    d.css("transform", "scale3d(" + c + ", " + c + ", 1)").attr("data-scale", c), b.core.s.useLeftForZoom ? d.parent().css({
                        left: -i + "px",
                        top: -j + "px"
                    }).attr("data-x", i).attr("data-y", j) : d.parent().css("transform", "translate3d(-" + i + "px, -" + j + "px, 0)").attr("data-x", i).attr("data-y", j)
                },
                f = function() {
                    d > 1 ? b.core.$outer.addClass("lg-zoomed") : b.resetZoom(), d < 1 && (d = 1), e(d)
                },
                g = function(c, e, g, h) {
                    var j, i = e.prop("offsetWidth");
                    j = b.core.s.dynamic ? b.core.s.dynamicEl[g].width || e[0].naturalWidth || i : b.core.$items.eq(g).attr("data-width") || e[0].naturalWidth || i;
                    var k;
                    b.core.$outer.hasClass("lg-zoomed") ? d = 1 : j > i && (k = j / i, d = k || 2), h ? (b.pageX = a(window).width() / 2, b.pageY = a(window).height() / 2 + a(window).scrollTop()) : (b.pageX = c.pageX || c.originalEvent.targetTouches[0].pageX, b.pageY = c.pageY || c.originalEvent.targetTouches[0].pageY), f(), setTimeout(function() {
                        b.core.$outer.removeClass("lg-grabbing").addClass("lg-grab")
                    }, 10)
                },
                h = !1;
            b.core.$el.on("onAferAppendSlide.lg.tm.zoom", function(a, c) {
                var d = b.core.$slide.eq(c).find(".lg-image");
                d.on("dblclick", function(a) {
                    g(a, d, c)
                }), d.on("touchstart", function(a) {
                    h ? (clearTimeout(h), h = null, g(a, d, c)) : h = setTimeout(function() {
                        h = null
                    }, 300), a.preventDefault()
                })
            }), a(window).on("resize.lg.zoom scroll.lg.zoom orientationchange.lg.zoom", function() {
                b.pageX = a(window).width() / 2, b.pageY = a(window).height() / 2 + a(window).scrollTop(), e(d)
            }), a("#lg-zoom-out").on("click.lg", function() {
                b.core.$outer.find(".lg-current .lg-image").length && (d -= b.core.s.scale, f())
            }), a("#lg-zoom-in").on("click.lg", function() {
                b.core.$outer.find(".lg-current .lg-image").length && (d += b.core.s.scale, f())
            }), a("#lg-actual-size").on("click.lg", function(a) {
                g(a, b.core.$slide.eq(b.core.index).find(".lg-image"), b.core.index, !0)
            }), b.core.$el.on("onBeforeSlide.lg.tm", function() {
                d = 1, b.resetZoom()
            }), b.core.isTouch || b.zoomDrag(), b.core.isTouch && b.zoomSwipe()
        }, d.prototype.resetZoom = function() {
            this.core.$outer.removeClass("lg-zoomed"), this.core.$slide.find(".lg-img-wrap").removeAttr("style data-x data-y"), this.core.$slide.find(".lg-image").removeAttr("style data-scale"), this.pageX = a(window).width() / 2, this.pageY = a(window).height() / 2 + a(window).scrollTop()
        }, d.prototype.zoomSwipe = function() {
            var a = this,
                b = {},
                c = {},
                d = !1,
                e = !1,
                f = !1;
            a.core.$slide.on("touchstart.lg", function(c) {
                if (a.core.$outer.hasClass("lg-zoomed")) {
                    var d = a.core.$slide.eq(a.core.index).find(".lg-object");
                    f = d.prop("offsetHeight") * d.attr("data-scale") > a.core.$outer.find(".lg").height(), e = d.prop("offsetWidth") * d.attr("data-scale") > a.core.$outer.find(".lg").width(), (e || f) && (c.preventDefault(), b = {
                        x: c.originalEvent.targetTouches[0].pageX,
                        y: c.originalEvent.targetTouches[0].pageY
                    })
                }
            }), a.core.$slide.on("touchmove.lg", function(g) {
                if (a.core.$outer.hasClass("lg-zoomed")) {
                    var i, j, h = a.core.$slide.eq(a.core.index).find(".lg-img-wrap");
                    g.preventDefault(), d = !0, c = {
                        x: g.originalEvent.targetTouches[0].pageX,
                        y: g.originalEvent.targetTouches[0].pageY
                    }, a.core.$outer.addClass("lg-zoom-dragging"), j = f ? -Math.abs(h.attr("data-y")) + (c.y - b.y) : -Math.abs(h.attr("data-y")), i = e ? -Math.abs(h.attr("data-x")) + (c.x - b.x) : -Math.abs(h.attr("data-x")), (Math.abs(c.x - b.x) > 15 || Math.abs(c.y - b.y) > 15) && (a.core.s.useLeftForZoom ? h.css({
                        left: i + "px",
                        top: j + "px"
                    }) : h.css("transform", "translate3d(" + i + "px, " + j + "px, 0)"))
                }
            }), a.core.$slide.on("touchend.lg", function() {
                a.core.$outer.hasClass("lg-zoomed") && d && (d = !1, a.core.$outer.removeClass("lg-zoom-dragging"), a.touchendZoom(b, c, e, f))
            })
        }, d.prototype.zoomDrag = function() {
            var b = this,
                c = {},
                d = {},
                e = !1,
                f = !1,
                g = !1,
                h = !1;
            b.core.$slide.on("mousedown.lg.zoom", function(d) {
                var f = b.core.$slide.eq(b.core.index).find(".lg-object");
                h = f.prop("offsetHeight") * f.attr("data-scale") > b.core.$outer.find(".lg").height(), g = f.prop("offsetWidth") * f.attr("data-scale") > b.core.$outer.find(".lg").width(), b.core.$outer.hasClass("lg-zoomed") && a(d.target).hasClass("lg-object") && (g || h) && (d.preventDefault(), c = {
                    x: d.pageX,
                    y: d.pageY
                }, e = !0, b.core.$outer.scrollLeft += 1, b.core.$outer.scrollLeft -= 1, b.core.$outer.removeClass("lg-grab").addClass("lg-grabbing"))
            }), a(window).on("mousemove.lg.zoom", function(a) {
                if (e) {
                    var j, k, i = b.core.$slide.eq(b.core.index).find(".lg-img-wrap");
                    f = !0, d = {
                        x: a.pageX,
                        y: a.pageY
                    }, b.core.$outer.addClass("lg-zoom-dragging"), k = h ? -Math.abs(i.attr("data-y")) + (d.y - c.y) : -Math.abs(i.attr("data-y")), j = g ? -Math.abs(i.attr("data-x")) + (d.x - c.x) : -Math.abs(i.attr("data-x")), b.core.s.useLeftForZoom ? i.css({
                        left: j + "px",
                        top: k + "px"
                    }) : i.css("transform", "translate3d(" + j + "px, " + k + "px, 0)")
                }
            }), a(window).on("mouseup.lg.zoom", function(a) {
                e && (e = !1, b.core.$outer.removeClass("lg-zoom-dragging"), !f || c.x === d.x && c.y === d.y || (d = {
                    x: a.pageX,
                    y: a.pageY
                }, b.touchendZoom(c, d, g, h)), f = !1), b.core.$outer.removeClass("lg-grabbing").addClass("lg-grab")
            })
        }, d.prototype.touchendZoom = function(a, b, c, d) {
            var e = this,
                f = e.core.$slide.eq(e.core.index).find(".lg-img-wrap"),
                g = e.core.$slide.eq(e.core.index).find(".lg-object"),
                h = -Math.abs(f.attr("data-x")) + (b.x - a.x),
                i = -Math.abs(f.attr("data-y")) + (b.y - a.y),
                j = (e.core.$outer.find(".lg").height() - g.prop("offsetHeight")) / 2,
                k = Math.abs(g.prop("offsetHeight") * Math.abs(g.attr("data-scale")) - e.core.$outer.find(".lg").height() + j),
                l = (e.core.$outer.find(".lg").width() - g.prop("offsetWidth")) / 2,
                m = Math.abs(g.prop("offsetWidth") * Math.abs(g.attr("data-scale")) - e.core.$outer.find(".lg").width() + l);
            (Math.abs(b.x - a.x) > 15 || Math.abs(b.y - a.y) > 15) && (d && (i <= -k ? i = -k : i >= -j && (i = -j)), c && (h <= -m ? h = -m : h >= -l && (h = -l)), d ? f.attr("data-y", Math.abs(i)) : i = -Math.abs(f.attr("data-y")), c ? f.attr("data-x", Math.abs(h)) : h = -Math.abs(f.attr("data-x")), e.core.s.useLeftForZoom ? f.css({
                left: h + "px",
                top: i + "px"
            }) : f.css("transform", "translate3d(" + h + "px, " + i + "px, 0)"))
        }, d.prototype.destroy = function() {
            var b = this;
            b.core.$el.off(".lg.zoom"), a(window).off(".lg.zoom"), b.core.$slide.off(".lg.zoom"), b.core.$el.off(".lg.tm.zoom"), b.resetZoom(), clearTimeout(b.zoomabletimeout), b.zoomabletimeout = !1
        }, a.fn.lightGallery.modules.zoom = d
    }()
});
/*!  lightGallery video */
! function(e, o, i, l) {
    "use strict";
    var a = {
            videoMaxWidth: "855px",
            youtubePlayerParams: !1,
            vimeoPlayerParams: !1,
            dailymotionPlayerParams: !1,
            videojs: !1
        },
        s = function(o) {
            return this.core = e(o).data("lightGallery"), this.$el = e(o), this.core.s = e.extend({}, a, this.core.s), this.videoLoaded = !1, this.init(), this
        };
    s.prototype.init = function() {
        var o = this;
        o.core.$el.on("hasVideo.lg.tm", function(e, i, l, a) {
            if (o.core.$slide.eq(i).find(".lg-video").append(o.loadVideo(l, "lg-object", !0, i, a)), a)
                if (o.core.s.videojs) try {
                    videojs(o.core.$slide.eq(i).find(".lg-html5").get(0), {}, function() {
                        o.videoLoaded || this.play()
                    })
                } catch (s) {
                    console.error("Make sure you have included videojs")
                } else o.core.$slide.eq(i).find(".lg-html5").get(0).play()
        }), o.core.$el.on("onAferAppendSlide.lg.tm", function(e, i) {
            o.core.$slide.eq(i).find(".lg-video-cont").css("max-width", o.core.s.videoMaxWidth), o.videoLoaded = !0
        });
        var i = function(e) {
            if (e.find(".lg-object").hasClass("lg-has-poster") && e.find(".lg-object").is(":visible"))
                if (e.hasClass("lg-has-video")) {
                    var i = e.find(".lg-youtube").get(0),
                        l = e.find(".lg-vimeo").get(0),
                        a = e.find(".lg-dailymotion").get(0),
                        s = e.find(".lg-html5").get(0);
                    if (i) i.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', "*");
                    else if (l) try {
                            $f(l).api("play")
                        } catch (r) {
                            console.error("Make sure you have included froogaloop2 js")
                        } else if (a) a.contentWindow.postMessage("play", "*");
                        else if (s)
                        if (o.core.s.videojs) try {
                            videojs(s).play()
                        } catch (r) {
                            console.error("Make sure you have included videojs")
                        } else s.play();
                    e.addClass("lg-video-palying")
                } else {
                    e.addClass("lg-video-palying lg-has-video");
                    var t, d, c = function(i, l) {
                        if (e.find(".lg-video").append(o.loadVideo(i, "", !1, o.core.index, l)), l)
                            if (o.core.s.videojs) try {
                                videojs(o.core.$slide.eq(o.core.index).find(".lg-html5").get(0), {}, function() {
                                    this.play()
                                })
                            } catch (a) {
                                console.error("Make sure you have included videojs")
                            } else o.core.$slide.eq(o.core.index).find(".lg-html5").get(0).play()
                    };
                    o.core.s.dynamic ? (t = o.core.s.dynamicEl[o.core.index].src, d = o.core.s.dynamicEl[o.core.index].html, c(t, d)) : (t = o.core.$items.eq(o.core.index).attr("href") || o.core.$items.eq(o.core.index).attr("data-src"), d = o.core.$items.eq(o.core.index).attr("data-html"), c(t, d));
                    var n = e.find(".lg-object");
                    e.find(".lg-video").append(n), e.find(".lg-video-object").hasClass("lg-html5") || (e.removeClass("lg-complete"), e.find(".lg-video-object").on("load.lg error.lg", function() {
                        e.addClass("lg-complete")
                    }))
                }
        };
        o.core.doCss() && o.core.$items.length > 1 && (o.core.s.enableSwipe && o.core.isTouch || o.core.s.enableDrag && !o.core.isTouch) ? o.core.$el.on("onSlideClick.lg.tm", function() {
            var e = o.core.$slide.eq(o.core.index);
            i(e)
        }) : o.core.$slide.on("click.lg", function() {
            i(e(this))
        }), o.core.$el.on("onBeforeSlide.lg.tm", function(e, i, l) {
            var a = o.core.$slide.eq(i),
                s = a.find(".lg-youtube").get(0),
                r = a.find(".lg-vimeo").get(0),
                t = a.find(".lg-dailymotion").get(0),
                d = a.find(".lg-html5").get(0);
            if (s) s.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', "*");
            else if (r) try {
                    $f(r).api("pause")
                } catch (c) {
                    console.error("Make sure you have included froogaloop2 js")
                } else if (t) t.contentWindow.postMessage("pause", "*");
                else if (d)
                if (o.core.s.videojs) try {
                    videojs(d).pause()
                } catch (c) {
                    console.error("Make sure you have included videojs")
                } else d.pause();
            var n;
            n = o.core.s.dynamic ? o.core.s.dynamicEl[l].src : o.core.$items.eq(l).attr("href") || o.core.$items.eq(l).attr("data-src");
            var m = o.core.isVideo(n, l) || {};
            (m.youtube || m.vimeo || m.dailymotion) && o.core.$outer.addClass("lg-hide-download")
        }), o.core.$el.on("onAfterSlide.lg.tm", function(e, i) {
            o.core.$slide.eq(i).removeClass("lg-video-palying")
        })
    }, s.prototype.loadVideo = function(o, i, l, a, s) {
        var r = "",
            t = 1,
            d = "",
            c = this.core.isVideo(o, a) || {};
        if (l && (t = this.videoLoaded ? 0 : 1), c.youtube) d = "?wmode=opaque&autoplay=" + t + "&enablejsapi=1", this.core.s.youtubePlayerParams && (d = d + "&" + e.param(this.core.s.youtubePlayerParams)), r = '<iframe class="lg-video-object lg-youtube ' + i + '" width="560" height="315" src="//www.youtube.com/embed/' + c.youtube[1] + d + '" frameborder="0" allowfullscreen></iframe>';
        else if (c.vimeo) d = "?autoplay=" + t + "&api=1", this.core.s.vimeoPlayerParams && (d = d + "&" + e.param(this.core.s.vimeoPlayerParams)), r = '<iframe class="lg-video-object lg-vimeo ' + i + '" width="560" height="315"  src="http://player.vimeo.com/video/' + c.vimeo[1] + d + '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
        else if (c.dailymotion) d = "?wmode=opaque&autoplay=" + t + "&api=postMessage", this.core.s.dailymotionPlayerParams && (d = d + "&" + e.param(this.core.s.dailymotionPlayerParams)), r = '<iframe class="lg-video-object lg-dailymotion ' + i + '" width="560" height="315" src="//www.dailymotion.com/embed/video/' + c.dailymotion[1] + d + '" frameborder="0" allowfullscreen></iframe>';
        else if (c.html5) {
            var n = s.substring(0, 1);
            ("." === n || "#" === n) && (s = e(s).html()), r = s
        }
        return r
    }, s.prototype.destroy = function() {
        this.videoLoaded = !1
    }, e.fn.lightGallery.modules.video = s
}(jQuery, window, document);
/*!
Mailchimp Ajax Submit
jQuery Plugin
*/
(function($) {
    $.ajaxChimp = {
        responses: {
            "We have sent you a confirmation email": 0,
            "Please enter a value": 1,
            "An email address must contain a single @": 2,
            "The domain portion of the email address is invalid (the portion after the @: )": 3,
            "The username portion of the email address is invalid (the portion before the @: )": 4,
            "This email address looks fake or invalid. Please enter a real email address": 5
        },
        translations: {
            en: null
        },
        init: function(selector, options) {
            $(selector).ajaxChimp(options)
        }
    };
    $.fn.ajaxChimp = function(options) {
        $(this).each(function(i, elem) {
            var form = $(elem);
            var email = form.find("input[type=text]");
            var label = form.find("label[for=" + email.attr("id") + "]");
            var settings = $.extend({
                url: form.attr("action"),
                language: "en"
            }, options);
            var url = settings.url.replace("/post?", "/post-json?").concat("&c=?");
            form.attr("novalidate", "true");
            email.attr("name", "EMAIL");
            form.submit(function() {
                var msg;

                function successCallback(resp) {
                    if (resp.result === "success") {
                        msg = "We have sent you a confirmation email";
                        label.removeClass("error").addClass("valid");
                        email.removeClass("error").addClass("valid")
                    } else {
                        email.removeClass("valid").addClass("error");
                        label.removeClass("valid").addClass("error");
                        var index = -1;
                        try {
                            var parts = resp.msg.split(" - ", 2);
                            if (parts[1] === undefined) {
                                msg = resp.msg
                            } else {
                                var i = parseInt(parts[0], 10);
                                if (i.toString() === parts[0]) {
                                    index = parts[0];
                                    msg = parts[1]
                                } else {
                                    index = -1;
                                    msg = resp.msg
                                }
                            }
                        } catch (e) {
                            index = -1;
                            msg = resp.msg
                        }
                    }
                    if (settings.language !== "en" && $.ajaxChimp.responses[msg] !== undefined && $.ajaxChimp.translations && $.ajaxChimp.translations[settings.language] && $.ajaxChimp.translations[settings.language][$.ajaxChimp.responses[msg]]) {
                        msg = $.ajaxChimp.translations[settings.language][$.ajaxChimp.responses[msg]]
                    }
                    label.html(msg);
                    label.show(2e3);
                    if (settings.callback) {
                        settings.callback(resp)
                    }
                }
                var data = {};
                var dataArray = form.serializeArray();
                $.each(dataArray, function(index, item) {
                    data[item.name] = item.value
                });
                $.ajax({
                    url: url,
                    data: data,
                    success: successCallback,
                    dataType: "jsonp",
                    error: function(resp, text) {
                        console.log("mailchimp ajax submit error: " + text)
                    }
                });
                var submitMsg = "Submitting...";
                if (settings.language !== "en" && $.ajaxChimp.translations && $.ajaxChimp.translations[settings.language] && $.ajaxChimp.translations[settings.language]["submit"]) {
                    submitMsg = $.ajaxChimp.translations[settings.language]["submit"]
                }
                label.html(submitMsg).show(2e3);
                return false
            })
        });
        return this
    }
})(jQuery);

/** 
 * Lightweight plugin to render simple, animated and retina optimized pie charts
 *
 * @license Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php) and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
 * @author Robert Fleischmann <rendro87@gmail.com> (http://robert-fleischmann.de)
 * @version 2.1.1
 **/
(function(e, t) {
    if (typeof exports === "object") {
        module.exports = t(require("jquery"))
    } else if (typeof define === "function" && define.amd) {
        define("EasyPieChart", ["jquery"], t)
    } else {
        t(e.jQuery)
    }
})(this, function(e) {
    var t = function(e, t) {
        var n;
        var r = document.createElement("canvas");
        if (typeof G_vmlCanvasManager !== "undefined") {
            G_vmlCanvasManager.initElement(r)
        }
        var i = r.getContext("2d");
        r.width = r.height = t.size;
        e.appendChild(r);
        var s = 1;
        if (window.devicePixelRatio > 1) {
            s = window.devicePixelRatio;
            r.style.width = r.style.height = [t.size, "px"].join("");
            r.width = r.height = t.size * s;
            i.scale(s, s)
        }
        i.translate(t.size / 2, t.size / 2);
        i.rotate((-1 / 2 + t.rotate / 180) * Math.PI);
        var o = (t.size - t.lineWidth) / 2;
        if (t.scaleColor && t.scaleLength) {
            o -= t.scaleLength + 2
        }
        Date.now = Date.now || function() {
            return +(new Date)
        };
        var u = function(e, t, n) {
            n = Math.min(Math.max(0, n || 1), 1);
            i.beginPath();
            i.arc(0, 0, o, 0, Math.PI * 2 * n, false);
            i.strokeStyle = e;
            i.lineWidth = t;
            i.stroke()
        };
        var a = function() {
            var e;
            var n;
            var r = 24;
            i.lineWidth = 1;
            i.fillStyle = t.scaleColor;
            i.save();
            for (var r = 24; r > 0; --r) {
                if (r % 6 === 0) {
                    n = t.scaleLength;
                    e = 0
                } else {
                    n = t.scaleLength * .6;
                    e = t.scaleLength - n
                }
                i.fillRect(-t.size / 2 + e, 0, n, 1);
                i.rotate(Math.PI / 12)
            }
            i.restore()
        };
        var f = function() {
            return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || function(e) {
                window.setTimeout(e, 1e3 / 60)
            }
        }();
        var l = function() {
            t.scaleColor && a();
            t.trackColor && u(t.trackColor, t.lineWidth)
        };
        this.clear = function() {
            i.clearRect(t.size / -2, t.size / -2, t.size, t.size)
        };
        this.draw = function(e) {
            if (!!t.scaleColor || !!t.trackColor) {
                if (i.getImageData && i.putImageData) {
                    if (!n) {
                        l();
                        n = i.getImageData(0, 0, t.size * s, t.size * s)
                    } else {
                        i.putImageData(n, 0, 0)
                    }
                } else {
                    this.clear();
                    l()
                }
            } else {
                this.clear()
            }
            i.lineCap = t.lineCap;
            var r;
            if (typeof t.barColor === "function") {
                r = t.barColor(e)
            } else {
                r = t.barColor
            }
            if (e > 0) {
                u(r, t.lineWidth, e / 100)
            }
        }.bind(this);
        this.animate = function(e, n) {
            var r = Date.now();
            t.onStart(e, n);
            var i = function() {
                var s = Math.min(Date.now() - r, t.animate);
                var o = t.easing(this, s, e, n - e, t.animate);
                this.draw(o);
                t.onStep(e, n, o);
                if (s >= t.animate) {
                    t.onStop(e, n)
                } else {
                    f(i)
                }
            }.bind(this);
            f(i)
        }.bind(this)
    };
    var n = function(e, n) {
        var r = {
            barColor: "#F54A4B",
            trackColor: "#ccc",
            scaleColor: "#ccc",
            scaleLength: 0,
            lineCap: "round",
            lineWidth: 10,
            size: 152,
            rotate: 0,
            animate: 4e3,
            easing: function(e, t, n, r, i) {
                t = t / (i / 2);
                if (t < 1) {
                    return r / 2 * t * t + n
                }
                return -r / 2 * (--t * (t - 2) - 1) + n
            },
            onStart: function(e, t) {
                return
            },
            onStep: function(e, t, n) {
                return
            },
            onStop: function(e, t) {
                return
            }
        };
        if (typeof t !== "undefined") {
            r.renderer = t
        } else if (typeof SVGRenderer !== "undefined") {
            r.renderer = SVGRenderer
        } else {
            throw new Error("Please load either the SVG- or the CanvasRenderer")
        }
        var i = {};
        var s = 0;
        var o = function() {
            this.el = e;
            this.options = i;
            for (var t in r) {
                if (r.hasOwnProperty(t)) {
                    i[t] = n && typeof n[t] !== "undefined" ? n[t] : r[t];
                    if (typeof i[t] === "function") {
                        i[t] = i[t].bind(this)
                    }
                }
            }
            if (typeof i.easing === "string" && typeof jQuery !== "undefined" && jQuery.isFunction(jQuery.easing[i.easing])) {
                i.easing = jQuery.easing[i.easing]
            } else {
                i.easing = r.easing
            }
            this.renderer = new i.renderer(e, i);
            this.renderer.draw(s);
            if (e.dataset && e.dataset.percent) {
                this.update(parseFloat(e.dataset.percent))
            } else if (e.getAttribute && e.getAttribute("data-percent")) {
                this.update(parseFloat(e.getAttribute("data-percent")))
            }
        }.bind(this);
        this.update = function(e) {
            e = parseFloat(e);
            if (i.animate) {
                this.renderer.animate(s, e)
            } else {
                this.renderer.draw(e)
            }
            s = e;
            return this
        }.bind(this);
        o()
    };
    e.fn.easyPieChart = function(t) {
        return this.each(function() {
            if (!e.data(this, "easyPieChart")) {
                e.data(this, "easyPieChart", new n(this, t))
            }
        })
    }
});
// ScrollToFixed
(function(a) {
    a.isScrollToFixed = function(b) {
        return !!a(b).data("ScrollToFixed")
    };
    a.ScrollToFixed = function(d, i) {
        var l = this;
        l.$el = a(d);
        l.el = d;
        l.$el.data("ScrollToFixed", l);
        var c = false;
        var G = l.$el;
        var H;
        var E;
        var e;
        var y;
        var D = 0;
        var q = 0;
        var j = -1;
        var f = -1;
        var t = null;
        var z;
        var g;

        function u() {
            G.trigger("preUnfixed.ScrollToFixed");
            k();
            G.trigger("unfixed.ScrollToFixed");
            f = -1;
            D = G.offset().top;
            q = G.offset().left;
            if (l.options.offsets) {
                q += (G.offset().left - G.position().left)
            }
            if (j == -1) {
                j = q
            }
            H = G.css("position");
            c = true;
            if (l.options.bottom != -1) {
                G.trigger("preFixed.ScrollToFixed");
                w();
                G.trigger("fixed.ScrollToFixed")
            }
        }

        function n() {
            var I = l.options.limit;
            if (!I) {
                return 0
            }
            if (typeof(I) === "function") {
                return I.apply(G)
            }
            return I
        }

        function p() {
            return H === "fixed"
        }

        function x() {
            return H === "absolute"
        }

        function h() {
            return !(p() || x())
        }

        function w() {
            if (!p()) {
                t.css({
                    display: G.css("display"),
                    width: G.outerWidth(true),
                    height: G.outerHeight(true),
                    "float": G.css("float")
                });
                cssOptions = {
                    "z-index": l.options.zIndex,
                    position: "fixed",
                    top: l.options.bottom == -1 ? s() : "",
                    bottom: l.options.bottom == -1 ? "" : l.options.bottom,
                    "margin-left": "0px"
                };
                if (!l.options.dontSetWidth) {
                    cssOptions.width = G.width()
                }
                G.css(cssOptions);
                G.addClass(l.options.baseClassName);
                if (l.options.className) {
                    G.addClass(l.options.className)
                }
                H = "fixed"
            }
        }

        function b() {
            var J = n();
            var I = q;
            if (l.options.removeOffsets) {
                I = "";
                J = J - D
            }
            cssOptions = {
                position: "absolute",
                top: J,
                left: I,
                "margin-left": "0px",
                bottom: ""
            };
            if (!l.options.dontSetWidth) {
                cssOptions.width = G.width()
            }
            G.css(cssOptions);
            H = "absolute"
        }

        function k() {
            if (!h()) {
                f = -1;
                t.css("display", "none");
                G.css({
                    "z-index": y,
                    width: "",
                    position: E,
                    left: "",
                    top: e,
                    "margin-left": ""
                });
                G.removeClass("scroll-to-fixed-fixed");
                if (l.options.className) {
                    G.removeClass(l.options.className)
                }
                H = null
            }
        }

        function v(I) {
            if (I != f) {
                G.css("left", q - I);
                f = I
            }
        }

        function s() {
            var I = l.options.marginTop;
            if (!I) {
                return 0
            }
            if (typeof(I) === "function") {
                return I.apply(G)
            }
            return I
        }

        function A() {
            if (!a.isScrollToFixed(G)) {
                return
            }
            var K = c;
            if (!c) {
                u()
            } else {
                if (h()) {
                    D = G.offset().top;
                    q = G.offset().left
                }
            }
            var I = a(window).scrollLeft();
            var L = a(window).scrollTop();
            var J = n();
            if (l.options.minWidth && a(window).width() < l.options.minWidth) {
                if (!h() || !K) {
                    o();
                    G.trigger("preUnfixed.ScrollToFixed");
                    k();
                    G.trigger("unfixed.ScrollToFixed")
                }
            } else {
                if (l.options.maxWidth && a(window).width() > l.options.maxWidth) {
                    if (!h() || !K) {
                        o();
                        G.trigger("preUnfixed.ScrollToFixed");
                        k();
                        G.trigger("unfixed.ScrollToFixed")
                    }
                } else {
                    if (l.options.bottom == -1) {
                        if (J > 0 && L >= J - s()) {
                            if (!x() || !K) {
                                o();
                                G.trigger("preAbsolute.ScrollToFixed");
                                b();
                                G.trigger("unfixed.ScrollToFixed")
                            }
                        } else {
                            if (L >= D - s()) {
                                if (!p() || !K) {
                                    o();
                                    G.trigger("preFixed.ScrollToFixed");
                                    w();
                                    f = -1;
                                    G.trigger("fixed.ScrollToFixed")
                                }
                                v(I)
                            } else {
                                if (!h() || !K) {
                                    o();
                                    G.trigger("preUnfixed.ScrollToFixed");
                                    k();
                                    G.trigger("unfixed.ScrollToFixed")
                                }
                            }
                        }
                    } else {
                        if (J > 0) {
                            if (L + a(window).height() - G.outerHeight(true) >= J - (s() || -m())) {
                                if (p()) {
                                    o();
                                    G.trigger("preUnfixed.ScrollToFixed");
                                    if (E === "absolute") {
                                        b()
                                    } else {
                                        k()
                                    }
                                    G.trigger("unfixed.ScrollToFixed")
                                }
                            } else {
                                if (!p()) {
                                    o();
                                    G.trigger("preFixed.ScrollToFixed");
                                    w()
                                }
                                v(I);
                                G.trigger("fixed.ScrollToFixed")
                            }
                        } else {
                            v(I)
                        }
                    }
                }
            }
        }

        function m() {
            if (!l.options.bottom) {
                return 0
            }
            return l.options.bottom
        }

        function o() {
            var I = G.css("position");
            if (I == "absolute") {
                G.trigger("postAbsolute.ScrollToFixed")
            } else {
                if (I == "fixed") {
                    G.trigger("postFixed.ScrollToFixed")
                } else {
                    G.trigger("postUnfixed.ScrollToFixed")
                }
            }
        }
        var C = function(I) {
            if (G.is(":visible")) {
                c = false;
                A()
            }
        };
        var F = function(I) {
            (!!window.requestAnimationFrame) ? requestAnimationFrame(A): A()
        };
        var B = function() {
            var J = document.body;
            if (document.createElement && J && J.appendChild && J.removeChild) {
                var L = document.createElement("div");
                if (!L.getBoundingClientRect) {
                    return null
                }
                L.innerHTML = "x";
                L.style.cssText = "position:fixed;top:100px;";
                J.appendChild(L);
                var M = J.style.height,
                    N = J.scrollTop;
                J.style.height = "3000px";
                J.scrollTop = 500;
                var I = L.getBoundingClientRect().top;
                J.style.height = M;
                var K = (I === 100);
                J.removeChild(L);
                J.scrollTop = N;
                return K
            }
            return null
        };
        var r = function(I) {
            I = I || window.event;
            if (I.preventDefault) {
                I.preventDefault()
            }
            I.returnValue = false
        };
        l.init = function() {
            l.options = a.extend({}, a.ScrollToFixed.defaultOptions, i);
            y = G.css("z-index");
            l.$el.css("z-index", l.options.zIndex);
            t = a("<div />");
            H = G.css("position");
            E = G.css("position");
            e = G.css("top");
            if (h()) {
                l.$el.after(t)
            }
            a(window).bind("resize.ScrollToFixed", C);
            a(window).bind("scroll.ScrollToFixed", F);
            if ("ontouchmove" in window) {
                a(window).bind("touchmove.ScrollToFixed", A)
            }
            if (l.options.preFixed) {
                G.bind("preFixed.ScrollToFixed", l.options.preFixed)
            }
            if (l.options.postFixed) {
                G.bind("postFixed.ScrollToFixed", l.options.postFixed)
            }
            if (l.options.preUnfixed) {
                G.bind("preUnfixed.ScrollToFixed", l.options.preUnfixed)
            }
            if (l.options.postUnfixed) {
                G.bind("postUnfixed.ScrollToFixed", l.options.postUnfixed)
            }
            if (l.options.preAbsolute) {
                G.bind("preAbsolute.ScrollToFixed", l.options.preAbsolute)
            }
            if (l.options.postAbsolute) {
                G.bind("postAbsolute.ScrollToFixed", l.options.postAbsolute)
            }
            if (l.options.fixed) {
                G.bind("fixed.ScrollToFixed", l.options.fixed)
            }
            if (l.options.unfixed) {
                G.bind("unfixed.ScrollToFixed", l.options.unfixed)
            }
            if (l.options.spacerClass) {
                t.addClass(l.options.spacerClass)
            }
            G.bind("resize.ScrollToFixed", function() {
                t.height(G.height())
            });
            G.bind("scroll.ScrollToFixed", function() {
                G.trigger("preUnfixed.ScrollToFixed");
                k();
                G.trigger("unfixed.ScrollToFixed");
                A()
            });
            G.bind("detach.ScrollToFixed", function(I) {
                r(I);
                G.trigger("preUnfixed.ScrollToFixed");
                k();
                G.trigger("unfixed.ScrollToFixed");
                a(window).unbind("resize.ScrollToFixed", C);
                a(window).unbind("scroll.ScrollToFixed", F);
                G.unbind(".ScrollToFixed");
                t.remove();
                l.$el.removeData("ScrollToFixed")
            });
            C()
        };
        l.init()
    };
    a.ScrollToFixed.defaultOptions = {
        marginTop: 0,
        limit: 0,
        bottom: -1,
        zIndex: 1000,
        baseClassName: "scroll-to-fixed-fixed"
    };
    a.fn.scrollToFixed = function(b) {
        return this.each(function() {
            (new a.ScrollToFixed(this, b))
        })
    }
})(jQuery);

// niceSelect 
! function(e) {
    e.fn.niceSelect = function(t) {
        if ("string" == typeof t) return "update" == t ? this.each(function() {
            var t = e(this),
                l = e(this).next(".nice-select"),
                c = l.hasClass("open");
            l.length && (l.remove(), s(t), c && t.next().trigger("click"))
        }) : "destroy" == t ? (this.each(function() {
            var t = e(this),
                s = e(this).next(".nice-select");
            s.length && (s.remove(), t.css("display", ""))
        }), 0 == e(".nice-select").length && e(document).off(".nice_select")) : console.log('Method "' + t + '" does not exist.'), this;

        function s(t) {
            t.after(e("<div></div>").addClass("nice-select").addClass(t.attr("class") || "").addClass(t.attr("disabled") ? "disabled" : "").addClass(t.attr("multiple") ? "has-multiple" : "").attr("tabindex", t.attr("disabled") ? null : "0").html(t.attr("multiple") ? '<span class="multiple-options"></span><div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="Search..."/></div><ul class="list"></ul>' : '<span class="current"></span><div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="Search..."/></div><ul class="list"></ul>'));
            var s = t.next(),
                l = t.find("option");
            if (t.attr("multiple")) {
                var c = "";
                (a = t.find("option:selected")).each(function() {
                    $selected_option = e(this), $selected_text = $selected_option.data("display") || $selected_option.text(), c += '<span class="current">' + $selected_text + "</span>"
                }), $select_placeholder = t.data("placeholder") || t.attr("placeholder"), $select_placeholder = "" == $select_placeholder ? "Select" : $select_placeholder, c = "" == c ? $select_placeholder : c, s.find(".multiple-options").html(c)
            } else {
                var a = t.find("option:selected");
                s.find(".current").html(a.data("display") || a.text())
            }
            l.each(function(t) {
                var l = e(this),
                    c = l.data("display");
                s.find("ul").append(e("<li></li>").attr("data-value", l.val()).attr("data-display", c || null).addClass("option" + (l.is(":selected") ? " selected" : "") + (l.is(":disabled") ? " disabled" : "")).html(l.text()))
            })
        }
        this.hide(), this.each(function() {
            var t = e(this);
            t.next().hasClass("nice-select") || s(t)
        }), e(document).off(".nice_select"), e(document).on("click.nice_select", ".nice-select", function(t) {
            var s = e(this);
            e(".nice-select").not(s).removeClass("open"), s.toggleClass("open"), s.hasClass("open") ? (s.find(".option"), s.find(".nice-select-search").val(""), s.find(".nice-select-search").focus(), s.find(".focus").removeClass("focus"), s.find(".selected").addClass("focus"), s.find("ul li").show()) : s.focus()
        }), e(document).on("click", ".nice-select-search-box", function(e) {
            return e.stopPropagation(), !1
        }), e(document).on("click.nice_select", function(t) {
            0 === e(t.target).closest(".nice-select").length && e(".nice-select").removeClass("open").find(".option")
        }), e(document).on("click.nice_select", ".nice-select .option:not(.disabled)", function(t) {
            var s = e(this),
                l = s.closest(".nice-select");
            if (l.hasClass("has-multiple")) s.hasClass("selected") ? s.removeClass("selected") : s.addClass("selected"), $selected_html = "", $selected_values = [], l.find(".selected").each(function() {
                $selected_option = e(this);
                var t = $selected_option.data("display") || $selected_option.text();
                $selected_html += '<span class="current">' + t + "</span>", $selected_values.push($selected_option.data("value"))
            }), $select_placeholder = l.prev("select").data("placeholder") || l.prev("select").attr("placeholder"), $select_placeholder = "" == $select_placeholder ? "Select" : $select_placeholder, $selected_html = "" == $selected_html ? $select_placeholder : $selected_html, l.find(".multiple-options").html($selected_html), l.prev("select").val($selected_values).trigger("change");
            else {
                l.find(".selected").removeClass("selected"), s.addClass("selected");
                var c = s.data("display") || s.text();
                l.find(".current").text(c), l.prev("select").val(s.data("value")).trigger("change")
            }
        }), e(document).on("keydown.nice_select", ".nice-select", function(t) {
            var s = e(this),
                l = e(s.find(".focus") || s.find(".list .option.selected"));
            if (32 == t.keyCode || 13 == t.keyCode) return s.hasClass("open") ? l.trigger("click") : s.trigger("click"), !1;
            if (40 == t.keyCode) {
                if (s.hasClass("open")) {
                    var c = l.nextAll(".option:not(.disabled)").first();
                    c.length > 0 && (s.find(".focus").removeClass("focus"), c.addClass("focus"))
                } else s.trigger("click");
                return !1
            }
            if (38 == t.keyCode) {
                if (s.hasClass("open")) {
                    var a = l.prevAll(".option:not(.disabled)").first();
                    a.length > 0 && (s.find(".focus").removeClass("focus"), a.addClass("focus"))
                } else s.trigger("click");
                return !1
            }
            if (27 == t.keyCode) s.hasClass("open") && s.trigger("click");
            else if (9 == t.keyCode && s.hasClass("open")) return !1
        }), e(document).on("keydown.nice-select-search", ".nice-select", function() {
            var t = e(this),
                s = t.find(".nice-select-search").val(),
                l = t.find("ul li");
            if ("" == s) l.show();
            else if (t.hasClass("open")) {
                s = s.toLowerCase();
                var c = new RegExp(s);
                0 < l.length ? l.each(function() {
                    var t = e(this),
                        s = t.text().toLowerCase();
                    c.test(s) ? t.show() : t.hide()
                }) : l.show()
            }
        });
        var l = document.createElement("a").style;
        return l.cssText = "pointer-events:auto", "auto" !== l.pointerEvents && e("html").addClass("no-csspointerevents"), this
    }
}(jQuery);
// Ion.RangeSlider | version 2.2.0 | https://github.com/IonDen/ion.rangeSlider
;
(function(f) {
    "function" === typeof define && define.amd ? define(["jquery"], function(n) {
        return f(n, document, window, navigator)
    }) : "object" === typeof exports ? f(require("jquery"), document, window, navigator) : f(jQuery, document, window, navigator)
})(function(f, n, k, r, p) {
    var t = 0,
        m = function() {
            var a = r.userAgent,
                b = /msie\s\d+/i;
            return 0 < a.search(b) && (a = b.exec(a).toString(), a = a.split(" ")[1], 9 > a) ? (f("html").addClass("lt-ie9"), !0) : !1
        }();
    Function.prototype.bind || (Function.prototype.bind = function(a) {
        var b = this,
            d = [].slice;
        if ("function" !=
            typeof b) throw new TypeError;
        var c = d.call(arguments, 1),
            e = function() {
                if (this instanceof e) {
                    var g = function() {};
                    g.prototype = b.prototype;
                    var g = new g,
                        l = b.apply(g, c.concat(d.call(arguments)));
                    return Object(l) === l ? l : g
                }
                return b.apply(a, c.concat(d.call(arguments)))
            };
        return e
    });
    Array.prototype.indexOf || (Array.prototype.indexOf = function(a, b) {
        if (null == this) throw new TypeError('"this" is null or not defined');
        var d = Object(this),
            c = d.length >>> 0;
        if (0 === c) return -1;
        var e = +b || 0;
        Infinity === Math.abs(e) && (e = 0);
        if (e >= c) return -1;
        for (e = Math.max(0 <= e ? e : c - Math.abs(e), 0); e < c;) {
            if (e in d && d[e] === a) return e;
            e++
        }
        return -1
    });
    var q = function(a, b, d) {
        this.VERSION = "2.2.0";
        this.input = a;
        this.plugin_count = d;
        this.old_to = this.old_from = this.update_tm = this.calc_count = this.current_plugin = 0;
        this.raf_id = this.old_min_interval = null;
        this.no_diapason = this.force_redraw = this.dragging = !1;
        this.has_tab_index = !0;
        this.is_update = this.is_key = !1;
        this.is_start = !0;
        this.is_click = this.is_resize = this.is_active = this.is_finish = !1;
        b = b || {};
        this.$cache = {
            win: f(k),
            body: f(n.body),
            input: f(a),
            cont: null,
            rs: null,
            min: null,
            max: null,
            from: null,
            to: null,
            single: null,
            bar: null,
            line: null,
            s_single: null,
            s_from: null,
            s_to: null,
            shad_single: null,
            shad_from: null,
            shad_to: null,
            edge: null,
            grid: null,
            grid_labels: []
        };
        this.coords = {
            x_gap: 0,
            x_pointer: 0,
            w_rs: 0,
            w_rs_old: 0,
            w_handle: 0,
            p_gap: 0,
            p_gap_left: 0,
            p_gap_right: 0,
            p_step: 0,
            p_pointer: 0,
            p_handle: 0,
            p_single_fake: 0,
            p_single_real: 0,
            p_from_fake: 0,
            p_from_real: 0,
            p_to_fake: 0,
            p_to_real: 0,
            p_bar_x: 0,
            p_bar_w: 0,
            grid_gap: 0,
            big_num: 0,
            big: [],
            big_w: [],
            big_p: [],
            big_x: []
        };
        this.labels = {
            w_min: 0,
            w_max: 0,
            w_from: 0,
            w_to: 0,
            w_single: 0,
            p_min: 0,
            p_max: 0,
            p_from_fake: 0,
            p_from_left: 0,
            p_to_fake: 0,
            p_to_left: 0,
            p_single_fake: 0,
            p_single_left: 0
        };
        var c = this.$cache.input;
        a = c.prop("value");
        var e;
        d = {
            type: "single",
            min: 10,
            max: 100,
            from: null,
            to: null,
            step: 1,
            min_interval: 0,
            max_interval: 0,
            drag_interval: !1,
            values: [],
            p_values: [],
            from_fixed: !1,
            from_min: null,
            from_max: null,
            from_shadow: !1,
            to_fixed: !1,
            to_min: null,
            to_max: null,
            to_shadow: !1,
            prettify_enabled: !0,
            prettify_separator: " ",
            prettify: null,
            force_edges: !1,
            keyboard: !0,
            grid: !1,
            grid_margin: !0,
            grid_num: 4,
            grid_snap: !1,
            hide_min_max: !1,
            hide_from_to: !1,
            prefix: "",
            postfix: "",
            max_postfix: "",
            decorate_both: !0,
            values_separator: " \u2014 ",
            input_values_separator: ";",
            disable: !1,
            block: !1,
            extra_classes: "",
            scope: null,
            onStart: null,
            onChange: null,
            onFinish: null,
            onUpdate: null
        };
        "INPUT" !== c[0].nodeName && console && console.warn && console.warn("Base element should be <input>!", c[0]);
        c = {
            type: c.data("type"),
            min: c.data("min"),
            max: c.data("max"),
            from: c.data("from"),
            to: c.data("to"),
            step: c.data("step"),
            min_interval: c.data("minInterval"),
            max_interval: c.data("maxInterval"),
            drag_interval: c.data("dragInterval"),
            values: c.data("values"),
            from_fixed: c.data("fromFixed"),
            from_min: c.data("fromMin"),
            from_max: c.data("fromMax"),
            from_shadow: c.data("fromShadow"),
            to_fixed: c.data("toFixed"),
            to_min: c.data("toMin"),
            to_max: c.data("toMax"),
            to_shadow: c.data("toShadow"),
            prettify_enabled: c.data("prettifyEnabled"),
            prettify_separator: c.data("prettifySeparator"),
            force_edges: c.data("forceEdges"),
            keyboard: c.data("keyboard"),
            grid: c.data("grid"),
            grid_margin: c.data("gridMargin"),
            grid_num: c.data("gridNum"),
            grid_snap: c.data("gridSnap"),
            hide_min_max: c.data("hideMinMax"),
            hide_from_to: c.data("hideFromTo"),
            prefix: c.data("prefix"),
            postfix: c.data("postfix"),
            max_postfix: c.data("maxPostfix"),
            decorate_both: c.data("decorateBoth"),
            values_separator: c.data("valuesSeparator"),
            input_values_separator: c.data("inputValuesSeparator"),
            disable: c.data("disable"),
            block: c.data("block"),
            extra_classes: c.data("extraClasses")
        };
        c.values = c.values && c.values.split(",");
        for (e in c) c.hasOwnProperty(e) && (c[e] !== p && "" !== c[e] || delete c[e]);
        a !== p && "" !== a && (a = a.split(c.input_values_separator || b.input_values_separator || ";"), a[0] && a[0] == +a[0] && (a[0] = +a[0]), a[1] && a[1] == +a[1] && (a[1] = +a[1]), b && b.values && b.values.length ? (d.from = a[0] && b.values.indexOf(a[0]), d.to = a[1] && b.values.indexOf(a[1])) : (d.from = a[0] && +a[0], d.to = a[1] && +a[1]));
        f.extend(d, b);
        f.extend(d, c);
        this.options = d;
        this.update_check = {};
        this.validate();
        this.result = {
            input: this.$cache.input,
            slider: null,
            min: this.options.min,
            max: this.options.max,
            from: this.options.from,
            from_percent: 0,
            from_value: null,
            to: this.options.to,
            to_percent: 0,
            to_value: null
        };
        this.init()
    };
    q.prototype = {
        init: function(a) {
            this.no_diapason = !1;
            this.coords.p_step = this.convertToPercent(this.options.step, !0);
            this.target = "base";
            this.toggleInput();
            this.append();
            this.setMinMax();
            a ? (this.force_redraw = !0, this.calc(!0), this.callOnUpdate()) : (this.force_redraw = !0, this.calc(!0), this.callOnStart());
            this.updateScene()
        },
        append: function() {
            this.$cache.input.before('<span class="irs js-irs-' +
                this.plugin_count + " " + this.options.extra_classes + '"></span>');
            this.$cache.input.prop("readonly", !0);
            this.$cache.cont = this.$cache.input.prev();
            this.result.slider = this.$cache.cont;
            this.$cache.cont.html('<span class="irs"><span class="irs-line" tabindex="0"><span class="irs-line-left"></span><span class="irs-line-mid"></span><span class="irs-line-right"></span></span><span class="irs-min">0</span><span class="irs-max">1</span><span class="irs-from">0</span><span class="irs-to">0</span><span class="irs-single">0</span></span><span class="irs-grid"></span><span class="irs-bar"></span>');
            this.$cache.rs = this.$cache.cont.find(".irs");
            this.$cache.min = this.$cache.cont.find(".irs-min");
            this.$cache.max = this.$cache.cont.find(".irs-max");
            this.$cache.from = this.$cache.cont.find(".irs-from");
            this.$cache.to = this.$cache.cont.find(".irs-to");
            this.$cache.single = this.$cache.cont.find(".irs-single");
            this.$cache.bar = this.$cache.cont.find(".irs-bar");
            this.$cache.line = this.$cache.cont.find(".irs-line");
            this.$cache.grid = this.$cache.cont.find(".irs-grid");
            "single" === this.options.type ? (this.$cache.cont.append('<span class="irs-bar-edge"></span><span class="irs-shadow shadow-single"></span><span class="irs-slider single"></span>'),
                this.$cache.edge = this.$cache.cont.find(".irs-bar-edge"), this.$cache.s_single = this.$cache.cont.find(".single"), this.$cache.from[0].style.visibility = "hidden", this.$cache.to[0].style.visibility = "hidden", this.$cache.shad_single = this.$cache.cont.find(".shadow-single")) : (this.$cache.cont.append('<span class="irs-shadow shadow-from"></span><span class="irs-shadow shadow-to"></span><span class="irs-slider from"></span><span class="irs-slider to"></span>'), this.$cache.s_from = this.$cache.cont.find(".from"),
                this.$cache.s_to = this.$cache.cont.find(".to"), this.$cache.shad_from = this.$cache.cont.find(".shadow-from"), this.$cache.shad_to = this.$cache.cont.find(".shadow-to"), this.setTopHandler());
            this.options.hide_from_to && (this.$cache.from[0].style.display = "none", this.$cache.to[0].style.display = "none", this.$cache.single[0].style.display = "none");
            this.appendGrid();
            this.options.disable ? (this.appendDisableMask(), this.$cache.input[0].disabled = !0) : (this.$cache.input[0].disabled = !1, this.removeDisableMask(), this.bindEvents());
            this.options.disable || (this.options.block ? this.appendDisableMask() : this.removeDisableMask());
            this.options.drag_interval && (this.$cache.bar[0].style.cursor = "ew-resize")
        },
        setTopHandler: function() {
            var a = this.options.max,
                b = this.options.to;
            this.options.from > this.options.min && b === a ? this.$cache.s_from.addClass("type_last") : b < a && this.$cache.s_to.addClass("type_last")
        },
        changeLevel: function(a) {
            switch (a) {
                case "single":
                    this.coords.p_gap = this.toFixed(this.coords.p_pointer - this.coords.p_single_fake);
                    this.$cache.s_single.addClass("state_hover");
                    break;
                case "from":
                    this.coords.p_gap = this.toFixed(this.coords.p_pointer - this.coords.p_from_fake);
                    this.$cache.s_from.addClass("state_hover");
                    this.$cache.s_from.addClass("type_last");
                    this.$cache.s_to.removeClass("type_last");
                    break;
                case "to":
                    this.coords.p_gap = this.toFixed(this.coords.p_pointer - this.coords.p_to_fake);
                    this.$cache.s_to.addClass("state_hover");
                    this.$cache.s_to.addClass("type_last");
                    this.$cache.s_from.removeClass("type_last");
                    break;
                case "both":
                    this.coords.p_gap_left = this.toFixed(this.coords.p_pointer -
                        this.coords.p_from_fake), this.coords.p_gap_right = this.toFixed(this.coords.p_to_fake - this.coords.p_pointer), this.$cache.s_to.removeClass("type_last"), this.$cache.s_from.removeClass("type_last")
            }
        },
        appendDisableMask: function() {
            this.$cache.cont.append('<span class="irs-disable-mask"></span>');
            this.$cache.cont.addClass("irs-disabled")
        },
        removeDisableMask: function() {
            this.$cache.cont.remove(".irs-disable-mask");
            this.$cache.cont.removeClass("irs-disabled")
        },
        remove: function() {
            this.$cache.cont.remove();
            this.$cache.cont =
                null;
            this.$cache.line.off("keydown.irs_" + this.plugin_count);
            this.$cache.body.off("touchmove.irs_" + this.plugin_count);
            this.$cache.body.off("mousemove.irs_" + this.plugin_count);
            this.$cache.win.off("touchend.irs_" + this.plugin_count);
            this.$cache.win.off("mouseup.irs_" + this.plugin_count);
            m && (this.$cache.body.off("mouseup.irs_" + this.plugin_count), this.$cache.body.off("mouseleave.irs_" + this.plugin_count));
            this.$cache.grid_labels = [];
            this.coords.big = [];
            this.coords.big_w = [];
            this.coords.big_p = [];
            this.coords.big_x = [];
            cancelAnimationFrame(this.raf_id)
        },
        bindEvents: function() {
            if (!this.no_diapason) {
                this.$cache.body.on("touchmove.irs_" + this.plugin_count, this.pointerMove.bind(this));
                this.$cache.body.on("mousemove.irs_" + this.plugin_count, this.pointerMove.bind(this));
                this.$cache.win.on("touchend.irs_" + this.plugin_count, this.pointerUp.bind(this));
                this.$cache.win.on("mouseup.irs_" + this.plugin_count, this.pointerUp.bind(this));
                this.$cache.line.on("touchstart.irs_" + this.plugin_count, this.pointerClick.bind(this, "click"));
                this.$cache.line.on("mousedown.irs_" + this.plugin_count, this.pointerClick.bind(this, "click"));
                this.$cache.line.on("focus.irs_" + this.plugin_count, this.pointerFocus.bind(this));
                this.options.drag_interval && "double" === this.options.type ? (this.$cache.bar.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "both")), this.$cache.bar.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "both"))) : (this.$cache.bar.on("touchstart.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")),
                    this.$cache.bar.on("mousedown.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")));
                "single" === this.options.type ? (this.$cache.single.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "single")), this.$cache.s_single.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "single")), this.$cache.shad_single.on("touchstart.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.$cache.single.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this,
                    "single")), this.$cache.s_single.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "single")), this.$cache.edge.on("mousedown.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.$cache.shad_single.on("mousedown.irs_" + this.plugin_count, this.pointerClick.bind(this, "click"))) : (this.$cache.single.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, null)), this.$cache.single.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, null)), this.$cache.from.on("touchstart.irs_" +
                    this.plugin_count, this.pointerDown.bind(this, "from")), this.$cache.s_from.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "from")), this.$cache.to.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "to")), this.$cache.s_to.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "to")), this.$cache.shad_from.on("touchstart.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.$cache.shad_to.on("touchstart.irs_" + this.plugin_count, this.pointerClick.bind(this,
                    "click")), this.$cache.from.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "from")), this.$cache.s_from.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "from")), this.$cache.to.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "to")), this.$cache.s_to.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "to")), this.$cache.shad_from.on("mousedown.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.$cache.shad_to.on("mousedown.irs_" +
                    this.plugin_count, this.pointerClick.bind(this, "click")));
                if (this.options.keyboard) this.$cache.line.on("keydown.irs_" + this.plugin_count, this.key.bind(this, "keyboard"));
                m && (this.$cache.body.on("mouseup.irs_" + this.plugin_count, this.pointerUp.bind(this)), this.$cache.body.on("mouseleave.irs_" + this.plugin_count, this.pointerUp.bind(this)))
            }
        },
        pointerFocus: function(a) {
            if (!this.target) {
                var b = "single" === this.options.type ? this.$cache.single : this.$cache.from;
                a = b.offset().left;
                a += b.width() / 2 - 1;
                this.pointerClick("single", {
                    preventDefault: function() {},
                    pageX: a
                })
            }
        },
        pointerMove: function(a) {
            this.dragging && (this.coords.x_pointer = (a.pageX || a.originalEvent.touches && a.originalEvent.touches[0].pageX) - this.coords.x_gap, this.calc())
        },
        pointerUp: function(a) {
            this.current_plugin === this.plugin_count && this.is_active && (this.is_active = !1, this.$cache.cont.find(".state_hover").removeClass("state_hover"), this.force_redraw = !0, m && f("*").prop("unselectable", !1), this.updateScene(), this.restoreOriginalMinInterval(), (f.contains(this.$cache.cont[0],
                a.target) || this.dragging) && this.callOnFinish(), this.dragging = !1)
        },
        pointerDown: function(a, b) {
            b.preventDefault();
            var d = b.pageX || b.originalEvent.touches && b.originalEvent.touches[0].pageX;
            2 !== b.button && ("both" === a && this.setTempMinInterval(), a || (a = this.target || "from"), this.current_plugin = this.plugin_count, this.target = a, this.dragging = this.is_active = !0, this.coords.x_gap = this.$cache.rs.offset().left, this.coords.x_pointer = d - this.coords.x_gap, this.calcPointerPercent(), this.changeLevel(a), m && f("*").prop("unselectable", !0), this.$cache.line.trigger("focus"), this.updateScene())
        },
        pointerClick: function(a, b) {
            b.preventDefault();
            var d = b.pageX || b.originalEvent.touches && b.originalEvent.touches[0].pageX;
            2 !== b.button && (this.current_plugin = this.plugin_count, this.target = a, this.is_click = !0, this.coords.x_gap = this.$cache.rs.offset().left, this.coords.x_pointer = +(d - this.coords.x_gap).toFixed(), this.force_redraw = !0, this.calc(), this.$cache.line.trigger("focus"))
        },
        key: function(a, b) {
            if (!(this.current_plugin !== this.plugin_count || b.altKey ||
                    b.ctrlKey || b.shiftKey || b.metaKey)) {
                switch (b.which) {
                    case 83:
                    case 65:
                    case 40:
                    case 37:
                        b.preventDefault();
                        this.moveByKey(!1);
                        break;
                    case 87:
                    case 68:
                    case 38:
                    case 39:
                        b.preventDefault(), this.moveByKey(!0)
                }
                return !0
            }
        },
        moveByKey: function(a) {
            var b = this.coords.p_pointer,
                d = (this.options.max - this.options.min) / 100,
                d = this.options.step / d;
            this.coords.x_pointer = this.toFixed(this.coords.w_rs / 100 * (a ? b + d : b - d));
            this.is_key = !0;
            this.calc()
        },
        setMinMax: function() {
            if (this.options)
                if (this.options.hide_min_max) this.$cache.min[0].style.display =
                    "none", this.$cache.max[0].style.display = "none";
                else {
                    if (this.options.values.length) this.$cache.min.html(this.decorate(this.options.p_values[this.options.min])), this.$cache.max.html(this.decorate(this.options.p_values[this.options.max]));
                    else {
                        var a = this._prettify(this.options.min),
                            b = this._prettify(this.options.max);
                        this.result.min_pretty = a;
                        this.result.max_pretty = b;
                        this.$cache.min.html(this.decorate(a, this.options.min));
                        this.$cache.max.html(this.decorate(b, this.options.max))
                    }
                    this.labels.w_min = this.$cache.min.outerWidth(!1);
                    this.labels.w_max = this.$cache.max.outerWidth(!1)
                }
        },
        setTempMinInterval: function() {
            var a = this.result.to - this.result.from;
            null === this.old_min_interval && (this.old_min_interval = this.options.min_interval);
            this.options.min_interval = a
        },
        restoreOriginalMinInterval: function() {
            null !== this.old_min_interval && (this.options.min_interval = this.old_min_interval, this.old_min_interval = null)
        },
        calc: function(a) {
            if (this.options) {
                this.calc_count++;
                if (10 === this.calc_count || a) this.calc_count = 0, this.coords.w_rs = this.$cache.rs.outerWidth(!1),
                    this.calcHandlePercent();
                if (this.coords.w_rs) {
                    this.calcPointerPercent();
                    a = this.getHandleX();
                    "both" === this.target && (this.coords.p_gap = 0, a = this.getHandleX());
                    "click" === this.target && (this.coords.p_gap = this.coords.p_handle / 2, a = this.getHandleX(), this.target = this.options.drag_interval ? "both_one" : this.chooseHandle(a));
                    switch (this.target) {
                        case "base":
                            var b = (this.options.max - this.options.min) / 100;
                            a = (this.result.from - this.options.min) / b;
                            b = (this.result.to - this.options.min) / b;
                            this.coords.p_single_real = this.toFixed(a);
                            this.coords.p_from_real = this.toFixed(a);
                            this.coords.p_to_real = this.toFixed(b);
                            this.coords.p_single_real = this.checkDiapason(this.coords.p_single_real, this.options.from_min, this.options.from_max);
                            this.coords.p_from_real = this.checkDiapason(this.coords.p_from_real, this.options.from_min, this.options.from_max);
                            this.coords.p_to_real = this.checkDiapason(this.coords.p_to_real, this.options.to_min, this.options.to_max);
                            this.coords.p_single_fake = this.convertToFakePercent(this.coords.p_single_real);
                            this.coords.p_from_fake =
                                this.convertToFakePercent(this.coords.p_from_real);
                            this.coords.p_to_fake = this.convertToFakePercent(this.coords.p_to_real);
                            this.target = null;
                            break;
                        case "single":
                            if (this.options.from_fixed) break;
                            this.coords.p_single_real = this.convertToRealPercent(a);
                            this.coords.p_single_real = this.calcWithStep(this.coords.p_single_real);
                            this.coords.p_single_real = this.checkDiapason(this.coords.p_single_real, this.options.from_min, this.options.from_max);
                            this.coords.p_single_fake = this.convertToFakePercent(this.coords.p_single_real);
                            break;
                        case "from":
                            if (this.options.from_fixed) break;
                            this.coords.p_from_real = this.convertToRealPercent(a);
                            this.coords.p_from_real = this.calcWithStep(this.coords.p_from_real);
                            this.coords.p_from_real > this.coords.p_to_real && (this.coords.p_from_real = this.coords.p_to_real);
                            this.coords.p_from_real = this.checkDiapason(this.coords.p_from_real, this.options.from_min, this.options.from_max);
                            this.coords.p_from_real = this.checkMinInterval(this.coords.p_from_real, this.coords.p_to_real, "from");
                            this.coords.p_from_real =
                                this.checkMaxInterval(this.coords.p_from_real, this.coords.p_to_real, "from");
                            this.coords.p_from_fake = this.convertToFakePercent(this.coords.p_from_real);
                            break;
                        case "to":
                            if (this.options.to_fixed) break;
                            this.coords.p_to_real = this.convertToRealPercent(a);
                            this.coords.p_to_real = this.calcWithStep(this.coords.p_to_real);
                            this.coords.p_to_real < this.coords.p_from_real && (this.coords.p_to_real = this.coords.p_from_real);
                            this.coords.p_to_real = this.checkDiapason(this.coords.p_to_real, this.options.to_min, this.options.to_max);
                            this.coords.p_to_real = this.checkMinInterval(this.coords.p_to_real, this.coords.p_from_real, "to");
                            this.coords.p_to_real = this.checkMaxInterval(this.coords.p_to_real, this.coords.p_from_real, "to");
                            this.coords.p_to_fake = this.convertToFakePercent(this.coords.p_to_real);
                            break;
                        case "both":
                            if (this.options.from_fixed || this.options.to_fixed) break;
                            a = this.toFixed(a + .001 * this.coords.p_handle);
                            this.coords.p_from_real = this.convertToRealPercent(a) - this.coords.p_gap_left;
                            this.coords.p_from_real = this.calcWithStep(this.coords.p_from_real);
                            this.coords.p_from_real = this.checkDiapason(this.coords.p_from_real, this.options.from_min, this.options.from_max);
                            this.coords.p_from_real = this.checkMinInterval(this.coords.p_from_real, this.coords.p_to_real, "from");
                            this.coords.p_from_fake = this.convertToFakePercent(this.coords.p_from_real);
                            this.coords.p_to_real = this.convertToRealPercent(a) + this.coords.p_gap_right;
                            this.coords.p_to_real = this.calcWithStep(this.coords.p_to_real);
                            this.coords.p_to_real = this.checkDiapason(this.coords.p_to_real, this.options.to_min,
                                this.options.to_max);
                            this.coords.p_to_real = this.checkMinInterval(this.coords.p_to_real, this.coords.p_from_real, "to");
                            this.coords.p_to_fake = this.convertToFakePercent(this.coords.p_to_real);
                            break;
                        case "both_one":
                            if (!this.options.from_fixed && !this.options.to_fixed) {
                                var d = this.convertToRealPercent(a);
                                a = this.result.to_percent - this.result.from_percent;
                                var c = a / 2,
                                    b = d - c,
                                    d = d + c;
                                0 > b && (b = 0, d = b + a);
                                100 < d && (d = 100, b = d - a);
                                this.coords.p_from_real = this.calcWithStep(b);
                                this.coords.p_from_real = this.checkDiapason(this.coords.p_from_real,
                                    this.options.from_min, this.options.from_max);
                                this.coords.p_from_fake = this.convertToFakePercent(this.coords.p_from_real);
                                this.coords.p_to_real = this.calcWithStep(d);
                                this.coords.p_to_real = this.checkDiapason(this.coords.p_to_real, this.options.to_min, this.options.to_max);
                                this.coords.p_to_fake = this.convertToFakePercent(this.coords.p_to_real)
                            }
                    }
                    "single" === this.options.type ? (this.coords.p_bar_x = this.coords.p_handle / 2, this.coords.p_bar_w = this.coords.p_single_fake, this.result.from_percent = this.coords.p_single_real,
                        this.result.from = this.convertToValue(this.coords.p_single_real), this.result.from_pretty = this._prettify(this.result.from), this.options.values.length && (this.result.from_value = this.options.values[this.result.from])) : (this.coords.p_bar_x = this.toFixed(this.coords.p_from_fake + this.coords.p_handle / 2), this.coords.p_bar_w = this.toFixed(this.coords.p_to_fake - this.coords.p_from_fake), this.result.from_percent = this.coords.p_from_real, this.result.from = this.convertToValue(this.coords.p_from_real), this.result.from_pretty =
                        this._prettify(this.result.from), this.result.to_percent = this.coords.p_to_real, this.result.to = this.convertToValue(this.coords.p_to_real), this.result.to_pretty = this._prettify(this.result.to), this.options.values.length && (this.result.from_value = this.options.values[this.result.from], this.result.to_value = this.options.values[this.result.to]));
                    this.calcMinMax();
                    this.calcLabels()
                }
            }
        },
        calcPointerPercent: function() {
            this.coords.w_rs ? (0 > this.coords.x_pointer || isNaN(this.coords.x_pointer) ? this.coords.x_pointer =
                0 : this.coords.x_pointer > this.coords.w_rs && (this.coords.x_pointer = this.coords.w_rs), this.coords.p_pointer = this.toFixed(this.coords.x_pointer / this.coords.w_rs * 100)) : this.coords.p_pointer = 0
        },
        convertToRealPercent: function(a) {
            return a / (100 - this.coords.p_handle) * 100
        },
        convertToFakePercent: function(a) {
            return a / 100 * (100 - this.coords.p_handle)
        },
        getHandleX: function() {
            var a = 100 - this.coords.p_handle,
                b = this.toFixed(this.coords.p_pointer - this.coords.p_gap);
            0 > b ? b = 0 : b > a && (b = a);
            return b
        },
        calcHandlePercent: function() {
            this.coords.w_handle =
                "single" === this.options.type ? this.$cache.s_single.outerWidth(!1) : this.$cache.s_from.outerWidth(!1);
            this.coords.p_handle = this.toFixed(this.coords.w_handle / this.coords.w_rs * 100)
        },
        chooseHandle: function(a) {
            return "single" === this.options.type ? "single" : a >= this.coords.p_from_real + (this.coords.p_to_real - this.coords.p_from_real) / 2 ? this.options.to_fixed ? "from" : "to" : this.options.from_fixed ? "to" : "from"
        },
        calcMinMax: function() {
            this.coords.w_rs && (this.labels.p_min = this.labels.w_min / this.coords.w_rs * 100, this.labels.p_max =
                this.labels.w_max / this.coords.w_rs * 100)
        },
        calcLabels: function() {
            this.coords.w_rs && !this.options.hide_from_to && ("single" === this.options.type ? (this.labels.w_single = this.$cache.single.outerWidth(!1), this.labels.p_single_fake = this.labels.w_single / this.coords.w_rs * 100, this.labels.p_single_left = this.coords.p_single_fake + this.coords.p_handle / 2 - this.labels.p_single_fake / 2) : (this.labels.w_from = this.$cache.from.outerWidth(!1), this.labels.p_from_fake = this.labels.w_from / this.coords.w_rs * 100, this.labels.p_from_left =
                this.coords.p_from_fake + this.coords.p_handle / 2 - this.labels.p_from_fake / 2, this.labels.p_from_left = this.toFixed(this.labels.p_from_left), this.labels.p_from_left = this.checkEdges(this.labels.p_from_left, this.labels.p_from_fake), this.labels.w_to = this.$cache.to.outerWidth(!1), this.labels.p_to_fake = this.labels.w_to / this.coords.w_rs * 100, this.labels.p_to_left = this.coords.p_to_fake + this.coords.p_handle / 2 - this.labels.p_to_fake / 2, this.labels.p_to_left = this.toFixed(this.labels.p_to_left), this.labels.p_to_left =
                this.checkEdges(this.labels.p_to_left, this.labels.p_to_fake), this.labels.w_single = this.$cache.single.outerWidth(!1), this.labels.p_single_fake = this.labels.w_single / this.coords.w_rs * 100, this.labels.p_single_left = (this.labels.p_from_left + this.labels.p_to_left + this.labels.p_to_fake) / 2 - this.labels.p_single_fake / 2, this.labels.p_single_left = this.toFixed(this.labels.p_single_left)), this.labels.p_single_left = this.checkEdges(this.labels.p_single_left, this.labels.p_single_fake))
        },
        updateScene: function() {
            this.raf_id &&
                (cancelAnimationFrame(this.raf_id), this.raf_id = null);
            clearTimeout(this.update_tm);
            this.update_tm = null;
            this.options && (this.drawHandles(), this.is_active ? this.raf_id = requestAnimationFrame(this.updateScene.bind(this)) : this.update_tm = setTimeout(this.updateScene.bind(this), 300))
        },
        drawHandles: function() {
            this.coords.w_rs = this.$cache.rs.outerWidth(!1);
            if (this.coords.w_rs) {
                this.coords.w_rs !== this.coords.w_rs_old && (this.target = "base", this.is_resize = !0);
                if (this.coords.w_rs !== this.coords.w_rs_old || this.force_redraw) this.setMinMax(),
                    this.calc(!0), this.drawLabels(), this.options.grid && (this.calcGridMargin(), this.calcGridLabels()), this.force_redraw = !0, this.coords.w_rs_old = this.coords.w_rs, this.drawShadow();
                if (this.coords.w_rs && (this.dragging || this.force_redraw || this.is_key)) {
                    if (this.old_from !== this.result.from || this.old_to !== this.result.to || this.force_redraw || this.is_key) {
                        this.drawLabels();
                        this.$cache.bar[0].style.left = this.coords.p_bar_x + "%";
                        this.$cache.bar[0].style.width = this.coords.p_bar_w + "%";
                        if ("single" === this.options.type) this.$cache.s_single[0].style.left =
                            this.coords.p_single_fake + "%";
                        else {
                            this.$cache.s_from[0].style.left = this.coords.p_from_fake + "%";
                            this.$cache.s_to[0].style.left = this.coords.p_to_fake + "%";
                            if (this.old_from !== this.result.from || this.force_redraw) this.$cache.from[0].style.left = this.labels.p_from_left + "%";
                            if (this.old_to !== this.result.to || this.force_redraw) this.$cache.to[0].style.left = this.labels.p_to_left + "%"
                        }
                        this.$cache.single[0].style.left = this.labels.p_single_left + "%";
                        this.writeToInput();
                        this.old_from === this.result.from && this.old_to ===
                            this.result.to || this.is_start || (this.$cache.input.trigger("change"), this.$cache.input.trigger("input"));
                        this.old_from = this.result.from;
                        this.old_to = this.result.to;
                        this.is_resize || this.is_update || this.is_start || this.is_finish || this.callOnChange();
                        if (this.is_key || this.is_click) this.is_click = this.is_key = !1, this.callOnFinish();
                        this.is_finish = this.is_resize = this.is_update = !1
                    }
                    this.force_redraw = this.is_click = this.is_key = this.is_start = !1
                }
            }
        },
        drawLabels: function() {
            if (this.options) {
                var a = this.options.values.length,
                    b = this.options.p_values;
                if (!this.options.hide_from_to)
                    if ("single" === this.options.type) {
                        if (a) a = this.decorate(b[this.result.from]);
                        else {
                            var d = this._prettify(this.result.from);
                            a = this.decorate(d, this.result.from)
                        }
                        this.$cache.single.html(a);
                        this.calcLabels();
                        this.$cache.min[0].style.visibility = this.labels.p_single_left < this.labels.p_min + 1 ? "hidden" : "visible";
                        this.$cache.max[0].style.visibility = this.labels.p_single_left + this.labels.p_single_fake > 100 - this.labels.p_max - 1 ? "hidden" : "visible"
                    } else {
                        a ? (this.options.decorate_both ?
                            (a = this.decorate(b[this.result.from]), a += this.options.values_separator, a += this.decorate(b[this.result.to])) : a = this.decorate(b[this.result.from] + this.options.values_separator + b[this.result.to]), d = this.decorate(b[this.result.from]), b = this.decorate(b[this.result.to])) : (d = this._prettify(this.result.from), b = this._prettify(this.result.to), this.options.decorate_both ? (a = this.decorate(d, this.result.from), a += this.options.values_separator, a += this.decorate(b, this.result.to)) : a = this.decorate(d + this.options.values_separator +
                            b, this.result.to), d = this.decorate(d, this.result.from), b = this.decorate(b, this.result.to));
                        this.$cache.single.html(a);
                        this.$cache.from.html(d);
                        this.$cache.to.html(b);
                        this.calcLabels();
                        a = Math.min(this.labels.p_single_left, this.labels.p_from_left);
                        d = this.labels.p_single_left + this.labels.p_single_fake;
                        var b = this.labels.p_to_left + this.labels.p_to_fake,
                            c = Math.max(d, b);
                        this.labels.p_from_left + this.labels.p_from_fake >= this.labels.p_to_left ? (this.$cache.from[0].style.visibility = "hidden", this.$cache.to[0].style.visibility =
                            "hidden", this.$cache.single[0].style.visibility = "visible", this.result.from === this.result.to ? ("from" === this.target ? this.$cache.from[0].style.visibility = "visible" : "to" === this.target ? this.$cache.to[0].style.visibility = "visible" : this.target || (this.$cache.from[0].style.visibility = "visible"), this.$cache.single[0].style.visibility = "hidden", c = b) : (this.$cache.from[0].style.visibility = "hidden", this.$cache.to[0].style.visibility = "hidden", this.$cache.single[0].style.visibility = "visible", c = Math.max(d, b))) : (this.$cache.from[0].style.visibility =
                            "visible", this.$cache.to[0].style.visibility = "visible", this.$cache.single[0].style.visibility = "hidden");
                        this.$cache.min[0].style.visibility = a < this.labels.p_min + 1 ? "hidden" : "visible";
                        this.$cache.max[0].style.visibility = c > 100 - this.labels.p_max - 1 ? "hidden" : "visible"
                    }
            }
        },
        drawShadow: function() {
            var a = this.options,
                b = this.$cache,
                d = "number" === typeof a.from_min && !isNaN(a.from_min),
                c = "number" === typeof a.from_max && !isNaN(a.from_max),
                e = "number" === typeof a.to_min && !isNaN(a.to_min),
                g = "number" === typeof a.to_max && !isNaN(a.to_max);
            "single" === a.type ? a.from_shadow && (d || c) ? (d = this.convertToPercent(d ? a.from_min : a.min), c = this.convertToPercent(c ? a.from_max : a.max) - d, d = this.toFixed(d - this.coords.p_handle / 100 * d), c = this.toFixed(c - this.coords.p_handle / 100 * c), d += this.coords.p_handle / 2, b.shad_single[0].style.display = "block", b.shad_single[0].style.left = d + "%", b.shad_single[0].style.width = c + "%") : b.shad_single[0].style.display = "none" : (a.from_shadow && (d || c) ? (d = this.convertToPercent(d ? a.from_min : a.min), c = this.convertToPercent(c ? a.from_max : a.max) -
                d, d = this.toFixed(d - this.coords.p_handle / 100 * d), c = this.toFixed(c - this.coords.p_handle / 100 * c), d += this.coords.p_handle / 2, b.shad_from[0].style.display = "block", b.shad_from[0].style.left = d + "%", b.shad_from[0].style.width = c + "%") : b.shad_from[0].style.display = "none", a.to_shadow && (e || g) ? (e = this.convertToPercent(e ? a.to_min : a.min), a = this.convertToPercent(g ? a.to_max : a.max) - e, e = this.toFixed(e - this.coords.p_handle / 100 * e), a = this.toFixed(a - this.coords.p_handle / 100 * a), e += this.coords.p_handle / 2, b.shad_to[0].style.display =
                "block", b.shad_to[0].style.left = e + "%", b.shad_to[0].style.width = a + "%") : b.shad_to[0].style.display = "none")
        },
        writeToInput: function() {
            "single" === this.options.type ? (this.options.values.length ? this.$cache.input.prop("value", this.result.from_value) : this.$cache.input.prop("value", this.result.from), this.$cache.input.data("from", this.result.from)) : (this.options.values.length ? this.$cache.input.prop("value", this.result.from_value + this.options.input_values_separator + this.result.to_value) : this.$cache.input.prop("value",
                this.result.from + this.options.input_values_separator + this.result.to), this.$cache.input.data("from", this.result.from), this.$cache.input.data("to", this.result.to))
        },
        callOnStart: function() {
            this.writeToInput();
            if (this.options.onStart && "function" === typeof this.options.onStart)
                if (this.options.scope) this.options.onStart.call(this.options.scope, this.result);
                else this.options.onStart(this.result)
        },
        callOnChange: function() {
            this.writeToInput();
            if (this.options.onChange && "function" === typeof this.options.onChange)
                if (this.options.scope) this.options.onChange.call(this.options.scope,
                    this.result);
                else this.options.onChange(this.result)
        },
        callOnFinish: function() {
            this.writeToInput();
            if (this.options.onFinish && "function" === typeof this.options.onFinish)
                if (this.options.scope) this.options.onFinish.call(this.options.scope, this.result);
                else this.options.onFinish(this.result)
        },
        callOnUpdate: function() {
            this.writeToInput();
            if (this.options.onUpdate && "function" === typeof this.options.onUpdate)
                if (this.options.scope) this.options.onUpdate.call(this.options.scope, this.result);
                else this.options.onUpdate(this.result)
        },
        toggleInput: function() {
            this.$cache.input.toggleClass("irs-hidden-input");
            this.has_tab_index ? this.$cache.input.prop("tabindex", -1) : this.$cache.input.removeProp("tabindex");
            this.has_tab_index = !this.has_tab_index
        },
        convertToPercent: function(a, b) {
            var d = this.options.max - this.options.min;
            return d ? this.toFixed((b ? a : a - this.options.min) / (d / 100)) : (this.no_diapason = !0, 0)
        },
        convertToValue: function(a) {
            var b = this.options.min,
                d = this.options.max,
                c = b.toString().split(".")[1],
                e = d.toString().split(".")[1],
                g, l, f = 0,
                h = 0;
            if (0 === a) return this.options.min;
            if (100 === a) return this.options.max;
            c && (f = g = c.length);
            e && (f = l = e.length);
            g && l && (f = g >= l ? g : l);
            0 > b && (h = Math.abs(b), b = +(b + h).toFixed(f), d = +(d + h).toFixed(f));
            a = (d - b) / 100 * a + b;
            (b = this.options.step.toString().split(".")[1]) ? a = +a.toFixed(b.length): (a /= this.options.step, a *= this.options.step, a = +a.toFixed(0));
            h && (a -= h);
            h = b ? +a.toFixed(b.length) : this.toFixed(a);
            h < this.options.min ? h = this.options.min : h > this.options.max && (h = this.options.max);
            return h
        },
        calcWithStep: function(a) {
            var b =
                Math.round(a / this.coords.p_step) * this.coords.p_step;
            100 < b && (b = 100);
            100 === a && (b = 100);
            return this.toFixed(b)
        },
        checkMinInterval: function(a, b, d) {
            var c = this.options;
            if (!c.min_interval) return a;
            a = this.convertToValue(a);
            b = this.convertToValue(b);
            "from" === d ? b - a < c.min_interval && (a = b - c.min_interval) : a - b < c.min_interval && (a = b + c.min_interval);
            return this.convertToPercent(a)
        },
        checkMaxInterval: function(a, b, d) {
            var c = this.options;
            if (!c.max_interval) return a;
            a = this.convertToValue(a);
            b = this.convertToValue(b);
            "from" ===
            d ? b - a > c.max_interval && (a = b - c.max_interval) : a - b > c.max_interval && (a = b + c.max_interval);
            return this.convertToPercent(a)
        },
        checkDiapason: function(a, b, d) {
            a = this.convertToValue(a);
            var c = this.options;
            "number" !== typeof b && (b = c.min);
            "number" !== typeof d && (d = c.max);
            a < b && (a = b);
            a > d && (a = d);
            return this.convertToPercent(a)
        },
        toFixed: function(a) {
            a = a.toFixed(20);
            return +a
        },
        _prettify: function(a) {
            return this.options.prettify_enabled ? this.options.prettify && "function" === typeof this.options.prettify ? this.options.prettify(a) :
                this.prettify(a) : a
        },
        prettify: function(a) {
            return a.toString().replace(/(\d{1,3}(?=(?:\d\d\d)+(?!\d)))/g, "$1" + this.options.prettify_separator)
        },
        checkEdges: function(a, b) {
            if (!this.options.force_edges) return this.toFixed(a);
            0 > a ? a = 0 : a > 100 - b && (a = 100 - b);
            return this.toFixed(a)
        },
        validate: function() {
            var a = this.options,
                b = this.result,
                d = a.values,
                c = d.length,
                e;
            "string" === typeof a.min && (a.min = +a.min);
            "string" === typeof a.max && (a.max = +a.max);
            "string" === typeof a.from && (a.from = +a.from);
            "string" === typeof a.to && (a.to = +a.to);
            "string" === typeof a.step && (a.step = +a.step);
            "string" === typeof a.from_min && (a.from_min = +a.from_min);
            "string" === typeof a.from_max && (a.from_max = +a.from_max);
            "string" === typeof a.to_min && (a.to_min = +a.to_min);
            "string" === typeof a.to_max && (a.to_max = +a.to_max);
            "string" === typeof a.grid_num && (a.grid_num = +a.grid_num);
            a.max < a.min && (a.max = a.min);
            if (c)
                for (a.p_values = [], a.min = 0, a.max = c - 1, a.step = 1, a.grid_num = a.max, a.grid_snap = !0, e = 0; e < c; e++) {
                    var g = +d[e];
                    isNaN(g) ? g = d[e] : (d[e] = g, g = this._prettify(g));
                    a.p_values.push(g)
                }
            if ("number" !==
                typeof a.from || isNaN(a.from)) a.from = a.min;
            if ("number" !== typeof a.to || isNaN(a.to)) a.to = a.max;
            "single" === a.type ? (a.from < a.min && (a.from = a.min), a.from > a.max && (a.from = a.max)) : (a.from < a.min && (a.from = a.min), a.from > a.max && (a.from = a.max), a.to < a.min && (a.to = a.min), a.to > a.max && (a.to = a.max), this.update_check.from && (this.update_check.from !== a.from && a.from > a.to && (a.from = a.to), this.update_check.to !== a.to && a.to < a.from && (a.to = a.from)), a.from > a.to && (a.from = a.to), a.to < a.from && (a.to = a.from));
            if ("number" !== typeof a.step ||
                isNaN(a.step) || !a.step || 0 > a.step) a.step = 1;
            "number" === typeof a.from_min && a.from < a.from_min && (a.from = a.from_min);
            "number" === typeof a.from_max && a.from > a.from_max && (a.from = a.from_max);
            "number" === typeof a.to_min && a.to < a.to_min && (a.to = a.to_min);
            "number" === typeof a.to_max && a.from > a.to_max && (a.to = a.to_max);
            if (b) {
                b.min !== a.min && (b.min = a.min);
                b.max !== a.max && (b.max = a.max);
                if (b.from < b.min || b.from > b.max) b.from = a.from;
                if (b.to < b.min || b.to > b.max) b.to = a.to
            }
            if ("number" !== typeof a.min_interval || isNaN(a.min_interval) ||
                !a.min_interval || 0 > a.min_interval) a.min_interval = 0;
            if ("number" !== typeof a.max_interval || isNaN(a.max_interval) || !a.max_interval || 0 > a.max_interval) a.max_interval = 0;
            a.min_interval && a.min_interval > a.max - a.min && (a.min_interval = a.max - a.min);
            a.max_interval && a.max_interval > a.max - a.min && (a.max_interval = a.max - a.min)
        },
        decorate: function(a, b) {
            var d = "",
                c = this.options;
            c.prefix && (d += c.prefix);
            d += a;
            c.max_postfix && (c.values.length && a === c.p_values[c.max] ? (d += c.max_postfix, c.postfix && (d += " ")) : b === c.max && (d += c.max_postfix,
                c.postfix && (d += " ")));
            c.postfix && (d += c.postfix);
            return d
        },
        updateFrom: function() {
            this.result.from = this.options.from;
            this.result.from_percent = this.convertToPercent(this.result.from);
            this.result.from_pretty = this._prettify(this.result.from);
            this.options.values && (this.result.from_value = this.options.values[this.result.from])
        },
        updateTo: function() {
            this.result.to = this.options.to;
            this.result.to_percent = this.convertToPercent(this.result.to);
            this.result.to_pretty = this._prettify(this.result.to);
            this.options.values &&
                (this.result.to_value = this.options.values[this.result.to])
        },
        updateResult: function() {
            this.result.min = this.options.min;
            this.result.max = this.options.max;
            this.updateFrom();
            this.updateTo()
        },
        appendGrid: function() {
            if (this.options.grid) {
                var a = this.options,
                    b;
                var d = a.max - a.min;
                var c = a.grid_num,
                    e = 4,
                    g = "";
                this.calcGridMargin();
                if (a.grid_snap)
                    if (50 < d) {
                        c = 50 / a.step;
                        var f = this.toFixed(a.step / .5)
                    } else c = d / a.step, f = this.toFixed(a.step / (d / 100));
                else f = this.toFixed(100 / c);
                4 < c && (e = 3);
                7 < c && (e = 2);
                14 < c && (e = 1);
                28 < c && (e = 0);
                for (d = 0; d < c + 1; d++) {
                    var k = e;
                    var h = this.toFixed(f * d);
                    100 < h && (h = 100);
                    this.coords.big[d] = h;
                    var m = (h - f * (d - 1)) / (k + 1);
                    for (b = 1; b <= k && 0 !== h; b++) {
                        var n = this.toFixed(h - m * b);
                        g += '<span class="irs-grid-pol small" style="left: ' + n + '%"></span>'
                    }
                    g += '<span class="irs-grid-pol" style="left: ' + h + '%"></span>';
                    b = this.convertToValue(h);
                    b = a.values.length ? a.p_values[b] : this._prettify(b);
                    g += '<span class="irs-grid-text js-grid-text-' + d + '" style="left: ' + h + '%">' + b + "</span>"
                }
                this.coords.big_num = Math.ceil(c + 1);
                this.$cache.cont.addClass("irs-with-grid");
                this.$cache.grid.html(g);
                this.cacheGridLabels()
            }
        },
        cacheGridLabels: function() {
            var a, b = this.coords.big_num;
            for (a = 0; a < b; a++) {
                var d = this.$cache.grid.find(".js-grid-text-" + a);
                this.$cache.grid_labels.push(d)
            }
            this.calcGridLabels()
        },
        calcGridLabels: function() {
            var a;
            var b = [];
            var d = [],
                c = this.coords.big_num;
            for (a = 0; a < c; a++) this.coords.big_w[a] = this.$cache.grid_labels[a].outerWidth(!1), this.coords.big_p[a] = this.toFixed(this.coords.big_w[a] / this.coords.w_rs * 100), this.coords.big_x[a] = this.toFixed(this.coords.big_p[a] /
                2), b[a] = this.toFixed(this.coords.big[a] - this.coords.big_x[a]), d[a] = this.toFixed(b[a] + this.coords.big_p[a]);
            this.options.force_edges && (b[0] < -this.coords.grid_gap && (b[0] = -this.coords.grid_gap, d[0] = this.toFixed(b[0] + this.coords.big_p[0]), this.coords.big_x[0] = this.coords.grid_gap), d[c - 1] > 100 + this.coords.grid_gap && (d[c - 1] = 100 + this.coords.grid_gap, b[c - 1] = this.toFixed(d[c - 1] - this.coords.big_p[c - 1]), this.coords.big_x[c - 1] = this.toFixed(this.coords.big_p[c - 1] - this.coords.grid_gap)));
            this.calcGridCollision(2,
                b, d);
            this.calcGridCollision(4, b, d);
            for (a = 0; a < c; a++) b = this.$cache.grid_labels[a][0], this.coords.big_x[a] !== Number.POSITIVE_INFINITY && (b.style.marginLeft = -this.coords.big_x[a] + "%")
        },
        calcGridCollision: function(a, b, d) {
            var c, e = this.coords.big_num;
            for (c = 0; c < e; c += a) {
                var g = c + a / 2;
                if (g >= e) break;
                var f = this.$cache.grid_labels[g][0];
                f.style.visibility = d[c] <= b[g] ? "visible" : "hidden"
            }
        },
        calcGridMargin: function() {
            this.options.grid_margin && (this.coords.w_rs = this.$cache.rs.outerWidth(!1), this.coords.w_rs && (this.coords.w_handle =
                "single" === this.options.type ? this.$cache.s_single.outerWidth(!1) : this.$cache.s_from.outerWidth(!1), this.coords.p_handle = this.toFixed(this.coords.w_handle / this.coords.w_rs * 100), this.coords.grid_gap = this.toFixed(this.coords.p_handle / 2 - .1), this.$cache.grid[0].style.width = this.toFixed(100 - this.coords.p_handle) + "%", this.$cache.grid[0].style.left = this.coords.grid_gap + "%"))
        },
        update: function(a) {
            this.input && (this.is_update = !0, this.options.from = this.result.from, this.options.to = this.result.to, this.update_check.from =
                this.result.from, this.update_check.to = this.result.to, this.options = f.extend(this.options, a), this.validate(), this.updateResult(a), this.toggleInput(), this.remove(), this.init(!0))
        },
        reset: function() {
            this.input && (this.updateResult(), this.update())
        },
        destroy: function() {
            this.input && (this.toggleInput(), this.$cache.input.prop("readonly", !1), f.data(this.input, "ionRangeSlider", null), this.remove(), this.options = this.input = null)
        }
    };
    f.fn.ionRangeSlider = function(a) {
        return this.each(function() {
            f.data(this, "ionRangeSlider") ||
                f.data(this, "ionRangeSlider", new q(this, a, t++))
        })
    };
    (function() {
        for (var a = 0, b = ["ms", "moz", "webkit", "o"], d = 0; d < b.length && !k.requestAnimationFrame; ++d) k.requestAnimationFrame = k[b[d] + "RequestAnimationFrame"], k.cancelAnimationFrame = k[b[d] + "CancelAnimationFrame"] || k[b[d] + "CancelRequestAnimationFrame"];
        k.requestAnimationFrame || (k.requestAnimationFrame = function(b, d) {
            var c = (new Date).getTime(),
                e = Math.max(0, 16 - (c - a)),
                f = k.setTimeout(function() {
                    b(c + e)
                }, e);
            a = c + e;
            return f
        });
        k.cancelAnimationFrame || (k.cancelAnimationFrame =
            function(a) {
                clearTimeout(a)
            })
    })()
});
/*
 *
 *	jQuery Sliding Menu Plugin
 *	Mobile app list-style navigation in the browser
 *
 *	Written by Ali Zahid
 *	http://alizahid.github.io/jquery-sliding-menu/
 *
 */
(function($) {
    var usedIds = [];
    $.fn.menu = function(options) {
        var selector = this.selector;
        var settings = $.extend({
            dataJSON: false,
            backLabel: ''
        }, options);
        return this.each(function() {
            var self = this,
                menu = $(self),
                data;
            if (menu.hasClass('sliding-menu')) {
                return
            }
            var menuWidth = menu.width();
            if (settings.dataJSON) {
                data = processJSON(settings.dataJSON)
            } else {
                data = process(menu)
            }
            menu.empty().addClass('sliding-menu');
            var rootPanel;
            if (settings.dataJSON) {
                $(data).each(function(index, item) {
                    var panel = $('<ul></ul>');
                    if (item.root) {
                        rootPanel = '#' + item.id
                    }
                    panel.attr('id', item.id);
                    panel.addClass('menu-panel');
                    panel.width(menuWidth);
                    $(item.children).each(function(index, item) {
                        var link = $('<a></a>');
                        link.attr('class', item.styleClass);
                        link.attr('href', item.href);
                        link.text(item.label);
                        var li = $('<li></li>');
                        li.append(link);
                        panel.append(li)
                    });
                    menu.append(panel)
                })
            } else {
                $(data).each(function(index, item) {
                    var panel = $(item);
                    if (panel.hasClass('menu-panel-root')) {
                        rootPanel = '#' + panel.attr('id')
                    }
                    panel.width(menuWidth);
                    menu.append(item)
                })
            }
            rootPanel = $(rootPanel);
            rootPanel.addClass('menu-panel-root');
            var currentPanel = rootPanel;
            menu.height(rootPanel.height());
            var wrapper = $('<div></div>').addClass('sliding-menu-wrapper').width(data.length * menuWidth);
            menu.wrapInner(wrapper);
            wrapper = $('.sliding-menu-wrapper', menu);
            $('a', self).on('click', function(e) {
                var href = $(this).attr('href'),
                    label = $(this).text();
                if (wrapper.is(':animated')) {
                    e.preventDefault();
                    return
                }
                if (href == '#') {
                    e.preventDefault()
                } else if (href.indexOf('#menu-panel') == 0) {
                    var target = $(href),
                        isBack = $(this).hasClass('back'),
                        marginLeft = parseInt(wrapper.css('margin-left'));
                    if (isBack) {
                        if (href == '#menu-panel-back') {
                            target = currentPanel.prev()
                        }
                        wrapper.stop(true, true).animate({
                            marginLeft: marginLeft + menuWidth
                        }, 'fast')
                    } else {
                        target.insertAfter(currentPanel);
                        if (settings.backLabel === true) {
                            $('.back', target).text(label)
                        } else {
                            $('.back', target).text(settings.backLabel)
                        }
                        wrapper.stop(true, true).animate({
                            marginLeft: marginLeft - menuWidth
                        }, 'fast')
                    }
                    currentPanel = target;
                    menu.stop(true, true).animate({
                        height: target.height()
                    }, 'fast');
                    e.preventDefault()
                }
            });
            return this
        });

        function process(data) {
            var ul = $('ul', data),
                panels = [];
            $(ul).each(function(index, item) {
                var panel = $(item),
                    handler = panel.prev(),
                    id = getNewId();
                if (handler.length == 1) {
                    handler.addClass('nav').attr('href', '#menu-panel-' + id)
                }
                panel.attr('id', 'menu-panel-' + id);
                if (index == 0) {
                    panel.addClass('menu-panel-root')
                } else {
                    panel.addClass('menu-panel');
                    var li = $('<li></li>'),
                        back = $('<a></a>').addClass('back').attr('href', '#menu-panel-back');
                    panel.prepend(back)
                }
                panels.push(item)
            });
            return panels
        }

        function processJSON(data, parent) {
            var root = {
                    id: 'menu-panel-' + getNewId(),
                    children: [],
                    root: (parent ? false : true)
                },
                panels = [];
            if (parent) {
                root.children.push({
                    styleClass: 'back',
                    href: '#' + parent.id
                })
            }
            $(data).each(function(index, item) {
                root.children.push(item);
                if (item.children) {
                    var panel = processJSON(item.children, root);
                    item.href = '#' + panel[0].id;
                    item.styleClass = 'nav';
                    panels = panels.concat(panel)
                }
            });
            return [root].concat(panels)
        }

        function getNewId() {
            var id;
            do {
                id = Math.random().toString(36).substring(3, 8)
            } while (usedIds.indexOf(id) >= 0);
            usedIds.push(id);
            return id
        }
    }
}(jQuery));
// count
(function($) {
    $.fn.countTo = function(options) {
        options = options || {};
        return $(this).each(function() {
            var settings = $.extend({}, $.fn.countTo.defaults, {
                from: $(this).data('from'),
                to: $(this).data('num'),
                speed: $(this).data('speed'),
                refreshInterval: $(this).data('refresh-interval'),
                decimals: $(this).data('decimals')
            }, options);
            var loops = Math.ceil(settings.speed / settings.refreshInterval),
                increment = (settings.to - settings.from) / loops;
            var self = this,
                $self = $(this),
                loopCount = 0,
                value = settings.from,
                data = $self.data('countTo') || {};
            $self.data('countTo', data);
            if (data.interval) {
                clearInterval(data.interval)
            }
            data.interval = setInterval(updateTimer, settings.refreshInterval);
            render(value);

            function updateTimer() {
                value += increment;
                loopCount++;
                render(value);
                if (typeof(settings.onUpdate) == 'function') {
                    settings.onUpdate.call(self, value)
                }
                if (loopCount >= loops) {
                    $self.removeData('countTo');
                    clearInterval(data.interval);
                    value = settings.to;
                    if (typeof(settings.onComplete) == 'function') {
                        settings.onComplete.call(self, value)
                    }
                }
            }

            function render(value) {
                var formattedValue = settings.formatter.call(self, value, settings);
                $self.text(formattedValue)
            }
        })
    };
    $.fn.countTo.defaults = {
        from: 0,
        to: 0,
        speed: 2500,
        refreshInterval: 100,
        decimals: 0,
        formatter: formatter,
        onUpdate: null,
        onComplete: null
    };

    function formatter(value, settings) {
        return value.toFixed(settings.decimals)
    }
}(jQuery));

/**
 * jQuery.share - social media sharing plugin
 */
! function(t, e) {
    var s = e.document;
    t.fn.share = function(i) {
        var r = {
                init: function(i) {
                    this.share.settings = t.extend({}, this.share.defaults, i);
                    var r = (this.share.settings, this.share.settings.networks),
                        o = this.share.settings.theme,
                        a = this.share.settings.orientation,
                        u = this.share.settings.affix,
                        h = this.share.settings.margin,
                        l = this.share.settings.title || t(s).attr("title"),
                        c = this.share.settings.urlToShare || t(location).attr("href"),
                        p = "";
                    return t.each(t(s).find('meta[name="description"]'), function(e, s) {
                        p = t(s).attr("content")
                    }), this.each(function() {
                        var s, i = t(this),
                            m = i.attr("id"),
                            d = encodeURIComponent(c),
                            f = l.replace("|", ""),
                            g = p.substring(0, 250);
                        r.forEach(function(e) {
                            s = n.networkDefs[e].url, s = s.replace("|u|", d).replace("|t|", f).replace("|d|", g).replace("|140|", f.substring(0, 130)), t("<a href='" + s + "'   class='pop share-" + o + " share-" + o + "-" + e + "'></a>").appendTo(i)
                        }), t("#" + m + ".share-" + o).css("margin", h), "horizontal" != a ? t("#" + m + " a.share-" + o).css("display", "block") : t("#" + m + " a.share-" + o).css("display", "inline-block"), "undefined" != typeof u && (i.addClass("share-affix"), -1 != u.indexOf("right") ? (i.css("left", "auto"), i.css("right", "0px"), -1 != u.indexOf("center") && i.css("top", "40%")) : -1 != u.indexOf("left center") && i.css("top", "40%"), -1 != u.indexOf("bottom") && (i.css("bottom", "0px"), i.css("top", "auto"), -1 != u.indexOf("center") && i.css("left", "40%"))), t(".pop").click(function() {
                            return e.open(t(this).attr("href"), "t", "toolbar=0,resizable=1,status=0,width=640,height=528"), !1
                        })
                    })
                }
            },
            n = {
                networkDefs: {
                    facebook: {
                        url: "http://www.facebook.com/share.php?u=|u|"
                    },
                    twitter: {
                        url: "https://twitter.com/share?via=in1.com&text=|140|"
                    },
                    linkedin: {
                        url: "http://www.linkedin.com/shareArticle?mini=true&url=|u|&title=|t|&summary=|d|&source=in1.com"
                    },
                    in1: {
                        url: "http://www.in1.com/cast?u=|u|",
                        w: "490",
                        h: "529"
                    },
                    tumblr: {
                        url: "http://www.tumblr.com/share?v=3&u=|u|"
                    },
                    digg: {
                        url: "http://digg.com/submit?url=|u|&title=|t|"
                    },
                    googleplus: {
                        url: "https://plusone.google.com/_/+1/confirm?hl=en&url=|u|"
                    },
                    reddit: {
                        url: "http://reddit.com/submit?url=|u|"
                    },
                    pinterest: {
                        url: "http://pinterest.com/pin/create/button/?url=|u|&media=&description=|d|"
                    },
                    posterous: {
                        url: "http://posterous.com/share?linkto=|u|&title=|t|"
                    },
                    stumbleupon: {
                        url: "http://www.stumbleupon.com/submit?url=|u|&title=|t|"
                    },
                    email: {
                        url: "mailto:?subject=|t|"
                    }
                }
            };
        return r[i] ? r[i].apply(this, Array.prototype.slice.call(arguments, 1)) : "object" != typeof i && i ? void t.error('Method "' + i + '" does not exist in social plugin') : r.init.apply(this, arguments)
    }, t.fn.share.defaults = {
        networks: ["in1", "facebook", "twitter", "linkedin"],
        theme: "icon",
        autoShow: !0,
        margin: "3px",
        orientation: "horizontal",
        useIn1: !0
    }, t.fn.share.settings = {}
}(jQuery, window);
/*!
 * perfect-scrollbar v1.4.0
 * (c) 2018 Hyunje Jun
 * @license MIT
 */
! function(t, e) {
    "object" == typeof exports && "undefined" != typeof module ? module.exports = e() : "function" == typeof define && define.amd ? define(e) : t.PerfectScrollbar = e()
}(this, function() {
    "use strict";

    function t(t) {
        return getComputedStyle(t)
    }

    function e(t, e) {
        for (var i in e) {
            var r = e[i];
            "number" == typeof r && (r += "px"), t.style[i] = r
        }
        return t
    }

    function i(t) {
        var e = document.createElement("div");
        return e.className = t, e
    }

    function r(t, e) {
        if (!v) throw new Error("No element matching method supported");
        return v.call(t, e)
    }

    function l(t) {
        t.remove ? t.remove() : t.parentNode && t.parentNode.removeChild(t)
    }

    function n(t, e) {
        return Array.prototype.filter.call(t.children, function(t) {
            return r(t, e)
        })
    }

    function o(t, e) {
        var i = t.element.classList,
            r = m.state.scrolling(e);
        i.contains(r) ? clearTimeout(Y[e]) : i.add(r)
    }

    function s(t, e) {
        Y[e] = setTimeout(function() {
            return t.isAlive && t.element.classList.remove(m.state.scrolling(e))
        }, t.settings.scrollingThreshold)
    }

    function a(t, e) {
        o(t, e), s(t, e)
    }

    function c(t) {
        if ("function" == typeof window.CustomEvent) return new CustomEvent(t);
        var e = document.createEvent("CustomEvent");
        return e.initCustomEvent(t, !1, !1, void 0), e
    }

    function h(t, e, i, r, l) {
        var n = i[0],
            o = i[1],
            s = i[2],
            h = i[3],
            u = i[4],
            d = i[5];
        void 0 === r && (r = !0), void 0 === l && (l = !1);
        var f = t.element;
        t.reach[h] = null, f[s] < 1 && (t.reach[h] = "start"), f[s] > t[n] - t[o] - 1 && (t.reach[h] = "end"), e && (f.dispatchEvent(c("ps-scroll-" + h)), e < 0 ? f.dispatchEvent(c("ps-scroll-" + u)) : e > 0 && f.dispatchEvent(c("ps-scroll-" + d)), r && a(t, h)), t.reach[h] && (e || l) && f.dispatchEvent(c("ps-" + h + "-reach-" + t.reach[h]))
    }

    function u(t) {
        return parseInt(t, 10) || 0
    }

    function d(t) {
        return r(t, "input,[contenteditable]") || r(t, "select,[contenteditable]") || r(t, "textarea,[contenteditable]") || r(t, "button,[contenteditable]")
    }

    function f(e) {
        var i = t(e);
        return u(i.width) + u(i.paddingLeft) + u(i.paddingRight) + u(i.borderLeftWidth) + u(i.borderRightWidth)
    }

    function p(t, e) {
        return t.settings.minScrollbarLength && (e = Math.max(e, t.settings.minScrollbarLength)), t.settings.maxScrollbarLength && (e = Math.min(e, t.settings.maxScrollbarLength)), e
    }

    function b(t, i) {
        var r = {
                width: i.railXWidth
            },
            l = Math.floor(t.scrollTop);
        i.isRtl ? r.left = i.negativeScrollAdjustment + t.scrollLeft + i.containerWidth - i.contentWidth : r.left = t.scrollLeft, i.isScrollbarXUsingBottom ? r.bottom = i.scrollbarXBottom - l : r.top = i.scrollbarXTop + l, e(i.scrollbarXRail, r);
        var n = {
            top: l,
            height: i.railYHeight
        };
        i.isScrollbarYUsingRight ? i.isRtl ? n.right = i.contentWidth - (i.negativeScrollAdjustment + t.scrollLeft) - i.scrollbarYRight - i.scrollbarYOuterWidth : n.right = i.scrollbarYRight - t.scrollLeft : i.isRtl ? n.left = i.negativeScrollAdjustment + t.scrollLeft + 2 * i.containerWidth - i.contentWidth - i.scrollbarYLeft - i.scrollbarYOuterWidth : n.left = i.scrollbarYLeft + t.scrollLeft, e(i.scrollbarYRail, n), e(i.scrollbarX, {
            left: i.scrollbarXLeft,
            width: i.scrollbarXWidth - i.railBorderXWidth
        }), e(i.scrollbarY, {
            top: i.scrollbarYTop,
            height: i.scrollbarYHeight - i.railBorderYWidth
        })
    }

    function g(t, e) {
        function i(e) {
            b[d] = g + Y * (e[a] - v), o(t, f), R(t), e.stopPropagation(), e.preventDefault()
        }

        function r() {
            s(t, f), t[p].classList.remove(m.state.clicking), t.event.unbind(t.ownerDocument, "mousemove", i)
        }
        var l = e[0],
            n = e[1],
            a = e[2],
            c = e[3],
            h = e[4],
            u = e[5],
            d = e[6],
            f = e[7],
            p = e[8],
            b = t.element,
            g = null,
            v = null,
            Y = null;
        t.event.bind(t[h], "mousedown", function(e) {
            g = b[d], v = e[a], Y = (t[n] - t[l]) / (t[c] - t[u]), t.event.bind(t.ownerDocument, "mousemove", i), t.event.once(t.ownerDocument, "mouseup", r), t[p].classList.add(m.state.clicking), e.stopPropagation(), e.preventDefault()
        })
    }
    var v = "undefined" != typeof Element && (Element.prototype.matches || Element.prototype.webkitMatchesSelector || Element.prototype.mozMatchesSelector || Element.prototype.msMatchesSelector),
        m = {
            main: "ps",
            element: {
                thumb: function(t) {
                    return "ps__thumb-" + t
                },
                rail: function(t) {
                    return "ps__rail-" + t
                },
                consuming: "ps__child--consume"
            },
            state: {
                focus: "ps--focus",
                clicking: "ps--clicking",
                active: function(t) {
                    return "ps--active-" + t
                },
                scrolling: function(t) {
                    return "ps--scrolling-" + t
                }
            }
        },
        Y = {
            x: null,
            y: null
        },
        X = function(t) {
            this.element = t, this.handlers = {}
        },
        w = {
            isEmpty: {
                configurable: !0
            }
        };
    X.prototype.bind = function(t, e) {
        void 0 === this.handlers[t] && (this.handlers[t] = []), this.handlers[t].push(e), this.element.addEventListener(t, e, !1)
    }, X.prototype.unbind = function(t, e) {
        var i = this;
        this.handlers[t] = this.handlers[t].filter(function(r) {
            return !(!e || r === e) || (i.element.removeEventListener(t, r, !1), !1)
        })
    }, X.prototype.unbindAll = function() {
        var t = this;
        for (var e in t.handlers) t.unbind(e)
    }, w.isEmpty.get = function() {
        var t = this;
        return Object.keys(this.handlers).every(function(e) {
            return 0 === t.handlers[e].length
        })
    }, Object.defineProperties(X.prototype, w);
    var y = function() {
        this.eventElements = []
    };
    y.prototype.eventElement = function(t) {
        var e = this.eventElements.filter(function(e) {
            return e.element === t
        })[0];
        return e || (e = new X(t), this.eventElements.push(e)), e
    }, y.prototype.bind = function(t, e, i) {
        this.eventElement(t).bind(e, i)
    }, y.prototype.unbind = function(t, e, i) {
        var r = this.eventElement(t);
        r.unbind(e, i), r.isEmpty && this.eventElements.splice(this.eventElements.indexOf(r), 1)
    }, y.prototype.unbindAll = function() {
        this.eventElements.forEach(function(t) {
            return t.unbindAll()
        }), this.eventElements = []
    }, y.prototype.once = function(t, e, i) {
        var r = this.eventElement(t),
            l = function(t) {
                r.unbind(e, l), i(t)
            };
        r.bind(e, l)
    };
    var W = function(t, e, i, r, l) {
            void 0 === r && (r = !0), void 0 === l && (l = !1);
            var n;
            if ("top" === e) n = ["contentHeight", "containerHeight", "scrollTop", "y", "up", "down"];
            else {
                if ("left" !== e) throw new Error("A proper axis should be provided");
                n = ["contentWidth", "containerWidth", "scrollLeft", "x", "left", "right"]
            }
            h(t, i, n, r, l)
        },
        L = {
            isWebKit: "undefined" != typeof document && "WebkitAppearance" in document.documentElement.style,
            supportsTouch: "undefined" != typeof window && ("ontouchstart" in window || window.DocumentTouch && document instanceof window.DocumentTouch),
            supportsIePointer: "undefined" != typeof navigator && navigator.msMaxTouchPoints,
            isChrome: "undefined" != typeof navigator && /Chrome/i.test(navigator && navigator.userAgent)
        },
        R = function(t) {
            var e = t.element,
                i = Math.floor(e.scrollTop);
            t.containerWidth = e.clientWidth, t.containerHeight = e.clientHeight, t.contentWidth = e.scrollWidth, t.contentHeight = e.scrollHeight, e.contains(t.scrollbarXRail) || (n(e, m.element.rail("x")).forEach(function(t) {
                return l(t)
            }), e.appendChild(t.scrollbarXRail)), e.contains(t.scrollbarYRail) || (n(e, m.element.rail("y")).forEach(function(t) {
                return l(t)
            }), e.appendChild(t.scrollbarYRail)), !t.settings.suppressScrollX && t.containerWidth + t.settings.scrollXMarginOffset < t.contentWidth ? (t.scrollbarXActive = !0, t.railXWidth = t.containerWidth - t.railXMarginWidth, t.railXRatio = t.containerWidth / t.railXWidth, t.scrollbarXWidth = p(t, u(t.railXWidth * t.containerWidth / t.contentWidth)), t.scrollbarXLeft = u((t.negativeScrollAdjustment + e.scrollLeft) * (t.railXWidth - t.scrollbarXWidth) / (t.contentWidth - t.containerWidth))) : t.scrollbarXActive = !1, !t.settings.suppressScrollY && t.containerHeight + t.settings.scrollYMarginOffset < t.contentHeight ? (t.scrollbarYActive = !0, t.railYHeight = t.containerHeight - t.railYMarginHeight, t.railYRatio = t.containerHeight / t.railYHeight, t.scrollbarYHeight = p(t, u(t.railYHeight * t.containerHeight / t.contentHeight)), t.scrollbarYTop = u(i * (t.railYHeight - t.scrollbarYHeight) / (t.contentHeight - t.containerHeight))) : t.scrollbarYActive = !1, t.scrollbarXLeft >= t.railXWidth - t.scrollbarXWidth && (t.scrollbarXLeft = t.railXWidth - t.scrollbarXWidth), t.scrollbarYTop >= t.railYHeight - t.scrollbarYHeight && (t.scrollbarYTop = t.railYHeight - t.scrollbarYHeight), b(e, t), t.scrollbarXActive ? e.classList.add(m.state.active("x")) : (e.classList.remove(m.state.active("x")), t.scrollbarXWidth = 0, t.scrollbarXLeft = 0, e.scrollLeft = 0), t.scrollbarYActive ? e.classList.add(m.state.active("y")) : (e.classList.remove(m.state.active("y")), t.scrollbarYHeight = 0, t.scrollbarYTop = 0, e.scrollTop = 0)
        },
        T = {
            "click-rail": function(t) {
                t.event.bind(t.scrollbarY, "mousedown", function(t) {
                    return t.stopPropagation()
                }), t.event.bind(t.scrollbarYRail, "mousedown", function(e) {
                    var i = e.pageY - window.pageYOffset - t.scrollbarYRail.getBoundingClientRect().top > t.scrollbarYTop ? 1 : -1;
                    t.element.scrollTop += i * t.containerHeight, R(t), e.stopPropagation()
                }), t.event.bind(t.scrollbarX, "mousedown", function(t) {
                    return t.stopPropagation()
                }), t.event.bind(t.scrollbarXRail, "mousedown", function(e) {
                    var i = e.pageX - window.pageXOffset - t.scrollbarXRail.getBoundingClientRect().left > t.scrollbarXLeft ? 1 : -1;
                    t.element.scrollLeft += i * t.containerWidth, R(t), e.stopPropagation()
                })
            },
            "drag-thumb": function(t) {
                g(t, ["containerWidth", "contentWidth", "pageX", "railXWidth", "scrollbarX", "scrollbarXWidth", "scrollLeft", "x", "scrollbarXRail"]), g(t, ["containerHeight", "contentHeight", "pageY", "railYHeight", "scrollbarY", "scrollbarYHeight", "scrollTop", "y", "scrollbarYRail"])
            },
            keyboard: function(t) {
                function e(e, r) {
                    var l = Math.floor(i.scrollTop);
                    if (0 === e) {
                        if (!t.scrollbarYActive) return !1;
                        if (0 === l && r > 0 || l >= t.contentHeight - t.containerHeight && r < 0) return !t.settings.wheelPropagation
                    }
                    var n = i.scrollLeft;
                    if (0 === r) {
                        if (!t.scrollbarXActive) return !1;
                        if (0 === n && e < 0 || n >= t.contentWidth - t.containerWidth && e > 0) return !t.settings.wheelPropagation
                    }
                    return !0
                }
                var i = t.element,
                    l = function() {
                        return r(i, ":hover")
                    },
                    n = function() {
                        return r(t.scrollbarX, ":focus") || r(t.scrollbarY, ":focus")
                    };
                t.event.bind(t.ownerDocument, "keydown", function(r) {
                    if (!(r.isDefaultPrevented && r.isDefaultPrevented() || r.defaultPrevented) && (l() || n())) {
                        var o = document.activeElement ? document.activeElement : t.ownerDocument.activeElement;
                        if (o) {
                            if ("IFRAME" === o.tagName) o = o.contentDocument.activeElement;
                            else
                                for (; o.shadowRoot;) o = o.shadowRoot.activeElement;
                            if (d(o)) return
                        }
                        var s = 0,
                            a = 0;
                        switch (r.which) {
                            case 37:
                                s = r.metaKey ? -t.contentWidth : r.altKey ? -t.containerWidth : -30;
                                break;
                            case 38:
                                a = r.metaKey ? t.contentHeight : r.altKey ? t.containerHeight : 30;
                                break;
                            case 39:
                                s = r.metaKey ? t.contentWidth : r.altKey ? t.containerWidth : 30;
                                break;
                            case 40:
                                a = r.metaKey ? -t.contentHeight : r.altKey ? -t.containerHeight : -30;
                                break;
                            case 32:
                                a = r.shiftKey ? t.containerHeight : -t.containerHeight;
                                break;
                            case 33:
                                a = t.containerHeight;
                                break;
                            case 34:
                                a = -t.containerHeight;
                                break;
                            case 36:
                                a = t.contentHeight;
                                break;
                            case 35:
                                a = -t.contentHeight;
                                break;
                            default:
                                return
                        }
                        t.settings.suppressScrollX && 0 !== s || t.settings.suppressScrollY && 0 !== a || (i.scrollTop -= a, i.scrollLeft += s, R(t), e(s, a) && r.preventDefault())
                    }
                })
            },
            wheel: function(e) {
                function i(t, i) {
                    var r = Math.floor(o.scrollTop),
                        l = 0 === o.scrollTop,
                        n = r + o.offsetHeight === o.scrollHeight,
                        s = 0 === o.scrollLeft,
                        a = o.scrollLeft + o.offsetWidth === o.scrollWidth;
                    return !(Math.abs(i) > Math.abs(t) ? l || n : s || a) || !e.settings.wheelPropagation
                }

                function r(t) {
                    var e = t.deltaX,
                        i = -1 * t.deltaY;
                    return void 0 !== e && void 0 !== i || (e = -1 * t.wheelDeltaX / 6, i = t.wheelDeltaY / 6), t.deltaMode && 1 === t.deltaMode && (e *= 10, i *= 10), e !== e && i !== i && (e = 0, i = t.wheelDelta), t.shiftKey ? [-i, -e] : [e, i]
                }

                function l(e, i, r) {
                    if (!L.isWebKit && o.querySelector("select:focus")) return !0;
                    if (!o.contains(e)) return !1;
                    for (var l = e; l && l !== o;) {
                        if (l.classList.contains(m.element.consuming)) return !0;
                        var n = t(l);
                        if ([n.overflow, n.overflowX, n.overflowY].join("").match(/(scroll|auto)/)) {
                            var s = l.scrollHeight - l.clientHeight;
                            if (s > 0 && !(0 === l.scrollTop && r > 0 || l.scrollTop === s && r < 0)) return !0;
                            var a = l.scrollWidth - l.clientWidth;
                            if (a > 0 && !(0 === l.scrollLeft && i < 0 || l.scrollLeft === a && i > 0)) return !0
                        }
                        l = l.parentNode
                    }
                    return !1
                }

                function n(t) {
                    var n = r(t),
                        s = n[0],
                        a = n[1];
                    if (!l(t.target, s, a)) {
                        var c = !1;
                        e.settings.useBothWheelAxes ? e.scrollbarYActive && !e.scrollbarXActive ? (a ? o.scrollTop -= a * e.settings.wheelSpeed : o.scrollTop += s * e.settings.wheelSpeed, c = !0) : e.scrollbarXActive && !e.scrollbarYActive && (s ? o.scrollLeft += s * e.settings.wheelSpeed : o.scrollLeft -= a * e.settings.wheelSpeed, c = !0) : (o.scrollTop -= a * e.settings.wheelSpeed, o.scrollLeft += s * e.settings.wheelSpeed), R(e), (c = c || i(s, a)) && !t.ctrlKey && (t.stopPropagation(), t.preventDefault())
                    }
                }
                var o = e.element;
                void 0 !== window.onwheel ? e.event.bind(o, "wheel", n) : void 0 !== window.onmousewheel && e.event.bind(o, "mousewheel", n)
            },
            touch: function(e) {
                function i(t, i) {
                    var r = Math.floor(h.scrollTop),
                        l = h.scrollLeft,
                        n = Math.abs(t),
                        o = Math.abs(i);
                    if (o > n) {
                        if (i < 0 && r === e.contentHeight - e.containerHeight || i > 0 && 0 === r) return 0 === window.scrollY && i > 0 && L.isChrome
                    } else if (n > o && (t < 0 && l === e.contentWidth - e.containerWidth || t > 0 && 0 === l)) return !0;
                    return !0
                }

                function r(t, i) {
                    h.scrollTop -= i, h.scrollLeft -= t, R(e)
                }

                function l(t) {
                    return t.targetTouches ? t.targetTouches[0] : t
                }

                function n(t) {
                    return !(t.pointerType && "pen" === t.pointerType && 0 === t.buttons || (!t.targetTouches || 1 !== t.targetTouches.length) && (!t.pointerType || "mouse" === t.pointerType || t.pointerType === t.MSPOINTER_TYPE_MOUSE))
                }

                function o(t) {
                    if (n(t)) {
                        var e = l(t);
                        u.pageX = e.pageX, u.pageY = e.pageY, d = (new Date).getTime(), null !== p && clearInterval(p)
                    }
                }

                function s(e, i, r) {
                    if (!h.contains(e)) return !1;
                    for (var l = e; l && l !== h;) {
                        if (l.classList.contains(m.element.consuming)) return !0;
                        var n = t(l);
                        if ([n.overflow, n.overflowX, n.overflowY].join("").match(/(scroll|auto)/)) {
                            var o = l.scrollHeight - l.clientHeight;
                            if (o > 0 && !(0 === l.scrollTop && r > 0 || l.scrollTop === o && r < 0)) return !0;
                            var s = l.scrollLeft - l.clientWidth;
                            if (s > 0 && !(0 === l.scrollLeft && i < 0 || l.scrollLeft === s && i > 0)) return !0
                        }
                        l = l.parentNode
                    }
                    return !1
                }

                function a(t) {
                    if (n(t)) {
                        var e = l(t),
                            o = {
                                pageX: e.pageX,
                                pageY: e.pageY
                            },
                            a = o.pageX - u.pageX,
                            c = o.pageY - u.pageY;
                        if (s(t.target, a, c)) return;
                        r(a, c), u = o;
                        var h = (new Date).getTime(),
                            p = h - d;
                        p > 0 && (f.x = a / p, f.y = c / p, d = h), i(a, c) && t.preventDefault()
                    }
                }

                function c() {
                    e.settings.swipeEasing && (clearInterval(p), p = setInterval(function() {
                        e.isInitialized ? clearInterval(p) : f.x || f.y ? Math.abs(f.x) < .01 && Math.abs(f.y) < .01 ? clearInterval(p) : (r(30 * f.x, 30 * f.y), f.x *= .8, f.y *= .8) : clearInterval(p)
                    }, 10))
                }
                if (L.supportsTouch || L.supportsIePointer) {
                    var h = e.element,
                        u = {},
                        d = 0,
                        f = {},
                        p = null;
                    L.supportsTouch ? (e.event.bind(h, "touchstart", o), e.event.bind(h, "touchmove", a), e.event.bind(h, "touchend", c)) : L.supportsIePointer && (window.PointerEvent ? (e.event.bind(h, "pointerdown", o), e.event.bind(h, "pointermove", a), e.event.bind(h, "pointerup", c)) : window.MSPointerEvent && (e.event.bind(h, "MSPointerDown", o), e.event.bind(h, "MSPointerMove", a), e.event.bind(h, "MSPointerUp", c)))
                }
            }
        },
        H = function(r, l) {
            var n = this;
            if (void 0 === l && (l = {}), "string" == typeof r && (r = document.querySelector(r)), !r || !r.nodeName) throw new Error("no element is specified to initialize PerfectScrollbar");
            this.element = r, r.classList.add(m.main), this.settings = {
                handlers: ["click-rail", "drag-thumb", "keyboard", "wheel", "touch"],
                maxScrollbarLength: null,
                minScrollbarLength: null,
                scrollingThreshold: 1e3,
                scrollXMarginOffset: 0,
                scrollYMarginOffset: 0,
                suppressScrollX: !1,
                suppressScrollY: !1,
                swipeEasing: !0,
                useBothWheelAxes: !1,
                wheelPropagation: !0,
                wheelSpeed: 1
            };
            for (var o in l) n.settings[o] = l[o];
            this.containerWidth = null, this.containerHeight = null, this.contentWidth = null, this.contentHeight = null;
            var s = function() {
                    return r.classList.add(m.state.focus)
                },
                a = function() {
                    return r.classList.remove(m.state.focus)
                };
            this.isRtl = "rtl" === t(r).direction, this.isNegativeScroll = function() {
                var t = r.scrollLeft,
                    e = null;
                return r.scrollLeft = -1, e = r.scrollLeft < 0, r.scrollLeft = t, e
            }(), this.negativeScrollAdjustment = this.isNegativeScroll ? r.scrollWidth - r.clientWidth : 0, this.event = new y, this.ownerDocument = r.ownerDocument || document, this.scrollbarXRail = i(m.element.rail("x")), r.appendChild(this.scrollbarXRail), this.scrollbarX = i(m.element.thumb("x")), this.scrollbarXRail.appendChild(this.scrollbarX), this.scrollbarX.setAttribute("tabindex", 0), this.event.bind(this.scrollbarX, "focus", s), this.event.bind(this.scrollbarX, "blur", a), this.scrollbarXActive = null, this.scrollbarXWidth = null, this.scrollbarXLeft = null;
            var c = t(this.scrollbarXRail);
            this.scrollbarXBottom = parseInt(c.bottom, 10), isNaN(this.scrollbarXBottom) ? (this.isScrollbarXUsingBottom = !1, this.scrollbarXTop = u(c.top)) : this.isScrollbarXUsingBottom = !0, this.railBorderXWidth = u(c.borderLeftWidth) + u(c.borderRightWidth), e(this.scrollbarXRail, {
                display: "block"
            }), this.railXMarginWidth = u(c.marginLeft) + u(c.marginRight), e(this.scrollbarXRail, {
                display: ""
            }), this.railXWidth = null, this.railXRatio = null, this.scrollbarYRail = i(m.element.rail("y")), r.appendChild(this.scrollbarYRail), this.scrollbarY = i(m.element.thumb("y")), this.scrollbarYRail.appendChild(this.scrollbarY), this.scrollbarY.setAttribute("tabindex", 0), this.event.bind(this.scrollbarY, "focus", s), this.event.bind(this.scrollbarY, "blur", a), this.scrollbarYActive = null, this.scrollbarYHeight = null, this.scrollbarYTop = null;
            var h = t(this.scrollbarYRail);
            this.scrollbarYRight = parseInt(h.right, 10), isNaN(this.scrollbarYRight) ? (this.isScrollbarYUsingRight = !1, this.scrollbarYLeft = u(h.left)) : this.isScrollbarYUsingRight = !0, this.scrollbarYOuterWidth = this.isRtl ? f(this.scrollbarY) : null, this.railBorderYWidth = u(h.borderTopWidth) + u(h.borderBottomWidth), e(this.scrollbarYRail, {
                display: "block"
            }), this.railYMarginHeight = u(h.marginTop) + u(h.marginBottom), e(this.scrollbarYRail, {
                display: ""
            }), this.railYHeight = null, this.railYRatio = null, this.reach = {
                x: r.scrollLeft <= 0 ? "start" : r.scrollLeft >= this.contentWidth - this.containerWidth ? "end" : null,
                y: r.scrollTop <= 0 ? "start" : r.scrollTop >= this.contentHeight - this.containerHeight ? "end" : null
            }, this.isAlive = !0, this.settings.handlers.forEach(function(t) {
                return T[t](n)
            }), this.lastScrollTop = Math.floor(r.scrollTop), this.lastScrollLeft = r.scrollLeft, this.event.bind(this.element, "scroll", function(t) {
                return n.onScroll(t)
            }), R(this)
        };
    return H.prototype.update = function() {
        this.isAlive && (this.negativeScrollAdjustment = this.isNegativeScroll ? this.element.scrollWidth - this.element.clientWidth : 0, e(this.scrollbarXRail, {
            display: "block"
        }), e(this.scrollbarYRail, {
            display: "block"
        }), this.railXMarginWidth = u(t(this.scrollbarXRail).marginLeft) + u(t(this.scrollbarXRail).marginRight), this.railYMarginHeight = u(t(this.scrollbarYRail).marginTop) + u(t(this.scrollbarYRail).marginBottom), e(this.scrollbarXRail, {
            display: "none"
        }), e(this.scrollbarYRail, {
            display: "none"
        }), R(this), W(this, "top", 0, !1, !0), W(this, "left", 0, !1, !0), e(this.scrollbarXRail, {
            display: ""
        }), e(this.scrollbarYRail, {
            display: ""
        }))
    }, H.prototype.onScroll = function(t) {
        this.isAlive && (R(this), W(this, "top", this.element.scrollTop - this.lastScrollTop), W(this, "left", this.element.scrollLeft - this.lastScrollLeft), this.lastScrollTop = Math.floor(this.element.scrollTop), this.lastScrollLeft = this.element.scrollLeft)
    }, H.prototype.destroy = function() {
        this.isAlive && (this.event.unbindAll(), l(this.scrollbarX), l(this.scrollbarY), l(this.scrollbarXRail), l(this.scrollbarYRail), this.removePsClasses(), this.element = null, this.scrollbarX = null, this.scrollbarY = null, this.scrollbarXRail = null, this.scrollbarYRail = null, this.isAlive = !1)
    }, H.prototype.removePsClasses = function() {
        this.element.className = this.element.className.split(" ").filter(function(t) {
            return !t.match(/^ps([-_].+|)$/)
        }).join(" ")
    }, H
});
/**
 * Swiper 7.2.0
 * Most modern mobile touch slider and framework with hardware accelerated transitions
 * https://swiperjs.com
 *
 * Copyright 2014-2021 Vladimir Kharlampidi
 *
 * Released under the MIT License
 *
 * Released on: October 27, 2021
 */


//# sourceMappingURL=swiper-bundle.min.js.map


// Weather=============================================
jQuery, $.fn.ideaboxWeather = function(a) {
    return a = $.extend({
        modulid: "ideaboxWeather",
        width: "100%",
        themecolor: "",
        todaytext: "Today",
        radius: !0,
        location: "New York",
        daycount: 6,
        imgpath: "images/wimg/",
        template: "vertical",
        lang: "en",
        metric: "C",
        days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
        dayssmall: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"]
    }, a), this.each(function() {
        function t() {
            $(a.modulid).width() < 200 ? $(a.modulid).addClass("ow-small") : $(a.modulid).removeClass("ow-small")
        }

        function d(a) {
            return a.substring(0, 1).toUpperCase() + a.substring(1).toLowerCase()
        }
        a.modulid = "#" + $(this).attr("id"), $(a.modulid).css({
            width: a.width,
            background: a.themecolor
        }), a.radius && $(a.modulid).addClass("ow-border"), $.get("https://api.openweathermap.org/data/2.5/forecast/daily?q=" + a.location + "&mode=xml&units=metric&cnt=" + a.daycount + "&lang=" + a.lang + "&appid=0ac06341513ff205b3e3f3b6188588e3", function(t) {
            var i = $(t),
                e = "",
                n = i.find("name").text();
            i.find("time").each(function(t, i) {
                var s = $(this),
                    o = new Date($(this).attr("day")),
                    r = o.getDay(),
                    l = "";
                l = "F" == a.metric ? Math.round(1.8 * s.find("temperature").attr("day") + 32) + "" : Math.round(s.find("temperature").attr("day")) + " <strong class='m_val'>c</strong>", e = 0 == t ? (a.template, e + '<div class="ow-today"><span><img src="' + a.imgpath + s.find("symbol").attr("var") + '.png"/></span><h2>' + l + "<span>" + d(s.find("symbol").attr("name")) + "</span><b>" + n + " - " + a.todaytext + "</b></h2></div>") : "vertical" == a.template ? e + '<div class="ow-days"><span>' + a.days[r] + '</span><p><img src="' + a.imgpath + s.find("symbol").attr("var") + '.png" title="' + d(s.find("symbol").attr("name")) + '"> <b>' + l + "</b></p></div>" : e + '<div class="ow-dayssmall" style="width:' + 100 / (a.daycount - 1) + '%"><span title=' + a.days[r] + ">" + a.dayssmall[r] + '</span><p><img src="' + a.imgpath + s.find("symbol").attr("var") + '.png" title="' + d(s.find("symbol").attr("name")) + '"></p><b>' + l + "</b></div>"
            }), $(a.modulid).html(e)
        }), t(), $(window).on("resize", function() {
            t()
        })
    })
};

/*********************************************************************
 *  #### Twitter Post Fetcher v17.0.3 ####
 *  Coded by Jason Mayes 2015. A present to all the developers out there.
 *  www.jasonmayes.com
 *  Please keep this disclaimer with my code if you use it. Thanks. :-)
 *  Got feedback or questions, ask here:
 *  http://www.jasonmayes.com/projects/twitterApi/
 *  Github: https://github.com/jasonmayes/Twitter-Post-Fetcher
 *  Updates will be posted to this site.
 *********************************************************************/
(function(root, factory) {
    if (typeof define === 'function' && define.amd) {
        define([], factory);
    } else if (typeof exports === 'object') {
        module.exports = factory();
    } else {
        factory();
    }
}(this, function() {
    var domNode = '';
    var maxTweets = 20;
    var parseLinks = true;
    var queue = [];
    var inProgress = false;
    var printTime = true;
    var printUser = true;
    var formatterFunction = null;
    var supportsClassName = true;
    var showRts = true;
    var customCallbackFunction = null;
    var showInteractionLinks = true;
    var showImages = false;
    var useEmoji = false;
    var targetBlank = true;
    var lang = 'en';
    var permalinks = true;
    var dataOnly = false;
    var script = null;
    var scriptAdded = false;

    function handleTweets(tweets) {
        if (customCallbackFunction === null) {
            var x = tweets.length;
            var n = 0;
            var element = document.getElementById(domNode);
            var html = '<ul>';
            while (n < x) {
                html += '<li>' + tweets[n] + '</li>';
                n++;
            }
            html += '</ul>';
            element.innerHTML = html;
        } else {
            customCallbackFunction(tweets);
        }
    }

    function strip(data) {
        return data.replace(/<b[^>]*>(.*?)<\/b>/gi, function(a, s) {
            return s;
        }).replace(/class="(?!(tco-hidden|tco-display|tco-ellipsis))+.*?"|data-query-source=".*?"|dir=".*?"|rel=".*?"/gi, '');
    }

    function targetLinksToNewWindow(el) {
        var links = el.getElementsByTagName('a');
        for (var i = links.length - 1; i >= 0; i--) {
            links[i].setAttribute('target', '_blank');
        }
    }

    function getElementsByClassName(node, classname) {
        var a = [];
        var regex = new RegExp('(^| )' + classname + '( |$)');
        var elems = node.getElementsByTagName('*');
        for (var i = 0, j = elems.length; i < j; i++) {
            if (regex.test(elems[i].className)) {
                a.push(elems[i]);
            }
        }
        return a;
    }

    function extractImageUrl(image_data) {
        if (image_data !== undefined && image_data.innerHTML.indexOf('data-image') >= 0) {
            var data_src = image_data.innerHTML.match(/data-image=\"([A-z0-9]+:\/\/[A-z0-9]+\.[A-z0-9]+\.[A-z0-9]+\/[A-z0-9]+\/[A-z0-9\-]+)/i)[1];
            return decodeURIComponent(data_src) + '.jpg';
        }
    }
    var twitterFetcher = {
        fetch: function(config) {
            if (config.maxTweets === undefined) {
                config.maxTweets = 20;
            }
            if (config.enableLinks === undefined) {
                config.enableLinks = true;
            }
            if (config.showUser === undefined) {
                config.showUser = true;
            }
            if (config.showTime === undefined) {
                config.showTime = true;
            }
            if (config.dateFunction === undefined) {
                config.dateFunction = 'default';
            }
            if (config.showRetweet === undefined) {
                config.showRetweet = true;
            }
            if (config.customCallback === undefined) {
                config.customCallback = null;
            }
            if (config.showInteraction === undefined) {
                config.showInteraction = true;
            }
            if (config.showImages === undefined) {
                config.showImages = false;
            }
            if (config.useEmoji === undefined) {
                config.useEmoji = false;
            }
            if (config.linksInNewWindow === undefined) {
                config.linksInNewWindow = true;
            }
            if (config.showPermalinks === undefined) {
                config.showPermalinks = true;
            }
            if (config.dataOnly === undefined) {
                config.dataOnly = false;
            }
            if (inProgress) {
                queue.push(config);
            } else {
                inProgress = true;
                domNode = config.domId;
                maxTweets = config.maxTweets;
                parseLinks = config.enableLinks;
                printUser = config.showUser;
                printTime = config.showTime;
                showRts = config.showRetweet;
                formatterFunction = config.dateFunction;
                customCallbackFunction = config.customCallback;
                showInteractionLinks = config.showInteraction;
                showImages = config.showImages;
                useEmoji = config.useEmoji;
                targetBlank = config.linksInNewWindow;
                permalinks = config.showPermalinks;
                dataOnly = config.dataOnly;
                var head = document.getElementsByTagName('head')[0];
                if (script !== null) {
                    head.removeChild(script);
                }
                script = document.createElement('script');
                script.type = 'text/javascript';
                if (config.list !== undefined) {
                    script.src = 'https://syndication.twitter.com/timeline/list?' + 'callback=__twttrf.callback&dnt=false&list_slug=' +
                        config.list.listSlug + '&screen_name=' + config.list.screenName + '&suppress_response_codes=true&lang=' + (config.lang || lang) + '&rnd=' + Math.random();
                } else if (config.profile !== undefined) {
                    script.src = 'https://syndication.twitter.com/timeline/profile?' + 'callback=__twttrf.callback&dnt=false' + '&screen_name=' + config.profile.screenName + '&suppress_response_codes=true&lang=' + (config.lang || lang) + '&rnd=' + Math.random();
                } else if (config.likes !== undefined) {
                    script.src = 'https://syndication.twitter.com/timeline/likes?' + 'callback=__twttrf.callback&dnt=false' + '&screen_name=' + config.likes.screenName + '&suppress_response_codes=true&lang=' + (config.lang || lang) + '&rnd=' + Math.random();
                } else {
                    script.src = 'https://cdn.syndication.twimg.com/widgets/timelines/' +
                        config.id + '?&lang=' + (config.lang || lang) + '&callback=__twttrf.callback&' + 'suppress_response_codes=true&rnd=' + Math.random();
                }
                head.appendChild(script);
            }
        },
        callback: function(data) {
            if (data === undefined || data.body === undefined) {
                inProgress = false;
                if (queue.length > 0) {
                    twitterFetcher.fetch(queue[0]);
                    queue.splice(0, 1);
                }
                return;
            }
            if (!useEmoji) {
                data.body = data.body.replace(/(<img[^c]*class="Emoji[^>]*>)|(<img[^c]*class="u-block[^>]*>)/g, '');
            }
            if (!showImages) {
                data.body = data.body.replace(/(<img[^c]*class="NaturalImage-image[^>]*>|(<img[^c]*class="CroppedImage-image[^>]*>))/g, '');
            }
            if (!printUser) {
                data.body = data.body.replace(/(<img[^c]*class="Avatar"[^>]*>)/g, '');
            }
            var div = document.createElement('div');
            div.innerHTML = data.body;
            if (typeof(div.getElementsByClassName) === 'undefined') {
                supportsClassName = false;
            }

            function swapDataSrc(element) {
                var avatarImg = '';
                return element;
            }
            var tweets = [];
            var authors = [];
            var times = [];
            var images = [];
            var rts = [];
            var tids = [];
            var permalinksURL = [];
            var x = 0;
            if (supportsClassName) {
                var tmp = div.getElementsByClassName('timeline-Tweet');
                while (x < tmp.length) {
                    if (tmp[x].getElementsByClassName('timeline-Tweet-retweetCredit').length > 0) {
                        rts.push(true);
                    } else {
                        rts.push(false);
                    }
                    if (!rts[x] || rts[x] && showRts) {
                        tweets.push(tmp[x].getElementsByClassName('timeline-Tweet-text')[0]);
                        tids.push(tmp[x].getAttribute('data-tweet-id'));
                        if (printUser) {
                            authors.push(swapDataSrc(tmp[x].getElementsByClassName('timeline-Tweet-author')[0]));
                        }
                        times.push(tmp[x].getElementsByClassName('dt-updated')[0]);
                        permalinksURL.push(tmp[x].getElementsByClassName('timeline-Tweet-timestamp')[0]);
                        if (tmp[x].getElementsByClassName('timeline-Tweet-media')[0] !== undefined) {
                            images.push(tmp[x].getElementsByClassName('timeline-Tweet-media')[0]);
                        } else {
                            images.push(undefined);
                        }
                    }
                    x++;
                }
            } else {
                var tmp = getElementsByClassName(div, 'timeline-Tweet');
                while (x < tmp.length) {
                    if (getElementsByClassName(tmp[x], 'timeline-Tweet-retweetCredit').length > 0) {
                        rts.push(true);
                    } else {
                        rts.push(false);
                    }
                    if (!rts[x] || rts[x] && showRts) {
                        tweets.push(getElementsByClassName(tmp[x], 'timeline-Tweet-text')[0]);
                        tids.push(tmp[x].getAttribute('data-tweet-id'));
                        if (printUser) {
                            authors.push(swapDataSrc(getElementsByClassName(tmp[x], 'timeline-Tweet-author')[0]));
                        }
                        times.push(getElementsByClassName(tmp[x], 'dt-updated')[0]);
                        permalinksURL.push(getElementsByClassName(tmp[x], 'timeline-Tweet-timestamp')[0]);
                        if (getElementsByClassName(tmp[x], 'timeline-Tweet-media')[0] !== undefined) {
                            images.push(getElementsByClassName(tmp[x], 'timeline-Tweet-media')[0]);
                        } else {
                            images.push(undefined);
                        }
                    }
                    x++;
                }
            }
            if (tweets.length > maxTweets) {
                tweets.splice(maxTweets, (tweets.length - maxTweets));
                authors.splice(maxTweets, (authors.length - maxTweets));
                times.splice(maxTweets, (times.length - maxTweets));
                rts.splice(maxTweets, (rts.length - maxTweets));
                images.splice(maxTweets, (images.length - maxTweets));
                permalinksURL.splice(maxTweets, (permalinksURL.length - maxTweets));
            }
            var arrayTweets = [];
            var x = tweets.length;
            var n = 0;
            if (dataOnly) {
                while (n < x) {
                    arrayTweets.push({
                        tweet: tweets[n].innerHTML,
                        author: authors[n] ? authors[n].innerHTML : 'Unknown Author',
                        author_data: {
                            profile_url: authors[n] ? authors[n].querySelector('[data-scribe="element:user_link"]').href : null,
                            profile_image: authors[n] ? authors[n].querySelector('[data-scribe="element:avatar"]').getAttribute('data-src-1x') : null,
                            profile_image_2x: authors[n] ? authors[n].querySelector('[data-scribe="element:avatar"]').getAttribute('data-src-2x') : null,
                            screen_name: authors[n] ? authors[n].querySelector('[data-scribe="element:screen_name"]').title : null,
                            name: authors[n] ? authors[n].querySelector('[data-scribe="element:name"]').title : null
                        },
                        time: times[n].textContent,
                        timestamp: times[n].getAttribute('datetime').replace('+0000', 'Z').replace(/([\+\-])(\d\d)(\d\d)/, '$1$2:$3'),
                        image: extractImageUrl(images[n]),
                        rt: rts[n],
                        tid: tids[n],
                        permalinkURL: (permalinksURL[n] === undefined) ? '' : permalinksURL[n].href
                    });
                    n++;
                }
            } else {
                while (n < x) {
                    if (typeof(formatterFunction) !== 'string') {
                        var datetimeText = times[n].getAttribute('datetime');
                        var newDate = new Date(times[n].getAttribute('datetime').replace(/-/g, '/').replace('T', ' ').split('+')[0]);
                        var dateString = formatterFunction(newDate, datetimeText);
                        times[n].setAttribute('aria-label', dateString);
                        if (tweets[n].textContent) {
                            if (supportsClassName) {
                                times[n].textContent = dateString;
                            } else {
                                var h = document.createElement('p');
                                var t = document.createTextNode(dateString);
                                h.appendChild(t);
                                h.setAttribute('aria-label', dateString);
                                times[n] = h;
                            }
                        } else {
                            times[n].textContent = dateString;
                        }
                    }
                    var op = '';
                    if (parseLinks) {
                        if (targetBlank) {
                            targetLinksToNewWindow(tweets[n]);
                            if (printUser) {
                                targetLinksToNewWindow(authors[n]);
                            }
                        }
                        if (printUser) {
                            op += '<div class="user">' + strip(authors[n].innerHTML) + '</div>';
                        }
                        op += '<p class="tweet">' + strip(tweets[n].innerHTML) + '</p>';
                        if (printTime) {
                            if (permalinks) {
                                op += '<p class="timePosted"><a href="' + permalinksURL[n] + '">' + times[n].getAttribute('aria-label') + '</a></p>';
                            } else {
                                op += '<p class="timePosted">' +
                                    times[n].getAttribute('aria-label') + '</p>';
                            }
                        }
                    } else {
                        if (tweets[n].textContent) {
                            if (printUser) {
                                op += '<p class="user">' + authors[n].textContent + '</p>';
                            }
                            op += '<p class="tweet">' + tweets[n].textContent + '</p>';
                            if (printTime) {
                                op += '<p class="timePosted">' + times[n].textContent + '</p>';
                            }
                        } else {
                            if (printUser) {
                                op += '<p class="user">' + authors[n].textContent + '</p>';
                            }
                            op += '<p class="tweet">' + tweets[n].textContent + '</p>';
                            if (printTime) {
                                op += '<p class="timePosted">' + times[n].textContent + '</p>';
                            }
                        }
                    }
                    if (showInteractionLinks) {
                        op += '<p class="interact"><a href="https://twitter.com/intent/' + 'tweet?in_reply_to=' + tids[n] + '" class="twitter_reply_icon"' +
                            (targetBlank ? ' target="_blank">' : '>') + '<i class="fal fa-comment-alt"></i></a><a href="https://twitter.com/intent/retweet?' + 'tweet_id=' + tids[n] + '" class="twitter_retweet_icon"' +
                            (targetBlank ? ' target="_blank">' : '>') + '<i class="fal fa-repeat"></i></a>' + '<a href="https://twitter.com/intent/favorite?tweet_id=' +
                            tids[n] + '" class="twitter_fav_icon"' +
                            (targetBlank ? ' target="_blank">' : '>') + '<i class="fal fa-heart"></i></a></p>';
                    }
                    if (showImages && images[n] !== undefined && extractImageUrl(images[n]) !== undefined) {
                        op += '<div class="media">' + '<img src="' + extractImageUrl(images[n]) + '" alt="Image from tweet" />' + '</div>';
                    }
                    if (showImages) {
                        arrayTweets.push(op);
                    } else if (!showImages && tweets[n].textContent.length) {
                        arrayTweets.push(op);
                    }
                    n++;
                }
            }
            handleTweets(arrayTweets);
            inProgress = false;
            if (queue.length > 0) {
                twitterFetcher.fetch(queue[0]);
                queue.splice(0, 1);
            }
        }
    };
    window.__twttrf = twitterFetcher;
    window.twitterFetcher = twitterFetcher;
    return twitterFetcher;
}));

/*jQuery easy ticker v3.2.1 - (c) 2021 Aakash Chakravarthy*/
! function(r, c) {
    var e = "easyTicker",
        p = {
            direction: "up",
            easing: "swing",
            speed: "slow",
            interval: 2e3,
            height: "auto",
            visible: 0,
            mousePause: !0,
            controls: {
                up: "",
                down: "",
                toggle: "",
                playText: "Play",
                stopText: "Stop"
            },
            callbacks: {
                before: !1,
                after: !1
            }
        };

    function i(t, e) {
        var l = this;

        function i() {
            0 == l.timer && (l.timer = setInterval(function() {
                o(l.opts.direction)
            }, l.opts.interval), r(l.opts.controls.toggle).addClass("et-run").html(l.opts.controls.stopText))
        }

        function n() {
            clearInterval(l.timer), l.timer = 0, r(l.opts.controls.toggle).removeClass("et-run").html(l.opts.controls.playText)
        }

        function o(t) {
            var e, i, n;
            if (l.elem.is(":visible")) {
                n = "up" == t ? (e = ":first-child", i = "-=", "appendTo") : (e = ":last-child", i = "+=", "prependTo");
                var o = l.targ.children(e),
                    s = o.outerHeight();
                "function" == typeof l.opts.callbacks.before && l.opts.callbacks.before.call(l, l.targ, o), l.targ.stop(!0, !0).animate({
                    top: i + s + "px"
                }, l.opts.speed, l.opts.easing, function() {
                    o.hide()[n](l.targ).fadeIn(), l.targ.css("top", 0), a(!0), "function" == typeof l.opts.callbacks.after && l.opts.callbacks.after.call(l, l.targ, o)
                })
            }
        }

        function s(t) {
            n(), o("up" == t ? "up" : "down")
        }

        function a(t) {
            var e, i, n, o, s;
            "auto" == l.opts.height && (0 < l.opts.visible ? (n = t, o = 0, s = "et-item-visible", l.targ.children().removeClass(s), l.targ.children(":lt(" + l.opts.visible + ")").each(function() {
                o += r(this).outerHeight(), r(this).addClass(s)
            }), n ? l.elem.stop(!0, !0).animate({
                height: o
            }, l.opts.speed) : l.elem.css("height", o)) : (e = 0, i = l.elem.css("display"), l.elem.css("display", "block"), l.targ.children().each(function() {
                e += r(this).outerHeight()
            }), l.elem.css({
                display: i,
                height: e
            }))), t || clearInterval(l.heightTimer)
        }
        return l.opts = r.extend({}, p, e), l.elem = r(t), l.targ = r(t).children(":first-child"), l.timer = 0, l.elem.children().css("margin", 0).children().css("margin", 0), l.elem.css({
                position: "relative",
                height: l.opts.height,
                overflow: "hidden"
            }), l.targ.css({
                position: "absolute",
                margin: 0
            }), l.heightTimer = setInterval(function() {
                a(!1)
            }, 100), i(),
            function() {
                var t, e;
                void 0 !== c.hidden ? (t = "hidden", e = "visibilitychange") : void 0 !== c.msHidden ? (t = "msHidden", e = "msvisibilitychange") : void 0 !== c.webkitHidden && (t = "webkitHidden", e = "webkitvisibilitychange");
                c.addEventListener(e, function() {
                    (c[t] ? n : i)()
                }, !1)
            }(), l.opts.mousePause && l.elem.on("mouseenter", function() {
                l.timerTemp = l.timer, n()
            }).on("mouseleave", function() {
                0 !== l.timerTemp && i()
            }), r(l.opts.controls.up).on("click", function(t) {
                t.preventDefault(), s("up")
            }), r(l.opts.controls.down).on("click", function(t) {
                t.preventDefault(), s("down")
            }), r(l.opts.controls.toggle).on("click", function(t) {
                t.preventDefault(), (0 == l.timer ? i : n)()
            }), {
                up: function() {
                    s("up")
                },
                down: function() {
                    s("down")
                },
                start: i,
                stop: n,
                options: l.opts
            }
    }
    r.fn[e] = function(t) {
        return this.each(function() {
            r.data(this, e) || r.data(this, e, new i(this, t))
        })
    }
}(jQuery, (window, document));