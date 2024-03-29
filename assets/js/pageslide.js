/*
 * jQuery pageSlide
 * Version 2.0
 * http://srobbin.com/jquery-pageslide/
 *
 * jQuery Javascript plugin which slides a webpage over to reveal an additional interaction pane.
 *
 * Copyright (c) 2011 Scott Robbin (srobbin.com)
 * Dual licensed under the MIT and GPL licenses.
 */
;
(function (b) {
    function j(e, a) {
        var pc = '<h2 class="pull-left">Reproduciendo</h2>'
                + '<a href="javascript:$.pageslide.close();" class="pull-right btn btn-secondary">'
                + '<i class="ion-chevron-right"></i></a>'
                + '<span class="clearfix"></span>';
        if (0 === e.indexOf("#")){ b(e).clone(!0).appendTo(c.empty()).show(); 
            c.html(c.html().replace(/width/g,'maxWidth').replace(/ion-play/g,'ion-volume-medium')
                .replace(/ion-pause/g,'')); 
        c.prepend(pc); 
        }else {
            if (a) {
                var d = b("<iframe />").attr({
                    src: e,
                    frameborder: 0,
                    hspace: 0
                }).css({
                    width: "100%",
                    height: "100%"
                });
                c.html(d)
            } else c.load(e);
            c.data("localEl", !1)
        }
    }

    function k(b, a) {
        var d = c.outerWidth(!0),
            f = {},
            g = {};
        if (!c.is(":visible") && !h) {
            h = !0;
            switch (b) {
            case "left":
                c.css({
                    left: "auto",
                    right: "-" + d + "px"
                });
                f["margin-left"] = "-=" + d;
                g.right = "+=" + d;
                break;
            default:
                c.css({
                    left: "-" + d + "px",
                    right: "auto"
                }), f["margin-left"] = "+=" + d, g.left = "+=" + d
            }

            $('body').addClass('slide-open');
            l.animate(f, a);
            c.show().animate(g, a, function () {
                h = !1
            })
        }
    }
    var l = b("body"),
        c = b("#pageslide"),
        h = !1,
        m;
    0 == c.length && (c = b("<div />").attr("id", "pageslide").css("display", "none").appendTo(b("body")));
    b.fn.pageslide = function (e) {
        this.click(function (a) {
            var d = b(this),
                f = b.extend({
                    href: d.attr("href")
                }, e);
            a.preventDefault();
            a.stopPropagation();
            c.is(":visible") && d[0] == m ? b.pageslide.close() : (b.pageslide(f), m = d[0])
        })
    };
    b.fn.pageslide.defaults = {
        speed: 200,
        direction: "right",
        modal: !1,
        iframe: !0,
        href: null
    };
    b.pageslide = function (e) {
        var a = b.extend({}, b.fn.pageslide.defaults, e);
        c.is(":visible") && c.data("direction") != a.direction ? b.pageslide.close(function () {
            j(a.href, a.iframe);
            b('body').addClass('slide-open');
            k(a.direction, a.speed)
        }) : (j(a.href, a.iframe), c.is(":hidden") && k(a.direction, a.speed));
        c.data(a)
    };
    b.pageslide.close = function (c) {
        var a = b("#pageslide"),
            d = a.outerWidth(!0),
            f = a.data("speed"),
            g = {},
            i = {};
        if (!a.is(":hidden") && !h) {
            b('body').removeClass('slide-open');
            h = !0;
            switch (a.data("direction")) {
            case "left":
                g["margin-left"] = "+=" + d;
                i.right = "-=" + d;
                break;
            default:
                g["margin-left"] = "-=" + d, i.left = "-=" + d
            }
            a.animate(i, f);
            l.animate(g, f, function () {
                a.hide();
                h = !1;
                b('body').css({marginLeft: 0, marginRight: 0});
                "undefined" != typeof c && c()
            })
        }
    };
    c.click(function (b) {
        // b.stopPropagation();
    });
    b(document).bind("click keyup", function (e) {
        "keyup" == e.type && 27 != e.keyCode || c.is(":visible") && !c.data("modal") && b.pageslide.close()
    });
    b(window).bind('resize', function(e){
        b.pageslide.close()
    })
})(jQuery);