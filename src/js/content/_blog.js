$(document).ready(function (){

	aitCarouselCenter('.ait-content__blog__relacionados .ait-component__carousel', 4, 3, 1);

	if($('.ait-content__blog__integra__text').length > 0) {
	 	var texto = $('.ait-content__blog__integra__text').text();
	  var quantVet = texto.split(' ').length;

	  $('.ait-content__blog__integra__banner__publicacao .ait-tempo-leiura').html(Math.round(quantVet/130)+' min');
	}

	if($('.ait-content__blog__card').length > 0) {

		$('.ait-content__blog__card').each(function () {

		 	var texto = $(this).find('.ait-content__blog__card__info__text').text();
		  var quantVet = texto.split(' ').length;

		  $(this).find('.ait-tempo-leiura').html(Math.round(quantVet/130)+' min');
		
  	});
	}

});