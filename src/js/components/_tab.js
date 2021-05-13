$(document).ready(function (){

	$(document).on('click', '.ait-component__tab__nav li', function(e){
    e.preventDefault();
    var svcItem = $(this).attr('ait-tab-item');
    if(!$(this).hasClass('active')){
      $(this).closest('.ait-component__tab').find('.ait-component__tab__nav li, .ait-component__tab__content').removeClass('active');
      $(this).closest('.ait-component__tab').find('.ait-component__tab__content').hide();
      $(this).closest('.ait-component__tab').find('.ait-component__tab__content[ait-tab-content="'+svcItem+'"]').fadeIn();
      $(this).addClass('active');
    }
  });

});