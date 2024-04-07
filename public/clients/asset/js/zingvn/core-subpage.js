(function (a, b) {
    a.widget("ui.slidepanel", {options: {animation: true, actEvent: "click", handle: b, actPanel: 0, accordion: true, serialize: true, client_callback: b}, _create: function () {
        var c = this, d = c.options, e = c.element;
        this.handlers = jQuery(d.handle, e);
        this.activeHandler;
        this.activePanel;
        this.onAnimation = false;
        this.handlers.bind(d.actEvent, function () {
            if (!jQuery(this).hasClass("SlidePanelHandleActive")) {
                c.togglePanel(jQuery(this))
            } else {
                return true
            }
            return false
        });
        this.allActiveHandler = e.find("li.ActiveEvent").length;
        if (this.allActiveHandler > 0) {
            d.actPanel = e.find("li.ActiveEvent").eq(0).prevAll().length
        } else {
            if (this.allActiveHandler == 0) {
                d.actPanel = 0
            }
        }
        this.handlers.each(function (g) {
            var f = jQuery("#" + jQuery(this).attr("rel"));
            if (c.options.actPanel == g && f.length > 0) {
                c.togglePanel(jQuery(this))
            } else {
                f.addClass("SlidePanelHide")
            }
        })
    }, togglePanel: function (e) {
        var d = this;
        if (!d.onAnimation || !d.options.animation) {
            d.onAnimation = true;
            var c = jQuery("#" + e.attr("rel"));
            if (d.options.accordion) {
                if (d.activeHandler == b || d.activeHandler == null) {
                    d.activeHandler = e;
                    d.activeHandler.addClass("SlidePanelHandleActive");
                    d.activePanel = c;
                    d.slideDown(d.activePanel, d.options.client_callback)
                } else {
                    if (d.activeHandler.attr("rel") != e.attr("rel")) {
                        if (d.options.serialize) {
                            d.serializePanel(c, d.activePanel, 0.2, function () {
                                d.activeHandler.removeClass("SlidePanelHandleActive");
                                d.activeHandler = e;
                                d.activeHandler.addClass("SlidePanelHandleActive");
                                d.activePanel = c;
                                d.options.client_callback()
                            })
                        } else {
                            d.slideUp(d.activePanel, function () {
                                d.activeHandler.removeClass("SlidePanelHandleActive");
                                d.activeHandler = e;
                                d.activeHandler.addClass("SlidePanelHandleActive");
                                d.activePanel = c;
                                d.slideDown(d.activePanel, d.options.client_callback)
                            })
                        }
                    } else {
                        d.slideUp(d.activePanel, function () {
                            d.activeHandler.removeClass("SlidePanelHandleActive");
                            d.activeHandler = null;
                            d.activePanel = null
                        })
                    }
                }
            } else {
                if (!e.hasClass("SlidePanelHandleActive")) {
                    e.addClass("SlidePanelHandleActive");
                    d.slideDown(c)
                } else {
                    d.slideUp(c, function () {
                        e.removeClass("SlidePanelHandleActive")
                    })
                }
            }
        }
    }, slideUp: function (c, f) {
        var d = this;
        if (this.options.animation) {
            var e = null;
            e = c.find("> *").addClass("SlidePanelHide");
            c.animate({height: 0}, "fast", "linear", function () {
                if (f != b) {
                    f()
                }
                c.css({height: "auto"});
                c.addClass("SlidePanelHide");
                e.removeClass("SlidePanelHide");
                d.onAnimation = false
            })
        } else {
            c.addClass("SlidePanelHide");
            if (f != b) {
                f()
            }
        }
    }, slideDown: function (c, g) {
        var d = this;
        if (this.options.animation) {
            var e = 0;
            var f = null;
            c.removeClass("SlidePanelHide");
            f = c.find("> *");
            f.removeClass("SlidePanelHide");
            e = c.height();
            c.css({height: 0});
            f.addClass("SlidePanelHide");
            c.animate({height: e}, "fast", "linear", function () {
                if (g != b) {
                    g()
                }
                f.removeClass("SlidePanelHide");
                d.onAnimation = false
            })
        } else {
            c.removeClass("SlidePanelHide");
            if (g != b) {
                g()
            }
        }
    }, serializePanel: function (k, g, e, j) {
        var l = this;
        l.onAnimation = true;
        k.removeClass("SlidePanelHide");
        var h = k.height();
        k.css({height: 0});
        var i = g.height();
        var f = e;
        var d = new Date();
        var c = setInterval(function () {
            if (l.onAnimation) {
                var o = (new Date().getTime() - d) / (f * 1000);
                if (o > 1) {
                    clearInterval(c);
                    if (j != b) {
                        j()
                    }
                    g.addClass("SlidePanelHide");
                    k.css({height: h + "px"});
                    k.animate({opacity: 1}, "fast", "swing");
                    g.css({height: "auto"});
                    l.onAnimation = false
                } else {
                    var n = h * o < h ? h * o : h;
                    var m = i * (1 - o) > 0 ? i * (1 - o) : 0;
                    k.css({height: n + "px"});
                    g.css({height: m + "px"})
                }
            }
        }, 13)
    }})
})(jQuery);
/*!
 * jCarousel - Riding carousels with jQuery
 *   http://sorgalla.com/jcarousel/
 *
 * Copyright (c) 2006 Jan Sorgalla (http://sorgalla.com)
 * Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 * and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
 *
 * Built on top of the jQuery library
 *   http://jquery.com
 *
 * Inspired by the "Carousel Component" by Bill Scott
 *   http://billwscott.com/carousel/
 */
