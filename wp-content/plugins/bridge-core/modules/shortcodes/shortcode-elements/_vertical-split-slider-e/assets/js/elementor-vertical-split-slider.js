(function($) {
    'use strict';

    var elementorVerticalSplitSlider = {};
    qode.modules.elementorVerticalSplitSlider = elementorVerticalSplitSlider;

    elementorVerticalSplitSlider.qodeInitElementorVerticalSplitSlider = qodeInitElementorVerticalSplitSlider;


    elementorVerticalSplitSlider.qodeOnWindowLoad = qodeOnWindowLoad;

    $(window).on('load', qodeOnWindowLoad );

    /*
     ** All functions to be called on $(window).load() should be in this function
     */
    function qodeOnWindowLoad() {
        qodeInitElementorVerticalSplitSlider();
    }

    function qodeInitElementorVerticalSplitSlider(){
        $j(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/bridge_vertical_split_slider.default', function() {
                initVerticalSplitSlider();
            } );
        });
    }

})(jQuery);