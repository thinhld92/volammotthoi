$(document).ready(function () {

    if (jQuery("#nav").length > 0) {
        jQuery("#nav").addNavigation({
            event: "mouseover",
            effect: false,
            activeSection: activemenu_nav
        });
    }


    if (jQuery("#sidenavMenu").length > 0) {
        jQuery("#sidenavMenu").addNavigationLeft({
            event: "click",
            effect: true,
            activeSection: activesidenav,
            callback: function () {
                showActive();
            }

        });
    }


});

function showActive() {
    jQuery("#sidenavMenu").find(".Hilite").addClass("Active");
    jQuery("#sidenavMenu").find(".Hilite").each(function () {
        var self = jQuery(this);
        self.find("ul").css('display', 'block');
    });
}