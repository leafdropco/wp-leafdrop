(function($) {
    'use strict';


    $(window).on('load', qodeOnWindowLoad );

    /*
     ** All functions to be called on $(window).load() should be in this function
     */
    function qodeOnWindowLoad() {
	    qodeInitTextMarque();
    }


    function qodeInitTextMarque(){
        $j(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/bridge_text_marquee.default', function() {
	            initTextMarquee();
            } );
        });
    }

})(jQuery);