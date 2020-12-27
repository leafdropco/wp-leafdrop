(function($) {
    'use strict';

    var elementorBlogCarouselTitled = {};
    qode.modules.elementorBlogCarouselTitled = elementorBlogCarouselTitled;

    elementorBlogCarouselTitled.qodeInitElementorBlogCarouselTitled = qodeInitElementorBlogCarouselTitled;


    elementorBlogCarouselTitled.qodeOnWindowLoad = qodeOnWindowLoad;

    $(window).on('load', qodeOnWindowLoad );

    /*
     ** All functions to be called on $(window).load() should be in this function
     */
    function qodeOnWindowLoad() {
        qodeInitElementorBlogCarouselTitled();
    }

    function qodeInitElementorBlogCarouselTitled(){
        $j(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/bridge_blog_carousel_titled.default', function() {
                qodeInitBlogCarouselTitled();
            } );
        });
    }

})(jQuery);