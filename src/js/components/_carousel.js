function aitCarouselCenter(elemt, slides, slidesT, slidesM) {
	$(elemt).slick({
	  dots: true,
	  infinite: false,
	  speed: 1200,
	  variableWidth: true,
	  slidesToShow: slides,
	  slidesToScroll: slides,
	  responsive: [
	    {
	      breakpoint: 1024,
	      settings: {
				  slidesToShow: slidesT,
				  slidesToScroll: slidesT
	      }
	    },
	    {
	      breakpoint: 768,
	      settings: {
	        slidesToShow: slidesM,
	        slidesToScroll: slidesM
	      }
	    }
	  ]
	});
  $(elemt).find('.slick-next').appendTo($(elemt).find('.slick-dots'));
  $(elemt).find('.slick-prev').prependTo($(elemt).find('.slick-dots'));
}