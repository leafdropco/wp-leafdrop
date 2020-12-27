(function($) {
    'use strict';

    var elementorBlogSlider = {};
    qode.modules.elementorBlogSlider = elementorBlogSlider;

    elementorBlogSlider.qodeInitElementorBlogSlider = qodeInitElementorBlogSlider;


    elementorBlogSlider.qodeOnWindowLoad = qodeOnWindowLoad;

    $(window).on('load', qodeOnWindowLoad);

    /*
     ** All functions to be called on $(window).load() should be in this function
     */
    function qodeOnWindowLoad() {
        qodeInitElementorBlogSlider();
    }

    function qodeInitElementorBlogSlider(){
        $j(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/bridge_blog_slider.default', function() {
                initBlogSlider();
            } );
        });
    }

})(jQuery);