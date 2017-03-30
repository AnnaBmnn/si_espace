$( document ).ready(function() {
  
  $('.img_actions').on('click', function(){
    $(this).parent().children('.modal').css('display', 'block');
  });
  
  $('.modal_close').on('click', function(){
    $(this).parent().css('display', 'none');
  });
  
  $('.add_button').on('click', function(){
    $('.add_popup').slideToggle(300, function(){
      setTimeout(function(){
         $('.add_popup').slideToggle(300);
     }, 1500);
    });
  });
  
});