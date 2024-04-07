Number.prototype.formatNumber = function(c, d, t) {
    var n = this,
        c = isNaN(c = Math.abs(c)) ? 2 : c,
        d = d == undefined ? "." : d,
        t = t == undefined ? "," : t,
        s = n < 0 ? "-" : "",
        i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
        j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
};

if (!String.prototype.trim) {
    String.prototype.trim = function() {
        return this.replace(/^\s+|\s+$/g, '');
    }
}


/* app id facebook for domain .Zing or .Com */
var appIdFB = {
    vlcm: "572059102909765",
    volam: "849851525029790",
    volam2: "715307218515673",
    volammienphi: "310543362432021",
    kiemthe: "804601679558609",
    "3q": "1385523911693343",
    volam3: "249721521882052",
    "2s": "658637767505650",
    "3d": "249721521882052",
    thoiloanmobile: "1483065071912810",
    "9k": "1459304647645630",
    xgame2014: "280351615502856",
    thoiloanmobile: "272579879612597",
    ttl: "278305615708721",
    ttl3d: "781279451938935",
    ctc: "466140210191844",
    gunnymobi: "312364145625427",
    tfsgm: "684784928304603",
    kt2: "776150779141947",
    vh2: "1528989040701763",
    cuutoc: "291971524327085"
};

/* app id facebook for domain .360game */
var appIdFB_360game = {
    phongthan: "896534067057840",
    phongvan: "329818837181469",
    nhaico: "248394152030960",
    mongcankhon: "316113165180165",
    gunny: "313038505512282",
    thankhuc: "1422630531338607",
    aimynhan: "1603398536552239",
    tuongthan: "290515921114329",
    ngoalong: "322470114570518",
    "2u": "447103912101639",
    vlcm2: "1479882628965471",
    docbo: "280258995518111",
    bc: "418800388274544",
    hacq: "1578068592460422"
};


