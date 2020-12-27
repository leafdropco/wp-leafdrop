(function($) {
    'use strict';

    var elementorComparisonSlider = {};
    qode.modules.elementorComparisonSlider = elementorComparisonSlider;

    elementorComparisonSlider.qodeInitElementorComparisonSlider = qodeInitElementorComparisonSlider;


    elementorComparisonSlider.qodeOnWindowLoad = qodeOnWindowLoad;

    $(document).ready(qodeOnWindowLoad);

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function qodeOnWindowLoad() {
        qodeInitElementorComparisonSlider();
    }


    function qodeInitElementorComparisonSlider() {
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/bridge_comparison_slider.default', function() {
                qode.modules.imageGallery.qodeInitAdvancedImageGalleryMasonry();
            } );
        });
    }

})(jQuery);