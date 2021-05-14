$(document).ready(function (){

  $('.ait-loading__barra').animate({width:'100%'}, 5000)

	$('.ait-loading__porcentagem').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 5000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now)+'%');
        }
    });
  });

  var aitLoading = aitGetCookie('aitLoading');

  if(aitLoading != 1) {
    aitLoading();
  } else {
    $('.ait-loading').hide();
    $('body').addClass('ait-load');
    aitSetCookie('aitLoading', 1, 15);
  }

});

function aitLoading() {
   setTimeout(function(){
    $('.ait-loading').fadeOut(1200);
    $('body').addClass('ait-load');
  }, 5000);
}

// cookies

var domain = window.location.hostname;

function aitSetCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";domain=;" + domain + ";" + expires + ";path=/";
}

function aitGetCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}