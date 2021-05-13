$(document).ready(function (){

	$('.ait-component__carousel.center').slick({
	  dots: true,
	  infinite: false,
	  speed: 300,
	  variableWidth: true,
	  slidesToShow: 1
	  // slidesToScroll: 4
	});

	$('.ait-component__carousel.center').each(function() {
    $(this).find('.slick-next').appendTo($(this).find('.slick-dots'));
    $(this).find('.slick-prev').prependTo($(this).find('.slick-dots'));
  });

});