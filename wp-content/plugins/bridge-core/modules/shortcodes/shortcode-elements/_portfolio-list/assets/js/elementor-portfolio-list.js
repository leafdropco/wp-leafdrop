(function($) {
    'use strict';

    var elementorPortfolioList = {};
    qode.modules.elementorPortfolioList = elementorPortfolioList;

    elementorPortfolioList.qodeInitElementorPortfolioList = qodeInitElementorPortfolioList;


    elementorPortfolioList.qodeOnWindowLoad = qodeOnWindowLoad;

    $(window).on('load', qodeOnWindowLoad );

    /*
     ** All functions to be called on $(window).load() should be in this function
     */
    function qodeOnWindowLoad() {
        qodeInitElementorPortfolioList();
    }

    function qodeInitElementorPortfolioList(){
        $j(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/bridge_portfolio_list.default', function() {
                initPortfolio();
                initPortfolioZIndex();
                initPortfolioJustifiedGallery();
                initPortfolioMasonryFilter();
                initPortfolioMasonry();
            } );
        });
    }

})(jQuery);