$(document).on('click', '.ait-modal-open', function(e){
  e.preventDefault();
  this.blur();
  var modalOpen = $(this).attr('ait-modal');
  $('.ait-component__modal').hide().removeClass('active');
  $('.ait-component__modal[ait-modal="'+modalOpen+'"]').fadeIn('fast').addClass('active');
  $('html, body').css('overflow','hidden');
});

$(document).on('click', '.ait-modal-close', function(e){
  e.preventDefault();
  this.blur();
  $('.ait-pause-video').each(function(){
    this.contentWindow.postMessage('{"event":"command","func":"stopVideo","args":""}', '*')
  });
  $('video').trigger('pause');
  $('html, body').css('overflow','');
  $('.ait-component__modal').fadeOut('fast').removeClass('active');
});