! function(t, e, n, o) {
    "use strict";

    function a(t) {
        var e = n(t.currentTarget),
            o = t.data ? t.data.options : {},
            a = e.attr("data-fancybox") || "",
            i = 0,
            s = [];
        t.isDefaultPrevented() || (t.preventDefault(), a ? (s = o.selector ? n(o.selector) : t.data ? t.data.items : [], s = s.length ? s.filter('[data-fancybox="' + a + '"]') : n('[data-fancybox="' + a + '"]'), i = s.index(e), i < 0 && (i = 0)) : s = [e], n.fancybox.open(s, o, i))
    }
    if (n) {
        if (n.fn.fancybox) return void("console" in t && console.log("fancyBox already initialized"));
        var i = { loop: !1, margin: [44, 0], gutter: 50, keyboard: !0, arrows: !0, infobar: !0, toolbar: !0, buttons: ["slideShow", "fullScreen", "thumbs", "share", "close"], idleTime: 3, smallBtn: "auto", protect: !1, modal: !1, image: { preload: "auto" }, ajax: { settings: { data: { fancybox: !0 } } }, iframe: { tpl: '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen allowtransparency="true" src=""></iframe>', preload: !0, css: {}, attr: { scrolling: "auto" } }, defaultType: "image", animationEffect: "zoom", animationDuration: 500, zoomOpacity: "auto", transitionEffect: "fade", transitionDuration: 366, slideClass: "", baseClass: "", baseTpl: '<div class="fancybox-container" role="dialog" tabindex="-1"><div class="fancybox-bg"></div><div class="fancybox-inner"><div class="fancybox-infobar"><span data-fancybox-index></span>&nbsp;/&nbsp;<span data-fancybox-count></span></div><div class="fancybox-toolbar">{{buttons}}</div><div class="fancybox-navigation">{{arrows}}</div><div class="fancybox-stage"></div><div class="fancybox-caption-wrap"><div class="fancybox-caption"></div></div></div></div>', spinnerTpl: '<div class="fancybox-loading"></div>', errorTpl: '<div class="fancybox-error"><p>{{ERROR}}<p></div>', btnTpl: { download: '<a download data-fancybox-download class="fancybox-button fancybox-button--download" title="{{DOWNLOAD}}"><svg viewBox="0 0 40 40"><path d="M20,23 L20,8 L20,23 L13,16 L20,23 L27,16 L20,23 M26,28 L13,28 L27,28 L14,28" /></svg></a>', zoom: '<button data-fancybox-zoom class="fancybox-button fancybox-button--zoom" title="{{ZOOM}}"><svg viewBox="0 0 40 40"><path d="M 18,17 m-8,0 a 8,8 0 1,0 16,0 a 8,8 0 1,0 -16,0 M25,23 L31,29 L25,23" /></svg></button>', close: '<button data-fancybox-close class="fancybox-button fancybox-button--close" title="{{CLOSE}}"><svg viewBox="0 0 40 40"><path d="M10,10 L30,30 M30,10 L10,30" /></svg></button>', smallBtn: '<button data-fancybox-close class="fancybox-close-small" title="{{CLOSE}}"></button>', arrowLeft: '<button data-fancybox-prev class="fancybox-button fancybox-button--arrow_left" title="{{PREV}}"><svg viewBox="0 0 40 40"><path d="M10,20 L30,20 L10,20 L18,28 L10,20 L18,12 L10,20"></path></svg></button>', arrowRight: '<button data-fancybox-next class="fancybox-button fancybox-button--arrow_right" title="{{NEXT}}"><svg viewBox="0 0 40 40"><path d="M30,20 L10,20 L30,20 L22,28 L30,20 L22,12 L30,20"></path></svg></button>' }, parentEl: "body", autoFocus: !1, backFocus: !0, trapFocus: !0, fullScreen: { autoStart: !1 }, touch: { vertical: !0, momentum: !0 }, hash: null, media: {}, slideShow: { autoStart: !1, speed: 4e3 }, thumbs: { autoStart: !1, hideOnClose: !0, parentEl: ".fancybox-container", axis: "y" }, onInit: n.noop, beforeLoad: n.noop, afterLoad: n.noop, beforeShow: n.noop, afterShow: n.noop, beforeClose: n.noop, afterClose: n.noop, onActivate: n.noop, onDeactivate: n.noop, clickContent: function(t, e) { return "image" === t.type && "zoom" }, clickSlide: "close", clickOutside: "close", dblclickContent: !1, dblclickSlide: !1, dblclickOutside: !1, mobile: { margin: 0, clickContent: function(t, e) { return "image" === t.type && "toggleControls" }, clickSlide: function(t, e) { return "image" === t.type ? "toggleControls" : "close" }, dblclickContent: function(t, e) { return "image" === t.type && "zoom" }, dblclickSlide: function(t, e) { return "image" === t.type && "zoom" } }, lang: "en", i18n: { en: { CLOSE: "Close", NEXT: "Next", PREV: "Previous", ERROR: "The requested content cannot be loaded. <br/> Please try again later.", PLAY_START: "Start slideshow", PLAY_STOP: "Pause slideshow", FULL_SCREEN: "Full screen", THUMBS: "Thumbnails", DOWNLOAD: "Download", SHARE: "Share", ZOOM: "Zoom" }, de: { CLOSE: "Schliessen", NEXT: "Weiter", PREV: "Zurück", ERROR: "Die angeforderten Daten konnten nicht geladen werden. <br/> Bitte versuchen Sie es später nochmal.", PLAY_START: "Diaschau starten", PLAY_STOP: "Diaschau beenden", FULL_SCREEN: "Vollbild", THUMBS: "Vorschaubilder", DOWNLOAD: "Herunterladen", SHARE: "Teilen", ZOOM: "Maßstab" } } },
            s = n(t),
            r = n(e),
            c = 0,
            l = function(t) { return t && t.hasOwnProperty && t instanceof n },
            u = function() { return t.requestAnimationFrame || t.webkitRequestAnimationFrame || t.mozRequestAnimationFrame || t.oRequestAnimationFrame || function(e) { return t.setTimeout(e, 1e3 / 60) } }(),
            d = function() {
                var t, n = e.createElement("fakeelement"),
                    a = { transition: "transitionend", OTransition: "oTransitionEnd", MozTransition: "transitionend", WebkitTransition: "webkitTransitionEnd" };
                for (t in a)
                    if (n.style[t] !== o) return a[t];
                return "transitionend"
            }(),
            f = function(t) { return t && t.length && t[0].offsetHeight },
            p = function(t, o, a) {
                var i = this;
                i.opts = n.extend(!0, { index: a }, n.fancybox.defaults, o || {}), n.fancybox.isMobile && (i.opts = n.extend(!0, {}, i.opts, i.opts.mobile)), o && n.isArray(o.buttons) && (i.opts.buttons = o.buttons), i.id = i.opts.id || ++c, i.group = [], i.currIndex = parseInt(i.opts.index, 10) || 0, i.prevIndex = null, i.prevPos = null, i.currPos = 0, i.firstRun = null, i.createGroup(t), i.group.length && (i.$lastFocus = n(e.activeElement).blur(), i.slides = {}, i.init())
            };
        n.extend(p.prototype, {
            init: function() {
                var a, i, s, c = this,
                    l = c.group[c.currIndex],
                    u = l.opts,
                    d = n.fancybox.scrollbarWidth;
                c.scrollTop = r.scrollTop(), c.scrollLeft = r.scrollLeft(), n.fancybox.getInstance() || (n("body").addClass("fancybox-active"), /iPad|iPhone|iPod/.test(navigator.userAgent) && !t.MSStream ? "image" !== l.type && n("body").css("top", n("body").scrollTop() * -1).addClass("fancybox-iosfix") : !n.fancybox.isMobile && e.body.scrollHeight > t.innerHeight && (d === o && (a = n('<div style="width:50px;height:50px;overflow:scroll;" />').appendTo("body"), d = n.fancybox.scrollbarWidth = a[0].offsetWidth - a[0].clientWidth, a.remove()), n("head").append('<style id="fancybox-style-noscroll" type="text/css">.compensate-for-scrollbar { margin-right: ' + d + "px; }</style>"), n("body").addClass("compensate-for-scrollbar"))), s = "", n.each(u.buttons, function(t, e) { s += u.btnTpl[e] || "" }), i = n(c.translate(c, u.baseTpl.replace("{{buttons}}", s).replace("{{arrows}}", u.btnTpl.arrowLeft + u.btnTpl.arrowRight))).attr("id", "fancybox-container-" + c.id).addClass("fancybox-is-hidden").addClass(u.baseClass).data("FancyBox", c).appendTo(u.parentEl), c.$refs = { container: i }, ["bg", "inner", "infobar", "toolbar", "stage", "caption", "navigation"].forEach(function(t) { c.$refs[t] = i.find(".fancybox-" + t) }), c.trigger("onInit"), c.activate(), c.jumpTo(c.currIndex)
            },
            translate: function(t, e) { var n = t.opts.i18n[t.opts.lang]; return e.replace(/\{\{(\w+)\}\}/g, function(t, e) { var a = n[e]; return a === o ? t : a }) },
            createGroup: function(t) {
                var e = this,
                    a = n.makeArray(t);
                n.each(a, function(t, a) {
                    var i, s, r, c, l = {},
                        u = {};
                    n.isPlainObject(a) ? (l = a, u = a.opts || a) : "object" === n.type(a) && n(a).length ? (i = n(a), u = i.data(), u = n.extend({}, u, u.options || {}), u.$orig = i, l.src = u.src || i.attr("href"), l.type || l.src || (l.type = "inline", l.src = a)) : l = { type: "html", src: a + "" }, l.opts = n.extend(!0, {}, e.opts, u), n.isArray(u.buttons) && (l.opts.buttons = u.buttons), s = l.type || l.opts.type, r = l.src || "", !s && r && (r.match(/(^data:image\/[a-z0-9+\/=]*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp|svg|ico)((\?|#).*)?$)/i) ? s = "image" : r.match(/\.(pdf)((\?|#).*)?$/i) ? s = "pdf" : "#" === r.charAt(0) && (s = "inline")), s ? l.type = s : e.trigger("objectNeedsType", l), l.index = e.group.length, l.opts.$orig && !l.opts.$orig.length && delete l.opts.$orig, !l.opts.$thumb && l.opts.$orig && (l.opts.$thumb = l.opts.$orig.find("img:first")), l.opts.$thumb && !l.opts.$thumb.length && delete l.opts.$thumb, "function" === n.type(l.opts.caption) && (l.opts.caption = l.opts.caption.apply(a, [e, l])), "function" === n.type(e.opts.caption) && (l.opts.caption = e.opts.caption.apply(a, [e, l])), l.opts.caption instanceof n || (l.opts.caption = l.opts.caption === o ? "" : l.opts.caption + ""), "ajax" === s && (c = r.split(/\s+/, 2), c.length > 1 && (l.src = c.shift(), l.opts.filter = c.shift())), "auto" == l.opts.smallBtn && (n.inArray(s, ["html", "inline", "ajax"]) > -1 ? (l.opts.toolbar = !1, l.opts.smallBtn = !0) : l.opts.smallBtn = !1), "pdf" === s && (l.type = "iframe", l.opts.iframe.preload = !1), l.opts.modal && (l.opts = n.extend(!0, l.opts, { infobar: 0, toolbar: 0, smallBtn: 0, keyboard: 0, slideShow: 0, fullScreen: 0, thumbs: 0, touch: 0, clickContent: !1, clickSlide: !1, clickOutside: !1, dblclickContent: !1, dblclickSlide: !1, dblclickOutside: !1 })), e.group.push(l)
                })
            },
            addEvents: function() {
                var o = this;
                o.removeEvents(), o.$refs.container.on("click.fb-close", "[data-fancybox-close]", function(t) { t.stopPropagation(), t.preventDefault(), o.close(t) }).on("click.fb-prev touchend.fb-prev", "[data-fancybox-prev]", function(t) { t.stopPropagation(), t.preventDefault(), o.previous() }).on("click.fb-next touchend.fb-next", "[data-fancybox-next]", function(t) { t.stopPropagation(), t.preventDefault(), o.next() }).on("click.fb", "[data-fancybox-zoom]", function(t) { o[o.isScaledDown() ? "scaleToActual" : "scaleToFit"]() }), s.on("orientationchange.fb resize.fb", function(t) { t && t.originalEvent && "resize" === t.originalEvent.type ? u(function() { o.update() }) : (o.$refs.stage.hide(), setTimeout(function() { o.$refs.stage.show(), o.update() }, 600)) }), r.on("focusin.fb", function(t) {
                    var a = n.fancybox ? n.fancybox.getInstance() : null;
                    a.isClosing || !a.current || !a.current.opts.trapFocus || n(t.target).hasClass("fancybox-container") || n(t.target).is(e) || a && "fixed" !== n(t.target).css("position") && !a.$refs.container.has(t.target).length && (t.stopPropagation(), a.focus(), s.scrollTop(o.scrollTop).scrollLeft(o.scrollLeft))
                }), r.on("keydown.fb", function(t) {
                    var e = o.current,
                        a = t.keyCode || t.which;
                    if (e && e.opts.keyboard && !n(t.target).is("input") && !n(t.target).is("textarea")) return 8 === a || 27 === a ? (t.preventDefault(), void o.close(t)) : 37 === a || 38 === a ? (t.preventDefault(), void o.previous()) : 39 === a || 40 === a ? (t.preventDefault(), void o.next()) : void o.trigger("afterKeydown", t, a)
                }), o.group[o.currIndex].opts.idleTime && (o.idleSecondsCounter = 0, r.on("mousemove.fb-idle mouseleave.fb-idle mousedown.fb-idle touchstart.fb-idle touchmove.fb-idle scroll.fb-idle keydown.fb-idle", function(t) { o.idleSecondsCounter = 0, o.isIdle && o.showControls(), o.isIdle = !1 }), o.idleInterval = t.setInterval(function() { o.idleSecondsCounter++, o.idleSecondsCounter >= o.group[o.currIndex].opts.idleTime && (o.isIdle = !0, o.idleSecondsCounter = 0, o.hideControls()) }, 1e3))
            },
            removeEvents: function() {
                var e = this;
                s.off("orientationchange.fb resize.fb"), r.off("focusin.fb keydown.fb .fb-idle"), this.$refs.container.off(".fb-close .fb-prev .fb-next"), e.idleInterval && (t.clearInterval(e.idleInterval), e.idleInterval = null)
            },
            previous: function(t) { return this.jumpTo(this.currPos - 1, t) },
            next: function(t) { return this.jumpTo(this.currPos + 1, t) },
            jumpTo: function(t, e, a) {
                var i, s, r, c, l, u, d, p = this,
                    h = p.group.length;
                if (!(p.isSliding || p.isClosing || p.isAnimating && p.firstRun)) {
                    if (t = parseInt(t, 10), s = p.current ? p.current.opts.loop : p.opts.loop, !s && (t < 0 || t >= h)) return !1;
                    if (i = p.firstRun = null === p.firstRun, !(h < 2 && !i && p.isSliding)) {
                        if (c = p.current, p.prevIndex = p.currIndex, p.prevPos = p.currPos, r = p.createSlide(t), h > 1 && ((s || r.index > 0) && p.createSlide(t - 1), (s || r.index < h - 1) && p.createSlide(t + 1)), p.current = r, p.currIndex = r.index, p.currPos = r.pos, p.trigger("beforeShow", i), p.updateControls(), u = n.fancybox.getTranslate(r.$slide), r.isMoved = (0 !== u.left || 0 !== u.top) && !r.$slide.hasClass("fancybox-animated"), r.forcedDuration = o, n.isNumeric(e) ? r.forcedDuration = e : e = r.opts[i ? "animationDuration" : "transitionDuration"], e = parseInt(e, 10), i) return r.opts.animationEffect && e && p.$refs.container.css("transition-duration", e + "ms"), p.$refs.container.removeClass("fancybox-is-hidden"), f(p.$refs.container), p.$refs.container.addClass("fancybox-is-open"), r.$slide.addClass("fancybox-slide--current"), p.loadSlide(r), void p.preload();
                        n.each(p.slides, function(t, e) { n.fancybox.stop(e.$slide) }), r.$slide.removeClass("fancybox-slide--next fancybox-slide--previous").addClass("fancybox-slide--current"), r.isMoved ? (l = Math.round(r.$slide.width()), n.each(p.slides, function(t, o) {
                            var a = o.pos - r.pos;
                            n.fancybox.animate(o.$slide, { top: 0, left: a * l + a * o.opts.gutter }, e, function() { o.$slide.removeAttr("style").removeClass("fancybox-slide--next fancybox-slide--previous"), o.pos === p.currPos && (r.isMoved = !1, p.complete()) })
                        })) : p.$refs.stage.children().removeAttr("style"), r.isLoaded ? p.revealContent(r) : p.loadSlide(r), p.preload(), c.pos !== r.pos && (d = "fancybox-slide--" + (c.pos > r.pos ? "next" : "previous"), c.$slide.removeClass("fancybox-slide--complete fancybox-slide--current fancybox-slide--next fancybox-slide--previous"), c.isComplete = !1, e && (r.isMoved || r.opts.transitionEffect) && (r.isMoved ? c.$slide.addClass(d) : (d = "fancybox-animated " + d + " fancybox-fx-" + r.opts.transitionEffect, n.fancybox.animate(c.$slide, d, e, function() { c.$slide.removeClass(d).removeAttr("style") }))))
                    }
                }
            },
            createSlide: function(t) { var e, o, a = this; return o = t % a.group.length, o = o < 0 ? a.group.length + o : o, !a.slides[t] && a.group[o] && (e = n('<div class="fancybox-slide"></div>').appendTo(a.$refs.stage), a.slides[t] = n.extend(!0, {}, a.group[o], { pos: t, $slide: e, isLoaded: !1 }), a.updateSlide(a.slides[t])), a.slides[t] },
            scaleToActual: function(t, e, a) {
                var i, s, r, c, l, u = this,
                    d = u.current,
                    f = d.$content,
                    p = parseInt(d.$slide.width(), 10),
                    h = parseInt(d.$slide.height(), 10),
                    g = d.width,
                    b = d.height;
                "image" != d.type || d.hasError || !f || u.isAnimating || (n.fancybox.stop(f), u.isAnimating = !0, t = t === o ? .5 * p : t, e = e === o ? .5 * h : e, i = n.fancybox.getTranslate(f), c = g / i.width, l = b / i.height, s = .5 * p - .5 * g, r = .5 * h - .5 * b, g > p && (s = i.left * c - (t * c - t), s > 0 && (s = 0), s < p - g && (s = p - g)), b > h && (r = i.top * l - (e * l - e), r > 0 && (r = 0), r < h - b && (r = h - b)), u.updateCursor(g, b), n.fancybox.animate(f, { top: r, left: s, scaleX: c, scaleY: l }, a || 330, function() { u.isAnimating = !1 }), u.SlideShow && u.SlideShow.isActive && u.SlideShow.stop())
            },
            scaleToFit: function(t) {
                var e, o = this,
                    a = o.current,
                    i = a.$content;
                "image" != a.type || a.hasError || !i || o.isAnimating || (n.fancybox.stop(i), o.isAnimating = !0, e = o.getFitPos(a), o.updateCursor(e.width, e.height), n.fancybox.animate(i, { top: e.top, left: e.left, scaleX: e.width / i.width(), scaleY: e.height / i.height() }, t || 330, function() { o.isAnimating = !1 }))
            },
            getFitPos: function(t) {
                var e, o, a, i, s, r = this,
                    c = t.$content,
                    l = t.width,
                    u = t.height,
                    d = t.opts.margin;
                return !(!c || !c.length || !l && !u) && ("number" === n.type(d) && (d = [d, d]), 2 == d.length && (d = [d[0], d[1], d[0], d[1]]), e = parseInt(r.$refs.stage.width(), 10) - (d[1] + d[3]), o = parseInt(r.$refs.stage.height(), 10) - (d[0] + d[2]), a = Math.min(1, e / l, o / u), i = Math.floor(a * l), s = Math.floor(a * u), { top: Math.floor(.5 * (o - s)) + d[0], left: Math.floor(.5 * (e - i)) + d[3], width: i, height: s })
            },
            update: function() {
                var t = this;
                n.each(t.slides, function(e, n) { t.updateSlide(n) })
            },
            updateSlide: function(t) {
                var e = this,
                    o = t.$content;
                o && (t.width || t.height) && (e.isAnimating = !1, n.fancybox.stop(o), n.fancybox.setTranslate(o, e.getFitPos(t)), t.pos === e.currPos && e.updateCursor()), t.$slide.trigger("refresh"), e.trigger("onUpdate", t)
            },
            updateCursor: function(t, e) {
                var n, a = this,
                    i = a.$refs.container.removeClass("fancybox-is-zoomable fancybox-can-zoomIn fancybox-can-drag fancybox-can-zoomOut");
                a.current && !a.isClosing && (a.isZoomable() ? (i.addClass("fancybox-is-zoomable"), n = t !== o && e !== o ? t < a.current.width && e < a.current.height : a.isScaledDown(), n ? i.addClass("fancybox-can-zoomIn") : a.current.opts.touch ? i.addClass("fancybox-can-drag") : i.addClass("fancybox-can-zoomOut")) : a.current.opts.touch && i.addClass("fancybox-can-drag"))
            },
            isZoomable: function() {
                var t, e = this,
                    o = e.current;
                if (o && !e.isClosing) return !!("image" === o.type && o.isLoaded && !o.hasError && ("zoom" === o.opts.clickContent || n.isFunction(o.opts.clickContent) && "zoom" === o.opts.clickContent(o)) && (t = e.getFitPos(o), o.width > t.width || o.height > t.height))
            },
            isScaledDown: function() {
                var t = this,
                    e = t.current,
                    o = e.$content,
                    a = !1;
                return o && (a = n.fancybox.getTranslate(o), a = a.width < e.width || a.height < e.height), a
            },
            canPan: function() {
                var t = this,
                    e = t.current,
                    n = e.$content,
                    o = !1;
                return n && (o = t.getFitPos(e), o = Math.abs(n.width() - o.width) > 1 || Math.abs(n.height() - o.height) > 1), o
            },
            loadSlide: function(t) {
                var e, o, a, i = this;
                if (!t.isLoading && !t.isLoaded) {
                    switch (t.isLoading = !0, i.trigger("beforeLoad", t), e = t.type, o = t.$slide, o.off("refresh").trigger("onReset").addClass("fancybox-slide--" + (e || "unknown")).addClass(t.opts.slideClass), e) {
                        case "image":
                            i.setImage(t);
                            break;
                        case "iframe":
                            i.setIframe(t);
                            break;
                        case "html":
                            i.setContent(t, t.src || t.content);
                            break;
                        case "inline":
                            n(t.src).length ? i.setContent(t, n(t.src)) : i.setError(t);
                            break;
                        case "ajax":
                            i.showLoading(t), a = n.ajax(n.extend({}, t.opts.ajax.settings, { url: t.src, success: function(e, n) { "success" === n && i.setContent(t, e) }, error: function(e, n) { e && "abort" !== n && i.setError(t) } })), o.one("onReset", function() { a.abort() });
                            break;
                        default:
                            i.setError(t)
                    }
                    return !0
                }
            },
            setImage: function(e) {
                var o, a, i, s, r = this,
                    c = e.opts.srcset || e.opts.image.srcset;
                if (c) { i = t.devicePixelRatio || 1, s = t.innerWidth * i, a = c.split(",").map(function(t) { var e = {}; return t.trim().split(/\s+/).forEach(function(t, n) { var o = parseInt(t.substring(0, t.length - 1), 10); return 0 === n ? e.url = t : void(o && (e.value = o, e.postfix = t[t.length - 1])) }), e }), a.sort(function(t, e) { return t.value - e.value }); for (var l = 0; l < a.length; l++) { var u = a[l]; if ("w" === u.postfix && u.value >= s || "x" === u.postfix && u.value >= i) { o = u; break } }!o && a.length && (o = a[a.length - 1]), o && (e.src = o.url, e.width && e.height && "w" == o.postfix && (e.height = e.width / e.height * o.value, e.width = o.value)) }
                e.$content = n('<div class="fancybox-image-wrap"></div>').addClass("fancybox-is-hidden").appendTo(e.$slide), e.opts.preload !== !1 && e.opts.width && e.opts.height && (e.opts.thumb || e.opts.$thumb) ? (e.width = e.opts.width, e.height = e.opts.height, e.$ghost = n("<img />").one("error", function() { n(this).remove(), e.$ghost = null, r.setBigImage(e) }).one("load", function() { r.afterLoad(e), r.setBigImage(e) }).addClass("fancybox-image").appendTo(e.$content).attr("src", e.opts.thumb || e.opts.$thumb.attr("src"))) : r.setBigImage(e)
            },
            setBigImage: function(t) {
                var e = this,
                    o = n("<img />");
                t.$image = o.one("error", function() { e.setError(t) }).one("load", function() { clearTimeout(t.timouts), t.timouts = null, e.isClosing || (t.width = this.naturalWidth, t.height = this.naturalHeight, t.opts.image.srcset && o.attr("sizes", "100vw").attr("srcset", t.opts.image.srcset), e.hideLoading(t), t.$ghost ? t.timouts = setTimeout(function() { t.timouts = null, t.$ghost.hide() }, Math.min(300, Math.max(1e3, t.height / 1600))) : e.afterLoad(t)) }).addClass("fancybox-image").attr("src", t.src).appendTo(t.$content), (o[0].complete || "complete" == o[0].readyState) && o[0].naturalWidth && o[0].naturalHeight ? o.trigger("load") : o[0].error ? o.trigger("error") : t.timouts = setTimeout(function() { o[0].complete || t.hasError || e.showLoading(t) }, 100)
            },
            setIframe: function(t) {
                var e, a = this,
                    i = t.opts.iframe,
                    s = t.$slide;
                t.$content = n('<div class="fancybox-content' + (i.preload ? " fancybox-is-hidden" : "") + '"></div>').css(i.css).appendTo(s), e = n(i.tpl.replace(/\{rnd\}/g, (new Date).getTime())).attr(i.attr).appendTo(t.$content), i.preload ? (a.showLoading(t), e.on("load.fb error.fb", function(e) { this.isReady = 1, t.$slide.trigger("refresh"), a.afterLoad(t) }), s.on("refresh.fb", function() {
                    var n, a, s, r = t.$content,
                        c = i.css.width,
                        l = i.css.height;
                    if (1 === e[0].isReady) {
                        try { a = e.contents(), s = a.find("body") } catch (t) {}
                        s && s.length && (c === o && (n = e[0].contentWindow.document.documentElement.scrollWidth, c = Math.ceil(s.outerWidth(!0) + (r.width() - n)), c += r.outerWidth() - r.innerWidth()), l === o && (l = Math.ceil(s.outerHeight(!0)), l += r.outerHeight() - r.innerHeight()), c && r.width(c), l && r.height(l)), r.removeClass("fancybox-is-hidden")
                    }
                })) : this.afterLoad(t), e.attr("src", t.src), t.opts.smallBtn === !0 && t.$content.prepend(a.translate(t, t.opts.btnTpl.smallBtn)), s.one("onReset", function() {
                    try { n(this).find("iframe").hide().attr("src", "//about:blank") } catch (t) {}
                    n(this).empty(), t.isLoaded = !1
                })
            },
            setContent: function(t, e) {
                var o = this;
                o.isClosing || (o.hideLoading(t), t.$slide.empty(), l(e) && e.parent().length ? (e.parent(".fancybox-slide--inline").trigger("onReset"), t.$placeholder = n("<div></div>").hide().insertAfter(e), e.css("display", "inline-block")) : t.hasError || ("string" === n.type(e) && (e = n("<div>").append(n.trim(e)).contents(), 3 === e[0].nodeType && (e = n("<div>").html(e))), t.opts.filter && (e = n("<div>").html(e).find(t.opts.filter))), t.$slide.one("onReset", function() { t.$placeholder && (t.$placeholder.after(e.hide()).remove(), t.$placeholder = null), t.$smallBtn && (t.$smallBtn.remove(), t.$smallBtn = null), t.hasError || (n(this).empty(), t.isLoaded = !1) }), t.$content = n(e).appendTo(t.$slide), this.afterLoad(t))
            },
            setError: function(t) { t.hasError = !0, t.$slide.removeClass("fancybox-slide--" + t.type), this.setContent(t, this.translate(t, t.opts.errorTpl)) },
            showLoading: function(t) {
                var e = this;
                t = t || e.current, t && !t.$spinner && (t.$spinner = n(e.opts.spinnerTpl).appendTo(t.$slide))
            },
            hideLoading: function(t) {
                var e = this;
                t = t || e.current, t && t.$spinner && (t.$spinner.remove(), delete t.$spinner)
            },
            afterLoad: function(t) {
                var e = this;
                e.isClosing || (t.isLoading = !1, t.isLoaded = !0, e.trigger("afterLoad", t), e.hideLoading(t), t.opts.smallBtn && !t.$smallBtn && (t.$smallBtn = n(e.translate(t, t.opts.btnTpl.smallBtn)).appendTo(t.$content.filter("div,form").first())), t.opts.protect && t.$content && !t.hasError && (t.$content.on("contextmenu.fb", function(t) { return 2 == t.button && t.preventDefault(), !0 }), "image" === t.type && n('<div class="fancybox-spaceball"></div>').appendTo(t.$content)), e.revealContent(t))
            },
            revealContent: function(t) {
                var e, a, i, s, r, c = this,
                    l = t.$slide,
                    u = !1;
                return e = t.opts[c.firstRun ? "animationEffect" : "transitionEffect"], i = t.opts[c.firstRun ? "animationDuration" : "transitionDuration"], i = parseInt(t.forcedDuration === o ? i : t.forcedDuration, 10), !t.isMoved && t.pos === c.currPos && i || (e = !1), "zoom" !== e || t.pos === c.currPos && i && "image" === t.type && !t.hasError && (u = c.getThumbPos(t)) || (e = "fade"), "zoom" === e ? (r = c.getFitPos(t), r.scaleX = r.width / u.width, r.scaleY = r.height / u.height, delete r.width, delete r.height, s = t.opts.zoomOpacity, "auto" == s && (s = Math.abs(t.width / t.height - u.width / u.height) > .1), s && (u.opacity = .1, r.opacity = 1), n.fancybox.setTranslate(t.$content.removeClass("fancybox-is-hidden"), u), f(t.$content), void n.fancybox.animate(t.$content, r, i, function() { c.complete() })) : (c.updateSlide(t), e ? (n.fancybox.stop(l), a = "fancybox-animated fancybox-slide--" + (t.pos >= c.prevPos ? "next" : "previous") + " fancybox-fx-" + e, l.removeAttr("style").removeClass("fancybox-slide--current fancybox-slide--next fancybox-slide--previous").addClass(a), t.$content.removeClass("fancybox-is-hidden"), f(l), void n.fancybox.animate(l, "fancybox-slide--current", i, function(e) { l.removeClass(a).removeAttr("style"), t.pos === c.currPos && c.complete() }, !0)) : (f(l), t.$content.removeClass("fancybox-is-hidden"), void(t.pos === c.currPos && c.complete())))
            },
            getThumbPos: function(o) {
                var a, i = this,
                    s = !1,
                    r = function(e) {
                        for (var o, a = e[0], i = a.getBoundingClientRect(), s = []; null !== a.parentElement;) "hidden" !== n(a.parentElement).css("overflow") && "auto" !== n(a.parentElement).css("overflow") || s.push(a.parentElement.getBoundingClientRect()), a = a.parentElement;
                        return o = s.every(function(t) {
                            var e = Math.min(i.right, t.right) - Math.max(i.left, t.left),
                                n = Math.min(i.bottom, t.bottom) - Math.max(i.top, t.top);
                            return e > 0 && n > 0
                        }), o && i.bottom > 0 && i.right > 0 && i.left < n(t).width() && i.top < n(t).height()
                    },
                    c = o.opts.$thumb,
                    l = c ? c.offset() : 0;
                return l && c[0].ownerDocument === e && r(c) && (a = i.$refs.stage.offset(), s = { top: l.top - a.top + parseFloat(c.css("border-top-width") || 0), left: l.left - a.left + parseFloat(c.css("border-left-width") || 0), width: c.width(), height: c.height(), scaleX: 1, scaleY: 1 }), s
            },
            complete: function() {
                var t = this,
                    o = t.current,
                    a = {};
                o.isMoved || !o.isLoaded || o.isComplete || (o.isComplete = !0, o.$slide.siblings().trigger("onReset"), f(o.$slide), o.$slide.addClass("fancybox-slide--complete"), n.each(t.slides, function(e, o) { o.pos >= t.currPos - 1 && o.pos <= t.currPos + 1 ? a[o.pos] = o : o && (n.fancybox.stop(o.$slide), o.$slide.off().remove()) }), t.slides = a, t.updateCursor(), t.trigger("afterShow"), (n(e.activeElement).is("[disabled]") || o.opts.autoFocus && "image" != o.type && "iframe" !== o.type) && t.focus())
            },
            preload: function() {
                var t, e, n = this;
                n.group.length < 2 || (t = n.slides[n.currPos + 1], e = n.slides[n.currPos - 1], t && "image" === t.type && n.loadSlide(t), e && "image" === e.type && n.loadSlide(e))
            },
            focus: function() {
                var t, e = this.current;
                this.isClosing || (e && e.isComplete && (t = e.$slide.find("input[autofocus]:enabled:visible:first"), t.length || (t = e.$slide.find("button,:input,[tabindex],a").filter(":enabled:visible:first"))), t = t && t.length ? t : this.$refs.container, t.focus())
            },
            activate: function() {
                var t = this;
                n(".fancybox-container").each(function() {
                    var e = n(this).data("FancyBox");
                    e && e.id !== t.id && !e.isClosing && (e.trigger("onDeactivate"), e.removeEvents(), e.isVisible = !1)
                }), t.isVisible = !0, (t.current || t.isIdle) && (t.update(), t.updateControls()), t.trigger("onActivate"), t.addEvents()
            },
            close: function(t, e) {
                var o, a, i, s, r, c, l = this,
                    p = l.current,
                    h = function() { l.cleanUp(t) };
                return !l.isClosing && (l.isClosing = !0, l.trigger("beforeClose", t) === !1 ? (l.isClosing = !1, u(function() { l.update() }), !1) : (l.removeEvents(), p.timouts && clearTimeout(p.timouts), i = p.$content, o = p.opts.animationEffect, a = n.isNumeric(e) ? e : o ? p.opts.animationDuration : 0, p.$slide.off(d).removeClass("fancybox-slide--complete fancybox-slide--next fancybox-slide--previous fancybox-animated"), p.$slide.siblings().trigger("onReset").remove(), a && l.$refs.container.removeClass("fancybox-is-open").addClass("fancybox-is-closing"), l.hideLoading(p), l.hideControls(), l.updateCursor(), "zoom" !== o || t !== !0 && i && a && "image" === p.type && !p.hasError && (c = l.getThumbPos(p)) || (o = "fade"), "zoom" === o ? (n.fancybox.stop(i), r = n.fancybox.getTranslate(i), r.width = r.width * r.scaleX, r.height = r.height * r.scaleY, s = p.opts.zoomOpacity, "auto" == s && (s = Math.abs(p.width / p.height - c.width / c.height) > .1), s && (c.opacity = 0), r.scaleX = r.width / c.width, r.scaleY = r.height / c.height, r.width = c.width, r.height = c.height, n.fancybox.setTranslate(p.$content, r), f(p.$content), n.fancybox.animate(p.$content, c, a, h), !0) : (o && a ? t === !0 ? setTimeout(h, a) : n.fancybox.animate(p.$slide.removeClass("fancybox-slide--current"), "fancybox-animated fancybox-slide--previous fancybox-fx-" + o, a, h) : h(), !0)))
            },
            cleanUp: function(t) {
                var o, a, i = this,
                    r = n("body");
                i.current.$slide.trigger("onReset"), i.$refs.container.empty().remove(), i.trigger("afterClose", t), i.$lastFocus && i.current.opts.backFocus && i.$lastFocus.focus(), i.current = null, o = n.fancybox.getInstance(), o ? o.activate() : (s.scrollTop(i.scrollTop).scrollLeft(i.scrollLeft), r.removeClass("fancybox-active compensate-for-scrollbar"), r.hasClass("fancybox-iosfix") && (a = parseInt(e.body.style.top, 10), r.removeClass("fancybox-iosfix").css("top", "").scrollTop(a * -1)), n("#fancybox-style-noscroll").remove())
            },
            trigger: function(t, e) {
                var o, a = Array.prototype.slice.call(arguments, 1),
                    i = this,
                    s = e && e.opts ? e : i.current;
                return s ? a.unshift(s) : s = i, a.unshift(i), n.isFunction(s.opts[t]) && (o = s.opts[t].apply(s, a)), o === !1 ? o : void("afterClose" !== t && i.$refs ? i.$refs.container.trigger(t + ".fb", a) : r.trigger(t + ".fb", a))
            },
            updateControls: function(t) {
                var e = this,
                    n = e.current,
                    o = n.index,
                    a = n.opts.caption,
                    i = e.$refs.container,
                    s = e.$refs.caption;
                n.$slide.trigger("refresh"), e.$caption = a && a.length ? s.html(a) : null, e.isHiddenControls || e.isIdle || e.showControls(), i.find("[data-fancybox-count]").html(e.group.length), i.find("[data-fancybox-index]").html(o + 1), i.find("[data-fancybox-prev]").prop("disabled", !n.opts.loop && o <= 0), i.find("[data-fancybox-next]").prop("disabled", !n.opts.loop && o >= e.group.length - 1), "image" === n.type ? i.find("[data-fancybox-download]").attr("href", n.opts.image.src || n.src).show() : i.find("[data-fancybox-download],[data-fancybox-zoom]").hide()
            },
            hideControls: function() { this.isHiddenControls = !0, this.$refs.container.removeClass("fancybox-show-infobar fancybox-show-toolbar fancybox-show-caption fancybox-show-nav") },
            showControls: function() {
                var t = this,
                    e = t.current ? t.current.opts : t.opts,
                    n = t.$refs.container;
                t.isHiddenControls = !1, t.idleSecondsCounter = 0, n.toggleClass("fancybox-show-toolbar", !(!e.toolbar || !e.buttons)).toggleClass("fancybox-show-infobar", !!(e.infobar && t.group.length > 1)).toggleClass("fancybox-show-nav", !!(e.arrows && t.group.length > 1)).toggleClass("fancybox-is-modal", !!e.modal), t.$caption ? n.addClass("fancybox-show-caption ") : n.removeClass("fancybox-show-caption")
            },
            toggleControls: function() { this.isHiddenControls ? this.showControls() : this.hideControls() }
        }), n.fancybox = {
            version: "3.2.5",
            defaults: i,
            getInstance: function(t) {
                var e = n('.fancybox-container:not(".fancybox-is-closing"):last').data("FancyBox"),
                    o = Array.prototype.slice.call(arguments, 1);
                return e instanceof p && ("string" === n.type(t) ? e[t].apply(e, o) : "function" === n.type(t) && t.apply(e, o), e)
            },
            open: function(t, e, n) { return new p(t, e, n) },
            close: function(t) {
                var e = this.getInstance();
                e && (e.close(), t === !0 && this.close())
            },
            destroy: function() { this.close(!0), r.off("click.fb-start") },
            isMobile: e.createTouch !== o && /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
            use3d: function() { var n = e.createElement("div"); return t.getComputedStyle && t.getComputedStyle(n).getPropertyValue("transform") && !(e.documentMode && e.documentMode < 11) }(),
            getTranslate: function(t) {
                var e;
                if (!t || !t.length) return !1;
                if (e = t.eq(0).css("transform"), e && e.indexOf("matrix") !== -1 ? (e = e.split("(")[1], e = e.split(")")[0], e = e.split(",")) : e = [], e.length) e = e.length > 10 ? [e[13], e[12], e[0], e[5]] : [e[5], e[4], e[0], e[3]], e = e.map(parseFloat);
                else {
                    e = [0, 0, 1, 1];
                    var n = /\.*translate\((.*)px,(.*)px\)/i,
                        o = n.exec(t.eq(0).attr("style"));
                    o && (e[0] = parseFloat(o[2]), e[1] = parseFloat(o[1]))
                }
                return { top: e[0], left: e[1], scaleX: e[2], scaleY: e[3], opacity: parseFloat(t.css("opacity")), width: t.width(), height: t.height() }
            },
            setTranslate: function(t, e) {
                var n = "",
                    a = {};
                if (t && e) return e.left === o && e.top === o || (n = (e.left === o ? t.position().left : e.left) + "px, " + (e.top === o ? t.position().top : e.top) + "px", n = this.use3d ? "translate3d(" + n + ", 0px)" : "translate(" + n + ")"), e.scaleX !== o && e.scaleY !== o && (n = (n.length ? n + " " : "") + "scale(" + e.scaleX + ", " + e.scaleY + ")"), n.length && (a.transform = n), e.opacity !== o && (a.opacity = e.opacity), e.width !== o && (a.width = e.width), e.height !== o && (a.height = e.height), t.css(a)
            },
            animate: function(t, e, a, i, s) {
                n.isFunction(a) && (i = a, a = null), n.isPlainObject(e) || t.removeAttr("style"), t.on(d, function(a) {
                    (!a || !a.originalEvent || t.is(a.originalEvent.target) && "z-index" != a.originalEvent.propertyName) && (n.fancybox.stop(t), n.isPlainObject(e) ? e.scaleX !== o && e.scaleY !== o && (t.css("transition-duration", ""), e.width = Math.round(t.width() * e.scaleX), e.height = Math.round(t.height() * e.scaleY), e.scaleX = 1, e.scaleY = 1, n.fancybox.setTranslate(t, e)) : s !== !0 && t.removeClass(e), n.isFunction(i) && i(a))
                }), n.isNumeric(a) && t.css("transition-duration", a + "ms"), n.isPlainObject(e) ? n.fancybox.setTranslate(t, e) : t.addClass(e), e.scaleX && t.hasClass("fancybox-image-wrap") && t.parent().addClass("fancybox-is-scaling"), t.data("timer", setTimeout(function() { t.trigger("transitionend") }, a + 16))
            },
            stop: function(t) { clearTimeout(t.data("timer")), t.off("transitionend").css("transition-duration", ""), t.hasClass("fancybox-image-wrap") && t.parent().removeClass("fancybox-is-scaling") }
        }, n.fn.fancybox = function(t) { var e; return t = t || {}, e = t.selector || !1, e ? n("body").off("click.fb-start", e).on("click.fb-start", e, { options: t }, a) : this.off("click.fb-start").on("click.fb-start", { items: this, options: t }, a), this }, r.on("click.fb-start", "[data-fancybox]", a)
    }
}(window, document, window.jQuery || jQuery),
function(t) {
    "use strict";
    var e = function(e, n, o) { if (e) return o = o || "", "object" === t.type(o) && (o = t.param(o, !0)), t.each(n, function(t, n) { e = e.replace("$" + t, n || "") }), o.length && (e += (e.indexOf("?") > 0 ? "&" : "?") + o), e },
        n = {
            youtube: { matcher: /(youtube\.com|youtu\.be|youtube\-nocookie\.com)\/(watch\?(.*&)?v=|v\/|u\/|embed\/?)?(videoseries\?list=(.*)|[\w-]{11}|\?listType=(.*)&list=(.*))(.*)/i, params: { autoplay: 1, autohide: 1, fs: 1, rel: 0, hd: 1, wmode: "transparent", enablejsapi: 1, html5: 1 }, paramPlace: 8, type: "iframe", url: "//www.youtube.com/embed/$4", thumb: "//img.youtube.com/vi/$4/hqdefault.jpg" },
            vimeo: { matcher: /^.+vimeo.com\/(.*\/)?([\d]+)(.*)?/, params: { autoplay: 1, hd: 1, show_title: 1, show_byline: 1, show_portrait: 0, fullscreen: 1, api: 1 }, paramPlace: 3, type: "iframe", url: "//player.vimeo.com/video/$2" },
            metacafe: { matcher: /metacafe.com\/watch\/(\d+)\/(.*)?/, type: "iframe", url: "//www.metacafe.com/embed/$1/?ap=1" },
            dailymotion: { matcher: /dailymotion.com\/video\/(.*)\/?(.*)/, params: { additionalInfos: 0, autoStart: 1 }, type: "iframe", url: "//www.dailymotion.com/embed/video/$1" },
            vine: { matcher: /vine.co\/v\/([a-zA-Z0-9\?\=\-]+)/, type: "iframe", url: "//vine.co/v/$1/embed/simple" },
            instagram: {
                matcher: /(instagr\.am|instagram\.com)\/p\/([a-zA-Z0-9_\-]+)\/?/i,
                type: "image",
                url: "//$1/p/$2/media/?size=l"
            },
            gmap_place: { matcher: /(maps\.)?google\.([a-z]{2,3}(\.[a-z]{2})?)\/(((maps\/(place\/(.*)\/)?\@(.*),(\d+.?\d+?)z))|(\?ll=))(.*)?/i, type: "iframe", url: function(t) { return "//maps.google." + t[2] + "/?ll=" + (t[9] ? t[9] + "&z=" + Math.floor(t[10]) + (t[12] ? t[12].replace(/^\//, "&") : "") : t[12]) + "&output=" + (t[12] && t[12].indexOf("layer=c") > 0 ? "svembed" : "embed") } },
            gmap_search: { matcher: /(maps\.)?google\.([a-z]{2,3}(\.[a-z]{2})?)\/(maps\/search\/)(.*)/i, type: "iframe", url: function(t) { return "//maps.google." + t[2] + "/maps?q=" + t[5].replace("query=", "q=").replace("api=1", "") + "&output=embed" } }
        };
    t(document).on("objectNeedsType.fb", function(o, a, i) {
        var s, r, c, l, u, d, f, p = i.src || "",
            h = !1;
        s = t.extend(!0, {}, n, i.opts.media), t.each(s, function(n, o) {
            if (c = p.match(o.matcher)) {
                if (h = o.type, d = {}, o.paramPlace && c[o.paramPlace]) {
                    u = c[o.paramPlace], "?" == u[0] && (u = u.substring(1)), u = u.split("&");
                    for (var a = 0; a < u.length; ++a) {
                        var s = u[a].split("=", 2);
                        2 == s.length && (d[s[0]] = decodeURIComponent(s[1].replace(/\+/g, " ")))
                    }
                }
                return l = t.extend(!0, {}, o.params, i.opts[n], d), p = "function" === t.type(o.url) ? o.url.call(this, c, l, i) : e(o.url, c, l), r = "function" === t.type(o.thumb) ? o.thumb.call(this, c, l, i) : e(o.thumb, c), "vimeo" === n && (p = p.replace("&%23", "#")), !1
            }
        }), h ? (i.src = p, i.type = h, i.opts.thumb || i.opts.$thumb && i.opts.$thumb.length || (i.opts.thumb = r), "iframe" === h && (t.extend(!0, i.opts, { iframe: { preload: !1, attr: { scrolling: "no" } } }), i.contentProvider = f, i.opts.slideClass += " fancybox-slide--" + ("gmap_place" == f || "gmap_search" == f ? "map" : "video"))) : p && (i.type = i.opts.defaultType)
    })
}(window.jQuery || jQuery),
function(t, e, n) {
    "use strict";
    var o = function() { return t.requestAnimationFrame || t.webkitRequestAnimationFrame || t.mozRequestAnimationFrame || t.oRequestAnimationFrame || function(e) { return t.setTimeout(e, 1e3 / 60) } }(),
        a = function() { return t.cancelAnimationFrame || t.webkitCancelAnimationFrame || t.mozCancelAnimationFrame || t.oCancelAnimationFrame || function(e) { t.clearTimeout(e) } }(),
        i = function(e) {
            var n = [];
            e = e.originalEvent || e || t.e, e = e.touches && e.touches.length ? e.touches : e.changedTouches && e.changedTouches.length ? e.changedTouches : [e];
            for (var o in e) e[o].pageX ? n.push({ x: e[o].pageX, y: e[o].pageY }) : e[o].clientX && n.push({ x: e[o].clientX, y: e[o].clientY });
            return n
        },
        s = function(t, e, n) { return e && t ? "x" === n ? t.x - e.x : "y" === n ? t.y - e.y : Math.sqrt(Math.pow(t.x - e.x, 2) + Math.pow(t.y - e.y, 2)) : 0 },
        r = function(t) {
            if (t.is('a,area,button,[role="button"],input,label,select,summary,textarea') || n.isFunction(t.get(0).onclick) || t.data("selectable")) return !0;
            for (var e = 0, o = t[0].attributes, a = o.length; e < a; e++)
                if ("data-fancybox-" === o[e].nodeName.substr(0, 14)) return !0;
            return !1
        },
        c = function(e) {
            var n = t.getComputedStyle(e)["overflow-y"],
                o = t.getComputedStyle(e)["overflow-x"],
                a = ("scroll" === n || "auto" === n) && e.scrollHeight > e.clientHeight,
                i = ("scroll" === o || "auto" === o) && e.scrollWidth > e.clientWidth;
            return a || i
        },
        l = function(t) { for (var e = !1;;) { if (e = c(t.get(0))) break; if (t = t.parent(), !t.length || t.hasClass("fancybox-stage") || t.is("body")) break } return e },
        u = function(t) {
            var e = this;
            e.instance = t, e.$bg = t.$refs.bg, e.$stage = t.$refs.stage, e.$container = t.$refs.container, e.destroy(), e.$container.on("touchstart.fb.touch mousedown.fb.touch", n.proxy(e, "ontouchstart"))
        };
    u.prototype.destroy = function() { this.$container.off(".fb.touch") }, u.prototype.ontouchstart = function(o) {
        var a = this,
            c = n(o.target),
            u = a.instance,
            d = u.current,
            f = d.$content,
            p = "touchstart" == o.type;
        if (p && a.$container.off("mousedown.fb.touch"), !d || a.instance.isAnimating || a.instance.isClosing) return o.stopPropagation(), void o.preventDefault();
        if ((!o.originalEvent || 2 != o.originalEvent.button) && c.length && !r(c) && !r(c.parent()) && !(o.originalEvent.clientX > c[0].clientWidth + c.offset().left) && (a.startPoints = i(o), a.startPoints && !(a.startPoints.length > 1 && u.isSliding))) {
            if (a.$target = c, a.$content = f, a.canTap = !0, a.opts = d.opts.touch, n(e).off(".fb.touch"), n(e).on(p ? "touchend.fb.touch touchcancel.fb.touch" : "mouseup.fb.touch mouseleave.fb.touch", n.proxy(a, "ontouchend")), n(e).on(p ? "touchmove.fb.touch" : "mousemove.fb.touch", n.proxy(a, "ontouchmove")), !a.opts && !u.canPan() || !c.is(a.$stage) && !a.$stage.find(c).length) return void(c.is("img") && o.preventDefault());
            o.stopPropagation(), n.fancybox.isMobile && (l(a.$target) || l(a.$target.parent())) || o.preventDefault(), a.canvasWidth = Math.round(d.$slide[0].clientWidth), a.canvasHeight = Math.round(d.$slide[0].clientHeight), a.startTime = (new Date).getTime(), a.distanceX = a.distanceY = a.distance = 0, a.isPanning = !1, a.isSwiping = !1, a.isZooming = !1, a.sliderStartPos = a.sliderLastPos || { top: 0, left: 0 }, a.contentStartPos = n.fancybox.getTranslate(a.$content), a.contentLastPos = null, 1 !== a.startPoints.length || a.isZooming || (a.canTap = !u.isSliding, "image" === d.type && (a.contentStartPos.width > a.canvasWidth + 1 || a.contentStartPos.height > a.canvasHeight + 1) ? (n.fancybox.stop(a.$content), a.$content.css("transition-duration", "0ms"), a.isPanning = !0) : a.isSwiping = !0, a.$container.addClass("fancybox-controls--isGrabbing")), 2 !== a.startPoints.length || u.isAnimating || d.hasError || "image" !== d.type || !d.isLoaded && !d.$ghost || (a.isZooming = !0, a.isSwiping = !1, a.isPanning = !1, n.fancybox.stop(a.$content), a.$content.css("transition-duration", "0ms"), a.centerPointStartX = .5 * (a.startPoints[0].x + a.startPoints[1].x) - n(t).scrollLeft(), a.centerPointStartY = .5 * (a.startPoints[0].y + a.startPoints[1].y) - n(t).scrollTop(), a.percentageOfImageAtPinchPointX = (a.centerPointStartX - a.contentStartPos.left) / a.contentStartPos.width, a.percentageOfImageAtPinchPointY = (a.centerPointStartY - a.contentStartPos.top) / a.contentStartPos.height, a.startDistanceBetweenFingers = s(a.startPoints[0], a.startPoints[1]))
        }
    }, u.prototype.ontouchmove = function(t) {
        var e = this;
        if (e.newPoints = i(t), n.fancybox.isMobile && (l(e.$target) || l(e.$target.parent()))) return t.stopPropagation(), void(e.canTap = !1);
        if ((e.opts || e.instance.canPan()) && e.newPoints && e.newPoints.length && (e.distanceX = s(e.newPoints[0], e.startPoints[0], "x"), e.distanceY = s(e.newPoints[0], e.startPoints[0], "y"), e.distance = s(e.newPoints[0], e.startPoints[0]), e.distance > 0)) {
            if (!e.$target.is(e.$stage) && !e.$stage.find(e.$target).length) return;
            t.stopPropagation(), t.preventDefault(), e.isSwiping ? e.onSwipe() : e.isPanning ? e.onPan() : e.isZooming && e.onZoom()
        }
    }, u.prototype.onSwipe = function() {
        var e, i = this,
            s = i.isSwiping,
            r = i.sliderStartPos.left || 0;
        s === !0 ? Math.abs(i.distance) > 10 && (i.canTap = !1, i.instance.group.length < 2 && i.opts.vertical ? i.isSwiping = "y" : i.instance.isSliding || i.opts.vertical === !1 || "auto" === i.opts.vertical && n(t).width() > 800 ? i.isSwiping = "x" : (e = Math.abs(180 * Math.atan2(i.distanceY, i.distanceX) / Math.PI), i.isSwiping = e > 45 && e < 135 ? "y" : "x"), i.instance.isSliding = i.isSwiping, i.startPoints = i.newPoints, n.each(i.instance.slides, function(t, e) { n.fancybox.stop(e.$slide), e.$slide.css("transition-duration", "0ms"), e.inTransition = !1, e.pos === i.instance.current.pos && (i.sliderStartPos.left = n.fancybox.getTranslate(e.$slide).left) }), i.instance.SlideShow && i.instance.SlideShow.isActive && i.instance.SlideShow.stop()) : ("x" == s && (i.distanceX > 0 && (i.instance.group.length < 2 || 0 === i.instance.current.index && !i.instance.current.opts.loop) ? r += Math.pow(i.distanceX, .8) : i.distanceX < 0 && (i.instance.group.length < 2 || i.instance.current.index === i.instance.group.length - 1 && !i.instance.current.opts.loop) ? r -= Math.pow(-i.distanceX, .8) : r += i.distanceX), i.sliderLastPos = { top: "x" == s ? 0 : i.sliderStartPos.top + i.distanceY, left: r }, i.requestId && (a(i.requestId), i.requestId = null), i.requestId = o(function() {
            i.sliderLastPos && (n.each(i.instance.slides, function(t, e) {
                var o = e.pos - i.instance.currPos;
                n.fancybox.setTranslate(e.$slide, { top: i.sliderLastPos.top, left: i.sliderLastPos.left + o * i.canvasWidth + o * e.opts.gutter })
            }), i.$container.addClass("fancybox-is-sliding"))
        }))
    }, u.prototype.onPan = function() {
        var t, e, i, s = this;
        s.canTap = !1, t = s.contentStartPos.width > s.canvasWidth ? s.contentStartPos.left + s.distanceX : s.contentStartPos.left, e = s.contentStartPos.top + s.distanceY, i = s.limitMovement(t, e, s.contentStartPos.width, s.contentStartPos.height), i.scaleX = s.contentStartPos.scaleX, i.scaleY = s.contentStartPos.scaleY, s.contentLastPos = i, s.requestId && (a(s.requestId), s.requestId = null), s.requestId = o(function() { n.fancybox.setTranslate(s.$content, s.contentLastPos) })
    }, u.prototype.limitMovement = function(t, e, n, o) {
        var a, i, s, r, c = this,
            l = c.canvasWidth,
            u = c.canvasHeight,
            d = c.contentStartPos.left,
            f = c.contentStartPos.top,
            p = c.distanceX,
            h = c.distanceY;
        return a = Math.max(0, .5 * l - .5 * n), i = Math.max(0, .5 * u - .5 * o), s = Math.min(l - n, .5 * l - .5 * n), r = Math.min(u - o, .5 * u - .5 * o), n > l && (p > 0 && t > a && (t = a - 1 + Math.pow(-a + d + p, .8) || 0), p < 0 && t < s && (t = s + 1 - Math.pow(s - d - p, .8) || 0)), o > u && (h > 0 && e > i && (e = i - 1 + Math.pow(-i + f + h, .8) || 0), h < 0 && e < r && (e = r + 1 - Math.pow(r - f - h, .8) || 0)), { top: e, left: t }
    }, u.prototype.limitPosition = function(t, e, n, o) {
        var a = this,
            i = a.canvasWidth,
            s = a.canvasHeight;
        return n > i ? (t = t > 0 ? 0 : t, t = t < i - n ? i - n : t) : t = Math.max(0, i / 2 - n / 2), o > s ? (e = e > 0 ? 0 : e, e = e < s - o ? s - o : e) : e = Math.max(0, s / 2 - o / 2), { top: e, left: t }
    }, u.prototype.onZoom = function() {
        var e = this,
            i = e.contentStartPos.width,
            r = e.contentStartPos.height,
            c = e.contentStartPos.left,
            l = e.contentStartPos.top,
            u = s(e.newPoints[0], e.newPoints[1]),
            d = u / e.startDistanceBetweenFingers,
            f = Math.floor(i * d),
            p = Math.floor(r * d),
            h = (i - f) * e.percentageOfImageAtPinchPointX,
            g = (r - p) * e.percentageOfImageAtPinchPointY,
            b = (e.newPoints[0].x + e.newPoints[1].x) / 2 - n(t).scrollLeft(),
            m = (e.newPoints[0].y + e.newPoints[1].y) / 2 - n(t).scrollTop(),
            y = b - e.centerPointStartX,
            v = m - e.centerPointStartY,
            x = c + (h + y),
            w = l + (g + v),
            $ = { top: w, left: x, scaleX: e.contentStartPos.scaleX * d, scaleY: e.contentStartPos.scaleY * d };
        e.canTap = !1, e.newWidth = f, e.newHeight = p, e.contentLastPos = $, e.requestId && (a(e.requestId), e.requestId = null), e.requestId = o(function() { n.fancybox.setTranslate(e.$content, e.contentLastPos) })
    }, u.prototype.ontouchend = function(t) {
        var o = this,
            s = Math.max((new Date).getTime() - o.startTime, 1),
            r = o.isSwiping,
            c = o.isPanning,
            l = o.isZooming;
        return o.endPoints = i(t), o.$container.removeClass("fancybox-controls--isGrabbing"), n(e).off(".fb.touch"), o.requestId && (a(o.requestId), o.requestId = null), o.isSwiping = !1, o.isPanning = !1, o.isZooming = !1, o.canTap ? o.onTap(t) : (o.speed = 366, o.velocityX = o.distanceX / s * .5, o.velocityY = o.distanceY / s * .5, o.speedX = Math.max(.5 * o.speed, Math.min(1.5 * o.speed, 1 / Math.abs(o.velocityX) * o.speed)), void(c ? o.endPanning() : l ? o.endZooming() : o.endSwiping(r)))
    }, u.prototype.endSwiping = function(t) {
        var e = this,
            o = !1;
        e.instance.isSliding = !1, e.sliderLastPos = null, "y" == t && Math.abs(e.distanceY) > 50 ? (n.fancybox.animate(e.instance.current.$slide, { top: e.sliderStartPos.top + e.distanceY + 150 * e.velocityY, opacity: 0 }, 150), o = e.instance.close(!0, 300)) : "x" == t && e.distanceX > 50 && e.instance.group.length > 1 ? o = e.instance.previous(e.speedX) : "x" == t && e.distanceX < -50 && e.instance.group.length > 1 && (o = e.instance.next(e.speedX)), o !== !1 || "x" != t && "y" != t || e.instance.jumpTo(e.instance.current.index, 150), e.$container.removeClass("fancybox-is-sliding")
    }, u.prototype.endPanning = function() {
        var t, e, o, a = this;
        a.contentLastPos && (a.opts.momentum === !1 ? (t = a.contentLastPos.left, e = a.contentLastPos.top) : (t = a.contentLastPos.left + a.velocityX * a.speed, e = a.contentLastPos.top + a.velocityY * a.speed), o = a.limitPosition(t, e, a.contentStartPos.width, a.contentStartPos.height), o.width = a.contentStartPos.width, o.height = a.contentStartPos.height, n.fancybox.animate(a.$content, o, 330))
    }, u.prototype.endZooming = function() {
        var t, e, o, a, i = this,
            s = i.instance.current,
            r = i.newWidth,
            c = i.newHeight;
        i.contentLastPos && (t = i.contentLastPos.left, e = i.contentLastPos.top, a = { top: e, left: t, width: r, height: c, scaleX: 1, scaleY: 1 }, n.fancybox.setTranslate(i.$content, a), r < i.canvasWidth && c < i.canvasHeight ? i.instance.scaleToFit(150) : r > s.width || c > s.height ? i.instance.scaleToActual(i.centerPointStartX, i.centerPointStartY, 150) : (o = i.limitPosition(t, e, r, c), n.fancybox.setTranslate(i.content, n.fancybox.getTranslate(i.$content)), n.fancybox.animate(i.$content, o, 150)))
    }, u.prototype.onTap = function(t) {
        var e, o = this,
            a = n(t.target),
            s = o.instance,
            r = s.current,
            c = t && i(t) || o.startPoints,
            l = c[0] ? c[0].x - o.$stage.offset().left : 0,
            u = c[0] ? c[0].y - o.$stage.offset().top : 0,
            d = function(e) {
                var a = r.opts[e];
                if (n.isFunction(a) && (a = a.apply(s, [r, t])), a) switch (a) {
                    case "close":
                        s.close(o.startEvent);
                        break;
                    case "toggleControls":
                        s.toggleControls(!0);
                        break;
                    case "next":
                        s.next();
                        break;
                    case "nextOrClose":
                        s.group.length > 1 ? s.next() : s.close(o.startEvent);
                        break;
                    case "zoom":
                        "image" == r.type && (r.isLoaded || r.$ghost) && (s.canPan() ? s.scaleToFit() : s.isScaledDown() ? s.scaleToActual(l, u) : s.group.length < 2 && s.close(o.startEvent))
                }
            };
        if (!(t.originalEvent && 2 == t.originalEvent.button || s.isSliding || l > a[0].clientWidth + a.offset().left)) {
            if (a.is(".fancybox-bg,.fancybox-inner,.fancybox-outer,.fancybox-container")) e = "Outside";
            else if (a.is(".fancybox-slide")) e = "Slide";
            else {
                if (!s.current.$content || !s.current.$content.has(t.target).length) return;
                e = "Content"
            }
            if (o.tapped) {
                if (clearTimeout(o.tapped), o.tapped = null, Math.abs(l - o.tapX) > 50 || Math.abs(u - o.tapY) > 50 || s.isSliding) return this;
                d("dblclick" + e)
            } else o.tapX = l, o.tapY = u, r.opts["dblclick" + e] && r.opts["dblclick" + e] !== r.opts["click" + e] ? o.tapped = setTimeout(function() { o.tapped = null, d("click" + e) }, 300) : d("click" + e);
            return this
        }
    }, n(e).on("onActivate.fb", function(t, e) { e && !e.Guestures && (e.Guestures = new u(e)) }), n(e).on("beforeClose.fb", function(t, e) { e && e.Guestures && e.Guestures.destroy() })
}(window, document, window.jQuery || jQuery),
function(t, e) {
    "use strict";
    e.extend(!0, e.fancybox.defaults, { btnTpl: { slideShow: '<button data-fancybox-play class="fancybox-button fancybox-button--play" title="{{PLAY_START}}"><svg viewBox="0 0 40 40"><path d="M13,12 L27,20 L13,27 Z" /><path d="M15,10 v19 M23,10 v19" /></svg></button>' }, slideShow: { autoStart: !1, speed: 3e3 } });
    var n = function(t) { this.instance = t, this.init() };
    e.extend(n.prototype, {
        timer: null,
        isActive: !1,
        $button: null,
        init: function() {
            var t = this;
            t.$button = t.instance.$refs.toolbar.find("[data-fancybox-play]").on("click", function() { t.toggle() }), (t.instance.group.length < 2 || !t.instance.group[t.instance.currIndex].opts.slideShow) && t.$button.hide()
        },
        set: function(t) {
            var e = this;
            e.instance && e.instance.current && (t === !0 || e.instance.current.opts.loop || e.instance.currIndex < e.instance.group.length - 1) ? e.timer = setTimeout(function() { e.isActive && e.instance.jumpTo((e.instance.currIndex + 1) % e.instance.group.length) }, e.instance.current.opts.slideShow.speed) : (e.stop(), e.instance.idleSecondsCounter = 0, e.instance.showControls())
        },
        clear: function() {
            var t = this;
            clearTimeout(t.timer), t.timer = null
        },
        start: function() {
            var t = this,
                e = t.instance.current;
            e && (t.isActive = !0, t.$button.attr("title", e.opts.i18n[e.opts.lang].PLAY_STOP).removeClass("fancybox-button--play").addClass("fancybox-button--pause"), t.set(!0))
        },
        stop: function() {
            var t = this,
                e = t.instance.current;
            t.clear(), t.$button.attr("title", e.opts.i18n[e.opts.lang].PLAY_START).removeClass("fancybox-button--pause").addClass("fancybox-button--play"), t.isActive = !1
        },
        toggle: function() {
            var t = this;
            t.isActive ? t.stop() : t.start()
        }
    }), e(t).on({
        "onInit.fb": function(t, e) { e && !e.SlideShow && (e.SlideShow = new n(e)) },
        "beforeShow.fb": function(t, e, n, o) {
            var a = e && e.SlideShow;
            o ? a && n.opts.slideShow.autoStart && a.start() : a && a.isActive && a.clear()
        },
        "afterShow.fb": function(t, e, n) {
            var o = e && e.SlideShow;
            o && o.isActive && o.set()
        },
        "afterKeydown.fb": function(n, o, a, i, s) { var r = o && o.SlideShow;!r || !a.opts.slideShow || 80 !== s && 32 !== s || e(t.activeElement).is("button,a,input") || (i.preventDefault(), r.toggle()) },
        "beforeClose.fb onDeactivate.fb": function(t, e) {
            var n = e && e.SlideShow;
            n && n.stop()
        }
    }), e(t).on("visibilitychange", function() {
        var n = e.fancybox.getInstance(),
            o = n && n.SlideShow;
        o && o.isActive && (t.hidden ? o.clear() : o.set())
    })
}(document, window.jQuery || jQuery),
function(t, e) {
    "use strict";
    var n = function() {
        var e, n, o, a = [
                ["requestFullscreen", "exitFullscreen", "fullscreenElement", "fullscreenEnabled", "fullscreenchange", "fullscreenerror"],
                ["webkitRequestFullscreen", "webkitExitFullscreen", "webkitFullscreenElement", "webkitFullscreenEnabled", "webkitfullscreenchange", "webkitfullscreenerror"],
                ["webkitRequestFullScreen", "webkitCancelFullScreen", "webkitCurrentFullScreenElement", "webkitCancelFullScreen", "webkitfullscreenchange", "webkitfullscreenerror"],
                ["mozRequestFullScreen", "mozCancelFullScreen", "mozFullScreenElement", "mozFullScreenEnabled", "mozfullscreenchange", "mozfullscreenerror"],
                ["msRequestFullscreen", "msExitFullscreen", "msFullscreenElement", "msFullscreenEnabled", "MSFullscreenChange", "MSFullscreenError"]
            ],
            i = {};
        for (n = 0; n < a.length; n++)
            if (e = a[n], e && e[1] in t) { for (o = 0; o < e.length; o++) i[a[0][o]] = e[o]; return i }
        return !1
    }();
    if (!n) return void(e && e.fancybox && (e.fancybox.defaults.btnTpl.fullScreen = !1));
    var o = { request: function(e) { e = e || t.documentElement, e[n.requestFullscreen](e.ALLOW_KEYBOARD_INPUT) }, exit: function() { t[n.exitFullscreen]() }, toggle: function(e) { e = e || t.documentElement, this.isFullscreen() ? this.exit() : this.request(e) }, isFullscreen: function() { return Boolean(t[n.fullscreenElement]) }, enabled: function() { return Boolean(t[n.fullscreenEnabled]) } };
    e.extend(!0, e.fancybox.defaults, { btnTpl: { fullScreen: '<button data-fancybox-fullscreen class="fancybox-button fancybox-button--fullscreen" title="{{FULL_SCREEN}}"><svg viewBox="0 0 40 40"><path d="M9,12 h22 v16 h-22 v-16 v16 h22 v-16 Z" /></svg></button>' }, fullScreen: { autoStart: !1 } }), e(t).on({
        "onInit.fb": function(t, e) {
            var n;
            e && e.group[e.currIndex].opts.fullScreen ? (n = e.$refs.container, n.on("click.fb-fullscreen", "[data-fancybox-fullscreen]", function(t) { t.stopPropagation(), t.preventDefault(), o.toggle(n[0]) }), e.opts.fullScreen && e.opts.fullScreen.autoStart === !0 && o.request(n[0]), e.FullScreen = o) : e && e.$refs.toolbar.find("[data-fancybox-fullscreen]").hide()
        },
        "afterKeydown.fb": function(t, e, n, o, a) { e && e.FullScreen && 70 === a && (o.preventDefault(), e.FullScreen.toggle(e.$refs.container[0])) },
        "beforeClose.fb": function(t) { t && t.FullScreen && o.exit() }
    }), e(t).on(n.fullscreenchange, function() {
        var t = o.isFullscreen(),
            n = e.fancybox.getInstance();
        n && (n.current && "image" === n.current.type && n.isAnimating && (n.current.$content.css("transition", "none"), n.isAnimating = !1, n.update(!0, !0, 0)), n.trigger("onFullscreenChange", t), n.$refs.container.toggleClass("fancybox-is-fullscreen", t))
    })
}(document, window.jQuery || jQuery),
function(t, e) {
    "use strict";
    e.fancybox.defaults = e.extend(!0, { btnTpl: { thumbs: '<button data-fancybox-thumbs class="fancybox-button fancybox-button--thumbs" title="{{THUMBS}}"><svg viewBox="0 0 120 120"><path d="M30,30 h14 v14 h-14 Z M50,30 h14 v14 h-14 Z M70,30 h14 v14 h-14 Z M30,50 h14 v14 h-14 Z M50,50 h14 v14 h-14 Z M70,50 h14 v14 h-14 Z M30,70 h14 v14 h-14 Z M50,70 h14 v14 h-14 Z M70,70 h14 v14 h-14 Z" /></svg></button>' }, thumbs: { autoStart: !1, hideOnClose: !0, parentEl: ".fancybox-container", axis: "y" } }, e.fancybox.defaults);
    var n = function(t) { this.init(t) };
    e.extend(n.prototype, {
        $button: null,
        $grid: null,
        $list: null,
        isVisible: !1,
        isActive: !1,
        init: function(t) {
            var e = this;
            e.instance = t, t.Thumbs = e;
            var n = t.group[0],
                o = t.group[1];
            e.opts = t.group[t.currIndex].opts.thumbs, e.$button = t.$refs.toolbar.find("[data-fancybox-thumbs]"), e.opts && n && o && ("image" == n.type || n.opts.thumb || n.opts.$thumb) && ("image" == o.type || o.opts.thumb || o.opts.$thumb) ? (e.$button.show().on("click", function() { e.toggle() }), e.isActive = !0) : e.$button.hide()
        },
        create: function() {
            var t, n, o = this,
                a = o.instance,
                i = o.opts.parentEl;
            o.$grid = e('<div class="fancybox-thumbs fancybox-thumbs-' + o.opts.axis + '"></div>').appendTo(a.$refs.container.find(i).addBack().filter(i)), t = "<ul>", e.each(a.group, function(e, o) { n = o.opts.thumb || (o.opts.$thumb ? o.opts.$thumb.attr("src") : null), n || "image" !== o.type || (n = o.src), n && n.length && (t += '<li data-index="' + e + '"  tabindex="0" class="fancybox-thumbs-loading"><img data-src="' + n + '" /></li>') }), t += "</ul>", o.$list = e(t).appendTo(o.$grid).on("click", "li", function() { a.jumpTo(e(this).data("index")) }), o.$list.find("img").hide().one("load", function() {
                var t, n, o, a, i = e(this).parent().removeClass("fancybox-thumbs-loading"),
                    s = i.outerWidth(),
                    r = i.outerHeight();
                t = this.naturalWidth || this.width, n = this.naturalHeight || this.height, o = t / s, a = n / r, o >= 1 && a >= 1 && (o > a ? (t /= a, n = r) : (t = s, n /= o)), e(this).css({ width: Math.floor(t), height: Math.floor(n), "margin-top": n > r ? Math.floor(.3 * r - .3 * n) : Math.floor(.5 * r - .5 * n), "margin-left": Math.floor(.5 * s - .5 * t) }).show()
            }).each(function() { this.src = e(this).data("src") }), "x" === o.opts.axis && o.$list.width(parseInt(o.$grid.css("padding-right")) + a.group.length * o.$list.children().eq(0).outerWidth(!0) + "px")
        },
        focus: function(t) {
            var e, n, o = this,
                a = o.$list;
            o.instance.current && (e = a.children().removeClass("fancybox-thumbs-active").filter('[data-index="' + o.instance.current.index + '"]').addClass("fancybox-thumbs-active"), n = e.position(), "y" === o.opts.axis && (n.top < 0 || n.top > a.height() - e.outerHeight()) ? a.stop().animate({ scrollTop: a.scrollTop() + n.top }, t) : "x" === o.opts.axis && (n.left < a.parent().scrollLeft() || n.left > a.parent().scrollLeft() + (a.parent().width() - e.outerWidth())) && a.parent().stop().animate({ scrollLeft: n.left }, t))
        },
        update: function() { this.instance.$refs.container.toggleClass("fancybox-show-thumbs", this.isVisible), this.isVisible ? (this.$grid || this.create(), this.instance.trigger("onThumbsShow"), this.focus(0)) : this.$grid && this.instance.trigger("onThumbsHide"), this.instance.update() },
        hide: function() { this.isVisible = !1, this.update() },
        show: function() { this.isVisible = !0, this.update() },
        toggle: function() { this.isVisible = !this.isVisible, this.update() }
    }), e(t).on({
        "onInit.fb": function(t, e) {
            var o;
            e && !e.Thumbs && (o = new n(e), o.isActive && o.opts.autoStart === !0 && o.show())
        },
        "beforeShow.fb": function(t, e, n, o) {
            var a = e && e.Thumbs;
            a && a.isVisible && a.focus(o ? 0 : 250)
        },
        "afterKeydown.fb": function(t, e, n, o, a) {
            var i = e && e.Thumbs;
            i && i.isActive && 71 === a && (o.preventDefault(), i.toggle())
        },
        "beforeClose.fb": function(t, e) {
            var n = e && e.Thumbs;
            n && n.isVisible && n.opts.hideOnClose !== !1 && n.$grid.hide()
        }
    })
}(document, window.jQuery),
function(t, e) {
    "use strict";

    function n(t) { var e = { "&": "&amp;", "<": "&lt;", ">": "&gt;", '"': "&quot;", "'": "&#39;", "/": "&#x2F;", "`": "&#x60;", "=": "&#x3D;" }; return String(t).replace(/[&<>"'`=\/]/g, function(t) { return e[t] }) }
    e.extend(!0, e.fancybox.defaults, { btnTpl: { share: '<button data-fancybox-share class="fancybox-button fancybox-button--share" title="{{SHARE}}"><svg viewBox="0 0 40 40"><path d="M6,30 C8,18 19,16 23,16 L23,16 L23,10 L33,20 L23,29 L23,24 C19,24 8,27 6,30 Z"></svg></button>' }, share: { tpl: '<div class="fancybox-share"><h1>{{SHARE}}</h1><p><a href="https://www.facebook.com/sharer/sharer.php?u={{src}}" target="_blank" class="fancybox-share_button"><svg version="1.1" viewBox="0 0 32 32" fill="#3b5998"><path d="M27.6 3h-23.2c-.8 0-1.4.6-1.4 1.4v23.1c0 .9.6 1.5 1.4 1.5h12.5v-10.1h-3.4v-3.9h3.4v-2.9c0-3.4 2.1-5.2 5-5.2 1.4 0 2.7.1 3 .2v3.5h-2.1c-1.6 0-1.9.8-1.9 1.9v2.5h3.9l-.5 3.9h-3.4v10.1h6.6c.8 0 1.4-.6 1.4-1.4v-23.2c.1-.8-.5-1.4-1.3-1.4z"></path></svg><span>Facebook</span></a><a href="https://www.pinterest.com/pin/create/button/?url={{src}}&amp;description={{descr}}" target="_blank" class="fancybox-share_button"><svg version="1.1" viewBox="0 0 32 32" fill="#c92228"><path d="M16 3c-7.2 0-13 5.8-13 13 0 5.5 3.4 10.2 8.3 12.1-.1-1-.2-2.6 0-3.7.2-1 1.5-6.5 1.5-6.5s-.4-.8-.4-1.9c0-1.8 1-3.2 2.4-3.2 1.1 0 1.6.8 1.6 1.8 0 1.1-.7 2.8-1.1 4.3-.3 1.3.6 2.3 1.9 2.3 2.3 0 4.1-2.4 4.1-6 0-3.1-2.2-5.3-5.4-5.3-3.7 0-5.9 2.8-5.9 5.6 0 1.1.4 2.3 1 3 .1.1.1.2.1.4-.1.4-.3 1.3-.4 1.5-.1.2-.2.3-.4.2-1.6-.8-2.6-3.1-2.6-5 0-4.1 3-7.9 8.6-7.9 4.5 0 8 3.2 8 7.5 0 4.5-2.8 8.1-6.7 8.1-1.3 0-2.6-.7-3-1.5 0 0-.7 2.5-.8 3.1-.3 1.1-1.1 2.5-1.6 3.4 1.2.4 2.5.6 3.8.6 7.2 0 13-5.8 13-13 0-7.1-5.8-12.9-13-12.9z"></path></svg><span>Pinterest</span></a><a href="https://twitter.com/intent/tweet?url={{src}}&amp;text={{descr}}" target="_blank" class="fancybox-share_button"><svg version="1.1" viewBox="0 0 32 32" fill="#1da1f2"><path d="M30 7.3c-1 .5-2.1.8-3.3.9 1.2-.7 2.1-1.8 2.5-3.2-1.1.7-2.3 1.1-3.6 1.4-1-1.1-2.5-1.8-4.2-1.8-3.2 0-5.7 2.6-5.7 5.7 0 .5.1.9.1 1.3-4.8-.2-9-2.5-11.8-6-.5.9-.8 1.9-.8 3 0 2 1 3.8 2.6 4.8-.9 0-1.8-.3-2.6-.7v.1c0 2.8 2 5.1 4.6 5.6-.5.1-1 .2-1.5.2-.4 0-.7 0-1.1-.1.7 2.3 2.9 3.9 5.4 4-2 1.5-4.4 2.5-7.1 2.5-.5 0-.9 0-1.4-.1 2.5 1.6 5.6 2.6 8.8 2.6 10.6 0 16.3-8.8 16.3-16.3v-.7c1.1-1 2-2 2.8-3.2z"></path></svg><span>Twitter</span></a></p><p><input type="text" value="{{src_raw}}" onfocus="this.select()" /></p></div>' } }), e(t).on("click", "[data-fancybox-share]", function() {
        var t, o, a = e.fancybox.getInstance();
        a && (t = a.current.opts.hash === !1 ? a.current.src : window.location, o = a.current.opts.share.tpl.replace(/\{\{src\}\}/g, encodeURIComponent(t)).replace(/\{\{src_raw\}\}/g, n(t)).replace(/\{\{descr\}\}/g, a.$caption ? encodeURIComponent(a.$caption.text()) : ""), e.fancybox.open({ src: a.translate(a, o), type: "html", opts: { animationEffect: "fade", animationDuration: 250 } }))
    })
}(document, window.jQuery || jQuery),
function(t, e, n) {
    "use strict";

    function o() {
        var t = e.location.hash.substr(1),
            n = t.split("-"),
            o = n.length > 1 && /^\+?\d+$/.test(n[n.length - 1]) ? parseInt(n.pop(-1), 10) || 1 : 1,
            a = n.join("-");
        return o < 1 && (o = 1), { hash: t, index: o, gallery: a }
    }

    function a(t) { var e; "" !== t.gallery && (e = n("[data-fancybox='" + n.escapeSelector(t.gallery) + "']").eq(t.index - 1), e.length || (e = n("#" + n.escapeSelector(t.gallery))), e.length && (s = !1, e.trigger("click"))) }

    function i(t) { var e; return !!t && (e = t.current ? t.current.opts : t.opts, e.hash || (e.$orig ? e.$orig.data("fancybox") : "")) }
    n.escapeSelector || (n.escapeSelector = function(t) {
        var e = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\x80-\uFFFF\w-]/g,
            n = function(t, e) { return e ? "\0" === t ? "�" : t.slice(0, -1) + "\\" + t.charCodeAt(t.length - 1).toString(16) + " " : "\\" + t };
        return (t + "").replace(e, n)
    });
    var s = !0,
        r = null,
        c = null;
    n(function() {
        n.fancybox.defaults.hash !== !1 && (n(t).on({
            "onInit.fb": function(t, e) {
                var n, a;
                e.group[e.currIndex].opts.hash !== !1 && (n = o(), a = i(e), a && n.gallery && a == n.gallery && (e.currIndex = n.index - 1))
            },
            "beforeShow.fb": function(n, o, a) {
                var l;
                a && a.opts.hash !== !1 && (l = i(o), l && "" !== l && (e.location.hash.indexOf(l) < 0 && (o.opts.origHash = e.location.hash), r = l + (o.group.length > 1 ? "-" + (a.index + 1) : ""), "replaceState" in e.history ? (c && clearTimeout(c), c = setTimeout(function() { e.history[s ? "pushState" : "replaceState"]({}, t.title, e.location.pathname + e.location.search + "#" + r), c = null, s = !1 }, 300)) : e.location.hash = r))
            },
            "beforeClose.fb": function(o, a, s) {
                var l, u;
                c && clearTimeout(c), s.opts.hash !== !1 && (l = i(a), u = a && a.opts.origHash ? a.opts.origHash : "", l && "" !== l && ("replaceState" in history ? e.history.replaceState({}, t.title, e.location.pathname + e.location.search + u) : (e.location.hash = u, n(e).scrollTop(a.scrollTop).scrollLeft(a.scrollLeft))), r = null)
            }
        }), n(e).on("hashchange.fb", function() {
            var t = o();
            n.fancybox.getInstance() ? !r || r === t.gallery + "-" + t.index || 1 === t.index && r == t.gallery || (r = null, n.fancybox.close()) : "" !== t.gallery && a(t)
        }), setTimeout(function() { a(o()) }, 50))
    })
}(document, window, window.jQuery || jQuery);