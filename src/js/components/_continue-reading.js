$(document).ready(function (){

  // botao continuar lendo
  $(document).on('click', '.pe-component__continue-reading__button button', function(e){
    e.preventDefault();
    $(this).hide();
    $(this).parent().parent().find('.pe-component__continue-reading__content').addClass('active');
  });

});