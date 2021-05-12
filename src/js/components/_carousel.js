$(document).ready(function (){

	$('.ait-component__carousel.center').slick({
	  dots: true,
	  infinite: true,
	  speed: 300,
	  slidesToShow: 1,
	  centerMode: true,
	  variableWidth: true
	});

	$('.ait-component__carousel.center .slick-next').appendTo('.ait-component__carousel.center .slick-dots');
	$('.ait-component__carousel.center .slick-prev').prependTo('.ait-component__carousel.center .slick-dots');

});