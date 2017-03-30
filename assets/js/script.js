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
        

var add_collection = document.querySelectorAll('.add_collection'),
    body = document.querySelector('body'),
    photo_liked = [];
for(var i=0; i<add_collection.length; i++){
    if(add_collection[i].dataset.like == 'true'){
        photo_liked[photo_liked.length] = add_collection[i].dataset.id;
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
        httpRequest.send('load=' + load );
        }
    }           
});

getScrollTopMax = function () {
  var ref;
  return (ref = document.scrollingElement.scrollTopMax) != null
      ? ref
      : (document.scrollingElement.scrollHeight - document.documentElement.clientHeight);
};


for(var i=0; i<add_collection.length; i++){
    add_collection[i].addEventListener('click', function (){
		console.log('ok');
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
    
    httpRequest.open('POST', './includes/add_user_galery.php', true);
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
		//create img_action 
        var img_actions_create = document.createElement('div');
        img_actions_create.classList.add('img_actions');
        img_container_create.appendChild(img_actions_create);
        var img_plus_create = document.createElement('div');
        img_plus_create.classList.add('img_plus');
        img_plus_create.classList.add('add_collection');
        img_plus_create.dataset.id =img_add[i].id ;
        img_plus_create.dataset.like =img_add[i].like ;
        img_plus_create.innerHTML ='CLICK FOR \<br\> MORE INFORMATIONS' ;
        
        img_actions_create.appendChild(img_plus_create);
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
        
        img_container_create.appendChild(img_actions_create);
        
        var img_create = document.createElement('img');
        img_create.src = img_add[i].url;
        img_create.classList.add('img_img');
        img_container_create.appendChild(img_create);
        gallery_display.appendChild(img_container_create);
    
        var modal = document.createElement('div');
        modal.classList.add('modal');
        img_container_create.appendChild(modal);
      
        var line_close = document.createElement('div');
        line_close.classList.add('line_close');
        modal.appendChild(line_close);
      
        var modal_close = document.createElement('div');
        modal_close.classList.add('modal_close');
        modal_close.innerHTML = '>';
        modal.appendChild(modal_close);
      
        var modal_content = document.createElement('div');
        modal_content.classList.add('modal_content');
        modal.appendChild(modal_content);
      
        var img_modal = document.createElement('img');
        img_modal.classList.add('modal_img');
        img_modal.src= img_add[i].url;
        modal_content.appendChild(img_modal);
      
        var modal_infos = document.createElement('div');
        modal_infos.classList.add('modal_infos');
        modal_content.appendChild(modal_infos);
        
        var h3 = document.createElement('h3');
        h3.innerHTML = 'PHOTO \<em> #'+img_add[i].id +'\</em>';
        modal_infos.appendChild(h3);
    
        var ul = document.createElement('ul');
        modal_infos.appendChild(ul);
      
        var li = document.createElement('li');
        li.innerHTML = 'Date : '+img_add[i].date ;
        ul.appendChild(li);
      
        var li2 = document.createElement('li2');
        li2.innerHTML = 'Camera : '+img_add[i].camera ;
        ul.appendChild(li2);
      
        var add_button = document.createElement('div');
        add_button.classList.add('add_button');
        add_button.classList.add('add_collection');
        add_button.dataset.id =img_add[i].id ;
        add_button.dataset.like =img_add[i].like ;
        modal_infos.appendChild(add_button);
      
        if(img_add[i].session == 'true'){
          if(img_add[i].like == 'false'){
            add_button.innerHTML = '+ ADD TO YOUR COLLECTION';
          }else{
            add_button.innerHTML = '- DELETE FROM YOUR COLLECTION';
          }
        }else{
          var a = document.createElement('a');
          a.href = 'pages/sign_up.php';
          a.innerHTML = 'SUBSCRIBE TO SAVE PICTURE';
          add_button.appendChild(a);
        }
      
          var a_twitter = document.createElement('a');
          a_twitter.href = 'pages/sign_up.php';
          a_twitter.classList.add( 'twitter');
          a_twitter.innerHTML = 'https://twitter.com/intent/tweet?text=Rover\'s Eyes Photo n°'+img_add[i].id+' '+img_add[i].url;
          modal_infos.appendChild(a_twitter);
          a_twitter.innerHTML = 'TWEET';
      
          var img_twitter = document.createElement('img');
          img_twitter.src = 'assets/img/twitter.png';
          a_twitter.appendChild(img_twitter);
      
        modal_close.addEventListener('click', function(){
          this.parentNode.style.display = 'none';
        });
      
        img_actions_create.addEventListener('click', function(){
          var next = this.nextElementSibling;
          var cible = next.nextElementSibling;
          cible.style.display = 'block';
        });
        
        add_button.addEventListener('click', function (){
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
        });
        
    }
}    
    

  var img_actions =document.querySelectorAll('.img_actions');
  var modal =document.querySelectorAll('.modal');
  var add_button =document.querySelectorAll('.add_button');
  console.log(modal);

  for(var i=0; i<img_actions.length;i++){
    img_actions[i].addEventListener('click', function(){
      var next = this.nextElementSibling;
      var cible = next.nextElementSibling;
      cible.style.display = 'block';
    });
  }
  
  var modal_close =document.querySelectorAll('.modal_close');
  for(var j=0; j<modal_close.length;j++){
    modal_close[j].addEventListener('click', function(){
      this.parentNode.style.display = 'none';
    });
  }

      
});





