(function($) {
    'use strict';


    $(window).on('load', qodeOnWindowLoad ) ;

    /*
     ** All functions to be called on $(window).load() should be in this function
     */
    function qodeOnWindowLoad() {
	    qodeElementorInitProgressBar();
    }

    /*
     ** Testimonials
     */
    function qodeElementorInitProgressBar(){
        $j(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/bridge_progress_bar.default', function() {
	            initProgressBars();
            } );
        });
    }

})(jQuery);