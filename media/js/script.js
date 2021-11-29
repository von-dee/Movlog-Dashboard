$(function () {
        "use strict";
        var e = {
            scales: {
                responsive: !1,
                maintainAspectRatio: !0,
                yAxes: [{
                    display: !1
                }],
                xAxes: [{
                    display: !1
                }]
            },
            legend: {
                display: !1
            },
            elements: {
                point: {
                    radius: 0
                }
            },
            stepsize: 100
        };
        if ($("#stat-line_1").length) {
            (r = (t = $("#stat-line_1").get(0).getContext("2d")).createLinearGradient(100, 60, 30, 0)).addColorStop(0, "#B721FF"), r.addColorStop(1, "#21D4FD");
            new Chart(t, {
                type: "line",
                data: {
                    labels: ["Day 1", "Day 2", "Day 3", "Day 4", "Day 5", "Day 6", "Day 7", "Day 8", "Day 9", "Day 10", "Day 11", "Day 12", "Day 13"],
                    datasets: [{
                        label: "Profit",
                        data: [7, 6, 9, 7, 8, 6, 8, 5, 7, 8, 6, 7, 7],
                        borderColor: r,
                        borderWidth: 3,
                        fill: !1
                    }]
                },
                options: e
            })
        }
        if ($("#stat-line_2").length) {
            (r = (t = $("#stat-line_2").get(0).getContext("2d")).createLinearGradient(100, 60, 30, 0)).addColorStop(0, "#08AEEA"), r.addColorStop(1, "#2AF598");
            new Chart(t, {
                type: "line",
                data: {
                    labels: ["Day 1", "Day 2", "Day 3", "Day 4", "Day 5", "Day 6", "Day 7", "Day 8", "Day 9", "Day 10", "Day 11", "Day 12", "Day 13"],
                    datasets: [{
                        label: "Profit",
                        data: [7, 6, 9, 7, 8, 6, 8, 5, 7, 8, 6, 7, 7],
                        borderColor: r,
                        borderWidth: 3,
                        fill: !1
                    }]
                },
                options: e
            })
        }
        if ($("#stat-line_3").length) {
            (r = (t = $("#stat-line_3").get(0).getContext("2d")).createLinearGradient(100, 60, 30, 0)).addColorStop(0, "#FEE140"), r.addColorStop(1, "#FA709A");
            new Chart(t, {
                type: "line",
                data: {
                    labels: ["Day 1", "Day 2", "Day 3", "Day 4", "Day 5", "Day 6", "Day 7", "Day 8", "Day 9", "Day 10", "Day 11", "Day 12", "Day 13"],
                    datasets: [{
                        label: "Profit",
                        data: [7, 6, 9, 7, 8, 6, 8, 5, 7, 8, 6, 7, 7],
                        borderColor: "#6d7cfc",
                        borderColor: r,
                        borderWidth: 3,
                        fill: !1
                    }]
                },
                options: e
            })
        }
        if ($("#stat-line_4").length) {
            var t, r;
            (r = (t = $("#stat-line_4").get(0).getContext("2d")).createLinearGradient(100, 60, 30, 0)).addColorStop(0, "#ff7fc7"), r.addColorStop(1, "#43b4ff");
            new Chart(t, {
                type: "line",
                data: {
                    labels: ["Day 1", "Day 2", "Day 3", "Day 4", "Day 5", "Day 6", "Day 7", "Day 8", "Day 9", "Day 10", "Day 11", "Day 12", "Day 13"],
                    datasets: [{
                        label: "Profit",
                        data: [7, 6, 9, 7, 8, 6, 8, 5, 7, 8, 6, 7, 7],
                        borderColor: "#6d7cfc",
                        borderColor: r,
                        borderWidth: 3,
                        fill: !1
                    }]
                },
                options: e
            })
        }
        if ($("#followers-bar-chart").length) {
            var a = {
                    layout: {
                        padding: {
                            left: 0,
                            right: 0,
                            top: 0,
                            bottom: 0
                        }
                    },
                    scales: {
                        responsive: !0,
                        maintainAspectRatio: !0,
                        yAxes: [{
                            display: !0,
                            gridLines: {
                                color: "rgba(0, 0, 0, 0.03)",
                                drawBorder: !1
                            },
                            ticks: {
                                min: 20,
                                max: 80,
                                stepSize: 20,
                                fontColor: "#212529",
                                maxTicksLimit: 3,
                                callback: function (e, t, r) {
                                    return e + " K"
                                },
                                padding: 10
                            }
                        }],
                        xAxes: [{
                            display: !1,
                            barPercentage: .3,
                            gridLines: {
                                display: !1,
                                drawBorder: !1
                            }
                        }]
                    },
                    legend: {
                        display: !1
                    }
                },
                o = document.getElementById("followers-bar-chart");
            new Chart(o, {
                type: "bar",
                data: {
                    labels: ["Mon", "Tue", "Wed", "Thus", "Fri", "Sat"],
                    datasets: [{
                        label: "Follower",
                        data: [62, 52, 73, 58, 63, 72],
                        backgroundColor: [chartColors[0], chartColors[0], chartColors[0], chartColors[0], chartColors[0], chartColors[0]],
                        borderColor: chartColors[0],
                        borderWidth: 0
                    }]
                },
                options: a
            })
        }
        if ($("#radial-chart").length && (a = {
                chart: {
                    height: 230,
                    type: "radialBar"
                },
                series: [67],
                colors: ["#696ffb"],
                plotOptions: {
                    radialBar: {
                        hollow: {
                            margin: 0,
                            size: "70%",
                            background: "rgba(255,255,255,0.1)"
                        },
                        track: {
                            dropShadow: {
                                enabled: !0,
                                top: 2,
                                left: 0,
                                blur: 4,
                                opacity: .02
                            }
                        },
                        dataLabels: {
                            name: {
                                offsetY: -10,
                                color: "#adb5bd",
                                fontSize: "13px"
                            },
                            value: {
                                offsetY: 5,
                                color: "#000",
                                fontSize: "20px",
                                show: !0
                            }
                        }
                    }
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        shade: "dark",
                        type: "vertical",
                        gradientToColors: ["#87D4F9"],
                        stops: [0, 100]
                    }
                },
                stroke: {
                    lineCap: "round"
                },
                labels: ["Progress"]
            }, (n = new ApexCharts(document.querySelector("#radial-chart"), a)).render()), $("#cpu-performance").length) {
            var n, i = (n = document.getElementById("cpu-performance").getContext("2d")).createLinearGradient(0, 0, 0, 0);
            i.addColorStop(0, "rgba(255, 255, 225,0.5)"), i.addColorStop(1, "rgba(255, 255, 225,0.5)"), new Chart(n, {
                type: "line",
                data: {
                    labels: ["Day 1", "Day 2", "Day 3", "Day 4", "Day 5", "Day 6", "Day 7", "Day 8", "Day 9", "Day 10", "Day 11", "Day 12", "Day 13", "Day 14", "Day 15", "Day 16", "Day 17", "Day 18", "Day 19", "Day 20", "Day 21", "Day 22", "Day 23", "Day 24", "Day 25", "Day 26", "Day 27", "Day 28", "Day 29", "Day 30", "Day 31", "Day 32", "Day 33", "Day 34", "Day 35", "Day 36", "Day 37", "Day 38", "Day 39", "Day 40", "Day 41", "Day 42", "Day 43", "Day 44", "Day 45", "Day 46", "Day 47", "Day 48", "Day 49", "Day 50", "Day 51", "Day 52", "Day 53", "Day 54", "Day 55", "Day 56", "Day 57", "Day 58", "Day 59", "Day 60", "Day 61", "Day 62", "Day 63", "Day 64", "Day 65", "Day 66", "Day 67", "Day 68", "Day 69", "Day 70", "Day 71", "Day 72", "Day 73", "Day 74", "Day 75", "Day 76", "Day 77", "Day 78", "Day 79", "Day 80", "Day 81", "Day 82"],
                    datasets: [{
                        label: "CPU Usage",
                        data: [56, 55, 59, 59, 59, 57, 56, 57, 54, 56, 58, 57, 59, 58, 59, 57, 55, 56, 54, 52, 49, 48, 50, 50, 46, 45, 49, 50, 52, 53, 52, 55, 54, 53, 56, 55, 56, 55, 54, 55, 57, 58, 56, 55, 56, 57, 58, 59, 58, 57, 55, 53, 52, 55, 57, 55, 54, 52, 55, 57, 56, 57, 58, 59, 58, 59, 57, 56, 55, 57, 58, 59, 60, 62, 60, 59, 58, 57, 56, 57, 56, 58, 59],
                        borderColor: chartColors[0],
                        backgroundColor: i,
                        borderWidth: 3
                    }, {
                        label: "Ram Usage",
                        data: [32, 25, 29, 29, 29, 27, 26, 27, 24, 26, 28, 27, 29, 28, 29, 27, 25, 26, 24, 20, 18, 21, 19, 17, 14, 13, 16, 15, 17, 18, 19, 22, 20, 23, 21, 25, 24, 22, 25, 27, 25, 26, 24, 20, 18, 18, 18, 22, 19, 23, 25, 23, 22, 25, 27, 25, 24, 22, 25, 27, 26, 27, 28, 29, 28, 29, 27, 26, 25, 27, 28, 29, 26, 27, 25, 29, 28, 27, 26, 27, 26, 28, 29],
                        borderColor: chartColors[1],
                        backgroundColor: "rgba(255,255,255,0.05)",
                        borderWidth: 3
                    }]
                },
                options: {
                    responsive: !0,
                    animation: {
                        animateScale: !0,
                        animateRotate: !0
                    },
                    elements: {
                        point: {
                            radius: 0
                        }
                    },
                    layout: {
                        padding: {
                            left: 0,
                            right: 0,
                            top: 0,
                            bottom: 0
                        }
                    },
                    legend: !1,
                    stepsize: 150,
                    min: 0,
                    max: 350,
                    scales: {
                        xAxes: [{
                            gridLines: {
                                display: !1,
                                drawBorder: !1
                            },
                            ticks: {
                                display: !1,
                                max: 150
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                display: !1,
                                drawBorder: !1
                            },
                            ticks: {
                                display: !1
                            }
                        }]
                    }
                }
            })
        }
    }),
    function (e) {
        var t = "object" == typeof window && window || "object" == typeof self && self;
        "undefined" != typeof exports ? e(exports) : t && (t.hljs = e({}), "function" == typeof define && define.amd && define([], function () {
            return t.hljs
        }))
    }(function (o) {
        function m(e) {
            return e.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;")
        }

        function u(e) {
            return e.nodeName.toLowerCase()
        }

        function C(e, t) {
            var r = e && e.exec(t);
            return r && 0 === r.index
        }

        function p(e) {
            return a.test(e)
        }

        function c(e) {
            var t, r = {},
                a = Array.prototype.slice.call(arguments, 1);
            for (t in e) r[t] = e[t];
            return a.forEach(function (e) {
                for (t in e) r[t] = e[t]
            }), r
        }

        function h(e) {
            var o = [];
            return function e(t, r) {
                for (var a = t.firstChild; a; a = a.nextSibling) 3 === a.nodeType ? r += a.nodeValue.length : 1 === a.nodeType && (o.push({
                    event: "start",
                    offset: r,
                    node: a
                }), r = e(a, r), u(a).match(/br|hr|img|input/) || o.push({
                    event: "stop",
                    offset: r,
                    node: a
                }));
                return r
            }(e, 0), o
        }

        function v(i) {
            function l(e) {
                return e && e.source || e
            }

            function s(e, t) {
                return new RegExp(l(e), "m" + (i.cI ? "i" : "") + (t ? "g" : ""))
            }! function t(r, e) {
                if (!r.compiled) {
                    if (r.compiled = !0, r.k = r.k || r.bK, r.k) {
                        var a = {},
                            o = function (r, e) {
                                i.cI && (e = e.toLowerCase()), e.split(" ").forEach(function (e) {
                                    var t = e.split("|");
                                    a[t[0]] = [r, t[1] ? Number(t[1]) : 1]
                                })
                            };
                        "string" == typeof r.k ? o("keyword", r.k) : d(r.k).forEach(function (e) {
                            o(e, r.k[e])
                        }), r.k = a
                    }
                    r.lR = s(r.l || /\w+/, !0), e && (r.bK && (r.b = "\\b(" + r.bK.split(" ").join("|") + ")\\b"), r.b || (r.b = /\B|\b/), r.bR = s(r.b), r.endSameAsBegin && (r.e = r.b), r.e || r.eW || (r.e = /\B|\b/), r.e && (r.eR = s(r.e)), r.tE = l(r.e) || "", r.eW && e.tE && (r.tE += (r.e ? "|" : "") + e.tE)), r.i && (r.iR = s(r.i)), null == r.r && (r.r = 1), r.c || (r.c = []), r.c = Array.prototype.concat.apply([], r.c.map(function (e) {
                        return (t = "self" === e ? r : e).v && !t.cached_variants && (t.cached_variants = t.v.map(function (e) {
                            return c(t, {
                                v: null
                            }, e)
                        })), t.cached_variants || t.eW && [c(t)] || [t];
                        var t
                    })), r.c.forEach(function (e) {
                        t(e, r)
                    }), r.starts && t(r.starts, e);
                    var n = r.c.map(function (e) {
                        return e.bK ? "\\.?(" + e.b + ")\\.?" : e.b
                    }).concat([r.tE, r.i]).map(l).filter(Boolean);
                    r.t = n.length ? s(n.join("|"), !0) : {
                        exec: function () {
                            return null
                        }
                    }
                }
            }(i)
        }

        function w(e, t, l, r) {
            function s(e, t, r, a) {
                var o = '<span class="' + (a ? "" : A.classPrefix);
                return (o += e + '">') + t + (r ? "" : S)
            }

            function c() {
                p += null != u.sL ? function () {
                    var e = "string" == typeof u.sL;
                    if (e && !k[u.sL]) return m(h);
                    var t = e ? w(u.sL, h, !0, n[u.sL]) : x(h, u.sL.length ? u.sL : void 0);
                    return 0 < u.r && (g += t.r), e && (n[u.sL] = t.top), s(t.language, t.value, !1, !0)
                }() : function () {
                    var e, t, r, a, o, n, i;
                    if (!u.k) return m(h);
                    for (a = "", t = 0, u.lR.lastIndex = 0, r = u.lR.exec(h); r;) a += m(h.substring(t, r.index)), o = u, n = r, i = b.cI ? n[0].toLowerCase() : n[0], (e = o.k.hasOwnProperty(i) && o.k[i]) ? (g += e[1], a += s(e[0], m(r[0]))) : a += m(r[0]), t = u.lR.lastIndex, r = u.lR.exec(h);
                    return a + m(h.substr(t))
                }(), h = ""
            }

            function d(e) {
                p += e.cN ? s(e.cN, "", !0) : "", u = Object.create(e, {
                    parent: {
                        value: u
                    }
                })
            }

            function a(e, t) {
                if (h += e, null == t) return c(), 0;
                var r = function (e, t) {
                    var r, a, o;
                    for (r = 0, a = t.c.length; r < a; r++)
                        if (C(t.c[r].bR, e)) return t.c[r].endSameAsBegin && (t.c[r].eR = (o = t.c[r].bR.exec(e)[0], new RegExp(o.replace(/[-\/\\^$*+?.()|[\]{}]/g, "\\$&"), "m"))), t.c[r]
                }(t, u);
                if (r) return r.skip ? h += t : (r.eB && (h += t), c(), r.rB || r.eB || (h = t)), d(r), r.rB ? 0 : t.length;
                var a, o, n = function e(t, r) {
                    if (C(t.eR, r)) {
                        for (; t.endsParent && t.parent;) t = t.parent;
                        return t
                    }
                    return t.eW ? e(t.parent, r) : void 0
                }(u, t);
                if (n) {
                    var i = u;
                    for (i.skip ? h += t : (i.rE || i.eE || (h += t), c(), i.eE && (h = t)); u.cN && (p += S), u.skip || u.sL || (g += u.r), (u = u.parent) !== n.parent;);
                    return n.starts && (n.endSameAsBegin && (n.starts.eR = n.eR), d(n.starts)), i.rE ? 0 : t.length
                }
                if (a = t, o = u, !l && C(o.iR, a)) throw new Error('Illegal lexeme "' + t + '" for mode "' + (u.cN || "<unnamed>") + '"');
                return h += t, t.length || 1
            }
            var b = D(e);
            if (!b) throw new Error('Unknown language: "' + e + '"');
            v(b);
            var o, u = r || b,
                n = {},
                p = "";
            for (o = u; o !== b; o = o.parent) o.cN && (p = s(o.cN, "", !0) + p);
            var h = "",
                g = 0;
            try {
                for (var i, f, y = 0; u.t.lastIndex = y, i = u.t.exec(t);) f = a(t.substring(y, i.index), i[0]), y = i.index + f;
                for (a(t.substr(y)), o = u; o.parent; o = o.parent) o.cN && (p += S);
                return {
                    r: g,
                    value: p,
                    language: e,
                    top: u
                }
            } catch (e) {
                if (e.message && -1 !== e.message.indexOf("Illegal")) return {
                    r: 0,
                    value: m(t)
                };
                throw e
            }
        }

        function x(r, e) {
            e = e || A.languages || d(k);
            var a = {
                    r: 0,
                    value: m(r)
                },
                o = a;
            return e.filter(D).filter(n).forEach(function (e) {
                var t = w(e, r, !1);
                t.language = e, t.r > o.r && (o = t), t.r > a.r && (o = a, a = t)
            }), o.language && (a.second_best = o), a
        }

        function g(e) {
            return A.tabReplace || A.useBR ? e.replace(i, function (e, t) {
                return A.useBR && "\n" === e ? "<br>" : A.tabReplace ? t.replace(/\t/g, A.tabReplace) : ""
            }) : e
        }

        function t(e) {
            var t, r, a, o, n, i, l, s, c, d, b = function (e) {
                var t, r, a, o, n = e.className + " ";
                if (n += e.parentNode ? e.parentNode.className : "", r = N.exec(n)) return D(r[1]) ? r[1] : "no-highlight";
                for (t = 0, a = (n = n.split(/\s+/)).length; t < a; t++)
                    if (p(o = n[t]) || D(o)) return o
            }(e);
            p(b) || (A.useBR ? (t = document.createElementNS("http://www.w3.org/1999/xhtml", "div")).innerHTML = e.innerHTML.replace(/\n/g, "").replace(/<br[ \/]*>/g, "\n") : t = e, n = t.textContent, a = b ? w(b, n, !0) : x(n), (r = h(t)).length && ((o = document.createElementNS("http://www.w3.org/1999/xhtml", "div")).innerHTML = a.value, a.value = function (e, t, r) {
                function a() {
                    return e.length && t.length ? e[0].offset !== t[0].offset ? e[0].offset < t[0].offset ? e : t : "start" === t[0].event ? e : t : e.length ? e : t
                }

                function o(e) {
                    s += "<" + u(e) + f.map.call(e.attributes, function (e) {
                        return " " + e.nodeName + '="' + m(e.value).replace('"', "&quot;") + '"'
                    }).join("") + ">"
                }

                function n(e) {
                    s += "</" + u(e) + ">"
                }

                function i(e) {
                    ("start" === e.event ? o : n)(e.node)
                }
                for (var l = 0, s = "", c = []; e.length || t.length;) {
                    var d = a();
                    if (s += m(r.substring(l, d[0].offset)), l = d[0].offset, d === e) {
                        for (c.reverse().forEach(n); i(d.splice(0, 1)[0]), (d = a()) === e && d.length && d[0].offset === l;);
                        c.reverse().forEach(o)
                    } else "start" === d[0].event ? c.push(d[0].node) : c.pop(), i(d.splice(0, 1)[0])
                }
                return s + m(r.substr(l))
            }(r, h(o), n)), a.value = g(a.value), e.innerHTML = a.value, e.className = (i = e.className, l = b, s = a.language, c = l ? y[l] : s, d = [i.trim()], i.match(/\bhljs\b/) || d.push("hljs"), -1 === i.indexOf(c) && d.push(c), d.join(" ").trim()), e.result = {
                language: a.language,
                re: a.r
            }, a.second_best && (e.second_best = {
                language: a.second_best.language,
                re: a.second_best.r
            }))
        }

        function r() {
            if (!r.called) {
                r.called = !0;
                var e = document.querySelectorAll("pre code");
                f.forEach.call(e, t)
            }
        }

        function D(e) {
            return e = (e || "").toLowerCase(), k[e] || k[y[e]]
        }

        function n(e) {
            var t = D(e);
            return t && !t.disableAutodetect
        }
        var f = [],
            d = Object.keys,
            k = {},
            y = {},
            a = /^(no-?highlight|plain|text)$/i,
            N = /\blang(?:uage)?-([\w-]+)\b/i,
            i = /((^(<[^>]+>|\t|)+|(?:\n)))/gm,
            S = "</span>",
            A = {
                classPrefix: "hljs-",
                tabReplace: null,
                useBR: !1,
                languages: void 0
            };
        return o.highlight = w, o.highlightAuto = x, o.fixMarkup = g, o.highlightBlock = t, o.configure = function (e) {
            A = c(A, e)
        }, o.initHighlighting = r, o.initHighlightingOnLoad = function () {
            addEventListener("DOMContentLoaded", r, !1), addEventListener("load", r, !1)
        }, o.registerLanguage = function (t, e) {
            var r = k[t] = e(o);
            r.aliases && r.aliases.forEach(function (e) {
                y[e] = t
            })
        }, o.listLanguages = function () {
            return d(k)
        }, o.getLanguage = D, o.autoDetection = n, o.inherit = c, o.IR = "[a-zA-Z]\\w*", o.UIR = "[a-zA-Z_]\\w*", o.NR = "\\b\\d+(\\.\\d+)?", o.CNR = "(-?)(\\b0[xX][a-fA-F0-9]+|(\\b\\d+(\\.\\d*)?|\\.\\d+)([eE][-+]?\\d+)?)", o.BNR = "\\b(0b[01]+)", o.RSR = "!|!=|!==|%|%=|&|&&|&=|\\*|\\*=|\\+|\\+=|,|-|-=|/=|/|:|;|<<|<<=|<=|<|===|==|=|>>>=|>>=|>=|>>>|>>|>|\\?|\\[|\\{|\\(|\\^|\\^=|\\||\\|=|\\|\\||~", o.BE = {
            b: "\\\\[\\s\\S]",
            r: 0
        }, o.ASM = {
            cN: "string",
            b: "'",
            e: "'",
            i: "\\n",
            c: [o.BE]
        }, o.QSM = {
            cN: "string",
            b: '"',
            e: '"',
            i: "\\n",
            c: [o.BE]
        }, o.PWM = {
            b: /\b(a|an|the|are|I'm|isn't|don't|doesn't|won't|but|just|should|pretty|simply|enough|gonna|going|wtf|so|such|will|you|your|they|like|more)\b/
        }, o.C = function (e, t, r) {
            var a = o.inherit({
                cN: "comment",
                b: e,
                e: t,
                c: []
            }, r || {});
            return a.c.push(o.PWM), a.c.push({
                cN: "doctag",
                b: "(?:TODO|FIXME|NOTE|BUG|XXX):",
                r: 0
            }), a
        }, o.CLCM = o.C("//", "$"), o.CBCM = o.C("/\\*", "\\*/"), o.HCM = o.C("#", "$"), o.NM = {
            cN: "number",
            b: o.NR,
            r: 0
        }, o.CNM = {
            cN: "number",
            b: o.CNR,
            r: 0
        }, o.BNM = {
            cN: "number",
            b: o.BNR,
            r: 0
        }, o.CSSNM = {
            cN: "number",
            b: o.NR + "(%|em|ex|ch|rem|vw|vh|vmin|vmax|cm|mm|in|pt|pc|px|deg|grad|rad|turn|s|ms|Hz|kHz|dpi|dpcm|dppx)?",
            r: 0
        }, o.RM = {
            cN: "regexp",
            b: /\//,
            e: /\/[gimuy]*/,
            i: /\n/,
            c: [o.BE, {
                b: /\[/,
                e: /\]/,
                r: 0,
                c: [o.BE]
            }]
        }, o.TM = {
            cN: "title",
            b: o.IR,
            r: 0
        }, o.UTM = {
            cN: "title",
            b: o.UIR,
            r: 0
        }, o.METHOD_GUARD = {
            b: "\\.\\s*" + o.UIR,
            r: 0
        }, o
    }), hljs.registerLanguage("bash", function (e) {
        var t = {
                cN: "variable",
                v: [{
                    b: /\$[\w\d#@][\w\d_]*/
                }, {
                    b: /\$\{(.*?)}/
                }]
            },
            r = {
                cN: "string",
                b: /"/,
                e: /"/,
                c: [e.BE, t, {
                    cN: "variable",
                    b: /\$\(/,
                    e: /\)/,
                    c: [e.BE]
                }]
            };
        return {
            aliases: ["sh", "zsh"],
            l: /\b-?[a-z\._]+\b/,
            k: {
                keyword: "if then else elif fi for while in do done case esac function",
                literal: "true false",
                built_in: "break cd continue eval exec exit export getopts hash pwd readonly return shift test times trap umask unset alias bind builtin caller command declare echo enable help let local logout mapfile printf read readarray source type typeset ulimit unalias set shopt autoload bg bindkey bye cap chdir clone comparguments compcall compctl compdescribe compfiles compgroups compquote comptags comptry compvalues dirs disable disown echotc echoti emulate fc fg float functions getcap getln history integer jobs kill limit log noglob popd print pushd pushln rehash sched setcap setopt stat suspend ttyctl unfunction unhash unlimit unsetopt vared wait whence where which zcompile zformat zftp zle zmodload zparseopts zprof zpty zregexparse zsocket zstyle ztcp",
                _: "-ne -eq -lt -gt -f -d -e -s -l -a"
            },
            c: [{
                cN: "meta",
                b: /^#![^\n]+sh\s*$/,
                r: 10
            }, {
                cN: "function",
                b: /\w[\w\d_]*\s*\(\s*\)\s*\{/,
                rB: !0,
                c: [e.inherit(e.TM, {
                    b: /\w[\w\d_]*/
                })],
                r: 0
            }, e.HCM, r, {
                cN: "string",
                b: /'/,
                e: /'/
            }, t]
        }
    }), hljs.registerLanguage("java", function (e) {
        var t = "false synchronized int abstract float private char boolean var static null if const for true while long strictfp finally protected import native final void enum else break transient catch instanceof byte super volatile case assert short package default double public try this switch continue throws protected public private module requires exports do",
            r = {
                cN: "number",
                b: "\\b(0[bB]([01]+[01_]+[01]+|[01]+)|0[xX]([a-fA-F0-9]+[a-fA-F0-9_]+[a-fA-F0-9]+|[a-fA-F0-9]+)|(([\\d]+[\\d_]+[\\d]+|[\\d]+)(\\.([\\d]+[\\d_]+[\\d]+|[\\d]+))?|\\.([\\d]+[\\d_]+[\\d]+|[\\d]+))([eE][-+]?\\d+)?)[lLfF]?",
                r: 0
            };
        return {
            aliases: ["jsp"],
            k: t,
            i: /<\/|#/,
            c: [e.C("/\\*\\*", "\\*/", {
                r: 0,
                c: [{
                    b: /\w+@/,
                    r: 0
                }, {
                    cN: "doctag",
                    b: "@[A-Za-z]+"
                }]
            }), e.CLCM, e.CBCM, e.ASM, e.QSM, {
                cN: "class",
                bK: "class interface",
                e: /[{;=]/,
                eE: !0,
                k: "class interface",
                i: /[:"\[\]]/,
                c: [{
                    bK: "extends implements"
                }, e.UTM]
            }, {
                bK: "new throw return else",
                r: 0
            }, {
                cN: "function",
                b: "([À-ʸa-zA-Z_$][À-ʸa-zA-Z_$0-9]*(<[À-ʸa-zA-Z_$][À-ʸa-zA-Z_$0-9]*(\\s*,\\s*[À-ʸa-zA-Z_$][À-ʸa-zA-Z_$0-9]*)*>)?\\s+)+" + e.UIR + "\\s*\\(",
                rB: !0,
                e: /[{;=]/,
                eE: !0,
                k: t,
                c: [{
                    b: e.UIR + "\\s*\\(",
                    rB: !0,
                    r: 0,
                    c: [e.UTM]
                }, {
                    cN: "params",
                    b: /\(/,
                    e: /\)/,
                    k: t,
                    r: 0,
                    c: [e.ASM, e.QSM, e.CNM, e.CBCM]
                }, e.CLCM, e.CBCM]
            }, r, {
                cN: "meta",
                b: "@[A-Za-z]+"
            }]
        }
    }), hljs.registerLanguage("xml", function (e) {
        var t = {
            eW: !0,
            i: /</,
            r: 0,
            c: [{
                cN: "attr",
                b: "[A-Za-z0-9\\._:-]+",
                r: 0
            }, {
                b: /=\s*/,
                r: 0,
                c: [{
                    cN: "string",
                    endsParent: !0,
                    v: [{
                        b: /"/,
                        e: /"/
                    }, {
                        b: /'/,
                        e: /'/
                    }, {
                        b: /[^\s"'=<>`]+/
                    }]
                }]
            }]
        };
        return {
            aliases: ["html", "xhtml", "rss", "atom", "xjb", "xsd", "xsl", "plist"],
            cI: !0,
            c: [{
                cN: "meta",
                b: "<!DOCTYPE",
                e: ">",
                r: 10,
                c: [{
                    b: "\\[",
                    e: "\\]"
                }]
            }, e.C("\x3c!--", "--\x3e", {
                r: 10
            }), {
                b: "<\\!\\[CDATA\\[",
                e: "\\]\\]>",
                r: 10
            }, {
                cN: "meta",
                b: /<\?xml/,
                e: /\?>/,
                r: 10
            }, {
                b: /<\?(php)?/,
                e: /\?>/,
                sL: "php",
                c: [{
                    b: "/\\*",
                    e: "\\*/",
                    skip: !0
                }, {
                    b: 'b"',
                    e: '"',
                    skip: !0
                }, {
                    b: "b'",
                    e: "'",
                    skip: !0
                }, e.inherit(e.ASM, {
                    i: null,
                    cN: null,
                    c: null,
                    skip: !0
                }), e.inherit(e.QSM, {
                    i: null,
                    cN: null,
                    c: null,
                    skip: !0
                })]
            }, {
                cN: "tag",
                b: "<style(?=\\s|>|$)",
                e: ">",
                k: {
                    name: "style"
                },
                c: [t],
                starts: {
                    e: "</style>",
                    rE: !0,
                    sL: ["css", "xml"]
                }
            }, {
                cN: "tag",
                b: "<script(?=\\s|>|$)",
                e: ">",
                k: {
                    name: "script"
                },
                c: [t],
                starts: {
                    e: "<\/script>",
                    rE: !0,
                    sL: ["actionscript", "javascript", "handlebars", "xml"]
                }
            }, {
                cN: "tag",
                b: "</?",
                e: "/?>",
                c: [{
                    cN: "name",
                    b: /[^\/><\s]+/,
                    r: 0
                }, t]
            }]
        }
    }), hljs.registerLanguage("scss", function (e) {
        var t = {
                cN: "variable",
                b: "(\\$[a-zA-Z-][a-zA-Z0-9_-]*)\\b"
            },
            r = {
                cN: "number",
                b: "#[0-9A-Fa-f]+"
            };
        return e.CSSNM, e.QSM, e.ASM, e.CBCM, {
            cI: !0,
            i: "[=/|']",
            c: [e.CLCM, e.CBCM, {
                cN: "selector-id",
                b: "\\#[A-Za-z0-9_-]+",
                r: 0
            }, {
                cN: "selector-class",
                b: "\\.[A-Za-z0-9_-]+",
                r: 0
            }, {
                cN: "selector-attr",
                b: "\\[",
                e: "\\]",
                i: "$"
            }, {
                cN: "selector-tag",
                b: "\\b(a|abbr|acronym|address|area|article|aside|audio|b|base|big|blockquote|body|br|button|canvas|caption|cite|code|col|colgroup|command|datalist|dd|del|details|dfn|div|dl|dt|em|embed|fieldset|figcaption|figure|footer|form|frame|frameset|(h[1-6])|head|header|hgroup|hr|html|i|iframe|img|input|ins|kbd|keygen|label|legend|li|link|map|mark|meta|meter|nav|noframes|noscript|object|ol|optgroup|option|output|p|param|pre|progress|q|rp|rt|ruby|samp|script|section|select|small|span|strike|strong|style|sub|sup|table|tbody|td|textarea|tfoot|th|thead|time|title|tr|tt|ul|var|video)\\b",
                r: 0
            }, {
                b: ":(visited|valid|root|right|required|read-write|read-only|out-range|optional|only-of-type|only-child|nth-of-type|nth-last-of-type|nth-last-child|nth-child|not|link|left|last-of-type|last-child|lang|invalid|indeterminate|in-range|hover|focus|first-of-type|first-line|first-letter|first-child|first|enabled|empty|disabled|default|checked|before|after|active)"
            }, {
                b: "::(after|before|choices|first-letter|first-line|repeat-index|repeat-item|selection|value)"
            }, t, {
                cN: "attribute",
                b: "\\b(z-index|word-wrap|word-spacing|word-break|width|widows|white-space|visibility|vertical-align|unicode-bidi|transition-timing-function|transition-property|transition-duration|transition-delay|transition|transform-style|transform-origin|transform|top|text-underline-position|text-transform|text-shadow|text-rendering|text-overflow|text-indent|text-decoration-style|text-decoration-line|text-decoration-color|text-decoration|text-align-last|text-align|tab-size|table-layout|right|resize|quotes|position|pointer-events|perspective-origin|perspective|page-break-inside|page-break-before|page-break-after|padding-top|padding-right|padding-left|padding-bottom|padding|overflow-y|overflow-x|overflow-wrap|overflow|outline-width|outline-style|outline-offset|outline-color|outline|orphans|order|opacity|object-position|object-fit|normal|none|nav-up|nav-right|nav-left|nav-index|nav-down|min-width|min-height|max-width|max-height|mask|marks|margin-top|margin-right|margin-left|margin-bottom|margin|list-style-type|list-style-position|list-style-image|list-style|line-height|letter-spacing|left|justify-content|initial|inherit|ime-mode|image-orientation|image-resolution|image-rendering|icon|hyphens|height|font-weight|font-variant-ligatures|font-variant|font-style|font-stretch|font-size-adjust|font-size|font-language-override|font-kerning|font-feature-settings|font-family|font|float|flex-wrap|flex-shrink|flex-grow|flex-flow|flex-direction|flex-basis|flex|filter|empty-cells|display|direction|cursor|counter-reset|counter-increment|content|column-width|column-span|column-rule-width|column-rule-style|column-rule-color|column-rule|column-gap|column-fill|column-count|columns|color|clip-path|clip|clear|caption-side|break-inside|break-before|break-after|box-sizing|box-shadow|box-decoration-break|bottom|border-width|border-top-width|border-top-style|border-top-right-radius|border-top-left-radius|border-top-color|border-top|border-style|border-spacing|border-right-width|border-right-style|border-right-color|border-right|border-radius|border-left-width|border-left-style|border-left-color|border-left|border-image-width|border-image-source|border-image-slice|border-image-repeat|border-image-outset|border-image|border-color|border-collapse|border-bottom-width|border-bottom-style|border-bottom-right-radius|border-bottom-left-radius|border-bottom-color|border-bottom|border|background-size|background-repeat|background-position|background-origin|background-image|background-color|background-clip|background-attachment|background-blend-mode|background|backface-visibility|auto|animation-timing-function|animation-play-state|animation-name|animation-iteration-count|animation-fill-mode|animation-duration|animation-direction|animation-delay|animation|align-self|align-items|align-content)\\b",
                i: "[^\\s]"
            }, {
                b: "\\b(whitespace|wait|w-resize|visible|vertical-text|vertical-ideographic|uppercase|upper-roman|upper-alpha|underline|transparent|top|thin|thick|text|text-top|text-bottom|tb-rl|table-header-group|table-footer-group|sw-resize|super|strict|static|square|solid|small-caps|separate|se-resize|scroll|s-resize|rtl|row-resize|ridge|right|repeat|repeat-y|repeat-x|relative|progress|pointer|overline|outside|outset|oblique|nowrap|not-allowed|normal|none|nw-resize|no-repeat|no-drop|newspaper|ne-resize|n-resize|move|middle|medium|ltr|lr-tb|lowercase|lower-roman|lower-alpha|loose|list-item|line|line-through|line-edge|lighter|left|keep-all|justify|italic|inter-word|inter-ideograph|inside|inset|inline|inline-block|inherit|inactive|ideograph-space|ideograph-parenthesis|ideograph-numeric|ideograph-alpha|horizontal|hidden|help|hand|groove|fixed|ellipsis|e-resize|double|dotted|distribute|distribute-space|distribute-letter|distribute-all-lines|disc|disabled|default|decimal|dashed|crosshair|collapse|col-resize|circle|char|center|capitalize|break-word|break-all|bottom|both|bolder|bold|block|bidi-override|below|baseline|auto|always|all-scroll|absolute|table|table-cell)\\b"
            }, {
                b: ":",
                e: ";",
                c: [t, r, e.CSSNM, e.QSM, e.ASM, {
                    cN: "meta",
                    b: "!important"
                }]
            }, {
                b: "@",
                e: "[{;]",
                k: "mixin include extend for if else each while charset import debug media page content font-face namespace warn",
                c: [t, e.QSM, e.ASM, r, e.CSSNM, {
                    b: "\\s[A-Za-z0-9_.-]+",
                    r: 0
                }]
            }]
        }
    }), hljs.registerLanguage("css", function (e) {
        var t = {
            b: /[A-Z\_\.\-]+\s*:/,
            rB: !0,
            e: ";",
            eW: !0,
            c: [{
                cN: "attribute",
                b: /\S/,
                e: ":",
                eE: !0,
                starts: {
                    eW: !0,
                    eE: !0,
                    c: [{
                        b: /[\w-]+\(/,
                        rB: !0,
                        c: [{
                            cN: "built_in",
                            b: /[\w-]+/
                        }, {
                            b: /\(/,
                            e: /\)/,
                            c: [e.ASM, e.QSM]
                        }]
                    }, e.CSSNM, e.QSM, e.ASM, e.CBCM, {
                        cN: "number",
                        b: "#[0-9A-Fa-f]+"
                    }, {
                        cN: "meta",
                        b: "!important"
                    }]
                }
            }]
        };
        return {
            cI: !0,
            i: /[=\/|'\$]/,
            c: [e.CBCM, {
                cN: "selector-id",
                b: /#[A-Za-z0-9_-]+/
            }, {
                cN: "selector-class",
                b: /\.[A-Za-z0-9_-]+/
            }, {
                cN: "selector-attr",
                b: /\[/,
                e: /\]/,
                i: "$"
            }, {
                cN: "selector-pseudo",
                b: /:(:)?[a-zA-Z0-9\_\-\+\(\)"'.]+/
            }, {
                b: "@(font-face|page)",
                l: "[a-z-]+",
                k: "font-face page"
            }, {
                b: "@",
                e: "[{;]",
                i: /:/,
                c: [{
                    cN: "keyword",
                    b: /\w+/
                }, {
                    b: /\s/,
                    eW: !0,
                    eE: !0,
                    r: 0,
                    c: [e.ASM, e.QSM, e.CSSNM]
                }]
            }, {
                cN: "selector-tag",
                b: "[a-zA-Z-][a-zA-Z0-9_-]*",
                r: 0
            }, {
                b: "{",
                e: "}",
                i: /\S/,
                c: [e.CBCM, t]
            }]
        }
    }), hljs.registerLanguage("javascript", function (e) {
        var t = "[A-Za-z$_][0-9A-Za-z$_]*",
            r = {
                keyword: "in of if for while finally var new function do return void else break catch instanceof with throw case default try this switch continue typeof delete let yield const export super debugger as async await static import from as",
                literal: "true false null undefined NaN Infinity",
                built_in: "eval isFinite isNaN parseFloat parseInt decodeURI decodeURIComponent encodeURI encodeURIComponent escape unescape Object Function Boolean Error EvalError InternalError RangeError ReferenceError StopIteration SyntaxError TypeError URIError Number Math Date String RegExp Array Float32Array Float64Array Int16Array Int32Array Int8Array Uint16Array Uint32Array Uint8Array Uint8ClampedArray ArrayBuffer DataView JSON Intl arguments require module console window document Symbol Set Map WeakSet WeakMap Proxy Reflect Promise"
            },
            a = {
                cN: "number",
                v: [{
                    b: "\\b(0[bB][01]+)"
                }, {
                    b: "\\b(0[oO][0-7]+)"
                }, {
                    b: e.CNR
                }],
                r: 0
            },
            o = {
                cN: "subst",
                b: "\\$\\{",
                e: "\\}",
                k: r,
                c: []
            },
            n = {
                cN: "string",
                b: "`",
                e: "`",
                c: [e.BE, o]
            };
        o.c = [e.ASM, e.QSM, n, a, e.RM];
        var i = o.c.concat([e.CBCM, e.CLCM]);
        return {
            aliases: ["js", "jsx"],
            k: r,
            c: [{
                cN: "meta",
                r: 10,
                b: /^\s*['"]use (strict|asm)['"]/
            }, {
                cN: "meta",
                b: /^#!/,
                e: /$/
            }, e.ASM, e.QSM, n, e.CLCM, e.CBCM, a, {
                b: /[{,]\s*/,
                r: 0,
                c: [{
                    b: t + "\\s*:",
                    rB: !0,
                    r: 0,
                    c: [{
                        cN: "attr",
                        b: t,
                        r: 0
                    }]
                }]
            }, {
                b: "(" + e.RSR + "|\\b(case|return|throw)\\b)\\s*",
                k: "return throw case",
                c: [e.CLCM, e.CBCM, e.RM, {
                    cN: "function",
                    b: "(\\(.*?\\)|" + t + ")\\s*=>",
                    rB: !0,
                    e: "\\s*=>",
                    c: [{
                        cN: "params",
                        v: [{
                            b: t
                        }, {
                            b: /\(\s*\)/
                        }, {
                            b: /\(/,
                            e: /\)/,
                            eB: !0,
                            eE: !0,
                            k: r,
                            c: i
                        }]
                    }]
                }, {
                    b: /</,
                    e: /(\/\w+|\w+\/)>/,
                    sL: "xml",
                    c: [{
                        b: /<\w+\s*\/>/,
                        skip: !0
                    }, {
                        b: /<\w+/,
                        e: /(\/\w+|\w+\/)>/,
                        skip: !0,
                        c: [{
                            b: /<\w+\s*\/>/,
                            skip: !0
                        }, "self"]
                    }]
                }],
                r: 0
            }, {
                cN: "function",
                bK: "function",
                e: /\{/,
                eE: !0,
                c: [e.inherit(e.TM, {
                    b: t
                }), {
                    cN: "params",
                    b: /\(/,
                    e: /\)/,
                    eB: !0,
                    eE: !0,
                    c: i
                }],
                i: /\[|%/
            }, {
                b: /\$[(.]/
            }, e.METHOD_GUARD, {
                cN: "class",
                bK: "class",
                e: /[{;=]/,
                eE: !0,
                i: /[:"\[\]]/,
                c: [{
                    bK: "extends"
                }, e.UTM]
            }, {
                bK: "constructor",
                e: /\{/,
                eE: !0
            }],
            i: /#(?!!)/
        }
    }), hljs.initHighlightingOnLoad();
var style = getComputedStyle(document.body),
    chartColors = ["#696ffb", "#7db8f9", "#05478f", "#00cccc", "#6CA5E0", "#1A76CA"],
    primaryColor = style.getPropertyValue("--primary"),
    secondaryColor = style.getPropertyValue("--secondary"),
    successColor = style.getPropertyValue("--success"),
    warningColor = style.getPropertyValue("--warning"),
    dangerColor = style.getPropertyValue("--danger"),
    infoColor = style.getPropertyValue("--info"),
    darkColor = style.getPropertyValue("--dark"),
    Body = $("body"),
    TemplateSidebar = $(".sidebar"),
    TemplateHeader = $(".t-header"),
    PageContentWrapper = $(".page-content-wrapper"),
    DesktopToggler = $(".t-header-desk-toggler"),
    MobileToggler = $(".t-header-mobile-toggler");
MobileToggler.on("click", function () {
    $(".page-body").toggleClass("sidebar-collpased")
});
var current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, "");

function purchaseBanner() {
    // "enabled" == (localStorage.getItem("bannerState") ? localStorage.getItem("bannerState") : "enabled") && ($("body").addClass("purchase-banner-active"), $("body").prepend('          <div class= "item-purchase-banner">            <p class="font-weight-medium banner-text">Upgrade to Premium For More Pro Features</p>              <a href = "http://www.uxcandy.co/product/label-pro-admin-template/" target = "_blank" class = "banner-button btn btn-primary btn-icon" >                 <i class="mdi mdi-cart mr-2"></i>Buy Now              </a>              <span class="toggler-close"><i class="mdi mdi-close"></i></span>          </div>        '), $(".item-purchase-banner .toggler-close").on("click", function () {
    //     $(".item-purchase-banner").slideUp(300), $("body").removeClass("purchase-banner-active"), localStorage.setItem("bannerState", "disabled")
    // }))
}

$(".navigation-menu li a", TemplateSidebar).each(function () {
    var e = $(this);
    "" === current ? -1 !== e.attr("href").indexOf("index.html") && ($(this).parents("li").last().addClass("active"), $(this).parents(".navigation-submenu").length && $(this).addClass("active")) : -1 !== e.attr("href").indexOf(current) && ($(this).parents("li").last().addClass("active"), $(this).parents(".navigation-submenu").length && $(this).addClass("active"), "index.html" !== current && ($(this).parents("li").last().find("a").attr("aria-expanded", "true"), $(this).parents(".navigation-submenu").length && $(this).closest(".collapse").addClass("show")))
}), $(".btn.btn-refresh").on("click", function () {
    $(this).addClass("clicked"), setTimeout(function () {
        $(".btn.btn-refresh").removeClass("clicked")
    }, 3e3)
}), $(".btn.btn-like").on("click", function () {
    $(this).toggleClass("clicked"), $(this).find("i").toggleClass("mdi-heart-outline clicked").toggleClass("mdi-heart")
}), purchaseBanner();
var currved = $(".curved-mode");
$(".curved-mode").length && (Chart.elements.Rectangle.prototype.draw = function () {
    var e, t, r, a, o, n, i, l = this._chart.ctx,
        s = this._view,
        c = s.borderWidth;
    if (i = s.horizontal ? (e = s.base, t = s.x, r = s.y - s.height / 2, a = s.y + s.height / 2, o = e < t ? 1 : -1, n = 1, s.borderSkipped || "left") : (e = s.x - s.width / 2, t = s.x + s.width / 2, o = 1, n = (r = s.y) < (a = s.base) ? 1 : -1, s.borderSkipped || "bottom"), c) {
        var d = Math.min(Math.abs(e - t), Math.abs(r - a)),
            b = (c = d < c ? d : c) / 2,
            u = e + ("left" !== i ? b * o : 0),
            p = t + ("right" !== i ? -b * o : 0),
            h = r + ("top" !== i ? b * n : 0),
            g = a + ("bottom" !== i ? -b * n : 0);
        u !== p && (r = h, a = g), h !== g && (e = u, t = p)
    }
    l.beginPath(), l.fillStyle = s.backgroundColor, l.strokeStyle = s.borderColor, l.lineWidth = c;
    var f = [
            [e, a],
            [e, r],
            [t, r],
            [t, a]
        ],
        m = ["bottom", "left", "top", "right"].indexOf(i, 0);

    function C(e) {
        return f[(m + e) % 4]
    } - 1 === m && (m = 0);
    var v = C(0);
    l.moveTo(v[0], v[1]);
    for (var w = 1; w < 4; w++) {
        var D;
        v = C(w), nextCornerId = w + 1, 4 == nextCornerId && (nextCornerId = 0), nextCorner = C(nextCornerId), width = f[2][0] - f[1][0], height = f[0][1] - f[1][1], x = f[1][0], y = f[1][1], (D = 20) > height / 2 && (D = height / 2), D > width / 2 && (D = width / 2), l.moveTo(x + D, y), l.lineTo(x + width - D, y), l.quadraticCurveTo(x + width, y, x + width, y + D), l.lineTo(x + width, y + height - D), l.quadraticCurveTo(x + width, y + height, x + width - D, y + height), l.lineTo(x + D, y + height), l.quadraticCurveTo(x, y + height, x, y + height - D), l.lineTo(x, y + D), l.quadraticCurveTo(x, y, x + D, y)
    }
    l.fill(), c && l.stroke()
}), $(function () {
    "use strict";
    if ($("#chartjs-staked-area-chart").length) {
        var e = {
                type: "line",
                data: {
                    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                    datasets: [{
                        label: "# of Votes",
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: chartColors[0],
                        borderColor: chartColors[0],
                        borderWidth: 1
                    }, {
                        label: "# of Points",
                        data: [7, 11, 5, 8, 3, 7],
                        borderColor: chartColors[1],
                        borderWidth: 1,
                        backgroundColor: chartColors[1]
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                reverse: !1
                            }
                        }]
                    },
                    legend: !1
                }
            },
            t = document.getElementById("chartjs-staked-area-chart").getContext("2d");
        new Chart(t, e)
    }
    if ($("#chartjs-staked-line-chart").length) {
        e = {
            type: "line",
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [{
                    label: "# of Votes",
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 2,
                    fill: !1,
                    backgroundColor: chartColors[0],
                    borderColor: chartColors[0],
                    borderWidth: 0
                }, {
                    label: "# of Points",
                    data: [7, 11, 5, 8, 3, 7],
                    borderWidth: 2,
                    fill: !1,
                    backgroundColor: chartColors[1],
                    borderColor: chartColors[1],
                    borderWidth: 0
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            reverse: !1
                        }
                    }]
                },
                fill: !1,
                legend: !1
            }
        }, t = document.getElementById("chartjs-staked-line-chart").getContext("2d");
        new Chart(t, e)
    }
    if ($("#chartjs-bar-chart").length) {
        var r = {
                labels: ["2013", "2014", "2014", "2015", "2016", "2017"],
                datasets: [{
                    label: "# of Votes",
                    data: [10, 19, 3, 5, 12, 3],
                    backgroundColor: chartColors,
                    borderColor: chartColors,
                    borderWidth: 0
                }]
            },
            a = $("#chartjs-bar-chart").get(0).getContext("2d");
        new Chart(a, {
            type: "bar",
            data: r,
            options: {
                legend: !1
            }
        })
    }
    if ($("#chartjs-staked-bar-chart").length) r = {
        labels: ["2013", "2014", "2014", "2015", "2016", "2017"],
        datasets: [{
            label: "Profit",
            data: [10, 19, 3, 5, 12, 3],
            backgroundColor: chartColors[0],
            borderColor: chartColors[0],
            borderWidth: 0
        }, {
            label: "Sales",
            data: [23, 12, 8, 13, 9, 17],
            backgroundColor: chartColors[1],
            borderColor: chartColors[1],
            borderWidth: 0
        }]
    }, a = $("#chartjs-staked-bar-chart").get(0).getContext("2d"), new Chart(a, {
        type: "bar",
        data: r,
        options: {
            tooltips: {
                mode: "index",
                intersect: !1
            },
            responsive: !0,
            scales: {
                xAxes: [{
                    stacked: !0
                }],
                yAxes: [{
                    stacked: !0
                }]
            },
            legend: !1
        }
    });
    if ($("#chartjs-radar-chart").length) {
        var o = document.getElementById("chartjs-radar-chart"),
            n = {
                labels: ["English", "Maths", "Physics", "Chemistry", "Biology", "History"],
                datasets: [{
                    label: "Student A",
                    data: [24, 55, 30, 56, 60, 68],
                    backgroundColor: chartColors[0],
                    borderColor: chartColors[0],
                    borderWidth: 0
                }, {
                    label: "Student B",
                    data: [54, 65, 60, 70, 70, 75],
                    backgroundColor: chartColors[1],
                    borderColor: chartColors[1],
                    borderWidth: 0
                }, {
                    label: "Student c",
                    data: [43, 13, 33, 57, 50, 75],
                    backgroundColor: chartColors[2],
                    borderColor: chartColors[2],
                    borderWidth: 0
                }]
            };
        new Chart(o, {
            type: "radar",
            data: n
        })
    }
    if ($("#chartjs-doughnut-chart").length) {
        var i = {
                datasets: [{
                    data: [30, 40, 30],
                    backgroundColor: chartColors,
                    borderColor: chartColors,
                    borderWidth: chartColors
                }],
                labels: ["Data 1", "Data 2", "Data 3"]
            },
            l = $("#chartjs-doughnut-chart").get(0).getContext("2d");
        new Chart(l, {
            type: "doughnut",
            data: i,
            options: {
                responsive: !0,
                animation: {
                    animateScale: !0,
                    animateRotate: !0
                }
            }
        })
    }
    if ($("#chartjs-pie-chart").length) {
        var s = {
                datasets: [{
                    data: [30, 40, 30],
                    backgroundColor: chartColors,
                    borderColor: chartColors,
                    borderWidth: chartColors
                }],
                labels: ["Data 1", "Data 2", "Data 3"]
            },
            c = $("#chartjs-pie-chart").get(0).getContext("2d");
        new Chart(c, {
            type: "pie",
            data: s,
            options: {
                responsive: !0,
                animation: {
                    animateScale: !0,
                    animateRotate: !0
                }
            }
        })
    }
});