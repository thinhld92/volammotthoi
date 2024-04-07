jQuery(document).ready(function () {
    if (jQuery("#Keyword1").length > 0) {
        jQuery('#Keyword1').bind('focus', function () {
            if (jQuery(this).val() == 'Tìm kiếm') {
                jQuery(this).val('');
            }
        });
        jQuery('#Keyword1').bind('blur', function () {
            if (jQuery(this).val() == '') {
                jQuery(this).val('Tìm kiếm');
            }
        });
    }
    $('.Dangky').click(function () {
        zmeOpenWidget.doRegister();
    });
    if (jQuery(".Main > .Sidebar").length > 0) {
        jQuery(".MainContent").css("width", "710px");
    }
    $('div.accordionButton').click(function () {
        if ($(this).hasClass('Active')) {
            $(this).removeClass('Active');
            $(this).next().slideUp('normal');
        }
        else {
            $('div.accordionButton').removeClass('Active');
            $(this).addClass('Active');
            $('div.accordionContent').slideUp('normal');
            $(this).next().slideDown('normal');
        }
    });
})
