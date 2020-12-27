(function ($) {
	'use strict';
	
	var portfolioCarousel = {};
	qode.modules.portfolioCarousel = portfolioCarousel;
	
	portfolioCarousel.qodePortfolioCarousel = qodePortfolioCarousel;
	portfolioCarousel.qodeInitPortfolioCarouselCustomCursor = qodeInitPortfolioCarouselCustomCursor;
	portfolioCarousel.qodeOnDocumentReady = qodeOnDocumentReady;
	
	$(document).ready(qodeOnDocumentReady);

	$(window).load(qodeOnWindowLoad);

	function qodeOnWindowLoad() {
		qodeInitPortfolioCarouselCustomCursor();
	}
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function qodeOnDocumentReady() {
		qodePortfolioCarousel();
	}
	
	
	function qodePortfolioCarousel() {
		
		var holder = $j('.qode-portfolio-carousel');
		
		if (holder.length) {
			
			holder.each(function () {
				var sliderOptions = typeof $j(this).data('options') !== 'undefined' ? $j(this).data('options') : {},
					autoplay = sliderOptions.autoplay !== undefined && sliderOptions.autoplay !== '' ? sliderOptions.autoplay : true,
					mousewheel = sliderOptions.mousewheel !== undefined && sliderOptions.mousewheel !== '' ? sliderOptions.mousewheel : false,
					speed = sliderOptions.speed !== undefined && sliderOptions.speed !== '' ? parseInt(sliderOptions.speed, 10) : 5000,
					speedAnimation = sliderOptions.speedAnimation !== undefined && sliderOptions.speedAnimation !== '' ? parseInt(sliderOptions.speedAnimation, 10) : 800,
					loop = sliderOptions.loop !== undefined && sliderOptions.loop !== '' ? sliderOptions.loop : true,
					loopedSlides =  2,
					slidesPerView =  sliderOptions.slidesPerView !== undefined && sliderOptions.slidesPerView !== '' ? sliderOptions.slidesPerView : 'auto',
					pagination = $j(this).find('.swiper-pagination');
				
				if (autoplay === true) {
					autoplay = {
						delay: speed,
						disableOnInteraction: false
					};
				}
				
				var mySwiper = new Swiper ('.swiper-container', {
					direction: 'horizontal',
					loop: loop,
					loopedSlides: loopedSlides,
					slidesPerView: slidesPerView,
					centeredSlides: false,
					autoplay: autoplay,
					spaceBetween: 0,
					mousewheel: mousewheel,
					speed: speedAnimation
				})
			})
		}
	}

	function qodeInitPortfolioCarouselCustomCursor() {

		var portCarousel = $('.qode-portfolio-carousel'),
			customCursor = $('.qode-pc-custom-cursor');

		portCarousel.each(function () {
			var thisPortCarousel = $(this);
			
			//info element position
			thisPortCarousel.on('mousemove', function (e) {
				customCursor.css({
					top: e.clientY - 65,
					left: e.clientX - 65
				});
			});

			//show/hide info element
			thisPortCarousel.find('.qode-portfolio-carousel-item').on('mouseenter', function () {
				if (!customCursor.hasClass('qode-is-active')) {
					customCursor.addClass('qode-is-active');
				}
			}).on('mouseleave', function () {
				if (customCursor.hasClass('qode-is-active')) {
					customCursor.removeClass('qode-is-active');
				}
			});

			//check if info element is below or above the targeted portfolio list
			$(window).scroll(function(){
				if (customCursor.hasClass('qode-is-active')) {
					if (customCursor.offset().top < thisPortCarousel.offset().top || customCursor.offset().top > thisPortCarousel.offset().top + thisPortCarousel.outerHeight()) {
						customCursor.removeClass('qode-is-active');
					}
				}
			});
		});
	}

})(jQuery);