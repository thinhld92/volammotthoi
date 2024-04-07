$(document).ready(function () {
  if (jQuery("#nav").length > 0) {
    jQuery("#nav").addNavigation({
      event: "mouseover",
      effect: false,
      activeSection: activemenu_nav,
    });
  }
  if (jQuery("#sidenavMenu").length > 0) {
    jQuery("#sidenavMenu").addNavigationLeft({
      event: "click",
      effect: true,
      activeSection: activesidenav,
      callback: function () {
        showActive();
      },
    });
  }
});
function showActive() {
  jQuery("#sidenavMenu").find(".Hilite").addClass("Active");
  jQuery("#sidenavMenu")
    .find(".Hilite")
    .each(function () {
      var a = jQuery(this);
      a.find("ul").css("display", "block");
    });
}
jQuery(document).ready(function () {
  if (jQuery("#boxTab").length > 0) {
    applyAjaxTabControl("#boxTab .Tab > li > a");
  }
  if (jQuery("#pagingNewsHome .PagingControl .CenterWrapper").length > 0) {
    loadBlockPage("#pagingNewsHome .PagingControl .CenterWrapper  a");
  }
  if (jQuery("#pagingItemHome .PagingControl .CenterWrapper").length > 0) {
    loadBlockPage("#pagingItemHome .PagingControl .CenterWrapper  a");
  }
});
function loadBlockPage(a) {
  jQuery(a).each(function (c) {
    var b = jQuery(this);
    b.bind("click", function (e) {
      var k = b
        .attr("rel")
        .replace(/\r\n\s/g, "")
        .toString();
      var f = k.split("&");
      var d = 'block={"' + f[0] + '":{}}&' + f[1];
      var g = f[2] == "''" ? "" : f[2];
      var h = f[0];
      var j = function (m, l) {};
      var i = {};
      // jQuery.ajax({
      //   type: "POST",
      //   url: g,
      //   dataType: "json",
      //   data: d,
      //   success: function (l) {
      //     jQuery("#" + h).html(l[h]);
      //     loadBlockPage(a);
      //     trackLink(jQuery("#" + h), false);
      //   },
      //   error: function (l) {},
      // });
      return false;
    });
  });
}
function applyAjaxTabControl(a) {
  jQuery(a).each(function (c) {
    var b = jQuery(this);
    var d = {};
    b.bind("mouseover", function (f) {
      jQuery("#moreNews").attr("href", $(this).attr("href"));
      b.parent().parent().find("> li").removeClass("Active");
      b.parent().addClass("Active");
      var l = b
        .attr("rel")
        .replace(/\r\n\s/g, "")
        .toString();
      var g = l.split("&");
      var e = 'block={"' + g[0] + '":{}}&' + g[1];
      var h = g[3] == "''" ? "" : g[3];
      var i = g[0];
      var k = g[2];
      var j = function (n, m) {};
      if (!d[k]) {
        // jQuery.ajax({
        //   type: "POST",
        //   url: h,
        //   dataType: "json",
        //   data: e,
        //   success: function (m) {
        //     d[k] = m[i];
        //     jQuery("#" + i).html(d[k]);
        //     loadBlockPage("#pagingNewsHome .PagingControl .CenterWrapper  a");
        //     trackLink(jQuery("#" + i), false);
        //   },
        //   error: function (m) {},
        // });
      } else {
        jQuery("#" + i).html(d[k]);
        loadBlockPage("#pagingNewsHome .PagingControl .CenterWrapper  a");
        trackLink(jQuery("#" + i), false);
      }
      return false;
    });
  });
}
jQuery(document).ready(function () {
  if (jQuery("#eventTab > li > a.TabCateEvent").length > 0) {
    jQuery("#eventTab > li > a.TabCateEvent").bind("hover", function () {
      if (jQuery(this).parent().hasClass("Active")) {
        return false;
      } else {
        a(jQuery(this).attr("rel"), this);
      }
      return false;
    });
  }
  function a(e, d) {
    var b = e.split("_");
    var c = {};
    blockOutputId = b[0];
    token = b[1];
    urlInput = b[2];
    tabName = b[3];
    jQuery("#eventTab > li.Active").removeClass("Active");
    jQuery(d).parent().addClass("Active");
    if (!c[tabName]) {
      jQuery.ajax({
        type: "POST",
        url: urlInput,
        dataType: "json",
        data: 'block={"' + blockOutputId + '":{}}&token=' + token,
        success: function (f) {
          c[tabName] = f[blockOutputId];
          jQuery("#eventResult").html(c[tabName]);
          trackLink("#eventResult");
        },
      });
    } else {
      jQuery("#eventResult").html(c[tabName]);
      trackLink("#eventResult");
    }
  }
});
function createOverlays(e) {
  var d = jQuery("#thewindowbackground");
  var a = jQuery(window).width() / 2;
  var c = jQuery(window).height() / 2;
  var b = jQuery(window).scrollTop();
  d.css({
    width: jQuery(document).width(),
    height: jQuery(document).height(),
    position: "absolute",
    top: 0,
    left: 0,
    zIndex: 900,
    background: "#000000",
    opacity: 0,
  });
  d.fadeTo("fast", 0.7, function () {
    jQuery("#" + e).css({
      display: "block",
      top: c + b - jQuery("#" + e).outerHeight() / 2,
      left: a - jQuery("#" + e).outerWidth() / 2,
    });
  });
  jQuery(window).resize(function () {
    var h = jQuery(window).height() / 2;
    var f = jQuery(window).width() / 2;
    var g = jQuery(window).scrollTop();
   
      d.css({ width: jQuery(document).width() });
    
    jQuery("#" + e).css({
      top: h + g - jQuery("#" + e).outerHeight() / 2,
      left: f - jQuery("#" + e).outerWidth() / 2,
    });
  });
  jQuery(window).scroll(function () {
    var h = jQuery(window).height() / 2;
    var f = jQuery(window).width() / 2;
    var g = jQuery(window).scrollTop();

      d.css({
        width: jQuery(document).width(),
        height: jQuery(document).height(),
      });
  });
  if (
    jQuery("#fbPopupMenu_" + e)
      .find("li.Hilite")
      .hasClass("ha")
  ) {
    autoPlay(jQuery("#img_" + e), e);
  }
  jQuery(d).bind("click", function () {
    closeVideo(e);
    return false;
  });
  jQuery("#fbclose_" + e).bind("click", function () {
    closeVideo(e);
    return false;
  });
  jQuery("#" + e + " .PopupCloseBtn").bind("click", function () {
    closeVideo(e);
    return false;
  });
}
function closeVideo(a) {
  jQuery("#" + a).css({ display: "none" });
  jQuery("#thewindowbackground").fadeOut("fast", function () {
    jQuery("#" + a).css({ display: "none" });
  });
  if (a == "MusicOverlays") {
    jQuery("#" + a).remove();
  }
}

// jQuery(document).ready(function () {
//   jQuery("#search_result a.OpenPopup,.VatPham a.OpenPopup").live(
//     "click",
//     function (b) {
//       var a = "#" + jQuery(this).attr("rel");
//       jQuery('<div id="itemDetail_" class="PopupItem"></div>').appendTo("body");
//       jQuery("#itemDetail_").html(jQuery(a).html());
//       createOverlays("itemDetail_");
//       jQuery("a.Close").bind("click", function () {
//         closeVideo("itemDetail_");
//         jQuery("#itemDetail_").remove();
//         return false;
//       });
//       return false;
//     }
//   );
// });
