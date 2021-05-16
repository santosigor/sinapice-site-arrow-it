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

	aitCarouselCenter('.ait-content__parceria .ait-component__carousel', 7, 5, 1);

	aitCarouselCenter('.ait-content__metodologia__carrossel .ait-component__carousel', 6, 3, 1);

	if($('.ait-content__nosso-time__cards__item').length > 5 || $(window).width() < 768){
		aitCarouselCenter('.ait-content__nosso-time__cards__carrossel', 5, 5, 1);
	}

});