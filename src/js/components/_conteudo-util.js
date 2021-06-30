$(document).on('click', '.ait-components__conteudo-util__options .ait-component__button', function(e){
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

$(document).on('click', '.ait-component__button.enviar', function(e){
  $('.ait-components__conteudo-util__options .ait-component__button').removeClass('active');
  $('.ait-components__conteudo-util__options, .ait-components__conteudo-util__form').hide();
  $('.ait-components__conteudo-util__msg').fadeIn('fast');
});

function comentarioUtil(tp, id){
  d = document.form;
  
  $.ajax({
    type: "POST",
    url: "arrowit-admin/ait_comentario_util.php",
    data: { tipo: tp, comentario: d.comentario.value, id_post: id}
  });
}