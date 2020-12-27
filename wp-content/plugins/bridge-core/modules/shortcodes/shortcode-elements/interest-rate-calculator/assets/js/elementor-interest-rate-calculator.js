(function($) {
    'use strict';

    var elementorInterestRateCalculator = {};
    qode.modules.elementorInterestRateCalculator = elementorInterestRateCalculator;

    elementorInterestRateCalculator.qodeInitElementorInterestRateCalculator = qodeInitElementorInterestRateCalculator;


    elementorInterestRateCalculator.qodeOnWindowLoad = qodeOnWindowLoad;

    $(window).on('load', qodeOnWindowLoad);

    /*
     ** All functions to be called on $(window).load() should be in this function
     */
    function qodeOnWindowLoad() {
        qodeInitElementorInterestRateCalculator();
    }

    function qodeInitElementorInterestRateCalculator(){
        $j(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/bridge_interest_rate_calculator.default', function() {
                qode.modules.interestRateCalculator.qodeInitInterestRateCalculator();
            } );
        });
    }

})(jQuery);
