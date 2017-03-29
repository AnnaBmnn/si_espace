window.addEventListener('load', function() {
    var body = document.querySelector('body'),
    loader = document.querySelector('.loader'),
    header = document.querySelector('header'),
    content = document.querySelector('#content'),
    back_top = document.querySelector('.back_top');
    
    body.classList.remove('preload');
    loader.style.display = 'none';
    header.classList.remove('preload');
    content.classList.remove('preload');

    window.addEventListener('scroll', function(){
        if (document.body.scrollTop >= 1800){
            back_top.style.display = 'inherit';
        }else{
            back_top.style.display = 'none';
        }
    });
    
    back_top.addEventListener('click',function(){
        scrollTo(document.body, 0, 1000);
    });

function scrollTo(element, to, duration) {
    var start = element.scrollTop,
        change = to - start,
        increment = 20;

    var animateScroll = function(elapsedTime) {        
        elapsedTime += increment;
        var position = easeInOut(elapsedTime, start, change, duration);                        
        element.scrollTop = position; 
        if (elapsedTime < duration) {
            setTimeout(function() {
                animateScroll(elapsedTime);
            }, increment);
        }
    };

    animateScroll(0);
}

function easeInOut(currentTime, start, change, duration) {
    currentTime /= duration / 2;
    if (currentTime < 1) {
        return change / 2 * currentTime * currentTime + start;
    }
    currentTime -= 1;
    return -change / 2 * (currentTime * (currentTime - 2) - 1) + start;
}
    
    
    
    
    /*

  $('.back_top').click(function(){
    $('body,html').animate({
      scrollTop : 1600
    }, 1000);
  });*/
  
var image_container = document.querySelectorAll('.img_plus'),
    body = document.querySelector('body'),
    photo_liked = [];
for(var i=0; i<image_container.length; i++){
    if(image_container[i].dataset.like == 'true'){
        photo_liked[photo_liked.length] = image_container[i].dataset.id;
    }
};


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
                    j = photo_liked.length+1;
                }
                else {
                    j++ ;
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
    
   
});

