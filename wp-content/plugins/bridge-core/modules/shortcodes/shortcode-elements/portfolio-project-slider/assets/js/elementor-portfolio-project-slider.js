(function($) {
	'use strict';
	
	var elementorPortfolioProjectSlider = {};
	qode.modules.elementorPortfolioProjectSlider = elementorPortfolioProjectSlider;
	
	elementorPortfolioProjectSlider.qodeInitElementorPortfolioProjectSlider = qodeInitElementorPortfolioProjectSlider;
	
	
	elementorPortfolioProjectSlider.qodeOnWindowLoad = qodeOnWindowLoad;
	
	$(window).on('load', qodeOnWindowLoad);
	
	/*
	 ** All functions to be called on $(window).load() should be in this function
	 */
	function qodeOnWindowLoad() {
		qodeInitElementorPortfolioProjectSlider();
	}
	
	function qodeInitElementorPortfolioProjectSlider(){
		$j(window).on('elementor/frontend/init', function () {
			elementorFrontend.hooks.addAction( 'frontend/element_ready/bridge_portfolio_project_slider.default', function() {
				qode.modules.portfolioProjectSlider.qodePortfolioProjectSlider();
			} );
		});
	}
	
})(jQuery);
