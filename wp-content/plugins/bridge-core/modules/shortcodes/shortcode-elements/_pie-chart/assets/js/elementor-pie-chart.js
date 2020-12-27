(function($) {
    'use strict';

    var elementorPieChart = {};
    qode.modules.elementorPieChart = elementorPieChart;

    elementorPieChart.qodeInitElementorPieChart = qodeInitElementorPieChart;


    elementorPieChart.qodeOnWindowLoad = qodeOnWindowLoad;

    $(window).on('load', qodeOnWindowLoad );

    /*
     ** All functions to be called on $(window).load() should be in this function
     */
    function qodeOnWindowLoad() {
        qodeInitElementorPieChart();
    }

    function qodeInitElementorPieChart(){
        $j(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/bridge_pie_chart.default', function() {
                initPieChart();
            } );
        });
    }

})(jQuery);