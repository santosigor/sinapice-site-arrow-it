$(document).ready(function (){

  $('.ait-component__banner__carousel').slick({
    dots: true,
    speed: 1200,
    slidesToShow: 1,
    adaptiveHeight: true,
    autoplay: true,
  	autoplaySpeed: 7000
  });

  $('.ait-component__banner__carousel').find('.slick-next').appendTo($('.ait-component__banner__carousel').find('.slick-dots'));
  $('.ait-component__banner__carousel').find('.slick-prev').prependTo($('.ait-component__banner__carousel').find('.slick-dots'));

});