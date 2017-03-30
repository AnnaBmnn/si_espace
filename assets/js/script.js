window.addEventListener('load', function() {
    var body = document.querySelector('body'),
    loader = document.querySelector('.loader'),
    header = document.querySelector('header'),
    content = document.querySelector('#content'),
    back_top = document.querySelector('.back_top'),
    log_out = document.querySelectorAll('.log_out'),
    gallery_display = document.querySelector('.gallery_display');
    console.log(gallery_display);
    
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
        

var image_container = document.querySelectorAll('.img_plus'),
    body = document.querySelector('body'),
    photo_liked = [];
for(var i=0; i<image_container.length; i++){
    if(image_container[i].dataset.like == 'true'){
        photo_liked[photo_liked.length] = image_container[i].dataset.id;
    }
};

var load = 1,
    charged = false;

        
window.addEventListener('scroll', function(){
   if(document.body.scrollTop== getScrollTopMax()){
       load += 1;
       charged = true;
       if(charged){
            !charged;
            var httpRequest = new XMLHttpRequest;
            httpRequest.onreadystatechange = function(){
                if (httpRequest.readyState === 4) {// request is done
                    if (httpRequest.status === 200) {// successfully
                        add_img_load(httpRequest.responseText);     
                    }
                }
            };
    
        httpRequest.open('POST', 'includes/upload_more_picture.php', true);
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.send('load=' + load);
        }
    }           
});

getScrollTopMax = function () {
  var ref;
  return (ref = document.scrollingElement.scrollTopMax) != null
      ? ref
      : (document.scrollingElement.scrollHeight - document.documentElement.clientHeight);
};


for(var i=0; i<image_container.length; i++){
    image_container[i].addEventListener('dblclick', function (){
        if(this.dataset.like == 'false'){
            photo_liked[photo_liked.length] = this.dataset.id;
            this.dataset.like = 'true';  
            this.dataset.test = 'true';  
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

function add_img_load(data){
    var img_add =  JSON.parse(data),
        gallery_display = document.querySelector('.gallery_display');
    for( var i=0; i<img_add.length; i++ ){
        var img_container_create = document.createElement('div');
        img_container_create.classList.add('img_container');
        var img_actions_create = document.createElement('div');
        img_actions_create.classList.add('img_actions');
        img_container_create.appendChild(img_actions_create);
        var corner_top_left = document.createElement('div');
        corner_top_left.classList.add('corner_top_left');
        img_actions_create.appendChild(corner_top_left);
        var corner_top_right = document.createElement('div');
        corner_top_right.classList.add('corner_top_right');
        img_actions_create.appendChild(corner_top_right);
        var corner_bottom_left = document.createElement('div');
        corner_bottom_left.classList.add('corner_bottom_left');
        img_actions_create.appendChild(corner_bottom_left);
        var corner_bottom_right = document.createElement('div');
        corner_bottom_right.classList.add('corner_bottom_right');
        img_actions_create.appendChild(corner_bottom_right); 
        var img_plus_create = document.createElement('div');
        img_plus_create.classList.add('img_plus');
        img_plus_create.dataset.id =img_add[i].id ;
        img_plus_create.dataset.like =img_add[i].like ;
        img_plus_create.innerHTML ='+' ;
        
        img_actions_create.appendChild(img_plus_create);
        img_container_create.appendChild(img_actions_create);
        
        var img_create = document.createElement('img');
        img_create.src = img_add[i].url;
        img_container_create.appendChild(img_create);
        gallery_display.appendChild(img_container_create);
        
        img_plus_create.addEventListener('dblclick', function (){
            if(this.dataset.like == 'false'){
                photo_liked[photo_liked.length] = this.dataset.id;
                this.dataset.like = 'true';  
                this.dataset.test = 'true';  
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
}    
    
    
    
   
});



