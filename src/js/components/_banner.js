$(document).ready(function (){

  $('.ait-component__banner__carousel').slick({
    dots: true,
    speed: 900,
    slidesToShow: 1,
    adaptiveHeight: true,
	  responsive: [
	    {
	      breakpoint: 768,
	      settings: {
	        arrows: false
	      }
	    }
	  ]
  });

});