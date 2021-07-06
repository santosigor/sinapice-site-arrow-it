$(document).ready(function (){
	
	$(document).on('click', '.ait-compartilhar a.facebook', function(e){
    e.preventDefault();
    aitShare("https://www.facebook.com/sharer/sharer.php?u=" + document.URL, "facebook-popup", 520, 350)
  });

  $(document).on('click', '.ait-compartilhar a.twitter', function(e){
    e.preventDefault();
    aitShare("https://twitter.com/share?url=" + document.URL, "twitter-popup", 520, 350)
  });

  $(document).on('click', '.ait-compartilhar a.linkedin', function(e){
    e.preventDefault();
    aitShare("https://www.linkedin.com/sharing/share-offsite/?url=" + document.URL, "linkedin-popup", 520, 350)
  });

  $(document).on('click', '.ait-compartilhar a.whatsapp', function(e){
    e.preventDefault();
    aitShare("https://api.whatsapp.com/send?text=" + document.URL, "whatsapp-popup", 520, 350)
  });

});

function aitShare(t, e, a, o) {
  var i = screen.height / 2 - o / 2
    , s = screen.width / 2 - a / 2;
  window.open(t, e, "top=" + i + ",left=" + s + ",toolbar=0,status=0,width=" + a + ",height=" + o)
}