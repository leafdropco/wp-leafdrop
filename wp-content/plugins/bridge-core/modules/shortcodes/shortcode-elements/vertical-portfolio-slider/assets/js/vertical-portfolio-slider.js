(function ($) {
	'use strict';
	
	var verticalPortfolioSlider = {};
	qode.modules.verticalPortfolioSlider = verticalPortfolioSlider;
	
	verticalPortfolioSlider.qodeVerticalPortfolioSlider = qodeVerticalPortfolioSlider;
	verticalPortfolioSlider.qodeOnDocumentReady = qodeOnDocumentReady;
	
	$(document).ready(qodeOnDocumentReady);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function qodeOnDocumentReady() {
		qodeVerticalPortfolioSlider();
	}
	
	
	function qodeVerticalPortfolioSlider() {
		
		var holder = $j('.qode-vertical-portfolio-slider');
		
		if (holder.length) {
			
			holder.each(function () {
				var sliderOptions = typeof $j(this).data('options') !== 'undefined' ? $j(this).data('options') : {},
					autoplay = sliderOptions.autoplay !== undefined && sliderOptions.autoplay !== '' ? sliderOptions.autoplay : true,
					mousewheel = sliderOptions.mousewheel !== undefined && sliderOptions.mousewheel !== '' ? sliderOptions.mousewheel : false,
					speed = sliderOptions.speed !== undefined && sliderOptions.speed !== '' ? parseInt(sliderOptions.speed, 10) : 5000,
					speedAnimation = sliderOptions.speedAnimation !== undefined && sliderOptions.speedAnimation !== '' ? parseInt(sliderOptions.speedAnimation, 10) : 800,
					loop = sliderOptions.loop !== undefined && sliderOptions.loop !== '' ? sliderOptions.loop : true;

				if (autoplay === true) {
					autoplay = {
						delay: speed,
						disableOnInteraction: false
					};
				}
				
				var mySwiper = new Swiper (holder, {
					direction: 'vertical',
					slideEffect: 'fade',
					mousewheelControl: true,
					slidesPerView: '1',
					sliderScroll: true,
					speed: speedAnimation,
					loop: loop,
					autoplay: autoplay,
					pagination: {
						el: '.swiper-pagination',
						clickable: true,
						renderBullet: function (index, className) {
							return '<span class="' + className + '">' + (index + 1) + '</span>';
						},
					},
				})

				if( mousewheel ) {
					var scrollStart = false;
					holder.on('wheel', function (e) {
						e.preventDefault();
						if (!scrollStart) {
							scrollStart = true;
							var delta = e.originalEvent.deltaY;

							if (delta > 0) {
								holder[0].swiper.slideNext();
							} else {
								holder[0].swiper.slidePrev();
							}

							setTimeout(function () {
								scrollStart = false;
							}, 2000);
						}
					});
				}
			})
		}
	}

})(jQuery);