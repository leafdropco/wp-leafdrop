(function($) {
    'use strict';

    var elementorCustomFont = {};
    qode.modules.elementorCustomFont = elementorCustomFont;

    elementorCustomFont.qodeInitElementorCustomFont = qodeInitElementorCustomFont;


    elementorCustomFont.qodeOnWindowLoad = qodeOnWindowLoad;

    $(window).on('load', qodeOnWindowLoad);

    /*
     ** All functions to be called on $(window).load() should be in this function
     */
    function qodeOnWindowLoad() {
        qodeInitElementorCustomFont();
    }

    function qodeInitElementorCustomFont(){
        $j(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/bridge_custom_font.default', function() {
                qodeCustomFontTypeOut();
            } );
        });
    }

})(jQuery);