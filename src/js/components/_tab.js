$(document).on('click', '.pe-component__tab__nav button', function(e){
  e.preventDefault();
  var elmTabItem = $(this).attr('pe-tab-item');
  if(!$(this).hasClass('active')){
  	$('.pe-component__tab__nav button, .pe-component__tab__content').removeClass('active');
  	$(this).addClass('active');
  	$('.pe-component__tab__content[pe-tab-item="'+elmTabItem+'"]').addClass('active');
  }
});