$(document).ready(function (){

  // botao continuar lendo
  $(document).on('click', '.pe-component__galeria__image__button button', function(e){
    e.preventDefault();
    $(this).hide();
    $(this).parent().parent().find('ul').addClass('active');
  });

});