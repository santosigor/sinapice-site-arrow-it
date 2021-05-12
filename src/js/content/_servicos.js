$(document).ready(function (){

  $('.ait-content__servicos__container__carrossel').slick({
	  centerMode: true,
	  centerPadding: '60px',
	  slidesToShow: 6,
	  variableWidth: true,
	  responsive: [
	    {
	      breakpoint: 768,
	      settings: {
	        arrows: false,
	        centerMode: true,
	        centerPadding: '40px',
	        slidesToShow: 3
	      }
	    },
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

	$(document).on('click', '.ait-content__servicos__container__carrossel__item', function(e){
    e.preventDefault();
    var svcItem = $(this).attr('ait-servico-item');
    if(!$(this).hasClass('active')){
      $('.ait-content__servicos__container__carrossel__item, .ait-content__servicos__content').removeClass('active');
      $('.ait-content__servicos__content').hide();
      $('.ait-content__servicos__content[ait-servico-content="'+svcItem+'"]').fadeIn();
      $(this).addClass('active');
    }
  });

});