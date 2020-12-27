(function($) {
    'use strict';

    var elementorPortfolioSlider = {};
    qode.modules.elementorPortfolioSlider = elementorPortfolioSlider;

    elementorPortfolioSlider.qodeInitElementorPortfolioSlider = qodeInitElementorPortfolioSlider;


    elementorPortfolioSlider.qodeOnWindowLoad = qodeOnWindowLoad;

    $(window).on('load', qodeOnWindowLoad );

    /*
     ** All functions to be called on $(window).load() should be in this function
     */
    function qodeOnWindowLoad() {
        qodeInitElementorPortfolioSlider();
    }

    function qodeInitElementorPortfolioSlider(){
        $j(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/bridge_portfolio_slider.default', function() {
                initPortfolioSlider();
            } );
        });
    }

})(jQuery);