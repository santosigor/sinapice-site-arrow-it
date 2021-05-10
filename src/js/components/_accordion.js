$(document).on('click', '.pe-component__accordion__open', function(e){
  e.preventDefault();
  if($(this).parent().hasClass('active')){
  	$(this).parent().removeClass('active').find('.pe-component__accordion__content').slideUp();
  } else {
  	$(this).parent().addClass('active').find('.pe-component__accordion__content').slideDown();
  }
});