<?php

    // Get content

    $date_begining = date('h:i:s');
    $request = 0;
    //get the requete for sol = 0 in order to get the max sol
    $photos = get_request($request);            //request to the api with sol = $request
    $photos = $photos->photos;
    $max_sol = $photos[0]->rover->max_sol;

    foreach($photos as $_photo){ 
        insert_data_base($_photo);
    }
    $request +=1;
    while($request<= $max_sol){

        if($request%1000==0 && date_difference($date_begining)<60){     //check the limitation request
            sleep( date_difference($date_begining)*60 );                 //convert diff into seconde, don't do anything until the time is over
            $date_begining = date('h:i:s');
        }
        else {
            $photos = get_request($request);
            //test if there is picture for this date or not
            if(!array_key_exists('errors', $photos)){
                $photos = $photos->photos;
                foreach($photos as $_photo){ 
                    insert_data_base($_photo);
                }
                $request +=1;
            } 
            else {
                //if no info this day go to the next sol 
                $request +=1;
            }
        }

    }         

    function date_difference($date_begining){         //give the diffrence of time in hours beetween now and a given date
        $date_begining = date_create($date_begining);       //from string to object
        $date_now = date_create(date('h:i:s'));
        
        $interval = date_diff($date_begining, $date_now);       //get the difference beetween the 2 given date
        $interval = $interval->format('%i');                    //transform the difference in minutes

        return $interval;
    }

//get the informtion from the API
function get_request($sol){
    // Instantiate curl
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol='.$sol.'$page=1&api_key=HJ3vVYLEEmtXjCZqNc5qohsC1wXXFk3oER0Fntb1');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    curl_close($curl);

    // Json decode
    $result = json_decode($result);
    return $result;

}

//insert new picture in the data base
function insert_data_base($photo){
    $sol = $photo->sol;
    $date = $photo->earth_date;
    $url = $photo->img_src;
    $camera = $photo->camera->name;
    $score = 0;
    global $pdo;
    
    $prepare = $pdo->prepare('INSERT INTO rover_photo (sol, date, url, camera, score) VALUES (:sol, :date, :url, :camera, :score)');

    // Bind les valeurs
    $prepare->bindValue(':sol', $sol);
    $prepare->bindValue(':date', $date);
    $prepare->bindValue(':url', $url);
    $prepare->bindValue(':camera', $camera);
    $prepare->bindValue(':score', $score);


    // Execute la requête
    $exec = $prepare->execute();
}
