(function($) {
    'use strict';

    var elementorCounter = {};
    qode.modules.elementorCounter = elementorCounter;

    elementorCounter.qodeInitElementorCounter = qodeInitElementorCounter;


    elementorCounter.qodeOnWindowLoad = qodeOnWindowLoad;

    $(window).on('load', qodeOnWindowLoad);

    /*
     ** All functions to be called on $(window).load() should be in this function
     */
    function qodeOnWindowLoad() {
        qodeInitElementorCounter();
    }

    function qodeInitElementorCounter(){
        $j(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/bridge_counter.default', function() {
                initToCounter();
                initCounter();
            } );
        });
    }


})(jQuery);