(function (c) {
    var d = {vertical: false, rtl: false, start: 1, offset: 1, size: null, scroll: 3, visible: null, animation: "normal", easing: "swing", auto: 0, wrap: null, initCallback: null, setupCallback: null, reloadCallback: null, itemLoadCallback: null, itemFirstInCallback: null, itemFirstOutCallback: null, itemLastInCallback: null, itemLastOutCallback: null, itemVisibleInCallback: null, itemVisibleOutCallback: null, animationStepCallback: null, buttonNextHTML: "<div></div>", buttonPrevHTML: "<div></div>", buttonNextEvent: "click", buttonPrevEvent: "click", buttonNextCallback: null, buttonPrevCallback: null, itemFallbackDimension: null}, b = false;
    c(window).bind("load.jcarousel", function () {
        b = true
    });
    c.jcarousel = function (l, g) {
        this.options = c.extend({}, d, g || {});
        this.locked = false;
        this.autoStopped = false;
        this.container = null;
        this.clip = null;
        this.list = null;
        this.buttonNext = null;
        this.buttonPrev = null;
        this.buttonNextState = null;
        this.buttonPrevState = null;
        if (!g || g.rtl === undefined) {
            this.options.rtl = (c(l).attr("dir") || c("html").attr("dir") || "").toLowerCase() == "rtl"
        }
        this.wh = !this.options.vertical ? "width" : "height";
        this.lt = !this.options.vertical ? (this.options.rtl ? "right" : "left") : "top";
        var q = "", n = l.className.split(" ");
        for (var k = 0; k < n.length; k++) {
            if (n[k].indexOf("jcarousel-skin") != -1) {
                c(l).removeClass(n[k]);
                q = n[k];
                break
            }
        }
        if (l.nodeName.toUpperCase() == "UL" || l.nodeName.toUpperCase() == "OL") {
            this.list = c(l);
            this.clip = this.list.parents(".jcarousel-clip");
            this.container = this.list.parents(".jcarousel-container")
        } else {
            this.container = c(l);
            this.list = this.container.find("ul,ol").eq(0);
            this.clip = this.container.find(".jcarousel-clip")
        }
        if (this.clip.size() === 0) {
            this.clip = this.list.wrap("<div></div>").parent()
        }
        if (this.container.size() === 0) {
            this.container = this.clip.wrap("<div></div>").parent()
        }
        if (q !== "" && this.container.parent()[0].className.indexOf("jcarousel-skin") == -1) {
            this.container.wrap('<div class=" ' + q + '"></div>')
        }
        this.buttonPrev = c(".jcarousel-prev", this.container);
        if (this.buttonPrev.size() === 0 && this.options.buttonPrevHTML !== null) {
            this.buttonPrev = c(this.options.buttonPrevHTML).appendTo(this.container)
        }
        this.buttonPrev.addClass(this.className("jcarousel-prev"));
        this.buttonNext = c(".jcarousel-next", this.container);
        if (this.buttonNext.size() === 0 && this.options.buttonNextHTML !== null) {
            this.buttonNext = c(this.options.buttonNextHTML).appendTo(this.container)
        }
        this.buttonNext.addClass(this.className("jcarousel-next"));
        this.clip.addClass(this.className("jcarousel-clip")).css({position: "relative"});
        this.list.addClass(this.className("jcarousel-list")).css({overflow: "hidden", position: "relative", top: 0, margin: 0, padding: 0}).css((this.options.rtl ? "right" : "left"), 0);
        this.container.addClass(this.className("jcarousel-container")).css({position: "relative"});
        if (!this.options.vertical && this.options.rtl) {
            this.container.addClass("jcarousel-direction-rtl").attr("dir", "rtl")
        }
        var m = this.options.visible !== null ? Math.ceil(this.clipping() / this.options.visible) : null;
        var p = this.list.children("li");
        var r = this;
        if (p.size() > 0) {
            var f = 0, h = this.options.offset;
            p.each(function () {
                r.format(this, h++);
                f += r.dimension(this, m)
            });
            this.list.css(this.wh, (f + 100) + "px");
            if (!g || g.size === undefined) {
                this.options.size = p.size()
            }
        }
        this.container.css("display", "block");
        this.buttonNext.css("display", "block");
        this.buttonPrev.css("display", "block");
        this.funcNext = function () {
            r.next()
        };
        this.funcPrev = function () {
            r.prev()
        };
        this.funcResize = function () {
            if (r.resizeTimer) {
                clearTimeout(r.resizeTimer)
            }
            r.resizeTimer = setTimeout(function () {
                r.reload()
            }, 100)
        };
        if (this.options.initCallback !== null) {
            this.options.initCallback(this, "init")
        }
        if (!b && c.browser.safari) {
            this.buttons(false, false);
            c(window).bind("load.jcarousel", function () {
                r.setup()
            })
        } else {
            this.setup()
        }
    };
    var a = c.jcarousel;
    a.fn = a.prototype = {jcarousel: "0.2.8"};
    a.fn.extend = a.extend = c.extend;
    a.fn.extend({setup: function () {
        this.first = null;
        this.last = null;
        this.prevFirst = null;
        this.prevLast = null;
        this.animating = false;
        this.timer = null;
        this.resizeTimer = null;
        this.tail = null;
        this.inTail = false;
        if (this.locked) {
            return
        }
        this.list.css(this.lt, this.pos(this.options.offset) + "px");
        var e = this.pos(this.options.start, true);
        this.prevFirst = this.prevLast = null;
        this.animate(e, false);
        c(window).unbind("resize.jcarousel", this.funcResize).bind("resize.jcarousel", this.funcResize);
        if (this.options.setupCallback !== null) {
            this.options.setupCallback(this)
        }
    }, reset: function () {
        this.list.empty();
        this.list.css(this.lt, "0px");
        this.list.css(this.wh, "10px");
        if (this.options.initCallback !== null) {
            this.options.initCallback(this, "reset")
        }
        this.setup()
    }, reload: function () {
        if (this.tail !== null && this.inTail) {
            this.list.css(this.lt, a.intval(this.list.css(this.lt)) + this.tail)
        }
        this.tail = null;
        this.inTail = false;
        if (this.options.reloadCallback !== null) {
            this.options.reloadCallback(this)
        }
        if (this.options.visible !== null) {
            var g = this;
            var h = Math.ceil(this.clipping() / this.options.visible), f = 0, e = 0;
            this.list.children("li").each(function (j) {
                f += g.dimension(this, h);
                if (j + 1 < g.first) {
                    e = f
                }
            });
            this.list.css(this.wh, f + "px");
            this.list.css(this.lt, -e + "px")
        }
        this.scroll(this.first, false)
    }, lock: function () {
        this.locked = true;
        this.buttons()
    }, unlock: function () {
        this.locked = false;
        this.buttons()
    }, size: function (e) {
        if (e !== undefined) {
            this.options.size = e;
            if (!this.locked) {
                this.buttons()
            }
        }
        return this.options.size
    }, has: function (g, h) {
        if (h === undefined || !h) {
            h = g
        }
        if (this.options.size !== null && h > this.options.size) {
            h = this.options.size
        }
        for (var f = g; f <= h; f++) {
            var k = this.get(f);
            if (!k.length || k.hasClass("jcarousel-item-placeholder")) {
                return false
            }
        }
        return true
    }, get: function (e) {
        return c(">.jcarousel-item-" + e, this.list)
    }, add: function (l, q) {
        var m = this.get(l), h = 0, g = c(q);
        if (m.length === 0) {
            var p, k = a.intval(l);
            m = this.create(l);
            while (true) {
                p = this.get(--k);
                if (k <= 0 || p.length) {
                    if (k <= 0) {
                        this.list.prepend(m)
                    } else {
                        p.after(m)
                    }
                    break
                }
            }
        } else {
            h = this.dimension(m)
        }
        if (g.get(0).nodeName.toUpperCase() == "LI") {
            m.replaceWith(g);
            m = g
        } else {
            m.empty().append(q)
        }
        this.format(m.removeClass(this.className("jcarousel-item-placeholder")), l);
        var o = this.options.visible !== null ? Math.ceil(this.clipping() / this.options.visible) : null;
        var f = this.dimension(m, o) - h;
        if (l > 0 && l < this.first) {
            this.list.css(this.lt, a.intval(this.list.css(this.lt)) - f + "px")
        }
        this.list.css(this.wh, a.intval(this.list.css(this.wh)) + f + "px");
        return m
    }, remove: function (f) {
        var g = this.get(f);
        if (!g.length || (f >= this.first && f <= this.last)) {
            return
        }
        var h = this.dimension(g);
        if (f < this.first) {
            this.list.css(this.lt, a.intval(this.list.css(this.lt)) + h + "px")
        }
        g.remove();
        this.list.css(this.wh, a.intval(this.list.css(this.wh)) - h + "px")
    }, next: function () {
        if (this.tail !== null && !this.inTail) {
            this.scrollTail(false)
        } else {
            this.scroll(((this.options.wrap == "both" || this.options.wrap == "last") && this.options.size !== null && this.last == this.options.size) ? 1 : this.first + this.options.scroll)
        }
    }, prev: function () {
        if (this.tail !== null && this.inTail) {
            this.scrollTail(true)
        } else {
            this.scroll(((this.options.wrap == "both" || this.options.wrap == "first") && this.options.size !== null && this.first == 1) ? this.options.size : this.first - this.options.scroll)
        }
    }, scrollTail: function (e) {
        if (this.locked || this.animating || !this.tail) {
            return
        }
        this.pauseAuto();
        var f = a.intval(this.list.css(this.lt));
        f = !e ? f - this.tail : f + this.tail;
        this.inTail = !e;
        this.prevFirst = this.first;
        this.prevLast = this.last;
        this.animate(f)
    }, scroll: function (f, e) {
        if (this.locked || this.animating) {
            return
        }
        this.pauseAuto();
        this.animate(this.pos(f), e)
    }, pos: function (C, k) {
        var n = a.intval(this.list.css(this.lt));
        if (this.locked || this.animating) {
            return n
        }
        if (this.options.wrap != "circular") {
            C = C < 1 ? 1 : (this.options.size && C > this.options.size ? this.options.size : C)
        }
        var z = this.first > C;
        var E = this.options.wrap != "circular" && this.first <= 1 ? 1 : this.first;
        var H = z ? this.get(E) : this.get(this.last);
        var B = z ? E : E - 1;
        var F = null, A = 0, w = false, G = 0, D;
        while (z ? --B >= C : ++B < C) {
            F = this.get(B);
            w = !F.length;
            if (F.length === 0) {
                F = this.create(B).addClass(this.className("jcarousel-item-placeholder"));
                H[z ? "before" : "after"](F);
                if (this.first !== null && this.options.wrap == "circular" && this.options.size !== null && (B <= 0 || B > this.options.size)) {
                    D = this.get(this.index(B));
                    if (D.length) {
                        F = this.add(B, D.clone(true))
                    }
                }
            }
            H = F;
            G = this.dimension(F);
            if (w) {
                A += G
            }
            if (this.first !== null && (this.options.wrap == "circular" || (B >= 1 && (this.options.size === null || B <= this.options.size)))) {
                n = z ? n + G : n - G
            }
        }
        var s = this.clipping(), u = [], h = 0, t = 0;
        H = this.get(C - 1);
        B = C;
        while (++h) {
            F = this.get(B);
            w = !F.length;
            if (F.length === 0) {
                F = this.create(B).addClass(this.className("jcarousel-item-placeholder"));
                if (H.length === 0) {
                    this.list.prepend(F)
                } else {
                    H[z ? "before" : "after"](F)
                }
                if (this.first !== null && this.options.wrap == "circular" && this.options.size !== null && (B <= 0 || B > this.options.size)) {
                    D = this.get(this.index(B));
                    if (D.length) {
                        F = this.add(B, D.clone(true))
                    }
                }
            }
            H = F;
            G = this.dimension(F);
            if (G === 0) {
                throw new Error("jCarousel: No width/height set for items. This will cause an infinite loop. Aborting...")
            }
            if (this.options.wrap != "circular" && this.options.size !== null && B > this.options.size) {
                u.push(F)
            } else {
                if (w) {
                    A += G
                }
            }
            t += G;
            if (t >= s) {
                break
            }
            B++
        }
        for (var r = 0; r < u.length; r++) {
            u[r].remove()
        }
        if (A > 0) {
            this.list.css(this.wh, this.dimension(this.list) + A + "px");
            if (z) {
                n -= A;
                this.list.css(this.lt, a.intval(this.list.css(this.lt)) - A + "px")
            }
        }
        var q = C + h - 1;
        if (this.options.wrap != "circular" && this.options.size && q > this.options.size) {
            q = this.options.size
        }
        if (B > q) {
            h = 0;
            B = q;
            t = 0;
            while (++h) {
                F = this.get(B--);
                if (!F.length) {
                    break
                }
                t += this.dimension(F);
                if (t >= s) {
                    break
                }
            }
        }
        var o = q - h + 1;
        if (this.options.wrap != "circular" && o < 1) {
            o = 1
        }
        if (this.inTail && z) {
            n += this.tail;
            this.inTail = false
        }
        this.tail = null;
        if (this.options.wrap != "circular" && q == this.options.size && (q - h + 1) >= 1) {
            var y = a.intval(this.get(q).css(!this.options.vertical ? "marginRight" : "marginBottom"));
            if ((t - y) > s) {
                this.tail = t - s - y
            }
        }
        if (k && C === this.options.size && this.tail) {
            n -= this.tail;
            this.inTail = true
        }
        while (C-- > o) {
            n += this.dimension(this.get(C))
        }
        this.prevFirst = this.first;
        this.prevLast = this.last;
        this.first = o;
        this.last = q;
        return n
    }, animate: function (i, e) {
        if (this.locked || this.animating) {
            return
        }
        this.animating = true;
        var f = this;
        var g = function () {
            f.animating = false;
            if (i === 0) {
                f.list.css(f.lt, 0)
            }
            if (!f.autoStopped && (f.options.wrap == "circular" || f.options.wrap == "both" || f.options.wrap == "last" || f.options.size === null || f.last < f.options.size || (f.last == f.options.size && f.tail !== null && !f.inTail))) {
                f.startAuto()
            }
            f.buttons();
            f.notify("onAfterAnimation");
            if (f.options.wrap == "circular" && f.options.size !== null) {
                for (var k = f.prevFirst; k <= f.prevLast; k++) {
                    if (k !== null && !(k >= f.first && k <= f.last) && (k < 1 || k > f.options.size)) {
                        f.remove(k)
                    }
                }
            }
        };
        this.notify("onBeforeAnimation");
        if (!this.options.animation || e === false) {
            this.list.css(this.lt, i + "px");
            g()
        } else {
            var j = !this.options.vertical ? (this.options.rtl ? {right: i} : {left: i}) : {top: i};
            var h = {duration: this.options.animation, easing: this.options.easing, complete: g};
            if (c.isFunction(this.options.animationStepCallback)) {
                h.step = this.options.animationStepCallback
            }
            this.list.animate(j, h)
        }
    }, startAuto: function (f) {
        if (f !== undefined) {
            this.options.auto = f
        }
        if (this.options.auto === 0) {
            return this.stopAuto()
        }
        if (this.timer !== null) {
            return
        }
        this.autoStopped = false;
        var e = this;
        this.timer = window.setTimeout(function () {
            e.next()
        }, this.options.auto * 1000)
    }, stopAuto: function () {
        this.pauseAuto();
        this.autoStopped = true
    }, pauseAuto: function () {
        if (this.timer === null) {
            return
        }
        window.clearTimeout(this.timer);
        this.timer = null
    }, buttons: function (g, f) {
        if (g == null) {
            g = !this.locked && this.options.size !== 0 && ((this.options.wrap && this.options.wrap != "first") || this.options.size === null || this.last < this.options.size);
            if (!this.locked && (!this.options.wrap || this.options.wrap == "first") && this.options.size !== null && this.last >= this.options.size) {
                g = this.tail !== null && !this.inTail
            }
        }
        if (f == null) {
            f = !this.locked && this.options.size !== 0 && ((this.options.wrap && this.options.wrap != "last") || this.first > 1);
            if (!this.locked && (!this.options.wrap || this.options.wrap == "last") && this.options.size !== null && this.first == 1) {
                f = this.tail !== null && this.inTail
            }
        }
        var e = this;
        if (this.buttonNext.size() > 0) {
            this.buttonNext.unbind(this.options.buttonNextEvent + ".jcarousel", this.funcNext);
            if (g) {
                this.buttonNext.bind(this.options.buttonNextEvent + ".jcarousel", this.funcNext)
            }
            this.buttonNext[g ? "removeClass" : "addClass"](this.className("jcarousel-next-disabled")).attr("disabled", g ? false : true);
            if (this.options.buttonNextCallback !== null && this.buttonNext.data("jcarouselstate") != g) {
                this.buttonNext.each(function () {
                    e.options.buttonNextCallback(e, this, g)
                }).data("jcarouselstate", g)
            }
        } else {
            if (this.options.buttonNextCallback !== null && this.buttonNextState != g) {
                this.options.buttonNextCallback(e, null, g)
            }
        }
        if (this.buttonPrev.size() > 0) {
            this.buttonPrev.unbind(this.options.buttonPrevEvent + ".jcarousel", this.funcPrev);
            if (f) {
                this.buttonPrev.bind(this.options.buttonPrevEvent + ".jcarousel", this.funcPrev)
            }
            this.buttonPrev[f ? "removeClass" : "addClass"](this.className("jcarousel-prev-disabled")).attr("disabled", f ? false : true);
            if (this.options.buttonPrevCallback !== null && this.buttonPrev.data("jcarouselstate") != f) {
                this.buttonPrev.each(function () {
                    e.options.buttonPrevCallback(e, this, f)
                }).data("jcarouselstate", f)
            }
        } else {
            if (this.options.buttonPrevCallback !== null && this.buttonPrevState != f) {
                this.options.buttonPrevCallback(e, null, f)
            }
        }
        this.buttonNextState = g;
        this.buttonPrevState = f
    }, notify: function (e) {
        var f = this.prevFirst === null ? "init" : (this.prevFirst < this.first ? "next" : "prev");
        this.callback("itemLoadCallback", e, f);
        if (this.prevFirst !== this.first) {
            this.callback("itemFirstInCallback", e, f, this.first);
            this.callback("itemFirstOutCallback", e, f, this.prevFirst)
        }
        if (this.prevLast !== this.last) {
            this.callback("itemLastInCallback", e, f, this.last);
            this.callback("itemLastOutCallback", e, f, this.prevLast)
        }
        this.callback("itemVisibleInCallback", e, f, this.first, this.last, this.prevFirst, this.prevLast);
        this.callback("itemVisibleOutCallback", e, f, this.prevFirst, this.prevLast, this.first, this.last)
    }, callback: function (j, m, e, k, h, g, f) {
        if (this.options[j] == null || (typeof this.options[j] != "object" && m != "onAfterAnimation")) {
            return
        }
        var n = typeof this.options[j] == "object" ? this.options[j][m] : this.options[j];
        if (!c.isFunction(n)) {
            return
        }
        var o = this;
        if (k === undefined) {
            n(o, e, m)
        } else {
            if (h === undefined) {
                this.get(k).each(function () {
                    n(o, this, k, e, m)
                })
            } else {
                var p = function (q) {
                    o.get(q).each(function () {
                        n(o, this, q, e, m)
                    })
                };
                for (var l = k; l <= h; l++) {
                    if (l !== null && !(l >= g && l <= f)) {
                        p(l)
                    }
                }
            }
        }
    }, create: function (e) {
        return this.format("<li></li>", e)
    }, format: function (k, h) {
        k = c(k);
        var g = k.get(0).className.split(" ");
        for (var f = 0; f < g.length; f++) {
            if (g[f].indexOf("jcarousel-") != -1) {
                k.removeClass(g[f])
            }
        }
        k.addClass(this.className("jcarousel-item")).addClass(this.className("jcarousel-item-" + h)).css({"float": (this.options.rtl ? "right" : "left"), "list-style": "none"}).attr("jcarouselindex", h);
        return k
    }, className: function (e) {
        return e + " " + e + (!this.options.vertical ? "-horizontal" : "-vertical")
    }, dimension: function (h, i) {
        var g = c(h);
        if (i == null) {
            return !this.options.vertical ? (g.outerWidth(true) || a.intval(this.options.itemFallbackDimension)) : (g.outerHeight(true) || a.intval(this.options.itemFallbackDimension))
        } else {
            var f = !this.options.vertical ? i - a.intval(g.css("marginLeft")) - a.intval(g.css("marginRight")) : i - a.intval(g.css("marginTop")) - a.intval(g.css("marginBottom"));
            c(g).css(this.wh, f + "px");
            return this.dimension(g)
        }
    }, clipping: function () {
        return !this.options.vertical ? this.clip[0].offsetWidth - a.intval(this.clip.css("borderLeftWidth")) - a.intval(this.clip.css("borderRightWidth")) : this.clip[0].offsetHeight - a.intval(this.clip.css("borderTopWidth")) - a.intval(this.clip.css("borderBottomWidth"))
    }, index: function (e, f) {
        if (f == null) {
            f = this.options.size
        }
        return Math.round((((e - 1) / f) - Math.floor((e - 1) / f)) * f) + 1
    }});
    a.extend({defaults: function (e) {
        return c.extend(d, e || {})
    }, intval: function (e) {
        e = parseInt(e, 10);
        return isNaN(e) ? 0 : e
    }, windowLoaded: function () {
        b = true
    }});
    c.fn.jcarousel = function (g) {
        if (typeof g == "string") {
            var e = c(this).data("jcarousel"), f = Array.prototype.slice.call(arguments, 1);
            return e[g].apply(e, f)
        } else {
            return this.each(function () {
                var h = c(this).data("jcarousel");
                if (h) {
                    if (g) {
                        c.extend(h.options, g)
                    }
                    h.reload()
                } else {
                    c(this).data("jcarousel", new a(this, g))
                }
            })
        }
    }
})(jQuery);
(function (d, e, f) {
    d.fn.jScrollPane = function (a) {
        function b(br, bb) {
            var bk, a9 = this, a1, bF, aK, bD, a6, a0, s, aO, bi, bS, bs, aW, bh, aX, aV, bO, a5, bz, a2, aM, bw, by, bJ, bC, bl, aT, bu, bm, aI, bq, bP, aZ, be, bG = true, ba = true, bQ = false, aU = false, bA = br.clone(false, false).empty(), bM = d.fn.mwheelIntent ? "mwheelIntent.jsp" : "mousewheel.jsp";
            bP = br.css("paddingTop") + " " + br.css("paddingRight") + " " + br.css("paddingBottom") + " " + br.css("paddingLeft");
            aZ = (parseInt(br.css("paddingLeft"), 10) || 0) + (parseInt(br.css("paddingRight"), 10) || 0);
            function bx(i) {
                var n, l, m, g, h, j, k = false, o = false;
                bk = i;
                if (a1 === f) {
                    h = br.scrollTop();
                    j = br.scrollLeft();
                    br.css({overflow: "hidden", padding: 0});
                    bF = br.innerWidth() + aZ;
                    aK = br.innerHeight();
                    br.width(bF);
                    a1 = d('<div class="jspPane" />').css("padding", bP).append(br.children());
                    bD = d('<div class="jspContainer" />').css({width: bF + "px", height: aK + "px"}).append(a1).appendTo(br)
                } else {
                    br.css("width", "");
                    k = bk.stickToBottom && bf();
                    o = bk.stickToRight && bv();
                    g = br.innerWidth() + aZ != bF || br.outerHeight() != aK;
                    if (g) {
                        bF = br.innerWidth() + aZ;
                        aK = br.innerHeight();
                        bD.css({width: bF + "px", height: aK + "px"})
                    }
                    if (!g && be == a6 && a1.outerHeight() == a0) {
                        br.width(bF);
                        return
                    }
                    be = a6;
                    a1.css("width", "");
                    br.width(bF);
                    bD.find(">.jspVerticalBar,>.jspHorizontalBar").remove().end()
                }
                a1.css("overflow", "auto");
                if (i.contentWidth) {
                    a6 = i.contentWidth
                } else {
                    a6 = a1[0].scrollWidth
                }
                a0 = a1[0].scrollHeight;
                a1.css("overflow", "");
                s = a6 / bF;
                aO = a0 / aK;
                bi = aO > 1;
                bS = s > 1;
                if (!(bS || bi)) {
                    br.removeClass("jspScrollable");
                    a1.css({top: 0, width: bD.width() - aZ});
                    aR();
                    bp();
                    a8();
                    aJ()
                } else {
                    br.addClass("jspScrollable");
                    n = bk.maintainPosition && (bh || bO);
                    if (n) {
                        l = bU();
                        m = bW()
                    }
                    bR();
                    c();
                    bn();
                    if (n) {
                        bc(o ? (a6 - bF) : l, false);
                        bd(k ? (a0 - aK) : m, false)
                    }
                    bg();
                    bI();
                    bB();
                    if (bk.enableKeyboardNavigation) {
                        a7()
                    }
                    if (bk.clickOnTrack) {
                        aP()
                    }
                    bt();
                    if (bk.hijackInternalLinks) {
                        aS()
                    }
                }
                if (bk.autoReinitialise && !bq) {
                    bq = setInterval(function () {
                        bx(bk)
                    }, bk.autoReinitialiseDelay)
                } else {
                    if (!bk.autoReinitialise && bq) {
                        clearInterval(bq)
                    }
                }
                h && br.scrollTop(0) && bd(h, false);
                j && br.scrollLeft(0) && bc(j, false);
                br.trigger("jsp-initialised", [bS || bi])
            }

            function bR() {
                if (bi) {
                    bD.append(d('<div class="jspVerticalBar" />').append(d('<div class="jspCap jspCapTop" />'), d('<div class="jspTrack" />').append(d('<div class="jspDrag" />').append(d('<div class="jspDragTop" />'), d('<div class="jspDragBottom" />'))), d('<div class="jspCap jspCapBottom" />')));
                    a5 = bD.find(">.jspVerticalBar");
                    bz = a5.find(">.jspTrack");
                    bs = bz.find(">.jspDrag");
                    if (bk.showArrows) {
                        by = d('<a class="jspArrow jspArrowUp" />').bind("mousedown.html", bT(0, -1)).bind("click.html", bV);
                        bJ = d('<a class="jspArrow jspArrowDown" />').bind("mousedown.html", bT(0, 1)).bind("click.html", bV);
                        if (bk.arrowScrollOnHover) {
                            by.bind("mouseover.html", bT(0, -1, by));
                            bJ.bind("mouseover.html", bT(0, 1, bJ))
                        }
                        bE(bz, bk.verticalArrowPositions, by, bJ)
                    }
                    aM = aK;
                    bD.find(">.jspVerticalBar>.jspCap:visible,>.jspVerticalBar>.jspArrow").each(function () {
                        aM -= d(this).outerHeight()
                    });
                    bs.hover(function () {
                        bs.addClass("jspHover")
                    },function () {
                        bs.removeClass("jspHover")
                    }).bind("mousedown.html", function (h) {
                        d("html").bind("dragstart.jsp%20selectstart.html", bV);
                        bs.addClass("jspActive");
                        var g = h.pageY - bs.position().top;
                        d("html").bind("mousemove.html",function (i) {
                            a4(i.pageY - g, false)
                        }).bind("mouseup.jsp%20mouseleave.html", bo);
                        return false
                    });
                    aQ()
                }
            }

            function aQ() {
                bz.height(aM + "px");
                bh = 0;
                a2 = bk.verticalGutter + bz.outerWidth();
                a1.width(bF - a2 - aZ);
                try {
                    if (a5.position().left === 0) {
                        a1.css("margin-left", a2 + "px")
                    }
                } catch (g) {
                }
            }

            function c() {
                if (bS) {
                    bD.append(d('<div class="jspHorizontalBar" />').append(d('<div class="jspCap jspCapLeft" />'), d('<div class="jspTrack" />').append(d('<div class="jspDrag" />').append(d('<div class="jspDragLeft" />'), d('<div class="jspDragRight" />'))), d('<div class="jspCap jspCapRight" />')));
                    bC = bD.find(">.jspHorizontalBar");
                    bl = bC.find(">.jspTrack");
                    aX = bl.find(">.jspDrag");
                    if (bk.showArrows) {
                        bm = d('<a class="jspArrow jspArrowLeft" />').bind("mousedown.html", bT(-1, 0)).bind("click.html", bV);
                        aI = d('<a class="jspArrow jspArrowRight" />').bind("mousedown.html", bT(1, 0)).bind("click.html", bV);
                        if (bk.arrowScrollOnHover) {
                            bm.bind("mouseover.html", bT(-1, 0, bm));
                            aI.bind("mouseover.html", bT(1, 0, aI))
                        }
                        bE(bl, bk.horizontalArrowPositions, bm, aI)
                    }
                    aX.hover(function () {
                        aX.addClass("jspHover")
                    },function () {
                        aX.removeClass("jspHover")
                    }).bind("mousedown.html", function (h) {
                        d("html").bind("dragstart.jsp%20selectstart.html", bV);
                        aX.addClass("jspActive");
                        var g = h.pageX - aX.position().left;
                        d("html").bind("mousemove.html",function (i) {
                            a3(i.pageX - g, false)
                        }).bind("mouseup.jsp%20mouseleave.html", bo);
                        return false
                    });
                    aT = bD.innerWidth();
                    bH()
                }
            }

            function bH() {
                bD.find(">.jspHorizontalBar>.jspCap:visible,>.jspHorizontalBar>.jspArrow").each(function () {
                    aT -= d(this).outerWidth()
                });
                bl.width(aT + "px");
                bO = 0
            }

            function bn() {
                if (bS && bi) {
                    var h = bl.outerHeight(), g = bz.outerWidth();
                    aM -= h;
                    d(bC).find(">.jspCap:visible,>.jspArrow").each(function () {
                        aT += d(this).outerWidth()
                    });
                    aT -= g;
                    aK -= g;
                    bF -= h;
                    bl.parent().append(d('<div class="jspCorner" />').css("width", h + "px"));
                    aQ();
                    bH()
                }
                if (bS) {
                    a1.width((bD.outerWidth() - aZ) + "px")
                }
                a0 = a1.outerHeight();
                aO = a0 / aK;
                if (bS) {
                    bu = Math.ceil(1 / s * aT);
                    if (bu > bk.horizontalDragMaxWidth) {
                        bu = bk.horizontalDragMaxWidth
                    } else {
                        if (bu < bk.horizontalDragMinWidth) {
                            bu = bk.horizontalDragMinWidth
                        }
                    }
                    aX.width(bu + "px");
                    aV = aT - bu;
                    bK(bO)
                }
                if (bi) {
                    bw = Math.ceil(1 / aO * aM);
                    if (bw > bk.verticalDragMaxHeight) {
                        bw = bk.verticalDragMaxHeight
                    } else {
                        if (bw < bk.verticalDragMinHeight) {
                            bw = bk.verticalDragMinHeight
                        }
                    }
                    bs.height(bw + "px");
                    aW = aM - bw;
                    bL(bh)
                }
            }

            function bE(l, j, m, h) {
                var g = "before", k = "after", i;
                if (j == "os") {
                    j = /Mac/.test(navigator.platform) ? "after" : "split"
                }
                if (j == g) {
                    k = j
                } else {
                    if (j == k) {
                        g = j;
                        i = m;
                        m = h;
                        h = i
                    }
                }
                l[g](m)[k](h)
            }

            function bT(i, g, h) {
                return function () {
                    bj(i, g, this, h);
                    this.blur();
                    return false
                }
            }

            function bj(k, l, g, i) {
                g = d(g).addClass("jspActive");
                var j, m, n = true, h = function () {
                    if (k !== 0) {
                        a9.scrollByX(k * bk.arrowButtonSpeed)
                    }
                    if (l !== 0) {
                        a9.scrollByY(l * bk.arrowButtonSpeed)
                    }
                    m = setTimeout(h, n ? bk.initialDelay : bk.arrowRepeatFreq);
                    n = false
                };
                h();
                j = i ? "mouseout.jsp" : "mouseup.jsp";
                i = i || d("html");
                i.bind(j, function () {
                    g.removeClass("jspActive");
                    m && clearTimeout(m);
                    m = null;
                    i.unbind(j)
                })
            }

            function aP() {
                aJ();
                if (bi) {
                    bz.bind("mousedown.html", function (i) {
                        if (i.originalTarget === f || i.originalTarget == i.currentTarget) {
                            var k = d(this), g = k.offset(), j = i.pageY - g.top - bh, m, n = true, h = function () {
                                var p = k.offset(), o = i.pageY - p.top - bw / 2, r = aK * bk.scrollPagePercent, q = aW * r / (a0 - aK);
                                if (j < 0) {
                                    if (bh - q > o) {
                                        a9.scrollByY(-r)
                                    } else {
                                        a4(o)
                                    }
                                } else {
                                    if (j > 0) {
                                        if (bh + q < o) {
                                            a9.scrollByY(r)
                                        } else {
                                            a4(o)
                                        }
                                    } else {
                                        l();
                                        return
                                    }
                                }
                                m = setTimeout(h, n ? bk.initialDelay : bk.trackClickRepeatFreq);
                                n = false
                            }, l = function () {
                                m && clearTimeout(m);
                                m = null;
                                d(document).unbind("mouseup.html", l)
                            };
                            h();
                            d(document).bind("mouseup.html", l);
                            return false
                        }
                    })
                }
                if (bS) {
                    bl.bind("mousedown.html", function (i) {
                        if (i.originalTarget === f || i.originalTarget == i.currentTarget) {
                            var k = d(this), g = k.offset(), j = i.pageX - g.left - bO, m, n = true, h = function () {
                                var p = k.offset(), o = i.pageX - p.left - bu / 2, r = bF * bk.scrollPagePercent, q = aV * r / (a6 - bF);
                                if (j < 0) {
                                    if (bO - q > o) {
                                        a9.scrollByX(-r)
                                    } else {
                                        a3(o)
                                    }
                                } else {
                                    if (j > 0) {
                                        if (bO + q < o) {
                                            a9.scrollByX(r)
                                        } else {
                                            a3(o)
                                        }
                                    } else {
                                        l();
                                        return
                                    }
                                }
                                m = setTimeout(h, n ? bk.initialDelay : bk.trackClickRepeatFreq);
                                n = false
                            }, l = function () {
                                m && clearTimeout(m);
                                m = null;
                                d(document).unbind("mouseup.html", l)
                            };
                            h();
                            d(document).bind("mouseup.html", l);
                            return false
                        }
                    })
                }
            }

            function aJ() {
                if (bl) {
                    bl.unbind("mousedown.html")
                }
                if (bz) {
                    bz.unbind("mousedown.html")
                }
            }

            function bo() {
                d("html").unbind("dragstart.jsp%20selectstart.jsp%20mousemove.jsp%20mouseup.jsp%20mouseleave.html");
                if (bs) {
                    bs.removeClass("jspActive")
                }
                if (aX) {
                    aX.removeClass("jspActive")
                }
            }

            function a4(g, h) {
                if (!bi) {
                    return
                }
                if (g < 0) {
                    g = 0
                } else {
                    if (g > aW) {
                        g = aW
                    }
                }
                if (h === f) {
                    h = bk.animateScroll
                }
                if (h) {
                    a9.animate(bs, "top", g, bL)
                } else {
                    bs.css("top", g);
                    bL(g)
                }
            }

            function bL(k) {
                if (k === f) {
                    k = bs.position().top
                }
                bD.scrollTop(0);
                bh = k;
                var h = bh === 0, j = bh == aW, i = k / aW, g = -i * (a0 - aK);
                if (bG != h || bQ != j) {
                    bG = h;
                    bQ = j;
                    br.trigger("jsp-arrow-change", [bG, bQ, ba, aU])
                }
                aL(h, j);
                a1.css("top", g);
                br.trigger("jsp-scroll-y", [-g, h, j]).trigger("scroll")
            }

            function a3(h, g) {
                if (!bS) {
                    return
                }
                if (h < 0) {
                    h = 0
                } else {
                    if (h > aV) {
                        h = aV
                    }
                }
                if (g === f) {
                    g = bk.animateScroll
                }
                if (g) {
                    a9.animate(aX, "left", h, bK)
                } else {
                    aX.css("left", h);
                    bK(h)
                }
            }

            function bK(k) {
                if (k === f) {
                    k = aX.position().left
                }
                bD.scrollTop(0);
                bO = k;
                var h = bO === 0, i = bO == aV, j = k / aV, g = -j * (a6 - bF);
                if (ba != h || aU != i) {
                    ba = h;
                    aU = i;
                    br.trigger("jsp-arrow-change", [bG, bQ, ba, aU])
                }
                aN(h, i);
                a1.css("left", g);
                br.trigger("jsp-scroll-x", [-g, h, i]).trigger("scroll")
            }

            function aL(h, g) {
                if (bk.showArrows) {
                    by[h ? "addClass" : "removeClass"]("jspDisabled");
                    bJ[g ? "addClass" : "removeClass"]("jspDisabled")
                }
            }

            function aN(h, g) {
                if (bk.showArrows) {
                    bm[h ? "addClass" : "removeClass"]("jspDisabled");
                    aI[g ? "addClass" : "removeClass"]("jspDisabled")
                }
            }

            function bd(g, i) {
                var h = g / (a0 - aK);
                a4(h * aW, i)
            }

            function bc(i, g) {
                var h = i / (a6 - bF);
                a3(h * aV, g)
            }

            function bN(i, n, g) {
                var q, u, t, v = 0, j = 0, h, o, p, l, m, k;
                try {
                    q = d(i)
                } catch (r) {
                    return
                }
                u = q.outerHeight();
                t = q.outerWidth();
                bD.scrollTop(0);
                bD.scrollLeft(0);
                while (!q.is(".jspPane")) {
                    v += q.position().top;
                    j += q.position().left;
                    q = q.offsetParent();
                    if (/^body|html$/i.test(q[0].nodeName)) {
                        return
                    }
                }
                h = bW();
                p = h + aK;
                if (v < h || n) {
                    m = v - bk.verticalGutter
                } else {
                    if (v + u > p) {
                        m = v - aK + u + bk.verticalGutter
                    }
                }
                if (m) {
                    bd(m, g)
                }
                o = bU();
                l = o + bF;
                if (j < o || n) {
                    k = j - bk.horizontalGutter
                } else {
                    if (j + t > l) {
                        k = j - bF + t + bk.horizontalGutter
                    }
                }
                if (k) {
                    bc(k, g)
                }
            }

            function bU() {
                return -a1.position().left
            }

            function bW() {
                return -a1.position().top
            }

            function bf() {
                var g = a0 - aK;
                return(g > 20) && (g - bW() < 10)
            }

            function bv() {
                var g = a6 - bF;
                return(g > 20) && (g - bU() < 10)
            }

            function bI() {
                bD.unbind(bM).bind(bM, function (i, h, j, l) {
                    var k = bO, g = bh;
                    a9.scrollBy(j * bk.mouseWheelSpeed, -l * bk.mouseWheelSpeed, false);
                    return k == bO && g == bh
                })
            }

            function aR() {
                bD.unbind(bM)
            }

            function bV() {
                return false
            }

            function bg() {
                a1.find(":input,a").unbind("focus.html").bind("focus.html", function (g) {
                    bN(g.target, false)
                })
            }

            function bp() {
                a1.find(":input,a").unbind("focus.html")
            }

            function a7() {
                var g, j, h = [];
                bS && h.push(bC[0]);
                bi && h.push(a5[0]);
                a1.focus(function () {
                    br.focus()
                });
                br.attr("tabindex", 0).unbind("keydown.jsp%20keypress.html").bind("keydown.html",function (k) {
                    if (k.target !== this && !(h.length && d(k.target).closest(h).length)) {
                        return
                    }
                    var l = bO, m = bh;
                    switch (k.keyCode) {
                        case 40:
                        case 38:
                        case 34:
                        case 32:
                        case 33:
                        case 39:
                        case 37:
                            g = k.keyCode;
                            i();
                            break;
                        case 35:
                            bd(a0 - aK);
                            g = null;
                            break;
                        case 36:
                            bd(0);
                            g = null;
                            break
                    }
                    j = k.keyCode == g && l != bO || m != bh;
                    return !j
                }).bind("keypress.html", function (k) {
                    if (k.keyCode == g) {
                        i()
                    }
                    return !j
                });
                if (bk.hideFocus) {
                    br.css("outline", "none");
                    if ("hideFocus" in bD[0]) {
                        br.attr("hideFocus", true)
                    }
                } else {
                    br.css("outline", "");
                    if ("hideFocus" in bD[0]) {
                        br.attr("hideFocus", false)
                    }
                }
                function i() {
                    var k = bO, l = bh;
                    switch (g) {
                        case 40:
                            a9.scrollByY(bk.keyboardSpeed, false);
                            break;
                        case 38:
                            a9.scrollByY(-bk.keyboardSpeed, false);
                            break;
                        case 34:
                        case 32:
                            a9.scrollByY(aK * bk.scrollPagePercent, false);
                            break;
                        case 33:
                            a9.scrollByY(-aK * bk.scrollPagePercent, false);
                            break;
                        case 39:
                            a9.scrollByX(bk.keyboardSpeed, false);
                            break;
                        case 37:
                            a9.scrollByX(-bk.keyboardSpeed, false);
                            break
                    }
                    j = k != bO || l != bh;
                    return j
                }
            }

            function a8() {
                br.attr("tabindex", "-1").removeAttr("tabindex").unbind("keydown.jsp%20keypress.html")
            }

            function bt() {
                if (location.hash && location.hash.length > 1) {
                    var h, j, i = escape(location.hash.substr(1));
                    try {
                        h = d("#" + i + ', a[name="' + i + '"]')
                    } catch (g) {
                        return
                    }
                    if (h.length && a1.find(i)) {
                        if (bD.scrollTop() === 0) {
                            j = setInterval(function () {
                                if (bD.scrollTop() > 0) {
                                    bN(h, true);
                                    d(document).scrollTop(bD.position().top);
                                    clearInterval(j)
                                }
                            }, 50)
                        } else {
                            bN(h, true);
                            d(document).scrollTop(bD.position().top)
                        }
                    }
                }
            }

            function aS() {
                if (d(document.body).data("jspHijack")) {
                    return
                }
                d(document.body).data("jspHijack", true);
                d(document.body).delegate("a[href*=#]", "click", function (p) {
                    var h = this.href.substr(0, this.href.indexOf("#")), o = location.href, k, j, g, m, n, l;
                    if (location.href.indexOf("#") !== -1) {
                        o = location.href.substr(0, location.href.indexOf("#"))
                    }
                    if (h !== o) {
                        return
                    }
                    k = escape(this.href.substr(this.href.indexOf("#") + 1));
                    j;
                    try {
                        j = d("#" + k + ', a[name="' + k + '"]')
                    } catch (i) {
                        return
                    }
                    if (!j.length) {
                        return
                    }
                    g = j.closest(".jspScrollable");
                    m = g.data("jsp");
                    m.scrollToElement(j, true);
                    if (g[0].scrollIntoView) {
                        n = d(e).scrollTop();
                        l = j.offset().top;
                        if (l < n || l > n + d(e).height()) {
                            g[0].scrollIntoView()
                        }
                    }
                    p.preventDefault()
                })
            }

            function bB() {
                var k, l, i, j, h, g = false;
                bD.unbind("touchstart.jsp touchmove.jsp touchend.jsp click.jsp-touchclick").bind("touchstart.html",function (n) {
                    var m = n.originalEvent.touches[0];
                    k = bU();
                    l = bW();
                    i = m.pageX;
                    j = m.pageY;
                    h = false;
                    g = true
                }).bind("touchmove.html",function (m) {
                    if (!g) {
                        return
                    }
                    var n = m.originalEvent.touches[0], o = bO, p = bh;
                    a9.scrollTo(k + i - n.pageX, l + j - n.pageY);
                    h = h || Math.abs(i - n.pageX) > 5 || Math.abs(j - n.pageY) > 5;
                    return o == bO && p == bh
                }).bind("touchend.html",function (m) {
                    g = false
                }).bind("click.jsp-touchclick", function (m) {
                    if (h) {
                        h = false;
                        return false
                    }
                })
            }

            function aY() {
                var g = bW(), h = bU();
                br.removeClass("jspScrollable").unbind(".jsp");
                br.replaceWith(bA.append(a1.children()));
                bA.scrollTop(g);
                bA.scrollLeft(h);
                if (bq) {
                    clearInterval(bq)
                }
            }

            d.extend(a9, {reinitialise: function (g) {
                g = d.extend({}, bk, g);
                bx(g)
            }, scrollToElement: function (h, i, g) {
                bN(h, i, g)
            }, scrollTo: function (h, g, i) {
                bc(h, i);
                bd(g, i)
            }, scrollToX: function (h, g) {
                bc(h, g)
            }, scrollToY: function (g, h) {
                bd(g, h)
            }, scrollToPercentX: function (h, g) {
                bc(h * (a6 - bF), g)
            }, scrollToPercentY: function (h, g) {
                bd(h * (a0 - aK), g)
            }, scrollBy: function (i, g, h) {
                a9.scrollByX(i, h);
                a9.scrollByY(g, h)
            }, scrollByX: function (g, i) {
                var j = bU() + Math[g < 0 ? "floor" : "ceil"](g), h = j / (a6 - bF);
                a3(h * aV, i)
            }, scrollByY: function (g, i) {
                var j = bW() + Math[g < 0 ? "floor" : "ceil"](g), h = j / (a0 - aK);
                a4(h * aW, i)
            }, positionDragX: function (g, h) {
                a3(g, h)
            }, positionDragY: function (h, g) {
                a4(h, g)
            }, animate: function (k, h, g, i) {
                var j = {};
                j[h] = g;
                k.animate(j, {duration: bk.animateDuration, easing: bk.animateEase, queue: false, step: i})
            }, getContentPositionX: function () {
                return bU()
            }, getContentPositionY: function () {
                return bW()
            }, getContentWidth: function () {
                return a6
            }, getContentHeight: function () {
                return a0
            }, getPercentScrolledX: function () {
                return bU() / (a6 - bF)
            }, getPercentScrolledY: function () {
                return bW() / (a0 - aK)
            }, getIsScrollableH: function () {
                return bS
            }, getIsScrollableV: function () {
                return bi
            }, getContentPane: function () {
                return a1
            }, scrollToBottom: function (g) {
                a4(aW, g)
            }, hijackInternalLinks: d.noop, destroy: function () {
                aY()
            }});
            bx(bb)
        }

        a = d.extend({}, d.fn.jScrollPane.defaults, a);
        d.each(["mouseWheelSpeed", "arrowButtonSpeed", "trackClickSpeed", "keyboardSpeed"], function () {
            a[this] = a[this] || a.speed
        });
        return this.each(function () {
            var h = d(this), c = h.data("jsp");
            if (c) {
                c.reinitialise(a)
            } else {
                c = new b(h, a);
                h.data("jsp", c)
            }
        })
    };
    d.fn.jScrollPane.defaults = {showArrows: false, maintainPosition: true, stickToBottom: false, stickToRight: false, clickOnTrack: true, autoReinitialise: false, autoReinitialiseDelay: 500, verticalDragMinHeight: 0, verticalDragMaxHeight: 99999, horizontalDragMinWidth: 0, horizontalDragMaxWidth: 99999, contentWidth: f, animateScroll: false, animateDuration: 300, animateEase: "linear", hijackInternalLinks: false, verticalGutter: 4, horizontalGutter: 4, mouseWheelSpeed: 0, arrowButtonSpeed: 0, arrowRepeatFreq: 50, arrowScrollOnHover: false, trackClickSpeed: 0, trackClickRepeatFreq: 70, verticalArrowPositions: "split", horizontalArrowPositions: "split", enableKeyboardNavigation: true, hideFocus: false, keyboardSpeed: 0, initialDelay: 300, speed: 30, scrollPagePercent: 0.8}
})(jQuery, this);
$selectDroplist_Manager = new function () {
    this.els = [];
    this.activeName = null;
    return this
};
$selectDroplist_UI = function (a, b) {
    var c = this;
    this.setupDropListUI = function () {
        var e = 0;
        c.select.find("> *").each(function (i) {
            var p = jQuery(this);
            var q = i;
            if (this.tagName.toLowerCase() == "optgroup") {
                p.each(function () {
                    var t = jQuery(this);
                    var v = t.attr("label");
                    var u = jQuery("<li></li>");
                    u.prepend('<span class="OptgroupLabel">' + v + "</span>");
                    var s = jQuery("<ul></ul>");
                    c.elUL.append(u);
                    u.append(s);
                    t.find("option").each(function (x) {
                        var w = jQuery(this);
                        var y = w.attr("title") || w.text();
                        if (w.attr("value") == "null") {
                            s.append('<li class="SelectUITitle" value="' + parseInt(q + x + e + 1) + '"><a href="#" title="' + y + '" rel="' + w.attr("label") + '">' + w.text() + "</a></li>")
                        } else {
                            if (this.getAttribute("selected") == "selected" || this.getAttribute("selected") == true) {
                                s.append('<li class="Active" value="' + parseInt(q + x + e + 1) + '"><a href="#" title="' + y + '" rel="' + w.attr("label") + '">' + w.text() + "</a></li>")
                            } else {
                                s.append('<li value="' + parseInt(q + x + e + 1) + '"><a href="#" title="' + y + '" rel="' + w.attr("label") + '">' + w.text() + "</a></li>")
                            }
                        }
                    });
                    e += t.find("option").length - 1
                })
            } else {
                var r = p.attr("title") || p.text();
                if (p.attr("value") == "null") {
                    c.elUL.append('<li class="SelectUITitle" value="' + parseInt(i + e + 1) + '"><a href="#" title="' + r + '" rel="' + p.attr("label") + '">' + p.text() + "</a></li>")
                } else {
                    if (this.getAttribute("selected") == "selected" || this.getAttribute("selected") == true) {
                        c.elUL.append('<li class="Active" value="' + parseInt(i + e + 1) + '"><a href="#" title="' + r + '" rel="' + p.attr("label") + '">' + p.text() + "</a></li>")
                    } else {
                        c.elUL.append('<li value="' + parseInt(i + e + 1) + '"><a href="#" title="' + r + '" rel="' + p.attr("label") + '">' + p.text() + "</a></li>")
                    }
                }
            }
        });
        c.el.html(c.elUL);
        var d = c.elUL.attr("class").split(" ");
        var n = true;
        for (var f = 0; f < d.length; f++) {
            if (d[f].match(/^Theme/)) {
                c.elWrapper.addClass(d[f] + "_Wrapper");
                c.el.addClass(d[f] + "_List");
                n = false
            }
        }
        if (n) {
            c.elWrapper.addClass("Theme_Default_Wrapper");
            c.el.addClass("Theme_Default_List");
            c.elUL.addClass("Theme_Default")
        }
        if (!c.select.attr("multiple")) {
            c.maxDropListHeight = b != undefined && b.maxDropListHeight != undefined ? parseInt(b.maxDropListHeight) : 300;
            c.config = {maxDropListHeight: c.maxDropListHeight};
            var j = "";
            var l = false;
            c.select.find("option").each(function () {
                var i = jQuery(this);
                if (this.getAttribute("selected") == "selected" || this.getAttribute("selected") == true) {
                    j = i.text();
                    l = true
                }
            });
            if (!l) {
                j = c.select.attr("title") != "" ? c.select.attr("title") : ""
            }
            if (!c.select.attr("disabled")) {
                c.droplistTITLE.text(j);
                c.elWrapper.removeClass("Disabled")
            } else {
                c.droplistTITLE.text("");
                c.elWrapper.addClass("Disabled")
            }
            c.el.show();
            c.el.css({position: "absolute", left: 0, display: "none", overflow: "hidden", width: c.elUL.width()});
            c.el.hide();
            c.el.find("ul > li").each(function (p) {
                var i = jQuery(this);
                i.bind("click", function () {
                    if (i.find("span.OptgroupLabel:first-child").length > 0) {
                        return false
                    } else {
                        if (!c.select.attr("disabled")) {
                            c.el.find("ul li").removeClass("Active");
                            i.addClass("Active");
                            c.droplistTITLE.text(i.text());
                            c.select.val(c.select.find("option").eq(i.attr("value") - 1).val());
                            c.hideList();
                            callExternalFunction(c, $selectDroplist_Manager.els, i.find("a:first").attr("rel"));
                            i.removeClass("Hover");
                            return false
                        }
                    }
                })
            });
            c.el.bind("click", function (i) {
                return false
            })
        } else {
            var o = c.select.attr("size");
            c.elUL.css({height: c.elUL.find("li").eq(0).outerHeight(true) * o, overflow: "hidden"});
            if (!c.elUL.parent().hasClass("jScrollPaneContainer")) {
                c.elUL.jScrollPane({scrollbarWidth: c.options.scrollbarWidth, scrollbarOnLeft: c.options.scrollbarSide == "left" ? true : false})
            }
            var k = null;
            var m = null;
            var g = null;

            function h() {
                c.select.find("option").removeAttr("selected");
                c.elUL.find("li").removeClass("Active")
            }

            c.el.find("ul > li").each(function (p) {
                var i = jQuery(this);
                i.bind("click", function (q) {
                    if (i.find("span.OptgroupLabel:first-child").length > 0) {
                        return false
                    } else {
                        if (!c.select.attr("disabled")) {
                            if (q.ctrlKey && !q.shiftKey) {
                                m = p;
                                c.select.find("option").eq(p).attr("selected", "selected")
                            } else {
                                if ((!q.ctrlKey && q.shiftKey) || (q.ctrlKey && q.shiftKey)) {
                                    if (!q.ctrlKey) {
                                        h()
                                    }
                                    if (m == null) {
                                        m = p
                                    } else {
                                        g = p;
                                        if (m != null && g != null) {
                                            c.el.find("ul > li").each(function (s) {
                                                var r = jQuery(this);
                                                if ((m <= g && s >= m && s <= g) || (m >= g && s <= m && s >= g)) {
                                                    c.select.find("option").eq(s).attr("selected", "selected");
                                                    r.addClass("Active")
                                                }
                                            });
                                            g = null
                                        }
                                    }
                                } else {
                                    h();
                                    c.select.find("option").eq(p).attr("selected", "selected");
                                    m = p
                                }
                            }
                            i.addClass("Active");
                            i.removeClass("Hover");
                            return false
                        }
                    }
                })
            })
        }
        c.el.find("ul > li").each(function (p) {
            var i = jQuery(this);
            i.bind("mouseover", function () {
                i.addClass("Hover");
                return false
            });
            i.bind("mouseout", function () {
                i.removeClass("Hover");
                return false
            })
        })
    };
    this.reset = function () {
        c.elUL.empty();
        c.elUL.removeAttr("class");
        c.elUL.removeAttr("style");
        c.elUL.attr("title", c.select.attr("title"));
        c.elUL.addClass(c.select.attr("class"));
        c.setupDropListUI()
    };
    this.showList = function () {
        c.el.addClass("TopLevel DropListUIShow");
        c.el.css({top: c.elWrapper.offset().top, left: c.elWrapper.offset().left});
        c.el.show();
        if (c.el.height() > c.maxDropListHeight && !c.elUL.parent().hasClass("jScrollPaneContainer")) {
            c.elUL.height(c.maxDropListHeight);
            c.elUL.jScrollPane({scrollbarWidth: c.options.scrollbarWidth, scrollbarOnLeft: c.options.scrollbarSide == "left" ? true : false})
        }
        c.setDirection();
        c.eventFire = false
    };
    this.hideList = function () {
        if (c.elUL.parent().hasClass("jScrollPaneContainer")) {
            c.el.prepend(c.elUL.parent())
        } else {
            c.el.prepend(c.elUL)
        }
        c.el.removeClass("TopLevel DropListUIShow");
        c.el.hide()
    };
    this.setDirection = function () {
        var j = jQuery(window).height() + jQuery(window).scrollTop();
        var d = c.elWrapper.offset().top;
        var g = c.elWrapper.offset().top + c.elWrapper.height();
        var e = c.elUL.outerHeight();
        var h = "";
        if (c.config.maxDropListHeight > c.maxDropListHeight) {
            c.maxDropListHeight = c.config.maxDropListHeight
        }
        if (e <= j - g - jQuery(window).scrollTop()) {
            h = "down"
        } else {
            if (j - g > c.maxDropListHeight) {
                h = "down"
            } else {
                if (e < d - jQuery(window).scrollTop()) {
                    h = "up"
                } else {
                    if (d - jQuery(window).scrollTop() > c.maxDropListHeight) {
                        h = "up"
                    } else {
                        if (j - g >= d - jQuery(window).scrollTop()) {
                            h = "down";
                            c.maxDropListHeight = j - g
                        } else {
                            h = "up";
                            c.maxDropListHeight = d - jQuery(window).scrollTop()
                        }
                    }
                }
            }
        }
        var i = (/[0-9]+/).test(c.el.css("borderTopWidth")) ? parseInt(c.el.css("borderTopWidth")) : 0;
        var f = (/[0-9]+/).test(c.el.css("borderBottomWidth")) ? parseInt(c.el.css("borderBottomWidth")) : 0;
        c.maxDropListHeight -= (i + f);
        if (h == "up") {
            c.el.css({top: d - c.el.outerHeight(true)})
        } else {
            c.el.css({top: g})
        }
    };
    c.options = {scrollbarWidth: b != undefined && b.scrollbarWidth != undefined ? parseInt(b.scrollbarWidth) : 10, scrollbarSide: b != undefined && b.scrollbarSide != undefined ? b.scrollbarSide : "right"};
    c.select = a;
    c.select.addClass("HasSelectUI");
    c.select.css({opacity: 0, position: "absolute", left: "-1000em", top: "-1000em"});
    c.reservedHolder = null;
    c.elWrapper = jQuery('<div class="DropListUI"></div>');
    c.select.before(c.elWrapper);
    c.el = jQuery('<div class="DropListUIContainer"></div>');
    if (!c.select.attr("multiple")) {
        jQuery("body").append(c.el)
    } else {
        c.elWrapper.html(c.el)
    }
    c.elUL = jQuery('<ul id="selectUI_' + c.select.attr("id") + '" title="' + (c.select.attr("title") != undefined ? c.select.attr("title") : "") + '"></ul>');
    c.elUL.addClass(c.select.attr("class"));
    c.el.html(c.elUL);
    if (!c.select.attr("multiple")) {
        c.droplistTITLE = jQuery("<p></p>");
        c.elWrapper.append(c.droplistTITLE);
        c.droplistTITLE.bind("click", function (d) {
            c.eventFire = true;
            if (!c.select.attr("disabled")) {
                if (c.el.hasClass("DropListUIShow")) {
                    c.hideList()
                } else {
                    if ($selectDroplist_Manager.activeName != null) {
                        $selectDroplist_Manager.els[$selectDroplist_Manager.activeName].hideList()
                    }
                    c.showList();
                    $selectDroplist_Manager.activeName = c.select.attr("id")
                }
            }
            return false
        })
    }
    this.setupDropListUI()
};
jQuery.fn.extend({addSelectUI: function () {
    if ($selectDroplist_Manager != undefined) {
        jQuery(window).bind("resize", function (b) {
            if ($selectDroplist_Manager.activeName != null && $selectDroplist_Manager.els[$selectDroplist_Manager.activeName] != undefined && !$selectDroplist_Manager.els[$selectDroplist_Manager.activeName].eventFire) {
                $selectDroplist_Manager.els[$selectDroplist_Manager.activeName].hideList()
            }
        });
        jQuery(document).bind("click", function (b) {
            if ($selectDroplist_Manager.activeName != null) {
                $selectDroplist_Manager.els[$selectDroplist_Manager.activeName].hideList()
            }
            b.stopPropagation()
        })
    }
    var a = arguments[0];
    this.each(function () {
        if (!jQuery(this).hasClass("HasSelectUI")) {
            jQuery(this).addClass("HasSelectUI");
            $selectDroplist_Manager.els[jQuery(this).attr("id")] = new $selectDroplist_UI(jQuery(this), a)
        }
    })
}});
/*! Copyright (c) 2011 Brandon Aaron (http://brandonaaron.net)
 * Licensed under the MIT License (LICENSE.txt).
 *
 * Thanks to: http://adomas.org/javascript-mouse-wheel/ for some pointers.
 * Thanks to: Mathias Bank(http://www.mathias-bank.de) for a scope bug fix.
 * Thanks to: Seamus Leahy for adding deltaX and deltaY
 *
 * Version: 3.0.6
 * 
 * Requires: 1.2.2+
 */
