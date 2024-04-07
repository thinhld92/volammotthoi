/*
jQuery.fn.extend({
    changeTabs: function () {
        //core
        var _self = this;
        $adsControl = function (jEl, options) {
            var self = this;
            this.el = jEl;  
            this.options = {
                tabContent: typeof(options) != "undefined" && typeof(options.tabContent) != "undefined" ? options.tabContent : ".StaticMain",   
                tabClassActive: typeof(options) != "undefined" && typeof(options.tabClassActive) != "undefined" ? options.tabClassActive : "Active",    
            }
            _tabLi = this.el.children();
            _tabLiA= this.el.children().find("a");
            _tabContent = self.options.tabContent;
            _tabClassActive = self.options.tabClassActive;
            _tabContFirst = _tabLi.eq(0).children().data("id");
            
            
            
            
            $(_tabContent).hide();
            $(_tabContFirst).show();
            _tabLi.eq(0).addClass(_tabClassActive);
            
            jQuery(_tabLiA).click(function(){
            
                $(_tabContent).hide();
                _tabLi.removeClass(_tabClassActive);
                jQuery(this).parent().addClass(_tabClassActive);
                var curId = jQuery(this).data("id");
                $(curId).show();
                return false;
            }); 

        }
        //setup
        var options = arguments[0];
        var _self= this;
        this.each(function() {
            new $adsControl(jQuery(this), options);
        });
    }
    
});

jQuery(".EquipTabs").changeTabs({
    tabContent :".EquipTabsContent",
    tabClassActive : "Active"
});
jQuery(".SectsTabs").changeTabs({
    tabContent :".SectsTabsContent",
    tabClassActive : "Active"
});

*/



changeTabsEquipTabs(".EquipTabs", ".EquipTabsContent", "Active", ".SectsTabs", ".SectsTabsContent");

function changeTabsEquipTabs(objUl, objCont, objClass, objUlchild, objContchild) {
    _tabLi = $(objUl).find("li");
    _tabLiA = $(objUl).find("a");
    _tabContFirst = _tabLi.eq(0).children().data("id");
    $(objCont).hide();
    $(_tabContFirst).show();
    _tabLi.eq(0).addClass(objClass);

    jQuery(_tabLiA).click(function() {
        $(objCont).hide();
        jQuery(this).parent().parent().find("li").removeClass(objClass);
        jQuery(this).parent().addClass(objClass);
        var curId = jQuery(this).data("id");
        $(curId).show();
        $(curId).find(".SectsTabs");
        curIdSectsTabs = $(curId).find(".SectsTabs").find(".Active").children().data("id");
        if (curIdSectsTabs !== undefined) {
            console.log(curIdSectsTabs);
            $(curIdSectsTabs).show();
        } else {
            curIdSectsTabs = $(curId).find(".SectsTabs").removeClass(objClass).find("li").eq(0).addClass(objClass).children().data("id");
            console.log(curIdSectsTabs);
            $(curIdSectsTabs).show();
        }
        return false;
    });
}


changeTabsSectsTabs(".SectsTabs", ".SectsTabsContent", "Active");

function changeTabsSectsTabs(objUl, objCont, objClass) {
    _tabLi = $(objUl).find("li");
    _tabLiA = $(objUl).find("a");
    _tabContFirst = _tabLi.eq(0).children().data("id");
    $(objCont).hide();
    $(_tabContFirst).show();
    _tabLi.eq(0).addClass(objClass);

    jQuery(_tabLiA).click(function() {
        $(objCont).hide();
        jQuery(this).parent().parent().find("li").removeClass(objClass);
        jQuery(this).parent().addClass(objClass);
        var curId = jQuery(this).data("id");
        $(curId).show();
        return false;
    });
}


if (jQuery('img.ShowTips').length > 0) {
    jQuery('img.ShowTips').on('mouseover', function(mouse) {
        jQuery('img.ItemTips').remove();
        dataTips = jQuery(this).data('tips');
        if (dataTips !== '') {
            imgTips = '<img class="ItemTips" src="' + dataTips + '"/>';
            jQuery(this).after(imgTips);
            staticLeft = jQuery('#static').offset().left + jQuery('#static').width();
            staticTop = jQuery('#static').offset().top + jQuery('#static').height();


            if (jQuery(this).offset().left + jQuery('.ItemTips').width() + jQuery(this).width() / 1.5 > staticLeft) {
                jQuery(this).parent().find('.ItemTips').css({
                    right: jQuery(this).offset().left - jQuery(this).parent().offset().left + jQuery(this).width() / 1.5,
                });

            } else {
                jQuery(this).parent().find('.ItemTips').css({
                    left: jQuery(this).offset().left - jQuery(this).parent().offset().left + jQuery(this).width() / 1.5,
                });
            }
            if (jQuery('.ItemTips').offset().top + jQuery('.ItemTips').outerHeight() > jQuery(".WrapperBG").height()) {
                jQuery(this).parent().find('.ItemTips').css({
                    bottom: jQuery(this).offset().top - jQuery(this).parent().offset().top + jQuery(this).height() / 1.5,
                });
            } else {
                jQuery(this).parent().find('.ItemTips').css({
                    top: jQuery(this).offset().top - jQuery(this).parent().offset().top + jQuery(this).height() / 1.5,
                });
            }
        }
        mouse.stopPropagation();
        jQuery('.ItemTips').on('mouseover', function(event) {
            event.stopPropagation();
        });
    })
    jQuery(document).bind('mouseover', function() {
        jQuery('img.ItemTips').remove();
    })
}