$(document).on('click', '.pe-modal-open', function(e){
  e.preventDefault();
  this.blur();
  var modalOpen = $(this).attr('pe-modal');
  $('.pe-component__modal').hide().removeClass('active');
  $('.pe-component__modal[pe-modal="'+modalOpen+'"]').fadeIn('fast').addClass('active');
  $('html, body').css('overflow','hidden');
});

$(document).on('click', '.pe-modal-close', function(e){
  e.preventDefault();
  this.blur();
  $('html, body').css('overflow','');
  $('.pe-component__modal').fadeOut('fast').removeClass('active');
});