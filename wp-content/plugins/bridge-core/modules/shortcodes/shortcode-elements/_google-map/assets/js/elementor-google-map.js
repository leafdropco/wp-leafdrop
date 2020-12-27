(function($) {
    'use strict';

    var elementorGoogleMap = {};
    qode.modules.elementorGoogleMap = elementorGoogleMap;

    elementorGoogleMap.qodeInitElementorGoogleMap = qodeInitElementorGoogleMap;


    elementorGoogleMap.qodeOnWindowLoad = qodeOnWindowLoad;

    $(window).on('load', qodeOnWindowLoad );

    /*
     ** All functions to be called on $(window).load() should be in this function
     */
    function qodeOnWindowLoad() {
        qodeInitElementorGoogleMap();
    }

    function qodeInitElementorGoogleMap(){
        $j(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/bridge_google_map.default', function() {
                showGoogleMap();
            } );
        });
    }

})(jQuery);