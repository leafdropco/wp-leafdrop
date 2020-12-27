(function($) {
    'use strict';


    $(window).on('load', qodeOnWindowLoad );

    /*
     ** All functions to be called on $(window).load() should be in this function
     */
    function qodeOnWindowLoad() {
	    qodeElementorInitProgressBarVertical();
    }

    /*
     ** Testimonials
     */
    function qodeElementorInitProgressBarVertical(){
        $j(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/bridge_progress_bar_vertical.default', function() {
	            initProgressBarsVertical();
            } );
        });
    }

})(jQuery);