(function (d) {
    var b = ["DOMMouseScroll", "mousewheel"];
    if (d.event.fixHooks) {
        for (var a = b.length; a;) {
            d.event.fixHooks[b[--a]] = d.event.mouseHooks
        }
    }
    d.event.special.mousewheel = {setup: function () {
        if (this.addEventListener) {
            for (var e = b.length; e;) {
                this.addEventListener(b[--e], c, false)
            }
        } else {
            this.onmousewheel = c
        }
    }, teardown: function () {
        if (this.removeEventListener) {
            for (var e = b.length; e;) {
                this.removeEventListener(b[--e], c, false)
            }
        } else {
            this.onmousewheel = null
        }
    }};
    d.fn.extend({mousewheel: function (e) {
        return e ? this.bind("mousewheel", e) : this.trigger("mousewheel")
    }, unmousewheel: function (e) {
        return this.unbind("mousewheel", e)
    }});
    function c(j) {
        var h = j || window.event, g = [].slice.call(arguments, 1), k = 0, i = true, f = 0, e = 0;
        j = d.event.fix(h);
        j.type = "mousewheel";
        if (h.wheelDelta) {
            k = h.wheelDelta / 120
        }
        if (h.detail) {
            k = -h.detail / 3
        }
        e = k;
        if (h.axis !== undefined && h.axis === h.HORIZONTAL_AXIS) {
            e = 0;
            f = -1 * k
        }
        if (h.wheelDeltaY !== undefined) {
            e = h.wheelDeltaY / 120
        }
        if (h.wheelDeltaX !== undefined) {
            f = -1 * h.wheelDeltaX / 120
        }
        g.unshift(j, k, f, e);
        return(d.event.dispatch || d.event.handle).apply(this, g)
    }
})(jQuery);
(function ($) {
    $.extend($.ui, {datepicker: {version: "1.8"}});
    var PROP_NAME = "datepicker";
    var dpuuid = new Date().getTime();

    function Datepicker() {
        this.debug = false;
        this._curInst = null;
        this._keyEvent = false;
        this._disabledInputs = [];
        this._datepickerShowing = false;
        this._inDialog = false;
        this._mainDivId = "ui-datepicker-div";
        this._inlineClass = "ui-datepicker-inline";
        this._appendClass = "ui-datepicker-append";
        this._triggerClass = "ui-datepicker-trigger";
        this._dialogClass = "ui-datepicker-dialog";
        this._disableClass = "ui-datepicker-disabled";
        this._unselectableClass = "ui-datepicker-unselectable";
        this._currentClass = "ui-datepicker-current-day";
        this._dayOverClass = "ui-datepicker-days-cell-over";
        this.regional = [];
        this.regional[""] = {closeText: "Done", prevText: "Prev", nextText: "Next", currentText: "Today", monthNames: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"], monthNamesShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"], dayNames: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"], dayNamesShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"], dayNamesMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"], weekHeader: "Wk", dateFormat: "mm/dd/yy", firstDay: 0, isRTL: false, showMonthAfterYear: false, yearSuffix: ""};
        this._defaults = {showOn: "focus", showAnim: "show", showOptions: {}, defaultDate: null, appendText: "", buttonText: "...", buttonImage: "", buttonImageOnly: false, hideIfNoPrevNext: false, navigationAsDateFormat: false, gotoCurrent: false, changeMonth: false, changeYear: false, yearRange: "c-10:c+10", showOtherMonths: false, selectOtherMonths: false, showWeek: false, calculateWeek: this.iso8601Week, shortYearCutoff: "+10", minDate: null, maxDate: null, duration: "_default", beforeShowDay: null, beforeShow: null, onSelect: null, onChangeMonthYear: null, onClose: null, numberOfMonths: 1, showCurrentAtPos: 0, stepMonths: 1, stepBigMonths: 12, altField: "", altFormat: "", constrainInput: true, showButtonPanel: false, autoSize: false};
        $.extend(this._defaults, this.regional[""]);
        this.dpDiv = $('<div id="' + this._mainDivId + '" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all ui-helper-hidden-accessible"></div>')
    }

    $.extend(Datepicker.prototype, {markerClassName: "hasDatepicker", log: function () {
        if (this.debug) {
            console.log.apply("", arguments)
        }
    }, _widgetDatepicker: function () {
        return this.dpDiv
    }, setDefaults: function (settings) {
        extendRemove(this._defaults, settings || {});
        return this
    }, _attachDatepicker: function (target, settings) {
        var inlineSettings = null;
        for (var attrName in this._defaults) {
            var attrValue = target.getAttribute("date:" + attrName);
            if (attrValue) {
                inlineSettings = inlineSettings || {};
                try {
                    inlineSettings[attrName] = eval(attrValue)
                } catch (err) {
                    inlineSettings[attrName] = attrValue
                }
            }
        }
        var nodeName = target.nodeName.toLowerCase();
        var inline = (nodeName == "div" || nodeName == "span");
        if (!target.id) {
            target.id = "dp" + (++this.uuid)
        }
        var inst = this._newInst($(target), inline);
        inst.settings = $.extend({}, settings || {}, inlineSettings || {});
        if (nodeName == "input") {
            this._connectDatepicker(target, inst)
        } else {
            if (inline) {
                this._inlineDatepicker(target, inst)
            }
        }
    }, _newInst: function (target, inline) {
        var id = target[0].id.replace(/([^A-Za-z0-9_])/g, "\\\\$1");
        return{id: id, input: target, selectedDay: 0, selectedMonth: 0, selectedYear: 0, drawMonth: 0, drawYear: 0, inline: inline, dpDiv: (!inline ? this.dpDiv : $('<div class="' + this._inlineClass + ' ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div>'))}
    }, _connectDatepicker: function (target, inst) {
        var input = $(target);
        inst.append = $([]);
        inst.trigger = $([]);
        if (input.hasClass(this.markerClassName)) {
            return
        }
        this._attachments(input, inst);
        input.addClass(this.markerClassName).keydown(this._doKeyDown).keypress(this._doKeyPress).keyup(this._doKeyUp).bind("setData.datepicker",function (event, key, value) {
            inst.settings[key] = value
        }).bind("getData.datepicker", function (event, key) {
            return this._get(inst, key)
        });
        this._autoSize(inst);
        $.data(target, PROP_NAME, inst)
    }, _attachments: function (input, inst) {
        var appendText = this._get(inst, "appendText");
        var isRTL = this._get(inst, "isRTL");
        if (inst.append) {
            inst.append.remove()
        }
        if (appendText) {
            inst.append = $('<span class="' + this._appendClass + '">' + appendText + "</span>");
            input[isRTL ? "before" : "after"](inst.append)
        }
        input.unbind("focus", this._showDatepicker);
        if (inst.trigger) {
            inst.trigger.remove()
        }
        var showOn = this._get(inst, "showOn");
        if (showOn == "focus" || showOn == "both") {
            input.focus(this._showDatepicker)
        }
        if (showOn == "button" || showOn == "both") {
            var buttonText = this._get(inst, "buttonText");
            var buttonImage = this._get(inst, "buttonImage");
            inst.trigger = $(this._get(inst, "buttonImageOnly") ? $("<img/>").addClass(this._triggerClass).attr({src: buttonImage, alt: buttonText, title: buttonText}) : $('<button type="button"></button>').addClass(this._triggerClass).html(buttonImage == "" ? buttonText : $("<img/>").attr({src: buttonImage, alt: buttonText, title: buttonText})));
            input[isRTL ? "before" : "after"](inst.trigger);
            inst.trigger.click(function () {
                if ($.datepicker._datepickerShowing && $.datepicker._lastInput == input[0]) {
                    $.datepicker._hideDatepicker()
                } else {
                    $.datepicker._showDatepicker(input[0])
                }
                return false
            })
        }
    }, _autoSize: function (inst) {
        if (this._get(inst, "autoSize") && !inst.inline) {
            var date = new Date(2009, 12 - 1, 20);
            var dateFormat = this._get(inst, "dateFormat");
            if (dateFormat.match(/[DM]/)) {
                var findMax = function (names) {
                    var max = 0;
                    var maxI = 0;
                    for (var i = 0; i < names.length; i++) {
                        if (names[i].length > max) {
                            max = names[i].length;
                            maxI = i
                        }
                    }
                    return maxI
                };
                date.setMonth(findMax(this._get(inst, (dateFormat.match(/MM/) ? "monthNames" : "monthNamesShort"))));
                date.setDate(findMax(this._get(inst, (dateFormat.match(/DD/) ? "dayNames" : "dayNamesShort"))) + 20 - date.getDay())
            }
            inst.input.attr("size", this._formatDate(inst, date).length)
        }
    }, _inlineDatepicker: function (target, inst) {
        var divSpan = $(target);
        if (divSpan.hasClass(this.markerClassName)) {
            return
        }
        divSpan.addClass(this.markerClassName).append(inst.dpDiv).bind("setData.datepicker",function (event, key, value) {
            inst.settings[key] = value
        }).bind("getData.datepicker", function (event, key) {
            return this._get(inst, key)
        });
        $.data(target, PROP_NAME, inst);
        this._setDate(inst, this._getDefaultDate(inst), true);
        this._updateDatepicker(inst);
        this._updateAlternate(inst)
    }, _dialogDatepicker: function (input, date, onSelect, settings, pos) {
        var inst = this._dialogInst;
        if (!inst) {
            var id = "dp" + (++this.uuid);
            this._dialogInput = $('<input type="text" id="' + id + '" style="position: absolute; top: -100px; width: 0px; z-index: -10;"/>');
            this._dialogInput.keydown(this._doKeyDown);
            $("body").append(this._dialogInput);
            inst = this._dialogInst = this._newInst(this._dialogInput, false);
            inst.settings = {};
            $.data(this._dialogInput[0], PROP_NAME, inst)
        }
        extendRemove(inst.settings, settings || {});
        date = (date && date.constructor == Date ? this._formatDate(inst, date) : date);
        this._dialogInput.val(date);
        this._pos = (pos ? (pos.length ? pos : [pos.pageX, pos.pageY]) : null);
        if (!this._pos) {
            var browserWidth = document.documentElement.clientWidth;
            var browserHeight = document.documentElement.clientHeight;
            var scrollX = document.documentElement.scrollLeft || document.body.scrollLeft;
            var scrollY = document.documentElement.scrollTop || document.body.scrollTop;
            this._pos = [(browserWidth / 2) - 100 + scrollX, (browserHeight / 2) - 150 + scrollY]
        }
        this._dialogInput.css("left", (this._pos[0] + 20) + "px").css("top", this._pos[1] + "px");
        inst.settings.onSelect = onSelect;
        this._inDialog = true;
        this.dpDiv.addClass(this._dialogClass);
        this._showDatepicker(this._dialogInput[0]);
        if ($.blockUI) {
            $.blockUI(this.dpDiv)
        }
        $.data(this._dialogInput[0], PROP_NAME, inst);
        return this
    }, _destroyDatepicker: function (target) {
        var $target = $(target);
        var inst = $.data(target, PROP_NAME);
        if (!$target.hasClass(this.markerClassName)) {
            return
        }
        var nodeName = target.nodeName.toLowerCase();
        $.removeData(target, PROP_NAME);
        if (nodeName == "input") {
            inst.append.remove();
            inst.trigger.remove();
            $target.removeClass(this.markerClassName).unbind("focus", this._showDatepicker).unbind("keydown", this._doKeyDown).unbind("keypress", this._doKeyPress).unbind("keyup", this._doKeyUp)
        } else {
            if (nodeName == "div" || nodeName == "span") {
                $target.removeClass(this.markerClassName).empty()
            }
        }
    }, _enableDatepicker: function (target) {
        var $target = $(target);
        var inst = $.data(target, PROP_NAME);
        if (!$target.hasClass(this.markerClassName)) {
            return
        }
        var nodeName = target.nodeName.toLowerCase();
        if (nodeName == "input") {
            target.disabled = false;
            inst.trigger.filter("button").each(function () {
                this.disabled = false
            }).end().filter("img").css({opacity: "1.0", cursor: ""})
        } else {
            if (nodeName == "div" || nodeName == "span") {
                var inline = $target.children("." + this._inlineClass);
                inline.children().removeClass("ui-state-disabled")
            }
        }
        this._disabledInputs = $.map(this._disabledInputs, function (value) {
            return(value == target ? null : value)
        })
    }, _disableDatepicker: function (target) {
        var $target = $(target);
        var inst = $.data(target, PROP_NAME);
        if (!$target.hasClass(this.markerClassName)) {
            return
        }
        var nodeName = target.nodeName.toLowerCase();
        if (nodeName == "input") {
            target.disabled = true;
            inst.trigger.filter("button").each(function () {
                this.disabled = true
            }).end().filter("img").css({opacity: "0.5", cursor: "default"})
        } else {
            if (nodeName == "div" || nodeName == "span") {
                var inline = $target.children("." + this._inlineClass);
                inline.children().addClass("ui-state-disabled")
            }
        }
        this._disabledInputs = $.map(this._disabledInputs, function (value) {
            return(value == target ? null : value)
        });
        this._disabledInputs[this._disabledInputs.length] = target
    }, _isDisabledDatepicker: function (target) {
        if (!target) {
            return false
        }
        for (var i = 0; i < this._disabledInputs.length; i++) {
            if (this._disabledInputs[i] == target) {
                return true
            }
        }
        return false
    }, _getInst: function (target) {
        try {
            return $.data(target, PROP_NAME)
        } catch (err) {
            throw"Missing instance data for this datepicker"
        }
    }, _optionDatepicker: function (target, name, value) {
        var inst = this._getInst(target);
        if (arguments.length == 2 && typeof name == "string") {
            return(name == "defaults" ? $.extend({}, $.datepicker._defaults) : (inst ? (name == "all" ? $.extend({}, inst.settings) : this._get(inst, name)) : null))
        }
        var settings = name || {};
        if (typeof name == "string") {
            settings = {};
            settings[name] = value
        }
        if (inst) {
            if (this._curInst == inst) {
                this._hideDatepicker()
            }
            var date = this._getDateDatepicker(target, true);
            extendRemove(inst.settings, settings);
            this._attachments($(target), inst);
            this._autoSize(inst);
            this._setDateDatepicker(target, date);
            this._updateDatepicker(inst)
        }
    }, _changeDatepicker: function (target, name, value) {
        this._optionDatepicker(target, name, value)
    }, _refreshDatepicker: function (target) {
        var inst = this._getInst(target);
        if (inst) {
            this._updateDatepicker(inst)
        }
    }, _setDateDatepicker: function (target, date) {
        var inst = this._getInst(target);
        if (inst) {
            this._setDate(inst, date);
            this._updateDatepicker(inst);
            this._updateAlternate(inst)
        }
    }, _getDateDatepicker: function (target, noDefault) {
        var inst = this._getInst(target);
        if (inst && !inst.inline) {
            this._setDateFromField(inst, noDefault)
        }
        return(inst ? this._getDate(inst) : null)
    }, _doKeyDown: function (event) {
        var inst = $.datepicker._getInst(event.target);
        var handled = true;
        var isRTL = inst.dpDiv.is(".ui-datepicker-rtl");
        inst._keyEvent = true;
        if ($.datepicker._datepickerShowing) {
            switch (event.keyCode) {
                case 9:
                    $.datepicker._hideDatepicker();
                    handled = false;
                    break;
                case 13:
                    var sel = $("td." + $.datepicker._dayOverClass, inst.dpDiv).add($("td." + $.datepicker._currentClass, inst.dpDiv));
                    if (sel[0]) {
                        $.datepicker._selectDay(event.target, inst.selectedMonth, inst.selectedYear, sel[0])
                    } else {
                        $.datepicker._hideDatepicker()
                    }
                    return false;
                    break;
                case 27:
                    $.datepicker._hideDatepicker();
                    break;
                case 33:
                    $.datepicker._adjustDate(event.target, (event.ctrlKey ? -$.datepicker._get(inst, "stepBigMonths") : -$.datepicker._get(inst, "stepMonths")), "M");
                    break;
                case 34:
                    $.datepicker._adjustDate(event.target, (event.ctrlKey ? +$.datepicker._get(inst, "stepBigMonths") : +$.datepicker._get(inst, "stepMonths")), "M");
                    break;
                case 35:
                    if (event.ctrlKey || event.metaKey) {
                        $.datepicker._clearDate(event.target)
                    }
                    handled = event.ctrlKey || event.metaKey;
                    break;
                case 36:
                    if (event.ctrlKey || event.metaKey) {
                        $.datepicker._gotoToday(event.target)
                    }
                    handled = event.ctrlKey || event.metaKey;
                    break;
                case 37:
                    if (event.ctrlKey || event.metaKey) {
                        $.datepicker._adjustDate(event.target, (isRTL ? +1 : -1), "D")
                    }
                    handled = event.ctrlKey || event.metaKey;
                    if (event.originalEvent.altKey) {
                        $.datepicker._adjustDate(event.target, (event.ctrlKey ? -$.datepicker._get(inst, "stepBigMonths") : -$.datepicker._get(inst, "stepMonths")), "M")
                    }
                    break;
                case 38:
                    if (event.ctrlKey || event.metaKey) {
                        $.datepicker._adjustDate(event.target, -7, "D")
                    }
                    handled = event.ctrlKey || event.metaKey;
                    break;
                case 39:
                    if (event.ctrlKey || event.metaKey) {
                        $.datepicker._adjustDate(event.target, (isRTL ? -1 : +1), "D")
                    }
                    handled = event.ctrlKey || event.metaKey;
                    if (event.originalEvent.altKey) {
                        $.datepicker._adjustDate(event.target, (event.ctrlKey ? +$.datepicker._get(inst, "stepBigMonths") : +$.datepicker._get(inst, "stepMonths")), "M")
                    }
                    break;
                case 40:
                    if (event.ctrlKey || event.metaKey) {
                        $.datepicker._adjustDate(event.target, +7, "D")
                    }
                    handled = event.ctrlKey || event.metaKey;
                    break;
                default:
                    handled = false
            }
        } else {
            if (event.keyCode == 36 && event.ctrlKey) {
                $.datepicker._showDatepicker(this)
            } else {
                handled = false
            }
        }
        if (handled) {
            event.preventDefault();
            event.stopPropagation()
        }
    }, _doKeyPress: function (event) {
        var inst = $.datepicker._getInst(event.target);
        if ($.datepicker._get(inst, "constrainInput")) {
            var chars = $.datepicker._possibleChars($.datepicker._get(inst, "dateFormat"));
            var chr = String.fromCharCode(event.charCode == undefined ? event.keyCode : event.charCode);
            return event.ctrlKey || (chr < " " || !chars || chars.indexOf(chr) > -1)
        }
    }, _doKeyUp: function (event) {
        var inst = $.datepicker._getInst(event.target);
        if (inst.input.val() != inst.lastVal) {
            try {
                var date = $.datepicker.parseDate($.datepicker._get(inst, "dateFormat"), (inst.input ? inst.input.val() : null), $.datepicker._getFormatConfig(inst));
                if (date) {
                    $.datepicker._setDateFromField(inst);
                    $.datepicker._updateAlternate(inst);
                    $.datepicker._updateDatepicker(inst)
                }
            } catch (event) {
                $.datepicker.log(event)
            }
        }
        return true
    }, _showDatepicker: function (input) {
        input = input.target || input;
        if (input.nodeName.toLowerCase() != "input") {
            input = $("input", input.parentNode)[0]
        }
        if ($.datepicker._isDisabledDatepicker(input) || $.datepicker._lastInput == input) {
            return
        }
        var inst = $.datepicker._getInst(input);
        if ($.datepicker._curInst && $.datepicker._curInst != inst) {
            $.datepicker._curInst.dpDiv.stop(true, true)
        }
        var beforeShow = $.datepicker._get(inst, "beforeShow");
        extendRemove(inst.settings, (beforeShow ? beforeShow.apply(input, [input, inst]) : {}));
        inst.lastVal = null;
        $.datepicker._lastInput = input;
        $.datepicker._setDateFromField(inst);
        if ($.datepicker._inDialog) {
            input.value = ""
        }
        if (!$.datepicker._pos) {
            $.datepicker._pos = $.datepicker._findPos(input);
            $.datepicker._pos[1] += input.offsetHeight
        }
        var isFixed = false;
        $(input).parents().each(function () {
            isFixed |= $(this).css("position") == "fixed";
            return !isFixed
        });
        if (isFixed && $.browser.opera) {
            $.datepicker._pos[0] -= document.documentElement.scrollLeft;
            $.datepicker._pos[1] -= document.documentElement.scrollTop
        }
        var offset = {left: $.datepicker._pos[0], top: $.datepicker._pos[1]};
        $.datepicker._pos = null;
        inst.dpDiv.css({position: "absolute", display: "block", top: "-1000px"});
        $.datepicker._updateDatepicker(inst);
        offset = $.datepicker._checkOffset(inst, offset, isFixed);
        inst.dpDiv.css({position: ($.datepicker._inDialog && $.blockUI ? "static" : (isFixed ? "fixed" : "absolute")), display: "none", left: offset.left + "px", top: offset.top + "px"});
        if (!inst.inline) {
            var showAnim = $.datepicker._get(inst, "showAnim");
            var duration = $.datepicker._get(inst, "duration");
            var postProcess = function () {
                $.datepicker._datepickerShowing = true;
                var borders = $.datepicker._getBorders(inst.dpDiv);
                inst.dpDiv.find("iframe.ui-datepicker-cover").css({left: -borders[0], top: -borders[1], width: inst.dpDiv.outerWidth(), height: inst.dpDiv.outerHeight()})
            };
            inst.dpDiv.zIndex($(input).zIndex() + 1);
            if ($.effects && $.effects[showAnim]) {
                inst.dpDiv.show(showAnim, $.datepicker._get(inst, "showOptions"), duration, postProcess)
            } else {
                inst.dpDiv[showAnim || "show"]((showAnim ? duration : null), postProcess)
            }
            if (!showAnim || !duration) {
                postProcess()
            }
            if (inst.input.is(":visible") && !inst.input.is(":disabled")) {
                inst.input.focus()
            }
            $.datepicker._curInst = inst
        }
    }, _updateDatepicker: function (inst) {
        var self = this;
        var borders = $.datepicker._getBorders(inst.dpDiv);
        inst.dpDiv.empty().append(this._generateHTML(inst)).find("iframe.ui-datepicker-cover").css({left: -borders[0], top: -borders[1], width: inst.dpDiv.outerWidth(), height: inst.dpDiv.outerHeight()}).end().find("button, .ui-datepicker-prev, .ui-datepicker-next, .ui-datepicker-calendar td a").bind("mouseout",function () {
            $(this).removeClass("ui-state-hover");
            if (this.className.indexOf("ui-datepicker-prev") != -1) {
                $(this).removeClass("ui-datepicker-prev-hover")
            }
            if (this.className.indexOf("ui-datepicker-next") != -1) {
                $(this).removeClass("ui-datepicker-next-hover")
            }
        }).bind("mouseover",function () {
            if (!self._isDisabledDatepicker(inst.inline ? inst.dpDiv.parent()[0] : inst.input[0])) {
                $(this).parents(".ui-datepicker-calendar").find("a").removeClass("ui-state-hover");
                $(this).addClass("ui-state-hover");
                if (this.className.indexOf("ui-datepicker-prev") != -1) {
                    $(this).addClass("ui-datepicker-prev-hover")
                }
                if (this.className.indexOf("ui-datepicker-next") != -1) {
                    $(this).addClass("ui-datepicker-next-hover")
                }
            }
        }).end().find("." + this._dayOverClass + " a").trigger("mouseover").end();
        var numMonths = this._getNumberOfMonths(inst);
        var cols = numMonths[1];
        var width = 17;
        if (cols > 1) {
            inst.dpDiv.addClass("ui-datepicker-multi-" + cols).css("width", (width * cols) + "em")
        } else {
            inst.dpDiv.removeClass("ui-datepicker-multi-2 ui-datepicker-multi-3 ui-datepicker-multi-4").width("")
        }
        inst.dpDiv[(numMonths[0] != 1 || numMonths[1] != 1 ? "add" : "remove") + "Class"]("ui-datepicker-multi");
        inst.dpDiv[(this._get(inst, "isRTL") ? "add" : "remove") + "Class"]("ui-datepicker-rtl");
        if (inst == $.datepicker._curInst && $.datepicker._datepickerShowing && inst.input && inst.input.is(":visible") && !inst.input.is(":disabled")) {
            inst.input.focus()
        }
    }, _getBorders: function (elem) {
        var convert = function (value) {
            return{thin: 1, medium: 2, thick: 3}[value] || value
        };
        return[parseFloat(convert(elem.css("border-left-width"))), parseFloat(convert(elem.css("border-top-width")))]
    }, _checkOffset: function (inst, offset, isFixed) {
        var dpWidth = inst.dpDiv.outerWidth();
        var dpHeight = inst.dpDiv.outerHeight();
        var inputWidth = inst.input ? inst.input.outerWidth() : 0;
        var inputHeight = inst.input ? inst.input.outerHeight() : 0;
        var viewWidth = document.documentElement.clientWidth + $(document).scrollLeft();
        var viewHeight = document.documentElement.clientHeight + $(document).scrollTop();
        offset.left -= (this._get(inst, "isRTL") ? (dpWidth - inputWidth) : 0);
        offset.left -= (isFixed && offset.left == inst.input.offset().left) ? $(document).scrollLeft() : 0;
        offset.top -= (isFixed && offset.top == (inst.input.offset().top + inputHeight)) ? $(document).scrollTop() : 0;
        offset.left -= Math.min(offset.left, (offset.left + dpWidth > viewWidth && viewWidth > dpWidth) ? Math.abs(offset.left + dpWidth - viewWidth) : 0);
        offset.top -= Math.min(offset.top, (offset.top + dpHeight > viewHeight && viewHeight > dpHeight) ? Math.abs(dpHeight + inputHeight) : 0);
        return offset
    }, _findPos: function (obj) {
        var inst = this._getInst(obj);
        var isRTL = this._get(inst, "isRTL");
        while (obj && (obj.type == "hidden" || obj.nodeType != 1)) {
            obj = obj[isRTL ? "previousSibling" : "nextSibling"]
        }
        var position = $(obj).offset();
        return[position.left, position.top]
    }, _hideDatepicker: function (input) {
        var inst = this._curInst;
        if (!inst || (input && inst != $.data(input, PROP_NAME))) {
            return
        }
        if (this._datepickerShowing) {
            var showAnim = this._get(inst, "showAnim");
            var duration = this._get(inst, "duration");
            var postProcess = function () {
                $.datepicker._tidyDialog(inst);
                this._curInst = null
            };
            if ($.effects && $.effects[showAnim]) {
                inst.dpDiv.hide(showAnim, $.datepicker._get(inst, "showOptions"), duration, postProcess)
            } else {
                inst.dpDiv[(showAnim == "slideDown" ? "slideUp" : (showAnim == "fadeIn" ? "fadeOut" : "hide"))]((showAnim ? duration : null), postProcess)
            }
            if (!showAnim) {
                postProcess()
            }
            var onClose = this._get(inst, "onClose");
            if (onClose) {
                onClose.apply((inst.input ? inst.input[0] : null), [(inst.input ? inst.input.val() : ""), inst])
            }
            this._datepickerShowing = false;
            this._lastInput = null;
            if (this._inDialog) {
                this._dialogInput.css({position: "absolute", left: "0", top: "-100px"});
                if ($.blockUI) {
                    $.unblockUI();
                    $("body").append(this.dpDiv)
                }
            }
            this._inDialog = false
        }
    }, _tidyDialog: function (inst) {
        inst.dpDiv.removeClass(this._dialogClass).unbind(".ui-datepicker-calendar")
    }, _checkExternalClick: function (event) {
        if (!$.datepicker._curInst) {
            return
        }
        var $target = $(event.target);
        if ($target[0].id != $.datepicker._mainDivId && $target.parents("#" + $.datepicker._mainDivId).length == 0 && !$target.hasClass($.datepicker.markerClassName) && !$target.hasClass($.datepicker._triggerClass) && $.datepicker._datepickerShowing && !($.datepicker._inDialog && $.blockUI)) {
            $.datepicker._hideDatepicker()
        }
    }, _adjustDate: function (id, offset, period) {
        var target = $(id);
        var inst = this._getInst(target[0]);
        if (this._isDisabledDatepicker(target[0])) {
            return
        }
        this._adjustInstDate(inst, offset + (period == "M" ? this._get(inst, "showCurrentAtPos") : 0), period);
        this._updateDatepicker(inst)
    }, _gotoToday: function (id) {
        var target = $(id);
        var inst = this._getInst(target[0]);
        if (this._get(inst, "gotoCurrent") && inst.currentDay) {
            inst.selectedDay = inst.currentDay;
            inst.drawMonth = inst.selectedMonth = inst.currentMonth;
            inst.drawYear = inst.selectedYear = inst.currentYear
        } else {
            var date = new Date();
            inst.selectedDay = date.getDate();
            inst.drawMonth = inst.selectedMonth = date.getMonth();
            inst.drawYear = inst.selectedYear = date.getFullYear()
        }
        this._notifyChange(inst);
        this._adjustDate(target)
    }, _selectMonthYear: function (id, select, period) {
        var target = $(id);
        var inst = this._getInst(target[0]);
        inst._selectingMonthYear = false;
        inst["selected" + (period == "M" ? "Month" : "Year")] = inst["draw" + (period == "M" ? "Month" : "Year")] = parseInt(select.options[select.selectedIndex].value, 10);
        this._notifyChange(inst);
        this._adjustDate(target)
    }, _clickMonthYear: function (id) {
        var target = $(id);
        var inst = this._getInst(target[0]);
        if (inst.input && inst._selectingMonthYear && !$.browser.msie) {
            inst.input.focus()
        }
        inst._selectingMonthYear = !inst._selectingMonthYear
    }, _selectDay: function (id, month, year, td) {
        var target = $(id);
        if ($(td).hasClass(this._unselectableClass) || this._isDisabledDatepicker(target[0])) {
            return
        }
        var inst = this._getInst(target[0]);
        inst.selectedDay = inst.currentDay = $("a", td).html();
        inst.selectedMonth = inst.currentMonth = month;
        inst.selectedYear = inst.currentYear = year;
        this._selectDate(id, this._formatDate(inst, inst.currentDay, inst.currentMonth, inst.currentYear))
    }, _clearDate: function (id) {
        var target = $(id);
        var inst = this._getInst(target[0]);
        this._selectDate(target, "")
    }, _selectDate: function (id, dateStr) {
        var target = $(id);
        var inst = this._getInst(target[0]);
        dateStr = (dateStr != null ? dateStr : this._formatDate(inst));
        if (inst.input) {
            inst.input.val(dateStr)
        }
        this._updateAlternate(inst);
        var onSelect = this._get(inst, "onSelect");
        if (onSelect) {
            onSelect.apply((inst.input ? inst.input[0] : null), [dateStr, inst])
        } else {
            if (inst.input) {
                inst.input.trigger("change")
            }
        }
        if (inst.inline) {
            this._updateDatepicker(inst)
        } else {
            this._hideDatepicker();
            this._lastInput = inst.input[0];
            if (typeof(inst.input[0]) != "object") {
                inst.input.focus()
            }
            this._lastInput = null
        }
    }, _updateAlternate: function (inst) {
        var altField = this._get(inst, "altField");
        if (altField) {
            var altFormat = this._get(inst, "altFormat") || this._get(inst, "dateFormat");
            var date = this._getDate(inst);
            var dateStr = this.formatDate(altFormat, date, this._getFormatConfig(inst));
            $(altField).each(function () {
                $(this).val(dateStr)
            })
        }
    }, noWeekends: function (date) {
        var day = date.getDay();
        return[(day > 0 && day < 6), ""]
    }, iso8601Week: function (date) {
        var checkDate = new Date(date.getTime());
        checkDate.setDate(checkDate.getDate() + 4 - (checkDate.getDay() || 7));
        var time = checkDate.getTime();
        checkDate.setMonth(0);
        checkDate.setDate(1);
        return Math.floor(Math.round((time - checkDate) / 86400000) / 7) + 1
    }, parseDate: function (format, value, settings) {
        if (format == null || value == null) {
            throw"Invalid arguments"
        }
        value = (typeof value == "object" ? value.toString() : value + "");
        if (value == "") {
            return null
        }
        var shortYearCutoff = (settings ? settings.shortYearCutoff : null) || this._defaults.shortYearCutoff;
        var dayNamesShort = (settings ? settings.dayNamesShort : null) || this._defaults.dayNamesShort;
        var dayNames = (settings ? settings.dayNames : null) || this._defaults.dayNames;
        var monthNamesShort = (settings ? settings.monthNamesShort : null) || this._defaults.monthNamesShort;
        var monthNames = (settings ? settings.monthNames : null) || this._defaults.monthNames;
        var year = -1;
        var month = -1;
        var day = -1;
        var doy = -1;
        var literal = false;
        var lookAhead = function (match) {
            var matches = (iFormat + 1 < format.length && format.charAt(iFormat + 1) == match);
            if (matches) {
                iFormat++
            }
            return matches
        };
        var getNumber = function (match) {
            lookAhead(match);
            var size = (match == "@" ? 14 : (match == "!" ? 20 : (match == "y" ? 4 : (match == "o" ? 3 : 2))));
            var digits = new RegExp("^\\d{1," + size + "}");
            var num = value.substring(iValue).match(digits);
            if (!num) {
                throw"Missing number at position " + iValue
            }
            iValue += num[0].length;
            return parseInt(num[0], 10)
        };
        var getName = function (match, shortNames, longNames) {
            var names = (lookAhead(match) ? longNames : shortNames);
            for (var i = 0; i < names.length; i++) {
                if (value.substr(iValue, names[i].length) == names[i]) {
                    iValue += names[i].length;
                    return i + 1
                }
            }
            throw"Unknown name at position " + iValue
        };
        var checkLiteral = function () {
            if (value.charAt(iValue) != format.charAt(iFormat)) {
                throw"Unexpected literal at position " + iValue
            }
            iValue++
        };
        var iValue = 0;
        for (var iFormat = 0; iFormat < format.length; iFormat++) {
            if (literal) {
                if (format.charAt(iFormat) == "'" && !lookAhead("'")) {
                    literal = false
                } else {
                    checkLiteral()
                }
            } else {
                switch (format.charAt(iFormat)) {
                    case"d":
                        day = getNumber("d");
                        break;
                    case"D":
                        getName("D", dayNamesShort, dayNames);
                        break;
                    case"o":
                        doy = getNumber("o");
                        break;
                    case"m":
                        month = getNumber("m");
                        break;
                    case"M":
                        month = getName("M", monthNamesShort, monthNames);
                        break;
                    case"y":
                        year = getNumber("y");
                        break;
                    case"@":
                        var date = new Date(getNumber("@"));
                        year = date.getFullYear();
                        month = date.getMonth() + 1;
                        day = date.getDate();
                        break;
                    case"!":
                        var date = new Date((getNumber("!") - this._ticksTo1970) / 10000);
                        year = date.getFullYear();
                        month = date.getMonth() + 1;
                        day = date.getDate();
                        break;
                    case"'":
                        if (lookAhead("'")) {
                            checkLiteral()
                        } else {
                            literal = true
                        }
                        break;
                    default:
                        checkLiteral()
                }
            }
        }
        if (year == -1) {
            year = new Date().getFullYear()
        } else {
            if (year < 100) {
                year += new Date().getFullYear() - new Date().getFullYear() % 100 + (year <= shortYearCutoff ? 0 : -100)
            }
        }
        if (doy > -1) {
            month = 1;
            day = doy;
            do {
                var dim = this._getDaysInMonth(year, month - 1);
                if (day <= dim) {
                    break
                }
                month++;
                day -= dim
            } while (true)
        }
        var date = this._daylightSavingAdjust(new Date(year, month - 1, day));
        if (date.getFullYear() != year || date.getMonth() + 1 != month || date.getDate() != day) {
            throw"Invalid date"
        }
        return date
    }, ATOM: "yy-mm-dd", COOKIE: "D, dd M yy", ISO_8601: "yy-mm-dd", RFC_822: "D, d M y", RFC_850: "DD, dd-M-y", RFC_1036: "D, d M y", RFC_1123: "D, d M yy", RFC_2822: "D, d M yy", RSS: "D, d M y", TICKS: "!", TIMESTAMP: "@", W3C: "yy-mm-dd", _ticksTo1970: (((1970 - 1) * 365 + Math.floor(1970 / 4) - Math.floor(1970 / 100) + Math.floor(1970 / 400)) * 24 * 60 * 60 * 10000000), formatDate: function (format, date, settings) {
        if (!date) {
            return""
        }
        var dayNamesShort = (settings ? settings.dayNamesShort : null) || this._defaults.dayNamesShort;
        var dayNames = (settings ? settings.dayNames : null) || this._defaults.dayNames;
        var monthNamesShort = (settings ? settings.monthNamesShort : null) || this._defaults.monthNamesShort;
        var monthNames = (settings ? settings.monthNames : null) || this._defaults.monthNames;
        var lookAhead = function (match) {
            var matches = (iFormat + 1 < format.length && format.charAt(iFormat + 1) == match);
            if (matches) {
                iFormat++
            }
            return matches
        };
        var formatNumber = function (match, value, len) {
            var num = "" + value;
            if (lookAhead(match)) {
                while (num.length < len) {
                    num = "0" + num
                }
            }
            return num
        };
        var formatName = function (match, value, shortNames, longNames) {
            return(lookAhead(match) ? longNames[value] : shortNames[value])
        };
        var output = "";
        var literal = false;
        if (date) {
            for (var iFormat = 0; iFormat < format.length; iFormat++) {
                if (literal) {
                    if (format.charAt(iFormat) == "'" && !lookAhead("'")) {
                        literal = false
                    } else {
                        output += format.charAt(iFormat)
                    }
                } else {
                    switch (format.charAt(iFormat)) {
                        case"d":
                            output += formatNumber("d", date.getDate(), 2);
                            break;
                        case"D":
                            output += formatName("D", date.getDay(), dayNamesShort, dayNames);
                            break;
                        case"o":
                            output += formatNumber("o", (date.getTime() - new Date(date.getFullYear(), 0, 0).getTime()) / 86400000, 3);
                            break;
                        case"m":
                            output += formatNumber("m", date.getMonth() + 1, 2);
                            break;
                        case"M":
                            output += formatName("M", date.getMonth(), monthNamesShort, monthNames);
                            break;
                        case"y":
                            output += (lookAhead("y") ? date.getFullYear() : (date.getYear() % 100 < 10 ? "0" : "") + date.getYear() % 100);
                            break;
                        case"@":
                            output += date.getTime();
                            break;
                        case"!":
                            output += date.getTime() * 10000 + this._ticksTo1970;
                            break;
                        case"'":
                            if (lookAhead("'")) {
                                output += "'"
                            } else {
                                literal = true
                            }
                            break;
                        default:
                            output += format.charAt(iFormat)
                    }
                }
            }
        }
        return output
    }, _possibleChars: function (format) {
        var chars = "";
        var literal = false;
        var lookAhead = function (match) {
            var matches = (iFormat + 1 < format.length && format.charAt(iFormat + 1) == match);
            if (matches) {
                iFormat++
            }
            return matches
        };
        for (var iFormat = 0; iFormat < format.length; iFormat++) {
            if (literal) {
                if (format.charAt(iFormat) == "'" && !lookAhead("'")) {
                    literal = false
                } else {
                    chars += format.charAt(iFormat)
                }
            } else {
                switch (format.charAt(iFormat)) {
                    case"d":
                    case"m":
                    case"y":
                    case"@":
                        chars += "0123456789";
                        break;
                    case"D":
                    case"M":
                        return null;
                    case"'":
                        if (lookAhead("'")) {
                            chars += "'"
                        } else {
                            literal = true
                        }
                        break;
                    default:
                        chars += format.charAt(iFormat)
                }
            }
        }
        return chars
    }, _get: function (inst, name) {
        return inst.settings[name] !== undefined ? inst.settings[name] : this._defaults[name]
    }, _setDateFromField: function (inst, noDefault) {
        if (inst.input.val() == inst.lastVal) {
            return
        }
        var dateFormat = this._get(inst, "dateFormat");
        var dates = inst.lastVal = inst.input ? inst.input.val() : null;
        var date, defaultDate;
        date = defaultDate = this._getDefaultDate(inst);
        var settings = this._getFormatConfig(inst);
        try {
            date = this.parseDate(dateFormat, dates, settings) || defaultDate
        } catch (event) {
            this.log(event);
            dates = (noDefault ? "" : dates)
        }
        inst.selectedDay = date.getDate();
        inst.drawMonth = inst.selectedMonth = date.getMonth();
        inst.drawYear = inst.selectedYear = date.getFullYear();
        inst.currentDay = (dates ? date.getDate() : 0);
        inst.currentMonth = (dates ? date.getMonth() : 0);
        inst.currentYear = (dates ? date.getFullYear() : 0);
        this._adjustInstDate(inst)
    }, _getDefaultDate: function (inst) {
        return this._restrictMinMax(inst, this._determineDate(inst, this._get(inst, "defaultDate"), new Date()))
    }, _determineDate: function (inst, date, defaultDate) {
        var offsetNumeric = function (offset) {
            var date = new Date();
            date.setDate(date.getDate() + offset);
            return date
        };
        var offsetString = function (offset) {
            try {
                return $.datepicker.parseDate($.datepicker._get(inst, "dateFormat"), offset, $.datepicker._getFormatConfig(inst))
            } catch (e) {
            }
            var date = (offset.toLowerCase().match(/^c/) ? $.datepicker._getDate(inst) : null) || new Date();
            var year = date.getFullYear();
            var month = date.getMonth();
            var day = date.getDate();
            var pattern = /([+-]?[0-9]+)\s*(d|D|w|W|m|M|y|Y)?/g;
            var matches = pattern.exec(offset);
            while (matches) {
                switch (matches[2] || "d") {
                    case"d":
                    case"D":
                        day += parseInt(matches[1], 10);
                        break;
                    case"w":
                    case"W":
                        day += parseInt(matches[1], 10) * 7;
                        break;
                    case"m":
                    case"M":
                        month += parseInt(matches[1], 10);
                        day = Math.min(day, $.datepicker._getDaysInMonth(year, month));
                        break;
                    case"y":
                    case"Y":
                        year += parseInt(matches[1], 10);
                        day = Math.min(day, $.datepicker._getDaysInMonth(year, month));
                        break
                }
                matches = pattern.exec(offset)
            }
            return new Date(year, month, day)
        };
        date = (date == null ? defaultDate : (typeof date == "string" ? offsetString(date) : (typeof date == "number" ? (isNaN(date) ? defaultDate : offsetNumeric(date)) : date)));
        date = (date && date.toString() == "Invalid Date" ? defaultDate : date);
        if (date) {
            date.setHours(0);
            date.setMinutes(0);
            date.setSeconds(0);
            date.setMilliseconds(0)
        }
        return this._daylightSavingAdjust(date)
    }, _daylightSavingAdjust: function (date) {
        if (!date) {
            return null
        }
        date.setHours(date.getHours() > 12 ? date.getHours() + 2 : 0);
        return date
    }, _setDate: function (inst, date, noChange) {
        var clear = !(date);
        var origMonth = inst.selectedMonth;
        var origYear = inst.selectedYear;
        date = this._restrictMinMax(inst, this._determineDate(inst, date, new Date()));
        inst.selectedDay = inst.currentDay = date.getDate();
        inst.drawMonth = inst.selectedMonth = inst.currentMonth = date.getMonth();
        inst.drawYear = inst.selectedYear = inst.currentYear = date.getFullYear();
        if ((origMonth != inst.selectedMonth || origYear != inst.selectedYear) && !noChange) {
            this._notifyChange(inst)
        }
        this._adjustInstDate(inst);
        if (inst.input) {
            inst.input.val(clear ? "" : this._formatDate(inst))
        }
    }, _getDate: function (inst) {
        var startDate = (!inst.currentYear || (inst.input && inst.input.val() == "") ? null : this._daylightSavingAdjust(new Date(inst.currentYear, inst.currentMonth, inst.currentDay)));
        return startDate
    }, _generateHTML: function (inst) {
        var today = new Date();
        today = this._daylightSavingAdjust(new Date(today.getFullYear(), today.getMonth(), today.getDate()));
        var isRTL = this._get(inst, "isRTL");
        var showButtonPanel = this._get(inst, "showButtonPanel");
        var hideIfNoPrevNext = this._get(inst, "hideIfNoPrevNext");
        var navigationAsDateFormat = this._get(inst, "navigationAsDateFormat");
        var numMonths = this._getNumberOfMonths(inst);
        var showCurrentAtPos = this._get(inst, "showCurrentAtPos");
        var stepMonths = this._get(inst, "stepMonths");
        var isMultiMonth = (numMonths[0] != 1 || numMonths[1] != 1);
        var currentDate = this._daylightSavingAdjust((!inst.currentDay ? new Date(9999, 9, 9) : new Date(inst.currentYear, inst.currentMonth, inst.currentDay)));
        var minDate = this._getMinMaxDate(inst, "min");
        var maxDate = this._getMinMaxDate(inst, "max");
        var drawMonth = inst.drawMonth - showCurrentAtPos;
        var drawYear = inst.drawYear;
        if (drawMonth < 0) {
            drawMonth += 12;
            drawYear--
        }
        if (maxDate) {
            var maxDraw = this._daylightSavingAdjust(new Date(maxDate.getFullYear(), maxDate.getMonth() - (numMonths[0] * numMonths[1]) + 1, maxDate.getDate()));
            maxDraw = (minDate && maxDraw < minDate ? minDate : maxDraw);
            while (this._daylightSavingAdjust(new Date(drawYear, drawMonth, 1)) > maxDraw) {
                drawMonth--;
                if (drawMonth < 0) {
                    drawMonth = 11;
                    drawYear--
                }
            }
        }
        inst.drawMonth = drawMonth;
        inst.drawYear = drawYear;
        var prevText = this._get(inst, "prevText");
        prevText = (!navigationAsDateFormat ? prevText : this.formatDate(prevText, this._daylightSavingAdjust(new Date(drawYear, drawMonth - stepMonths, 1)), this._getFormatConfig(inst)));
        var prev = (this._canAdjustMonth(inst, -1, drawYear, drawMonth) ? '<a class="ui-datepicker-prev ui-corner-all" onclick="DP_jQuery_' + dpuuid + ".datepicker._adjustDate('#" + inst.id + "', -" + stepMonths + ", 'M');\" title=\"" + prevText + '"><span class="ui-icon ui-icon-circle-triangle-' + (isRTL ? "e" : "w") + '">' + prevText + "</span></a>" : (hideIfNoPrevNext ? "" : '<a class="ui-datepicker-prev ui-corner-all ui-state-disabled" title="' + prevText + '"><span class="ui-icon ui-icon-circle-triangle-' + (isRTL ? "e" : "w") + '">' + prevText + "</span></a>"));
        var nextText = this._get(inst, "nextText");
        nextText = (!navigationAsDateFormat ? nextText : this.formatDate(nextText, this._daylightSavingAdjust(new Date(drawYear, drawMonth + stepMonths, 1)), this._getFormatConfig(inst)));
        var next = (this._canAdjustMonth(inst, +1, drawYear, drawMonth) ? '<a class="ui-datepicker-next ui-corner-all" onclick="DP_jQuery_' + dpuuid + ".datepicker._adjustDate('#" + inst.id + "', +" + stepMonths + ", 'M');\" title=\"" + nextText + '"><span class="ui-icon ui-icon-circle-triangle-' + (isRTL ? "w" : "e") + '">' + nextText + "</span></a>" : (hideIfNoPrevNext ? "" : '<a class="ui-datepicker-next ui-corner-all ui-state-disabled" title="' + nextText + '"><span class="ui-icon ui-icon-circle-triangle-' + (isRTL ? "w" : "e") + '">' + nextText + "</span></a>"));
        var currentText = this._get(inst, "currentText");
        var gotoDate = (this._get(inst, "gotoCurrent") && inst.currentDay ? currentDate : today);
        currentText = (!navigationAsDateFormat ? currentText : this.formatDate(currentText, gotoDate, this._getFormatConfig(inst)));
        var controls = (!inst.inline ? '<button type="button" class="ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all" onclick="DP_jQuery_' + dpuuid + '.datepicker._hideDatepicker();">' + this._get(inst, "closeText") + "</button>" : "");
        var buttonPanel = (showButtonPanel) ? '<div class="ui-datepicker-buttonpane ui-widget-content">' + (isRTL ? controls : "") + (this._isInRange(inst, gotoDate) ? '<button type="button" class="ui-datepicker-current ui-state-default ui-priority-secondary ui-corner-all" onclick="DP_jQuery_' + dpuuid + ".datepicker._gotoToday('#" + inst.id + "');\">" + currentText + "</button>" : "") + (isRTL ? "" : controls) + "</div>" : "";
        var firstDay = parseInt(this._get(inst, "firstDay"), 10);
        firstDay = (isNaN(firstDay) ? 0 : firstDay);
        var showWeek = this._get(inst, "showWeek");
        var dayNames = this._get(inst, "dayNames");
        var dayNamesShort = this._get(inst, "dayNamesShort");
        var dayNamesMin = this._get(inst, "dayNamesMin");
        var monthNames = this._get(inst, "monthNames");
        var monthNamesShort = this._get(inst, "monthNamesShort");
        var beforeShowDay = this._get(inst, "beforeShowDay");
        var showOtherMonths = this._get(inst, "showOtherMonths");
        var selectOtherMonths = this._get(inst, "selectOtherMonths");
        var calculateWeek = this._get(inst, "calculateWeek") || this.iso8601Week;
        var defaultDate = this._getDefaultDate(inst);
        var html = "";
        for (var row = 0; row < numMonths[0]; row++) {
            var group = "";
            for (var col = 0; col < numMonths[1]; col++) {
                var selectedDate = this._daylightSavingAdjust(new Date(drawYear, drawMonth, inst.selectedDay));
                var cornerClass = " ui-corner-all";
                var calender = "";
                if (isMultiMonth) {
                    calender += '<div class="ui-datepicker-group';
                    if (numMonths[1] > 1) {
                        switch (col) {
                            case 0:
                                calender += " ui-datepicker-group-first";
                                cornerClass = " ui-corner-" + (isRTL ? "right" : "left");
                                break;
                            case numMonths[1] - 1:
                                calender += " ui-datepicker-group-last";
                                cornerClass = " ui-corner-" + (isRTL ? "left" : "right");
                                break;
                            default:
                                calender += " ui-datepicker-group-middle";
                                cornerClass = "";
                                break
                        }
                    }
                    calender += '">'
                }
                calender += '<div class="ui-datepicker-header ui-widget-header ui-helper-clearfix' + cornerClass + '">' + (/all|left/.test(cornerClass) && row == 0 ? (isRTL ? next : prev) : "") + (/all|right/.test(cornerClass) && row == 0 ? (isRTL ? prev : next) : "") + this._generateMonthYearHeader(inst, drawMonth, drawYear, minDate, maxDate, row > 0 || col > 0, monthNames, monthNamesShort) + '</div><table class="ui-datepicker-calendar"><thead><tr>';
                var thead = (showWeek ? '<th class="ui-datepicker-week-col">' + this._get(inst, "weekHeader") + "</th>" : "");
                for (var dow = 0; dow < 7; dow++) {
                    var day = (dow + firstDay) % 7;
                    thead += "<th" + ((dow + firstDay + 6) % 7 >= 5 ? ' class="ui-datepicker-week-end"' : "") + '><span title="' + dayNames[day] + '">' + dayNamesMin[day] + "</span></th>"
                }
                calender += thead + "</tr></thead><tbody>";
                var daysInMonth = this._getDaysInMonth(drawYear, drawMonth);
                if (drawYear == inst.selectedYear && drawMonth == inst.selectedMonth) {
                    inst.selectedDay = Math.min(inst.selectedDay, daysInMonth)
                }
                var leadDays = (this._getFirstDayOfMonth(drawYear, drawMonth) - firstDay + 7) % 7;
                var numRows = (isMultiMonth ? 6 : Math.ceil((leadDays + daysInMonth) / 7));
                var printDate = this._daylightSavingAdjust(new Date(drawYear, drawMonth, 1 - leadDays));
                for (var dRow = 0; dRow < numRows; dRow++) {
                    calender += "<tr>";
                    var tbody = (!showWeek ? "" : '<td class="ui-datepicker-week-col">' + this._get(inst, "calculateWeek")(printDate) + "</td>");
                    for (var dow = 0; dow < 7; dow++) {
                        var daySettings = (beforeShowDay ? beforeShowDay.apply((inst.input ? inst.input[0] : null), [printDate]) : [true, ""]);
                        var otherMonth = (printDate.getMonth() != drawMonth);
                        var unselectable = (otherMonth && !selectOtherMonths) || !daySettings[0] || (minDate && printDate < minDate) || (maxDate && printDate > maxDate);
                        tbody += '<td class="' + ((dow + firstDay + 6) % 7 >= 5 ? " ui-datepicker-week-end" : "") + (otherMonth ? " ui-datepicker-other-month" : "") + ((printDate.getTime() == selectedDate.getTime() && drawMonth == inst.selectedMonth && inst._keyEvent) || (defaultDate.getTime() == printDate.getTime() && defaultDate.getTime() == selectedDate.getTime()) ? " " + this._dayOverClass : "") + (unselectable ? " " + this._unselectableClass + " ui-state-disabled" : "") + (otherMonth && !showOtherMonths ? "" : " " + daySettings[1] + (printDate.getTime() == currentDate.getTime() ? " " + this._currentClass : "") + (printDate.getTime() == today.getTime() ? " ui-datepicker-today" : "")) + '"' + ((!otherMonth || showOtherMonths) && daySettings[2] ? ' title="' + daySettings[2] + '"' : "") + (unselectable ? "" : ' onclick="DP_jQuery_' + dpuuid + ".datepicker._selectDay('#" + inst.id + "'," + printDate.getMonth() + "," + printDate.getFullYear() + ', this);return false;"') + ">" + (otherMonth && !showOtherMonths ? "&#xa0;" : (unselectable ? '<span class="ui-state-default">' + printDate.getDate() + "</span>" : '<a class="ui-state-default' + (printDate.getTime() == today.getTime() ? " ui-state-highlight" : "") + (printDate.getTime() == currentDate.getTime() ? " ui-state-active" : "") + (otherMonth ? " ui-priority-secondary" : "") + '" href="#">' + printDate.getDate() + "</a>")) + "</td>";
                        printDate.setDate(printDate.getDate() + 1);
                        printDate = this._daylightSavingAdjust(printDate)
                    }
                    calender += tbody + "</tr>"
                }
                drawMonth++;
                if (drawMonth > 11) {
                    drawMonth = 0;
                    drawYear++
                }
                calender += "</tbody></table>" + (isMultiMonth ? "</div>" + ((numMonths[0] > 0 && col == numMonths[1] - 1) ? '<div class="ui-datepicker-row-break"></div>' : "") : "");
                group += calender
            }
            html += group
        }
        html += buttonPanel + ($.browser.msie && parseInt($.browser.version, 10) < 7 && !inst.inline ? '<iframe src="javascript:false;" class="ui-datepicker-cover" frameborder="0"></iframe>' : "");
        inst._keyEvent = false;
        return html
    }, _generateMonthYearHeader: function (inst, drawMonth, drawYear, minDate, maxDate, secondary, monthNames, monthNamesShort) {
        var changeMonth = this._get(inst, "changeMonth");
        var changeYear = this._get(inst, "changeYear");
        var showMonthAfterYear = this._get(inst, "showMonthAfterYear");
        var html = '<div class="ui-datepicker-title">';
        var monthHtml = "";
        if (secondary || !changeMonth) {
            monthHtml += '<span class="ui-datepicker-month">' + monthNames[drawMonth] + "</span>"
        } else {
            var inMinYear = (minDate && minDate.getFullYear() == drawYear);
            var inMaxYear = (maxDate && maxDate.getFullYear() == drawYear);
            monthHtml += '<select class="ui-datepicker-month" onchange="DP_jQuery_' + dpuuid + ".datepicker._selectMonthYear('#" + inst.id + "', this, 'M');\" onclick=\"DP_jQuery_" + dpuuid + ".datepicker._clickMonthYear('#" + inst.id + "');\">";
            for (var month = 0; month < 12; month++) {
                if ((!inMinYear || month >= minDate.getMonth()) && (!inMaxYear || month <= maxDate.getMonth())) {
                    monthHtml += '<option value="' + month + '"' + (month == drawMonth ? ' selected="selected"' : "") + ">" + monthNamesShort[month] + "</option>"
                }
            }
            monthHtml += "</select>"
        }
        if (!showMonthAfterYear) {
            html += monthHtml + (secondary || !(changeMonth && changeYear) ? "&#xa0;" : "")
        }
        if (secondary || !changeYear) {
            html += '<span class="ui-datepicker-year">' + drawYear + "</span>"
        } else {
            var years = this._get(inst, "yearRange").split(":");
            var thisYear = new Date().getFullYear();
            var determineYear = function (value) {
                var year = (value.match(/c[+-].*/) ? drawYear + parseInt(value.substring(1), 10) : (value.match(/[+-].*/) ? thisYear + parseInt(value, 10) : parseInt(value, 10)));
                return(isNaN(year) ? thisYear : year)
            };
            var year = determineYear(years[0]);
            var endYear = Math.max(year, determineYear(years[1] || ""));
            year = (minDate ? Math.max(year, minDate.getFullYear()) : year);
            endYear = (maxDate ? Math.min(endYear, maxDate.getFullYear()) : endYear);
            html += '<select class="ui-datepicker-year" onchange="DP_jQuery_' + dpuuid + ".datepicker._selectMonthYear('#" + inst.id + "', this, 'Y');\" onclick=\"DP_jQuery_" + dpuuid + ".datepicker._clickMonthYear('#" + inst.id + "');\">";
            for (; year <= endYear; year++) {
                html += '<option value="' + year + '"' + (year == drawYear ? ' selected="selected"' : "") + ">" + year + "</option>"
            }
            html += "</select>"
        }
        html += this._get(inst, "yearSuffix");
        if (showMonthAfterYear) {
            html += (secondary || !(changeMonth && changeYear) ? "&#xa0;" : "") + monthHtml
        }
        html += "</div>";
        return html
    }, _adjustInstDate: function (inst, offset, period) {
        var year = inst.drawYear + (period == "Y" ? offset : 0);
        var month = inst.drawMonth + (period == "M" ? offset : 0);
        var day = Math.min(inst.selectedDay, this._getDaysInMonth(year, month)) + (period == "D" ? offset : 0);
        var date = this._restrictMinMax(inst, this._daylightSavingAdjust(new Date(year, month, day)));
        inst.selectedDay = date.getDate();
        inst.drawMonth = inst.selectedMonth = date.getMonth();
        inst.drawYear = inst.selectedYear = date.getFullYear();
        if (period == "M" || period == "Y") {
            this._notifyChange(inst)
        }
    }, _restrictMinMax: function (inst, date) {
        var minDate = this._getMinMaxDate(inst, "min");
        var maxDate = this._getMinMaxDate(inst, "max");
        date = (minDate && date < minDate ? minDate : date);
        date = (maxDate && date > maxDate ? maxDate : date);
        return date
    }, _notifyChange: function (inst) {
        var onChange = this._get(inst, "onChangeMonthYear");
        if (onChange) {
            onChange.apply((inst.input ? inst.input[0] : null), [inst.selectedYear, inst.selectedMonth + 1, inst])
        }
    }, _getNumberOfMonths: function (inst) {
        var numMonths = this._get(inst, "numberOfMonths");
        return(numMonths == null ? [1, 1] : (typeof numMonths == "number" ? [1, numMonths] : numMonths))
    }, _getMinMaxDate: function (inst, minMax) {
        return this._determineDate(inst, this._get(inst, minMax + "Date"), null)
    }, _getDaysInMonth: function (year, month) {
        return 32 - new Date(year, month, 32).getDate()
    }, _getFirstDayOfMonth: function (year, month) {
        return new Date(year, month, 1).getDay()
    }, _canAdjustMonth: function (inst, offset, curYear, curMonth) {
        var numMonths = this._getNumberOfMonths(inst);
        var date = this._daylightSavingAdjust(new Date(curYear, curMonth + (offset < 0 ? offset : numMonths[0] * numMonths[1]), 1));
        if (offset < 0) {
            date.setDate(this._getDaysInMonth(date.getFullYear(), date.getMonth()))
        }
        return this._isInRange(inst, date)
    }, _isInRange: function (inst, date) {
        var minDate = this._getMinMaxDate(inst, "min");
        var maxDate = this._getMinMaxDate(inst, "max");
        return((!minDate || date.getTime() >= minDate.getTime()) && (!maxDate || date.getTime() <= maxDate.getTime()))
    }, _getFormatConfig: function (inst) {
        var shortYearCutoff = this._get(inst, "shortYearCutoff");
        shortYearCutoff = (typeof shortYearCutoff != "string" ? shortYearCutoff : new Date().getFullYear() % 100 + parseInt(shortYearCutoff, 10));
        return{shortYearCutoff: shortYearCutoff, dayNamesShort: this._get(inst, "dayNamesShort"), dayNames: this._get(inst, "dayNames"), monthNamesShort: this._get(inst, "monthNamesShort"), monthNames: this._get(inst, "monthNames")}
    }, _formatDate: function (inst, day, month, year) {
        if (!day) {
            inst.currentDay = inst.selectedDay;
            inst.currentMonth = inst.selectedMonth;
            inst.currentYear = inst.selectedYear
        }
        var date = (day ? (typeof day == "object" ? day : this._daylightSavingAdjust(new Date(year, month, day))) : this._daylightSavingAdjust(new Date(inst.currentYear, inst.currentMonth, inst.currentDay)));
        return this.formatDate(this._get(inst, "dateFormat"), date, this._getFormatConfig(inst))
    }});
    function extendRemove(target, props) {
        $.extend(target, props);
        for (var name in props) {
            if (props[name] == null || props[name] == undefined) {
                target[name] = props[name]
            }
        }
        return target
    }

    function isArray(a) {
        return(a && (($.browser.safari && typeof a == "object" && a.length) || (a.constructor && a.constructor.toString().match(/\Array\(\)/))))
    }

    $.fn.datepicker = function (options) {
        if (!$.datepicker.initialized) {
            $(document).mousedown($.datepicker._checkExternalClick).find("body").append($.datepicker.dpDiv);
            $.datepicker.initialized = true
        }
        var otherArgs = Array.prototype.slice.call(arguments, 1);
        if (typeof options == "string" && (options == "isDisabled" || options == "getDate" || options == "widget")) {
            return $.datepicker["_" + options + "Datepicker"].apply($.datepicker, [this[0]].concat(otherArgs))
        }
        if (options == "option" && arguments.length == 2 && typeof arguments[1] == "string") {
            return $.datepicker["_" + options + "Datepicker"].apply($.datepicker, [this[0]].concat(otherArgs))
        }
        return this.each(function () {
            typeof options == "string" ? $.datepicker["_" + options + "Datepicker"].apply($.datepicker, [this].concat(otherArgs)) : $.datepicker._attachDatepicker(this, options)
        })
    };
    $.datepicker = new Datepicker();
    $.datepicker.initialized = false;
    $.datepicker.uuid = new Date().getTime();
    $.datepicker.version = "1.8";
    window["DP_jQuery_" + dpuuid] = $
})(jQuery);
/*!
 * jQuery UI 1.8.16
 *
 * Copyright 2011, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI
 */
