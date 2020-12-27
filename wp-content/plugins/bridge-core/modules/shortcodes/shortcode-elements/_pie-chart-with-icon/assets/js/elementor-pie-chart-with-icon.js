(function($) {
    'use strict';

    var elementorPieChartWithIcon = {};
    qode.modules.elementorPieChartWithIcon = elementorPieChartWithIcon;

    elementorPieChartWithIcon.qodeInitElementorPieChartWithIcon = qodeInitElementorPieChartWithIcon;


    elementorPieChartWithIcon.qodeOnWindowLoad = qodeOnWindowLoad;

    $(window).on('load', qodeOnWindowLoad );

    /*
     ** All functions to be called on $(window).load() should be in this function
     */
    function qodeOnWindowLoad() {
        qodeInitElementorPieChartWithIcon();
    }

    function qodeInitElementorPieChartWithIcon(){
        $j(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/bridge_pie_chart_with_icon.default', function() {
                initPieChartWithIcon();
            } );
        });
    }

})(jQuery);