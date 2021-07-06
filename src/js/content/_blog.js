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

jQuery.expr[":"].contains = function (a, i, m) {
    var rExps = [
      { re: /[\xC0-\xC6]/g, ch: "A" },
      { re: /[\xE0-\xE6]/g, ch: "a" },
      { re: /[\xC8-\xCB]/g, ch: "E" },
      { re: /[\xE8-\xEB]/g, ch: "e" },
      { re: /[\xCC-\xCF]/g, ch: "I" },
      { re: /[\xEC-\xEF]/g, ch: "i" },
      { re: /[\xD2-\xD6]/g, ch: "O" },
      { re: /[\xF2-\xF6]/g, ch: "o" },
      { re: /[\xD9-\xDC]/g, ch: "U" },
      { re: /[\xF9-\xFC]/g, ch: "u" },
      { re: /[\xC7-\xE7]/g, ch: "c" },
      { re: /[\xD1]/g, ch: "N" },
      { re: /[\xF1]/g, ch: "n" },
    ];
    var element = $(a).text();
    var search = m[3];
    $.each(rExps, function () {
      element = element.replace(this.re, this.ch);
      search = search.replace(this.re, this.ch);
    });
    return element.toUpperCase().indexOf(search.toUpperCase()) >= 0;
};

function aitSearchItem() {
    var palavraBuscada = $('.searchItem').val();
    $(".ait-content__blog__list:visible .ait-content__blog__card:not(:contains(" + palavraBuscada + "))").hide();
    $(".ait-content__blog__list:visible .ait-content__blog__card:contains(" + palavraBuscada + ")").show();
    $(".ait-content__blog__list:visible .ait-content__blog__card:contains(" + palavraBuscada + ")").each(function (index, element) {
        if ($(element).find("strong:contains(" + palavraBuscada + ")").length > 0 && $(element).find("span:contains(" + palavraBuscada + ")").length < 1) $(element).show();
    });

}