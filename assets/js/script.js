$(window).load(function() {
  
  $('body').removeClass('preload');
    
  $('.loader').hide()
  $('header').removeClass('preload');
  $('#content').removeClass('preload');
  
  $(window).scroll(function() {
    if ($(this).scrollTop() >= 1800){
      $('.back_top').show();
    }else{
      $('.back_top').hide(); 
    }
  });

  $('.back_top').click(function(){
    $('body,html').animate({
      scrollTop : 1600
    }, 1000);
  });
  
});

var image_container = document.querySelectorAll('.img_container'),
    body = document.querySelector('body'),
    photo_liked = [];
for(var i=0; i<image_container.length; i++){
    if(image_container[i].dataset.like == 'true'){
        photo_liked[photo_liked.length] = image_container[i].dataset.id;
        console.log(photo_liked);
    }
};

console.log(body);

for(var i=0; i<image_container.length; i++){
    image_container[i].addEventListener('click',function(){
        if(this.dataset.like == 'false'){
            photo_liked[photo_liked.length] = this.dataset.id;
            this.dataset.like = 'true';  
        }
        else {
            var j =0;
            this.dataset.like = 'false';
            while( j < photo_liked.length ){
                if(photo_liked[j]== this.dataset.id){
                    photo_liked.splice(j,1);
                    j = photo_liked.length;
                }
            }
        }
        console.log(photo_liked);
    }); 
}

window.addEventListener('beforeunload', function(){
    var httpRequest = new XMLHttpRequest;
        httpRequest.onreadystatechange = function(){
            if (httpRequest.readyState === 4) {// request is done
                if (httpRequest.status === 200) {// successfully
                    callback(httpRequest.responseText);// we're calling our method
                }
            }
        };
    
        httpRequest.open('POST', 'includes/add_user_galery.php', true);
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        var data = create_data_string(photo_liked);
        httpRequest.send(data);
});


function callback(data){  
  console.log(data);
}

function create_data_string(tab){
    var data_string = '';
    for( var k=0; k <tab.length; k++){
        if(k==0)
            data_string = k + '=' + tab[k] ;
        else
            data_string =data_string +'&'+ k + '=' + tab[k] ;
    }
    return data_string ;
}

