(function($) {
    'use strict';

    var elementorNumberedCarousel = {};
    qode.modules.elementorNumberedCarousel = elementorNumberedCarousel;

    elementorNumberedCarousel.qodeInitElementorNumberedCarousel = qodeInitElementorNumberedCarousel;


    elementorNumberedCarousel.qodeOnWindowLoad = qodeOnWindowLoad;

    $(window).on('load', qodeOnWindowLoad);

    /*
     ** All functions to be called on $(window).load() should be in this function
     */
    function qodeOnWindowLoad() {
        qodeInitElementorNumberedCarousel();
    }

    function qodeInitElementorNumberedCarousel(){
        $j(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/bridge_numbered_carousel.default', function() {
                qode.modules.numberedCarousel.qodeNumberedCarousel().init();
            } );
        });
    }

})(jQuery);
