$(document).ready(function (){

  $('.ait-loading__barra').animate({width:'100%'}, 5000)

	$('.ait-loading__porcentagem').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 5000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now)+'%');
        }
    });
  });

  // setTimeout(function(){

    $('.ait-loading').fadeOut('slow');
    $('body').addClass('ait-load');

  // }, 5000);


});