(function () {
    'use strict';
    jQuery(document).ready(function ($) {
        let sticky_sidebar = $('.sticky-sidebar , .sticky-content');
        if (sticky_sidebar.length) {
            sticky_sidebar.theiaStickySidebar({
                additionalMarginTop: 120,
                additionalMarginBottom: 40
            });
        }
        $(".anchor-link").on("click", function (event) {
            event.preventDefault();
            let id = $(this).attr('href'),
                top = $(id).offset().top;
            $('body,html').animate({scrollTop: top}, 1500);
        });
    });

})();
