(function($) {

	$.fn.adsCarousel = function() {
		var SLIDE_DURATION = 1000;
		var DELAY_BEFORE_START = 10000;
		var DELAY_BETWEEN = 7000;

		var $ulSlider = this;
		var $mainWrapper = $ulSlider.parent();
		var slideWidth = $mainWrapper.width();
		var slideHeight = $mainWrapper.height();

		var $currentSlide = $ulSlider.find('li:first').addClass('current');
		var $nextSlide;

		var intervalId;
		var timeoutId;

		$ulSlider.find('li').css({width:slideWidth, height:slideHeight, top:-slideHeight});
		$mainWrapper.append('<div class="adscarousel-prev"><span></span></div><div class="adscarousel-next"><span></span></div>');

		$currentSlide.css({left:0, top:0, width:slideWidth, height:slideHeight});

		move_to(0);

		$mainWrapper.find('.adscarousel-prev').click(function() {
			autoPlay(DELAY_BEFORE_START);
			movePrev();
		});

		$mainWrapper.find('.adscarousel-next').click(function() {
			autoPlay(DELAY_BEFORE_START);
			moveNext();
		});

		function move(side){
			$currentSlide.removeClass('current').animate({left:(slideWidth*side)}, { queue: false, duration: SLIDE_DURATION });
			$nextSlide.addClass('current').animate({left:0}, { queue: false, duration: SLIDE_DURATION });
			$currentSlide = $nextSlide;
		}

		function move_to(side){
			var src = '';
			var $slide_content;
			var $slide_iframe;

			if (side == 0) {
				$slide_content = $currentSlide.find('.slide-content');
				$slide_iframe = $currentSlide.find('iframe');
			}
			else {
				$slide_content = $nextSlide.find('.slide-content');
				$slide_iframe = $nextSlide.find('iframe');
			}

			if ($slide_content.attr('rel') ){
				src = $slide_content.attr('rel');
			}
			if ($slide_iframe.attr('rel')) {
				$slide_iframe.attr('src',$slide_iframe.attr('rel'));
				$slide_iframe.bind('error load onreadystatechange',function(){
					$slide_iframe.removeAttr('rel');
					if (side == 0)
						autoPlay(DELAY_BETWEEN);
					else
						move(side)
				});
				return false;
			}

			//for only one elem
			if (src != '')
				$.preload([src], {
						loaded_all: function(elem, loaded, total) {
							$slide_content.removeAttr('rel');
							$slide_content.attr('src', $(elem[0]).attr('src'));
						if (side == 0)
							autoPlay(DELAY_BETWEEN);
						else
							move(side)
						}
				});
			else {
				if (side == 0)
					autoPlay(DELAY_BETWEEN);
			else
					move(side)
		}
		}

		function moveNext() {
			if ($currentSlide.next().length > 0)
				$nextSlide = $currentSlide.next().css({left:slideWidth, top:0});
			else
				$nextSlide = $ulSlider.find('li:first').css({left:slideWidth, top:0});

			move_to(-1);
		}

		function movePrev() {
			if ($currentSlide.prev().length > 0)
				$nextSlide = $currentSlide.prev().css({left:-slideWidth, top:0});
			else
				$nextSlide = $ulSlider.find('li:last').css({left:-slideWidth, top:0});

			move_to(1);
		}

		function autoPlay(interval) {
			clearTimeout(timeoutId);
			clearInterval(intervalId);

			var i = 0;

			function update() {
					moveNext();
					i++;
			}

			timeoutId = setTimeout(function() {
				intervalId = setInterval(update, SLIDE_DURATION+DELAY_BETWEEN);
				update();
			}, interval);


		}

		;


		return this;
	};
})(jQuery);