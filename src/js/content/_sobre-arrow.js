$(document).ready(function (){

  $('.ait-content__estimulo__bg__carrosel').slick({
	  arrows: true,
    centerMode: true,
    infinite: false,
    speed: 800,
    // dots: true,
    slidesToShow: 1,
    vertical: true,
    verticalSwiping: true
	});

	$('.ait-content__metodologia__carrossel').slick({
	  dots: false,
	  infinite: false,
	  speed: 1200,
	  slidesToShow: 6,
	  slidesToScroll: 1,
	  variableWidth: true,
	  responsive: [
	    {
	      breakpoint: 992,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }
	  ]
	});

	aitCarouselCenter('.ait-content__parceria .ait-component__carousel', 6);

	// if($(window).width() < 768){
	// 	$('.ait-content__nosso-time__cards__carrossel').slick({
	// 	  arrows: true,
	//     centerMode: true,
	//     infinite: false,
	//     // dots: true,
	//     slidesToShow: 1
	// 	});
	// }

});