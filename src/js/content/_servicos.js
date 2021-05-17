$(document).ready(function (){

  $('.ait-content__servicos__container__carrossel').slick({
	  centerMode: true,
	  slidesToShow: 5,
	  variableWidth: true,
    speed: 0,
    draggable: false,
    swipe: false,
	  responsive: [
	    {
	      breakpoint: 500,
	      settings: {
	        slidesToShow: 3
	      }
	    }
	  ]
	});

	$(document).on('click', '.ait-content__servicos__container__carrossel__item:not(.active)', function(e){
    e.preventDefault();
    var svcItem = $(this).attr('ait-servico-item');
    if(!$(this).hasClass('active')){
      $('.ait-content__servicos__container__carrossel__item, .ait-content__servicos__content').removeClass('active');
      $('.ait-content__servicos__content').hide();
      $('.ait-content__servicos__content[ait-servico-content="'+svcItem+'"]').fadeIn();
      $(this).addClass('active');
    }
    if($(window).width() >=992){
      var indiceAtual = $('.ait-content__servicos__container__carrossel .slick-current.slick-active .ait-content__servicos__container__carrossel__item').attr('ait-servico-item');

      var indiceAtual = indiceAtual.slice(-1);

      if(indiceAtual == '0') {
        indiceAtual = '10';
      }

      var indiceSlick = $(this).closest('.slick-slide').attr('data-slick-index');

      var indice = indiceSlick - indiceAtual;
      
      if(indice >= 0) {
        $('.ait-content__servicos__container__carrossel .slick-next').click();
      } else {
        $('.ait-content__servicos__container__carrossel .slick-prev').click();
      }
    }
  });

  $(document).on('click', '.ait-content__servicos__container__carrossel .slick-arrow', function(e){
    e.preventDefault();
    $('.ait-content__servicos__container__carrossel .slick-current.slick-active .ait-content__servicos__container__carrossel__item').click();
  });

});

$(window).on('load', function () {

  var aitItemUrl = window.location.hash.substring(1);

  if(aitItemUrl != '' || aitItemUrl != undefined) {
    // $('.ait-content__servicos__container__carrossel__item[ait-servico-item="'+aitItemUrl+'"]').click();

    var aitItemUrlAtual = aitItemUrl.slice(-1);
    if(aitItemUrlAtual == '0') {
      aitItemUrlAtual = '10';
    }

    $('.ait-content__servicos__container__carrossel').slick('slickGoTo', aitItemUrlAtual-1);
    $('.ait-content__servicos__container__carrossel .slick-current.slick-active .ait-content__servicos__container__carrossel__item').click();
  }

});