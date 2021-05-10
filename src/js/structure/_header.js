$(document).ready(function (){

  // menu mobile
  $(document).on('click', '.pe-structure__header__menu-mobile', function(e){
    e.preventDefault();
    if(!$(this).hasClass('active')){
      $('html, body').css('overflow','hidden');
      $('.pe-structure__header nav').fadeIn();
      $(this).addClass('active');
    } else {
      $(this).removeClass('active');
      $('.pe-structure__header nav').fadeOut();
      $('html, body').css('overflow','');
    }
  });

});