(function($) {
	'use strict';
	
	var elementorPortfolioCarousel = {};
	qode.modules.elementorPortfolioCarousel = elementorPortfolioCarousel;
	
	elementorPortfolioCarousel.qodeInitElementorPortfolioCarousel = qodeInitElementorPortfolioCarousel;
	
	
	elementorPortfolioCarousel.qodeOnWindowLoad = qodeOnWindowLoad;
	
	$(window).on('load', qodeOnWindowLoad);
	
	/*
	 ** All functions to be called on $(window).load() should be in this function
	 */
	function qodeOnWindowLoad() {
		qodeInitElementorPortfolioCarousel();
	}
	
	function qodeInitElementorPortfolioCarousel(){
		$j(window).on('elementor/frontend/init', function () {
			elementorFrontend.hooks.addAction( 'frontend/element_ready/bridge_portfolio_carousel.default', function() {
				qode.modules.portfolioCarousel.qodePortfolioCarousel();
				qode.modules.portfolioCarousel.qodeInitPortfolioCarouselCustomCursor();
			} );
		});
	}
	
})(jQuery);
