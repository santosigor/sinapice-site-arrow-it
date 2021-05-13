$(document).ready(function (){

  $('.ait-content__estimulo__bg__carrosel').slick({
	  arrows: true,
    centerMode: true,
    infinite: false,
    // dots: true,
    slidesToShow: 1,
    vertical: true,
    verticalSwiping: true
	});

	$('.ait-content__metodologia__carrossel').slick({
	  dots: false,
	  infinite: false,
	  speed: 300,
	  slidesToShow: 6,
	  slidesToScroll: 1,
	  variableWidth: true,
	  responsive: [
	    {
	      breakpoint: 480,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }
	  ]
	});

});