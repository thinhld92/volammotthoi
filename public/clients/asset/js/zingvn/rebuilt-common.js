$(document).ready(function() {
    var _ulItem = $('#boxNav > ul#nav');
    $(window).scroll(function(event) {
        if ($(this).scrollTop() > 100) {
            if (jQuery('.bg-nav-scroll').length <= 0) {
                _ulItem.before('<div class="bg-nav-scroll"></div>');
            }
            _ulItem.addClass('nav-scroll');

            $('#boxNav > ul#nav > li > a').each(function(index, el) {
                jQuery(el).click(function(event) {
                    _gaq.push(['_trackEvent', 'MainSite', 'Main_Navigation_Scroll', jQuery(el).text(), 1]);
                });
            });
        } else {
            $('.bg-nav-scroll').remove();
            _ulItem.removeClass('nav-scroll');
        }
    });
});