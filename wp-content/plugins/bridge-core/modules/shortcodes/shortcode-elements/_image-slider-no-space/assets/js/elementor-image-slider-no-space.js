(function($) {
    'use strict';

    var elementorImageSliderNoSpace = {};
    qode.modules.elementorImageSliderNoSpace = elementorImageSliderNoSpace;

    elementorImageSliderNoSpace.qodeInitElementorImageSliderNoSpace = qodeInitElementorImageSliderNoSpace;


    elementorImageSliderNoSpace.qodeOnWindowLoad = qodeOnWindowLoad;

    $(window).on('load', qodeOnWindowLoad );

    /*
     ** All functions to be called on $(window).load() should be in this function
     */
    function qodeOnWindowLoad() {
        qodeInitElementorImageSliderNoSpace();
    }

    function qodeInitElementorImageSliderNoSpace(){
        $j(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/bridge_image_slider_no_space.default', function() {
                initImageGallerySliderNoSpace()
            } );
        });
    }

})(jQuery);