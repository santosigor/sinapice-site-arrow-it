$(document).ready(function (){

  // menu mobile
  $(document).on('click', '.ait-structure__header__menu-mobile', function(e){
    e.preventDefault();
    if(!$(this).hasClass('active')){
      $('html, body').css('overflow','hidden');
      $('.ait-structure__header nav').fadeIn();
      $(this).addClass('active');
    } else {
      $(this).removeClass('active');
      $('.ait-structure__header nav').fadeOut();
      $('html, body').css('overflow','');
    }
  });

});