$(window).load(function() {
  
  $('body').removeClass('preload');
  
  $('.hide_left').on('click', function(){
    $(this).toggleClass('displayed');
    $('.informations').toggle();
    $(this).html('>');
  });
  
});