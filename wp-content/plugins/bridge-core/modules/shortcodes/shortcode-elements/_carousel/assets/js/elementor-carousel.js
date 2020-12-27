(function($) {
    'use strict';

    var elementorCarousel = {};
    qode.modules.elementorCarousel = elementorCarousel;

    elementorCarousel.qodeInitElementorCarousel = qodeInitElementorCarousel;


    elementorCarousel.qodeOnWindowLoad = qodeOnWindowLoad;

    $(window).on('load', qodeOnWindowLoad);

    /*
     ** All functions to be called on $(window).load() should be in this function
     */
    function qodeOnWindowLoad() {
        qodeInitElementorCarousel();
    }

    function qodeInitElementorCarousel(){
        $j(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/bridge_carousel.default', function() {
                initQodeCarousel();
                calculateHeights();
            } );
        });
    }

})(jQuery);