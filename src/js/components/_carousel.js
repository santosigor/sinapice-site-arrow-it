$(document).ready(function (){

	$('.ait-component__carousel.center').slick({
	  dots: true,
	  infinite: true,
	  speed: 300,
	  centerMode: true,
	  variableWidth: true,
	  slidesToShow: 2,
	  responsive: [
	    {
	      breakpoint: 480,
	      settings: {
	        arrows: false,
	        centerMode: true,
	        centerPadding: '40px',
	        slidesToShow: 1
	      }
	    }
	  ]
	});

	$('.ait-component__carousel.center').each(function() {
    $(this).find('.slick-next').appendTo($(this).find('.slick-dots'));
    $(this).find('.slick-prev').prependTo($(this).find('.slick-dots'));
  });

});