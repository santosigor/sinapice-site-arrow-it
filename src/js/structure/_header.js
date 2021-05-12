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

var aitCurrentUrl = window.location.href;

$(window).on('load', function () {

  // item active no menu
  $('.ait-structure__header nav a').removeClass('active');
  if (aitCurrentUrl.indexOf('/index') > -1) {
    $('.ait-structure__header nav a:nth-child(1)').addClass('active');
  }
  if (aitCurrentUrl.indexOf('/sobre-arrow-it') > -1) {
    $('.ait-structure__header nav a:nth-child(2)').addClass('active');
  }
  if (aitCurrentUrl.indexOf('/servicos') > -1) {
    $('.ait-structure__header nav a:nth-child(3)').addClass('active');
  }
  if (aitCurrentUrl.indexOf('/projetos') > -1 || aitCurrentUrl.indexOf('/projetos-integra') > -1) {
    $('.ait-structure__header nav a:nth-child(4)').addClass('active');
  }
  if (aitCurrentUrl.indexOf('/contato') > -1) {
    $('.ait-structure__header nav a:nth-child(5)').addClass('active');
  }
});