$(document).on('click', '.ait-components__alert__close', function(e){
  e.preventDefault();
  $(this).parent().fadeOut('fast');
});