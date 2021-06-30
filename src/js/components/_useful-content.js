$(document).on('click', '.ait-components__conteudo-util__options .ait-component__button', function(e){
  e.preventDefault();
  var option = $(this).attr('ait-data-option');
  $('.ait-components__conteudo-util__options .ait-component__button').removeClass('active');
  $(this).addClass('active');
  if(option == 'sim'){
  	$('.ait-components__conteudo-util__options, .ait-components__conteudo-util__form').hide();
  	$('.ait-components__conteudo-util__msg').fadeIn('fast');
  } else {
  	$('.ait-components__conteudo-util__form').fadeIn('fast');
  }
});