(function($) {
    'use strict';

    var elementorCountdown = {};
    qode.modules.elementorCountdown = elementorCountdown;

    elementorCountdown.qodeInitElementorCountdown = qodeInitElementorCountdown;


    elementorCountdown.qodeOnWindowLoad = qodeOnWindowLoad;

    $(window).on('load', qodeOnWindowLoad);

    /*
     ** All functions to be called on $(window).load() should be in this function
     */
    function qodeOnWindowLoad() {
        qodeInitElementorCountdown();
    }

    function qodeInitElementorCountdown(){
        $j(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/bridge_countdown.default', function() {
                initCountdown();
            } );
        });
    }

})(jQuery);