(function (e, d) {
    function b(f, c) {
        var g = f.nodeName.toLowerCase();
        if ("area" === g) {
            c = f.parentNode;
            g = c.name;
            if (!f.href || !g || c.nodeName.toLowerCase() !== "map") {
                return false
            }
            f = e("img[usemap=#" + g + "]")[0];
            return !!f && a(f)
        }
        return(/input|select|textarea|button|object/.test(g) ? !f.disabled : "a" == g ? f.href || c : c) && a(f)
    }

    function a(c) {
        return !e(c).parents().andSelf().filter(function () {
            return e.curCSS(this, "visibility") === "hidden" || e.expr.filters.hidden(this)
        }).length
    }

    e.ui = e.ui || {};
    if (!e.ui.version) {
        e.extend(e.ui, {version: "1.8.16", keyCode: {ALT: 18, BACKSPACE: 8, CAPS_LOCK: 20, COMMA: 188, COMMAND: 91, COMMAND_LEFT: 91, COMMAND_RIGHT: 93, CONTROL: 17, DELETE: 46, DOWN: 40, END: 35, ENTER: 13, ESCAPE: 27, HOME: 36, INSERT: 45, LEFT: 37, MENU: 93, NUMPAD_ADD: 107, NUMPAD_DECIMAL: 110, NUMPAD_DIVIDE: 111, NUMPAD_ENTER: 108, NUMPAD_MULTIPLY: 106, NUMPAD_SUBTRACT: 109, PAGE_DOWN: 34, PAGE_UP: 33, PERIOD: 190, RIGHT: 39, SHIFT: 16, SPACE: 32, TAB: 9, UP: 38, WINDOWS: 91}});
        e.fn.extend({propAttr: e.fn.prop || e.fn.attr, _focus: e.fn.focus, focus: function (f, c) {
            return typeof f === "number" ? this.each(function () {
                var g = this;
                setTimeout(function () {
                    e(g).focus();
                    c && c.call(g)
                }, f)
            }) : this._focus.apply(this, arguments)
        }, scrollParent: function () {
            var c;
            c = e.browser.msie && /(static|relative)/.test(this.css("position")) || /absolute/.test(this.css("position")) ? this.parents().filter(function () {
                return/(relative|absolute|fixed)/.test(e.curCSS(this, "position", 1)) && /(auto|scroll)/.test(e.curCSS(this, "overflow", 1) + e.curCSS(this, "overflow-y", 1) + e.curCSS(this, "overflow-x", 1))
            }).eq(0) : this.parents().filter(function () {
                return/(auto|scroll)/.test(e.curCSS(this, "overflow", 1) + e.curCSS(this, "overflow-y", 1) + e.curCSS(this, "overflow-x", 1))
            }).eq(0);
            return/fixed/.test(this.css("position")) || !c.length ? e(document) : c
        }, zIndex: function (f) {
            if (f !== d) {
                return this.css("zIndex", f)
            }
            if (this.length) {
                f = e(this[0]);
                for (var c; f.length && f[0] !== document;) {
                    c = f.css("position");
                    if (c === "absolute" || c === "relative" || c === "fixed") {
                        c = parseInt(f.css("zIndex"), 10);
                        if (!isNaN(c) && c !== 0) {
                            return c
                        }
                    }
                    f = f.parent()
                }
            }
            return 0
        }, disableSelection: function () {
            return this.bind((e.support.selectstart ? "selectstart" : "mousedown") + ".ui-disableSelection", function (c) {
                c.preventDefault()
            })
        }, enableSelection: function () {
            return this.unbind(".ui-disableSelection")
        }});
        e.each(["Width", "Height"], function (f, c) {
            function l(o, i, h, p) {
                e.each(k, function () {
                    i -= parseFloat(e.curCSS(o, "padding" + this, true)) || 0;
                    if (h) {
                        i -= parseFloat(e.curCSS(o, "border" + this + "Width", true)) || 0
                    }
                    if (p) {
                        i -= parseFloat(e.curCSS(o, "margin" + this, true)) || 0
                    }
                });
                return i
            }

            var k = c === "Width" ? ["Left", "Right"] : ["Top", "Bottom"], j = c.toLowerCase(), g = {innerWidth: e.fn.innerWidth, innerHeight: e.fn.innerHeight, outerWidth: e.fn.outerWidth, outerHeight: e.fn.outerHeight};
            e.fn["inner" + c] = function (h) {
                if (h === d) {
                    return g["inner" + c].call(this)
                }
                return this.each(function () {
                    e(this).css(j, l(this, h) + "px")
                })
            };
            e.fn["outer" + c] = function (i, h) {
                if (typeof i !== "number") {
                    return g["outer" + c].call(this, i)
                }
                return this.each(function () {
                    e(this).css(j, l(this, i, true, h) + "px")
                })
            }
        });
        e.extend(e.expr[":"], {data: function (f, c, g) {
            return !!e.data(f, g[3])
        }, focusable: function (c) {
            return b(c, !isNaN(e.attr(c, "tabindex")))
        }, tabbable: function (f) {
            var c = e.attr(f, "tabindex"), g = isNaN(c);
            return(g || c >= 0) && b(f, !g)
        }});
        e(function () {
            var f = document.body, c = f.appendChild(c = document.createElement("div"));
            e.extend(c.style, {minHeight: "100px", height: "auto", padding: 0, borderWidth: 0});
            e.support.minHeight = c.offsetHeight === 100;
            e.support.selectstart = "onselectstart" in c;
            f.removeChild(c).style.display = "none"
        });
        e.extend(e.ui, {plugin: {add: function (f, c, h) {
            f = e.ui[f].prototype;
            for (var g in h) {
                f.plugins[g] = f.plugins[g] || [];
                f.plugins[g].push([c, h[g]])
            }
        }, call: function (f, c, h) {
            if ((c = f.plugins[c]) && f.element[0].parentNode) {
                for (var g = 0; g < c.length; g++) {
                    f.options[c[g][0]] && c[g][1].apply(f.element, h)
                }
            }
        }}, contains: function (f, c) {
            return document.compareDocumentPosition ? f.compareDocumentPosition(c) & 16 : f !== c && f.contains(c)
        }, hasScroll: function (f, c) {
            if (e(f).css("overflow") === "hidden") {
                return false
            }
            c = c && c === "left" ? "scrollLeft" : "scrollTop";
            var g = false;
            if (f[c] > 0) {
                return true
            }
            f[c] = 1;
            g = f[c] > 0;
            f[c] = 0;
            return g
        }, isOverAxis: function (f, c, g) {
            return f > c && f < c + g
        }, isOver: function (f, c, l, k, j, g) {
            return e.ui.isOverAxis(f, l, j) && e.ui.isOverAxis(c, k, g)
        }})
    }
})(jQuery);
var IE6 = jQuery.browser.msie && jQuery.browser.version == 6;
function createOverlays(e) {
    var d = jQuery("#thewindowbackground");
    var a = jQuery(window).width() / 2;
    var c = jQuery(window).height() / 2;
    var b = jQuery(window).scrollTop();
    if (IE6) {
        d.css({width: jQuery(document).width() - 18, height: jQuery(document).height(), position: "absolute", top: 0, left: 0, zIndex: 900, background: "#000000", opacity: 0})
    } else {
        d.css({width: jQuery(document).width(), height: jQuery(document).height(), position: "absolute", top: 0, left: 0, zIndex: 900, background: "#000000", opacity: 0})
    }
    d.fadeTo("fast", 0.7, function () {
        jQuery("#" + e).css({display: "block", top: c + b - jQuery("#" + e).outerHeight() / 2, left: a - jQuery("#" + e).outerWidth() / 2})
    });
    jQuery(window).resize(function () {
        var h = jQuery(window).height() / 2;
        var f = jQuery(window).width() / 2;
        var g = jQuery(window).scrollTop();
        if (IE6) {
            d.css({width: jQuery(document).width() - 18})
        } else {
            d.css({width: jQuery(document).width()})
        }
        jQuery("#" + e).css({top: h + g - jQuery("#" + e).outerHeight() / 2, left: f - jQuery("#" + e).outerWidth() / 2})
    });
    jQuery(window).scroll(function () {
        var h = jQuery(window).height() / 2;
        var f = jQuery(window).width() / 2;
        var g = jQuery(window).scrollTop();
        if (IE6) {
            d.css({width: jQuery(document).width() - 18})
        } else {
            d.css({width: jQuery(document).width(), height: jQuery(document).height()})
        }
        jQuery("#" + e).css({top: h + g - jQuery("#" + e).outerHeight() / 2, left: f - jQuery("#" + e).outerWidth() / 2})
    });
    if (jQuery("#fbPopupMenu_" + e).find("li.Hilite").hasClass("ha")) {
        autoPlay(jQuery("#img_" + e), e)
    }
    jQuery(d).bind("click", function () {
        closeVideo(e);
        return false
    });
    jQuery("#fbclose_" + e).bind("click", function () {
        closeVideo(e);
        return false
    });
    jQuery("#" + e + " .PopupCloseBtn").bind("click", function () {
        closeVideo(e);
        return false
    })
}
function closeVideo(a) {
    jQuery("#" + a).css({display: "none"});
    jQuery("#thewindowbackground").fadeOut("fast", function () {
        jQuery("#" + a).css({display: "none"})
    });
    if (a == "MusicOverlays") {
        jQuery("#" + a).remove()
    }
}
jQuery(document).ready(function () {
    jQuery("#search_result a.OpenPopup,.VatPham a.OpenPopup").live("click", function (b) {
        var a = "#" + jQuery(this).attr("rel");
        jQuery('<div id="itemDetail_" class="PopupItem"></div>').appendTo("body");
        jQuery("#itemDetail_").html(jQuery(a).html());
        createOverlays("itemDetail_");
        jQuery("a.Close").bind("click", function () {
            closeVideo("itemDetail_");
            jQuery("#itemDetail_").remove();
            return false
        });
        return false
    })
});
if (!window.google) {
    window.google = {}
}
if (!window.google["loader"]) {
    window.google["loader"] = {};
    google.loader.ServiceBase = "http://www.google.com/uds";
    google.loader.GoogleApisBase = "http://ajax.googleapis.com/ajax";
    google.loader.ApiKey = "ABQIAAAAFGt2tNueBCgGbr-NMM7dLBQopir_rissVF8roeqrTT1JQQnkFhSiC7Cw0eqEpLuJ6kt76uZZmAxqNQ";
    google.loader.KeyVerified = false;
    google.loader.LoadFailure = true;
    google.loader.Secure = false;
    google.loader.GoogleLocale = "www.google.com";
    google.loader.ClientLocation = null;
    google.loader.AdditionalParams = "";
    (function () {
        var d = true, g = null, h = false, j = encodeURIComponent, l = window, n = undefined, o = document;

        function p(a, b) {
            return a.load = b
        }

        var q = "push", r = "replace", s = "charAt", t = "indexOf", u = "ServiceBase", v = "name", w = "getTime", x = "length", y = "prototype", z = "setTimeout", A = "loader", B = "substring", C = "join", D = "toLowerCase";

        function E(a) {
            if (a in F) {
                return F[a]
            }
            return F[a] = navigator.userAgent[D]()[t](a) != -1
        }

        var F = {};

        function G(a, b) {
            var c = function () {
            };
            c.prototype = b[y];
            a.S = b[y];
            a.prototype = new c
        }

        function H(a, b) {
            var c = Array[y].slice.call(arguments, 2) || [];
            return function () {
                var e = c.concat(Array[y].slice.call(arguments));
                return a.apply(b, e)
            }
        }

        function I(a) {
            a = Error(a);
            a.toString = function () {
                return this.message
            };
            return a
        }

        function J(a, b) {
            for (var c = a.split(/\./), e = l, f = 0; f < c[x] - 1; f++) {
                e[c[f]] || (e[c[f]] = {});
                e = e[c[f]]
            }
            e[c[c[x] - 1]] = b
        }

        function K(a, b, c) {
            a[b] = c
        }

        if (!L) {
            var L = J
        }
        if (!M) {
            var M = K
        }
        google[A].t = {};
        L("google.loader.callbacks", google[A].t);
        var N = {}, O = {};
        google[A].eval = {};
        L("google.loader.eval", google[A].eval);
        p(google, function (a, b, c) {
            function e(k) {
                var m = k.split(".");
                if (m[x] > 2) {
                    throw I("Module: '" + k + "' not found!")
                } else {
                    if (typeof m[1] != "undefined") {
                        f = m[0];
                        c.packages = c.packages || [];
                        c.packages[q](m[1])
                    }
                }
            }

            var f = a;
            c = c || {};
            if (a instanceof Array || a && typeof a == "object" && typeof a[C] == "function" && typeof a.reverse == "function") {
                for (var i = 0; i < a[x]; i++) {
                    e(a[i])
                }
            } else {
                e(a)
            }
            if (a = N[":" + f]) {
                if (c && !c.language && c.locale) {
                    c.language = c.locale
                }
                if (c && typeof c.callback == "string") {
                    i = c.callback;
                    if (i.match(/^[[\]A-Za-z0-9._]+$/)) {
                        i = l.eval(i);
                        c.callback = i
                    }
                }
                if ((i = c && c.callback != g) && !a.s(b)) {
                    throw I("Module: '" + f + "' must be loaded before DOM onLoad!")
                } else {
                    if (i) {
                        a.m(b, c) ? l[z](c.callback, 0) : a.load(b, c)
                    } else {
                        a.m(b, c) || a.load(b, c)
                    }
                }
            } else {
                throw I("Module: '" + f + "' not found!")
            }
        });
        L("google.load", google.load);
        google.R = function (a, b) {
            if (b) {
                if (P[x] == 0) {
                    Q(l, "load", R);
                    if (!E("msie") && !(E("safari") || E("konqueror")) && E("mozilla") || l.opera) {
                        l.addEventListener("DOMContentLoaded", R, h)
                    } else {
                        if (E("msie")) {
                            o.write("<script defer onreadystatechange='google.loader.domReady()' src=//:><\/script>")
                        } else {
                            (E("safari") || E("konqueror")) && l[z](T, 10)
                        }
                    }
                }
                P[q](a)
            } else {
                Q(l, "load", a)
            }
        };
        L("google.setOnLoadCallback", google.R);
        function Q(a, b, c) {
            if (a.addEventListener) {
                a.addEventListener(b, c, h)
            } else {
                if (a.attachEvent) {
                    a.attachEvent("on" + b, c)
                } else {
                    var e = a["on" + b];
                    a["on" + b] = e != g ? aa([c, e]) : c
                }
            }
        }

        function aa(a) {
            return function () {
                for (var b = 0; b < a[x]; b++) {
                    a[b]()
                }
            }
        }

        var P = [];
        google[A].L = function () {
            var a = l.event.srcElement;
            if (a.readyState == "complete") {
                a.onreadystatechange = g;
                a.parentNode.removeChild(a);
                R()
            }
        };
        L("google.loader.domReady", google[A].L);
        var ba = {loaded: d, complete: d};

        function T() {
            if (ba[o.readyState]) {
                R()
            } else {
                P[x] > 0 && l[z](T, 10)
            }
        }

        function R() {
            for (var a = 0; a < P[x]; a++) {
                P[a]()
            }
            P.length = 0
        }

        google[A].d = function (a, b, c) {
            if (c) {
                var e;
                if (a == "script") {
                    e = o.createElement("script");
                    e.type = "text/javascript";
                    e.src = b
                } else {
                    if (a == "css") {
                        e.type = "text/css";
                        e.href = b;
                        e.rel = "stylesheet"
                    }
                }
                (a = o.getElementsByTagName("head")[0]) || (a = o.body.parentNode.appendChild(o.createElement("head")));
                a.appendChild(e)
            } else {
                if (a == "script") {
                    o.write('<script src="' + b + '" type="text/javascript"><\/script>')
                }
            }
        };
        L("google.loader.writeLoadTag", google[A].d);
        google[A].O = function (a) {
            O = a
        };
        L("google.loader.rfm", google[A].O);
        google[A].Q = function (a) {
            for (var b in a) {
                if (typeof b == "string" && b && b[s](0) == ":" && !N[b]) {
                    N[b] = new U(b[B](1), a[b])
                }
            }
        };
        L("google.loader.rpl", google[A].Q);
        google[A].P = function (a) {
            if ((a = a.specs) && a[x]) {
                for (var b = 0; b < a[x]; ++b) {
                    var c = a[b];
                    if (typeof c == "string") {
                        N[":" + c] = new V(c)
                    } else {
                        c = new W(c[v], c.baseSpec, c.customSpecs);
                        N[":" + c[v]] = c
                    }
                }
            }
        };
        L("google.loader.html", google[A].P);
        google[A].loaded = function (a) {
            N[":" + a.module].k(a)
        };
        L("google.loader.loaded", google[A].loaded);
        google[A].K = function () {
            return"qid=" + ((new Date)[w]().toString(16) + Math.floor(Math.random() * 10000000).toString(16))
        };
        L("google.loader.createGuidArg_", google[A].K);
        J("google_exportSymbol", J);
        J("google_exportProperty", K);
        google[A].b = {};
        L("google.loader.themes", google[A].b);
        google[A].b.A = "";
        M(google[A].b, "BUBBLEGUM", google[A].b.A);
        google[A].b.C = "";
        M(google[A].b, "GREENSKY", google[A].b.C);
        google[A].b.B = "";
        M(google[A].b, "ESPRESSO", google[A].b.B);
        google[A].b.F = "";
        M(google[A].b, "SHINY", google[A].b.F);
        google[A].b.D = "";
        M(google[A].b, "MINIMALIST", google[A].b.D);
        function V(a) {
            this.a = a;
            this.q = [];
            this.p = {};
            this.i = {};
            this.e = {};
            this.l = d;
            this.c = -1
        }

        V[y].g = function (a, b) {
            var c = "";
            if (b != n) {
                if (b.language != n) {
                    c += "&hl=" + j(b.language)
                }
                if (b.nocss != n) {
                    c += "&output=" + j("nocss=" + b.nocss)
                }
                if (b.nooldnames != n) {
                    c += "&nooldnames=" + j(b.nooldnames)
                }
                if (b.packages != n) {
                    c += "&packages=" + j(b.packages)
                }
                if (b.callback != g) {
                    c += "&async=2"
                }
                if (b.style != n) {
                    c += "&style=" + j(b.style)
                }
                if (b.other_params != n) {
                    c += "&" + b.other_params
                }
            }
            if (!this.l) {
                if (google[this.a] && google[this.a].JSHash) {
                    c += "&sig=" + j(google[this.a].JSHash)
                }
                var e = [], f;
                for (f in this.p) {
                    f[s](0) == ":" && e[q](f[B](1))
                }
                for (f in this.i) {
                    f[s](0) == ":" && this.i[f] && e[q](f[B](1))
                }
                c += "&have=" + j(e[C](","))
            }
            return google[A][u] + "/?file=" + this.a + "&v=" + a + google[A].AdditionalParams + c
        };
        V[y].v = function (a) {
            var b = g;
            if (a) {
                b = a.packages
            }
            var c = g;
            if (b) {
                if (typeof b == "string") {
                    c = [a.packages]
                } else {
                    if (b[x]) {
                        c = [];
                        for (a = 0; a < b[x]; a++) {
                            typeof b[a] == "string" && c[q](b[a][r](/^\s*|\s*$/, "")[D]())
                        }
                    }
                }
            }
            c || (c = ["default"]);
            b = [];
            for (a = 0; a < c[x]; a++) {
                this.p[":" + c[a]] || b[q](c[a])
            }
            return b
        };
        p(V[y], function (a, b) {
            var c = this.v(b), e = b && b.callback != g;
            if (e) {
                var f = new X(b.callback)
            }
            for (var i = [], k = c[x] - 1; k >= 0; k--) {
                var m = c[k];
                e && f.G(m);
                if (this.i[":" + m]) {
                    c.splice(k, 1);
                    e && this.e[":" + m][q](f)
                } else {
                    i[q](m)
                }
            }
            if (c[x]) {
                if (b && b.packages) {
                    b.packages = c.sort()[C](",")
                }
                for (k = 0; k < i[x]; k++) {
                    m = i[k];
                    this.e[":" + m] = [];
                    e && this.e[":" + m][q](f)
                }
                if (!b && O[":" + this.a] != g && O[":" + this.a].versions[":" + a] != g && !google[A].AdditionalParams && this.l) {
                    c = O[":" + this.a];
                    google[this.a] = google[this.a] || {};
                    for (var S in c.properties) {
                        if (S && S[s](0) == ":") {
                            google[this.a][S[B](1)] = c.properties[S]
                        }
                    }
                    google[A].d("script", google[A][u] + c.path + c.js, e);
                    c.css && google[A].d("css", google[A][u] + c.path + c.css, e)
                } else {
                    if (!b || !b.autoloaded) {
                        google[A].d("script", this.g(a, b), e)
                    }
                }
                if (this.l) {
                    this.l = h;
                    this.c = (new Date)[w]();
                    if (this.c % 100 != 1) {
                        this.c = -1
                    }
                }
                for (k = 0; k < i[x]; k++) {
                    m = i[k];
                    this.i[":" + m] = d
                }
            }
        });
        V[y].k = function (a) {
            if (this.c != -1) {
                ca("al_" + this.a, "jl." + ((new Date)[w]() - this.c), d);
                this.c = -1
            }
            this.q = this.q.concat(a.components);
            google[A][this.a] || (google[A][this.a] = {});
            google[A][this.a].packages = this.q.slice(0);
            for (var b = 0; b < a.components[x]; b++) {
                this.p[":" + a.components[b]] = d;
                this.i[":" + a.components[b]] = h;
                var c = this.e[":" + a.components[b]];
                if (c) {
                    for (var e = 0; e < c[x]; e++) {
                        c[e].J(a.components[b])
                    }
                    delete this.e[":" + a.components[b]]
                }
            }
        };
        V[y].m = function (a, b) {
            return this.v(b)[x] == 0
        };
        V[y].s = function () {
            return d
        };
        function X(a) {
            this.I = a;
            this.n = {};
            this.r = 0
        }

        X[y].G = function (a) {
            this.r++;
            this.n[":" + a] = d
        };
        X[y].J = function (a) {
            if (this.n[":" + a]) {
                this.n[":" + a] = h;
                this.r--;
                this.r == 0 && l[z](this.I, 0)
            }
        };
        function W(a, b, c) {
            this.name = a;
            this.H = b;
            this.o = c;
            this.u = this.h = h;
            this.j = [];
            google[A].t[this[v]] = H(this.k, this)
        }

        G(W, V);
        p(W[y], function (a, b) {
            var c = b && b.callback != g;
            if (c) {
                this.j[q](b.callback);
                b.callback = "google.loader.callbacks." + this[v]
            } else {
                this.h = d
            }
            if (!b || !b.autoloaded) {
                google[A].d("script", this.g(a, b), c)
            }
        });
        W[y].m = function (a, b) {
            return b && b.callback != g ? this.u : this.h
        };
        W[y].k = function () {
            this.u = d;
            for (var a = 0; a < this.j[x]; a++) {
                l[z](this.j[a], 0)
            }
            this.j = []
        };
        var Y = function (a, b) {
            return a.string ? j(a.string) + "=" + j(b) : a.regex ? b[r](/(^.*$)/, a.regex) : ""
        };
        W[y].g = function (a, b) {
            return this.M(this.w(a), a, b)
        };
        W[y].M = function (a, b, c) {
            var e = "";
            if (a.key) {
                e += "&" + Y(a.key, google[A].ApiKey)
            }
            if (a.version) {
                e += "&" + Y(a.version, b)
            }
            b = google[A].Secure && a.ssl ? a.ssl : a.uri;
            if (c != g) {
                for (var f in c) {
                    if (a.params[f]) {
                        e += "&" + Y(a.params[f], c[f])
                    } else {
                        if (f == "other_params") {
                            e += "&" + c[f]
                        } else {
                            if (f == "base_domain") {
                                b = "http://" + c[f] + a.uri[B](a.uri[t]("../index.html", 7))
                            }
                        }
                    }
                }
            }
            google[this[v]] = {};
            if (b[t]("?") == -1 && e) {
                e = "?" + e[B](1)
            }
            return b + e
        };
        W[y].s = function (a) {
            return this.w(a).deferred
        };
        W[y].w = function (a) {
            if (this.o) {
                for (var b = 0; b < this.o[x]; ++b) {
                    var c = this.o[b];
                    if (RegExp(c.pattern).test(a)) {
                        return c
                    }
                }
            }
            return this.H
        };
        function U(a, b) {
            this.a = a;
            this.f = b;
            this.h = h
        }

        G(U, V);
        p(U[y], function (a, b) {
            this.h = d;
            google[A].d("script", this.g(a, b), h)
        });
        U[y].m = function () {
            return this.h
        };
        U[y].k = function () {
        };
        U[y].g = function (a, b) {
            if (!this.f.versions[":" + a]) {
                if (this.f.aliases) {
                    var c = this.f.aliases[":" + a];
                    if (c) {
                        a = c
                    }
                }
                if (!this.f.versions[":" + a]) {
                    throw I("Module: '" + this.a + "' with version '" + a + "' not found!")
                }
            }
            return google[A].GoogleApisBase + "/libs/" + this.a + "/" + a + "/" + this.f.versions[":" + a][b && b.uncompressed ? "uncompressed" : "compressed"]
        };
        U[y].s = function () {
            return h
        };
        var da = h, Z = [], ea = (new Date)[w](), ca = function (a, b, c) {
            if (!da) {
                Q(l, "unload", fa);
                da = d
            }
            if (c) {
                if (!google[A].Secure && (!google[A].Options || google[A].Options.csi === h)) {
                    a = a[D]()[r](/[^a-z0-9_.]+/g, "_");
                    b = b[D]()[r](/[^a-z0-9_.]+/g, "_");
                    l[z](H($, g, "//gg.google.com/csi?s=uds&v=2&action=" + j(a) + "&it=" + j(b)), 10000)
                }
            } else {
                Z[q]("r" + Z[x] + "=" + j(a + (b ? "|" + b : "")));
                l[z](fa, Z[x] > 5 ? 0 : 15000)
            }
        }, fa = function () {
            if (Z[x]) {
                var a = google[A][u];
                if (a[t]("danh-sach.html") == 0) {
                    a = a[r](/^http:/, "https:")
                }
                $(a + "/stats?" + Z[C]("&") + "&nc=" + (new Date)[w]() + "_" + ((new Date)[w]() - ea));
                Z.length = 0
            }
        }, $ = function (a) {
            var b = new Image, c = $.N++;
            $.z[c] = b;
            b.onload = b.onerror = function () {
                delete $.z[c]
            };
            b.src = a;
            b = g
        };
        $.z = {};
        $.N = 0;
        J("google.loader.recordStat", ca);
        J("google.loader.createImageForLogging", $)
    })();
    google.loader.rm({specs: [
        {name: "books", baseSpec: {uri: "", ssl: null, key: {string: "key"}, version: {string: "v"}, deferred: true, params: {callback: {string: "callback"}, language: {string: "hl"}}}},
        "feeds",
        {name: "friendconnect", baseSpec: {uri: "", ssl: null, key: {string: "key"}, version: {string: "v"}, deferred: false, params: {}}},
        "spreadsheets",
        "identitytoolkit",
        "gdata",
        "visualization",
        {name: "sharing", baseSpec: {uri: "", ssl: null, key: {string: "key"}, version: {string: "v"}, deferred: false, params: {language: {string: "hl"}}}},
        "search",
        {name: "maps", baseSpec: {uri: "http://maps.google.com/maps?file\u003dgoogleapi", ssl: "https://maps-api-ssl.google.com/maps?file\u003dgoogleapi", key: {string: "key"}, version: {string: "v"}, deferred: true, params: {callback: {regex: "callback\u003d$1\u0026async\u003d2"}, language: {string: "hl"}}}, customSpecs: [
            {uri: "http://maps.google.com/maps/api/js", ssl: "https://maps-api-ssl.google.com/maps/api/js", key: {string: "key"}, version: {string: "v"}, deferred: true, params: {callback: {string: "callback"}, language: {string: "hl"}}, pattern: "^(3|3..*)$"}
        ]},
        "annotations_v2",
        "wave",
        "orkut",
        {name: "annotations", baseSpec: {uri: "", ssl: null, key: {string: "key"}, version: {string: "v"}, deferred: true, params: {callback: {string: "callback"}, language: {string: "hl"}, country: {string: "gl"}}}},
        "language",
        "earth",
        "ads",
        "elements"
    ]});
    google.loader.rfm({":search": {versions: {":1": "1", ":1.0": "1"}, path: "/api/search/1.0/3268c2f995b8fbd3048de51c45033694/", js: "default+en.I.js", css: "", properties: {":JSHash": "3268c2f995b8fbd3048de51c45033694", ":NoOldNames": false, ":Version": "1.0"}}, ":language": {versions: {":1": "1", ":1.0": "1"}, path: "/api/language/1.0/ec9ac263edc07a5d2dc73beff6c05cdb/", js: "default+en.I.js", properties: {":JSHash": "ec9ac263edc07a5d2dc73beff6c05cdb", ":Version": "1.0"}}, ":feeds": {versions: {":1": "1", ":1.0": "1"}, path: "/api/feeds/1.0/e7bcb69f2fae58330e61161850f68d11/", js: "default+en.I.js", css: "", properties: {":JSHash": "e7bcb69f2fae58330e61161850f68d11", ":Version": "1.0"}}, ":spreadsheets": {versions: {":0": "1", ":0.4": "1"}, path: "/api/spreadsheets/0.4/87ff7219e9f8a8164006cbf28d5e911a/", js: "default.I.js", properties: {":JSHash": "87ff7219e9f8a8164006cbf28d5e911a", ":Version": "0.4"}}, ":wave": {versions: {":1": "1", ":1.0": "1"}, path: "/api/wave/1.0/3b6f7573ff78da6602dda5e09c9025bf/", js: "default.I.js", properties: {":JSHash": "3b6f7573ff78da6602dda5e09c9025bf", ":Version": "1.0"}}, ":earth": {versions: {":1": "1", ":1.0": "1"}, path: "/api/earth/1.0/a53f4e87830de2a72937039b5507ebdc/", js: "default.I.js", properties: {":JSHash": "a53f4e87830de2a72937039b5507ebdc", ":Version": "1.0"}}, ":annotations": {versions: {":1": "1", ":1.0": "1"}, path: "/api/annotations/1.0/819e8a61be0476eae89bcc4412f69cb7/", js: "default+en.I.js", properties: {":JSHash": "819e8a61be0476eae89bcc4412f69cb7", ":Version": "1.0"}}});
    google.loader.rpl({":scriptaculous": {versions: {":1.8.3": {uncompressed: "scriptaculous.js", compressed: "scriptaculous.js"}, ":1.8.2": {uncompressed: "scriptaculous.js", compressed: "scriptaculous.js"}, ":1.8.1": {uncompressed: "scriptaculous.js", compressed: "scriptaculous.js"}}, aliases: {":1.8": "1.8.3", ":1": "1.8.3"}}, ":yui": {versions: {":2.6.0": {uncompressed: "build/yuiloader/yuiloader.js", compressed: "build/yuiloader/yuiloader-min.js"}, ":2.7.0": {uncompressed: "build/yuiloader/yuiloader.js", compressed: "build/yuiloader/yuiloader-min.js"}, ":2.8.0r4": {uncompressed: "build/yuiloader/yuiloader.js", compressed: "build/yuiloader/yuiloader-min.js"}, ":2.8.2r1": {uncompressed: "build/yuiloader/yuiloader.js", compressed: "build/yuiloader/yuiloader-min.js"}, ":2.8.1": {uncompressed: "build/yuiloader/yuiloader.js", compressed: "build/yuiloader/yuiloader-min.js"}, ":3.3.0": {uncompressed: "build/yui/yui.js", compressed: "build/yui/yui-min.js"}}, aliases: {":3": "3.3.0", ":2": "2.8.2r1", ":2.7": "2.7.0", ":2.8.2": "2.8.2r1", ":2.6": "2.6.0", ":2.8": "2.8.2r1", ":2.8.0": "2.8.0r4", ":3.3": "3.3.0"}}, ":swfobject": {versions: {":2.1": {uncompressed: "swfobject_src.js", compressed: "swfobject.js"}, ":2.2": {uncompressed: "swfobject_src.js", compressed: "swfobject.js"}}, aliases: {":2": "2.2"}}, ":ext-core": {versions: {":3.1.0": {uncompressed: "ext-core-debug.js", compressed: "ext-core.js"}, ":3.0.0": {uncompressed: "ext-core-debug.js", compressed: "ext-core.js"}}, aliases: {":3": "3.1.0", ":3.0": "3.0.0", ":3.1": "3.1.0"}}, ":webfont": {versions: {":1.0.2": {uncompressed: "webfont_debug.js", compressed: "webfont.js"}, ":1.0.1": {uncompressed: "webfont_debug.js", compressed: "webfont.js"}, ":1.0.0": {uncompressed: "webfont_debug.js", compressed: "webfont.js"}, ":1.0.6": {uncompressed: "webfont_debug.js", compressed: "webfont.js"}, ":1.0.5": {uncompressed: "webfont_debug.js", compressed: "webfont.js"}, ":1.0.18": {uncompressed: "webfont_debug.js", compressed: "webfont.js"}, ":1.0.4": {uncompressed: "webfont_debug.js", compressed: "webfont.js"}, ":1.0.17": {uncompressed: "webfont_debug.js", compressed: "webfont.js"}, ":1.0.16": {uncompressed: "webfont_debug.js", compressed: "webfont.js"}, ":1.0.3": {uncompressed: "webfont_debug.js", compressed: "webfont.js"}, ":1.0.9": {uncompressed: "webfont_debug.js", compressed: "webfont.js"}, ":1.0.12": {uncompressed: "webfont_debug.js", compressed: "webfont.js"}, ":1.0.13": {uncompressed: "webfont_debug.js", compressed: "webfont.js"}, ":1.0.14": {uncompressed: "webfont_debug.js", compressed: "webfont.js"}, ":1.0.15": {uncompressed: "webfont_debug.js", compressed: "webfont.js"}, ":1.0.10": {uncompressed: "webfont_debug.js", compressed: "webfont.js"}, ":1.0.11": {uncompressed: "webfont_debug.js", compressed: "webfont.js"}}, aliases: {":1": "1.0.18", ":1.0": "1.0.18"}}, ":mootools": {versions: {":1.2.3": {uncompressed: "mootools.js", compressed: "mootools-yui-compressed.js"}, ":1.1.1": {uncompressed: "mootools.js", compressed: "mootools-yui-compressed.js"}, ":1.2.4": {uncompressed: "mootools.js", compressed: "mootools-yui-compressed.js"}, ":1.3.0": {uncompressed: "mootools.js", compressed: "mootools-yui-compressed.js"}, ":1.2.1": {uncompressed: "mootools.js", compressed: "mootools-yui-compressed.js"}, ":1.2.2": {uncompressed: "mootools.js", compressed: "mootools-yui-compressed.js"}, ":1.2.5": {uncompressed: "mootools.js", compressed: "mootools-yui-compressed.js"}, ":1.1.2": {uncompressed: "mootools.js", compressed: "mootools-yui-compressed.js"}}, aliases: {":1": "1.1.2", ":1.11": "1.1.1", ":1.3": "1.3.0", ":1.2": "1.2.5", ":1.1": "1.1.2"}}, ":jqueryui": {versions: {":1.6.0": {uncompressed: "jquery-ui.js", compressed: "jquery-ui.min.js"}, ":1.8.0": {uncompressed: "jquery-ui.js", compressed: "jquery-ui.min.js"}, ":1.8.2": {uncompressed: "jquery-ui.js", compressed: "jquery-ui.min.js"}, ":1.8.1": {uncompressed: "jquery-ui.js", compressed: "jquery-ui.min.js"}, ":1.8.9": {uncompressed: "jquery-ui.js", compressed: "jquery-ui.min.js"}, ":1.8.7": {uncompressed: "jquery-ui.js", compressed: "jquery-ui.min.js"}, ":1.8.8": {uncompressed: "jquery-ui.js", compressed: "jquery-ui.min.js"}, ":1.7.2": {uncompressed: "jquery-ui.js", compressed: "jquery-ui.min.js"}, ":1.8.5": {uncompressed: "jquery-ui.js", compressed: "jquery-ui.min.js"}, ":1.7.3": {uncompressed: "jquery-ui.js", compressed: "jquery-ui.min.js"}, ":1.8.6": {uncompressed: "jquery-ui.js", compressed: "jquery-ui.min.js"}, ":1.8.10": {uncompressed: "jquery-ui.js", compressed: "jquery-ui.min.js"}, ":1.7.0": {uncompressed: "jquery-ui.js", compressed: "jquery-ui.min.js"}, ":1.8.4": {uncompressed: "jquery-ui.js", compressed: "jquery-ui.min.js"}, ":1.7.1": {uncompressed: "jquery-ui.js", compressed: "jquery-ui.min.js"}, ":1.5.3": {uncompressed: "jquery-ui.js", compressed: "jquery-ui.min.js"}, ":1.5.2": {uncompressed: "jquery-ui.js", compressed: "jquery-ui.min.js"}}, aliases: {":1.8": "1.8.10", ":1.7": "1.7.3", ":1.6": "1.6.0", ":1": "1.8.10", ":1.5": "1.5.3", ":1.8.3": "1.8.4"}}, ":chrome-frame": {versions: {":1.0.2": {uncompressed: "CFInstall.js", compressed: "CFInstall.min.js"}, ":1.0.1": {uncompressed: "CFInstall.js", compressed: "CFInstall.min.js"}, ":1.0.0": {uncompressed: "CFInstall.js", compressed: "CFInstall.min.js"}}, aliases: {":1": "1.0.2", ":1.0": "1.0.2"}}, ":dojo": {versions: {":1.2.3": {uncompressed: "dojo/dojo.xd.js.uncompressed.js", compressed: "dojo/dojo.xd.js"}, ":1.3.1": {uncompressed: "dojo/dojo.xd.js.uncompressed.js", compressed: "dojo/dojo.xd.js"}, ":1.1.1": {uncompressed: "dojo/dojo.xd.js.uncompressed.js", compressed: "dojo/dojo.xd.js"}, ":1.3.0": {uncompressed: "dojo/dojo.xd.js.uncompressed.js", compressed: "dojo/dojo.xd.js"}, ":1.3.2": {uncompressed: "dojo/dojo.xd.js.uncompressed.js", compressed: "dojo/dojo.xd.js"}, ":1.4.3": {uncompressed: "dojo/dojo.xd.js.uncompressed.js", compressed: "dojo/dojo.xd.js"}, ":1.5.0": {uncompressed: "dojo/dojo.xd.js.uncompressed.js", compressed: "dojo/dojo.xd.js"}, ":1.2.0": {uncompressed: "dojo/dojo.xd.js.uncompressed.js", compressed: "dojo/dojo.xd.js"}, ":1.4.0": {uncompressed: "dojo/dojo.xd.js.uncompressed.js", compressed: "dojo/dojo.xd.js"}, ":1.4.1": {uncompressed: "dojo/dojo.xd.js.uncompressed.js", compressed: "dojo/dojo.xd.js"}}, aliases: {":1": "1.5.0", ":1.5": "1.5.0", ":1.4": "1.4.3", ":1.3": "1.3.2", ":1.2": "1.2.3", ":1.1": "1.1.1"}}, ":prototype": {versions: {":1.7.0.0": {uncompressed: "prototype.js", compressed: "prototype.js"}, ":1.6.0.2": {uncompressed: "prototype.js", compressed: "prototype.js"}, ":1.6.1.0": {uncompressed: "prototype.js", compressed: "prototype.js"}, ":1.6.0.3": {uncompressed: "prototype.js", compressed: "prototype.js"}}, aliases: {":1.7": "1.7.0.0", ":1.6.1": "1.6.1.0", ":1": "1.7.0.0", ":1.6": "1.6.1.0", ":1.7.0": "1.7.0.0", ":1.6.0": "1.6.0.3"}}, ":jquery": {versions: {":1.2.3": {uncompressed: "jquery.js", compressed: "jquery.min.js"}, ":1.3.1": {uncompressed: "jquery.js", compressed: "jquery.min.js"}, ":1.3.0": {uncompressed: "jquery.js", compressed: "jquery.min.js"}, ":1.3.2": {uncompressed: "jquery.js", compressed: "jquery.min.js"}, ":1.2.6": {uncompressed: "jquery.js", compressed: "jquery.min.js"}, ":1.4.3": {uncompressed: "jquery.js", compressed: "jquery.min.js"}, ":1.4.4": {uncompressed: "jquery.js", compressed: "jquery.min.js"}, ":1.5.1": {uncompressed: "jquery.js", compressed: "jquery.min.js"}, ":1.5.0": {uncompressed: "jquery.js", compressed: "jquery.min.js"}, ":1.4.0": {uncompressed: "jquery.js", compressed: "jquery.min.js"}, ":1.4.1": {uncompressed: "jquery.js", compressed: "jquery.min.js"}, ":1.4.2": {uncompressed: "jquery.js", compressed: "jquery.min.js"}}, aliases: {":1": "1.5.1", ":1.5": "1.5.1", ":1.4": "1.4.4", ":1.3": "1.3.2", ":1.2": "1.2.6"}}})
}
;
function cutString(c, d) {
    var b = "";
    var a = new Array();
    a = c.split(" ");
    if (d > a.length) {
        d = a.length
    }
    return a[d]
}
function coverDate(b) {
    var a = "";
    a = cutString(b, 1) + "/" + coverMonth(cutString(b, 2));
    return a
}
function coverMonth(a) {
    switch (a) {
        case"Jan":
            return"01";
            break;
        case"Feb":
            return"02";
            break;
        case"Mar":
            return"03";
            break;
        case"Apr":
            return"04";
            break;
        case"May":
            return"05";
            break;
        case"Jun":
            return"06";
            break;
        case"Jul":
            return"07";
            break;
        case"Aug":
            return"08";
            break;
        case"Sep":
            return"09";
            break;
        case"Oct":
            return"10";
            break;
        case"Nov":
            return"11";
            break;
        case"Dec":
            return"12";
            break;
        default:
            return"00"
    }
}
google.load("feeds", "1");
function initialize() {
    var i = "http://game.zing.vn/rss/";
    var d = {linkTarget: google.feeds.LINK_TARGET_BLANK, pauseOnHover: false, horizontal: true};
    var b = 0;
    var g = "<li><a href=";
    var c = " onclick=\"_gaq.push(['_trackEvent','link', 'RSS ZingGame', 'Homepage']);\" title=\"";
    var e = '" target="_blank"><span class="Date">';
    var h = "</span> ";
    var f = "</a></li>";
    var i = new google.feeds.Feed("http://game.zing.vn/rss/");
    i.setNumEntries(5);
    i.load(function (a) {
        if (!a.error) {
            var j = document.getElementById("rssZingGame");
            var p = "";
            for (var k = 0; k < a.feed.entries.length; k++) {
                var m = a.feed.entries[k];
                var o = m.title;
                b = 66;
                var n;
                if (b < o.length - 1) {
                    n = o.substring(0, b);
                    n = n + "..."
                } else {
                    n = o
                }
                var l = n;
                p = p + g + m.link + c + o + e + coverDate(m.publishedDate) + h + l + f
            }
            if (jQuery("#rssZingGame").length > 0) {
                j.innerHTML = p
            }
        }
    })
}
jQuery(document).ready(function () {
    if (jQuery("#rssZingGame").length > 0) {
        google.setOnLoadCallback(initialize)
    }
});
jQuery(document).ready(function () {
    if (jQuery("#pagingSearch .PagingControl .CenterWrapper").length > 0) {
        jQuery("#pagingSearch .PagingControl .CenterWrapper a.PagingLink").live("click", function () {
            var b = jQuery(this).attr("rel");
            a(b);
            return false
        })
    }
    function a(f) {
        var h = jQuery("#configmoduleOuputId").val();
        var g = jQuery("#configshortUri").val();
        var b = jQuery("#configtoken").val();
        var d = jQuery("#datarawConditionKeyword").val();
        var e = jQuery("#datarawConditionCateCode").val();
        var i = jQuery("#datarawConditionSiteCode").val();
        var c = "module=" + h + '&moduleParams={"Keyword":"' + d + '","CateCode":"' + e + '","SiteCode":"' + i + '"}&token=' + b;
        jQuery.ajax({type: "POST", url: SITE_URL + "/" + g + "." + f.split("&")[3] + ".html", dataType: "json", data: c, success: function (j) {
            if (jQuery("#search_result")) {
                jQuery("#search_result").html(j[h]["content"])
            }
            if (jQuery(".PagingWrapper")) {
                jQuery(".PagingWrapper").html(j[h]["paging"])
            }
            trackLink("#searchResult")
        }})
    }
});
var suggestSubstring = 30;
var suggestClassInput = "SuggestKeyword";
var idSearchSuggest = "searchsuggest";
var idKeyword = "keyword";
jQuery(document).ready(function () {
    if (jQuery(".TextInputReplace").length > 0) {
        var f = "";
        jQuery(".TextInputReplace").bind("focus", function () {
            var h = jQuery(this).attr("title");
            f = jQuery(this).val();
            if (h == f) {
                jQuery(this).val("")
            }
        });
        jQuery(".TextInputReplace").bind("blur", function () {
            if (jQuery.trim(jQuery(this).val()) == "") {
                jQuery(this).val(jQuery(this).attr("title"))
            }
            return false
        })
    }
    $("form.FrmSearch").submit(function (j) {
        var h = jQuery(this).find("input.TextInputReplace").val();
        var i = jQuery(this).find("input.TextInputReplace").attr("title");
        if (h.length < 3 || h == i) {
            alert("Vui lòng nhập từ khóa và ít nhất 3 ký tự");
            jQuery(this).find("input.TextInputReplace").focus();
            return false
        }
    });
    function g(h) {
        return typeof(h) != "undefined" && h !== null
    }

    var e = -1;
    var d = 1;

    function c(n, q) {
        if (typeof c.data == "undefined") {
            c.data = []
        }
        if (typeof c.keyword == "undefined") {
            c.keyword = ""
        }
        if (typeof c.cate == "undefined") {
            c.cateCode = ""
        }
        var l = "";
        var i = jQuery(q).attr("id");
        if (n == "" || n == null) {
            jQuery("#" + idSearchSuggest).fadeOut(500);
            if (i == idKeyword) {
                jQuery("#" + idSearchSuggest).removeClass("StaticBlockSearch")
            }
        } else {
            if (c.keyword == n) {
                if (i != idKeyword) {
                    jQuery("#" + idSearchSuggest).addClass("StaticBlockSearch")
                }
                jQuery("#" + idSearchSuggest).fadeIn(100)
            } else {
                var h = n.toLowerCase().charCodeAt(0);
                if (!g(c.data[h]) || c.data[h].length == 0) {
                    var m = n.toLowerCase().charAt(0);
                    var r = jQuery("#configtoken").val();
                    jQuery.ajax({type: "POST", url: SITE_URL + "/tin-tuc/danh-sach." + m + ".html", dataType: "json", data: 'block={"__search1timkiem__":{}}&token=' + r, success: function (s) {
                        c.data[h] = s.__search1timkiem__.content
                    }})
                }
                var o = [];
                var p = new RegExp(n.toLowerCase(), "i");
                if (g(c.data[h]) && c.data[h].length > 0) {
                    jQuery(c.data[h]).each(function (s) {
                        var t = c.data[h][s];
                        if (t.keyword.match(p)) {
                            if (o.length < 10) {
                                o.push(t)
                            } else {
                                var u = o.shift();
                                if (u.count > t.count) {
                                    o.unshift(u)
                                } else {
                                    o.push(t)
                                }
                            }
                        }
                    })
                }
                var j = "";
                var k = "";
                jQuery(o).each(function (t) {
                    var s = o[t].keyword.replace(p, "<b>" + n + "</b>");
                    if (s.length > suggestSubstring) {
                        s = s.substring(0, suggestSubstring)
                    }
                    j += '<li id="suggest-item-' + t + '" class="Suggest-Item" onclick="return findData_block(\'' + o[t].keyword + "', '" + i + '\');" rel="' + o[t].keyword + '"><p class="SearchTitle">' + s + "</p></li>"
                });
                jQuery("ul.Suggest-List").html(j);
                e = -1;
                d = 1;
                if (j != "") {
                    if (i != idKeyword) {
                        jQuery("#" + idSearchSuggest).addClass("StaticBlockSearch")
                    }
                    jQuery("#" + idSearchSuggest).show()
                }
            }
        }
    }

    var a = 10;

    function b(k, h) {
        a = jQuery(".Suggest-Item").length;
        switch (k.keyCode) {
            case 40:
                d = 0;
                e++;
                if (e == a) {
                    jQuery(".Suggest-Item").removeClass("selected");
                    e = -1;
                    break
                }
                var i = jQuery("#suggest-item-" + e);
                jQuery(".Suggest-Item").removeClass("selected");
                i.addClass("selected");
                jQuery(h).val(i.attr("rel"));
                break;
            case 37:
                d = 0;
                break;
            case 38:
                d = 0;
                e--;
                if (e < 0) {
                    jQuery(".Suggest-Item").removeClass("selected");
                    e = -1
                } else {
                    var i = jQuery("#suggest-item-" + e);
                    jQuery(".Suggest-Item").removeClass("selected");
                    i.addClass("selected");
                    jQuery(h).val(i.attr("rel"))
                }
                break;
            case 37:
                d = 0;
                break;
            case 13:
                d = 0;
                jQuery("#" + idSearchSuggest).fadeOut(100);
                jQuery("#" + idSearchSuggest).removeClass("StaticBlockSearch");
                var j = h.length > 0 ? jQuery(h[0].form) : jQuery();
                j.submit();
                break;
            default:
                d = 1;
                break
        }
    }

    jQuery(document).ready(function () {
        jQuery("." + suggestClassInput).keyup(function () {
            if (d) {
                c(jQuery(this).val(), this)
            }
        });
        if (jQuery("#idCateCode")) {
            jQuery("#idCateCode").change(function () {
                if (d) {
                    c(jQuery(this).val(), this)
                }
            })
        }
        jQuery("body").click(function () {
            jQuery("#" + idSearchSuggest).removeClass("StaticBlockSearch");
            jQuery("#" + idSearchSuggest).fadeOut(500)
        });
        if (jQuery.browser.mozilla) {
            jQuery("." + suggestClassInput).keypress(function (h) {
                b(h, this)
            })
        } else {
            jQuery("." + suggestClassInput).keydown(function (h) {
                b(h, this)
            })
        }
    })
});
function findData_block(b, c) {
    jQuery("#" + c).val(b);
    jQuery("#" + idSearchSuggest).fadeOut(100);
    if (c == idKeyword) {
        jQuery("#" + idSearchSuggest).removeClass("StaticBlockSearch")
    }
    var a = jQuery("#" + c);
    var d = a.length > 0 ? jQuery(a[0].form) : jQuery();
    d.submit();
    return false
};
var IE6 = jQuery.browser.msie && jQuery.browser.version == 6;
var IE7 = jQuery.browser.msie && jQuery.browser.version == 7;
(function (b, d) {
    if (!IE6 && !IE7) {
        "use strict";
        var a = b.History = b.History || {}, c = b.jQuery;
        if (typeof a.Adapter !== "undefined") {
            throw new Error("History.js Adapter has already been loaded...")
        }
        a.Adapter = {bind: function (e, f, g) {
            c(e).bind(f, g)
        }, trigger: function (f, g, e) {
            c(f).trigger(g, e)
        }, extractEventData: function (g, h, f) {
            var e = (h && h.originalEvent && h.originalEvent[g]) || (f && f[g]) || d;
            return e
        }, onDomLoad: function (e) {
            c(e)
        }};
        if (typeof a.init !== "undefined") {
            a.init()
        }
    }
})(window);
(function (i, a) {
    var g = jQuery.browser.msie && jQuery.browser.version == 6;
    var e = jQuery.browser.msie && jQuery.browser.version == 7;
    if (!g && !e) {
        "use strict";
        var d = i.console || a, k = i.document, n = i.navigator, m = i.sessionStorage || false, c = i.setTimeout, l = i.clearTimeout, f = i.setInterval, p = i.clearInterval, o = i.JSON, j = i.alert, b = i.History = i.History || {}, h = i.history;
        o.stringify = o.stringify || o.encode;
        o.parse = o.parse || o.decode;
        if (typeof b.init !== "undefined") {
            throw new Error("History.js Core has already been loaded...")
        }
        b.init = function () {
            if (typeof b.Adapter === "undefined") {
                return false
            }
            if (typeof b.initCore !== "undefined") {
                b.initCore()
            }
            if (typeof b.initHtml4 !== "undefined") {
                b.initHtml4()
            }
            return true
        };
        b.initCore = function () {
            if (typeof b.initCore.initialized !== "undefined") {
                return false
            } else {
                b.initCore.initialized = true
            }
            b.options = b.options || {};
            b.options.hashChangeInterval = b.options.hashChangeInterval || 100;
            b.options.safariPollInterval = b.options.safariPollInterval || 500;
            b.options.doubleCheckInterval = b.options.doubleCheckInterval || 500;
            b.options.storeInterval = b.options.storeInterval || 1000;
            b.options.busyDelay = b.options.busyDelay || 250;
            b.options.debug = b.options.debug || false;
            b.options.initialTitle = b.options.initialTitle || k.title;
            b.intervalList = [];
            b.clearAllIntervals = function () {
                var t, s = b.intervalList;
                if (typeof s !== "undefined" && s !== null) {
                    for (t = 0; t < s.length; t++) {
                        p(s[t])
                    }
                    b.intervalList = null
                }
            };
            b.debug = function () {
                if ((b.options.debug || false)) {
                    b.log.apply(b, arguments)
                }
            };
            b.log = function () {
                var y = !(typeof d === "undefined" || typeof d.log === "undefined" || typeof d.log.apply === "undefined"), t = k.getElementById("log"), x, w, z, u, s;
                if (y) {
                    u = Array.prototype.slice.call(arguments);
                    x = u.shift();
                    if (typeof d.debug !== "undefined") {
                        d.debug.apply(d, [x, u])
                    } else {
                        d.log.apply(d, [x, u])
                    }
                } else {
                    x = ("\n" + arguments[0] + "\n")
                }
                for (w = 1, z = arguments.length; w < z; ++w) {
                    s = arguments[w];
                    if (typeof s === "object" && typeof o !== "undefined") {
                        try {
                            s = o.stringify(s)
                        } catch (v) {
                        }
                    }
                    x += "\n" + s + "\n"
                }
                if (t) {
                    t.value += x + "\n-----\n";
                    t.scrollTop = t.scrollHeight - t.clientHeight
                } else {
                    if (!y) {
                        j(x)
                    }
                }
                return true
            };
            b.getInternetExplorerMajorVersion = function () {
                var s = b.getInternetExplorerMajorVersion.cached = (typeof b.getInternetExplorerMajorVersion.cached !== "undefined") ? b.getInternetExplorerMajorVersion.cached : (function () {
                    var t = 3, w = k.createElement("div"), u = w.getElementsByTagName("i");
                    while ((w.innerHTML = "<!--[if gt IE " + (++t) + "]><i></i><![endif]-->") && u[0]) {
                    }
                    return(t > 4) ? t : false
                })();
                return s
            };
            b.isInternetExplorer = function () {
                var s = b.isInternetExplorer.cached = (typeof b.isInternetExplorer.cached !== "undefined") ? b.isInternetExplorer.cached : Boolean(b.getInternetExplorerMajorVersion());
                return s
            };
            b.emulated = {pushState: !Boolean(i.history && i.history.pushState && i.history.replaceState && !((/ Mobile\/([1-7][a-z]|(8([abcde]|f(1[0-8]))))/i).test(n.userAgent) || (/AppleWebKit\/5([0-2]|3[0-2])/i).test(n.userAgent))), hashChange: Boolean(!(("onhashchange" in i) || ("onhashchange" in k)) || (b.isInternetExplorer() && b.getInternetExplorerMajorVersion() < 8))};
            b.enabled = !b.emulated.pushState;
            b.bugs = {setHash: Boolean(!b.emulated.pushState && n.vendor === "Apple Computer, Inc." && /AppleWebKit\/5([0-2]|3[0-3])/.test(n.userAgent)), safariPoll: Boolean(!b.emulated.pushState && n.vendor === "Apple Computer, Inc." && /AppleWebKit\/5([0-2]|3[0-3])/.test(n.userAgent)), ieDoubleCheck: Boolean(b.isInternetExplorer() && b.getInternetExplorerMajorVersion() < 8), hashEscape: Boolean(b.isInternetExplorer() && b.getInternetExplorerMajorVersion() < 7)};
            b.isEmptyObject = function (t) {
                for (var s in t) {
                    return false
                }
                return true
            };
            b.cloneObject = function (u) {
                var t, s;
                if (u) {
                    t = o.stringify(u);
                    s = o.parse(t)
                } else {
                    s = {}
                }
                return s
            };
            b.getRootUrl = function () {
                var s = k.location.protocol + "//" + (k.location.hostname || k.location.host);
                if (k.location.port || false) {
                    s += ":" + k.location.port
                }
                s += "../index.html";
                return s
            };
            b.getBaseHref = function () {
                var s = k.getElementsByTagName("base"), u = null, t = "";
                if (s.length === 1) {
                    u = s[0];
                    t = u.href.replace(/[^\/]+$/, "")
                }
                t = t.replace(/\/+$/, "");
                if (t) {
                    t += "/"
                }
                return t
            };
            b.getBaseUrl = function () {
                var s = b.getBaseHref() || b.getBasePageUrl() || b.getRootUrl();
                return s
            };
            b.getPageUrl = function () {
                var s = b.getState(false, false), u = (s || {}).url || k.location.href, t;
                t = u.replace(/\/+$/, "").replace(/[^\/]+$/, function (x, w, v) {
                    return(/\./).test(x) ? x : x + "/"
                });
                return t
            };
            b.getBasePageUrl = function () {
                var s = k.location.href.replace(/[#\?].*/, "").replace(/[^\/]+$/,function (v, u, t) {
                    return(/[^\/]$/).test(v) ? "" : v
                }).replace(/\/+$/, "") + "/";
                return s
            };
            b.getFullUrl = function (t, v) {
                var s = t, u = t.substring(0, 1);
                v = (typeof v === "undefined") ? true : v;
                if (/[a-z]+\:\/\//.test(t)) {
                } else {
                    if (u === "../index.html") {
                        s = b.getRootUrl() + t.replace(/^\/+/, "")
                    } else {
                        if (u === "#") {
                            s = b.getPageUrl().replace(/#.*/, "") + t
                        } else {
                            if (u === "?") {
                                s = b.getPageUrl().replace(/[\?#].*/, "") + t
                            } else {
                                if (v) {
                                    s = b.getBaseUrl() + t.replace(/^(\.\/)+/, "")
                                } else {
                                    s = b.getBasePageUrl() + t.replace(/^(\.\/)+/, "")
                                }
                            }
                        }
                    }
                }
                return s.replace(/\#$/, "")
            };
            b.getShortUrl = function (u) {
                var t = u, v = b.getBaseUrl(), s = b.getRootUrl();
                if (b.emulated.pushState) {
                    t = t.replace(v, "")
                }
                t = t.replace(s, "../index.html");
                if (b.isTraditionalAnchor(t)) {
                    t = "./" + t
                }
                t = t.replace(/^(\.\/)+/g, "index.html").replace(/\#$/, "");
                return t
            };
            b.store = {};
            b.idToState = b.idToState || {};
            b.stateToId = b.stateToId || {};
            b.urlToId = b.urlToId || {};
            b.storedStates = b.storedStates || [];
            b.savedStates = b.savedStates || [];
            b.normalizeStore = function () {
                b.store.idToState = b.store.idToState || {};
                b.store.urlToId = b.store.urlToId || {};
                b.store.stateToId = b.store.stateToId || {}
            };
            b.getState = function (u, t) {
                if (typeof u === "undefined") {
                    u = true
                }
                if (typeof t === "undefined") {
                    t = true
                }
                var s = b.getLastSavedState();
                if (!s && t) {
                    s = b.createStateObject()
                }
                if (u) {
                    s = b.cloneObject(s);
                    s.url = s.cleanUrl || s.url
                }
                return s
            };
            b.getIdByState = function (s) {
                var u = b.extractId(s.url), t;
                if (!u) {
                    t = b.getStateString(s);
                    if (typeof b.stateToId[t] !== "undefined") {
                        u = b.stateToId[t]
                    } else {
                        if (typeof b.store.stateToId[t] !== "undefined") {
                            u = b.store.stateToId[t]
                        } else {
                            while (true) {
                                u = (new Date()).getTime() + String(Math.random()).replace(/\D/g, "");
                                if (typeof b.idToState[u] === "undefined" && typeof b.store.idToState[u] === "undefined") {
                                    break
                                }
                            }
                            b.stateToId[t] = u;
                            b.idToState[u] = s
                        }
                    }
                }
                return u
            };
            b.normalizeState = function (t) {
                var u, s;
                if (!t || (typeof t !== "object")) {
                    t = {}
                }
                if (typeof t.normalized !== "undefined") {
                    return t
                }
                if (!t.data || (typeof t.data !== "object")) {
                    t.data = {}
                }
                u = {};
                u.normalized = true;
                u.title = t.title || "";
                u.url = b.getFullUrl(b.unescapeString(t.url || k.location.href));
                u.hash = b.getShortUrl(u.url);
                u.data = b.cloneObject(t.data);
                u.id = b.getIdByState(u);
                u.cleanUrl = u.url.replace(/\??\&_suid.*/, "");
                u.url = u.cleanUrl;
                s = !b.isEmptyObject(u.data);
                if (u.title || s) {
                    u.hash = b.getShortUrl(u.url).replace(/\??\&_suid.*/, "");
                    if (!/\?/.test(u.hash)) {
                        u.hash += "?"
                    }
                    u.hash += "&_suid=" + u.id
                }
                u.hashedUrl = b.getFullUrl(u.hash);
                if ((b.emulated.pushState || b.bugs.safariPoll) && b.hasUrlDuplicate(u)) {
                    u.url = u.hashedUrl
                }
                return u
            };
            b.createStateObject = function (u, v, t) {
                var s = {data: u, title: v, url: t};
                s = b.normalizeState(s);
                return s
            };
            b.getStateById = function (t) {
                t = String(t);
                var s = b.idToState[t] || b.store.idToState[t] || a;
                return s
            };
            b.getStateString = function (t) {
                var s, u, v;
                s = b.normalizeState(t);
                u = {data: s.data, title: t.title, url: t.url};
                v = o.stringify(u);
                return v
            };
            b.getStateId = function (t) {
                var s, u;
                s = b.normalizeState(t);
                u = s.id;
                return u
            };
            b.getHashByState = function (t) {
                var s, u;
                s = b.normalizeState(t);
                u = s.hash;
                return u
            };
            b.extractId = function (u) {
                var v, t, s;
                t = /(.*)\&_suid=([0-9]+)$/.exec(u);
                s = t ? (t[1] || u) : u;
                v = t ? String(t[2] || "") : "";
                return v || false
            };
            b.isTraditionalAnchor = function (t) {
                var s = !(/[\/\?\.]/.test(t));
                return s
            };
            b.extractState = function (v, u) {
                var s = null, w, t;
                u = u || false;
                w = b.extractId(v);
                if (w) {
                    s = b.getStateById(w)
                }
                if (!s) {
                    t = b.getFullUrl(v);
                    w = b.getIdByUrl(t) || false;
                    if (w) {
                        s = b.getStateById(w)
                    }
                    if (!s && u && !b.isTraditionalAnchor(v)) {
                        s = b.createStateObject(null, null, t)
                    }
                }
                return s
            };
            b.getIdByUrl = function (s) {
                var t = b.urlToId[s] || b.store.urlToId[s] || a;
                return t
            };
            b.getLastSavedState = function () {
                return b.savedStates[b.savedStates.length - 1] || a
            };
            b.getLastStoredState = function () {
                return b.storedStates[b.storedStates.length - 1] || a
            };
            b.hasUrlDuplicate = function (u) {
                var t = false, s;
                s = b.extractState(u.url);
                t = s && s.id !== u.id;
                return t
            };
            b.storeState = function (s) {
                b.urlToId[s.url] = s.id;
                b.storedStates.push(b.cloneObject(s));
                return s
            };
            b.isLastSavedState = function (v) {
                var u = false, t, s, w;
                if (b.savedStates.length) {
                    t = v.id;
                    s = b.getLastSavedState();
                    w = s.id;
                    u = (t === w)
                }
                return u
            };
            b.saveState = function (s) {
                if (b.isLastSavedState(s)) {
                    return false
                }
                b.savedStates.push(b.cloneObject(s));
                return true
            };
            b.getStateByIndex = function (t) {
                var s = null;
                if (typeof t === "undefined") {
                    s = b.savedStates[b.savedStates.length - 1]
                } else {
                    if (t < 0) {
                        s = b.savedStates[b.savedStates.length + t]
                    } else {
                        s = b.savedStates[t]
                    }
                }
                return s
            };
            b.getHash = function () {
                var s = b.unescapeHash(k.location.hash);
                return s
            };
            b.unescapeString = function (u) {
                var s = u, t;
                while (true) {
                    t = i.unescape(s);
                    if (t === s) {
                        break
                    }
                    s = t
                }
                return s
            };
            b.unescapeHash = function (t) {
                var s = b.normalizeHash(t);
                s = b.unescapeString(s);
                return s
            };
            b.normalizeHash = function (t) {
                var s = t.replace(/[^#]*#/, "").replace(/#.*/, "");
                return s
            };
            b.setHash = function (w, t) {
                var s, u, v;
                if (t !== false && b.busy()) {
                    b.pushQueue({scope: b, callback: b.setHash, args: arguments, queue: t});
                    return false
                }
                s = b.escapeHash(w);
                b.busy(true);
                u = b.extractState(w, true);
                if (u && !b.emulated.pushState) {
                    b.pushState(u.data, u.title, u.url, false)
                } else {
                    if (k.location.hash !== s) {
                        if (b.bugs.setHash) {
                            v = b.getPageUrl();
                            b.pushState(null, null, v + "#" + s, false)
                        } else {
                            k.location.hash = s
                        }
                    }
                }
                return b
            };
            b.escapeHash = function (t) {
                var s = b.normalizeHash(t);
                s = i.escape(s);
                if (!b.bugs.hashEscape) {
                    s = s.replace(/\%21/g, "!").replace(/\%26/g, "&").replace(/\%3D/g, "=").replace(/\%3F/g, "?")
                }
                return s
            };
            b.getHashByUrl = function (s) {
                var t = String(s).replace(/([^#]*)#?([^#]*)#?(.*)/, "$2");
                t = b.unescapeHash(t);
                return t
            };
            b.setTitle = function (u) {
                var v = u.title, t;
                if (!v) {
                    t = b.getStateByIndex(0);
                    if (t && t.url === u.url) {
                        v = t.title || b.options.initialTitle
                    }
                }
                try {
                    k.getElementsByTagName("title")[0].innerHTML = v.replace("<", "&lt;").replace(">", "&gt;").replace(" & ", " &amp; ")
                } catch (s) {
                }
                k.title = v;
                return b
            };
            b.queues = [];
            b.busy = function (t) {
                if (typeof t !== "undefined") {
                    b.busy.flag = t
                } else {
                    if (typeof b.busy.flag === "undefined") {
                        b.busy.flag = false
                    }
                }
                if (!b.busy.flag) {
                    l(b.busy.timeout);
                    var s = function () {
                        var v, u, w;
                        if (b.busy.flag) {
                            return
                        }
                        for (v = b.queues.length - 1; v >= 0; --v) {
                            u = b.queues[v];
                            if (u.length === 0) {
                                continue
                            }
                            w = u.shift();
                            b.fireQueueItem(w);
                            b.busy.timeout = c(s, b.options.busyDelay)
                        }
                    };
                    b.busy.timeout = c(s, b.options.busyDelay)
                }
                return b.busy.flag
            };
            b.busy.flag = false;
            b.fireQueueItem = function (s) {
                return s.callback.apply(s.scope || b, s.args || [])
            };
            b.pushQueue = function (s) {
                b.queues[s.queue || 0] = b.queues[s.queue || 0] || [];
                b.queues[s.queue || 0].push(s);
                return b
            };
            b.queue = function (t, s) {
                if (typeof t === "function") {
                    t = {callback: t}
                }
                if (typeof s !== "undefined") {
                    t.queue = s
                }
                if (b.busy()) {
                    b.pushQueue(t)
                } else {
                    b.fireQueueItem(t)
                }
                return b
            };
            b.clearQueue = function () {
                b.busy.flag = false;
                b.queues = [];
                return b
            };
            b.stateChanged = false;
            b.doubleChecker = false;
            b.doubleCheckComplete = function () {
                b.stateChanged = true;
                b.doubleCheckClear();
                return b
            };
            b.doubleCheckClear = function () {
                if (b.doubleChecker) {
                    l(b.doubleChecker);
                    b.doubleChecker = false
                }
                return b
            };
            b.doubleCheck = function (s) {
                b.stateChanged = false;
                b.doubleCheckClear();
                if (b.bugs.ieDoubleCheck) {
                    b.doubleChecker = c(function () {
                        b.doubleCheckClear();
                        if (!b.stateChanged) {
                            s()
                        }
                        return true
                    }, b.options.doubleCheckInterval)
                }
                return b
            };
            b.safariStatePoll = function () {
                var t = b.extractState(k.location.href), s;
                if (!b.isLastSavedState(t)) {
                    s = t
                } else {
                    return
                }
                if (!s) {
                    s = b.createStateObject()
                }
                b.Adapter.trigger(i, "popstate");
                return b
            };
            b.back = function (s) {
                if (s !== false && b.busy()) {
                    b.pushQueue({scope: b, callback: b.back, args: arguments, queue: s});
                    return false
                }
                b.busy(true);
                b.doubleCheck(function () {
                    b.back(false)
                });
                h.go(-1);
                return true
            };
            b.forward = function (s) {
                if (s !== false && b.busy()) {
                    b.pushQueue({scope: b, callback: b.forward, args: arguments, queue: s});
                    return false
                }
                b.busy(true);
                b.doubleCheck(function () {
                    b.forward(false)
                });
                h.go(1);
                return true
            };
            b.go = function (t, s) {
                var u;
                if (t > 0) {
                    for (u = 1; u <= t; ++u) {
                        b.forward(s)
                    }
                } else {
                    if (t < 0) {
                        for (u = -1; u >= t; --u) {
                            b.back(s)
                        }
                    } else {
                        throw new Error("History.go: History.go requires a positive or negative integer passed.")
                    }
                }
                return b
            };
            if (b.emulated.pushState) {
                var r = function () {
                };
                b.pushState = b.pushState || r;
                b.replaceState = b.replaceState || r
            } else {
                b.onPopState = function (v, s) {
                    var x = false, w = false, u, t;
                    b.doubleCheckComplete();
                    u = b.getHash();
                    if (u) {
                        t = b.extractState(u || k.location.href, true);
                        if (t) {
                            b.replaceState(t.data, t.title, t.url, false)
                        } else {
                            b.Adapter.trigger(i, "anchorchange");
                            b.busy(false)
                        }
                        b.expectedStateId = false;
                        return false
                    }
                    x = b.Adapter.extractEventData("state", v, s) || false;
                    if (x) {
                        w = b.getStateById(x)
                    } else {
                        if (b.expectedStateId) {
                            w = b.getStateById(b.expectedStateId)
                        } else {
                            w = b.extractState(k.location.href)
                        }
                    }
                    if (!w) {
                        w = b.createStateObject(null, null, k.location.href)
                    }
                    b.expectedStateId = false;
                    if (b.isLastSavedState(w)) {
                        b.busy(false);
                        return false
                    }
                    b.storeState(w);
                    b.saveState(w);
                    b.setTitle(w);
                    b.Adapter.trigger(i, "statechange");
                    b.busy(false);
                    return true
                };
                b.Adapter.bind(i, "popstate", b.onPopState);
                b.pushState = function (u, w, t, s) {
                    if (b.getHashByUrl(t) && b.emulated.pushState) {
                        throw new Error("History.js does not support states with fragement-identifiers (hashes/anchors).")
                    }
                    if (s !== false && b.busy()) {
                        b.pushQueue({scope: b, callback: b.pushState, args: arguments, queue: s});
                        return false
                    }
                    b.busy(true);
                    var v = b.createStateObject(u, w, t);
                    if (b.isLastSavedState(v)) {
                        b.busy(false)
                    } else {
                        b.storeState(v);
                        b.expectedStateId = v.id;
                        h.pushState(v.id, v.title, v.url);
                        b.Adapter.trigger(i, "popstate")
                    }
                    return true
                };
                b.replaceState = function (u, w, t, s) {
                    if (b.getHashByUrl(t) && b.emulated.pushState) {
                        throw new Error("History.js does not support states with fragement-identifiers (hashes/anchors).")
                    }
                    if (s !== false && b.busy()) {
                        b.pushQueue({scope: b, callback: b.replaceState, args: arguments, queue: s});
                        return false
                    }
                    b.busy(true);
                    var v = b.createStateObject(u, w, t);
                    if (b.isLastSavedState(v)) {
                        b.busy(false)
                    } else {
                        b.storeState(v);
                        b.expectedStateId = v.id;
                        h.replaceState(v.id, v.title, v.url);
                        b.Adapter.trigger(i, "popstate")
                    }
                    return true
                }
            }
            if (m) {
                try {
                    b.store = o.parse(m.getItem("History.store")) || {}
                } catch (q) {
                    b.store = {}
                }
                b.normalizeStore()
            } else {
                b.store = {};
                b.normalizeStore()
            }
            b.Adapter.bind(i, "beforeunload", b.clearAllIntervals);
            b.Adapter.bind(i, "unload", b.clearAllIntervals);
            b.saveState(b.storeState(b.extractState(k.location.href, true)));
            if (m) {
                b.onUnload = function () {
                    var s, u;
                    try {
                        s = o.parse(m.getItem("History.store")) || {}
                    } catch (t) {
                        s = {}
                    }
                    s.idToState = s.idToState || {};
                    s.urlToId = s.urlToId || {};
                    s.stateToId = s.stateToId || {};
                    for (u in b.idToState) {
                        if (!b.idToState.hasOwnProperty(u)) {
                            continue
                        }
                        s.idToState[u] = b.idToState[u]
                    }
                    for (u in b.urlToId) {
                        if (!b.urlToId.hasOwnProperty(u)) {
                            continue
                        }
                        s.urlToId[u] = b.urlToId[u]
                    }
                    for (u in b.stateToId) {
                        if (!b.stateToId.hasOwnProperty(u)) {
                            continue
                        }
                        s.stateToId[u] = b.stateToId[u]
                    }
                    b.store = s;
                    b.normalizeStore();
                    m.setItem("History.store", o.stringify(s))
                };
                b.intervalList.push(f(b.onUnload, b.options.storeInterval));
                b.Adapter.bind(i, "beforeunload", b.onUnload);
                b.Adapter.bind(i, "unload", b.onUnload)
            }
            if (!b.emulated.pushState) {
                if (b.bugs.safariPoll) {
                    b.intervalList.push(f(b.safariStatePoll, b.options.safariPollInterval))
                }
                if (n.vendor === "Apple Computer, Inc." || (n.appCodeName || "") === "Mozilla") {
                    b.Adapter.bind(i, "hashchange", function () {
                        b.Adapter.trigger(i, "popstate")
                    });
                    if (b.getHash()) {
                        b.Adapter.onDomLoad(function () {
                            b.Adapter.trigger(i, "hashchange")
                        })
                    }
                }
            }
        };
        b.init()
    }
})(window);
jQuery(document).ready(function () {
    if (jQuery("#img").length > 0) {
        jQuery("#img").fadegallery({control_event: "mouseover", auto_play: true, control: jQuery("ul#imgControl"), delay: 4})
    }
    var a = jQuery("ul#eventImg > li").eq(0);
    a.show();
    if (jQuery("ul.ListEvent").length > 0) {
        jQuery("ul.ListEvent").slidepanel({animation: true, actEvent: "mouseover", handle: "li > a.TitleEvent", actPanel: 0, accordion: true, serialize: true, client_callback: function () {
            var b = jQuery("ul.ListEvent > li > a.SlidePanelHandleActive").parent().prevAll().length;
            a.hide();
            jQuery("ul#eventImg > li").eq(b).show();
            a = jQuery("ul#eventImg > li").eq(b)
        }})
    }
});
var moduleOuputId;
var token;
var shortUri;
var cateCode;
var currentSearchTab;
var currentTab;
var currentSection;
var activemenu_nav;
var activesidenav;
var IE6 = jQuery.browser.msie && jQuery.browser.version == 6;
var IE7 = jQuery.browser.msie && jQuery.browser.version == 7;
(function (b, c) {
    if (!IE6 && !IE7) {
        var a = b.History
    }
})(window);
jQuery(document).ready(function () {
    moduleOuputId = jQuery("#moduleOuputId").val();
    token = jQuery("#token").val();
    shortUri = jQuery("#shortUri").val();
    cateCode = jQuery("#cateCode").val();
    currentSearchTab = jQuery("#currentSearchTab").val();
    currentTab = (jQuery("#currentTab").length > 0) ? jQuery("#currentTab").val() : "";
    currentSection = $("#currentSection").val();
    activemenu_nav = $("#activeMenuNav").val();
    activesidenav = $("#activeSideNav").val()
});
jQuery(document).ready(function () {
    if (jQuery(".PagingWrapper .PagingControl .CenterWrapper").length > 0) {
        jQuery(".PagingWrapper .PagingControl .CenterWrapper a.PagingLinkRanking").live("click", function () {
            var b = $(this).attr("rel").replace(/\r\n\s/g, "").toString();
            a(b);
            return false
        })
    }
    function a(f) {
        var c = f.split("&");
        var b = 'block={"' + c[0] + '":{}}&' + c[1];
        var d = c[2] == "''" ? "" : c[2];
        var e = c[0];
        if (c[3] == "module") {
            b = "module=" + c[0] + '&moduleParams={"aSearchCondition":"' + c[4] + '","aFilterCondition":"' + c[5] + '","iSearchOption":"' + c[6] + '"}&token=' + c[1]
        }
        $.ajax({type: "POST", url: d, dataType: "json", data: b, success: function (g) {
            if ($("#gpTabContent01")) {
                $("#gpTabContent01").html(g[e]["sContent"])
            }
        }})
    }
});
jQuery(document).ready(function () {
    if (jQuery("#tabHeader > li > a.TabCateEvent").length > 0) {
        jQuery("#tabHeader > li > a.TabCateEvent").bind("click", function () {
            if (jQuery(this).parent().hasClass("Active")) {
                return false
            } else {
                var f = jQuery(this).attr("rel").split("_");
                c(f[0], f[1], this)
            }
            return false
        })
    }
    var a = currentTab;
    var e = {};

    function c(g, f, h) {
        a = g;
        jQuery("#boxTab > ul > li.Active").removeClass("Active");
        jQuery(h).parent().addClass("Active");
        if (!e[g]) {
            jQuery.ajax({type: "POST", url: f, dataType: "json", data: "module=" + moduleOuputId + "&moduleParams={}&token=" + token, success: function (i) {
                e[g] = i[moduleOuputId];
                jQuery("#eventResult").html(e[g]);
                trackLink("#eventResult")
            }})
        } else {
            jQuery("#eventResult").html(e[g]);
            trackLink("#eventResult")
        }
    }

    if (jQuery(".PagingWrapper .PagingControl .CenterWrapper").length > 0) {
        jQuery(".PagingWrapper .PagingControl .CenterWrapper a.PagingLinkEvent").live("click", function () {
            var f = $(this).attr("rel").replace(/\r\n\s/g, "").toString();
            d(f);
            return false
        })
    }
    function d(l) {
        var h = l.split("&");
        var g = 'block={"' + h[0] + '":{}}&' + h[1];
        var i = h[2] == "''" ? "" : h[2];
        var j = h[0];
        if (h[3] == "module") {
            var f = jQuery("#actionSearch").val();
            var m = jQuery("#keyWord").val();
            var k = jQuery("#categoryCode").val();
            if (jQuery.trim(f) == "search") {
                g = "module=" + h[0] + '&moduleParams={"keyWord":"' + m + '","categoryCode":"' + k + '"}&token=' + h[1]
            } else {
                g = "module=" + h[0] + "&moduleParams={}&token=" + h[1]
            }
        }
        $.ajax({type: "POST", url: i, dataType: "json", data: g, success: function (o) {
            $("#" + j).html(o[j]);
            if (h[3] == "module") {
                if (jQuery.trim(f) == "search") {
                    if ($("#listEventContent")) {
                        $("#listEventContent").html(o[moduleOuputId]["content"])
                    }
                    if ($("#pagingContent")) {
                        $("#pagingContent").html(o[moduleOuputId]["paging"])
                    }
                } else {
                    if ($("#eventResult")) {
                        $("#eventResult").html(o[moduleOuputId])
                    }
                }
            }
            if (!IE6 && !IE7) {
                if (History.enabled) {
                    var n = "";
                    if (window.location.href.indexOf("?") > -1) {
                        n = window.location.href.split("?");
                        n = n[1]
                    }
                    History.pushState(null, "", i + "?" + n)
                }
            }
        }, error: function (n) {
        }})
    }

    function b(h) {
        var g = "";
        var f = jQuery("#actionSearch").val();
        var i = jQuery("#keyWord").val();
        if (jQuery.trim(f) == "search") {
            g = "module=" + moduleOuputId + '&moduleParams={"keyWord":"' + i + '"}&token=' + token
        } else {
            g = "module=" + moduleOuputId + "&moduleParams={}&token=" + token
        }
        $.ajax({type: "POST", url: h, dataType: "json", data: g, success: function (j) {
            if (jQuery.trim(f) == "search") {
                if ($("#listEventContent")) {
                    $("#listEventContent").html(j[moduleOuputId]["content"])
                }
                if ($("#pagingContent")) {
                    $("#pagingContent").html(j[moduleOuputId]["paging"])
                }
            } else {
                if ($("#eventResult")) {
                    $("#eventResult").html(j[moduleOuputId])
                }
            }
            if (!IE6 && !IE7) {
                if (History.enabled) {
                    History.pushState(null, "", h)
                }
            }
        }})
    }

    (function (f, g) {
        if (!IE6 && !IE7) {
            History.Adapter.bind(f, "statechange", function () {
                var h = History.getState();
                if (currentSection == "su-kien") {
                    b(h.url)
                }
            })
        }
    })(window)
});
function callExternalFunction(c, a, b) {
    c.select.trigger("onchange");
    if (jQuery("#year").length > 0 && jQuery("#month").length) {
        loadCalendar()
    }
};
function loadCalendar() {
    var d = jQuery("#moduleOuputId").val();
    var b = jQuery("#token").val();
    var e = jQuery("#shortUri").val();
    var a = {};
    var c = jQuery("select[name='year']").val();
    var g = jQuery("select[name='month']").val();
    var f = c + "-" + g;
    if (!a[f]) {
        $.ajax({type: "POST", url: e + "." + c + "." + g + ".html", dataType: "json", data: 'block={"' + d + '":{}}&token=' + b, success: function (h) {
            if ($("#" + d)) {
                $("#" + d).html(h[d])
            }
            a[f] = $("#" + d).html()
        }})
    } else {
        $("#" + d).html(a[f])
    }
}
jQuery(document).ready(function () {
    if (jQuery("#year").length > 0 && jQuery("#month").length) {
        jQuery("#year,#month").live("change", function () {
            loadCalendar()
        })
    }
    if (jQuery("#year").length > 0) {
        jQuery(".SelectUI").addSelectUI({scrollbarWidth: 0})
    }
    if (jQuery(".CalendarEvent").length > 0) {
        jQuery(".CalendarEvent").jScrollPane({scrollbarWidth: 18, scrollbarMargin: 0, verticalDragMinHeight: 89, verticalDragMaxHeight: 89, showArrows: true})
    }
    if (jQuery(".ListDate > li.Active > a").length > 0) {
        var a = $(".ListDate > li.Active > a").attr("rel").replace(/\r\n\s/g, "").toString()
    }
    jQuery(".ListDate > li > a.HasContent").live("click", function () {
        jQuery(".ListDate > li.Active").removeClass("Active");
        jQuery(this).parent("li").addClass("Active");
        var c = $(this).attr("rel").replace(/\r\n\s/g, "").toString();
        b(c);
        return false
    });
    function b(c) {
        var f = jQuery("#calBlockOutputId").val();
        var d = jQuery("#calToken").val();
        var e = jQuery("#calShortUri").val();
        $.ajax({type: "POST", url: SITE_URL + "/" + e + "." + c + ".html", dataType: "json", data: 'block={"' + f + '":{}}&token=' + d + '&blockParams={"date":"' + c + '"}', success: function (g) {
            $("#dayEventContent .Content").html(g[f]);
            if (jQuery(".CalendarEvent").length > 0) {
                jQuery(".CalendarEvent").jScrollPane({scrollbarWidth: 18, scrollbarMargin: 0, verticalDragMinHeight: 89, verticalDragMaxHeight: 89, showArrows: true})
            }
        }})
    }
});
jQuery(document).ready(function () {
    if (jQuery("#pagingFAQ .PagingControl .CenterWrapper").length > 0) {
        loadPageFAQ("#pagingFAQ .PagingControl .CenterWrapper  a")
    }
    if (jQuery(".QuestionList li > h3").length > 0) {
        jQuery(".QuestionList").slidepanel({animation: false, handle: "li > h3 > a.Anchor1", actEvent: "click", accordion: true, serialize: true, client_callback: function () {
        }})
    }
});
function loadPageFAQ(a) {
    jQuery(a).each(function (c) {
        var b = jQuery(this);
        b.bind("click", function (e) {
            var k = b.attr("rel").replace(/\r\n\s/g, "").toString();
            var f = k.split("&");
            var d = "module=" + f[0] + "&" + f[1] + "&" + f[2];
            var g = f[3] == "''" ? "" : f[3];
            var h = f[0];
            var j = function (m, l) {
            };
            var i = {};
            jQuery.ajax({type: "POST", url: g, dataType: "json", data: d, success: function (l) {
                jQuery("#" + h).html(l[h]);
                loadPageFAQ(a);
                trackLink($("#" + h), false);
                if (jQuery(".QuestionList li > h3").length > 0) {
                    jQuery(".QuestionList").slidepanel({animation: false, handle: "li > h3 > a.Anchor1", actEvent: "click", client_callback: function () {
                    }, accordion: true, serialize: true})
                }
            }, error: function (l) {
            }});
            return false
        })
    })
};
jQuery(document).ready(function () {
    var h = jQuery("#moduleOuputId").val();
    var d = jQuery("#token").val();
    var g = jQuery("#currentTab").val();
    if (jQuery(".PagingWrapper .PagingControl .CenterWrapper").length > 0) {
        jQuery(".PagingWrapper .PagingControl .CenterWrapper a.PagingLinkItem").live("click", function () {
            var i = jQuery(this).attr("rel");
            c(i);
            return false
        })
    }
    if (jQuery("#tabHeader").length > 0) {
        jQuery("#tabHeader > li > a.TabCateItems").bind("click", function () {
            if (jQuery(this).parent().hasClass("Active")) {
                return false
            } else {
                var i = jQuery(this).attr("rel").split("_");
                b(i[0], i[1])
            }
            return false
        })
    }
    if (jQuery("ul.ListItem").length > 0) {
        jQuery("ul.ListItem .ItemInfo").live("click", function () {
            var i = jQuery(this).attr("rel");
            f(i);
            return false
        })
    }
    var a = g;
    var e = {};

    function b(j, i) {
        a = j;
        jQuery("ul#tabHeader > li.Active").removeClass("Active");
        jQuery("#list_news_tab_" + a).addClass("Active");
        if (!e[j]) {
            jQuery.ajax({type: "POST", url: i, dataType: "json", data: "module=" + h + "&moduleParams={}&token=" + d, success: function (k) {
                if ($("#listItemContent")) {
                    $("#listItemContent").html(k[h]["content"])
                }
                if ($(".BlockListNews")) {
                    $(".BlockListNews").html(k[h]["paging"])
                }
                e[j] = $("#search_result").html();
                trackLink("#search_result")
            }})
        } else {
            jQuery("#search_result").html(e[j]);
            trackLink("#search_result")
        }
    }

    jQuery.onload = function () {
        var i = {}
    };
    function c(k) {
        var i = k.split("&")[0];
        var j = k.split("&")[3];
        if (j == "module") {
            dataPost = "module=" + i + "&moduleParams={}&" + k.split("&")[1]
        } else {
            if (j == "block") {
                dataPost = 'block={"' + i + '":{}}&' + k.split("&")[1]
            }
        }
        jQuery.ajax({type: "POST", url: k.split("&")[2], dataType: "json", data: dataPost, success: function (m) {
            var l = m[i]["content"] + m[i]["paging"];
            jQuery("." + i).html(l);
            trackLink("." + i)
        }})
    }

    function f(i) {
        jQuery.ajax({type: "POST", url: i, dataType: "json", data: "module=" + h + "&moduleParams={}&token=" + d, success: function (j) {
            if (j[h] != "") {
                jQuery("body").append(j[h]);
                jQuery("#itemDetail_").css("display", "block");
                createOverlays("itemDetail_")
            }
            jQuery("a.Close").bind("click", function () {
                closeVideo("itemDetail_");
                jQuery("#itemDetail_").remove();
                return false
            });
            jQuery("#overlays").bind("click", function () {
                jQuery("#itemDetail_").remove();
                return false
            })
        }});
        return false
    }
});
jQuery(document).ready(function () {
    if (jQuery(".PagingWrapper .PagingControl .CenterWrapper").length > 0) {
        jQuery(".PagingWrapper .PagingControl .CenterWrapper a.PagingLinkNews").live("click", function () {
            var g = jQuery(this).attr("rel");
            b(g);
            return false
        })
    }
    if (jQuery(".PagingWrapper .PagingControl .CenterWrapper").length > 0) {
        jQuery(".PagingWrapper .PagingControl .CenterWrapper a.PagingLinkRelatedNews").live("click", function () {
            var g = jQuery(this).attr("rel");
            d(g);
            return false
        })
    }
    if (jQuery("#tabHeader > li > a.TabCateNews").length > 0) {
        jQuery("#tabHeader > li > a.TabCateNews").bind("click", function () {
            if (jQuery(this).parent().hasClass("Active")) {
                return false
            } else {
                var g = jQuery(this).attr("rel").split("_");
                a(g[0], g[1], this)
            }
            return false
        })
    }
    var c = currentTab;
    var f = {};

    function a(h, g, i) {
        c = h;
        jQuery("#boxTab > ul > li.Active").removeClass("Active");
        jQuery(i).parent().addClass("Active");
        if (!f[h]) {
            jQuery.ajax({type: "POST", url: g, dataType: "json", data: "module=" + moduleOuputId + "&moduleParams={}&token=" + token, success: function (j) {
                f[h] = j[moduleOuputId];
                jQuery("#searchResult").html(f[h]);
                trackLink("#searchResult")
            }})
        } else {
            jQuery("#searchResult").html(f[h]);
            trackLink("#searchResult")
        }
    }

    function b(i) {
        var g = i.split("&")[0];
        var h = i.split("&")[3];
        if (h == "module") {
            dataPost = "module=" + g + "&moduleParams={}&" + i.split("&")[1]
        } else {
            if (h == "block") {
                dataPost = 'block={"' + g + '":{}}&' + i.split("&")[1]
            }
        }
        jQuery.ajax({type: "POST", url: i.split("&")[2], dataType: "json", data: dataPost, success: function (l) {
            jQuery("." + g).html(l[g]);
            if (!IE6 && !IE7) {
                if (History.enabled) {
                    var k = "";
                    if (window.location.href.indexOf("?") > -1) {
                        k = window.location.href.split("?");
                        k = k[1]
                    }
                    var j;
                    if (k != "") {
                        j = i.split("&")[2] + "?" + k
                    } else {
                        j = i.split("&")[2]
                    }
                    History.pushState(null, "", j)
                }
            }
        }})
    }

    function d(i) {
        var g = i.split("&")[0];
        var h = i.split("&")[3];
        if (h == "module") {
            dataPost = "module=" + g + "&moduleParams={}&" + i.split("&")[1]
        } else {
            if (h == "block") {
                dataPost = 'block={"' + g + '":{}}&' + i.split("&")[1]
            }
        }
        jQuery.ajax({type: "POST", url: i.split("&")[2], dataType: "json", data: dataPost, success: function (j) {
            jQuery("." + g).html(j[g])
        }})
    }

    function e(g) {
        jQuery.ajax({type: "POST", url: g, dataType: "json", data: "module=" + moduleOuputId + "&moduleParams={}&token=" + token, success: function (h) {
            jQuery("." + moduleOuputId).html(h[moduleOuputId]);
            if (!IE6 && !IE7) {
                if (History.enabled) {
                    History.pushState(null, "", g)
                }
            }
        }})
    }

    (function (g, h) {
        if (!IE6 && !IE7) {
            History.Adapter.bind(g, "statechange", function () {
                var i = History.getState();
                if (currentSection == "tin-tuc") {
                    e(i.url)
                }
            })
        }
    })(window)
});
jQuery(document).ready(function () {
    var a = IMG_URL + "/skin/core-template-012012/images/icon_date.jpg";
    if (jQuery(".Calendar").length > 0) {
        jQuery("#fromDate").datepicker({showOn: "both", buttonImage: a, buttonImageOnly: true, dateFormat: "dd/mm/yy", beforeShowDay: function (b) {
            var d = jQuery("#toDate").attr("value");
            if (d != "") {
                var g = d.split("../index.html");
                var d = parseInt(g[0]);
                if (g[1].charAt(0) == "0") {
                    g[1] = g[1].replace("0", "")
                }
                var c = parseInt(g[1]) - 1;
                var f = parseInt(g[2]);
                var e;
                if (jQuery.browser.msie) {
                    e = b.getYear()
                } else {
                    e = b.getYear() + 1900
                }
                if ((e == f && b.getMonth() > c) || (e == f && b.getMonth() == c && b.getDate() > d) || (e > f)) {
                    return[false, ""]
                } else {
                    return[true, ""]
                }
            } else {
                return[true, ""]
            }
        }});
        jQuery("#toDate").datepicker({showOn: "both", buttonImage: a, buttonImageOnly: true, dateFormat: "dd/mm/yy", beforeShowDay: function (d) {
            var e = jQuery("#fromDate").attr("value");
            if (e != "") {
                var h = e.split("../index.html");
                var b = parseInt(h[0]);
                if (h[1].charAt(0) == "0") {
                    h[1] = h[1].replace("0", "")
                }
                var g = parseInt(h[1]) - 1;
                var f = parseInt(h[2]);
                var c;
                if (jQuery.browser.msie) {
                    c = d.getYear()
                } else {
                    c = d.getYear() + 1900
                }
                if ((c == f && d.getMonth() < g) || (c == f && d.getMonth() == g && d.getDate() < b) || (c < f)) {
                    return[false, ""]
                } else {
                    return[true, ""]
                }
            } else {
                return[true, ""]
            }
        }})
    }
}); 
