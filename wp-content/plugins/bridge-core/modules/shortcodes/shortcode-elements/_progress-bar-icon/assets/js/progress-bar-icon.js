(function($) {
    'use strict';


    $(window).on('load', qodeOnWindowLoad );

    /*
     ** All functions to be called on $(window).load() should be in this function
     */
    function qodeOnWindowLoad() {
	    qodeElementorInitProgressBarIcon();
    }

    /*
     ** Progress Bars Icons
     */
    function qodeElementorInitProgressBarIcon(){
        $j(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/bridge_progress_bar_icon.default', function() {
	            initProgressBarsIcon();
            } );
        });
    }

})(jQuery);