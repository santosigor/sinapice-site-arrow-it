$(document).ready(function (){

  $('.ait-content__estimulo__bg__carrosel').slick({
	  arrows: true,
    centerMode: true,
    infinite: false,
    speed: 1000,
    // dots: true,
    slidesToShow: 1,
    vertical: true,
    verticalSwiping: true
	});

	aitCarouselCenter('.ait-content__parceria .ait-component__carousel', 6);

	aitCarouselCenter('.ait-content__metodologia__carrossel .ait-component__carousel', 6, 3, 2);

	if($('.ait-content__nosso-time__cards__item').length > 5 || $(window).width() < 768){
		var elemt = '.ait-content__nosso-time__cards__carrossel';
		$(elemt).slick({
		  dots: true,
		  infinite: false,
		  speed: 800,
		  variableWidth: true,
		  slidesToShow: 5,
		  slidesToScroll: 5,
		  responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
					  slidesToShow: 5,
					  slidesToScroll: 5
		      }
		    },
		    {
		      breakpoint: 768,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 2
		      }
		    }
		  ]
		});
	  $(elemt).find('.slick-next').appendTo($(elemt).find('.slick-dots'));
	  $(elemt).find('.slick-prev').prependTo($(elemt).find('.slick-dots'));
	}

});