var showPopupSocial = (function($) {
    var isShow = false;
    var isClosed = false;
    var urlCSS = '//img.zing.vn/eventgame/intro/general/css/social-style-vr3.min.css?vr=12';
    var typePage = 'home';

    var optDisable = {
        isZingMe: false,
        isVportalLike: true,
        isDisableSend: false
    }

    var opt = {
            zingme: 'zingme',
            facebook: 'facebook',
            RelativeID: undefined,
            typePage: 'subpage' //subpage,

        },

        init = function(opt, callbacks) {

            /* assign option */
            optDisable.isZingMe = opt.isZingMe;
            optDisable.isDisableSend = opt.isDisableSend;
            if (typeof opt.isVportalLike != 'undefined') {
                optDisable.isVportalLike = opt.isVportalLike;
            }



            typePage = (typeof opt.typePage === undefined) ? typePage : opt.typePage;

            if (opt.typePage === 'subpage') {} else {
                addHTML(validateLinkHome());
            }
            if (opt.typePage === 'subweb') {
                link_p = (window.location.href).split('?')[0];
                addHTML(link_p);
            }

            if (typeof callbacks != 'undefined') {
                typeof callbacks === 'function' && callbacks();
            }


            jQuery('.btn-fb-like-social').remove(); // remove button like trong subpage

            jQuery('body').css('position', 'relative');
            jQuery('body').append('<div id="zme-root"></div>');
            distance = jQuery('body').height() * 0.35;

            if (jQuery('#' + opt.RelativeID) != undefined) {
                addDataHref(opt.typePage);

                if (optDisable.isVportalLike) {
                    addCustomeLike('.btn-custom-like');
                }



                var scrollAction = function(event) {

                    var point = $('#static').height() / 1.5;
                    var body = $('body,html').scrollTop() + $(window).height();
                    if (body >= point) {
                        if (!isShow) {
                            isShow = true;
                        }
                    } else {
                        if (isShow) {
                            isShow = false;
                        }
                    }
                };
                jQuery(window).bind("scroll", scrollAction);

                if (jQuery('#' + opt.RelativeID).length > 0) {
                    jQuery('#' + opt.RelativeID).children('a').bind('click', function(event) {
                        event.preventDefault();
                        jQuery(window).unbind("scroll");
                        $("body").animate({
                            "padding-bottom": "0"
                        }, 300, function() {
                            jQuery(window).bind("scroll", scrollAction);
                        });
                    });
                }

            } else {}

            share(); // fired event click button share
            sendButton(); // fired event click button send


            if (getappIdFB() == '329818837181469') {
                jQuery('.btn-fb-send-social').remove();
            }
        },
        share = function() {
            jQuery('#popup-social-home .btn-fb-share-social,#popup-social-sub .btn-fb-share-social').bind('click', function() {
                popupShareFB(getappIdFB());
            });
            getDataLikeShares();
        },
        sendButton = function() {
            jQuery('#popup-social-home .btn-fb-send-social,#popup-social-sub .btn-fb-send-social').bind('click', function() {
                popupSendFB(getappIdFB());
            });
        },
        getappIdFB = function() {
            urlSite = location.href;
            domain = urlSite.match(/:\/\/(.[^/]+)/)[1].split(".");
            var result = appIdFB[domain[0]];
            if(domain[1] == "360game"){
                result = appIdFB_360game[domain[0]];
            }
            return result;
        },
        initSocial = function(type) {
            switch (type) {
                case opt.facebook:
                    param = (typeof getappIdFB() === undefined) ? '' : '&amp;appId=' + getappIdFB();
                    CreatePluginSocial('//connect.facebook.net/en_US/all.js#xfbml=1' + param, opt.facebook);
                    break;

                case opt.zingme:
                    CreatePluginSocial('//static.me.zing.vn/sp/js/all-1.34.js#&appId=d713b962dbf19d2dea16124b293558d1&status=true', opt.zingme);
                    break;
            }
        },

        CreatePluginSocial = function(srcPlugin, typeFanpage) {
            jssdk = typeFanpage + "-jssdk";
            if (typeFanpage.toLowerCase().trim() === opt.facebook) {
                jQuery('.fb-social-button').each(function(index, el) {
                    if (jQuery(el).attr('data-href') != (window.location.href).split('?')[0]) {
                        initSocial(typeFanpage);
                    }
                });
            }

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = srcPlugin;
                fjs.parentNode.insertBefore(js, fjs);
                if (typeFanpage.toLowerCase().trim() === 'facebook') {
                    setTimeout(function() {
                        link_p_add = (window.location.href).split('?')[0];

                        if (typePage === 'home') {
                            link_p_add = (window.location.href).split('?')[0] + 'index.html';
                            if ((window.location.href).split('/index.html').length > 1) {
                                link_p_add = (window.location.href).split('?')[0];
                            }
                        }
                        url = link_p_add;
                        TrackingSocial(url);
                    }, 1000);
                }
            }(document, 'script', jssdk));
        },

        TrackingSocial = function(opt_pagePath) {
            try {
                if (FB && FB.Event && FB.Event.subscribe) {
                    FB.Event.subscribe('edge.create', function(targetUrl) {
                        // _gaq.push(['_trackEvent', 'facebook', 'like - ' + typePage, typePage, 1]);
                        // _gaq.push(['_trackSocial', 'facebook', 'like - ' + typePage, opt_pagePath]);
                        getDataLikeShares();
                    });
                    FB.Event.subscribe('edge.remove', function(targetUrl) {
                        // _gaq.push(['_trackSocial', 'facebook', 'unlike - ' + typePage, opt_pagePath]);
                        // _gaq.push(['_trackEvent', 'facebook', 'unlike - ' + typePage, typePage, 1]);
                        getDataLikeShares();
                    });

                    FB.Event.subscribe('message.send', function(targetUrl) {
                        // _gaq.push(['_trackSocial', 'facebook', 'send', opt_pagePath]);
                        // _gaq.push(['_trackEvent', 'facebook', 'send - ' + typePage, typePage, 1]);
                        getDataLikeShares();
                    });
                    FB.Event.subscribe('xfbml.render', function(response) {
                        getDataLikeShares();
                    });
                }


            } catch (e) {}
        },

        addCustomeLike = function(btnEl) {
            return false; //sonpt edit
            wiFrame = 120;
            if (typeof btnEl != undefined) {
                obj = jQuery(btnEl);
                typeLike = '&type=' + typePage;
                link_p_add = (window.location.href).split('?')[0], link_p_add = link_p_add.split('#')[0];

                if (opt.typePage === 'home') {
                    link_p_add = (window.location.href).split('?')[0] + 'index.html', link_p_add = link_p_add.split('#')[0] + 'index.html';
                    if ((window.location.href).split('/index.html').length > 1) {
                        link_p_add = (window.location.href).split('?')[0], link_p_add = link_p_add.split('#')[0];
                    }
                    wiFrame = 50;
                }
                url = '//mainsite.360game.vn/like/?url=' + link_p_add + typeLike;
                iframeObj = '<iframe width="' + wiFrame + '" height="30" src="' + url + '" frameborder="0"  scrolling="no" allowtransparency="true" style="overflow:hidden;"></iframe>';
                if (obj.length > 0) {
                    obj.html(iframeObj);
                }
            }
        },
        validateLinkHome = function() {
            link_p_add = (window.location.href).split('?')[0], link_p_add = link_p_add.split('#')[0];
            if (link_p_add.split('/').length == 4) {
                if (typePage === 'home') {
                    link_p_add = (window.location.href).split('?')[0] + 'index.html', link_p_add = link_p_add.split('#')[0];
                    if ((window.location.href).split('/index.html').length > 1) {
                        link_p_add = (window.location.href).split('?')[0], link_p_add = link_p_add.split('#')[0];
                    }
                }
            }
            return link_p_add;
        },
        addButtonSendFB = function() {
            _sendfb = '<div title="Send" class="btn-fb-send-social"><div class="pluginButtonImage"><span class="pluginButtonIcon img sp_plugin-button sx_plugin-button_favblue"></span></div><span class="pluginButtonLabel">Send</span></div>';
            _objbtn = jQuery('div.plugin-social-block-p > div#popup-social-sub > div.block-social > div.like-block-social > div.group-facebook > .btn-fb-share-social');

            if (jQuery('.btn-fb-send-social').size() > 0) {

            } else {
                if (_objbtn.size() > 0) {
                    if (!optDisable.isDisableSend) {
                        _objbtn.before(_sendfb);
                    }
                }
            }
        },
        addDataHref = function(page) {
            jQuery('.fb-social-button,.fb-link-href').each(function(index, el) {
                index = '';
                if (page === 'home') {
                    index = '/index.html';
                }
                jQuery(el).attr('data-href', (window.location.href).split('?')[0] + index);
            });

            addButtonSendFB(); // add Button Send Facebook into block in subpage

            initSocial(opt.facebook);

            if (optDisable.isZingMe) {
                initSocial(opt.zingme);
            }
            loadCSS();
        },
        getDataLikeShares = function(isShare) {
            like = 0;
            link_p_add = validateLinkHome();
            // link_p_add = link_p_add + "?utm_medium=button_share_" + typePage;
            // link_p_add = ((typePage === 'home') ? (window.location.href).split('?')[0] + 'index.html' : (window.location.href).split('?')[0]);
            var ajaxReq = $.ajax({
                type: "POST",
                url: 'https://graph.facebook.com/?ids=' + link_p_add,
                dataType: "jsonp"
            });
            ajaxReq.done(function(data) {
                like = (typeof data[link_p_add] == undefined) ? 0 : data[link_p_add].shares;
                if (typeof like != "undefined") {
                    format = like.formatNumber();
                } else {
                    format = '0';
                }

                rs = format.split(',');
                if (rs.length <= 1) {
                    rs = like;
                } else {
                    rs = ((rs[0] < 1) ? like : rs[0] + 'k' + ((rs[1] < 1) ? "" : (rs[1].slice(0, 1))));
                }

                if (typeof like == "undefined") {
                    rs = 0;
                }

                switch (typePage) {
                    case 'subweb':
                    case 'home':
                        jQuery('#popup-social-home .number-social-fb').remove();
                        jQuery('#popup-social-home #fb-root').before('<div class="number-social-fb"><p>' + rs + '</p></div>');
                        break;

                    case 'subpage':
                        jQuery('#popup-social-sub .number-social-fb').remove();
                        jQuery('#popup-social-sub .btn-fb-share-social').after('<div class="number-social-fb"><p>' + rs + '</p></div>');
                        break;

                    case 'all':
                        jQuery('#popup-social-home .number-social-fb').remove();
                        jQuery('#popup-social-home #fb-root').before('<div class="number-social-fb"><p>' + rs + '</p></div>');
                        jQuery('#popup-social-sub .number-social-fb').remove();
                        jQuery('#popup-social-sub .btn-fb-share-social').after('<div class="number-social-fb"><p>' + rs + '</p></div>');
                        break;
                }

            });
        },
        addClassIframe = function() {
            objIframe = jQuery('.fb-social-button').find('span');
            jQuery(objIframe).addClass('fbiframe');
            if (!jQuery(objIframe).hasClass('fbiframe')) {
                addClassIframe();
            }
        },
        addHTML = function(link) {
            var html = '<div id="popup-social-home"><div class="block-social"><div class="like-block-social"><div class="button-control"><div class="group-facebook"><div id="fb-root"></div><div class="btn-fb-share-social" title="Share">Share</div><div title="Send" class="btn-fb-send-social">Send</div></div><div class="btn-custom-like"></div></div></div></div></div>';
            if (optDisable.isDisableSend) {
                html = '<div id="popup-social-home"><div class="block-social"><div class="like-block-social"><div class="button-control"><div class="group-facebook"><div id="fb-root"></div><div class="btn-fb-share-social" title="Share">Share</div><div class="btn-custom-like"></div></div></div></div></div>';
            }
            jQuery('body').append(html);
        },
        loadCSS = function() {
            jQuery("head").append("<link>");
            var css = jQuery("head").children(":last");
            css.attr({
                rel: "stylesheet",
                type: "text/css",
                href: urlCSS
            });
            jQuery("head").append('<meta http-equiv="X-UA-Compatible" content="IE=edge" />');

        },
        popupShareFB = function(appIdFB) {


            var title = document.title;
            urlShare = validateLinkHome();

            // url = url + "?utm_medium=button_share_" + typePage;
            if (appIdFB == undefined) {
                if (navigator.userAgent.indexOf('MSIE') != -1) {
                    winDef = 'scrollbars=no,status=no,toolbar=no,location=nnoo,menubar=no,resizable=yes,height=430,width=550,top='.concat((screen.height - 500) / 2).concat(',left=').concat((screen.width - 500) / 2);
                } else {
                    winDef = 'scrollbars=no,status=no,toolbar=no,location=no,menubar=no,resizable=no,height=400,width=550,top='.concat((screen.height - 500) / 2).concat(',left=').concat((screen.width - 500) / 2);
                }
                var urlShare = '//www.facebook.com/sharer/sharer.php?u=' + urlShare + '&t=' + title;

                var win = window.open(urlShare, '_blank', winDef);
                var timer = setInterval(function() {
                    if (win.closed) {
                        clearInterval(timer);
                        getDataLikeShares();
                    }
                }, 1000);
            } else {
                FB.init({
                    appId: appIdFB,
                    status: true,
                    cookie: true
                });

                FB.ui({
                    method: 'feed',
                    link: urlShare,
                    caption: title
                }, function(response) {
                    if (response === null) {
                        activeTrackingGA('button Share - ' + typePage + '- fail');
                        getDataLikeShares();
                    } else {
                        activeTrackingGA('button Share - ' + typePage + '- success');
                        getDataLikeShares();
                    }

                });
            }
        },
        popupSendFB = function(appIdFB) {
            _utm = '?utm_source=facebook&utm_campaign=button_send';
            var title = document.title;
            urlSend = validateLinkHome();
            FB.init({
                appId: appIdFB,
                status: true,
                cookie: true
            });

            FB.ui({
                method: 'send',
                link: urlSend,
                caption: title
            }, function(res) {
                if (res === null) {
                    activeTrackingGA('button Send - ' + typePage + '- fail');
                } else {
                    activeTrackingGA('button Send - ' + typePage + '- success');
                }

            });


        },
        activeTrackingGA = function(Label) {
            if (typeof ga != 'undefined' || typeof _gaq != 'undefined') {
                if (typeof _gaq == 'undefined') {
                    _gaq.push(['_trackEvent', 'facebook', Label, typePage, 1]);
                } else if (typeof ga == 'undefined') {
                    ga('send', 'event', Label, 'facebook', typePage, 1);
                }
            }
        },
        addPositionItem = function(pos, aspect) {
            var _htmlEL = '<div class="plugin-social-block-p"><div id="popup-social-sub"><div class="block-social"><div class="share-block-social"><span class="title">Bạn có thích nội dung bài viết này ?</span></div><div class="like-block-social"><div class="group-facebook"><div class="btn-fb-like-social"><div class="fb-like fb-link-href" data-href="#" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div><div id="fb-root"></div></div><div class="btn-fb-share-social" title="Share"><div class="pluginButtonImage"><span class="pluginButtonIcon img sp_plugin-button sx_plugin-button_favblue"></span></div><span class="pluginButtonLabel">Share</span></div><div class="btn-custom-like"></div><div id="zme-root"></div></div></div></div></div></div>';
            
            if (jQuery(pos).size()) {
                ($(".plugin-social-block-p").size() > 0) ? "" : jQuery("body").append(_htmlEL);
                p_items = $(".plugin-social-block-p");
                if (p_items.size()) {
                    switch (aspect) {
                        case 'before':
                            jQuery(pos).before(p_items);
                            break;

                        case 'after':
                            jQuery(pos).after(p_items);
                            break;

                        case 'append':
                            jQuery(pos).append(p_items);
                            break;
                    }
                }
            }
        },
        validateDomain360 = function() {
            url360game = location.href;
            url360 = url360game.match(/:\/\/(.[^/]+)/)[1].split(".");
            if (url360[1] == "360game") {
                return true;
            }
            return false;
        };


    return {
        "init": init,
        "share": share,
        "validateLinkHome": validateLinkHome,
        "TrackingSocial": TrackingSocial,
        "addPositionItem": addPositionItem
    };
})(jQuery, window);

jQuery(window).load(function() {
    if (jQuery('div.plugin-social-block-p').length > 0) {
        var top = jQuery('div.plugin-social-block-p').offset().top;
        jQuery(window).scroll(function(event) {
            var scrollNav = jQuery(window).scrollTop();
            if (scrollNav > top) {
                jQuery('div.plugin-social-block-p').addClass('active');
                if (jQuery('#ved_section').length > 0) {
                    jQuery('div.plugin-social-block-p.active').css('top', '40px');
                }
                if (jQuery('.template-blank').length <= 0) {
                    jQuery('div.plugin-social-block-p').before('<div class="template-blank"></div>');
                }
            } else {
                jQuery('.template-blank').remove();
                jQuery('div.plugin-social-block-p').removeClass('active');
            }
        });

    }
});


// $(document).ready(function() {
//     showPopupSocial.init({
//         RelativeID: 'popup-social-home',
//         typePage: 'home',
//         isVportalLike: false
//     });
// });