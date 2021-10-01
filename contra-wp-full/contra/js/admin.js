(function($) {
	
	"use strict";

    // Ready function
    function do_ready() {
        do_accordion();
    }

    jQuery(document).ready(do_ready);

    function do_accordion(){
        jQuery('body').on('click', '.experts_accordion_heading', function(e){
            e.preventDefault();
            var parent = jQuery(this).parent('.experts_accordion_wrapper');
            var body =  jQuery(parent).children('.experts_accordion_body');

            if(jQuery(parent).hasClass('open'))
            {
                jQuery(body).slideUp('fast');
                jQuery(parent).removeClass('open').addClass('close');
            } else {
                jQuery(body).slideDown('fast');
                jQuery(parent).removeClass('close').addClass('open');
            }

        });
    }
    
})(window.jQuery);